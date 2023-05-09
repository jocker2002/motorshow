<?php
    session_start();

    if ($_SESSION['user']) {
        header('Location: ../profile/profile.php');
    }
    
    # Соединение с базой данных
    require_once 'dbconnection.php';
   
    $email_admin = $_POST['email_admin'];
    $password_admin = $_POST['password_admin'];

    //$password = md5($_POST['password']);
    
    $check_admin = mysqli_query($conn, "SELECT * FROM darbinieks WHERE epasts = '$email_admin' AND parole = '$password_admin'");

    if (mysqli_num_rows($check_admin) == 1) {

        $admin = mysqli_fetch_assoc($check_admin);

        $_SESSION['admin'] = [
            "kods" => $admin['kods'],
            "vards" => $admin['vards'],
            "uzvards" => $admin['uzvards'],
            "personas_kods" => $admin['personas_kods'],
            "amats_kods" => $admin['amats_kods'],
            "talrunis" => $admin['talrunis'],
            "epasts" => $admin['epasts'],
            "piekluves_limenis" => $admin['piekluves_limenis'],
            "avatar" => $admin['avatar'],
        ];

        header('Location: ../admin/profile_admin.php');

    }
    else {
        $_SESSION['message'] = "<div class=\"alert alert-danger\"><p>Nepareizs e-pasts vai parole!</p></div>";
        header('Location: ../login_admin.php');
    }
    ?>
