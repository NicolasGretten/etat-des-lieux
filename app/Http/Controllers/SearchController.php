<?php

namespace App\Http\Controllers;


use App\Models\EtatDesLieux;
use App\Models\Type;
use App\Models\Ville;
use Exception;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        try {

            if (!empty($request->type) and empty($request->ville)){
                $type = Type::where('libelle', 'like', '%' . ucfirst($request->type ). '%')->with('etatDesLieux')->get();
                return response()->json($type);
            }

            if (!empty($request->ville) and empty($request->type)){
                $ville = Ville::where('nomVille', 'like', '%' . ucfirst($request->ville ). '%')->with('etatDesLieux')->get();
                return response()->json($ville);
            }

            if (!empty($request->ville) and !empty($request->type)){
                $ville = Ville::where('nomVille', 'like', '%' . ucfirst($request->ville ). '%')->value('id');
                $type = Type::where('libelle', 'like', '%' . ucfirst($request->type ). '%')->value('id');

                $edl = EtatDesLieux::where('ville_id', $ville)->where('type_id', $type)->get();

                if ($edl->isEmpty()){
                    return response()->json(['success'=>true, 'Message'=>'No Match'], 404);
                }

                return response()->json($edl);
            }

            return response()->json('No Match');

        } catch(Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }

}
