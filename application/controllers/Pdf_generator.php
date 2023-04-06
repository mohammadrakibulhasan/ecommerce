<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/Tcpdf/tcpdf.php');

class Pdf_generator extends CI_Controller {

    public function get()
    {
        if (!$this->session->userdata('userid') && !$this->session->userdata('id')) {
			redirect('user/login');
		}
        // $this->load->library('session');

        // Load the TCPDF library
        $this->load->library('pdf');

        // Set up the PDF document
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('NIL');
        $pdf->SetTitle('Your Invoice');
        $pdf->SetSubject('Document Subject');
        $pdf->SetKeywords('Keywords');
        // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Document Title', 'Document Subject', array(0,64,255), array(0,64,128));
        $pdf->SetHeaderData(null, PDF_HEADER_LOGO_WIDTH, '', '', array(0,64,255), array(0,64,128));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->SetFont('dejavusans', '', 12);
        $pdf->AddPage();

        // Load your view file into a variable
        $orderid = $this->input->get('orderid');
        $data['time'] = $this->Invoice_model->time($orderid);
        $data['order'] = $this->Invoice_model->orderdetails($orderid);
		$data['dcharge'] = $this->Invoice_model->charge($orderid);


		// $data['title'] = 'invoice';
		// $data['css'] = base_url() . 'asset/css/home.css';

		// $html = $this->load->view('inc/header', $data,true);
		$html = $this->load->view('pdf', $data, true);
		// $html .= $this->load->view('inc/footer',$data ,true);

        // $html = $this->load->view('user/invoice', [], true);

        // Add the HTML content to the PDF
        $pdf->writeHTML($html, true, false, true, false, '');
        // Output the PDF
        $pdf->Output('example.pdf', 'I');
    }
}

?>