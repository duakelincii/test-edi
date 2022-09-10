<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $table = 'alamat_data';
    protected $fillable = ['id_entry','alamat_ktp','alamat_dom','created_at','updated_at'];

    public function data()
    {
        $this->belongsTo(Entrydata::class,'id_entry');
    }
}
