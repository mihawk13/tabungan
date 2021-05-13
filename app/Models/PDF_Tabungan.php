<?php

namespace App\Models;

use Codedge\Fpdf\Fpdf\Fpdf;

class PDF_Tabungan extends Fpdf
{
    public function Header()
    {

        $this->Image(public_path() . '/assets/dist/img/tutwuri.png', 9, 8, 22);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(185, 0, 'SDN 1 PENJANGKA', 0, 0, 'C');
        $this->ln(10);
        $this->Cell(185, 0, 'LAPORAN TABUNGAN',0, 0, 'C');
        $this->ln(10);
    }

    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
