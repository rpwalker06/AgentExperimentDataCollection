<?php

    require 'puzzlesqlwriter.php';

    class puzzleAppletReader {
        
    protected $fieldlist;
    protected static $pageaddress="puzzleformread.php";
    
    public function getFieldNameByIndex($i)
        { return $this->fieldlist[$i]; }
    
    public function getpageaddress()
        { return self::$pageaddress; }
}

class puzzleAppletReaderGameMoves extends puzzleAppletReader {
    
    private static $actionparam;
    
    function __construct()
    {
        self::$actionparam = "PreGameSurveyFormReader";
        $this->fieldlist = Array();
        
        $this->fieldlist[] = "idparticipant";
        $this->fieldlist[] = "sessionpuzzleno";
        $this->fieldlist[] = "puzzlestate";
        $this->fieldlist[] = "moveno";
        $this->fieldlist[] = "movetime";
        $this->fieldlist[] = "tileclicked";
        $this->fieldlist[] = "agentresponse";
        $this->fieldlist[] = "puzzlesolved";
    }
    
    public static function getFormAction()
    { return self::$pageaddress . "?a=" . self::$actionparam; }
            
    public static function writeMovestoDB ($getarray)
    {
        $writer = new puzzleSQLWriter();
        
        $writer->executeQuery($writer->createInsertFromAssociativeArray("gamemoves", $getarray));
    }
}

    $reader = new puzzleAppletReaderGameMoves();
    $reader->writeMovestoDB($_GET);
    exit();
?>
