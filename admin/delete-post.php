<?php
include 'config.php';

if(isset($_GET['id']) && isset($_GET['catid'])){
    $post_id = $_GET['id'];
    $cat_id = $_GET['catid'];

    $sql2="select * from post where post_id = $post_id";
    $result2=mysqli_query($conn,$sql2) or die("Select query failed");
    $row=mysqli_fetch_assoc($result2);
    unlink("uplooad/".$row['post_img']);

   $sql = "UPDATE category SET post = post - 1 WHERE category_id = $cat_id";
    $Result = mysqli_query($conn, $sql);

    if ($Result) {
        
        $sql1 = "DELETE FROM post WHERE post_id = $post_id";
        $Result1 = mysqli_query($conn, $sql1);

        if ($Result1) {
            header("Location: post.php");
        } else {
            echo "Failed to delete the post.";
        }
    } else {
        echo "Failed to update category post count.";
    }
} else {
    header("Location: post.php");
}
?>
