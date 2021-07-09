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

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }
}
