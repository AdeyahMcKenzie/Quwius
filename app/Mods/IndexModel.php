<?php 

class IndexModel extends Model {

    

    /**
     * Returns all courses and their info in the json file in an array
     */ 
    public function getAll(): array{
        //retrieve data from json fle 
        $courseData = $this->getFile('courses.json');

        //clone courseData for sort 
        $data_copy = $courseData;

        //get popular courses column
        $popular_col = array_column($courseData,'course_access_count');
        //get recommended courses column 
        $recommended_col = array_column($courseData,'course_recommendation_count');

        
        //sort by most popular 
        array_multisort($popular_col, SORT_DESC, $courseData);
        //sort by most recommended
        array_multisort($recommended_col, SORT_DESC, $data_copy);

        //filter out top 8 popular
        $popular = array_slice($courseData, 0, 8);
        //filter out top 8 recommended 
        $recommended = array_slice($data_copy, 0, 8);


       return ['popular'=>$popular, 'recommended'=>$recommended];
    }

    
}