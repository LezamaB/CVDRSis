<?php

require('./fpdf.php');

class PDF extends FPDF
{
   function Header()
   {
      $imagen = isset($_GET['imagen']) ? urldecode($_GET['imagen']) : 'reconocimiento.png';
      $this->Image($imagen, 0,0, 300, 220);
      $this->SetFont('Arial', 'B', 56);
      // Título del certificado centrado
      // `{$this->Cell(0, 20, 'Certificado de Reconocimiento', 0, 1, 'C');
      // $this->Ln(10); // Salto de línea}`
      $this->Ln(10);
   }
}

// Datos del usuario y clase
$nombreUsuario = $_GET['usuario'];
$clase = isset($_GET['conferencia']) ? urldecode($_GET['conferencia']) : 'Conferencia Desconocida';

$pdf = new PDF('L'); // 'L' para orientación horizontal
$pdf->AddPage();

$pdf->AddFont('The-Youngest-Script', '', 'The-Youngest-Script.php');
$pdf->SetFont('The-Youngest-Script', '', '70');
// $pdf->Cell(190,20, utf8_decode($nombreUsuario),0,1,'C');
// Nombre de la clase centrado
$pdf->Ln(80);
$pdf->Ln(10);
$pdf->Cell(0, 60, utf8_decode($nombreUsuario), 0, 4, 'C');

$pdf->SetFont('Arial', '', 24);
// Nombre de la clase centrado
$pdf->Cell(0, 10, utf8_decode($clase), 0, 1, 'C');

$pdf->Output('Certificado.pdf', 'I');

