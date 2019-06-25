package com.example.templates;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ImageView;
import android.widget.TextView;

public class splashscreen extends AppCompatActivity {

    TextView sub;
    Animation fromdown, fromtop;
    ImageView log;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);


        setContentView(R.layout.slide1);


        sub = (TextView) findViewById(R.id.sub);
        log = (ImageView) findViewById(R.id.log);
        fromdown = AnimationUtils.loadAnimation(this,R.anim.fromdown);
        fromtop = AnimationUtils.loadAnimation(this,R.anim.fromtop);
        sub.setAnimation(fromdown);
        log.setAnimation(fromtop);

    }
}
