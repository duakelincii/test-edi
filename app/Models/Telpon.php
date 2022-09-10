<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telpon extends Model
{
    use HasFactory;
    protected $table = 'telpon_data';
    protected $fillable = ['id_entry','nomor_telpon'];

    public function data()
    {
        $this->belongsTo(Entrydata::class,'id_entry');
    }
}
