package com.example.atharvakango.testapp;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.widget.TextView;
import android.widget.Toast;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

public class ProfileView extends AppCompatActivity {

    FirebaseDatabase fd;
    DatabaseReference dr;
    TextView h;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile_view);

        h=findViewById(R.id.tx);

        fd = FirebaseDatabase.getInstance();
        dr=FirebaseDatabase.getInstance().getReference().child("Users").child("User1").child("Vehicle1").child("name");///.child("")
        final ValueEventListener postListener = new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                String j = dataSnapshot.getValue(String.class);

                h.setText(j);
            }

            @Override
            public void onCancelled(DatabaseError databaseError) {
                // Getting Post failed, log a message
                Log.w("MainActivity", "loadPost:onCancelled", databaseError.toException());
                // ...
            }
        };
        dr.addValueEventListener(postListener);

    }
}
