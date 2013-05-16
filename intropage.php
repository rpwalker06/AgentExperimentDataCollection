<?php

include 'puzzlepage.php';

/**
 * Description of PuzzlePages
 *
 * @author Robert Walker
 */
class IntroPage extends puzzlePage {
        
    protected function initPage() 
    {
        $this->pageno = 1;
        $this->pageTitle= "Howard 8 Puzzle Game";
        $this->pageHeading = "Howard Sliding 8 Puzzle";
        $this->pageBody = "An interactive Study by: Robert Walker";
    }
}

$p = new IntroPage(true);
echo $p->getPageHTML();

?>
