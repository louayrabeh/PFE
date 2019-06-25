package com.example.templates;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.RadioButton;
import android.widget.RadioGroup;
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

public class RegisterSponsor extends AppCompatActivity {


    EditText nomSpons, prenomSpons, adrSpons, telSpons, emailSpons, mdpSpons, org;
    Button register;
    private String ip = "192.168.43.45";
    RadioGroup centr;
    ProgressBar load;
    private String URLreg = "http://"+ip+"/Api/register.php";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register_sponsor);

        load = findViewById(R.id.progressBar);
        nomSpons = findViewById(R.id.editTextprenom);
        prenomSpons = findViewById(R.id.editTextUsername);
        adrSpons = findViewById(R.id.adress);
        telSpons = findViewById(R.id.te);
        emailSpons = findViewById(R.id.editTextEmail);
        mdpSpons = findViewById(R.id.editTextPassword);
        centr = findViewById(R.id.radioCateg2);

        register = findViewById(R.id.buttonRegister);

        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Regist();
            }
        });

    }


    private void Regist() {


        final String nomSpons = this.nomSpons.getText().toString().trim();
        final String prenomSpons = this.prenomSpons.getText().toString().trim();
        final String adrSpons = this.adrSpons.getText().toString().trim();
        final String telSpons = this.telSpons.getText().toString().trim();
        final String emailSpons = this.emailSpons.getText().toString().trim();
        final String mdpSpons = this.mdpSpons.getText().toString().trim();
        final String centre = ((RadioButton) findViewById(centr.getCheckedRadioButtonId())).getText().toString().trim();


        if (TextUtils.isEmpty(nomSpons)) {
            this.nomSpons.setError("Please enter your name");
            this.nomSpons.requestFocus();
            return;
        }

        if (TextUtils.isEmpty(prenomSpons)) {
            this.prenomSpons.setError("Please enter your firstname");
            this.prenomSpons.requestFocus();
            return;
        }

        if (TextUtils.isEmpty(emailSpons)) {

            this.emailSpons.setError("Please enter your email");
            this.emailSpons.requestFocus();
            return;
        }

        if (TextUtils.isEmpty(mdpSpons)) {
            this.mdpSpons.setError("Please enter your password");
            this.mdpSpons.requestFocus();
            return;
        }
        if (TextUtils.isEmpty(adrSpons)) {
            this.adrSpons.setError("Please enter your adress");
            this.adrSpons.requestFocus();
            return;
        }

        if (TextUtils.isEmpty(telSpons)) {
            this.telSpons.setError("Please enter your phone number");
            this.telSpons.requestFocus();
            return;
        }
        load.setVisibility(View.VISIBLE);
        register.setVisibility(View.GONE);

        String emailPattern = "[a-zA-Z0-9._-]+@[a-z]+\\.+[a-z]+";

        if (emailSpons.matches(emailPattern)) {

            StringRequest stringRequest = new StringRequest(Request.Method.POST, URLreg,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {


                            try {

                                JSONObject jsonObject = new JSONObject(response);
                                String success = jsonObject.getString("success");


                                if (success.equals("1")) {
                                    Toast.makeText(RegisterSponsor.this, "Inscrit avec succés!", Toast.LENGTH_SHORT).show();

                                }
                                load.setVisibility(View.GONE);
                                register.setVisibility(View.VISIBLE);

                            } catch (JSONException e) {
                                e.printStackTrace();
                                Toast.makeText(RegisterSponsor.this, " incomplet!" + e.toString(), Toast.LENGTH_SHORT).show();
                                load.setVisibility(View.GONE);
                                register.setVisibility(View.VISIBLE);
                            }

                        }
                    },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            Toast.makeText(RegisterSponsor.this, "Inscrit incomplet!" + error.toString(), Toast.LENGTH_SHORT).show();
                            load.setVisibility(View.GONE);
                            register.setVisibility(View.VISIBLE);

                        }
                    }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<>();
                    params.put("nomSpons", nomSpons);
                    params.put("prenomSpons", prenomSpons);
                    params.put("adrSpons", adrSpons);
                    params.put("telSpons", telSpons);
                    params.put("emailSpons", emailSpons);
                    params.put("mdpSpons", mdpSpons);
                    params.put("centre", centre);
                    //  params.put("org",org);
                    Log.e("post", "params:" + params);
                    return params;
                }
            };

            MySingleton.getmInstance(RegisterSponsor.this).addTorequestque(stringRequest);

        }
        else {
            this.emailSpons.setError("Please enter valid email");
            this.emailSpons.requestFocus();
        }
    }

}

