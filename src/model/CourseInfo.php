<?php

class CourseInfo extends Course
{
    public $students=array();
    public $languages=array();

    public function __construct($id, $code, $name, $description, $students, $languages)
    {
        $this->id=$id;
        $this->code=$code;
        $this->name=$name;
        $this->description=$description;
        $this->students=$students;
        $this->languages=$languages;
    }
}

