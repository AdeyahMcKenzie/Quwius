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

        //initialize user to null 
        $user = NULL;

        //get details entered by user
        if (isset($_POST['email']) && isset($_POST['password']) ){ //check that password and email fields have been filled before attempting to save

            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $mod->getRecord($email);
            
            
        }
        else {
            $loginError = " Please fill in all fields";
        }

        $userExists = false;//change if user is found with email entered
                
        if ($user != NULL  && $user['user_email'] == $email)
        {
            
            //check pasword 
            if($user['user_password'] == $password)
            {
                $userExists = true; //set userExists to true when user is found
            }
            else {
                
                $passwordError = "This password is incorrect. Please try again.";
                //add errors to the login screen
                $vw -> addVar('passwordError',$passwordError);
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
        if ($userExists == false && !isset($passwordError)){
            
            //add errors to the login screen
            $vw -> addVar('loginError',$loginError);

        } else if ($userExists == true && $passwordError == true ){//user exists but password is incorrect 

            //add login errors
            $vw -> addVar('passwordError',$passwordError);

        } 

        

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