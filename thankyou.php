<?php
session_start();
require 'puzzlepage.php';
require 'puzzlesqlwriter.php';
/**
 * Description of PuzzlePages
 *
 * @author Robert Walker
 */
class ThankYou extends puzzlePage {

    protected function initPage() 
    {
        $this->pageno = 7;
        $this->pageTitle = "Thank you for playing the Puzzle Game";
        $this->pageHeading = "Thank you!";
        $this->pageBody = "Thank you for your participation in the Puzzle Game Study!  ";
        $this->pageBody .="If you have any questions at all, feel free to contact your investigator at: rwalker at scs.howard.edu";
    }
}

puzzleSQLWriter::finalizeTest($_SESSION['participantid']);
$p = new ThankYou(false);
echo $p->getPageHTML();

?>


