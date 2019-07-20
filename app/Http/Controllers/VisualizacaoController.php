<?php

namespace App\Http\Controllers;

use App\Models\Grafico\MediaPreco;
use Illuminate\Http\Request;

class VisualizacaoController extends Controller
{
    public function precoMedio(Request $request, $municipioId){

        $media = MediaPreco::all()->groupBy('municipio_id')
            ->map(function ($item){
                return $item->pluck('media');
            })->toArray();

        return response()->json([
           'results' => $media
        ]);
    }
}
