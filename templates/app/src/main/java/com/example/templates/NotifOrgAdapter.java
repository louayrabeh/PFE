package com.example.templates;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;
import android.widget.TextView;

import java.util.List;

public class NotifOrgAdapter extends RecyclerView.Adapter<NotifOrgAdapter.NotifOrgViewHolder> {

    private Context mCtx;

    private List<Notification> notifList;


    public NotifOrgAdapter(Context mCtx, List<Notification> notifList) {
        this.mCtx = mCtx;
        this.notifList = notifList;
    }

    @NonNull
    @Override
    public NotifOrgViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.list_notif, null);
        return new NotifOrgAdapter.NotifOrgViewHolder(view);

    }

    @Override
    public void onBindViewHolder(@NonNull NotifOrgAdapter.NotifOrgViewHolder holder, final int position) {

        final Notification notification = notifList.get(position);
        // holder.binding

        //binding the data with the viewholder views
        holder.notif.setText(notification.getContent());

    }

    @Override
    public int getItemCount() {
        return notifList.size();
    }

    class NotifOrgViewHolder extends RecyclerView.ViewHolder {


        TextView notif;
        public LinearLayout card;


        public NotifOrgViewHolder(View itemView) {

            super(itemView);

            notif = itemView.findViewById(R.id.notif);
            card = (LinearLayout) itemView.findViewById(R.id.card3);
        }

    }




}

