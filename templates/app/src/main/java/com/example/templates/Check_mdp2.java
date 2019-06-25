package com.example.templates;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class Check_mdp2 extends AppCompatActivity {

    Button send;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pass_check2);

      send = (Button) findViewById(R.id.btsend);


        final Intent intent = new Intent().setClass(this, Confirm_mdp.class);
        // Then add the action to the button:

        send.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                // Launch the activity
                startActivity(intent);
            }
        });
    }
}
