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
        width: 100%; /* Mobile-first: full width */
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
        gap: 30px; 
        padding: 10px 15px; /* Mobile padding */
        position: relative;
        background-color: #0361b3;
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

      .element-default .container-wrapper,
      .element-default .container-6 { 
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 25px; 
        position: relative;
        align-self: stretch;
        width: 100%;
        flex: 0 0 auto;
      }

      .element-default .div {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
        position: relative;
        align-self: stretch;
        width: 100%;
        flex: 0 0 auto;
      }
      
      .element-default .match-container {
          display: flex;
          align-items: stretch;
          position: relative;
          align-self: stretch;
          width: 100%;
          min-height: 120px; /* Mobile height */
          border-radius: 16px;
          border: 3px solid #00ffff;
          box-shadow: 0px 0px 20px #00bfff66, inset 0px 4px 4px #00000040;
          backdrop-filter: blur(4px) brightness(100%);
          -webkit-backdrop-filter: blur(4px) brightness(100%);
          background: linear-gradient(90deg, rgba(10, 25, 60, 0.85) 0%, rgba(27, 68, 162, 0.85) 84%);
      }

      .left-team-pane {
          flex: 2.5;
          display: flex;
          justify-content: center;
          align-items: center;
          border-right: 2px solid #ffffff;
      }
      .left-team-pane img {
          object-fit: contain; 
      }

      .right-teams-pane {
          flex: 4;
          display: flex;
          justify-content: space-around;
          align-items: center;
      }

      .team-logo {
          background-size: contain;
          background-position: center;
          background-repeat: no-repeat;
      }
      
      .team-logo.small-logo {
          width: 55px;   /* Mobile size */
          height: 55px;
          object-fit: contain;
      }

      .large-logo {
          width: 100px;   /* Mobile size */
          height: 100px;
      }

      .small-logo {
          width: 55px;   /* Mobile size */
          height: 55px;
      }
      
      .vs-text {
          font-family: "Segoe UI-Black", Helvetica;
          font-weight: 900;
          color: #ffffff;
          font-size: 24px; /* Mobile size */
          text-shadow: 0px 0px 40px #00ffff99;
      }

      .element-default .overlay-border-wrapper {
        display: flex;
        flex-direction: column;
        width: 100%;
        align-items: center;
        padding: 0px;
        position: relative;
        flex: 0 0 auto;
      }

      .element-default .overlay-border-2 {
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: center;
        padding: 5px 10px;
        flex: 0 0 auto;
        background: linear-gradient(90deg, rgba(10, 25, 60, 0.85) 0%, rgba(27, 68, 162, 0.85) 84%);
        border-radius: 12px;
        border: 3px solid;
        border-color: #00FFFF;
        box-shadow: 0px 0px 20px #00bfff40;
        backdrop-filter: blur(4px) brightness(100%);
        -webkit-backdrop-filter: blur(4px) brightness(100%);
        position: relative;
        flex-wrap: wrap;
        gap: 0 15px; 
      }

      .element-default .text-wrapper-2,
      .element-default .text-wrapper-3 {
        font-family: "Segoe UI-Bold", Helvetica;
        font-weight: 700;
        color: #ffffff;
        font-size: 25px; /* Mobile font size */
        letter-spacing: 0.50px;
        line-height: normal;
        white-space: nowrap;
      }

      .element-default .text-wrapper-2 {
          position: relative;
      }

      .element-default .text-wrapper-2::after {
        content: '';
        position: absolute;
        top: -5px;
        bottom: -5px;
        width: 3px;
        background-color: #00FFFF;
        right: calc(-15px / 2 - 3px / 2); 
      }
      
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
        border-top: 4px solid #3A70A1; /* Mobile is 4px */
        background-color: transparent;
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
      
      /* KEY CSS RULES START HERE */
      .bet-content .text-group {
        font-size: 22px;
        /* 1. 默认样式：所有文本都设为普通字重 */
        font-weight: 450; 
        color: #0D2A4B; 
        line-height: 1.5;
      }
      .bet-content .text-group p:first-child {
         color: #0c3c60;
         margin-bottom: 4px;
      }

      /* 2. 覆盖样式：专门为 strong 标签设置更粗的字重 */
      .bet-content .text-group strong {
        font-weight: 700; /* 您可以按需调整这个数值，比如 'bold' 或 700 */
      }
      /* 也可以为 em 标签添加样式，以防万一 */
      .bet-content .text-group em {
        font-style: italic;
      }
      /* KEY CSS RULES END HERE */

      @keyframes popIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
      }

      .element-default .matches-background > *,
      .element-default .info-background > * {
        animation: popIn 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        opacity: 0;
      }
      
      .element-default .matches-background > *:nth-child(1),
      .element-default .info-background > *:nth-child(1) { animation-delay: 0.1s; }

      .element-default .matches-background > *:nth-child(2),
      .element-default .info-background > *:nth-child(2) { animation-delay: 0.2s; }

      @media (min-width: 769px) {
        .element-default .container {
            max-width: 782px;
            margin: 0 auto;
        }
        
        .element-default .matches-background {
            padding: 20px 30px;
        }

        .element-default .info-background {
            padding: 30px;
        }

        .element-default .div {
            gap: 20px;
        }

        .element-default .match-container {
            min-height: 190px;
        }
        
        .left-team-pane { flex: 2; }
        .right-teams-pane { flex: 3; }
        
        .large-logo { width: 165px; height: 170px; }
        .small-logo { width: 102px; height: 102px; }
        .team-logo.small-logo { width: 80px; height: 80px; }
        .vs-text { font-size: 44px; }

        .element-default .overlay-border-2 {
            max-width: 500px;
            flex-wrap: nowrap;
            gap: 0 25px;
        }
        
        .element-default .text-wrapper-2::after {
            right: calc(-25px / 2 - 3px / 2);
        }

        .element-default .text-wrapper-2,
        .element-default .text-wrapper-3 {
            font-size: 34px;
        }

        .bet-section {
          margin-bottom: 60px;
        }
        .bet-section .separator-line {
            border-top-width: 6px; /* Desktop is 6px */
        }
        .bet-section .main-title {
            font-size: 30px;
        }
        .bet-content .icon {
          font-size: 30px;
          margin-top: 4px;
        }
        .bet-content .text-group {
          font-size: 30px;
        }
      }

    </style>
  </head>
  <body>
    <div class="element-default">
      <div class="container">
        <img class="margin" src="{{ asset('images/winbox_football/football-th.png') }}" />
        
        <div class="matches-background">
          @if($matches->isNotEmpty())
            @foreach($matches as $match)
              <div class="{{ $loop->first ? 'container-wrapper' : 'container-6' }}">
                <div class="div">
                  <div class="match-container">
                      <div class="left-team-pane">
                           <img class="large-logo" src="{{ asset('storage/' . $match->league_logo_path) }}" alt="{{ $match->league_name }}">
                      </div>
                      <div class="right-teams-pane">
                           <img class="team-logo small-logo" src="{{ asset('storage/' . $match->team1_logo_path) }}" alt="{{ $match->team1_name }}">
                           <div class="vs-text">VS</div>
                           <img class="team-logo small-logo" src="{{ asset('storage/' . $match->team2_logo_path) }}" alt="{{ $match->team2_name }}">
                      </div>
                  </div>
                  <div class="overlay-border-wrapper">
                    <div class="overlay-border-2">
                      <div class="text-wrapper-2">{{ \Carbon\Carbon::parse($match->date)->format('d/m/Y') }}</div>
                      <div class="heading">
                        <div class="text-wrapper-3">{{ \Carbon\Carbon::parse($match->time)->format('H:i') }} GMT+7</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        </div>
        
        <div class="info-background">
          @if($descriptions->isNotEmpty())
            <div class="max-bet-container">
              @foreach($descriptions as $description)
                <div class="bet-section">
                    <h2 class="main-title">{!! $description->title !!}</h2>
                    <div class="separator-line"></div>
                    <div class="bet-content">
                        <!-- 这行代码会忠实输出数据库里的HTML，包括<strong>标签 -->
                        <div class="text-group">{!! $description->information !!}</div>
                    </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>

      </div>
    </div>
  </body>
</html>