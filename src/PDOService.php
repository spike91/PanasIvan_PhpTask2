<?php

class PDOService implements IServiceDB
{	
	private $connectDB;
	
	public function connect() {	
        try {
            $this->connectDB = new PDO("pgsql:host=".DB_HOST.";dbname=".DB_DATABASE.";user=".DB_USERNAME.";password=".DB_PASSWORD);
        }		
		catch (PDOException $ex) {
			printf("Connection failed: %s", $ex->getMessage());
			exit();
		}
		return true;
	}

	public function getAllStudents()
	{	
		$students=array();
		if ($this->connect()) {
			if ($result = $this->connectDB->query('SELECT * FROM courses.tstudent')) {
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
					$students[]=$row;
                 } 
			}
		}
        $this->connectDB=null;
		return $students;
	}
	
	public function getAllCourses()
	{	
		$courses=array();
		if ($this->connect()) {
			if ($result = $this->connectDB->query('SELECT * FROM courses.tcourse')) {
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
					$courses[]=new Course($row['course_id'], $row['course_code'], $row['course_name'], 
										$row['course_description']);
                 } 
			}
		}
        $this->connectDB=null;
		return $courses;
	}

	
	public function getCourseByID($id)
	{	
		$course=null;
		if ($this->connect()) {
			if ($result = $this->connectDB->prepare('SELECT * FROM courses.tcourse WHERE id=:id')) {
				$result->execute(array('id'=>$id));
				//$result->execute(['id'=>$id]);
                // $result->bindValue(':id', $id, PDO::PARAM_INT);
                // $result->execute();
				
				$numRows = $result->rowCount();
				if ($numRows==1) {
					$row=$result->fetch();
					$course=new Film($row[0], $row[1], $row[3], $row[2]);
				}
			}
		}
        $this->connectDB=null;
	    return $course;	
	}

    public function getAllCoursesInfo()
	{
		$courses=array();
		if ($this->connect()) {
			if ($result = $this->connectDB->query('SELECT * FROM courses.get_courses_info')) {
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
					$students=array();
					foreach (explode(";",$row['students']) as $item) {
					   $student=explode(",",$item);
					   $students[]=new Student($student[0], $student[1],$student[2],$student[3],$student[4]);
					}
					$languages=array();
					foreach (explode(";",$row['languages']) as $item) {
					   $language=explode(",",$item);
					   $languages[]=new Language($language[0], $language[1]);
					}
					$courses[]=new CourseInfo($row['course_id'], $row['course_code'], $row['course_name'], 
										$row['course_description'],  $students, $languages);					
                 } 				
			}
		    $this->connectDB=null;
		}
		return $courses;
	}

	public function getCourseInfoById($id)
	{
		$course;
		if ($this->connect()) {
			if ($result = $this->connectDB->prepare('SELECT * FROM courses.get_courses_info WHERE course_id=:id LIMIT 1')) {
				$result->execute(array('id'=>$id));
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
					$students=array();
					foreach (explode(";",$row['students']) as $item) {
					   $student=explode(",",$item);
					   $students[]=new Student($student[0], $student[1],$student[2],$student[3],$student[4]);
					}
					$languages=array();
					foreach (explode(";",$row['languages']) as $item) {
					   $language=explode(",",$item);
					   $languages[]=new Language($language[0], $language[1]);
					}
					$course=new CourseInfo($row['course_id'], $row['course_code'], $row['course_name'], 
										$row['course_description'],  $students, $languages);					
                 } 				
			}
		    $this->connectDB=null;
		}
		return $course;
	}

}

