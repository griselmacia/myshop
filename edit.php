<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myshop";


//conecto base de datos

$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$name = "";
$email= "";
$phone = "";
$address = "";

$errorMessage = "";
$succesMessage = "";    

if ( $_SERVER ['REQUEST_METHOD'] == 'GET') {
// show clientes
  if(!isset($_GET["id"])){
      header("location: /myshop/index.php");
      exit;
  }

  $id = $_GET["id"];

  //seleccion clientes tabla database
  $sqlSelect = "SELECT * FROM clients WHERE id=$id";
  $cliente = $connection->query($sqlSelect);
  $row = $cliente->fetch_assoc();

  if (!$row) {
    header("location: /myshop/index.php");
    exit;
 }
 
 $name = $row["name"];
 $email = $row["email"];
 $phone = $row["phone"];
 $address = $row["address"];

}
else {
// post update clientes

$id = $_POST["id"];
$_name= $_POST["name"];
$_email = $_POST["email"];
$_phone = $_POST["phone"];
$_address = $_POST["address"];

do {
  if ( empty($_name) || empty($_email) || empty($_phone) || empty($_address)  ) {
      $errorMessage = "All the fields are required";
      break;
      }

      // $sql = "UPDATE clients " .
      //       "SET name = '$name', email = '$email', phone = '$phone', address = '$address' " .
      //       "WHERE id = '$id'";

      $sql = "UPDATE clients SET name = '$_name', email = '$_email', phone = '$_phone', address = '$_address' WHERE id = '$id'";

            $result = $connection->query($sql);
      
            if (!$result){
              $errorMessage = "Invalid query: " . $connection->error;
              break;
          }
       
     
          $succesMessage = "Clients update correctly";

          header("location: /myshop/index.php");
          exit;

} while (false);
}  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel ="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
          <h2>New Client</h2>
          <?php
          if ( !empty($errorMessage)) {
            echo "
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                         <strong>$errorMessage</strong>
                         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                         </div>
                         ";

          }

          ?>


          <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Name></label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
              </div>
             </div>
             <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Email></label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
              </div>
             </div>
             <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Phone></label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
              </div>
             </div>
             <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Address></label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
              </div>
             </div>

             <?php
             if  ( !empty($succesMessage) ) {
                echo "
                <div class='row mb-3'>
                   <div class='offset-sm-3 col-sm-6'>
                     <div class='alert alert-success alert-dismissible fade show' role='alert'>
                         <strong>$succesMessage</strong>
                         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                     </div>
                  </div>
                 </div>
                 ";


             }  

             ?>

             <div class="row mb-3">
                 <div class="offset-sm-3 col-sm-3 d-grid">
                     <button type="submit" class="btn btn-primary">submit</button>
                   </div>
                 <div class="col-sm-3 d-grid">
                     <a class="btn btn-outline-primary" href="/myshop/index.php" role="button">Cancel</a>
                 </div>
              </div>
             

          </form>
    </div>
     
</body>
</html>