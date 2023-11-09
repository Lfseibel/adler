<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\MedidaFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreMedidaRequest;
use App\Http\Requests\V1\UpdateMedidaRequest;
use App\Http\Resources\V1\MedidaCollection;
use App\Http\Resources\V1\MedidaResource;
use App\Models\Medida;
use Illuminate\Http\Request;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new MedidaFilter();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value']]
        
        $includeProdutos = $request->query('includeProdutos');  

        $medidas = Medida::where($filterItems);

        if($includeProdutos)
        {
            $medidas = $medidas->with('produtos');
        }
        return new MedidaCollection($medidas->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedidaRequest $request)
    {
        return new MedidaResource(Medida::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Medida $medida)
    {
        return new MedidaResource($medida);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medida $medida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedidaRequest $request, Medida $medida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medida $medida)
    {
        //
    }
}
