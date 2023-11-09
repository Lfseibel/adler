<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\ProdutotipoFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreProdutotipoRequest;
use App\Http\Requests\V1\UpdateProdutotipoRequest;
use App\Http\Resources\V1\ProdutotipoCollection;
use App\Http\Resources\V1\ProdutotipoResource;
use App\Models\Produtotipo;
use Illuminate\Http\Request;

class ProdutotipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ProdutotipoFilter();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value']]
        
        $tiposprodutos = Produtotipo::where($filterItems);

        
        return new ProdutotipoCollection($tiposprodutos->paginate()->appends($request->query()));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutotipoRequest $request)
    {
        return new ProdutotipoResource(Produtotipo::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Produtotipo $produtotipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produtotipo $produtotipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdutotipoRequest $request, Produtotipo $produtotipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produtotipo $produtotipo)
    {
        //
    }
}
