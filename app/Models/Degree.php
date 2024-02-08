<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Examcommitteebilling;

class Degree extends Model
{
    use HasFactory;
    protected $table="degrees";
    protected $primaryKey="id";
    protected $fillable=['deg_id','degree_name'];

    public function Examcommitteebilling()
    {
        return $this->hasMany(Examcommitteebilling::class,'deg_id');
    }
   

}
