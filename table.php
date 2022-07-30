<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <title>FATURA</title>
</head>

<body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="FATURA_ICON.png" alt="" class="img-fluid">
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>Herba Pharma</p>
                    </div>
                    <div class="position-relative">
                        <p>Nr. Fature: <span>XXXX</span></p>
                    </div>
                </div>
            </section>

            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <p>Farmacia</p>
                            <h2>Herba Pharma</h2>
                            <p class="address"> Rruga Myslym Shyri, Tiranë <br> 069 425 0110 </p>
                        </div>
                        <div class="col-5">
                            <p>Klienti</p>
                            <h2>Mira Kodra</h2>
                            <p class="address"> Rruga Reshit Petrela, Tiranë <br> 068 453 2323 </p>
                        </div>
                    </div>
                    <div class="row extra-info pt-3">
                        <div class="col-5">
                            <p>Dt. Fature: <span>16/06/2022</span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Nr. Produkti</td>
                            <td>Sasia</td>
                            <!-- <td>Çmimi</td> -->
                            <!-- <td>Vlera</td>
                            <td>Përshkrimi</td> -->
                        </tr>
                    </thead>
                    <tbody>
                                <tbody>
            <?php
            $ID = $_GET['id'];
            // echo( "Welcome to our Web site, $ID!" );
            $conn = new mysqli('localhost','root','','herbapharm');
            $sql = "SELECT * FROM receta WHERE receta.id_r = $ID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0){
                while ($row = $result-> fetch_assoc()){
                    echo "<tr><td>" . $row["id_r"] . "</td><td>" . $row["sasi"] . "</td></tr>";
                }
            }
            else {
                echo "Error";
            }
            $conn->close();
            ?>
        </tbody>
                        
                        <!-- <tr>
                            <td>1</td>
                            <td>2000L</td>
                            <td>2000L</td>
                            <td>
                                <div class="media">
                                    <div class="media-body">
                                        <p class="mt-0 title">Produkt 1</p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>4000L</td>
                            <td>8000L</td>
                            <td>
                                <div class="media">
                                    <div class="media-body">
                                        <p class="mt-0 title">Produkt 2</p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                    </div>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <div class="col-4">
                    <table class="table border-0 table-hover">
                        <tr>
                            <td>Totali:</td>
                            <td>10000L</td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-8">
                        <p class="m-0 font-weight-bold" id="p2"> Shënim: </p>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit Lorem ipsum dolor sit.</p>
                    </div>

                    <!-- Firma -->
                    <div class="col-12">
                        <p class="text-left m-0" id="p1"> Firma: </p>
                    </div>
                </div>
            </section>

            <footer>
                <hr>
                <div class="social pt-3">
                    <span class="pr-1">
                        <span><strong>Na kontakto në:</strong> herbapharma@gmail.com / 069 425 0110</span>
                    </span>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>