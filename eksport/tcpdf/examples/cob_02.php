<?php
//============================================================+
// File name   : example_003.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 003 for TCPDF class
//               Custom Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Custom Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		//$image_file = K_PATH_IMAGES.'logo_example.jpg';
		//$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		//$this->SetFont('times', 'B', 20);
		$str ='<br><br><table border="0">
			<tr>
				<td width="100" align="center"><img src="images/logo-ipb.png" width="60" height="60"/></td>
				<td width="500" valign="middle"><font size="25" >MANAJEMEN INFORMATIKA IPB</font><br/>
				     Kampus IPB Diploma Jl.Kumbang, Kota Bogor, Jawa Barat. Telp. 0251-12345678</td>
			</tr>
			</table>
			<hr>';
		$this->writeHTML($str, true, false, true, false, '');
		// Title
		//$this->Cell(0, 15, ' Manajemen Informatika IPB ', 0, false, 'L', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Halaman '.$this->getAliasNumPage().' dari '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->SetTopMargin(50.0);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//PDF_MARGIN_TOP
$pdf->SetMargins(PDF_MARGIN_LEFT,100 , PDF_MARGIN_RIGHT);
//echo PDF_MARGIN_TOP;
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD
TCPDF Example 003

Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------
$pdf->AddPage();
$pdf->Write(0, "Test halaman 2", '', 0, 'C', true, 0, false, false, 0);



$x = '<html>
 <head>
  <script type="text/javascript" src="pustaka_FSC/js/fusioncharts.js"></script>
   <script type="text/javascript" src="pustaka_FSC/js/themes/fusioncharts.theme.fint.js"></script>
   <script type="text/javascript">
     FusionCharts.ready( function(){
	   var G1 = new FusionCharts({
	    "type": "pie3d",
		"renderAt": "lokasi",
		"width":"800",
		"height":"500",
		"dataFormat":"json",
		"dataSource":{
		  "chart":{
		     "caption": "Monthly Revenue",
			 "subCaption":"INF Mart",
			 "xAxisName":"month",
			 "yAxisName":"Revenues",
			 "theme":"fint"
		  },
		  "data":[
		    {"label":"Jan", "value":"100"},
			{"label":"Feb", "value":"200"},
			{"label":"Mar", "value":"300"},
			{"label":"April", "value":"400"},
		  ]
		}
	   }
	   );
	   G1.render();
	 }
	 )
   </script>
 </head>
 <body>
   <div id="lokasi">di sini</div>
 </body>
</html>';

$pdf->AddPage();
$pdf->WriteHTML($x, true,false,false,false,'');




//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
