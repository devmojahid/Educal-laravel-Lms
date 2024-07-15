<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\SidebarInfo;
use Intervention\Image\Facades\Image;
use App\Models\Payout;
use Exception;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:general-setting', ['only' => ['generalSetting']]);
        $this->middleware('permission:smtp-setting', ['only' => ['smtpSetting', 'smtpSettingUpdate']]);
        $this->middleware('permission:sidebar-setting', ['only' => ['sidebarSetting', 'sidebarSettingUpdate']]);
    }
    public function generalSetting()
    {
        return view('backend.setting.general-setting');
    }

    public function smtpSetting()
    {
        return view('backend.setting.smtp-setting');
    }

    public function smtpSettingUpdate(Request $request)
    {
        $data = $request->validate([
            'mail_mailer' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'required',
            'mail_from_address' => 'required',
            'mail_from_name' => 'required',
        ]);

        $env = [
            'MAIL_MAILER' => $data['mail_mailer'],
            'MAIL_HOST' => $data['mail_host'],
            'MAIL_PORT' => $data['mail_port'],
            'MAIL_USERNAME' => $data['mail_username'],
            'MAIL_PASSWORD' => '"' . $data['mail_password'] . '"',
            'MAIL_ENCRYPTION' => $data['mail_encryption'],
            'MAIL_FROM_ADDRESS' => $data['mail_from_address'],
            'MAIL_FROM_NAME' => $data['mail_from_name'],
        ];

        $envFile = app()->environmentFilePath();

        $str = file_get_contents($envFile);

        if (count($env) > 0) {
            foreach ($env as $envKey => $envValue) {
                $str .= "\n";
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
            }
        }

        $fp = fopen($envFile, 'w');
        fwrite($fp, $str);
        fclose($fp);
        Artisan::call('config:clear');


        return redirect()->back()->with('success', 'SMTP Setting Updated Successfully');
    }

    public function sidebarSetting()
    {
        $sidebarInfo = SidebarInfo::first();
        return view('backend.setting.sidebar-setting', compact('sidebarInfo'));
    }

    public function sidebarSettingUpdate(Request $request)
    {
        $sidebarInfo = SidebarInfo::first();
        if ($sidebarInfo != null) {
            if ($request->hasFile('banner_image')) {
                $image = $request->file('banner_image');
                $image_name =  '/uploads/banner/' . time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/banner');
                $image->move($destinationPath, $image_name);
                $sidebarInfo->banner_image = $image_name;
            }
            $sidebarInfo->search = $request->search ?? "off";
            $sidebarInfo->category = $request->category ?? "off";
            $sidebarInfo->tag = $request->tag ?? "off";
            $sidebarInfo->recent_post = $request->recent_post ?? "off";
            $sidebarInfo->popular_post = $request->popular_post ?? "off";
            $sidebarInfo->recent_comment = $request->recent_comment ?? "off";
            $sidebarInfo->archives = $request->archives ?? "off";
            $sidebarInfo->banner = $request->banner ?? "off";
            $sidebarInfo->category_title = $request->category_title;
            $sidebarInfo->category_count = $request->category_count;
            $sidebarInfo->tag_title = $request->tag_title;
            $sidebarInfo->tag_count = $request->tag_count;
            $sidebarInfo->recent_post_title = $request->recent_post_title;
            $sidebarInfo->recent_post_count = $request->recent_post_count;
            $sidebarInfo->popular_post_title = $request->popular_post_title;
            $sidebarInfo->popular_post_count = $request->popular_post_count;
            $sidebarInfo->recent_comment_title = $request->recent_comment_title;
            $sidebarInfo->recent_comment_count = $request->recent_comment_count;
            $sidebarInfo->banner_title = $request->banner_title;
            $sidebarInfo->banner_link = $request->banner_link;
            $sidebarInfo->save();
            return redirect()->back()->with('success', 'Sidebar Setting Updated Successfully');
        } else {
            $sidebarInfo = new SidebarInfo;
            $image = $request->file('banner_image');
            $path = 'uploads/banner/';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            if ($image != null && $request->hasFile('banner_image')) {
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 252)->save($path . $image_name);
                $sidebarInfo->banner_image = $path . $image_name;
            } else {
                $sidebarInfo->banner_image = 'uploads/banner/banner.jpg';
            }

            $sidebarInfo->search = $request->search ?? "off";
            $sidebarInfo->category = $request->category ?? "off";
            $sidebarInfo->tag = $request->tag ?? "off";
            $sidebarInfo->recent_post = $request->recent_post ?? "off";
            $sidebarInfo->popular_post = $request->popular_post ?? "off";
            $sidebarInfo->recent_comment = $request->recent_comment ?? "off";
            $sidebarInfo->archives = $request->archives ?? "off";
            $sidebarInfo->banner = $request->banner ?? "off";
            $sidebarInfo->category_title = $request->category_title;
            $sidebarInfo->category_count = $request->category_count;
            $sidebarInfo->tag_title = $request->tag_title;
            $sidebarInfo->tag_count = $request->tag_count;
            $sidebarInfo->recent_post_title = $request->recent_post_title;
            $sidebarInfo->recent_post_count = $request->recent_post_count;
            $sidebarInfo->popular_post_title = $request->popular_post_title;
            $sidebarInfo->popular_post_count = $request->popular_post_count;
            $sidebarInfo->recent_comment_title = $request->recent_comment_title;
            $sidebarInfo->recent_comment_count = $request->recent_comment_count;
            $sidebarInfo->banner_title = $request->banner_title;
            $sidebarInfo->banner_link = $request->banner_link;
            $sidebarInfo->save();
            return redirect()->back()->with('success', 'Sidebar Setting Updated Successfully');
        }
    }

    public function payoutSettings()
    {
        $payout = Payout::where('user_id', auth()->user()->id)->first();
        return view('backend.setting.payout-info', compact('payout'));
    }

    public function payoutSettingsUpdate(Request $request)
    {
        $data = $request->validate([
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'account_holder_name' => 'required',
            'account_number' => 'required',
        ]);

        $payout = Payout::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'payment_method' => $request->payment_method ?? 'bank',
                'bank_name' => $data['bank_name'],
                'bank_branch' => $data['bank_branch'],
                'account_holder_name' => $data['account_holder_name'],
                'account_number' => $data['account_number'],
                'routing_number' => $request->routing_number ?? '',
                'swift_code' => $request->swift_code ?? '',
                'bank_passcode' => $request->bank_passcode ?? '',
                'status' => 'pending',
            ]
        );

        return redirect()->back()->with('success', 'Payout Setting Updated Successfully');
    }
}