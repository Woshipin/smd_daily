<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>赛马图片导出工具 - 精确尺寸版</title>

    <style>
        /* --- 基础布局 --- */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 { color: #333; margin-bottom: 30px; }

        .group-container {
            background: #e2e8f0;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 50px;
            width: fit-content;
            min-width: 1080px;
            border: 2px solid #cbd5e1;
        }

        .group-title {
            font-size: 24px;
            color: #1e293b;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #009e4d;
            display: inline-block;
            font-weight: bold;
        }

        section {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        /* 图片预览容器：不影响导出尺寸 */
        .image-container {
            position: relative;
            display: inline-block;
            line-height: 0;
            background: #eee;
            border-radius: 6px;
            overflow: hidden;
            border: 1px solid #ddd;
        }

        .racing-image { display: block; height: auto; }

        /* 预览时的视觉尺寸（不影响导出） */
        .img-pc { width: 1032px; }
        .img-mobile { width: 1290px; max-width: 800px; }

        /* 预览文字样式 */
        .common-text-style {
            position: absolute;
            z-index: 10;
            text-align: center;
            font-family: "Arial", sans-serif;
            font-weight: 600;
            color: #ffffff;
            line-height: 1.15;
            -webkit-text-stroke: 2px #3e1e04;
            paint-order: stroke fill;
            text-shadow: 5px 5px 0 #3e1e04;
        }
        .common-text-style span { display: block; }

        /* PC预览文字位置 */
        .pc-overlay-pos { left: 40px; bottom: 37px; }
        .pc-overlay-pos .country-text { font-size: 42px; }
        .pc-overlay-pos .time-text    { font-size: 44px; }

        /* 手机预览文字位置 (由于预览图被缩小，这里仅做示意) */
        .mobile-overlay-pos { left: 45px; bottom: 50px; }
        .mobile-overlay-pos .country-text { font-size: 34px; }
        .mobile-overlay-pos .time-text    { font-size: 36px; }

        /* 按钮与信息 */
        .controls { display: flex; flex-direction: column; gap: 8px; }

        .download-btn {
            background: linear-gradient(135deg, #009e4d 0%, #00c853 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .download-btn:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0, 158, 77, 0.4); }
        .download-btn:disabled { background: #ccc; cursor: not-allowed; }

        .size-info { color: #d32f2f; font-weight: bold; font-size: 14px; }

        @media (max-width: 1150px) {
            .group-container { min-width: 95%; }
            .img-pc { max-width: 100%; }
        }
    </style>
</head>
<body>

    <h1>🏇 赛马图片导出系统 (强制尺寸版)</h1>

    <!-- ================== MY ================== -->
    <div class="group-container">
        <div class="group-title">🇲🇾 MY Version</div>
        <section>
            <div class="content-wrapper">
                <div class="image-container">
                    <img src="{{ asset('images/images/horse-image/horse-my-1-pc.png') }}" class="racing-image img-pc" crossorigin="anonymous">
                    <div id="my-pc" class="common-text-style pc-overlay-pos">
                        <span class="country-text">Malaysia</span>
                        <span class="time-text">15:45 (GMT+8)</span>
                    </div>
                </div>
                <div class="controls">
                    <div class="size-info">强制输出尺寸：1032 x 320 px</div>
                    <button class="download-btn" onclick="exportImg('my-pc', '{{ asset('images/images/horse-image/horse-my-1-pc.png') }}', 'MY_PC.png', 42, 40, 185, 1032, 320)">💾 导出 PC 图片</button>
                </div>
            </div>
        </section>

        <section>
            <div class="content-wrapper">
                <div class="image-container">
                    <img src="{{ asset('images/images/horse-image/horse-my-1-mobile.png') }}" class="racing-image img-mobile" crossorigin="anonymous">
                    <div id="my-mob" class="common-text-style mobile-overlay-pos">
                        <span class="country-text">Malaysia</span>
                        <span class="time-text">15:00 (GMT+8)</span>
                    </div>
                </div>
                <div class="controls">
                    <div class="size-info">强制输出尺寸：1290 x 490 px</div>
                    <button class="download-btn" onclick="exportImg('my-mob', '{{ asset('images/images/horse-image/horse-my-1-mobile.png') }}', 'MY_Mobile.png', 55, 70, 285, 1290, 490)">💾 导出手机图片</button>
                </div>
            </div>
        </section>
    </div>

    <!-- ================== MY-USD ================== -->
    <div class="group-container">
        <div class="group-title">💵 MY-USD Version</div>
        <section>
            <div class="content-wrapper">
                <div class="image-container">
                    <img src="{{ asset('images/images/horse-image/horse-my-usd-1-pc.png') }}" class="racing-image img-pc" crossorigin="anonymous">
                    <div id="my-usd-pc" class="common-text-style pc-overlay-pos">
                        <span class="country-text">Malaysia</span>
                        <span class="time-text">11:45 (GMT+8)</span>
                    </div>
                </div>
                <div class="controls">
                    <div class="size-info">强制输出尺寸：1032 x 320 px</div>
                    <button class="download-btn" onclick="exportImg('my-usd-pc', '{{ asset('images/images/horse-image/horse-my-usd-1-pc.png') }}', 'MY_USD_PC.png', 42, 40, 185, 1032, 320)">💾 导出 PC 图片</button>
                </div>
            </div>
        </section>

        <section>
            <div class="content-wrapper">
                <div class="image-container">
                    <img src="{{ asset('images/images/horse-image/horse-my-usd-1-mobile.png') }}" class="racing-image img-mobile" crossorigin="anonymous">
                    <div id="my-usd-mob" class="common-text-style mobile-overlay-pos">
                        <span class="country-text">Malaysia</span>
                        <span class="time-text">11:00 (GMT+8)</span>
                    </div>
                </div>
                <div class="controls">
                    <div class="size-info">强制输出尺寸：1290 x 490 px</div>
                    <button class="download-btn" onclick="exportImg('my-usd-mob', '{{ asset('images/images/horse-image/horse-my-usd-1-mobile.png') }}', 'MY_USD_Mobile.png', 55, 70, 285, 1290, 490)">💾 导出手机图片</button>
                </div>
            </div>
        </section>
    </div>

    <!-- ================== TH ================== -->
    <div class="group-container">
        <div class="group-title">🇹🇭 TH Version</div>
        <section>
            <div class="content-wrapper">
                <div class="image-container">
                    <img src="{{ asset('images/images/horse-image/horse-th-1-pc.png') }}" class="racing-image img-pc" crossorigin="anonymous">
                    <div id="th-pc" class="common-text-style pc-overlay-pos">
                        <span class="country-text">Malaysia</span>
                        <span class="time-text">13:45 (GMT+8)</span>
                    </div>
                </div>
                <div class="controls">
                    <div class="size-info">强制输出尺寸：1032 x 320 px</div>
                    <button class="download-btn" onclick="exportImg('th-pc', '{{ asset('images/images/horse-image/horse-th-1-pc.png') }}', 'TH_PC.png', 42, 40, 185, 1032, 320)">💾 导出 PC 图片</button>
                </div>
            </div>
        </section>

        <section>
            <div class="content-wrapper">
                <div class="image-container">
                    <img src="{{ asset('images/images/horse-image/horse-th-1-mobile.png') }}" class="racing-image img-mobile" crossorigin="anonymous">
                    <div id="th-mob" class="common-text-style mobile-overlay-pos">
                        <span class="country-text">Malaysia</span>
                        <span class="time-text">13:00 (GMT+8)</span>
                    </div>
                </div>
                <div class="controls">
                    <div class="size-info">强制输出尺寸：1290 x 490 px</div>
                    <button class="download-btn" onclick="exportImg('th-mob', '{{ asset('images/images/horse-image/horse-th-1-mobile.png') }}', 'TH_Mobile.png', 55, 70, 285, 1290, 490)">💾 导出手机图片</button>
                </div>
            </div>
        </section>
    </div>

    <!-- ================== TH-USD ================== -->
    <div class="group-container">
        <div class="group-title">💵 TH-USD Version</div>
        <section>
            <div class="content-wrapper">
                <div class="image-container">
                    <img src="{{ asset('images/images/horse-image/horse-th-usd-1-pc.png') }}" class="racing-image img-pc" crossorigin="anonymous">
                    <div id="th-usd-pc" class="common-text-style pc-overlay-pos">
                        <span class="country-text">Malaysia</span>
                        <span class="time-text">14:45 (GMT+8)</span>
                    </div>
                </div>
                <div class="controls">
                    <div class="size-info">强制输出尺寸：1032 x 320 px</div>
                    <button class="download-btn" onclick="exportImg('th-usd-pc', '{{ asset('images/images/horse-image/horse-th-usd-1-pc.png') }}', 'TH_USD_PC.png', 42, 40, 185, 1032, 320)">💾 导出 PC 图片</button>
                </div>
            </div>
        </section>

        <section>
            <div class="content-wrapper">
                <div class="image-container">
                    <img src="{{ asset('images/images/horse-image/horse-th-usd-1-mobile.png') }}" class="racing-image img-mobile" crossorigin="anonymous">
                    <div id="th-usd-mob" class="common-text-style mobile-overlay-pos">
                        <span class="country-text">Malaysia</span>
                        <span class="time-text">14:00 (GMT+8)</span>
                    </div>
                </div>
                <div class="controls">
                    <div class="size-info">强制输出尺寸：1290 x 490 px</div>
                    <button class="download-btn" onclick="exportImg('th-usd-mob', '{{ asset('images/images/horse-image/horse-th-usd-1-mobile.png') }}', 'TH_USD_Mobile.png', 55, 70, 285, 1290, 490)">💾 导出手机图片</button>
                </div>
            </div>
        </section>
    </div>

    <script>
        /**
         * @param {number} outW - 强制输出宽度
         * @param {number} outH - 强制输出高度
         */
        function exportImg(containerId, imageSrc, fileName, fontSize, marginLeft, marginTop, outW, outH) {
            const btn = event.currentTarget;
            const container = document.getElementById(containerId);
            const textCountry = container.querySelector('.country-text').innerText;
            const textTime = container.querySelector('.time-text').innerText;

            const originalText = btn.innerHTML;
            btn.innerHTML = '⏳ 导出中...';
            btn.disabled = true;

            const img = new Image();
            img.crossOrigin = "Anonymous";
            img.src = imageSrc;

            img.onload = function() {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');

                // 【核心修改】强制设置 Canvas 为目标尺寸
                canvas.width = outW;
                canvas.height = outH;

                // 1. 绘制背景 (强制拉伸到目标尺寸，确保图片填满)
                ctx.drawImage(img, 0, 0, outW, outH);

                // 2. 文字配置
                ctx.font = `600 ${fontSize}px "Arial", sans-serif`;
                ctx.textBaseline = 'top';
                ctx.textAlign = 'center';
                ctx.lineJoin = 'round';
                ctx.miterLimit = 2;

                const widthCountry = ctx.measureText(textCountry).width;
                const widthTime = ctx.measureText(textTime).width;
                const centerX = marginLeft + (Math.max(widthCountry, widthTime) / 2);

                function drawText(text, x, y) {
                    const strokeColor = '#3e1e04';
                    ctx.save();
                    ctx.lineWidth = 10;
                    ctx.strokeStyle = strokeColor;
                    ctx.fillStyle = strokeColor;
                    ctx.strokeText(text, x + 5, y + 5);
                    ctx.fillText(text, x + 5, y + 5);
                    ctx.restore();
                    ctx.lineWidth = 10;
                    ctx.strokeStyle = strokeColor;
                    ctx.strokeText(text, x, y);
                    ctx.fillStyle = '#FFFFFF';
                    ctx.fillText(text, x, y);
                }

                drawText(textCountry, centerX, marginTop);
                drawText(textTime, centerX, marginTop + (fontSize * 1.15));

                canvas.toBlob((blob) => {
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = fileName;
                    a.click();
                    URL.revokeObjectURL(url);
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                }, 'image/png');
            };

            img.onerror = () => {
                alert('图片加载失败');
                btn.innerHTML = originalText;
                btn.disabled = false;
            };
        }
    </script>
</body>
</html>
