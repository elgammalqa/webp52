<?php namespace Horax\Composers;
 
use Illuminate\Support\ServiceProvider;
 
class ComposerServiceProvider extends ServiceProvider {
 
	public function register()
	{
		$this->app->view->composer('site.*', 'Horax\Composers\LangVariablesComposer');
	}
 
}