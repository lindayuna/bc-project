<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load current Spatie roles untuk display
        $user = $this->record;
        $data['spatie_roles'] = $user->roles->pluck('name')->toArray();
        $data['permissions'] = $user->permissions->pluck('name')->toArray();
        
        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        return DB::transaction(function () use ($record, $data) {
            $role = $data['role'] ?? 'user';
            $permissions = $data['permissions'] ?? [];
            
            // Hapus fields yang tidak ada di table users
            unset($data['spatie_roles'], $data['permissions']);
            
            // Update user
            $record->update($data);
            
            // Sync Spatie roles
            $spatieRole = \Spatie\Permission\Models\Role::firstOrCreate([
                'name' => $role,
                'guard_name' => 'web'
            ]);
            
            // Remove all roles and assign new one
            $record->syncRoles([$spatieRole]);
            
            // Sync permissions
            if (!empty($permissions)) {
                foreach ($permissions as $permission) {
                    \Spatie\Permission\Models\Permission::firstOrCreate([
                        'name' => $permission,
                        'guard_name' => 'web'
                    ]);
                }
                $record->syncPermissions($permissions);
            } else {
                $record->syncPermissions([]);
            }
            
            Log::info('User updated with hybrid role system:', [
                'user_id' => $record->id,
                'column_role' => $record->role,
                'spatie_roles' => $record->roles->pluck('name'),
            ]);
            
            return $record;
        });
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'User updated successfully';
    }
}