<?php
    include_once('config.php');

    try {
        $dbh = new PDO("mysql:host={$db_config['host']};dbname={$db_config['dbName']}", $db_config['user'], $db_config['pwd'], [PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
    } catch (PDOExveption $e) {
        print('{"result":"Database Fatal"');
        die();
    }

    $dir = '../FILE/西土城校区'; 
    $filename;
    mkdir(iconv("utf-8","gbk", $dir));
    foreach($dbh->query('SELECT campus, school, name, file FROM SingerInfo WHERE campus = "西土城校区"') as $row) {
        $filename = $dir.'/'.$row['campus'].'-'.$row['school'].'-'.$row['name'].'-'.basename($row['file']);
        $filename = iconv("utf-8","gbk", $filename); 
        copy(iconv("utf-8","gbk", '../FILE/'.$row['file']), $filename);
    }
    print("西土城文件收集完成\n");
    $dir = '../FILE/沙河';
    mkdir(iconv("utf-8","gbk", $dir));
    foreach($dbh->query('SELECT campus, school, name, file FROM SingerInfo WHERE campus = "沙河校区"') as $row) {
        $filename = $dir.'/'.$row['campus'].'-'.$row['school'].'-'.$row['name'].'-'.basename($row['file']);
        $filename = iconv("utf-8","gbk", $filename); 
        copy(iconv("utf-8","gbk", '../FILE/'.$row['file']), $filename);
    }
    print("沙河文件收集完成\n");
    $dir = '../FILE/宏福';
    mkdir(iconv("utf-8","gbk", $dir));
    foreach($dbh->query('SELECT campus, school, name, file FROM SingerInfo WHERE campus = "宏福校区"') as $row) {
        $filename = $dir.'/'.$row['campus'].'-'.$row['school'].'-'.$row['name'].'-'.basename($row['file']);
        $filename = iconv("utf-8","gbk", $filename); 
        copy(iconv("utf-8","gbk", '../FILE/'.$row['file']), $filename);
    }
    print("宏富文件收集完成\n");
?>