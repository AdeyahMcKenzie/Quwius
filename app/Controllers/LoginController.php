<?php 


class LoginController extends Controller{

    public function run(): void{
        // SET VIEW
        $vw = new View();//create new view
        $this->setView($vw);//set view

        // SET TEMPLATE
        $vw->setTemplate(TEMPLATE_DIR . '/login.tpl.php');
       
        // DISPLAY VIEW
        $vw->display();
     
    }
}