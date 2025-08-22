<?php

namespace App\Models;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Examcommitteebilling;
use App\Models\Supervisionpostgraduate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisionpostgraduate extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table="supervisionpostgraduates";
    protected $primaryKey="id";
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'tech_id');
    }
    public function examcommitteebilling()
    {
        return $this->belongsTo(Examcommitteebilling::class, 'exam_id');
    }
}
