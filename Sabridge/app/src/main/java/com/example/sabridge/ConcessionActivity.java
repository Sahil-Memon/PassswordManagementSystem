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

public class ConcessionActivity extends AppCompatActivity {

    private FirebaseAuth mFirebaseAuth;
    private static final int RC_SIGN_IN=1;
    private EditText fullNameUser,rollno,contact,branch,year,dob,ayear,amonth,ticno,cerno,expiry,from,to,classs,dated,address;
    private Button submit;
    Button download;
    private DownloadManager downloadManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_concession);
        //ActionBar and its Titles
        ActionBar actionBar = getSupportActionBar();
        actionBar.setTitle("Concession Form");
//        TextView textView = (TextView) findViewById(R.id.link);
//        textView.setMovementMethod(LinkMovementMethod.getInstance());
        mFirebaseAuth=FirebaseAuth.getInstance();

        fullNameUser=findViewById(R.id.name);
        contact=findViewById(R.id.number);
        rollno=findViewById(R.id.Rollno);
        branch=findViewById(R.id.branch);
        year=findViewById(R.id.year);
        dob=findViewById(R.id.dob);
        ayear=findViewById(R.id.ayear);
        amonth=findViewById(R.id.amonth);
        ticno=findViewById(R.id.ticno);
        cerno=findViewById(R.id.cerno);
        expiry=findViewById(R.id.expiry);
        from=findViewById(R.id.from);
        to=findViewById(R.id.to);
        classs=findViewById(R.id.classs);
        dated=findViewById(R.id.dated);
        address=findViewById(R.id.address);

        download=findViewById(R.id.download);

        download.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                downloadManager = (DownloadManager)getSystemService(Context.DOWNLOAD_SERVICE);
                Uri uri = Uri.parse("https://www.docdroid.net/4XfHxgB/sabridge-3.pdf");
                DownloadManager.Request request = new DownloadManager.Request(uri);
                request.setNotificationVisibility(DownloadManager.Request.VISIBILITY_VISIBLE_NOTIFY_COMPLETED);
                Long reference = downloadManager.enqueue(request);
            }
        });

        submit=findViewById(R.id.button);
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
                else if(amonth.length()==0){
                    amonth.setError("Enter Month");
                }
                else if(ayear.length()==0){
                    ayear.setError("Enter Year");
                }
                else if(ticno.length()==0){
                    ticno.setError("Enter Ticketno");
                }
                else if(cerno.length()==0){
                    cerno.setError("Enter Certificateno");
                }
                else if(expiry.length()==0){
                    expiry.setError("Enter Expiry");
                }
                else if(from.length()==0){
                    from.setError("Enter From");
                }
                else if(to.length()==0){
                    to.setError("Enter To");
                }
                else if(classs.length()==0){
                    classs.setError("Enter Class");
                }
                else if(dated.length()==0){
                    dated.setError("Enter Dated");
                }
                else if(address.length()==0){
                    address.setError("Enter Reason");
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
                final String Ayear=ayear.getText().toString();
                final String Amonth=amonth.getText().toString();
                final String Ticno=ticno.getText().toString();
                final String Cerno=cerno.getText().toString();
                final String Expiry=expiry.getText().toString();
                final String From=from.getText().toString();
                final String To=to.getText().toString();
                final String Classs=classs.getText().toString();
                final String Dated=dated.getText().toString();
                final String Address=address.getText().toString();
                String uid = mFirebaseAuth.getUid();
                String email = user.getEmail();

                HashMap<String, Object> hashMap = new HashMap<>();
                hashMap.put("email",email);
                hashMap.put("uid",uid);
                hashMap.put("name",fullName);
                hashMap.put("phone",contact2);
                hashMap.put("Rollno", Rollno);
                hashMap.put("branch", bran);
                hashMap.put("Year", Year);
                hashMap.put("dob", date);
                hashMap.put("Age year", Ayear);
                hashMap.put("Age month", Amonth);
                hashMap.put("Tocket no", Ticno);
                hashMap.put("Certificate no", Cerno);
                hashMap.put("Expiry Date", Expiry);
                hashMap.put("From", From);
                hashMap.put("To", To);
                hashMap.put("Class", Classs);
                hashMap.put("Dated", Dated);
                hashMap.put("Address",Address);


                //firebase database instance
                FirebaseDatabase database = FirebaseDatabase.getInstance();
                // path to store user data named "Form"
                DatabaseReference reference = database.getReference("Concession request");
                //put data within hashmap in database
                reference.child(uid).setValue(hashMap);

                // go to profile activity
                startActivity(new Intent(ConcessionActivity.this, SubmitActivity.class));
                finish();
            } }
        });

    }
}
