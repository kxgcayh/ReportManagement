<?php

namespace App\Models;

use App\User;
use App\Models\Report;
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
        return $this->belongsTo(User::class, 'created_by', 'updated_by');
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'project_id');
    }
}
