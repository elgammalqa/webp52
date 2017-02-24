<?php

use Illuminate\Support\Facades\URL;

class Letter extends Eloquent {

	/**
	 * Deletes a letter.
	 *
	 * @return bool
	 */
	public function delete()
	{		
		// Delete the letter
		return parent::delete();
	}

	
	/**
	 * Get the letter's user.
	 *
	 * @return User
	 */
	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

	
    /**
     * Get the date the letter was created.
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
	 * Get the subject of the letters.
	 *
	 * @return string
	 */
	public function type()
	{
		return $this->request_type;
	}

	/**
	 * Returns the date of the letter creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the letter last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}

	/**
	 * Returns the status of the letter ,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function status()
	{		
		switch ($this->approved) {
			case 0:
				$status = '<span class="label label-warning">PENDING</span>';
				break;
			case -1:
				$status = '<span class="label label-info">APPROVED BY SUPERVISOR</span>';
				break;	
			case 1:
				$status = '<span class="label label-info">APPROVED BY HEAD OF DEPARTMENT</span>';
				break;			
			case 2:
				$status = '<span class="label label-success">APPROVED BY HR</span>';
				break;				
			case -2:
				$status = '<span class="label label-success">DENIED BY SUPERVISOR</span>';
				break;	
			case 3:
				$status = '<span class="label label-danger">DENIED BY HEAD OF DEPARTMENT</span>';
				break;				
			case 4:
				$status = '<span class="label label-danger">DENIED BY HR</span>';
				break;					
			default:
				$status = '<span class="label label-default">UNKNOWN</span>';
				break;
		}
        return $status;
	}

	/**
	 * Returns if the letter is pending or no
	 *
	 * @return  Boolean 
	 */

	public function isPending()
	{
		return ($this->approved == 0);
	}

	/**
	 * Returns TRUE if the letter has a motivation
	 * FALSE if doesn't have
	 *
	 * @return  boolean 
	 */

	public function hasMotivation(){
		return $this->motivation != "";
	}

}
