<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Services\CountriesService;
use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    /**
     * Show main / index view for settings
     */
    public function index(){
      return view('back.settings.index',[
        'settings' => Settings::getLabelValue()
      ]);
    }

    /**
     * Update settings
     */
    public function update(Request $request,CountriesService $countriesService){
      if($request->cache_countries){
        Settings::where('label', 'cache_countries')->update(['value' => 'on']);
        $countriesService->cache();
      } else {
        Settings::where('label', 'cache_countries')->update(['value' => 'off']);
      }
      return redirect()->back();
    }
}
