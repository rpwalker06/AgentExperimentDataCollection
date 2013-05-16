<?php
/**
 * Description of PuzzlePages
 *
 * @author Robert Walker
 */
session_start();
require 'surveypage.php';
require 'puzzleformreader.php';

class PostGameSurveyPage extends surveyPage{
        
    function setFieldList() {
        parent::setFieldList();
        $this->formreader = new PostGameSurveyFormReader();
    }
    
    protected function initPage()
    {
        $i = 0;
        
        $this->pageno = 6;
        $this->pageTitle = htmlspecialchars("Postgame Survey ");
        $this->pageHeading = htmlspecialchars("Now to get your impressions of the game...");
        //$this->pageBody = htmlspecialchars("While we don’t need any personally identifying information from you we would like to know some general vital stats about you"). "</br>";
        $this->pageBody = $this->writeFormHeader($this->formreader->getFormAction());
            $this->pageBody .= $this->writeHiddenInput($this->formreader->getFieldNameByIndex($i++), $_SESSION['participantid']);
            
            //print different questions based on the agent type 
            $this->pageBody .= $this->writeLikertScale($this->formreader->getFieldNameByIndex($i++),"The puzzle game was fair" , "Strongly Disagree","Strongly Agree");
            $this->pageBody .= $this->writeLikertScale($this->formreader->getFieldNameByIndex($i++),"The puzzle game was difficult" , "Strongly Disagree","Strongly Agree");
            $this->pageBody .= $this->writeLikertScale($this->formreader->getFieldNameByIndex($i++),"I did a good job solving the puzzles" , "Strongly Disagree","Strongly Agree");
            $this->pageBody .= $this->writeLikertScale($this->formreader->getFieldNameByIndex($i++),"I enjoyed solving the puzzles" , "Strongly Disagree","Strongly Agree");
            $this->pageBody .= $this->writeLikertScale($this->formreader->getFieldNameByIndex($i++),"I am better at solving these types of puzzles than I was before." , "Strongly Disagree","Strongly Agree");

            if($_SESSION['agenttype'] > 0 )
            {
                $this->pageBody .= $this->writeLikertScale($this->formreader->getFieldNameByIndex($i++),"The agent (Alan) was a positive addition to the game experience." , "Strongly Disagree","Strongly Agree");
                $this->pageBody .= $this->writeLikertScale($this->formreader->getFieldNameByIndex($i++),"I was able to solve the puzzle better with the agent." , "Strongly Disagree","Strongly Agree");
                $this->pageBody .= $this->writeLikertScale($this->formreader->getFieldNameByIndex($i++),"I trust this agent." , "Strongly Disagree","Strongly Agree");
                $this->pageBody .= $this->writeLikertScale($this->formreader->getFieldNameByIndex($i++),"This agent would be helpful to me for other applications." , "Strongly Disagree","Strongly Agree");
                $this->pageBody .= $this->writeLikertScale($this->formreader->getFieldNameByIndex($i++),"I would recommend this agent to my friends" , "Strongly Disagree","Strongly Agree");
            }

            if($_SESSION['agenttype'] > 2)
            {    
                $this->pageBody .= $this->writeLikertScale($this->formreader->getFieldNameByIndex($i++),"I was able to comprehend the agent speech clearly" , "Strongly Disagree","Strongly Agree");
            }
        $this->pageBody .= $this->writeSubmitButton(htmlspecialchars("Done !"));
        $this->pageBody .= "</form>";
        $this->pageBody.= "</br>";
    }
}

$p = new PostGameSurveyPage(false);
echo $p->getPageHTML();
?>