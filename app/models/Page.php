<?php

use Illuminate\Support\Facades\URL;

class Page extends Eloquent {

	/**
	 * Deletes a page.
	 *
	 * @return bool
	 */
	public function delete()
	{		
		// Delete the blog post
		return parent::delete();
	}

	/**
	 * Returns a formatted page content,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function content()
	{
		// Get current language
        $lang   = Config::get('app.locale');
        if($lang == "ar"){
        	if($this->content_ar != "")				
				return str_replace("../../../assets/js/elfinder/files/","../../assets/js/elfinder/files/",($this->content_ar));
			else
				return Lang::get('menu.under_construction');
		}
		else
			return str_replace("../../../assets/js/elfinder/files/","../assets/js/elfinder/files/",($this->content));
	}

	/**
	 * Returns a formatted page content,
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
	 * Get the page's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * Get the page's meta_description.
	 *
	 * @return string
	 */
	public function meta_description()
	{
		return $this->meta_description;
	}

	/**
	 * Get the page's meta_keywords.
	 *
	 * @return string
	 */
	public function meta_keywords()
	{
		return $this->meta_keywords;
	}

	
    /**
     * Get the date the page was created.
     *
     * @param \Carbon|null $date
     * @return string
     */
    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

        return String::date($date);
    }

	/**
	 * Get the URL to the page.
	 *
	 * @return string
	 */
	public function url()
	{		
		// Get current language
        $lang   = Config::get('app.locale');
        if($lang == "ar")
			return Url::to('ar/page/' .$this->slug);
		else
			return Url::to('page/' .$this->slug);
	}
	
	/**
	 * Returns the date of the page creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the page last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}

	/**
	 * Returns all the pages with the level < 2
	 *
	 * @return Array
	 */
	public function parents()
	{		
        return $this->where('level', '<', '2')->lists('title', 'id');
	}

	/**
	 * Returns all levels
	 *
	 * @return Array
	 */
	public function levels()
	{
        return array(0 => '0 levels',1 => '1 levels',2 => '2 levels');
	}


	public function getId()
	{
		return $this->id;
	}

	public function hasParent(){
		return $this->parent != 0;
	}

	public function parent(){
		return $this->find($this->parent);
	}

}
