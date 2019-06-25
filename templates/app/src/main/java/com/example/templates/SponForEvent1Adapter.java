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

public class SponForEvent1Adapter extends RecyclerView.Adapter<SponForEvent1Adapter.SponForEvent1ViewHolder> {

private Context mCtx;

private List<Sponsor> sponsList;


public SponForEvent1Adapter(Context mCtx, List<Sponsor> sponsList) {
        this.mCtx = mCtx;
        this.sponsList= sponsList;
        }

@NonNull
@Override
public SponForEvent1ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.list_sponsors1, null);
        return new SponForEvent1Adapter.SponForEvent1ViewHolder(view);

        }

@Override
public void onBindViewHolder(@NonNull SponForEvent1Adapter.SponForEvent1ViewHolder holder, final int position) {

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

class SponForEvent1ViewHolder extends RecyclerView.ViewHolder {


    TextView name;
    ImageView pics;
    public LinearLayout card;


    public SponForEvent1ViewHolder(View itemView) {

        super(itemView);

        name = itemView.findViewById(R.id.nomorgspon);
        pics = itemView.findViewById(R.id.imagespons);
        card = (LinearLayout) itemView.findViewById(R.id.spons1);
    }
    Bitmap getimg(String rs) {

        byte[] decodeString = Base64.decode(rs, Base64.DEFAULT);
        Bitmap decodebitmap = BitmapFactory.decodeByteArray(decodeString, 0, decodeString.length);

        return  decodebitmap;
    }

}

}

