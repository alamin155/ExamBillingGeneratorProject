<?php

namespace App\Models;
use App\Models\Laboratoryexamlabattendantlabtechnician;
use App\Models\Courses;
use App\Models\Examcommitteebilling;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratoryexamlabattendantlabtechnician extends Model
{
    use HasFactory;
    protected $table="laboratoryexamlabattendantlabtechnicians";
    protected $primaryKey="id";
    public function course()
    {
        return $this->belongsTo(Courses::class,'cous_id');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staf_id');
    }
    public function examcommitteebilling()
    {
        return $this->belongsTo(Examcommitteebilling::class,'exam_id');
    }
}
