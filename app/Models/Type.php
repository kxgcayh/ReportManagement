<?php

namespace App\Models;

use App\User;
use App\Models\Report;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * Variable yang menentukan primaryKey.
     */
    protected $primaryKey = 'id_type';

    /**
     * Variable yang menentukan nama table.
     */
    protected $table = 'ms_types';

    /**
     * Variable yang mendaftarkan atribut yang bisa di isi.
     * @var array
     */
    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsToMany(User::class, 'created_by', 'updated_by');
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'type_id');
    }
}
