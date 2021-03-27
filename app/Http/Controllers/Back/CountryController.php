<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Services\CountriesService;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Show main / index view for countries
     */
    public function index(CountriesService $countriesService){
      return view('back.countries.index',[
        'countries'          => $countriesService->all(),
        'favorite_countries' => Country::get(['name'])
      ]);
    }

    /**
     * Show all favorite countries
     */
    public function favorites(){
      return view('back.countries.favorites',[
        'favorite_countries' => Country::with('countryComments')->get()
      ]);
    }

    /**
     * Save country to favorites
     */
    public function store(Request $request){
      $request->validate([
        'name' => 'required'
      ]);

      $country = new Country;
      $country->name = $request->name;
      $country->region = $request->region ?? null;
      $country->population = $request->population ?? 0;
      $country->save();

      return response()->json();
    }

    /**
     * Remove country from favorites
     */
    public function delete($country_id){
      $country = Country::findOrFail($country_id);
      $country->delete();

      return response()->json();
    }
}
