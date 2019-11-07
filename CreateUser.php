<?php
    $userid = $_POST['userid'];

    $mysqli = new mysqli("mysql.eecs.ku.edu", "dsutton1080", "aeT7ooph", "dsutton1080");
    if ($mysqli->connect_error) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    if ($userid == ""){
        echo "Empty User Field";
    }
    else {
        $select = "select user_id from Users";
        $insert = "insert into Users (user_id) values ('$userid')";
        $exists = FALSE;

        if ($result = $mysqli->query($select)) {
            while ($row = $result->fetch_assoc()) {
                if ($userid == $row["user_id"]) {
                    $exists = TRUE;
                }
            }
            $result->free();
            if ($exists == FALSE) {
                if ($mysqli->query($insert) === TRUE){
                    echo "User Created";
                }
            }
            else {
                echo "User already exists";
            }
        }
    }
    $mysqli->close();
?>