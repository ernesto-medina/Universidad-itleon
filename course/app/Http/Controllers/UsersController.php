<?php namespace App\Http\Controllers;

class UsersController extends Controller {
    public function getIndex(){
        $result = \DB::table('users')
        ->select(['email'])
        //->where('email', '=' , 'ernesto.r.2.em@gmail.com')
        ->orderBy('email', 'ASC')
        // ->join('otraTabla', 'condicional1', 'operador', 'condicional2')
        //->get();
        ->first();
        dd($result);
        return $result;
    }

}