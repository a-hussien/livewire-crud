<?php

namespace App\Models;

use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'name',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class, 'class_id');
    }
}
