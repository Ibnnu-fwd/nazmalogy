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

    public function store($user_id, $chapter_id)
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
            ]);
        } else {
            return $userCourseChapterLog->update([
                'finished_at' => now(),
            ]);
        }
    }
}
