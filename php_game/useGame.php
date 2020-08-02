<?php
    // Start session
    require_once('startsession.php');
    
    // Insert page header
    $page_title = 'Game Center';    
?>    

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- Personal stylesheet -->
<link rel="stylesheet" type="text/css" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php
    require_once('Fighter.php');
    require_once('Game.php');
    echo '<title>Lucky Game - ' . $page_title . '</title>';


    if (isset($_SESSION['game']))
    {   
        // Serialize & unserialize Reference: https://stackoverflow.com/questions/1442177/storing-objects-in-php-session
        $boss = unserialize($_SESSION['boss']);
        $hero = unserialize($_SESSION['hero']);
        $game = unserialize($_SESSION['game']);
        
        $game->takeTurn();
        $boss->setFinalValues();
        
        if (isset($_POST['submit']))  
        {   
            $fight = $_POST['fight'];
            
            if ($fight == 'swap')
            {
                $hero->swapValues();              
            }
            else if ($fight == 'keep')
            {
                $hero->setFinalValues();
            }
                
            $hero->faceOff($boss->getFinalAttackStrength());
            $boss->faceOff($hero->getFinalAttackStrength());
            
            
            $hero->takeDamage();
            $boss->takeDamage();
            if ($hero->getHp() <= 0)
            {
                $game->loseGame();
            }
            else if ($boss->getHp() <= 0)
            {
                $game->winGame();
            }
            else
            {      
                $hero->roll();
                $boss->roll();
                require_once('battleground.php');
                
                $_SESSION['game'] = serialize($game);
                $_SESSION['hero'] = serialize($hero);
                $_SESSION['boss'] = serialize($boss); 
            }
        }
        
    }
    else 
    {          
        // Initialize game
        $game = new Game(1);
        $_SESSION['game'] = serialize($game);

        // Initialize player
        $hero = new Fighter(HERO_MAX_HP);      
        $hero->roll();
        $_SESSION['hero'] = serialize($hero);

        // Initialize computer opponent
        $boss = new Fighter(BOSS_MAX_HP);       
        $boss->roll();
        $_SESSION['boss'] = serialize($boss);
        
        require_once('battleground.php');
    }



    // Insert footer
    require_once('footer.php');
?>
