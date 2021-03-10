<?php 
    // Include database file
    include '../config/dbconn.php';
    // get database class instance
    $instance = DatabaseConnection::getDbInstance();
    // get database connection
    $conn = $instance->getDbConnection();

    // Get Product Form data
    // declare null variable to show success alert after product submit
    $result = null;
    // declare variables to store form data
    $category_name = '';
    // validate HTTPS request method
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        # code...
        // Get data and assign in variables
        $category_name = $_POST['category_name'];
        // Insert product record in database
        $query = $conn->prepare("INSERT INTO categories (category_name) VALUES (?)");
        // execute statement and store flag in result variable
        $result = $query->execute([$category_name]);
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
                <h1>Add Category Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add Category Form</li>
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
                        Category Added Successfully !
                    </div>
            <?php } ?>
            <!-- ./Product Success Alert -->
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input class="form-control" type="text" name="category_name" placeholder="Product Name">
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