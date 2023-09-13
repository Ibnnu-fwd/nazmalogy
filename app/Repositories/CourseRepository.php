<?php

namespace App\Repositories;

use App\Interfaces\CourseInterface;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CourseRepository implements CourseInterface
{
    private $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function getAll()
    {
        return $this->course->with('courseCategory')->get();
    }

    public function getById($id)
    {
        $course = $this->course
            ->with(['courseCategory', 'playlists.chapters.reviews', 'playlists.quiz'])
            ->findOrFail($id);

        $course->lesson_count = $this->calculateLessonCount($course->playlists);
        $course->review_count = $this->calculateReviewCount($course->playlists);
        $course->quiz_count   = $this->calculateQuizCount($course->playlists);
        $course->duration     = $this->calculateTotalDuration($course->playlists);
        $course->reviews      = $this->getSortedReviews($course->playlists);
        $course->total_rating = $course->reviews->avg('rating');

        return $course;
    }

    private function calculateLessonCount($playlists)
    {
        return $playlists->flatMap(fn ($playlist) => $playlist->chapters)->count();
    }

    private function calculateReviewCount($playlists)
    {
        return $playlists->flatMap(fn ($playlist) => $playlist->chapters->flatMap(fn ($chapter) => $chapter->reviews))->count();
    }

    private function calculateQuizCount($playlists)
    {
        return $playlists->filter(fn ($playlist) => $playlist->quiz !== null)->count();
    }

    private function calculateTotalDuration($playlists)
    {
        $totalDurationMinutes = $playlists->flatMap(fn ($playlist) => $playlist->chapters)->sum('duration');
        return Carbon::parse($totalDurationMinutes)->locale('id')->isoFormat('H [Jam] m [Menit]');
    }

    private function getSortedReviews($playlists)
    {
        return $playlists->flatMap(fn ($playlist) => $playlist->chapters)
            ->flatMap(fn ($chapter) => $chapter->reviews)
            ->sortByDesc('created_at');
    }


    public function store($data)
    {
        try {
            if (isset($data['thumbnail'])) {
                $thumbnailFileName = uniqid() . '.' . $data['thumbnail']->extension();
                $data['thumbnail']->storeAs('public/courses', $thumbnailFileName);
                $data['thumbnail'] = $thumbnailFileName;

                chmod(storage_path('app/public/courses/' . $thumbnailFileName), 0755);
            }

            $data['author_id'] = auth()->user()->id;
            return $this->course->create($data);
        } catch (\Throwable $th) {
            Storage::delete('public/courses/' . $thumbnailFileName);
            throw $th;
        }
    }

    public function update($id, $data)
    {
        try {
            $course = $this->course->findOrFail($id);

            if (isset($data['thumbnail'])) {
                $thumbnailFileName = uniqid() . '.' . $data['thumbnail']->extension();
                $data['thumbnail']->storeAs('public/courses', $thumbnailFileName);
                $data['thumbnail'] = $thumbnailFileName;
            }

            $data['author_id'] = auth()->user()->id;
            $course->update($data);

            return $course;
        } catch (\Throwable $th) {
            Storage::delete('public/courses/' . $thumbnailFileName);
            throw $th;
        }
    }

    public function destroy($id)
    {
        return $this->course->where('id', $id)->update(['is_active' => false]);
    }

    public function recover($id)
    {
        return $this->course->where('id', $id)->update(['is_active' => true]);
    }
}
