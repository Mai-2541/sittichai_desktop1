<?php
include("conn.php");
include("header.php");
?>
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h4>Product</h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="index.php" class="form-inline">
                <input class="form-control" name="keyword" type="search" placeholder="Product Search..">
                <button type="submit" class="btn btn-primary">Search</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </form>
        </div>
    </div>
    <hr>



    <?php
    $keyword = $_GET['keyword'];
    if ($keyword) {
        echo "<h5>ค้นหา: " . $keyword . "</h5>";
        $sql = "SELECT * FROM Products
    WHERE ProductID LIKE '%$keyword%'
    OR ProductName LIKE '%$keyword%'
    OR Category LIKE '%$keyword%'
    OR ProductDescription LIKE '%$keyword%'    
     ";
    } else {
        $sql = "SELECT * FROM Products";
    }
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Category</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity Stock</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["ProductID"]; ?></td>
                        <td><a href="detail.php?id=<?php echo $row["ProductID"]; ?>"><?php echo $row["ProductName"]; ?></a></td>
                        <td><img src="<?php echo $row["Picture"]; ?>" style="width:100px;"></td>
                        <td><?php echo $row["Category"]; ?></td>
                        <td><?php echo $row["ProductDescription"]; ?></td>
                        <td>฿ <?php echo number_format($row["Price"], 2); ?></td>
                        <td><?php echo $row["QuantityStock"]; ?></td>
                    </tr>
            <?php
                }
            } else {
                echo "์NO DATA!!";
                555555555555555
                
            }
            ?>

            </thead>
        </table>
</div>

<?php
include('footer.php');
?>