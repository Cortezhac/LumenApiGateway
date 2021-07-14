<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

        return $this->successResponse($user);
    }

    public function store(Request $request){
        $rules = [
            'name'=> 'required|max:255',
            'email'=> 'required|email|unique:user,email',
            'password'=> 'required|min:8|confirmed',
        ];

        $this->validate($request,$rules);

        $user = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        return $this->successResponse( $user , Response::HTTP_CREATED);
    }

    public function show($id){
        $user = User::findOrFail($id);
        return $this->successResponse($user);
    }

    public function update(Request $request, $id){
        $rules = [
            'name'=> 'max:255',
            'email'=> 'email|unique:users,email',
            'password'=> 'min:8|confirmed',
        ];

        $this->validate($request,$rules);

        $user = User::fill([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        if($user->isDirty()){
            $user->save();
            return $this->successResponse($user);
        }

        return $this->errorResponse('At least on value must be change', Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return $this->successResponse($user);
    }
}
