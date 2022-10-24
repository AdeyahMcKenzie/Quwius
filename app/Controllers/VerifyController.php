<?php 


class VerifyController extends Controller{

    public function run(): void{

        //create new model and view
        $mod = new VerifyModel('users');
        $vw = new View();

        //set model
        $this->setModel($mod);

        //get information entered in form 
        if(isset($_POST))
        {
            //set view
            $this->setView($vw);

            //if(isset($_POST))
            if (isset($_POST['email'])){
                $email = $_POST['email'];
            }
            if (isset($_POST['password'])){
                $password = $_POST['password'];
            }
            if(isset($_POST['password2']))
            {
                $vPassword = $_POST['password2'];
            }
            if (isset($_POST['name']))
            {
                $name = $_POST['name'];
                $space = strrpos($name," ");
                
                $fname = substr($name,0,(-$space));
                $lname = substr($name,($space+1));
            }
           
            
            
            

             //check passwords match
             if ($password == $vPassword){
                 $passwordMatch = true;
             }else{
                $passwordMatch = false;
                $passwordErr = "Passwords do not match.";
                $vw -> addVar('passwordErr',$passwordErr);
        
                //set template for redirect message
                $vw->setTemplate(TEMPLATE_DIR . '/signup.tpl.php');

                //$vw->display();

                //exit();
                
             }

             //create array to pass to verification functions
             $user = array ("fname"=>$fname,"lname"=>$lname,"email"=>$email,"password"=>$password);

             //call verification function
             if($mod->checkUser($user) == true)
             {
                 //create error is checkUser function is true
                 $registerErr = "A user already exists with these credentials. Try adding a middle initial behind your firstname to resolve this problem or use a new email.";
                 $vw -> addVar('registerErr',$registerErr);

                 //set template for redirect message
                 $vw->setTemplate(TEMPLATE_DIR . '/signup.tpl.php');

                //$vw->display();

                //exit();

             }

             //add new user if user doesn't already exist
             if($mod->checkUser($user) == false)
             {
                 //check if new user added successfully
                if($mod->addUser($user) == true){
                    $success = "SignUp successful. Please login below !";
                    $vw -> addVar('success',$success);
                    $vw -> addVar('email',$email);//send email to login page to facilitate easier login

                    //set template for redirect message
                    $vw->setTemplate(TEMPLATE_DIR . '/login.tpl.php');

                 
                }else {
                    $fail = "There was some trouble creating your account, please try again.";
                    $vw -> addVar('fail',$fail);
                    //set template for redirect message
                    $vw->setTemplate(TEMPLATE_DIR . '/signup.tpl.php');
                }

                
             }
             

             

             $vw->display();
             exit();  
        }
    }
}