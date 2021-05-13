<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabunganDetail extends Model
{
    use HasFactory;

    protected $table = 'tabungan_detail';

    protected $fillable = ['tanggal', 'jumlah', 'tabungan_id', 'user_id'];

    public function tabungan()
    {
        return $this->hasOne(Tabungan::class, 'id', 'tabungan_id');
    }

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'user_id', 'user_id');
    }
}
