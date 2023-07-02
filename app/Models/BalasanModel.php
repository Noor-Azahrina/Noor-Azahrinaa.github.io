<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalasanModel extends Model
{
   use HasFactory;

   protected $table = "balasan";

   protected $primaryKey = "nis_siswa";

   protected $fillable = ['nis_siswa', 'nama_siswa', 'nama_pembimbing', 'dinas', 'balasan'];
    
}
