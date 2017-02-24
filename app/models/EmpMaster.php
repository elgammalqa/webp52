<?php

class EmpMaster extends Eloquent {

	protected $connection = 'mysql2';

	protected $table = 'EmpMaster';

    protected $guarded = array();

    public static $rules = array();

    public static function getAll(){
    	EmpMaster::on('mysql2')->where('EmpID', '>', '0')->get();
    }

}