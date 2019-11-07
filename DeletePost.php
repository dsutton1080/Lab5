<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "dsutton1080", "aeT7ooph", "dsutton1080");

    if(isset($_POST['post_id'])) {
        $list = $_POST['post_id'];
        $size = count($list);

        for ($x = 0; $x < $size; $x++){
            $delete = "delete from Posts where post_id=$list[$x]";
            if ($result = $mysqli->query($delete)) {
               echo "Post has been deleted.";
               echo "<br>";
            }
        }
    }
    else {
        echo "You must select something to delete.";
    }
    $mysqli->close();
?>