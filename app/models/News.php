<?php

use Illuminate\Support\Facades\URL;

class News extends Eloquent {

	/**
	 * Deletes a news.
	 *
	 * @return bool
	 */
	public function delete()
	{		
		// Delete the blog post
		return parent::delete();
	}

	/**
	 * Returns a formatted news content,
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
	 * Get the news's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * Get the news's meta_description.
	 *
	 * @return string
	 */
	public function meta_description()
	{
		return $this->meta_description;
	}

	/**
	 * Get the news's meta_keywords.
	 *
	 * @return string
	 */
	public function meta_keywords()
	{
		return $this->meta_keywords;
	}
	

    /**
     * Get the date the news was created.
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
	 * Get the URL to the news.
	 *
	 * @return string
	 */
	public function url()
	{
		
		$lang = Config::get('app.locale');
		$route_prefix = ($lang == "ar" ? "ar/" : "");		
		return Url::to($route_prefix .'news/' .$this->slug);
	}

	/**
	 * @return  boolean 
	 */

	public function hasThumbs(){
		return ($this->thumbs != "");
	}

	/**
	 *
	 *
	 * @return  string 
	 */

	public function getThumbs(){
		/*
		if($this->hasThumbs())
			$file = "http://localhost/amwaj/intranet/public/" .($this->thumbs);
		else
			$file = "http://localhost/amwaj/intranet/public/assets/amwaj_logo.png";
			

		return App::make('phpthumb')->create('resize', array($file, 100, 100, 'adaptive'));	
*/
		
		if($this->hasThumbs())
			return Url::to($this->thumbs);
		else
			return Url::to("assets/amwaj_logo.png");		
			
	}

	/**
	 * Returns the date of the news creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the news last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}

	/**
	 * @return  boolean 
	 */

	public function hasPdf(){
		return ($this->pdf != "");
	}

	/**
	 *
	 *
	 * @return  string 
	 */

	public function getPdf(){
		return Url::to($this->pdf);		
	}

	/**
	 * @return  boolean 
	 */

	public function hasWeblink(){
		return ($this->web_link != "");
	}

	/**
	 *
	 *
	 * @return  string 
	 */

	public function getWeblink(){
		return $this->web_link;
	}

	/**
	 * @return  boolean 
	 */

	public function hasYoutube(){
		return ($this->youtube_link != "");
	}

	/**
	 *
	 *
	 * @return  string 
	 */

	public function getYoutube(){
		preg_match(
	        '/[\\?\\&]v=([^\\?\\&]+)/',
	        $this->youtube_link,
	        $matches
    	);

    	return 'https://www.youtube.com/embed/' .$matches[1];				
	}

	public function title()
	{
		// Get current language
        $lang   = Config::get('app.locale');
        if($lang == "ar")
			return nl2br($this->title_ar);
		else
			return nl2br($this->title);
	}

}
