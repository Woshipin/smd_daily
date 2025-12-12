<?php

namespace App\Http\Controllers\Winbox;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WinboxMyrMaintain;
use App\Models\WinboxMyrMaintainInformation1;
use App\Models\WinboxMyrMaintainInformation2;
use App\Models\WinboxMyrMaintainInformationZh;
use App\Models\WinboxMyrMaintainInformationEn;
use App\Models\WinboxMyrUsdMaintain;
use App\Models\WinboxMyrUsdMaintainInformation1;
use App\Models\WinboxMyrUsdMaintainInformation2;
use App\Models\WinboxMyrUsdMaintainInformationZh;
use App\Models\WinboxMyrUsdMaintainInformationEn;
use App\Models\WinboxThMaintain;
use App\Models\WinboxThMaintainInformation1;
use App\Models\WinboxThMaintainInformation2;
use App\Models\WinboxThMaintainInformationTh;
use App\Models\WinboxThMaintainInformationEn;
use App\Models\WinboxThUsdMaintain;
use App\Models\WinboxThUsdMaintainInformation1;
use App\Models\WinboxThUsdMaintainInformation2;
use App\Models\WinboxThUsdMaintainInformationTh;
use App\Models\WinboxThUsdMaintainInformationEn;

class MaintainController extends Controller
{
    public function getMyrMaintain()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $maintainDatas = WinboxMyrMaintain::all();
        $maintainInfos1 = WinboxMyrMaintainInformation1::all();
        $maintainInfos2 = WinboxMyrMaintainInformation2::all();
        $maintainInfoZhs = WinboxMyrMaintainInformationZh::all();
        $maintainInfoEns = WinboxMyrMaintainInformationEn::all();

        return view('winbox.maintain.myr-maintain', compact('maintainDatas', 'maintainInfos1', 'maintainInfos2', 'maintainInfoZhs', 'maintainInfoEns'));
    }

    public function getMyrUsdMaintain()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序
        $maintainDatas = WinboxMyrUsdMaintain::all();
        $maintainInfos1 = WinboxMyrUsdMaintainInformation1::all();
        $maintainInfos2 = WinboxMyrUsdMaintainInformation2::all();
        $maintainInfoZhs = WinboxMyrUsdMaintainInformationZh::all();
        $maintainInfoEns = WinboxMyrUsdMaintainInformationEn::all();

        return view('winbox.maintain.myr-usd-maintain', compact('maintainDatas', 'maintainInfos1', 'maintainInfos2', 'maintainInfoZhs', 'maintainInfoEns'));
    }

    public function getThMaintain()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序

        $maintainDatas = WinboxThMaintain::all();
        $maintainInfos1 = WinboxThMaintainInformation1::all();
        $maintainInfos2 = WinboxThMaintainInformation2::all();
        $maintainInfoThs = WinboxThMaintainInformationTh::all();
        $maintainInfoEns = WinboxThMaintainInformationEn::all();

        return view('winbox.maintain.th-maintain', compact('maintainDatas', 'maintainInfos1', 'maintainInfos2', 'maintainInfoThs', 'maintainInfoEns'));
    }

    public function getThUsdMaintain()
    {
        // 直接從資料庫中獲取所有比賽資料，不進行任何排序

        $maintainDatas = WinboxThUsdMaintain::all();
        $maintainInfos1 = WinboxThUsdMaintainInformation1::all();
        $maintainInfos2 = WinboxThUsdMaintainInformation2::all();
        $maintainInfoThs = WinboxThUsdMaintainInformationTh::all();
        $maintainInfoEns = WinboxThUsdMaintainInformationEn::all();

        return view('winbox.maintain.th-usd-maintain', compact('maintainDatas', 'maintainInfos1', 'maintainInfos2', 'maintainInfoThs', 'maintainInfoEns'));
    }
}
