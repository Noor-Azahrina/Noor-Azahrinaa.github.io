<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiModel extends Model
{
   use HasFactory;

   protected $table = "absensi";

   protected $primaryKey = "nis";

   protected $fillable = ['nis', 'nama', 'asal_sekolah', 'dinas', 'tanggal', 'alasan'];
    
}
