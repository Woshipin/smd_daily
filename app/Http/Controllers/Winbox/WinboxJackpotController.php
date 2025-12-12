<?php

namespace App\Http\Controllers\Winbox;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WinboxMyrJackpot;
use App\Models\WinboxMyrJackpotInformationZh;
use App\Models\WinboxMyrJackpotInformationEn;
use App\Models\WinboxMyrUsdJackpot;
use App\Models\WinboxMyrUsdJackpotInformationZh;
use App\Models\WinboxMyrUsdJackpotInformationEn;
use App\Models\WinboxThbJackpot;
use App\Models\WinboxThbJackpotInformationTh;
use App\Models\WinboxThbJackpotInformationEn;
use App\Models\WinboxThbUsdJackpot;
use App\Models\WinboxThbUsdJackpotInformationTh;
use App\Models\WinboxThbUsdJackpotInformationEn;

class WinboxJackpotController extends Controller
{
    public function getMyrWinboxJackpot()
    {
        // 直接获取全部数据，不进行任何排序或筛选
        $jackpots = WinboxMyrJackpot::all();

        $jackpotInformationZh = WinboxMyrJackpotInformationZh::all();

        $jackpotInformationEn = WinboxMyrJackpotInformationEn::all();

        return view('winbox.winbox-jackpot.myr-winbox-jackpot', compact('jackpots', 'jackpotInformationZh', 'jackpotInformationEn'));
    }

    public function getMyrUsdWinboxJackpot()
    {
        // 直接获取全部数据，不进行任何排序或筛选
        $jackpots = WinboxMyrUsdJackpot::all();

        $jackpotInformationZh = WinboxMyrUsdJackpotInformationZh::all();

        $jackpotInformationEn = WinboxMyrUsdJackpotInformationEn::all();

        return view('winbox.winbox-jackpot.myr-usd-winbox-jackpot', compact('jackpots', 'jackpotInformationZh', 'jackpotInformationEn'));
    }

    public function getThbWinboxJackpot()
    {
        // 直接获取全部数据，不进行任何排序或筛选
        $jackpots = WinboxThbJackpot::all();

        $jackpotInformationTh = WinboxThbJackpotInformationTh::all();

        $jackpotInformationEn = WinboxThbJackpotInformationEn::all();

        return view('winbox.winbox-jackpot.thb-winbox-jackpot', compact('jackpots', 'jackpotInformationTh', 'jackpotInformationEn'));
    }

    public function getThbUsdWinboxJackpot()
    {
        // 直接获取全部数据，不进行任何排序或筛选
        $jackpots = WinboxThbUsdJackpot::all();

        $jackpotInformationTh = WinboxThbUsdJackpotInformationTh::all();

        $jackpotInformationEn = WinboxThbUsdJackpotInformationEn::all();

        return view('winbox.winbox-jackpot.thb-usd-winbox-jackpot', compact('jackpots', 'jackpotInformationTh', 'jackpotInformationEn'));
    }
}
