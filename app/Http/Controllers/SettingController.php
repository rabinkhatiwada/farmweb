<?php

namespace App\Http\Controllers;

use App\Helper;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function contactPage(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = Helper::getContactPageSetting();
            return view('admin.setting.contact', compact('data'));
        } else {
            $contact_heading = $request->heading ?? '';
            $contact_phone = $request->phone ?? '';
            $contact_email = $request->email ?? '';
            $contact_address = $request->address?? '';
            $contact_location = $request->location ?? '';

            Helper::setSetting('contact_heading', $contact_heading);
            Helper::setSetting('contact_phone', $contact_phone);
            Helper::setSetting('contact_email', $contact_email);
            Helper::setSetting('contact_address', $contact_address);
            Helper::setSetting('contact_location', $contact_location);


            $data = Helper::getContactPageSetting();

            return redirect()->back()->with('success', 'Page Updated successfully.');

        }
    }



    public function footerPage(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = Helper::getFooterSetting();
            return view('admin.setting.footer', compact('data'));
        } else {
            if ($request->hasFile('logo')) {
                $imagePath = $request->file('logo')->storeAs('public/images', $request->file('logo')->getClientOriginalName());
                Helper::setSetting('footer_logo', $imagePath);
            }
            $description = $request->description ?? '';
            $phone = $request->phone ?? '';
            $email = $request->email ?? '';
            $address = $request->address ?? '';

            Helper::setSetting('footer_desc', $description);


            $socialLinks = [];
        if ($request->has('social_media')) {
            foreach ($request->social_media as $index => $socialMedia) {
                if (!empty($socialMedia)) {
                    $socialLinks[] = [
                        'name' => $socialMedia,
                        'link' => $request->social_link[$index] ?? '',
                    ];
                }
            }
        }
        Helper::setSetting('footer_social_links', json_encode($socialLinks));

        $quickLinks = [];
        if ($request->has('quick_link_title')) {
            foreach ($request->quick_link_title as $index => $title) {
                if (!empty($title)) {
                    $quickLinks[] = [
                        'title' => $title,
                        'url' => $request->quick_link_url[$index] ?? '',
                    ];
                }
            }
        }
        Helper::setSetting('footer_quick_links', json_encode($quickLinks));

            Helper::setSetting('footer_phone', $phone);
            Helper::setSetting('footer_email', $email);
            Helper::setSetting('footer_address', $address);

            $data = Helper::getFooterSetting();

            return redirect()->back()->with('success', 'Page Updated successfully.');
        }
    }
}
