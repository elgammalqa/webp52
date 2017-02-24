<?php

use Illuminate\Support\Facades\URL;

class Suggestion extends Eloquent {

	/**
	 * Deletes a suggestion.
	 *
	 * @return bool
	 */
	public function delete()
	{		
		// Delete the suggestion
		return parent::delete();
	}

	/**
	 * Returns a formatted suggestion description,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function content()
	{
		return nl2br($this->message);
	}

	/**
	 * Get the suggestion's user.
	 *
	 * @return User
	 */
	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

	
    /**
     * Get the date the suggestion was created.
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
	 * Get the Name of the user.
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the subject of the suggestions.
	 *
	 * @return string
	 */
	public function subject()
	{
		return Url::to($this->subject);
	}

	/**
	 * Returns the date of the suggestion creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the suggestion last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}

}
