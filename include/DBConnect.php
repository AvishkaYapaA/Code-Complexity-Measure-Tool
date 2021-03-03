<?php
$db['db_host'] = 'localhost';
$db['db_username'] = 'root';
$db['db_password'] = '';
$db['db_name'] = 'bcap';
$db['db_port'] = '3306';

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}
$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
if ($con) {
} else {
    ?>

    <center><p>Database Error</p></center>


    <?php



}
?>
