<?php
require_once "../../controlador/facturaControlador.php";
require_once "../../modelo/facturaModelo.php";
require_once "../../assest/fpdf/fpdf.php";
$id=$_GET["id"];
$factura=ControladorFactura::ctrInfoFactura($id);
$producto=json_decode($factura["detalle"], true);
class PDF extends FPDF
{
// Pie de página
function Footer(){
    global $factura;
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10, utf8_decode($factura["leyenda"]), 0,0,'C');
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AddPage();


/**encabezado */
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(100, 20, "Sistema POS", 0, 1);
$pdf->Line(10, 25, 180, 25);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 8, "NIT: 376151024", 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, "Nro. Factura: ".$factura['cod_factura'], 0, 1);
$pdf->Cell(50, 8, utf8_decode("Teléfonos: (591) 94225560") , 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, utf8_decode("Fecha de emisión: ").$factura['fecha_emision'] , 0, 1);
$pdf->Cell(50, 8, "Emitido por: ".$factura['usuario'], 0, 1);
$pdf->Cell(50, 8, utf8_decode("Dirección: Calle Pucara #129") , 0, 1);
$pdf->Cell(50, 8, "", 0, 1);
$pdf->Cell(50, 8, "Nombre: ".utf8_decode($factura['razon_social_cliente']), 0, 1);
$pdf->Cell(50, 8, "NIT/CI: ".$factura['nit_ci_cliente'], 0, 1);

/*detalle* */
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(120, 15, "", 0, 1);
$pdf->setX(90);
$pdf->Cell(30, 20, "Detalle", 0, 1, "C");
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(75, 98, 241);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(92, 8, utf8_decode("Descripción"), 1, 0, "L", true);
$pdf->Cell(22, 8, "Cantidad", 1, 0, "L", true);
$pdf->Cell(22, 8, "P. Unitario", 1, 0, "L", true);
$pdf->Cell(22, 8, "Descuento", 1, 0, "L", true);
$pdf->Cell(22, 8, "Total", 1, 1, "L", true);

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0);

foreach($producto as $value){
    $pdf->Cell(92, 8, utf8_decode($value["descripcion"]), 1, 0, "L");
    $pdf->Cell(22, 8, utf8_decode($value["cantidad"]), 1, 0, "L");
    $pdf->Cell(22, 8, utf8_decode($value["precioUnitario"]), 1, 0, "L");
    $pdf->Cell(22, 8, utf8_decode($value["montoDescuento"]), 1, 0, "L");
    $pdf->Cell(22, 8, utf8_decode($value["subtotal"]), 1, 1, "L");
}

$pdf->setFont("Arial", "B", 10);
$pdf->Cell(158, 8, "Subtotal: ", 1, 0);
$pdf->Cell(22, 8, $factura["neto"], 1, 1);

$pdf->Cell(158, 8, "Descuento Adicional: ", 1, 0);
$pdf->Cell(22, 8, $factura["descuento"], 1, 1);

$pdf->Cell(158, 8, "Total: ", 1, 0);
$pdf->Cell(22, 8, $factura["total"], 1, 0);

$pdf->Output();
?>