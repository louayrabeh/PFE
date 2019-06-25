package com.example.templates;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
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

import static com.example.templates.SessionManager.ID;

public class CreatePackEvent extends AppCompatActivity {

    private ImageButton createpack;
    private EditText nomPack, deadline, montant, audien, descripPack;
    private TextView ideven;
    private RadioGroup typePack;
    private String ip = "192.168.43.45";
    private String URL_creerpack = "http://" + ip + "/Api/ajouterPack.php";
    private SessionManager sessionManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_create_pack_event);

        createpack = findViewById(R.id.pack);
        nomPack = findViewById(R.id.nompack);
        descripPack = findViewById(R.id.descPack);
        typePack = findViewById(R.id.radiotypepack);
        deadline = findViewById(R.id.deadline);
        audien = findViewById(R.id.aud);
        montant = findViewById(R.id.montant);
        ideven = findViewById(R.id.ideven);

       // ideven.setText(idev);
       // System.out.println(idev);
        createpack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                createPack();
            }
        });
    }

    private void createPack() {


        final String nomPack = this.nomPack.getText().toString().trim();
        final String descripPack = this.descripPack.getText().toString().trim();
        final String typepack = ((RadioButton) findViewById(typePack.getCheckedRadioButtonId())).getText().toString().trim();
        final String montant = this.montant.getText().toString().trim();
        final String audien = this.audien.getText().toString().trim();
        final String deadline = this.deadline.getText().toString().trim();


        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_creerpack,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {


                        try {

                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");
                            Toast.makeText(CreatePackEvent.this, "pack added ", Toast.LENGTH_SHORT).show();

                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(CreatePackEvent.this, " catcherror!" + e.toString(), Toast.LENGTH_SHORT).show();

                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(CreatePackEvent.this, " erreur!" + error.toString(), Toast.LENGTH_SHORT).show();

                    }

                }) {

            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();

                params.put("nomP", nomPack);
                params.put("descriptionP", descripPack);
                params.put("typeP", typepack);
                params.put("montant", montant);
                params.put("audience", audien);
                params.put("deadline", deadline);
                sessionManager = new SessionManager(getApplicationContext());
                String id = (String) sessionManager.sharedPreferences.getString(ID, null);
                params.put("idOrg", id);
                String idev =  getIntent().getStringExtra("id");
                if(idev!=null) {
                    params.put("idEvent", idev);
                    Log.e("post", "idev:" + idev);
                }
                Log.e("post", "params:" + params);
                return params;
            }
        };

       MySingleton.getmInstance(CreatePackEvent.this).addTorequestque(stringRequest);


    }



}


