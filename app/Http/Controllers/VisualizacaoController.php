<?php

namespace App\Http\Controllers;

use App\Models\Grafico\MediaPreco;
use App\Models\Investigacao\Preco;
use App\Models\Municipio;
use Illuminate\Http\Request;

class VisualizacaoController extends Controller
{
    public function precoMedio(Request $request){

        $media = MediaPreco::all()->groupBy('municipio_id')
            ->map(function ($item){
                return $item->pluck('media');
            })->toArray();

        return response()->json([
           'results' => $media
        ]);
    }

    public function precoMedioMunicipio(Request $request, $municipioId){

        $media = MediaPreco::where('municipio_id', $municipioId)->pluck('media')
            ->toArray();

        $ids = [
            "240200" => [20, 30], //caico
            "240810" => [10, 20], //natal
            "240800" => [100, 110], //mossoro
            "240325" => [200, 210], //parnamirim
        ];

        $name = Municipio::find($municipioId)->nome;

        $selected = Preco::whereBetween('posto_id', $ids[$municipioId])
            ->get()->groupBy('posto_id');

        $data = [];
        for($j = 0; $j < 447; $j++){
            $values = 0;
            for($i = $ids[$municipioId][0]; $i < $ids[$municipioId][1]; $i++)
            {
                $values += $selected[$i][$j]->valor;

            }

            array_push($data, $values/10);
        }



//        $selected = Preco::whereBetween('posto_id', $ids[$municipioId])
//            ->get()->split(447)->map(function($value){
//                $valores =  array_map(function ($val){
//                    return $val['valor'];
//                },$value->toArray());
//
//                return collect($valores)->sum() / sizeof($valores);
//            })->toArray();


        return response()->json([
            'results' => [
                'name' => $name,
                'values' => $media,
                'selected' => $data
            ]
        ]);
    }
}
