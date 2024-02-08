<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Questionpaperinternal;
use App\Models\Questionpapersetterexternal;
use App\Models\Courses;
use App\Models\Examininganswerscript;

class Examininganswerscript extends Model
{
    use HasFactory;
    protected $table="examininganswerscripts";
    protected $primaryKey="id";
     protected $fillable = [
        'cous_id','exam_id','internal_id','external_id','noscript'];
    public function questionpaperinternal()
    {
        return $this->belongsTo(Questionpaperinternal::class, 'internal_id');
    }
    public function questionpapersetterexternal()
    {
        return $this->belongsTo(Questionpapersetterexternal::class, 'external_id');
    }
    public function course()
    {
        return $this->belongsTo(Courses::class,'cous_id');
    }


}
