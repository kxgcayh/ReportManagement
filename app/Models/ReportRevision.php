<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Report;
use App\User;

class ReportRevision extends Model
{
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
    protected $fillable = ['name', 'report_id'];

    /**
     * Variable yang menentukan nama relasi table.
     */
    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'created_by', 'updated_by');
    }
}
