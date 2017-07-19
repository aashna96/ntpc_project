package  com.example.aashna.asd;

import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;

public class MainActivity extends AppCompatActivity {
    SQLiteDatabase db1;
    Button button, button2;
    int i = 0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        button = (Button) findViewById(R.id.button);
        button2 = (Button) findViewById(R.id.button2);
        ImageView imageView=(ImageView)findViewById(R.id.imageView);
        imageView.setImageResource(R.drawable.logo);
    }

    public void onClick(View view) {

        //Intent browserIntent = new Intent(Intent.ACTION_VIEW, Uri.parse("https://webing.000webhostapp.com"));
        //startActivity(browserIntent);
        Intent Intent = new Intent(view.getContext(), Main2Activity.class);
       view.getContext().startActivity(Intent);

    }

    public void onClick2 (final View view){
        //Intent Intent = new Intent(view.getContext(), Main22Activity.class);
        //view.getContext().startActivity(Intent);
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("Enter Password to Continue");
        View viewInflated = LayoutInflater.from(this).inflate(R.layout.password, (ViewGroup) findViewById(android.R.id.content), false);
        final EditText input = (EditText) viewInflated.findViewById(R.id.input);
        builder.setView(viewInflated);
        // Set up the buttons
        builder.setPositiveButton(android.R.string.ok, new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                dialog.dismiss();
               String m_Text = input.getText().toString();

                if(m_Text.equals("ntpcdb")){
                    onClick3(view);
                }
                else{
                    showMessage("Error", "You have entered wrong password.Not autherised to access this information");
                    //onClick3(view);
                }
            }
        });
        builder.setNegativeButton(android.R.string.cancel, new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                dialog.cancel();
            }
        });

        builder.show();
    }

    public void onClick3(View view){
        Intent Intent = new Intent(view.getContext(), Main23Activity.class);
        view.getContext().startActivity(Intent);
    }


    public void showMessage(String title, String message)
    {
        AlertDialog.Builder builder=new AlertDialog.Builder(this);
        builder.setCancelable(true);
        builder.setTitle(title);
        builder.setMessage(message);
        builder.show();
    }

}
