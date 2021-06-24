<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->exists('login')) {
            return view('buystate.index');
        }
        return view('login.index');
    }

    /**
     * Metodo loguear al usuario, crea una sesion si el usuario - clave es correcto
     * @param Request $request parametros de SESSION
     * @return view vista de pedidos / vista de login
     * @author  alejandro.carvajal <alejo.carvajal03@gmail.com>
     */
    public function login(Request $request)
    {

        if ($request->email == 'test@test.com' && Hash::check('12345', bcrypt($request->password))) {
            $request->session()->put('login', 'true');
            $request->session()->put('email', $request->email);
            return view('layouts.main');
        } else {
            return view('login.index')->withErrors('Error: Intente de nuevo');
        }
    }

    /**
     * Metodo usado limpiar la SESSION
     * @param Request $request parametros de SESSION
     * @return view vista de login
     * @author  alejandro.carvajal <alejo.carvajal03@gmail.com>
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        return view('login.index');
    }

    /**
     * Metodo usado para mostrar formulario de registro del cliente, si ya esta logueado redirige a los pedidos
     * @param Request $request parametros de SESSION
     * @return view vista de pedidos / vista de registro
     * @author  alejandro.carvajal <alejo.carvajal03@gmail.com>
     */
    public function register(Request $request)
    {
        if ($request->session()->exists('login')) {
            return view('buystate.index');
        }
        return view('login.register');
    }

    /**
     * Metodo usado para guardar nuevo usuario en SESSION
     * @param RegisterClientRequest $request parametros de entrada del registro del cliente
     * @return view vista de pedidos
     * @author  alejandro.carvajal <alejo.carvajal03@gmail.com>
     */
    public function save(RegisterClientRequest $request)
    {
        $request->session()->flush();
        $request->session()->put('name', $request->name);
        $request->session()->put('lastname', $request->lastname);
        $request->session()->put('email', $request->email);
        $request->session()->put('password', bcrypt($request->password));
        $request->session()->put('cellphone', $request->cellphone);
        $request->session()->put('address', $request->address);
        $request->session()->put('login', 'true');
        //dd($request->session()->all());
        return view('layouts.main');
    }
}
