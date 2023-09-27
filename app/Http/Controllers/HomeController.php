<?php

namespace App\Http\Controllers;

use App\Interfaces\CourseCategoryInterface;
use App\Interfaces\CourseInterface;
use App\Interfaces\GeneralTestimonialInterface;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestStatus\Risky;

class HomeController extends Controller
{
    private $courseCategory;
    private $course;
    private $generalTestimonial;

    public function __construct(CourseCategoryInterface $courseCategory, CourseInterface $course, GeneralTestimonialInterface $generalTestimonial)
    {
        $this->courseCategory     = $courseCategory;
        $this->course             = $course;
        $this->generalTestimonial = $generalTestimonial;
    }

    public function index()
    {
        return view('user.home', [
            'courseCategories'    => $this->courseCategory->getAll(),
            'courses'             => $this->course->getAll()->where('publish_status', 1)->take(6),
            'generalTestimonials' => $this->generalTestimonial->getAll()
        ]);
    }
}
