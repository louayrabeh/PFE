package com.example.templates;

import android.app.Application;
import android.content.Context;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;

public class MySingleton extends Application {

    private static MySingleton mInstance;
    private RequestQueue requestQueue;
    private static Context mctx;

    public MySingleton()
    {}

    private MySingleton(Context context){
        mctx=context;
        requestQueue=getRequestQueue();
    }

    public static synchronized MySingleton getmInstance(Context context){

        if (mInstance==null){
            mInstance = new MySingleton(context);
        }
        return mInstance;
    }

    public RequestQueue getRequestQueue(){

        if (requestQueue==null){
            requestQueue = Volley.newRequestQueue(mctx.getApplicationContext());
        }
        return requestQueue;
    }


    public <T>void addTorequestque (Request<T> request){
        requestQueue.add(request);
    }

}
