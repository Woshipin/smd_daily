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
            padding: 0; /* MODIFIED: 移除顶部内边距，以使用 margin 控制间距 */
        }

        /* --- MODIFICATION START: เพิ่มกฎใหม่เพื่อควบคุมช่องว่าง --- */
        .details-section:first-of-type {
            margin-top: 35px; /* ตั้งค่าช่องว่างด้านบนสำหรับรายละเอียดแรก */
        }

        .details-section + .details-section {
            margin-top: 15px; /* ตั้งค่าช่องว่างด้านบนสำหรับรายละเอียดที่ตามมา */
        }
        /* --- MODIFICATION END --- */

        /* --- 详情区域的标题（中文/英文） --- */
        .section-title {
            color: #003D5C; /* 深蓝色文字 */
            font-size: 35px; /* 字体大小 */
            font-weight: 700; /* 字体加粗 */
            margin-bottom: 10px; /* 底部外边距 */
            padding-bottom: 15px; /* 底部内边距 */
            margin-top: 35px; /* 顶部外边距 */
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

        /* --- 赛事详情包裹器 --- */
        .race-details {
            margin-bottom: 30px; /* 底部外边距 */
        }

        .race-details:last-of-type {
            margin-bottom: 35px; /* 最后一个详情项的底部外边距 */
        }
        
        /* --- 赛事标题行 --- */
        .race-header {
            display: flex; /* Flexbox布局 */
            align-items: center; /* 垂直居中 */
            gap: 10px; /* 间距 */
            margin-bottom: 12px; /* 底部外边距 */
        }

        /* --- 地点图标 --- */
        .location-icon {
            font-size: 24px; /* 图标大小 */
        }

        /* --- 赛事地点文本 --- */
        .race-location {
            color: #003D5C; /* 深蓝色文字 */
            font-weight: 700; /* 字体加粗 */
            font-size: 27px; /* 字体大小 */
        }
        
        /* --- 赛事信息文本 --- */
        .race-info {
            color: #003D5C; /* 深灰色文字 */
            font-size: 25px; /* 字体大小 */
            line-height: 1.8; /* 行高 */
            margin-bottom: 8px; /* 底部外边距 */
            font-weight: 400; /* 正常字重 */
        }

        /* --- 改进开始：为 .race-info 中的 strong 标签添加样式 --- */
        .race-info strong {
            font-weight: 700; /* 设置更粗的字重，覆盖默认的 400 */
        }
        /* --- 改进结束 --- */

        /* --- 赛事时间文本 --- */
        .race-time {
            color: #003D5C; /* 深蓝色文字 */
            font-weight: 700; /* 字体加粗 */
            font-size: 27px; /* 字体大小 */
            margin-top: 8px; /* 顶部外边距 */
        }

        /* --- 英文提醒区域 --- */
        .reminder-section {
            margin-top: 25px; /* 顶部外边距 */
        }

        /* --- 英文提醒标题 --- */
        .reminder-title {
            color: #003D5C; /* 深蓝色文字 */
            font-size: 28px; /* 字体大小 */
            font-weight: 700; /* 字体加粗 */
            margin-bottom: 25px; /* 底部外边距 */
            padding-bottom: 15px; /* 底部内边距 */
            position: relative; /* 为伪元素定位设置相对位置 */
        }
        
        /* --- MODIFICATION START: 使用伪元素创建下划线 --- */
        .reminder-title::after {
            content: ''; /* 伪元素必需的内容属性 */
            position: absolute; /* 绝对定位，相对于 .reminder-title */
            left: 0; /* 从左侧开始 */
            bottom: 0; /* 定位在底部 */
            width: 100%; /* 在这里修改下划线的宽度 */
            height: 3px; /* 线的粗细 */
            background-color: #003D5C; /* 线的颜色 */
        }
        /* --- MODIFICATION END --- */

        /* --- 提醒项 --- */
        .reminder-item {
            margin-bottom: 25px; /* 底部外边距 */
        }

        .reminder-item:last-child {
            margin-bottom: 0; /* 最后一个提醒项移除底部外边距 */
        }

        /* --- 提醒项副标题 --- */
        .reminder-subtitle {
            color: #003D5C; /* 深蓝色文字 */
            font-weight: 700; /* 字体加粗 */
            font-size: 25px; /* 字体大小 */
            margin-bottom: 8px; /* 底部外边距 */
        }

        /* --- 提醒项文本 --- */
        .reminder-text {
            color: #333; /* 深灰色文字 */
            font-size: 22px; /* 字体大小 */
            line-height: 1.8; /* 行高 */
            margin-bottom: 6px; /* 底部外边距 */
            font-weight: 400; /* 正常字重 */
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
                font-size: 35px; /* 调整字体大小 */
                text-shadow: 2px 2px 4px rgba(0,0,0,0.3); /* 添加文字阴影以匹配图片效果 */
            }

            .time {
                font-size: 35px; /* 调整字体大小 */
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
                padding: 0 20px; /* MODIFIED: 移除顶部内边距，保留ด้านข้าง */
            }

            .section-title {
                font-size: 22px;
                margin-bottom: 18px;
                padding-bottom: 12px;
            }
            
            /* --- MODIFICATION: 调整移动端下划线的粗细 --- */
            .section-title::after {
                height: 4px; 
            }

            .race-details {
                margin-bottom: 22px;
            }

            .race-details:last-of-type {
                margin-bottom: 25px;
            }

            .race-header {
                gap: 8px;
                margin-bottom: 10px;
            }

            .location-icon {
                font-size: 18px;
            }

            .race-location {
                font-size: 22px;
            }

            .race-info {
                font-size: 23px;
                line-height: 1.7;
                margin-bottom: 6px;
            }

            .race-time {
                font-size: 22px;
                margin-top: 6px;
            }

            .reminder-section {
                margin-top: 35px;
            }

            .reminder-title {
                font-size: 21px;
                margin-bottom: 18px;
                padding-bottom: 12px;
            }
            
            /* --- MODIFICATION: 移动端下划线粗细已在桌面端设置，此处无需重复 --- */

            .reminder-item {
                margin-bottom: 20px;
            }

            .reminder-subtitle {
                font-size: 22px;
                margin-bottom: 6px;
            }

            .reminder-text {
                font-size: 21px;
                line-height: 1.7;
                margin-bottom: 5px;
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
                <img src="{{ asset('images/winbox_horse/horse-th.jpg') }}" alt="Horse Racing" class="horse-image">
            </div>
        </div>

        @if($thhorse2->isNotEmpty())
            <!-- Schedule Section -->
            <div class="schedule-section">
                @foreach($thhorse2 as $thhorse2item)
                    <div class="schedule-item">
                        <div class="country-name">{!! $thhorse2item->location !!}</div>
                        <div class="time">{{ \Carbon\Carbon::parse($thhorse2item->time)->format('H:i') }} (GMT+7)</div>
                    </div>
                    
                    {{-- This divider will only show up BETWEEN items, not after the last one. --}}
                    @if(!$loop->last)
                        <div class="schedule-divider"></div>
                    @endif
                @endforeach
            </div>
        @endif

        @if($thhorse2descriptions->isNotEmpty())
            @foreach($thhorse2descriptions as $thhorse2description)
                <!-- Details Section -->
                <div class="details-section">
                    <div class="section-title">{!! $thhorse2description->title !!}</div>
                    <div class="race-details">
                        <div class="race-info">{!! $thhorse2description->information !!}</div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>