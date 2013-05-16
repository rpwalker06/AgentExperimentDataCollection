<?php
session_start();
require 'puzzlepage.php';
require 'pageapplet.php';

class PuzzleView extends puzzlePage{
    
    public $experimenttype=0;
    
    public function initPage() 
    {
        $this->pageno = 5;
        $this->pageTitle = "Sliding 8 Puzzle!";
        $this->pageHeading = "Sliding 8 Puzzle";
        
        $applet = new PageApplet("feedBackTest.puzzleApplet.class", "slidingPuzzleFeedback.jar");
        $applet->addParameter("participantid", $_SESSION['participantid']);
        $applet->addParameter("a", $_SERVER['HTTP_HOST']);
        $applet->addParameter("b", $_SESSION['participantid']);
        $applet->addParameter("c", $_SESSION['agenttype']);
        
        $this->pageBody= "Please try to solve each puzzle as quickly as you can.  Start whenever you are ready.</br>";
        $this->pageBody.= $applet->getAppletHTML("puzzleapplet");
    }
}




    $p = new PuzzleView(true);
    echo $p->getPageHTML();
?>

