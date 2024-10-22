<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            // Obtener todos los eventos
        $eventos = Evento::all();
        
        // Pasar los eventos a la vista
        return view('evento.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('evento.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // Validar los datos recibidos
            $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'required',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date',
                'costo' => 'required|numeric',
            ]);

            // Crear un nuevo evento
            Evento::create($request->all());

            // Redireccionar al listado de eventos con un mensaje de éxito
            return redirect()->route('evento.index')->with('success', 'Evento creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $evento = Evento::findOrFail($id); // Encuentra el evento por ID
        return view('evento.edit', compact('evento')); // Devuelve la vista con el evento
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'costo' => 'required|numeric',
        ]);
    
        $evento->update($request->all());
    
        return redirect()->route('evento.index')->with('success', 'Evento actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();

    return redirect()->route('evento.index')->with('success', 'Evento eliminado con éxito');
    }
}
