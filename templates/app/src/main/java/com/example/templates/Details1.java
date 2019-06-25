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
import android.widget.ImageButton;
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

import static com.example.templates.SessionManager.ID;

public class Details1 extends AppCompatActivity {

    TextView nomEvent, heureEvent, lieuEvent, descriptionEvent, cat, type, datedeb, datefin, descOrg, siteOrg, lienfb ,budget,idev;
    ImageView img;
    String nom, image, heure, lieu, desc, categorie, ty, ddeb, dfin, fb, desOrg, sitee ,idevent, budg,idorg;
    Button back;
    ImageButton ajoutpack;
    SessionManager sessionManager ;
    private Button dialogBtn;
    private String ip = "192.168.43.45";
    private  String displayPack = "http://"+ip+"/Api/displayPack.php";
    private  String displaySponsors = "http://"+ip+"/Api/getSponsors.php";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_details1);

        dialogBtn = findViewById(R.id.btndemande1);

        ajoutpack = findViewById(R.id.packcreate);


        final ArrayList<Pack> items = new ArrayList<>();

        final RecyclerView recyclerView = findViewById(R.id.recycler_view1);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(getApplicationContext(), LinearLayoutManager.HORIZONTAL, false));


        idev = (TextView) findViewById(R.id.eventid1);
        idevent = getIntent().getStringExtra("idEvent");
        idev.setText(idevent);


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


                            PackorgAdapter adapter1 = new PackorgAdapter(Details1.this, items);

                            recyclerView.setAdapter(adapter1);

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                Toast.makeText(Details1.this, error.getMessage(), Toast.LENGTH_LONG).show();

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


        Volley.newRequestQueue(Details1.this).add(stringRequest1);



        budget = (TextView) findViewById(R.id.valbudg1);
        budg = getIntent().getStringExtra("budget");
        budget.setText(budg);


        nomEvent = (TextView) findViewById(R.id.textViewTitre1);
        nom = getIntent().getStringExtra("nomEvent");
        nomEvent.setText(nom);

        heureEvent = (TextView) findViewById(R.id.textViewheure1);
        heure = getIntent().getStringExtra("heureEvent");
        heureEvent.setText(heure);

        lieuEvent = (TextView) findViewById(R.id.textViewlieu1);
        lieu = getIntent().getStringExtra("lieuEvent");
        lieuEvent.setText(lieu);

        descriptionEvent = (TextView) findViewById(R.id.textViewShortDesc1);
        desc = getIntent().getStringExtra("descriptionEvent");
        descriptionEvent.setText(desc);

        cat = (TextView) findViewById(R.id.categ1);
        categorie = getIntent().getStringExtra("categ");
        cat.setText(categorie);

        type = (TextView) findViewById(R.id.typee1);
        ty = getIntent().getStringExtra("typeEvent");
        type.setText(ty);

        datedeb = (TextView) findViewById(R.id.datedebevent1);
        ddeb = getIntent().getStringExtra("dateDeb");
        datedeb.setText(ddeb);

        datefin = (TextView) findViewById(R.id.datefinevent1);
        dfin = getIntent().getStringExtra("dateFin");
        datefin.setText(dfin);

        descOrg = (TextView) findViewById(R.id.descorg1);
        desOrg = getIntent().getStringExtra("descOrg");
        descOrg.setText(desOrg);

        siteOrg = (TextView) findViewById(R.id.siteorg1);
        sitee = getIntent().getStringExtra("siteOrg");
        siteOrg.setText(sitee);

        lienfb = (TextView) findViewById(R.id.lien1);
        fb = getIntent().getStringExtra("lienfb");
        lienfb.setText(fb);

        img = (ImageView) findViewById(R.id.image551);
        image = getIntent().getStringExtra("URL_Image");

        img.setImageBitmap(getimg(image));
        //   Glide.with(getApplicationContext()).load(image).into(img);
        //Picasso.with(getApplicationContext()).load(image).fit().centerCrop().into(img);

        back = (Button) findViewById(R.id.backbutt);

        final Intent intent1 = new Intent().setClass(this, getApplicationContext().getClass());
        // Then add the action to the button:

        back.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                // Launch the activity
                startActivity(intent1);

            }
        });


        sessionManager = new SessionManager(getApplicationContext());

        String idorg1 = sessionManager.sharedPreferences.getString(ID,null);

         idorg = getIntent().getStringExtra("idOrg");

        ajoutpack.setVisibility(View.GONE);
        dialogBtn.setVisibility(View.GONE);

        if(idorg.equals(idorg1))

        {

            ajoutpack.setVisibility(View.VISIBLE);
            dialogBtn.setVisibility(View.VISIBLE);


            dialogBtn.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    idevent = getIntent().getStringExtra("idEvent");
                    Intent intent = new Intent(Details1.this,CreateDemande.class);
                    intent.putExtra("id",idevent);
                    startActivity(intent);
                    finish();

                }
            });

            ajoutpack.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    idevent = getIntent().getStringExtra("idEvent");
                    Intent intent = new Intent(Details1.this,CreatePackEvent.class);
                    intent.putExtra("id",idevent);
                    startActivity(intent);
                    finish();

                }
            });

        }
        else {
            ajoutpack.setVisibility(View.GONE);
        }


    }


    Bitmap getimg(String rs) {

        byte[] decodeString = Base64.decode(rs, Base64.DEFAULT);
        Bitmap decodebitmap = BitmapFactory.decodeByteArray(decodeString, 0, decodeString.length);

        return  decodebitmap;
    }


    void getSponsors()
    {
        final ArrayList<Sponsor> sponsList = new ArrayList<>();

        final RecyclerView recyclerView = findViewById(R.id.recycler_view1);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(getApplicationContext(), LinearLayoutManager.HORIZONTAL, false));


        idev = (TextView) findViewById(R.id.eventid1);
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


                            SponsForEventAdapter adapter1 = new SponsForEventAdapter(Details1.this, sponsList);

                            recyclerView.setAdapter(adapter1);

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                Toast.makeText(Details1.this, error.getMessage(), Toast.LENGTH_LONG).show();

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


        Volley.newRequestQueue(Details1.this).add(stringRe);


    }

}