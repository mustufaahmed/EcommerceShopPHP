<?php 
    // Include database file
    include '../config/dbconn.php';
    // get database class instance
    $instance = DatabaseConnection::getDbInstance();
    // get database connection
    $conn = $instance->getDbConnection();

    // Products
    // get all products query
    $query = $conn->prepare("SELECT p.id,p.product_name,c.category_name,p.price,p.qty FROM products p,categories c WHERE p.category_id = c.id AND p.del_flg = 0");
    $query->execute();
    // fetch all products
    $products = $query->fetchAll();

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
            <h1>Products</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
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
                        <h3 class="card-title">Products with features</h3>
                    </div>
                    <div class="col-md-3">
                        <a href="./product_insert.php" type="button" class="btn btn-block btn-outline-primary">Add Product</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.no</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        // Traverse products array and append on datatable
                        foreach ($products as $key => $product) {
                            # code...
                            echo "<tr>
                                    <td>".++$key."</td>
                                    <td>".$product['product_name']."</td>
                                    <td>".$product['category_name']."</td>
                                    <td>".$product['price']."</td>
                                    <td>".$product['qty']."</td>
                                    <td>
                                        <a href='./product_edit.php?pid=".$product['id']."'><i class='fas fa-edit'></i></a>
                                        <a href='./product_delete.php?pid=".$product['id']."'><i class='fas fa-trash'></i></a>
                                    </td>
                                </tr>";
                        } 
                    ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>S.no</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Qty</th>
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