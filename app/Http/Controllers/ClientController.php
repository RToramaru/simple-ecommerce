<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Services\ClientService;

class ClientController extends Controller
{
    public function register(Request $request)
    {
        $data = [];
        return view('client.register', $data);
    }

    public function register_client(Request $request)
    {
        $data = $request->all();
        $user = new User();
        $user->fill($data);
        $user->password = bcrypt($user->password);

        $address = new Address();
        $address->fill($data);

        $clientService = new ClientService();
        $result = $clientService->save_user($user, $address);

        $message = $result['message'];
        $status = $result['status'];
        
        $request->session()->flash($status, $message);

        return redirect()->route('client.register');
    }
}
