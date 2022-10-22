<?php 

class LoginModel extends Model {

    public function getRecord(string $id): array{
        //store users array
        $this->users = $this->getFile('users.json'); 

        foreach($users as $user){
            //check for a match in the dataset
            if ($user ['user_id'] == $id)
            {
                //return entire course record in an array
                return $user;
            }
        }
    }
}