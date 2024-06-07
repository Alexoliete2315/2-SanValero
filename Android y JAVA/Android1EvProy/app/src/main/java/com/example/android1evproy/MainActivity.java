package com.example.android1evproy;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;

import com.google.android.material.button.MaterialButton;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        MaterialButton btnIndex = findViewById(R.id.btnIndex);
        btnIndex.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // Código que se ejecutará al hacer clic en el botón
                abrirLoginActivity();
            }
        });
    }

    private void abrirLoginActivity() {
        Intent intent = new Intent(this, Login.class);
        startActivity(intent);
    }
}