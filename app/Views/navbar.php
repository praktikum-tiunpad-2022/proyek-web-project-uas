<?php
session_start();
$level = $_SESSION["level"];

if ($_SESSION["level"] == "1"){
    $sql = "SELECT * FROM users where username = '$username'";
}

else{
    $sql = "SELECT * FROM users order by username";
}
?>

<nav class="navbar" style="background-color: #555555; color: #ffffff;">
    <div class="container">
        <h1><a href="dashboard.html"></a>MyStreamingList</h1>
        <ul style="list-style-type: none; display: inline-block">
            <li style="display: inline-block"><a href="contact">
                    <div class="btn-clear">Contact Us</div>
                </a>
            </li>
            <li style="display: inline-block"><a href="about">
                    <div class="btn-clear">About</div>
                </a>
            </li>
            <?php
                if($level == ""){
                ?>
                <li style="display: inline-block"><a href="login">
                    <div class="btn2">Login</div>
                </a>
                </li>
                <li style="display: inline-block"><a href="register">
                    <div class="btn2">Sign Up</div>
                </a>
                </li>
            <?php
            }
            ?>
            <?php
                if($level == "1" || $level == "2" ){
                ?>
                <li style="display: inline-block"><a href="logout">
                    <div class="btn2">Logout</div>
                </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>