// var html;
// function arrayChk(){ 
    
//     var arrAn = [];  
//     var jsonObj = {};
    
//     var x = document.getElementById("context").innerText;
    
    
//     console.log(x);
//     var m = $('.kozmetike'); 

//     var arrLen = $('.kozmetike').length; 
    
//     for ( var i= 0; i < arrLen ; i++){  
//         var  w = m[i];                     
//         if (w.checked){  
//         arrAn.push(w.value); 
//         // arrAn.push( { "key" : w.value } );  
//         // console.log(w.value ); 
//         }  
//     }   
//     // for (var i=0; i<arrLen; i++){
//     //     console.log(arrAn[i]);
//     // }
//     for (var i = 0, len = arrAn.length; i < len; i++) {
//         jsonObj['key' + (i + 1)] = arrAn[i];
//     }

//     // console.log(JSON.stringify(jsonObj, null, 4));
//     var myJsonString = JSON.stringify(jsonObj, null, 4);  //convert javascript array to JSON string
//     console.log(myJsonString);
//     // var myJsonString = "'"+  JSON.stringify(jsonObj) + "'"; 
//     // console.log(myJsonString);
//     // console.log(myJsonString[5]);

//     // $.ajax({
//     //         url: "kozmetike.php",
//     //         method: "POST",
//     //         // data: myJsonString,
//     //         data: {myJsonString: myJsonString},
//     //         // dataType: 'json',
//     //         // data: (myJsonString),
//     //         // data: {myJsonString: JSON.stringify(myJsonString)},
//     //         success: function(result) {
//     //             console.log(result);
//     //         }
//     //     });

//     // window.location = "kozmetike.php?x="+ myJsonString;
//     // alert(myJsonString);
//     x = myJsonString;
//     console.log(x);
//     return myJsonString;

// }
// // arrayChk();
// html = arrayChk();
// console.log(html);
// // let html = document.getElementById("context").innerHTML;