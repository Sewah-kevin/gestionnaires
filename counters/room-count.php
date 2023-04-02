<?php 
    include './db.php';
    $sql = "SELECT * FROM room WHERE room_no IS NOT NULL";
    $query = $connection->query($sql);

    echo "$query->num_rows";

?>