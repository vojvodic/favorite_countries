<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Services\CountriesService;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Show main / index view for countries
     */
    public function index(CountriesService $countriesService){
      $settings = Settings::getLabelValue();
      return view('back.countries.index',[
        'favorite_countries' => Country::get(['name']),
        'countries'          => $countriesService->all($cache = ($settings->cache_countries == 'on' ? true : false)),
        'settings'           => $settings
      ]);
    }

    /**
     * Show all favorite countries
     */
    public function favorites(Request $request){
      return view('back.countries.favorites',[
        'favorite_countries' => Country::with(['comments' => function($q) {
                                           $q->orderBy('created_at', 'desc');
                                         }])->get()
      ]);
    }

    /**
     * Add country to favorites
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
     * Add comment to country
     */
    public function storeComment($country_id,Request $request){
      $request->validate([
        'comment' => 'required'
      ]);

      $country = Country::findOrFail($country_id);
      $comment = $country->comments()->create([
        'comment' => $request->comment,
      ]);

      return response()->json(['comment' => $comment]);
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
