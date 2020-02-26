package com.example.sabridge;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.app.DownloadManager;
import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

import java.util.HashMap;

public class FeeActivity extends AppCompatActivity {

    private FirebaseAuth mFirebaseAuth;
    private static final int RC_SIGN_IN=1;
    private EditText fullNameUser,rollno,contact,branch,year,dob,reason;
    private Button submit;
    Button download;
    private DownloadManager downloadManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_fee);
        //ActionBar and its Titles
        ActionBar actionBar = getSupportActionBar();
        actionBar.setTitle("Fee Structure Form");
//        TextView textView = (TextView) findViewById(R.id.link);
//        textView.setMovementMethod(LinkMovementMethod.getInstance());
        mFirebaseAuth=FirebaseAuth.getInstance();

        fullNameUser=findViewById(R.id.name);
        contact=findViewById(R.id.number);
        rollno=findViewById(R.id.Rollno);
        branch=findViewById(R.id.branch);
        year=findViewById(R.id.year);
        dob=findViewById(R.id.dob);
        reason=findViewById(R.id.reason);
        submit=findViewById(R.id.button);

        download=findViewById(R.id.download);

        download.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                downloadManager = (DownloadManager)getSystemService(Context.DOWNLOAD_SERVICE);
                Uri uri = Uri.parse("https://www.docdroid.net/1JDxk5i/sabridge-2.pdf");
                DownloadManager.Request request = new DownloadManager.Request(uri);
                request.setNotificationVisibility(DownloadManager.Request.VISIBILITY_VISIBLE_NOTIFY_COMPLETED);
                Long reference = downloadManager.enqueue(request);
            }
        });

        submit.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {


                FirebaseUser  user=mFirebaseAuth.getCurrentUser();

                if(fullNameUser.length()==0){
                    fullNameUser.setError("Enter Name");
                }
                else if(rollno.length()==0){
                    rollno.setError("Enter Rollno");
                }
                else if(contact.length()==0){
                    contact.setError("Enter Contactno");
                }
                else if(branch.length()==0){
                    branch.setError("Enter Branch");
                }
                else if(year.length()==0){
                    year.setError("Enter Year");
                }
                else if(dob.length()==0){
                    dob.setError("Enter DOB");
                }
                else if(reason.length()==0){
                    reason.setError("Enter Reason");
                }
                else if(contact.length()>10 || contact.length()<10){
                    contact.setError("Enter correct phone no");
                }
                else{


                final String fullName=fullNameUser.getText().toString().trim();
                final String Rollno=rollno.getText().toString().trim();
                //String value= et.getText().toString();


                final String contact2=contact.getText().toString();
                final String bran=branch.getText().toString();
                final String Year=year.getText().toString();
                final String date=dob.getText().toString();
                final String reasoning=reason.getText().toString();
                String uid = mFirebaseAuth.getUid();
                String email = user.getEmail();

                HashMap<String, Object> hashMap = new HashMap<>();
                hashMap.put("email",email);
                hashMap.put("uid",uid);
                hashMap.put("name",fullName);
                hashMap.put("phone",contact2);
                hashMap.put("Rollno", Rollno);
                hashMap.put("branch", bran);
                hashMap.put("year", Year);
                hashMap.put("dob", date);
                hashMap.put("reason", reasoning);


                //firebase database instance
                FirebaseDatabase database = FirebaseDatabase.getInstance();
                // path to store user data named "Form"
                DatabaseReference reference = database.getReference("Fee Structure request");
                //put data within hashmap in database
                reference.child(uid).setValue(hashMap);

                // go to profile activity
                startActivity(new Intent(FeeActivity.this, SubmitActivity.class));
                finish();
            } }
        });
    }
}
