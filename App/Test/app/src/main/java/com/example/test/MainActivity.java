package com.example.test;

import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.drawable.Drawable;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ImageView;
import android.widget.LinearLayout;

import androidx.appcompat.app.AppCompatActivity;
import androidx.constraintlayout.widget.ConstraintLayout;

import org.apache.commons.net.ftp.FTP;
import org.apache.commons.net.ftp.FTPClient;

import java.io.BufferedOutputStream;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.URL;

public class MainActivity extends AppCompatActivity {

    // initialize upload and download handler
    FTP_Upload Upload = new FTP_Upload();
    FTP_Download Download = new FTP_Download();

    // CODE SAMPLES
    /*

        LOAD PICTURE FROM WEB

        ImageView image = new ImageView(this);
        image.setLayoutParams(new LinearLayout.LayoutParams(LinearLayout.LayoutParams.MATCH_PARENT, LinearLayout.LayoutParams.WRAP_CONTENT));
        ConstraintLayout Layout = findViewById(R.id.myLayout);
        Layout.addView(image);
        new LoadImage(image).execute("https://pignataftp.000webhostapp.com/pics/1.jpg");



        UPLOAD / DOWNLOAD FILES

        Upload.filename = FILENAME;
        Upload.execute();

        Download.filename = FILENAME;
        Download.execute();



        WRITE TO FILE

        writeToFile(getApplicationContext(), "text", FILENAME);

     */

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }

    // WRITE TO FILE
    public static void writeToFile(Context context, String text, String filename)
    {
        try
        {
            // initialize output stream writer
            OutputStreamWriter outputStreamWriter = new OutputStreamWriter(context.openFileOutput(filename, Context.MODE_PRIVATE));

            // write on file
            outputStreamWriter.write(text);

            // terminate output steam writer
            outputStreamWriter.close();
        }
        catch (IOException e)
        {
            // log errors
            Log.e("USERLOG", "File write failed: " + e.toString());
        }
    }

    // READ FROM FILE
    public static String readFromFile(Context context, String filename)
    {
        // initialization of return string
        String ret = "";

        try
        {
            // initialize inputStream
            InputStream inputStream = context.openFileInput(filename);

            // if file is not empty
            if ( inputStream != null )
            {
                // initialize buffered reader
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream));

                // initialization of single line string
                String receiveString = "";

                // initialize string builder
                StringBuilder stringBuilder = new StringBuilder();

                // as long as there are new lines
                while ( (receiveString = bufferedReader.readLine()) != null )
                {
                    // append line to string builder
                    stringBuilder.append("\n").append(receiveString);
                }

                // terminate input stream
                inputStream.close();

                // save string builder into return string
                ret = stringBuilder.toString();
            }
        }
        catch (FileNotFoundException e)
        {
            // log "file not found" error
            Log.e("USERLOG", "File not found: " + e.toString());
        }
        catch (IOException e)
        {
            // log generic error
            Log.e("USERLOG", "Can not read file: " + e.toString());
        }

        // return return string, containing all of file's content
        return ret;
    }
}

class LoadImage extends AsyncTask<String, Void, Bitmap>
{
    // pointer to ImageView to load image into
    ImageView bmImage;

    // constructor
    public LoadImage(ImageView bmImage)
    {
        this.bmImage = bmImage;
    }

    protected Bitmap doInBackground(String... urls)
    {
        // store URL
        String url = urls[0];

        // initialize empty bitmap
        Bitmap mIcon11 = null;

        try
        {
            // open InputStream from given URL
            InputStream in = new java.net.URL(url).openStream();

            // store decoded bitmap into mIcon11
            mIcon11 = BitmapFactory.decodeStream(in);
        }
        catch (Exception e)
        {
            // Log errors
            Log.e("USERLOG", e.getMessage());
        }

        return mIcon11;
    }

    protected void onPostExecute(Bitmap result)
    {
        // load image into given ImageView
        bmImage.setImageBitmap(result);
    }
}

class FTP_Upload extends AsyncTask<Void, Void, FTPClient>
{
    // name of the file to upload
    public String filename;

    protected FTPClient doInBackground(Void... args)
    {
        // define FTP details
        String server = "files.000webhost.com";
        int port = 21;
        String user = "pignataftp";
        String pass = "Briat123";

        // initialize FTP Handler
        FTPClient ftpClient = new FTPClient();

        try
        {
            // connect to server
            ftpClient.connect(server, port);
            ftpClient.login(user, pass);

            // define connection details
            ftpClient.enterLocalPassiveMode();
            ftpClient.setFileType(FTP.ASCII_FILE_TYPE);

            // initialize pointer to local file
            File LocalFile = new File(MyApp.getContext().getFilesDir().getAbsolutePath() + '/' + filename);

            // define remote file name
            String RemoteFile = filename;

            // initialize input stream from file
            InputStream inputStream = new FileInputStream(LocalFile);

            // try upload
            boolean success = ftpClient.storeFile(RemoteFile, inputStream);

            // terminate input stream
            inputStream.close();

            // log upload result
            if (success)    { Log.v("USERLOG","File has been uploaded successfully"); }
            else            { Log.e("USERLOG","File not uploaded"); }

            // try file delete and log result
            if (LocalFile.delete())     { Log.v("USERLOG", "Deleted local file " + '"' + LocalFile.getName() + '"'); }
            else                        { Log.e("USERLOG", "Failed to delete the local file."); }

        }
        catch (IOException ex)
        {
            // Log connection errors
            Log.e("USERLOG", "FTP connection error: " + ex.getMessage());
            ex.printStackTrace();
        }
        finally
        {
            // close FTP connection
            try
            {
                if (ftpClient.isConnected())
                {
                    ftpClient.logout();
                    ftpClient.disconnect();
                }
            }
            catch (IOException ex)
            {
                // log disconnection errors
                Log.e("USERLOG", "FTP disconnection error: " + ex.getMessage());
                ex.printStackTrace();
            }
        }

        return ftpClient;
    }
}

class FTP_Download extends AsyncTask<Void, Void, FTPClient>
{
    // name of the file to download
    public String filename;

    public void SetFileName(String filename)
    {
        this.filename = filename;
    }

    protected FTPClient doInBackground(Void... args)
    {
        // define FTP details
        String server = "files.000webhost.com";
        int port = 21;
        String user = "pignataftp";
        String pass = "Briat123";

        // initialize FTP Handler
        FTPClient ftpClient = new FTPClient();

        try
        {
            // connect to server
            ftpClient.connect(server, port);
            ftpClient.login(user, pass);

            // define connection details
            ftpClient.enterLocalPassiveMode();
            ftpClient.setFileType(FTP.ASCII_FILE_TYPE);

            // initialize pointer to local file
            File LocalFile = new File(MyApp.getContext().getFilesDir().getAbsolutePath() + '/' + filename);

            // define remote file name
            String RemoteFile = filename;

            // initialize output stream to file
            OutputStream outputStream = new BufferedOutputStream(new FileOutputStream(LocalFile));

            // try download
            boolean success = ftpClient.retrieveFile(RemoteFile, outputStream);

            // terminate output stream
            outputStream.close();

            // log download result
            if (success)    { Log.v("USERLOG","File has been downloaded successfully"); }
            else            { Log.e("USERLOG","File not downloaded"); }

            // read file
            Log.v("USERLOG", MainActivity.readFromFile(MyApp.getContext(), filename));

        }
        catch (IOException ex)
        {
            // Log connection errors
            Log.e("USERLOG", "FTP connection error: " + ex.getMessage());
            ex.printStackTrace();
        }
        finally
        {
            // close FTP connection
            try
            {
                if (ftpClient.isConnected())
                {
                    ftpClient.logout();
                    ftpClient.disconnect();
                }
            }
            catch (IOException ex)
            {
                // log disconnection errors
                Log.e("USERLOG", "FTP disconnection error: " + ex.getMessage());
                ex.printStackTrace();
            }
        }

        return ftpClient;
    }
}