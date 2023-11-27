
<?php
function generateRow() {
    $contents = '';
    require_once "../../connection/ApiController.php";
    $portCont = new shopController();

    $Sales = $portCont->mostSoldProduct();
    foreach ($Sales as $item) {


        $contents .= "
            <tr>
                <td>".$item['name']."</td>
                <td>".$item['orders']."</td>
                <td>".$item['income']."</td>
            </tr>
        ";
    }

    return $contents;
}

require_once('../tcpdf/tcpdf.php');
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle("KUYA KYLE");
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('helvetica', '', 11);
$pdf->AddPage();
$content = '';
$content .= '
    <h2 align="center">MOST SOLD PRODUCT</h2>
    <table border="1" cellspacing="0" cellpadding="3">  
        <tr>  
            <th width="30%">PRODUCT</th>
            <th width="30%">SALES</th>
            <th width="30%">INCOME</th>
        </tr>  
';  
$content .= generateRow();  
$content .= '</table>';  
$pdf->writeHTML($content); 
ob_clean(); 
$pdf->Output('receipt.pdf', 'I');
?>
