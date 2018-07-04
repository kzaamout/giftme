<?php

include_once 'models/Database.php';

class User {
    private $db;
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "sazaamout";
    private $dbName     = "pm";
    private $userTbl    = 'users';
    
    
    function __construct(){
        //$this->db= new Database();
        
        //$res = $this->db->connect();
        //if (!$res['exitcode']){
        //    die("Failed to connect with MySQL: " . $conn->connect_error);
       // }
        
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                    die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
    
    function checkUser($userData = array()){
        if(!empty($userData)){
            //Check whether user data already exists in database
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $prevResult = $this->db->query($prevQuery);
            if($prevResult->num_rows > 0){
                //Update user data if already exists
                $query = "UPDATE ".$this->userTbl." SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
                $update = $this->db->query($query);
            }else{
                //Insert user data
                $query = "INSERT INTO ".$this->userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."', score ='0', position='DevOps Engineer'";
                $insert = $this->db->query($query);
            }
            
            //Get user data from the database
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }
        
        //Return user data
        return $userData;
    }
    
    
    function exist( $userId ){
        if(!empty($userId)){
            //Check whether user data already exists in database
            $prevQuery = "SELECT * FROM ". $this->userTbl." WHERE oauth_uid = '".$userId."'";
            $prevResult = $this->db->query($prevQuery);
            if( $prevResult->num_rows == 0 ){
                return false;
            } else {
                return true;
            }
        }
        
        return false;
    }
    
    function add ( $record )
    {
        $retval = array(
            'exitcode'	=> null,
            'errors'	=> array(),
            'debug'	=> array(),
            'data'	=> array(),
        );
        
        $db = new Database( 'pm' , 'root', 'sazaamout', 'localhost' );
        
        
        $res = $db->connect();
        if ($res['exitcode'] == 0){
            $retval['errors'][] = $res['error'];
            $retval['debug'][] = $res['debug'];
            $retval['exitcode'] = 0;
            return $retval;
        }
        
        $info = array (
            'table'     => 'users',
            'data'      => $record
        );
        
        $res = $db->put($info);
        if ( $res['exitcode'] == 0){
            $retval['errors'][] = $res['error'];
            $retval['debug'][] = $res['debug'];
            $retval['exitcode'] = 0;
            return $retval;
        }
        
        $db->close();
        
        
        $retval['debug'][] = $res['debug'];
        $retval['exitcode'] = 1;
        return $retval;
    }
    
    
    function get_userInfo( $userId ){
        $db = new Database( 'pm' , 'root', 'sazaamout', 'localhost' );
        
        $res = $db->connect( );
        if ($res['exitcode'] == 0){
            return false;
        }
        $info = array (
            'table'     => 'users',
            'condition' => 'oauth_uid = '.$userId,
        );
        $res = $db->get($info);
        $db->close();
        return $res['data'][0];
    }
    
    function get(){
        $db = new Database( 'pm' , 'root', 'sazaamout', 'localhost' );
        
        $res = $db->connect();
        if ($res['exitcode'] == 0){
            return false;
        }
        
        $res = $db->get( array (
                'table' => 'users',
            ));
        
        $db->close();
        
        return $res;
    }
}
?>
