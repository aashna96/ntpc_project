package com.example.aashna.asd;

import android.app.ProgressDialog;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class Main24Activity extends AppCompatActivity implements View.OnClickListener {

    private EditText editTextId;
    private Button buttonGet;
    private TextView textViewResult;

    private ProgressDialog loading;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main24);

        editTextId = (EditText) findViewById(R.id.editTextId);
        buttonGet = (Button) findViewById(R.id.buttonGet);
        textViewResult = (TextView) findViewById(R.id.textViewResult);

        buttonGet.setOnClickListener(this);
    }

    private void getData() {
        String id = editTextId.getText().toString().trim();
        if (id.equals("")) {
            Toast.makeText(this, "Please enter the aadhar card no.", Toast.LENGTH_LONG).show();
            return;
        }
        loading = ProgressDialog.show(this, "Please wait...", "Fetching...", false, false);

        String url = config.DATA_URL + editTextId.getText().toString().trim();

        StringRequest stringRequest = new StringRequest(url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                loading.dismiss();
                showJSON(response);
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(Main24Activity.this, error.getMessage().toString(), Toast.LENGTH_LONG).show();
                    }
                });

        com.android.volley.RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    private void showJSON(String response) {
        String name = "";
        String phoneno = "";
        String aadhar = "";
        String designation = "";
        String concernedperson = "";
        String date = "";
        String time = "";
        String confirm = "";
        try {
            JSONObject jsonObject = new JSONObject(response);
            JSONArray result = jsonObject.getJSONArray(config.JSON_ARRAY);
            JSONObject collegeData = result.getJSONObject(0);

            name = collegeData.getString(config.KEY_NAME);
            phoneno = collegeData.getString(config.KEY_PHONENO);
            aadhar = collegeData.getString(config.KEY_AADHAR);
            designation = collegeData.getString(config.KEY_DESIGNATION);
            concernedperson = collegeData.getString(config.KEY_CON);
            date = collegeData.getString(config.KEY_DATE);
            time = collegeData.getString(config.KEY_TIME);
            confirm = collegeData.getString(config.KEY_CONFIRM);
        } catch (JSONException e) {
            e.printStackTrace();
        }
        textViewResult.setText("Name:\t" + name + "\nContact Number:\t" + phoneno + "\nAadhar Card No:\t" +aadhar + "\nDesignation:\t" + designation + "\nConcerned Person:\t" + concernedperson +
                "\nDate of Meeting:\t" + date + "\nTime of Meeting:\t" + time + "\nConfirmation Detail:\t" + confirm);
        //textViewResult.setText("Name:\t" + name + "\nAddress:\t" + address + "\nVice Chancellor:\t" + vc);
    }

    @Override
    public void onClick(View v) {
        getData();
    }


}