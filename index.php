<?php
require_once "autoloader.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
			///$db=new MySQLiService();
			$db=new PDOService();
            echo "<pre>";
            $courses=$db->getAllCourses();
            
            foreach($courses as $course){
                var_dump($course);
            }
            //var_dump($student=$db->getCourseInfoById(1));
			echo "</pre>";
        ?>
    </body>
</html>
