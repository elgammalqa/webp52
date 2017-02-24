<?php namespace Horax\Composers;

use Illuminate\Support\Facades\URL; 
use Illuminate\Routing\Route;

class LangVariablesComposer {
 
  	public function compose($view)
  	{
    	// Get current language
        $lang   = \Config::get('app.locale');

        // Get current route
        $route    = \Route::currentRouteName();

        $route_ar = URL::to('ar/' . $route);

        // Build route of languages buttons
        $route_en = URL::to($route);
        
        $route_prefix = ($lang == "ar" ? "ar/" : "");
        $url_prefix   = ($lang == "ar" ? "../" : "");

        $en_button_class = ($lang == "ar") ? "" : "selected";
        $ar_button_class = ($lang == "ar") ? "selected" : "";

    	$orientation  = ($lang == "ar") ? 'rtl' : 'ltr';

    	$view->with(compact('lang', 'orientation', 'route_prefix', 'route_en', 'route_ar',
    						'url_prefix', 'en_button_class', 'ar_button_class', 'route'));
  	}
 
}