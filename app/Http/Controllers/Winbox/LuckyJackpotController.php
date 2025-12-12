<?php

namespace App\Http\Controllers\Winbox;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LuckyMyrJackpot;
use App\Models\LuckyMyrJackpotInformationZh;
use App\Models\LuckyMyrJackpotInformationEn;
use App\Models\LuckyMyrUsdJackpot;
use App\Models\LuckyMyrUsdJackpotInformationZh;
use App\Models\LuckyMyrUsdJackpotInformationEn;
use App\Models\LuckyThJackpot;
use App\Models\LuckyThJackpotInformationTh;
use App\Models\LuckyThJackpotInformationEn;
use App\Models\LuckyThUsdJackpot;
use App\Models\LuckyThUsdJackpotInformationTh;
use App\Models\LuckyThUsdJackpotInformationEn;

class LuckyJackpotController extends Controller
{
    public function getMyrLuckyJackpot()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序选
        $jackpots = LuckyMyrJackpot::all();

        $jackpotInformationZh = LuckyMyrJackpotInformationZh::all();

        $jackpotInformationEn = LuckyMyrJackpotInformationEn::all();

        return view('winbox.lucky-jackpot.myr-lucky-jackpot', compact('jackpots', 'jackpotInformationZh', 'jackpotInformationEn'));
    }

    public function getMyrUsdLuckyJackpot()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序选
        $jackpots = LuckyMyrUsdJackpot::all();

        $jackpotInformationZh = LuckyMyrUsdJackpotInformationZh::all();

        $jackpotInformationEn = LuckyMyrUsdJackpotInformationEn::all();

        return view('winbox.lucky-jackpot.myr-usd-lucky-jackpot', compact('jackpots', 'jackpotInformationZh', 'jackpotInformationEn'));
    }

    public function getThLuckyJackpot()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序选
        $jackpots = LuckyThJackpot::all();

        $jackpotInformationZh = LuckyThJackpotInformationTh::all();

        $jackpotInformationEn = LuckyThJackpotInformationEn::all();

        return view('winbox.lucky-jackpot.th-lucky-jackpot', compact('jackpots', 'jackpotInformationZh', 'jackpotInformationEn'));
    }

    public function getThUsdLuckyJackpot()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序选
        $jackpots = LuckyThUsdJackpot::all();

        $jackpotInformationZh = LuckyThUsdJackpotInformationTh::all();

        $jackpotInformationEn = LuckyThUsdJackpotInformationEn::all();

        return view('winbox.lucky-jackpot.th-usd-lucky-jackpot', compact('jackpots', 'jackpotInformationZh', 'jackpotInformationEn'));
    }
}
