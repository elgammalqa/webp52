<?php

use Illuminate\Support\Facades\URL;

class Applicant extends Eloquent {

	/**
	 * Deletes a Applicant.
	 *
	 * @return bool
	 */
	public function delete()
	{		
		// Delete the Applicant
		return parent::delete();
	}

	/**
	 * Get the Applicant's job.
	 *
	 * @return User
	 */
	public function job()
	{
		return $this->belongsTo('Job', 'job_id');
	}

	
    /**
     * Get the date the Applicant was created.
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
	 * Returns the date of the Applicant creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the Applicant last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}

	public function getFullName(){
		return $this->title .' ' .$this->name .' ' .$this->mname .' ' .$this->lname;
	}

	/**
	 * @return  string 
	 */

	public function getCV(){
		return Url::to($this->cv);		
	}

	/**
	 * @return boolean
	 */

	public function hasCV(){
		return $this->cv != "";		
	}

}
