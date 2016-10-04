<?php
    include_once('config.php');
    session_set_cookie_params(0, true, true);
    session_start();
    unset($_SESSION['studentID']);

    try {
        $dbh = new PDO("mysql:host={$db_config['host']};dbname={$db_config['dbName']}", $db_config['user'], $db_config['pwd'], [PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
    } catch (PDOExveption $e) {
        print('{"result":"Database Fatal"');
        die();
    }

    $stmt = $dbh->prepare("SELECT studentID, pwd FROM `SingerInfo` WHERE studentID = ?");
    $stmt->execute(array($_POST['studentID']));
    $row = $stmt->fetch(PDO::FETCH_NAMED);

    if ($row == null) {
        print('{"result":"NewUser"}');
        $_SESSION['studentID'] = $_POST['studentID'];
    } else if ($row['pwd'] == $_POST['pwd']) {
        print('{"result":"Succeeded"}');
        $_SESSION['studentID'] = $_POST['studentID'];
    } else {
        print('{"result":"Failed"}');
        unset($_SESSION['studentID']);
    }
?>