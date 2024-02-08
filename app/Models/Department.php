<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\Examcommitteebilling;
use App\Models\Externalteacher;

class Department extends Model
{
    use HasFactory;
    protected $table="departments";
    protected $primaryKey="id";
    protected $fillable=['department_name'];
    public function Teacher()
    {
        return $this->hasOne(Teacher::class,'dept_id','id');
    }
    public function externalteacher()
    {
        return $this->hasOne(Externalteacher::class,'dept_id','id');
    }
    public function Examcommitteebilling()
    {
        return $this->hasMany(Examcommitteebilling::class,'dept_id');
    }
}
