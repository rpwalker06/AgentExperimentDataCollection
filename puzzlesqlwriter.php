<?php

/**
 * Description of puzzleSQLWriter
 *
 * @author Robert Walker
 */
class puzzleSQLWriter {
    
    //connection object
    private $con;
    
    public function __construct() {
        $this->con = $this->initConnection();
        }
    private static function initConnection()
    {
        $host="localhost";
        $port=3306;
        $socket="";
        $user="puzzleuser";
        $password="Howard";
        $dbname="puzzlerecord";

        $con = new mysqli($host, $user, $password, $dbname, $port, $socket);
        //echo "</br> DB Connect Suceessful...";
        
        return $con;
    }
    
    public function executeQuery($query)
        {mysqli_query($this->con, $query);}
    
    private static function closeConnection()
        {mysqli_close($this->con);}
    
    public static function createParticipant()
    {
        $con = static::initConnection();
        
        //$agenttypeset = "(SELECT Auto_increment FROM information_schema.tables WHERE table_name='participant')%5";
        $insertparticipant="insert into participant (datetimeadded) values('". time() ."')";
            mysqli_query($con, $insertparticipant);
            $idno = mysqli_insert_id($con);
            mysqli_close($con);
                        
        return $idno;
    }
    
    public static function finalizeTest($participantid)
    {
        $con = static::initConnection();
        
        $updatecompletion="update participant set testcompleted=1 where idparticipant={$participantid}";
            mysqli_query($con, $updatecompletion);
            mysqli_close($con);
    }
    
    public static function updateAgentType($typeno, $pid)
    {
        $con = static::initConnection();
        
        $updateagent="update participant set agenttype={$typeno} where idparticipant={$pid}";
            mysqli_query($con, $updateagent);
            mysqli_close($con);
    }
    

    function createInsertFromAssociativeArray($tablename, $fieldnvalues)
    {
        //try internal array pointers
        $insertstatement = "";
        $insertstatement .= "Insert into " . $tablename . " ";
        $insertstatement .= "(";
                      
            $fieldnames = implode(",", array_keys($fieldnvalues));
        
        $insertstatement.= $fieldnames;
        $insertstatement.= ") values ('";
        
            $valuestatement = implode("','", $fieldnvalues);
            
        $insertstatement.= $valuestatement;
        $insertstatement.= "');";
        
        return $insertstatement;
    }
}

?>
