<?php

use App\Enums\Genre;
use App\Enums\UserType;
use App\Http\Controllers\ProfileController;
use App\Models\Client;
use App\Models\Developpeur;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\instance;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // $user = new User();
    // $user->id = Str::uuid();
    // $user->nom = 'John';
    // $user->prenom = 'Doe';
    // $user->email = 'john@example.com';
    // $user->password = Hash::make('password');
    // $user->telephone = '+2246255514';
    // $user->addresse = 'cite';
    // $user->genre = Genre::Homme->value;
    // $user->nationalite = 'guinne';
    // $user->dob = '04-04-2004';
    // $user->img_url = 'https://lol.png';
    // ;

    // $client = new Client();
    // $user->userable()->save($client);
    // $user = Client::all()->last();
    // dd($user->user);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::resource('client', App\Http\Controllers\ClientController::class)->except('edit', 'show');

Route::resource('stock', App\Http\Controllers\StockController::class)->except('edit', 'show');

Route::resource('boutique', App\Http\Controllers\BoutiqueController::class)->except('edit', 'show');

Route::resource('category', App\Http\Controllers\CategoryController::class)->except('edit', 'show');

Route::resource('produit', App\Http\Controllers\ProduitController::class)->except('edit', 'show');

Route::resource('module', App\Http\Controllers\ModuleController::class)->except('edit', 'show');

Route::resource('projet', App\Http\Controllers\ProjetController::class)->except('edit', 'show');
