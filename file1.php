<!DOCTYPE html>
<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<title>Page Title</title>
<script type="text/javascript">
        // $(document).ready(function(){
    //     $("#btn").click(function(){
    //         console.log("clicked");
    //         var varchat = $("#chat").val();

    //         $.ajax({
    //             type: "POST",
    //             url: 'file2.php',
    //             data: {'chat' : varchat},//Have u tried this
    //             success: function(output) {
    //                 alert(output);
    //             }
    //             // error: function(request, status, error){
    //             //         alert("Error: Could not delete");
    //             // }
    //         });
    // $(document).ready(function(){
    // $("button").click(function(){
    //     console.log("clicked");
    //     var varchat = $("#chat").val();
    //     console.log(varchat);
    //     $.post("file2.php",
    //     {
    //     chat: varchat,
    //     },
    //     function(data,status){
    //     alert("Data: " + data + "\nStatus: " + status);
    //     });
    // });
    // });
    $(document).ready(function(){
    $("button").click(function(){
        $.post("file2.php",
        {
        name: "Donald Duck",
        city: "Duckburg"
        },
        function(data,status){
        alert("Data: " + data + "\nStatus: " + status);
        });
    });
    });
    // $(document).ready(function(){
    //     $("#btn").click(function(){
    //         console.log("clicked");
    //         var varchat = $("#chat").val();

    //         $.ajax({
    //             type: "POST",
    //             url: 'file2.php',
    //             data: {'chat' : varchat},//Have u tried this
    //             success: function(output) {
    //                 alert(output);
    //             }
    //             // error: function(request, status, error){
    //             //         alert("Error: Could not delete");
    //             // }
    //         });


            // $.ajax({
            //     method: "post",
            //     url: "file2.php",
            //     data: {chat:varchat}
            // })
            // .done(function(data){
            //     $("chattext").html(data);
            // });
    //     });
    // });

</script>
</head>
<body>
<div id="chattext"></div>
<div id="chatbox">
    <input type="text" id="chat" name="chat">
    <button id="btn">SEND</button>
</div>

</body>
</html>
