<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "db_conn.php";
$style = $_POST["style"];
$input1 = $_POST["input1"];
$input2 = $_POST["input2"];
$input3 = $_POST["input3"];
try {
    if ($style=="all"){
        //傳入style="all",name,request,""(空字串)
        $query = sprintf("delete 
                    from Formula 
                    where name= '%s' and request='%s' ",$input1,$input2);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="name"){
        //傳入style="name", name.value, request.value ,new name.value,
        $query = sprintf("update Formula
                        set name= '%s'
                        where name= '%s' and request='%s'",$input3,$input1,$input2);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="request"){
        //傳入style="request", name.value,request.value ,new request.value,""
        $query = sprintf("update Formula
                        set request= '%s'
                        where name= '%s' and request='%s'",$input3,$input1,$input2);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="domain_min"){
        //傳入style="domain_min", name.value,request.value ,new domain_min.value,""
        $query = sprintf("update Formula
                        set domain_min= '%s'
                        where name= '%s' and request='%s'",$input3,$input1,$input2);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="domain_max"){
        //傳入style="domain_max", name.value,request.value ,new domain_max.value,""
        $query = sprintf("update Formula
                        set domain_max= '%s'
                        where name= '%s' and request='%s'",$input3,$input1,$input2);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="add"){
        $tmp=explode('#',$input1);
            $query = sprintf("INSERT INTO Formula
                            (name, request, domain_min, domain_max) 
                            VALUES ('%s','%s','%s','%s')",$tmp[0],$tmp[1],$tmp[2],$tmp[3]);
            $stmt = $db->prepare($query);
            $stmt ->execute();
    }
    elseif($style=="count"){
        $query = sprintf("select count(name) from Formula");
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