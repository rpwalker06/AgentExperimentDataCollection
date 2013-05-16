<?php
session_start();
include 'puzzlepage.php';
require 'puzzlesqlwriter.php';
/**
 * Description of PuzzlePages
 *
 * @author Robert Walker
 */

class InstructionPage extends puzzlePage {
    
    protected function initPage() 
    {
        $this->pageno = 3;
        $this->pageTitle = "Instructions for the Game";
        $this->pageHeading = "Thank you for playing the puzzle game...";
        $this->pageBody = "How to play...</br>";
        $this->pageBody .= "<ul>";
            $this->pageBody .= "<li>The goal of this game is to arrange the tiles in order from 1 to 8 as shown below… </li>";
            $this->pageBody .= "</br><img src='solvedpuzzle.png'/>";
            $this->pageBody .= "<li>In order to make a move, just click on a tile and it will move to the open space on the puzzle board</li>";
            $this->pageBody .=  "<li>When the puzzle is solved you will be presented with another one.  The puzzles do not appear in any particular order of difficulty</li>";
            $this->pageBody .=  "<li>There is no time limit on the puzzle and they will be fun, not hard.  Try to complete the puzzle in as few moves as possible and as quickly as possible.</li>";
            if($_SESSION['agenttype']>0)
            {
                $this->pageBody .=  "<li>For the first two puzzles, a helpful avatar named Alan will help you solve them with the fewest possible moves.</li>";
                $this->pageBody .=  "<li>The remaining puzzles you will do on your own without Alan present.</li>";
            }
        $this->pageBody .= "</ul>";
        }
}

//here we reassign the agent type based on the results from the survey
if ($_POST['button']=="No")
{
    echo "Sorry, but your browser is not compatible with the puzzle game.  Thank you for participating in the study.</br>";
    echo "You may be able to download or update the Java browser plugin, use another browser or computer, or simply try again if you feel like you have reached this page in error.</br>";
    echo "Hope to see you again soon!.</br>";
    die();
}
else
{
    //convert into a submit button
    $_SESSION['participantid'] = puzzleSQLWriter::createParticipant();
    
    if ($_POST['sound']=="Yes") 
    {
        $_SESSION['agenttype'] = ($_SESSION['participantid']%2)+3;
        puzzleSQLWriter::updateAgentType($_SESSION['agenttype'], $_SESSION['participantid']);
    }
    else if ($_POST['sound']=="No")
    {
        $_SESSION['agenttype'] = 2-($_SESSION['participantid']%3);
        puzzleSQLWriter::updateAgentType($_SESSION['agenttype'], $_SESSION['participantid']);
    }
$p = new InstructionPage(true);
echo $p->getPageHTML();   
}
 
?>