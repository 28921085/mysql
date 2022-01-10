<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "db_conn.php";
$style = $_POST["style"];
$input1 = $_POST["input1"];
$input2 = $_POST["input2"];
$input3 = $_POST["input3"];
isset($style,$input1,$input2,$input3);
try {
    if ($style=="all"){
    //傳入style="all",name,""(空字串),""
        $query = sprintf("delete 
                        from ClassifyDetail
                        where name= '%s'",$input1);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="name"){
        //傳入style="name", name.value ,new name.value,""
        $query = sprintf("updete ClassifyDetail
                        set name= '%s'
                        where name= '%s'",$input2,$input1);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="X"){
        //傳入style="X", name.value ,new X.value,""
        $query = sprintf("update ClassifyDetail
                        set X= '%s'
                        where name= '%s'",$input2,$input1);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="Y"){
        //傳入style="Y", name.value ,new Y.value,""
        $query = sprintf("update ClassifyDetail
                        set Y= '%s'
                        where name= '%s'",$input2,$input1);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="Z"){
        //傳入style="Z", name.value ,new Z.value,""
        $query = sprintf("update ClassifyDetail
                        set Z= '%s'
                        where name= '%s'",$input2,$input1);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="request1"){
        //傳入style="request1", name.value ,new request1.value,""
        if(!empty($input2)&& !empty($input1)){
            $query = sprintf("update ClassifyDetail
                        set request1= '%s'
                        where name= '%s'",$input2,$input1);
            $stmt = $db->prepare($query);
            $stmt ->execute();
        }
    }
    elseif($style=="request2"){
        //傳入style="request2", name.value ,new request2.value,""
        $query = sprintf("update ClassifyDetail
                        set request2= '%s'
                        where name= '%s'",$input2,$input1);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="request3"){
        //傳入style="request3", name.value ,new request3.value,""
        $query = sprintf("update ClassifyDetail
                        set request3= '%s'
                        where name= '%s'",$input2,$input1);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="detailLink"){
        //傳入style="detailLink", name.value ,new detailLink.value,""
        $query = sprintf("update ClassifyDetail
                        set detailLink= '%s'
                        where name= '%s'",$input2,$input1);
        $stmt = $db->prepare($query);
        $stmt ->execute();
    }
    elseif($style=="add"){
        $tmp=explode('#',$input1);
            $query = sprintf("INSERT INTO ClassifyDetail
                            (name, X, Y, Z, request1, request2, request3, detailLink) 
                            VALUES ('%s','%s','%s','%s','%s','%s','%s','%s')",$tmp[0],$tmp[1],$tmp[2],$tmp[3],$tmp[4],$tmp[5],$tmp[6],$tmp[7]);
            $stmt = $db->prepare($query);
            $stmt ->execute();
    }
    elseif($style=="count"){
            $query = sprintf("select count(name) from ClassifyDetail");
            $stmt = $db->prepare($query);
            $stmt ->execute();
            $result = $stmt->fetchAll();
            echo $result[0][0];
        }
    //以上寫法是為了防止「sql injection」
    }
catch(Exception $e){
    echo $e->getmessage();
}
?>