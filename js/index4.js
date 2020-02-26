var rootRef = firebase.database().ref().child("Concession request");

rootRef.on("child_added", snap => {


    // var name = snap.val("name").val();
    var address = snap.child("Address").val();
    var agemnth = snap.child("Age month").val();
    var ageyr = snap.child("Age year").val();
    var certno = snap.child("Certificate no").val();
    var cls = snap.child("Class").val();
    var dated = snap.child("Dated").val();
    var expdt = snap.child("Expiry Date").val();
    var frm = snap.child("From").val();
    var rollno = snap.child("Rollno").val();
    var to = snap.child("To").val();
    var tktno = snap.child("Tocket no").val();
    var year = snap.child("Year").val();
    var branch = snap.child("branch").val();
    var dob = snap.child("dob").val();
    var name = snap.child("name").val();
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();


    $(".date").append("<u>" + date + "</u>");
    $("#fname").append("<u>" + name + "</u>");
    $("#branch").append("<u>" + branch + "</u>");
    $("#year").append("<u>" + year + "</u>");
    $("#rollno").append("<u>" + rollno + "</u>");
    $("#dob").append("<u>" + dob + "</u>");
    $("#yrs").append("<u>" + ageyr + "</u>");
    $("#mnths").append("<u>" + agemnth + "</u>");
    $("#tno").append("<u>" + tktno + "</u>");
    $("#pcerno").append("<u>" + certno + "</u>");
    $("#doe").append("<u>" + expdt + "</u>");
    $("#frm").append("<u>" + frm + "</u>");
    $("#to").append("<u>" + to + "</u>");
    $("#cls").append("<u>" + cls + "</u>");
    $("#dt").append("<u>" + dated + "</u>");
    $("#addr").append("<u>" + address + "</u>");
});