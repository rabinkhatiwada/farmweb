<?php

namespace App;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Helper
{

    //key=>title plural,singular,has_sort_description,has_long_description,extras=[],show image
    //extra type,name,col-md,title
    public const blogTypes = [
        'blog' => ['Blogs', 'Blog', false, true, [], true],
        'notice' => ['Notices', 'Notice', true, false, [
            ['file', 'extra_file', '3', 'Notice File']
        ], true],
        'faq' => ['Faq', 'FAQ', true, false, [], false],
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
            'Objectives', 'Objective', true, false, [], true
        ],
        'feature' => [
            'Features', 'Feature', true, false, [], true
        ],
        'management' => [
            'Management Page', 'Management', false, true, [],
            true
        ],
        'breeding' => [
            'Breeding Page', 'Breeding', false, true, [],
            true
        ],
        'feeding' => [
            'Feeding Page', 'Feeding', false, true, [],
            true
        ],
        'market' => [
            'Market Page', 'Market', false, true, [],
            true
        ],


    ];



    public static function getSetting($key)
    {
        //Cache::rememberForever($key,function()use($key){
        $data = DB::table('settings')->where('key', $key)->first('value');
        if ($data) {
            return $data->value;
        }



        return '';
        // });
    }



    public static function setSetting($key, $value)
    {
        $data = DB::table('settings')->where('key', $key)->first();
        if ($data) {
            DB::table('settings')->where('key', $key)->update(['value' => $value]);
        } else {
            $setting = new Setting();
            $setting->key = $key;
            $setting->value = $value;
            $setting->save();
        }
        Cache::forget($key);
    }



    public static function getHomePageSetting()
    {
        return (object)[

            'logo' => self::getSetting('header_logo') ?? '',
            'favicon' => self::getSetting('web_favicon') ?? '',
            'webtitle' => self::getSetting('web_title') ?? '',
            'metadesc' => self::getSetting('meta_description') ?? '',






            //section 1
            'heading1' => self::getSetting('home_heading1') ?? '',
            'heading2' => self::getSetting('home_heading2') ?? '',
            'h_phone' => self::getSetting('header_phone') ?? '',
            'buttontext1' => self::getSetting('home_buttontext1') ?? '',
            'buttonlink1' => self::getSetting('home_buttonlink1') ?? '',


            'quick_links' => json_decode(self::getSetting('home_quick_links'), true) ?? [],



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




    public static function getContactPageSetting()
    {
        return (object)[
            'bgimage' => self::getSetting('contact_bg_image') ?? '',
            'heading' => self::getSetting('contact_heading') ?? '',
            'phone' => self::getSetting('contact_phone') ?? '',
            'email' => self::getSetting('contact_email') ?? '',
            'address' => self::getSetting('contact_address') ?? '',
            'location' => self::getSetting('contact_location') ?? '',


        ];
    }

    public static function getFooterSetting()
    {
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


    public static function getServicePageSetting()
    {
        return (object)[
            'bgimage' => self::getSetting('service_bg_image') ?? '',
            'heading1' => self::getSetting('service_heading1') ?? '',
            'heading2' => self::getSetting('service_heading2') ?? '',

        ];
    }
    public static function getOtherPageSetting()
    {
        return (object)[
            'g_image' => self::getSetting('other_g_image') ?? '',

            'b_image' => self::getSetting('other_b_image') ?? '',
            'f_image' => self::getSetting('other_f_image') ?? '',
            'mgmt_image' => self::getSetting('other_mgmt_image') ?? '',
            'm_image' => self::getSetting('other_m_image') ?? '',


        ];
    }


    public static function getBlogPageSetting()
    {
        return (object)[
            'bgimage' => self::getSetting('blog_bg_image') ?? '',
            'blogvideo' => self::getSetting('y_url') ?? '',



        ];
    }
    public static function getYouTubeVideoId($url)
    {
        // Extract video ID from YouTube URL
        parse_str(parse_url($url, PHP_URL_QUERY), $params);
        return $params['v'] ?? null;
    }

    public static function  getAspectRatio($url)
    {
        // Define the API URL
        $apiUrl = 'https://www.youtube.com/oembed?url=' . $url;

        // Make a GET request to the API
        $response = Http::get($apiUrl);

        // Check if the request was successful
        if ($response->successful()) {
            // Decode the JSON data
            $data = $response->json();

            // Extract width and height
            $width = $data['width'];
            $height = $data['height'];

            // Return the extracted data
            return $width . " / " . $height;
        } else {
            // Handle the error
            return '16 / 9';
        }
    }

    //  public static function createThumbnail($sourceFilePath, $destinationDirectory, $maxWidth = 150, $maxHeight = 150)
    //  {
    //      if (!file_exists($sourceFilePath)) {
    //          return false;
    //      }

    //      $fileExtension = strtolower(pathinfo($sourceFilePath, PATHINFO_EXTENSION));
    //      $supportedFormats = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    //      if (!in_array($fileExtension, $supportedFormats)) {
    //          return false;
    //      }

    //      switch ($fileExtension) {
    //          case 'jpg':
    //          case 'jpeg':
    //              $originalImage = imagecreatefromjpeg($sourceFilePath);
    //              break;
    //          case 'png':
    //              $originalImage = imagecreatefrompng($sourceFilePath);
    //              break;
    //          case 'gif':
    //              $originalImage = imagecreatefromgif($sourceFilePath);
    //              break;
    //          case 'webp':
    //              $originalImage = imagecreatefromwebp($sourceFilePath);
    //              break;
    //          default:
    //              return false;
    //      }

    //      $originalWidth = imagesx($originalImage);
    //      $originalHeight = imagesy($originalImage);

    //      if ($originalWidth > $originalHeight) {
    //          $newWidth = $maxWidth;
    //          $newHeight = ($originalHeight / $originalWidth) * $maxWidth;
    //      } else {
    //          $newHeight = $maxHeight;
    //          $newWidth = ($originalWidth / $originalHeight) * $maxHeight;
    //      }

    //      $newImage = imagecreatetruecolor($newWidth, $newHeight);
    //      imagecopyresampled($newImage, $originalImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

    //      $fileNameWithoutExtension = pathinfo($sourceFilePath, PATHINFO_FILENAME);
    //      $thumbnailFileName = $fileNameWithoutExtension . '_thumb.' . $fileExtension;
    //      $retpath = $destinationDirectory . '/' . $thumbnailFileName;
    //      $thumbnailFilePath = public_path($retpath);
    //      dd($thumbnailFilePath);
    //      switch ($fileExtension) {
    //          case 'jpg':
    //          case 'jpeg':
    //              imagejpeg($newImage, $thumbnailFilePath);
    //              break;
    //          case 'png':
    //              imagepng($newImage, $thumbnailFilePath);
    //              break;
    //          case 'gif':
    //              imagegif($newImage, $thumbnailFilePath);
    //              break;
    //          case 'webp':
    //              imagewebp($newImage, $thumbnailFilePath);
    //              break;
    //      }

    //      imagedestroy($originalImage);
    //      imagedestroy($newImage);

    //      return $retpath;
    //  }
     public static function createThumbnail($sourceFilePath, $destinationDirectory, $maxWidth = 150, $maxHeight = 150)
     {
         if (!file_exists($sourceFilePath)) {
             return false;
         }

         $fileExtension = strtolower(pathinfo($sourceFilePath, PATHINFO_EXTENSION));
         $supportedFormats = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

         if (!in_array($fileExtension, $supportedFormats)) {
             return false;
         }

         switch ($fileExtension) {
             case 'jpg':
             case 'jpeg':
                 $originalImage = imagecreatefromjpeg($sourceFilePath);
                 break;
             case 'png':
                 $originalImage = imagecreatefrompng($sourceFilePath);
                 break;
             case 'gif':
                 $originalImage = imagecreatefromgif($sourceFilePath);
                 break;
             case 'webp':
                 $originalImage = imagecreatefromwebp($sourceFilePath);
                 break;
             default:
                 return false;
         }

         $originalWidth = imagesx($originalImage);
         $originalHeight = imagesy($originalImage);

         if ($originalWidth > $originalHeight) {
             $newWidth = $maxWidth;
             $newHeight = ($originalHeight / $originalWidth) * $maxWidth;
         } else {
             $newHeight = $maxHeight;
             $newWidth = ($originalWidth / $originalHeight) * $maxHeight;
         }

         $newImage = imagecreatetruecolor($newWidth, $newHeight);
         imagecopyresampled($newImage, $originalImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

         $fileNameWithoutExtension = pathinfo($sourceFilePath, PATHINFO_FILENAME);
         $thumbnailFileName = $fileNameWithoutExtension . '_thumb.' . $fileExtension;
         $retpath = $destinationDirectory . '/' . $thumbnailFileName;
         $thumbnailFilePath = ($retpath);
    //  dd($thumbnailFilePath);

         switch ($fileExtension) {
             case 'jpg':
             case 'jpeg':
                 imagejpeg($newImage, $thumbnailFilePath);
                 break;
             case 'png':
                 imagepng($newImage, $thumbnailFilePath);
                 break;
             case 'gif':
                 imagegif($newImage, $thumbnailFilePath);
                 break;
             case 'webp':
                 imagewebp($newImage, $thumbnailFilePath);
                 break;
         }

         imagedestroy($originalImage);
         imagedestroy($newImage);
        //   dd($retpath);
        return $retpath;
    }
}
