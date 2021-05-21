
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage users</title>
    <?php include '../HTML-PHP/stylesheetScripts.php';?>

</head>
<body>
    <?php include '../HTML-PHP/main.php';?>
    <script src="../Libraries/jquery-3.6.0.min.js"></script>
    <script src="../JavaScript/removeSearchBar.js"></script>
    <?php include '../DataLayer/UserDbControl.php';?>


    <?php
        if(isset($_SESSION['delete-user-msg']))
        {
            $msg = (string) $_SESSION['delete-user-msg'];
            echo '<h3 class="msg">' . $msg . '</h3>';
            unset($_SESSION['delete-user-msg']);
        }
    ?>
    <div class="users-list-parent">
        <ul class="users-list">
            <?php
                $dbUserControl = new UserDbControl();
                $userControl = new UserControl();
                $dbUserControl->GetUsers($userControl);
                $users = $userControl->GetAllUsers();
                $currUser = unserialize($_SESSION['loggedUser']);

                foreach($users as $user)
                {
                    if($currUser->GetId() != $user->GetId()){
                        $userString = "{$user->GetFName()} {$user->GetLName()} ({$user->GetEmail()})";
                        echo '
                            <li>'. $userString .
                                '<span class="user-admin-controls">
                                    <span class="edit">Here</span>
                                    <span class="remove">&times;</span>
                                </span>
                            </li>
                        ';
                    }
                    ?>
                <?php
                }
                ?>

        </ul>
    </div>
    <script src="../JavaScript/editRemoveSelectedUser.js"></script>
</body>
</html>
