<?php
    $dsn = 'mysql:dbname=test_db;host=localhost;';
    $user = 'koizumi';
    $password = 'syutyu4647';
    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_GET['id']
    
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
    
        $sql = "delete from user where =:id";
        $stmt = $dbh->prepare($sql);
        $prams = array(':id'=> $id);
        $stmt->execute($prams);
    
        header('Location: index.php?fg=1');
        
    } catch (PDOException $e) {
        header('Location: index.php?fg=2?err='.$e->getMessage());
        exit();
    }
?>