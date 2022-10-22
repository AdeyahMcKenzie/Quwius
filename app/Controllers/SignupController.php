<?php 


class SignupController extends Controller{

    public function run(): void{
        // SET VIEW
        $vw = new View();
        
        $this->setView($vw);

        // SET TEMPLATE
        $vw->setTemplate(TEMPLATE_DIR . '/signup.tpl.php');
        // SET MODEL
       //$this->setModel($mod);
       
        
        //implement
        //$mod -> attach($this -> vw);

        // GET DATA TO BE DISPLAYED BY VIEW
        //$data = $mod->getAll();


        //$vw -> addVars($data);
        

        // DISPLAY VIEW
        $vw->display();

        
    }
}