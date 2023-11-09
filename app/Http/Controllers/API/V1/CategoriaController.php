<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\CategoriaFilter;
use App\Http\Requests\V1\StoreCategoriaRequest;
use App\Http\Requests\V1\UpdateCategoriaRequest;
use App\Models\Categoria;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CategoriaResource;
use App\Http\Resources\V1\CategoriaCollection;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new CategoriaFilter();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value']]
        
        $includeProdutos = $request->query('includeProdutos');  

        $categorias = Categoria::where($filterItems);

        if($includeProdutos)
        {
            $categorias = $categorias->with('produtos');
        }
        return new CategoriaCollection($categorias->get());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaRequest $request)
    {
        return new CategoriaResource(Categoria::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return new CategoriaResource($categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $data = [
            'mensagem' => 'Categoria '.$categoria->descricao.' atualizada com sucesso',
        ];
        
        $categoria->update($request->all());

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $data = [
            'mensagem' => 'Categoria '.$categoria->descricao.' apagada com sucesso',
        ];
        $categoria->delete();

        return response()->json($data);
    }
}
