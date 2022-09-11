<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanData extends Model
{
    use HasFactory;
    protected $table = 'pendidikan_data';
    protected $fillable = ['id_entry','id_pendidikan','nama_pendidikan','nilai','tgl_lulus','jurusan'];
    protected $primary =['id_entry','id_pendidikan'];

    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class,'id_pendidikan');
    }
}
