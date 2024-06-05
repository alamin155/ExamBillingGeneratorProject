<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Questionpaperinternal;
use App\Models\Questionpapersetterexternal;
use App\Models\Courses;
use App\Models\Examininganswerscript;
use App\Models\Examcommitteebilling;

class Examininganswerscript extends Model
{
    use HasFactory;
    protected $table="examininganswerscripts";
    protected $primaryKey="id";
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
    public function examcommitteebilling()
    {
        return $this->belongsTo(Examcommitteebilling::class,'exam_id');
    }


}
