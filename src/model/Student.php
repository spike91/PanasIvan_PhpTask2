<?php

class Student
{
    public $code_student;
    public $lastname;
    public $firstname;
    public $personal_id;
    public $code_group;

     public function __construct($code_student, $firstname, $lastname, $personal_id, $code_group)
     {
         $this->code_student=$code_student;
         $this->firstname=$firstname;
         $this->lastname=$lastname;
         $this->personal_id=$personal_id;
         $this->code_group=$code_group;
     }
}