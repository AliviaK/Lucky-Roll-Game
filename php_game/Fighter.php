<?php
    require_once('connectvars.php');
    const HERO_MAX_HP = 20;
    const BOSS_MAX_HP = 30;
    
    class Fighter 
    {
        private $hp;                          // Fighter's hp after taking damage
        private $attackStrength;              // Fighter's attack total after chance multipliers
        private $defendStrength;              // Fighter's defense total after chance multipliers
        private $finalAttackStrength;         // Fighter's attack total after swapping
        private $finalDefendStrength;         // Fighter's defense total after swappinh
        private $damageDealt;                 // Amount of damage fighter will take
            
          
        // Constructor   
        public function __construct($hp)  
        {
            $this->hp = $hp;
        } 
           
        // Getters
        public function getHp()
        {
            return $this->hp;
        }
        
        public function getAttackStrength()
        {
            return $this->attackStrength;
        }
        
        public function getDefendStrength()
        {
            return $this->defendStrength;
        }
                
        public function getFinalAttackStrength()
        {
            return $this->finalAttackStrength;
        }
        
        public function getFinalDefendStrength()
        {
            return $this->finalDefendStrength;
        }
        
        public function getDamageDealt()
        {
            return $this->damageDealt;
        }


        // Setters
        public function setHp($hp)
        {
            $this->hp = $hp;
        }
        
        public function setAttackStrength($attackStrength)
        {
            $this->attackStrength = $attackStrength;
        }
        
        public function setDefendStrength($defendStrength)
        {
            $this->defendStrength = $defendStrength;
        }
        
        public function setFinalAttackStrength($finalAttackStrength)
        {
            $this->finalAttackStrength = $finalAttackStrength;
        }
        
        public function setFinalDefendStrength($finalDefendStrength)
        {
            $this->finalDefendStrength = $finalDefendStrength;
        }
        
        public function setDamageDealt($damageDealt)
        {
            $this->damageDealt = $damageDealt;
        }
        
        
        // Function to swap values of attack and defense rolls
        public function setFinalValues()
        {
            $this->setFinalAttackstrength($this->attackStrength);
            $this->setFinalDefendStrength($this->defendStrength);
        }
        
        // Function to swap values of attack and defense rolls
        public function swapValues()
        {
            $this->setFinalAttackstrength($this->defendStrength);
            $this->setFinalDefendStrength($this->attackStrength);
        }
      
        // Function to roll attack and defend for a Fighter object
        public function roll() 
        {
            $this->attackStrength = rand(1,6);
            $this->defendStrength = rand(1,6);
        }
        
        // Function to deal damage
        public function takeDamage()
        {
            $this->hp = $this->hp - $this->damageDealt;
        }
                
        // Function to determine damage dealt
        public function faceOff($incomingDamage)
        {
            if ($this->finalDefendStrength - $incomingDamage > 0)
            {
                $this->setDamageDealt(0);                
            }
            else
            {
                $this->setDamageDealt($incomingDamage - $this->finalDefendStrength);
            }
        }
    }
?>
