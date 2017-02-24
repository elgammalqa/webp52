<?php

use Illuminate\Support\Facades\URL;

class Gallery extends Eloquent {

	/**
	 * Deletes a gallery and all
	 * the associated thumbs.
	 *
	 * @return bool
	 */
	public function delete()
	{
		// Delete the thumbs
		$this->thumbs()->delete();

		// Delete the gallery
		return parent::delete();
	}

	/**
	 * Returns a formatted gallery description entry,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function description()
	{
		return nl2br($this->description);
	}

	/**
	 * Get the gallery's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * Get the gallery's meta_description.
	 *
	 * @return string
	 */
	public function meta_description()
	{
		return $this->meta_description;
	}

	/**
	 * Get the gallery's meta_keywords.
	 *
	 * @return string
	 */
	public function meta_keywords()
	{
		return $this->meta_keywords;
	}

	/**
	 * Get the gallery's thumbs.
	 *
	 * @return array
	 */
	public function thumbs()
	{
		return $this->hasMany('Thumb');
	}

	
    /**
     * Get the date the gallery was created.
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
	 * Get the URL to the gallery.
	 *
	 * @return string
	 */
	public function url()
	{
		return Url::to('gallery/' .$this->slug);
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
		if($this->hasThumbs())
			return Url::to($this->thumbs);
		else
			return Url::to("images/img_placeholder_blog_gallery.png");		
			
	}

	/**
	 * Returns the date of the gallery creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the gallery last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}

	/**
	 * Get all the galleries to populate a Select Form
	 * 
	 * @return Array
	 */
	public function getSelectList()
	{
		$lst = $this->orderBy('created_at', 'DESC')
			        ->lists('title', 'id');
		
		return $lst;	        
	}

}
