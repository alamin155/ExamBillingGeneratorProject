<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Courses;
use App\Models\Externalteacher;
use App\Models\Teacher;
use App\Models\Questionpapersetterexternal;
use App\Models\Questionpaperinternal;
use App\Models\Examcommitteebilling;
use App\Models\Examininganswerscript;

class Questionpapersetterexternal extends Model
{
    use HasFactory;
    protected $table="questionpapersetterexternals";
    protected $primaryKey="id";
    protected $fillable = [
        'course_code', 'name', 'address', 'designation', 'department_name','tech_id'
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
        return $this->hasMany(Examininganswerscript::class,'external_id');
    }

    
    public function examcommitteebilling()
    {
        return $this->belongsTo(Examcommitteebilling::class,'exam_id');
    }
}
