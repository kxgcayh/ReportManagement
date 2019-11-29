<?php

namespace App\Models;

use App\User;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    /**
     * Variable yang dapat menentukan primaryKey.
     */
    protected $primaryKey = 'id_production';

    /**
     * Variable yang menentukan nama table.
     */
    protected $table = 'tr_productions';

    /**
     * Variable yang mendaftarkan atribut yang bisa di isi.
     * @var array
     */
    protected $fillable = ['name', 'location_id'];

    /**
     * Variable yang menentukan nama relasi table.
     */
    public function location()
    {
        return $this->belongsToMany(Location::class, 'location_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'created_by', 'updated_by');
    }
}
