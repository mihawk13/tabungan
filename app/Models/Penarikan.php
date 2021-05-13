<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penarikan extends Model
{
    use HasFactory;

    protected $table = 'penarikan';
    public $timestamps = false;

    protected $fillable = ['tanggal', 'saldo_awal', 'jml_tarik', 'tabungan_id', 'user_id'];

    public function tabungan()
    {
        return $this->hasOne(Tabungan::class, 'id', 'tabungan_id');
    }

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'user_id', 'user_id');
    }
}
