<?php

namespace App\Models;
use App\Models\Examcommitteebilling;
use App\Models\Rateofremunerationforexaminationwork;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rateofremunerationforexaminationwork extends Model
{
    use HasFactory;
    protected $table="rateofremunerationforexaminationworks";
    protected $primaryKey="id";
    public function examcommitteebilling()
    {
        return $this->belongsTo(Examcommitteebilling::class, 'exam_id');
    }
}
