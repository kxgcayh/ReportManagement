<?php

namespace App\Models;

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
        return $this->belongsTo(Location::class, 'location_id');
    }    
}
