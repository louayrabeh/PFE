package com.example.templates;

import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.util.Base64;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import java.util.List;


public class EventAdapter extends RecyclerView.Adapter<EventAdapter.EventViewHolder> {

    private Context mCtx;

    private List<Event> eventList;


    public EventAdapter(Context mCtx, List<Event> eventList) {
        this.mCtx = mCtx;
        this.eventList = eventList;
    }

    @NonNull
    @Override
    public EventViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.list_event, null);
        return new EventViewHolder(view);

    }

    @Override
    public void onBindViewHolder(@NonNull EventViewHolder holder, final int position) {

       final Event event = eventList.get(position);
      // holder.binding

        //binding the data with the viewholder views
        holder.textViewTitle.setText(event.getNomEvent());
       holder.datedeb.setText(event.getDatedeb());
        holder.datefin.setText(event.getDatefin());
        holder.textViewheure.setText(event.getHeureEvent());
        holder.textViewlieu.setText(String.valueOf(event.getLieuEvent()));
        holder.textViewShortDesc.setText(String.valueOf(event.getDescriptionEvent()));
        holder.cat.setText(String.valueOf(event.getCategorie()));
        holder.type.setText(event.getType());
        holder.lienfb.setText(event.getLienfb());
        holder.descOrg.setText(event.getDescOrg());
        holder.siteOrg.setText(event.getSiteOrg());
        holder.budget.setText(event.getBud());
       holder.idev.setText(event.getIdEvent());

        holder.imageView.setImageBitmap(holder.getimg(event.getURL_image()));
        //Glide.with(mCtx).load(event.getURL_image()).into(holder.imageView);
      // Picasso.with(mCtx).load(event.getURL_image()).fit().into(holder.imageView);

      holder.card.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(mCtx,Details.class);
                intent.putExtra("idEvent",event.getIdEvent());
                intent.putExtra("budget",event.getBud());
                intent.putExtra("nomEvent",event.getNomEvent());
                intent.putExtra("dateDeb",event.getDatedeb());
                intent.putExtra("dateFin",event.getDatefin());
                intent.putExtra("heureEvent",event.getHeureEvent());
                intent.putExtra("lieuEvent",event.getLieuEvent());
                intent.putExtra("descriptionEvent",event.getDescriptionEvent());
                intent.putExtra("URL_Image",event.getURL_image());
                intent.putExtra("categ",event.getCategorie());
                intent.putExtra("typeEvent",event.getType());
                intent.putExtra("lienfb",event.getLienfb());
                intent.putExtra("descOrg",event.getDescOrg());
                intent.putExtra("siteOrg",event.getSiteOrg());
                mCtx.startActivity(intent);
            }
        });

    }

    @Override
    public int getItemCount() {
       return eventList.size();
    }

    class EventViewHolder extends RecyclerView.ViewHolder {


        TextView textViewTitle,textViewheure,textViewlieu,textViewShortDesc,cat,type,datedeb ,datefin,descOrg,siteOrg,lienfb,idev,budget;
        ImageView imageView;
       public LinearLayout card;


        public EventViewHolder(View itemView) {

            super(itemView);

            textViewTitle = itemView.findViewById(R.id.textViewTitle);
            textViewheure = itemView.findViewById(R.id.textViewheure);
            textViewlieu = itemView.findViewById(R.id.textViewlieu);
            textViewShortDesc = itemView.findViewById(R.id.textViewShortDesc);
            cat = itemView.findViewById(R.id.categ);
            type = itemView.findViewById(R.id.typee);
            datedeb = itemView.findViewById(R.id.datedebevent);
            datefin = itemView.findViewById(R.id.datefinevent);
            descOrg = itemView.findViewById(R.id.descorg);
            siteOrg =itemView.findViewById(R.id.siteorg);
            lienfb =itemView.findViewById(R.id.lien);
            imageView = itemView.findViewById(R.id.imageView);
            budget = itemView.findViewById(R.id.valbudg);
            idev = itemView.findViewById(R.id.idev);
          card = (LinearLayout) itemView.findViewById(R.id.card);
        }
        Bitmap getimg(String rs) {

            byte[] decodeString = Base64.decode(rs, Base64.DEFAULT);
            Bitmap decodebitmap = BitmapFactory.decodeByteArray(decodeString, 0, decodeString.length);

           return  decodebitmap;
        }
    }




}

