<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entrydata extends Model
{
    use HasFactory;
    protected $table = 'entrydata';

    protected $fillable = [
                            'id',
                            'name',
                            'position',
                            'nik',
                            'birthday',
                            'jk',
                            'agama',
                            'status',
                            'goldar',
                            'ex_salary',
                            'emergency_call',
                            'pic_profile',
                            'user_id',
                            'penempatan',
                        ];
    protected $dates = ['birthday'];

    public function alamat()
    {
        return $this->hasOne(Alamat::class,'id_entry');
    }

    public function user()
    {
        return $this->BelongsTo(User::class,'user_id');
    }

    public function phone()
    {
        return $this->hasOne(Telpon::class,'id_entry');
    }

    public function didikan()
    {
        return $this->hasOne(Pendidikan::class,PendidikanData::class,'id_entry','id_pendidikan')->latestOfMany();
    }

    public function pendidikandata()
    {
        return $this->belongsTo(PendidikanData::class,'id','id_entry');
    }


}
