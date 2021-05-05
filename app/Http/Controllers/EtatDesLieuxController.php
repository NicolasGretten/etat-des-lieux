<?php

namespace App\Http\Controllers;

use App\Models\EtatDesLieux;
use Illuminate\Http\File;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EtatDesLieuxController extends Controller
{

    public function createForm(){
        return view('edl');
    }

    /**
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        try {
            $list = EtatDesLieux::all();

            return response()->json($list);

        } catch(Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * @return JsonResponse
     */
    public function retrieve(Request $request): JsonResponse
    {
        try {

            $retrieve = EtatDesLieux::where('id', $request->id)->first();

            if (empty($retrieve)){
                throw new Exception('L\'etat des lieux n\'existe pas.', 404);
            }

            return response()->json($retrieve);

        } catch(Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): ?RedirectResponse
    {
        try {
            $this->validate($request, [
                'titre'=>'required|string',
                'type_id'=>'required|integer|exists:types,id',
                'ville_id'=>'required|integer|exists:villes,id',
                'nbPieces'=>'required|string',
                'surface'=>'required|integer',
                'photo'=>'required',
            ]);

            $path = Storage::putFileAs('photos', new File($request->photo), 'photo'. random_int(00,10000).'.jpg');

            $edl = new EtatDesLieux();
            $edl->titre = $request->titre;
            $edl->type_id = $request->type_id;
            $edl->ville_id = $request->ville_id;
            $edl->nbPieces = $request->nbPieces;
            $edl->surface = $request->surface;
            $edl->photo = $path;
            $edl->save();

            return back()
                ->with('success','Etat des lieux enregistrer.')
                ->with('file', $edl);

        } catch(Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'titre'=>'required|string',
                'type_id'=>'required|string|exists:types,id',
                'ville_id'=>'required|string|exists:villes,id',
                'nbPieces'=>'required|integer',
                'surface'=>'required|integer',
                'photo'=>'required|image|mimes:jpg,jpeg,png',
            ]);

            $edl = EtatDesLieux::where('id',$request->id)->first();

            if (empty($edl)){
                throw new Exception('L\'etat des lieux n\'existe pas.', 404);
            }

            $edl->titre = $request->input('titre', $edl->getOriginal('titre'));
            $edl->type_id = $request->input('type_id', $edl->getOriginal('type_id'));
            $edl->ville_id = $request->input('ville_id', $edl->getOriginal('ville_id'));
            $edl->nbPieces = $request->input('nbPieces', $edl->getOriginal('nbPieces'));
            $edl->surface = $request->input('surface', $edl->getOriginal('surface'));
            $edl->photo = $request->input('photo', $edl->getOriginal('photo'));
            $edl->save();

            return response()->json();

        } catch(Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * @return JsonResponse
     */
    public function delete(Request $request): JsonResponse
    {
        try {

            $edl = EtatDesLieux::where('id',$request->id)->first();

            if (empty($edl)){
                throw new Exception('L\'etat des lieux n\'existe pas.', 404);
            }

            $edl->delete();

            return response()->json($edl);

        } catch(Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }
}
