<?php

namespace App\Models;

use App\User;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use Compoships, SoftDeletes;
    /**
     * Variable yang dapat menentukan primaryKey.
     */
    protected $primaryKey = 'id_location';

    /**
     * Variable yang menentukan nama table.
     */
    protected $table = 'ms_locations';

    /**
     * Variable yang menentukan SoftDeletes
     */
    protected $dates = ['deleted_at'];

    /**
     * Variable yang mendaftarkan atribut yang bisa di isi.
     * @var array
     */
    protected $fillable = ['name', 'description'];

    public function departement()
    {
        return $this->hasMany(Departement::class, 'location_id');
    }

    public function production()
    {
        return $this->hasMany(Production::class, 'location_id');
    }

    /**
     * Relation to User Model;
     * @var array
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
