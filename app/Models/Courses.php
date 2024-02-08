<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Questionpaperinternal;
use App\Models\Questionpapersetterexternal;
use App\Models\Examininganswerscript;
use App\Models\Courses;


class Courses extends Model
{
    use HasFactory;
    protected $table="courses";
    protected $primaryKey="id";
    protected $fillable = [
        'course_code', 'teacher_name', 'address', 'designation','cous_id', 'department_name','name'];
    public function questionpaperinternal()
    {
        return $this->hasMany(Questionpaperinternal::class,'cous_id');
    }
    public function questionpapersetterexternal()
    {
        return $this->hasMany(Questionpapersetterexternal::class,'cous_id');
    }
    public function examininganswerscript()
    {
        return $this->hasMany(Examininganswerscript::class,'cous_id');
    }

    
    
}
