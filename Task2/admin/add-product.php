<!-- contains form fields for adding new products html only -->
<?php
define('BASE_ADMIN_URL', '/online-shop/admin/');
define('BASE_PATH', '../');
require_once('../logic/categories.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin add product</title>
    <link href="../css/style.css" rel="stylesheet" />
</head>
<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="name" class="form-control" placeholder="Product Name">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<body>
    <form>
    </form>
</body>

</html>