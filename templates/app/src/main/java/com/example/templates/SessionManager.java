package com.example.templates;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;

import java.util.HashMap;

public class SessionManager {

    SharedPreferences sharedPreferences;
    public SharedPreferences.Editor editor;
    public Context context;
    int PRIVATE_MODE = 0;

    public static final String PREF_NAME = "LOGIN";
private static final  String LOGIN = "IS_LOGIN";
public static final String NAME = "NAME";
public static final String EMAIL = "EMAIL";
public static final String ID = "ID";
public static final String ROLE = "ROLE";



    public SessionManager(Context context) {
        this.context = context;
        sharedPreferences = context.getSharedPreferences(PREF_NAME, PRIVATE_MODE);
        editor = sharedPreferences.edit();

    }

    public void createSession(String name, String email,String id,String role){
        editor.putBoolean(LOGIN,true);
        editor.putString(NAME,name);
        editor.putString(EMAIL,email);
        editor.putString(ID,id);
        editor.putString(ROLE,role);
        editor.apply();
    }



    public boolean isLoggin() {
        return sharedPreferences.getBoolean(LOGIN, false);
    }

    public void checkLogin(){
        if(!this.isLoggin()){
            Intent i = new Intent(context,WelcomeSpon.class);
            context.startActivity(i);
            ((MainPrincip) context).finish();

        }
    }

    public void checkLogin1(){
        if(!this.isLoggin()){
            Intent i = new Intent(context,WelcomeOrg.class);
            context.startActivity(i);
            ((TabbedPrincip) context).finish();

        }
    }


    public HashMap<String,String> getSponsorDetail()
    {

       if(isLoggin())
       {
            HashMap<String, String> sponsor = new HashMap<>();
            sponsor.put(NAME, sharedPreferences.getString(NAME, null));
            sponsor.put(EMAIL, sharedPreferences.getString(EMAIL, null));
            sponsor.put(ID, sharedPreferences.getString(ID, null));
            sponsor.put(ROLE, sharedPreferences.getString(ROLE, null));

            return sponsor;
        }
        else
            return null;
    }

    public HashMap<String,String> getOrganiserDetail()
    {

        if (isLoggin()) {
            HashMap<String, String> organiser = new HashMap<>();
            organiser.put(NAME, sharedPreferences.getString(NAME, null));
            organiser.put(EMAIL, sharedPreferences.getString(EMAIL, null));
            organiser.put(ID, sharedPreferences.getString(ID, null));
            organiser.put(ROLE, sharedPreferences.getString(ROLE, null));

            return organiser;
        }
        return null;
    }


    public void logout()
    {
        editor.clear();
        editor.commit();
        Intent i = new Intent(context,WelcomeSpon.class);
        context.startActivity(i);
      ((MainPrincip) context).finish();
        //((TabbedPrincip) context).finish();
    }

    public void logout1()
    {
        editor.clear();
        editor.commit();
        Intent i = new Intent(context,WelcomeOrg.class);
        context.startActivity(i);
        ((TabbedPrincip) context).finish();

    }


}
