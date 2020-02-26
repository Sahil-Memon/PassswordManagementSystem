var rootRef = firebase.database().ref().child("Fee Structure request");

rootRef.on("child_added", snap => {
    var name = snap.child("name").val();
    var Rollno = snap.child("Rollno").val();
    var uid = snap.child("uid").val();

    $(".listings").append("<a href='./formfees.html'><h5>" + name + "</h5></a>");
    $(".listings").append("<h6>" + Rollno + "</h6><hr>");
    
})