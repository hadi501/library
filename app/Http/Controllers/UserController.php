<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', ['users' => $users, 'searchBar' => 'off']);
    }

    public function userIndex(){

        $user = User::find(Auth::user()->id);
        // try {
        //     $password = Crypt::decryptString($user->password);
        // } catch (DecryptException $e) {
        //     $password = $e;
        // }

        $password = $user->password;
        

        return view('user.profile', ['user' => $user, 'password' => $password, 'searchBar' => 'off']);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.add', ['searchBar' => 'off']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Check if id & email exists in storage

        if (User::where('id', $request->id)->exists()) {
            Alert::error('Error!', 'NIM sudah terdaftar');
            return redirect()->back();
        }
        
        if (User::where('email', $request->email)->exists()) {
            Alert::error('Error!', 'Email sudah terdaftar');
            return redirect()->back();
        }

        $user = new User();

        $user->id       = $request->id;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone    = $request->phone;
        $user->role     = $request->role;

        // Store image
        $filename = $request->id . '.' . $request->picture->extension();
        $path = $request->picture->storeAs('public/user', $filename);
        $user->picture = $filename;
        
        // Save to Database
        $user->save();

        $users = User::all();
        
        Alert::success('Success!', 'User berhasil ditambahkan');
        return redirect()->to('/user',)->with(['users' => $users,'searchBar' => 'off']);
    }

    // public function recordCheck($id, $email){
        
        

    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('admin.user.edit', ['user' => $user, 'searchBar' => 'off']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user->username = $request->username;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        $user->role     = $request->role;

        if ($request->hasFile('picture')) {
            $filename = $request->id . '.' . $request->picture->extension();
            // delete old cover
            if ($user->picture !== 'picture_default.png') {
                Storage::delete('public/user/' . $user->picture);
            }
            $path = Storage::putFileAs('public/user/', $request->file('picture'), $filename);
            $user->picture = $filename;
        }

        $user->update();
        $users = User::all();
        
        Alert::success('Success!', 'User berhasil diedit');
        return redirect()->to('/user',)->with(['users' => $users,'searchBar' => 'off']);
    }


    /**
     * Update the specified resource in storage.
     */
    public function userUpdate(Request $request, string $id)
    {
        $user = User::find($id);

        $user->username = $request->username;
        $user->email    = $request->email;
        $user->phone    = $request->phone;

        if ($request->hasFile('picture')) {
            $filename = $request->id . '.' . $request->picture->extension();
            // delete old cover
            if ($user->picture !== 'picture_default.png') {
                Storage::delete('public/user/' . $user->picture);
            }
            $path = Storage::putFileAs('public/user/', $request->file('picture'), $filename);
            $user->picture = $filename;
        }

        $user->update();
        
        Alert::success('Success!', 'User berhasil diedit');
        return redirect()->to('/user-profile',)->with(['user' => $user,'searchBar' => 'off']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user->picture !== 'picture_default.png') {
            Storage::delete('public/user/' . $user->picture);
        }

        $user->delete();

        $users = User::all();
        Alert::success('Success!', 'User berhasil dihapus');
        return redirect()->to('/user',)->with(['users' => $users,'searchBar' => 'off']);
    }
}
