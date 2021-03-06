<?php
require_once "autoloader.php";
?>
<!--
Author: Ivan Panas RDIR51
Task description:
    "Kolledzi tudengite registreerimine kursustele (PHP)
Loo veebirakendus, mis sisaldab informatsiooni kursuste ja registreeritud tudengitekohta

Pealehel ilmub kursuste nimekiri (kursuse nimetus ja kood)
Kasutaja võib valida kursuse ja vaadata teiselt lehelt kursuse täisinformatsiooni ja registreeritud tudengite nimesid.
Realiseerimisel looge klassid, mis kirjeldavad süsteemi mudelit

Hindamise ajal hinnatakse ka kasutajaliidest

Kasutage Git"
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title></title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    </head>
    <body style="">
        <header class="py-5 bg-dark" style="margin-bottom: 40px;height: 30px">
                    <div class="h2 text-center" style="color: #dcdcdc;">All Courses </div>
        </header>
        <div class="container">
            <div class="row" >
                <table class="table table-striped table-hover">
                    <thead class="thead-inverse">
                    <tr>
                        <th><div class="text-center">Id</div></th>
                        <th><div class="text-center">Code</div></th>
                        <th><div class="text-center">Name</div></th>
                        <th><div class="text-center">Actions</div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $db=new PDOService();
                    $courses=$db->getAllCourses();

                    foreach($courses as $course){?>
                        <tr>
                            <td><div class="text-center"><?php echo $course->id ?></div></td>
                            <td><div class="text-center"><?php echo $course->code ?></div></td>
                            <td><div class="text-center"><?php echo $course->name ?></div></td>
                            <td>
                                <form method="get">
                                    <div class="text-center">
                                        <a href="CourseInfo.php?courseId=<?php echo $course->id ?>" name="courseId">
                                            <button type="button" class="btn btn-dark" type="submit">More info</button>
                                        </a>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <?php
                     }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

<footer class="py-4 bg-dark" style="bottom: 0;position: fixed;width: 100%">
    <div class="h6 text-center" style="color: #dcdcdc;">Ivan Panas RDIR51</div>
</footer>
    </body>
</html>
