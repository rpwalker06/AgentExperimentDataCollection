<?php
    class experimentSequence {
        
        private $sequence;
                
        function __construct() {
            $this->definePages();
        }
        
        public function getSequence()
            {return $this->sequence;}
            
        function definePages()
        {
            $this->sequence = Array();
            
            $this->sequence[] = "missing.php";
            $this->sequence[] = "intropage.php";
            $this->sequence[] = "welcomepage.php";
            $this->sequence[] = "instructionpage.php";
            $this->sequence[] = "pregamesurveypage.php";
            $this->sequence[] = "puzzleview.php";
            $this->sequence[] = "postgamesurveypage.php";
            $this->sequence[] = "thankyou.php";
        }
    }
?>