<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mahasiswa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'Nim';

    // protected $fillable = [
    //     'Nim',
    //     'Nama',
    //     'foto',
    //     'kelas_id',
    //     'Jurusan',
    //     'No_Handphone',
    //     'Email',
    //     'Tanggal_lahir',
    // ];
    protected $guarded = [''];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function matakuliah(): BelongsToMany
    {
        return $this->belongsToMany(Matakuliah::class, 'mahasiswa_matakuliah', 'mahasiswas_nim', 'matakuliahs_id')->withPivot('nilai');
    }

    public function getRouteKeyName()
    {
        return 'Nim';
    }
}
