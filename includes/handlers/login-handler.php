<?php
    if(isset($_POST['loginButton'])){
        // Login Button was pressed
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];

        //login function
        $result = $account -> login($username, $password);

        if($result) {
            $_SESSION['userLoggedIn'] = $username;
            $_SESSION['loginTime'] = time();
            header('location: index.php');
        }
    }
?>