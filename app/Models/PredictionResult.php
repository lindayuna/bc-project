<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PredictionResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'prediction_id',
        'prediction',
        'accuracy',
        'confidence_score',
    ];

    protected $casts = [
        'accuracy' => 'float',
        'confidence_score' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relasi ke Prediction
     */
    public function prediction(): BelongsTo
    {
        return $this->belongsTo(Prediction::class);
    }
}