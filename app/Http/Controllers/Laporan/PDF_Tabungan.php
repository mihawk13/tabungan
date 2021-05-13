<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\TabunganDetail;

class PDF_Tabungan extends Controller
{
    protected $pdf;

    public function __construct(\App\Models\PDF_Tabungan $fpdf)
    {
        $this->pdf = $fpdf;
    }

    public function pdf($tglAwal, $tglAkhir)
    {
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(185, 0, 'Dari Tanggal: ' . \Carbon\Carbon::parse($tglAwal)->translatedFormat('d M Y') . ' - ' . \Carbon\Carbon::parse($tglAkhir)->translatedFormat('d M Y'), 0, 0, 'C');

        $this->pdf->ln(10);
        $this->pdf->Cell(10, 7, 'No', 1, 0, 'C');
        $this->pdf->Cell(35, 7, 'Tanggal', 1, 0, 'C');
        $this->pdf->Cell(20, 7, 'Kelas', 1, 0, 'C');
        $this->pdf->Cell(80, 7, 'Nama Siswa', 1, 0, 'C');
        $this->pdf->Cell(40, 7, 'Jumlah Tabungan', 1, 0, 'C');
        $this->pdf->ln(0);

        $this->pdf->SetFont('Arial', '', 10);
        $no = 1;

        $tabungan = TabunganDetail::whereBetWeen('tanggal', [$tglAwal, $tglAkhir])->get();
        foreach ($tabungan as $tbg) {
            $this->pdf->ln(7);
            $this->pdf->Cell(10, 7, $no++, 1, 0, 'C');
            $this->pdf->Cell(35, 7, \Carbon\Carbon::parse($tbg->tanggal)->translatedFormat('d M Y'), 1, 0, 'C');
            $this->pdf->Cell(20, 7, $tbg->tabungan->siswa->kelas->kelas, 1, 0, 'C');
            $this->pdf->Cell(80, 7, $tbg->tabungan->siswa->nama, 1, 0, 'C');
            $this->pdf->Cell(40, 7, number_format($tbg->jumlah), 1, 0, 'C');
            $this->pdf->ln(0);
        }

        $this->pdf->Output("Tabungan.pdf", "I");
    }
}
