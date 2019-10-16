<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    /**
     * Variable yang dapat menentukan primaryKey.
     */
    protected $primaryKey = 'id_report';

    /**
     * Variable yang menentukan nama table.
     */
    protected $table = 'tr_reports';

    /**
     * Variable yang mendaftarkan atribut yang bisa di isi.
     * @var array
     */
    protected $fillable = ['name', 'approval', 'brand_id', 'category_id', 'project_id', 'type_id'];

    /**
     * Variable yang menentukan nama relasi table.
     */
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }
    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
    }

}
