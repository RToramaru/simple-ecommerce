<?php

namespace App\Services;

use App\Models\User;
use App\Models\Address;
use Log;

class ClientService
{
    public function save_user(User $user, Address $address)
    {
        try {
            $dbUser = User::where('email', $user->email)->first();

            if ($dbUser) {
                return ['status' => 'error', 'message' => 'Usuário já cadastrado!'];
            }

            \DB::beginTransaction();
            $user->save();
            $address->user_id = $user->id;
            $address->save();
            \DB::commit();

            return ['status' => 'success', 'message' => 'Usuario criado com sucesso!'];
        } catch (\Exception $e) {
            \Log::error("ERROR", ['file' => $e->getFile(), 'message' => $e->getMessage()]);
            \DB::rollBack();

            return ['status' => 'error', 'message' => 'Erro ao criar usuário!'];
        }
    }
}
