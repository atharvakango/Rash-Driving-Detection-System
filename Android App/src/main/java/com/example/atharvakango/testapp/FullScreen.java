package com.example.atharvakango.testapp;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

public class FullScreen extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_full_screen);
    }


    public void letsStart(View view) {

        Intent i = new Intent(getBaseContext(),LoginActivity.class);
        startActivity(i);
    }
}
