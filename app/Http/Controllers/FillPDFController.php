<?php

namespace App\Http\Controllers;

use App\Interfaces\CourseInterface;
use App\Models\Certificate;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class FillPDFController extends Controller
{
    private $course;

    public function __construct(CourseInterface $course)
    {
        $this->course = $course;
    }

    public function process($course_id, $user_id)
    {
        $course = $this->course->getById($course_id);
        $certificate = Certificate::where([
            ['user_id', auth()->user()->id],
            ['course_id', $course_id]
        ])->first();
        $name = auth()->user()->fullname;
        $unique_code = $certificate->unique_code;

        $outputfile = public_path($certificate->unique_code . '.pdf');
        $pdfTemplate = public_path('certificate/sertif.pdf'); // Use correct path here

        $this->fillPDF($pdfTemplate, $outputfile, $name, $unique_code);

        return response()->file($outputfile);
    }


    public function fillPDF($file, $outputfile, $nama, $unique_code)
    {
        $fpdi = new FPDI;
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
        $fpdi->useTemplate($template);
        $top = 97;
        $right = 140;
        $name = $nama;
        $unique_code = $unique_code;
        $fpdi->SetFont('Helvetica', 'B', '17');
        $fpdi->SetTextColor(25, 25, 25);
        $fpdi->Cell(280, 160, $unique_code, 1, 1, 'C');

        return $fpdi->Output($outputfile, 'F');
    }
}
