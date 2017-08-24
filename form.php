<pre>
Database Name: <?php
print_r($_POST['dbname']);
?>
</pre>
<pre>
Username: <?php
print_r($_POST['username']);
?>
</pre>
<pre>
Password: <?php
print_r($_POST['password']);
?>
</pre>


<?php if($_POST['dbname']){

    } else{
        echo "<h2 style=\"color:red\">Sorry you did not enter any Database name ";
    }

$host= $_POST['mysqlhost']; 

$root= $_POST['mysqluser']; 
$root_password= $_POST['mysqlpass']; 

$user= $_POST['username'];
$pass= $_POST['password'];
$db= $_POST['dbname'];

    try {
        $dbh = new PDO("mysql:host=$host", $root, $root_password);

        $dbh->exec("CREATE DATABASE `$db`;
                CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass';
                GRANT ALL ON `$db`.* TO '$user'@'localhost';
                FLUSH PRIVILEGES;") 
        or die(print_r($dbh->errorInfo(), true));

    }  catch (PDOException $e) {

        die("<br><br><span class='error' style='color:red';>Can't create database: </span>". $e->getMessage());
    
    }

    if($dbh){
        echo "<h2 style=\"color:green;\">database created</h2>";
    }

?>