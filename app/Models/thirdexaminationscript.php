<?php

namespace App\Models;
use App\Models\Courses;
use App\Models\Teacher;
use App\Models\Questionpaperinternal;
use App\Models\Questionpapersetterexternal;
use App\Models\Examcommitteebilling;
use App\Models\Examininganswerscript;
use App\Models\thirdexaminationscript;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thirdexaminationscript extends Model
{
    use HasFactory;
    protected $table="thirdexaminationscripts";
    protected $primaryKey="id";
    public function course()
    {
        return $this->belongsTo(Courses::class,'cous_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'tech_id');
    }
    public function examcommitteebilling()
    {
        return $this->belongsTo(Examcommitteebilling::class,'exam_id');
    }
}
