<html>
    <head>
          <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    </head>
</html>
<?php
    @session_start();
    if(isset($_POST['login'])) $login = $_POST['login']; 
    if(isset($_POST['password'])) $password = $_POST['password'];
    $con = new MongoClient();
    $collection= $con->notes->users;
    $user = $collection->findOne(array('login' => $login));

    if (empty($user)){
        $user = array('login' => $login, 'password' => md5($password));
        $collection->insert($user);      
        $_SESSION["session_login"] = $login;
        header('location: /tabl_cal.php');
    }
     else {
        echo "<div class='alert alert-danger' role='alert'>Choose another login</div>";
    }
    $con -> close();     
       


 