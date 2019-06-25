package com.example.templates;

import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.NavigationView;
import android.support.design.widget.NavigationView.OnNavigationItemSelectedListener;
import android.support.design.widget.TabLayout;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.view.GravityCompat;
import android.support.v4.view.ViewPager;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import static com.example.templates.SessionManager.ID;

public class MainPrincip extends AppCompatActivity implements OnNavigationItemSelectedListener {

    private SectionsPagerAdapter mSectionsPagerAdapter;
    private ViewPager mViewPager;
 static SessionManager sessionManager;
    private EditText itm;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main_princip);


       //RecyclerView recycler;

      itm = findViewById(R.id.it);


        Toolbar toolbar1 = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar1);

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar1, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

        mSectionsPagerAdapter = new SectionsPagerAdapter(getSupportFragmentManager());

        // Set up the ViewPager with the sections adapter.
        mViewPager = (ViewPager) findViewById(R.id.container);
        mViewPager.setAdapter(mSectionsPagerAdapter);


        TabLayout tabLayout = (TabLayout) findViewById(R.id.tabs);
        tabLayout.setupWithViewPager(mViewPager);

        tabLayout.getTabAt(0).setIcon(R.drawable.ic_home_black_24dp);
        tabLayout.getTabAt(1).setIcon(R.drawable.ic_outline_search_24px);
        tabLayout.getTabAt(2).setIcon(R.drawable.ic_person);

    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {

           sessionManager.logout();

            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.nav_acceuil) {

        } else if (id == R.id.nav_profil) {
startActivity( new Intent(MainPrincip.this,ProfileSponsor.class));
finish();
        } else if (id == R.id.nav_event) {

        }
        else if(id == R.id.nav_demandes)
        {
            startActivity( new Intent(MainPrincip.this,MyDemands.class));
            finish();
        }
        else if (id == R.id.nav_Messages) {


        } else if (id == R.id.nav_deconnect) {
       sessionManager.logout();
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

    public class SectionsPagerAdapter extends FragmentPagerAdapter {

        public SectionsPagerAdapter(FragmentManager fm) {
            super(fm);
        }

        @Override
        public Fragment getItem(int position) {
            // getItem is called to instantiate the fragment for the given page.
            // Return a PlaceholderFragment (defined as a static inner class below).
            return PlaceholderFragment.newInstance(position);
        }

        @Override
        public int getCount() {
            // Show 3 total pages.
            return 3;
        }
    }


    public static class PlaceholderFragment extends Fragment {
        /**
         * The fragment argument representing the section number for this
         * fragment.
         */
        List<String> categories = new ArrayList<>();
       private EditText itm;
        private static final String ARG_SECTION_NUMBER = "section_number";
        private String ip = "192.168.43.45";
        private final String EVENTByCateg_URL="http://"+ip+"/Api/getEventByCateg.php";
        private final String URL_getCateg="http://"+ip+"/Api/getCateg.php";
        private final String Filtre="http://"+ip+"/Api/filtrer.php";
         List<Event> eventList = new ArrayList<>();
        RecyclerView recyclerView;
        EventAdapter adapter;

        public PlaceholderFragment() {

        }

        /**
         * Returns a new instance of this fragment for the given section
         * number.
         */
        public static PlaceholderFragment newInstance(int sectionNumber) {
            PlaceholderFragment fragment = new PlaceholderFragment();
            Bundle args = new Bundle();
            args.putInt(ARG_SECTION_NUMBER, sectionNumber);
            fragment.setArguments(args);
            return fragment;
        }

        @Override
        public View onCreateView(LayoutInflater inflater, ViewGroup container,
                                 Bundle savedInstanceState) {


            if (getArguments().getInt(ARG_SECTION_NUMBER) == 0) {


                final View rootView = inflater.inflate(R.layout.fragment_tabbed, container, false);

                final List<Event> eventList;
                final RecyclerView recycler;


                recycler = (RecyclerView) rootView.findViewById(R.id.Recycler);
                recycler.setHasFixedSize(true);
                recycler.setLayoutManager(new LinearLayoutManager(getActivity()));


                //initializing the list
                eventList = new ArrayList<>();

                StringRequest stringRequest1 = new StringRequest(Request.Method.POST, EVENTByCateg_URL,
                        new Response.Listener<String>() {
                            @Override
                            public void onResponse(String response) {

                                try {
                                    JSONArray events1 = new JSONArray(response);

                                    for (int i = 0; i < events1.length(); i++) {

                                        JSONObject eventobj1 = events1.getJSONObject(i);

                                        String idEvent = eventobj1.getString("idEvent");
                                        String idOrg = eventobj1.getString("idOrg");
                                        String nomEvent = (String) eventobj1.getString("nomEvent");
                                        String datedeb = eventobj1.getString("dateDeb");
                                        String datefin = eventobj1.getString("dateFin");
                                        String heureEvent = eventobj1.getString("heureEvent");
                                        String lieuEvent = eventobj1.getString("lieuEvent");
                                        String descriptionEvent = eventobj1.getString("descriptionEvent");
                                        String URL_Image = eventobj1.getString("URL_Image");
                                        String categ = eventobj1.getString("categ");
                                        String type = eventobj1.getString("typeEvent");
                                        String lienfb = eventobj1.getString("lienfb");
                                        String descOrg = eventobj1.getString("descOrg");
                                        String siteOrg = eventobj1.getString("siteOrg");
                                        String bud = eventobj1.getString("budget");

                                        Event event1 = new Event(idEvent,idOrg ,nomEvent, datedeb, datefin, heureEvent, lieuEvent, descriptionEvent, URL_Image, categ, type, lienfb, descOrg, siteOrg,bud);


                                        eventList.add(event1);

                                    }

                                    //creating recyclerview adapter
                                    EventAdapter adapter1 = new EventAdapter(getActivity(), eventList);

                                    //setting adapter to recyclerview
                                    recycler.setAdapter(adapter1);

                                } catch (JSONException e) {
                                    e.printStackTrace();
                                }

                            }
                        }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                        Toast.makeText(getActivity(), error.getMessage(), Toast.LENGTH_LONG).show();

                    }
                }) {
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        Map<String, String> params = new HashMap<>();
                        sessionManager = new SessionManager(getActivity());
                        String id = (String) sessionManager.sharedPreferences.getString(ID, null);
                        params.put("idSpons", id);
                        //  params.put("org",org);
                        Log.e("post", "params:" + params);

                        return params;

                    }
                };


                Volley.newRequestQueue(getActivity()).add(stringRequest1);


                return rootView;
            }

            else if (getArguments().getInt(ARG_SECTION_NUMBER) == 1) {

                final View rootView = inflater.inflate(R.layout.fragment_recherche, container, false);

                recyclerView = (RecyclerView) rootView.findViewById(R.id.recyclerview);
                recyclerView.setHasFixedSize(true);
                recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));

                eventList = new ArrayList<>();

                itm = rootView.findViewById(R.id.it);

                itm.setText("");

                JsonArrayRequest ArrayRequest = new JsonArrayRequest(Request.Method.GET, URL_getCateg,null,
                        new Response.Listener<JSONArray>() {
                            @Override
                            public void onResponse(JSONArray response) {

                                try {

                                    for (int i = 0; i < response.length(); i++) {

                                        JSONObject obj = response.getJSONObject(i);

                                        String nom_cat = obj.getString("libCateg");

                                        categories.add(nom_cat);

                                    }

                                    final String[] listItems;
                                    final boolean[] checkedItems;
                                    final ArrayList<Integer> mUserItems = new ArrayList<>();
                                    listItems = categories.toArray(new String[0]);
                                    checkedItems = new boolean[listItems.length];
                                    Button show = rootView.findViewById(R.id.show);


                                    show.setOnClickListener(new View.OnClickListener() {
                                        @Override
                                        public void onClick(View view) {
                                            AlertDialog.Builder mBuilder = new AlertDialog.Builder(getContext());
                                            mBuilder.setTitle(R.string.welcome);
                                            mBuilder.setMultiChoiceItems(listItems, checkedItems, new DialogInterface.OnMultiChoiceClickListener() {
                                                @Override
                                                public void onClick(DialogInterface dialogInterface, int position, boolean isChecked) {

                                                    if(isChecked){
                                                        mUserItems.add(position);
                                                    }else{
                                                        mUserItems.remove((Integer.valueOf(position)));
                                                    }
                                                }
                                            });

                                            mBuilder.setCancelable(false);
                                            mBuilder.setPositiveButton(R.string.ok_label, new DialogInterface.OnClickListener() {
                                                @Override
                                                public void onClick(DialogInterface dialogInterface, int which) {
                                                    String item = "";
                                                    for (int i = 0; i < mUserItems.size(); i++) {
                                                        item = item+"'"+ listItems[mUserItems.get(i)]+"'" ;

                                                        if (i != mUserItems.size() - 1) {
                                                            item = item+",";
                                                        }
                                                    }
                                                    itm.setText(item);

                                                    filtrer();

                                                }
                                            });

                                            mBuilder.setNegativeButton(R.string.dismiss_label, new DialogInterface.OnClickListener() {
                                                @Override
                                                public void onClick(DialogInterface dialogInterface, int i) {
                                                    dialogInterface.dismiss();
                                                }
                                            });

                                            mBuilder.setNeutralButton(R.string.clear_all_label, new DialogInterface.OnClickListener() {
                                                @Override
                                                public void onClick(DialogInterface dialogInterface, int which) {
                                                    for (int i = 0; i < checkedItems.length; i++) {
                                                        checkedItems[i] = false;
                                                        mUserItems.clear();
                                                        //   mItemSelected.setText("");
                                                    }
                                                }
                                            });
                                            AlertDialog mDialog = mBuilder.create();
                                            mDialog.show();
                                        }
                                    });

                                }

                                catch (JSONException e) {
                                    e.printStackTrace();
                                }
                                //Toast.makeText(getContext(),itm,Toast.LENGTH_SHORT).show();

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
                        Map<String,String> params = new HashMap<>();
                        //  params.put("cat",);
                        return params;
                    }
                };

                Volley.newRequestQueue(getActivity()).add(ArrayRequest);



                return rootView;

            } else if (getArguments().getInt(ARG_SECTION_NUMBER) == 2) {

                View rootView = inflater.inflate(R.layout.fragment_profil, container, false);

                Button profil = (Button) rootView.findViewById(R.id.modifier);
                ImageButton creer = (ImageButton) rootView.findViewById(R.id.create);

                final Intent intent3 = new Intent().setClass(getContext(), ProfileSponsor.class);
                // Then add the action to the button:

                profil.setOnClickListener(new View.OnClickListener() {
                    public void onClick(View v) {
                        // Launch the activity
                        startActivity(intent3);
                    }
                });

           final Intent inten= new Intent().setClass(getContext(), upload.class);
            // Then add the action to the button:

            creer.setOnClickListener(new View.OnClickListener() {
                public void onClick(View v) {
                    // Launch the activity
                    startActivity(inten);
                }
            });


                return rootView;
            }
return null;
        }
        ///////
        private void filtrer(){

            StringRequest stringRequest = new StringRequest(Request.Method.POST, Filtre,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {

                          eventList.clear();

                            try {

                                JSONArray events = new JSONArray(response);

                                for (int i = 0; i < events.length(); i++) {

                                    JSONObject eventobj = events.getJSONObject(i);

                                    // Toast.makeText(getContext(),EVENT_URL,Toast.LENGTH_LONG).show();
                                    String idEvent = eventobj.getString("idEvent");
                                    String idOrg = eventobj.getString("idOrg");
                                    String nomEvent = (String) eventobj.getString("nomEvent");
                                    String datedeb = eventobj.getString("dateDeb");
                                    String datefin = eventobj.getString("dateFin");
                                    String heureEvent = eventobj.getString("heureEvent");
                                    String lieuEvent = eventobj.getString("lieuEvent");
                                    String descriptionEvent = eventobj.getString("descriptionEvent");
                                    String URL_Image = eventobj.getString("URL_Image");
                                    String categ = eventobj.getString("categ");
                                    String type = eventobj.getString("typeEvent");
                                    String descOrg = eventobj.getString("descOrg");
                                    String siteOrg = eventobj.getString("siteOrg");
                                    String lienfb = eventobj.getString("lienfb");
                                    String budget = eventobj.getString("budget");

                                    Intent intent = new Intent(getContext(),PackAdapter.class);
                                    intent.putExtra("idOrg",idOrg);

                                    Event event = new Event(idEvent,idOrg ,nomEvent, datedeb, datefin, heureEvent, lieuEvent, descriptionEvent, URL_Image, categ, type, lienfb, descOrg, siteOrg,budget);

                                    eventList.add(event);

                                }

                                //creating recyclerview adapter
                                adapter = new EventAdapter(getContext(), eventList);
                                adapter.notifyDataSetChanged();
                                //setting adapter to recyclerview recyclerView.setAdapter(adapter);
                                recyclerView.setAdapter(adapter);



                            } catch (JSONException e) {
                                e.printStackTrace();
                            }


                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {

                    Toast.makeText(getContext(), error.getMessage(), Toast.LENGTH_LONG).show();

                }
            }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<>();


                    params.put("categ", itm.getText().toString());

                    Log.e("post", "params:" + params);

                    return params;

                }

            };

            Volley.newRequestQueue(getContext()).add(stringRequest);

        }


    }


}