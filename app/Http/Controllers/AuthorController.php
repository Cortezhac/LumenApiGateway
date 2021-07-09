<?php

namespace App\Http\Controllers;

use App\Services\AuthorServices;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use ApiResponser;
    /**
     * the service to consume the autor service
     * @var AuthorServices
     */
    public $authorServices;

    /**
     * Create a new controller instance.
     *
     * @param AuthorServices $authorServices
     */
    public function __construct(AuthorServices $authorServices)
    {
        $this->authorServices = $authorServices;
    }

    public function index(){

    }

    public function store(Request $request){

    }

    public function show($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
