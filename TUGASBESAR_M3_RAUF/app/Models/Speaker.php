<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;
    protected $table = 'speakers';
    
    // kolom yg boleh diisi 
    protected $fillable = ['nama', 'keahlian', 'institusi', 'portofolio'];   

    public $timestamps = false;
}
