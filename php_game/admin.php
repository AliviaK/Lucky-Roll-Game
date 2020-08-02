<?php
    // Start session
    require_once('startsession.php');
    require_once('connectvars.php');
    
    require_once('authorize.php');
    
    // Insert page header
    $page_title = 'Game Center';
    require_once('header.php');

    // Generate the navigation menu
    require_once('navmenu.php');

    echo '<h2>Admin Access</h2>';
    
    // Connect to the database 
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            
    // Retrieve the score data from MySQL
    $query = "SELECT * FROM game_user";
    $data = mysqli_query($dbc, $query)
            or die('Error querying database');

    // Loop through the array of user data 
    echo '<table>';
    while ($row = mysqli_fetch_array($data)) 
    { 
        // Display user data as a table
        echo '<tr class="scorerow"><td><strong>' . $row['username'] . '</strong></td>';
        echo '<td><a href="removeuser.php?user_id=' . $row['user_id'] . '&amp;username=' . $row['username'] .
                '&amp;wins=' . $row['wins'] . '&amp;losses=' . $row['losses'] . '">Remove</a>';
    }
    echo '</table>';

    // Insert footer
    require_once('footer.php');
?>

