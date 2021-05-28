<?php
include_once 'header.php'
?>
<!-- //Body setup -->
        <header>
            <h1> Watson Interface<h1>
            <h2> A work in progress to share files</h2>
<!-- //Form for Signup -->
        </header>
        <section>
            <div class="glass">    
                <form action="includes/signup.inc.php" method="post">
                    <input type="text" name="name" placeholder="Full Name...">
                    <input type="text" name="email" placeholder="Email...">
                    <input type="text" name="uid" placeholder="Username...">
                    <input type="password" name="pwd" placeholder="Password...">
                    <input type="password" name="pwdrepeat" placeholder="Repeat Password...">
                    <button type="submit" name="submit">Sign up</button>
                </form>
                <?php 
                    if(isset($_GET["error"])) {
                        if($_GET["error"] == "emptyinput"){

                            echo "<p>Fill in all Fields</p>";
                        }
                        else if ($_GET["error"] == "invaliduid"){
                            echo "<p>Please Choose a Proper Username</p>";
                        }
                        else if ($_GET["error"] == "invalidemail"){
                            echo "<p>Please Choose a Proper Email</p>";
                        }
                        else if ($_GET["error"] == "passwordsdontmatch"){
                            echo "<p>passwpords didnt match</p>";
                        }
                        else if ($_GET["error"] == "stmtfailed"){
                            echo "<p>Something Fucked up, Try Again</p>";
                        }
                        else if ($_GET["error"] == "usernametaken"){
                            echo "<p>That Username is already being used</p>";
                        }
                        else if ($_GET["error"] == "none"){
                            echo "<p>You have signed up</p>";
                        }
                    }
                ?>
            </div>
        </section>                

    
    <?php
    include_once 'footer.php'; ?>