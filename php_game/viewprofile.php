<?php
    // Start the session
    require_once('startsession.php');

    // Insert the page header
    $page_title = 'View Profile';
    require_once('header.php');
    
    require_once('connectvars.php');

    // Make sure the user is logged in before going any further.
    if (!isset($_SESSION['user_id'])) 
    {
        echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
        exit();
    }

    require_once('navmenu.php');

    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die ('Error connecting to database');

    // Grab the profile data from the database
    $query = "SELECT username, wins, losses, (wins / losses) AS win_ratio FROM game_user WHERE username = '" . $_SESSION['username'] . "'";
    $data = mysqli_query($dbc, $query)  
            or die('Error querying database');
    if (mysqli_num_rows($data) == 1) 
    {
        echo '<h3>Your Profile Info:</h3>';
        // The user row was found so display the user data
        $row = mysqli_fetch_array($data);
        echo '<table class="table">';
        if (!empty($row['username'])) 
        {
            echo '<tr><td class="label">Username: </td><td>' . $row['username'] . '</td></tr>';
            echo '<tr><td class="label">Wins: </td><td>' . $row['wins'] . '</td></tr>';
            echo '<tr><td class="label">Losses: </td><td>' . $row['losses'] . '</td></tr>';
            echo '<tr><td class="label">Win/Loss Ratio: </td><td>' . $row['win_ratio'] . '</td></tr>';
        }
        echo '</table>';
    } // End of check for a single row of user results
    else 
    {
        echo '<p class="error">There was a problem accessing your profile.</p>';
    }
    
?>

<div>

<?php
    // hero.png illustrated by Geordon Wollner
    echo '<img class="img-fluid" src="img/hero.png" alt="hero">';

    mysqli_close($dbc);
?>

</div>

<?php

    // Insert the page footer
    require_once('footer.php');
?>
