<?php

use Illuminate\Support\Facades\URL;

class Thumb extends Eloquent {

	/**
	 * Get the thumb's description.
	 *
	 * @return string
	 */
	public function description()
	{
		return $this->description;
	}

	/**
	 * Get the thumb's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * Get the thumb's gallery.
	 *
	 * @return Gallery
	 */
	public function gallery()
	{
		return $this->belongsTo('Gallery');
	}

    /**
     * Get the gallery's author.
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    /**
     * Get the date the thumb was created.
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
     * Returns the date of the thumb creation,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function created_at()
    {
        return $this->date($this->created_at);
    }

    /**
     * Returns the date of the thumb last update,
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

    public function hasPhoto(){
        return ($this->photo != "");
    }

    public function getPhoto(){
        
        if($this->hasPhoto())
            return Url::to($this->photo);
        else
            return Url::to("images/img_placeholder_blog_post.png");     
            
    }
}
