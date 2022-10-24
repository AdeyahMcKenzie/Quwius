<?php 


class SignupController extends Controller{

    public function run(): void{
        // SET VIEW
        $vw = new View();
        
        $this->setView($vw);

        // SET TEMPLATE
        $vw->setTemplate(TEMPLATE_DIR . '/signup.tpl.php');
        
        // DISPLAY VIEW
        $vw->display();

        
    }
}