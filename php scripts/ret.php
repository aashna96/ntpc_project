<?php
header("Content-type: application/json; charset=utf-8");
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
$hostname='localhost';
$username='id1980364_root';
$password='ntpcdb';
$response = array();
try {

    $dbh=new PDO("mysql:host=$hostname;dbname=id1980364_appointment",$username  ,$password);

    $response["allname"] = array();

    /*** QUERY ****/
    $sql='SELECT * FROM members';

    $stmt=$dbh->query($sql);

    $objs = $stmt->fetchAll(PDO::FETCH_OBJ);

    foreach($objs as $object) {
        $news = array();        
        $news["name"]=$object->name;
        $news["phoneno"]=$object->phoneno;
        $news["aadhar"]=$object->aadhar;
        $news["designation"]=$object->designation;
        $news["concernedperson"]=$object->concernedperson;
        $news["date"]=$object->date;
        $news["time"]=$object->time;

        array_push($response["allname"], $news);
    }

    echo json_encode($response);
    $dbh=null;

}catch(PDOException $e) {
 echo $e->getMessage();
}
?>