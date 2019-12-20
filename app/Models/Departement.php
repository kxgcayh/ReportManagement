<?php

namespace App\Models;

use App\User;
use App\Models\Location;
use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Model;


class Departement extends Model
{
    use Compoships;
    /**
     * @primaryKey
     */
    protected $primaryKey = 'id_departement';

    /**
     * @table
     */
    protected $table = 'tr_departements';

    /**
     *
     * @var array
     */
    protected $fillable = ['location_id', 'name'];

    /**
     * @relation
     */
    public function locations()
    {
        return $this->belongsTo(Location::class, 'location_id');
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
