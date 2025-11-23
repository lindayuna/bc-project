<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            // Ambil role dari form
            $role = $data['role'] ?? 'user';
            
            // Hapus fields yang tidak ada di table users (jika ada)
            unset($data['permissions']);
            
            // Buat user dengan column role
            $user = static::getModel()::create($data);
            
            // Assign Shield role jika diperlukan
            if (class_exists(\Spatie\Permission\Models\Role::class)) {
                $spatieRole = \Spatie\Permission\Models\Role::firstOrCreate([
                    'name' => $role,
                    'guard_name' => 'web'
                ]);
                
                $user->assignRole($spatieRole);
            }
            
            return $user;
        });
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'User created successfully';
    }
}