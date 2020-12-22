<?php
include "app/Database.php";
include "app/User.php";

$db = new \exam\App\Database();

    if (isset($_GET['em_search']) || isset($_GET['em_salary'])) {
        $data = $db->searchMember(@$_GET['em_search'],@$_GET['em_salary']);
    }else{
        $data = $db->getData();
    }

	if (isset($_POST['save'])) {
	    $members = new \Exam\App\User($_POST);
        $members->registration();
	}

    if (isset($_GET['sort'])) {
        $data = $db->sortMember(@$_GET['sort'],@$_GET['type']);
    }else{
        $data = $db->getData();
    }

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="post">
    <label for="">Name</label>
    <br>
    <input type="text" name="name" placeholder="Name">
    <br>
    <label for="">age</label>
    <br>
    <input type="text" name="age" placeholder="age">
    <br>
    <label for="">experience</label>
    <br>
    <input type="text" name="experience" placeholder="experience">
    <br>
    <label for="">contact</label>
    <br>
    <input type="text" name="contact" placeholder="contact">
    <br>
    <label for="">salary</label>
    <br>
    <input type="text" name="salary" placeholder="salary">
    <br>
    
         <input type="submit" name="save" value="Submit">
    
     </form>
    <br>

    <form action="index.php" method="GET">
        <input type="text"  name="em_search" placeholder="Search Employee"/>
        <input type="text"  name="em_salary" placeholder="Search Employee"/>
        <input type="submit" value="search" >
    </form>
<table>
    <tr>
        <th>Name</th>
        <th><a href="index.php?sort=age&type=asc">Age</a></th>
        <th><a href="index.php?sort=experience&type=asc">Experience</th>
        <th>Contact</th>
        <th><a href="index.php?sort=salary&type=asc">Salary</th>
    </tr>
    <?php foreach($data as $key => $member): ?>
        <tr>
            <td><?php echo $member['name'] ?></td>
            <td><?php echo $member['age'] ?></td>
            <td><?php echo $member['experience'] ?></td> 
            <td><?php echo $member['contact'] ?></td>
            <td><?php echo $member['salary'] ?></td>
        </tr>
    <?php endforeach; ?>
    
</table>


</body>
</html>