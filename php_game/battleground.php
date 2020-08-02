  <body>    
      <div class="container">        

        <h2 class="text-white hp">Boss HP: <?php echo $boss->getHp(); ?></h2>
                
        <div class="card-deck"> 
            <div class="card dice">
                <!-- boss.png illustrated by Geordon Wollner-->
                <img class="img-fluid" src="img/boss.png" alt="Boss">      
            </div> 
             
            <div class="card dice">
            <!-- attack-02.png illustrated by Geordon Wollner-->
            <img class="card-img-top" src="img/attack-02.png" alt="sword">
                <div class="card-img-overlay">      
                    <h2 class="card-title text-center text-white hp">Is About to Attack for</h2> 
                    <p class="text-center text-white dice-number"><?php echo $boss->getAttackStrength(); ?> </p>
                </div>
            </div> 
            
            <div class="card dice"> 
            <!-- defend-01.png illustrated by Geordon Wollner--> 
            <img class="card-img-top" src="img/defend-01.png" alt="shield">    
                    <div class="card-img-overlay">
                    <h2 class="card-title text-center text-white hp">Is About to Block for</h2>
                        <p class="text-center text-white dice-number"><?php echo $boss->getDefendStrength(); ?> </p>
                    </div>
            </div>  
        </div> 
     
    <br />
    <div class="card-deck">
        <div class="card fight-card">
            <h2 class="text-white text-center hp">Turn <?php echo $game->getTurnNumber(); ?></h2>
            <p>As our Hero, you have the ability to swap the values of your rolled block and attack stats each turn. 
                Look at your rolled stats to the right of our Hero for this turn. Will you keep your stats, or swap?
            </p>
        </div>  
<?php
    if ($game->getTurnNumber() > 1)
    {
        echo '<div class="card fight-card text-center"><p>Boss attacks for ' . $boss->getFinalAttackStrength() . '</p>'; 
        echo '<p>You block for ' . $hero->getFinalDefendStrength() . '</p>'; 
        echo '<p>You are hurt for ' . $hero->getDamageDealt() . '</p></div>';
        echo '<div class="card fight-card text-center"><p>You attack for ' . $hero->getFinalAttackStrength() . '</p>';
        echo '<p>Boss blocks for ' . $boss->getFinalDefendStrength() . '</p>';
        echo '<p>Boss is hurt for ' . $boss->getDamageDealt() . '</p></div>';   
    }
?>  
    </div> 

        <h2 class="text-white hp">Hero HP: <?php echo $hero->getHp(); ?> </h2>
    
    <div class="card-deck">
        <div class="card">
        <!-- hero.png illustrated by Geordon Wollner-->
        <img class="card-img-top" src="img/hero.png" alt="Hero">
            <div class="card-img-overlay">
                <form method="post" class="hero" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="radio" id="keep" name="fight" value="keep" checked="checked">
                    <label for="keep">Keep</label>
                    <input type="radio" id="swap" name="fight" value="swap">
                    <label for="swap">Swap</label><br />
                    <input type="submit" value="Go!" name="submit" />
                </form>
            </div>
        </div>
        
        
        <div class="card dice">
        <!-- defend-01.png illustrated by Geordon Wollner-->  
        <img class="card-img-top" src="img/defend-01.png" alt="shield">    
                <div class="card-img-overlay">
                    <h2 class="card-title text-center text-white hp">Is About to Defend for</h2>
                    <p class="text-center text-white dice-number"><?php echo $hero->getDefendStrength(); ?> </p>
                </div>
        </div>
        
        <div class="card dice">
        <!-- attack-02.png illustrated by Geordon Wollner-->
        <img class="card-img-top" src="img/attack-02.png" alt="sword">
            <div class="card-img-overlay">      
                <h2 class="card-title text-center text-white hp">Is About to Attack for</h2> 
                <p class="text-center text-white dice-number"><?php echo $hero->getAttackStrength(); ?> </p>
            </div>
        </div> 
    </div> 

