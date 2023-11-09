<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\MensagemFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreMensagemRequest;
use App\Http\Requests\V1\UpdateMensagemRequest;
use App\Http\Resources\V1\MensagemCollection;
use App\Http\Resources\V1\MensagemResource;
use App\Models\Mensagem;
use Illuminate\Http\Request;

class MensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new MensagemFilter();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value']]
        

        $mensagens = Mensagem::where($filterItems);

        
        return new MensagemCollection($mensagens->paginate()->appends($request->query()));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMensagemRequest $request)
    {
        return new MensagemResource(Mensagem::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Mensagem $mensagem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mensagem $mensagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMensagemRequest $request, Mensagem $mensagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mensagem $mensagem)
    {
        //
    }
}
