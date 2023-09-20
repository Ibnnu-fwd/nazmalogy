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
    $prefix = 'C';  // Prefix for the unique ID format
    $unique_code = uniqid();  // Generate a unique ID
    $formatted_unique_code = $prefix . substr($unique_code, 0, 5);  
    $certificate = Certificate::where([
        ['user_id', auth()->user()->id],
        ['course_id', $course_id]
    ])->first();
    $name = auth()->user()->fullname;

    $course_name = $course->name;

    $outputfile = public_path('sertif.pdf');
    $pdfTemplate = public_path('certificate/sertif.pdf'); // Use correct path here

    $this->fillPDF($pdfTemplate, $outputfile, $name, $formatted_unique_code, $course_name);

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
        $nameX = 140;  // X coordinate
        $nameY = 97;   // Y coordinate
    
        // Position for "unique" text
        $uniqX = 11;  // X coordinate
        $uniqY = 150;  // Y coordinate (adjusted position)
    
        // Position for "course_name" text
        $courseNameX = 11;  // X coordinate
        $courseNameY = 120;  // Y coordinate (adjusted position)
    
        $fpdi->SetFont('Helvetica', 'B', '17');
        $fpdi->SetTextColor(25, 25, 25);
        
        // Add "name" text
        $fpdi->Text($nameX, $nameY, $nama);
        
        // Set the position for "unique" text
        $fpdi->SetXY($uniqX, $uniqY);
        
        // Add "unique" text
        $fpdi->SetFont('Helvetica', 'B', 18);  // Adjust font and size if needed
        $fpdi->SetTextColor(0, 0, 0);  // Adjust text color if needed
        $fpdi->Cell(0, 0, 'UNIQUE: ' . $uniq, 0, 1, 'C');
    
        // Set the position for "course_name" text
        $fpdi->SetXY($courseNameX, $courseNameY);
    
        // Add "course_name" text
        $fpdi->SetFont('Helvetica', 'B', 18);  // Adjust font and size if needed
        $fpdi->SetTextColor(0, 0, 0);  // Adjust text color if needed
        $fpdi->Cell(0, 0, 'COURSE: ' . $course_name, 0, 1, 'C');
    
        return $fpdi->Output($outputfile, 'F');
    }
    
    
}
