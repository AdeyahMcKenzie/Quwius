<?php 

class VerifyModel extends Model {

    /** Add new user to the users dataset/json file
     * @param userInfo  - an associative array which stores the new users:name,email and password
     * @return **boolean value that inidcates whether the operation to add a new user was successful or has failed 
     */

    public function addUser($userInfo): bool{

        //get users file 
        $users = $this->getFile('users.json');

        //loop through user file to get last id number
        for($i=0;$i<=count($users);$i++)
        {
            $id = $i;//store current id number
        }
        $id++;

        //put all data into a format that can be added to json file
        $newUser = array("user_id"=>$id,"user_first_name"=>$userInfo['fname'],"user_surname"=>$userInfo['lname'],"user_email"=>$userInfo['email'],"user_password"=>$userInfo['password'] );

        //ammend new data to the user array
        array_push($users,$newUser);

        //encode json file 
        $userUpdate = json_encode($users);

        //check if the update to the actual json file is successful 
        if (file_put_contents(ROOT_DIR . '/data/users.json', $userUpdate)){
            return true;//if it works 
        } else {
            return false;
        }

    }

    /** Checks for an existing user with the credentials entered by the new user
     * @param userInfo  - an associative array which stores the new users:name,email and password
     * @return **boolean value that returns true if user already exists 
     */

    public function checkUser($userInfo): bool{

        //get users file 
        $users = $this->getFile('users.json');

        //loop through users 
        foreach($users as $user){
            //check for user with same name as new user
            if($user['user_first_name'] == $userInfo['fname'] && $user['user_first_name'] == $userInfo['lname']){
                return true;
            }
            //check for user with same email as new user
            if($user['user_email'] == $userInfo['email'])
            {
                return true;
            }
        }

        return false;//no user was found with matching credentials

    }

}