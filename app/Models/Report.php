<?php

namespace App\Models;

use App\User;
use App\Models\Type;
use App\Models\Brand;
use App\Models\Project;
use App\Models\Machine;
use App\Models\Product;
use App\Models\Category;
use App\Models\Production;
use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use Compoships, SoftDeletes;
    /**
     * Variable yang dapat menentukan primaryKey.
     */
    protected $primaryKey = 'id_report';

    /**
     * Variable yang menentukan nama table.
     */
    protected $table = 'tr_reports';

    /**
     * Variable yang menentukan SoftDeletes
     */
    protected $dates = ['deleted_at'];

    /**
     * Variable yang mendaftarkan atribut yang bisa di isi.
     * @var array
     */
    protected $fillable = [
        'brand_id', 'category_id', 'machine_id', 'production_id',
        'product_id', 'project_id', 'type_id', 'name', 'file'
    ];

    /**
     * Variable yang menentukan nama relasi table.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function production()
    {
        return $this->belongsTo(Production::class, 'production_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    public function machine()
    {
        return $this->belongsTo(Machine::class, 'machine_id');
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
