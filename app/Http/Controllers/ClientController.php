<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;

class ClientController extends Controller
{
    public function register(Request $request)
    {
        $data = [];
        return view('register', $data);
    }

    public function register_client(Request $request)
    {
        $data = $request->all();
        $user = new User();
        $user->fillable($data);
        $user->save();

        $address = new Address();
        $address->fillable($data);
        $address->save();

        return redirect()->route('register');
    }
}
