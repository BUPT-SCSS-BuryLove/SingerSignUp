<?php
    include_once('config.php');

    try {
        $dbh = new PDO("mysql:host={$db_config['host']};dbname={$db_config['dbName']}", $db_config['user'], $db_config['pwd'], [PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
    } catch (PDOExveption $e) {
        print('{"result":"Database Fatal"');
        die();
    }

    mkdir('../FILE/本部');
    foreach($dbh->query('SELECT location, school, name, file FROM SingerInfo WHERE location = "校本部"') as $row) {
        copy($row['file'], '../FILE/本部/'.$row['location'].'-'.$row['school'].'-'.$row['name'].'-'.basename($row['file']));
    }
    print("本部文件收集完成\n");
    mkdir('../FILE/沙河');
    foreach($dbh->query('SELECT location, school, name, file FROM SingerInfo WHERE location = "沙河校区"') as $row) {
        copy($row['file'], '../FILE/沙河/'.$row['location'].'-'.$row['school'].'-'.$row['name'].'-'.basename($row['file']));
    }
    print("沙河文件收集完成\n");
    mkdir('../FILE/宏福');
    foreach($dbh->query('SELECT location, school, name, file FROM SingerInfo WHERE location = "宏福校区"') as $row) {
        copy($row['file'], '../FILE/宏福/'.$row['location'].'-'.$row['school'].'-'.$row['name'].'-'.basename($row['file']));
    }
    print("宏富文件收集完成\n");
?>