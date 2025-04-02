<?php

use Illuminate\Http\Request;

use App\Models\Allband; //importando modelo

use App\Http\Controllers\UserController; //importando controlador

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use Laravel\Fortify\Fortify;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [UserController::class, 'returnHome'])->name('home');

Route::get('/usuarios', [UserController::class, 'returnUsuarios'])->name('usuarios');

Route::get('/bandas', [UserController::class, 'returnBandas'])->name('bandas');


//******* */


Route::get('/bandas', function () {
    $bandas = AllBand::all(); // Buscar todas as bandas
    return view('bandas', compact('bandas'));
})->name('bandas');


Route::post('/bandas', function (Request $request) {
    // Validação dos dados
    $request->validate([
        'nome' => 'required|string|max:255',
        'foto' => 'required|image|mimes:jpg,jpeg,png',
        'numero_de_albuns' => 'required|integer',
    ]);

    // Adicionar nova banda
    $foto = $request->file('foto');
    $fotoPath = $foto->store('bandas_fotos', 'public');

    AllBand::create([
        'nome' => $request->input('nome'),
        'foto' => $fotoPath,
        'numero_de_albuns' => $request->input('numero_de_albuns'),
    ]);

    // Msg
    return redirect('/bandas')->with('success', 'Banda adicionada com sucesso!');
});


//*****Ver*****//

Route::get('/bandas/{id}/albuns', [UserController::class, 'showAlbuns'])->name('bandas.albuns');

//*****Apagar*****//

Route::get('/bandas/{id}/delete', [UserController::class, 'apagarBanda'])->name('apagarBanda');

//*****Editar*****//

Route::get('/bandas/{id}/editar', [UserController::class, 'editarBanda'])->name('bandas.editar');

Route::post("/update-banda", [UserController::class, 'updateBanda'])->name('bandas.update');

//*****Fortify*****//

Fortify::loginView(function () {
    return view('auth.login');
});

Route::middleware('auth')->get('/dashboard', [UserController::class, 'showDashboard'])->name('dashboard');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');









