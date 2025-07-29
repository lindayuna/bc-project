<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Doctor;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        
        if ($user->role === 'dokter') {
            // Doctor profile data
            $doctor = Doctor::where('user_id', $user->id)->first();
            
            // Get doctor statistics
            $totalSearches = 0; // Count doctor searches if you have that data
            $lastActivity = $doctor ? $doctor->updated_at : null;
            
            return view('doctor.profile.index', compact('user', 'doctor', 'totalSearches', 'lastActivity'));
        } else {
            // Regular user profile data
            $totalPredictions = 0;
            $lastPrediction = null;
            
            return view('user.profile.index', compact('user', 'totalPredictions', 'lastPrediction'));
        }
    }

    public function edit()
    {
        $user = Auth::user();
        
        if ($user->role === 'dokter') {
            $doctor = Doctor::where('user_id', $user->id)->first();
            return view('doctor.profile.edit', compact('user', 'doctor'));
        } else {
            return view('user.profile.edit', compact('user'));
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        // Base validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date|before:today',
            'address' => 'nullable|string|max:500', // Address tetap di users table
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Add doctor-specific validation rules
        if ($user->role === 'dokter') {
            $doctorId = $user->doctor->id ?? 'NULL';
            $rules = array_merge($rules, [
                'nin' => 'nullable|string|max:20|unique:doctors,nin,' . $doctorId,
                'gender' => 'nullable|in:male,female',
                'specialization' => 'nullable|string|max:255',
                'str_number' => 'nullable|string|max:100',
                'education_history' => 'nullable|string|max:1000',
                'practice_location' => 'nullable|string|max:500',
                'practice_schedule' => 'nullable|array',
            ]);
        }

        // Custom error messages
        $messages = [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'nin.unique' => 'NIN sudah terdaftar.',
            'gender.in' => 'Jenis kelamin harus male atau female.',
            'avatar.image' => 'File harus berupa gambar.',
            'avatar.max' => 'Ukuran gambar maksimal 2MB.',
            'education_history.max' => 'Riwayat pendidikan maksimal 1000 karakter.',
            'practice_location.max' => 'Tempat praktik maksimal 500 karakter.',
        ];

        $request->validate($rules, $messages);

        // Prepare user update data
        $userUpdateData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'address' => $request->address, // Address di users table
        ];

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar && Storage::disk('public')->exists('avatars/' . $user->avatar)) {
                Storage::disk('public')->delete('avatars/' . $user->avatar);
            }
            
            $avatar = $request->file('avatar');
            $avatarName = time() . '_' . $user->id . '.' . $avatar->getClientOriginalExtension();
            
            // Store the file
            $avatar->storeAs('avatars', $avatarName, 'public');
            
            // Add avatar to update data
            $userUpdateData['avatar'] = $avatarName;
        }

        // Update user
        $user->update($userUpdateData);

        // Handle doctor-specific updates
        if ($user->role === 'dokter') {
            // Prepare practice schedule data
            $practiceSchedule = $request->practice_schedule ? json_encode($request->practice_schedule) : null;
            
            Doctor::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'nin' => $request->nin,
                    'gender' => $request->gender,
                    'specialization' => $request->specialization,
                    'str_number' => $request->str_number,
                    'education_history' => $request->education_history,
                    'practice_location' => $request->practice_location,
                    'practice_schedule' => $practiceSchedule,
                ]
            );
            
            $redirectRoute = 'doctor.profile';
            $successMessage = 'Profil dokter berhasil diperbarui!';
        } else {
            $redirectRoute = 'user.profile';
            $successMessage = 'Profil berhasil diperbarui!';
        }

        return redirect()->route($redirectRoute)->with('success', $successMessage);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'current_password.required' => 'Password saat ini wajib diisi.',
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
        ]);

        $user = Auth::user();

        // Check current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Determine redirect route based on role
        $redirectRoute = $user->role === 'dokter' ? 'doctor.profile' : 'user.profile';
        
        return redirect()->route($redirectRoute)->with('success', 'Password berhasil diperbarui!');
    }
}