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

        /* 赛事区域背景 (保留红黑渐变) */
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

        /* 信息区域背景 (保留淡灰色) */
        .element-default .info-background {
            display: flex;
            flex-direction: column;
            width: 100%;
            align-items: center;
            padding: 40px 20px;
            position: relative;
            background-color: #f8f8f8;
        }

        /* --- 赛事卡片设计 (保留红金样式) --- */
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
        }

        .league-logo-img {
            width: 100%;
            height: auto;
            max-height: 80px;
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

        .teams-row {
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 15px 10px 35px 10px;
            width: 100%;
        }

        .team-logo-img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }

        .vs-badge {
            font-family: "Segoe UI-Black", "Arial Black", sans-serif;
            font-weight: 900;
            font-size: 32px;
            font-style: italic;
            background: linear-gradient(180deg, #FFEFBA 10%, #FFC107 50%, #B8860B 90%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0px 2px 0px #5c3a00);
        }

        .date-bar {
            position: absolute;
            bottom: 0;
            right: 0;
            left: 20px;
            height: 28px;
            background: linear-gradient(90deg, #FFC107 0%, #F57F17 100%);
            clip-path: polygon(15px 0, 100% 0, 100% 100%, 0 100%);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 15px;
            gap: 15px;
        }

        .date-text,
        .time-text {
            font-family: "Segoe UI", sans-serif;
            font-weight: 700;
            color: #ffffff;
            font-size: 14px;
        }

        /* --- 投注内容设计 (结合第一个代码的配色) --- */
        .max-bet-container {
            width: 100%;
            font-family: "Segoe UI", "Microsoft YaHei", sans-serif;
        }

        .bet-section {
            margin-bottom: 40px;
        }

        .bet-section .main-title {
            font-size: 22px;
            font-weight: 900;
            color: #0D2A4B;
            /* 保留深蓝色标题 */
            letter-spacing: 0.5px;
        }

        .bet-section .separator-line {
            height: 0;
            width: 100%;
            border-top: 4px solid #3A70A1;
            /* 蓝色分割线 */
            margin: 15px 0 15px 0;
        }

        .bet-section .bet-content {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .bet-content .icon {
            font-size: 23px;
            margin-top: 2px;
        }

        .bet-content .text-group {
            display: flex;
            flex-direction: column;
        }

        .bet-content .bet-text-1 {
            font-size: 22px;
            font-weight: 700;
            color: #0c3c60;
            line-height: 1.5;
            margin-bottom: 4px;
        }

        .bet-content .bet-text-2 {
            font-size: 22px;
            font-weight: 700;
            color: #0D2A4B;
            line-height: 1.5;
        }

        /* 动画效果 */
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

        /* --- 返回顶部按钮 (红金配色) --- */
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
            width: 24px;
            height: 24px;
            fill: #ffffff;
            filter: drop-shadow(0 0 2px rgba(0, 0, 0, 0.5));
        }


        /* --- 桌面端适配 --- */
        @media (min-width: 769px) {
            .element-default .container {
                max-width: 782px;
                margin: 0 auto;
            }

            .element-default .matches-background {
                padding: 30px;
            }

            .element-default .info-background {
                padding: 60px;
            }

            .match-card-wrapper {
                height: 160px;
                gap: 20px;
            }

            .league-box {
                width: 160px;
                padding: 20px;
            }

            .league-logo-img {
                max-height: 120px;
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
                clip-path: polygon(50px 0, 100% 0, 100% 100%, 0% 100%);
                justify-content: center;
                gap: 50px;
            }

            .date-text,
            .time-text {
                font-size: 30px;
                text-shadow: 2px 2px 0px rgba(160, 90, 0, 0.6);
            }

            .bet-section .main-title {
                font-size: 30px;
            }

            .bet-section .separator-line {
                border-top-width: 6px;
            }

            .bet-content .icon {
                font-size: 30px;
            }

            .bet-content .bet-text-1,
            .bet-content .bet-text-2 {
                font-size: 30px;
            }

            .back-to-top {
                bottom: 40px;
                right: 420px;
                width: 60px;
                height: 60px;
            }
        }
    </style>
</head>

<body>
    <div class="element-default">
        <div class="container">
            <!-- 头部图片 -->
            <img class="margin" src="{{ asset('images/winbox_football/football-my.png') }}" />

            <!-- 信息区域 (改为最高投注内容) -->
            <div class="info-background">
                <div class="max-bet-container">

                    <!-- 中文版本 -->
                    <div class="bet-section">
                        <h2 class="main-title">足球赛事最高投注 📢</h2>
                        <div class="separator-line"></div>
                        <div class="bet-content">
                            <span class="icon">⚽</span>
                            <div class="text-group">
                                <p class="bet-text-1">最高投注额高达</p>
                                <p class="bet-text-2">MYR 30,000</p>
                            </div>
                        </div>
                    </div>

                    <!-- 英文版本 -->
                    <div class="bet-section">
                        <h2 class="main-title">SPORTS MATCHES MAXIMUM BET 📢</h2>
                        <div class="separator-line"></div>
                        <div class="bet-content">
                            <span class="icon">⚽</span>
                            <div class="text-group">
                                <p class="bet-text-1">MAXIMUM BET UP TO</p>
                                <p class="bet-text-2">MYR 30,000</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- [ADDED] BACK TO TOP BUTTON -->
    <button onclick="topFunction()" id="backToTopBtn" class="back-to-top" title="Go to top">
        <!-- White SVG Arrow -->
        <svg viewBox="0 0 24 24">
            <path d="M12 4l-8 8h6v8h4v-8h6z"></path>
        </svg>
    </button>

    <!-- [ADDED] JAVASCRIPT FOR SCROLL FUNCTIONALITY -->
    <script>
        // Get the button
        let mybutton = document.getElementById("backToTopBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.addEventListener('scroll', function() {
            if (window.scrollY > 20) {
                mybutton.classList.add("show");
            } else {
                mybutton.classList.remove("show");
            }
        });

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
</body>

</html>
