<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class CountriesService
{

    /**
     * Restcountries endpoint
     * @var string
     */
    private $url = 'https://restcountries.eu/rest/v2';

    /**
     * Maximum number of seconds to wait for a response
     * @var integer
     */
    private $timeout = 3;

    /**
     * Instance of the Laravel Http class
     * @var object
     */
    private $response;

    /**
     * Retrive countries
     */
    public function all($cache = false){
      if($cache){
        return \DB::select('SELECT name, region, population FROM restcountries');
      }
      return $this->fetch();
    }

    /**
     * Cache countries from restcountries.eu and store them into db
     * For performance do bulk insert
     */
    public function cache(){
      $cached = \DB::select('SELECT id FROM restcountries LIMIT 1');
      if (isset($cached[0])) {
        // Already cached
        return;
      }

      $countries = [];
      foreach ($this->fetch() as $country) {
        // Be sure that country name is set as it is not null in db
        if (empty($country['name'])) {
          continue;
        }
        array_push($countries,[
          'name'       => $country['name'],
          'region'     => $country['region'],
          'population' => $country['population']
        ]);
      }
      \DB::table('restcountries')->insert($countries);
      return;
    }

    /**
     * Fetch countries from restcountries
     */
    private function fetch(){
      try {
        $this->response = Http::timeout($this->timeout)->get($this->url . "/all?fields=name;region;population");
      } catch (\Exception $e) {
        $message = __('Unable to fetch data from restcountries.eu.');
        if (config('app.debug')) {
          $message .= " " . $e->getMessage();
        }
        request()->session()->flash('alert_info', $message);
        return [];
      }

      if( $this->response->successful() ){
        return $this->response->json();
      }
      return [];
    }
}
