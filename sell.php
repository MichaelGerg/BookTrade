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
<body class = "background3">

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
        <a href="sell.php" class="active"><i class="fas fa-book"></i> Sell Books</a>
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

  <form action="sell-process.php" method="post">
    <div class="results">
      <div class='section'>Sell Your Used Book!</div>
        <?php
        include 'connect.php';
        $conn = OpenCon();

        $sql = "SELECT userId from Users where email = '$username'";
        $userId = getUserId($conn, $sql);

        echo "<div class='card'>";
        echo "<input type='hidden' name='userId' value='$userId'>";

        echo "<p>Choose the book you wish to sell (type to narrow results):</p>";
        $result = $conn->query("select bookName from Book");
        echo "<select name='bookName'>";
        while ($row = $result->fetch_assoc()) {
          unset($bookName);
          $bookName = $row['bookName'];
          echo '<option value="'.$bookName.'">'.$bookName.'</option>';
        }
        echo "</select>";
        ?>
        <p>Pick the price you wish to sell your book for:</p>
        <div>$ <input name="price" type="number" min="0" step="1" placeholder="Price" style="width:120px; height:35px;"></div>
        <p>Give an optional description (max 255 characters):</p>
        <textarea rows="5" cols="60" name="description" type="text" maxlength="255"></textarea>
        <br />
        <input type="submit" value="Add listing">
      </div>
    </div>
  </form>

  <form action="manual-entry.php" method="post">
    <div class="results">
      <div class='section'>Don't see your book?</div>
        <?php

        echo "<div class='card'>";
        echo "<input type='hidden' name='userId' value='$userId'>";

        echo "<p>Enter the book you wish to sell:</p>";
        echo "<input type='text' name='bookName' placeholder='Enter book name...'>";

        echo "<p>Choose the department (type to narrow results):</p>";
        $result = $conn->query("select departmentName from Departments");
        echo "<select name='departmentName'>";
        while ($row = $result->fetch_assoc()) {
          unset($departmentName);
          $departmentName = $row['departmentName'];
          echo '<option value="'.$departmentName.'">'.$departmentName.'</option>';
        }
        echo "</select>";

        echo "<p>Choose the course number (type to narrow results):</p>";
        $result = $conn->query("select distinct classNumber from Classes");
        echo "<select name='classNumber'>";
        while ($row = $result->fetch_assoc()) {
          unset($classNumber);
          $classNumber = $row['classNumber'];
          echo '<option value="'.$classNumber.'">'.$classNumber.'</option>';
        }
        echo "</select>";
        ?>
        <p>Enter the section (optional):</p>
        <input type='text' name='section' placeholder="Enter section...">
        <p>Enter the course instructor (optional):</p>
        <input type='text' name='instructor' placeholder="Enter instructor...">

        <p>Pick the price you wish to sell your book for:</p>
        <div>$ <input name="price" type="number" min="0" step="1" placeholder="Price" style="width:120px; height:35px;"></div>
        <p>Give an optional description (max 255 characters):</p>
        <textarea rows="5" cols="60" name="description" type="text" maxlength="255"></textarea>
        <br />
        <input type="submit" value="Add listing">
      </div>
    </div>
  </form>

</body>
</html>
