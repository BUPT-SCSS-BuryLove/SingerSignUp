<?php
    include_once('config.php');
    //session_set_cookie_params(0, true, true);
    session_start();
    //print(session_id());
    unset($_SESSION['studentID']);
    
    if (!isset($_POST['studentID']) || empty($_POST['studentID'])) {
        die();
    }

    try {
        $dbh = new PDO("mysql:host={$db_config['host']};dbname={$db_config['dbName']}", $db_config['user'], $db_config['pwd'], [PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
    } catch (PDOExveption $e) {
        print('{"result":"Database Fatal"');
        die();
    }

    try {
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $dbh->prepare("SELECT studentID, pwd FROM `SingerInfo` WHERE studentID = ?");
        $stmt->execute(array($_POST['studentID']));
        if (!$row = $stmt->fetch(PDO::FETCH_NAMED)) {
            $stmt = $dbh->prepare("INSERT INTO `SingerInfo` (`studentID`) VALUES ( ? )");
            if($stmt->execute(array($_POST['studentID']))){
                print('insert');
            }
            $_SESSION['studentID'] = $_POST['studentID'];
            print('{"result":"NewUser"}');
        } else if ($row['pwd'] == null) {
            $_SESSION['studentID'] = $_POST['studentID'];
            print('{"result":"NewUser"}');
        } else if ($row['pwd'] == $_POST['pwd']) {
            print('{"result":"Succeeded"}');
            $_SESSION['studentID'] = $_POST['studentID'];
        } else {
            print('{"result":"Failed"}');
            unset($_SESSION['studentID']);
        }
    } catch (Exception $e) {
        $dbh->rollBack();
        print('{"result":"Failed"}');
        //print($e->getMessage());
    }
?>