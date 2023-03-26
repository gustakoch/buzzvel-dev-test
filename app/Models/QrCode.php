<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;
    protected $table = 'qrcodes';
    protected $fillable = [
        'qrcode',
        'name',
        'slug',
        'linkedin',
        'github'
    ];
}
