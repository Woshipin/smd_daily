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

      .element-default .background {
        display: flex;
        flex-direction: column;
        width: 100%;
        align-items: center;
        gap: 0; 
        padding: 40px 20px; 
        position: relative;
        background-color: #f8f8f8; 
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

      /* [MODIFIED] Set mobile border-top to 4px */
      .bet-section .separator-line {
        height: 0;
        width: 100%;
        border-top: 4px solid #3A70A1; /* Mobile is 4px */
        background-color: transparent;
        margin: 15px 0 25px 0;
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
          min-height: 120px;
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
          width: 55px;
          height: 55px;
          object-fit: contain;
      }

      .large-logo {
          width: 100px;
          height: 100px;
      }

      .small-logo {
          width: 55px;
          height: 55px;
      }
      
      .vs-text {
          font-family: "Segoe UI-Black", Helvetica;
          font-weight: 900;
          color: #ffffff;
          font-size: 24px;
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
        font-size: 25px;
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

      @keyframes popIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
      }

      .element-default .background > * {
        animation: popIn 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        opacity: 0;
      }

      .element-default .background > *:nth-child(1) { animation-delay: 0.1s; }
      .element-default .background > *:nth-child(2) { animation-delay: 0.2s; }

      /* =========================================
         [ADDED] BACK TO TOP BUTTON STYLES
         Colors matched to existing theme:
         Gradient: Matches .match-container
         Border: Matches #00FFFF (Cyan)
         ========================================= */
      .back-to-top {
          position: fixed;
          bottom: 20px;
          right: 20px;
          z-index: 9999;
          width: 50px;
          height: 50px;
          border: 2px solid #00FFFF; /* Cyan Border to match theme */
          border-radius: 50%;
          cursor: pointer;
          
          /* Gradient background matching match cards */
          background: linear-gradient(90deg, rgba(10, 25, 60, 0.95) 0%, rgba(27, 68, 162, 0.95) 84%);
          
          /* Glow Effect */
          box-shadow: 0px 0px 10px rgba(0, 255, 255, 0.5);
          
          /* Layout for SVG */
          display: flex;
          align-items: center;
          justify-content: center;
          
          /* Animation Properties */
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
          transform: translateY(-3px) scale(1.05);
          box-shadow: 0px 0px 15px rgba(0, 255, 255, 0.8);
          background: linear-gradient(90deg, rgba(27, 68, 162, 0.95) 0%, rgba(10, 25, 60, 0.95) 84%);
      }

      .back-to-top svg {
          width: 24px;
          height: 24px;
          fill: #ffffff; /* White icon */
          filter: drop-shadow(0 0 2px rgba(0,0,0,0.5));
      }

      /* --- DESKTOP STYLES --- */
      @media (min-width: 769px) {
        .element-default .container {
            max-width: 782px;
            margin: 0 auto;
        }
        
        .element-default .background {
            padding: 60px;
        }
        
        .bet-section {
          margin-bottom: 60px;
        }

        /* [ADDED] Set desktop border-top to 6px */
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
        
        .bet-content .bet-text-1 {
          font-size: 30px;
        }
      
        .bet-content .bet-text-2 {
          font-size: 30px;
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

        /* Adjust button position for desktop */
        .back-to-top {
            bottom: 40px;
            right: 450px;
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
        <img class="margin" src="{{ asset('images/winbox_football/football-th.png') }}" /> <!-- Placeholder for background image -->
        
        <div class="background">                               
          <div class="max-bet-container">
            
            <!-- Chinese Version -->
            <div class="bet-section">
                <h2 class="main-title">การแจ้งเตือนการแข่งขันกีฬา  📢</h2>
                <div class="separator-line"></div>
                <div class="bet-content">
                    <span class="icon">⚽</span>
                    <div class="text-group">
                        <p class="bet-text-1">เดิมพันสูงสุดถึง </p>
                        <p class="bet-text-2">THB 300,000</p>
                    </div>
                </div>
            </div>

            <!-- English Version -->
            <div class="bet-section">
                <h2 class="main-title">SPORTS MATCHES REMINDER 📢</h2>
                <div class="separator-line"></div>
                <div class="bet-content">
                    <span class="icon">⚽</span>
                    <div class="text-group">
                        <p class="bet-text-1">MAXIMUM BET UP TO</p>
                        <p class="bet-text-2">THB 300,000</p>
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