<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrydata extends Model
{
    use HasFactory;
    protected $table = 'entrydata';
    protected $fillable = [
                            'id',
                            'nama',
                            'nik',
                            'birthday',
                            'jk',
                            'agama',
                            'status',
                            'goldar',
                            'ex_salary',
                            'emergency_call',
                            'pic_profile'
                        ];
    protected $dates = ['birthday'];

    //relasi data pendidikan
    public function pendidikan()
    {
        $this->belongsToMany(Pendidikan::class,'pendidikan_data','id_entry','id_pendidikan')->withTimestamps();
    }

    //relasi data pekerjaan terakhir
    public function company()
    {
        $this->belongsTo(Historycompany::class,'id_entry');
    }

    //relasi nomor telpon
    public function telpon()
    {
        $this->hasOne(Telpon::class,'id_entry');
    }

}
