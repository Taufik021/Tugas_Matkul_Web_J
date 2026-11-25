<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    // TODO 2: Menentukan kolom nama dan deskripsi yang dapat diisi melalui model.
    protected $fillable = [
        'nama',
        'deskripsi',
    ];
}
