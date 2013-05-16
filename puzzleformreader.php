<?php

    require 'puzzlesqlwriter.php';

/**
 * Description of puzzleFormReader
 *
 * @author Robert Walker
 */
class puzzleFormReader {
    
    //try to learn whether this is an abstract class or not
    protected $fieldlist;
    protected static $pageaddress="puzzleformread.php";
    protected static $actionparam;
    
    public static function getFormAction()
    { return self::$pageaddress . "?a=" . self::$actionparam; }
            
    public function getFieldNameByIndex($i)
        { return $this->fieldlist[$i]; }
    
    public function getpageaddress()
        { return self::$pageaddress; }
}

class PreGameSurveyFormReader extends puzzleFormReader {
    
    function __construct()
    {
        self::$actionparam = "PreGameSurveyFormReader";
        $this->fieldlist = Array();
        
        $this->fieldlist[] = "idparticipant";
        $this->fieldlist[] = "age";
        $this->fieldlist[] = "gender";
        $this->fieldlist[] = "enjoypuzzles";
        $this->fieldlist[] = "goodatpuzzles";
        $this->fieldlist[] = "enjoyvideogames";
        $this->fieldlist[] = "playgamesoften";
    }
    
    public static function writeSurveytoDB ($postarray)
    {
        $writer = new puzzleSQLWriter();
        
        $writer->executeQuery($writer->createInsertFromAssociativeArray("pregamesurvey", $postarray));      
    }
    
    public static function getNextPage()
        {return "puzzleview.php";}
}

class PostGameSurveyFormReader extends puzzleFormReader {
    
    function __construct()
    {
        self::$actionparam = "PostGameSurveyFormReader";
        $this->fieldlist = Array();
        
        $this->fieldlist[] = "idparticipant";
        $this->fieldlist[] = "gamefair";
        $this->fieldlist[] = "gamedifficulty";
        $this->fieldlist[] = "selfsuccessful";
        $this->fieldlist[] = "gamenjoyed";
        $this->fieldlist[] = "gamebetter";
        $this->fieldlist[] = "agentpositive";
        $this->fieldlist[] = "agenthelpful";
        $this->fieldlist[] = "agenttrust";
        $this->fieldlist[] = "agentotherapplications";
        $this->fieldlist[] = "agentrecommend";
        $this->fieldlist[] = "speechunderstand";
    }
    
    public static function writeSurveytoDB ($postarray)
    {
        $writer = new puzzleSQLWriter();
        
        $writer->executeQuery($writer->createInsertFromAssociativeArray("postgamesurvey", $postarray));
    }
    
    public static function getNextPage()
        {return "thankyou.php";}
    
    
}
?>
