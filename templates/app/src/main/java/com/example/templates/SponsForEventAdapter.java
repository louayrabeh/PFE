package com.example.templates;

import android.content.Context;
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

public class SponsForEventAdapter extends RecyclerView.Adapter<SponsForEventAdapter.SponsForEventViewHolder> {

    private Context mCtx;

    private List<Sponsor> sponsList;


    public SponsForEventAdapter(Context mCtx, List<Sponsor> sponsList) {
        this.mCtx = mCtx;
        this.sponsList= sponsList;
    }

    @NonNull
    @Override
    public SponsForEventViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.list_sponsors, null);
        return new SponsForEventAdapter.SponsForEventViewHolder(view);

    }

    @Override
    public void onBindViewHolder(@NonNull SponsForEventAdapter.SponsForEventViewHolder holder, final int position) {

        final Sponsor sponsor = sponsList.get(position);
        // holder.binding

        //binding the data with the viewholder views
        holder.name.setText(sponsor.getTitle());
        holder.pics.setImageBitmap(holder.getimg(sponsor.getPic()));

    }

    @Override
    public int getItemCount() {
        return sponsList.size();
    }

    class SponsForEventViewHolder extends RecyclerView.ViewHolder {


        TextView name;
        ImageView pics;
        public LinearLayout card;


        public SponsForEventViewHolder(View itemView) {

            super(itemView);

            name = itemView.findViewById(R.id.nomorgspon);
            pics = itemView.findViewById(R.id.imagespons);
            card = (LinearLayout) itemView.findViewById(R.id.spons);
        }
        Bitmap getimg(String rs) {

            byte[] decodeString = Base64.decode(rs, Base64.DEFAULT);
            Bitmap decodebitmap = BitmapFactory.decodeByteArray(decodeString, 0, decodeString.length);

            return  decodebitmap;
        }

    }

}

