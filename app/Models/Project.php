<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * Variable yang dapat menentukan primaryKey.
     */
    protected $primaryKey = 'id_project';

    /**
     * Variable yang menentukan nama table.
     */
    protected $table = 'ms_projects';

    /**
     * Variable yang mendaftarkan atribut yang bisa di isi.
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'created_by', 'updated_by');
    }
}
