<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Prediction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'examination_code',
        'faktor_risiko',
        'benjolan_di_payudara',
        'kecepatan_tumbuh',
        'benjolan_ketiak',
        'nipple_discharge',
        'retraksi_putting_susu',
        'krusta',
        'dimpling',
        'peau_dorange',
        'ulserasi',
        'venektasi',
        'edema_lengan',
        'nyeri_tulang',
        'sesak',
    ];

    /**
     * Boot method - Auto generate examination code saat create
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($prediction) {
            if (empty($prediction->examination_code)) {
                $prediction->examination_code = self::generateExaminationCode();
            }
        });
    }

    /**
     * Generate unique examination code
     * Format: BC-YYYYMM-XXXX
     */
    public static function generateExaminationCode()
    {
        do {
            // BC = Breast Cancer
            $prefix = 'BC';
            
            // YYYYMM = Year and Month (202407 untuk July 2024)
            $yearMonth = date('Ym');
            
            // XXXX = 4 karakter random alphanumeric
            $random = strtoupper(Str::random(4));
            
            // Gabungkan: BC-202407-A1B2
            $code = $prefix . '-' . $yearMonth . '-' . $random;
            
            // Pastikan kode belum digunakan
        } while (self::where('examination_code', $code)->exists());

        return $code;
    }

    /**
     * Alternative - Generate shorter code
     * Format: BCXXXXXX (BC + 6 digit number)
     */
    public static function generateShortCode()
    {
        do {
            $prefix = 'BC';
            $number = mt_rand(100000, 999999);
            $code = $prefix . $number;
            
        } while (self::where('examination_code', $code)->exists());

        return $code;
    }

    /**
     * Scope untuk pencarian berdasarkan kode
     */
    public function scopeByExaminationCode($query, $code)
    {
        return $query->where('examination_code', $code);
    }

    /**
     * Relationship dengan User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship dengan PredictionResult
     */
    public function result()
    {
        return $this->hasOne(PredictionResult::class);
    }
}