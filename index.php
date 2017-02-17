<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
/**
 * @param string $dbName
 * @return mysqli
 * @throws mysqli_sql_exception
 */
function conn($dbName) {
    /*static */$conns = [];
 
    if(!isset($conns[$dbName])) {
        extract(require $dbName .'.php');
        $conns[$dbName] = new mysqli($host, $user_name, $password, $dbName);
        $conns[$dbName]->set_charset($charset);
    }
 
    return $conns[$dbName];
}
 
function myDatabase() {
    return conn('john620');
}
 
try {
    $conn = myDatabase();
} catch(mysqli_sql_exception $e) {
    echo $e->getMessage();
}

echo '<pre>'; var_dump($conn); echo '</pre>';









