<?php

use Illuminate\Support\Facades\URL;

class Widget extends Eloquent {

	/**
	 * Deletes a widget.
	 *
	 * @return bool
	 */
	public function delete()
	{		
		// Delete the blog post
		return parent::delete();
	}

	/**
	 * Returns a formatted widget content,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function content()
	{
		// Get current language
        $lang   = Config::get('app.locale');
        if($lang == "ar")
        	if($this->content_ar != "")	
				return nl2br($this->content_ar);
			else
				return Lang::get('menu.under_construction');
		else
			return nl2br($this->content);
	}

	/**
	 * Returns a formatted widget title,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function title()
	{
		// Get current language
        $lang   = Config::get('app.locale');
        if($lang == "ar")
			return nl2br($this->title_ar);
		else
			return nl2br($this->title);
	}

	/**
	 * Returns a formatted widget subtitle,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function subtitle()
	{
		// Get current language
        $lang   = Config::get('app.locale');
        if($lang == "ar")
			return nl2br($this->subtitle_ar);
		else
			return nl2br($this->subtitle);
	}


    /**
     * Get the date the widget was created.
     *
     * @param \Carbon|null $date
     * @return string
     */
    public function date($date=null)
    {
        if(is_null($date)) {        	
			$date = $this->publication;            
        }

        return $date;
        //date_format($date, 'g:ia \o\n l jS F Y');;
    }

	/**
	 * Get the URL to the widget.
	 *
	 * @return string
	 */
	public function url()
	{
		
		$lang = Config::get('app.locale');
		$route_prefix = ($lang == "ar" ? "ar/" : "");		
		return Url::to($route_prefix .'page/' .$this->link);
	}

	/**
	 * Return true if this widget has a photo
	 * 
	 * @return  boolean 
	 */

	public function hasPhoto(){
		return ($this->photo != "");
	}

	/**
	 * Returns the photo
	 *
	 * @return URL 
	 */

	public function getPhoto(){
		if($this->hasPhoto())
			return Url::to($this->photo);
		else
			return Url::to("assets/amwaj_logo.png");		
			
	}

	/**
	 * Returns the date of the widget creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the widget last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}

}
