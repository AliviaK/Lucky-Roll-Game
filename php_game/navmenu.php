<?php
    // Generate the navigation menu
    echo '<hr /><div class="navbar nav navbar-expand-sm"><ul class="navbar-nav">';
    
    // Display if logged in
    if (isset($_SESSION['username'])) 
    {
        echo '<li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>';
        echo '<li class="nav-item"><a href="useGame.php" class="nav-link text-white">Play</a></li>';
        echo '<li class="nav-item"><a href="viewprofile.php" class="nav-link text-white">View Profile</a></li>';
        echo '<li class="nav-item"><a href="logout.php" class="nav-link text-white">Log Out (' . $_SESSION['username'] . ')</a></li>';
    }
    
    // Display if not logged in
    else 
    {
        echo '<li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>'; 
        echo '<li class="nav-item"><a href="useGame.php" class="nav-link text-white">Play</a></li>';
        echo '<li class="nav-item"><a href="login.php" class="nav-link text-white">Log In</a></li>';
        echo '<li class="nav-item"><a href="signup.php" class="nav-link text-white">Sign Up</a></li>';
    }
    echo '</ul></div><hr />';
?>
