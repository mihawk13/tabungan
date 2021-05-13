<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;

    protected $table = 'tabungan';
    public $timestamps = false;

    protected $fillable = ['saldo', 'siswa_id'];

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id', 'siswa_id');
    }

    public function detail()
    {
        return $this->hasOne(TabunganDetail::class, 'tabungan_id', 'id');
    }
}
