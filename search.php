<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="BookStore.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <style>
    table, thead, tbody{
      width: 100%;
    }
    @media screen and (max-width: 900px) {
      table, thead, tbody, th, td, tr {
    		display: block;
        width: 100%;
    	}
    }
  </style>
</head>
<body class = "background3">

  <div class="header">
    <h1>BOOKTRADE</h1>
    <div class="login">
      <?php
      require_once "functions.php";
      session_start();
      login();
      ?>
    </div>
  </div>

  <div class="topnav">
    <ul>
      <li>
         <a href="home.php"><i class="fas fa-home"></i> Home</a>
      </li>
      <li>
        <a href="search.php" class="active"><i class="fas fa-search"></i> Search</a>
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

  <div class="searchBar">
    <form action="search-process.php" method="post">
      <table>
        <tr>
          <td><input name="departmentName" type="text" placeholder="Department"></td>
          <td><input name="classNumber" type="text" placeholder="Class Number"></td>
          <td><input name="section" type="text" placeholder="Section"></td>
          <td><input name="bookName" type="text" placeholder="Book Name"></td>
          <td><input type="submit" style='width:100%' value="Search"></td>
        </tr>
    </table>
    </form>
  </div>

  <div class="instructions">
    <p >Hi, welcome to our Bookstore search engine. We hope you are happy and ready to search for friendly priced books. To begin, simply search to see all available books or use some of our menu options to narrow down search results.</p>
    <p s>Happy surfing! :)</p>
  </div>

</body>
</html>
