package com.example.templates;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Base64;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
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

public class Details extends AppCompatActivity {

    TextView nomEvent,heureEvent,lieuEvent,descriptionEvent,cat,type,datedeb ,datefin,descOrg,siteOrg,lienfb,budget,idev;
    ImageView img;
String nom,image,heure,lieu,desc,categorie,ty,ddeb,dfin,fb,desOrg,sitee,idevent, budg;

Button back,valider;
    private String ip = "192.168.43.45";
    private  String displayPack = "http://"+ip+"/Api/displayPack.php";
    private  String displaySponsors = "http://"+ip+"/Api/getSponsors.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_details);


        final ArrayList<Pack> items = new ArrayList<>();

        final RecyclerView recyclerView = findViewById(R.id.recycler_view);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(getApplicationContext(), LinearLayoutManager.HORIZONTAL, false));


        idev = (TextView) findViewById(R.id.eventid);
        idevent = getIntent().getStringExtra("idEvent");
        idev.setText(idevent);


        valider = findViewById(R.id.validerpack);

        StringRequest stringRequest1 = new StringRequest(Request.Method.POST, displayPack,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {

                            JSONArray packs1 = new JSONArray(response);

                            for (int i = 0; i < packs1.length(); i++) {

                                JSONObject packobj1 = packs1.getJSONObject(i);


                                String idPack = packobj1.getString("idPack");
                                String nompack =  packobj1.getString("nomPack");
                                String descrip = packobj1.getString("descriptionPack");
                                String typePack = packobj1.getString("typePack");
                                String montant = packobj1.getString("montant");
                                String audience = packobj1.getString("audience");
                                String deadline = packobj1.getString("deadline");

                                Pack pack1 = new Pack(idPack,nompack,descrip,typePack,montant,audience,deadline);


                                items.add(pack1);

                            }


                            PackAdapter adapter1 = new PackAdapter(Details.this, items);

                            recyclerView.setAdapter(adapter1);

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                Toast.makeText(Details.this, error.getMessage(), Toast.LENGTH_LONG).show();

            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();

                params.put("idEvent",idevent);
                Log.e("post", "params:" + params);

                return params;

            }
        };


        Volley.newRequestQueue(Details.this).add(stringRequest1);

getSponsors();


        budget = (TextView) findViewById(R.id.valbudg);
        budg = getIntent().getStringExtra("budget");
        budget.setText(budg);


        nomEvent = (TextView) findViewById(R.id.textViewTitre);
        nom = getIntent().getStringExtra("nomEvent");
        nomEvent.setText(nom);

        heureEvent = (TextView) findViewById(R.id.textViewheure);
        heure = getIntent().getStringExtra("heureEvent");
        heureEvent.setText(heure);

        lieuEvent = (TextView) findViewById(R.id.textViewlieu);
        lieu = getIntent().getStringExtra("lieuEvent");
        lieuEvent.setText(lieu);

        descriptionEvent = (TextView) findViewById(R.id.textViewShortDesc);
        desc= getIntent().getStringExtra("descriptionEvent");
        descriptionEvent.setText(desc);

        cat = (TextView) findViewById(R.id.categ);
        categorie= getIntent().getStringExtra("categ");
        cat.setText(categorie);

        type = (TextView) findViewById(R.id.typee);
        ty= getIntent().getStringExtra("typeEvent");
        type.setText(ty);

        datedeb = (TextView) findViewById(R.id.datedebevent);
        ddeb= getIntent().getStringExtra("dateDeb");
        datedeb.setText(ddeb);

        datefin = (TextView) findViewById(R.id.datefinevent);
        dfin= getIntent().getStringExtra("dateFin");
        datefin.setText(dfin);

        descOrg = (TextView) findViewById(R.id.descorg);
        desOrg= getIntent().getStringExtra("descOrg");
        descOrg.setText(desOrg);

       siteOrg = (TextView) findViewById(R.id.siteorg);
        sitee= getIntent().getStringExtra("siteOrg");
      siteOrg.setText(sitee);

        lienfb = (TextView) findViewById(R.id.lien);
        fb= getIntent().getStringExtra("lienfb");
        lienfb.setText(fb);

        img = (ImageView) findViewById(R.id.image55);
        image = getIntent().getStringExtra("URL_Image");


        img.setImageBitmap(getimg(image));
     //   Glide.with(getApplicationContext()).load(image).into(img);
     //   Picasso.with(getApplicationContext()).load(image).fit().centerCrop().into(img);

        back = (Button) findViewById(R.id.backbutt);

        final Intent intent1 = new Intent().setClass(this, getApplicationContext().getClass());
        // Then add the action to the button:

        back.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                // Launch the activity
                startActivity(intent1);
            }
        });

 /* valider.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View v) {
        valider();
    }
});*/

    }

    Bitmap getimg(String rs) {

        byte[] decodeString = Base64.decode(rs, Base64.DEFAULT);
        Bitmap decodebitmap = BitmapFactory.decodeByteArray(decodeString, 0, decodeString.length);

        return  decodebitmap;
    }


   void getSponsors()
    {
        final ArrayList<Sponsor> sponsList = new ArrayList<>();

        final RecyclerView recyclerView = findViewById(R.id.recyclerspons);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(getApplicationContext(), LinearLayoutManager.HORIZONTAL, false));


        idev = (TextView) findViewById(R.id.eventid);
        idevent = getIntent().getStringExtra("idEvent");
        idev.setText(idevent);
        System.out.println(idev.getText());


        StringRequest stringRe = new StringRequest(Request.Method.POST, displaySponsors,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {

                            JSONArray sponsors = new JSONArray(response);

                            for (int i = 0; i < sponsors.length(); i++) {

                                JSONObject object = sponsors.getJSONObject(i);

                                String nom = object.getString("organismeSpons");
                                String img =  object.getString("img");
                                String idsp =  object.getString("idSpons");

                                Sponsor sponsor = new Sponsor(nom,img,idsp);


                                sponsList.add(sponsor);

                            }


                            SponsForEventAdapter adapter1 = new SponsForEventAdapter(Details.this, sponsList);

                            recyclerView.setAdapter(adapter1);

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                Toast.makeText(Details.this, error.getMessage(), Toast.LENGTH_LONG).show();

            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();

                params.put("idEvent",idevent);
                Log.e("post", "params:" + params);

                return params;

            }
        };


        Volley.newRequestQueue(Details.this).add(stringRe);


    }
}
