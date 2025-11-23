<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // Tambahkan import ini
use App\Models\Prediction;
use App\Models\PredictionResult;
use App\Services\PredictionApiService;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class PredictionController extends Controller
{
    /**
     * Show the prediction form (only for authenticated users)
     */
    public function index()
    {
        // Check if user is authenticated and has 'user' role
        if (!Auth::check() || Auth::user()->role !== 'user') {
            return redirect()->route('user.login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        // Check if user has made a prediction in the last 30 days
        $lastPrediction = Prediction::where('user_id', Auth::id())
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->orderBy('created_at', 'desc')
            ->first();

        if ($lastPrediction) {
            $nextAllowedDate = $lastPrediction->created_at->addDays(30);
            $daysRemaining = Carbon::now()->diffInDays($nextAllowedDate, false);
            
            if ($daysRemaining > 0) {
                return redirect()->route('prediction.history')
                    ->with('warning', 'Anda sudah melakukan prediksi pada ' . 
                        $lastPrediction->created_at->format('d M Y H:i') . '. ' .
                        'Prediksi berikutnya dapat dilakukan pada ' . 
                        $nextAllowedDate->format('d M Y H:i') . ' (' . $daysRemaining . ' hari lagi).');
            }
        }

        return view('prediction.form');
    }

    /**
     * Handle prediction form submission
     */
    public function store(Request $request)
    {
        // Tambahkan logging sebelum try-catch
        Log::info('Received form submission:', $request->all());

        try {
            // Validasi input - tetap validasi data menstruasi untuk filtering
            $validated = $request->validate([
                'menstrual_status' => 'required|in:active,menopause',
                'last_menstruation' => 'required|date',
                'menopause_age' => 'required_if:menstrual_status,menopause',
                'faktor_risiko' => 'required|in:ya,tidak',
                'faktor_risiko_list' => 'required_if:faktor_risiko,ya|array',
                'benjolan_di_payudara' => 'required|in:ya,tidak',
                'kecepatan_tumbuh' => 'required|in:ya,tidak',
                'benjolan_ketiak' => 'required|in:ya,tidak',
                'nipple_discharge' => 'required|in:ya,tidak',
                'retraksi_putting_susu' => 'required|in:ya,tidak',
                'krusta' => 'required|in:ya,tidak',
                'dimpling' => 'required|in:ya,tidak',
                'peau_dorange' => 'required|in:ya,tidak',
                'ulserasi' => 'required|in:ya,tidak',
                'venektasi' => 'required|in:ya,tidak',
                'edema_lengan' => 'required|in:ya,tidak',
                'nyeri_tulang' => 'required|in:ya,tidak',
                'sesak' => 'required|in:ya,tidak',
            ]);

            // Log validasi berhasil
            Log::info('Validation passed', $validated);

            // Parse faktor risiko list
            $faktorRisikoList = null;
            if ($request->faktor_risiko === 'ya' && $request->faktor_risiko_list) {
                if (is_string($request->faktor_risiko_list)) {
                    $faktorRisikoList = json_decode($request->faktor_risiko_list, true);
                    Log::info('Decoded faktor_risiko_list from JSON string:', ['result' => $faktorRisikoList]);
                } elseif (is_array($request->faktor_risiko_list)) {
                    $faktorRisikoList = $request->faktor_risiko_list;
                    Log::info('Using faktor_risiko_list array directly:', ['array' => $faktorRisikoList]);
                }
            }

            // Data yang akan disimpan ke database (tanpa data menstruasi)
            $predictionData = [
                'user_id' => Auth::id(),
                'faktor_risiko' => $request->faktor_risiko,
                'faktor_risiko_list' => $faktorRisikoList,
                'benjolan_di_payudara' => $request->benjolan_di_payudara,
                'kecepatan_tumbuh' => $request->kecepatan_tumbuh,
                'benjolan_ketiak' => $request->benjolan_ketiak,
                'nipple_discharge' => $request->nipple_discharge,
                'retraksi_putting_susu' => $request->retraksi_putting_susu,
                'krusta' => $request->krusta,
                'dimpling' => $request->dimpling,
                'peau_dorange' => $request->peau_dorange,
                'ulserasi' => $request->ulserasi,
                'venektasi' => $request->venektasi,
                'edema_lengan' => $request->edema_lengan,
                'nyeri_tulang' => $request->nyeri_tulang,
                'sesak' => $request->sesak,
            ];

            // Log data yang akan disimpan
            Log::info('Attempting to create prediction with filtered data:', $predictionData);

            // Create prediction dengan data yang difilter
            $prediction = Prediction::create($predictionData);

            // Log hasil create prediction
            Log::info('Prediction created successfully', [
                'id' => $prediction->id,
                'examination_code' => $prediction->examination_code,
                'created_at' => $prediction->created_at,
            ]);

            
            // Prepare API data
            $apiData = $request->except(['faktor_risiko_list']);

            // Call prediction API
            $apiResponse = PredictionApiService::create($apiData);

            if ($apiResponse && isset($apiResponse['prediction'])) {
                PredictionResult::create([
                    'prediction_id' => $prediction->id,
                    'prediction' => $apiResponse['prediction'],
                    'accuracy' => $apiResponse['accuracy'] ?? null,
                    'confidence_score' => $apiResponse['confidenceScore'] ?? null,
                ]);

                return redirect()->route('prediction.result', $prediction->id)
                    ->with('success', 'Prediksi berhasil dibuat! Kode pemeriksaan: ' . $prediction->examination_code);
            }

            return redirect()->route('prediction.form')
                ->with('warning', 'Data berhasil disimpan, namun API prediksi tidak merespon.');

        } catch (\Exception $e) {
            Log::error('Error in prediction store: ' . $e->getMessage());
            Log::error('Exception type: ' . get_class($e));
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return redirect()->route('prediction.form')
                ->with('error', 'Terjadi kesalahan saat memproses prediksi: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show prediction result
     */
    public function result($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'user') {
            return redirect()->route('login');
        }

        $prediction = Prediction::with('result')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('prediction.result', compact('prediction'));
    }

    /**
     * Show prediction history
     */
    public function history()
    {
        // Get predictions for the current authenticated user only
        $predictions = Prediction::with('result')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('prediction.history', compact('predictions'));
    }

    /**
     * Show search form for doctors
     */
    public function doctorSearch()
    {
        return view('doctor.search');
    }

    /**
     * Search prediction by examination code (for doctors)
     */
    public function searchByCode(Request $request)
    {
        $request->validate([
            'examination_code' => 'required|string|max:15'
        ]);

        $prediction = Prediction::with(['result', 'user'])
            ->where('examination_code', $request->examination_code)
            ->first();

        if (!$prediction) {
            return redirect()->back()
                ->with('error', 'Kode pemeriksaan "' . $request->examination_code . '" tidak ditemukan.')
                ->withInput();
        }

        return view('doctor.prediction-detail', compact('prediction'));
    }

    /**
     * View specific prediction for doctor
     */
    public function doctorDetail($id)
    {
        $prediction = Prediction::with(['result', 'user'])->findOrFail($id);
        return view('doctor.prediction-detail', compact('prediction'));
    }
}