<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Committee;

class Remark extends Model
{
    use HasFactory;
    protected $table="remarks";
    protected $primaryKey="id";
    public function remark()
    {
        return $this->hasMany(Committee::class,'remk_id');
    }
}
