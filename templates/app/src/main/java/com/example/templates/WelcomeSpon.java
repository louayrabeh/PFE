package com.example.templates;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.facebook.AccessToken;
import com.facebook.AccessTokenTracker;
import com.facebook.CallbackManager;
import com.facebook.FacebookCallback;
import com.facebook.FacebookException;
import com.facebook.GraphRequest;
import com.facebook.GraphResponse;
import com.facebook.login.LoginResult;
import com.facebook.login.widget.LoginButton;
import com.google.android.gms.auth.api.Auth;
import com.google.android.gms.auth.api.signin.GoogleSignInAccount;
import com.google.android.gms.auth.api.signin.GoogleSignInOptions;
import com.google.android.gms.auth.api.signin.GoogleSignInResult;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.SignInButton;
import com.google.android.gms.common.api.GoogleApiClient;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.Arrays;
import java.util.HashMap;
import java.util.Map;

public class WelcomeSpon extends AppCompatActivity implements View.OnClickListener,GoogleApiClient.OnConnectionFailedListener {

    Button register, passoub, connect;
    EditText emailSpons, mdpSpons;
    SessionManager sessionManager;
    CallbackManager callbackManager;
    private LoginButton loginButton;
    private static int RQ = 9001;
    private static final String TAG = "AndroidClarified";
    private GoogleApiClient googleApiClient;
    private SignInButton googleSignInButton;
    private String ip = "192.168.43.45";

    private final String URLlog = "http://"+ip+"/Api/login.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.layout);


        callbackManager = CallbackManager.Factory.create();
        sessionManager = new SessionManager(this);


        register = (Button) findViewById(R.id.register);
        passoub = (Button) findViewById(R.id.mdp);
        connect = (Button) findViewById(R.id.btconnecter);
        emailSpons = (EditText) findViewById(R.id.login);
        mdpSpons = (EditText) findViewById(R.id.pass);




        loginButton = findViewById(R.id.login_button);
        loginButton.setReadPermissions(Arrays.asList("email", "public_profile"));

        // Callback registration
        loginButton.registerCallback(callbackManager, new FacebookCallback<LoginResult>() {
            @Override
            public void onSuccess(LoginResult loginResult) {

                // App code
                startActivity(new Intent(WelcomeSpon.this, MainPrincip.class));
                finish();
            }

            @Override
            public void onCancel() {
                // App code
            }

            @Override
            public void onError(FacebookException exception) {
                // App code
                exception.printStackTrace();
            }
        });

        googleSignInButton = findViewById(R.id.sign_in_button);
        GoogleSignInOptions gso = new GoogleSignInOptions.Builder(GoogleSignInOptions.DEFAULT_SIGN_IN).requestEmail().build();
        googleApiClient =new GoogleApiClient.Builder(this).enableAutoManage(this,this).addApi(Auth.GOOGLE_SIGN_IN_API,gso).build();
        googleSignInButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                loginMail();
               /* Intent i = new Intent().setClass(getApplicationContext(), MainPrincip.class);
                startActivity(i);
                finish();*/
            }
        });

        final Intent intent = new Intent().setClass(this, RegisterSponsor.class);
        // Then add the action to the button:

        register.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                // Launch the activity
                startActivity(intent);
                finish();
            }
        });


        final Intent intent1 = new Intent().setClass(this, Check_mdp.class);
        // Then add the action to the button:

        passoub.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                // Launch the activity
                startActivity(intent1);
                finish();
            }
        });


        connect.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final String mail = emailSpons.getText().toString().trim();
                final String pass = mdpSpons.getText().toString().trim();

                if (mail.equals("") || pass.equals("")) {
                    Toast.makeText(WelcomeSpon.this, "Champ vide", Toast.LENGTH_LONG).show();

                }

                Login(mail, pass);

            }
        });
    }



    private void loadsponsorprofile (AccessToken newAccessToken)
    {
        GraphRequest request = GraphRequest.newMeRequest(
                newAccessToken,
                new GraphRequest.GraphJSONObjectCallback() {
                    @Override
                    public void onCompleted(JSONObject object, GraphResponse response) {
                        try {
                            String email = object.getString("email");
                            String first_name = object.getString("first_name");
                            String last_name = object.getString("last_name");
                            String id = object.getString("id");
                            String role = "sponsor";
                            String name = first_name + " " + last_name;

                            sessionManager.createSession(name, email, id, role);

                            //
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                });

        Bundle parameters = new Bundle();
        parameters.putString("fields", "first_name,last_name,email,id");
        request.setParameters(parameters);
        request.executeAsync();
    }


    public void Login(final  String mail , final  String pass) {

        String emailPattern = "[a-zA-Z0-9._-]+@[a-z]+\\.+[a-z]+";

       if (mail.matches(emailPattern)) {

            StringRequest stringRequest1 = new StringRequest(Request.Method.POST, URLlog,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {

                            try {

                                JSONObject jsonObject = new JSONObject(response);
                                String success = jsonObject.getString("success");
                                String nom = jsonObject.getString("nomSpons");
                                String mail = jsonObject.getString("emailSpons");
                                String id = jsonObject.getString("idSpons");

                                String role = "sponsor";
                                if (success.equals("1")) {
                                    sessionManager.createSession(nom,mail,id,role);
                                     Intent i = new Intent().setClass(getApplicationContext(), MainPrincip.class);
                                   startActivity(i);
finish();
                                }


                            } catch (JSONException e) {
                                e.printStackTrace();
                                Toast.makeText(WelcomeSpon.this, " incomplet2" + e.toString(), Toast.LENGTH_SHORT).show();

                            }

                        }

                    },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            Toast.makeText(WelcomeSpon.this, "ERREUR!" + error.toString(), Toast.LENGTH_SHORT).show();

                        }
                    }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<>();
                    params.put("emailSpons", mail);
                    params.put("mdpSpons", pass);
                    return params;
                }
            };

            MySingleton.getmInstance(WelcomeSpon.this).addTorequestque(stringRequest1);
        }

       else {
            Toast.makeText(WelcomeSpon.this, "entrez une adresse valide", Toast.LENGTH_SHORT).show();
        }
    }


    @Override
    public void onClick(View v) {

    }

    @Override
    public void onConnectionFailed(@NonNull ConnectionResult connectionResult) {

    }

    private void loginMail()
    {
      Intent intent = Auth.GoogleSignInApi.getSignInIntent(googleApiClient);
      startActivityForResult(intent,RQ);
    }

    private void handleResult(GoogleSignInResult result)
    {
        if(result.isSuccess())
        {
            GoogleSignInAccount account = result.getSignInAccount();
            String name = account.getDisplayName();
            String email = account.getEmail();
            String id = account.getId();
            String role = "sponsor";
            sessionManager.createSession(name,email,id,role);
            System.out.println();
            Intent i = new Intent().setClass(getApplicationContext(), MainPrincip.class);
            startActivity(i);
            finish();
            updateUI(true);
        }
        else
        {
            updateUI(false);
        }

    }

    private  void updateUI(boolean isLoggin)
    {
        if(isLoggin)
        {
            googleSignInButton.setVisibility(View.GONE);
        }
        else
        {
            googleSignInButton.setVisibility(View.GONE);
        }

    }

    @Override
    protected void onActivityResult ( int requestCode, int resultCode, Intent data){
      //  callbackManager.onActivityResult(requestCode, resultCode, data);
        super.onActivityResult(requestCode, resultCode, data);

        if(requestCode == RQ)
        {
            GoogleSignInResult result = Auth.GoogleSignInApi.getSignInResultFromIntent(data);
            handleResult(result);
        }
    }

    AccessTokenTracker tokenTracker = new AccessTokenTracker() {
        @Override
        protected void onCurrentAccessTokenChanged(AccessToken oldAccessToken, AccessToken currentAccessToken) {

            loadsponsorprofile(currentAccessToken);

        }
    };

}


