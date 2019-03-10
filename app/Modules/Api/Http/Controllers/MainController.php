<?php

namespace App\Modules\Api\Http\Controllers;

use App\Model\Contests;
use App\Model\UserRecord;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class MainController extends ApiController
{
    // Danh sach de thi hien co
    public function index(Request $request) {
        $user = $this->get_user($request);
        $user_info_data = $this->get_user_info($request);

        $contests = Contests::all();

        $data['user'] = $user_info_data;

        $contest_data = [];
        foreach ($contests as $item) {
            $took = UserRecord::isTookTheContest($user->id, $item->id);

            $temp = [
                'id' => $item->id,
                'name' => $item->title,
                'date' => $item->date,
                'question' => $item->questions->count(),
                'is_took' => $took,
                'result' => $item->get_user_log($user->id)
            ];

            array_push($contest_data, $temp);
        }

        $data['contest'] = $contest_data;

        return response()->json($data);
    }
}
