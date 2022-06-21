<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\UserExport;
use App\Imports\UserImport;

class UserController extends Controller
{
    public function __construct(){
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
        /* Cuando son muchos usuarios */
        $users = User::paginate(10); 
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //$request->all();
        //Metodo ORM
        $user = new User;
        $user->fullname = $request->fullname;
        $user->email =$request->email;
        $user->phone = $request->phone;
        $user->birthdate =$request->birthdate;
        $user->gender =$request->gender;
        $user->address =$request->address;
        if ($request->hasFile('photo')) {
            $file = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $file);
            $user->photo = 'images/' . $file;
        }
        $user->role =$request->role;
        $user->password = bcrypt('Customer');
        if($user->save()){
            return redirect('users')->with('message', 'The user: ' . $user->fullname . ' was successfully added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->fullname = $request->fullname;
        $user->email =$request->email;
        $user->phone = $request->phone;
        $user->birthdate =$request->birthdate;
        $user->gender =$request->gender;
        $user->address =$request->address;
        $user->role =$request->role;
        $user->active =$request->active;
        if ($request->hasFile('photo')) {
            $file = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $file);
            $user->photo = 'images/' . $file;
        }
        if($user->save()){
            return redirect('users')->with('message', 'The user: ' . $user->fullname . ' was successfully edited!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            return redirect('users')->with('message', 'The user: ' . $user->fullname . ' was successfully deleted!');
        }
    }

    function search(Request $request){
        $users = User::names($request->q)
        ->orderBy('id')
        ->paginate(10);

        return view('users.search')->with('users', $users);
    }

    public function pdf(){
        $users = User::all();
        $pdf = PDF::loadView('users.pdf', compact('users'));
        return $pdf->download('allusers.pdf');
    }

    public function excel(){
        return \Excel::download(new UserExport, 'allusers.xlsx');
    }

    public function import(Request $request){
        $file = $request->file('file');
        \Excel::import(new UserImport, $file);
        return redirect()->back()->with('message', 'Users importeds successfully!');
    }
}
