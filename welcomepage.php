<?php

require 'surveypage.php';
require 'pageapplet.php';
/**
 * Description of PuzzlePages
 *
 * @author Robert Walker
 */
class WelcomePage extends surveyPage {

    protected function initPage() 
    {
        $this->pageno = 2;
        $this->pageTitle = "Welcome to the Puzzle Game";
        $this->pageHeading = "Welcome...";
        $this->pageBody = "Thank you for participating in the Puzzle Game Study!  ";
        $this->pageBody .="We are investigating the effect that different types of interfaces have on how people play interactive games.  In this study you will attempt to solve a puzzle in as few moves as possible.  There will be an initial questionnaire that asks about your experience playing interactive games and solving puzzles.  Then you will have a chance to play the game.  After solving the puzzle a few times, you will fill out a small questionnaire and the study will conclude.  ";
        $this->pageBody .= "Thank you for participating and have fun!  ";
        $this->pageBody .= "<p>";
        $this->pageBody .= "This game uses the Java plugin in your browser.  Please make sure that Java is enabled in your browser and that you allow the page to load the applet.  The applet will not try to collect your information, send you spam or download anything without your permission.  This should work with all browsers.</p>";
        $this->pageBody .= "<p>";
        $this->pageBody .= "It is preferred that you play the game with sound if you are able to hear it.  Below is a test for java compatibility and sound.</br>";
        $this->pageBody .= "If you are not able to play the game with sound, that is perfectly fine.  Simply mark below if the Java button loads on the page.";
        $this->pageBody .= "</br>Note: If you are unable to see the button at the bottom of the page after allowing Java to run, then you will not be able to play the game.</br>";
        $this->pageBody .= $this->writeSoundTest();
        $this->pageBody .= "</p>";
    }
    
    function writeSoundTest()
    {
        $applet = new PageApplet("soundTest.soundTest.class", "soundTest.jar");
        
        $echo="</br><div class='soundtest'>";
        $echo.="Please run the Java program below and click the button to test sound and Java compatibilty.";
        $echo.=$applet->getAppletHTML("testapplet");
        $echo.="</div>";
        $echo.="</br><div class='soundform'>";
        $echo.=$this->writeFormHeader("instructionpage.php");
        
        $echo.= "<div class='works'>";
        $echo.= "<b>Are you able to see and click the button?</b>   ";
        $echo.= "<select name='button'>";
            $echo.= $this->fillOptionandValue("No");
            $echo.= $this->fillOptionandValue("Yes");
        $echo.= "</select></br>";
        $echo.= "<b>Are you able to hear the sound?</b>   ";
        $echo.= "<select name='sound'>";
            $echo.= $this->fillOptionandValue("No");
            $echo.= $this->fillOptionandValue("Yes");
        $echo.= "</select>";
        $echo.= "</div></br>";
        $echo.=$this->writeSubmitButton("Done Testing!");
        $echo.="</form>";
        
      return $echo;
    }
}

$p = new WelcomePage(false);
echo $p->getPageHTML();
?>


