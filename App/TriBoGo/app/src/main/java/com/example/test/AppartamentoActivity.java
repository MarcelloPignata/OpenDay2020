package com.example.test;

import android.content.Intent;
import android.os.Bundle;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

public class AppartamentoActivity extends AppCompatActivity {

    private TextView mTextView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_appartamento);


        Intent intent = getIntent();
        String posizione = intent.getStringExtra("posizione"); //if it's a string you stored.

        TextView textView = (TextView) findViewById(R.id.testo);
        textView.setText(posizione);
    }
}