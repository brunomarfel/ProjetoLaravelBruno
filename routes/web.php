<?php

use Illuminate\Http\Request;

use App\Models\Allband;

use App\Http\Controllers\UserController; //importar controlador


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
});

Route::post('/bandas', function (Request $request) {
    // Validação dos dados
    $request->validate([
        'nome' => 'required|string|max:255',
        'foto' => 'required|image|mimes:jpg,jpeg,png',
        'numero_de_albuns' => 'required|integer',
    ]);

    // Salvar a nova banda
    $foto = $request->file('foto');
    $fotoPath = $foto->store('bandas_fotos', 'public');

    AllBand::create([
        'nome' => $request->input('nome'),
        'foto' => $fotoPath,
        'numero_de_albuns' => $request->input('numero_de_albuns'),
    ]);

    // Redirecionar de volta para a página de bandas com uma mensagem de sucesso
    return redirect('/bandas')->with('success', 'Banda adicionada com sucesso!');
});

//*****Btn Ver*****//

// Rota para exibir os álbuns de uma banda
Route::get('/bandas/{id}/albuns', function ($id) {
    return view('albuns', ['id' => $id]);
})->name('bandas.albuns');

//*****Btn Apagar*****//

// Rota para apagar uma banda
Route::delete('/bandas/{id}', function ($id) {
    $banda = App\Models\AllBand::findOrFail($id);
    $banda->delete();
    return redirect()->route('bandas')->with('success', 'Banda apagada com sucesso!');
})->name('bandas.apagar');


Route::delete('/bandas/{id}', [UserController::class, 'apagarBanda'])->name('apagarBanda'); //Apagar







