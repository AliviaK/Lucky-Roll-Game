<?php
    // Start session
    require_once('startsession.php');
    require_once('authorize.php');
    require_once('connectvars.php');


    // Insert page header
    $page_title = 'Remove User';
    require_once('header.php');

    if (isset($_GET['user_id']) && isset($_GET['username']) && isset($_GET['wins']) && isset($_GET['losses'])) 
    {
        // Grab user data from the GET
        $user_id = $_GET['user_id'];
        $username = $_GET['username'];
        $wins = $_GET['wins'];
        $losses = $_GET['losses'];
    }
    else if (isset($_POST['user_id']) && isset($_POST['username']) && isset($_POST['wins']) && isset($_POST['losses'])) 
    {
        // Grab user data from the POST
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $wins = $_POST['wins'];
        $losses = $_POST['losses'];
    }
    else 
    {
        echo '<p class="error">Sorry, no user was specified for removal.</p>';
    }

    if (isset($_POST['submit'])) 
    {
        if ($_POST['confirm'] == 'Yes') 
        {

            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

            // Delete user data from the database
            $query = "DELETE FROM game_user WHERE user_id = $user_id LIMIT 1";
            mysqli_query($dbc, $query)
                    or die('Error querying database');
            
            mysqli_close($dbc);

            // Confirm deletion with admin
            echo '<p>The user ' . $username . ' was successfully removed.';
        }
        else 
        {
            echo '<p class="error">User was not removed.</p>';
        }
    }
    
    // Confirm request to delete selected user
    else if (isset($user_id) && isset($username) && isset($wins) && isset($losses)) 
    {
        echo '<p>Are you sure you want to delete the following user?</p>';
        echo '<p><strong>Username: </strong>' . $username;
        echo '<form method="post" action="removeuser.php">';
        echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
        echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
        echo '<input type="submit" value="Submit" name="submit" />';
        echo '<input type="hidden" name="user_id" value="' . $user_id . '" />';
        echo '<input type="hidden" name="username" value="' . $username . '" />';
        echo '<input type="hidden" name="wins" value="' . $wins . '" />';
        echo '<input type="hidden" name="losses" value="' . $losses . '" />';
        echo '</form>';
    }

    echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';
?>

</body> 
</html>
