package com.example.templates;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.support.v7.app.AppCompatActivity;
import android.util.Base64;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

public class UpdateMyEvents extends AppCompatActivity {

    TextView nomEvent, heureEvent, lieuEvent, descriptionEvent, cat, type, datedeb, datefin, descOrg, siteOrg, lienfb ,budget,idev;
    ImageView img,imag;
    String nom, image, heure, lieu, desc, categorie, ty, ddeb, dfin, fb, desOrg, sitee ,idevent, budg,idorg;
    private Bitmap bitmap;
    private final int IMG_REQUEST = 1;
    private String ip = "192.168.43.45";
    private  String URL_edit = "http://"+ip+"/Api/editevent.php";
   private  String URL_upload = "http://"+ip+"/Api/uploadImEv.php";
    Button save , upload;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_update_my_events);

       upload = findViewById(R.id.upl);
       save = findViewById(R.id.enregistre);

     /*   upload.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                chooseFile();
            }
        });
*/
      save.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SaveEditDetail();
            }
        });

        imag = findViewById(R.id.imgEvent);

        budget = (TextView) findViewById(R.id.budget);
        budg = getIntent().getStringExtra("budget");
        budget.setText(budg);


        idev = (TextView) findViewById(R.id.eventid2);
        idevent = getIntent().getStringExtra("idEvent");
        idev.setText(idevent);

        nomEvent = (TextView) findViewById(R.id.nomEvent);
        nom = getIntent().getStringExtra("nomEvent");
        nomEvent.setText(nom);

        heureEvent = (TextView) findViewById(R.id.heureEvent);
        heure = getIntent().getStringExtra("heureEvent");
        heureEvent.setText(heure);

        lieuEvent = (TextView) findViewById(R.id.lieuEvent);
        lieu = getIntent().getStringExtra("lieuEvent");
        lieuEvent.setText(lieu);

        descriptionEvent = (TextView) findViewById(R.id.descriptionEvent);
        desc = getIntent().getStringExtra("descriptionEvent");
        descriptionEvent.setText(desc);

        cat = (TextView) findViewById(R.id.cat);
        categorie = getIntent().getStringExtra("categ");
        cat.setText(categorie);

        type = (TextView) findViewById(R.id.type);
        ty = getIntent().getStringExtra("type");
        type.setText(ty);

        datedeb = (TextView) findViewById(R.id.datedeb);
        ddeb = getIntent().getStringExtra("dateDeb");
        datedeb.setText(ddeb);

        datefin = (TextView) findViewById(R.id.datefin);
        dfin = getIntent().getStringExtra("dateFin");
        datefin.setText(dfin);

        descOrg = (TextView) findViewById(R.id.descOrg);
        desOrg = getIntent().getStringExtra("descOrg");
        descOrg.setText(desOrg);

        siteOrg = (TextView) findViewById(R.id.siteOrg);
        sitee = getIntent().getStringExtra("siteOrg");
        siteOrg.setText(sitee);

        lienfb = (TextView) findViewById(R.id.lienfb);
        fb = getIntent().getStringExtra("lienfb");
        lienfb.setText(fb);

        img = (ImageView) findViewById(R.id.mypic);
        image = getIntent().getStringExtra("URL_Image");

        img.setImageBitmap(getimg(image));


    }

    private void SaveEditDetail() {


        final String nomEvent = this.nomEvent.getText().toString().trim();
        final String heureEvent = this.heureEvent.getText().toString().trim();
        final String lieuEvent = this.lieuEvent.getText().toString().trim();
        final String descriptionEvent = this.descriptionEvent.getText().toString().trim();
        final String cat = this.cat.getText().toString().trim();
        final String type = this.type.getText().toString().trim();
        final String datedeb = this.datedeb.getText().toString().trim();
        final String datefin = this.datefin.getText().toString().trim();
        final String descOrg = this.descOrg.getText().toString().trim();
        final String siteOrg = this.siteOrg.getText().toString().trim();
        final String lienfb = this.lienfb.getText().toString().trim();
        final String budget = this.budget.getText().toString().trim();
        final String id = this.idev.getText().toString().trim();


        StringRequest stringRequest1 = new StringRequest(Request.Method.POST, URL_edit,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            if(success.equals("1")){
                                Toast.makeText(UpdateMyEvents.this,"succes",Toast.LENGTH_SHORT).show();

                            }

                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(UpdateMyEvents.this,"catcherror" +e.toString(),Toast.LENGTH_SHORT).show();
                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                        Toast.makeText(UpdateMyEvents.this,"erreur"+error.toString(),Toast.LENGTH_SHORT).show();

                    }
                })

        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String,String> params = new HashMap<>();
                params.put("nomEvent", nomEvent);
                params.put("dateDeb", datedeb);
                params.put("dateFin", datefin);
                params.put("heureEvent", heureEvent);
                params.put("lieuEvent", lieuEvent);
               // params.put("image_URL", getStringImage(bitmap));
                params.put("URL_Image",image);
                params.put("categ", cat);
                params.put("descriptionEvent", descriptionEvent);
                params.put("typeEvent", type);
                params.put("lien", lienfb);
                params.put("siteorg", siteOrg);
                params.put("idEvent", id);
                params.put("budget", budget);
                params.put("descorg", descOrg);

                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest1);
    }

   private void chooseFile()
    {
        Intent in = new Intent();
        in.setType("image/*");
        in.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(Intent.createChooser(in,"Select picture"),1);

    }
    @Override
    protected void onResume() {
        super.onResume();
        SaveEditDetail();
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if(requestCode==IMG_REQUEST && resultCode==RESULT_OK && data!=null) {
            Uri filePath = data.getData();
            try {
                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(),filePath);
                imag.setImageBitmap(bitmap);
                imag.setVisibility(View.GONE);
            } catch (IOException e) {
                e.printStackTrace();
            }
            String id = this.idev.getText().toString().trim();
            UploadPicture(id,getStringImage(bitmap));

        }
    }

    private void UploadPicture(final String id,final String photo) {

        Toast.makeText(UpdateMyEvents.this,"loading image",Toast.LENGTH_SHORT).show();

        StringRequest stringRequest2 = new StringRequest(Request.Method.POST, URL_upload,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");
                            String id = jsonObject.getString("idEvent");
                            String photo = jsonObject.getString("img");

                            if(success.equals("1")){
                                Toast.makeText(UpdateMyEvents.this,"succes",Toast.LENGTH_SHORT).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("idEvent",id);
                params.put("img",photo);

                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest2);

    }

    public String getStringImage(Bitmap bitmap)
    {
        ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
        bitmap.compress(Bitmap.CompressFormat.JPEG, 100,byteArrayOutputStream);
        byte[] imageByteArray = byteArrayOutputStream.toByteArray();
        String encodedImage = Base64.encodeToString(imageByteArray,Base64.DEFAULT);


        return encodedImage;
    }

    Bitmap getimg(String rs) {

        byte[] decodeString = Base64.decode(rs, Base64.DEFAULT);
        Bitmap decodebitmap = BitmapFactory.decodeByteArray(decodeString, 0, decodeString.length);

        return  decodebitmap;
    }
}
