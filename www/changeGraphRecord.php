<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "db_conn.php";
$style = $_POST["style"];
$input1 = $_POST["input1"];
$input2 = $_POST["input2"];
$input3 = $_POST["input3"];
try {
    if ($style=="all"){
        //傳入style="all",ID,name,""
        $query = sprintf("delete 
                    from GraphRecord 
                    where ID= %d ",$input1);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="ID"){
        //傳入style="ID", ID.value ,new ID.value,""
        $query = sprintf("update GraphRecord
                        set ID= %d
                        where ID= %d",$input2,$input1);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="name"){
        //傳入style="name", ID.value ,new name.value,""
        $query = sprintf("update GraphRecord
                        set name= '%s'
                        where ID= %d",$input2,$input1);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="classify"){
        //傳入style="classify", ID.value ,new classify.value,""
        $query = sprintf("update GraphRecord
                        set classify= '%s'
                        where ID= %d",$input2,$input1);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="2D3D"){
        //傳入style="classify", ID.value ,new 2D3D.value,""
        $query = sprintf("update GraphRecord
                        set 2D3D= %d
                        where ID= %d",$input2,$input1);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="add"){
    $tmp=explode('#',$input1);
        $query = sprintf("INSERT INTO GraphRecord
                        (ID, name, classify, 2D3D) 
                        VALUES (%d,'%s','%s',%d)",$tmp[0],$tmp[1],$tmp[2],$tmp[3]);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="count"){
        $query = sprintf("select count(name) from GraphRecord");
        $stmt = $db->prepare($query);
        $stmt ->execute();
        $result = $stmt->fetchAll();
        echo $result[0][0];
    }
}
catch(Exception $e){
    echo $e->getmessage();
}
 //以上寫法是為了防止「sql injection」
?>