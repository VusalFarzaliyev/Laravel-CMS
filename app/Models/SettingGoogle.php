<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingGoogle extends Model
{
    protected $table = 'setting_googles';
    protected $fillable = [
        'tracking_id','analytics','client_id','client_secret','firebase','firebase_key'
    ];
    use HasFactory;
}
