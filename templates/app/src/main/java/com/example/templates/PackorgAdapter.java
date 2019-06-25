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

public class PackorgAdapter extends RecyclerView.Adapter<PackorgAdapter.PackorgViewHolder> {

    private Context context;

    private List<Pack> packList;

    public PackorgAdapter(final Context context, List<Pack> packList) {
        this.context = context;
        this.packList = packList;
    }


    @NonNull
    @Override
    public PackorgViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(context);
        View view = inflater.inflate(R.layout.packnovalidation, null);
        return new PackorgAdapter.PackorgViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull final PackorgAdapter.PackorgViewHolder holder, int position) {

        final Pack pack = packList.get(position);


        //binding the data with the viewholder views
        holder.item_title.setText(pack.getNomPack());
        holder.descr.setText(pack.getDescriptionPack());
        holder.typep.setText(pack.getTypePack());
        holder.montant.setText(pack.getMontant());
        holder.audienc.setText(pack.getAudience());
        holder.deadline.setText(pack.getDeadline());



    }

    @Override
    public int getItemCount() {
        return packList.size();
    }

    class PackorgViewHolder extends RecyclerView.ViewHolder {

        TextView item_title, descr, typep, montant, audienc, deadline;
        public LinearLayout card;


        public PackorgViewHolder(View itemView) {
            super(itemView);

            item_title = itemView.findViewById(R.id.item_title);
            descr = itemView.findViewById(R.id.descr);
            typep = itemView.findViewById(R.id.typep);
            montant = itemView.findViewById(R.id.mont);
            audienc = itemView.findViewById(R.id.audienc);
            audienc = itemView.findViewById(R.id.audienc);
            deadline = itemView.findViewById(R.id.deadl);
            card = (LinearLayout) itemView.findViewById(R.id.relpack1);

        }
    }


}