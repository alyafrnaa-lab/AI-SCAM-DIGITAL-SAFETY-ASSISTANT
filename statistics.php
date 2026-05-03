<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Statistics - AI Scam & Digital Safety Assistant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        /* ========== RESET & BASE ========== */
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #020617 100%);
            color: #e5e7eb;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
        }

        /* ========== SIDEBAR ========== */
        .sidebar {
            width: 280px;
            background: linear-gradient(145deg, #020617, #1e1b4b);
            border-right: 1px solid #312e81;
            padding: 30px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            transition: all 0.4s ease;
            box-shadow: 5px 0 30px rgba(0, 0, 0, 0.4);
            left: 0;
        }

        /* Desktop: Sidebar sentiasa terbuka */
        @media (min-width: 769px) {
            .sidebar {
                transform: translateX(0) !important;
                width: 280px !important;
            }
            .sidebar-closer {
                display: none !important;
            }
        }

        /* Mobile: Sidebar tersembunyi */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .sidebar-closer {
                display: block;
                position: absolute;
                top: 20px;
                right: 20px;
                background: none;
                border: none;
                color: #c7d2fe;
                font-size: 24px;
                cursor: pointer;
                z-index: 1001;
            }
            .menu-toggle {
                display: flex !important;
            }
        }

        .logo {
            padding: 0 30px 30px;
            border-bottom: 1px solid #312e81;
            margin-bottom: 30px;
            text-align: center;
        }

        .logo i {
            font-size: 48px;
            margin-bottom: 20px;
            display: block;
            background: linear-gradient(135deg, #7c3aed, #4f46e5, #a5b4fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: pulseGlow 2s infinite;
        }

        @keyframes pulseGlow {
            0% { filter: drop-shadow(0 0 10px rgba(124, 58, 237, 0.3)); }
            50% { filter: drop-shadow(0 0 25px rgba(124, 58, 237, 0.7)); }
            100% { filter: drop-shadow(0 0 10px rgba(124, 58, 237, 0.3)); }
        }

        .logo h2 {
            font-size: 22px;
            font-weight: 800;
            background: linear-gradient(90deg, #f9fafb, #a5b4fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 8px;
        }

        .logo p {
            font-size: 12px;
            color: #a5b4fc;
            font-weight: 300;
            line-height: 1.5;
        }

        .nav-menu {
            list-style: none;
            padding: 0 20px;
        }

        .nav-item {
            margin-bottom: 10px;
            position: relative;
        }

        .nav-link {
            color: #c7d2fe;
            text-decoration: none;
            padding: 18px 25px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 18px;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.4s ease;
        }

        .nav-link:hover {
            background: linear-gradient(90deg, rgba(124, 58, 237, 0.2), rgba(79, 70, 229, 0.1));
            color: #a5b4fc;
            transform: translateX(5px);
        }

        .nav-link.active {
            background: linear-gradient(90deg, rgba(124, 58, 237, 0.3), rgba(79, 70, 229, 0.2));
            color: #7c3aed;
            border-left: 5px solid #7c3aed;
            font-weight: 700;
        }

        .nav-link i {
            width: 24px;
            text-align: center;
            font-size: 20px;
        }

        .badge {
            position: absolute;
            right: 20px;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            font-size: 11px;
            padding: 3px 10px;
            border-radius: 12px;
            font-weight: 800;
        }

        .sidebar-footer {
            padding: 25px 30px;
            border-top: 1px solid #312e81;
            margin-top: 40px;
            text-align: center;
        }

        .sidebar-footer p {
            font-size: 12px;
            color: #6b7280;
            line-height: 1.5;
            font-weight: 300;
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 30px;
            min-height: 100vh;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.97), rgba(2, 6, 23, 0.98));
            transition: margin-left 0.4s ease;
            width: calc(100% - 280px);
            box-sizing: border-box;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 20px;
                width: 100%;
            }
        }

        /* ========== MOBILE MENU TOGGLE ========== */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 16px;
            z-index: 999;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(124, 58, 237, 0.3);
        }

        /* ========== HERO HEADER ========== */
        .hero-header {
            background: linear-gradient(135deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        @media (max-width: 768px) {
            .hero-header {
                flex-direction: column;
                text-align: center;
            }
        }

        .header-text {
            flex: 1;
        }

        .header-text h1 {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 15px;
            background: linear-gradient(90deg, #7c3aed, #4f46e5, #a5b4fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .header-text .tagline {
            font-size: 16px;
            color: #c7d2fe;
            line-height: 1.6;
        }

        .header-icon {
            font-size: 80px;
            color: transparent;
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            -webkit-background-clip: text;
            background-clip: text;
        }

        /* ========== STATS CARDS - GRID TERATUR 4 KOLUM ========== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        /* Desktop: 4 cards */
        @media (min-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        /* Tablet: 2 cards */
        @media (min-width: 768px) and (max-width: 1023px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Mobile: 1 card */
        @media (max-width: 767px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        .stat-card {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: #7c3aed;
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.2);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 24px;
            background: rgba(124, 58, 237, 0.15);
            color: #7c3aed;
        }

        .stat-content h4 {
            font-size: 14px;
            color: #c7d2fe;
            margin-bottom: 10px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 800;
            color: #f9fafb;
            margin-bottom: 5px;
            line-height: 1;
        }

        .stat-change {
            font-size: 12px;
            color: #22c55e;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        /* ========== LANDSCAPE LAYOUT FOR CHARTS ========== */
        .landscape-layout {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 30px;
        }

        .landscape-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        @media (max-width: 1024px) {
            .landscape-row {
                grid-template-columns: 1fr;
            }
        }

        .landscape-card {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 15px;
            padding: 25px;
            transition: all 0.3s ease;
            height: 400px; /* Fixed height untuk landscape */
            display: flex;
            flex-direction: column;
        }

        .landscape-card.wide {
            grid-column: 1 / -1;
            height: 500px;
        }

        .landscape-card:hover {
            border-color: #7c3aed;
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.2);
        }

        .card-header {
            margin-bottom: 20px;
            flex-shrink: 0;
        }

        .card-title {
            font-size: 18px;
            color: #f9fafb;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(124, 58, 237, 0.3);
        }

        .card-title i {
            color: #7c3aed;
            font-size: 20px;
        }

        /* ========== LANDSCAPE CHART CONTAINERS ========== */
        .landscape-chart-container {
            width: 100%;
            height: calc(100% - 60px); /* Minus header */
            position: relative;
            flex: 1;
        }

        canvas {
            width: 100% !important;
            height: 100% !important;
        }

        /* ========== MALAYSIA MAP ========== */
        .malaysia-map-container {
            position: relative;
            height: 100%;
            width: 100%;
        }

        #malaysiaMap {
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        .state-tooltip {
            position: absolute;
            background: rgba(15, 23, 42, 0.95);
            border: 2px solid #7c3aed;
            border-radius: 10px;
            padding: 15px;
            color: #e5e7eb;
            font-size: 14px;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s;
            z-index: 100;
            backdrop-filter: blur(10px);
            min-width: 180px;
        }

        /* ========== TIME CONTROLS ========== */
        .time-controls {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .time-btn {
            padding: 12px 24px;
            background: rgba(124, 58, 237, 0.1);
            border: 1px solid #312e81;
            border-radius: 10px;
            color: #c7d2fe;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .time-btn:hover {
            background: rgba(124, 58, 237, 0.2);
            border-color: #7c3aed;
        }

        .time-btn.active {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            color: white;
            box-shadow: 0 0 15px rgba(124, 58, 237, 0.5);
        }

        /* ========== SECTION TITLE ========== */
        .section-title {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .section-title i {
            font-size: 28px;
            color: #7c3aed;
            background: rgba(124, 58, 237, 0.15);
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .section-title h3 {
            font-size: 24px;
            font-weight: 800;
            color: #f9fafb;
        }

        .section-subtitle {
            font-size: 15px;
            color: #c7d2fe;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        /* ========== PREDICTIVE ANALYTICS ========== */
        .predictive-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #06b6d4;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .prediction-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        @media (max-width: 1200px) {
            .prediction-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .prediction-cards {
                grid-template-columns: 1fr;
            }
        }

        .prediction-card {
            background: rgba(6, 182, 212, 0.1);
            border: 2px solid #06b6d4;
            border-radius: 15px;
            padding: 25px;
            transition: all 0.3s ease;
        }

        .prediction-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(6, 182, 212, 0.3);
        }

        .risk-level {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .risk-high { background: rgba(239, 68, 68, 0.2); color: #ef4444; }
        .risk-medium { background: rgba(245, 158, 11, 0.2); color: #f59e0b; }
        .risk-low { background: rgba(34, 197, 94, 0.2); color: #22c55e; }

        /* ========== EXPORT SECTION ========== */
        .export-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            text-align: center;
        }

        .export-options {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
            margin-top: 30px;
        }

        @media (max-width: 1024px) {
            .export-options {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .export-options {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .export-options {
                grid-template-columns: 1fr;
            }
        }

        .export-btn {
            padding: 20px 15px;
            background: rgba(124, 58, 237, 0.1);
            border: 2px solid #7c3aed;
            border-radius: 12px;
            color: #c7d2fe;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .export-btn:hover {
            background: rgba(124, 58, 237, 0.2);
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.2);
        }

        .export-btn i {
            font-size: 30px;
            color: #7c3aed;
        }

        /* ========== FOOTER ========== */
        footer {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
        }

        .disclaimer-box {
            background: linear-gradient(145deg, rgba(245, 158, 11, 0.15), rgba(217, 119, 6, 0.1));
            border: 2px solid #f59e0b;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .disclaimer-box h4 {
            color: #f9fafb;
            font-size: 18px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .disclaimer-box p {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.5;
        }

        /* Footer Links Grid */
        .footer-links {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 10px;
            margin: 25px 0;
        }

        @media (max-width: 1024px) {
            .footer-links {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .footer-links {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .footer-links {
                grid-template-columns: 1fr;
            }
        }

        .footer-link {
            color: #a5b4fc;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            padding: 10px 15px;
            border-radius: 10px;
            background: rgba(124, 58, 237, 0.1);
            justify-content: center;
        }

        .footer-link:hover {
            color: #7c3aed;
            background: rgba(124, 58, 237, 0.2);
        }

        .copyright {
            color: #6b7280;
            font-size: 12px;
            margin-top: 20px;
            line-height: 1.5;
        }

        /* ========== SCROLLBAR ========== */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #1e1b4b;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <!-- Mobile Menu Toggle -->
    <button class="menu-toggle" id="menuToggle">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- SIDEBAR -->
    <nav class="sidebar" id="sidebar">
        <!-- Close Button for Mobile -->
        <button class="sidebar-closer" id="sidebarCloser">
            <i class="fas fa-times"></i>
        </button>
        
        <div class="logo">
            <i class="fas fa-shield-alt"></i>
            <h2>AI Scam Assistant</h2>
            <p>Statistics & Analytics Dashboard</p>
        </div>
        
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="index.php" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
			<li class="nav-item">
                <a href="about-us.php" class="nav-link">
                    <i class="fas fa-book"></i>
                    <span>About Us</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="safety-tips.php" class="nav-link">
                    <i class="fas fa-shield-alt"></i>
                    <span>Safety Tips</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="scam-detection.php" class="nav-link">
                    <i class="fas fa-search"></i>
                    <span>Scam Detection</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="recent-threats.php" class="nav-link">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Recent Threats</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="statistics.php" class="nav-link active">
                    <i class="fas fa-chart-line"></i>
                    <span>Statistics</span>
                    <span class="badge">LIVE</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="report-scam.php" class="nav-link">
                    <i class="fas fa-flag"></i>
                    <span>Report Scam</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="learn-more.php" class="nav-link">
                    <i class="fas fa-cog"></i>
                    <span>Learn More</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="help-support.php" class="nav-link">
                    <i class="fas fa-question-circle"></i>
                    <span>Help & Support</span>
                </a>
            </li>
			<li class="nav-item">
                <a href="feedback.php"  class="nav-link">
                    <i class="fas fa-star"></i>
                    <span>Give Feedback</span>
                </a>
            </li>
        </ul>
        
        <div class="sidebar-footer">
            <p>© 2026 AI Scam & Digital Safety Assistant</p>
            <p>Advanced Analytics System</p>
        </div>
    </nav>
    
    <!-- MAIN CONTENT -->
    <main class="main-content">
        <!-- HERO HEADER -->
        <section class="hero-header">
            <div class="header-text">
                <h1>AI Scam Analytics Dashboard</h1>
                <p class="tagline">
                    Real-time statistics and comprehensive analytics of scam patterns across Malaysia. 
                    Monitor trends, track performance, and make data-driven decisions.
                </p>
            </div>
            <div class="header-icon">
                <i class="fas fa-chart-line"></i>
            </div>
        </section>
        
        <!-- 4 STATS CARDS - GRID TERATUR -->
        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-content">
                    <h4>Scams Detected Today</h4>
                    <div class="stat-number" id="scamsToday">1,247</div>
                    <div class="stat-change">
                        <i class="fas fa-arrow-up"></i> +12% from yesterday
                    </div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="stat-content">
                    <h4>Users Protected</h4>
                    <div class="stat-number" id="usersProtected">45,892</div>
                    <div class="stat-change">
                        <i class="fas fa-arrow-up"></i> +2,341 this week
                    </div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="stat-content">
                    <h4>Messages Analyzed</h4>
                    <div class="stat-number" id="messagesAnalyzed">289,456</div>
                    <div class="stat-change">
                        <i class="fas fa-arrow-up"></i> +8,942 today
                    </div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-percentage"></i>
                </div>
                <div class="stat-content">
                    <h4>Accuracy Rate</h4>
                    <div class="stat-number">96.7%</div>
                    <div class="stat-change">
                        <i class="fas fa-check-circle"></i> Based on 10k verified cases
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Time Controls -->
        <div class="time-controls">
            <button class="time-btn active" onclick="setTimeRange('24h')">
                <i class="fas fa-clock"></i> Last 24 Hours
            </button>
            <button class="time-btn" onclick="setTimeRange('7d')">
                <i class="fas fa-calendar-week"></i> Last 7 Days
            </button>
            <button class="time-btn" onclick="setTimeRange('30d')">
                <i class="fas fa-calendar-alt"></i> Last 30 Days
            </button>
            <button class="time-btn" onclick="setTimeRange('90d')">
                <i class="fas fa-chart-line"></i> Last 90 Days
            </button>
            <button class="time-btn" onclick="setTimeRange('1y')">
                <i class="fas fa-calendar"></i> Last Year
            </button>
        </div>
        
        <!-- LANDSCAPE LAYOUT FOR CHARTS -->
        <div class="landscape-layout">
            <!-- ROW 1: Malaysia Heat Map (WIDE) -->
            <div class="landscape-card wide">
                <div class="card-header">
                    <div class="card-title">
                        <i class="fas fa-map-marked-alt"></i> Malaysia Scam Heat Map
                    </div>
                </div>
                <div class="landscape-chart-container">
                    <div class="malaysia-map-container">
                        <canvas id="malaysiaMap"></canvas>
                        <div class="state-tooltip" id="stateTooltip"></div>
                    </div>
                </div>
            </div>
            
            <!-- ROW 2: Two charts side by side -->
            <div class="landscape-row">
                <!-- Scam Type Distribution -->
                <div class="landscape-card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fas fa-pie-chart"></i> Scam Type Distribution
                        </div>
                    </div>
                    <div class="landscape-chart-container">
                        <canvas id="scamTypeChart"></canvas>
                    </div>
                </div>
                
                <!-- Platform Analysis -->
                <div class="landscape-card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fas fa-mobile-alt"></i> Platform Distribution
                        </div>
                    </div>
                    <div class="landscape-chart-container">
                        <canvas id="platformChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- ROW 3: Two charts side by side -->
            <div class="landscape-row">
                <!-- Time Series Analysis -->
                <div class="landscape-card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fas fa-chart-line"></i> Time Series Analysis
                        </div>
                    </div>
                    <div class="landscape-chart-container">
                        <canvas id="timeSeriesChart"></canvas>
                    </div>
                </div>
                
                <!-- Demographic Analysis -->
                <div class="landscape-card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fas fa-users"></i> Demographic Analysis
                        </div>
                    </div>
                    <div class="landscape-chart-container">
                        <canvas id="demographicChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- ROW 4: Two charts side by side -->
            <div class="landscape-row">
                <!-- AI Performance -->
                <div class="landscape-card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fas fa-brain"></i> AI Performance Metrics
                        </div>
                    </div>
                    <div class="landscape-chart-container">
                        <canvas id="accuracyChart"></canvas>
                    </div>
                </div>
                
                <!-- Urban vs Rural -->
                <div class="landscape-card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fas fa-city"></i> Urban vs Rural Analysis
                        </div>
                    </div>
                    <div class="landscape-chart-container">
                        <canvas id="urbanRuralChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- ROW 5: Two charts side by side -->
            <div class="landscape-row">
                <!-- Bank Comparison -->
                <div class="landscape-card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fas fa-university"></i> Bank Impersonation
                        </div>
                    </div>
                    <div class="landscape-chart-container">
                        <canvas id="bankChart"></canvas>
                    </div>
                </div>
                
                <!-- Financial Impact -->
                <div class="landscape-card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fas fa-money-bill-wave"></i> Financial Impact
                        </div>
                    </div>
                    <div class="landscape-chart-container">
                        <canvas id="financialChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Predictive Analytics -->
        <section class="predictive-section">
            <div class="section-title">
                <i class="fas fa-crystal-ball"></i>
                <h3>Predictive Analytics & Risk Forecast</h3>
            </div>
            
            <p class="section-subtitle">
                AI-powered predictions for upcoming scam trends and vulnerability assessments based on historical data patterns
            </p>
            
            <div class="prediction-cards">
                <div class="prediction-card">
                    <div class="risk-level risk-high">HIGH RISK ALERT</div>
                    <h4 style="color: #f9fafb; margin-bottom: 15px; font-size: 18px;">Crypto Investment Scams</h4>
                    <p style="color: #c7d2fe; margin-bottom: 20px; font-size: 14px; line-height: 1.6;">
                        Predicted to increase by <strong>45%</strong> in the next 30 days. Targeting young investors.
                    </p>
                    <div style="display: flex; justify-content: space-between; align-items: center; font-size: 12px;">
                        <div style="color: #94a3b8;">
                            <i class="fas fa-calendar"></i> Peak: 15 Jan 2026
                        </div>
                        <div style="color: #ef4444; font-weight: 700;">
                            🔴 92% Confidence
                        </div>
                    </div>
                </div>
                
                <div class="prediction-card">
                    <div class="risk-level risk-medium">MEDIUM RISK</div>
                    <h4 style="color: #f9fafb; margin-bottom: 15px; font-size: 18px;">E-commerce Fraud</h4>
                    <p style="color: #c7d2fe; margin-bottom: 20px; font-size: 14px; line-height: 1.6;">
                        Expected <strong>25% increase</strong> during year-end holiday season.
                    </p>
                    <div style="display: flex; justify-content: space-between; align-items: center; font-size: 12px;">
                        <div style="color: #94a3b8;">
                            <i class="fas fa-calendar"></i> Peak: 20-31 Dec 2025
                        </div>
                        <div style="color: #f59e0b; font-weight: 700;">
                            🟡 78% Confidence
                        </div>
                    </div>
                </div>
                
                <div class="prediction-card">
                    <div class="risk-level risk-low">LOW RISK</div>
                    <h4 style="color: #f9fafb; margin-bottom: 15px; font-size: 18px;">Tech Support Scams</h4>
                    <p style="color: #c7d2fe; margin-bottom: 20px; font-size: 14px; line-height: 1.6;">
                        Decreasing trend observed (<strong>-15% monthly</strong>).
                    </p>
                    <div style="display: flex; justify-content: space-between; align-items: center; font-size: 12px;">
                        <div style="color: #94a3b8;">
                            <i class="fas fa-chart-line"></i> Trend: Decreasing
                        </div>
                        <div style="color: #22c55e; font-weight: 700;">
                            🟢 85% Confidence
                        </div>
                    </div>
                </div>
                
                <div class="prediction-card">
                    <div class="risk-level risk-high">HIGH RISK ALERT</div>
                    <h4 style="color: #f9fafb; margin-bottom: 15px; font-size: 18px;">Bank Phishing 2.0</h4>
                    <p style="color: #c7d2fe; margin-bottom: 20px; font-size: 14px; line-height: 1.6;">
                        New wave expected with improved social engineering tactics.
                    </p>
                    <div style="display: flex; justify-content: space-between; align-items: center; font-size: 12px;">
                        <div style="color: #94a3b8;">
                            <i class="fas fa-exclamation-triangle"></i> New pattern
                        </div>
                        <div style="color: #ef4444; font-weight: 700;">
                            🔴 88% Confidence
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FOOTER -->
        <footer>
            <div class="disclaimer-box">
                <h4>
                    <i class="fas fa-exclamation-triangle"></i> Important Disclaimer
                </h4>
                <p>
                    This AI tool provides statistical analysis and predictions only and does not guarantee 100% accuracy. 
                    Always verify information through official channels. The system is designed to assist in scam detection 
                    but should not replace human judgment and official reporting procedures.
                </p>
            </div>
            
            <p class="copyright">
                © 2026 AI Scam & Digital Safety Assistant – Malaysian Scam Detection System<br>
                Statistics Dashboard | Protected by AI Security Protocols
            </p>
        </footer>
    </main>

    <script>
        // ========== MOBILE SIDEBAR TOGGLE ==========
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarCloser = document.getElementById('sidebarCloser');
        
        menuToggle.addEventListener('click', () => {
            sidebar.classList.add('active');
        });
        
        sidebarCloser.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (event) => {
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
        
        // ========== SIDEBAR NAVIGATION ==========
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.removeAttribute('target');
            
            link.addEventListener('click', function(e) {
                if (this.getAttribute('href') !== 'statistics.php') {
                    e.preventDefault();
                    window.location.href = this.getAttribute('href');
                }
            });
        });
        
        // ========== INITIALIZATION ==========
        let currentTimeRange = '24h';
        let charts = {};
        
        document.addEventListener('DOMContentLoaded', function() {
            initializeCharts();
            animateStats();
            updateLiveData();
            
            // Animate cards on load
            setTimeout(() => {
                document.querySelectorAll('.stat-card').forEach((card, i) => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.transition = 'all 0.5s ease';
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, i * 100);
                });
            }, 100);
        });
        
        // ========== TIME RANGE SELECTION ==========
        function setTimeRange(range) {
            currentTimeRange = range;
            
            // Update button states
            document.querySelectorAll('.time-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            // Update all charts
            updateChartsForTimeRange(range);
            
            // Animate transition
            document.querySelectorAll('.landscape-card').forEach(card => {
                card.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    card.style.transform = 'scale(1)';
                }, 300);
            });
        }
        
        // ========== ANIMATE STATS ==========
        function animateStats() {
            const stats = [
                { id: 'scamsToday', target: 1247, duration: 2000 },
                { id: 'usersProtected', target: 45892, duration: 2500 },
                { id: 'messagesAnalyzed', target: 289456, duration: 3000 }
            ];
            
            stats.forEach(stat => {
                const element = document.getElementById(stat.id);
                const target = stat.target;
                const duration = stat.duration;
                const step = target / (duration / 16);
                let current = 0;
                
                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    element.textContent = Math.floor(current).toLocaleString();
                }, 16);
            });
        }
        
        // ========== INITIALIZE CHARTS ==========
        function initializeCharts() {
            // Scam Type Distribution Chart
            charts.scamType = new Chart(document.getElementById('scamTypeChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Bank Phishing', 'Investment', 'Romance', 'Tech Support', 'Lottery', 'Job Scams', 'E-commerce', 'Others'],
                    datasets: [{
                        data: [42, 18, 15, 8, 6, 5, 4, 2],
                        backgroundColor: [
                            '#ef4444', '#f59e0b', '#8b5cf6', '#3b82f6',
                            '#10b981', '#06b6d4', '#ec4899', '#6b7280'
                        ],
                        borderWidth: 2,
                        borderColor: '#0f172a'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { 
                            position: 'right',
                            labels: { color: '#c7d2fe', font: { size: 11 } }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(15, 23, 42, 0.95)',
                            titleColor: '#e2e8f0',
                            bodyColor: '#c7d2fe',
                            borderColor: '#7c3aed',
                            borderWidth: 1
                        }
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                }
            });
            
            // Platform Distribution Chart
            charts.platform = new Chart(document.getElementById('platformChart'), {
                type: 'polarArea',
                data: {
                    labels: ['WhatsApp', 'SMS', 'Email', 'Facebook', 'Instagram', 'Telegram', 'Others'],
                    datasets: [{
                        data: [38, 25, 15, 10, 6, 4, 2],
                        backgroundColor: [
                            '#25D366', '#3b82f6', '#ea4335', '#1877F2',
                            '#E4405F', '#0088cc', '#6b7280'
                        ],
                        borderWidth: 2,
                        borderColor: '#0f172a'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { 
                            position: 'right',
                            labels: { color: '#c7d2fe', font: { size: 11 } }
                        }
                    },
                    animation: {
                        animateRotate: true,
                        animateScale: true
                    }
                }
            });
            
            // Time Series Chart
            charts.timeSeries = new Chart(document.getElementById('timeSeriesChart'), {
                type: 'line',
                data: {
                    labels: Array.from({length: 24}, (_, i) => `${i}:00`),
                    datasets: [{
                        label: 'Scam Reports',
                        data: generateTimeSeriesData(),
                        borderColor: '#ef4444',
                        backgroundColor: 'rgba(239, 68, 68, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#ef4444',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            grid: { color: 'rgba(255, 255, 255, 0.1)' },
                            ticks: { color: '#c7d2fe' }
                        },
                        x: {
                            grid: { color: 'rgba(255, 255, 255, 0.1)' },
                            ticks: { color: '#c7d2fe' }
                        }
                    },
                    plugins: {
                        legend: { labels: { color: '#c7d2fe' } }
                    }
                }
            });
            
            // Demographic Chart
            charts.demographic = new Chart(document.getElementById('demographicChart'), {
                type: 'bar',
                data: {
                    labels: ['18-24', '25-34', '35-44', '45-54', '55-64', '65+'],
                    datasets: [{
                        label: 'Victims',
                        data: [12, 35, 28, 15, 7, 3],
                        backgroundColor: '#7c3aed',
                        borderColor: '#5b21b6',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            grid: { color: 'rgba(255, 255, 255, 0.1)' },
                            ticks: { color: '#c7d2fe' }
                        },
                        x: {
                            grid: { color: 'rgba(255, 255, 255, 0.1)' },
                            ticks: { color: '#c7d2fe' }
                        }
                    },
                    plugins: {
                        legend: { labels: { color: '#c7d2fe' } }
                    }
                }
            });
            
            // Accuracy Chart
            charts.accuracy = new Chart(document.getElementById('accuracyChart'), {
                type: 'radar',
                data: {
                    labels: ['Bank Phishing', 'Investment', 'Romance', 'Tech Support', 'Lottery', 'Job Scams'],
                    datasets: [{
                        label: 'Detection Accuracy',
                        data: [98, 95, 92, 96, 97, 94],
                        backgroundColor: 'rgba(124, 58, 237, 0.2)',
                        borderColor: '#7c3aed',
                        pointBackgroundColor: '#7c3aed',
                        pointBorderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        r: {
                            angleLines: { color: 'rgba(255, 255, 255, 0.1)' },
                            grid: { color: 'rgba(255, 255, 255, 0.1)' },
                            pointLabels: { color: '#c7d2fe' },
                            ticks: { display: false }
                        }
                    }
                }
            });
            
            // Urban vs Rural Chart
            charts.urbanRural = new Chart(document.getElementById('urbanRuralChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Urban Areas', 'Rural Areas'],
                    datasets: [{
                        data: [68, 32],
                        backgroundColor: ['#7c3aed', '#06b6d4'],
                        borderWidth: 2,
                        borderColor: '#0f172a'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { 
                            position: 'right',
                            labels: { color: '#c7d2fe', font: { size: 14 } }
                        }
                    }
                }
            });
            
            // Bank Chart
            charts.bank = new Chart(document.getElementById('bankChart'), {
                type: 'bar',
                data: {
                    labels: ['Maybank', 'CIMB', 'Public Bank', 'RHB', 'Hong Leong', 'AmBank', 'Others'],
                    datasets: [{
                        label: 'Impersonation Cases',
                        data: [42, 28, 15, 8, 4, 2, 1],
                        backgroundColor: '#ef4444',
                        borderColor: '#dc2626',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            grid: { color: 'rgba(255, 255, 255, 0.1)' },
                            ticks: { 
                                color: '#c7d2fe',
                                callback: function(value) {
                                    return value + '%';
                                }
                            }
                        },
                        x: {
                            grid: { color: 'rgba(255, 255, 255, 0.1)' },
                            ticks: { color: '#c7d2fe', fontSize: 12 }
                        }
                    },
                    plugins: {
                        legend: { 
                            labels: { color: '#c7d2fe' },
                            position: 'top'
                        }
                    }
                }
            });
            
            // Financial Chart
            charts.financial = new Chart(document.getElementById('financialChart'), {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Loss Prevented (RM)',
                        data: [850000, 920000, 780000, 950000, 1100000, 1250000, 980000, 1150000, 1320000, 1450000, 1580000, 1750000],
                        backgroundColor: 'rgba(34, 197, 94, 0.6)',
                        borderColor: '#22c55e',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            grid: { color: 'rgba(255, 255, 255, 0.1)' },
                            ticks: { 
                                color: '#c7d2fe',
                                callback: function(value) {
                                    return 'RM ' + (value / 1000000).toFixed(1) + 'M';
                                }
                            }
                        },
                        x: {
                            grid: { color: 'rgba(255, 255, 255, 0.1)' },
                            ticks: { color: '#c7d2fe' }
                        }
                    },
                    plugins: {
                        legend: { labels: { color: '#c7d2fe' } }
                    }
                }
            });
            
            // Malaysia Map
            initializeMalaysiaMap();
        }
        
        // ========== MALAYSIA MAP ==========
        function initializeMalaysiaMap() {
            const canvas = document.getElementById('malaysiaMap');
            const ctx = canvas.getContext('2d');
            const tooltip = document.getElementById('stateTooltip');
            
            // Set canvas size
            canvas.width = canvas.parentElement.clientWidth;
            canvas.height = canvas.parentElement.clientHeight;
            
            // Malaysia states data
            const states = [
                { name: 'Johor', x: 350, y: 450, intensity: 85 },
                { name: 'Kedah', x: 200, y: 150, intensity: 70 },
                { name: 'Kelantan', x: 350, y: 120, intensity: 60 },
                { name: 'Melaka', x: 300, y: 400, intensity: 75 },
                { name: 'Negeri Sembilan', x: 280, y: 350, intensity: 65 },
                { name: 'Pahang', x: 320, y: 300, intensity: 55 },
                { name: 'Perak', x: 250, y: 250, intensity: 80 },
                { name: 'Perlis', x: 180, y: 100, intensity: 40 },
                { name: 'Pulau Pinang', x: 220, y: 180, intensity: 90 },
                { name: 'Sabah', x: 550, y: 320, intensity: 50 },
                { name: 'Sarawak', x: 450, y: 350, intensity: 45 },
                { name: 'Selangor', x: 270, y: 330, intensity: 95 },
                { name: 'Terengganu', x: 380, y: 220, intensity: 60 },
                { name: 'Kuala Lumpur', x: 260, y: 340, intensity: 100 },
                { name: 'Labuan', x: 500, y: 340, intensity: 30 },
                { name: 'Putrajaya', x: 265, y: 345, intensity: 40 }
            ];
            
            function drawMap() {
                // Clear canvas
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                
                // Draw background
                ctx.fillStyle = 'rgba(15, 23, 42, 0.5)';
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                
                // Draw states
                states.forEach(state => {
                    const radius = 20 + (state.intensity / 3);
                    
                    // Draw heat circle
                    const gradient = ctx.createRadialGradient(
                        state.x, state.y, 0,
                        state.x, state.y, radius
                    );
                    
                    const opacity = state.intensity / 100 * 0.6;
                    gradient.addColorStop(0, `rgba(239, 68, 68, ${opacity})`);
                    gradient.addColorStop(1, 'transparent');
                    
                    ctx.fillStyle = gradient;
                    ctx.beginPath();
                    ctx.arc(state.x, state.y, radius, 0, Math.PI * 2);
                    ctx.fill();
                    
                    // Draw state dot
                    ctx.fillStyle = '#ef4444';
                    ctx.beginPath();
                    ctx.arc(state.x, state.y, 8, 0, Math.PI * 2);
                    ctx.fill();
                    
                    // Draw state label
                    ctx.fillStyle = '#e2e8f0';
                    ctx.font = '14px Poppins';
                    ctx.textAlign = 'center';
                    ctx.fillText(state.name, state.x, state.y - 20);
                    
                    // Draw intensity percentage
                    ctx.fillStyle = '#94a3b8';
                    ctx.font = '12px Poppins';
                    ctx.fillText(state.intensity + '%', state.x, state.y + 25);
                });
                
                // Draw Malaysia label
                ctx.fillStyle = '#7c3aed';
                ctx.font = 'bold 24px Poppins';
                ctx.textAlign = 'center';
                ctx.fillText('MALAYSIA SCAM HEAT MAP', canvas.width / 2, 50);
            }
            
            // Handle mouse movement
            canvas.addEventListener('mousemove', function(event) {
                const rect = canvas.getBoundingClientRect();
                const x = event.clientX - rect.left;
                const y = event.clientY - rect.top;
                
                let hoveredState = null;
                
                states.forEach(state => {
                    const distance = Math.sqrt(Math.pow(x - state.x, 2) + Math.pow(y - state.y, 2));
                    if (distance < 30) {
                        hoveredState = state;
                    }
                });
                
                if (hoveredState) {
                    tooltip.style.opacity = '1';
                    tooltip.style.left = (x + 20) + 'px';
                    tooltip.style.top = (y + 20) + 'px';
                    tooltip.innerHTML = `
                        <strong>${hoveredState.name}</strong><br>
                        <div style="margin: 8px 0;">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <div style="width: 10px; height: 10px; border-radius: 50%; background: #ef4444;"></div>
                                <span>Scam Reports: ${hoveredState.intensity}%</span>
                            </div>
                            <div style="margin-top: 5px;">
                                Risk Level: <span style="color: ${hoveredState.intensity > 80 ? '#ef4444' : hoveredState.intensity > 60 ? '#f59e0b' : '#22c55e'}; font-weight: 700;">
                                    ${hoveredState.intensity > 80 ? 'HIGH' : hoveredState.intensity > 60 ? 'MEDIUM' : 'LOW'}
                                </span>
                            </div>
                        </div>
                        <small style="color: #94a3b8; font-size: 12px;">
                            Click for detailed analysis
                        </small>
                    `;
                    
                    // Highlight hovered state
                    drawMap();
                    ctx.fillStyle = 'rgba(255, 255, 255, 0.3)';
                    ctx.beginPath();
                    ctx.arc(hoveredState.x, hoveredState.y, 35, 0, Math.PI * 2);
                    ctx.fill();
                    
                    ctx.fillStyle = '#ffffff';
                    ctx.beginPath();
                    ctx.arc(hoveredState.x, hoveredState.y, 12, 0, Math.PI * 2);
                    ctx.fill();
                    
                    ctx.fillStyle = '#ef4444';
                    ctx.beginPath();
                    ctx.arc(hoveredState.x, hoveredState.y, 8, 0, Math.PI * 2);
                    ctx.fill();
                } else {
                    tooltip.style.opacity = '0';
                    drawMap();
                }
            });
            
            // Handle click
            canvas.addEventListener('click', function(event) {
                const rect = canvas.getBoundingClientRect();
                const x = event.clientX - rect.left;
                const y = event.clientY - rect.top;
                
                states.forEach(state => {
                    const distance = Math.sqrt(Math.pow(x - state.x, 2) + Math.pow(y - state.y, 2));
                    if (distance < 30) {
                        alert(`🗺️ ${state.name} State Analysis\n\n📊 Scam Reports: ${state.intensity}%\n📈 Trend: ${state.intensity > 70 ? 'Increasing' : 'Stable'}\n🎯 Top Scam: ${state.intensity > 80 ? 'Bank Phishing' : 'Investment Scams'}\n👥 Most Targeted: ${state.intensity > 70 ? '25-34 years' : '35-44 years'}`);
                    }
                });
            });
            
            // Initial draw
            drawMap();
            
            // Resize handler
            window.addEventListener('resize', function() {
                canvas.width = canvas.parentElement.clientWidth;
                canvas.height = canvas.parentElement.clientHeight;
                drawMap();
            });
        }
        
        // ========== UPDATE CHARTS FOR TIME RANGE ==========
        function updateChartsForTimeRange(range) {
            let labels, data;
            
            switch(range) {
                case '24h':
                    labels = Array.from({length: 24}, (_, i) => `${i}:00`);
                    data = generateTimeSeriesData();
                    break;
                case '7d':
                    labels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                    data = [850, 920, 780, 950, 1100, 1250, 980];
                    break;
                case '30d':
                    labels = Array.from({length: 30}, (_, i) => `Day ${i + 1}`);
                    data = Array.from({length: 30}, () => Math.floor(Math.random() * 500) + 500);
                    break;
                case '90d':
                    labels = ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7', 'Week 8', 'Week 9', 'Week 10', 'Week 11', 'Week 12'];
                    data = [4200, 4500, 4800, 5200, 5500, 5800, 6200, 6500, 6800, 7200, 7500, 7800];
                    break;
                case '1y':
                    labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    data = [12500, 13200, 14500, 15800, 17200, 18500, 19800, 21000, 22500, 23800, 25000, 26500];
                    break;
                default:
                    labels = ['2020', '2021', '2022', '2023', '2024', '2025'];
                    data = [45000, 52000, 65000, 82000, 105000, 142000];
            }
            
            if (charts.timeSeries) {
                charts.timeSeries.data.labels = labels;
                charts.timeSeries.data.datasets[0].data = data;
                charts.timeSeries.update('none');
            }
        }
        
        function generateTimeSeriesData() {
            return Array.from({length: 24}, (_, i) => {
                let base = 20;
                if (i >= 9 && i <= 12) base = 80;
                if (i >= 14 && i <= 17) base = 95;
                if (i >= 20 && i <= 22) base = 60;
                return base + Math.random() * 20;
            });
        }
        
        // ========== LIVE DATA UPDATES ==========
        function updateLiveData() {
            setInterval(() => {
                const stats = ['scamsToday', 'usersProtected', 'messagesAnalyzed'];
                stats.forEach(statId => {
                    const element = document.getElementById(statId);
                    const current = parseInt(element.textContent.replace(/,/g, ''));
                    const increment = Math.floor(Math.random() * 3) + 1;
                    const newValue = current + increment;
                    element.textContent = newValue.toLocaleString();
                    
                    element.style.transform = 'scale(1.2)';
                    element.style.color = '#06b6d4';
                    setTimeout(() => {
                        element.style.transform = 'scale(1)';
                        element.style.color = '#f9fafb';
                    }, 300);
                });
                
                if (charts.timeSeries) {
                    const dataset = charts.timeSeries.data.datasets[0];
                    const randomIndex = Math.floor(Math.random() * dataset.data.length);
                    const change = Math.floor(Math.random() * 10) - 5;
                    dataset.data[randomIndex] = Math.max(10, dataset.data[randomIndex] + change);
                    charts.timeSeries.update('none');
                }
                
            }, 10000);
        }
        
        // ========== EXPORT FUNCTIONS ==========
        function exportData(format) {
            const formats = {
                pdf: 'PDF Report',
                excel: 'Excel Spreadsheet',
                json: 'JSON Data',
                image: 'Infographic Image',
                presentation: 'PowerPoint Presentation'
            };
            
            alert(`📊 Exporting: ${formats[format]}\n\nYour download will begin shortly...\n\nGenerated: ${new Date().toLocaleString()}`);
            
            const btn = event.target;
            btn.style.transform = 'translateY(-5px)';
            btn.style.boxShadow = '0 10px 25px rgba(124, 58, 237, 0.3)';
            setTimeout(() => {
                btn.style.transform = 'translateY(0)';
                btn.style.boxShadow = 'none';
            }, 300);
            
            setTimeout(() => {
                alert(`✅ ${formats[format]} downloaded successfully!\n\nFile: AI_Scam_Statistics_${format.toUpperCase()}_${Date.now()}.${format}`);
            }, 2000);
        }
        
        // Handle window resize
        window.addEventListener('resize', function() {
            // Reset sidebar state on desktop
            if (window.innerWidth > 768) {
                sidebar.classList.remove('active');
            }
        });
    </script>
</body>
</html>