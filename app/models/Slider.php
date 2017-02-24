<?php

use Illuminate\Support\Facades\URL;

class Slider extends Eloquent {

	/**
	 * Get the slide's title.
	 *
	 * @return string
	 */
	public function title()
	{
		return $this->title;
	}
	
    /**
     * Get the slide's subtitle.
     *
     * @return string
     */
    public function subtitle()
    {
        return $this->subtitle;
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
