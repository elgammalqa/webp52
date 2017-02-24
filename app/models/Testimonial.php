<?php

class Testimonial extends Eloquent {

	/**
	 * Get the testimonial's message.
	 *
	 * @return string
	 */
	public function message()
	{
		return $this->message;
	}

	/**
	 * Get the testimonial's author.
	 *
	 * @return Author's Name
	 */

    public function author()
    {
        return $this->belongsTo('Client', 'client_id');
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
}
