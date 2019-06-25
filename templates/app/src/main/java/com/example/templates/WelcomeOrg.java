package com.example.templates;


import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class WelcomeOrg extends AppCompatActivity {

    Button register, passoub, connect;
    EditText emailOrg, mdpOrg;
   SessionManager sessionManager;
    private String ip = "192.168.43.45";

    private String URLlog1 = "http://"+ip+"/Api/login1.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.layout_org);


        sessionManager = new SessionManager(this);



        register = (Button) findViewById(R.id.register2);
        passoub = (Button) findViewById(R.id.mdp1);
        connect = (Button) findViewById(R.id.btconnecter);
        emailOrg = (EditText) findViewById(R.id.loginorg);
        mdpOrg= (EditText) findViewById(R.id.mdporg);



        final Intent intent = new Intent().setClass(this, RegisterOrganiser.class);
        // Then add the action to the button:

        register.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                // Launch the activity
                startActivity(intent);
                finish();
            }
        });


        final Intent intent1 = new Intent().setClass(this, Check_mdp.class);
        // Then add the action to the button:

        passoub.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                // Launch the activity
                startActivity(intent1);
                finish();
            }
        });


        connect.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final String mail = emailOrg.getText().toString().trim();
                final String pass = mdpOrg.getText().toString().trim();

                if (mail.equals("") || pass.equals("")) {
                    Toast.makeText(WelcomeOrg.this, "Champ vide", Toast.LENGTH_LONG).show();

                }

                Login(mail,pass);

            }
        });
    }

    public void Login(final  String mail , final  String pass) {

        String emailPattern = "[a-zA-Z0-9._-]+@[a-z]+\\.+[a-z]+";

        if (mail.matches(emailPattern)) {

            StringRequest stringRequest1 = new StringRequest(Request.Method.POST, URLlog1,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {

                            try {

                                JSONObject jsonObject = new JSONObject(response);
                                String success = jsonObject.getString("success");
                                String id = jsonObject.getString("idOrg");
                                String nom = jsonObject.getString("nomOrg");
                                String mail = jsonObject.getString("emailOrg");

                                String role = "organisateur";


                                if (success.equals("1")) {
                                    sessionManager.createSession(nom,mail,id,role);
                                    Intent i = new Intent().setClass(getApplicationContext(), TabbedPrincip.class);
                                    startActivity(i);
                                    finish();

                         }


                            } catch (JSONException e) {
                                e.printStackTrace();
                                Toast.makeText(WelcomeOrg.this, " incomplet2" + e.toString(), Toast.LENGTH_SHORT).show();

                            }

                        }

                    },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            Toast.makeText(WelcomeOrg.this, "ERREUR!" + error.toString(), Toast.LENGTH_SHORT).show();

                        }
                    }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<>();
                    params.put("emailOrg", mail);
                    params.put("mdpOrg", pass);
                    return params;
                }
            };

            MySingleton.getmInstance(WelcomeOrg.this).addTorequestque(stringRequest1);
        }

        else {
            Toast.makeText(WelcomeOrg.this, "entrez une adresse valide", Toast.LENGTH_SHORT).show();
        }
    }

}

