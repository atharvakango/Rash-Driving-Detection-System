package com.example.atharvakango.testapp;

import android.content.Intent;
import android.graphics.Color;
import android.nfc.Tag;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.firebase.FirebaseApp;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;

public class VehiclesFromNav extends AppCompatActivity {
    private static final String TAG = "MainActivity";

    FirebaseDatabase database = FirebaseDatabase.getInstance();
    DatabaseReference myRef = database.getReference().child("Users").child("User1").child("Vehicle1");//.child("Vehicle1");
    ListView ls;
    //private ArrayAdapter<String> adapter;
    private ArrayList<String> arrayList;
    static String s1,s2;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_vehicles_from_nav);
        ls=findViewById(R.id.lsVehicle);

        arrayList = new ArrayList<String>();
        ArrayAdapter adapter = new ArrayAdapter<String>(getApplicationContext(), android.R.layout.simple_spinner_item, arrayList)
        {
            @Override
            public View getView(int position, View convertView, ViewGroup parent){
                View view = super.getView(position, convertView, parent);
                TextView tv = (TextView) view.findViewById(android.R.id.text1);
                tv.setTextColor(Color.BLACK);
                return view;
            }
        };
        ls.setAdapter(adapter);


        final ValueEventListener postListener = new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                // Get Post object and use the values to update the UI
                try {
                    Vehicle vh = dataSnapshot.getValue(Vehicle.class);
                    if(vh==null)
                        Toast.makeText(getApplicationContext(),"Saglach ganlay bhava",Toast.LENGTH_LONG).show();
                    //System.out.print(vh.getNm());
                    //Sensor1 s1 = vh.getS1();
                    //System.out.print(vh.getS1().getLat());
                    /*double d = vh.getS1().getLat();
                    String f = Double.toString(d);*/
                    arrayList.add(vh.getNm());
                    s1=vh.getNm();
                    s2=vh.getNum();
                    //Toast.makeText(getApplicationContext(),vh.getNm(),Toast.LENGTH_LONG).show();

                    //arrayList.add(vh.getNm());
                }catch (NullPointerException r)
                {
                    System.out.print("Ganlay");
                }

            }

            @Override
            public void onCancelled(DatabaseError databaseError) {
                // Getting Post failed, log a message
                Log.w(TAG, "loadPost:onCancelled", databaseError.toException());
                // ...
            }
        };
        myRef.addValueEventListener(postListener);
        //arrayList.add();


        ls.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            public void onItemClick(AdapterView<?> parent, View view,
                                    int position, long id) {

                String product = ((TextView) view).getText().toString();
                Toast.makeText(getApplicationContext(), "Selected Vehicle Name :" +product, Toast.LENGTH_SHORT).show();

                Intent i = new Intent(getApplicationContext(),MPChartsActivity.class);
                i.putExtra("name",s1);
                i.putExtra("num",s2);
                startActivity(i);
            }
        });
    }
}
