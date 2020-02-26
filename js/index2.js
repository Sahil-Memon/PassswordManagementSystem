var rootRef = firebase.database().ref().child("Bonafied request");

rootRef.on("child_added", snap => {


    // var name = snap.val("name").val();
    var name = snap.child("name").val();
    var phone = snap.child("phone").val();
    var Rollno = snap.child("Rollno").val();
    var branch = snap.child("branch").val();
    var reason = snap.child("reason").val();
    var dob = snap.child("dob").val();
    var year = snap.child("year").val();
    var uid = snap.child("uid").val();
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();


    $(".date").append("<u>" + date + "</u>");
    $("#name").append(name);
    // $("#name").append(name);
    $("#dob").append(dob);
    $("#rn").append(Rollno);
    $("#mn").append(phone);
    $("#co").append(branch);
    $("#yr").append(year);
    $("#rfi").append(reason);
});























