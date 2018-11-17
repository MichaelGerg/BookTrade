
<!doctype html>
<html>
<head>
<!-- http://fortawesome.github.io/Font-Awesome/get-started/ -->
<meta charset="utf-8">
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel = "stylesheet" type="text/css" href="BookStore.css">

</head>
<body class="background">
         <div class="jumbotron text-center"style="margin-bottom:0"style="margin-top:0">

           <h1>BOOKTRADE</h1>

           <div class="login">
             <?php

             session_start();

             if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

              echo '<div class="login"><a class="btn btn-danger" style="background-color:#ad1714; border-color:#91110a;" href="login.php"> Sign in </a></div>';

             }

             else{

               $username = $_SESSION['email'];
               echo "<div class=\"correct\">You are signed in as, <a href=\"profile.php\"> $username</a></div>";
               echo '<div class="login"><a href="logout.php" class="btn btn-danger" style="background-color:#ad1714; border-color:#91110a;">Sign Out</a></div>';

             }

             ?>
           </div>
          </div>

          <nav class="navbar" style="margin-bottom:0"style="margin-top:0">
            <div class="navbar-inner">
                <ul class="nav">
                    <li>
                       <a href="home.php"><i class="icon-home icon-large"></i> Home </a>
                    </li>
                    <li>
                      <a href="search.php"> Search </a>
                    </li>
                    <li>
                      <a href="sell.php"> Sell Books </a>
                    </li>
                    <li>
                      <a href="wishlist.php"> WishList </a>
                    </li>
                    <li>
                      <a href="data-analysis.php"> Data Analysis </a>
                    </li>
                    <li>
                     <a href="about.php"> About </a>
                    </li>
               </ul>
            </div>
          </nav>


      <?php
      require_once 'connect.php';

      $conn = OpenCon();

      $saleId = $_POST['saleId'];

      $sql ="SELECT Book.bookName, UsedBook.saleId, UsedBook.userId, UsedBook.price, UsedBook.description, UsedBook.timeStamp
      FROM UsedBook, Book
      where UsedBook.saleId = '$saleId' and UsedBook.bookId = Book.bookId";

      $result = mysqli_query($conn, $sql);
      $arr = array();
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          $arr[] = $row;
        }
      }

      echo "<div class='rcorners' >"."<div class='tab'>" . 'Book Name: '. $arr[0]['bookName'] ."</div>"
      ."User ID: ". $arr[0]['userId'] . "<br>"
      ."Price: ". $arr[0]['price']."$" ."<br>"
      ."Description: ". $arr[0]['description'] ."<br>"
      ."Timestamp: ". $arr[0]['timeStamp']. "<br></br>".
      "<form action='info-process.php' method='post' >
      <input type='hidden' name='saleId' value='{$arr[0]['saleId']}'>
      <input type='submit' value='Add to WishList' style='color:white; border-color:#a60701; padding:5px; background-color: #a60701; border-radius: 5px;'>
      </form>"
      ."</div>";
      ?>

  </body>
 </html>
