<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    // Listar todas as consultas
    public function index()
    {
        $consultas = Consulta::all();
        return response()->json($consultas, 200);
    }

    // Adicionar uma nova consulta

    public function store(Request $request)
    {
        // Validação ajustada
        $validated = $request->validate([
            'motorista' => 'required|string|max:255',
            'buony' => 'required|string|max:255',
            'consulta' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'filial' => 'required|string|max:255',
        ]);

        try {
            // Criação do registro
            $consulta = Consulta::create($validated);
            return response()->json($consulta, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao adicionar consulta: ' . $e->getMessage()], 500);
        }
    }

    // Mostrar uma consulta específica
    public function show($id)
    {
        $consulta = Consulta::find($id);

        if (!$consulta) {
            return response()->json(['error' => 'Consulta não encontrada'], 404);
        }

        return response()->json($consulta, 200);
    }

    // Atualizar uma consulta existente

    // Atualizar uma consulta existente
    public function update(Request $request, $id)
    {
        $consulta = Consulta::find($id);

        if (!$consulta) {
            return response()->json(['error' => 'Consulta não encontrada'], 404);
        }

        // Validação ajustada
        $validated = $request->validate([
            'motorista' => 'required|string|max:255',
            'buony' => 'required|string|max:255',
            'consulta' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
        ]);

        try {
            // Atualização do registro
            $consulta->update($validated);
            return response()->json($consulta, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar consulta: ' . $e->getMessage()], 500);
        }
    }

    // Excluir uma consulta
    public function destroy($id)
    {
        $consulta = Consulta::find($id);

        if (!$consulta) {
            return response()->json(['error' => 'Consulta não encontrada'], 404);
        }

        $consulta->delete();
        return response()->json(['message' => 'Consulta excluída com sucesso'], 200);
    }
}
