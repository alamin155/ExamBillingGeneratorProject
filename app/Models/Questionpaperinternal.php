<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Courses;
use App\Models\Teacher;
use App\Models\Questionpaperinternal;
use App\Models\Examininganswerscript;
use App\Models\Questionpapersetterexternal;
use App\Models\Examcommitteebilling;
class Questionpaperinternal extends Model
{
    use HasFactory;
    protected $table="questionpaperinternals";
    protected $primaryKey="id";
    protected $fillable = [
        'course_code', 'teacher_name', 'address', 'designation', 'department_name','name'
    ];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'tech_id');
    }
    public function course()
    {
        return $this->belongsTo(Courses::class,'cous_id');
    }
    public function examininganswerscript()
    {
        return $this->hasMany(Examininganswerscript::class, 'internal_id');
    }


    public function questionpapersetterexternal()
    {
        return $this->belongsToMany(Questionpapersetterexternal::class,'examininganswerscripts','internal_id','external_id','cous_id');
    }
    public function examcommitteebilling()
    {
        return $this->belongsTo(Examcommitteebilling::class,'exam_id');
    }
    



    
}
