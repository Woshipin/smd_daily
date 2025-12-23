<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <title>Fully Responsive Football Page</title>

    <style>
        @import url("https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css");

        * {
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0px;
            width: 100%;
            overflow-x: hidden;
            background-color: #0a1628;
            /* 添加平滑滚动 */
            scroll-behavior: smooth;
        }

        a {
            text-decoration: none;
        }

        :root {
            --variable-collection-font: rgba(0, 19, 63, 0.85);
        }

        .element-default {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            background-color: #0a1628;
        }

        .element-default .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            width: 100%;
            flex: 0 0 auto;
        }

        .element-default .margin {
            position: relative;
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .element-default .matches-background {
            display: flex;
            flex-direction: column;
            width: 100%;
            align-items: center;
            gap: 20px;
            padding: 20px 15px;
            position: relative;
            background: linear-gradient(180deg, #4a0d0d 0%, #1a0505 100%);
        }

        .element-default .info-background {
            display: flex;
            flex-direction: column;
            width: 100%;
            align-items: center;
            padding: 40px 20px;
            position: relative;
            background-color: #f8f8f8;
        }

        /* --- CARD DESIGN START --- */

        .match-card-wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
            justify-content: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .league-box {
            background-color: #ffffff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            width: 100px;
            flex-shrink: 0;
            position: relative;
        }

        .league-logo-img {
            width: 100px;
            height: 80px;
            /* max-height: 80px; */
            object-fit: contain;
        }

        .match-info-box {
            flex-grow: 1;
            background: linear-gradient(90deg, #2b0505 0%, #4a0000 50%, #1a0202 100%);
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
            border: 1px solid #5c1818;
        }

        .match-info-box::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(255, 215, 0, 0.2) 0%, rgba(0, 0, 0, 0) 70%);
            pointer-events: none;
        }

        .teams-row {
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 15px 10px 35px 10px;
            width: 100%;
            height: 100%;
        }

        .team-logo-img {
            width: 50px;
            height: 50px;
            object-fit: contain;
            filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.2));
        }

        .vs-badge {
            font-family: "Segoe UI-Black", "Arial Black", Helvetica, sans-serif;
            font-weight: 900;
            font-size: 32px;
            font-style: italic;
            background: linear-gradient(180deg, #FFEFBA 10%, #FFC107 50%, #B8860B 90%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            filter: drop-shadow(0px 2px 0px #5c3a00);
            margin: 0 10px;
            position: relative;
            z-index: 2;
        }

        /* Mobile Style for Date Bar */
        .date-bar {
            position: absolute;
            bottom: 0;
            right: 0;
            left: 5px;
            height: 28px;
            background: linear-gradient(90deg, #FFC107 0%, #F57F17 100%);
            clip-path: polygon(15px 0, 100% 0, 100% 100%, 0 100%);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 15px;
            gap: 15px;
            border-top: 1px solid #ffeeba;
            box-shadow: 0px -2px 10px rgba(0, 0, 0, 0.5);
        }

        .date-text,
        .time-text {
            font-family: "Segoe UI", sans-serif;
            font-weight: 700;
            color: #ffffff;
            font-size: 14.5px;
            text-shadow: 0px 1px 2px rgba(0, 0, 0, 0.5);
            letter-spacing: 0.5px;
        }

        /* --- CARD DESIGN END --- */

        .max-bet-container {
            width: 100%;
            font-family: "Segoe UI", "Microsoft YaHei", sans-serif;
        }

        .bet-section {
            margin-bottom: 40px;
        }

        .bet-section:last-child {
            margin-bottom: 0;
        }

        .bet-section .main-title {
            font-size: 22px;
            font-weight: 900;
            color: #0D2A4B;
            letter-spacing: 0.5px;
        }

        .bet-section .separator-line {
            height: 0;
            width: 100%;
            border-top: 4px solid #3A70A1;
            background-color: transparent;
            margin: 15px 0 15px 0;
        }

        .bet-section .bet-content {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .bet-content .text-group {
            font-size: 22px;
            font-weight: 450;
            color: #0D2A4B;
            line-height: 1.5;
        }

        .bet-content .text-group p:first-child {
            color: #0c3c60;
            margin-bottom: 4px;
        }

        .bet-content .text-group strong {
            font-weight: 700;
        }

        .bet-content .text-group em {
            font-style: italic;
        }

        @keyframes popIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .element-default .matches-background>*,
        .element-default .info-background>* {
            animation: popIn 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
            opacity: 0;
        }

        .element-default .matches-background>*:nth-child(1),
        .element-default .info-background>*:nth-child(1) {
            animation-delay: 0.1s;
        }

        .element-default .matches-background>*:nth-child(2),
        .element-default .info-background>*:nth-child(2) {
            animation-delay: 0.2s;
        }

        /* ========================================= */
        /* BACK TO TOP BUTTON STYLES (MATCHED COLORS)*/
        /* ========================================= */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            width: 50px;
            height: 50px;
            /* 金色边框匹配 vs-badge */
            border: 2px solid #FFC107;
            border-radius: 50%;
            cursor: pointer;
            /* 深红色渐变匹配 matches-background */
            background: linear-gradient(180deg, #4a0d0d 0%, #1a0505 100%);
            /* 金色发光效果 */
            box-shadow: 0px 0px 15px rgba(255, 193, 7, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.4s ease;
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-to-top:hover {
            transform: translateY(-5px);
            box-shadow: 0px 0px 20px rgba(255, 193, 7, 0.7);
            background: linear-gradient(180deg, #631212 0%, #2b0505 100%);
        }

        .back-to-top svg {
            width: 26px;
            height: 26px;
            fill: #ffffff;
            filter: drop-shadow(0 0 2px rgba(0, 0, 0, 0.5));
        }

        @media (min-width: 769px) {
            .element-default .container {
                max-width: 782px;
                margin: 0 auto;
            }

            .element-default .matches-background {
                padding: 30px;
            }

            .element-default .info-background {
                padding: 30px;
            }

            .match-card-wrapper {
                height: 160px;
                gap: 20px;
            }

            .league-box {
                width: 160px;
                padding: 20px;
                border-radius: 16px;
            }

            .league-logo-img {
                width: 180px;
                height: 180px;
                /* max-height: 100%; */
                object-fit: contain;
            }

            .match-info-box {
                border-radius: 16px;
            }

            .teams-row {
                padding: 10px 40px 60px 40px;
            }

            .team-logo-img {
                width: 80px;
                height: 80px;
            }

            .vs-badge {
                font-size: 60px;
                margin: 0 30px;
            }

            .date-bar {
                height: 45px;
                left: 0;
                width: 100%;
                clip-path: polygon(50px 0, 100% 0, 100% 100%, 0% 100%);
                justify-content: center;
                padding-right: 0;
                padding-left: 30px;
                gap: 50px;
            }

            .date-text,
            .time-text {
                font-size: 30px;
                font-weight: 700;
                text-shadow: 2px 2px 0px rgba(160, 90, 0, 0.6);
            }

            .bet-section {
                margin-bottom: 60px;
            }

            .bet-section .separator-line {
                border-top-width: 6px;
            }

            .bet-section .main-title {
                font-size: 30px;
            }

            .bet-content .text-group {
                font-size: 30px;
            }

            /* 桌面端按钮位置调整 */
            .back-to-top {
                bottom: 40px;
                right: 420px;
                width: 60px;
                height: 60px;
            }

            .back-to-top svg {
                width: 30px;
                height: 30px;
            }
        }
    </style>
</head>

<body>
    <div class="element-default">
        <div class="container">
            <!-- Header Image -->
            <img class="margin" src="{{ asset('images/winbox_football/football-my.png') }}" />

            <!-- Matches Section -->
            <div class="matches-background">
                @if ($matches->isNotEmpty())
                    @foreach ($matches as $match)
                        <div class="match-card-wrapper">

                            <!-- Left: League Logo -->
                            <div class="league-box">
                                <img class="league-logo-img" src="{{ asset('storage/' . $match->league_logo_path) }}"
                                    alt="{{ $match->league_name }}">
                            </div>

                            <!-- Right: Match Info -->
                            <div class="match-info-box">

                                <div class="teams-row">
                                    <img class="team-logo-img" src="{{ asset('storage/' . $match->team1_logo_path) }}"
                                        alt="{{ $match->team1_name }}">
                                    <div class="vs-badge">VS</div>
                                    <img class="team-logo-img" src="{{ asset('storage/' . $match->team2_logo_path) }}"
                                        alt="{{ $match->team2_name }}">
                                </div>

                                <!-- Date Bar -->
                                <div class="date-bar">
                                    <span
                                        class="date-text">{{ \Carbon\Carbon::parse($match->date)->format('d/m/Y') }}</span>
                                    <span class="time-text">{{ \Carbon\Carbon::parse($match->time)->format('H:i') }}
                                        GMT+8</span>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Info Section -->
            <div class="info-background">
                @if ($descriptions->isNotEmpty())
                    <div class="max-bet-container">
                        @foreach ($descriptions as $description)
                            <div class="bet-section">
                                <h2 class="main-title">{!! $description->title !!}</h2>
                                <div class="separator-line"></div>
                                <div class="bet-content">
                                    <div class="text-group">{!! $description->information !!}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>

    <!-- BACK TO TOP BUTTON -->
    <button onclick="topFunction()" id="backToTopBtn" class="back-to-top" title="Go to top">
        <svg viewBox="0 0 24 24">
            <path d="M12 4l-8 8h6v8h4v-8h6z"></path>
        </svg>
    </button>

    <!-- JS FOR SCROLL FUNCTIONALITY -->
    <script>
        let mybutton = document.getElementById("backToTopBtn");

        window.onscroll = function() {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                mybutton.classList.add("show");
            } else {
                mybutton.classList.remove("show");
            }
        };

        function topFunction() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
</body>

</html>
