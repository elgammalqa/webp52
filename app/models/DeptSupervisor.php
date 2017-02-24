<?php

class DeptSupervisor extends Eloquent {

	protected $connection = 'mysql2';

	protected $table = 'DeptSupervisor';

    protected $guarded = array();

    public static $rules = array();

    public static function getAll(){
    	DeptSupervisor::on('mysql2')->where('DepartmentID', '>', '0')->get();
    }

}