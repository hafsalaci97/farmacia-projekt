<?php
include 'connection.php';
//GET data from posted prescription rows
$name = $_POST["name"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];
echo $name;
echo $quantity;
echo $price;


$id_a = "SELECT id_a FROM artikuj WHERE artikuj.emertimi_a IN('$name');";
$query_run = mysqli_query($con, $id_a);

if (mysqli_num_rows($query_run) > 0){
while ($row = $query_run-> fetch_assoc()){
    $returnBack = $row["id_a"];
    echo ($returnBack);
    $insertPrescription = "INSERT INTO receta (id_a,id_p,id_m,sasi) VALUES ($returnBack,3,4,$quantity);";
    $insertRun = mysqli_query($con,$insertPrescription);
}
}
else {
echo "Error";
}
$con->close();
?>