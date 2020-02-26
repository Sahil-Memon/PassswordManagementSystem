package com.example.sabridge;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class OptionActivity extends AppCompatActivity {

    private Button bonafied;
    private Button concession;
    private Button fee;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_option);

        //ActionBar and its Titles
        ActionBar actionBar = getSupportActionBar();
        actionBar.setTitle("Services");

        bonafied = findViewById(R.id.bonafied);
        concession=findViewById(R.id.concession);
        fee=findViewById(R.id.fee);


        bonafied.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(OptionActivity.this, BonafiedActivity.class));
            }
        });

        concession.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(OptionActivity.this, ConcessionActivity.class));
            }
        });

        fee.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(OptionActivity.this, FeeActivity.class));
            }
        });

    }
}
