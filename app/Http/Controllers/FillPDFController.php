<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class FillPDFController extends Controller
{
    public function process(Request $request)
    {
        $user = auth()->user();
        $name = $user->fullname;
        $outputfile = public_path('sertif.pdf'); // Use correct path here
        $pdfTemplate = public_path('certificate/sertif.pdf'); // Use correct path here

        $this->fillPDF($pdfTemplate, $outputfile, $name);

        return response()->file($outputfile);
    }


    public function fillPDF($file, $outputfile, $nama)
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
        $fpdi->SetFont('Helvetica','B','17');
        $fpdi->SetTextColor(25,25,25);
        $fpdi->Cell(280, 160, $name, 1, 1, 'C');
        
        return $fpdi->Output($outputfile, 'F');
    }
}
