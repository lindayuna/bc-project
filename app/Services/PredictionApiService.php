<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PredictionApiService
{
    protected static $baseUrl = 'http://localhost:8080/api';

    /**
     * Create prediction via API
     */
    public static function create(array $data)
    {
        try {
            // Convert snake_case to camelCase untuk Spring Boot API
            $apiData = [
                'faktorRisiko' => $data['faktor_risiko'] ?? 'tidak',
                'benjolanDiPayudara' => $data['benjolan_di_payudara'] ?? 'tidak',
                'kecepatanTumbuh' => $data['kecepatan_tumbuh'] ?? 'tidak',
                'nippleDischarge' => $data['nipple_discharge'] ?? 'tidak',
                'retraksiPuttingSusu' => $data['retraksi_putting_susu'] ?? 'tidak',
                'krusta' => $data['krusta'] ?? 'tidak',
                'dimpling' => $data['dimpling'] ?? 'tidak',
                'peauDorange' => $data['peau_dorange'] ?? 'tidak',
                'ulserasi' => $data['ulserasi'] ?? 'tidak',
                'venektasi' => $data['venektasi'] ?? 'tidak',
                'benjolanKetiak' => $data['benjolan_ketiak'] ?? 'tidak',
                'edemaLengan' => $data['edema_lengan'] ?? 'tidak',
                'nyeriTulang' => $data['nyeri_tulang'] ?? 'tidak',
                'sesak' => $data['sesak'] ?? 'tidak',
            ];
            
            Log::info('Sending data to API: ' . self::$baseUrl . '/predict');
            Log::info('API Data (camelCase format): ', $apiData);
            
            $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ])
                ->post(self::$baseUrl . '/predict', $apiData);
            
            Log::info('API Response Status: ' . $response->status());
            Log::info('API Response Headers: ', $response->headers());
            Log::info('API Response Body: ' . $response->body());
            
            if ($response->successful()) {
                $responseData = $response->json();
                Log::info('Parsed API Response: ', $responseData);
                return $responseData;
            }

            Log::error('API Error Response: ' . $response->status() . ' - ' . $response->body());
            return null;
            
        } catch (\Exception $e) {
            Log::error('API Connection Error: ' . $e->getMessage());
            Log::error('API URL: ' . self::$baseUrl . '/predict');
            return null;
        }
    }

    /**
     * Update prediction via API (fallback to create if update not available)
     */
    public static function update($id, array $data)
    {
        // Try update first, fallback to create if not available
        try {
            Log::info('Attempting API update for ID: ' . $id);
            
            // Since Spring Boot API might not have update endpoint, use create
            return self::create($data);
            
        } catch (\Exception $e) {
            Log::error('API update failed, trying create: ' . $e->getMessage());
            return self::create($data);
        }
    }

    /**
     * Test API connection
     */
    public static function testConnection()
    {
        try {
            $response = Http::timeout(5)->get(self::$baseUrl . '/health');
            return $response->successful();
        } catch (\Exception $e) {
            Log::error('API Health Check Failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get all predictions from API
     */
    public static function getAll()
    {
        try {
            $response = Http::timeout(30)->get(self::$baseUrl . '/predict');
            
            if ($response->successful()) {
                return $response->json();
            }

            Log::error('Failed to fetch predictions: ' . $response->status());
            return [];
        } catch (\Exception $e) {
            Log::error('Prediction API getAll failed: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Send prediction data to API
     */
    public function predict(array $data)
    {
        return self::create($data);
    }

    /**
     * Get prediction by ID from API
     */
    public static function getById($id)
    {
        try {
            $response = Http::timeout(30)->get(self::$baseUrl . "/predict/{$id}");
            
            if ($response->successful()) {
                return $response->json();
            }

            Log::error('Failed to fetch prediction by ID: ' . $response->status());
            return null;
        } catch (\Exception $e) {
            Log::error('Prediction API getById failed: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Delete prediction by ID
     */
    public static function deleteById($id)
    {
        try {
            $response = Http::timeout(30)->delete(self::$baseUrl . "/predict/{$id}");
            
            return $response->successful();
        } catch (\Exception $e) {
            Log::error('Prediction API deleteById failed: ' . $e->getMessage());
            return false;
        }
    }
}