<?php
if(isset($_SESSION['aid'])){
    
}else{
    echo "<script> window.location='login'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="dashboard">
                <h5 class="pt-1">Dashboard</h5>
            </a>
            <!-- Toggle button -->
            <button data-mdb-button-init class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?php echo $_SESSION['aname']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_product">Add Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout">Logout</a>
                    </li>
                </ul>
                <!-- Left links -->

                <!-- Right elements -->
                

                   
                  
                </div>
                <!-- Right elements -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <!-- <div style="height: 80px;"></div> -->


<!-- Product Start Here  -->
<main>
    <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        <?php
											if (!empty($product)) {
												foreach ($product as $val) {
											?>
            <div class="col">
                <div class="card h-100 shadow-sm"> <img src="upload/product/<?php echo $val->p_img?>" class="card-img-top img-fluid" alt="product">
                    <div class="card-body">
                        <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-primary"><?php echo $val->status; ?> </span> <span class="float-end price-hp"><?php echo $val->price; ?>&euro;</span> </div>
                        <h3 class="card-title"><?php echo $val->p_name; ?></h3>
                        <h5 class="card-title"><?php echo $val->description; ?></h5>
                        <span class=" my-4 me-5"> <a href="edit_product?eproduct=<?php echo $val->p_id; ?>" class="btn btn-success">Edit>>></a> </span>
                        <span class=" my-4"> <a href="delte_product?delete_p=<?php echo $val->p_id; ?>" class="btn btn-danger">Delete</a> </span>
                    </div>
                </div>
            </div>
            <?php
												}
											} else {
												?>
												<tr>
													<td align="center" colspan="5"> Data Not Found </td>
												</tr>
											<?php
											}
											?>
        </div>
    </div>
</main>

    <!-- Footer -->
    <footer class="bg-primary text-center text-white">
   

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">Crud_Task_On_MVC</a>
    </div>
    <!-- Copyright -->
</footer>
    <!-- Footer -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>