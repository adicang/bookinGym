<?php
  
require('init.php');

class User{
    private $id;
    private $userType;
    private $FullName;
    private $username;
    private $email;
    private $password;
    private $gender;
	private $address;
    private $yearOfBirth;
   

    public static function fetch_users(){
        global $database;
        $result_set=$database->query("select * from users");
        $users=null;
        if (isset($result_set)){
            $i=0;
            if ($result_set->num_rows>0){ 
                while($row=$result_set->fetch_assoc()){ 
                    $user=new User();
                    $user->instantation($row);
                    $users[$i]=$user;
                    $i+=1;
                }
            }
        }
        return $users;
    }
        
    private function has_attribute($attribute){
        $object_properties=get_object_vars($this);
        return array_key_exists($attribute,$object_properties);
    }
    
     private function instantation($user_array){
        foreach ($user_array as $attribute=>$value){
            if ($result=$this->has_attribute($attribute))
                $this->$attribute=$value;
       }
     }
   public static function find_user($username1,$password1){
        global $database;
        $error=null;
        $result=$database->query("select * from users where username='".$username1."' and password='".$password1."'");
      
		
        if (!$result)
            $error='Can not find the user.  Error is:'.$database->get_connection()->error;
        elseif ($result->num_rows>0){
           $found_user=$result->fetch_assoc();
        }
        else
             $error="Can no find user by this name";
        return $error;
  
    }
	
	 
	
	public function find_user_by_id($id){
        global $database;
        $result_set=$database->query("select * from users where username='".$id."'");
        $found_user=$result_set->fetch_assoc();
        $this->instantation($found_user);
        return $this;
    }
	
    public static function add_user($userType,$fullName,$username,$email,$password,$gender,$address,$yearOfBirth){
        global $database;
        $error=null;
        $sql="INSERT INTO `users`(`userType`, `FullName`, `username`, `email`, `password`, `gender`, `address`, `yearOfBirth`) VALUES ('".$userType."','".$fullName."','".$username."','".$email."','".$password."','".$gender."','".$address."',".$yearOfBirth.")";
        $result=$database->query($sql);
        if (!$result)
            $error='Can not add user.  Error is:'.$database->get_connection()->error;
        return $error; 
    }


    public function get_name(){
        return $this->name;
    }
	 public function get_email(){
        return $this->email;
    }
    public function get_phone(){
        return $this->phone;
    }
    public function get_username(){
        return $this->username;
    }
	public function get_password(){
        return md5($this->password);
    }
	
}

    
?>

