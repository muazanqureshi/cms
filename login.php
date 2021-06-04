<?php include "includes/db.php";


if (isset($_POST['login_btn'])) {

    $uname = $_POST['username'];
    $pass = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $uname);
    $password = mysqli_real_escape_string($connection, $pass);

    $login_query = "select * from users where user_name = '$username' and user_password = '$password'";
    $login_result = mysqli_query($connection, $login_query);
    echo "<script>window.location.href='index.php'</script>";
}
