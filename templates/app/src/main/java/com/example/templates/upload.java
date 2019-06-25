package com.example.templates;

import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.support.v7.app.AppCompatActivity;
import android.util.Base64;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
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

public class upload extends AppCompatActivity implements View.OnClickListener {

 private  Button up, sel;
   private EditText name;
   private ImageView evenpiv;
    private final int IMG_REQUEST = 1;
    private Bitmap bitmap;
    private String ip = "192.168.43.45";
    private String URLer = "http://" + ip + "/Api/test.php";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_upload);

        up = findViewById(R.id.upload);
        sel = findViewById(R.id.select);
        name = findViewById(R.id.editionn);
        evenpiv = findViewById(R.id.uplodedimg);

        up.setOnClickListener(this);
        sel.setOnClickListener(this);
    }


    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.select:
                selectimg();
                break;


            case R.id.upload:
                upload();
                break;
        }
    }

    private void selectimg() {
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
                evenpiv.setImageBitmap(bitmap);
                evenpiv.setVisibility(View.VISIBLE);
                name.setVisibility(View.VISIBLE);

            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }

    private void upload(){
        StringRequest stringRequest = new StringRequest(Request.Method.POST, URLer,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {

                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            evenpiv.setImageResource(0);
                            evenpiv.setVisibility(View.GONE);
                            name.setText("");
                            name.setVisibility(View.GONE);

                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(upload.this, " incomplet!" + e.toString(), Toast.LENGTH_SHORT).show();

                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(upload.this, "Inscrit incomplet!" + error.toString(), Toast.LENGTH_SHORT).show();

                    }
                }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("name", name.getText().toString().trim());
                params.put("image", imgToString(bitmap));

                Log.e("post", "params:" + params);
                return params;
            }
        };

        MySingleton.getmInstance(upload.this).addTorequestque(stringRequest);
    }

    private String imgToString(Bitmap bitmap) {
        ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
        bitmap.compress(Bitmap.CompressFormat.JPEG, 200, byteArrayOutputStream);
        byte[] imageByteArray = byteArrayOutputStream.toByteArray();
        return Base64.encodeToString(imageByteArray,Base64.DEFAULT);

    }
}
