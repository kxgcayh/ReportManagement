<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    /**
     * Variable yang dapat menentukan primaryKey.
     */
    protected $primaryKey = 'id_machine';

    /**
     * Variable yang menentukan nama table.
     */
    protected $table = 'ms_machines';

    /**
     * Variable yang mendaftarkan atribut yang bisa di isi.
     * @var array
     */
    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsToMany(User::class, 'created_by', 'updated_by');
    }
}
