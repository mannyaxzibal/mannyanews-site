<?php
include "config.php";

$category_id = $_GET['category_id'];

$sql = "DELETE FROM category WHERE category_id = '$category_id'";

if(mysqli_query($conn, $sql)){
    header("location: category.php");
} else {
    echo "<p style='color:red; margin:10px 0;'>Can't delete category.</p>";
}

mysqli_close($conn);
?>

