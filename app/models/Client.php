<?php

use Illuminate\Support\Facades\URL;

class Client extends Eloquent {

	/**
	 * Get the client's name.
	 *
	 * @return string
	 */
	public function name()
	{
		return $this->name;
	}

	
    /**
     * Get the date the post was created.
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
     * Returns the date of the blog post creation,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function created_at()
    {
        return $this->date($this->created_at);
    }

    /**
     * Returns the date of the blog post last update,
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

    public function hasThumbs(){
        return ($this->logo != "");
    }

    /**
     *
     *
     * @return  string 
     */

    public function getThumbs(){        
        if($this->hasThumbs())
            return Url::to($this->logo);
        else
            return Url::to("images/img_placeholder_blog_post.png");     
            
    }
    /**
     * Get the link to the client webpage.
     *
     * @return string
     */
    public function link()
    {
        return $this->link;
    }

}
