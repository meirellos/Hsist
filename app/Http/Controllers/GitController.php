<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class GitController extends Controller
{
    //Página inicial
    public function index()
    {
        $users = User::all();
        return view('index', compact('users'));
    }

    public function save(Request $request)
    {

        //Pegando o valor do input username.
        $username = $request->input('username');

        $user = User::where('username', $username)->first();

        //Se já existe, retorne a mensagem:
        if ($user) {
            return response()->json(['message' => 'Usuário Já existe no banco de dados.']);
        }

        //Requisição API
        $client = new Client([
            'verify' => false
        ]);
        $response = $client->get("https://api.github.com/users/{$username}");

        //Se for status 200, OK
        if ($response->getStatusCode() === 200) {
            $userData = json_decode($response->getBody(), true);

            //Salvando dados no banco.
            $user = new User();

            $user->name = isset($userData['name']) ? $userData['name'] : null;
            $user->username = isset($userData['login']) ? $userData['login'] : null; // 'username' foi alterado para 'login'
            $user->avatar_url = isset($userData['avatar_url']) ? $userData['avatar_url'] : null;
            $user->registered_at = Carbon::parse($userData['created_at'])->format('Y-m-d'); //Utilizei o carbon para formatar a data corretamente.
            $user->repo_count = isset($userData['public_repos']) ? $userData['public_repos'] : null;
            $user->save();


            return response()->json(['message' => 'Usuário salvo com sucesso!']);
            //return Redirect::to('/');
        }

        return response()->json(['message' => 'Erro ao salvar usuário.']);
    }

    public function delete($id){
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado.'], 404);
        }

        $user->delete();

        //return response()->json(['message' => 'Usuário excluído com sucesso.']);
        //return view('index');
        return Redirect::to('/');
    }
}
