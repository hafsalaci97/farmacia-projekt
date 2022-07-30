<?php
include 'connection.php';
$myArr = json_decode(($_POST['myJsonString']), true);

    $List = json_encode($myArr);
    $fillArray = [];
    $arr = json_decode(json_encode ($myArr) , true);
    
    // echo $List;
    foreach ($arr as $a) {
        array_push($fillArray,$a);
    }
    $List1 = json_encode($fillArray);
    $a = str_replace('"', "'", $List1);
    $b = str_replace('[', '', $a);
    $c = str_replace(']', '', $b);
    // echo $c;
    $sql = "SELECT *
            FROM artikuj
            WHERE artikuj.klasifikimi IN ($c);";  
$query_run = mysqli_query($con, $sql);

if (mysqli_num_rows($query_run) > 0){
while ($row = $query_run-> fetch_assoc()){
    // echo "<tr><td>".$row["emertimi_a"] . "</td><td>" . $row["klasifikimi"]."</td><td>".$row["cmimi"]."</td><td>"."<button type='button' class='btn btn-info add-new'><i class='fa fa-plus'></i></button>"."</td></tr>";
    $returnBack = "<tr><td>".$row["emertimi_a"] . "</td><td>" . $row["klasifikimi"]."</td><td>".$row["cmimi"]."</td><td>"."<button type='button' class='btn btn-info add-new' ><i class='fa fa-plus'></i></button>"."</td></tr>";
    echo ($returnBack);
}
}
else {
echo "Error";
}
$con->close();
?>