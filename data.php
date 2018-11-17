<?php
require_once 'connect.php';

 session_start();
$conn = OpenCon();
$username = 'mgergely@sfu.ca';

$sql = "SELECT userId from Users where email = '$username'";
$result = mysqli_query($conn, $sql);
$arr = array();
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
  }
}

$userId = $arr[0]['userId'];


$sql ="SELECT Book.bookName, WishList.saleId, UsedBook.userId, UsedBook.price, UsedBook.description, UsedBook.timeStamp
FROM UsedBook, Book, WishList
where UsedBook.saleId = WishList.saleId and UsedBook.bookId = Book.bookId and WishList.userId = '$userId'";
$result = mysqli_query($conn, $sql);
$arr = array();
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
  }
}

foreach($arr as $data){

  echo "<div class='rcorners' >"."<div class='tab'>" . 'Book Name: '. $data['bookName'] ."</div>"
  ."User ID: ". $data['userId'] . "<br>"
  ."Price: ". $data['price']."$" ."<br>"
  ."Description: ". $data['description'] ."<br>"
  ."Timestamp: ". $data['timeStamp']. "<br></br>".
  "<form action='wishlist-process.php' method='post' >
  <input type='hidden' name='saleId' value='{$data['saleId']}'>
  <input type='hidden' name='userId' value='$userId'>
  <input type='submit' value='Remove from WishList' style='color:white; border-color:#a60701; padding:5px; background-color: #a60701; border-radius: 5px;'>
  </form>".
  "<form action='message.php' method='post' >
  <input type='hidden' name='userId' value='{$data['userId']}'>
  <input type='submit' value='Message Seller' style='color:white; border-color:#a60701; padding:5px; background-color: #a60701; border-radius: 5px;'>
  </form>"
  ."</div>";

}
?>
