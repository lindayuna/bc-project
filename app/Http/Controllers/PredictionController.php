<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Prediction;
use App\Models\PredictionResult;
use App\Services\PredictionApiService;
use Illuminate\Support\Facades\Log;

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

        return view('prediction.form');
    }

    /**
     * Handle prediction form submission
     */
    public function store(Request $request)
    {
        // Check authentication
        if (!Auth::check() || Auth::user()->role !== 'user') {
            return redirect()->route('user.login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $request->validate([
            'faktor_risiko' => 'required|in:ya,tidak',
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

        try {
            // Save to database - examination_code akan digenerate otomatis
            $prediction = Prediction::create([
                'user_id' => Auth::id(),
                'faktor_risiko' => $request->faktor_risiko,
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
            ]);

            // Call API for prediction
            $apiResponse = PredictionApiService::create($request->all());

            if ($apiResponse && isset($apiResponse['prediction'])) {
                // Save API result
                PredictionResult::create([
                    'prediction_id' => $prediction->id,
                    'prediction' => $apiResponse['prediction'],
                    'accuracy' => $apiResponse['accuracy'] ?? null,
                    'confidence_score' => $apiResponse['confidenceScore'] ?? null,
                ]);

                return redirect()->route('prediction.result', $prediction->id)
                    ->with('success', 'Prediksi berhasil dibuat! Kode pemeriksaan: ' . $prediction->examination_code);
            } else {
                return redirect()->route('prediction.form')
                    ->with('warning', 'Data berhasil disimpan dengan kode: ' . $prediction->examination_code . ', namun API prediksi tidak merespon.');
            }

        } catch (\Exception $e) {
            Log::error('Prediction form error: ' . $e->getMessage());
            
            return redirect()->route('prediction.form')
                ->with('error', 'Terjadi kesalahan saat memproses prediksi.')
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
    public function doctorViewPrediction($code)
    {
        $prediction = Prediction::with(['result', 'user'])
            ->where('examination_code', $code)
            ->first();

        if (!$prediction) {
            abort(404, 'Prediction not found');
        }

        return view('doctor.prediction-detail', compact('prediction'));
    }
}