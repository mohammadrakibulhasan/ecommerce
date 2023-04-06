<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH.'Tcpdf/tcpdf.php';

class Pdf {

    protected $pdf;

    public function __construct() {
        $this->pdf = new TCPDF();
    }

    public function generate_pdf($html) {
        // Set margins, header and footer
        $this->pdf->SetMargins(20, 30, 20);
        $this->pdf->SetHeaderMargin(10);
        $this->pdf->SetFooterMargin(10);
        
        // Add a page
        $this->pdf->AddPage();
        
        // Write the HTML content to the PDF
        $this->pdf->writeHTML($html, true, false, true, false, '');
        
        // Output the PDF to the browser
        $this->pdf->Output('example.pdf', 'I');
    }
}
