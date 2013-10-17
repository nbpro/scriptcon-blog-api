<?php

class MySQL {

    // variables
    var $databse_name;
    var $database_user;
    var $database_password;

    var $database_connect;

    // constructor
    function MySQL() {
        $this->databse_name = 'scriptcon';
        $this->database_user = 'XXXXXXX';
        $this->database_password = 'XXXXXXXXX';

        // create db link
        $this->database_connect = mysql_connect("localhost", $this->database_user, $this->database_password);

        //select the database
        mysql_select_db($this->database_name, $this->databse_connect);

        mysql_query("SET names UTF8");
    }

   

    // executing sql
    function res($query, $error_checking = true) 
    {
        if(!$query)
        return false;
        $res = mysql_query($query, $this->databse_connect);
        if (!$res)
        $this->error('Database query error', false, $query);
        return $res;
    }

    
    

    // return table of records as result
    function getAll($query, $arr_type = MYSQL_ASSOC) {
        if (! $query)
            return array();

        if ($arr_type != MYSQL_ASSOC && $arr_type != MYSQL_NUM && $arr_type != MYSQL_BOTH)
            $arr_type = MYSQL_ASSOC;

        $res = $this->res($query);
        $arr_res = array();
        if ($res) {
            while ($row = mysql_fetch_array($res, $arr_type))
                $arr_res[] = $row;
            mysql_free_result($res);
        }
        return $arr_res;
    }

    

    
}

$GLOBALS['MySQL'] = new MySQL();
