<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">Add Category</a>
            </div>
            <div class="col-md-12">
                <?php
                include 'config.php';
                $limit = 3;
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($page - 1) * $limit;

                $sql = "SELECT * FROM category LIMIT {$offset}, {$limit}";
                $result = mysqli_query($conn, $sql) or die("Query failed.");

                if (mysqli_num_rows($result) > 0) {
                ?>
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        $id = $offset + 1; // Calculate the starting serial number based on offset
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td class='id'><?php echo $id++; ?></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td><?php echo $row['post']; ?></td>
                                <td class='edit'><a href='update-category.php?category_id=<?php echo $row["category_id"]; ?>'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='delete-category.php?category_id=<?php echo $row["category_id"]; ?>'><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                }
                ?>
                <?php
                $sql1 = "SELECT * FROM category";
                $result1 = mysqli_query($conn, $sql1) or die("Query failed.");

                if (mysqli_num_rows($result1) > 0) {
                    $total_records = mysqli_num_rows($result1);
                    $total_page = ceil($total_records / $limit);

                    echo "<ul class='pagination admin-pagination'>";
                    if ($page > 1) {
                        echo '<li><a href="categories.php?page=' . ($page - 1) . '">Prev</a></li>';
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $page) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo '<li class="' . $active . '"><a href="categories.php?page=' . $i . '"> ' . $i . '</a></li>';
                    }
                    if ($page < $total_page) { // Fix pagination Next link condition
                        echo '<li><a href="categories.php?page=' . ($page + 1) . '">Next</a></li>';
                    }
                    echo '</ul>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
