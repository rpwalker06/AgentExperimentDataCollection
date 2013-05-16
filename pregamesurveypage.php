<?php
/**
 * Description of PuzzlePages
 *
 * @author Robert Walker
 */
session_start();
require 'surveypage.php';
require 'puzzleformreader.php';

class PreGameSurveyPage extends surveyPage{
        
    function setFieldList() {
        parent::setFieldList();
        $this->formreader = new PreGameSurveyFormReader();
    }
    
    protected function initPage()
    {
        $i = 0;
        
        $this->pageno = 4;
        $this->pageTitle = htmlspecialchars("Pregame Survey ");
        $this->pageHeading = htmlspecialchars("Just a couple of questions before we begin...");
        $this->pageBody = htmlspecialchars("While we don’t need any personally identifying information from you we would like to know some general vital stats about you:"). "</br>";
        $this->pageBody .= $this->writeFormHeader($this->formreader->getFormAction());
            $this->pageBody .= $this->writeHiddenInput($this->formreader->getFieldNameByIndex($i++), $_SESSION['participantid']);
            $this->pageBody .= $this->writeAgeQuestion($this->formreader->getFieldNameByIndex($i++));
            $this->pageBody .= $this->writeGenderQuestion($this->formreader->getFieldNameByIndex($i++));
            $this->pageBody .= $this->writeLikertScale($this->formreader->getFieldNameByIndex($i++), "I enjoy solving puzzles.", "Strongly Disagree", "Strongly Agree");
            $this->pageBody .= $this->writeLikertScale($this->formreader->getFieldNameByIndex($i++), "I am good at solving puzzles .", "Strongly Disagree", "Strongly Agree");
            $this->pageBody .= $this->writeLikertScale($this->formreader->getFieldNameByIndex($i++), "I enjoy playing video games.", "Strongly Disagree", "Strongly Agree");
            $this->pageBody .= $this->writeLikertScale($this->formreader->getFieldNameByIndex($i++), "I play video games often.", "Strongly Disagree", "Strongly Agree");
            $this->pageBody .= $this->writeSubmitButton(htmlspecialchars("Done !"));
        $this->pageBody .= "</form>";
    }
    
    private function writeAgeQuestion($fieldname)
    {
        $echo = "<div class='dropdown'>";
        $echo .= "<b>Please enter your age:       </b>";
        $echo .= "<select name='" . $fieldname . "'>";
            $echo .= $this->fillOptionandValue("18-23");
            $echo .= $this->fillOptionandValue("24-29");
            $echo .= $this->fillOptionandValue("30-35");
            $echo .= $this->fillOptionandValue("36-41");
            $echo .= $this->fillOptionandValue("42-47");
            $echo .= $this->fillOptionandValue("48-53");
            $echo .= $this->fillOptionandValue("54-59");
            $echo .= $this->fillOptionandValue("60 and up");
            $echo .= $this->fillOptionandValue("Prefer not to say");
        $echo .= "</select>";
        $echo .= "</div>";
        
        return $echo;
    }
    
    private function writeGenderQuestion($fieldname)
    {
        $echo = "<div class='dropdown'>";
        $echo.= "<b>Please enter your gender:         </b>";
        $echo .= "<select name='" . $fieldname . "'>";
            $echo .= $this->fillOptionandValue("Female");
            $echo .= $this->fillOptionandValue("Male");
        $echo .= "</select>";
        $echo .= "</div>";
        
        return $echo;
    }
}

$p = new PreGameSurveyPage(false);
echo $p->getPageHTML();
?>
