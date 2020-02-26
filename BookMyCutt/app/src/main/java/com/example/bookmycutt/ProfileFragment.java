package com.example.bookmycutt;


import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.appcompat.widget.Toolbar;
import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.google.firebase.database.ValueEventListener;
import com.squareup.picasso.Picasso;


/**
 * A simple {@link Fragment} subclass.
 */
public class ProfileFragment extends Fragment {

    FirebaseAuth firebaseAuth;
    FirebaseUser user;
    FirebaseDatabase firebaseDatabase;
    DatabaseReference databaseReference;

    //views
    ImageView avatar;
    TextView name,email,phone;

    public ProfileFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_profile, container, false);

        firebaseAuth = FirebaseAuth.getInstance();
        user = firebaseAuth.getCurrentUser();
        firebaseDatabase = FirebaseDatabase.getInstance();
        databaseReference = firebaseDatabase.getReference("Users");

        //init views
        avatar = view.findViewById(R.id.avatar);
        name = view.findViewById(R.id.name);
        email = view.findViewById(R.id.email);
        phone = view.findViewById(R.id.phone);

        //query to find the user by uid to fetch other details
        Query query = databaseReference.orderByChild("email").equalTo(user.getEmail());
        query.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {

                //check until required data get
                for(DataSnapshot ds: dataSnapshot.getChildren()){
                    //get data
                    String namef = "" + ds.child("name").getValue();
                    String emailf = "" + ds.child("email").getValue();
                    String phonef = "" + ds.child("phone").getValue();
                    String imagef = "" + ds.child("image").getValue();

                    //set data
                    name.setText(namef);
                    email.setText(emailf);
                    phone.setText(phonef);
                    try {
                        //if image is recieved then set
                        Picasso.get().load(imagef).into(avatar);
                    }
                    catch (Exception e){
                        // if image is not loaded
                        Picasso.get().load(R.drawable.addimage).into(avatar);
                    }

                }

            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });


        return view;
    }

}
