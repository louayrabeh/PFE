package com.example.templates;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class CreateDemande extends AppCompatActivity {

    private String ip = "192.168.43.45";
    private  String displaySp = "http://"+ip+"/Api/getListeSponsor.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_create_demande);

        getlisteSpons();
      String idevent = getIntent().getStringExtra("idEvent");
      /*  Intent intent = new Intent(CreateDemande.this,DemandSponsorAdapter.class);
        intent.putExtra("id",idevent);
        startActivity(intent);
        finish();*/
    }

    void getlisteSpons()
    {
        final ArrayList<Sponsor> sponsList = new ArrayList<>();

        final RecyclerView recyclerView = findViewById(R.id.RecyclerVidem);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(getApplicationContext()));


        StringRequest stringRe = new StringRequest(Request.Method.GET, displaySp,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {

                            JSONArray sponsors = new JSONArray(response);

                            for (int i = 0; i < sponsors.length(); i++) {

                                JSONObject object = sponsors.getJSONObject(i);

                                String nom = object.getString("organismeSpons");
                               //String img =  object.getString("img");
                                String idevent = getIntent().getStringExtra("idEvent");
                                String idsp = object.getString("idSpons");
                                Sponsor sponsor = new Sponsor(nom,idevent,idsp);


                                sponsList.add(sponsor);

                            }


                            DemandSponsorAdapter adapter1 = new DemandSponsorAdapter(CreateDemande.this, sponsList);

                            recyclerView.setAdapter(adapter1);

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                Toast.makeText(CreateDemande.this, error.getMessage(), Toast.LENGTH_LONG).show();

            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();

                Log.e("post", "params:" + params);

                return params;

            }
        };


        Volley.newRequestQueue(CreateDemande.this).add(stringRe);


    }
}
