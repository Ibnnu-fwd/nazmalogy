<?php

namespace App\Repositories;

use App\Interfaces\UserCourseChapterLogInterface;
use App\Models\UserCourseChapterLog;

class UserCourseChapterLogRepository implements UserCourseChapterLogInterface
{
    private $userCourseChapterLog;

    public function __construct(UserCourseChapterLog $userCourseChapterLog)
    {
        $this->userCourseChapterLog = $userCourseChapterLog;
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
}
