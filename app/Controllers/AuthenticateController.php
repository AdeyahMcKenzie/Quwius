<?php 


class AuthenticateController extends Controller{

    public function run(): void{

        //create new model and view
        $mod = new AuthenticateModel('users');
        $vw = new View();

        //set model
        $this->setModel($mod);

        //get users data set 
        $users = $mod->getFile('users.json'); 

        //get details entered by user
        if (isset($_POST['email']) && isset($_POST['password']) ){ //check that password and email fields have been filled before attempting to save

            $email = $_POST['email'];
            $password = $_POST['password'];
        }

        $userExists = false;//change if user is found with email entered

        //use getRecord method to find a match if it exists
        if ($user = $this->getRecord($email))
        {
            echo " user exists !";
            //check pasword 
            if($user['password'] == $password)
            {
                $userExists = true; //set userExists to true when user is found
            }
            else {
                echo " wrong pass !";
                $passwordError = "This password is incorrect. Please try again.";
            }

        }
        else {

            //create error message to be displayed
            $loginError = "Sorry, this user does not exist. Please verify your login information and try again.";
     
        }

        //only if login details are correct
        if ($userExists)
        {
            //start new session

            //redirect user to profile page
            header("Location: profile.php");
            exit();
        }

        //set view
        $this->setView($vw);

        //only do this if user is not in data store
        if ($userExists == false){
            
            //add errors to the login screen
            $vw -> addVar('loginError',$loginError);

        } else if ($userExists == true && $passwordError == true ){//user exists but password is incorrect 

            //add login errors
            $vw -> addVar('passwordError',$passwordError);

        } 

        //for testing purposes
        $vw -> addVar('message','The add var here works !');

        //set template to login page (user cannot be redirected to course page because they are not logged in )
        $vw->setTemplate(TEMPLATE_DIR . '/login.tpl.php');

        $vw->display();

        exit();
        
        /*
        //check for user 
        foreach($users as $user){
            if ($user['email'] == $email)
            {
                if()
            }
        }*/

    } 
}