<?php
    // User name and password for authentication
    $username = 'Project4';
    $password = 'Bert';

    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
            ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) 
    {
        // The user name/password are incorrect so send the authentication headers
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="Game Center"');
        exit('<h2>Game Center</h2>Sorry, you are not authorized to access this page.');
    }
?>
