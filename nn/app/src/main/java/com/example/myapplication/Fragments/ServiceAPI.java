package com.example.myapplication.Fragments;

import com.example.myapplication.Notifications.Reponse;
import com.example.myapplication.Notifications.Sender;

import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.Headers;
import retrofit2.http.POST;

public interface ServiceAPI {
    @Headers(
            {
                    "Content-Type:appication/json",
                    "Authorization:key=AAAAQAIy1cA:APA91bGfOXit-6sYOuQp6XnpQn1u4_4WSbiqRtaLE8WwEEV4mzC8JJLweqmpC6dkbaxfAJ2CAEi3AZ61VHfpvF63DjFSDjoAAEdDQClAMAUqDCvxpiIIfmilhNqW7CgNWZJnYaomNmJF"
            }
    )
    @POST("fcm/send")
    Call<Reponse> sendNotification(@Body Sender body);

}
