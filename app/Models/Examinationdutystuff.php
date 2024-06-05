<?php

namespace App\Models;
use App\Models\Examcommitteebilling;
use App\Models\Staff;
use App\Models\Examinationdutystuff;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examinationdutystuff extends Model
{
    use HasFactory;
    protected $table="examinationdutystuffs";
    protected $primaryKey="id";
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staf_id');
    }
    public function examcommitteebilling()
    {
        return $this->belongsTo(Examcommitteebilling::class, 'exam_id');
    }
}
