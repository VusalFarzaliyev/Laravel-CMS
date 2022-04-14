<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMTP extends Model
{
    protected $table = 's_m_t_p_s';
    protected $fillable = [
      'port','host','username','password','encryption','sender_name','sender_email',
    ];
    use HasFactory;
}
