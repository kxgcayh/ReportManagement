<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Variable yang dapat menentukan primaryKey.
     */
    protected $primaryKey = 'id_category';

    /**
     * Variable yang menentukan nama table.
     */
    protected $table = 'ms_categories';

    /**
     * Variable yang mendaftarkan atribut yang bisa di isi.
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Relasi oneToMany
     * @var array
     */
    public function user()
    {
        return $this->belongsTo(User::class, ['created_by', 'updated_by']);
    }
}
