<?php

namespace App\Models;

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
}
