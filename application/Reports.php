<?php

class Reports extends FPDF
{
    public function __construct() {
       
                
    }

    function Header()
    {
        // Logo
        $this->Image('C:\xampp\htdocs\xampp\REPORTES\Logo\logo_gobernacion.jpg',10,5,30);
        // Arial bold 15
        $this->SetFont('Arial','B',12);
        // Movernos a la derecha
        $this->Cell(54);
        // Título
        $this->Cell(1,5,utf8_decode('DEPARTAMENTO DE CUNDINAMARCA - SECRETARIA DE SALUD - DIRECCIÓN SALUD PUBLICA'),'C');
        // Salto de línea
        $this->Ln(5);
        $this->Cell(80);
        $this->Cell(3,5,utf8_decode('ATENCION INFANTIL - NIÑOS Y NIÑAS MENORES DE 5 AÑOS - AIEPI'),'C');
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetX(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

    }
}

?>