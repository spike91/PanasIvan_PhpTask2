<?php
require_once "autoloader.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body style="">
<header class="py-5 bg-dark" style="margin-bottom: 40px;">
    <div class="container-fluid">
        <div class="row">
        </div>
    </div>
</header>

<div class="container">
    <?php
    $db = new PDOService();
    $course = $db->getCourseInfoById($_REQUEST['courseId']);
    ?>
    <div class="row-fluid">
        <table class="table table-striped table-hover">
            <thead class="thead-inverse">
            <tr>
                <th>
                    <div class="text-center">Course Info</div>
                </th>
            </tr>
            </thead>
        </table>
    </div>

    <div class="row-fluid">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <td>
                    <div class="col-lg-3"> id</div>
                </td>
                <td>
                    <div class="text-left col-lg-9"><?php echo $course->id ?></div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row-fluid">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <td>
                    <div class="col-lg-3">code</div>
                </td>
                <td>
                    <div class="text-left col-lg-9"> <?php echo $course->code ?> </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row-fluid">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <td>
                    <div class="col-lg-3">name</div>
                </td>
                <td>
                    <div class="text-left col-lg-9"> <?php echo $course->name ?> </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row-fluid">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <td style="width: 30%;">
                    <div class="col-lg-3">description</div>
                </td>
                <td>
                    <div class="text-center col-lg-9"> <?php echo $course->description ?> </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row-fluid">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <td style="width: 30%;">
                    <div class="col-lg-3">students</div>
                </td>
                <td>
                    <div class="text-center col-lg-9">

                        <!-- List group -->
                        <ul class="list-group">
                            <?php
                            foreach ($course->students as $student) {
                                ?>
                                <li class="list-group-item"><?php echo $student->firstname . ' ' . $student->lastname . ' ' . $student->code_group ?></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

</div>
</div>


</body>
</html>