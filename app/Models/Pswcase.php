<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pswcase extends Model
{
    use HasFactory;

    protected $table = 'pswcase';
    protected $fillable = ['psw_problem', 'psw_action', 'info'];
    protected $date = ['created_at'];
}
