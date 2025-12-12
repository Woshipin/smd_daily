<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Winbox\FootballController;
use App\Http\Controllers\Winbox\HorseController;
use App\Http\Controllers\Winbox\WinboxJackpotController;
use App\Http\Controllers\Winbox\LuckyJackpotController;
use App\Http\Controllers\Winbox\MaintainController;

Route::get('/', function () {
    return view('home');
});

// --------------------------------------------------------------------------------- All Football Routes ---------------------------------------------------------------------- //
// --------------------------------------------------------------------- my-th-football status 0 --------------------------------------------------------------------- //
// my-Football 0 round status 0
Route::get('/my-football', [FootballController::class, 'getMyFootball']);
// th-Football 0 round status 0
Route::get('/th-football', [FootballController::class, 'getThFootball']);

// --------------------------------------------------------------------- my-th-football status 1 Routes --------------------------------------------------------------------- //
// my-football 1-5 round status 1
Route::get('/my-football-1', [FootballController::class, 'getMyFootballData1'])->name('my-football-1.data');
// th-football 1-5 round status 2
Route::get('/th-football-1', [FootballController::class, 'getThFootballData1'])->name('th-football-1.data');

// --------------------------------------------------------------------- my-th-football status 2 Routes --------------------------------------------------------------------- //
// my-football 1-5 round status 1
Route::get('/my-football-2', [FootballController::class, 'getMyFootballData2'])->name('my-football-2.data');
// th-football 1-5 round status 2
Route::get('/th-football-2', [FootballController::class, 'getThFootballData2'])->name('th-football-2.data');

// --------------------------------------------------------------------------------- All Horse Routes ---------------------------------------------------------------------- //
// --------------------------------------------------------------------- my-usd-horse Routes --------------------------------------------------------------------- //
// my-usd-horse 0 round status 0
Route::get('/my-usd-horse', [HorseController::class, 'getMyUsdHorse']);
// my-usd-horse 1-5 round status 1
Route::get('/my-usd-horse-1', [HorseController::class, 'getMyUsdHorse1']);
// my-usd-horse 1-5 round status 2
Route::get('/my-usd-horse-2', [HorseController::class, 'getMyUsdHorse2']);

// --------------------------------------------------------------------- my-horse Routes --------------------------------------------------------------------- //
// my-horse 0 round status 0
Route::get('/my-horse', [HorseController::class, 'getMyHorse']);
// my-horse 1-5 round status 1
Route::get('/my-horse-1', [HorseController::class, 'getMyHorse1']);
// my-horse 1-5 round status 2
Route::get('/my-horse-2', [HorseController::class, 'getMyHorse2']);

// --------------------------------------------------------------------- th-usd-horse Routes --------------------------------------------------------------------- //
// th-usd-horse 0 round status 0
Route::get('/th-usd-horse', [HorseController::class, 'getThUsdHorse']);
// th-usd-horse 1-5 round status 1
Route::get('/th-usd-horse-1', [HorseController::class, 'getThUsdHorse1']);
// th-usd-horse 1-5 round status 2
Route::get('/th-usd-horse-2', [HorseController::class, 'getThUsdHorse2']);

// --------------------------------------------------------------------- th-horse Routes --------------------------------------------------------------------- //
// th-horse 0 round status 0
Route::get('/th-horse', [HorseController::class, 'getThHorse']);
// th-horse 1-5 round status 1
Route::get('/th-horse-1', [HorseController::class, 'getThHorse1']);
// th-horse 1-5 round status 2
Route::get('/th-horse-2', [HorseController::class, 'getThHorse2']);

// --------------------------------------------------------------------------------- All Winbox Jackpot Routes ---------------------------------------------------------------------- //
// --------------------------------------------------------------------- myr-thb-Winbox-Jackpot --------------------------------------------------------------------------- //
// myr-Jackpot
Route::get('/myr-winbox-jackpot', [WinboxJackpotController::class, 'getMyrWinboxJackpot']);
// myr-usd-Jackpot
Route::get('/myr-usd-winbox-jackpot', [WinboxJackpotController::class, 'getMyrUsdWinboxJackpot']);

// thb-Jackpot
Route::get('/thb-winbox-jackpot', [WinboxJackpotController::class, 'getThbWinboxJackpot']);
// thb-usd-Jackpot
Route::get('/thb-usd-winbox-jackpot', [WinboxJackpotController::class, 'getThbUsdWinboxJackpot']);

// --------------------------------------------------------------------------------- All Lucky Jackpot Routes ---------------------------------------------------------------------- //
// --------------------------------------------------------------------- myr-th-Lucky-Jackpot ----------------------------------------------------------------------------- //
// myr-Jackpot 
Route::get('/myr-lucky-jackpot', [LuckyJackpotController::class, 'getMyrLuckyJackpot']);
// myr-usd-Jackpot 
Route::get('/myr-usd-lucky-jackpot', [LuckyJackpotController::class, 'getMyrUsdLuckyJackpot']);
// th-Jackpot 
Route::get('/th-lucky-jackpot', [LuckyJackpotController::class, 'getThLuckyJackpot']);
// th-usd-Jackpot 
Route::get('/th-usd-lucky-jackpot', [LuckyJackpotController::class, 'getThUsdLuckyJackpot']);

// --------------------------------------------------------------------------------- All Maintain Routes ---------------------------------------------------------------------- //
// --------------------------------------------------------------------- myr-th-Lucky-Jackpot ----------------------------------------------------------------------------- //
// myr-Jackpot 0 round
Route::get('/myr-maintain', [MaintainController::class, 'getMyrMaintain']);
// th-Jackpot 0 round
Route::get('/th-maintain', [MaintainController::class, 'getThMaintain']);

// myr-Jackpot 0 round 
Route::get('/myr-usd-maintain', [MaintainController::class, 'getMyrUsdMaintain']);
// th-Jackpot 0 round 
Route::get('/th-usd-maintain', [MaintainController::class, 'getThUsdMaintain']);