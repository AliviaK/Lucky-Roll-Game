<?php
    // Start session
    require_once('startsession.php');
    
    // Get database info
    require_once('connectvars.php');
    
    // Insert page header
    $page_title = 'Home';
    require_once('header.php');

    // Generate the navigation menu
    require_once('navmenu.php');
    
    // Display Users 
    echo '<h2>Player Rankings</h2>';
    echo '<p>(Based on win/loss ratio)</p>';
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

    // Retrieve the score data from MySQL
    $query = "SELECT username, wins, losses, (wins / losses) AS win_ratio FROM game_user ORDER BY win_ratio DESC";
    $data = mysqli_query($dbc, $query)
            or die('Error querying database');

    // Loop through the array of score data, formatting it as HTML 
    echo '<table class="table">';
    echo '<tr><th>Rank</th><th>Player</th><th>Number of Wins</th><th>Number of Losses</th><th>Win/Loss Ratio</th></tr>';
    $i = 1;
    while ($row = mysqli_fetch_array($data)) 
    { 
        // Display the score data
        echo '<tr><td>' . $i . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['wins'] . '</td>';
        echo '<td>' . $row['losses'] . '</td>';
        echo '<td>' . $row['win_ratio'] . '</td></tr>';
        
        $i++;
    }
    echo '</table>';

    mysqli_close($dbc);

    // Insert footer
    require_once('footer.php');
?>
