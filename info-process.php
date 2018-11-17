<?php
// Initialize the session
session_start();

if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  header("location: error.php");
  exit;
}
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="BookStore.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body class="black">

  <div class="header">
    <h1>BOOKTRADE</h1>
    <div class="login">
      <?php
      require_once "functions.php";
      $username = login();
      ?>
    </div>
  </div>

  <div class="topnav">
    <ul>
      <li>
         <a href="home.php"><i class="fas fa-home"></i> Home</a>
      </li>
      <li>
        <a href="search.php"><i class="fas fa-search"></i> Search</a>
      </li>
      <li>
        <a href="sell.php"><i class="fas fa-book"></i> Sell Books</a>
      </li>
      <li>
        <a href="wishlist.php"><i class="fas fa-list"></i> Wishlist</a>
      </li>
      <li>
        <a href="chat.php"><i class="fas fa-comments"></i> Messages</a>
      </li>
      <li>
       <a href="about.php"><i class="fas fa-users"></i> About</a>
      </li>
   </ul>
  </div>

  <?php
  require_once 'connect.php';
  $conn = OpenCon();
  $saleId = $_POST['saleId'];

  $sql = "SELECT userId from Users where email = '$username'";
  $userId = getUserId($conn, $sql);

  $sql = "INSERT into WishList (saleId, userId) values ('$saleId','$userId')";
  if ($conn->query($sql) === TRUE) {
    echo "<div class='container'>Successfully added to wishlist</div>";
  }
  else {
    echo "<div class='container'>There was an error! Please try again</div>";
  }
  ?>

</body>
</html>

<!--echo '<script type="text/javascript">alert("There was an error!");</script>';-->
