
<?php 
//require 'autoloader.php';


class View{

    private $tpl;
    private $varArr = [];
    
    public function setTemplate($filename): void{
        //Paraemeter verification
        if (is_string($filename)){
           
            if(file_exists($filename)){//check that file exists
                
                $this->tpl = $filename;
                
            } else {
                //throw exception to warn that file doesn't exist
                throw new Exception ('Sorry, the file ' . $filename . ' does not exist.'); 
            }
        } else {
           throw new InvalidArgumentException ('Invalid parameter, please pass a string to this function.');
       }    

    }


    public function display(): string{

        
        $displayText = extract($this ->varArr);
        require $this -> tpl;

        return $displayText;
         
    }

    public function addVars(array $variables){
        if(empty($variables)){
            throw new \InvalidArgumentException('Empty Input');
        }
    
        foreach ($variables as $name=>$value){
            $this -> varArr[$name] = $value;
        }
      }

    public function addVar($name, $value): void{
        $this -> varArr[$name] = $value;
    }
}


