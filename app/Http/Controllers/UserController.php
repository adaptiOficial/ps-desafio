<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $users;

    public function __construct(User $user)
    {
        $this->users = $user;
    }

    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(UserRequest $request)
    {
        $users = $this->users->all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.crud');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $datas = $request->all();
        $datas['password'] = Hash::make($datas['password']);
        $user = $this->users->create($datas);

        //Log de ações
        $logMessage = 'O usuário ' . '[' . auth()->id() . '] - ' . auth()->user()->name . ' cadastrou um novo usuário ' . '[' . $user->id . '] - ' . $user->name;
        Log::create(['log' => $logMessage, 'category' => 'Usuários']);

        return redirect(route('user.index'))->with('success', 'Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserRequest $request, $id)
    {
        $user = $this->users->find($id);

        return json_encode($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRequest $request, $id)
    {
        $user = $this->users->find($id);
        return view('admin.user.crud', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $datas = $request->all();
        $user = $this->users->find($id);

        $user->update($datas);

        //Log de ações
        $logMessage = 'O usuário ' . '[' . auth()->id() . '] - ' . auth()->user()->name . ' alterou o usuário ' . '[' . $user->id . '] - ' . $user->name;
        Log::create(['log' => $logMessage, 'category' => 'Usuários']);

        return redirect(route('user.index'))->with('success', 'Usuário alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRequest $request, $id)
    {
        $user = $this->users->find($id);

        if ($user->id > 1) {
            $user->delete();

            //Log de ações
            $logMessage = 'O usuário ' . '[' . auth()->id() . '] - ' . auth()->user()->name . ' excluiu o usuário ' . '[' . $user->id . '] - ' . $user->name;
            Log::create(['log' => $logMessage, 'category' => 'Usuários']);
        }

        return redirect(route('user.index'))->with('success', 'Usuário excluído com sucesso!');
    }
}
