<?php

namespace App\Http\Controllers\Atas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AtasMyFootball1;
use App\Models\AtasMyFootballInformation1;
use App\Models\AtasMyFootball2;
use App\Models\AtasMyFootballInformation2;


class AtasFootballController extends Controller
{
    public function getMyFootball()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        return view('atas.football.my-football');
    }

    public function getThFootball()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        return view('atas.football.th-football');
    }

    public function getMyFootballData1()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $matches = AtasMyFootball1::all();

        // 直接從資料庫中獲取所有描述資料，不進行任何排序
        $descriptions = AtasMyFootballInformation1::all();

        // 回傳 view，並附上比賽和描述的資料
        return view('atas.football.my-football-1', [
            'matches'      => $matches,
            'descriptions' => $descriptions,
        ]);
    }

    public function getMyFootballData2()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $matches = AtasMyFootball2::all();

        // 直接從資料庫中獲取所有描述資料，不進行任何排序
        $descriptions = AtasMyFootballInformation2::all();

        // 回傳 view，並附上比賽和描述的資料
        return view('atas.football.my-football-2', [
            'matches'      => $matches,
            'descriptions' => $descriptions,
        ]);
    }
}
