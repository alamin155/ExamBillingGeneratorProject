<?php

namespace App\Models;
use App\Models\Prepared;
use App\Models\Examcommitteebilling;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prepared extends Model
{
    use HasFactory;
    protected $table="prepareds";
    protected $primaryKey="id";
    public function examcommitteebilling()
    {
        return $this->belongsTo(Examcommitteebilling::class,'exam_id');
    }
}
