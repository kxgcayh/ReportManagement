<?php

namespace App\Models;

use App\User;
use App\Models\Report;
use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Compoships;
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
        'detail'
    ];

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

    public function reports()
    {
        return $this->hasMany(Report::class, 'brand_id');
    }
}
