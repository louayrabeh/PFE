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

public class NotificationOrg extends AppCompatActivity {

    private String ip = "192.168.43.45";
    private final String GET_NOTIF="http://"+ip+"/Api/notifOrganisateur.php";
    SessionManager sessionManager;
    List<Notification> notifList;
    RecyclerView recycler;
    NotifOrgAdapter adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_notification_org);
        getnotif();
    }


    void getnotif() {

        recycler = (RecyclerView) findViewById(R.id.Recyclernot);
        recycler.setHasFixedSize(true);
        recycler.setLayoutManager(new LinearLayoutManager(getApplicationContext()));

        notifList = new ArrayList<>();

        StringRequest stringRequest1 = new StringRequest(Request.Method.POST, GET_NOTIF,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {
                            JSONArray notifs = new JSONArray(response);

                            for ( int i=0; i<notifs.length(); i++){

                                JSONObject notif = notifs.getJSONObject(i);

                                String contenu = notif.getString("content");

                                Notification notification = new Notification(contenu);

                                notifList.add(notification);

                            }

                            //creating recyclerview adapter
                            adapter = new NotifOrgAdapter(getApplicationContext(), notifList);

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
