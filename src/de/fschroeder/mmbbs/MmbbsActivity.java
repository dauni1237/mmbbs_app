package de.fschroeder.mmbbs;

import org.apache.cordova.*;
import de.fschroeder.mmbbs.R;

import android.os.Bundle;

public class MmbbsActivity extends DroidGap {
    /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        super.setIntegerProperty("splashscreen", R.drawable.splash);
        super.loadUrl("file:///android_asset/www/index.html",2000);
        
        
    }
}