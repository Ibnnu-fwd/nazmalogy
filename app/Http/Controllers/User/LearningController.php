<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseInterface;
use App\Interfaces\LearningInterface;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    private $learning;

    public function __construct(LearningInterface $learning)
    {
        $this->learning = $learning;
    }

    public function start($course_id)
    {
        return view('user.course.player', [
            'course' => $this->learning->getByCourseId($course_id),
        ]);
    }

    public function chapter($chapter_id)
    {
        $result = $this->learning->getByChapterId($chapter_id);
        return view('user.course.player', [
            'course' => $result['course'],
            'chapter' => $result['chapter'],
            'chapter_id' => $chapter_id,
        ]);
    }
}
