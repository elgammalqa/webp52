<?php

use Illuminate\Support\Facades\URL;

class Department extends Eloquent {

	/**
	 * Deletes a department.
	 *
	 * @return bool
	 */
	public function delete()
	{		
		// Delete the department
		return parent::delete();
	}

	/**
	 * Returns a formatted department description,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function content()
	{
		return nl2br($this->description);
	}

	/**
	 * Get the department's chief.
	 *
	 * @return User
	 */
	public function chief()
	{
		return $this->belongsTo('User', 'user_id');
	}

	
    /**
     * Get the date the department was created.
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
	 * Get the Name of the departments.
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->title;
	}

	/**
	 * Get the URL to the departments.
	 *
	 * @return string
	 */
	public function url()
	{
		return Url::to($this->slug);
	}

	/**
	 * Returns the date of the department creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the department last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}

}
