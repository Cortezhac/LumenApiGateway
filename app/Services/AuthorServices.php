<?php


namespace App\Services;


use App\Traits\ConsumesExternalService;
use Illuminate\Http\Request;

class AuthorServices
{
    use ConsumesExternalService;

    /**
     * The base uri used to consume the authors service
     * @var string
     */
    public $baseUri;

    /**
     * The secret key used to consume the authors service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
        $this->secret = config('services.authors.secret');
    }

    /**
     * Get the full list of authors from the authors service
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAuthors(){
        return $this->perfomRequest('GET', '/authors');
    }

    /**
     * Save instance on author service
     * @param array $data
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createAuthor($data){
        return $this->perfomRequest('POST', '/authors', $data);
    }

    /**
     * Get one instance of author on author service
     * @param $id
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getOneAuthor($id){
        return $this->perfomRequest('GET', "/authors/{$id}");
    }

    /**
     * Update instance of author on author service
     * @param $request
     * @param $id
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateAuthor($request, $id){
        return $this->perfomRequest('PUT', "/authors/{$id}", $request);
    }

    /**
     * Delete one instance the authors on author service
     * @param $id
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteAuthor($id){
        return $this->perfomRequest('DELETE', "/authors/{$id}");
    }
}
