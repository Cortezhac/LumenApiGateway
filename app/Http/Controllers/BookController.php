<?php

namespace App\Http\Controllers;

use App\Services\AuthorServices;
use App\Services\BookServices;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function PHPUnit\Framework\isEmpty;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * the service to consume the book service
     * @var BookServices
     */
    public $bookServices;
    /**
     * the service to consume the author service
     * @var AuthorServices
     */
    public $authorServices;

    /**
     * Create a new controller instance.
     *
     * @param BookServices $bookServices
     */
    public function __construct(BookServices $bookServices, AuthorServices $authorServices)
    {
        $this->authorServices = $authorServices;
        $this->bookServices = $bookServices;
    }


    public function index(){
        return $this->successResponse($this->bookServices->getBooks());
    }

    public function store(Request $request){
        $this->authorServices->getOneAuthor($request->author_id);

        return $this->successResponse($this->bookServices->createBook($request->all()), Response::HTTP_CREATED);
    }

    public function show($id){
        return $this->successResponse($this->bookServices->getBook($id));
    }

    public function update(Request $request, $id){
        return $this->successResponse($this->bookServices->updateBook($request->all(), $id));
    }

    public function destroy($id){
        return $this->successResponse($this->bookServices->deleteBook($id));
    }
}
