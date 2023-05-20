<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primarykey = 'Nim';

    // protected $fillable = [
    //     'Nim',
    //     'Nama',
    //     'kelas_id',
    //     'Jurusan',
    //     'No_Handphone',
    //     'Email',
    //     'Tanggal_lahir',
    // ];
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
