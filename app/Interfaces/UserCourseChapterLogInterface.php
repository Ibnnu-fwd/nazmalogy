<?php

namespace App\Interfaces;


interface UserCourseChapterLogInterface
{
    public function store($user_id, $chapter_id, $finish_time);
    public function getUserChapterLogByUserId($user_id);
    public function getUserChapterLogByAuthorId($authorId, $course_id);
}
