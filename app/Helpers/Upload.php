<?php
namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

use Imgur;

class Upload {
    public static $question_path = '/image/questions';
    public static $answer_path = '/image/answers';

    public static function questionImageUpload($request, $question) {
        $file = $request->file('question_img');

        if (!$file) {
            Log::error('cannot find the upload file');
            return null;
        }

        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(!File::exists(public_path(self::$question_path))) {
            File::makeDirectory(public_path(self::$question_path), $mode = 0777, true, true);
        }

        $name = $question->id."-".$question->contest->id;

        try {
            $imageName = $name.'.'.$file->getClientOriginalExtension();
            $file->move(public_path(self::$question_path), $imageName);
            return self::$question_path.$imageName;
        } catch (\Exception $e) {
            Log::error($e);
            return null;
        }
    }

    public static function answerImageUpload($request, $answer) {
        $file = $request->file('answer_img');
        if (!$file) {
            Log::error('cannot find the upload file');
            return null;
        }

        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(!File::exists(public_path(self::$answer_path))) {
            File::makeDirectory(public_path(self::$answer_path), $mode = 0777, true, true);
        }

        $name = $answer->id."-".$answer->question->id."-".$answer->contest->id;

        try {
            $imageName = $name.'.'.$file->getClientOriginalExtension();
            $file->move(public_path(self::$answer_path), $imageName);
            return self::$answer_path.$imageName;
        } catch (\Exception $e) {
            Log::error($e);
            return null;
        }
    }

    public static function questionImgurUpload($request) {
        $file = $request->file('question_img');
        if (!$file) {
            return null;
        }

        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $img = Imgur::upload($file);

        return $img->link();
    }

    public static function answerImgurUpload($request) {
        $file = $request->file('answer_img');
        if (!$file) {
            return null;
        }

        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $img = Imgur::upload($file);

        return $img->link();
    }
}