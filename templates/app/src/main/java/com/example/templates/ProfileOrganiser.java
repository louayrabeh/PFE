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

public class ProfileOrganiser extends AppCompatActivity {

private static final String TAG = ProfileOrganiser.class.getSimpleName();
TextView name,prenom,mail,adres,telorg;
    SessionManager sessionManager;
    String getID;
    Button save , logout , edit;
    ImageView img,pic;
    private final int IMG_REQUEST = 1;
    private static String ip = "192.168.43.45";
    private static String URL_READ = "http://"+ip+"/Api/read_details1.php";
    private static String URL_edit = "http://"+ip+"/Api/edit_details1.php";
    private static String URL_upload = "http://"+ip+"/Api/upload1.php";
    private Bitmap bitmap;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile_organizer);
    logout = findViewById(R.id.logout2);
     save = findViewById(R.id.save2);
     edit = findViewById(R.id.edit2);
        pic = findViewById(R.id.mypic2);
        img = findViewById(R.id.imgProfile2);

        sessionManager = new SessionManager(ProfileOrganiser.this);
        sessionManager.checkLogin1();

        name = (TextView) findViewById(R.id.name2);
         mail = (TextView) findViewById(R.id.mail2);
        prenom = (TextView) findViewById(R.id.prenom2);
        adres = (TextView) findViewById(R.id.adres2);
        telorg = (TextView) findViewById(R.id.telorg2);

        HashMap<String ,String> organiser = sessionManager.getOrganiserDetail();

        getID = organiser.get(sessionManager.ID);


        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                sessionManager.logout1();
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

            }
        });

        edit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                img.setVisibility(View.GONE);
                chooseFile();
                img.setVisibility(View.GONE);
                getOrganiserDetail();
            }
        });

    }

    private void getOrganiserDetail()
    {

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_READ,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            if (success.equals("1")) {
                                String Strname = jsonObject.getString("nomOrg").trim();
                                String Strmail = jsonObject.getString("emailOrg").trim();
                                String first = jsonObject.getString("prenomOrg").trim();
                                String adr = jsonObject.getString("adrOrg").trim();
                                String tels = jsonObject.getString("telOrg").trim();
                                String imgpic = jsonObject.getString("img").trim();
                                name.setText(Strname);
                                mail.setText(Strmail);
                                prenom.setText(first);
                                adres.setText(adr);
                                telorg.setText(tels);

                                getimg(imgpic);

                            }

                        } catch (JSONException e) {
                            e.printStackTrace();

                            Toast.makeText(ProfileOrganiser.this,"erreur reading info" +e.toString(),Toast.LENGTH_SHORT).show();
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
                params.put("idOrg",getID);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue( this);
        requestQueue.add(stringRequest);

    }

    @Override
    protected void onResume() {
        super.onResume();
        getOrganiserDetail();

    }


    private void SaveEditDetail() {

        final String name = this.name.getText().toString().trim();
        final String mail = this.mail.getText().toString().trim();
        final String prenom = this.prenom.getText().toString().trim();
        final String adres = this.adres.getText().toString().trim();
        final String telorg = this.telorg.getText().toString().trim();
        final String id = getID;


        Toast.makeText(ProfileOrganiser.this,"Loading...",Toast.LENGTH_SHORT).show();

        StringRequest stringRequest1 = new StringRequest(Request.Method.POST, URL_edit,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");
                            String id = jsonObject.getString("idOrg").trim();
                            String name = jsonObject.getString("nomOrg").trim();
                            String mail = jsonObject.getString("emailOrg").trim();
                            String role = "organisateur";

                            if(success.equals("1")){
                                Toast.makeText(ProfileOrganiser.this,"succes",Toast.LENGTH_SHORT).show();
                                sessionManager.createSession(name,mail,id,role);
                            }

                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(ProfileOrganiser.this,"catcherror" +e.toString(),Toast.LENGTH_SHORT).show();
                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                        Toast.makeText(ProfileOrganiser.this,"erreur"+error.toString(),Toast.LENGTH_SHORT).show();

                    }
                })

        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String,String> params = new HashMap<>();
                params.put("nomOrg",name);
                params.put("emailOrg",mail);
                params.put("prenomOrg",prenom);
                params.put("adrOrg",adres);
                params.put("telOrg",telorg);
                params.put("idOrg",id);
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
    protected void onActivityResult(int requestCode, int resultCode, Intent data1) {
        super.onActivityResult(requestCode, resultCode, data1);
        if(requestCode==IMG_REQUEST && resultCode==RESULT_OK && data1!=null) {
            Uri filePath = data1.getData();
            try {
                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(), filePath);
            } catch (IOException e) {
                e.printStackTrace();
            }

            UploadPicture(getID,getStringImage(bitmap));

        }
    }

    private void UploadPicture(final String id,final String photo) {

        Toast.makeText(ProfileOrganiser.this,"loading image",Toast.LENGTH_SHORT).show();

        StringRequest stringRequest2 = new StringRequest(Request.Method.POST, URL_upload,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");
                            String id = jsonObject.getString("idOrg");
                            String photo = jsonObject.getString("img");

                            if(success.equals("1")){
                                Toast.makeText(ProfileOrganiser.this,"succes",Toast.LENGTH_SHORT).show();
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
                params.put("idOrg",id);
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
