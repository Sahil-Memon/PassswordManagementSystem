var ref = new Firebase("https://Sabridge.firebaseio.com");

var firebaseConfig = {
    apiKey: "AIzaSyDSIu-FcESZnVBxXwctUBeWw8GeA7BLspg",
    authDomain: "sabridge-d8c7b.firebaseapp.com",
    databaseURL: "https://sabridge-d8c7b.firebaseio.com",
    projectId: "sabridge-d8c7b",
    storageBucket: "sabridge-d8c7b.appspot.com",
    messagingSenderId: "446828882663",
    appId: "1:446828882663:web:af73a55d1b870249371042"
  };
  // Initialize Firebase
// Firebase firebase;
firebase.initializeApp(firebaseConfig);

firebase.auth.Auth.Persistence.LOCAL;

  $("#login").click(function(){
    var email = $("#email").val();
    var password = $("#pwd").val();

    if(email != "" && password != ""){
        var result = firebase.auth().signInWithEmailAndPassword(email, password);

        result.catch(function(error){
            var errorCode = error.code;
            var errorMessage = error.message;

            console.log(errorCode);
            console.log(errorMessage);
            window.alert("Message : " + errorMessage);
        });
    }
    else {
        window.alert("Form is incomplete. Please fill out all fields.")
    }
  });


  var ref = firebase.database().ref();                           
  ref.on("value", function(snapshot){
    output.innerHTML = JSON.stringify(snapshot.val(), null, 2);
});



