<?php
session_start();
if (!isset($_SESSION['safety_tips_visited'])) {
    $_SESSION['safety_tips_visited'] = 0;
}
$_SESSION['safety_tips_visited']++;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Scam Assistant - Safety Tips</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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

        /* ========== SIDEBAR (SAMA SEPERTI INDEX.PHP) ========== */
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

        /* ========== HEADER SECTION ========== */
        .header-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 40px 30px;
            margin-bottom: 30px;
            text-align: center;
        }

        .main-title {
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 15px;
            background: linear-gradient(90deg, #7c3aed, #4f46e5, #a5b4fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        @media (max-width: 768px) {
            .main-title {
                font-size: 28px;
            }
        }

        .subtitle {
            font-size: 16px;
            color: #c7d2fe;
            max-width: 800px;
            margin: 0 auto 25px;
            line-height: 1.6;
        }

        /* ========== STATS BAR ========== */
        .stats-bar {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 800px;
            margin: 30px auto 0;
        }

        @media (max-width: 768px) {
            .stats-bar {
                grid-template-columns: 1fr;
            }
        }

        .stat-item {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            border-color: #7c3aed;
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.2);
        }

        .stat-number {
            font-size: 32px;
            font-weight: 800;
            color: #f9fafb;
            margin-bottom: 5px;
            line-height: 1;
            display: block;
        }

        .stat-label {
            font-size: 14px;
            color: #c7d2fe;
            font-weight: 500;
        }

        /* ========== SECTION STYLING ========== */
        .section-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .section-header h2 {
            font-size: 28px;
            font-weight: 800;
            color: #f9fafb;
            margin-bottom: 10px;
        }

        .section-subtitle {
            font-size: 15px;
            color: #c7d2fe;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* ========== SCAM TYPES SECTION ========== */
        .scam-types-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .scam-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .scam-grid {
                grid-template-columns: 1fr;
            }
        }

        .scam-card {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 25px;
            transition: all 0.3s ease;
        }

        .scam-card:hover {
            transform: translateY(-5px);
            border-color: #7c3aed;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .scam-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 24px;
            color: white;
        }

        .scam-card:nth-child(1) .scam-icon {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }

        .scam-card:nth-child(2) .scam-icon {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .scam-card:nth-child(3) .scam-icon {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        }

        .scam-card:nth-child(4) .scam-icon {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        }

        .scam-card:nth-child(5) .scam-icon {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .scam-card:nth-child(6) .scam-icon {
            background: linear-gradient(135deg, #ec4899, #db2777);
        }

        .scam-card h3 {
            font-size: 18px;
            color: #e5e7eb;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .scam-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 15px 0;
            padding: 10px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 8px;
        }

        .risk-level {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            font-size: 13px;
        }

        .risk-high {
            color: #ef4444;
        }

        .risk-medium {
            color: #f59e0b;
        }

        .reports {
            font-size: 12px;
            color: #a5b4fc;
        }

        .scam-points {
            list-style: none;
            padding: 0;
            margin-top: 15px;
        }

        .scam-points li {
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: #c7d2fe;
            font-size: 13px;
            line-height: 1.5;
        }

        .scam-points li:last-child {
            border-bottom: none;
        }

        .scam-points li i {
            color: #7c3aed;
            font-size: 12px;
            margin-top: 3px;
        }

        /* ========== RED FLAGS SECTION ========== */
        .red-flags-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .flags-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .flags-grid {
                grid-template-columns: 1fr;
            }
        }

        .flag-card {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .flag-card:hover {
            transform: translateY(-3px);
            border-color: #ef4444;
        }

        .flag-number {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 15px;
        }

        .flag-card h4 {
            font-size: 16px;
            color: #e5e7eb;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .flag-card p {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.5;
        }

        /* ========== EMERGENCY SECTION ========== */
        .emergency-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-top: 3px solid #ef4444;
            border-bottom: 3px solid #ef4444;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .emergency-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        @media (max-width: 992px) {
            .emergency-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .emergency-grid {
                grid-template-columns: 1fr;
            }
        }

        .emergency-card {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid #ef4444;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .emergency-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(239, 68, 68, 0.2);
        }

        .emergency-icon {
            font-size: 36px;
            color: #ef4444;
            margin-bottom: 15px;
        }

        .emergency-card h3 {
            font-size: 18px;
            color: #e5e7eb;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .contact-number {
            font-size: 24px;
            font-weight: 800;
            color: #ef4444;
            margin: 10px 0;
            display: block;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-number:hover {
            color: #fca5a5;
        }

        .emergency-card p {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.5;
        }

        /* ========== CHECKLIST SECTION ========== */
        .checklist-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .checklist-container {
            max-width: 800px;
            margin: 40px auto 0;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            padding: 30px;
        }

        .checklist-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: background-color 0.3s ease;
        }

        .checklist-item:hover {
            background: rgba(124, 58, 237, 0.1);
            border-radius: 10px;
        }

        .checklist-item:last-child {
            border-bottom: none;
        }

        .checklist-checkbox {
            width: 24px;
            height: 24px;
            border: 2px solid #7c3aed;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .checklist-checkbox:hover {
            background: rgba(124, 58, 237, 0.2);
        }

        .checklist-checkbox.checked {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            color: white;
        }

        .checklist-checkbox.checked::before {
            content: '✓';
            font-weight: bold;
            font-size: 14px;
        }

        .checklist-text {
            color: #c7d2fe;
            font-size: 15px;
            line-height: 1.5;
        }

        .checklist-progress {
            margin-top: 30px;
            text-align: center;
        }

        .progress-bar {
            height: 10px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            overflow: hidden;
            margin: 15px 0;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #7c3aed, #4f46e5);
            width: 0%;
            transition: width 0.5s ease;
        }

        #progressText {
            color: #c7d2fe;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        /* ========== QUIZ SECTION ========== */
        .quiz-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .quiz-container {
            max-width: 800px;
            margin: 40px auto 0;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            padding: 30px;
        }

        .quiz-question {
            font-size: 20px;
            color: #e5e7eb;
            margin-bottom: 25px;
            font-weight: 600;
            line-height: 1.5;
        }

        .quiz-options {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .quiz-option {
            padding: 18px;
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .quiz-option:hover {
            border-color: #7c3aed;
            background: rgba(124, 58, 237, 0.1);
            transform: translateX(5px);
        }

        .option-letter {
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.1);
            color: #c7d2fe;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            flex-shrink: 0;
        }

        .quiz-option.correct {
            border-color: #10b981;
            background: rgba(16, 185, 129, 0.1);
        }

        .quiz-option.wrong {
            border-color: #ef4444;
            background: rgba(239, 68, 68, 0.1);
        }

        .quiz-result {
            margin-top: 30px;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            display: none;
        }

        .quiz-result.show {
            display: block;
        }

        .result-correct {
            background: rgba(16, 185, 129, 0.2);
            border: 2px solid #10b981;
        }

        .result-wrong {
            background: rgba(239, 68, 68, 0.2);
            border: 2px solid #ef4444;
        }

        /* ========== BUTTONS ========== */
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(124, 58, 237, 0.3);
        }

        /* ========== FOOTER ========== */
        footer {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
        }

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

        /* ========== VISITOR COUNTER ========== */
        .visitor-counter {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.7);
            color: #c7d2fe;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 11px;
            z-index: 1000;
            border: 1px solid rgba(124, 58, 237, 0.3);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .visitor-counter i {
            color: #7c3aed;
        }

        /* ========== SCROLLBAR (SAMA SEPERTI INDEX.PHP) ========== */
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
    <!-- Mobile Menu Toggle (SAMA SEPERTI INDEX.PHP) -->
    <button class="menu-toggle" id="menuToggle">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- SIDEBAR (SAMA SEPERTI INDEX.PHP) -->
    <nav class="sidebar" id="sidebar">
        <!-- Close Button for Mobile -->
        <button class="sidebar-closer" id="sidebarCloser">
            <i class="fas fa-times"></i>
        </button>
        
        <div class="logo">
            <i class="fas fa-shield-alt"></i>
            <h2>AI Scam Assistant</h2>
            <p>Multi-Language Scam Detection System</p>
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
                    <i class="fas fa-question-circle"></i>
                    <span>About Us</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="safety-tips.php" class="nav-link active">
                    <i class="fas fa-shield-alt"></i>
                    <span>Safety Tips</span>
                    <span class="badge">NEW</span>
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
                <a href="statistics.php" class="nav-link">
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
                    <i class="fas fa-question-circle"></i>
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
            <p>Malaysian Scam Detection System</p>
        </div>
    </nav>
    
    <!-- MAIN CONTENT -->
    <main class="main-content">
        <!-- HEADER SECTION -->
        <section class="header-section">
            <div class="header-content">
                <h1 class="main-title">ULTIMATE SCAM SAFETY GUIDE</h1>
                <p class="subtitle">Master digital self-defense with our comprehensive guide to identifying, preventing, and reporting online scams in Malaysia.</p>
                
                <div class="stats-bar">
                    <div class="stat-item">
                        <span class="stat-number" id="stat1">12,847</span>
                        <span class="stat-label">Scams Prevented</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" id="stat2">98.7%</span>
                        <span class="stat-label">Success Rate</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" id="stat3">45,892</span>
                        <span class="stat-label">Users Protected</span>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- SCAM TYPES SECTION -->
        <section class="scam-types-section">
            <div class="section-header">
                <h2>🔥 TOP 6 SCAMS IN MALAYSIA</h2>
                <p class="section-subtitle">Know these common scams targeting Malaysians</p>
            </div>
            
            <div class="scam-grid">
                <!-- Scam Card 1 -->
                <div class="scam-card">
                    <div class="scam-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <h3>Bank Phishing Scams</h3>
                    <div class="scam-stats">
                        <div class="risk-level">
                            <i class="fas fa-fire"></i>
                            <span class="risk-high">HIGH RISK</span>
                        </div>
                        <div class="reports">
                            <i class="fas fa-user"></i> 350+/week
                        </div>
                    </div>
                    <ul class="scam-points">
                        <li><i class="fas fa-exclamation-triangle"></i> Fake bank security alerts</li>
                        <li><i class="fas fa-exclamation-triangle"></i> OTP requests via SMS</li>
                        <li><i class="fas fa-exclamation-triangle"></i> Account suspension threats</li>
                        <li><i class="fas fa-exclamation-triangle"></i> Fake bank websites</li>
                    </ul>
                </div>
                
                <!-- Scam Card 2 -->
                <div class="scam-card">
                    <div class="scam-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Love & Romance Scams</h3>
                    <div class="scam-stats">
                        <div class="risk-level">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span class="risk-medium">MEDIUM RISK</span>
                        </div>
                        <div class="reports">
                            <i class="fas fa-user"></i> 210+/week
                        </div>
                    </div>
                    <ul class="scam-points">
                        <li><i class="fas fa-exclamation-triangle"></i> Fake social media profiles</li>
                        <li><i class="fas fa-exclamation-triangle"></i> Emergency money requests</li>
                        <li><i class="fas fa-exclamation-triangle"></i> Emotional manipulation</li>
                        <li><i class="fas fa-exclamation-triangle"></i> Marriage proposals</li>
                    </ul>
                </div>
                
                <!-- Scam Card 3 -->
                <div class="scam-card">
                    <div class="scam-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Investment Scams</h3>
                    <div class="scam-stats">
                        <div class="risk-level">
                            <i class="fas fa-fire"></i>
                            <span class="risk-high">HIGH RISK</span>
                        </div>
                        <div class="reports">
                            <i class="fas fa-user"></i> 180+/week
                        </div>
                    </div>
                    <ul class="scam-points">
                        <li><i class="fas fa-exclamation-triangle"></i> Guaranteed high returns</li>
                        <li><i class="fas fa-exclamation-triangle"></i> Fake crypto platforms</li>
                        <li><i class="fas fa-exclamation-triangle"></i> Ponzi schemes</li>
                        <li><i class="fas fa-exclamation-triangle"></i> Fake testimonials</li>
                    </ul>
                </div>
                
                <!-- Scam Card 4 -->
                <div class="scam-card">
                    <div class="scam-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h3>Prize & Lottery Scams</h3>
                    <div class="scam-stats">
                        <div class="risk-level">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span class="risk-medium">MEDIUM RISK</span>
                        </div>
                        <div class="reports">
                            <i class="fas fa-user"></i> 150+/week
                        </div>
                    </div>
                    <ul class="scam-points">
                        <li><i class="fas fa-exclamation-triangle"></i> Fake lottery wins</li>
                        <li><i class="fas fa-exclamation-triangle"></i> Shopee/Lazada gift cards</li>
                        <li><i class="fas fa-exclamation-triangle"></i> Processing fees required</li>
                        <li><i class="fas fa-exclamation-triangle"></i> "Congratulations" messages</li>
                    </ul>
                </div>
                
                <!-- Scam Card 5 -->
                <div class="scam-card">
                    <div class="scam-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3>Government Impersonation</h3>
                    <div class="scam-stats">
                        <div class="risk-level">
                            <i class="fas fa-fire"></i>
                            <span class="risk-high">HIGH RISK</span>
                        </div>
                        <div class="reports">
                            <i class="fas fa-user"></i> 120+/week
                        </div>
                    </div>
                    <ul class="scam-points">
                        <li><i class="fas fa-exclamation-triangle"></i> Fake LHDN tax refunds</li>
                        <li><i class="fas fa-exclamation-triangle"></i> Police/judiciary threats</li>
                        <li><i class="fas fa-exclamation-triangle"></i> Government grant fees</li>
                        <li><i class="fas fa-exclamation-triangle"></i> Court summons</li>
                    </ul>
                </div>
                
                <!-- Scam Card 6 -->
                <div class="scam-card">
                    <div class="scam-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>E-Wallet & Online Payment</h3>
                    <div class="scam-stats">
                        <div class="risk-level">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span class="risk-medium">MEDIUM RISK</span>
                        </div>
                        <div class="reports">
                            <i class="fas fa-user"></i> 95+/week
                        </div>
                    </div>
                    <ul class="scam-points">
                        <li><i class="fas fa-exclamation-triangle"></i> Fake TNG/Boost top-ups</li>
                        <li><i class="fas fa-exclamation-triangle"></i> QR code phishing</li>
                        <li><i class="fas fa-exclamation-triangle"></i> PIN sharing requests</li>
                        <li><i class="fas fa-exclamation-triangle"></i> Fake payment confirmations</li>
                    </ul>
                </div>
            </div>
        </section>
        
        <!-- RED FLAGS SECTION -->
        <section class="red-flags-section">
            <div class="section-header">
                <h2>🚨 10 RED FLAGS TO SPOT SCAMS</h2>
                <p class="section-subtitle">Warning signs you should never ignore</p>
            </div>
            
            <div class="flags-grid">
                <div class="flag-card">
                    <div class="flag-number">1</div>
                    <h4>URGENCY & PRESSURE</h4>
                    <p>"Act now!", "Within 24 hours" - Scammers create false urgency to prevent thinking.</p>
                </div>
                
                <div class="flag-card">
                    <div class="flag-number">2</div>
                    <h4>SENSITIVE INFO REQUESTS</h4>
                    <p>Legit organizations NEVER ask for OTPs, passwords, or banking details.</p>
                </div>
                
                <div class="flag-card">
                    <div class="flag-number">3</div>
                    <h4>TOO GOOD TO BE TRUE</h4>
                    <p>High returns with no risk = guaranteed scam. If it sounds too good, it's fake.</p>
                </div>
                
                <div class="flag-card">
                    <div class="flag-number">4</div>
                    <h4>SUSPICIOUS LINKS</h4>
                    <p>Check URLs before clicking. Fake domains like .online, .site, .xyz</p>
                </div>
                
                <div class="flag-card">
                    <div class="flag-number">5</div>
                    <h4>GRAMMAR ERRORS</h4>
                    <p>Poor English/Malay, awkward phrasing are common in scam messages.</p>
                </div>
                
                <div class="flag-card">
                    <div class="flag-number">6</div>
                    <h4>MONEY TRANSFER REQUESTS</h4>
                    <p>Upfront payments to personal accounts are major red flags.</p>
                </div>
                
                <div class="flag-card">
                    <div class="flag-number">7</div>
                    <h4>THREATS & INTIMIDATION</h4>
                    <p>"Legal action", "Account closure" threats are used to scare victims.</p>
                </div>
                
                <div class="flag-card">
                    <div class="flag-number">8</div>
                    <h4>EMOTIONAL MANIPULATION</h4>
                    <p>Medical emergencies, family crises stories designed to evoke sympathy.</p>
                </div>
                
                <div class="flag-card">
                    <div class="flag-number">9</div>
                    <h4>UNOFFICIAL CONTACTS</h4>
                    <p>Real banks don't use personal WhatsApp numbers for official matters.</p>
                </div>
                
                <div class="flag-card">
                    <div class="flag-number">10</div>
                    <h4>UNKNOWN NUMBERS</h4>
                    <p>+60 numbers you don't recognize calling about "issues" with your accounts.</p>
                </div>
            </div>
        </section>
        
        <!-- EMERGENCY SECTION -->
        <section class="emergency-section">
            <div class="section-header">
                <h2>🚨 EMERGENCY CONTACTS</h2>
                <p class="section-subtitle">What to do if you've been scammed - Act Immediately!</p>
            </div>
            
            <div class="emergency-grid">
                <div class="emergency-card">
                    <i class="fas fa-phone-alt emergency-icon"></i>
                    <h3>Scam Response Center</h3>
                    <a href="tel:997" class="contact-number">📞 997</a>
                    <p>24/7 emergency line for immediate scam reporting and assistance</p>
                </div>
                
                <div class="emergency-card">
                    <i class="fas fa-university emergency-icon"></i>
                    <h3>Bank Negara Malaysia</h3>
                    <a href="tel:1300885465" class="contact-number">📞 1-300-88-5465</a>
                    <p>Report financial scams, unauthorized transactions</p>
                </div>
                
                <div class="emergency-card">
                    <i class="fas fa-shield-alt emergency-icon"></i>
                    <h3>Malaysia Police</h3>
                    <a href="tel:999" class="contact-number">📞 999</a>
                    <p>Emergency police assistance for scam victims</p>
                </div>
            </div>
        </section>
        
        <!-- CHECKLIST SECTION -->
        <section class="checklist-section">
            <div class="section-header">
                <h2>✅ PERSONAL SAFETY CHECKLIST</h2>
                <p class="section-subtitle">Check off these items to ensure you're protected from scams</p>
            </div>
            
            <div class="checklist-container">
                <div class="checklist-item">
                    <div class="checklist-checkbox" onclick="toggleChecklist(this)"></div>
                    <div class="checklist-text">I never share OTPs, PINs, or passwords with anyone</div>
                </div>
                
                <div class="checklist-item">
                    <div class="checklist-checkbox" onclick="toggleChecklist(this)"></div>
                    <div class="checklist-text">I verify suspicious messages through official channels</div>
                </div>
                
                <div class="checklist-item">
                    <div class="checklist-checkbox" onclick="toggleChecklist(this)"></div>
                    <div class="checklist-text">I have enabled 2FA on all important accounts</div>
                </div>
                
                <div class="checklist-item">
                    <div class="checklist-checkbox" onclick="toggleChecklist(this)"></div>
                    <div class="checklist-text">I check URLs before clicking on any links</div>
                </div>
                
                <div class="checklist-item">
                    <div class="checklist-checkbox" onclick="toggleChecklist(this)"></div>
                    <div class="checklist-text">I monitor my bank statements regularly</div>
                </div>
                
                <div class="checklist-item">
                    <div class="checklist-checkbox" onclick="toggleChecklist(this)"></div>
                    <div class="checklist-text">I keep my software and apps updated</div>
                </div>
                
                <div class="checklist-item">
                    <div class="checklist-checkbox" onclick="toggleChecklist(this)"></div>
                    <div class="checklist-text">I educate family members about common scams</div>
                </div>
                
                <div class="checklist-item">
                    <div class="checklist-checkbox" onclick="toggleChecklist(this)"></div>
                    <div class="checklist-text">I know how to report scams to authorities</div>
                </div>
                
                <div class="checklist-progress">
                    <div id="progressText">0/8 Completed</div>
                    <div class="progress-bar">
                        <div class="progress-fill" id="progressFill"></div>
                    </div>
                    <button class="btn" onclick="resetChecklist()">Reset Checklist</button>
                </div>
            </div>
        </section>
        
        <!-- QUIZ SECTION -->
        <section class="quiz-section">
            <div class="section-header">
                <h2>🧠 SCAM SPOTTER QUIZ</h2>
                <p class="section-subtitle">Test your scam detection skills with this interactive quiz</p>
            </div>
            
            <div class="quiz-container">
                <div class="quiz-question">Is this message legitimate? "URGENT: Your Maybank account will be SUSPENDED in 24 hours. Click here to verify: maybank-verify.secure-login.my"</div>
                
                <div class="quiz-options">
                    <div class="quiz-option" onclick="checkAnswer(this, 'wrong')">
                        <div class="option-letter">A</div>
                        <div>Yes, it's from Maybank and I should click immediately</div>
                    </div>
                    
                    <div class="quiz-option" onclick="checkAnswer(this, 'correct')">
                        <div class="option-letter">B</div>
                        <div>No, it's a scam - banks don't send urgent suspension warnings via SMS</div>
                    </div>
                    
                    <div class="quiz-option" onclick="checkAnswer(this, 'wrong')">
                        <div class="option-letter">C</div>
                        <div>Maybe, I should call the number in the message to check</div>
                    </div>
                    
                    <div class="quiz-option" onclick="checkAnswer(this, 'wrong')">
                        <div class="option-letter">D</div>
                        <div>It looks official, I should login to check my account</div>
                    </div>
                </div>
                
                <div class="quiz-result" id="quizResult"></div>
            </div>
        </section>
        
        <!-- FOOTER -->
        <footer>
            <div class="disclaimer-box" style="background: linear-gradient(145deg, rgba(245, 158, 11, 0.15), rgba(217, 119, 6, 0.1)); border: 2px solid #f59e0b; border-radius: 15px; padding: 20px; margin-bottom: 25px;">
                <h4 style="color: #f9fafb; font-size: 18px; margin-bottom: 10px; display: flex; align-items: center; justify-content: center; gap: 10px;">
                    <i class="fas fa-exclamation-triangle"></i> Important Safety Disclaimer
                </h4>
                <p style="color: #c7d2fe; font-size: 14px; line-height: 1.5;">
                    This safety guide provides educational information only. Always verify information through official channels. 
                    If you suspect you've been scammed, contact authorities immediately. Prevention is better than cure!
                </p>
            </div>
            <p class="copyright">
                © 2026 AI Scam & Digital Safety Assistant – Ultimate Safety Guide.<br>
                Malaysian Scam Detection System.
            </p>
        </footer>
    </main>    
    <script>
        // Mobile Sidebar Toggle (SAMA SEPERTI INDEX.PHP)
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
        
        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('active');
            }
        });
        
        // Quiz Functionality
        function checkAnswer(element, answer) {
            // Remove all previous classes
            document.querySelectorAll('.quiz-option').forEach(opt => {
                opt.classList.remove('correct', 'wrong');
            });
            
            // Add class to clicked option
            element.classList.add(answer);
            
            // Show correct answer for all options
            document.querySelectorAll('.quiz-option').forEach(opt => {
                if (opt.querySelector('.option-letter').textContent === 'B') {
                    opt.classList.add('correct');
                }
            });
            
            const resultDiv = document.getElementById('quizResult');
            if (answer === 'correct') {
                resultDiv.innerHTML = `
                    <div class="result-correct">
                        <h3><i class="fas fa-check-circle"></i> CORRECT!</h3>
                        <p>Excellent! You've correctly identified this as a phishing scam. Banks never send urgent suspension warnings via SMS.</p>
                    </div>
                `;
            } else {
                resultDiv.innerHTML = `
                    <div class="result-wrong">
                        <h3><i class="fas fa-times-circle"></i> INCORRECT!</h3>
                        <p>This is a common phishing scam! Banks don't send urgent suspension warnings via SMS. Always verify through official channels.</p>
                    </div>
                `;
            }
            resultDiv.classList.add('show');
        }
        
        // Checklist Functionality
        function toggleChecklist(checkbox) {
            checkbox.classList.toggle('checked');
            updateProgress();
        }
        
        function updateProgress() {
            const checkboxes = document.querySelectorAll('.checklist-checkbox.checked');
            const total = document.querySelectorAll('.checklist-checkbox').length;
            const completed = checkboxes.length;
            const percentage = (completed / total) * 100;
            
            document.getElementById('progressText').textContent = `${completed}/${total} Completed`;
            document.getElementById('progressFill').style.width = `${percentage}%`;
        }
        
        function resetChecklist() {
            document.querySelectorAll('.checklist-checkbox').forEach(checkbox => {
                checkbox.classList.remove('checked');
            });
            updateProgress();
        }
        
        // Animate statistics
        function animateStats() {
            const stats = [
                { id: 'stat1', target: 12847, duration: 2000 },
                { id: 'stat2', target: 98.7, duration: 1800, isDecimal: true },
                { id: 'stat3', target: 45892, duration: 2200 }
            ];
            
            stats.forEach(stat => {
                const element = document.getElementById(stat.id);
                if (!element) return;
                
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
                    
                    if (stat.isDecimal) {
                        element.textContent = current.toFixed(1) + '%';
                    } else {
                        element.textContent = Math.floor(current).toLocaleString();
                    }
                }, 16);
            });
        }
        
        // Initialize everything
        document.addEventListener('DOMContentLoaded', function() {
            // Animate statistics after page loads
            setTimeout(animateStats, 500);
            
            // Initialize checklist progress
            updateProgress();
        });
    </script>
</body>
</html>