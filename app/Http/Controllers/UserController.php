<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->user->findAll();
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'role_id' => 'required',
        ]);
        $params = [
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'foto' => $request->foto,
            'role_id' => $request->role_id,
        ];
        $this->user->create($params);
        alert()->success('User Berhasil ditambah', 'User');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->user->find($id);
        return view('user.profile', compact("data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
        ]);
        $params = [
            'id' => $id,
            'name' => $request->name,
            'username' => $request->username,
            'foto' => $request->foto,
            'role_id' => $request->role_id,
        ];

        $this->user->update($params);
        alert()->success('User Berhasil diubah', 'User');
        return redirect()->back();

    }

    public function change_password(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $params = [
            'id' => $id,
            'password' => Hash::make($request->password),
        ];

        $this->user->update_password($params);
        alert()->success('Password User Berhasil diubah', 'User');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->delete($id);
        alert()->success('User Berhasil Dihapus', 'User');
        return redirect()->back();
    }
}
