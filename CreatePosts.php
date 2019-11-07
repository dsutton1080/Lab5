<?php
    $username = $_POST['username'];
    $post = $_POST['post'];
    $mysqli = new mysqli("mysql.eecs.ku.edu", "dsutton1080", "aeT7ooph", "dsutton1080");
    if ($mysqli->connect_error) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    if ($username == "" || $post == ""){
        echo "A field is empty";
    }
    else{
        $select = "select user_id from Users";
        $insert = "insert into Posts (content, author_id) values ('$post', '$username')";
        $exists = FALSE;

        if ($result = $mysqli->query($select)) {
            while ($row = $result->fetch_assoc()) {
                if ($username == $row["user_id"]) {
                    $exists = TRUE;
                }
            }
            $result->free();
            if ($exists == False){
                echo "This user does not exist";
            }
            else {
                if ($mysqli->query($insert) === TRUE){
                    echo "Post Created";
                }
                else {
                    echo "Post Not Created";
                }
            }
        }
    }
    $mysqli->close();
?>