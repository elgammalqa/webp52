<?php

use Illuminate\Support\Facades\URL;

class Job extends Eloquent {

	/**
	 * Deletes a job.
	 *
	 * @return bool
	 */
	public function delete()
	{		
		// Delete the job
		return parent::delete();
	}

	/**
	 * Returns a formatted job description,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function content()
	{
		return nl2br($this->description);
	}

	/**
	 * Get the job's department.
	 *
	 * @return DepartmentHead
	 */
	public function department()
	{
		return $this->belongsTo('DepartmentHead', 'DepartmentID', 'DepartmentID');
	}

		
    /**
     * Get the date the job was created.
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

    public function applicants(){
    	return $this->hasMany('Applicant');
    }

	/**
	 * Get the URL to the jobs.
	 *
	 * @return string
	 */
	public function url()
	{
		return Url::to('job/' .$this->slug);
	}

	/**
	 * Get the URL to apply to job.
	 *
	 * @return string
	 */
	public function urlApply()
	{
		return Url::to("apply/" .$this->slug);
	}

	/**
	 * Returns the date of the job creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the job last update,
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
	 * @return  string 
	 */

	public function getPdf(){
		return Url::to($this->pdf);		
	}

}
