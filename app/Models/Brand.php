<?php

namespace App\Models;

use App\User;
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
        'detail'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, ['created_by', 'updated_by']);
    }
}
