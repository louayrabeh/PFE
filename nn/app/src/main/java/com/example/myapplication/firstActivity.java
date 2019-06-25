package com.example.myapplication;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

public class firstActivity extends AppCompatActivity {

    Button reg,log;
    FirebaseUser auth;

    @Override
    protected void onStart() {
        super.onStart();
        auth= FirebaseAuth.getInstance().getCurrentUser();
        if (auth!=null){
            Intent intent=new Intent(firstActivity.this,Activity2.class);
            startActivity(intent);
            finish();
        }
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_first);
        reg=findViewById(R.id.reg);
        log=findViewById(R.id.log);
        reg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(firstActivity.this,MainActivity.class);
                startActivity(intent);
                finish();
            }
        });
        log.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(firstActivity.this,Activity1.class);
                startActivity(intent);
                finish();
            }
        });
    }
}
