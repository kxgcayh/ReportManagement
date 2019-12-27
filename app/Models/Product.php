<?php

namespace App\Models;

use App\User;
use App\Models\Report;
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
}
