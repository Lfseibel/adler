<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\TipoFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreTipoRequest;
use App\Http\Requests\V1\UpdateTipoRequest;
use App\Http\Resources\V1\TipoCollection;
use App\Http\Resources\V1\TipoResource;
use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new TipoFilter();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value']]
        

        $tipos = Tipo::where($filterItems);

        
        return new TipoCollection($tipos->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoRequest $request)
    {
        return new TipoResource(Tipo::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo $tipo)
    {
        return new TipoResource($tipo);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoRequest $request, Tipo $tipo)
    {
        $data = [
            'mensagem' => 'Tipo '.$tipo->descricao.' atualizada com sucesso',
        ];
        
        $tipo->update($request->all());

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo $tipo)
    {
        $data = [
            'mensagem' => 'Tipo '.$tipo->descricao.' apagada com sucesso',
        ];
        $tipo->delete();

        return response()->json($data);
    }
}
