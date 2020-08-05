<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    private $user;

    public function __construct(User $users)
    {
        $this->user = $users;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::all();

        return view('vendor.adminlte.admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.adminlte.admin.users.create',  compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try {

            $dateForm = $request->all();
            
            $validate = validator($dateForm, $this->user->rules);

            if ($validate->fails()) {
                return redirect()
                    ->route('users.create')
                    ->withErrors($validate)
                    ->withInput();

            }
 
            $insert = $this->user->create($dateForm);

            $insert->password = bcrypt($request->password);
            $insert->save();

            if ($insert) {

                return redirect()->route('users.index')->with('success');
            } else {

                return redirect()->back();
            }

        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('vendor.adminlte.admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
