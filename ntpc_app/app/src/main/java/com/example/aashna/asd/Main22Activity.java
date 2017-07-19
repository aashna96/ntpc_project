package  com.example.aashna.asd;

import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.params.BasicHttpParams;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.HashMap;
public class Main22Activity extends AppCompatActivity {
    String myJSON;
    private static final String TAG_RESULTS="allname";
    private static final String TAG_ID = "name";
    private static final String TAG_NAME = "phoneno";
    private static final String TAG_ADH = "aadhar";
    private static final String TAG_ADD ="designation";
    private static final String TAG_EM ="concernedperson";
    private static final String TAG_d = "date";
    private static final String TAG_t = "time";
    JSONArray peoples = null;
    ArrayList<HashMap<String, String>> personList;
    ListView list;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main22);
        list = (ListView) findViewById(R.id.listView);
        personList = new ArrayList<HashMap<String,String>>();
        getData();
        }
    protected void showList(){
        try {
            JSONObject jsonObj = new JSONObject(myJSON);
            peoples = jsonObj.getJSONArray(TAG_RESULTS);
            for(int i=0;i<peoples.length();i++){
               JSONObject c = peoples.getJSONObject(i);

                String fn = c.getString(TAG_ID);
                String ln = c.getString(TAG_NAME);
                String ad = c.getString(TAG_ADH);
                String dep = c.getString(TAG_ADD);
                String email = c.getString(TAG_EM);
                String datee = c.getString(TAG_d);
                String time = c.getString(TAG_t);

                HashMap<String,String> persons = new HashMap<String,String>();
                persons.put(TAG_ID,fn);
                persons.put(TAG_NAME,ln);
                persons.put(TAG_ADH,ad);
                persons.put(TAG_ADD,dep);
                persons.put(TAG_EM,email);
                persons.put(TAG_d,datee);
                persons.put(TAG_t,time);
                personList.add(persons);
                }
            ListAdapter adapter = new SimpleAdapter( Main22Activity.this, personList, R.layout.list_item, new String[]{TAG_ID,TAG_NAME,TAG_ADH,TAG_ADD,TAG_EM,TAG_d,TAG_t},
            new int[]{R.id.fn, R.id.ln, R.id.ad,R.id.dep, R.id.email, R.id.datee , R.id.time});
            list.setAdapter(adapter);
            }
        catch (JSONException e) {
            e.printStackTrace();
            }
        }
    public void getData(){
        class GetDataJSON extends AsyncTask<String, Void, String>{
@Override
            protected String doInBackground(String... params) {
                DefaultHttpClient httpclient = new DefaultHttpClient(new BasicHttpParams());
                HttpPost httppost = new HttpPost("https://enactive-grids.000webhostapp.com/ret.php");
               // Depends on your web service
                httppost.setHeader("Content-type", "application/json");
                InputStream inputStream = null;
                String result = null;
                try {
                    HttpResponse response = httpclient.execute(httppost);
                    HttpEntity entity = response.getEntity();
                    inputStream = entity.getContent();
                    // json is UTF-8 by default
                    BufferedReader reader = new BufferedReader(new InputStreamReader(inputStream, "UTF-8"), 8);
                   StringBuilder sb = new StringBuilder();
                   String line = null;
                    while ((line = reader.readLine()) != null)
                    {
                       sb.append(line + "\n");
                        }
                    result = sb.toString();
                    } catch (Exception e) {
                    // Oops
                    }
                finally {
                    try{if(inputStream != null)inputStream.close();}
                    catch(Exception squish){}
                    }
                return result;
                }
  @Override
            protected void onPostExecute(String result){
                myJSON=result;
                showList();
                }
            }
        GetDataJSON g = new GetDataJSON();
        g.execute();
      }

}