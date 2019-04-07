package com.example.atharvakango.testapp;

import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;

public class Register extends AppCompatActivity {
    EditText e1,e2,e3;
    FirebaseAuth fa;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        e1=findViewById(R.id.editText2);//email
        e2=findViewById(R.id.editText3);//p1
        e3=findViewById(R.id.editText4);//p2

        fa= FirebaseAuth.getInstance();


    }

    public void createUser(View view)
    {
        if(e1.getText().toString().equals("") || e2.getText().toString().equals("") || e3.getText().toString().equals(""))
        {
            Toast.makeText(getApplicationContext(),"All field must be filled!!",Toast.LENGTH_SHORT).show();
        }
        else if(!(e2.getText().toString().equals(e3.getText().toString())))
        {
            Toast.makeText(getApplicationContext(),"Passwords Don't Match!!",Toast.LENGTH_SHORT).show();
        }
        else
        {
            String a=e1.getText().toString();
            String b=e2.getText().toString();

            fa.createUserWithEmailAndPassword(a,b)
                    .addOnCompleteListener(Register.this,new OnCompleteListener<AuthResult>() {
                        @Override
                        public void onComplete(@NonNull Task<AuthResult> task) {
                            if(task.isSuccessful())
                            {
                                Toast.makeText(getApplicationContext(),"User Created Successfully!!",Toast.LENGTH_SHORT).show();
                                Intent i = new Intent(getBaseContext(),LoginActivity.class);
                                startActivity(i);
                            }
                            else
                            {
                                Toast.makeText(getApplicationContext(),"No User Created!!",Toast.LENGTH_SHORT).show();
                            }
                        }
                    });
        }
    }
}
