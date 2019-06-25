package com.example.templates;


import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
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

import static com.example.templates.SessionManager.ID;

public class PackAdapter extends RecyclerView.Adapter<PackAdapter.PackViewHolder> {

    private Context context;

    private List<Pack> packList;

    SessionManager sessionManager;

    private String ip = "192.168.43.45";
    private  String validerpack = "http://"+ip+"/Api/validerPack.php";

    public PackAdapter(final Context context, List<Pack> packList) {
        this.context = context;
        this.packList = packList;
    }



    @NonNull
    @Override
    public PackViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(context);
        View view = inflater.inflate(R.layout.cardpack, null);
        return new PackAdapter.PackViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull final PackViewHolder holder, int position) {

        final Pack pack = packList.get(position);


        //binding the data with the viewholder views
        holder.item_title.setText(pack.getNomPack());
        holder.descr.setText(pack.getDescriptionPack());
        holder.typep.setText(pack.getTypePack());
        holder.montant.setText(pack.getMontant());
        holder.audienc.setText(pack.getAudience());
        holder.deadline.setText(pack.getDeadline());


        holder.valider.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                StringRequest st = new StringRequest(Request.Method.POST, validerpack,
                        new Response.Listener<String>() {
                            @Override
                            public void onResponse(String response) {

                                try {
                                  JSONObject jsonObject = new JSONObject(response);
                                    String success = jsonObject.getString("success");
                                    Toast.makeText(context, "pack validated", Toast.LENGTH_SHORT).show();
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

                        sessionManager = new SessionManager(context);
                        String idSp = sessionManager.sharedPreferences.getString(ID,null);
                        params.put("idPack",pack.getIdPack());
                        params.put("idSpons",idSp);
                        Log.e("post", "params:" + params);
                        return params;
                    }
                };

                MySingleton.getmInstance(context).addTorequestque(st);
            }
        });

    }

    @Override
    public int getItemCount() {
        return packList.size();
    }

    class PackViewHolder extends RecyclerView.ViewHolder {

        TextView item_title,descr,typep,montant,audienc,deadline;
        Button valider;
        public LinearLayout card;


        public PackViewHolder(View itemView) {
            super(itemView);

            item_title = itemView.findViewById(R.id.item_title);
            descr = itemView.findViewById(R.id.descr);
            typep = itemView.findViewById(R.id.typep);
            montant = itemView.findViewById(R.id.mont);
            audienc = itemView.findViewById(R.id.audienc);
            audienc = itemView.findViewById(R.id.audienc);
            deadline = itemView.findViewById(R.id.deadl);
            card = (LinearLayout) itemView.findViewById(R.id.relpack);
            valider = itemView.findViewById(R.id.validerpack);

        }
    }

}