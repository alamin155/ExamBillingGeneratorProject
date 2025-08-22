<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accepetd extends Model
{
    use HasFactory;
    protected $table="accepted";
    protected $primaryKey="id";
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
