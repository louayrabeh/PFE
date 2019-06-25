package com.example.myapplication;

import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.support.v7.widget.Toolbar;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.example.myapplication.Adapter.MessageAdapter;
import com.example.myapplication.Fragments.ServiceAPI;
import com.example.myapplication.Notifications.Client;
import com.example.myapplication.Notifications.Data;
import com.example.myapplication.Notifications.Reponse;
import com.example.myapplication.Notifications.Sender;
import com.example.myapplication.Notifications.Token;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.google.firebase.database.ValueEventListener;

import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.HashMap;
import java.util.List;

import Model.Chat;
import Model.User;
import de.hdodenhof.circleimageview.CircleImageView;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MessageActivity extends AppCompatActivity {

    CircleImageView profile_img;
    TextView username;
    FirebaseUser user;
    DatabaseReference reference;
    ImageButton btn_send;
    ImageButton btn_upload;
    EditText text_send;
    MessageAdapter messageAdapter;
    List<Chat> mChat;
    RecyclerView recyclerView;
    ServiceAPI serviceAPI;
    boolean notify=false;
    Intent intent;
    String userid;
    ValueEventListener seenListner;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_message);
        Toolbar toolbar=findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        getSupportActionBar().setTitle("");
        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(MessageActivity.this,Activity2.class).setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP));
                //finish();
            }
        });
        serviceAPI= Client.getClient("https://fcm.googleapis.com/").create(ServiceAPI.class);

        recyclerView=findViewById(R.id.recycler_view);
        recyclerView.setHasFixedSize(true);
        LinearLayoutManager linearLayoutManager=new LinearLayoutManager(getApplicationContext());
        linearLayoutManager.setStackFromEnd(true);
        recyclerView.setLayoutManager(linearLayoutManager);
        profile_img=findViewById(R.id.profile_img);
        username=findViewById(R.id.username);
        btn_send=findViewById(R.id.btn_send);
        btn_upload=findViewById(R.id.btn_upload);
        text_send=findViewById(R.id.text_send);
        intent=getIntent();
        userid=intent.getStringExtra("userid");
        user= FirebaseAuth.getInstance().getCurrentUser();
        reference= FirebaseDatabase.getInstance().getReference("Users").child(userid);
        btn_send.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                notify=true;
                String msg=text_send.getText().toString();
                String typem="text";
                if (!msg.equals("")){
                    sendMessage(user.getUid(),userid,msg,typem);
                }
                else {
                    Toast.makeText(MessageActivity.this,"il faut envoyer quelques choses",Toast.LENGTH_SHORT).show();
                }
                text_send.setText("");
            }
        });
 //**************************************    image upload ***********************************************************************
        /*btn_upload.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                notify=true;
                String msg=text_send.getText().toString();
                String typem="image";
                if (!msg.equals("")){
                    sendMessage(user.getUid(),userid,msg,typem);
                }
                else {
                    Toast.makeText(MessageActivity.this,"il faut envoyer quelques choses",Toast.LENGTH_SHORT).show();
                }
                text_send.setText("");
            }
        });*/
        reference.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                User userr=dataSnapshot.getValue(User.class);
                username.setText(userr.getUsername());
                if(userr.getImageURL().equals("default")){
                    profile_img.setImageResource(R.mipmap.ic_launcher);
                }
                else {
                    Glide.with(getApplicationContext()).load(userr.getImageURL()).into(profile_img);
                }
                readMessage(user.getUid(),userid,userr.getImageURL());
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
        seenMessage(userid);
    }
    private void sendMessage(String sender,final String receiver,String message,String type){
        DatabaseReference reference=FirebaseDatabase.getInstance().getReference();
        HashMap<String, Object> hashMap=new HashMap<>();
        hashMap.put("sender",sender);
        hashMap.put("receiver",receiver);
        hashMap.put("message",message);
        hashMap.put("type",type);
        /*if (Build.VERSION.SDK_INT >= 26) {
            hashMap.put("sent",LocalDateTime.now().format(DateTimeFormatter.ofPattern("dd-MM-yyyy HH:mm")).toString());
        }
        else{*/
            hashMap.put("sent",Calendar.getInstance().getTime().toString());
        //}
        hashMap.put("seen",false);
        reference.child("Chat").push().setValue(hashMap);
        final DatabaseReference refchat=FirebaseDatabase.getInstance().getReference("Chatlist").child(user.getUid()).child(userid);
        refchat.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                if(!dataSnapshot.exists()){
                    refchat.child("id").setValue(userid);
                }
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
        final String msg=message;
        reference=FirebaseDatabase.getInstance().getReference("Users").child(user.getUid());
        reference.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                User user=dataSnapshot.getValue(User.class);
                try {
                    if (notify){
                        //System.out.println(msg);
                        sendNotification(receiver,user.getUsername(),msg);
                    }
                }catch (Exception e){
                    System.out.println("helow");
                }

                notify=false;
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
    }

    private void sendNotification(String receiver, final String username, final String msg) {
        final DatabaseReference token=FirebaseDatabase.getInstance().getReference("Tokens");
        Query query=token.orderByKey().equalTo(receiver);
        query.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                for (DataSnapshot snapshot:dataSnapshot.getChildren()){
                    Token token1=snapshot.getValue(Token.class);
                    Data data=new Data(user.getUid(),R.mipmap.ic_launcher,username+": "+msg,"New Message",userid);
                    Sender sender=new Sender(data,token1.getToken());
                    System.out.println(data.getBody());
                    System.out.println(sender.to);
                    serviceAPI.sendNotification(sender).enqueue(new Callback<Reponse>() {
                        @Override
                        public void onResponse(Call<Reponse> call, Response<Reponse> response) {
                            if (response.code()==200){
                                if (response.body().succes!=1){
                                    Toast.makeText(MessageActivity.this,"Fail",Toast.LENGTH_SHORT).show();
                                }
                            }
                        }

                        @Override
                        public void onFailure(Call<Reponse> call, Throwable t) {

                        }
                    });
                }
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
    }

    private void readMessage(final String myid, final String userid, final String imageurl){
        mChat=new ArrayList<>();
        reference=FirebaseDatabase.getInstance().getReference("Chat");
        reference.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                mChat.clear();
                for (DataSnapshot snapshot:dataSnapshot.getChildren()){
                    Chat chat=snapshot.getValue(Chat.class);
                    if (chat.getReceiver().equals(myid) && chat.getSender().equals(userid) ||
                            chat.getReceiver().equals(userid) && chat.getSender().equals(myid)){
                        mChat.add(chat);
                    }
                    messageAdapter=new MessageAdapter(MessageActivity.this,mChat,imageurl);
                    recyclerView.setAdapter(messageAdapter);
                }
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
    }
    private void status(String status){
        reference=FirebaseDatabase.getInstance().getReference("Users").child(user.getUid());
        HashMap<String,Object> hashMap=new HashMap<>();
        hashMap.put("status",status);
        reference.updateChildren(hashMap);
    }

    private void seenMessage(final String userid){
        reference=FirebaseDatabase.getInstance().getReference("Chat");
        seenListner=reference.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                for (DataSnapshot snapshot:dataSnapshot.getChildren()){
                    Chat chat=snapshot.getValue(Chat.class);
                    if (chat.getReceiver().equals(user.getUid()) && chat.getSender().equals(userid)){
                        HashMap<String,Object> hashMap=new HashMap<>();
                        hashMap.put("seen",true);
                        snapshot.getRef().updateChildren(hashMap);
                    }
                }
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
    }

    @Override
    protected void onResume() {
        super.onResume();
        status("online");
    }

    @Override
    protected void onPause() {
        super.onPause();
        reference.removeEventListener(seenListner);
        status("offline");
    }
}
