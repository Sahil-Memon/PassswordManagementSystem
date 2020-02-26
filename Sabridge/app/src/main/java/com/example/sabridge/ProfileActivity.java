package com.example.sabridge;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.firestore.FirebaseFirestore;

import java.util.HashMap;
import java.util.Map;

public class ProfileActivity extends AppCompatActivity {
    private FirebaseAuth mFirebaseAuth;
    private static final int RC_SIGN_IN=1;
    private EditText fullNameUser,rollno,contact;
    private Button submit;
    private RadioGroup gender;
    private RadioButton radioButton;
    private FirebaseFirestore db;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);
        mFirebaseAuth=FirebaseAuth.getInstance();
        final FirebaseUser user=mFirebaseAuth.getCurrentUser();
        fullNameUser=findViewById(R.id.name);
        gender=findViewById(R.id.radioGroup);
        contact=findViewById(R.id.number);
        rollno=findViewById(R.id.Rollno);
        submit=findViewById(R.id.button);
        int radioId = gender.getCheckedRadioButtonId();
       // onBackPressed();
        radioButton= findViewById(radioId);



        submit.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {


                FirebaseUser  user1=mFirebaseAuth.getCurrentUser();

                if(fullNameUser.length()==0){
                    fullNameUser.setError("Enter Name");
                }
                else if(rollno.length()==0){
                    rollno.setError("Enter Rollno");
                }
                else if(contact.length()==0){
                    contact.setError("Enter Contactno");
                }
                else if(contact.length()>10 || contact.length()<10){
                    contact.setError("Enter correct phone no");
                }
                else{

                final String fullName=fullNameUser.getText().toString().trim();
                final String Rollno=rollno.getText().toString().trim();
                //String value= et.getText().toString();


                final String contact2=contact.getText().toString();
                String uid = mFirebaseAuth.getUid();
                String email = user.getEmail();


                HashMap<String, Object> hashMap = new HashMap<>();
                hashMap.put("email",email);
                hashMap.put("uid",uid);
                hashMap.put("name",fullName);
                hashMap.put("phone",contact2);
                hashMap.put("Rollno", Rollno);
                hashMap.put("gender",radioButton.getText());
                hashMap.put("image",String.valueOf(user1.getPhotoUrl()));



                //firebase database instance
                FirebaseDatabase database = FirebaseDatabase.getInstance();
                // path to store user data named "Users"
                DatabaseReference reference = database.getReference("Users");
                //put data within hashmap in database
                reference.child(uid).setValue(hashMap);

                // show user email
                Toast.makeText(ProfileActivity.this, ""+user.getEmail(), Toast.LENGTH_SHORT).show();
                // go to profile activity
                startActivity(new Intent(ProfileActivity.this, DashboardActivity.class));
                finish();
            } }
                        });



    }


}
