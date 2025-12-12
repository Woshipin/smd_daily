<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>9 WINBOX Lotto</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Default styles for Mobile */
        body {
            font-family: 'Arial', sans-serif;
            background: #ffffff;
            min-height: 100vh;
        }
        
        /* =========================================
           SECTION ONE (Mobile)
           ========================================= */
        .section-one {
            padding: 93px 15px 30px 15px; 
            width: 100%;
            min-height: 100vw; 
            background-image: url("{{ asset('images/winbox_jackpot/thb-usd-jackpot.jpg') }}"); 
            background-repeat: no-repeat;
            background-position: top center;
            background-size: 100% 100%; 
            position: relative;
            overflow: visible; 
        }

        .section-two {
            background: linear-gradient(135deg, #7130b0 0%, #78379b 100%);
            padding: 20px 10px;
        }

        .header {
            padding-top: 0;
            margin-bottom: 5px;
            text-align: center;
            position: relative;
            z-index: 5;
        }

        /* Logo */
        .logo {
            width: 70px;
            height: 70px;
            top: 20px;
            right: 15px;
            position: absolute;
            background: linear-gradient(135deg, #8b4ec3 0%, #6b3ba8 100%);
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 4px solid #fff;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            z-index: 10;
        }

        .logo-text { font-size: 24px; color: white; font-weight: bold; line-height: 1; }
        .logo-brand { font-size: 10px; color: white; font-weight: bold; margin-top: 2px; }
        .logo-lotto { font-size: 8px; padding: 2px 8px; background: linear-gradient(90deg, #ff6b35 0%, #ffa500 100%); color: white; font-weight: bold; border-radius: 10px; margin-top: 2px; }

        /* =========================================
           JACKPOT TEXT STYLES
           ========================================= */
        .jackpot-amount {
            background: transparent; 
            border: none;
            box-shadow: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0; 
            padding: 0; 
            position: relative; 
            z-index: 2;
        }

        .usd-label { 
            padding: 30px 5px 0px 0px; 
            margin-bottom: 5px;
            font-family: 'Arial Black', sans-serif;
            font-size: 28px; 
            font-weight: 900; 
            font-style: italic;
            color: #ffffff; 
            -webkit-text-stroke: 10px #310068; 
            paint-order: stroke fill;
            filter: drop-shadow(0px 0px 3px #ffcc00); 
            transform: translateY(2px);
        }

        .amount { 
            padding: 15px 0px 0px 5px;
            font-family: 'Arial Black', sans-serif;
            font-size: 42px; 
            font-weight: 900; 
            color: #ffffff;
            letter-spacing: 1px; 
            line-height: 1;
            -webkit-text-stroke: 10px #310068; 
            paint-order: stroke fill;
            filter: drop-shadow(0 0 0px #ffcc00) drop-shadow(0 0 3px #ffcc00) drop-shadow(2px 4px 0px #ffaa00);
            position: relative;
        }

        /* Prize Cards */
        .prize-cards {
            gap: 15px;
            display: grid;
            grid-template-columns: 1fr 1fr; 
            position: relative;
            z-index: 2;
            max-width: 600px;
            margin: 0 auto;
            padding: 0 5px; 
        }

        .prize-card {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center; 
            height: 100%;
            padding: 18px
        }

        .prize-card-top {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .prize-amount-label {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 0px;
            line-height: 1.2;
        }

        /* Mobile Prize Value Styles */
        .prize-value {
            font-family: 'Arial Black', sans-serif;
            font-size: 20px; 
            font-weight: 900;
            line-height: 1.1;
            position: relative;
            z-index: 2;
            -webkit-text-stroke: 6px #ffffff; 
            paint-order: stroke fill;
            filter: drop-shadow(0 3px 3px rgba(0,0,0,0.3));
        }

        .prize-card.orange .prize-amount-label { color: #9d4209; }
        .prize-card.orange .prize-value { color: #FF6600; }
        
        .prize-card.blue .prize-amount-label { color: #00449b; }
        .prize-card.blue .prize-value { color: #007AFF; }

        .prize-card-bottom {
            position: relative;
            width: 100%; 
            margin-top: -22px; 
            padding: 18px 5px 12px 5px;
            border-radius: 16px 16px 15px 15px;
            text-align: center;
            z-index: 2; 
            box-shadow: inset 0 2px 3px rgba(255,255,255,0.4), 0 -2px 5px rgba(0,0,0,0.1); 
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .prize-card.orange .prize-card-bottom {
            background: linear-gradient(180deg, #ffc55c 0%, #ff9e3d 50%, #e87426 100%);
            border-top: 2px solid #ffe8b8; 
        }

        .prize-card.blue .prize-card-bottom {
            background: linear-gradient(180deg, #8cd1ff 0%, #3aa1ff 50% , #007aff 100%);
            border-top: 2px solid #dbeeff; 
        }

        .prize-label-thai {
            font-size: 15px;
            color: #fff;
            font-weight: bold;
            text-shadow: 0px 1px 2px rgba(160, 80, 0, 0.5);
            margin-bottom: 2px;
            line-height: 1.2;
        }
        
        .prize-card.blue .prize-label-thai {
             text-shadow: 0px 1px 2px rgba(0, 80, 160, 0.5);
        }

        .prize-label-english {
            font-size: 11px;
            color: #fff;
            font-weight: 600;
            opacity: 0.95;
            text-shadow: 0px 1px 1px rgba(0,0,0,0.2);
            line-height: 1.1;
        }

        /* Section 2 styles */
        .third-prize-section {
            border-radius: 25px;
            background: linear-gradient(180deg, #feac55 0%, #f5954a 50%, #e9763d 100%);
            padding: 1px;
            box-shadow: 0 12px 35px rgba(0,0,0,0.4);
            position: relative;
            overflow: visible;
        }

        /* 
           =============================================================
           [UPDATED] 3D HEADER STYLES (More Depth)
           =============================================================
        */
        .third-prize-header { 
            width: 90%;
            margin: -40px auto 0 auto;
            position: relative;
            z-index: 5;
            text-align: center;
            
            /* White Outer Shell */
            background-color: #ffffff;
            padding: 8px; /* The white border width */
            border-radius: 16px;
            
            /* 3D Effect for the White Shell (Solid gray shadow creates thickness) */
            box-shadow: 
                0 6px 0 #d9d9d9, 
                0 15px 20px rgba(0,0,0,0.4);
        }

        .third-prize-title { 
            /* Red Inner Button */
            background: linear-gradient(180deg, #fa6d64 0%, #e04b45 40%, #c4322c 100%);
            padding: 5px 0;
            border-radius: 10px;
            
            /* Text Styles */
            font-family: 'Arial Black', sans-serif;
            font-size: 24px;
            color: #ffffff;
            font-weight: 900;
            
            /* 3D Text Stroke */
            -webkit-text-stroke: 4px #7a1e17; 
            paint-order: stroke fill;
            
            /* Text Drop Shadow */
            filter: drop-shadow(0 2px 0px rgba(0,0,0,0.3));
            
            /* 3D Button Depth (Dark Red Solid Shadow) + Inner Shine */
            box-shadow: 
                inset 0 2px 0 rgba(255,255,255,0.4), /* Top Shine */
                0 5px 0 #921d18,  /* Solid 3D Side Thickness */
                0 8px 5px rgba(0,0,0,0.3); /* Drop shadow under the red button */
            
            position: relative;
            top: -2px; /* Slight lift to allow push effect if needed */
        }

        /* Shining effect overlay (optional, adds gloss) */
        .third-prize-title::after {
            content: '';
            position: absolute;
            top: 0;
            left: 20%;
            width: 60%;
            height: 50%;
            background: linear-gradient(180deg, rgba(255,255,255,0.4) 0%, rgba(255,255,255,0) 100%);
            border-radius: 50%;
            pointer-events: none;
            filter: blur(4px);
        }

        .third-prize-content { border-radius: 20px; padding: 15px 20px 25px 20px; background: linear-gradient(180deg, #fef9f3 0%, #fef5eb 100%); margin-top: 20px; }
        
        /* Mobile Bonus Badge */
        .bonus-badge { 
            padding: 12px 25px; 
            font-size: 19px; 
            margin: 0 auto 10px auto; 
            background: linear-gradient(180deg, #ff7978 0%, #f76869 50%, #ec5250 100%); 
            color: #fff; 
            border-radius: 35px; 
            display: block; 
            font-weight: bold; 
            box-shadow: 0 5px 18px rgba(255,107,122,0.4); 
            border: 3px solid rgba(255,255,255,0.5); 
            width: 100%; 
            max-width: 303px; 
            text-align: center;
        }
        
        .detail-row { flex-direction: row; justify-content: space-between; align-items: center; padding: 10px 0; display: flex; border-bottom: 2px dashed #f0d0b0;}
        .detail-row:last-child { border-bottom: none; padding-bottom: 0; }
        .detail-labels { flex: 1; }
        .detail-label-thai, .detail-label-english { font-size: 13px; color: #a52a2a; font-weight: bold; line-height: 1.3; }
        .detail-label-english { color: #7d5c4d; margin-top: 3px; }
        .detail-value { padding: 10px 10px; font-size: 15px; min-width: 120px; text-align: center; display: flex; align-items: center; justify-content: center; flex-shrink: 0; background: linear-gradient(135deg, #fff 0%, #fffaf5 100%); border-radius: 20px; font-weight: bold; color: #f12a2c; box-shadow: 0 4px 15px rgba(230,57,70,0.15); border: 2px solid rgba(230,57,70,0.1); }

        /* Summary Section */
        .summary-section { margin-top: 20px; margin-bottom: 20px; }
        .section-title, .bonus-section-title { color: #0c3c60; font-family: 'Arial', sans-serif; font-weight: bold; font-size: 25px; border-bottom: 3px solid #0c3c60; padding-bottom: 15px; margin-bottom: 15px; }
        .bonus-section-title { margin-top: 40px; }
        .summary-item { margin-bottom: 30px; }
        .summary-item:last-child { margin-bottom: 0; }
        .summary-label { color: #0c3c60; font-size: 25px; font-weight: bold; display: flex; align-items: center; }
        .summary-value { color: red; font-size: 30px; font-weight: bold; margin-top: 8px; }
        .icon-8ball { display: inline-flex; width: 30px; height: 30px; background-color: #333; color: white; border-radius: 50%; align-items: center; justify-content: center; font-weight: bold; font-size: 20px; margin-right: 10px; border: 1px solid #fff; flex-shrink: 0; }

        .section-three { margin-top: 0; padding: 0 10px 20px 10px; }

        /* =========================================
           DESKTOP VIEW STYLES
           ========================================= */
        @media (min-width: 769px) {
            body { background: #ffffff; }
            .page-wrapper { max-width: 45%; margin: 0 auto; }

            .section-one {
                padding: 280px 20px 40px 20px;
                min-height: 900px;
                aspect-ratio: unset; 
                background-image: url("{{ asset('images/winbox_jackpot/thb-usd-jackpot.jpg') }}");  
                background-repeat: no-repeat;
                background-position: center top;
                background-size: 100% 100%;
            }

            .section-two { padding: 30px 10px; background: linear-gradient(135deg, #7130b0 0%, #78379b 100%); }
            .section-three { margin-top: 0; padding: 0 10px 30px 10px; }

            .header { margin-bottom: 20px; padding-top: 0; }
    
            .logo { width: 100px; height: 100px; right: 20px; top: 30px; }
            .logo-text { font-size: 32px; }
            .logo-brand { font-size: 14px; }
            .logo-lotto { font-size: 11px; padding: 2px 12px; }
    
            .usd-label { 
                padding: 0px 5px 0px 0px;
                font-size: 60px; 
                -webkit-text-stroke: 18px #310068; 
                filter: drop-shadow(0 0 3px #ffcc00) drop-shadow(0 0 5px #ffcc00) drop-shadow(2px 4px 0px #ffaa00);
                transform: translateY(2px);
            }

            .jackpot-amount {
                background: transparent; 
                border: none;
                box-shadow: none;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 10px; 
                padding: 0; 
                position: relative; 
                z-index: 2;
            }

            .amount { 
                padding: 0px 0px 0px 5px;
                font-size: 100px; 
                -webkit-text-stroke: 18px #310068; 
                filter: drop-shadow(0 0 3px #ffcc00) drop-shadow(0 0 5px #ffcc00) drop-shadow(2px 4px 0px #ffaa00);
            }
    
            .prize-cards { 
                max-width: 100%; 
                width: 100%;
                display: grid;
                grid-template-columns: 45% 45%;
                justify-content: center;
                margin-top: 35px;
                gap: 30px;
            }
            
            .prize-card-top { 
                width: 90%; 
                padding: 22px 10px 50px 10px; 
                border-radius: 20px 20px 0 0;
            }
            
            .prize-amount-label { font-size: 30px; font-weight: 700; }
            
            .prize-value { 
                font-size: clamp(40px, 4vw, 50px); 
                letter-spacing: 0; 
                -webkit-text-stroke: 10px #ffffff; 
                filter: drop-shadow(0 4px 5px rgba(0,0,0,0.2));
            }

            .prize-card-bottom { padding: 30px 15px; border-radius: 25px 25px 20px 20px; margin-top: -45px; }
            .prize-label-thai { font-size: 30px; margin-bottom: 5px; }
            .prize-label-english { font-size: 22px; }

            .third-prize-section { border-radius: 35px; margin-bottom: 0; padding: 1px;}
            
            /* [UPDATED] Desktop 3D Styles */
            .third-prize-header { 
                width: 85%;
                margin: -50px auto 0 auto;
                padding: 10px; 
                border-radius: 20px;
                box-shadow: 0 8px 0 #d9d9d9, 0 15px 30px rgba(0,0,0,0.5);
            }
            
            .third-prize-title { 
                font-size: 38px; 
                padding: 10px 0;
                border-radius: 14px;
                -webkit-text-stroke: 6px #7a1e17; 
                box-shadow: 
                    inset 0 3px 0 rgba(255,255,255,0.4),
                    0 8px 0 #921d18, 
                    0 10px 8px rgba(0,0,0,0.3);
            }

            .third-prize-content { border-radius: 28px; padding: 15px 35px 35px 35px; margin-top: 30px; }
            
            .bonus-badge { 
                padding: 15px 35px; 
                /* margin: 0 auto 30px auto;  */
                font-size: 40px; 
                width: 100%; 
                max-width: 690px; 
            }
            
            .detail-row { padding: 18px 0; }
            .detail-label-thai, .detail-label-english { font-size: 28px; }
            .detail-value { font-size: 25px; width: 250px; min-width: 250px; padding: 15px 35px; border-radius: 30px; }
            .summary-section { margin-top: 40px; }
            .section-title, .bonus-section-title { font-size: 35px; }
            .summary-label { font-size: 35px; }
            .summary-value { font-size: 35px; color: red; }
        }
    </style>
</head>
<body>

<div class="page-wrapper">

    <!-- 循环开始：遍历所有 Jackpot 数据 -->
    @foreach($jackpots as $jackpot)
        <!-- Section 1 -->
        <div class="section-one">

            <!-- Header -->
            <div class="header">
                <div class="jackpot-amount">
                    <span class="usd-label">USD</span>
                    <span class="amount">{{ $jackpot->amount }}</span>
                </div>
            </div>

            <!-- Prize Cards -->
            <div class="prize-cards">
                <!-- Orange Card -->
                <div class="prize-card orange">
                    <div class="prize-card-top">
                        <div class="prize-amount-label">USD</div>
                        <div class="prize-value">{{ $jackpot->prize_value_today }}</div>
                    </div>
                </div>
                
                <!-- Blue Card -->
                <div class="prize-card blue">
                    <div class="prize-card-top">
                        <div class="prize-amount-label">USD</div>
                        <div class="prize-value">{{ $jackpot->prize_value_current }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 2 -->
        <div class="section-two">
            <!-- Third Prize Section -->
            <div class="third-prize-section">
                <div class="third-prize-header">
                    <div class="third-prize-title">{{ $jackpot->third_prize_title }}</div>
                </div>
                
                <div class="third-prize-content">
                    <div class="bonus-badge">{{ $jackpot->bonus_badge }}</div>
                    
                    <div class="detail-row">
                        <div class="detail-labels">
                            <div class="detail-label-thai">{{ $jackpot->detail_label_thai_1 }}</div>
                            <div class="detail-label-thai">{{ $jackpot->detail_label_thai_2 }}</div>
                            <div class="detail-label-english">{{ $jackpot->detail_label_english_1 }}</div>
                            <div class="detail-label-english">{{ $jackpot->detail_label_english_2 }}</div>
                        </div>
                        <div class="detail-value">{{ $jackpot->detail_value_1 }}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-labels">
                            <div class="detail-label-thai">หน่วยที่ชนะ</div>
                            <div class="detail-label-english">Winning Units</div>
                        </div>
                        <div class="detail-value">{{ $jackpot->detail_value_2 }}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-labels">
                            <div class="detail-label-thai">โบนัสที่ได้รับ<br>ต่อหน่วย</div>
                            <div class="detail-label-english">Bonus Won Per Unit</div>
                        </div>
                        <div class="detail-value">USD {{ $jackpot->detail_value_3 }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3 -->
        <div class="section-three">
            <!-- Summary Section -->
            <div class="summary-section">
                <div class="section-title">{{ $jackpot->section_title }}</div>
                
                @foreach($jackpotInformationTh as $info)
                    <div class="summary-item">
                        <span class="icon-8ball">8</span><br>
                        <div class="summary-label">{{ $info->summary_label_th }}</div>
                        <div class="summary-value">{{ $info->summary_value_th }}</div>
                    </div>
                @endforeach
                
                <div class="bonus-section-title">{{ $jackpot->bonus_section_title }}</div>
                
                @foreach($jackpotInformationEn as $info)
                    <div class="summary-item">
                        <span class="icon-8ball">8</span><br>
                        <div class="summary-label">{{ $info->summary_label_en }}</div>
                        <div class="summary-value">{{ $info->summary_value_en }}</div>
                    </div>
                @endforeach

            </div>
        </div>
    @endforeach

</div>

</body>
</html>