package com.example.templates;


import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.util.Base64;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.List;
import java.util.Map;


public class MyEventsAdapter extends RecyclerView.Adapter<MyEventsAdapter.MyEventsViewHolder>  {

    private Context context;

    private List<Event> eventsList1;

    RecyclerView.Adapter mA ;

    private String ip = "192.168.43.45";
    private final String supprimerev = "http://"+ip+"/Api/supprimerEvent.php";

    public MyEventsAdapter(Context context, List<Event> eventList1) {

        this.eventsList1 = eventList1;
        this.context = context;

    }

    @NonNull
    @Override
    public MyEventsAdapter.MyEventsViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(context);
        View view = inflater.inflate(R.layout.list_my_events, null);
        return new MyEventsViewHolder(view);

    }

    @Override
    public void onBindViewHolder(@NonNull MyEventsViewHolder holder, final int position) {

        final Event event = eventsList1.get(position);
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


        holder.card.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context,UpdateMyEvents.class);
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
                context.startActivity(intent);
            }
        });


        holder.delete.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                removeItem(position);

                StringRequest st1 = new StringRequest(Request.Method.POST, supprimerev,
                        new Response.Listener<String>() {
                            @Override
                            public void onResponse(String response) {

                                try
                                {
                                    JSONObject jsonObject = new JSONObject(response);
                                    String success = jsonObject.getString("success");

                                    if(success.equals("1"))
                                    {
                                        Toast.makeText(context, "deleted",Toast.LENGTH_LONG).show();
                                    }
                                    else{
                                        Toast.makeText(context, "not deleted",Toast.LENGTH_LONG).show();
                                    }

                                } catch (JSONException e) {
                                    e.printStackTrace();
                                }

                            }
                        },
                        new Response.ErrorListener() {
                            @Override
                            public void onErrorResponse(VolleyError error) {

                            }
                        })
                {
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {

                        Map<String, String> params = new HashMap<>();
                        params.put("idEvent",event.getIdEvent());
                        Log.e("post", "params:" + params);
                        return params;
                    }
                };

                MySingleton.getmInstance(context).addTorequestque(st1);
            }

        });


    }

    @Override
    public int getItemCount() {
        return eventsList1.size();
    }

    class MyEventsViewHolder extends RecyclerView.ViewHolder {


        TextView textViewTitle,textViewheure,textViewlieu,textViewShortDesc,cat,type,datedeb ,datefin,descOrg,siteOrg,lienfb,idev,budget,idorg;
        ImageView imageView;
        public LinearLayout card;
        Button delete;


        public MyEventsViewHolder(View itemView) {

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
            card = (LinearLayout) itemView.findViewById(R.id.card2);
            delete = itemView.findViewById(R.id.delete);
        }

        Bitmap getimg(String rs) {

            byte[] decodeString = Base64.decode(rs, Base64.DEFAULT);
            Bitmap decodebitmap = BitmapFactory.decodeByteArray(decodeString, 0, decodeString.length);

            return  decodebitmap;
        }


    }

    public void removeItem(int itm) {

        eventsList1.remove(itm);
        notifyItemRemoved(itm);
        notifyItemRangeChanged(itm, eventsList1.size());
    }


}

