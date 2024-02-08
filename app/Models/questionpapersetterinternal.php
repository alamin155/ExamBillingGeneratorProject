<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\questionpapersetterinternal;

class Questionpapersetterinternal extends Model
{
    use HasFactory;
    protected $table="questionpapersetterinternals";
    protected $primaryKey="questionpapersetterinternal_id";
    
}
