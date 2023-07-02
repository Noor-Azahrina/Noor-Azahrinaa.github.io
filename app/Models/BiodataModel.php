<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataModel extends Model
{
   use HasFactory;

   protected $table = "biodata_siswa";

   protected $primaryKey = "nis_siswa";

   protected $fillable = ['nis_siswa', 'nama_siswa', 'jenis_kelamin', 'alamat'];
    
}
