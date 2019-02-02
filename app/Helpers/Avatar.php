<?php
namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Imgur;

class Avatar
{
    # Upload to server
    public static function imageUploadProfile($request, $user)
    {
        $file = $request->file('img');

        if (!$file) {
            Log::error('cannot find the upload file');
            return null;
        }

        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(!File::exists(public_path('/image/avatar'))) {
            File::makeDirectory(public_path('/image/avatar'), $mode = 0777, true, true);
        }

        try {
            $imageName = $user->id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('image/avatar'), $imageName);
            return '/image/avatar/'.$imageName;
        } catch (\Exception $e) {
            Log::error($e);
            return null;
        }
    }

    # Upload to IMGUR
    public static function imgurlUploadProfile($request)
    {
        $file = $request->file('img');

        if (!$file) {
            Log::error('cannot find the upload file');
            return null;
        }

        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $img = Imgur::upload($file);

        return $img->link();
    }
}