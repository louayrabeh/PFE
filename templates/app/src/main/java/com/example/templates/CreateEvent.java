package com.example.templates;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.support.v7.app.AppCompatActivity;
import android.util.Base64;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

import static com.example.templates.SessionManager.ID;

public class CreateEvent extends AppCompatActivity implements View.OnClickListener {

    SessionManager sessionManager;
    private ImageButton ajout;
    private ImageButton save;
    private ImageView logo;
    private RadioGroup type, categ;
    private EditText titre, adresse, debut, fin, desc, lien, siteorg, descOrg, heure,budg;
    private final int IMG_REQUEST = 1;
    private Bitmap bitmap;
    private String ip = "192.168.43.45";
    private String URL_creer = "http://" + ip + "/Api/creerEvent.php";
    private DatePickerDialog.OnDateSetListener mDateSetListener, mDateSetListenerr;
    private static final String TAG = "MainActivity";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_create_event);

        save = findViewById(R.id.enr);
        type = findViewById(R.id.radioType);
        categ = findViewById(R.id.radioCateg);
        titre = findViewById(R.id.titre);
        adresse = findViewById(R.id.adresse);
        debut = findViewById(R.id.debut);
        fin = findViewById(R.id.fin);
        desc = findViewById(R.id.desc);
        lien = findViewById(R.id.lien);
        descOrg = findViewById(R.id.descorg);
        siteorg = findViewById(R.id.site);
        heure = findViewById(R.id.hour);
        logo = findViewById(R.id.logo);
        budg = findViewById(R.id.budg);

        ajout = (ImageButton) findViewById(R.id.creer);
        ajout.setOnClickListener(this);


     /*   debut.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Calendar cal = Calendar.getInstance();
                int year = cal.get(Calendar.YEAR);
                int month = cal.get(Calendar.MONTH);
                int day = cal.get(Calendar.DAY_OF_MONTH);

                DatePickerDialog dialog = new DatePickerDialog(
                        CreateEvent.this,
                        android.R.style.Theme_Holo_Light_Dialog_MinWidth,
                        mDateSetListener,
                        year,month,day);
                dialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
                dialog.show();
            }
        });

                            mDateSetListener = new DatePickerDialog.OnDateSetListener() {
                                @Override
                                public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {

                                    month = month + 1;
                                    Log.d(TAG, "onDateSet: mm/dd/yyy: " + month + "/" + dayOfMonth + "/" + year);

                                    String date = month + "/" + dayOfMonth + "/" + year;
                                    debut.setText(date);
                                }
                            };

*/


        save.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                createEvent();
                startActivity(new Intent(CreateEvent.this,CreatePackEvent.class));
                finish();
            }
        });

    }


    @Override
    public void onClick(View v) {

        switch (v.getId()) {
            case R.id.creer:
                selectLogo();
                break;
        }
    }

    private void selectLogo() {
        Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(intent, IMG_REQUEST);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == IMG_REQUEST && resultCode == RESULT_OK && data != null) {
            Uri path = data.getData();
            try {
                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(), path);
                logo.setImageBitmap(bitmap);
                logo.setVisibility(View.VISIBLE);

            } catch (IOException e) {
                e.printStackTrace();
            }
            //createEvent(imgToString(bitmap));
        }

    }


    private String imgToString(Bitmap b) {

        ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
        b.compress(Bitmap.CompressFormat.JPEG, 100, byteArrayOutputStream);
        byte[] imageByteArray = byteArrayOutputStream.toByteArray();
        String encodedImage = Base64.encodeToString(imageByteArray,Base64.DEFAULT);

        return encodedImage;
    }




    private void createEvent() {

        final String titre = this.titre.getText().toString().trim();
        final String debut = this.debut.getText().toString().trim();
        final String fin = this.fin.getText().toString().trim();
        final String adresse = this.adresse.getText().toString().trim();
        final String desc = this.desc.getText().toString().trim();
        final String lien = this.lien.getText().toString().trim();
        final String siteorg = this.siteorg.getText().toString().trim();
        final String descOrg = this.descOrg.getText().toString().trim();
        final String heure = this.heure.getText().toString().trim();
        final String budg = this.budg.getText().toString().trim();
        final String categorie = ((RadioButton) findViewById(categ.getCheckedRadioButtonId())).getText().toString().trim();
        final String typeevent = ((RadioButton) findViewById(type.getCheckedRadioButtonId())).getText().toString().trim();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_creer,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {


                        try {

                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");


                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(CreateEvent.this, " incomplet!" + e.toString(), Toast.LENGTH_SHORT).show();

                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(CreateEvent.this, "creation incomplete!" + error.toString(), Toast.LENGTH_SHORT).show();

                    }
                }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("nomEvent", titre);
                params.put("dateDeb", debut);
                params.put("dateFin", fin);
                params.put("heure", heure);
                params.put("lieuEvent", adresse);
                params.put("image_URL", imgToString(bitmap));
                params.put("categ", categorie);
                params.put("descriptionEvent", desc);
                params.put("typeEvent", typeevent);
                params.put("lien", lien);
                params.put("siteorg", siteorg);
                sessionManager = new SessionManager(getApplicationContext());
                String id = (String) sessionManager.sharedPreferences.getString(ID, null);
                params.put("idOrg", id);
                params.put("budget", budg);
                params.put("descorg", descOrg);

                Log.e("post", "params:" + params);
                return params;
            }
        };

        MySingleton.getmInstance(CreateEvent.this).addTorequestque(stringRequest);

    }

    }

