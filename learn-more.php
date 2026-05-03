<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Scam Assistant - Learn More</title>
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

        @media (min-width: 769px) {
            .sidebar {
                transform: translateX(0) !important;
                width: 280px !important;
            }
            .sidebar-closer {
                display: none !important;
            }
        }

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
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 20px;
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

        /* ========== HERO SECTION ========== */
        .hero-section {
            background: linear-gradient(135deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            padding: 50px;
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
            max-width: 1000px;
            margin: 40px auto 0;
        }

        @media (max-width: 1024px) {
            .hero-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .hero-stats {
                grid-template-columns: 1fr;
            }
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

        /* ========== AI PROCESS SECTION ========== */
        .ai-process-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border-radius: 25px;
            padding: 40px;
            margin-bottom: 30px;
            border: 2px solid rgba(124, 58, 237, 0.3);
        }

        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-header h2 {
            font-size: 32px;
            font-weight: 800;
            color: #e5e7eb;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, #7c3aed, #4f46e5);
            border-radius: 2px;
        }

        .section-subtitle {
            font-size: 16px;
            color: #c7d2fe;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* AI Process Flow - SATU BARIS */
        .ai-process-flow {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin: 40px 0;
            padding: 30px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            border: 2px solid rgba(124, 58, 237, 0.2);
        }

        @media (max-width: 992px) {
            .ai-process-flow {
                flex-wrap: wrap;
            }
        }

        .process-step {
            text-align: center;
            padding: 20px;
            min-width: 200px;
            position: relative;
            flex: 1;
        }

        .process-step::after {
            content: '→';
            position: absolute;
            right: -10px;
            top: 50%;
            transform: translateY(-50%);
            color: #7c3aed;
            font-size: 24px;
            font-weight: bold;
        }

        @media (max-width: 992px) {
            .process-step::after {
                content: '↓';
                right: 50%;
                top: auto;
                bottom: -25px;
                transform: translateX(50%);
            }
        }

        .process-step:last-child::after {
            display: none;
        }

        .process-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 0 auto 15px;
        }

        .process-step h4 {
            font-size: 18px;
            color: #e5e7eb;
            margin-bottom: 8px;
        }

        .process-step p {
            font-size: 13px;
            color: #c7d2fe;
        }

        /* ========== 4 CARDS GRID ========== */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 30px;
        }

        @media (max-width: 1200px) {
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .features-grid {
                grid-template-columns: 1fr;
            }
        }

        .feature-card {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 25px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #7c3aed, #4f46e5);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(124, 58, 237, 0.3);
            border-color: #7c3aed;
        }

        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 24px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
        }

        .feature-card h3 {
            font-size: 20px;
            font-weight: 700;
            color: #e5e7eb;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .feature-card p {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.6;
        }

        /* ========== DEMO SECTION ========== */
        .demo-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border-radius: 25px;
            padding: 40px;
            margin: 30px 0;
            border: 2px solid rgba(124, 58, 237, 0.3);
        }

        .demo-container {
            max-width: 1000px;
            margin: 40px auto;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            padding: 30px;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        /* TEXTAREA YANG BESAR */
        .demo-input {
            width: 100%;
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(124, 58, 237, 0.3);
            border-radius: 15px;
            padding: 20px;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            resize: vertical;
            min-height: 150px;
            max-height: 300px;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .demo-input::placeholder {
            color: #94a3b8;
        }

        .demo-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .demo-buttons {
                flex-direction: column;
            }
        }

        .analyze-btn {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            color: white;
            border: none;
            padding: 15px 35px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
            justify-content: center;
        }

        .analyze-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(124, 58, 237, 0.4);
        }

        .secondary-btn {
            background: rgba(124, 58, 237, 0.15);
            border: 2px solid #7c3aed;
            color: #c7d2fe;
            padding: 14px 30px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
            justify-content: center;
        }

        .secondary-btn:hover {
            background: rgba(124, 58, 237, 0.25);
            transform: translateY(-3px);
        }

        .analysis-result {
            margin-top: 30px;
            padding: 30px;
            border-radius: 20px;
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.1);
            display: none;
        }

        .analysis-result.show {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .risk-indicator {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 25px;
        }

        .risk-high { background: rgba(239, 68, 68, 0.2); color: #ef4444; border: 2px solid #ef4444; }
        .risk-medium { background: rgba(245, 158, 11, 0.2); color: #f59e0b; border: 2px solid #f59e0b; }
        .risk-low { background: rgba(16, 185, 129, 0.2); color: #10b981; border: 2px solid #10b981; }

        /* ========== ADVANCED SECTION - SATU BARIS ========== */
        .advanced-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border-radius: 25px;
            padding: 40px;
            margin: 30px 0;
            border: 2px solid rgba(124, 58, 237, 0.3);
        }

        .learning-modules {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-top: 40px;
        }

        @media (max-width: 1200px) {
            .learning-modules {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .learning-modules {
                grid-template-columns: 1fr;
            }
        }

        .module-card {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .module-card:hover {
            transform: translateY(-5px);
            border-color: #10b981;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .module-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .module-badge {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .module-card h3 {
            font-size: 20px;
            font-weight: 700;
            color: #e5e7eb;
            margin-bottom: 15px;
            flex-grow: 1;
        }

        .module-card p {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .module-points {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            flex-grow: 1;
        }

        .module-points li {
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: #c7d2fe;
            font-size: 13px;
        }

        .module-points li:last-child {
            border-bottom: none;
        }

        .module-points li i {
            color: #10b981;
            font-size: 12px;
            margin-top: 3px;
            flex-shrink: 0;
        }

        .progress-container {
            margin-top: auto;
        }

        .progress-bar {
            height: 6px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 8px;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #10b981, #059669);
            border-radius: 3px;
            transition: width 0.5s ease;
        }

        .progress-text {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #a5b4fc;
        }

        /* ========== CERTIFICATE SECTION - SATU BARIS ========== */
        .certificate-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border-radius: 25px;
            padding: 40px;
            margin: 30px 0;
            border: 2px solid rgba(124, 58, 237, 0.3);
        }

        .certificate-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin: 40px 0;
        }

        @media (max-width: 1200px) {
            .certificate-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .certificate-grid {
                grid-template-columns: 1fr;
            }
        }

        .certificate-card {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .certificate-card:hover {
            transform: translateY(-8px);
            border-color: #7c3aed;
            box-shadow: 0 15px 35px rgba(124, 58, 237, 0.2);
        }

        .certificate-icon {
            font-size: 48px;
            color: #7c3aed;
            margin-bottom: 20px;
            flex-shrink: 0;
        }

        .certificate-card h3 {
            font-size: 20px;
            color: #e5e7eb;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .certificate-card p {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 25px;
            flex-grow: 1;
        }

        .generate-btn {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: auto;
        }

        .generate-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
        }

        /* ========== FOOTER ========== */
        footer {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            padding: 30px;
            border-top: 3px solid #7c3aed;
            border-radius: 20px;
            margin-top: 30px;
            text-align: center;
        }

        .copyright {
            color: #94a3b8;
            font-size: 13px;
            line-height: 1.6;
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
            <p>Master Scam Detection & Prevention</p>
        </div>
        
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="index.php" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
			<li class="nav-item">
                <a href="about-us.php" target="_blank" class="nav-link">
                    <i class="fas fa-search"></i>
                    <span>About Us</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="safety-tips.php" target="_blank" class="nav-link">
                    <i class="fas fa-shield-alt"></i>
                    <span>Safety Tips</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="scam-detection.php" target="_blank" class="nav-link">
                    <i class="fas fa-search"></i>
                    <span>Scam Detection</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="recent-threats.php" target="_blank" class="nav-link">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Recent Threats</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="statistics.php" target="_blank" class="nav-link">
                    <i class="fas fa-chart-line"></i>
                    <span>Statistics</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="report-scam.php" target="_blank" class="nav-link">
                    <i class="fas fa-flag"></i>
                    <span>Report Scam</span>
                </a>
            </li>
			<li class="nav-item">
                <a href="learn-more.php" class="nav-link active">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Learn More</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="help-support.php" target="_blank" class="nav-link">
                    <i class="fas fa-question-circle"></i>
                    <span>Help & Support</span>
                </a>
            </li>
			<li class="nav-item">
                <a href="feedback.php" target="_blank" class="nav-link">
                    <i class="fas fa-star"></i>
                    <span>Give Feedback</span>
                </a>
            </li>
        </ul>
        
        <div class="sidebar-footer">
            <p>© 2026 AI Scam & Digital Safety Assistant</p>
            <p>Learn & Mastery Center</p>
        </div>
    </nav>
    
    <!-- MAIN CONTENT -->
    <main class="main-content">
        <!-- HERO SECTION -->
        <section class="hero-section">
            <div class="hero-content">
                <div class="hero-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h1>DEEP DIVE : AI & SCAM MASTERY</h1>
                <p class="hero-subtitle">
                    Master both our AI technology and advanced scam prevention techniques. 
                    Become a certified digital safety expert.
                </p>
                
                <div class="hero-stats">
                    <div class="hero-stat">
                        <span class="hero-stat-number">2,584</span>
                        <span class="hero-stat-label">Certificates Issued</span>
                    </div>
                    <div class="hero-stat">
                        <span class="hero-stat-number">98.7%</span>
                        <span class="hero-stat-label">Learning Success</span>
                    </div>
                    <div class="hero-stat">
                        <span class="hero-stat-number">6</span>
                        <span class="hero-stat-label">Expert Modules</span>
                    </div>
                    <div class="hero-stat">
                        <span class="hero-stat-number">15,327</span>
                        <span class="hero-stat-label">Lessons Completed</span>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- AI PROCESS SECTION -->
        <section class="ai-process-section">
            <div class="section-header">
                <h2>🤖 HOW OUR AI WORKS</h2>
                <p class="section-subtitle">Real-time scam detection process from message to protection</p>
            </div>
            
            <!-- AI Process Flow - SATU BARIS -->
            <div class="ai-process-flow">
                <div class="process-step">
                    <div class="process-icon">
                        <i class="fas fa-inbox"></i>
                    </div>
                    <h4>Message Input</h4>
                    <p>Scans SMS, WhatsApp, email messages</p>
                </div>
                
                <div class="process-step">
                    <div class="process-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4>Pattern Analysis</h4>
                    <p>Compares with 50K+ scam patterns</p>
                </div>
                
                <div class="process-step">
                    <div class="process-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h4>AI Decision</h4>
                    <p>Machine learning risk assessment</p>
                </div>
                
                <div class="process-step">
                    <div class="process-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Safety Action</h4>
                    <p>Instant protection recommendation</p>
                </div>
            </div>
            
            <!-- 4 CARDS GRID - MACHINE LEARNING CORE -->
            <div class="features-grid">
                <div class="feature-card">
                    <div class="card-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h3>Machine Learning Core</h3>
                    <p>Our AI continuously learns from new scam reports, improving accuracy with every detection.</p>
                </div>
                
                <div class="feature-card">
                    <div class="card-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <h3>Massive Scam Database</h3>
                    <p>Access to 50,000+ verified scam patterns from Malaysia and Southeast Asia.</p>
                </div>
                
                <div class="feature-card">
                    <div class="card-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Real-time Processing</h3>
                    <p>Analyzes messages in under 0.5 seconds with 98.7% accuracy rate.</p>
                </div>
                
                <div class="feature-card">
                    <div class="card-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <h3>Privacy First Design</h3>
                    <p>Messages analyzed locally when possible. No personal data stored on servers.</p>
                </div>
            </div>
        </section>
        
        <!-- DEMO SECTION -->
        <section class="demo-section">
            <div class="section-header">
                <h2>🔬 TRY OUR AI DEMO</h2>
                <p class="section-subtitle">Experience how our AI analyzes scam messages in real-time</p>
            </div>
            
            <div class="demo-container">
                <textarea class="demo-input" id="demoMessage" placeholder="Paste a suspicious message here to analyze... Example: 'URGENT: Your Maybank account has been compromised. Click link to verify: maybank-secure.verify-now.my

Your OTP is required within 10 minutes or account will be suspended.'"></textarea>
                
                <div class="demo-buttons">
                    <button class="analyze-btn" onclick="analyzeMessage()">
                        <i class="fas fa-search"></i> Analyze Message
                    </button>
                    <button class="secondary-btn" onclick="loadExample()">
                        <i class="fas fa-lightbulb"></i> Load Example
                    </button>
                </div>
                
                <div class="analysis-result" id="analysisResult">
                    <div class="risk-indicator risk-high">
                        <i class="fas fa-exclamation-triangle"></i>
                        HIGH RISK SCAM DETECTED
                    </div>
                    <h4>🤖 AI Analysis Results:</h4>
                    <p><strong>Pattern Match:</strong> Bank phishing scam (98% confidence)</p>
                    <p><strong>Red Flags Found:</strong> Urgency language, suspicious link, bank impersonation</p>
                    <p><strong>Recommendation:</strong> DO NOT click any links. Contact bank directly using official number.</p>
                    <p><strong>Safety Score:</strong> 12/100 (Extremely Dangerous)</p>
                </div>
            </div>
        </section>
        
        <!-- ADVANCED SCAM PREVENTION MASTERY - SATU BARIS -->
        <section class="advanced-section">
            <div class="section-header">
                <h2>📚 ADVANCED SCAM PREVENTION MASTERY</h2>
                <p class="section-subtitle">Become an expert in identifying and preventing sophisticated scams</p>
            </div>
            
            <div class="learning-modules">
                <!-- Module 1 -->
                <div class="module-card">
                    <div class="module-header">
                        <h3>Psychology of Scammers</h3>
                        <span class="module-badge">MODULE 1</span>
                    </div>
                    <p>Understand the psychological tactics used by scammers to manipulate victims.</p>
                    
                    <ul class="module-points">
                        <li><i class="fas fa-check"></i> Urgency and fear tactics</li>
                        <li><i class="fas fa-check"></i> Authority impersonation</li>
                        <li><i class="fas fa-check"></i> Social engineering methods</li>
                        <li><i class="fas fa-check"></i> Emotional manipulation</li>
                    </ul>
                    
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 85%"></div>
                        </div>
                        <div class="progress-text">
                            <span>Progress</span>
                            <span>85%</span>
                        </div>
                    </div>
                </div>
                
                <!-- Module 2 -->
                <div class="module-card">
                    <div class="module-header">
                        <h3>Digital Forensics Basics</h3>
                        <span class="module-badge">MODULE 2</span>
                    </div>
                    <p>Learn how to trace and analyze digital footprints left by scammers.</p>
                    
                    <ul class="module-points">
                        <li><i class="fas fa-check"></i> URL and domain analysis</li>
                        <li><i class="fas fa-check"></i> Phone number tracing</li>
                        <li><i class="fas fa-check"></i> Email header reading</li>
                        <li><i class="fas fa-check"></i> Social media investigation</li>
                    </ul>
                    
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 60%"></div>
                        </div>
                        <div class="progress-text">
                            <span>Progress</span>
                            <span>60%</span>
                        </div>
                    </div>
                </div>
                
                <!-- Module 3 -->
                <div class="module-card">
                    <div class="module-header">
                        <h3>Financial Scam Analysis</h3>
                        <span class="module-badge">MODULE 3</span>
                    </div>
                    <p>Deep dive into sophisticated financial scams targeting Malaysians.</p>
                    
                    <ul class="module-points">
                        <li><i class="fas fa-check"></i> Investment fraud patterns</li>
                        <li><i class="fas fa-check"></i> Banking scam red flags</li>
                        <li><i class="fas fa-check"></i> Money laundering signs</li>
                        <li><i class="fas fa-check"></i> Recovery room scams</li>
                    </ul>
                    
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 45%"></div>
                        </div>
                        <div class="progress-text">
                            <span>Progress</span>
                            <span>45%</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- EARN CERTIFICATES - SATU BARIS -->
        <section class="certificate-section">
            <div class="section-header">
                <h2>🏆 EARN YOUR CERTIFICATES</h2>
                <p class="section-subtitle">Get certified as a Digital Safety Expert</p>
            </div>
            
            <div class="certificate-grid">
                <!-- Certificate 1 -->
                <div class="certificate-card">
                    <div class="certificate-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h3>AI System Expert</h3>
                    <p>Demonstrate deep understanding of our AI scam detection technology and capabilities.</p>
                    <button class="generate-btn" onclick="generateCertificate('ai-expert')">
                        <i class="fas fa-certificate"></i> Generate Certificate
                    </button>
                </div>
                
                <!-- Certificate 2 -->
                <div class="certificate-card">
                    <div class="certificate-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Scam Prevention Master</h3>
                    <p>Prove mastery in identifying, analyzing, and preventing advanced scam techniques.</p>
                    <button class="generate-btn" onclick="generateCertificate('scam-master')">
                        <i class="fas fa-certificate"></i> Generate Certificate
                    </button>
                </div>
                
                <!-- Certificate 3 -->
                <div class="certificate-card">
                    <div class="certificate-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h3>Digital Safety Educator</h3>
                    <p>Certified to teach others about digital safety and scam prevention strategies.</p>
                    <button class="generate-btn" onclick="generateCertificate('safety-educator')">
                        <i class="fas fa-certificate"></i> Generate Certificate
                    </button>
                </div>
            </div>
        </section>
        
        <!-- FOOTER -->
        <footer>
            <p class="copyright">
                © 2026 AI Scam & Digital Safety Assistant – Learn More & Mastery Center.<br>
                Advanced Education System | Protected by AI Security Protocols
            </p>
        </footer>
    </main>
    
    <script>
        // Mobile Sidebar Toggle
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
        
        // Animate statistics
        function animateStats() {
            const stats = document.querySelectorAll('.hero-stat-number');
            stats.forEach(stat => {
                const originalText = stat.textContent;
                const target = originalText.replace(/,/g, '');
                
                if (isNaN(target)) return;
                
                const numTarget = parseInt(target);
                const duration = 2000;
                const step = numTarget / (duration / 16);
                let current = 0;
                
                const timer = setInterval(() => {
                    current += step;
                    if (current >= numTarget) {
                        current = numTarget;
                        clearInterval(timer);
                        stat.textContent = originalText;
                    } else {
                        stat.textContent = Math.floor(current).toLocaleString();
                    }
                }, 16);
            });
        }
        
        // Load Example Message
        function loadExample() {
            const exampleMessage = `URGENT: Your Maybank account has been compromised!
We detected suspicious login attempts from unknown device.
Click link below to verify your identity within 10 minutes:
🔗 https://maybank-secure.verify-now.my

Your account will be SUSPENDED if not verified immediately.
DO NOT share this message with anyone.
- Maybank Security Team`;
            
            document.getElementById('demoMessage').value = exampleMessage;
        }
        
        // Analyze Message Function
        function analyzeMessage() {
            const message = document.getElementById('demoMessage').value;
            const resultDiv = document.getElementById('analysisResult');
            
            if (!message.trim()) {
                alert('Please enter or paste a message to analyze!');
                return;
            }
            
            // Show loading effect
            resultDiv.innerHTML = `
                <div style="text-align: center; padding: 20px;">
                    <i class="fas fa-spinner fa-spin" style="font-size: 24px; color: #7c3aed; margin-bottom: 15px;"></i>
                    <p>🤖 AI is analyzing your message...</p>
                </div>
            `;
            resultDiv.classList.add('show');
            
            // Simulate AI analysis
            setTimeout(() => {
                const scamKeywords = ['urgent', 'suspended', 'click', 'verify', 'password', 'OTP', 'won', 'prize', 'bank', 'secure', 'login', 'account'];
                const messageLower = message.toLowerCase();
                let scamScore = 0;
                let redFlags = [];
                
                // Basic scam detection logic
                scamKeywords.forEach(keyword => {
                    if (messageLower.includes(keyword)) {
                        scamScore += 10;
                        redFlags.push(keyword);
                    }
                });
                
                // Check for suspicious patterns
                if (messageLower.includes('http') || messageLower.includes('.my') || messageLower.includes('.com')) {
                    scamScore += 20;
                    redFlags.push('suspicious link');
                }
                
                if (messageLower.includes('!') || messageLower.includes('URGENT') || message.includes('立即')) {
                    scamScore += 15;
                    redFlags.push('urgency language');
                }
                
                // Determine risk level
                let riskLevel = 'low';
                let riskClass = 'risk-low';
                let riskIcon = 'fas fa-check-circle';
                
                if (scamScore > 60) {
                    riskLevel = 'high';
                    riskClass = 'risk-high';
                    riskIcon = 'fas fa-exclamation-triangle';
                } else if (scamScore > 30) {
                    riskLevel = 'medium';
                    riskClass = 'risk-medium';
                    riskIcon = 'fas fa-exclamation-circle';
                }
                
                // Determine scam type
                let scamType = getScamType(messageLower);
                
                // Display results
                resultDiv.innerHTML = `
                    <div class="risk-indicator ${riskClass}">
                        <i class="${riskIcon}"></i>
                        ${riskLevel.toUpperCase()} RISK SCAM DETECTED
                    </div>
                    <h4>🤖 AI Analysis Results:</h4>
                    <p><strong>Pattern Match:</strong> ${scamType} (${Math.min(100, scamScore + 30)}% confidence)</p>
                    <p><strong>Safety Score:</strong> ${100 - scamScore}/100</p>
                    <p><strong>Red Flags Found (${redFlags.length}):</strong> ${redFlags.slice(0, 5).join(', ')}${redFlags.length > 5 ? '...' : ''}</p>
                    <p><strong>Recommendation:</strong> ${getRecommendation(riskLevel)}</p>
                    <p><strong>Action:</strong> ${getAction(riskLevel)}</p>
                `;
                
            }, 1500);
        }
        
        function getScamType(message) {
            if (message.includes('bank') || message.includes('maybank') || message.includes('cimb')) {
                return 'Bank phishing scam';
            } else if (message.includes('won') || message.includes('prize') || message.includes('lottery')) {
                return 'Prize/lottery scam';
            } else if (message.includes('investment') || message.includes('return') || message.includes('profit')) {
                return 'Investment scam';
            } else if (message.includes('love') || message.includes('romance') || message.includes('dear')) {
                return 'Romance scam';
            } else {
                return 'Suspicious phishing attempt';
            }
        }
        
        function getRecommendation(riskLevel) {
            switch(riskLevel) {
                case 'high':
                    return '⚠️ DO NOT click any links or share personal information. Delete immediately.';
                case 'medium':
                    return '⚠️ Be extremely cautious. Verify through official channels before any action.';
                case 'low':
                    return '⚠️ Exercise caution. Monitor for additional suspicious activity.';
                default:
                    return 'No immediate threat detected, but remain vigilant.';
            }
        }
        
        function getAction(riskLevel) {
            switch(riskLevel) {
                case 'high':
                    return 'Block sender, report to authorities, inform your bank';
                case 'medium':
                    return 'Verify with official sources, do not respond';
                case 'low':
                    return 'Monitor, educate yourself on similar scams';
                default:
                    return 'Stay informed about current scam trends';
            }
        }
        
        // Certificate Generation
        function generateCertificate(type) {
            const userName = prompt('Enter your name for the certificate:', 'Digital Safety Expert');
            
            if (!userName) return;
            
            const certificateNames = {
                'ai-expert': 'AI System Expert',
                'scam-master': 'Scam Prevention Master', 
                'safety-educator': 'Digital Safety Educator'
            };
            
            const today = new Date().toLocaleDateString('en-MY', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            
            const certificateId = 'CERT-' + Math.random().toString(36).substr(2, 9).toUpperCase();
            
            // Create certificate content
            const certificateHTML = `
                <div style="
                    background: linear-gradient(135deg, #0f172a, #020617);
                    color: white;
                    padding: 40px;
                    border-radius: 20px;
                    border: 3px solid #7c3aed;
                    max-width: 800px;
                    margin: 0 auto;
                    font-family: 'Poppins', sans-serif;
                    text-align: center;
                ">
                    <h1 style="color: #7c3aed; font-size: 36px; margin-bottom: 10px;">🎓 CERTIFICATE OF ACHIEVEMENT</h1>
                    <p style="color: #a5b4fc; margin-bottom: 30px;">This certifies that</p>
                    
                    <h2 style="font-size: 42px; color: #e5e7eb; margin: 20px 0; padding: 20px; border-top: 2px solid #7c3aed; border-bottom: 2px solid #7c3aed;">${userName}</h2>
                    
                    <p style="color: #c7d2fe; margin: 20px 0;">has successfully completed the requirements and demonstrated mastery in</p>
                    
                    <h3 style="font-size: 28px; color: #10b981; margin: 25px 0;">${certificateNames[type]}</h3>
                    
                    <div style="display: flex; justify-content: space-around; margin: 30px 0; padding: 20px; background: rgba(124, 58, 237, 0.1); border-radius: 15px;">
                        <div>
                            <p style="color: #a5b4fc; font-size: 14px;">Date Issued</p>
                            <p style="color: white; font-weight: bold;">${today}</p>
                        </div>
                        <div>
                            <p style="color: #a5b4fc; font-size: 14px;">Certificate ID</p>
                            <p style="color: white; font-weight: bold;">${certificateId}</p>
                        </div>
                        <div>
                            <p style="color: #a5b4fc; font-size: 14px;">Issued By</p>
                            <p style="color: white; font-weight: bold;">AI Scam Assistant</p>
                        </div>
                    </div>
                    
                    <div style="margin-top: 40px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.1);">
                        <p style="color: #94a3b8; font-size: 12px;">This certificate verifies completion of advanced training in digital safety and scam prevention.</p>
                    </div>
                </div>
            `;
            
            // Open in new window for printing
            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <html>
                <head>
                    <title>Certificate - ${certificateNames[type]}</title>
                    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
                    <style>
                        body { font-family: 'Poppins', sans-serif; margin: 0; padding: 20px; background: #f5f5f5; }
                        @media print {
                            body { background: white; }
                            .no-print { display: none; }
                        }
                    </style>
                </head>
                <body>
                    ${certificateHTML}
                    <div style="text-align: center; margin-top: 30px;" class="no-print">
                        <button onclick="window.print()" style="
                            background: linear-gradient(135deg, #7c3aed, #4f46e5);
                            color: white;
                            border: none;
                            padding: 12px 30px;
                            border-radius: 30px;
                            font-weight: 600;
                            cursor: pointer;
                            margin: 10px;
                        ">
                            🖨️ Print Certificate
                        </button>
                        <button onclick="window.close()" style="
                            background: #ef4444;
                            color: white;
                            border: none;
                            padding: 12px 30px;
                            border-radius: 30px;
                            font-weight: 600;
                            cursor: pointer;
                            margin: 10px;
                        ">
                            Close
                        </button>
                    </div>
                </body>
                </html>
            `);
            printWindow.document.close();
        }
        
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            animateStats();
            
            // Auto-populate demo message if empty
            const demoInput = document.getElementById('demoMessage');
            if (!demoInput.value.trim()) {
                loadExample();
            }
            
            // Handle window resize
            window.addEventListener('resize', function() {
                // Reset sidebar state on desktop
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>