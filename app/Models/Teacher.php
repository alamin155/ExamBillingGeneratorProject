<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\Committee;
use App\Models\ModerationModel;
use App\Models\Questionpaperinternal;
use App\Models\Questionpapersetterexternal;
use App\Models\Examininganswerscript;
use App\Models\Examinationdutyteacher; 
use App\Models\Questiontypingpublishing;
use App\Models\Scrutinize;
use App\Models\Tabulation;
use App\Models\Verificantionofresult;
use App\Models\laboratoryexamteacher;
use App\Models\classtest;
use App\Models\thirdexaminationscript;
use App\Models\Oralexamination;
use App\Models\Supervisiongraduate;
use App\Models\Supervisionpostgraduate;
use App\Models\Supervisionmphilphd;
use App\Models\Thesisevaluation;
use App\Models\Presentation;
class Teacher extends Model
{
    use HasFactory;
    protected $table="teachers";
    protected $primaryKey="id";
    public function department()
    {
        return $this->belongsTo(Department::class,'dept_id','id');
    }
    public function committee()
    {
        return $this->hasMany(Committee::class,'tech_id');
    }
    public function moderation()
    {
        return $this->hasMany(ModerationModel::class,'tech_id');
    }
    public function questionpaperinternal()
    {
        return $this->hasMany(Questionpaperinternal::class,'tech_id');
    }
    public function questionpapersetterexternal()
    {
        return $this->hasMany(Questionpapersetterexternal::class,'tech_id');
    }
    public function examininganswerscript()
    {
        return $this->hasMany(Examininganswerscript::class,'tech_id');
    }
    public function examinationdutyteacher()
    {
        return $this->hasMany(Examinationdutyteacher::class,'tech_id');
    }
    public function questiontypingpublishing()
    {
        return $this->hasMany(Questiontypingpublishing::class,'tech_id');
    }
    public function scrutinize()
    {
        return $this->hasMany(Scrutinize::class,'tech_id');
    }
    public function oralexamination()
    {
        return $this->hasMany(Oralexamination::class,'tech_id');
    }
    public function supervisiongraduate()
    {
        return $this->hasMany(Supervisiongraduate::class,'tech_id');
    }
    public function supervisionpostgraduate()
    {
        return $this->hasMany(Supervisionpostgraduate::class,'tech_id');
    }
    public function supervisionmphilphd()
    {
        return $this->hasMany(Supervisionmphilphd::class,'tech_id');
    }
    public function thesisevaluation()
    {
        return $this->hasMany(Thesisevaluation::class,'tech_id');
    }
    public function presentation ()
    {
        return $this->hasMany(Presentation::class,'tech_id');
    }
    public function tabulation()
    {
        return $this->hasMany(Tabulation::class,'tech_id');
    }
    public function verificantionofresult()
    {
        return $this->hasMany(Verificantionofresult::class,'tech_id');
    }
    public function laboratoryexamteacher()
    {
        return $this->hasMany(Laboratoryexamteacher::class,'tech_id');
    }
    public function classtest()
    {
        return $this->hasMany(classtest::class,'internal_id');
    }
    public function thirdexaminationscript()
    {
        return $this->hasMany(thirdexaminationscript::class,'tech_id');
    }
}
