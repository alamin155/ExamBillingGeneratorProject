<?php

namespace App\Models;
use App\Models\Department;
use App\Models\Staff;
use App\Models\Laboratoryexamlabattendantlabtechnician;
use App\Models\Courses;
use App\Models\Examinationdutystuff;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table="staffs";
    protected $primaryKey="id";
    public function department()
    {
        return $this->belongsTo(Department::class,'dept_id','id');
    }
    public function laboratoryexamlabattendantlabtechnician()
    {
        return $this->hasMany(Laboratoryexamlabattendantlabtechnician::class,'staff_id');
    }
    public function examinationdutystuff()
    {
        return $this->hasMany(Examinationdutystuff::class,'staf_id');
    }
}
