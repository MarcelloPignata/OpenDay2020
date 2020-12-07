package com.example.test;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

public class AppartamentoActivity extends AppCompatActivity {


    public static Activity act;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_appartamento);

        act = this;


        Intent intent = getIntent();

        int id = intent.getIntExtra("id",-1);
        String titolo = intent.getStringExtra("titolo");
        String nomeFileImmagine = intent.getStringExtra("nomeFileImmagine");
        String luogo = intent.getStringExtra("luogo");
        float prezzo = intent.getFloatExtra("prezzo", -1);
        int posti = intent.getIntExtra("posti", -1);
        String descrizione = intent.getStringExtra("descrizione");


        TextView textTitolo = (TextView) findViewById(R.id.textTitolo);
        TextView textLuogo = (TextView) findViewById(R.id.textLuogo);
        TextView textPosti = (TextView) findViewById(R.id.textPosti);
        TextView textPrezzo = (TextView) findViewById(R.id.textPrezzo);
        TextView textDescrizione = (TextView) findViewById(R.id.textDescrizione);


        // DISCLAIMER
        //
        // Non chiedetemi perché i nomi siano spaiati,
        // sono perfettamente consapevole che è un obbrorio,
        // ma ora come ora è l'unico modo che ho per farli funzionare,
        // non capisco questo programma e non ho tempo per capirlo.
        // Spero Dio abbia pietà.
        textTitolo.setText("Posti letto: " + posti);
        textLuogo.setText(titolo);
        textPosti.setText(luogo);
        textPrezzo.setText("Prezzo per notte: " + prezzo + "€");
        textDescrizione.setText(descrizione);


        ImageView image = (ImageView) findViewById(R.id.imageView);
        new LoadImage(image).execute("https://openday2020.000webhostapp.com/img/" + nomeFileImmagine);

    }

    public void prenota(View v)
    {
        Intent myIntent = new Intent(AppartamentoActivity.this, PrenotaActivity.class);

        // myIntent.putExtra("id", appartamento.id);

        AppartamentoActivity.this.startActivity(myIntent);
    }
}