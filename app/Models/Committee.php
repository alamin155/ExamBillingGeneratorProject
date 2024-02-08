<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Remark;
use App\Models\Examcommitteebilling;

class Committee extends Model
{
    use HasFactory;
    protected $table="committees";
    protected $primaryKey="id";
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'tech_id');
    }
    public function remark()
    {
        return $this->belongsTo(Remark::class,'remk_id');
    }
    public function examcommitteebilling()
    {
        return $this->belongsTo(Examcommitteebilling::class,'exam_id');
    }
}
