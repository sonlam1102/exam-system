<?php

namespace App\Modules\Api\Http\Controllers;

use App\Model\Contests;
use App\Model\UserRecord;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class MainController extends ApiController
{
    public function index(Request $request) {
        $user = $this->get_user($request);
        $contests = Contests::all();

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'address' => $user->address,
            'birthday' => $user->birthday,
            'img' => $user->img
        ];

        $contest_data = [];
        foreach ($contests as $item) {
            $took = UserRecord::isTookTheContest($user->id, $item->id);

            $temp = [
                'id' => $item->id,
                'name' => $item->title,
                'date' => $item->date,
                'question' => $item->questions->count(),
                'is_took' => $took
            ];

            array_push($contest_data, $temp);
        }

        $data['contest'] = $contest_data;

        return response()->json($data);
    }
}
