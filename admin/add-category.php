<?php
include "header.php";

if(isset($_POST['save'])){
    include "config.php";

    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO category (category_name) VALUES ('$category_name')";
    
    if(mysqli_query($conn, $sql)){
        header("location:category.php");
      }
    mysqli_close($conn); // Close the database connection
}
?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" autocomplete="off">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                </form>
                <!-- /Form End -->
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

