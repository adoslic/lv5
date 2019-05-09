<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(){                  //provjera je li korisnik logiran
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        if(\Auth::user()->role == 'admin'){         //provjera je li korisnik admin
            $id = \Auth::user()->id;                //uzmi id admina
            $users = User::all();                   //uzmi sve korisnike
            return view('admin', compact('users','id'));    //proslijedi korisnike i id admina
        }
        else return view('home');                   //ako nije admin, onda ga vrati na home view
    }

    public function edit($id){                      
        if(\Auth::user()->role == 'admin'){         //provjeri je li korisnik admin
            $user = User::find($id);                //pronađi korisnika s tim id-om
            return view('edit', compact( 'user'));  //proslijedi tog korisnika
        }
        else return view('home');                   //ako nije admin, onda ga vrati na home view
    }  

    public function update(Request $request, $id){  
        $user = User::find($id);                    //pronađi korisnika s tim id-om
        $user->role = $request->get('role');        //pročitaj vrijednost 
        $user->save();                              //spremi promjene u bazu 
        return redirect('/home');                   //povratak na home view
    }
}
