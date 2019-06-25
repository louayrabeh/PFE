package com.example.templates;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
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

public class DemandSponsorAdapter extends RecyclerView.Adapter<DemandSponsorAdapter.DemandSponsorViewHolder> {

    private Context mCtx;

    private List<Sponsor> sponsList;

    private String ip = "192.168.43.45";
    private  String ajoutDem = "http://"+ip+"/Api/ajoutDemande.php";



    public DemandSponsorAdapter(Context mCtx, List<Sponsor> sponsList) {
        this.mCtx = mCtx;
        this.sponsList= sponsList;
    }

    @NonNull
    @Override
    public DemandSponsorViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.sponsdemande, null);
        return new DemandSponsorAdapter.DemandSponsorViewHolder(view);

    }

    @Override
    public void onBindViewHolder(@NonNull final DemandSponsorAdapter.DemandSponsorViewHolder holder, final int position) {

        final Sponsor sponsor = sponsList.get(position);
        // holder.binding

        //binding the data with the viewholder views
        holder.name.setText(sponsor.getTitle());
        holder.ide.setText(sponsor.getPic());


        holder.spons.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                StringRequest st = new StringRequest(Request.Method.POST, ajoutDem,
                        new Response.Listener<String>() {
                            @Override
                            public void onResponse(String response) {

                                try {
                                    JSONObject jsonObject = new JSONObject(response);
                                    String success = jsonObject.getString("success");
                                    Toast.makeText(mCtx, "demand created", Toast.LENGTH_SHORT).show();
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
                        params.put("idEvent",holder.ide.getText().toString().trim());
                        params.put("idSpons",sponsor.getId());
                        Log.e("post", "params:" + params);
                        return params;
                    }
                };

                MySingleton.getmInstance(mCtx).addTorequestque(st);
            }
        });



    }

    @Override
    public int getItemCount() {
        return sponsList.size();
    }

    class DemandSponsorViewHolder extends RecyclerView.ViewHolder {

        TextView name,ide;
        public LinearLayout card;
        public CardView spons;


        public DemandSponsorViewHolder(View itemView) {

            super(itemView);

            name = itemView.findViewById(R.id.nomorgspon);
            ide = itemView.findViewById(R.id.ide);
            card = (LinearLayout) itemView.findViewById(R.id.sponsdem);
            spons = (CardView) itemView.findViewById(R.id.cardspon);

        }

    }

}

