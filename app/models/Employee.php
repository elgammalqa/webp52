<?php

use Illuminate\Support\Facades\URL;

class Employee extends Eloquent {

	/**
	 * Deletes a employee.
	 *
	 * @return bool
	 */
	public function delete()
	{		
		// Delete the employee
		return parent::delete();
	}

	/**
	 * get the Image of Employee
	 * return IMG element
	 */

    public function photo(){
        if($this->user->photo == ""){
            $photoHTML = '<span class="glyphicon glyphicon-user" style="font-size:5em;"></span>';
        }else{
            $photoHTML = '<img src="' .asset($this->user->photo) .'" width="100px">';
        }
        return $photoHTML;
    }

    public function getMonth(){    	
		return date('F', strtotime('2000-' . $this->month));
    }

	/**
	 * Get the employee's user.
	 *
	 * @return User
	 */
	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * Get the job's department.
	 *
	 * @return DepartmentHead
	 */
	public function dep()
	{
		return $this->belongsTo('DepartmentHead', 'department', 'DepartmentID');
	}

	
    /**
     * Get the date the employee was created.
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
	 * Returns the date of the employee creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the employee last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}

}
