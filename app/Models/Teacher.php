<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\Committee;
use App\Models\Questionpaperinternal;
use App\Models\Examininganswerscript; 

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
    public function questionpaperinternal()
    {
        return $this->hasMany(Questionpaperinternal::class,'tech_id');
    }
    public function examininganswerscript()
    {
        return $this->hasMany(Examininganswerscript::class,'tech_id');
    }
}
