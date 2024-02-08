<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Courses;
use App\Models\Externalteacher;
use App\Models\Questionpapersetterexternal;
use App\Models\Examininganswerscript;
use App\Models\Questionpaperinternal;
use App\Models\Examcommitteebilling;

class Questionpapersetterexternal extends Model
{
    use HasFactory;
    protected $table="questionpapersetterexternals";
    protected $primaryKey="id";
    protected $fillable = [
        'course_code', 'name', 'address', 'designation', 'department_name','etech_id'
    ];
    public function externalteacher()
    {
        return $this->belongsTo(Externalteacher::class,'etech_id');
    }
    public function course()
    {
        return $this->belongsTo(Courses::class,'cous_id');
    }
    public function examininganswerscript()
    {
        return $this->hasMany(Examininganswerscript::class, 'external_id');
    }

    public function questionpaperinternal()
    {
        return $this->belongsToMany(Questionpaperinternal::class,'examininganswerscripts','internal_id','external_id','cous_id');
    }
    public function examcommitteebilling()
    {
        return $this->belongsTo(Examcommitteebilling::class,'exam_id');
    }
}
