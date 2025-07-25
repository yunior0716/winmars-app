<?php

namespace App\Http\Controllers;

use App\Http\Requests\clienteRequest;
use App\Models\clientes;
use App\Models\tipo_clientes;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class clientesController extends Controller
{

    public function show()
    {
        $tipo_clientes = tipo_clientes::all();
        return view('clientes.registrarClientes', compact('tipo_clientes'));
    }

    public function create(clienteRequest $request)
    {
        $cliente = clientes::create($request->validated());
        return redirect()->to('registrarClientes')->with('success', 'Formulario enviado correctamente!');
    }

    /* Modal crear cliente */
    public function nuevoCliente(Request $request)
    {
        $cliente = new clientes();

        $this->validate($request, [
            'nomcli' => 'required|regex:/^[a-zA-Z]+$/u',
            'apecli' => 'required|regex:/^[a-zA-Z]+$/u',
            'tecli1' => 'required|numeric|digits:10|starts_with:809,829,849|unique:clientes,tecli1',
            'tecli2' => 'nullable|numeric|digits:10|starts_with:809,829,849|unique:clientes,tecli2',
            'dircli' => 'required',
            'corcli' => 'required|email|unique:clientes,corcli',
            'cedrnc' => 'required|numeric|digits:11|starts_with:402,031|unique:clientes,cedrnc',
            'codtpcli' => 'required|integer',
            'estcli' => 'required',
        ]);

        $cliente->nomcli = $request->nomcli;
        $cliente->apecli = $request->apecli;
        $cliente->tecli1 = $request->tecli1;
        $cliente->tecli2 = $request->tecli2;
        $cliente->dircli = $request->dircli;
        $cliente->corcli = $request->corcli;
        $cliente->cedrnc = $request->cedrnc;
        $cliente->codtpcli = $request->codtpcli;
        $cliente->estcli = $request->estcli;

        $cliente->save();

        $clientes = clientes::where('codcli', $cliente->codcli)->get(); //Cliente Registrado

        return response()->json([
            'clientes' => $clientes
        ]);
    }

    public function query()
    {
        $datos['clientes'] = clientes::where('estcli', 'activo')->get();
        return view('clientes.consultarClientes', $datos);
    }

    public function edit()
    {
        $cliente = clientes::find($_GET['cliente']);
        return view('clientes.editarClientes', compact('cliente'));
    }

    public function update(clienteRequest $request)
    {
        $cliente = clientes::find($request->codcli);

        $cliente->nomcli = $request->nomcli;
        $cliente->apecli = $request->apecli;
        $cliente->tecli1 = $request->tecli1;
        $cliente->tecli2 = $request->tecli2;
        $cliente->dircli = $request->dircli;
        $cliente->corcli = $request->corcli;
        $cliente->cedrnc = $request->cedrnc;
        $cliente->codtpcli = $request->codtpcli;

        $cliente->save();
        return redirect('consultarClientes')->with('success', 'Edicion realizada correctamente');
    }

    public function delete($id)
    {
        $cliente = clientes::find($id);

        $cliente->estcli = 'inactivo';
        $cliente->save();

        return redirect('consultarClientes')->with('success', 'Cliente inhabilitado correctamente');
    }
}
