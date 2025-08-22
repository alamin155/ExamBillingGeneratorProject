<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ExamRemunerationHeads extends Model
{
    use HasFactory;
    protected $table = 'exam_remuneration_heads';

    protected $fillable = [
        'head_name',
        'description',
        'role',
        'amount',
        'condition_text',
    ];
    protected static function booted()
{
    static::creating(function ($model) {
        if (empty($model->secret_key)) {
            $last = static::latest('id')->first();
            $model->secret_key = $last ? $last->id + 1 : 1;
        }
    });
}
}