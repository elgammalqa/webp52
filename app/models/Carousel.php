<?php

use Illuminate\Support\Facades\URL;

class Carousel extends Eloquent {

	/**
	 * Get the slide's video.
	 *
	 * @return string
	 */
	public function video()
	{
		return $this->video;
	}

    /**
     * Get the slide's link.
     *
     * @return string
     */
    public function link()
    {
        if($this->link != "")
            return $this->link;
        
        return "#";
    }
	
    
    /**
     * Get the date the slider was created.
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
     * Returns the date of the slider creation,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function created_at()
    {
        return $this->date($this->created_at);
    }

    /**
     * Returns the date of the slider last update,
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
