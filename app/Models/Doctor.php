<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nin',
        'gender',
        'specialization',
        'str_number',
        'education_history',
        'practice_location',
        'practice_schedule',
    ];

    protected $casts = [
        'practice_schedule' => 'array', // Cast JSON to array
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accessor untuk gender
    public function getGenderLabelAttribute()
    {
        return match($this->gender) {
            'male' => 'Laki-laki',
            'female' => 'Perempuan',
            default => 'Belum diisi'
        };
    }

    // Accessor untuk practice schedule yang lebih readable
    public function getFormattedPracticeScheduleAttribute()
    {
        if (!$this->practice_schedule) {
            return 'Belum diatur';
        }
        
        $schedule = [];
        foreach ($this->practice_schedule as $day => $time) {
            if (!empty($time['start']) && !empty($time['end'])) {
                $dayName = match($day) {
                    'monday' => 'Senin',
                    'tuesday' => 'Selasa', 
                    'wednesday' => 'Rabu',
                    'thursday' => 'Kamis',
                    'friday' => 'Jumat',
                    'saturday' => 'Sabtu',
                    'sunday' => 'Minggu',
                    default => $day
                };
                $schedule[] = $dayName . ': ' . $time['start'] . ' - ' . $time['end'];
            }
        }
        
        return implode(', ', $schedule);
    }

    /**
     * Get the user that owns the doctor profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}