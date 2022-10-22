<?php 

class CoursesModel extends Model {
    public function getAll(): array{
        $courseData = $this->getFile('courses.json');

        return $courseData;
    }
}