<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientStoreRequest;
use App\Models\Client;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Storage;
use Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(ClientStoreRequest $request): RedirectResponse
    {
        $clientuuid = Str::uuid();
        $path = Storage::disk('public')->putFileAs(
            'profiles', $request->file('photo'), $request->nom.$clientuuid.".{$request->file('photo')->extension()}"
        );
        

        $user = User::create([
            'id' => Str::uuid(),
            'userable_id'=> $clientuuid,
            'password'=> Hash::make($request->password),
            'img_url'=> $path,
            'userable_type'=> UserType::Client->value,
            ...array_slice($request->validated(),0,8)
            
        ]);
        $client = Client::create([
            'id' => $clientuuid,
            'user_id'=> $user->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
