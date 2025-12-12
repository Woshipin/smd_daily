<?php

namespace App\Http\Controllers\Winbox;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WinboxMyHorse1;
use App\Models\WinboxMyHorseInformation1;
use App\Models\WinboxMyHorse2;
use App\Models\WinboxMyHorseInformation2;
use App\Models\WinboxThHorse1;
use App\Models\WinboxThHorseInformation1;
use App\Models\WinboxThHorse2;
use App\Models\WinboxThHorseInformation2;
use App\Models\WinboxMyUsdHorse1;
use App\Models\WinboxMyUsdHorseInformation1;
use App\Models\WinboxMyUsdHorse2;
use App\Models\WinboxMyUsdHorseInformation2;
use App\Models\WinboxThUsdHorse1;
use App\Models\WinboxThUsdHorseInformation1;
use App\Models\WinboxThUsdHorse2;
use App\Models\WinboxThUsdHorseInformation2;


class HorseController extends Controller
{

    // ------------------------------------------------------- my-usd-horse route 0-2 ------------------------------------------------------- //
    public function getMyUsdHorse()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        return view('winbox.horse.my-usd-horse');
    }

    public function getMyUsdHorse1()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $myusdhorse1 = WinboxMyUsdHorse1::all();

        // 直接從資料庫中獲取所有描述資料，不進行任何排序
        $myusdhorse1descriptions = WinboxMyUsdHorseInformation1::all();

        // 回傳 view，並附上比賽和描述的資料
        return view('winbox.horse.my-usd-horse-1', [
            'myusdhorse1'      => $myusdhorse1,
            'myusdhorse1descriptions' => $myusdhorse1descriptions,
        ]);
    }

    public function getMyUsdHorse2()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $myusdhorse2 = WinboxMyUsdHorse2::all();

        // 直接從資料庫中獲取所有描述資料，不進行任何排序
        $myusdhorse2descriptions = WinboxMyUsdHorseInformation2::all();

        // 回傳 view，並附上比賽和描述的資料
        return view('winbox.horse.my-usd-horse-2', [
            'myusdhorse2'      => $myusdhorse2,
            'myusdhorse2descriptions' => $myusdhorse2descriptions,
        ]);
    }

    // ------------------------------------------------------- my-horse route 0-2 ------------------------------------------------------- //
    public function getMyHorse()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        return view('winbox.horse.my-horse');
    }

    public function getMyHorse1()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $myhorse1 = WinboxMyHorse1::all();

        // 直接從資料庫中獲取所有描述資料，不進行任何排序
        $myhorse1descriptions = WinboxMyHorseInformation1::all();

        // 回傳 view，並附上比賽和描述的資料
        return view('winbox.horse.my-horse-1', [
            'myhorse1'      => $myhorse1,
            'myhorse1descriptions' => $myhorse1descriptions,
        ]);

    }

    public function getMyHorse2()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $myhorse2 = WinboxMyHorse2::all();

        // 直接從資料庫中獲取所有描述資料，不進行任何排序
        $myhorse2descriptions = WinboxMyHorseInformation2::all();
        
        // 回傳 view，並附上比賽和描述的資料
        return view('winbox.horse.my-horse-2', [
            'myhorse2'      => $myhorse2,
            'myhorse2descriptions' => $myhorse2descriptions,
        ]);
    }

    // ------------------------------------------------------- th-usd-horse route 0-2 ------------------------------------------------------- //
    public function getThUsdHorse()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        return view('winbox.horse.th-usd-horse');
    }

    public function getThUsdHorse1()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $thusdhorse1 = WinboxThUsdHorse1::all();

        // 直接從資料庫中獲取所有描述資料，不進行任何排序
        $thusdhorse1descriptions = WinboxThUsdHorseInformation1::all();

        // 回傳 view，並附上比賽和描述的資料
        return view('winbox.horse.th-usd-horse-1', [
            'thusdhorse1'      => $thusdhorse1,
            'thusdhorse1descriptions' => $thusdhorse1descriptions,
        ]);
    }

    public function getThUsdHorse2()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $thusdhorse2 = WinboxThUsdHorse2::all();

        // 直接從資料庫中獲取所有描述資料，不進行任何排序
        $thusdhorse2descriptions = WinboxThUsdHorseInformation2::all();

        // 回傳 view，並附上比賽和描述的資料
        return view('winbox.horse.th-usd-horse-2', [
            'thusdhorse2'      => $thusdhorse2,
            'thusdhorse2descriptions' => $thusdhorse2descriptions,
        ]);
    }

    // ------------------------------------------------------- th-horse route 0-2 ------------------------------------------------------- //
    public function getThHorse()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        return view('winbox.horse.th-horse');
    }

    public function getThHorse1()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $thhorse1 = WinboxThHorse1::all();

        // 直接從資料庫中獲取所有描述資料，不進行任何排序
        $thhorse1descriptions = WinboxThHorseInformation1::all();

        // 回傳 view，並附上比賽和描述的資料
        return view('winbox.horse.th-horse-1', [
            'thhorse1'      => $thhorse1,
            'thhorse1descriptions' => $thhorse1descriptions,
        ]);

    }

    public function getThHorse2()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $thhorse2 = WinboxThHorse2::all();

        // 直接從資料庫中獲取所有描述資料，不進行任何排序
        $thhorse2descriptions = WinboxThHorseInformation2::all();
        
        // 回傳 view，並附上比賽和描述的資料
        return view('winbox.horse.th-horse-2', [
            'thhorse2'      => $thhorse2,
            'thhorse2descriptions' => $thhorse2descriptions,
        ]);
    }
}
