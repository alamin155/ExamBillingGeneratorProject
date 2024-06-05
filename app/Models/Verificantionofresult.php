<?php

namespace App\Models;
use App\Models\Examcommitteebilling;
use App\Models\Teacher;
use App\Models\Verificantionofresult;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verificantionofresult extends Model
{
    use HasFactory;
    protected $table="verificationofresults";
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
