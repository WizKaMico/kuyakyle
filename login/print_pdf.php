<?php
function generateRow() {
    $contents = '';
    $order = $_GET['order_id'];
    include('../connection/AdminHomeController.php');

    $orderResult = $portCont->getOrderItemsByOrderId($order);

    foreach ($orderResult as $item) {
        $totalAmount = $item['item_price'] * $item['quantity'];
        $contents .= "
            <tr>
                <td>".$item['product_name']."</td>
                <td>".$item['item_price']."</td>
                <td>".$item['quantity']."</td>
                <td>".$totalAmount."</td>
            </tr>
        ";
    }

    return $contents;
}

require_once('tcpdf/tcpdf.php');
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
    <h2 align="center">RECEIPT ORDER</h2>
    <h4>CUSTOMER NAME: </h4>
    <h4>CASHIER NAME: </h4>
    <h4>ORDER QUEUE: </h4>
    <table border="1" cellspacing="0" cellpadding="3">  
        <tr>  
            <th width="40%">PRODUCT</th>
            <th width="20%">PRICE PER</th>
            <th width="20%">QUANTITY</th>
            <th width="20%">AMOUNT</th>
        </tr>  
';  
$content .= generateRow();  
$content .= '</table>';  
$pdf->writeHTML($content); 
ob_clean(); 
$pdf->Output('receipt.pdf', 'I');
?>
