<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Degree;
use App\Models\Examcommitteebilling;
use App\Models\Committee;
use App\Models\Questionpaperinternal;
use App\Models\Questionpapersetterexternal;
class Examcommitteebilling extends Model
{
    use HasFactory;
    protected $table="exambillings";
    protected $primaryKey="id";

    public function department()
    {
        return $this->belongsTo(Department::class,'dept_id');
    }
    public function degree()
    {
        return $this->belongsTo(Degree::class,'deg_id');
    }
    public function committee()
    {
        return $this->hasone(Committee::class,'exam_id');
    }
    public function questionpaperinternal()
    {
        return $this->hasMany(Questionpaperinternal::class,'exam_id');
    }
    public function questionpapersetterexternal()
    {
        return $this->hasMany(Questionpapersetterexternal::class,'exam_id');
    }
}
