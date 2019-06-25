package com.example.templates;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

import static com.example.templates.SessionManager.ROLE;

public class Layout1 extends AppCompatActivity {

    Button sponsor, org;
SessionManager sessionManager;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_layout1);

        sessionManager = new SessionManager(getApplicationContext());


        sponsor = (Button) findViewById(R.id.spon);
        org = (Button) findViewById(R.id.org);



        sponsor.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                startActivity(new Intent(Layout1.this, WelcomeSpon.class));
                finish();
            }
        });



        org.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {

                startActivity(new Intent(Layout1.this, WelcomeOrg.class));
                finish();
            }
        });


       if(sessionManager.isLoggin())
        {
            if(sessionManager.getSponsorDetail().get(ROLE)=="sponsor")
            {
                startActivity(new Intent(Layout1.this, MainPrincip.class));
                finish();
            }
            else if(sessionManager.getOrganiserDetail().get(ROLE)=="organisateur")
            {
                startActivity(new Intent(Layout1.this, TabbedPrincip.class));
                finish();
            }
        }


        /*
        if(!sessionManager.getSponsorDetail().isEmpty()) {

            Toast.makeText(getApplicationContext(), (String) sessionManager.getSponsorDetail().get(ID), Toast.LENGTH_SHORT).show();
            // Toast.makeText(getApplicationContext(), "already connected", Toast.LENGTH_SHORT).show();

            startActivity(new Intent(Layout1.this, MainPrincip.class));
            finish();
        }
        if (!sessionManager.getOrganiserDetail().isEmpty()) {
            Toast.makeText(getApplicationContext(), (String) sessionManager.getOrganiserDetail().get(ID), Toast.LENGTH_SHORT).show();

            startActivity(new Intent(Layout1.this, TabbedPrincip.class));
            finish();
        }
*/

    }

    @Override
    protected void onStart() {
        super.onStart();




    }
    }




