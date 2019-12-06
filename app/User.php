<?php

namespace App;

use App\Models\Type;
use App\Models\Brand;
use App\Models\Report;
use App\Models\Machine;
use App\Models\Project;
use App\Models\Location;
use App\Models\Category;
use App\Models\Production;
use App\Models\Departement;
use App\Models\ReportRevision;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Awobaz\Compoships\Compoships;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, Compoships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'departement_id',
        'password',
    ];
    protected $table = 'tr_users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function departements()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }

    public function category()
    {
        // return $this->hasMany(Category::class, ['created_by', 'updated_by']);
    }

    public function brand()
    {
        // return $this->hasMany(Brand::class, ['created_by', 'updated_by']);
    }

    public function location()
    {
        // return $this->hasMany(Location::class, ['created_by', 'updated_by']);
    }

    public function machine()
    {
        // return $this->hasMany(Machine::class, ['created_by', 'updated_by']);
    }

    public function production()
    {
        // return $this->hasMany(Production::class, ['created_by', 'updated_by']);
    }

    public function project()
    {
        // return $this->hasMany(Project::class, ['created_by', 'updated_by']);
    }

    public function report()
    {
        // return $this->hasMany(Report::class, ['created_by', 'updated_by']);
    }

    public function reportRev()
    {
        // return $this->hasMany(ReportRevision::class, ['created_by', 'updated_by']);
    }

    public function type()
    {
        // return $this->hasMany(Type::class, ['created_by', 'updated_by']);
    }
}
