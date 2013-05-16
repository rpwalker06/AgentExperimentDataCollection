<?php
/**
 * This will be the interface for each page in the experiment
 * Way to go Robert...
 *
 * @author Robert Walker
 */
require 'puzzlesession.php';

class puzzlePage {
    
    protected $pageTitle;
    protected $pageHeading;
    protected $pageBody;
    protected $nextPageLink;
    protected $stylesheetlink="puzzlestyle";
    protected $pageno=-1;
    protected static $sequence;
    protected $writeNextPageLink;
    
    
    public function __construct($nextPage)
    {
        $p= new experimentSequence();
        
        $this->initPage();
        self::$sequence = $p->getSequence();
        $this->writeNextPageLink = $nextPage;
    }
    
   protected function buildPage()
    {
       $echo = "";
       
       $echo.="<html>\n";
       $echo.="<head>\n";
       $echo.="<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";
       $echo.="<link rel='stylesheet' type='text/css' href='" . $this->stylesheetlink . ".css'>\n";
       $echo.="<title>" . $this->pageTitle . "</title>\n";
       $echo.="</head>\n";
       $echo.="<body>\n";
       $echo.="<h1>" . $this->pageHeading . "</h1>\n";
       $echo.="<div class='content'>";
       $echo.=$this->pageBody."\n";
       if($this->writeNextPageLink) $echo.=$this->writeNextPageLink()."\n";
       $echo.="</div>";
       $echo.="</body>\n";
       $echo.="</html>\n";
       
       return $echo;
    }
    
    public function setStyleSheetLink($sheetname)
        {$this->stylesheetlink = $sheetname;}
    
    public function getPageHTML()
    {
        return $this->buildPage();
    }
    
    protected function writeNextPageLink()
    {
        $echo = "</br>";
        
        $echo .= "<a class='nextpage' href='" . static::$sequence[($this->pageno+1)]. "' >";
        $echo .= "Next Page";
        $echo .= "</a>";
        
        return $echo;
    }
}
?>
