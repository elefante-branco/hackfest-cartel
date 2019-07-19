<?php

namespace App\Http\Controllers\Investigacao;

use App\Models\Investigacao\Contexto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContextoController extends Controller
{
    const VIEW_PATH = 'contextos.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contextos = Contexto::where('usuario_id', 1)
            ->with('entidades')
            ->get();

        return view(self::VIEW_PATH.'index', compact('contextos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        DB::transaction(function () use ($data) {
            Contexto::create([
                'nome' => $data['nome'],
                'usuario_id' => 1,
            ]);
        });

        return redirect()
            ->route('contextos.index')
            ->with('success', 'Investigação registrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contexto = Contexto::findOrFail($id);

        return view(self::VIEW_PATH.'show', compact('contexto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
