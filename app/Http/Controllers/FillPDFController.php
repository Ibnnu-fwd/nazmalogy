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
$unique_code = uniqid();
    $certificate = Certificate::where([
        ['user_id', auth()->user()->id],
        ['course_id', $course_id]
    ])->first();
    $name = auth()->user()->fullname;

    $course_name = $course->name;

    $outputfile = public_path('certificate.pdf');
    $pdfTemplate = public_path('certificate/certificate.pdf'); // Use correct path here

    $this->fillPDF($pdfTemplate, $outputfile, $name, $unique_code, $course_name);

    return response()->file($outputfile);
    }

    


    public function fillPDF($file, $outputfile, $nama, $uniq, $course_name)
    {
        $fpdi = new FPDI;
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
        $fpdi->useTemplate($template);

        // Position for "name" text
        $nameX = 30;  // X coordinate
        $nameY = 110;   // Y coordinate

        // Position for "unique" text
        $uniqX = 30;  // X coordinate
        $uniqY = 65;  // Y coordinate (adjusted position)

        // Position for "course_name" text
        $courseNameX = 30;  // X coordinate
        $courseNameY = 130;  // Y coordinate (adjusted position)

        $dateX = 200;  // X coordinate
        $dateY = 148;  // Y coordinate (adjusted position)

        //set date to now

        $fpdi->AddFont('Nunito', '', 'Nunito-Bold.php'); // Add Nunito font
        
        $fpdi->SetFont('Nunito', '', 32); // Set name font size to 32
        $fpdi->SetTextColor(43, 49, 118);

        // Add "name" text
        $fpdi->Text($nameX, $nameY, $nama);

        // Set the position and font size for "unique" text
        $fpdi->SetTextColor(96, 96, 96); // Set text color to grey
        $fpdi->SetFont('Nunito', '', 15); // Set uniq font size to 15
        $fpdi->Text($uniqX, $uniqY, $uniq);

        $fpdi->SetTextColor(43, 49, 118); // Reset text color to default

        $fpdi->SetFont('Nunito', '', 18); // Set course name font size to 18
        $fpdi->Text($courseNameX, $courseNameY, $course_name);

        $fpdi->SetFont('Nunito', '', 15); // Set course name font size to 18
        $fpdi->SetTextColor(96, 96, 96); // Set text color to grey
        $fpdi->Text($dateX, $dateY, date('d F Y'));


        return $fpdi->Output($outputfile, 'F');
    }


    
}
