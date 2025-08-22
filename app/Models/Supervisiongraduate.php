<?php

namespace App\Models;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Examcommitteebilling;
use App\Models\Supervisiongraduate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisiongraduate extends Model
{
    use HasFactory;
    protected $table="supervisiongraduates";
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
