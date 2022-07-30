<?php
include_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
<title>Bootstrap Table with Add and Delete Row Feature</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./herbapharm.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script>

function myFilterSearch() {
// Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

// Loop through all the table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>
</head>

<body>
<button class="accordion">Barna</button>
<div class="panel">
    <p>
        <form method="POST" action="">
        <?php
            $specialitete_query = "SELECT specialitete_barna.emertimi_b
            FROM specialitete_barna 
            JOIN art_spec_b JOIN artikuj ON artikuj.id_a = art_spec_b.id_a AND specialitete_barna.id_b = art_spec_b.id_b 
            WHERE artikuj.klasifikimi = specialitete_barna.emertimi_b;";
            $query_run = mysqli_query($con, $specialitete_query);

            if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $specialitete)
                        {
                            ?>
                            <input type="checkbox" class="kozmetike" name="specialitete[]" value="<?= $specialitete['emertimi_b']; ?>" onchange="getCollection()"/> <?= $specialitete['emertimi_b']; ?> <br/>
                            <?php
                        }
                }
            else
                {
                    echo "No Record Found";
                }
        ?>
    </form>
</p>
</div>

<button class="accordion">Suplemente</button>
<div class="panel">
    <p>
        <form method="POST" action="">
            <?php
                $suplemente_query = "SELECT kategori_suplemente.emertimi_s
                FROM kategori_suplemente JOIN art_kat_s JOIN artikuj ON artikuj.id_a = art_kat_s.id_a AND kategori_suplemente.id_s = art_kat_s.id_s 
                WHERE artikuj.klasifikimi = kategori_suplemente.emertimi_s;";
                $query_run = mysqli_query($con, $suplemente_query);

                if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $suplemente)
                            {
                                ?>
                                <input type="checkbox" class="kozmetike" name="suplemente[]" value="<?= $suplemente['emertimi_s']; ?>" onchange="getCollection()"/> <?= $suplemente['emertimi_s']; ?> <br/>
                                <?php
                            }
                    }
                else
                    {
                        echo "No Record Found";
                    }
            ?>
        </form>
    </p>
</div>

<button class="accordion">Kozmetike</button>
<div class="panel">
<p>
    <form method="POST" action="">
        <?php
            $kozmetike_query = "SELECT kategori_kozmetike.emertimi_k 
            FROM kategori_kozmetike JOIN art_kat_k JOIN artikuj 
            ON artikuj.id_a = art_kat_k.id_a AND kategori_kozmetike.id_k = art_kat_k.id_k
            WHERE artikuj.klasifikimi = kategori_kozmetike.emertimi_k;";
            $query_run = mysqli_query($con, $kozmetike_query);

            if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $kozmetike)
                        {
                            ?>
                            <input type="checkbox" class="kozmetike" name="kozmetike[]" value="<?= $kozmetike['emertimi_k']; ?>" onchange="getCollection()"/> <?= $kozmetike['emertimi_k']; ?> <br/>
                            <?php
                        }
                }
            else
                {
                    echo "No Record Found";
                } 
        ?>                
    </form>
</p>

<script>
function getCollection(){ 
    var RB;
    var arrAn = [];  
    var jsonObj = {};

    var m = $('.kozmetike'); 

    var arrLen = $('.kozmetike').length; 
    
    for ( var i= 0; i < arrLen ; i++){  
        var  w = m[i];                     
        if (w.checked){  
        arrAn.push(w.value); 
        }  
    }   
    for (var i = 0, len = arrAn.length; i < len; i++) {
        jsonObj['key' + (i + 1)] = arrAn[i];
    }
    //convert javascript array to JSON string
    var myJsonString = JSON.stringify(jsonObj, null, 4);  
    console.log(myJsonString);

    $.ajax({
            url: "kozmetike.php",
            method: "POST",
            data: {myJsonString: myJsonString},
            success: function(returnBack) {
                console.log("returnBack");
                RB = returnBack;
                console.log(RB);
                document.getElementById("mainTable").innerHTML = RB;
                
            $('.add-new').bind('click', function() {
                // alert("CLICKED");
                //Create rows
                    $(this).attr("disabled", "disabled");
                    var index = $("table tbody tr:last-child").index();
                    var data_row = [];
                    $(this).parents("tr").find('td').each(function() {
                        data_row.push($(this).html());
                    });
                    var row = '<tr id="newRow">' +
                        '<td>'+data_row[0]+'</td>' +
                        '<td>1</td>' +
                        '<td>'+data_row[2]+'</td>' +
                        '<td><a class="add" title="Ruaj" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a><a class="edit" title="Modifiko sasinë" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a><a class="delete" title="Fshi medikamentin" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a></td>' +
                    '</tr>';             
                    $('.table').append(row);
            });
            //ADD
            $(document).on("click", ".add", function(){
                    var empty = false;
                    var input = $(this).parents("tr").find('input[type="number"]');
                    input.each(function(){
                        if(!$(this).val()){
                            $(this).addClass("error");
                            empty = true;
                        } else{
                            $(this).removeClass("error");
                        }
                    });
                    $(this).parents("tr").find(".error").first().focus();
                    if(!empty){
                        input.each(function(){
                            $(this).parent("td").html($(this).val());
                        });			
                        $(this).parents("tr").find(".add, .edit").toggle();
                        $(".add-new").removeAttr("disabled");
                    }		
                });
            // Edit row on edit button click
                $(document).on("click", ".edit", function(){		
                    $(this).parents("tr").find("td:nth-child(2)").each(function(){
                    $(this).html('<input type="number" min="1" class="form-control" value="' + $(this).text() + '">');
                });		
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").attr("disabled", "disabled");
            });
            // Delete row on delete button click
            $(document).on("click", ".delete", function(){
                    $(this).parents("tr").remove();
                    $(".add-new").removeAttr("disabled");
            });
    //         $("input[type='checkbox']").change(function() {
	// 	    if(this.checked) {
	// 		    console.log($(this).val());
	// 	    }
	// });



            }
        });
    return RB;

}
</script>
</div>

<div class="container-lg">
	<div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Kërko</b> medikamentin </h2></div>
                    
                </div>
            </div>
        <input type="text" id="myInput" onkeyup="myFilterSearch()" placeholder="Search for names..">

<table id="myTable" class="table2">
    <tr class="header">
    <th style="width:40%;">Emri</th>
    <th style="width:30%;">Klasifikimi</th>
    <th style="width:24%;">Cmimi</th>
    <th style="width:5%;">Shto</th>
    </tr>
    <tbody id="mainTable">

    </tbody>
        
</table>
        </div>
    </div>
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Profarma e recetës</b></h2></div>
                </div>
            </div>
            <table id="testHafsa" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Emri</th>
                        <th>Sasia</th>
                        <th>Cmimi</th>
                        <th>Veprime</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            <button id="prescription" onclick="createPrescription()">Krijo Recetën</button>
        </div>
    </div>
</div> 
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
    panel.style.maxHeight = null;
        } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
        } 
    });
}

function createPrescription(){
    var rowCount = $('#testHafsa >tbody >tr').length;
                    console.log(rowCount);
                    if (rowCount > 0){
                        $(document).on("click", "#prescription", function(){
                            alert("PRESCRIPTION");
                            $('#testHafsa >tbody >tr').each(function(){
                                var emri = $(this).find("td:nth-child(1)").text();
                                var sasia = $(this).find("td:nth-child(2)").text();
                                var cmimi = $(this).find("td:nth-child(3)").text();
                                // var emri_a = emri;
                                // var sasia_a = emri;
                                // var cmimi_a = emri;
                                // console.log(emri);
                                // console.log(sasia);
                                // console.log(cmimi);
                                // var ajax = window.XMLHttpRequest;
                                //     ajax.open("POST", "prescription.php", true);
                                //     ajax.send(emri);
                                $.post("prescription.php", 
                                { 
                                    name:emri, 
                                    quantity:sasia, 
                                    price:cmimi
                                },
                                function(data,status){
                                    console.log("POSTED!");
                                    // console.log(returnBack);
                                    alert("Data: " + data + "\nStatus: " + status);
                                    var itemID = data.slice(-2);
                                    window.location.href = 'table.php?id='+ itemID;
                                });


                            });

                        });
                    }
                    else alert("HELLO NULL");
}
</script>    
</body>
</html>