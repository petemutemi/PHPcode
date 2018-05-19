<?php
session_start();
//DB Connection Parameters
$servername = "localhost";
$username = "root";
$password = "";
//Connect and Select Active DB
try{
    $conn = new PDO("mysql:host=$servername;dbname=pagination", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

//Data Manipulation Class
class data{
    //DB Connection Parameters
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $conn = "";
    //Connect and Select Active DB
    public function __construct(){
        try{
            $this->conn = new PDO("mysql:host=$this->servername;dbname=assets", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
    //Fetch a column's cell value given another column's cell value
    public function fetchColumTwoValue($tbl,$col_one,$col_one_val,$col_two){
        $stmt = $this->conn->prepare("SELECT * FROM ".$tbl." WHERE ".$col_one."=".$col_one_val);
        $stmt->execute();
        foreach($stmt->fetchAll() as $k=>$row){};
        $val = $row[$col_two];
        return $val;
    }
    //Fetch column value given one field
    public function fetchColumnValue($tbl,$col_ref,$val,$col_target){
        $stmt = $this->conn->prepare("SELECT * FROM ".$tbl." WHERE ".$col_ref."='".$val."'");
        $stmt->execute();
        foreach($stmt->fetchAll() as $k=>$row){};
        $result = $row[$col_target];
        return $result;
    }
    //Get the last row Id
    public function getLastRowId($tbl){
        $count = 0;
        $stmt = $this->conn->prepare("SELECT * FROM ".$tbl);
        $stmt->execute();
        foreach($stmt->fetchAll() as $k=>$row){
            $count++;
        };
        return $count;
    }
    //Get Rows using LIKE
    public function fetchEstimateValue($tbl,$search_col,$search_str,$target_col){
        $stmt = $this->conn->prepare("SELECT * FROM ".$tbl." WHERE ".$search_col." LIKE '".$search_str."%'");
        $stmt->execute();
        foreach($stmt->fetchAll() as $k=>$row){};
        $result = $row[$target_col];
        return $result;
    }
    //Generate Select Options
    public function getSelectOptions($tbl,$cur_option,$col_target){
        /*
        $str = "";
        $str .= 'if($cur_option != ""){';
            $str = echo '<option value="'.$row["approval_manager"].'">'.$data->fetchColumnValue("approval_status", "status_id", $row["approval_manager"], "status").'</option>';
        }
        else echo '<option value="">-Set Status-</option>';
        $stmt = $conn->prepare("SELECT * FROM approval_status");
        $stmt->execute();
        // set the resulting array to associative
        foreach($stmt->fetchAll() as $k=>$sts){
        echo '<option value="'.$sts["status_id"].'">'.$sts["status"].'</option>';
        }
        //echo ' 
         */
    }
    //Get Total Number of Records in a table
    public function getRecordsTotal($tbl){
        $stmt = $this->conn->prepare("SELECT * FROM ".$tbl);
        $stmt->execute();
        $count = 0;
        foreach ($stmt->fetchAll() as $record=>$row){
            $count++;
        }
        return $count;
    }
    //Pagination
    public function setPagination($pages,$page_cur){
        $_SESSION["pagination_pages"] = $pages;
        $_SESSION["pagination_no"] = $page_cur;
        require_once ("bin/pagination.php"); 
    }
}
