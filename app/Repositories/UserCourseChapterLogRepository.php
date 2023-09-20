<?php

namespace App\Repositories;

use App\Interfaces\UserCourseChapterLogInterface;
use App\Models\UserCourseChapterLog;
use App\Models\CourseChapter;
use App\Models\Playlist;
use App\Models\Course;

class UserCourseChapterLogRepository implements UserCourseChapterLogInterface
{
    private $userCourseChapterLog;
    private $courseChapter;
    private $playlist;
    private $course;

    public function __construct(UserCourseChapterLog $userCourseChapterLog, CourseChapter $courseChapter, Playlist $playlist, Course $course)
    {
        $this->userCourseChapterLog = $userCourseChapterLog;
        $this->courseChapter = $courseChapter;
        $this->playlist = $playlist;
        $this->course = $course;
    }

    public function store($user_id, $chapter_id, $finish_time)
    {
        $userCourseChapterLog = $this->userCourseChapterLog
            ->where('user_id', $user_id)
            ->where('course_chapter_id', $chapter_id)
            ->first();

        if (!$userCourseChapterLog) {
            return $this->userCourseChapterLog->create([
                'user_id'           => $user_id,
                'course_chapter_id' => $chapter_id,
                'finished_at'       => now(),
                'finish_time'       => date('H:i:s', $finish_time),
            ]);
        } else {
            return $userCourseChapterLog->update([
                'finished_at' => now(),
                'finish_time' => date('H:i:s', $finish_time),
            ]);
        }
    }

    public function getUserChapterLogByUserId($user_id)
    {
        return $this->userCourseChapterLog
            ->where('user_id', $user_id)
            ->with('courseChapter')
            ->get();
    }

    public function getUserChapterLogByAuthorId($authorId, $course_id)
    {
        $course = $this->course->where('author_id', $authorId)->where('id', $course_id)->first();
        $playlist = $this->playlist->where('course_id', $course->id)->get();
        $courseChapter = $this->courseChapter->whereIn('playlist_id', $playlist->pluck('id'))->get();
        return $this->userCourseChapterLog
            ->whereIn('course_chapter_id', $courseChapter->pluck('id'))
            ->with('courseChapter')
            ->get();       
    }
}
