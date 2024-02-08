<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Externalteacher;
use App\Models\Examininganswerscript;
use App\Models\Questionpapersetterexternal;

class Externalteacher extends Model
{
    use HasFactory;
    protected $table="externalteachers";
    protected $primaryKey="id";
    protected $fillable = [
        'course_code', 'name', 'address', 'designation', 'department_name','etech_id'
    ];
    
    public function department()
    {
        return $this->belongsTo(Department::class,'dept_id');
    }
    public function questionpapersetterexternal()
    {
        return $this->hasMany(Questionpapersetterexternal::class,'etech_id');
    }
    public function examininganswerscript()
    {
        return $this->hasMany(Examininganswerscript::class,'etech_id');
    }
}
