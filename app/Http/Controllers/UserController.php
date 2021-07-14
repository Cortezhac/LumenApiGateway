<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
    }


    public function index(){
        $user = User::all();

        return $this->validResponse($user);
    }

    public function store(Request $request){
        $rules = [
            'name'=> 'required|max:255',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:8|confirmed',
        ];

        $this->validate($request,$rules);

        $fields = $request->all();
        $fields['password'] = Hash::make($request->password);

        $user = User::create([
            'name'=> $fields['name'],
            'email'=>$fields['email'],
            'password'=>$fields['password'],
        ]);

        return $this->validResponse( $user , Response::HTTP_CREATED);
    }

    public function show($id){
        $user = User::findOrFail($id);
        return $this->validResponse($user);
    }

    public function update(Request $request, $id){
        $rules = [
            'name'=> 'max:255',
            'email'=> 'email|unique:users,email,'. $id,
            'password'=> 'min:8|confirmed',
        ];

        $this->validate($request,$rules);

        $filds = $request->all();

        $fields = $request->all();

        if($request->has('password')){
            $fields['password'] = Hash::make($request->password);
        }

        $user = User::fill($fields);

        if($user->isDirty()){
            $user->save();
            return $this->validResponse($user);
        }

        return $this->errorResponse('At least on value must be change', Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return $this->validResponse($user);
    }

    public function me(Request $request){
        return $this->validResponse($request->user());
    }
}
