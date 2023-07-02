<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembimbingModel extends Model
{
   use HasFactory;

   protected $table = "pembimbing";

   protected $primaryKey = "id_pembimbing";

   protected $fillable = ['id_pembimbing', 'nama_pembimbing', 'nama_dinas', 'jabatan'];
    
}
