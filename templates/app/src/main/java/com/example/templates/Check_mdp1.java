package com.example.templates;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class Check_mdp1 extends AppCompatActivity {

    Button check;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pass_check1);


       check = (Button) findViewById(R.id.btCheck);


        final Intent intent = new Intent().setClass(this, Check_mdp2.class);
        // Then add the action to the button:

        check.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                // Launch the activity
                startActivity(intent);
            }
        });
    }
}
