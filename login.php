<?php
include_once 'header.php'
?>
<!-- //Body setup -->
        <header>
            <h1> Watson Interface<h1>
            <h2> A work in progress to share files</h2>
        </header>
        <!-- //Form for log in -->
        <section>
            <div class="glass">
                <form action="includes/login.inc.php" method="post">
                    <h2 class="form__label"> Login </h2>
                    <input type="text" name="uid" placeholder="Username/Email...">
                    <input type="password" name="pwd" placeholder="Password...">
                    <button type="submit" name="submit">Log In</button>
                    <p class="form__label">To Sign Up, contact Administrator</p>
                </form>
                <?php 
                    if(isset($_GET["error"])) {
                        if($_GET["error"] == "emptyinput"){

                            echo "<p>Fill in all Fields</p>";
                        }
                        else if ($_GET["error"] == "wronglogin"){
                            echo "<p>Username or Password was incorrect</p>";
                        }
                    
                    }
                ?>
            </div>
        </section>
    <?php
    include_once 'footer.php'; ?>