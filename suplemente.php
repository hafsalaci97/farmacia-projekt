<?php
// include 'connection.php';
$List = array();
    
if(isset($_POST['suplemente'])){
    foreach($_POST['suplemente'] as $k){
        // echo $k."</br>";
        array_push($List,$k);
    }
    // print_r($List);
    $commaSep = "'" . implode ( "', '", $List ) . "'";
    // echo $commaSep;
    $sql = "SELECT *
            FROM artikuj
            WHERE artikuj.klasifikimi IN ($commaSep);";     

$query_run = mysqli_query($con, $sql);
// $result = $con->query($sql);

if (mysqli_num_rows($query_run) > 0){
while ($row = $query_run-> fetch_assoc()){
    echo "<tr><td>".$row["emertimi_a"] . "</td><td>" . $row["klasifikimi"]."</td><td>".$row["cmimi"]."</td><td>"."<button type='button' class='btn btn-info add-new'><i class='fa fa-plus'></i></button>"."</td></tr>";
}
}
else {
echo "Error";
}
$con->close();

}



?>