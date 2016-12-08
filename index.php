<?php
    header('Content-Type: application/json');

    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','restapi');
    define('TABLE_NAME','profile');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    	
    if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
    }
        
    $part = explode ("/", $_SERVER['REQUEST_URI']);
    $where = "";

    $id = end($part);   
    
	if ($id) {
        $where = " where id = " . $id;
    }
    
    $method = strtolower($_SERVER['REQUEST_METHOD']);
    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);
    
    switch( $method ) {
        case "get":
            $sql = "select * from " . TABLE_NAME . $where;
            
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                echo json_encode($data);
            } 
            break;
    
        case "put":
            $sql = "UPDATE `" . DB_NAME . "`.`" . TABLE_NAME . "` set fname = '" . $obj['fname'] ."', lname = '" . $obj['lname'] . "' where id = ". $obj['id'];
            message($conn->query($sql));
            break;       
    
        case "post":        
            $sql = "INSERT INTO `" . DB_NAME . "`.`" . TABLE_NAME . "` (fname, lname) VALUES ('".$obj['fname']."', '".$obj['lname']."')";
            message($conn->query($sql));
            break;
    
        case "delete":
            // logic for DELETE here
            $sql = "DELETE FROM `" . DB_NAME . "`.`" . TABLE_NAME . "` where id = " . $obj['id'];
            message($conn->query($sql));
            break;
    }
    
    $conn->close();
    
    function message($message) {
        if ($message === TRUE) {
    	   echo '{"message": "Successful!"}';
        } else {
            echo "{'message':'" . addslashes($conn->error) . "'}";
        }
    }
?>