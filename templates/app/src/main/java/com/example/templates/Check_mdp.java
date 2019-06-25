package com.example.templates;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class Check_mdp extends AppCompatActivity {

    Button forgotpass;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pass_check);

        forgotpass = (Button) findViewById(R.id.forgot);


        final Intent intent = new Intent().setClass(this, Check_mdp1.class);
        // Then add the action to the button:

        forgotpass.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                // Launch the activity
                startActivity(intent);
            }
        });
    }
}
