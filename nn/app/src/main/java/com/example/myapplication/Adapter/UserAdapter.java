package com.example.myapplication.Adapter;

import android.content.Context;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.example.myapplication.Activity2;
import com.example.myapplication.MessageActivity;
import com.example.myapplication.R;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.List;

import Model.Chat;
import Model.User;

public class UserAdapter extends RecyclerView.Adapter<UserAdapter.ViewHolder> {
    private Context mContext;
    private List<User> mUsers;
    private boolean isactive;
    String lastsentmsg;
    public UserAdapter(Context mContext,List<User> mUsers,boolean isactive){
        this.mContext=mContext;
        this.mUsers=mUsers;
        this.isactive=isactive;

    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View view= LayoutInflater.from(mContext).inflate(R.layout.user_item,viewGroup,false);
        return new UserAdapter.ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder viewHolder, int i) {
        final User user=mUsers.get(i);
        viewHolder.username.setText(user.getUsername());
        if(user.getImageURL().equals("default")){
            viewHolder.profile_img.setImageResource(R.mipmap.ic_launcher);
        }
        else {
            Glide.with(mContext).load(user.getImageURL()).into(viewHolder.profile_img);
        }
        if (isactive){
            lastMessage(user.getId(),viewHolder.sent_msg,viewHolder.sent_check);
        }
        else {
            viewHolder.sent_msg.setVisibility(View.GONE);
        }
        if (isactive){
            if (user.getStatus().equals("online")){
                viewHolder.img_stat_on.setVisibility(View.VISIBLE);
                viewHolder.img_stat_off.setVisibility(View.GONE);
            }else{
                viewHolder.img_stat_on.setVisibility(View.GONE);
                viewHolder.img_stat_off.setVisibility(View.VISIBLE);
            }
        }else{
            viewHolder.img_stat_on.setVisibility(View.GONE);
            viewHolder.img_stat_off.setVisibility(View.GONE);
        }
        viewHolder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(mContext, MessageActivity.class);
                intent.putExtra("userid",user.getId());
                mContext.startActivity(intent);
            }
        });
    }

    @Override
    public int getItemCount() {
        return mUsers.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        public TextView username;
        public ImageView profile_img;
        private ImageView img_stat_on;
        private ImageView img_stat_off;
        private TextView sent_msg;
        private ImageButton sent_check;
        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            username=itemView.findViewById(R.id.username);
            profile_img=itemView.findViewById(R.id.profile_img);
            img_stat_on=itemView.findViewById(R.id.img_stat_on);
            img_stat_off=itemView.findViewById(R.id.img_stat_off);
            sent_msg=itemView.findViewById(R.id.sent_msg);
            sent_check=itemView.findViewById(R.id.sent_check);

        }
    }
    private void lastMessage(final String userid, final TextView sent_msg, final ImageButton sent_check){
        lastsentmsg="default";
        final FirebaseUser firebaseUser= FirebaseAuth.getInstance().getCurrentUser();
        DatabaseReference reference= FirebaseDatabase.getInstance().getReference("Chat");
        reference.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                for (DataSnapshot snapshot:dataSnapshot.getChildren()){
                    Chat chat=snapshot.getValue(Chat.class);
                    if (chat.getReceiver().equals(firebaseUser.getUid()) && chat.getSender().equals(userid)
                    ||chat.getReceiver().equals(userid) && chat.getSender().equals(firebaseUser.getUid())){
                        lastsentmsg=chat.getMessage();
                    }
                }
                switch (lastsentmsg){
                    case "default":
                        sent_msg.setText("Dites bonjour à votre ami");
                        sent_msg.setBackgroundColor(0x2C6B1288);
                        break;
                    default:
                        sent_msg.setText(lastsentmsg);
                        for (DataSnapshot snapshot:dataSnapshot.getChildren()){
                            Chat chat=snapshot.getValue(Chat.class);
                            if (chat.getReceiver().equals(firebaseUser.getUid())){
                                if(!chat.isSeen()){
                                    sent_msg.setBackgroundColor(0x2C6B1288);
                                }
                                else {
                                    sent_msg.setBackgroundColor(0x006B1288);
                                }
                            }
                            if (chat.getSender().equals(firebaseUser.getUid())){
                                if(chat.isSeen()){
                                    sent_check.setVisibility(View.VISIBLE);
                                }
                                else {
                                    sent_check.setVisibility(View.GONE);
                                }
                            }
                        }
                        break;
                }
                lastsentmsg="default";
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
    }
}
