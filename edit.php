

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="col-2"></div>
    <div class="col-8 mt-5">
        
        <form method="POST" action="#" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input type="text" name="p_name" value="<?php echo $fetch->p_name; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Name">
            
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Product Image</label>
            <input type="file" name="p_img" value="<?php echo $fetch->p_img; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Image">
            <img src="upload/product/<?php echo $fetch->p_img; ?>" width="50" alt="">
            
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Product Price</label>
            <input type="number" name="price" value="<?php echo $fetch->price; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Price">
            
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="text" value="<?php echo $fetch->description; ?>" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter description">
            
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Status</label>
            <input type="text" value="<?php echo $fetch->status; ?>" name="status" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="In Stock / Out of Stock">
            
        </div>
        
      
        
        <button type="submit" name="save" class="btn btn-primary">Update Product</button>
        </form>
    </div>
    <div class="col-2"></div>
    <a href="dashboard" class="mt-5"> <button class="btn btn-success mt-5" > Back </button></a>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>