<?php
namespace App;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Helper{
    public static function getSetting($key){
        //Cache::rememberForever($key,function()use($key){
            $data= DB::table('settings')->where('key',$key)->first('value');
            if($data){
                return $data->value;
            }



            return '';
       // });
    }

    public static function setSetting($key,$value){
        $data=DB::table('settings')->where('key',$key)->first();
        if($data){
            DB::table('settings')->where('key',$key)->update(['value'=>$value]);
        }else{
           $setting=new Setting();
           $setting->key=$key;
           $setting->value=$value;
           $setting->save();
        }
        Cache::forget($key);
    }






    public static function getContactPageSetting(){
        return (object)[
            'heading' => self::getSetting('contact_heading') ?? '',
            'phone' => self::getSetting('contact_phone') ?? '',
            'email' => self::getSetting('contact_email') ?? '',
            'address' => self::getSetting('contact_address') ?? '',
            'location' => self::getSetting('contact_location') ?? '',


        ];
    }

    public static function getFooterSetting() {
        return (object)[
            'logo' => self::getSetting('footer_logo'),
            'description' => self::getSetting('footer_desc'),
            'social_links' => json_decode(self::getSetting('footer_social_links'), true) ?? [],
            'quick_links' => json_decode(self::getSetting('footer_quick_links'), true) ?? [],
            'phones' => explode(',', self::getSetting('footer_phone')),
            'email' => explode(',', self::getSetting('footer_email')),
            'address' => self::getSetting('footer_address'),
        ];
    }

}
