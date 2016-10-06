<?php
    include_once('config.php');
    //session_set_cookie_params(0, true, true);
    session_start();
    if (!isset($_SESSION['studentID'])) {
        print('Forbidden');
        die();
    }
    
    if ($_FILES['userfile']['size'] > 30000000) {
        print('Forbidden');
        die();
    }
    $fileBasename = basename($_FILES['userfile']['name']);
    $filename = '../FILE/'.$fileBasename;
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $filename)) {
    } else {
        print('Failed');
        die();
    }

    try {
        $dbh = new PDO("mysql:host={$db_config['host']};dbname={$db_config['dbName']}", $db_config['user'], $db_config['pwd'], [PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->beginTransaction();
        

        $stmt = $dbh->prepare("UPDATE SingerInfo SET file = ? WHERE studentID = {$_SESSION['studentID']}");
        $stmt->execute(array($fileBasename));
        $dbh->commit();
    } catch (PDOExveption $e) {
        $dbh->rollBack();
        print('Failed');
        die();
    }

    print('Succeeded');    
?>