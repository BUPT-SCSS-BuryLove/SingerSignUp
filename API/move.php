<?php
    include_once('config.php');

    try {
        $dbh = new PDO("mysql:host={$db_config['host']};dbname={$db_config['dbName']}", $db_config['user'], $db_config['pwd'], [PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
    } catch (PDOExveption $e) {
        print('{"result":"Database Fatal"');
        die();
    }

    mkdir('../FILE/西土城校区');
    foreach($dbh->query('SELECT campus, school, name, file FROM SingerInfo WHERE campus = "西土城校区"') as $row) {
        copy('../FILE/'.$row['file'], '../FILE/西土城校区/'.$row['campus'].'-'.$row['school'].'-'.$row['name'].'-'.basename($row['file']));
    }
    print("西土城文件收集完成\n");
    mkdir('../FILE/沙河');
    foreach($dbh->query('SELECT campus, school, name, file FROM SingerInfo WHERE campus = "沙河校区"') as $row) {
        copy('../FILE/'.$row['file'], '../FILE/沙河/'.$row['campus'].'-'.$row['school'].'-'.$row['name'].'-'.basename($row['file']));
    }
    print("沙河文件收集完成\n");
    mkdir('../FILE/宏福');
    foreach($dbh->query('SELECT campus, school, name, file FROM SingerInfo WHERE campus = "宏福校区"') as $row) {
        copy('../FILE/'.$row['file'], '../FILE/宏福/'.$row['campus'].'-'.$row['school'].'-'.$row['name'].'-'.basename($row['file']));
    }
    print("宏富文件收集完成\n");
?>