<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Penarikan;

class PDF_Penarikan extends Controller
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
        $this->pdf->Cell(30, 7, 'Tanggal', 1, 0, 'C');
        $this->pdf->Cell(15, 7, 'Kelas', 1, 0, 'C');
        $this->pdf->Cell(50, 7, 'Nama Siswa', 1, 0, 'C');
        $this->pdf->Cell(25, 7, 'Saldo Awal', 1, 0, 'C');
        $this->pdf->Cell(30, 7, 'Jml Penarikan', 1, 0, 'C');
        $this->pdf->Cell(30, 7, 'Saldo Akhir', 1, 0, 'C');
        $this->pdf->ln(0);

        $this->pdf->SetFont('Arial', '', 10);
        $no = 1;

        $penarikan = Penarikan::whereBetWeen('tanggal', [$tglAwal, $tglAkhir])->get();
        foreach ($penarikan as $pnr) {
            $this->pdf->ln(7);
            $this->pdf->Cell(10, 7, $no++, 1, 0, 'C');
            $this->pdf->Cell(30, 7, \Carbon\Carbon::parse($pnr->tanggal)->translatedFormat('d M Y'), 1, 0, 'C');
            $this->pdf->Cell(15, 7, $pnr->tabungan->siswa->kelas->kelas, 1, 0, 'C');
            $this->pdf->Cell(50, 7, $pnr->tabungan->siswa->nama, 1, 0, 'C');
            $this->pdf->Cell(25, 7, number_format($pnr->saldo_awal), 1, 0, 'C');
            $this->pdf->Cell(30, 7, number_format($pnr->jml_tarik), 1, 0, 'C');
            $this->pdf->Cell(30, 7, number_format($pnr->saldo_awal - $pnr->jml_tarik), 1, 0, 'C');
            $this->pdf->ln(0);
        }

        $this->pdf->Output("Penarikan.pdf", "I");
    }
}
