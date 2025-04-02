<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AllBand;

use App\Models\Album;

use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function returnHome()
    {
        return view('home');
    }

    public function returnUsuarios()
    {
        return view('usuarios');
    }

    public function returnBandas()
    {
        return view('bandas');
    }


//*****Btn Editar*****/





//*****Apagar*****/

public function apagarBanda($id)
{
    DB::table('allbands')
        ->where('id', $id)
        ->delete();

    return back()->with('success', 'Banda apagada com sucesso!');
}

public function showAlbuns($id)
{
    $albuns = Album::where('band_id', $id)->get();

    return view('albuns', compact('albuns'));
}

//**Editar */

public function editarBanda($id)
{
    $banda = AllBand::find($id);

    if (!$banda) {
        return redirect()->route('bandas')->with('error', 'Banda não encontrada');
    }

    return view('edit', compact('banda'));
}

public function updateBanda(Request $request)
{
    // Validação dos dados do formulário
    $request->validate([
        'nome' => 'required|string|max:255',
        'numero_de_albuns' => 'required|integer',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png',
    ]);

    // Atualiza os dados da banda no banco
    DB::table('allbands')->where('id', $request->id)
        ->update([
            'nome' => $request->nome,
            'numero_de_albuns' => $request->numero_de_albuns,
            'updated_at' => now(), // Atualiza a data de modificação
        ]);

    // Se uma nova foto for enviada, atualiza a foto
    if ($request->hasFile('foto')) {
        // Localiza a banda
        $banda = DB::table('allbands')->where('id', $request->id)->first();

        // Se a banda já tiver uma foto, apaga a foto antiga
        if ($banda && $banda->foto) {
            $fotoAntiga = public_path('storage/' . $banda->foto);
            if (file_exists($fotoAntiga)) {
                unlink($fotoAntiga); // Apaga a foto antiga
            }
        }

        // Salva a nova foto
        $foto = $request->file('foto');
        $fotoPath = $foto->store('bandas_fotos', 'public');

        // Atualiza o campo da foto no banco
        DB::table('allbands')->where('id', $request->id)
            ->update([
                'foto' => $fotoPath,
            ]);
    }

    return redirect()->route('bandas')->with('message', 'Banda atualizada com sucesso!');
}








//

}
