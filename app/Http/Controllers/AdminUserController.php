<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $data = $request->validate([
            'name'      =>'required',
            'email'      =>'required|unique:users',
            'password'      =>'required|min:3',
            're_password'      =>'required|same:password',
        ]);

        $data['password']   = Hash::make($data['password']);

        User::create($data);

        // Tambahkan session flash message
        session()->flash('success', 'User berhasil ditambahkan.');

        return redirect('/admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.add', compact('user'));
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
        //
        $user = User::find($id);
        $data = $request->validate([
            'name'      =>'required',
            'email'      =>'required|unique:users,email,' . $user->id,
            // 'password'      =>'min:3',
            're_password'      =>'same:password',
        ]);



        if ($request->password){
            $data['password']   = Hash::make($data['password']);
        }else{
            $data['password'] = $user->password;
        }
        $user->update($data);

         // Tambahkan session flash message
         session()->flash('success', 'User berhasil diedit .');
        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();

        // Tambahkan session flash message
        session()->flash('success', 'User berhasil dihapus.');

        return redirect('/admin/user');

    }
}
