<?php


namespace App\Services;


use App\Traits\ConsumesExternalService;

class AuthorServices
{
    use ConsumesExternalService;

    /**
     * The base uri used to consume the authors service
     * @var string
     */
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
    }

    /**
     * Get the full list of authors from the authors service
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAuthors(){
        return $this->perfomRequest('GET', '/authors');
    }
}
