<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\Section;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'class_id',
        'section_id',
        'name',
        'email',
    ];

    protected $searchable = [
        'name',
        'email',
        'class.name',
        'section.name',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->name = ucfirst($model->name);
        });
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}
