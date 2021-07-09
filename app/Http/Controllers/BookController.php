<?php

namespace App\Http\Controllers;

use App\Services\BookServices;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * the service to consume the book service
     * @var BookServices
     */
    public $bookServices;

    /**
     * Create a new controller instance.
     *
     * @param BookServices $bookServices
     */
    public function __construct(BookServices $bookServices)
    {
        $this->bookServices = $bookServices;
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
