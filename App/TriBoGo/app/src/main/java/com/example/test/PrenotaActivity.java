package com.example.test;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;

import androidx.appcompat.app.AppCompatActivity;

public class PrenotaActivity extends AppCompatActivity {

    public static Activity act;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_prenota);

        act = this;
    }

    public void prenota(View v)
    {
        Intent myIntent = new Intent(PrenotaActivity.this, PrenotatoActivity.class);

        // myIntent.putExtra("id", appartamento.id);

        PrenotaActivity.this.startActivity(myIntent);
    }
}