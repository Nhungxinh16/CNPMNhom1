<?php
    require_once('database-connection.php');
    function simpleQuery($sql, bool $isGet = true, $params = []){
        // is get = true => get else set
        // warning: it will throws fatal error if you dont know how to use it
        global $conn;
        $stmt = $conn -> prepare($sql);
        if(count($params) > 0){
            
            $types = '';
            foreach($params as $v){
                if(is_int($v)){
                    $types = $types.'i';
                }else if(is_double($v)){
                    $types = $types.'d';
                }else{
                    $types = $types.'s';
                }
            }
            $values = array_values($params);
            $stmt -> bind_param($types, ...$values);
            
        }
        $stmt -> execute();
        if($isGet){
            $record = $stmt -> get_result() -> fetch_all(MYSQLI_ASSOC);
            return $record;
        }else{
            return $stmt;
        }
    }
    
    function cout($value){
        echo "<pre>". print_r($value,true)."</pre>";
    }
?>