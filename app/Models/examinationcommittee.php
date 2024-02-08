<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\examinationcommittees;

class examinationcommittee extends Model
{
    use HasFactory;
    protected $table="examinationcommittees";
    protected $primaryKey="examinationcommittee_id";
}
