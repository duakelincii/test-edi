<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $table = 'pendidikan';
    protected $fillable = ['nama'];

    public function data()
    {
        $this->belongsToMany(Entrydata::class,'pendidikan_data','id_entry','id_pendidikan');
    }
}
