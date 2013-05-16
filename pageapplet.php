<?php

/**
 * Description of pageapplet
 *
 * @author Robert Walker
 */
class PageApplet {
    
    private $appurl;
    private $jarurl;
    private $parameters;
        
    public function __construct($applet_url, $jar_url)
        {$this->appurl = $applet_url;
         $this->jarurl = $jar_url;
         $this->parameters = Array();
        }
        
    public function addParameter($name, $value)
    {
        $echo="";
        $echo.="<param name='" . $name . "' value='" . $value . "'>";
        $this->parameters[] = $echo;
    }
    
    public function getAppletHTML($class)
    {
        $echo="";
        $echo.="<applet class='{$class}' code='" . $this->appurl . "' archive='". $this->jarurl . "'>";
        
        foreach ($this->parameters as $parametertag)
            {$echo.=$parametertag;}
            
         $echo.="</applet>";
        
        return $echo;
    }
 
}
?>
