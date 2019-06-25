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
import java.util.List;
import java.util.Map;

import static com.example.templates.SessionManager.ID;

public class MyEvents extends AppCompatActivity {

    private String ip = "192.168.43.45";
    private final String EVENT_URL="http://"+ip+"/Api/displayEvent.php";
SessionManager sessionManager;
    List<Event> eventsList1;
    RecyclerView recycler;
    MyEventsAdapter adapter;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_my_events);

        getEv();
    }


    void getEv() {

        recycler = (RecyclerView) findViewById(R.id.RecyclerVi);
        recycler.setHasFixedSize(true);
        recycler.setLayoutManager(new LinearLayoutManager(getApplicationContext()));

        eventsList1 = new ArrayList<>();

        StringRequest stringRequest1 = new StringRequest(Request.Method.POST, EVENT_URL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {
                            JSONArray events1 = new JSONArray(response);

                            for ( int i=0; i<events1.length(); i++){

                                JSONObject eventobj1 = events1.getJSONObject(i);

                                String idEvent = eventobj1.getString("idEvent");
                                String idOrg = eventobj1.getString("idOrg");
                                String nomEvent = (String) eventobj1.getString("nomEvent");
                                String datedeb= eventobj1.getString("dateDeb") ;
                                String datefin = eventobj1.getString("dateFin") ;
                                String heureEvent = eventobj1.getString("heureEvent");
                                String lieuEvent = eventobj1.getString("lieuEvent");
                                String descriptionEvent = eventobj1.getString("descriptionEvent");
                                String URL_Image = eventobj1.getString("URL_Image") ;
                                String categ= eventobj1.getString("categ") ;
                                String type= eventobj1.getString("typeEvent") ;
                                String lienfb = eventobj1.getString("lienfb") ;
                                String descOrg = eventobj1.getString("descOrg") ;
                                String siteOrg = eventobj1.getString("siteOrg") ;
                                String bud = eventobj1.getString("budget") ;


                                Event event = new Event(idEvent,idOrg,nomEvent,datedeb,datefin,heureEvent,lieuEvent,descriptionEvent,URL_Image,categ,type,lienfb,descOrg,siteOrg,bud);

                                eventsList1.add(event);

                            }

                            //creating recyclerview adapter
                            adapter = new MyEventsAdapter(getApplicationContext(), eventsList1);

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
                params.put("idOrg",id);
                //  params.put("org",org);
                Log.e("post", "params:" + params);

                return params;

            }
        };


        Volley.newRequestQueue(getApplicationContext()).add(stringRequest1);



    }
}
