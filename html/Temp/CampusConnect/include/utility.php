<?php  
    function cleanInput($data) 
    { 
        $data = trim($data); 
        $data = stripslashes($data); 
        $data = htmlspecialchars($data); 
        return $data; 
    } 

    function connectToDB() {
        $dbPath="localhost"; 
        $dbUser="rfeltonweb"; 
        $dbPass="!)^%@(#"; 
        $dbName="csc2210_rfelton_db"; 
        $dbconn= new mysqli($dbPath,$dbUser,$dbPass);
        logMsg("Connecting to $dbPath with user $dbUser"); 
        if(!$dbconn) { 
            logMsg("Connect Error (".mysqli_connect_errno().")".mysqli_connect_error());
            logMsgAndDie("Error Connecting to $dbPath with user $dbUser"); 
            } 
        if(!$dbconn->select_db($dbName)) { 
                 logMsgAndDie("Could not select $dbName database"); 
            } 
        return $dbconn; 
    }

    function disconnectDB($dbconn){
        $dbconn->close(); 
        logMsg("Disconnect from database: ");
    }

    function logMsg($message)
    {
        error_log($message);
    }

    function logMsgAndDie($message)
    {
        error_log($message); 
        die('See error log for details '.mysql_error()); 
    }
?>
