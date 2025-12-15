<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horse Racing Betting</title>
    <style>
        /* --- 全局样式重置 --- */
        * {
            margin: 0; /* 移除所有元素的默认外边距 */
            padding: 0; /* 移除所有元素的默认内边距 */
            box-sizing: border-box; /* 盒模型设置为 border-box，元素的宽度和高度包括内边距和边框 */
        }

        /* --- 页面主体样式 --- */
        body {
            font-family: Arial, sans-serif; /* 设置全局默认字体 */
            background-color: #ffffff; /* 设置页面背景色为白色 */
            display: flex; /* 使用 Flexbox 弹性布局 */
            justify-content: center; /* 水平居中其子元素（即 .container） */
            align-items: flex-start; /* 垂直方向从顶部开始对齐 */
            min-height: 100vh; /* 最小高度为整个浏览器视口高度 */
            padding: 0; /* 移除内边距，确保内容容器在页面顶部没有空间 */
        }

        /* --- 桌面端样式 (DESKTOP STYLES) --- */
        
        /* --- 主内容容器 --- */
        .container {
            width: 50%; /* 将桌面视图的宽度设置为视口宽度的50% */
            /* background: white; 容器背景色为白色 */
            /* box-shadow: 0 4px 20px rgba(0,0,0,0.15); 为容器添加阴影效果 */
            overflow: hidden; /* 隐藏超出容器范围的内容（特别是子元素的边角） */
        }

        /* --- 顶部绿色提醒栏 --- */
        .header-banner {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%); /* 设置绿色渐变背景 */
            color: white; /* 文字颜色为白色 */
            padding: 16px 25px; /* 设置内边距 */
            font-size: 22px; /* 字体大小 */
            font-weight: 700; /* 字体加粗 */
            text-align: center; /* 文字水平居中 */
        }

        /* --- 主要视觉区域（包含赛马图片） --- */
        .hero-section {
            position: relative; /* 设置为相对定位，作为内部绝对定位元素的父容器 */
            background: linear-gradient(180deg, #a89072 0%, #8B6F47 100%); /* 棕色渐变背景 */
            overflow: hidden; /* 隐藏溢出部分 */
        }

        /* --- 视觉区域内容包裹器 --- */
        .hero-content {
            position: relative; /* 相对定位 */
        }

        /* --- 赛马图片样式 --- */
        .horse-image {
            width: 100%; /* 图片宽度充满父容器 */
            height: auto; /* 高度自适应比例 */
            display: block; /* 转换为块级元素以消除图片底部的微小间隙 */
        }

        /* --- 右上角图标 --- */
        .telegram-icon {
            position: absolute; /* 绝对定位 */
            top: 20px; /* 距顶部20像素 */
            right: 20px; /* 距右侧20像素 */
            width: 70px; /* 宽度 */
            height: 70px; /* 高度 */
            background: linear-gradient(135deg, #4A90E2, #2E5C8A); /* 蓝色渐变背景 */
            border-radius: 12px; /* 圆角 */
            display: flex; /* 使用Flexbox布局 */
            align-items: center; /* 垂直居中图标 */
            justify-content: center; /* 水平居中图标 */
            color: white; /* 图标颜色 */
            font-size: 40px; /* 图标大小 */
            box-shadow: 0 4px 15px rgba(0,0,0,0.3); /* 添加阴影 */
            border: 3px solid white; /* 白色边框 */
            z-index: 10; /* 确保在图片上层显示 */
        }

        /* --- "FIXED ODD BETTING" 徽章 --- */
        .fixed-odds-badge {
            position: absolute; /* 绝对定位 */
            bottom: 200px; /* 距底部200像素 */
            right: 60px; /* 距右侧60像素 */
            background: linear-gradient(135deg, #FF6B35, #FF8C42); /* 橙色渐变背景 */
            color: white; /* 文字颜色 */
            padding: 12px 35px; /* 内边距 */
            border-radius: 30px; /* 圆角使其呈胶囊状 */
            font-weight: 700; /* 字体加粗 */
            font-size: 22px; /* 字体大小 */
            box-shadow: 0 4px 10px rgba(0,0,0,0.3); /* 阴影 */
            border: 2px solid rgba(255,255,255,0.3); /* 半透明白色边框 */
        }

        /* --- 泰文文本样式 --- */
        .thai-text {
            position: absolute; /* 绝对定位 */
            bottom: 130px; /* 距底部130像素 */
            left: 50%; /* 水平位置居中 */
            transform: translateX(-50%); /* 精确水平居中 */
            color: white; /* 文字颜色 */
            font-size: 40px; /* 字体大小 */
            font-weight: 700; /* 字体加粗 */
            white-space: nowrap; /* 防止文字换行 */
            text-shadow: 3px 3px 6px rgba(0,0,0,0.6); /* 文字阴影 */
        }

        /* --- 泰文中高亮的文字 --- */
        .thai-text .highlight {
            color: #FFD700; /* 高亮颜色为金色 */
            font-size: 48px; /* 更大的字体 */
        }

        /* --- 英文文本样式 --- */
        .english-text {
            position: absolute; /* 绝对定位 */
            bottom: 85px; /* 距底部85像素 */
            left: 50%; /* 水平位置居中 */
            transform: translateX(-50%); /* 精确水平居中 */
            color: white; /* 文字颜色 */
            font-size: 30px; /* 字体大小 */
            font-weight: 700; /* 字体加粗 */
            font-style: italic; /* 斜体 */
            text-shadow: 3px 3px 6px rgba(0,0,0,0.6); /* 文字阴影 */
        }

        /* --- 底部投注信息栏 --- */
        .betting-info {
            position: absolute; /* 绝对定位 */
            bottom: 0; /* 紧贴底部 */
            left: 0; /* 从左侧开始 */
            width: 100%; /* 宽度撑满父容器 */
            display: flex; /* Flexbox布局 */
            justify-content: center; /* 水平居中子项 */
            align-items: center; /* 垂直居中子项 */
            gap: 35px; /* 子项间距 */
            background: black; /* 添加一层非常淡的背景以确保文字可读性 */
            padding: 10px 0; /* 上下内边距 */
        }

        /* --- MODIFICATION START: 使用伪元素创建上下边框线 --- */
        .betting-info::before,
        .betting-info::after {
            content: ''; /* 伪元素必需的属性 */
            position: absolute; /* 绝对定位，相对于.betting-info */
            width: 60%; /* 设置宽度为60% */
            left: 20%; /* 左侧留出20%的间距，实现居中 */
            height: 1px; /* 线条的高度（粗细） */
            /* background-color: rgba(255, 255, 255, 0.4); 线条的颜色和透明度 */
        }

        .betting-info::before {
            top: 0; /* 定位到顶部 */
        }

        .betting-info::after {
            bottom: 0; /* 定位到底部 */
        }
        /* --- MODIFICATION END --- */
        
        /* --- 投注项（WIN/PLC） --- */
        .bet-item {
            display: flex; /* 使用Flexbox布局 */
            align-items: center; /* 垂直居中对齐 */
            gap: 15px; /* 标签和数字之间的间距 */
        }
        
        /* --- 投注标签（WIN/PLC 文字） --- */
        .bet-label {
            color: white; /* 文字颜色 */
            font-size: 18px; /* 字体大小 */
            text-transform: uppercase; /* 转换为大写 */
            font-weight: 700; /* 字体加粗 */
            text-shadow: 1px 1px 3px rgba(0,0,0,0.7); /* 添加文字阴影 */
        }

        /* --- 投注金额 --- */
        .bet-amount {
            color: #FEEA00; /* 更新为更亮的黄色 */
            font-size: 46px; /* 字体大小 */
            font-weight: 700; /* 字体加粗 */
            /* 使用多层阴影来创建描边效果 */
            text-shadow: 
                -1.5px -1.5px 0 #000, 
                 1.5px -1.5px 0 #000, 
                -1.5px  1.5px 0 #000, 
                 1.5px  1.5px 0 #000;
        }

        /* --- 中间的分割线 --- */
        .divider {
            width: 2px; /* 宽度调整 */
            height: 60px; /* 高度 */
            background: white; /* 颜色 */
        }

        /* --- 橙色赛程区域 --- */
        .schedule-section {
            background: linear-gradient(180deg, #E85D30 0%, #D85428 100%); /* 橙色渐变背景 */
            padding: 35px 40px; /* 内边距 */
            text-align: center; /* 文字居中 */
            color: white; /* 文字颜色 */
        }

        /* --- 每个赛程项 --- */
        .schedule-item {
            margin-bottom: 25px; /* 底部外边距 */
        }

        .schedule-item:last-child {
            margin-bottom: 0; /* 最后一个赛程项移除底部外边距 */
        }

        /* --- 国家/地区名称 --- */
        .country-name {
            font-size: 50px; /* 字体大小 */
            font-weight: 700; /* 字体加粗 */
            margin-bottom: 8px; /* 底部外边距 */
            text-shadow: 3px 3px 6px rgba(0,0,0,0.3); /* 文字阴影 */
        }
        
        /* --- 时间文本 --- */
        .time {
            font-size: 50px; /* 字体大小 */
            font-weight: 700; /* 字体加粗 */
            text-shadow: 3px 3px 6px rgba(0,0,0,0.3); /* 文字阴影 */
        }

        /* --- 赛程之间的分割线 --- */
        .schedule-divider {
            height: 4px; /* 高度 */
            background: rgba(255,255,255,0.5); /* 半透明白色背景 */
            margin: 25px auto; /* 上下外边距和水平居中 */
            width: 90%; /* 宽度 */
        }

        /* --- 底部白色详情区域 --- */
        .details-section {
            padding: 35px 0px; /* MODIFIED: 移除顶部内边距，以使用 margin 控制间距 */
        }

        /* --- 详情区域的标题（中文/英文） --- */
        .section-title {
            color: #003D5C; /* 深蓝色文字 */
            font-size: 35px; /* 字体大小 */
            font-weight: 700; /* 字体加粗 */
            margin-bottom: 20px; /* 底部外边距 */
            padding-bottom: 15px; /* 底部内边距 */
            position: relative; /* 为伪元素定位设置相对位置 */
        }
        
        /* --- MODIFICATION START: 使用伪元素创建下划线 --- */
        .section-title::after {
            content: ''; /* 伪元素必需的内容属性 */
            position: absolute; /* 绝对定位，相对于 .section-title */
            left: 0; /* 从左侧开始 */
            bottom: 0; /* 定位在底部 */
            width: 100%; /* 在这里修改下划线的宽度 */
            height: 6px; /* 线的粗细 */
            background-color: rgb(57, 114, 155); /* 线的颜色 */
        }
        /* --- MODIFICATION END --- */

        .race-info {
            color: #003D5C;
            font-size: 25px;
            line-height: 1.8;
            font-weight: 400;
        }

        .race-info strong {
            font-weight: 700;
        }

        /* --- Back to Top Button --- */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            width: 50px;
            height: 50px;
            border: 2px solid white; /* White Border */
            border-radius: 50%;
            cursor: pointer;
            
            /* Gradient background matching the orange theme */
            background: linear-gradient(135deg, #E85D30 0%, #D85428 100%);
            
            /* Glow Effect */
            box-shadow: 0px 0px 10px rgba(232, 93, 48, 0.5);
            
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
            box-shadow: 0px 0px 15px rgba(232, 93, 48, 0.8);
            background: linear-gradient(135deg, #FF6B35 0%, #FF8C42 100%);
        }

        .back-to-top svg {
            width: 24px;
            height: 24px;
            fill: #ffffff; /* White icon */
            filter: drop-shadow(0 0 2px rgba(0,0,0,0.5));
        }

        /* --- 移动端响应式样式 (MOBILE STYLES) --- */
        @media (max-width: 768px) {
            /* 当屏幕宽度小于等于768px时，应用以下样式 */

            body {
                padding: 0; /* 移动端无内边距 */
                background-color: white; /* 背景色变为白色 */
            }

            .container {
                width: 100%; /* 容器宽度占满屏幕 */
                max-width: 100%; /* 最大宽度限制 */
                min-width: 100%; /* 最小宽度限制 */
                border-radius: 0; /* 移除圆角 */
                box-shadow: none; /* 移除阴影 */
            }

            .header-banner {
                font-size: 16px; /* 调整字体大小 */
                padding: 12px 20px; /* 调整内边距 */
                border-radius: 0; /* 移除圆角 */
            }

            .hero-section {
                margin: 0; /* 移除外边距 */
            }

            .hero-content {
                margin: 0; /* 移除外边距 */
            }

            .horse-image {
                width: 100%; /* 图片宽度占满 */
            }

            .telegram-icon {
                width: 50px; /* 调整尺寸 */
                height: 50px; /* 调整尺寸 */
                font-size: 30px; /* 调整图标大小 */
                top: 15px; /* 调整位置 */
                right: 15px; /* 调整位置 */
                border-width: 2px; /* 调整边框宽度 */
            }
            
            /* 在移动端，将绝对定位的元素改为静态定位，使其在文档流中正常排列 */
            .fixed-odds-badge {
                position: static; 
                font-size: 16px;
                padding: 10px 25px;
                margin: 15px auto 10px;
                display: block;
                width: fit-content;
            }

            .thai-text {
                position: static;
                transform: none;
                font-size: 22px;
                margin: 12px 20px 8px;
                text-align: center;
                display: block;
            }

            .thai-text .highlight {
                font-size: 28px;
            }

            .english-text {
                position: static;
                transform: none;
                font-size: 20px;
                margin: 0 20px 15px;
                text-align: center;
                display: block;
            }

            .betting-info {
                /* --- MODIFICATION START --- */
                position: relative; /* 改为相对定位以容纳伪元素 */
                /* --- MODIFICATION END --- */
                transform: none; /* 移除变形 */
                background: black; /* 移动端使用更深的背景以保证可读性 */
                padding: 15px 20px; /* 调整内边距 */
                gap: 20px; /* 调整间距 */
                margin: 0; /* 移除外边距 */
                flex-wrap: nowrap; /* 确保投注信息不换行 */
            }

            .bet-item {
                gap: 8px; /* 调整移动端标签和数字间距 */
            }
            
            .bet-label {
                font-size: 14px; /* 调整字体大小 */
                text-shadow: 1px 1px 2px #000; /* 为移动端添加阴影 */
            }

            .bet-amount {
                font-size: 38px; /* 调整字体大小 */
                color: #FEEA00; /* 同步颜色 */
                /* 为移动端添加更细的描边 */
                text-shadow: 
                    -1px -1px 0 #000, 
                     1px -1px 0 #000, 
                    -1px  1px 0 #000, 
                     1px  1px 0 #000;
            }

            .divider {
                height: 45px; /* 调整高度 */
                width: 2px; /* 调整宽度 */
            }

            .schedule-section {
                padding: 28px 25px; /* 调整内边距 */
            }

            .country-name {
                font-size: 40px; /* 调整字体大小 */
                text-shadow: 2px 2px 4px rgba(0,0,0,0.3); /* 添加文字阴影以匹配图片效果 */
            }

            .time {
                font-size: 40px; /* 调整字体大小 */
                text-shadow: 2px 2px 4px rgba(0,0,0,0.3); /* 添加文字阴影以匹配图片效果 */
            }

            .schedule-item {
                margin-bottom: 20px; /* 调整外边距 */
            }

            .schedule-divider {
                margin: 20px auto; /* 调整外边距 */
            }
            
            /* 调整所有详情部分的字体和间距 */
            .details-section {
                padding: 20px; /* MODIFIED: 移除顶部内边距，保留ด้านข้าง */
            }

            .section-title {
                font-size: 25px;
                margin-bottom: 18px;
                padding-bottom: 12px;
            }
            
            /* --- MODIFICATION: 调整移动端下划线的粗细 --- */
            .section-title::after {
                height: 4px; 
            }

            .race-info {
                font-size: 28px;
                line-height: 1.7;
                margin-bottom: 6px;
            }
        }

        /* Adjust button position for desktop */
        @media (min-width: 769px) {
            .back-to-top {
                bottom: 40px;
                right: 400px;
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
    <div class="container">
        <!-- Hero Section -->
        <div class="hero-section">
            <div class="hero-content">
                <!-- MODIFICATION: 使用占位符图片以便预览 -->
                <img src="{{ asset('images/winbox_horse/my-horse-0.png') }}" alt="Horse Racing" class="horse-image">
            </div>
        </div>

        <!-- Details Section -- UPDATED -->
        <div class="details-section">
            <div class="section-title">赛马赛事最高投注 📢</div>
            <div class="race-info">
                🏇🔥 <br><strong>赛马赛事投注额高达</strong><br>
                头= MYR 10,000<br>
                角= MYR 10,000
            </div>

            <div class="section-title" style="margin-top: 35px; text-transform: uppercase;">Horse Racing Maximum Bet 📢</div>
             <div class="race-info">
                🏇🔥 <br><strong>Horse Racing maximum bet up to</strong><br>
                WIN= MYR 10,000<br>
                PLC = MYR 10,000
            </div>
        </div>
    </div>

        <!-- [新增] 返回顶部按钮 (实心箭头, 橙色主题) -->
    <button onclick="topFunction()" id="backToTopBtn" class="back-to-top" title="Go to top">
        <!-- 实心箭头 SVG (白色) -->
        <svg viewBox="0 0 24 24">
            <!-- 向上实心箭头的路径 -->
            <path d="M12 4l-8 8h6v8h4v-8h6z"></path>
        </svg>
    </button>

    <!-- [新增] 用于滚动检测和返回顶部的 JAVASCRIPT -->
    <script>
        // 获取按钮元素
        let mybutton = document.getElementById("backToTopBtn");

        // 监听屏幕滚动事件 (Scroll)
        window.addEventListener('scroll', function() {
            // 如果向下滚动超过 100px，则添加 'show' 类来显示按钮
            if (window.scrollY > 30) {
                mybutton.classList.add("show");
            } else {
                // 否则，移除 'show' 类来隐藏按钮
                mybutton.classList.remove("show");
            }
        });

        // 点击按钮时触发的函数，页面平滑滚动回顶部
        function topFunction() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>