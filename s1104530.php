<?php
    // predefined account and password
    $correct_account = "test";
    $correct_password = "test";

    // check if account and password fields are present
    if(isset($_POST['account']) && isset($_POST['password'])) {
        $account = $_POST['account'];
        $password = $_POST['password'];

        // check if account and password are correct
        if($account == $correct_account && $password == $correct_password) {
            $title = "Account and Password are Correct";
            $content = "Login Successful";
        } else {
            $title = "Account or Password Incorrect";
            $content = "Login Failed, Please Login Again";
            // reload the page after one second
            header("Refresh:1");
        }

        // handle the remember checkbox
        if(isset($_POST['remember'])) {
            // set a cookie with the account name
            setcookie("account", $account, time() + (86400 * 30), "/"); // 86400 = 1 day
        } else {
            // delete the cookie if it exists
            if(isset($_COOKIE["account"])) {
                setcookie("account", "", time() - 3600, "/");
            }
        }
    }
?>
<html>
<head>
    <title><?php echo $title; ?></title>
</head>
<body>
    <?php echo $content; ?>
</body>
</html>