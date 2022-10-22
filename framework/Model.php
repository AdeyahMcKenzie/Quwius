<?php 

abstract class Model{
    
    private $json_array;
    //private $mod;

    
    public function getFile($filename): array{
        //grab contents of the file
        $temp = file_get_contents('data/'.$filename);

        //decode json data
        $this->json_array = json_decode($temp,true);
        //var_dump($json_array);

        return $this->json_array;
    }
    /**
     * Returns all courses and their info in the json file in an array
     */
    public function getAll(): array{
              
        return $this->json_array;

    }

    /** @param $id - used to specify a record/course
     * retrieves a specified record from array
     */
    public function getRecord(string $id): array{
        $this->temp = $this->getAll(); 
        //loop the array record by record'/.

        foreach($this->temp as $record){
            if ($record['course_id'] == $id)
            {
                
                //return entire course record in an array
                return $record;
            }
        }
    }
}