<?php
$mysql_conf = array(
    'host'    => "localhost",
    'db'      => 'kdb2',
    'db_user' => 'root',
    'db_pwd'  => '',
);

$mysqli = @new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
if ($mysqli->connect_errno) {
    die("could not connect to the database:\n" . $mysqli->connect_error);//诊断连接错误
}
$mysqli->query("set names 'utf8';");//编码转化
$select_db = $mysqli->select_db($mysql_conf['db']);
if (!$select_db) {
    die("could not connect to the db:\n" .  $mysqli->error);
}

function isEmpty($data)
{
    foreach($data as $key => $val)
    {
        if($data[$key]==null)
        {
            return false;
        }else{
            return true;
        }
    }
}

function jsonError($msg)
{
    $arr = array(['msg' => $msg]);
    return json_encode($arr);
}

function jsonSuccess($msg,$data=null)
{
    $arr = array(['msg'=>$msg,'code'=>200,'data',$data]);
    return json_encode($arr);
}
