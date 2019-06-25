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

public class ProfileSponsor extends AppCompatActivity {

private static final String TAG = ProfileSponsor.class.getSimpleName();
TextView name,prenom,mail,organisme,adres,telorg;
    SessionManager sessionManager;
    String getID;
    Button save , logout , edit;
    ImageView img,pic ;
    private String ip = "192.168.43.45";
    private  String URL_READ = "http://"+ip+"/Api/read_details.php";
    private  String URL_edit = "http://"+ip+"/Api/edit_details.php";
    private  String URL_upload = "http://"+ip+"/Api/upload.php";
    private Bitmap bitmap ,b;
    private final int IMG_REQUEST = 1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile_sponsor);
    logout = findViewById(R.id.logout);
     save = findViewById(R.id.save);
     edit = findViewById(R.id.edit);
     pic = findViewById(R.id.mypic);
     img = findViewById(R.id.imgProfile);

        sessionManager = new SessionManager(ProfileSponsor.this);
        sessionManager.checkLogin();

        name = (TextView) findViewById(R.id.name);
         mail = (TextView) findViewById(R.id.mail);
         prenom = (TextView) findViewById(R.id.prenom);
         organisme = (TextView) findViewById(R.id.organisme);
         adres = (TextView) findViewById(R.id.adres);
         telorg = (TextView) findViewById(R.id.telorg);

        HashMap<String ,String> sponsor = sessionManager.getSponsorDetail();

        getID = sponsor.get(sessionManager.ID);

        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                sessionManager.logout();
            }
        });



        save.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if (mail.equals("")) {
                    mail.setError("enter new mail");
                    mail.requestFocus();

                    return;
                }

                if (name.equals("")) {

                    name.setError("enter new name");
                    name.requestFocus();

                    return;
                }

                if (prenom.equals("")) {

                    prenom.setError("enter new first name");
                    prenom.requestFocus();

                    return;
                }

                if (organisme.equals("")) {

                    organisme.setError("enter new company name");
                    organisme.requestFocus();

                    return;
                }

                if (adres.equals("")) {

                    adres.setError("enter new adress");
                    adres.requestFocus();

                    return;
                }

                if (telorg.equals("")) {

                    telorg.setError("enter new phone number");
                    telorg.requestFocus();

                    return;
                }

                SaveEditDetail();

          /*      name.setFocusableInTouchMode(false);
                mail.setFocusableInTouchMode(false);
                prenom.setFocusableInTouchMode(false);
                organisme.setFocusableInTouchMode(false);
                adres.setFocusableInTouchMode(false);
                telorg.setFocusableInTouchMode(false);
                name.setFocusable(false);
                mail.setFocusable(false);
                prenom.setFocusable(false);
                organisme.setFocusable(false);
                adres.setFocusable(false);
                telorg.setFocusable(false);*/
            }
        });

        edit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
               img.setVisibility(View.GONE);
                chooseFile();
                img.setVisibility(View.GONE);
                getSponsorDetail();

            }
        });



    }

    private void getSponsorDetail()
    {

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_READ,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {


                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            if (success.equals("1")) {
                               String Strname = jsonObject.getString("nomSpons").trim();
                               String Strmail = jsonObject.getString("emailSpons").trim();
                             String first = jsonObject.getString("prenomSpons").trim();
                             String organism = jsonObject.getString("organismeSpons").trim();
                             String adr = jsonObject.getString("adrSpons").trim();
                             String tels = jsonObject.getString("telSpons").trim();
                             String imgpic = jsonObject.getString("img").trim();


                                name.setText(Strname);
                                mail.setText(Strmail);
                                prenom.setText(first);
                                adres.setText(adr);
                                organisme.setText(organism);
                                telorg.setText(tels);

                                getimg(imgpic);


                            }

                        } catch (JSONException e) {
                            e.printStackTrace();

                            Toast.makeText(ProfileSponsor.this,"erreur reading info" +e.toString(),Toast.LENGTH_SHORT).show();
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
                Map<String,String> params = new HashMap<>();
                params.put("idSpons",getID);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue( this);
        requestQueue.add(stringRequest);


    }

    @Override
    protected void onResume() {
        super.onResume();
        getSponsorDetail();

    }


    private void SaveEditDetail() {

        final String name = this.name.getText().toString().trim();
        final String mail = this.mail.getText().toString().trim();
        final String prenom = this.prenom.getText().toString().trim();
        final String organisme = this.organisme.getText().toString().trim();
        final String adres = this.adres.getText().toString().trim();
        final String telorg = this.telorg.getText().toString().trim();
        final String id = getID;

        Toast.makeText(ProfileSponsor.this,"Loading...",Toast.LENGTH_SHORT).show();

        StringRequest stringRequest1 = new StringRequest(Request.Method.POST, URL_edit,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");
                            String id = jsonObject.getString("idSpons").trim();
                            String name = jsonObject.getString("nomSpons").trim();
                            String mail = jsonObject.getString("emailSpons").trim();
                          String role = "sponsor";

                            if(success.equals("1")){
                                Toast.makeText(ProfileSponsor.this,"succes",Toast.LENGTH_SHORT).show();
                                sessionManager.createSession(name,mail,id,role);
                            }

                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(ProfileSponsor.this,"catcherror" +e.toString(),Toast.LENGTH_SHORT).show();
                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                        Toast.makeText(ProfileSponsor.this,"erreur"+error.toString(),Toast.LENGTH_SHORT).show();

                    }
                })

        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String,String> params = new HashMap<>();
                params.put("nomSpons",name);
                params.put("emailSpons",mail);
                params.put("prenomSpons",prenom);
                params.put("adrSpons",adres);
                params.put("telSpons",telorg);
                params.put("organismeSpons",organisme);
                params.put("idSpons",id);
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
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if(requestCode==IMG_REQUEST && resultCode==RESULT_OK && data!=null) {
            Uri filePath = data.getData();
            try {
                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(),filePath);
                img.setImageBitmap(bitmap);
                img.setVisibility(View.GONE);
            } catch (IOException e) {
                e.printStackTrace();
            }

            UploadPicture(getID,getStringImage(bitmap));

        }
    }

    private void UploadPicture(final String id,final String photo) {

        Toast.makeText(ProfileSponsor.this,"loading image",Toast.LENGTH_SHORT).show();

        StringRequest stringRequest2 = new StringRequest(Request.Method.POST, URL_upload,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");
                            String id = jsonObject.getString("idSpons");
                            String photo = jsonObject.getString("img");

                            if(success.equals("1")){
                                Toast.makeText(ProfileSponsor.this,"succes",Toast.LENGTH_SHORT).show();
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
                params.put("idSpons",id);
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

    void getimg(String rs) {

        byte[] decodeString = Base64.decode(rs, Base64.DEFAULT);
        Bitmap decodebitmap = BitmapFactory.decodeByteArray(decodeString, 0, decodeString.length);
        pic.setImageBitmap(decodebitmap);

    }



}
