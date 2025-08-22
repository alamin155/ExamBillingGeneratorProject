<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Degree;
use App\Models\Examcommitteebilling;
use App\Models\Committee;
use App\Models\ModerationModel;
use App\Models\Questionpaperinternal;
use App\Models\Questionpapersetterexternal;
use App\Models\Examininganswerscript;
use App\Models\thirdexaminationscript;
use App\Models\Laboratoryexamteacher;
use App\Models\classtest;
use App\Models\Laboratoryexamlabattendantlabtechnician;
use App\Models\Courses;
use App\Models\Staff;
use App\Models\Examinationdutystuff;
use App\Models\Examinationdutyteacher;
use App\Models\Questiontypingpublishing;
use App\Models\Scrutinize;
use App\Models\Tabulation;
use App\Models\Verificantionofresult;
use App\Models\Oralexamination;
use App\Models\Supervisiongraduate;
use App\Models\Supervisionpostgraduate;
use App\Models\Supervisionmphilphd;
use App\Models\Thesisevaluation;
use App\Models\Presentation;
use App\Models\Teacher;
use App\Models\Rateofremunerationforexaminationwork;
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
    public function moderation()
    {
        return $this->hasMany(ModerationModel::class,'exam_id');
    }
    public function questionpaperinternal()
    {
        return $this->hasOne(Questionpaperinternal::class,'exam_id');
    }
    public function questionpapersetterexternal()
    {
        return $this->hasMany(Questionpapersetterexternal::class,'exam_id');
    }
    public function examininganswerscript()
    {
        return $this->hasMany(Examininganswerscript::class,'exam_id');
    }
    public function thirdexaminationscript()
    {
        return $this->hasMany(thirdexaminationscript::class,'exam_id');
    }
    public function laboratoryexamteacher()
    {
        return $this->hasMany(Laboratoryexamteacher::class,'exam_id');
    }
    public function classtest()
    {
        return $this->hasMany(classtest::class,'exam_id');
    }
    public function laboratoryexamlabattendantlabtechnician()
    {
        return $this->hasMany(Laboratoryexamlabattendantlabtechnician::class,'exam_id');
    }
    public function examinationdutystuff()
    {
        return $this->hasMany(Examinationdutystuff::class,'exam_id');
    }
    public function examinationdutyteacher()
    {
        return $this->hasMany(Examinationdutyteacher::class,'exam_id');
    }
    public function questiontypingpublishing()
    {
        return $this->hasMany(Questiontypingpublishing::class,'exam_id');
    }
    public function scrutinize()
    {
        return $this->hasMany(Scrutinize::class,'exam_id');
    }
    public function oralexamination()
    {
        return $this->hasMany(Oralexamination::class,'exam_id');
    }
    public function supervisiongraduate()
    {
        return $this->hasMany(Supervisiongraduate::class,'exam_id');
    }
    public function supervisionpostgraduate()
    {
        return $this->hasMany(Supervisionpostgraduate::class,'exam_id');
    }
    public function supervisionmphilphd()
    {
        return $this->hasMany(Supervisionmphilphd::class,'exam_id');
    }
    public function thesisevaluation()
    {
        return $this->hasMany(Thesisevaluation::class,'exam_id');
    }
    public function presentation()
    {
        return $this->hasMany(Presentation::class,'exam_id');
    }
     public function rateofremunerationforexaminationwork()
    {
        return $this->hasMany(Rateofremunerationforexaminationwork::class,'exam_id');
    }
    public function tabulation()
    {
        return $this->hasMany(Tabulation::class,'exam_id');
    }
    public function verificantionofresult()
    {
        return $this->hasMany(Verificantionofresult::class,'exam_id');
    }

}
