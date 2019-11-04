<?php

namespace App\Models;

use App\Models\Production;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * Variable yang dapat menentukan primaryKey.
     */
    protected $primaryKey = 'id_brand';

    /**
     * Variable yang menentukan nama table.
     */
    protected $table = 'tr_brands';

    /**
     * Variable yang mendaftarkan atribut yang bisa di isi.
     * @var array
     */
    protected $fillable = [
        'name',
        'production_id', 
        'detail'
    ];

    /**
     * Variable yang menentukan nama relasi table.
     */
    public function production()
    {
        return $this->belongsTo(Production::class, 'production_id');
    }
}
