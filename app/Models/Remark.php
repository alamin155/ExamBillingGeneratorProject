<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Committee;
use App\Models\ModerationModel;

class Remark extends Model
{
    use HasFactory;
    protected $table="remarks";
    protected $primaryKey="id";
    public function remark()
    {
        return $this->hasMany(Committee::class,'remk_id');
    }
    public function moderation()
    {
        return $this->hasMany(ModerationModel::class,'remk_id');
    }
}
