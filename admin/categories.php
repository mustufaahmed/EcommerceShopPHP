<?php 
    // Include database file
    include '../config/dbconn.php';
    // get database class instance
    $instance = DatabaseConnection::getDbInstance();
    // get database connection
    $conn = $instance->getDbConnection();

    // Products
    // get all products query
    $query = $conn->prepare("SELECT id,category_name FROM categories WHERE del_flg = 0");
    $query->execute();
    // fetch all products
    $categories = $query->fetchAll();

?>
<!-- Header Section Begins Here  -->
<?php include 'Includes/header.php'; ?>
<!-- Header Section Ends Here  -->

<!-- Contains page content -->
<!-- Main content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Categories</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h3 class="card-title">Categories with features</h3>
                    </div>
                    <div class="col-md-3">
                        <a href="./category_insert.php" type="button" class="btn btn-block btn-outline-primary">Add Category</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.no</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        // Traverse products array and append on datatable
                        foreach ($categories as $key => $category) {
                            # code...
                            echo "<tr>
                                    <td>".++$key."</td>
                                    <td>".$category['category_name']."</td>
                                    <td>
                                        <a href='./category_edit.php?cid=".$category['id']."'><i class='fas fa-edit'></i></a>
                                        <a href='./category_delete.php?cid=".$category['id']."'><i class='fas fa-trash'></i></a>
                                    </td>
                                </tr>";
                        } 
                    ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>S.no</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- ./Contains page content -->

<!-- Footer Section Begins Here  -->
<?php include 'Includes/footer.php'; ?>
<!-- Footer Section Ends Here  -->