<?php

namespace App\Models;

use App\User;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Project;
use App\Models\Type;
use App\Models\Report;
use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Model;

class ReportRevision extends Model
{
    use Compoships;
    /**
     * Variable yang dapat menentukan primaryKey.
     */
    protected $primaryKey = 'id_report_rev';

    /**
     * Variable yang menentukan nama table.
     */
    protected $table = 'tr_report_revs';

    /**
     * Variable yang mendaftarkan atribut yang bisa di isi.
     * @var array
     */
    protected $fillable = ['report_id', 'file', 'brand_id', 'category_id', 'project_id', 'type_id', 'name'];

    /**
     * Variable yang menentukan nama relasi table.
     */
    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
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
