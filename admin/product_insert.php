<?php 
    // Include database file
    include '../config/dbconn.php';
    // get database class instance
    $instance = DatabaseConnection::getDbInstance();
    // get database connection
    $conn = $instance->getDbConnection();

    // Product Category
    // get product categories query
    $query = $conn->prepare("SELECT id,category_name FROM categories");
    $query->execute();
    // fetch all product categories
    $categories = $query->fetchAll();

    // Get Product Form data
    // declare null variable to show success alert after product submit
    $result = null;
    // declare variables to store form data
    $product_name = $category_id = $product_price = $product_qty = '';
    // validate HTTPS request method
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        # code...
        // Get data and assign in variables
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_id'];
        $product_price = $_POST['product_price'];
        $product_qty = $_POST['product_qty'];
        // Insert product record in database
        $query = $conn->prepare("INSERT INTO products (category_id,product_name,price,qty) VALUES (?,?,?,?)");
        // execute statement and store flag in result variable
        $result = $query->execute([$category_id,$product_name,$product_price,$product_qty]);
    }

?>
<!-- Header Section Begins Here  -->
<?php include 'Includes/header.php'; ?>
<!-- Header Section Ends Here  -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Product Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add Product Form</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- Product Success Alert -->
            <?php
                if (!is_null($result)) { ?>
                    <!-- code... -->
                    <div class="alert alert-success" role="alert">
                        Product Added Successfully !
                    </div>
            <?php } ?>
            <!-- ./Product Success Alert -->
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input class="form-control" type="text" name="product_name" placeholder="Product Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category</label>
                                    <select class="custom-select rounded-0" id="exampleSelectRounded0" name="category_id">
                                        <?php 
                                            foreach($categories as $category){
                                                echo "<option value=".$category['id'].">".$category['category_name']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input class="form-control" type="number" placeholder="Product Price" name="product_price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Qty</label>
                                    <input class="form-control" type="number" placeholder="Product Qty" name="product_qty">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer Section Begins Here  -->
<?php include 'Includes/footer.php'; ?>
<!-- Footer Section Ends Here  -->