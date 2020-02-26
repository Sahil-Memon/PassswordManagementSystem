package com.example.sabridge;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import com.firebase.ui.auth.AuthUI;

public class MainActivity extends AppCompatActivity {
    Button registerbtn,loginbtn;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //ActionBar and its Titles
        ActionBar actionBar = getSupportActionBar();
        actionBar.setTitle("Sabridge");

        registerbtn = findViewById(R.id.register_btn);
        loginbtn = findViewById(R.id.login_btn);

        registerbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //start Register activity
                startActivity(new Intent(MainActivity.this,RegisterActivity.class));
            }
        });

        loginbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this,LoginActivity.class));
            }
        });
    }
}
