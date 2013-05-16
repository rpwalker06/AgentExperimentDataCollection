<?php
/**
 * Description of PuzzlePages
 *
 * @author Robert Walker
 */
include 'puzzlepage.php';
class surveyPage extends puzzlePage {
    
    protected $formreader;
    protected static $participantid =-1;
        
    function __construct($nextpage) {
        $this->setFieldList();
        parent::__construct($nextpage);
    }
    
     public function getParticipantID()
        {return self::$participantid;}
    
    protected function setParticipantID($id)
        {self::$participantid = $id;}
    
    protected function isSetParticipantID()
        {return (self::$participantid != -1);}
    
    protected function setFieldList()
    {}

    protected function writeFormHeader($targetFile)
    {
        $echo="";
        
        $echo.="<form action='";
        $echo.=$targetFile ."' method='post'>";
        
        return $echo;
    }
    
    protected function fillOptionandValue($item)
        {return "<option value='".$item."'>".$item."</option>";}
    
    protected function writeLikertScale($scalename, $scaleprompt, $lownumber, $highnumber)
    {
        $echo = "<div class='likert'>";
        $echo.= "<b>" . $scaleprompt . "</b></br>";
        $echo .= $lownumber."     ";
        for($i = 0; $i < 7; $i++)
        {
            $echo .= "<input type='radio' name='".$scalename."' value=". ($i+1) ." >" . ($i+1). "     ";
        }
        $echo .= "        ";
        $echo .= "     ".$highnumber . "</br>";
        $echo .= "</div>";
      return $echo;
    }
    
    protected function writeSubmitButton($submittext)
    {   
        $echo = "";
        $echo.= "<input type='submit' value='" . $submittext ."'>";
       
        return $echo;
    }
    
    protected function writeHiddenInput($name, $value)
    {   
        $echo = "";
        $echo.= "<input type='hidden' name='". $name ."' value='" . $value ."'>";
       
        return $echo;
    }
}
?>


