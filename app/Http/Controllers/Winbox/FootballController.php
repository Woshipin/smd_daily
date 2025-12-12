<?php

namespace App\Http\Controllers\Winbox;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WinboxZhFootball1;
use App\Models\WinboxZhFootballInformation1;
use App\Models\WinboxThFootball1;
use App\Models\WinboxThFootballInformation1;
use App\Models\WinboxZhFootball2;
use App\Models\WinboxZhFootballInformation2;
use App\Models\WinboxThFootball2;
use App\Models\WinboxThFootballInformation2;

class FootballController extends Controller
{

    public function getMyFootball()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        return view('winbox.football.my-football');
    }

    public function getThFootball()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        return view('winbox.football.th-football');
    }

    public function getMyFootballData1()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $matches = WinboxZhFootball1::all();

        // 直接從資料庫中獲取所有描述資料，不進行任何排序
        $descriptions = WinboxZhFootballInformation1::all();

        // 回傳 view，並附上比賽和描述的資料
        return view('winbox.football.my-football-1', [
            'matches'      => $matches,
            'descriptions' => $descriptions,
        ]);
    }

    public function getThFootballData1()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $matches = WinboxThFootball1::all();

        // 直接從資料庫中獲取所有描述資料，不進行任何排序
        $descriptions = WinboxThFootballInformation1::all();

        // 回傳 view，並附上比賽和描述的資料
        return view('winbox.football.th-football-1', [
            'matches'      => $matches,
            'descriptions' => $descriptions,
        ]);
    }

    public function getMyFootballData2()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $matches = WinboxZhFootball2::all();

        // 直接從資料庫中獲取所有描述資料，不進行任何排序
        $descriptions = WinboxZhFootballInformation2::all();

        // 回傳 view，並附上比賽和描述的資料
        return view('winbox.football.my-football-2', [
            'matches'      => $matches,
            'descriptions' => $descriptions,
        ]);
    }

    public function getThFootballData2()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $matches = WinboxThFootball2::all();

        // 直接從資料庫中獲取所有描述資料，不進行任何排序
        $descriptions = WinboxThFootballInformation2::all();

        // 回傳 view，並附上比賽和描述的資料
        return view('winbox.football.th-football-2', [
            'matches'      => $matches,
            'descriptions' => $descriptions,
        ]);
    }
}
