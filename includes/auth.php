<?php
    session_start();

    if ($_SESSION['user']) {
        header('Location: ../profile/profile.php');
    }
    
    # Соединение с базой данных
    require_once 'dbconnection.php';
   
    $username = $_POST['username'];
    $password = $_POST['password'];

    //$password = md5($_POST['password']);
    
    $check_user = mysqli_query($conn, "SELECT * FROM lietotajs WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($check_user) == 1) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "kods" => $user['kods'],
            "username" => $user['username'],
            "password" => $user['password'],
            "avatar" => $user['avatar']
        ];

        header('Location: ../profile/profile.php');

    }
    else {
        $_SESSION['message'] = "<div class=\"alert alert-danger\"><p>Nepareizs lietotājvārds vai parole!</p></div>";
        header('Location: ../login.php');
    }
    ?>
