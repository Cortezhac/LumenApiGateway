<?php

namespace App\Http\Controllers;

use App\Services\AuthorServices;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        return $this->successResponse($this->authorServices->getAuthors());
    }

    public function store(Request $request){
        return $this->successResponse($this->authorServices->createAuthor($request->all()), Response::HTTP_CREATED);
    }

    public function show($id){
        return $this->successResponse($this->authorServices->getAuthor($id));
    }

    public function update(Request $request, $id){
        return $this->successResponse($this->authorServices->updateAuthor($request->all(), $id));
    }

    public function destroy($id){
        return $this->successResponse($this->authorServices->deleteAuthor($id));
    }
}
