function changeLook1() {
    // document.getElementById('Buton1').value='Approved';
    // document.getElementById('Buton1').style.background='green'

    // if(document.getElementById('Buton1')){
    //     document.getElementById('Buton1').value='Approved';
    //     document.getElementById('Buton1').style.background='green';
    // }else if(document.getElementById('Buton2')){
    //     document.getElementById('Buton2').style.background='red';
    // }
    var buttonclicked;
    $("#Buton1").click(function(){
        if( buttonclicked!= true ) {
            buttonclicked= true;
            document.getElementById('Buton1').value='Approved';
            document.getElementById('Buton1').style.background='green';
        }else if (buttoncliked != true){
            document.getElementById('Buton2').style.background='red';
        }
        });
    
}

// function changeLook2() {
//     document.getElementById('Buton2').value='Approved';
//     document.getElementById('Buton2').style.background='green'  
// }

// function changeLook3() {
//     document.getElementById('Buton3').value='Approved';
//     document.getElementById('Buton3').style.background='green'  
// }
// function changeLook4() {
//     document.getElementById('Buton4').value='Approved';
//     document.getElementById('Buton4').style.background='green'  
// }
// function changeLook5() {
//     document.getElementById('Buton5').value='Approved';
//     document.getElementById('Buton5').style.background='green'  
// }
// function changeLook6() {
//     document.getElementById('Buton6').value='Approved';
//     document.getElementById('Buton6').style.background='green'  
// }
// function changeLook7() {
//     document.getElementById('Buton7').value='Approved';
//     document.getElementById('Buton7').style.background='green'  
// }
// function changeLook8() {
//     document.getElementById('Buton8').value='Approved';
//     document.getElementById('Buton8').style.background='green'  
// }
// function changeLook9() {
//     document.getElementById('Buton9').value='Approved';
//     document.getElementById('Buton9').style.background='green'  
// }
// function changeLook10() {
//     document.getElementById('Buton10').value='Approved';
//     document.getElementById('Buton10').style.background='green'  
// }
