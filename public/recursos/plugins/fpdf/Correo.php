<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Correo</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- sweetalert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php


require('./fpdf.php');
$imagen = $_GET['imagen'];

class PDF extends FPDF
{
    function Header()
    {
        $imagen = isset($_GET['imagen']) ? urldecode($_GET['imagen']) : 'reconocimiento.png';
        $this->Image('imagen', 0, 0, 300, 220);
        $this->SetFont('Arial', 'B', 56);
        $this->Ln(10);
    }
}

// Datos del usuario y clase
$nombreUsuario = $_GET['usuario'];
$clase = isset($_GET['conferencia']) ? urldecode($_GET['conferencia']) : 'Conferencia Desconocida';
$correo = $_GET['direccion'];



$pdf = new PDF('L');
$pdf->AddPage();

$pdf->AddFont('The-Youngest-Script', '', 'The-Youngest-Script.php');
$pdf->SetFont('The-Youngest-Script', '', '70');
$pdf->Ln(70);
$pdf->Cell(0, 10, utf8_decode($nombreUsuario), 0, 4, 'C');
$pdf->Ln(38);

$pdf->SetFont('Arial', '', 24);
$pdf->Cell(0, 10, utf8_decode($clase), 0, 1, 'C');

// Modo de salida a 'F' para guardar el archivo en el servidor
$pdfPath = 'Certificado.pdf';
$pdf->Output($pdfPath, 'F');


// Dirección de correo electrónico del destinatario
$destinatario = $correo;

// Asunto del correo electrónico
$asunto = 'Certificado';

// Mensaje del correo electrónico
$mensaje = '¡Gracias por tu partipación! Adjunto encontrarás el certificado.';

// Cabeceras del correo electrónico
$cabeceras = "From: CVDR Unidad Tlaxcala - IPN <cec.tlaxcala.ipn@gmail.com>\r\n";
$cabeceras .= "Reply-To: " .$destinatario. "\r\n";
$cabeceras .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$cabeceras .= "MIME-Version: 1.0\r\n";
$cabeceras .= "Content-Type: multipart/mixed; boundary=\"boundary_mail\"\r\n";

// Adjunta el archivo PDF al correo electrónico
$adjunto = chunk_split(base64_encode(file_get_contents($pdfPath)));

// Mensaje del correo electrónico
$mensaje = "--boundary_mail\r\n";
$mensaje .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
$mensaje .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$mensaje .= $mensaje . "\r\n\r\n";
$mensaje .= "--boundary_mail\r\n";
$mensaje .= "Content-Type: application/pdf; name=\"Certificado.pdf\"\r\n";
$mensaje .= "Content-Transfer-Encoding: base64\r\n";
$mensaje .= "Content-Disposition: attachment\r\n\r\n";
$mensaje .= $adjunto . "\r\n";
$mensaje .= "--boundary_mail--";

// Codificación adicional para manejar caracteres especiales
$subject = "=?iso-8859-1?B?" . base64_encode($asunto) . "?=";

// Envía el correo electrónico
mail($destinatario, $subject, $mensaje, $cabeceras);

echo "<script>

        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: '¡Felicidades!',
                text: 'Correo enviado exitosamente',
                confirmButtonText: 'Ok'
                }).then((result)=>{
                if(result.isConfirmed){
                    window.close();
                 }
        });   
        });

    </script>";

?>
