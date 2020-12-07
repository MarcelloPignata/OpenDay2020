package com.example.test;

import android.os.Bundle;
import android.view.View;

import androidx.appcompat.app.AppCompatActivity;

public class PrenotatoActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_prenotato);
    }

    public void home(View v)
    {
        AppartamentoActivity.act.finish();
        PrenotaActivity.act.finish();
        finish();
    }
}