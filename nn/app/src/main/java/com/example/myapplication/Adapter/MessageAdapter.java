package com.example.myapplication.Adapter;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.os.Build;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import java.lang.System;
import com.bumptech.glide.Glide;
import com.example.myapplication.MessageActivity;
import com.example.myapplication.R;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

import java.text.DateFormat;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.Calendar;
import java.util.List;

import Model.Chat;
import Model.User;

import static android.os.Build.VERSION_CODES.M;

public class MessageAdapter extends RecyclerView.Adapter<MessageAdapter.ViewHolder> {
    public static final int MSG_TYPE_LEFT=0;
    public static final int MSG_TYPE_RIGHT=1;
    private Context mContext;
    private List<Chat> mChat;
    private String imageurl;
    FirebaseUser fuser;
    public MessageAdapter(Context mContext, List<Chat> mChat,String imageurl){
        this.mContext=mContext;
        this.mChat=mChat;
        this.imageurl=imageurl;
    }

    @NonNull
    @Override
    public MessageAdapter.ViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        if (i==MSG_TYPE_RIGHT) {
            View view = LayoutInflater.from(mContext).inflate(R.layout.chat_right, viewGroup, false);
            return new MessageAdapter.ViewHolder(view);
        }
        else {
            View view = LayoutInflater.from(mContext).inflate(R.layout.chat_left, viewGroup, false);
            return new MessageAdapter.ViewHolder(view);
        }
    }

    @SuppressLint("SetTextI18n")
    @Override
    public void onBindViewHolder(@NonNull final ViewHolder viewHolder, int i) {
       try{
           final Chat chat=mChat.get(i);
           viewHolder.show_msg.setText(chat.getMessage());
           if(imageurl.equals("default")){
               viewHolder.profile_img.setImageResource(R.mipmap.ic_launcher);

           }
           else {
               Glide.with(mContext).load(imageurl).into(viewHolder.profile_img);
           }
           viewHolder.show_msg.setOnClickListener(new View.OnClickListener() {
               @Override
               public void onClick(View v) {
                   if(viewHolder.msg_vu.getVisibility()==View.GONE){
                   viewHolder.msg_vu.setVisibility(View.VISIBLE);
                   viewHolder.msg_vu.setText(chat.getSent());}
                   else{
                       viewHolder.msg_vu.setVisibility(View.GONE);
                   }
               }
           });
           if (i==mChat.size()-1){
               if (chat.isSeen()){
                   //viewHolder.msg_vu.setText("Seen");
                   if (Build.VERSION.SDK_INT >= 26) {
                       viewHolder.msg_vu.setText("seen "+LocalDateTime.now().format(DateTimeFormatter.ofPattern("dd-MM-yyyy HH:mm")));
                   }
                   else{
                       /*Time dayTime = new Time();
                       dayTime.setToNow();*/
                       viewHolder.msg_vu.setText("seen "+ Calendar.getInstance().getTime());
                   }
               }
               else{
                   viewHolder.msg_vu.setText("Sent");
               }
           }
           else {
               viewHolder.msg_vu.setVisibility(View.GONE);
               //if (Build.VERSION.SDK_INT >= 26) {
                 //  viewHolder.msg_vu.setText("seen "+LocalDateTime.now().format(DateTimeFormatter.ofPattern("dd-MM-yyyy HH:mm")));
               //}
               /*else{
                   //viewHolder.msg_vu.setText("seen "+Time());
               }*/
           }
       }
        catch (Exception e){System.out.println("hello friends");}
    }

    @Override
    public int getItemCount() {
        return mChat.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        public TextView show_msg;
        public ImageView profile_img;
        public TextView msg_vu;
        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            show_msg=itemView.findViewById(R.id.show_msg);
            profile_img=itemView.findViewById(R.id.profile_img);
            msg_vu=itemView.findViewById(R.id.msg_vu);

        }
    }

    @Override
    public int getItemViewType(int position) {
        fuser= FirebaseAuth.getInstance().getCurrentUser();
        if (mChat.get(position).getSender().equals(fuser.getUid())){
            return MSG_TYPE_RIGHT;
        }
        else {
            return MSG_TYPE_LEFT;
        }
    }
}
