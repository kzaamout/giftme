<?php

class Database {
	
	private $dbName;
	private $dbUser;
	private $dbPasswd;
	private $dbPath;
        
	private $dbConnection;
	
	function __construct( $dbName, $dbUser, $dbPasswd, $dbPath ){
		
            // setting the database parameter
            $this->dbName   = $dbName;
            $this->dbUser   = $dbUser; 
            $this->dbPasswd = $dbPasswd;
            $this->dbPath   = $dbPath;
	
	}
	        
	function connect ()
	{
            // read from database and return
            $retval = array(
                'exitcode'	=> null,
                'error'	=> null,
                'debug'		=> array(),
                'data'		=> null,
            );

            //open the connections
            $this->dbConnection = new mysqli( 
                $this->dbPath, 
                $this->dbUser, 
                $this->dbPasswd,
                $this->dbName 
            );

            // Check connection
            if ($this->dbConnection->connect_error) {
                $retval['error']   = $this->dbConnection->connect_error;
                $retval['exitcode'] = false;
                return $retval;
            }

            $retval['exitcode'] = true;
            return $retval;
	}
	
	
        // $info = array(
        //      table     => string,
        //      columns   => array(),
        //      condition => string
        //      
        // )
	function get (  $info ) 
        {
            
            // read from database and return
            $retval = array(
                'exitcode' => null,
                'error'    => null,
                'debug'    => array(),
                'data'	   => array(), // the return is associative array 
                // with key value structure.
            );
            
            $retval['debug'][] = " > Database > GET > started";
            
            // table must be supplied
            if (empty( $info['table'])){
                $retval['error'] = "must specify table name";
                $retval['exitcode'] = 0;
                return $retval;
            }
            
            // construct the sql statement
            $selectors = ((!empty($info['columns'])) ? implode(",", $info['columns']) : "*");
            $condition = ((!empty($info['condition'])) ? " WHERE " . $info['condition']['key'] . ' = ' . $info['condition']['value'] : "");
            $sql = " SELECT " . $selectors . " FROM " . $info['table'] . $condition;
            
            $retval['debug'][] = " > Database > GET > executing: $sql";
            // execute the query and fetch the data
            if (!$res = $this->dbConnection->query( $sql )){
                $retval['error'] = "cannot perform sql statement. " . $this->dbConnection->error;
                $retval['exitcode'] = 0;
                return $retval;
            }
            
            if ($res->num_rows > 0) {
                while($row = $res->fetch_assoc()) {
                    $retval['data'][] = $row;
                }
            } else {
                $retval['data'] = "";
            }
            


            $retval['debug'][] = " > Database > GET > finished";
            $retval['exitcode'] = 1;
            
            return $retval;
        }
	
        // $info = array(
        //      table     => string,
        //      condition => string
        //      data      => array( 'key' => 'value' )
        // )
        function put (  $info ) 
        {
            $retval = array(
                'exitcode'	=> null,
                'error  '	=> null,
                'debug'		=> array(),
                'data'		=> array(),
            );
            $retval['debug'][] = " > Database > PUT > Inserting data into database";
            // read the $data, and generate sql statement
            $keys = $this->convert_to_sql_string("`",array_keys($info['data']));
            $values = $this->convert_to_sql_string("'", array_values($info['data']));
            
            // make this to be auto-generated
            $sql = "INSERT INTO " . $info['table']
                    . "(" . $keys . ")" 
                    . " VALUES "
                    . "(" . $values . ");";
                        
            $retval['debug'][] = " > Database > PUT > CMD:[" . $sql . "]";
            
            if (!$res = $this->dbConnection->query( $sql )){
                $retval['error'] = "cannot perform sql statement [" . $this->dbConnection->error . "]";
                $retval['exitcode'] = 0;
                return $retval;
            }
            
            $retval['debug'][] = " > Database > PUT > finished";
            $retval['exitcode'] = 1;
            
            return $retval;
        }
        
        function update (  $search ) 
        {
            // UPDATE `pm`.`users` 
            // SET `department`='netops', `displayName`='Saad Zaamout' 
            // WHERE `id`='4';            
        }
        
        function delete (  $search ) 
        {
            
        }
        
        function close()
        {
            $this->dbConnection->close();
        }
	
        
        function convert_to_sql_string( $token, $data ){
            
            $str = "";
            for ($i=0; $i<count($data)-1; $i++){
                $str .= $token . $data[$i] . $token . ',';
            }
            
            $str .= $token . $data[count($data)-1] . $token;
                    
            return $str;
        }
}


?>
