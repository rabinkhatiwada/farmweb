<?php
namespace App;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;




class Helper{

    //key=>title plural,singular,has_sort_description,has_long_description,extras=[],show image
    //extra type,name,col-md,title
    public const blogTypes=[
        'blog'=>['Blogs','Blog',false,true,[],true],
        'notice'=>['Notices','Notice',true,false,[
            ['file','extra_file','3','Notice File']
        ],true],
        'faq'=>['Faq', 'FAQ',true, false,[],false],
        'brand' => ['Brands', 'Brand', false, false, [], true],
        'team' => ['Teams', 'Team', true, false, [
        ['text', 'facebook', '3', 'Facebook Link'],
        ['text', 'twitter', '3', 'Twitter Link'],
        ['text', 'linkedin', '3', 'LinkedIn Link']
    ], true],
    'service' => [
        'Services', 'Service', true, true, [], true
    ],
    'objective' => [
        'Objectives', 'Objective', true, false, [
        ], true
    ],
    'feature' => [
        'Features', 'Feature', true, false, [
        ], true
    ],
    'management' => [
        'Managements', 'Management', false, true, [],
        true
    ]






    ];



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



    public static function getHomePageSetting(){
        return (object)[

            'logo'=>self::getSetting('header_logo')??'',
            'favicon'=>self::getSetting('web_favicon')??'',
            'webtitle' => self::getSetting('web_title') ?? '',
            'metadesc' => self::getSetting('meta_description') ?? '',



            //section 1
            'heading1' => self::getSetting('home_heading1') ?? '',
            'heading2' => self::getSetting('home_heading2') ?? '',
            'h_phone' => self::getSetting('header_phone') ?? '',
            'buttontext1' => self::getSetting('home_buttontext1') ?? '',
            'buttonlink1' => self::getSetting('home_buttonlink1') ?? '',


            'galleryheading1' => self::getSetting('gallery_heading1') ?? '',
            'galleryheading2' => self::getSetting('gallery_heading2') ?? '',

            'newsletterheading' => self::getSetting('news_letter_heading') ?? '',
            'videourl' => self::getSetting('video_url') ?? '',

            //faq
            'faqheading' => self::getSetting('faq_heading') ?? '',
            'faqdesc' => self::getSetting('faq_desc') ?? '',


        ];
    }
    public static function getAboutPageSettings()
{
    return (object)[
        'bgimage' => self::getSetting('about_bg_image') ?? '',
        'heading1' => self::getSetting('about_heading1') ?? '',
        'desc1' => self::getSetting('about_desc1') ?? '',
        'aboutimage1' => self::getSetting('about_image1') ?? '',
        'aboutimage2' => self::getSetting('about_image2') ?? '',
        'heading2' => self::getSetting('about_heading2') ?? '',
        'desc2' => self::getSetting('about_desc2') ?? '',
    ];
}




    public static function getContactPageSetting(){
        return (object)[
            'bgimage' => self::getSetting('contact_bg_image') ?? '',
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
            'copyright' => self::getSetting('footer_copyright'),


        ];
    }


    public static function getServicePageSetting(){
        return (object)[
            'bgimage' => self::getSetting('service_bg_image') ?? '',
            'heading1' => self::getSetting('service_heading1') ?? '',
            'heading2' => self::getSetting('service_heading2') ?? '',

        ];

    }

    public static function getBlogPageSetting(){
        return (object)[
            'bgimage' => self::getSetting('blog_bg_image') ?? '',


        ];

    }

}
