package com.example.templates;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.CardView;
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

public class DemandGetAdapter extends RecyclerView.Adapter<DemandGetAdapter.DemandGetViewHolder> {

    private Context mCtx;

    private List<Demande> demList;
    SessionManager sessionManager;

    private String ip = "192.168.43.45";
    private  String validerdem = "http://"+ip+"/Api/validerDemande.php";


    public DemandGetAdapter(Context mCtx, List<Demande> demList) {
        this.mCtx = mCtx;
        this.demList= demList;
    }

    @NonNull
    @Override
    public DemandGetViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.list_demande, null);
        return new DemandGetAdapter.DemandGetViewHolder(view);

    }

    @Override
    public void onBindViewHolder(@NonNull DemandGetAdapter.DemandGetViewHolder holder, final int position) {

        final Demande demande = demList.get(position);
        // holder.binding

        //binding the data with the viewholder views
        holder.name.setText(demande.getCont());
        holder.idD.setText(demande.getId());

        holder.dem.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                StringRequest st = new StringRequest(Request.Method.POST, validerdem,
                        new Response.Listener<String>() {
                            @Override
                            public void onResponse(String response) {

                                try {
                                    JSONObject jsonObject = new JSONObject(response);
                                    String success = jsonObject.getString("success");
                                    Toast.makeText(mCtx, "demand validated", Toast.LENGTH_SHORT).show();
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

                        sessionManager = new SessionManager(mCtx);
                        String idSp = sessionManager.sharedPreferences.getString(ID,null);
                        params.put("idDemande",demande.getId());
                        params.put("idSpons",idSp);
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
        return demList.size();
    }

    class DemandGetViewHolder extends RecyclerView.ViewHolder {

        TextView name,idD;
        public CardView card;
        public LinearLayout card1;
        public Button dem;



        public DemandGetViewHolder(View itemView) {

            super(itemView);

            name = itemView.findViewById(R.id.demand);
            idD = itemView.findViewById(R.id.idD);
card = (CardView) itemView.findViewById(R.id.pag);
card1 = (LinearLayout) itemView.findViewById(R.id.valid);
dem = (Button) itemView.findViewById(R.id.validerDem);


        }

    }

}

