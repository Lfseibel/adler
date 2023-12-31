<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\EventoFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreEventoRequest;
use App\Http\Requests\V1\UpdateEventoRequest;
use App\Http\Resources\V1\EventoCollection;
use App\Http\Resources\V1\EventoResource;
use App\Models\Evento;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new EventoFilter();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value']]
        

        $eventos = Evento::where($filterItems);
        $eventos = $eventos->with('pedidos');
        
        return new EventoCollection($eventos->paginate()->appends($request->query()));
    }

    public function attachPedidoToEvento($eventoId, $pedidoId)
    {
        $evento = Evento::find($eventoId);
        $pedido = Pedido::find($pedidoId);

        if ($evento && $pedido) {
            $evento->pedidos()->attach($pedido->id);

            return response()->json(['message' => 'Pedido attached to Evento successfully']);
        } else {
            return response()->json(['message' => 'Evento or Pedido not found'], 404);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventoRequest $request)
    {
        $requestData = $request->all();
        
        if($request->imagem){
            $imageName = Str::random(32).".".$request->imagem->getClientOriginalExtension();
            $requestData['imagem'] = $imageName;
            Storage::disk('public')->put($imageName, file_get_contents($request->imagem));}
        return new EventoResource(Evento::create($requestData));
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        return new EventoResource($evento);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        $evento->update($request->only(['nome', 'descricao', 'imagem']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
    }
}
