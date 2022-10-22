<?php 


class IndexController extends Controller{

    public function run(): void{
        // SET VIEW
        $vw = new View();
        $mod = new IndexModel('courses');

        $this->setView($vw);

        // SET TEMPLATE
        $vw->setTemplate(TEMPLATE_DIR . '/index.tpl.php');
        // SET MODEL
       $this->setModel($mod);
       
        
        //implement
        //$mod -> attach($this -> vw);

        // GET DATA TO BE DISPLAYED BY VIEW
        $data = $mod->getAll();


        $vw -> addVar('data',$data);
        

        // DISPLAY VIEW
        $vw->display();
 
    }
}