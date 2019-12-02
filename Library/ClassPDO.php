<?php
    namespace Library;
    use PDO;
    /**
     * Application Main Page That Will Serve All Requests
     *
     * @package Simple Nina Framework
     * @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
     * @version 1.0.0
     * @license http://nina.vn
     */
use \Library\Log;

class ClassPDO{

    # @object, The PDO object
    private $pdo;
    # @object, PDO statement object
    public static $sQuery;
    public static $result,$where,$order,$limit,$table,$value,$type;
    # @array,  The database settings
    # @bool ,  Connected to the database
    public static $bConnected = false;
    # @object, Object for logging exceptions	
    private $log;
    # @array, The parameters of the SQL query
    public static $parameters;
    protected static $DBH;
    /**
     *	This method makes connection to the database.
     *	
     *	1. Reads the database settings from a ini file. 
     *	2. Puts  the ini content into the settings array.
     *	3. Tries to connect to the database.
     *	4. If connection failed, exception is displayed and a log file gets created.
     */
    public static function openConnection()
    {
        $dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOSTNAME;
        try {
            # Read settings from INI file, set UTF8
            self::$DBH = new PDO($dsn,DB_USERNAME,DB_USERPWD, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));
            
            # We can now log any exceptions on Fatal error. 
            self::$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            # Disable emulation of prepared statements, use REAL prepared statements instead.
            self::$DBH->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            
            # Connection succeeded, set the boolean to true.
            static::$bConnected = true;
        }
        catch (PDOException $e) {
            # Write into log
            echo self::ExceptionLog($e->getMessage());
            die();
        }

    }
    /*
     *   You can use this little method if you want to close the PDO connection
     *
     */
    public function CloseConnection()
    {
        # Set the PDO object to null to close the connection
        # http://www.php.net/manual/en/pdo.connections.php
        self::$DBH = null;
    }
    
    /**
     *	Every method which needs to execute a SQL query uses this method.
     *	
     *	1. If not connected, connect to the database.
     *	2. Prepare Query.
     *	3. Parameterize Query.
     *	4. Execute Query.	
     *	5. On exception : Write Exception into the log + SQL query.
     *	6. Reset the Parameters.
     */
    protected static function Init($query, $parameters = "")
    {
        $query = str_replace('#_', DB_REFIX, $query);

        # Connect to database
        if (!static::$bConnected) {
            self::openConnection();
        }
        try {
            # Prepare query
            static::$sQuery = self::$DBH->prepare($query);
            # Add parameters to the parameter array	
            self::bindMore($parameters);
            # Bind parameters
            if (!empty(static::$parameters)) {
                foreach (static::$parameters as $param => $value) {
                    if(is_int($value[1])) {
                        $type = PDO::PARAM_INT;
                    } else if(is_bool($value[1])) {
                        $type = PDO::PARAM_BOOL;
                    } else if(is_null($value[1])) {
                        $type = PDO::PARAM_NULL;
                    } else {
                        $type = PDO::PARAM_STR;
                    }

                    // Add type when binding the values to the column
                    static::$sQuery->bindValue($value[0], $value[1], $type);
                }
            }

            # Execute SQL 
            static::$sQuery->execute();
        }
        catch (PDOException $e) {
            //echo 'error';
            # Write into log and display Exception
            echo self::ExceptionLog($e->getMessage(), $query);
            die();
        }
        # Reset the parameters
        static::$parameters = array();
        self::reset();
    }
    
    /**
     *	@void 
     *
     *	Add the parameter to the parameter array
     *	@param string $para  
     *	@param string $value 
     */
    public static function bind($para, $value)
    {
        static::$parameters[sizeof(static::$parameters)] = [":" . $para , $value];
    }
    /**
     *	@void
     *	
     *	Add more parameters to the parameter array
     *	@param array $parray
     */
    public static function bindMore($parray)
    {
        if (empty(static::$parameters) && is_array($parray)) {
            $columns = array_keys($parray);
            foreach ($columns as $i => &$column) {
                self::bind($column, $parray[$column]);
            }
        }
    }
    /**
     *  If the SQL query  contains a SELECT or SHOW statement it returns an array containing all of the result set row
     *	If the SQL statement is a DELETE, INSERT, or UPDATE statement it returns the number of affected rows
     *
     *  @param  string $query
     *	@param  array  $params
     *	@param  int    $fetchmode
     *	@return mixed
     */
    public static function query($query, $params = null, $fetchmode = PDO::FETCH_ASSOC)
    {
        $query = trim(str_replace("\r", " ", $query));
        $query = str_replace('#_', DB_REFIX, $query);
        
        self::Init($query,$params);
        
        $rawStatement = explode(" ", preg_replace("/\s+|\t+|\n+/", " ", $query));
        
        # Which SQL statement is used 
        $statement = strtolower($rawStatement[0]);
        
        if ($statement === 'select' || $statement === 'show') {
            return static::$sQuery->fetchAll($fetchmode);
        } elseif ($statement === 'insert' || $statement === 'update' || $statement === 'delete') {
            return static::$sQuery->rowCount();
        } else {
            return NULL;
        }
    }

    static public function insert($data=array())
    {
        $key = "";
        $value = "";
        foreach($data as $k => $v){
            $key .= "," . $k;
            $value .= ",:" . $k;
        }
        $key = '('.trim($key,',').')';
        $value = trim($value,',');
        $insert   =  self::query("INSERT INTO ".DB_REFIX.static::$table.$key." VALUES(".$value.")",$data);
        return $insert;
    }

    static public function update($data=array())
    {
        $key = "";
        $value = "";
        foreach($data as $k => $v){
            $key .= "," . $k.'=:'.$k;
        }
        $key = trim($key,',');

        $where = static::$where;
        $value = static::$value;
        if($value){
            foreach ($value as $k => $v) {
                $data[$k] = $v;
            }  
        }
        $update   =  self::query("UPDATE ".DB_REFIX.static::$table." SET $key $where ",$data);
        return $update;
    }

    static public function delete()
    {
        $where = static::$where;
        $data = static::$value;
        $delete   =  self::query("DELETE FROM ".DB_REFIX.static::$table." $where ",$data);
        return $delete;
    }
    static public function select($selected = "*")
    {
        $where = static::$where;
        $data = static::$value;
        if(self::$type=='row'){
            $select = self::row("SELECT $selected FROM ".DB_REFIX.static::$table." $where ",$data);
        } else {
            $select = self::query("SELECT $selected FROM ".DB_REFIX.static::$table." $where ",$data);
        }
        return $select;
    }
    
    /**
     *  Returns the last inserted id.
     *  @return string
     */
    static public function InsertId()
    {
        return self::$DBH->lastInsertId();
    }
    
    /**
     * Starts the transaction
     * @return boolean, true on success or false on failure
     */
    static public function beginTransaction()
    {
        return self::$DBH->beginTransaction();
    }
    
    /**
     *  Execute Transaction
     *  @return boolean, true on success or false on failure
     */
    static public function executeTransaction()
    {
        return self::$DBH->commit();
    }
    
    /**
     *  Rollback of Transaction
     *  @return boolean, true on success or false on failure
     */
    static public function rollBack()
    {
        return self::$DBH->rollBack();
    }
    
    /**
     *	Returns an array which represents a column from the result set 
     *
     *	@param  string $query
     *	@param  array  $params
     *	@return array
     */
    public static function column($query, $params = null)
    {
        $query = str_replace('#_', DB_REFIX, $query);
        self::Init($query, $params);
        $Columns = static::$sQuery->fetchAll(PDO::FETCH_NUM);
        
        $column = null;
        
        foreach ($Columns as $cells) {
            $column[] = $cells[0];
        }
        
        return $column;
        
    }

    public static function numrows($query, $params = null)
    {
        $query = str_replace('#_', DB_REFIX, $query);
        self::Init($query, $params);
        $Columns = static::$sQuery->rowCount();
        return $Columns;
    }

    /**
     *	Returns an array which represents a row from the result set 
     *
     *	@param  string $query
     *	@param  array  $params
     *   	@param  int    $fetchmode
     *	@return array
     */
    public static function row($query, $params = null, $fetchmode = PDO::FETCH_ASSOC)
    {
        $query = str_replace('#_', DB_REFIX, $query);
        self::Init($query, $params);
        $result = static::$sQuery->fetch($fetchmode);
        static::$sQuery->closeCursor(); // Frees up the connection to the server so that other SQL statements may be issued,
        return $result;
    }
    /**
     *	Returns the value of one single field/column
     *
     *	@param  string $query
     *	@param  array  $params
     *	@return string
     */
    public static function single($query, $params = null)
    {
        $query = str_replace('#_', DB_REFIX, $query);
        self::Init($query, $params);
        $result = static::$sQuery->fetchColumn();
        static::$sQuery->closeCursor(); // Frees up the connection to the server so that other SQL statements may be issued
        return $result;
    }
    /**	
     * Writes the log and returns the exception
     *
     * @param  string $message
     * @param  string $sql
     * @return string
     */
    public static function ExceptionLog($message, $sql = "")
    {
        $exception = 'Unhandled Exception. <br />';
        $exception .= $message;
        $exception .= "<br /> You can find the error back in the log.";
        
        if (!empty($sql)) {
            # Add the Raw SQL to the Log
            $message .= "\r\nRaw SQL : " . $sql;
        }
        # Write into log
        Log::write($message);
        
        return $exception;
    }

    public static function setTable($str){
        static::$table = $str;
    }

    public static function setType($str){
        static::$type = $str;
    }
    
    public static function setWhere($key, $value=""){
        if($value!=""){
            if(static::$where == ""){
                static::$where = " where " . $key . " = :" . $key ;
            } else {
                static::$where .= " and " . $key . " = :" . $key ;
            }
        }
        else{
            if(static::$where == "")
                static::$where = " where " . $key ;
            else
                static::$where .= " and " . $key ;
        }
        static::$value[$key] = $value;
    }
    
    public static function setWhereOr($key, $value){
        if($value!=""){
            if(static::$where == "")
                static::$where = " where " . $key . " =: " . $key;
            else
                static::$where .= " or " . $key . " =: " . $key;
        }
        else{
            if(static::$where == "")
                static::$where = " where " . $key ;
            else
                static::$where .= " or " . $key ;
        }
        static::$value[$key] = $value;
    }
    
    public static function setOrder($str){
        static::$order = " order by " . $str;
    }
    
    public static function setLimit($str){
        static::$limit = " limit " . $str;
    }
    
    public static function setError($msg){
        static::$error[] = $msg;
    }
    
    public static function showError(){
        foreach(static::$error as $value)
            echo '<br>'.$value;
    }
    
    public static function reset(){
        static::$result = "";
        static::$where = "";
        static::$order = "";
        static::$limit = "";
        static::$table = "";
        static::$value ="";
    }

}
?>
