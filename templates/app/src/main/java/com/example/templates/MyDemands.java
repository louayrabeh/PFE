package com.example.templates;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
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
import java.util.List;
import java.util.Map;

import static com.example.templates.SessionManager.ID;

public class MyDemands extends AppCompatActivity {

    private String ip = "192.168.43.45";
    private final String GET_DEM="http://"+ip+"/Api/getdemande.php";
    SessionManager sessionManager;
    List<Demande> demList;
    RecyclerView recycler;
    DemandGetAdapter adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_my_demands);
        getdemand();
    }

    void getdemand() {

        recycler = (RecyclerView) findViewById(R.id.Recyclerdem);
        recycler.setHasFixedSize(true);
        recycler.setLayoutManager(new LinearLayoutManager(getApplicationContext()));

        demList = new ArrayList<>();

        StringRequest stringRequest1 = new StringRequest(Request.Method.POST, GET_DEM,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {
                            JSONArray dem = new JSONArray(response);

                            for ( int i=0; i<dem.length(); i++){

                                JSONObject obj = dem.getJSONObject(i);

                                String contenu = obj.getString("contenu");
                                String idD = obj.getString("idDemande");

                                Demande demande = new Demande(contenu,idD);

                                demList.add(demande);

                            }

                            //creating recyclerview adapter
                            adapter = new DemandGetAdapter(getApplicationContext(), demList);

                            //setting adapter to recyclerview recyclerView.setAdapter(adapter);
                            recycler.setAdapter(adapter);

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                Toast.makeText(getApplicationContext(), error.getMessage(),Toast.LENGTH_LONG).show();

            }
        })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                sessionManager = new SessionManager(getApplicationContext());
                String id = (String) sessionManager.sharedPreferences.getString(ID,null);
                params.put("idSpons",id);
                Log.e("post", "params:" + params);

                return params;

            }
        };


        Volley.newRequestQueue(getApplicationContext()).add(stringRequest1);



    }
}
