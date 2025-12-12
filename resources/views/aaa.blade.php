<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHRIMP.OS | 未来主义钓虾体验</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;900&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        /* ================= 1. 核心变量与重置 ================= */
        :root {
            --bg-light: #E1F5FE;
            --bg-deep: #81D4FA;
            --text-dark: #014377;
            --accent-glow: #00E5FF;
            --glass-bg: rgba(255, 255, 255, 0.7);
            --border-glow: 0 0 15px rgba(1, 87, 155, 0.2), 0 0 5px var(--accent-glow);
            --font-title: 'Orbitron', sans-serif;
            --font-body: 'Roboto', sans-serif;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; scroll-behavior: smooth; }
        body { background: var(--bg-light); font-family: var(--font-body); color: var(--text-dark); overflow-x: hidden; }

        /* ================= 2. 动态背景 ================= */
        .background-animation {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;
            background: linear-gradient(180deg, #E1F5FE 0%, #B3E5FC 100%); overflow: hidden;
        }
        .wave {
            position: absolute; background: rgba(255, 255, 255, 0.4); border-radius: 40%;
            width: 200vw; height: 200vw; margin-left: -50vw; bottom: -180vw; opacity: 0.5;
            animation: drift 15s infinite linear;
        }
        .wave:nth-child(2) { animation-duration: 18s; background: rgba(1, 87, 155, 0.05); bottom: -185vw; }
        .wave:nth-child(3) { animation-duration: 20s; background: rgba(79, 195, 247, 0.1); bottom: -175vw; }
        @keyframes drift { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }

        /* ================= 3. 通用组件 ================= */
        .glass-card {
            background: var(--glass-bg); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
            border: 2px solid var(--text-dark); border-radius: 20px; box-shadow: var(--border-glow);
            transition: 0.3s;
        }
        .glass-card:hover { box-shadow: 0 0 30px var(--accent-glow); }

        .btn {
            padding: 15px 40px; font-family: var(--font-title); font-weight: 700; text-transform: uppercase;
            color: var(--text-dark); background: transparent; border: 2px solid var(--text-dark);
            position: relative; overflow: hidden; cursor: pointer; z-index: 1; transition: 0.4s;
            box-shadow: var(--border-glow); text-decoration: none; display: inline-block; margin-top: 20px;
        }
        .btn:hover { color: #fff; background: var(--text-dark); box-shadow: 0 0 25px var(--text-dark); }

        h1, h2, h3 { font-family: var(--font-title); text-transform: uppercase; letter-spacing: 2px; }
        .section-title {
            font-size: 3rem; text-align: center; width: 100%; margin: 0 auto 4rem auto; display: block;
            color: var(--text-dark); position: relative;
        }
        .section-title::after {
            content: ''; display: block; width: 100px; height: 4px; background: var(--text-dark);
            margin: 15px auto 0 auto; box-shadow: 0 0 10px var(--accent-glow);
        }

        section { min-height: 100vh; padding: 80px 10%; position: relative; display: flex; flex-direction: column; justify-content: center; }

        /* ================= 4. 导航栏 ================= */
        nav {
            display: flex; justify-content: space-between; align-items: center; padding: 20px 5%;
            position: fixed; width: 100%; z-index: 1000; background: rgba(225, 245, 254, 0.9);
            backdrop-filter: blur(10px); border-bottom: 1px solid var(--text-dark);
        }
        .logo { font-family: var(--font-title); font-size: 1.8rem; font-weight: 900; color: var(--text-dark); text-shadow: 0 0 10px var(--accent-glow); }
        .nav-links { display: flex; list-style: none; gap: 30px; }
        .nav-links a { text-decoration: none; color: var(--text-dark); font-weight: 700; transition: 0.3s; }
        .nav-links a:hover { color: #0288D1; text-shadow: 0 0 8px var(--accent-glow); }
        .menu-btn { display: none; font-size: 1.5rem; cursor: pointer; }

        /* ================= 5. Hero Section ================= */
        #home { flex-direction: row; align-items: center; justify-content: space-between; perspective: 1000px; }
        .hero-content { width: 45%; z-index: 2; }
        .hero-content h1 { font-size: 4rem; line-height: 1.1; margin-bottom: 20px; color: var(--text-dark); text-shadow: 0 0 15px rgba(0, 229, 255, 0.4); }
        .hero-visual { width: 50%; height: 500px; display: flex; justify-content: center; align-items: center; transform-style: preserve-3d; }
        .tilt-card {
            width: 320px; height: 450px; background: rgba(255, 255, 255, 0.3); border: 3px solid var(--text-dark);
            border-radius: 25px; transform-style: preserve-3d; box-shadow: 0 20px 50px rgba(0,0,0,0.1), 0 0 30px var(--accent-glow);
            display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;
        }
        .floating-element { transform: translateZ(50px); font-size: 8rem; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.2)); }
        .card-text { transform: translateZ(30px); color: var(--text-dark); margin-top: 20px; font-weight: 700; }

        /* ================= 6. About Section ================= */
        #about .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; align-items: center; width: 100%; }
        .about-img-wrapper { position: relative; height: 400px; width: 100%; }
        .about-img { width: 100%; height: 100%; object-fit: cover; border-radius: 20px; border: 2px solid var(--text-dark); box-shadow: var(--border-glow); }

        /* ================= 7. Gallery Section (更新版 - 按钮在下方) ================= */
        #gallery {
            padding: 30px 5%;
            overflow: hidden;
        }

        /* 轮播轨道容器 */
        .slider-container {
            position: relative;
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            overflow: hidden;
            /* padding: 20px 0 30px 0; 底部padding减少，因为按钮移出去了 */
        }

        .slider-track {
            display: flex;
            transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1);
            width: 100%;
        }

        .slider-item {
            flex-shrink: 0;
            padding: 0 15px;
            box-sizing: border-box;
            width: 25%; /* 默认 Desktop */
        }

        .gallery-card {
            width: 100%;
            height: 450px;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            border: 2px solid var(--text-dark);
            box-shadow: var(--border-glow);
            transition: all 0.3s ease;
            background: #fff;
            cursor: pointer;
        }

        .gallery-card img {
            width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; display: block;
        }

        .gallery-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 229, 255, 0.4);
            border-color: var(--accent-glow);
        }
        .gallery-card:hover img { transform: scale(1.1); }

        .gallery-overlay {
            position: absolute; bottom: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(to top, rgba(1, 67, 119, 0.9) 0%, transparent 60%);
            display: flex; flex-direction: column; justify-content: flex-end; padding: 30px;
            opacity: 0; transition: 0.3s;
        }
        .gallery-card:hover .gallery-overlay { opacity: 1; }
        .gallery-overlay h3 { color: #fff; font-size: 1.5rem; transform: translateY(20px); transition: 0.4s; }
        .gallery-card:hover .gallery-overlay h3 { transform: translateY(0); }

        /* ----- 新增：按钮控制器容器 ----- */
        .slider-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px; /* 两个箭头的间距 */
            margin-top: 20px;
            margin-bottom: 10px;
            width: 100%;
        }

        /* 更新后的按钮样式 (移除了 Absolute Positioning) */
        .slider-btn {
            position: relative; /* 恢复正常流定位 */
            transform: none;    /* 移除之前的垂直居中偏移 */
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid var(--text-dark);
            border-radius: 50%;
            color: var(--text-dark);
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: var(--border-glow);
        }

        .slider-btn:hover {
            background: var(--text-dark);
            color: #fff;
            box-shadow: 0 0 25px var(--accent-glow);
        }

        .slider-btn.disabled {
            opacity: 0.3;
            cursor: not-allowed;
            pointer-events: none;
        }

        /* 提示文字 */
        .swipe-hint {
            text-align: center; margin-top: 15px; font-weight: 700; opacity: 0.6; letter-spacing: 1px; display: none;
        }

        /* ================= 8. Reviews Section ================= */
        .review-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; width: 100%; }
        .review-item { padding: 40px; text-align: left; position: relative; }
        .quote-icon { font-size: 4rem; color: rgba(1, 67, 119, 0.1); position: absolute; top: 10px; left: 10px; font-family: serif; }
        .stars { color: #FFD700; margin-bottom: 15px; }

        /* ================= 9. Info & Map ================= */
        #info .info-layout { display: flex; gap: 30px; flex-wrap: wrap; width: 100%; }
        .info-details { flex: 1; padding: 40px; min-width: 300px; }
        .info-row { margin-bottom: 25px; display: flex; align-items: baseline; gap: 10px; }
        .info-row h4 { min-width: 120px; color: var(--text-dark); font-weight: 700; }
        .map-container { flex: 1; min-width: 300px; height: 450px; border: 2px solid var(--text-dark); border-radius: 20px; overflow: hidden; box-shadow: var(--border-glow); background: #eee; }
        iframe { width: 100%; height: 100%; border: none; }

        /* ================= 10. Footer ================= */
        footer { text-align: center; padding: 30px; background: var(--text-dark); color: white; font-family: var(--font-title); letter-spacing: 2px; }

        /* ================= 11. 响应式适配 ================= */
        
        /* iPad / Tablet */
        @media (max-width: 1024px) {
            section { padding: 30px 5%; }
            .hero-content h1 { font-size: 3.2rem; }
            /* Gallery: 一行 2 个 */
            .slider-item { width: 50%; }
            .swipe-hint { display: block; } 
        }

        /* Mobile */
        @media (max-width: 768px) {
            .section-title { font-size: 2rem; margin-bottom: 1.5rem; }
            .menu-btn { display: block; color: var(--text-dark); }
            .nav-links {
                position: absolute; top: 70px; right: 0; width: 100%; background: var(--bg-light);
                flex-direction: column; align-items: center; padding: 20px 0; display: none;
                border-bottom: 2px solid var(--text-dark); box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            }
            .nav-links.active { display: flex; }
            
            #home { flex-direction: column-reverse; text-align: center; padding-top: 150px; gap: 50px; }
            .hero-content, .hero-visual { width: 100%; }
            .hero-visual { height: 350px; }
            .hero-content h1 { font-size: 2.5rem; }
            #about .about-grid { grid-template-columns: 1fr; }

            /* Gallery: 一行 1 个 */
            .slider-item { width: 100%; }
            .gallery-card { height: 400px; }
            
            /* 手机端稍微缩小按钮 */
            .slider-btn { width: 50px; height: 50px; font-size: 1.2rem; }
        }

        /* Animation Classes */
        .hidden { opacity: 0; transform: translateY(50px); transition: all 0.8s cubic-bezier(0.165, 0.84, 0.44, 1); }
        .show { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body>

    <div class="background-animation">
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>

    <nav>
        <div class="logo">SHRIMP.OS</div>
        <div class="menu-btn" onclick="toggleMenu()">☰</div>
        <ul class="nav-links" id="navLinks">
            <li><a href="#home">基地 HOME</a></li>
            <li><a href="#about">关于 ABOUT</a></li>
            <li><a href="#gallery">图库 GALLERY</a></li>
            <li><a href="#reviews">评价 REVIEWS</a></li>
            <li><a href="#info">位置 INFO</a></li>
        </ul>
    </nav>

    <section id="home">
        <div class="hero-content hidden">
            <h1>NEXT GEN<br>PRAWN FISHING</h1>
            <p style="font-size: 1.2rem; margin-bottom: 2rem; font-weight: 500;">沉浸式室内钓虾体验。全天候恒温，巨型蓝钳大虾，等你来战。</p>
            <a href="#info" class="btn">立即预约</a>
        </div>
        <div class="hero-visual hidden" id="tiltContainer">
            <div class="tilt-card" id="tiltCard">
                <div class="floating-element">🦐</div>
                <h2 class="card-text">S-RANK<br>GIANT PRAWN</h2>
                <div class="card-text" style="font-size: 0.9rem; font-weight: 400; margin-top:5px;">Live Status: Active</div>
            </div>
        </div>
    </section>

    <section id="about">
        <h2 class="section-title hidden">关于我们 / ABOUT</h2>
        <div class="about-grid">
            <div class="about-img-wrapper hidden">
                <img src="https://images.unsplash.com/photo-1516684669134-de6d7c47743b?q=80&w=1000&auto=format&fit=crop" alt="Fishing Place" class="about-img">
            </div>
            <div class="glass-card hidden" style="padding: 40px;">
                <h3>城市绿洲，极致体验</h3>
                <br>
                <p>摒弃传统钓虾场的脏乱差，SHRIMP.OS 引入现代水循环过滤系统，确保水质清澈见底。</p>
                <br>
                <p>我们的虾种经过严格筛选，只提供最活跃、体型硕大的淡水蓝钳大虾。配合霓虹灯光氛围和舒适的空调环境，这里不仅是钓虾场，更是年轻人的社交新地标。</p>
                <a href="#gallery" class="btn" style="font-size: 0.8rem;">查看环境</a>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery">
        <h2 class="section-title hidden">现场实况 / GALLERY</h2>
        
        <!-- 1. 图片轮播容器 (只包含图片) -->
        <div class="slider-container hidden">
            <div class="slider-track" id="sliderTrack">
                <!-- Item 1 -->
                <div class="slider-item">
                    <div class="gallery-card">
                        <img src="https://images.unsplash.com/photo-1559806723-048df629e0d0?q=80&w=800&auto=format&fit=crop" alt="环境">
                        <div class="gallery-overlay"><h3>满载而归</h3></div>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="slider-item">
                    <div class="gallery-card">
                        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=800&auto=format&fit=crop" alt="烧烤">
                        <div class="gallery-overlay"><h3>新鲜烧烤</h3></div>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="slider-item">
                    <div class="gallery-card">
                        <img src="https://images.unsplash.com/photo-1621857426350-ddab8b93c505?q=80&w=800&auto=format&fit=crop" alt="大虾">
                        <div class="gallery-overlay"><h3>巨型大虾</h3></div>
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="slider-item">
                    <div class="gallery-card">
                        <img src="https://images.unsplash.com/photo-1555685812-4b943f1cb0eb?q=80&w=800&auto=format&fit=crop" alt="环境">
                        <div class="gallery-overlay"><h3>舒适环境</h3></div>
                    </div>
                </div>
                <!-- Item 5 -->
                <div class="slider-item">
                    <div class="gallery-card">
                        <img src="https://images.unsplash.com/photo-1534409039973-740b2f5d82e8?q=80&w=800&auto=format&fit=crop" alt="快乐">
                        <div class="gallery-overlay"><h3>家庭聚会</h3></div>
                    </div>
                </div>
                <!-- Item 6 -->
                <div class="slider-item">
                    <div class="gallery-card">
                        <img src="https://images.unsplash.com/photo-1550547660-d9450f859349?q=80&w=800&auto=format&fit=crop" alt="美食">
                        <div class="gallery-overlay"><h3>美味享受</h3></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. 按钮控制器 (显示在图片下方) -->
        <div class="slider-controls hidden">
            <button class="slider-btn prev-btn" id="prevBtn">&#10094;</button>
            <button class="slider-btn next-btn" id="nextBtn">&#10095;</button>
        </div>
        
        <!-- 3. 提示文字 (显示在按钮下方) -->
        <p class="swipe-hint hidden">&larr; 滑动或点击按钮查看更多 &rarr;</p>
    </section>

    <section id="reviews">
        <h2 class="section-title hidden">玩家评价 / REVIEWS</h2>
        <div class="review-grid">
            <div class="glass-card review-item hidden">
                <div class="quote-icon">“</div>
                <div class="stars">★★★★★</div>
                <p>太酷了！这是我去过最干净的钓虾场。灯光很有氛围感，虾也很大只，直接现烤现吃味道绝了。</p>
                <h4 style="margin-top: 20px; text-align: right;">- @Kenny_G</h4>
            </div>
            <div class="glass-card review-item hidden">
                <div class="quote-icon">“</div>
                <div class="stars">★★★★☆</div>
                <p>服务员很专业，教了我怎么看漂。虽然价格比路边摊贵一点，但环境和服务完全值回票价。</p>
                <h4 style="margin-top: 20px; text-align: right;">- Sarah Tan</h4>
            </div>
            <div class="glass-card review-item hidden">
                <div class="quote-icon">“</div>
                <div class="stars">★★★★★</div>
                <p>周末聚会首选。不像其他地方那样热和有烟味，这里冷气很足，很适合带家人朋友来。</p>
                <h4 style="margin-top: 20px; text-align: right;">- Jason Lim</h4>
            </div>
        </div>
    </section>

    <section id="info">
        <h2 class="section-title hidden">营业情报 / DATA</h2>
        <div class="info-layout">
            <div class="glass-card info-details hidden">
                <div class="info-row">
                    <h4>OPEN TIME</h4>
                    <div><p>Mon - Fri: 10:00 - 02:00</p><p>Sat - Sun: 09:00 - 03:00</p></div>
                </div>
                <div class="info-row"><h4>HOLIDAY</h4><p>Open All Public Holidays</p></div>
                <div class="info-row"><h4>ADDRESS</h4><p>101, Cyber Water Road, Tech District, 56000 Kuala Lumpur</p></div>
                <div class="info-row"><h4>CONTACT</h4><p>+60 12-345 6789</p></div>
                <a href="#" class="btn" style="width: 100%; text-align: center;">GOOGLE MAP 导航</a>
            </div>
            <div class="map-container hidden">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.8!2d101.6!3d3.1!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zM!5e0!3m2!1sen!2smy!4v1600000000000!5m2!1sen!2smy" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <footer><p>&copy; 2025 SHRIMP.OS | DESIGNED FOR THE FUTURE</p></footer>

    <script>
        // 1. 滚动显现
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('show');
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.hidden').forEach(el => observer.observe(el));

        // 2. 3D Tilt Effect
        const container = document.getElementById('tiltContainer');
        const card = document.getElementById('tiltCard');
        if(container && card) {
            container.addEventListener('mousemove', (e) => {
                const rect = container.getBoundingClientRect();
                const x = e.clientX - rect.left; const y = e.clientY - rect.top;
                const xPct = (x / rect.width - 0.5) * 2; const yPct = (y / rect.height - 0.5) * 2;
                card.style.transform = `rotateX(${yPct * -20}deg) rotateY(${xPct * 20}deg)`;
            });
            container.addEventListener('mouseleave', () => { card.style.transform = `rotateX(0deg) rotateY(0deg)`; });
        }

        // 3. 手机菜单
        function toggleMenu() { document.getElementById('navLinks').classList.toggle('active'); }
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => { document.getElementById('navLinks').classList.remove('active'); });
        });

        // ================= 4. Gallery Slider Logic =================
        const track = document.getElementById('sliderTrack');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const slides = document.querySelectorAll('.slider-item');
        
        let currentIndex = 0;
        let itemsPerView = 4;

        function updateItemsPerView() {
            if (window.innerWidth <= 768) {
                itemsPerView = 1;
            } else if (window.innerWidth <= 1024) {
                itemsPerView = 2;
            } else {
                itemsPerView = 4;
            }
            updateCarousel();
        }

        function updateCarousel() {
            const maxIndex = slides.length - itemsPerView;
            if (currentIndex < 0) currentIndex = 0;
            if (currentIndex > maxIndex) currentIndex = maxIndex;

            const percentage = currentIndex * (100 / itemsPerView);
            track.style.transform = `translateX(-${percentage}%)`;

            prevBtn.classList.toggle('disabled', currentIndex === 0);
            nextBtn.classList.toggle('disabled', currentIndex >= maxIndex);
        }

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        });

        nextBtn.addEventListener('click', () => {
            const maxIndex = slides.length - itemsPerView;
            if (currentIndex < maxIndex) {
                currentIndex++;
                updateCarousel();
            }
        });

        let touchStartX = 0;
        let touchEndX = 0;

        track.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        }, {passive: true});

        track.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }, {passive: true});

        function handleSwipe() {
            const swipeThreshold = 50;
            if (touchEndX < touchStartX - swipeThreshold) {
                nextBtn.click();
            }
            if (touchEndX > touchStartX + swipeThreshold) {
                prevBtn.click();
            }
        }

        window.addEventListener('resize', updateItemsPerView);
        updateItemsPerView();
    </script>
</body>
</html>