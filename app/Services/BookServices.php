<?php


namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookServices
{
    use ConsumesExternalService;

    /**
     * The base uri used to consume the authors service
     * @var string
     */
    public $baseUri;
    /**
     * The secret key used to consume the books service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('services.books.secret');
    }

    /**
     * Get Full list of books
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBooks(){
        return $this->perfomRequest('GET', '/books');
    }
    /**
     * Save instance on book service
     * @param array $data
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createBook($data){
        return $this->perfomRequest('POST', '/books', $data);
    }

    /**
     * Get one instance of book on book service
     * @param $id
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBook($id){
        return $this->perfomRequest('GET', "/books/{$id}");
    }

    /**
     * Update instance of book on book service
     * @param $request
     * @param $id
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateBook($request, $id){
        return $this->perfomRequest('PUT', "/books/{$id}", $request);
    }

    /**
     * Delete one instance the books on author service
     * @param $id
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteBook($id){
        return $this->perfomRequest('DELETE', "/books/{$id}");
    }
}
