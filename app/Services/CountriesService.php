<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class CountriesService
{
    private $url = 'https://restcountries.eu/rest/v2';

    private $timeout = 3;

    private $response;

    public function all(){
      $this->response = Http::timeout($this->timeout)->get($this->url . "/all?fields=name;region;population");
      if( $this->response->successful() ){
        return $this->response->json();
      }
    }
}
