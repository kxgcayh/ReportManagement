<?php

namespace App\Models;

use App\User;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\SoftDeletes;

class Production extends Model
{
    use Compoships, SoftDeletes;
    /**
     * Variable yang dapat menentukan primaryKey.
     */
    protected $primaryKey = 'id_production';

    /**
     * Variable yang menentukan nama table.
     */
    protected $table = 'tr_productions';

    /**
     * Variable yang menentukan SoftDeletes
     */
    protected $dates = ['deleted_at'];

    /**
     * Variable yang mendaftarkan atribut yang bisa di isi.
     * @var array
     */
    protected $fillable = ['name', 'location_id'];

    /**
     * Variable yang menentukan nama relasi table.
     */
    public function locations()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
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
