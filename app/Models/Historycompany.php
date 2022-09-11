<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historycompany extends Model
{
    use HasFactory;
    protected $table = 'company_history';
    protected $fillable = ['id_entry','company_name','last_position','last_salary','tgl_exit','created_at','updated_at'];

}
