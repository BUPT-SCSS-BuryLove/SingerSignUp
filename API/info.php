<?php
    include_once('config.php');
    //session_set_cookie_params(0, true, true);
    session_start();
    //print(session_id());
    if (!isset($_SESSION['studentID'])) {
        print('{"result":"Forbidden"}');
        die();
    }

    try {
        $dbh = new PDO("mysql:host={$db_config['host']};dbname={$db_config['dbName']}", $db_config['user'], $db_config['pwd'], [PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
    } catch (PDOExveption $e) {
        print('{"result":"Database Fatal"');
        die();
    }

    if ($_SERVER['REQUEST_METHOD']=="GET") {
        foreach($dbh->query("SELECT studentID, pwd, campus, school, name, gender, contact, college_class, title, noMusic, type, teamName, teamPeople, teamInfo, file FROM SingerInfo WHERE studentID = {$_SESSION['studentID']}", PDO::FETCH_NAMED) as $result) {
            print(json_encode($result, JSON_UNESCAPED_UNICODE));
        }
        die();
    }

    try {
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->beginTransaction();
        

        if (isset($_POST['pwd'])) {
            $stmt = $dbh->prepare("UPDATE SingerInfo SET pwd = ? WHERE studentID = {$_SESSION['studentID']}");
            $stmt->execute(array($_POST['pwd']));
        }
        if (isset($_POST['campus'])) {
            $stmt = $dbh->prepare("UPDATE SingerInfo SET campus = ? WHERE studentID = {$_SESSION['studentID']}");
            $stmt->execute(array($_POST['campus']));
        }
        if (isset($_POST['school'])) {
            $stmt = $dbh->prepare("UPDATE SingerInfo SET school = ? WHERE studentID = {$_SESSION['studentID']}");
            $stmt->execute(array($_POST['school']));
        }
        if (isset($_POST['name'])) {
            $stmt = $dbh->prepare("UPDATE SingerInfo SET name = ? WHERE studentID = {$_SESSION['studentID']}");
            $stmt->execute(array($_POST['name']));
        }
        if (isset($_POST['gender'])) {
            $stmt = $dbh->prepare("UPDATE SingerInfo SET gender = ? WHERE studentID = {$_SESSION['studentID']}");
            $stmt->execute(array($_POST['gender']));
        }
        if (isset($_POST['contact'])) {
            $stmt = $dbh->prepare("UPDATE SingerInfo SET contact = ? WHERE studentID = {$_SESSION['studentID']}");
            $stmt->execute(array($_POST['contact']));
        }
        if (isset($_POST['college_class'])) {
            $stmt = $dbh->prepare("UPDATE SingerInfo SET college_class = ? WHERE studentID = {$_SESSION['studentID']}");
            $stmt->execute(array($_POST['college_class']));
        }
        if (isset($_POST['title'])) {
            $stmt = $dbh->prepare("UPDATE SingerInfo SET title = ? WHERE studentID = {$_SESSION['studentID']}");
            $stmt->execute(array($_POST['title']));
        }
        if (isset($_POST['noMusic'])) {
            $stmt = $dbh->prepare("UPDATE SingerInfo SET noMusic = ? WHERE studentID = {$_SESSION['studentID']}");
            $stmt->execute(array($_POST['noMusic']));
        }
        if (isset($_POST['type'])) {
            $stmt = $dbh->prepare("UPDATE SingerInfo SET type = ? WHERE studentID = {$_SESSION['studentID']}");
            $stmt->execute(array($_POST['type']));
        }
        if (isset($_POST['teamName'])) {
            $stmt = $dbh->prepare("UPDATE SingerInfo SET teamName = ? WHERE studentID = {$_SESSION['studentID']}");
            $stmt->execute(array($_POST['teamName']));
        }
        if (isset($_POST['teamPeople'])) {
            $stmt = $dbh->prepare("UPDATE SingerInfo SET teamPeople = ? WHERE studentID = {$_SESSION['studentID']}");
            $stmt->execute(array($_POST['teamPeople']));
        }
        if (isset($_POST['teamInfo'])) {
            $stmt = $dbh->prepare("UPDATE SingerInfo SET teamInfo = ? WHERE studentID = {$_SESSION['studentID']}");
            $stmt->execute(array($_POST['teamInfo']));
        }

        $dbh->commit();
        print('{"result":"Succeeded"}');
    } catch (Exception $e) {
        $dbh->rollBack();
        print('{"result":"Failed"}');
    }
?>