<?php
include_once "db.php";
class RegistrationDB extends connectdatabase
{
   
    public function checkuser()
    {
        $checkuser = $this->connectdb()->prepare("SELECT * FROM users WHERE EMAIL = :EMAIL and PASSWORD = :PASSWORD");
        $pass = $_POST['password'];
        $email = $_POST['email'];
        $checkuser->bindParam("PASSWORD", $pass);
        $checkuser->bindParam("EMAIL", $email);
        $checkuser->execute();
        return $checkuser;
    }
    public function adduser()
    {
        if ($this->checkuser()->rowCount() == 0) {
            $name = $_POST['name'];
            $age = $_POST['DOB'];
            $email = $_POST['email'];
            $username =$_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $phoneNum = $_POST['phone_number'];
            $gender = $_POST['gender'];

            if (empty($name) || empty($age) || empty($email) || empty($username)  || empty($password) || empty($confirm_password) || empty($phoneNum)) {
                echo '<h3>' . "you left something empty ";
            }
            if ($password != $confirm_password) {
                echo '<h3>' . "( the password and confirm password) are not identical " . '<h3>';
                
            }else if (!filter_var($email ,FILTER_VALIDATE_EMAIL)){
                echo "email is not correct";
            }
             else {
                $addUser = $this->connectdb()->prepare("INSERT INTO users(NAME,DateOfBirth,EMAIL,PASSWORD,PASSWORD_Confirm,PhoneNumber,Gender,username) VALUES(:NAME,:DateOfBirth,:EMAIL,:PASSWORD,:PASSWORD_Confirm,:PhoneNumber,:Gender,:username)");
                $addUser->bindParam("NAME", $name);
                $addUser->bindParam("DateOfBirth", $age);
                $addUser->bindParam("EMAIL", $email);
                $addUser->bindParam("PASSWORD", $password);
                $addUser->bindParam("PASSWORD_Confirm", $confirm_password);
                $addUser->bindParam("PhoneNumber", $phoneNum);
                $addUser->bindParam("Gender", $gender);
                $addUser->bindParam("username", $username);
                if ($addUser->execute()) {
                    
                } else {
                    echo '<div class="alert alert-danger" role="alert">
              failed_حدث خطا  
               </div>';
                }
            }
        }else{
            echo '<h3>'. "This password OR email is already exist" ;
        }
    }
    public function showUser()
    {
        $select =$this->connectdb()->prepare("SELECT * FROM users ORDER BY userid DESC");
        $select->execute();
        return $select;
    }

}
