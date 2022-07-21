<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iplist extends Model
{
    use HasFactory;

    protected $table = 'iplist';
    protected $fillable = ['psw_servername', 'psw_ip', 'created_at'];
    // protected $date = ['created_at'];
}
