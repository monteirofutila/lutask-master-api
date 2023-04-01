<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'tasks';

    protected $fillable = [
        'user_id',
        'description',
        'status',
        'priority',
    ];

    /**
     * The model relationships.
     *
     * @var array<string, string>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
