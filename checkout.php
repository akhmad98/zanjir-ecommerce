<?php
session_start();
require_once "application_top.php";
$city = $street = $room = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $city=mysqli_real_escape_string($conn, $_POST['city']);
    $street=mysqli_real_escape_string($conn, $_POST['street']);
    $room=mysqli_real_escape_string($conn, $_POST['room']);
    $userId = $_SESSION['id'];
    $query = mysqli_query($conn, "SELECT * from orders where user_id='$userId'");
    $order_row=mysqli_fetch_array($query);
// echo $city;
// echo $street;
// echo $room;
$sql="UPDATE `orders` SET 
`order_city`='$city', 
`order_street`='$street', 
`order_room`='$room' 
WHERE `user_id` ='$userId'";
$sql1="INSERT INTO `orders_backup`(`order_id`, `order_date`, `order_city`, `order_street`, `product_id`, `quant`) 
SELECT `order_id`, `order_date`, `order_city`, `order_street`, `product_id`, `quant` 
from `orders` 
WHERE `user_id`='$userId'";
$sql2="DELETE FROM `orders` WHERE `user_id` = '$userId'";
// if(empty($order_row['order_city'])){
//     echo $order_row;
// }

if(!empty($order_row['order_city'])){
    if($conn->query($sql1) == TRUE && $conn->query($sql2) == TRUE){
        echo "<script>window.location.href = 'secondface/success.html'</script>";
    }
}
else {

    if($conn->query($sql) == TRUE){
        echo "successfully added adress";
    }
}
// else{
//     echo "hey";
// }
// if()
// while((mysqli_query($conn, $sql)) == true){
//     echo $userId;
// }
// if(isset($_POST['submit'])){
//     if((mysqli_query($conn, $sql)) == true)
//     {
//         echo "<script>window.location.href = 'secondface/success.html'</script>";
//     }
//     else{
//         echo "You are loser";
//     }
// }
}






// {

 
//     $query_add=mysqli_query($conn, $sql);   
//     echo 
//     var_dump($query_add);
//     mysqli_error($query_add);


// }
?>