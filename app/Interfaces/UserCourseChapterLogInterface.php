<?php

namespace App\Interfaces;


interface UserCourseChapterLogInterface
{
    public function store($user_id, $chapter_id, $finish_time);
}
