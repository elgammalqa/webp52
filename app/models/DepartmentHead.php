<?php

class DepartmentHead extends Eloquent {

	protected $connection = 'mysql2';

	protected $table = 'DepartmentHead';

    protected $guarded = array();

    public static $rules = array();

    public static function getAll(){
    	DepartmentHead::on('mysql2')->where('DepartmentID', '>', '0')->get();
    }

    /**
	 * Get the Name of the departments.
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->DepartmentName;
	}

	/**
	 * Get the ID of the departments.
	 *
	 * @return string
	 */
	public function getId()
	{
		return $this->DepartmentID;
	}

	/**
	 * Get the Name of the department's head.
	 *
	 * @return string
	 */
	public function getNameHead()
	{
		return $this->DeptHeadName;
	}

	/**
	 * Get the ID of the department's head.
	 *
	 * @return string
	 */
	public function getHeadId()
	{
		return $this->DeptHeadID;
	}

	/**
     * Get the department's supervisor.
     *
     * @return DepartmentHead
     */
    public function supervisor()
    {
        return $this->belongsTo('DeptSupervisor', 'DepartmentID', 'DepartmentID');
    }

}