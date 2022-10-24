<?php 


class ProfileController extends Controller{

    public function run(): void{
        // SET VIEW
        $vw = new View();
        $this->setView($vw);

        

         //create new session
         $session = new SessionClass();
         $session -> create();

        //check if session email set 
        if(isset($_SESSION['email']))//display profile if user is logged in 
        {
            //only show user profile page if they are logged in..
            if ($session->accessible($_SESSION['email'],'profile')){   
                $mod = new ProfileModel('user_courses');
                $this->setModel($mod);
                
                //implement
                 //$mod -> attach($this -> vw);

                 // GET DATA TO BE DISPLAYED BY VIEW
                 $courses = $mod->getFile('user_courses.json');//get user courses
                 $allCourses = $mod->getFile('courses.json');//get all courses
                 $user_courses=[]; //create array to store courses current user is enrolled in

       
        
                //add code to check session email against courses email to find out which user is active
                foreach($courses as $course){
                    if ($_SESSION['email'] == $course['email']){
                    array_push($user_courses,$course);//add current course info to the array
                    }
                }
                // SET TEMPLATE
                $vw->setTemplate(TEMPLATE_DIR . '/profile.tpl.php');
                $vw -> addVar('courses',$user_courses);
                $vw-> addVar('allCourses',$allCourses);

            } else {
                //set the template to login page 
                $vw -> setTemplate(TEMPLATE_DIR .'/login.tpl.php');

                $loginError = " Sorry, there seems to be an error displaying this page";
                $vw->addVar('loginError',$loginError);

        }      
        } else 
        {
            //set the template to login page 
            $vw -> setTemplate(TEMPLATE_DIR .'/login.tpl.php');

            $loginError = " Sorry, you must be logged in to access this page. Please login below.";
            $vw->addVar('loginError',$loginError);    
        }
        // DISPLAY VIEW
        $vw->display();
    }

}