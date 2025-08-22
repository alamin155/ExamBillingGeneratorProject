<?php

namespace App\Models;
use App\Models\Examcommitteebilling;
use App\Models\Teacher;
use App\Models\Presentation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    use HasFactory;
    protected $table="presentations";
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
