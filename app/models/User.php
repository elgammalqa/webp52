<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\Confide;
use Zizaco\Confide\ConfideEloquentRepository;
use Zizaco\Entrust\HasRole;
use Carbon\Carbon;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends ConfideUser implements UserInterface, RemindableInterface{
    use HasRole;

    /**
     * Get user by username
     * @param $username
     * @return mixed
     */
    public function getUserByUsername( $username )
    {
        return $this->where('username', '=', $username)->first();
    }

    /**
     * Get the date the user was created.
     *
     * @return string
     */
    public function joined()
    {
        return String::date(Carbon::createFromFormat('Y-n-j G:i:s', $this->created_at));
    }

    /**
     * Save roles inputted from multiselect
     * @param $inputRoles
     */
    public function saveRoles($inputRoles)
    {
        if(! empty($inputRoles)) {
            $this->roles()->sync($inputRoles);
        } else {
            $this->roles()->detach();
        }
    }

    /**
     * Save department inputted from select
     * @param $inputDepartment
     */
    public function saveDepartment($inputDepartment)
    {
        if(! empty($inputDepartment)) {

            $date = date('Y-m-d', time());
            DepartmentsUsers::where('user_id', '=', $this->id)->update(array('to_date'=>$date));
            
            $depUser = new DepartmentsUsers;
            $depUser->department_id = $inputDepartment;
            $depUser->user_id = $this->id;
            $depUser->from_date = $date;

            $depUser->save();
        } 
    }

    /**
     * Verify if this user can access Admin Panel
     * depends of the permissions
     * Return BOOLEAN
     */

    public function canAdmin(){
        $admin_permissions = array( 'manage_employee', 'manage_feedback', 'manage_users', 
                                'manage_roles', 'manage_news', 'manage_letters',
                                'manage_jobs', 'manage_events');    
    
        $is_admin = false;

        foreach($admin_permissions as $admin_permission)
        if ($this->can($admin_permission))
            $is_admin = true;
 
        return $is_admin;
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
     * Returns user's current department id only.
     * @return array|bool
     */
    public function currentDepartment()
    {
        $department = false;
        
        $deps = DepartmentsUsers::where('user_id', '=', $this->id)->where('to_date', '=', null)->first();

        if( !empty( $deps ) ){
            $department = $deps->department_id;
        }

        return $department;
    }

    /**
     * Returns user's current role ids only.
     * @return array|bool
     */
    public function currentRoleIds()
    {
        $roles = $this->roles;
        $roleIds = false;
        if( !empty( $roles ) ) {
            $roleIds = array();
            foreach( $roles as &$role )
            {
                $roleIds[] = $role->id;
            }
        }
        return $roleIds;
    }

    /**
     * Redirect after auth.
     * If ifValid is set to true it will redirect a logged in user.
     * @param $redirect
     * @param bool $ifValid
     * @return mixed
     */
    public static function checkAuthAndRedirect($redirect, $ifValid=false)
    {
        // Get the user information
        $user = Auth::user();
        $redirectTo = false;

        if(empty($user->id) && ! $ifValid) // Not logged in redirect, set session.
        {
            Session::put('loginRedirect', $redirect);
            $redirectTo = Redirect::to('user/login')
                ->with( 'notice', Lang::get('user/user.login_first') );
        }
        elseif(!empty($user->id) && $ifValid) // Valid user, we want to redirect.
        {
            $redirectTo = Redirect::to($redirect);
        }

        return array($user, $redirectTo);
    }

    public function currentUser()
    {
        return (new Confide(new ConfideEloquentRepository()))->user();
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    /**
     * Get the name of user.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * [get all letters]
     * @return [list] 
     */
    public function letters()
    {
        return $this->hasMany('Letter');
    }

    /**
     * [get all holidays]
     * @return [list] 
     */
    public function holiday()
    {
        return $this->hasMany('Letter')->where('request_type', '=', 'holiday')
                ->orderBy('created_at', 'DESC');
    }

    /**
     * [get all salary]
     * @return [list] 
     */
    public function salary()
    {
        return $this->hasMany('Letter')->where('request_type', '=', 'salary')
                ->orderBy('created_at', 'DESC');
    }

    /**
     * [get all cash]
     * @return [list] 
     */
    public function cash()
    {
        return $this->hasMany('Letter')->where('request_type', '=', 'cash')
                ->orderBy('created_at', 'DESC');
    }

    /**
     * [verify is this user is Supervisor ]
     * @return boolean 
     */
    public function isSupervisor(){
        $supervisor_user = EmpMaster::on('mysql2')->whereRaw('SupervisorID=? ', array($this->registration))                                                         
                                                         ->first();  
        if($supervisor_user)
            return true;
        return false;
    }

    /**
     * [get Supervisor of this Employee]
     * @return DeptSupervisor
     */
    public function getSupervisor(){
        return $this->department->supervisor;
    }

    /**
     * [get Head of Department of this Employee]
     * @return User
     */
    public function getDepartmentHEAD(){
        $dept = $this->department;        
        $usr = User::where('registration', '=', $dept->DeptHeadID)->first();        
        return $usr;
    }

}
