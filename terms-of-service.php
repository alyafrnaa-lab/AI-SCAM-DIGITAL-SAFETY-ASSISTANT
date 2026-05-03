<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Scam Assistant - Terms of Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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
            overflow-x: hidden;
        }

        /* ========== HORIZONTAL NAVBAR (TOP) ========== */
        .top-navbar {
            background: linear-gradient(145deg, rgba(15, 23, 42, 0.95), rgba(2, 6, 23, 0.97));
            backdrop-filter: blur(20px);
            border-bottom: 3px solid #7c3aed;
            padding: 20px 40px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-logo i {
            font-size: 32px;
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: logoPulse 2s infinite;
        }

        @keyframes logoPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .nav-logo h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 24px;
            font-weight: 900;
            background: linear-gradient(90deg, #7c3aed, #4f46e5);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: 1px;
        }

        .nav-links {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .nav-link {
            color: #c7d2fe;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.4s ease;
            background: rgba(124, 58, 237, 0.1);
            border: 2px solid transparent;
        }

        .nav-link:hover {
            background: rgba(124, 58, 237, 0.2);
            color: #e5e7eb;
            transform: translateY(-3px);
            border-color: #7c3aed;
            box-shadow: 0 8px 20px rgba(124, 58, 237, 0.3);
        }

        .nav-link.active {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            color: white;
            border-color: #7c3aed;
            box-shadow: 0 0 30px rgba(124, 58, 237, 0.4);
        }

        .nav-link i {
            font-size: 18px;
        }

        /* ========== MAIN CONTENT LAYOUT ========== */
        .main-content {
            max-width: 1200px;
            margin: 120px auto 40px;
            padding: 0 30px;
        }

        /* ========== HERO SECTION ========== */
        .hero-section {
            background: linear-gradient(135deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            background-size: cover;
            background-position: center;
            padding: 60px 40px;
            position: relative;
            overflow: hidden;
            border-radius: 25px;
            margin-bottom: 30px;
            border: 2px solid rgba(124, 58, 237, 0.3);
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(124, 58, 237, 0.1), rgba(79, 70, 229, 0.05));
            z-index: 1;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .hero-icon {
            font-size: 64px;
            color: #7c3aed;
            margin-bottom: 25px;
            display: inline-block;
            background: rgba(124, 58, 237, 0.1);
            width: 120px;
            height: 120px;
            line-height: 120px;
            border-radius: 50%;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(5deg); }
        }

        .hero-content h1 {
            font-size: 42px;
            font-weight: 900;
            margin-bottom: 20px;
            background: linear-gradient(90deg, #7c3aed, #4f46e5, #a5b4fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 18px;
            color: #c7d2fe;
            max-width: 800px;
            margin: 0 auto 30px;
            line-height: 1.6;
        }

        .hero-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            max-width: 800px;
            margin: 40px auto 0;
        }

        .hero-stat {
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            border: 1px solid rgba(124, 58, 237, 0.2);
        }

        .hero-stat-number {
            font-size: 32px;
            font-weight: 800;
            color: #7c3aed;
            display: block;
            line-height: 1;
            margin-bottom: 8px;
        }

        .hero-stat-label {
            font-size: 13px;
            color: #a5b4fc;
            font-weight: 500;
        }

        /* ========== READING PROGRESS ========== */
        .reading-progress {
            position: sticky;
            top: 100px;
            z-index: 100;
            margin-bottom: 30px;
            background: rgba(15, 23, 42, 0.9);
            border-radius: 15px;
            padding: 20px;
            border: 2px solid rgba(124, 58, 237, 0.3);
            backdrop-filter: blur(10px);
        }

        .progress-bar {
            height: 8px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #7c3aed, #4f46e5);
            border-radius: 4px;
            width: 0%;
            transition: width 0.3s ease;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: #a5b4fc;
        }

        .progress-time {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ========== QUICK NAV ========== */
        .quick-nav {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            border: 2px solid rgba(124, 58, 237, 0.3);
        }

        .quick-nav h3 {
            font-size: 22px;
            color: #e5e7eb;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .nav-button {
            background: rgba(124, 58, 237, 0.1);
            color: #c7d2fe;
            border: 2px solid rgba(124, 58, 237, 0.3);
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-button:hover {
            background: rgba(124, 58, 237, 0.2);
            color: #e5e7eb;
            transform: translateY(-3px);
            border-color: #7c3aed;
        }

        /* ========== TERMS CONTENT ========== */
        .terms-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border-radius: 25px;
            padding: 50px;
            margin-bottom: 30px;
            border: 2px solid rgba(124, 58, 237, 0.3);
        }

        .terms-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid rgba(124, 58, 237, 0.3);
        }

        .terms-header h2 {
            font-size: 32px;
            font-weight: 800;
            color: #e5e7eb;
            margin-bottom: 15px;
        }

        .last-updated {
            color: #a5b4fc;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        /* Terms Articles */
        .terms-article {
            margin-bottom: 40px;
            padding: 30px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .terms-article:hover {
            border-color: rgba(124, 58, 237, 0.5);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .article-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(124, 58, 237, 0.3);
        }

        .article-number {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
            flex-shrink: 0;
        }

        .article-header h3 {
            font-size: 22px;
            color: #e5e7eb;
            font-weight: 700;
        }

        .article-content {
            color: #c7d2fe;
            line-height: 1.8;
        }

        .article-content p {
            margin-bottom: 15px;
        }

        .article-content strong {
            color: #e5e7eb;
            font-weight: 600;
        }

        .clause {
            margin: 20px 0;
            padding-left: 20px;
            border-left: 3px solid rgba(124, 58, 237, 0.5);
        }

        .clause-title {
            font-weight: 600;
            color: #e5e7eb;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Explanation Toggle */
        .explain-toggle {
            margin-top: 20px;
            padding: 15px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 10px;
            border: 2px solid rgba(16, 185, 129, 0.3);
            display: none;
        }

        .explain-toggle.show {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        .explain-toggle h4 {
            color: #10b981;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .explain-btn {
            background: rgba(124, 58, 237, 0.1);
            color: #a5b4fc;
            border: 2px solid rgba(124, 58, 237, 0.3);
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 15px;
        }

        .explain-btn:hover {
            background: rgba(124, 58, 237, 0.2);
            color: #e5e7eb;
        }

        /* ========== CONSENT SECTION ========== */
        .consent-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border-radius: 25px;
            padding: 50px;
            margin-bottom: 30px;
            border: 2px solid rgba(124, 58, 237, 0.3);
            text-align: center;
        }

        .consent-box {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        .consent-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 30px;
            padding: 20px;
            background: rgba(124, 58, 237, 0.05);
            border-radius: 15px;
            text-align: left;
        }

        .consent-checkbox input[type="checkbox"] {
            width: 22px;
            height: 22px;
            margin-top: 3px;
            accent-color: #7c3aed;
            cursor: pointer;
        }

        .consent-label {
            color: #c7d2fe;
            font-size: 16px;
            line-height: 1.6;
        }

        .consent-label strong {
            color: #e5e7eb;
        }

        .consent-btn {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 12px;
        }

        .consent-btn:hover:not(:disabled) {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.4);
        }

        .consent-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* ========== FAQ SECTION ========== */
        .faq-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border-radius: 25px;
            padding: 50px;
            margin-bottom: 30px;
            border: 2px solid rgba(124, 58, 237, 0.3);
        }

        .faq-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }

        .faq-item {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 25px;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            border-color: #7c3aed;
            transform: translateY(-5px);
        }

        .faq-question {
            font-size: 18px;
            color: #e5e7eb;
            margin-bottom: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .faq-answer {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.6;
        }

        /* ========== DOWNLOAD SECTION ========== */
        .download-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border-radius: 25px;
            padding: 50px;
            margin-bottom: 30px;
            border: 2px solid rgba(124, 58, 237, 0.3);
            text-align: center;
        }

        .download-options {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .download-btn {
            background: rgba(0, 0, 0, 0.3);
            color: #c7d2fe;
            border: 2px solid rgba(124, 58, 237, 0.3);
            padding: 15px 30px;
            border-radius: 15px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 200px;
            justify-content: center;
        }

        .download-btn:hover {
            background: rgba(124, 58, 237, 0.2);
            color: #e5e7eb;
            transform: translateY(-5px);
            border-color: #7c3aed;
        }

        /* ========== FOOTER ========== */
        footer {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            padding: 40px;
            border-top: 3px solid #7c3aed;
            border-radius: 30px 30px 0 0;
            text-align: center;
            margin-top: 60px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: #a5b4fc;
            text-decoration: none;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: #7c3aed;
            transform: translateY(-3px);
        }

        .copyright {
            color: #94a3b8;
            font-size: 13px;
            line-height: 1.6;
        }

        /* ========== ANIMATIONS ========== */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ========== RESPONSIVE DESIGN ========== */
        @media (max-width: 1200px) {
            .main-content {
                max-width: 1000px;
            }
            
            .hero-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 992px) {
            .top-navbar {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
            }
            
            .nav-links {
                width: 100%;
                overflow-x: auto;
                padding-bottom: 10px;
                justify-content: flex-start;
            }
            
            .nav-link {
                padding: 10px 20px;
                font-size: 14px;
            }
            
            .main-content {
                margin-top: 160px;
                padding: 0 20px;
            }
            
            .faq-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .hero-section,
            .terms-section,
            .consent-section,
            .faq-section,
            .download-section {
                padding: 30px;
            }
            
            .hero-content h1 {
                font-size: 32px;
            }
            
            .hero-subtitle {
                font-size: 16px;
            }
            
            .terms-header h2 {
                font-size: 28px;
            }
            
            .terms-article {
                padding: 20px;
            }
            
            .article-header h3 {
                font-size: 20px;
            }
            
            .download-options {
                flex-direction: column;
                align-items: center;
            }
            
            .download-btn {
                width: 100%;
                max-width: 300px;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 0 15px;
                margin-top: 180px;
            }
            
            .hero-content h1 {
                font-size: 28px;
            }
            
            .terms-header h2 {
                font-size: 24px;
            }
            
            .hero-stats {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .hero-stat-number {
                font-size: 28px;
            }
            
            .nav-link span {
                display: none;
            }
            
            .nav-link i {
                font-size: 20px;
            }
            
            .nav-link {
                padding: 12px;
            }
            
            .nav-buttons {
                flex-direction: column;
            }
            
            .footer-links {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- HORIZONTAL NAVBAR (TOP) -->
    <nav class="top-navbar">
        <div class="nav-logo">
            <i class="fas fa-shield-alt"></i>
            <h1>AI Scam Assistant</h1>
        </div>
        
        <div class="nav-links">
            <a href="index.php" class="nav-link">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="about-us.php" target="_blank" class="nav-link">
                <i class="fas fa-info-circle"></i>
                <span>About</span>
            </a>
            <a href="scam-detection.php" target="_blank" class="nav-link">
                <i class="fas fa-search"></i>
                <span>Detection</span>
            </a>
            <a href="recent-threats.php" target="_blank" class="nav-link">
                <i class="fas fa-exclamation-triangle"></i>
                <span>Threats</span>
            </a>
            <a href="statistics.php" target="_blank" class="nav-link">
                <i class="fas fa-chart-line"></i>
                <span>Stats</span>
            </a>
            <a href="safety-tips.php" target="_blank" class="nav-link">
                <i class="fas fa-shield-alt"></i>
                <span>Safety</span>
            </a>
            <a href="learn-more.php" target="_blank" class="nav-link">
                <i class="fas fa-graduation-cap"></i>
                <span>Learn</span>
            </a>
            <a href="terms.php" class="nav-link active">
                <i class="fas fa-file-contract"></i>
                <span>Terms</span>
            </a>
            <a href="report-scam.php" target="_blank" class="nav-link">
                <i class="fas fa-flag"></i>
                <span>Report</span>
            </a>
            <a href="help-support.php" target="_blank" class="nav-link">
                <i class="fas fa-question-circle"></i>
                <span>Help</span>
            </a>
        </div>
    </nav>
    
    <!-- MAIN CONTENT -->
    <main class="main-content">
        <!-- HERO SECTION -->
        <section class="hero-section">
            <div class="hero-content">
                <div class="hero-icon">
                    <i class="fas fa-file-contract"></i>
                </div>
                <h1>TERMS OF SERVICE AGREEMENT</h1>
                <p class="hero-subtitle">
                    Legal framework governing your use of AI Scam Assistant. 
                    Please read these terms carefully before using our services.
                </p>
                
                <div class="hero-stats">
                    <div class="hero-stat">
                        <span class="hero-stat-number">8.5</span>
                        <span class="hero-stat-label">Minutes Reading Time</span>
                    </div>
                    <div class="hero-stat">
                        <span class="hero-stat-number">10</span>
                        <span class="hero-stat-label">Main Sections</span>
                    </div>
                    <div class="hero-stat">
                        <span class="hero-stat-number">46</span>
                        <span class="hero-stat-label">Total Clauses</span>
                    </div>
                    <div class="hero-stat">
                        <span class="hero-stat-number">v2.1</span>
                        <span class="hero-stat-label">Current Version</span>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- READING PROGRESS -->
        <div class="reading-progress">
            <div class="progress-bar">
                <div class="progress-fill" id="progressFill"></div>
            </div>
            <div class="progress-info">
                <span>Reading Progress</span>
                <div class="progress-time">
                    <i class="fas fa-clock"></i>
                    <span id="readingTime">8 mins 30 secs</span>
                </div>
            </div>
        </div>
        
        <!-- QUICK NAVIGATION -->
        <section class="quick-nav">
            <h3><i class="fas fa-bookmark"></i> Quick Navigation</h3>
            <div class="nav-buttons">
                <a href="#acceptance" class="nav-button">
                    <i class="fas fa-check-circle"></i> Acceptance
                </a>
                <a href="#service" class="nav-button">
                    <i class="fas fa-cogs"></i> Service Description
                </a>
                <a href="#privacy" class="nav-button">
                    <i class="fas fa-user-shield"></i> Privacy
                </a>
                <a href="#liability" class="nav-button">
                    <i class="fas fa-balance-scale"></i> Liability
                </a>
                <a href="#disclaimers" class="nav-button">
                    <i class="fas fa-exclamation-triangle"></i> Disclaimers
                </a>
                <a href="#contact" class="nav-button">
                    <i class="fas fa-envelope"></i> Contact
                </a>
            </div>
        </section>
        
        <!-- TERMS CONTENT -->
        <section class="terms-section">
            <div class="terms-header">
                <h2>TERMS OF SERVICE</h2>
                <div class="last-updated">
                    <i class="fas fa-history"></i>
                    Last Updated: December 1, 2025
                </div>
            </div>
            
            <!-- Article 1: Acceptance -->
            <article class="terms-article" id="acceptance">
                <div class="article-header">
                    <div class="article-number">1</div>
                    <h3>ACCEPTANCE OF TERMS</h3>
                </div>
                <div class="article-content">
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-file-signature"></i>
                            1.1 Agreement to Terms
                        </div>
                        <p>By accessing and using the AI Scam Assistant website ("Service"), you acknowledge that you have read, understood, and agree to be bound by these Terms of Service. If you disagree with any part of these terms, you must not use our Service.</p>
                        <button class="explain-btn" onclick="toggleExplanation('1.1')">
                            <i class="fas fa-question-circle"></i> What does this mean?
                        </button>
                        <div class="explain-toggle" id="explain-1.1">
                            <h4><i class="fas fa-lightbulb"></i> Simple Explanation</h4>
                            <p>By using our website, you're saying "I agree to follow these rules." If you don't agree, please don't use our service.</p>
                        </div>
                    </div>
                    
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-user-check"></i>
                            1.2 Age Requirement
                        </div>
                        <p>You must be at least <strong>18 years old</strong> to use this Service. If you are under 18, you may use the Service only with the involvement and consent of a parent or guardian who agrees to these Terms on your behalf.</p>
                    </div>
                    
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-sync-alt"></i>
                            1.3 Modification of Terms
                        </div>
                        <p>We reserve the right to modify or replace these Terms at any time. We will provide notice of significant changes by updating the "Last Updated" date at the top of this page. Your continued use of the Service after any changes constitutes your acceptance of the new Terms.</p>
                    </div>
                </div>
            </article>
            
            <!-- Article 2: Service Description -->
            <article class="terms-article" id="service">
                <div class="article-header">
                    <div class="article-number">2</div>
                    <h3>SERVICE DESCRIPTION</h3>
                </div>
                <div class="article-content">
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-robot"></i>
                            2.1 What We Provide
                        </div>
                        <p>AI Scam Assistant is an <strong>educational tool</strong> that uses artificial intelligence to analyze messages and provide scam detection suggestions. Our Service includes scam pattern recognition, safety tips, and educational resources about digital security.</p>
                    </div>
                    
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-exclamation-circle"></i>
                            2.2 Service Limitations
                        </div>
                        <p><strong>Important:</strong> Our Service is for educational purposes only. We do not provide financial, legal, or professional security advice. Our AI suggestions are based on pattern recognition and should not be considered definitive proof of scam activity.</p>
                        <button class="explain-btn" onclick="toggleExplanation('2.2')">
                            <i class="fas fa-question-circle"></i> Why is this important?
                        </button>
                        <div class="explain-toggle" id="explain-2.2">
                            <h4><i class="fas fa-lightbulb"></i> Simple Explanation</h4>
                            <p>Our website is like a helpful friend who suggests "This might be a scam" – but we're not lawyers or bankers. Always double-check with official sources.</p>
                        </div>
                    </div>
                    
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-ban"></i>
                            2.3 Prohibited Uses
                        </div>
                        <p>You agree not to use the Service for any unlawful purpose or in any way that could damage, disable, overburden, or impair our servers or networks. You may not attempt to gain unauthorized access to any part of the Service.</p>
                    </div>
                </div>
            </article>
            
            <!-- Article 3: Privacy -->
            <article class="terms-article" id="privacy">
                <div class="article-header">
                    <div class="article-number">3</div>
                    <h3>PRIVACY & DATA PROTECTION</h3>
                </div>
                <div class="article-content">
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-database"></i>
                            3.1 Data Collection
                        </div>
                        <p>We may collect anonymized data about scam patterns to improve our AI algorithms. We do <strong>not store personal messages</strong> or personally identifiable information unless explicitly provided by you for support purposes.</p>
                    </div>
                    
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-shield-alt"></i>
                            3.2 Data Security
                        </div>
                        <p>We implement reasonable security measures to protect your information. However, no method of transmission over the Internet is 100% secure. We cannot guarantee absolute security of any information transmitted to our Service.</p>
                    </div>
                    
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-handshake"></i>
                            3.3 Third-Party Services
                        </div>
                        <p>Our Service may contain links to third-party websites or services. We are not responsible for the content, privacy policies, or practices of any third-party sites or services.</p>
                    </div>
                </div>
            </article>
            
            <!-- Article 4: User Responsibilities -->
            <article class="terms-article" id="responsibilities">
                <div class="article-header">
                    <div class="article-number">4</div>
                    <h3>USER RESPONSIBILITIES</h3>
                </div>
                <div class="article-content">
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-check-double"></i>
                            4.1 Accurate Information
                        </div>
                        <p>You agree to provide accurate information when using our Service. You are responsible for maintaining the confidentiality of any login information and for all activities that occur under your account.</p>
                    </div>
                    
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-flag"></i>
                            4.2 Reporting Inaccuracies
                        </div>
                        <p>If you believe our AI has provided incorrect information or missed a scam, please report it through our <a href="report-scam.php" style="color: #7c3aed;">Report Scam</a> feature. Your feedback helps improve our Service.</p>
                    </div>
                </div>
            </article>
            
            <!-- Article 5: Intellectual Property -->
            <article class="terms-article" id="ip">
                <div class="article-header">
                    <div class="article-number">5</div>
                    <h3>INTELLECTUAL PROPERTY</h3>
                </div>
                <div class="article-content">
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-copyright"></i>
                            5.1 Ownership Rights
                        </div>
                        <p>The Service and its original content, features, and functionality are owned by AI Scam Assistant and are protected by international copyright, trademark, and other intellectual property laws.</p>
                    </div>
                    
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-share-alt"></i>
                            5.2 Limited License
                        </div>
                        <p>We grant you a limited, non-exclusive, non-transferable license to use the Service for personal, non-commercial purposes. You may not reproduce, duplicate, copy, sell, or exploit any portion of the Service without express written permission.</p>
                    </div>
                </div>
            </article>
            
            <!-- Article 6: Limitation of Liability -->
            <article class="terms-article" id="liability">
                <div class="article-header">
                    <div class="article-number">6</div>
                    <h3>LIMITATION OF LIABILITY</h3>
                </div>
                <div class="article-content">
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-balance-scale"></i>
                            6.1 "As Is" Service
                        </div>
                        <p>The Service is provided on an <strong>"AS IS" and "AS AVAILABLE" basis</strong>. We make no warranties, expressed or implied, regarding the accuracy, reliability, or completeness of the information provided by our AI.</p>
                    </div>
                    
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-money-bill-wave"></i>
                            6.2 No Financial Liability
                        </div>
                        <p>Under no circumstances shall AI Scam Assistant be liable for any direct, indirect, incidental, special, consequential, or punitive damages resulting from your use of or inability to use the Service, including but not limited to financial losses from scams.</p>
                        <button class="explain-btn" onclick="toggleExplanation('6.2')">
                            <i class="fas fa-question-circle"></i> What does this mean for me?
                        </button>
                        <div class="explain-toggle" id="explain-6.2">
                            <h4><i class="fas fa-lightbulb"></i> Simple Explanation</h4>
                            <p>We're providing free educational help. If you lose money to a scam, we can't be held financially responsible. Always verify with official sources before making financial decisions.</p>
                        </div>
                    </div>
                </div>
            </article>
            
            <!-- Article 7: Disclaimers -->
            <article class="terms-article" id="disclaimers">
                <div class="article-header">
                    <div class="article-number">7</div>
                    <h3>IMPORTANT DISCLAIMERS</h3>
                </div>
                <div class="article-content">
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-user-md"></i>
                            7.1 Not Professional Advice
                        </div>
                        <p><strong>Our Service is not a substitute for professional advice.</strong> We are not financial advisors, lawyers, or cybersecurity experts. Always consult with appropriate professionals for specific advice.</p>
                    </div>
                    
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-search"></i>
                            7.2 Detection Limitations
                        </div>
                        <p>Our AI may not detect all scams, and may occasionally flag legitimate messages as suspicious. You should use our Service as one of several tools in your security toolkit, not as your sole source of verification.</p>
                    </div>
                </div>
            </article>
            
            <!-- Article 8: Governing Law -->
            <article class="terms-article" id="law">
                <div class="article-header">
                    <div class="article-number">8</div>
                    <h3>GOVERNING LAW & DISPUTES</h3>
                </div>
                <div class="article-content">
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-gavel"></i>
                            8.1 Applicable Law
                        </div>
                        <p>These Terms shall be governed by and construed in accordance with the laws of <strong>Malaysia</strong>, without regard to its conflict of law provisions.</p>
                    </div>
                    
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-landmark"></i>
                            8.2 Dispute Resolution
                        </div>
                        <p>Any disputes arising from these Terms or your use of the Service shall be resolved in the courts of <strong>Kuala Lumpur, Malaysia</strong>. You agree to submit to the personal jurisdiction of these courts.</p>
                    </div>
                </div>
            </article>
            
            <!-- Article 9: Termination -->
            <article class="terms-article" id="termination">
                <div class="article-header">
                    <div class="article-number">9</div>
                    <h3>TERMINATION</h3>
                </div>
                <div class="article-content">
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-power-off"></i>
                            9.1 Termination Rights
                        </div>
                        <p>We may terminate or suspend your access to the Service immediately, without prior notice or liability, for any reason, including if you breach these Terms.</p>
                    </div>
                    
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-door-open"></i>
                            9.2 User Termination
                        </div>
                        <p>You may stop using our Service at any time. Continued use of the Service after termination of these Terms will constitute your acceptance of the new Terms.</p>
                    </div>
                </div>
            </article>
            
            <!-- Article 10: Contact -->
            <article class="terms-article" id="contact">
                <div class="article-header">
                    <div class="article-number">10</div>
                    <h3>CONTACT INFORMATION</h3>
                </div>
                <div class="article-content">
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-envelope"></i>
                            10.1 Contact Details
                        </div>
                        <p>For questions about these Terms, please contact us at:</p>
                        <p><strong>Email:</strong> legal@aiscamassistant.my</p>
                        <p><strong>Address:</strong> Digital Security Department, Kuala Lumpur, Malaysia</p>
                    </div>
                    
                    <div class="clause">
                        <div class="clause-title">
                            <i class="fas fa-bullhorn"></i>
                            10.2 Updates & Changes
                        </div>
                        <p>We will notify users of significant changes to these Terms via email (if provided) or by posting a notice on our website. It is your responsibility to review these Terms periodically for changes.</p>
                    </div>
                </div>
            </article>
        </section>
        
        <!-- CONSENT SECTION -->
        <section class="consent-section">
            <div class="consent-box">
                <h3><i class="fas fa-handshake"></i> Agreement Confirmation</h3>
                <p style="color: #c7d2fe; margin-bottom: 30px; font-size: 16px;">
                    By checking the box below, you confirm that you have read, understood, and agree to be bound by these Terms of Service.
                </p>
                
                <div class="consent-checkbox">
                    <input type="checkbox" id="agreeTerms">
                    <label for="agreeTerms" class="consent-label">
                        <strong>I have read and agree to the Terms of Service</strong> outlined above. 
                        I understand that by using AI Scam Assistant, I am agreeing to all clauses, including 
                        the limitation of liability and important disclaimers.
                    </label>
                </div>
                
                <button class="consent-btn" id="agreeButton" disabled onclick="agreeToTerms()">
                    <i class="fas fa-check-circle"></i> I Agree to Terms
                </button>
                
                <p style="color: #94a3b8; margin-top: 20px; font-size: 12px;">
                    Your agreement will be saved locally in your browser. You can revoke this agreement at any time by clearing your browser data.
                </p>
            </div>
        </section>
        
        <!-- FAQ SECTION -->
        <section class="faq-section">
            <div class="terms-header">
                <h2><i class="fas fa-question-circle"></i> FREQUENTLY ASKED QUESTIONS</h2>
                <p class="section-subtitle">Common questions about our Terms of Service</p>
            </div>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-user-check"></i>
                        Do I need to agree to use the website?
                    </div>
                    <div class="faq-answer">
                        No, you can browse our educational content without agreeing. However, certain features may require agreement to these Terms.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-save"></i>
                        Is my agreement saved?
                    </div>
                    <div class="faq-answer">
                        Your agreement is saved locally in your browser using localStorage. It's not sent to our servers. Clear your browser data to remove it.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-file-download"></i>
                        Can I download these Terms?
                    </div>
                    <div class="faq-answer">
                        Yes! Use the download buttons below to save these Terms as a PDF or printable document for your records.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-sync-alt"></i>
                        How often are Terms updated?
                    </div>
                    <div class="faq-answer">
                        We update our Terms when we add new features or for legal compliance. Check the "Last Updated" date at the top of this page.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-shield-alt"></i>
                        What data do you collect?
                    </div>
                    <div class="faq-answer">
                        We collect anonymized scam pattern data to improve our AI. We don't store personal messages unless you explicitly report them.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-money-bill-wave"></i>
                        Are you liable if I get scammed?
                    </div>
                    <div class="faq-answer">
                        No. As stated in Section 6, we provide educational suggestions only. You should always verify with official sources before taking action.
                    </div>
                </div>
            </div>
        </section>
        
        <!-- DOWNLOAD SECTION -->
        <section class="download-section">
            <div class="terms-header">
                <h2><i class="fas fa-download"></i> DOWNLOAD OPTIONS</h2>
                <p class="section-subtitle">Save a copy of these Terms for your records</p>
            </div>
            
            <div class="download-options">
                <button class="download-btn" onclick="downloadTerms('pdf')">
                    <i class="fas fa-file-pdf"></i> Download as PDF
                </button>
                <button class="download-btn" onclick="printTerms()">
                    <i class="fas fa-print"></i> Print Terms
                </button>
                <button class="download-btn" onclick="emailTerms()">
                    <i class="fas fa-envelope"></i> Email to Me
                </button>
            </div>
        </section>
        
        <!-- FOOTER -->
        <footer>
            <div class="footer-links">
                <a href="privacy-policy.php"><i class="fas fa-user-shield"></i> Privacy Policy</a>
                <a href="cookie-policy.php"><i class="fas fa-cookie"></i> Cookie Policy</a>
                <a href="contact.php"><i class="fas fa-headset"></i> Contact Support</a>
                <a href="report-scam.php"><i class="fas fa-flag"></i> Report Scam</a>
            </div>
            
            <p class="copyright">
                © 2025 AI Scam Assistant – Terms of Service v2.1 | Last Updated: December 1, 2025<br>
                This document is legally binding. Please read carefully before agreeing.
            </p>
        </footer>
    </main>
    
    <script>
        // Reading Progress Tracking
        function updateReadingProgress() {
            const termsSection = document.querySelector('.terms-section');
            const articles = termsSection.querySelectorAll('.terms-article');
            const progressFill = document.getElementById('progressFill');
            
            let totalHeight = 0;
            let viewedHeight = 0;
            
            articles.forEach(article => {
                const rect = article.getBoundingClientRect();
                totalHeight += rect.height;
                
                // Check if article is in viewport
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    const visibleHeight = Math.min(rect.bottom, window.innerHeight) - Math.max(rect.top, 0);
                    viewedHeight += visibleHeight;
                }
            });
            
            const progress = totalHeight > 0 ? (viewedHeight / totalHeight) * 100 : 0;
            progressFill.style.width = `${Math.min(100, progress)}%`;
            
            // Update reading time estimate
            const remainingPercentage = 100 - Math.min(100, progress);
            const remainingSeconds = Math.round((remainingPercentage / 100) * 510); // 8.5 minutes total
            const minutes = Math.floor(remainingSeconds / 60);
            const seconds = remainingSeconds % 60;
            
            document.getElementById('readingTime').textContent = 
                `${minutes} min${minutes !== 1 ? 's' : ''} ${seconds} sec${seconds !== 1 ? 's' : ''}`;
        }
        
        // Toggle simple explanations
        function toggleExplanation(clauseId) {
            const explanation = document.getElementById(`explain-${clauseId}`);
            explanation.classList.toggle('show');
            
            const button = event.target.closest('.explain-btn');
            if (explanation.classList.contains('show')) {
                button.innerHTML = '<i class="fas fa-times-circle"></i> Hide Explanation';
            } else {
                button.innerHTML = '<i class="fas fa-question-circle"></i> What does this mean?';
            }
        }
        
        // Terms Agreement
        const agreeCheckbox = document.getElementById('agreeTerms');
        const agreeButton = document.getElementById('agreeButton');
        
        agreeCheckbox.addEventListener('change', function() {
            agreeButton.disabled = !this.checked;
        });
        
        function agreeToTerms() {
            if (!agreeCheckbox.checked) return;
            
            const agreementData = {
                accepted: true,
                version: '2.1',
                date: new Date().toISOString(),
                ip: 'anonymized'
            };
            
            // Save to localStorage
            localStorage.setItem('terms_agreement', JSON.stringify(agreementData));
            
            // Show success message
            showNotification('✅ Terms accepted successfully!', 'success');
            
            // Enable website features (in real app, this would enable premium features)
            setTimeout(() => {
                // Redirect or enable features
                // window.location.href = 'dashboard.php';
            }, 1500);
        }
        
        // Check if already agreed
        function checkExistingAgreement() {
            const existing = localStorage.getItem('terms_agreement');
            if (existing) {
                const agreement = JSON.parse(existing);
                if (agreement.version === '2.1') {
                    agreeCheckbox.checked = true;
                    agreeButton.disabled = false;
                    agreeButton.innerHTML = '<i class="fas fa-check-circle"></i> Already Accepted';
                    agreeButton.style.background = 'linear-gradient(135deg, #10b981, #059669)';
                }
            }
        }
        
        // Download Functions
        function downloadTerms(format) {
            showNotification(`Preparing ${format.toUpperCase()} download...`, 'info');
            
            setTimeout(() => {
                if (format === 'pdf') {
                    // In real implementation, this would generate PDF
                    // For demo, we'll create a text file
                    const content = document.querySelector('.terms-section').innerText;
                    const blob = new Blob([content], { type: 'text/plain' });
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'AI-Scam-Assistant-Terms-v2.1.txt';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    window.URL.revokeObjectURL(url);
                    
                    showNotification('Terms downloaded as text file!', 'success');
                }
            }, 1000);
        }
        
        function printTerms() {
            window.print();
        }
        
        function emailTerms() {
            const email = prompt('Enter your email address to receive the Terms:');
            if (email && validateEmail(email)) {
                showNotification(`Terms sent to ${email}`, 'success');
                // In real app, this would trigger email API
            } else if (email) {
                showNotification('Please enter a valid email address', 'error');
            }
        }
        
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
        
        // Notification System
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 100px;
                right: 30px;
                background: ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#7c3aed'};
                color: white;
                padding: 15px 25px;
                border-radius: 12px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
                z-index: 9999;
                animation: slideIn 0.3s ease;
                font-weight: 600;
                display: flex;
                align-items: center;
                gap: 10px;
                max-width: 350px;
            `;
            
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-triangle' : 'info-circle'}"></i>
                ${message}
            `;
            
            document.body.appendChild(notification);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Check existing agreement
            checkExistingAgreement();
            
            // Set up scroll tracking
            window.addEventListener('scroll', updateReadingProgress);
            window.addEventListener('resize', updateReadingProgress);
            
            // Initial progress calculation
            setTimeout(updateReadingProgress, 500);
            
            // Add animation styles
            const style = document.createElement('style');
            style.textContent = `
                @keyframes slideIn {
                    from { transform: translateX(100%); opacity: 0; }
                    to { transform: translateX(0); opacity: 1; }
                }
                @keyframes slideOut {
                    from { transform: translateX(0); opacity: 1; }
                    to { transform: translateX(100%); opacity: 0; }
                }
            `;
            document.head.appendChild(style);
            
            // Animate hero stats
            const stats = document.querySelectorAll('.hero-stat-number');
            stats.forEach(stat => {
                const original = stat.textContent;
                if (original.includes('.')) {
                    const num = parseFloat(original);
                    let current = 0;
                    const duration = 2000;
                    const step = num / (duration / 16);
                    
                    const timer = setInterval(() => {
                        current += step;
                        if (current >= num) {
                            current = num;
                            clearInterval(timer);
                            stat.textContent = original;
                        } else {
                            stat.textContent = current.toFixed(1);
                        }
                    }, 16);
                }
            });
        });
    </script>
</body>
</html>