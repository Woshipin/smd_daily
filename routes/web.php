<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Winbox\FootballController;
use App\Http\Controllers\Winbox\HorseController;
use App\Http\Controllers\Winbox\WinboxJackpotController;
use App\Http\Controllers\Winbox\LuckyJackpotController;
use App\Http\Controllers\Winbox\MaintainController;

use App\Http\Controllers\Atas\AtasFootballController;

Route::get('/', function () {
    return view('home');
});


Route::get('/atas-my-football-1', function () {
    return view('atas.football.my-football-1');
});

// --------------------------------------------------------------------------------- Winbox Areas ---------------------------------------------------------------------- //
// --------------------------------------------------------------------------------- All Football Routes --------------------------------------------------------------- //
// --------------------------------------------------------------------- my-th-football status 0 ----------------------------------------------------------------------- //
// my-Football 0 round status 0
Route::get('/winbox-my-football', [FootballController::class, 'getMyFootball']);
// th-Football 0 round status 0
Route::get('/winbox-th-football', [FootballController::class, 'getThFootball']);

// --------------------------------------------------------------------- my-th-football status 1 Routes ---------------------------------------------------------------- //
// my-football 1-5 round status 1
Route::get('/winbox-my-football-1', [FootballController::class, 'getMyFootballData1'])->name('my-football-1.data');
// th-football 1-5 round status 2
Route::get('/winbox-th-football-1', [FootballController::class, 'getThFootballData1'])->name('th-football-1.data');

// --------------------------------------------------------------------- my-th-football status 2 Routes ---------------------------------------------------------------- //
// my-football 1-5 round status 1
Route::get('/winbox-my-football-2', [FootballController::class, 'getMyFootballData2'])->name('my-football-2.data');
// th-football 1-5 round status 2
Route::get('/winbox-th-football-2', [FootballController::class, 'getThFootballData2'])->name('th-football-2.data');

// --------------------------------------------------------------------------------- All Horse Routes ------------------------------------------------------------------ //
// --------------------------------------------------------------------- my-usd-horse Routes --------------------------------------------------------------------------- //
// my-usd-horse 0 round status 0
Route::get('/winbox-my-usd-horse', [HorseController::class, 'getMyUsdHorse']);
// my-usd-horse 1-5 round status 1
Route::get('/winbox-my-usd-horse-1', [HorseController::class, 'getMyUsdHorse1']);
// my-usd-horse 1-5 round status 2
Route::get('/winbox-my-usd-horse-2', [HorseController::class, 'getMyUsdHorse2']);

// --------------------------------------------------------------------- my-horse Routes ------------------------------------------------------------------------------- //
// my-horse 0 round status 0
Route::get('/winbox-my-horse', [HorseController::class, 'getMyHorse']);
// my-horse 1-5 round status 1
Route::get('/winbox-my-horse-1', [HorseController::class, 'getMyHorse1']);
// my-horse 1-5 round status 2
Route::get('/winbox-my-horse-2', [HorseController::class, 'getMyHorse2']);

// --------------------------------------------------------------------- th-usd-horse Routes --------------------------------------------------------------------------- //
// th-usd-horse 0 round status 0
Route::get('/winbox-th-usd-horse', [HorseController::class, 'getThUsdHorse']);
// th-usd-horse 1-5 round status 1
Route::get('/winbox-th-usd-horse-1', [HorseController::class, 'getThUsdHorse1']);
// th-usd-horse 1-5 round status 2
Route::get('/winbox-th-usd-horse-2', [HorseController::class, 'getThUsdHorse2']);

// --------------------------------------------------------------------- th-horse Routes ------------------------------------------------------------------------------- //
// th-horse 0 round status 0
Route::get('/winbox-th-horse', [HorseController::class, 'getThHorse']);
// th-horse 1-5 round status 1
Route::get('/winbox-th-horse-1', [HorseController::class, 'getThHorse1']);
// th-horse 1-5 round status 2
Route::get('/winbox-th-horse-2', [HorseController::class, 'getThHorse2']);

// --------------------------------------------------------------------- my-horse Routes --------------------------------------------------------------------------- //
// my-horse 0 round status 0
Route::get('/winbox-my-horse-image', [HorseController::class, 'getMyHorseImage1']);

// --------------------------------------------------------------------------------- All Winbox Jackpot Routes --------------------------------------------------------- //
// --------------------------------------------------------------------- myr-thb-Winbox-Jackpot ------------------------------------------------------------------------ //
// myr-Jackpot
Route::get('/winbox-myr-winbox-jackpot', [WinboxJackpotController::class, 'getMyrWinboxJackpot']);
// myr-usd-Jackpot
Route::get('/winbox-myr-usd-winbox-jackpot', [WinboxJackpotController::class, 'getMyrUsdWinboxJackpot']);

// thb-Jackpot
Route::get('/winbox-thb-winbox-jackpot', [WinboxJackpotController::class, 'getThbWinboxJackpot']);
// thb-usd-Jackpot
Route::get('/winbox-thb-usd-winbox-jackpot', [WinboxJackpotController::class, 'getThbUsdWinboxJackpot']);

// --------------------------------------------------------------------------------- All Lucky Jackpot Routes ---------------------------------------------------------- //
// --------------------------------------------------------------------- myr-th-Lucky-Jackpot -------------------------------------------------------------------------- //
// myr-Jackpot
Route::get('/winbox-myr-lucky-jackpot', [LuckyJackpotController::class, 'getMyrLuckyJackpot']);
// myr-usd-Jackpot
Route::get('/winbox-myr-usd-lucky-jackpot', [LuckyJackpotController::class, 'getMyrUsdLuckyJackpot']);
// th-Jackpot
Route::get('/winbox-th-lucky-jackpot', [LuckyJackpotController::class, 'getThLuckyJackpot']);
// th-usd-Jackpot
Route::get('/winbox-th-usd-lucky-jackpot', [LuckyJackpotController::class, 'getThUsdLuckyJackpot']);

// --------------------------------------------------------------------------------- All Maintain Routes --------------------------------------------------------------- //
// --------------------------------------------------------------------- myr-th-Lucky-Jackpot -------------------------------------------------------------------------- //
// myr-Jackpot 0 round
Route::get('/winbox-myr-maintain', [MaintainController::class, 'getMyrMaintain']);
// th-Jackpot 0 round
Route::get('/winbox-th-maintain', [MaintainController::class, 'getThMaintain']);

// myr-Jackpot 0 round
Route::get('/winbox-myr-usd-maintain', [MaintainController::class, 'getMyrUsdMaintain']);
// th-Jackpot 0 round
Route::get('/winbox-th-usd-maintain', [MaintainController::class, 'getThUsdMaintain']);

// --------------------------------------------------------------------------------- Atas Areas ------------------------------------------------------------------------ //
// --------------------------------------------------------------------------------- All Football Routes --------------------------------------------------------------- //
// --------------------------------------------------------------------- my-th-football status 0 ----------------------------------------------------------------------- //
Route::get('/atas-my-football', [AtasFootballController::class, 'getMyFootball']);
// th-Football 0 round status 0
Route::get('/atas-th-football', [AtasFootballController::class, 'getThFootball']);

// --------------------------------------------------------------------- my-th-football status 1 Routes ---------------------------------------------------------------- //
// my-football 1-5 round status 1
Route::get('/atas-my-football-1', [AtasFootballController::class, 'getMyFootballData1'])->name('my-football-1.data');
// th-football 1-5 round status 2
Route::get('/atas-th-football-1', [AtasFootballController::class, 'getThFootballData1'])->name('th-football-1.data');

// --------------------------------------------------------------------- my-th-football status 2 Routes ---------------------------------------------------------------- //
// my-football 1-5 round status 1
Route::get('/atas-my-football-2', [AtasFootballController::class, 'getMyFootballData2'])->name('my-football-2.data');
// th-football 1-5 round status 2
Route::get('/atas-th-football-2', [AtasFootballController::class, 'getThFootballData2'])->name('th-football-2.data');
