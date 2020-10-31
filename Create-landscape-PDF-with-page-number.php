<?php
* MPDf library
class MpdfLandscape {
    public function __construct() {
        $this->CI = & get_instance();
        require_once 'assets/mpdf/mpdf.php';
    }
	
    public function generatePdf($html, $paper = 'A4') {
        $mpdf =  new mPDF("en-GB-x","Letter-L","","",10,10,10,10,6,3);
        $mpdf->mirrorMargins = 1;
        $mpdf->setFooter('<table><tr><td align=\"right\">Page {PAGENO} of {nbpg}</td></tr></table>');
        $mpdf->showWatermarkText = true;
        $mpdf->WriteHTML($html);
        $fileName = date('Y_m_d_H_i_s');
        $mpdf->Output('TITLE_' . $fileName . '.pdf', 'I');
    }

}

* Controller

    public function methodName() {
        $data['result'] = "Query here";
        $output         = $this->load->view('view_file_name', $data, TRUE);
        $this->load->library("MpdfLandscape");
        $this->MpdfLandscape->generatePdf($output, 'A4');
    }
	
* view
	
	<form  action="<?php base_url() ?>methodName" target="_blank" type="GET/POST">
	<button type="button" class="btn">Report</button>
	</form>
	