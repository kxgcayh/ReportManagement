<?php

namespace App\Models;

use App\User;
use App\Models\Brand;
use App\Models\Report;
use App\Models\Production;
use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Compoships;
    /**
     * Variable yang dapat menentukan primaryKey.
     */
    protected $primaryKey = 'id_product';

    /**
     * Variable yang menentukan nama table.
     */
    protected $table = 'tr_products';

    /**
     * Variable yang mendaftarkan atribut yang bisa di isi.
     * @var array
     */
    protected $fillable = [
        'name',
        'detail'
    ];

    /**
     * @relation
     */
    public function productions()
    {
        return $this->belongsTo(Production::class, 'production_id');
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
    public function brands()
    {
        return $this->hasMany(Brand::class);
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
