<?php

use Illuminate\Support\Facades\URL;

class Occurrence extends Eloquent implements \MaddHatter\LaravelFullcalendar\Event{

	protected $dates = ['start_date', 'end_date'];

	/**
	 * Deletes a occurrence.
	 *
	 * @return bool
	 */
	public function delete()
	{		
		// Delete the blog post
		return parent::delete();
	}

	/**
	 * Returns a formatted occurrence content,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function content()
	{
		return nl2br($this->content);
	}

	/**
	 * Get the occurrence's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * Get the occurrence's meta_description.
	 *
	 * @return string
	 */
	public function meta_description()
	{
		return $this->meta_description;
	}

	/**
	 * Get the occurrence's meta_keywords.
	 *
	 * @return string
	 */
	public function meta_keywords()
	{
		return $this->meta_keywords;
	}

	/**
     * Get the start date of the occurrence.     
     * 
     * @return string
     */
    public function start_date()
    {
        return String::date($this->start_date);
    }

    /**
     * Get the end date of the occurrence.     
     * 
     * @return string
     */
    public function end_date()
    {
        return String::date($this->end_date);
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start_date;
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end_date;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return true;
    }

    /**
	 * Get the occurrence's schedule.
	 *
	 * @return string
	 */
	public function schedule()
	{
		return $this->schedule;
	}
	
    /**
     * Get the date the occurrence was created.
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
	 * Get the URL to the occurrence.
	 *
	 * @return string
	 */
	public function getUrl()
	{
		return Url::to('event/' .$this->slug);
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
			return Url::to("assets/amwaj_logo.png");	
	}

	/**
	 * Returns the date of the occurrence creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the occurrence last update,
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

	/**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

}
