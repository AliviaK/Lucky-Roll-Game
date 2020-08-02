<?php
    require_once('connectvars.php');
    require_once('Fighter.php');
    
    class Game 
    {
        private $turnNumber;      // The current turn
        private $swap;            // Switch values of hero attack and defend rolls
        
        
        // Constructor   
        public function __construct($turnNumber)  
        {
            $this->turnNumber = $turnNumber;
        } 
        
        // Getters
        public function getTurnNumber()
        {
            return $this->turnNumber;
        }
        
        public function getSwap()
        {
            return $this->swap;
        }
        
        // Setters
        public function setTurnNumber($turnNumber)
        {
            $this->turnNumber = $turnNumber;
        }
        
        public function setSwap($swap)
        {
            $this->swap = $swap;
        }
        
        
        // Function to increment current game's turn number
        public function takeTurn()
        {
            $this->turnNumber++;
        }
        
        // Function to display winning message, and if logged in, enter user won game data into database
        public function winGame()
        {
            echo '<div class="container"><h1 class="text-center">You won!!</h1>';
            echo '<div class="text-center"><a href="index.php">Go Home, Hero!</a></div>';
            // hero.png illustrated by Geordon Wollner
            echo '<img class="img-fluid" src="img/hero.png" alt="hero">';
            
            // Check to see if user is logged in    
            if (isset($_SESSION['user_id']))
            {
                $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                }
            
                $username = mysqli_real_escape_string($conn, trim($_SESSION['username'])); 

                // Update wins on user account
                $sql = "UPDATE game_user SET wins = wins + 1 WHERE username = '$username'";
                if ($conn->query($sql) !== TRUE) 
                {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }               

                $conn->close();
            }
            
            unset($_SESSION['game']);
        }
        
        // Function to display losing message, and if logged in, enter user lost game data into database
        public function loseGame() 
        {
            echo '<div class="container"><h1 class="text-center">You Have Died</h1>';
            echo '<div class="text-center"><a href="index.php">Let\'s go Home</a></div>';
            // boss.png illustrated by Geordon Wollner
            echo '<img class="img-fluid" src="img/boss.png" alt="boss">';
            
            if (isset($_SESSION['user_id']))
            {
                $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                }
            
                $username = mysqli_real_escape_string($conn, trim($_SESSION['username'])); 

                // Update losses on user account
                $sql = "UPDATE game_user SET losses = losses + 1 WHERE username = '$username'";
                if ($conn->query($sql) !== TRUE) 
                {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
            
            unset($_SESSION['game']);
        }
        
    
    }
?>
