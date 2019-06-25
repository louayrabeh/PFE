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

public class EventsAdapter extends RecyclerView.Adapter<EventsAdapter.EventsViewHolder>  {

    private Context Ctx;

    private List<Event> eventList1;


    public EventsAdapter(Context mCtx, List<Event> eventList1) {
        this.Ctx = mCtx;
        this.eventList1 = eventList1;
    }

    @NonNull
    @Override
    public EventsAdapter.EventsViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(Ctx);
        View view = inflater.inflate(R.layout.list_event1, null);
        return new EventsAdapter.EventsViewHolder(view);

    }

    @Override
    public void onBindViewHolder(@NonNull EventsAdapter.EventsViewHolder holder, final int position) {

        final Event event = eventList1.get(position);
        // holder.binding

        //binding the data with the viewholder views
        holder.textViewTitle.setText(event.getNomEvent());
        holder.textViewheure.setText(event.getHeureEvent());
        holder.textViewlieu.setText(String.valueOf(event.getLieuEvent()));
        holder.textViewShortDesc.setText(String.valueOf(event.getDescriptionEvent()));
        holder.cat.setText(String.valueOf(event.getCategorie()));
        holder.type.setText(event.getType());
                holder.datedeb.setText(event.getDatedeb());
                holder.datefin.setText(event.getDatefin());
                holder.descOrg.setText(event.getDescOrg());
                holder.siteOrg.setText(event.getSiteOrg());
                holder.lienfb.setText(event.getLienfb());
        holder.budget.setText(event.getBud());
        holder.idev.setText(event.getIdEvent());
        holder.idorg.setText(event.getIdOrg());

        holder.imageView.setImageBitmap(holder.getimg(event.getURL_image()));
       // Picasso.with(Ctx).load(event.getURL_image()).fit().into(holder.imageView);

       holder.card.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Ctx,Details1.class);
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
                intent.putExtra("idOrg",event.getIdOrg());

                Ctx.startActivity(intent);
            }
        });

    }

    @Override
    public int getItemCount() {
        return eventList1.size();
    }

    class EventsViewHolder extends RecyclerView.ViewHolder {


        TextView textViewTitle,textViewheure,textViewlieu,textViewShortDesc,cat,type,datedeb ,datefin,descOrg,siteOrg,lienfb,idev,budget,idorg;
        ImageView imageView;
        public LinearLayout card;


        public EventsViewHolder(View itemView) {

            super(itemView);

            textViewTitle = itemView.findViewById(R.id.textViewTitle1);
            textViewheure = itemView.findViewById(R.id.textViewheure1);
            textViewlieu = itemView.findViewById(R.id.textViewlieu1);
            textViewShortDesc = itemView.findViewById(R.id.textViewShortDesc1);
            cat = itemView.findViewById(R.id.categ1);
            type = itemView.findViewById(R.id.typee1);
            datedeb = itemView.findViewById(R.id.datedebevent1);
            datefin = itemView.findViewById(R.id.datefinevent1);
            descOrg = itemView.findViewById(R.id.descorg1);
            siteOrg =itemView.findViewById(R.id.siteorg1);
            lienfb =itemView.findViewById(R.id.lien1);
            imageView = itemView.findViewById(R.id.imageVieww1);
            budget = itemView.findViewById(R.id.valbudg1);
            idev = itemView.findViewById(R.id.idev1);
            idorg= itemView.findViewById(R.id.idorg1);
            card = (LinearLayout) itemView.findViewById(R.id.card1);
        }

        Bitmap getimg(String rs) {

            byte[] decodeString = Base64.decode(rs, Base64.DEFAULT);
            Bitmap decodebitmap = BitmapFactory.decodeByteArray(decodeString, 0, decodeString.length);

            return  decodebitmap;
        }
    }


}

