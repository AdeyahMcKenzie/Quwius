<?php 


class CoursesController extends Controller{

    public function run(): void{
        // SET VIEW
        $vw = new View();
        $mod = new CoursesModel('courses');
        
        $this->setView($vw);

        // SET TEMPLATE
        $vw->setTemplate(TEMPLATE_DIR . '/courses.tpl.php');
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