<?php

namespace App\Models;

use App\User;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    /**
     * Variable yang dapat menentukan primaryKey.
     */
    protected $primaryKey = 'id_departement';

    /**
     * Variable yang menentukan nama table.
     */
    protected $table = 'tr_departements';

    /**
     * Variable yang mendaftarkan atribut yang bisa di isi.
     * @var array
     */
    protected $fillable = ['location_id', 'name'];

    /**
     * Variable yang menentukan nama relasi table.
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'departement_id');
        return $this->belongsTo(User::class, ['created_by', 'updated_by']);
    }
}
