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

public class RegisterOrganiser extends AppCompatActivity {


    EditText nomOrg, prenomOrg, adrOrg, telOrg, emailOrg, mdpOrg;
    Button register;
    RadioGroup centr;
    ProgressBar load;
    private String ip = "192.168.43.45";
    private String URLreg1 = "http://"+ip+"/Api/register1.php";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register_organiser);

        load = findViewById(R.id.progressBar);
        nomOrg = findViewById(R.id.editTextprenom);
        prenomOrg = findViewById(R.id.editTextUsername);
        adrOrg = findViewById(R.id.adress);
        telOrg = findViewById(R.id.te);
        emailOrg = findViewById(R.id.editTextEmail);
        mdpOrg = findViewById(R.id.editTextPassword);
        centr = findViewById(R.id.radioCateg1);


        register = findViewById(R.id.buttonRegister);

        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Regist();
            }
        });

    }


    private void Regist() {


        final String nomOrg = this.nomOrg.getText().toString().trim();
        final String prenomOrg = this.prenomOrg.getText().toString().trim();
        final String adrOrg = this.adrOrg.getText().toString().trim();
        final String telOrg = this.telOrg.getText().toString().trim();
        final String emailOrg = this.emailOrg.getText().toString().trim();
        final String mdpOrg = this.mdpOrg.getText().toString().trim();
        final String centre = ((RadioButton) findViewById(centr.getCheckedRadioButtonId())).getText().toString().trim();


        if (TextUtils.isEmpty(nomOrg)) {
            this.nomOrg.setError("Please enter your name");
            this.nomOrg.requestFocus();
            return;
        }

        if (TextUtils.isEmpty(prenomOrg)) {
            this.prenomOrg.setError("Please enter your firstname");
            this.prenomOrg.requestFocus();
            return;
        }

        if (TextUtils.isEmpty(emailOrg)) {

            this.emailOrg.setError("Please enter your email");
            this.emailOrg.requestFocus();
            return;
        }

        if (TextUtils.isEmpty(mdpOrg)) {
            this.mdpOrg.setError("Please enter your password");
            this.mdpOrg.requestFocus();
            return;
        }
        if (TextUtils.isEmpty(adrOrg)) {
            this.adrOrg.setError("Please enter your adress");
            this.adrOrg.requestFocus();
            return;
        }

        if (TextUtils.isEmpty(telOrg)) {
            this.telOrg.setError("Please enter your phone number");
            this.telOrg.requestFocus();
            return;
        }

        load.setVisibility(View.VISIBLE);
        register.setVisibility(View.GONE);

        String emailPattern = "[a-zA-Z0-9._-]+@[a-z]+\\.+[a-z]+";

        if (emailOrg.matches(emailPattern)) {

            StringRequest stringRequest = new StringRequest(Request.Method.POST, URLreg1,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {


                            try {

                                JSONObject jsonObject = new JSONObject(response);
                                String success = jsonObject.getString("success");


                                if (success.equals("1")) {
                                    Toast.makeText(RegisterOrganiser.this, success, Toast.LENGTH_SHORT).show();

                               }
                                load.setVisibility(View.GONE);
                                register.setVisibility(View.VISIBLE);

                            } catch (JSONException e) {
                                e.printStackTrace();
                                Toast.makeText(RegisterOrganiser.this, " incomplet!" + e.toString(), Toast.LENGTH_SHORT).show();
                                load.setVisibility(View.GONE);
                                register.setVisibility(View.VISIBLE);
                            }

                        }
                    },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            Toast.makeText(RegisterOrganiser.this, "Inscrit incomplet!" + error.toString(), Toast.LENGTH_SHORT).show();
                            load.setVisibility(View.GONE);
                            register.setVisibility(View.VISIBLE);

                        }
                    }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<>();
                    params.put("nomOrg", nomOrg);
                    params.put("prenomOrg", prenomOrg);
                    params.put("adrOrg", adrOrg);
                    params.put("telOrg", telOrg);
                    params.put("emailOrg", emailOrg);
                    params.put("mdpOrg", mdpOrg);
                    params.put("centre", centre);
                    //  params.put("org",org);
                    Log.e("post", "params:" + params);
                    return params;
                }
            };

            MySingleton.getmInstance(RegisterOrganiser.this).addTorequestque(stringRequest);

        }
        else {
            this.emailOrg.setError("Please enter valid email");
            this.emailOrg.requestFocus();
        }
    }

}

