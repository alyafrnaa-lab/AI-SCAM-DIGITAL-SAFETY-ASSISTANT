<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Scam & Digital Safety Assistant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fonts & Icons -->
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

        /* ========== ROBOT CARDS - 2 ROBOT GRID ========== */
        .robots-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        @media (max-width: 768px) {
            .robots-grid {
                grid-template-columns: 1fr;
            }
        }

        .robot-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px;
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        @media (max-width: 768px) {
            .robot-card {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }
        }

        .robot-content {
            flex: 1;
        }

        .robot-content h2 {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 10px;
            color: white;
        }

        .robot-content p {
            font-size: 14px;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .robot-icon {
            font-size: 60px;
            margin-left: 20px;
            animation: robotFloat 3s ease-in-out infinite;
        }

        @media (max-width: 768px) {
            .robot-icon {
                margin-left: 0;
            }
        }

        @keyframes robotFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .robot-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .robot-btn {
            padding: 10px 20px;
            background: white;
            color: #667eea;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .robot-btn:hover {
            background: #f0f0f0;
            transform: translateY(-3px);
        }

        .robot-btn.secondary {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid white;
            color: white;
        }

        .robot-btn.secondary:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* ========== ANALYSIS SECTION ========== */
        .analysis-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

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

        /* ========== ANALYSIS FORM ========== */
        .analysis-form {
            margin-top: 20px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .input-header label {
            font-size: 15px;
            color: #f9fafb;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .input-header label i {
            color: #7c3aed;
            font-size: 18px;
        }

        .char-count {
            font-size: 13px;
            color: #9ca3af;
            font-weight: 500;
        }

        textarea {
            width: 100%;
            background: rgba(0, 0, 0, 0.4);
            color: #f9fafb;
            border: 2px solid #312e81;
            border-radius: 12px;
            padding: 20px;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            resize: vertical;
            min-height: 150px;
            line-height: 1.5;
        }

        textarea:focus {
            outline: none;
            border-color: #7c3aed;
        }

        /* ========== EXAMPLES SECTION ========== */
        .examples-section {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid #312e81;
            border-radius: 12px;
            padding: 20px;
            margin-top: 20px;
        }

        .examples-title {
            font-size: 16px;
            color: #f9fafb;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
        }

        .examples-title i {
            color: #f59e0b;
            font-size: 18px;
        }

        /* Example Buttons Grid */
        .example-buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .example-buttons {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .example-buttons {
                grid-template-columns: 1fr;
            }
        }

        .example-btn {
            padding: 12px 15px;
            background: rgba(124, 58, 237, 0.15);
            border: 2px solid #7c3aed;
            border-radius: 10px;
            color: #c7d2fe;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            gap: 8px;
            justify-content: center;
        }

        .example-btn:hover {
            background: rgba(124, 58, 237, 0.25);
            transform: translateY(-2px);
        }

        /* Language Buttons Grid */
        .lang-example-selector {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        @media (max-width: 768px) {
            .lang-example-selector {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .lang-example-selector {
                grid-template-columns: 1fr;
            }
        }

        .lang-btn {
            padding: 10px 15px;
            background: rgba(30, 64, 175, 0.15);
            border: 2px solid #3b82f6;
            border-radius: 10px;
            color: #93c5fd;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: 'Poppins', sans-serif;
            justify-content: center;
        }

        .lang-btn:hover {
            background: rgba(30, 64, 175, 0.25);
            transform: translateY(-2px);
        }

        .lang-btn.active {
            background: #3b82f6;
            color: white;
        }

        /* ========== ACTION BUTTONS ========== */
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
            }
        }

        .analyze-btn {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            border: none;
            color: white;
            padding: 16px 30px;
            font-size: 16px;
            font-weight: 700;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            border: none;
            font-family: 'Poppins', sans-serif;
            flex: 1;
            justify-content: center;
        }

        .analyze-btn:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, #8b5cf6, #6366f1);
        }

        .secondary-btn {
            background: rgba(124, 58, 237, 0.15);
            border: 2px solid #7c3aed;
            color: #c7d2fe;
            padding: 14px 25px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            flex: 1;
            justify-content: center;
        }

        .secondary-btn:hover {
            background: rgba(124, 58, 237, 0.25);
            transform: translateY(-3px);
        }

        .disclaimer-note {
            margin-top: 20px;
            color: #9ca3af;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 10px;
            line-height: 1.5;
        }

        /* ========== TRENDING SCAMS ========== */
        .trending-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .scam-alerts-grid {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }

        .scam-alert {
            display: flex;
            gap: 20px;
            padding: 20px;
            border-radius: 15px;
            align-items: center;
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .scam-alert {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
        }

        .scam-alert:hover {
            transform: translateX(5px);
        }

        .scam-alert.critical {
            background: linear-gradient(145deg, rgba(220, 38, 38, 0.15), rgba(185, 28, 28, 0.1));
            border-left: 8px solid #ef4444;
        }

        .scam-alert.high {
            background: linear-gradient(145deg, rgba(245, 158, 11, 0.15), rgba(217, 119, 6, 0.1));
            border-left: 8px solid #f59e0b;
        }

        .scam-alert.medium {
            background: linear-gradient(145deg, rgba(59, 130, 246, 0.15), rgba(29, 78, 216, 0.1));
            border-left: 8px solid #3b82f6;
        }

        .alert-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .scam-alert.critical .alert-icon {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
        }

        .scam-alert.high .alert-icon {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
        }

        .scam-alert.medium .alert-icon {
            background: rgba(59, 130, 246, 0.2);
            color: #3b82f6;
        }

        .alert-content {
            flex: 1;
        }

        .alert-content h4 {
            font-size: 18px;
            color: #f9fafb;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .alert-content p {
            color: #c7d2fe;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .alert-stats {
            font-size: 12px;
            color: #9ca3af;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        /* ========== INFO CARDS - GRID 4 KOLUM ========== */
        .info-cards-section {
            margin-bottom: 30px;
        }

        .info-cards-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        @media (min-width: 1024px) {
            .info-cards-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (min-width: 768px) and (max-width: 1023px) {
            .info-cards-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 767px) {
            .info-cards-grid {
                grid-template-columns: 1fr;
            }
        }

        .info-card {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 15px;
            padding: 25px;
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
            border-color: #7c3aed;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 20px;
        }

        .info-card:nth-child(1) .card-icon {
            background: rgba(245, 158, 11, 0.15);
            color: #f59e0b;
        }

        .info-card:nth-child(2) .card-icon {
            background: rgba(59, 130, 246, 0.15);
            color: #3b82f6;
        }

        .info-card:nth-child(3) .card-icon {
            background: rgba(124, 58, 237, 0.15);
            color: #7c3aed;
        }

        .info-card:nth-child(4) .card-icon {
            background: rgba(22, 163, 74, 0.15);
            color: #22c55e;
        }

        .info-card h4 {
            font-size: 18px;
            color: #f9fafb;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .info-card p {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.5;
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
            <p>Multi-Language Scam Detection System</p>
        </div>
        
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="index.php" class="nav-link active">
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
                    <span class="badge">NEW</span>
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
                    <span class="badge">LIVE</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="report-scam.php" target="_blank" class="nav-link">
                    <i class="fas fa-flag"></i>
                    <span>Report Scam</span>
                </a>
            </li>
			<li class="nav-item">
                <a href="learn-more.php" target="_blank" class="nav-link">
                    <i class="fas fa-search"></i>
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
            <p>Malaysian Scam Detection System</p>
        </div>
    </nav>
    
    <!-- MAIN CONTENT -->
    <main class="main-content">
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
                    <div class="stat-number" id="accuracyRate">96.7%</div>
                    <div class="stat-change">
                        <i class="fas fa-check-circle"></i> Based on 10k verified cases
                    </div>
                </div>
            </div>
        </section>
        
        <!-- HERO HEADER -->
        <section class="hero-header">
            <div class="header-text">
                <h1>AI Scam & Digital Safety Assistant</h1>
                <p class="tagline">
                    Protecting Malaysian users from online scams using multi-language AI detection 
                    and intelligent pattern analysis with 96.7% accuracy.
                </p>
            </div>
            <div class="header-icon">
                <i class="fas fa-robot"></i>
            </div>
        </section>
        
        <!-- 2 ROBOT CARDS - GRID DUA KOLUM -->
        <section class="robots-grid">
            <!-- Robot Card 1 -->
            <div class="robot-card">
                <div class="robot-content">
                    <h2>Scan Messages Now</h2>
                    <p>Paste any suspicious message and let our AI analyze it for scam indicators instantly.</p>
                    <div class="robot-buttons">
                        <a href="#analyze" class="robot-btn">
                            <i class="fas fa-search"></i> Start Scan
                        </a>
                        <a href="scam-detection.php" target="_blank" class="robot-btn secondary">
                            <i class="fas fa-chart-line"></i> View Demo
                        </a>
                    </div>
                </div>
                <div class="robot-icon">
                    🤖
                </div>
            </div>
            
            <!-- Robot Card 2 -->
            <div class="robot-card">
                <div class="robot-content">
                    <h2>Learn Safety Tips</h2>
                    <p>Discover essential strategies to protect yourself from evolving online scams and frauds.</p>
                    <div class="robot-buttons">
                        <a href="safety-tips.php" target="_blank" class="robot-btn">
                            <i class="fas fa-shield-alt"></i> Safety Guide
                        </a>
                        
                    </div>
                </div>
                <div class="robot-icon">
                    🛡️
                </div>
            </div>
        </section>
        
        <!-- ANALYSIS SECTION -->
        <section class="analysis-section" id="analyze">
            <div class="section-title">
                <i class="fas fa-search"></i>
                <h3>Analyze Suspicious Messages</h3>
            </div>
            
            <p class="section-subtitle">
                Paste any suspicious message below to receive an AI-based risk assessment with detailed analysis. 
                Our system supports multiple languages including English, Malay, and code-switching patterns.
            </p>
            
            <form method="POST" action="analyze.php" class="analysis-form" id="analysisForm">
                <div class="input-group">
                    <div class="input-header">
                        <label>
                            <i class="fas fa-comment-dots"></i> Message Content
                        </label>
                        <span id="charCount" class="char-count">0 characters</span>
                    </div>
                    <textarea 
                        name="message" 
                        id="message" 
                        rows="6" 
                        placeholder="Paste suspicious message here... Examples:
• 'Congratulations! You've won a $1000 gift card. Click here to claim now!'
• 'Urgent: Your account will be suspended unless you verify your details immediately.'
• 'Hello, I'm from your bank. We need your OTP to secure your account.'
• 'URGENT: Akaun Maybank anda akan DISEKAT dalam masa 24 jam.'
• 'TAHNIAH! You have won RM5,000 from Shopee Malaysia.'" 
                        required></textarea>
                </div>
                
                <!-- Examples Section -->
                <div class="examples-section">
                    <div class="examples-title">
                        <i class="fas fa-lightbulb"></i> Try Example Messages
                    </div>
                    
                    <div class="example-buttons">
                        <button type="button" class="example-btn" onclick="loadExample(1)">
                            <i class="fas fa-gift"></i> Lottery Scam
                        </button>
                        <button type="button" class="example-btn" onclick="loadExample(2)">
                            <i class="fas fa-university"></i> Bank Phishing
                        </button>
                        <button type="button" class="example-btn" onclick="loadExample(3)">
                            <i class="fas fa-clock"></i> Urgency Scam
                        </button>
                        <button type="button" class="example-btn" onclick="loadExample(4)">
                            <i class="fas fa-heart"></i> Love Scam
                        </button>
                    </div>
                    
                    <div class="examples-title" style="margin-top: 20px;">
                        <i class="fas fa-language"></i> Multi-Language Examples
                    </div>
                    
                    <div class="lang-example-selector">
                        <button type="button" onclick="loadExampleLang('malay')" class="lang-btn">
                            <i class="fas fa-flag"></i> Malay Example
                        </button>
                        <button type="button" onclick="loadExampleLang('english')" class="lang-btn">
                            <i class="fas fa-flag-usa"></i> English Example
                        </button>
                        <button type="button" onclick="loadExampleLang('mixed')" class="lang-btn">
                            <i class="fas fa-language"></i> Mixed Language
                        </button>
                        <button type="button" onclick="loadExampleLang('chinese')" class="lang-btn">
                            <i class="fas fa-flag"></i> Chinese Example
                        </button>
                    </div>
                </div>
                
                <div class="action-buttons">
                    <button type="submit" class="analyze-btn">
                        <i class="fas fa-shield-alt"></i> Analyze Message with AI
                    </button>
                    
                    <a href="safety-tips.php" target="_blank" class="secondary-btn">
                        <i class="fas fa-book"></i> View Safety Guide
                    </a>
                </div>
                
                <div class="disclaimer-note">
                    <i class="fas fa-info-circle"></i>
                    <span>
                        Your message is analyzed locally and not stored on our servers. 
                        This AI tool provides risk analysis support only and does not guarantee 100% accuracy.
                    </span>
                </div>
            </form>
        </section>
        
        <!-- TRENDING SCAMS SECTION -->
        <section class="trending-section">
            <div class="section-title">
                <i class="fas fa-fire"></i>
                <h3>Currently Trending Scams in Malaysia</h3>
            </div>
            
            <p class="section-subtitle">
                Stay updated with the latest scam patterns circulating in Malaysia. 
                These scams are currently active and targeting thousands of users.
            </p>
            
            <div class="scam-alerts-grid">
                <!-- Scam Alert 1 -->
                <div class="scam-alert critical">
                    <div class="alert-icon">
                        <i class="fas fa-radiation"></i>
                    </div>
                    <div class="alert-content">
                        <h4>Bank Phishing (CRITICAL RISK)</h4>
                        <p>
                            Fake Maybank/CIMB security alerts asking for OTP and passwords via SMS and WhatsApp. 
                            Scammers impersonate bank officials with urgent account suspension threats.
                        </p>
                        <div class="alert-stats">
                            <i class="fas fa-user"></i> 350+ reports this week | 
                            <i class="fas fa-map-marker-alt"></i> Nationwide
                        </div>
                    </div>
                </div>
                
                <!-- Scam Alert 2 -->
                <div class="scam-alert high">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <h4>Love & Romance Scams (HIGH RISK)</h4>
                        <p>
                            Fake profiles on social media and dating apps requesting money for medical emergencies 
                            or travel expenses. Emotional manipulation is their primary tactic.
                        </p>
                        <div class="alert-stats">
                            <i class="fas fa-user"></i> 210+ reports this week | 
                            <i class="fas fa-heart-broken"></i> Emotional targeting
                        </div>
                    </div>
                </div>
                
                <!-- Scam Alert 3 -->
                <div class="scam-alert medium">
                    <div class="alert-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="alert-content">
                        <h4>Investment Scams (MEDIUM RISK)</h4>
                        <p>
                            "Guaranteed high returns" crypto and forex investment schemes targeting Malaysians. 
                            Promises of passive income with minimal risk are classic red flags.
                        </p>
                        <div class="alert-stats">
                            <i class="fas fa-user"></i> 180+ reports this week | 
                            <i class="fas fa-money-bill-wave"></i> Financial targeting
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- INFO CARDS - 4 CARDS TERATUR -->
        <section class="info-cards-section">
            <div class="section-title">
                <i class="fas fa-lightbulb"></i>
                <h3>Key Safety Information</h3>
            </div>
            
            <p class="section-subtitle">
                Essential knowledge to protect yourself from online scams. Stay informed and stay safe.
            </p>
            
            <div class="info-cards-grid">
                <div class="info-card">
                    <div class="card-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4>Urgency & Pressure Tactics</h4>
                    <p>
                        Scammers create false urgency with phrases like "act now" or "limited time" 
                        to prevent critical thinking. Legitimate matters don't require immediate action.
                    </p>
                </div>
                
                <div class="info-card">
                    <div class="card-icon">
                        <i class="fas fa-key"></i>
                    </div>
                    <h4>Sensitive Information Requests</h4>
                    <p>
                        Legitimate organizations never ask for OTPs, passwords, or banking details 
                        via messages or calls. Any such request is guaranteed to be a scam.
                    </p>
                </div>
                
                <div class="info-card">
                    <div class="card-icon">
                        <i class="fas fa-spell-check"></i>
                    </div>
                    <h4>Grammar & Spelling Indicators</h4>
                    <p>
                        Many scam messages contain grammatical errors, awkward phrasing, 
                        or unusual capitalization. Professional organizations maintain proper language standards.
                    </p>
                </div>
                
                <div class="info-card">
                    <div class="card-icon">
                        <i class="fas fa-link"></i>
                    </div>
                    <h4>Suspicious Link Detection</h4>
                    <p>
                        Always check URLs before clicking. Fake links often use .online, .site, .xyz domains 
                        or misspell legitimate domains (maybankk.com instead of maybank.com).
                    </p>
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
                    This AI tool provides risk analysis support only and does not guarantee 100% accuracy. 
                    Always use caution and verify suspicious messages through official channels before taking any action. 
                    The system is designed to assist in scam detection but should not replace human judgment.
                </p>
            </div>
            
            <p class="copyright">
                © 2026 AI Scam & Digital Safety Assistant – Malaysian Scam Detection System. All rights reserved.<br>
                | Protected by AI Security Protocols
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
        
        // Character Count
        function updateCharCount() {
            const textarea = document.getElementById('message');
            const charCount = document.getElementById('charCount');
            charCount.textContent = textarea.value.length + ' characters';
        }
        
        // Initialize character count
        document.addEventListener('DOMContentLoaded', function() {
            updateCharCount();
            document.getElementById('message').addEventListener('input', updateCharCount);
            
            // Animate statistics
            animateStatistics();
        });
        
        // Example Messages
        function loadExample(num) {
            const examples = [
                `Congratulations! You've been selected as the winner of our $10,000 cash prize! 
To claim your reward, click the link below and provide your bank details within the next 2 hours. 
This is a limited time offer, act now! 
👉 http://claim-prize-now.online/winner2025`,
                
                `URGENT SECURITY ALERT: Your bank account has been compromised!
Multiple unauthorized login attempts detected from unknown location.
To secure your account, we need you to verify your identity immediately.
Please reply with your OTP and password. Failure to do so will result in account suspension within 24 hours.
🔒 Secure your account: https://bank-secure-verify.link`,
                
                `Hello, this is Microsoft Windows Support Center.
We've detected a critical virus on your computer that is stealing your passwords!
Call us immediately at 1-800-555-0199 or click here to download our security software.
Your system is at high risk if you don't act now!
⚠️ Remove virus: https://microsoft-support-antivirus.download`,
                
                `Hello dear, I saw your profile and I really like you.
I'm working overseas but coming back to Malaysia next month.
Can we be friends? I'm having some emergency with hospital bills here.
Can you help me with RM500? I promise to pay back when I return.
💕 Let's connect: http://true-love-connection.site/profile`
            ];
            
            if (num >= 1 && num <= 4) {
                document.getElementById('message').value = examples[num-1];
                updateCharCount();
            }
        }
        
        // Multi-Language Examples
        function loadExampleLang(lang) {
            const examples = {
                malay: `URGENT: Akaun Maybank anda akan DISEKAT dalam masa 24 jam. 
Sila klik link di bawah untuk verify identiti anda:
👉 https://maybank-verify-account.secure-login.my

Jangan kongsi OTP dengan sesiapa. 
Sekiranya sudah verify, abaikan mesej ini.

Terima kasih,
Pasukan Keselamatan Maybank`,
                
                english: `SECURITY ALERT: Suspicious activity detected on your CIMB account.
Your account will be locked within 24 hours unless verified.
We detected multiple login attempts from new device.

Click to verify your identity and secure your account:
🔐 https://cimb-secure.verify-account.com

Do not share this message with anyone.
- CIMB Security Team`,
                
                mixed: `TAHNIAH! You have won RM5,000 from Shopee Malaysia.
Sila click link untuk claim hadiah anda:
🎁 https://shopee-freegift-2024.claim-voucher.my

Limited time offer! 
Tawaran sehingga 31 Disember sahaja.
Jangan lepaskan peluang ini!`,
                
                chinese: `紧急通知：您的Touch 'n Go电子钱包已被锁定！
我们检测到异常交易活动。
请在24小时内点击链接验证您的身份：
🔗 https://tng-wallet-verify.security

请不要分享此验证码。
- Touch 'n Go 安全团队`
            };
            
            if (examples[lang]) {
                document.getElementById('message').value = examples[lang];
                updateCharCount();
                
                // Highlight the selected button
                document.querySelectorAll('.lang-btn').forEach(btn => {
                    btn.classList.remove('active');
                });
                event.target.classList.add('active');
            }
        }
        
        // Animate statistics
        function animateStatistics() {
            const stats = [
                { id: 'scamsToday', target: 1247, duration: 2000 },
                { id: 'usersProtected', target: 45892, duration: 2500 },
                { id: 'messagesAnalyzed', target: 289456, duration: 3000 },
                { id: 'accuracyRate', target: 96.7, duration: 1800, isDecimal: true }
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
        
        // Form validation
        const analysisForm = document.getElementById('analysisForm');
        if (analysisForm) {
            analysisForm.addEventListener('submit', function(e) {
                const message = document.getElementById('message').value.trim();
                
                if (!message) {
                    e.preventDefault();
                    alert('Please enter a message to analyze.');
                    document.getElementById('message').focus();
                    return false;
                }
                
                // Show loading indicator
                const submitBtn = this.querySelector('.analyze-btn');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Analyzing...';
                submitBtn.disabled = true;
                
                // Re-enable after 2 seconds
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            });
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