<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Scam Detection Engine | Real-time Fraud Analysis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    
    <style>
        /* ========== RESET & BASE ========== */
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
        }
        
        :root {
            --primary: #7c3aed;
            --primary-dark: #5b21b6;
            --secondary: #06b6d4;
            --danger: #ef4444;
            --warning: #f59e0b;
            --success: #22c55e;
            --dark: #0f172a;
            --darker: #020617;
            --light: #e2e8f0;
            --neon-glow: 0 0 20px rgba(124, 58, 237, 0.7);
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--darker) 0%, #1e1b4b 100%);
            color: var(--light);
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
            z-index: 2000;
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
            .menu-toggle {
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
                z-index: 2001;
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
            z-index: 1999;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(124, 58, 237, 0.3);
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 30px;
            min-height: 100vh;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.97), rgba(2, 6, 23, 0.98));
            transition: margin-left 0.4s ease;
            overflow-x: hidden;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
        }

        /* ========== PARTICLE BACKGROUND ========== */
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        /* ========== NAVBAR ========== */
        .scam-nav {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid var(--primary);
            padding: 20px 40px;
            border-radius: 15px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--neon-glow);
            position: relative;
            z-index: 100;
        }

        @media (max-width: 768px) {
            .scam-nav {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
                margin-top: 20px;
            }
            
            .nav-stats {
                width: 100%;
                justify-content: space-between;
            }
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-brand i {
            font-size: 28px;
            color: var(--primary);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .nav-brand h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 24px;
            font-weight: 900;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: 1px;
        }

        .nav-stats {
            display: flex;
            gap: 30px;
        }

        .live-stat {
            text-align: center;
        }

        .live-stat .number {
            font-family: 'Orbitron', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: var(--success);
            text-shadow: 0 0 10px rgba(34, 197, 94, 0.5);
        }

        .live-stat .label {
            font-size: 12px;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ========== HERO SECTION ========== */
        .hero-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid var(--primary);
            border-radius: 25px;
            padding: 60px;
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
            box-shadow: var(--neon-glow);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        .hero-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 48px;
            font-weight: 900;
            background: linear-gradient(90deg, var(--primary), var(--secondary), #a855f7);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 20px;
            text-align: center;
            line-height: 1.2;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 32px;
            }
            
            .hero-section {
                padding: 30px;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 28px;
            }
        }

        .hero-subtitle {
            font-size: 20px;
            color: #c7d2fe;
            text-align: center;
            max-width: 800px;
            margin: 0 auto 40px;
            line-height: 1.7;
        }

        /* ========== DETECTION DASHBOARD ========== */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-bottom: 50px;
        }

        @media (max-width: 1200px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        .detection-panel {
            background: rgba(15, 23, 42, 0.8);
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 40px;
            backdrop-filter: blur(10px);
            transition: all 0.4s ease;
        }

        .detection-panel:hover {
            border-color: var(--primary);
            box-shadow: 0 0 30px rgba(124, 58, 237, 0.3);
            transform: translateY(-5px);
        }

        .panel-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 28px;
            color: var(--light);
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .panel-title i {
            color: var(--primary);
        }

        /* ========== INPUT AREA ========== */
        .input-area {
            margin-bottom: 30px;
        }

        .input-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .input-header label {
            font-size: 18px;
            font-weight: 600;
            color: var(--light);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .lang-selector {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .lang-btn {
            padding: 10px 20px;
            background: rgba(30, 64, 175, 0.2);
            border: 1px solid #3b82f6;
            border-radius: 10px;
            color: #93c5fd;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .lang-btn.active {
            background: #3b82f6;
            color: white;
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
        }

        .lang-btn:hover:not(.active) {
            background: rgba(30, 64, 175, 0.3);
        }

        .message-input {
            width: 100%;
            height: 200px;
            background: rgba(0, 0, 0, 0.4);
            border: 2px solid #312e81;
            border-radius: 15px;
            padding: 20px;
            color: var(--light);
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            resize: vertical;
            transition: all 0.3s ease;
        }

        .message-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 20px rgba(124, 58, 237, 0.3);
        }

        /* ========== THREAT METER ========== */
        .threat-meter {
            background: linear-gradient(90deg, #22c55e, #f59e0b, #ef4444, #dc2626);
            height: 20px;
            border-radius: 10px;
            margin: 30px 0;
            position: relative;
            overflow: hidden;
        }

        .threat-indicator {
            position: absolute;
            top: -5px;
            width: 4px;
            height: 30px;
            background: white;
            border-radius: 2px;
            box-shadow: 0 0 10px white;
            transition: left 1s ease;
        }

        .threat-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            color: #94a3b8;
            font-size: 14px;
        }

        /* ========== ANALYSIS RESULTS ========== */
        .results-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            .results-grid {
                grid-template-columns: 1fr;
            }
        }

        .result-card {
            background: rgba(30, 27, 75, 0.6);
            border: 1px solid #312e81;
            border-radius: 15px;
            padding: 25px;
            transition: all 0.3s ease;
        }

        .result-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary);
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.2);
        }

        .result-title {
            font-size: 16px;
            color: #94a3b8;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .result-value {
            font-size: 24px;
            font-weight: 700;
            color: var(--light);
        }

        /* ========== SCAM TYPE MATRIX ========== */
        .scam-matrix {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin: 50px 0;
        }

        .scam-card {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.8), rgba(2, 6, 23, 0.9));
            border: 2px solid transparent;
            border-radius: 20px;
            padding: 30px;
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .scam-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.7s;
        }

        .scam-card:hover::before {
            left: 100%;
        }

        .scam-card:hover {
            transform: translateY(-10px) scale(1.02);
            border-color: var(--primary);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.3);
        }

        .scam-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 24px;
            background: rgba(124, 58, 237, 0.2);
            color: var(--primary);
        }

        .scam-card h4 {
            font-size: 22px;
            color: var(--light);
            margin-bottom: 15px;
            font-weight: 700;
        }

        .scam-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            color: #94a3b8;
            font-size: 14px;
        }

        /* ========== INTERACTIVE MAP ========== */
        .map-container {
            background: rgba(15, 23, 42, 0.8);
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 40px;
            margin: 50px 0;
            position: relative;
            overflow: hidden;
        }

        .malaysia-map {
            width: 100%;
            height: 400px;
            background: linear-gradient(145deg, #1e293b, #0f172a);
            border-radius: 15px;
            position: relative;
            margin-top: 30px;
        }

        .heat-point {
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: radial-gradient(circle, #ef4444 0%, transparent 70%);
            animation: pulse 2s infinite;
            cursor: pointer;
        }

        /* ========== REAL-TIME VISUALIZATION ========== */
        .visualization-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 30px;
            margin: 50px 0;
        }

        @media (max-width: 768px) {
            .visualization-grid {
                grid-template-columns: 1fr;
            }
        }

        .viz-card {
            background: rgba(15, 23, 42, 0.8);
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            height: 300px;
            position: relative;
            overflow: hidden;
        }

        .viz-card canvas {
            width: 100% !important;
            height: 100% !important;
        }

        /* ========== CASE STUDIES ========== */
        .case-studies {
            margin: 50px 0;
        }

        .case-timeline {
            position: relative;
            padding-left: 50px;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .case-timeline {
                padding-left: 30px;
            }
        }

        .case-timeline::before {
            content: '';
            position: absolute;
            left: 20px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, var(--primary), var(--secondary));
        }

        .timeline-item {
            position: relative;
            margin-bottom: 40px;
            background: rgba(30, 27, 75, 0.6);
            border-radius: 15px;
            padding: 25px;
            border-left: 5px solid var(--primary);
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -35px;
            top: 25px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: var(--primary);
            box-shadow: 0 0 15px var(--primary);
        }

        /* ========== INTERACTIVE QUIZ ========== */
        .quiz-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid var(--primary);
            border-radius: 25px;
            padding: 50px;
            margin: 50px 0;
            text-align: center;
        }

        @media (max-width: 768px) {
            .quiz-section {
                padding: 30px;
            }
        }

        .quiz-question {
            font-size: 24px;
            color: var(--light);
            margin-bottom: 30px;
        }

        .quiz-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        @media (max-width: 768px) {
            .quiz-options {
                grid-template-columns: 1fr;
            }
        }

        .quiz-option {
            background: rgba(124, 58, 237, 0.1);
            border: 2px solid #312e81;
            border-radius: 15px;
            padding: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .quiz-option:hover {
            background: rgba(124, 58, 237, 0.2);
            border-color: var(--primary);
            transform: translateY(-5px);
        }

        /* ========== DOWNLOAD SECTION ========== */
        .download-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin: 50px 0;
        }

        .download-card {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.8), rgba(2, 6, 23, 0.9));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .download-card:hover {
            border-color: var(--primary);
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.3);
        }

        .download-icon {
            font-size: 48px;
            color: var(--primary);
            margin-bottom: 20px;
        }

        /* ========== COMMUNITY SECTION ========== */
        .community-feed {
            background: rgba(15, 23, 42, 0.8);
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 40px;
            margin: 50px 0;
        }

        .feed-item {
            background: rgba(30, 27, 75, 0.6);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 5px solid var(--warning);
        }

        /* ========== ACTION BUTTONS ========== */
        .action-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
            margin: 40px 0;
        }

        .btn {
            padding: 18px 35px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.4s ease;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            border: none;
            font-family: 'Poppins', sans-serif;
        }

        @media (max-width: 768px) {
            .btn {
                width: 100%;
                justify-content: center;
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.4);
        }

        .btn-secondary {
            background: rgba(124, 58, 237, 0.15);
            border: 2px solid var(--primary);
            color: #c7d2fe;
        }

        .btn-secondary:hover {
            background: rgba(124, 58, 237, 0.25);
            transform: translateY(-5px);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            box-shadow: 0 10px 30px rgba(239, 68, 68, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 40px rgba(239, 68, 68, 0.4);
        }

        /* ========== SCROLL ANIMATIONS ========== */
        .reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* ========== FOOTER ========== */
        .scam-footer {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid var(--primary);
            border-radius: 20px;
            padding: 50px 40px;
            margin-top: 50px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .scam-footer {
                padding: 30px 20px;
            }
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin: 40px 0;
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            .footer-links {
                gap: 15px;
                flex-direction: column;
            }
        }

        .footer-link {
            color: #a5b4fc;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            padding: 12px 25px;
            border-radius: 12px;
            background: rgba(124, 58, 237, 0.1);
            border: 2px solid transparent;
        }

        .footer-link:hover {
            color: var(--primary);
            transform: translateY(-5px);
            background: rgba(124, 58, 237, 0.2);
            border-color: var(--primary);
        }

        .copyright {
            color: #6b7280;
            font-size: 14px;
            margin-top: 30px;
        }

        /* ========== UTILITY CLASSES ========== */
        .text-gradient {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .glow {
            box-shadow: var(--neon-glow);
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        .floating {
            animation: float 6s ease-in-out infinite;
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
				<li class="nav-item">
                <a href="about-us.php" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>About Us</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="safety-tips.php" class="nav-link">
                    <i class="fas fa-shield-alt"></i>
                    <span>Safety Tips</span>
                    <span class="badge">NEW</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="scam-detection.php" class="nav-link active">
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
            <p>© 2026 AI Scam & Digital Safety Assistant.</p>
            <p>Malaysian Scam Detection System</p>
        </div>
    </nav>
    
    <!-- MAIN CONTENT -->
    <main class="main-content">
        <!-- Particle Background -->
        <div id="particles-js"></div>
        
        <!-- Navigation -->
        <nav class="scam-nav">
            <div class="nav-brand">
                <i class="fas fa-shield-alt"></i>
                <h1>AI SCAM DETECTION ENGINE</h1>
            </div>
            <div class="nav-stats">
                <div class="live-stat">
                    <div class="number" id="liveScans">1,842</div>
                    <div class="label">Live Scans</div>
                </div>
                <div class="live-stat">
                    <div class="number" id="scamsBlocked">45,892</div>
                    <div class="label">Scams Blocked</div>
                </div>
                <div class="live-stat">
                    <div class="number">96.7%</div>
                    <div class="label">Accuracy Rate</div>
                </div>
            </div>
        </nav>
        
        <!-- Hero Section -->
        <section class="hero-section reveal">
            <h1 class="hero-title">REAL-TIME SCAM DETECTION ENGINE</h1>
            <p class="hero-subtitle">
                Advanced AI-powered fraud detection system analyzing messages in multiple languages with 96.7% accuracy. 
                Protect yourself from phishing, investment scams, romance fraud, and more.
            </p>
        </section>
        
        <!-- Detection Dashboard -->
        <div class="dashboard-grid">
            <!-- Main Analysis Panel -->
            <div class="detection-panel reveal" id="analyze">
                <div class="panel-title">
                    <i class="fas fa-search"></i> AI Detection Engine
                </div>
                
                <div class="input-area">
                    <div class="input-header">
                        <label><i class="fas fa-comment-dots"></i> Analyze Suspicious Message</label>
                        <span id="charCount" class="char-count">0 characters</span>
                    </div>
                    
                    <div class="lang-selector">
                        <button class="lang-btn active" onclick="setLanguage('english')">
                            <i class="fas fa-flag-usa"></i> English
                        </button>
                        <button class="lang-btn" onclick="setLanguage('malay')">
                            <i class="fas fa-flag"></i> Malay
                        </button>
                        <button class="lang-btn" onclick="setLanguage('chinese')">
                            <i class="fas fa-flag"></i> Chinese
                        </button>
                        <button class="lang-btn" onclick="setLanguage('mixed')">
                            <i class="fas fa-language"></i> Mixed
                        </button>
                    </div>
                    
                    <textarea class="message-input" id="messageInput" placeholder="Paste suspicious message here...
• 'Congratulations! You won $10,000! Click here to claim!'
• 'URGENT: Your bank account will be suspended in 24 hours'
• 'Hello dear, I need RM500 for emergency hospital bill'
• 'Investment opportunity: Guaranteed 100% returns monthly'
• 'TAHNIAH! Anda menang RM5,000 dari Shopee Malaysia'" 
                    oninput="updateCharCount()"></textarea>
                </div>
                
                <!-- Threat Meter -->
                <div class="threat-meter">
                    <div class="threat-indicator" id="threatIndicator"></div>
                </div>
                <div class="threat-labels">
                    <span>Low</span>
                    <span>Medium</span>
                    <span>High</span>
                    <span>CRITICAL</span>
                </div>
                
                <div class="action-buttons">
                    <button class="btn btn-primary" onclick="analyzeMessage()">
                        <i class="fas fa-shield-alt"></i> Analyze with AI
                    </button>
                    <button class="btn btn-secondary" onclick="uploadScreenshot()">
                        <i class="fas fa-image"></i> Upload Screenshot
                    </button>
                    <button class="btn btn-secondary" onclick="checkURL()">
                        <i class="fas fa-link"></i> Check URL Safety
                    </button>
                </div>
            </div>
            
            <!-- Live Stats Panel -->
            <div class="detection-panel reveal">
                <div class="panel-title">
                    <i class="fas fa-chart-line"></i> Live Detection Stats
                </div>
                
                <div class="results-grid">
                    <div class="result-card">
                        <div class="result-title">
                            <i class="fas fa-exclamation-triangle"></i> Scam Probability
                        </div>
                        <div class="result-value" id="scamProbability">--%</div>
                    </div>
                    <div class="result-card">
                        <div class="result-title">
                            <i class="fas fa-clock"></i> Response Time
                        </div>
                        <div class="result-value" id="responseTime">-- ms</div>
                    </div>
                    <div class="result-card">
                        <div class="result-title">
                            <i class="fas fa-language"></i> Language Detected
                        </div>
                        <div class="result-value" id="languageDetected">--</div>
                    </div>
                    <div class="result-card">
                        <div class="result-title">
                            <i class="fas fa-brain"></i> AI Confidence
                        </div>
                        <div class="result-value" id="aiConfidence">--%</div>
                    </div>
                </div>
                
                <div class="action-buttons" style="margin-top: 30px;">
                    <button class="btn btn-danger" onclick="reportScam()">
                        <i class="fas fa-flag"></i> Report This Scam
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Scam Type Matrix -->
        <section class="reveal" id="learn">
            <h2 class="panel-title" style="margin-bottom: 40px;">
                <i class="fas fa-layer-group"></i> Scam Type Detection Matrix
            </h2>
            
            <div class="scam-matrix">
                <!-- Scam Card 1 -->
                <div class="scam-card" onclick="showScamDetails('phishing')">
                    <div class="scam-icon">
                        <i class="fas fa-fish"></i>
                    </div>
                    <h4>Phishing Scams</h4>
                    <p>Fake bank/email alerts requesting OTP and passwords</p>
                    <div class="scam-stats">
                        <span><i class="fas fa-user"></i> 350+ reports</span>
                        <span class="text-gradient">CRITICAL</span>
                    </div>
                </div>
                
                <!-- Scam Card 2 -->
                <div class="scam-card" onclick="showScamDetails('investment')">
                    <div class="scam-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Investment Scams</h4>
                    <p>Guaranteed high returns crypto/forex schemes</p>
                    <div class="scam-stats">
                        <span><i class="fas fa-user"></i> 280+ reports</span>
                        <span style="color: #f59e0b">HIGH</span>
                    </div>
                </div>
                
                <!-- Scam Card 3 -->
                <div class="scam-card" onclick="showScamDetails('romance')">
                    <div class="scam-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4>Romance Scams</h4>
                    <p>Fake profiles requesting money for emergencies</p>
                    <div class="scam-stats">
                        <span><i class="fas fa-user"></i> 210+ reports</span>
                        <span style="color: #f59e0b">HIGH</span>
                    </div>
                </div>
                
                <!-- Scam Card 4 -->
                <div class="scam-card" onclick="showScamDetails('tech')">
                    <div class="scam-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h4>Tech Support Scams</h4>
                    <p>Fake IT support claiming virus infection</p>
                    <div class="scam-stats">
                        <span><i class="fas fa-user"></i> 180+ reports</span>
                        <span style="color: #3b82f6">MEDIUM</span>
                    </div>
                </div>
                
                <!-- Scam Card 5 -->
                <div class="scam-card" onclick="showScamDetails('lottery')">
                    <div class="scam-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h4>Lottery Scams</h4>
                    <p>Fake winnings requiring upfront payment</p>
                    <div class="scam-stats">
                        <span><i class="fas fa-user"></i> 150+ reports</span>
                        <span style="color: #3b82f6">MEDIUM</span>
                    </div>
                </div>
                
                <!-- Scam Card 6 -->
                <div class="scam-card" onclick="showScamDetails('job')">
                    <div class="scam-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h4>Job Scams</h4>
                    <p>Fake job offers requiring payment for training</p>
                    <div class="scam-stats">
                        <span><i class="fas fa-user"></i> 120+ reports</span>
                        <span style="color: #3b82f6">MEDIUM</span>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Malaysia Scam Heat Map -->
        <section class="map-container reveal">
            <h2 class="panel-title">
                <i class="fas fa-map-marked-alt"></i> Malaysia Scam Heat Map
            </h2>
            <p style="color: #c7d2fe; margin-bottom: 30px;">
                Real-time visualization of scam reports across Malaysia. Click on hotspots for details.
            </p>
            
            <div class="malaysia-map" id="malaysiaMap">
                <!-- Heat points will be added dynamically -->
            </div>
        </section>
        
        <!-- Real-time Visualization -->
        <section class="reveal">
            <h2 class="panel-title" style="margin-bottom: 40px;">
                <i class="fas fa-eye"></i> Real-time Detection Visualization
            </h2>
            
            <div class="visualization-grid">
                <div class="viz-card">
                    <canvas id="patternChart"></canvas>
                </div>
                <div class="viz-card">
                    <canvas id="timeChart"></canvas>
                </div>
            </div>
        </section>
        
        <!-- Case Studies -->
        <section class="case-studies reveal">
            <h2 class="panel-title" style="margin-bottom: 40px;">
                <i class="fas fa-book-open"></i> Real Case Studies
            </h2>
            
            <div class="case-timeline">
                <div class="timeline-item">
                    <h4 style="color: var(--light); margin-bottom: 10px;">Maybank Phishing Attack</h4>
                    <p style="color: #c7d2fe; margin-bottom: 15px;">
                        User received SMS claiming account suspension. AI detected 12 red flags including 
                        urgency tactics, suspicious link, and grammatical errors.
                    </p>
                    <div style="color: #94a3b8; font-size: 14px;">
                        <i class="fas fa-calendar"></i> 15 Dec 2025 | 
                        <i class="fas fa-shield-alt"></i> Prevented: RM 15,000 loss
                    </div>
                </div>
                
                <div class="timeline-item">
                    <h4 style="color: var(--light); margin-bottom: 10px;">Love Scam Prevention</h4>
                    <p style="color: #c7d2fe; margin-bottom: 15px;">
                        Facebook profile claiming to be overseas worker needed emergency funds. 
                        AI analyzed profile inconsistencies and emotional manipulation patterns.
                    </p>
                    <div style="color: #94a3b8; font-size: 14px;">
                        <i class="fas fa-calendar"></i> 10 Dec 2025 | 
                        <i class="fas fa-heart-broken"></i> Emotional targeting detected
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Interactive Quiz -->
        <section class="quiz-section reveal">
            <h2 class="panel-title" style="margin-bottom: 40px; color: white;">
                <i class="fas fa-gamepad"></i> Spot The Scam Challenge
            </h2>
            
            <div class="quiz-question" id="quizQuestion">
                Is this message legitimate or a scam?
            </div>
            
            <div class="quiz-message" style="
                background: rgba(0,0,0,0.3);
                border: 2px solid #312e81;
                border-radius: 15px;
                padding: 25px;
                margin: 30px 0;
                font-size: 18px;
                color: #c7d2fe;
            ">
                "Congratulations! You've been selected for a RM5,000 government grant. 
                Click here to claim: http://gov-grant-2025.online"
            </div>
            
            <div class="quiz-options">
                <div class="quiz-option" onclick="checkAnswer('legit')">
                    <i class="fas fa-check-circle"></i> Legitimate Offer
                </div>
                <div class="quiz-option" onclick="checkAnswer('scam')">
                    <i class="fas fa-exclamation-triangle"></i> SCAM Alert!
                </div>
            </div>
            
            <div id="quizResult" style="margin-top: 20px; font-size: 18px; font-weight: 600;"></div>
        </section>
        
        <!-- Community Reports -->
        <section class="community-feed reveal">
            <h2 class="panel-title" style="margin-bottom: 40px;">
                <i class="fas fa-users"></i> Live Community Reports
            </h2>
            
            <div class="feed-item">
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                    <span style="color: var(--light); font-weight: 600;">
                        <i class="fas fa-user-circle"></i> Anonymous User
                    </span>
                    <span style="color: #94a3b8; font-size: 14px;">
                        5 minutes ago
                    </span>
                </div>
                <p style="color: #c7d2fe; margin-bottom: 10px;">
                    Received WhatsApp about "Shopee voucher redemption" with suspicious link
                </p>
                <div style="color: #ef4444; font-size: 14px;">
                    <i class="fas fa-tag"></i> E-commerce Scam | 
                    <i class="fas fa-map-marker-alt"></i> Kuala Lumpur
                </div>
            </div>
            
            <div class="feed-item">
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                    <span style="color: var(--light); font-weight: 600;">
                        <i class="fas fa-user-circle"></i> SafeUser123
                    </span>
                    <span style="color: #94a3b8; font-size: 14px;">
                        15 minutes ago
                    </span>
                </div>
                <p style="color: #c7d2fe; margin-bottom: 10px;">
                    SMS claiming to be from "CIMB Security" asking for OTP verification
                </p>
                <div style="color: #ef4444; font-size: 14px;">
                    <i class="fas fa-tag"></i> Bank Phishing | 
                    <i class="fas fa-map-marker-alt"></i> Penang
                </div>
            </div>
            
            <div class="action-buttons" style="margin-top: 30px;">
                <button class="btn btn-primary" onclick="submitReport()">
                    <i class="fas fa-plus"></i> Submit Your Report
                </button>
            </div>
        </section>
        
        <!-- Footer -->
        <footer class="scam-footer">            
            <p class="copyright">
                © 2026 AI Scam Detection Engine – Malaysian Anti-Fraud System.<br>
                Advanced Machine Learning Algorithms | Real-time Threat Intelligence.
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
        
        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('active');
            }
        });

        // ========== PARTICLE BACKGROUND ==========
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: "#7c3aed" },
                shape: { type: "circle" },
                opacity: { value: 0.5, random: true },
                size: { value: 3, random: true },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: "#7c3aed",
                    opacity: 0.2,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: "none",
                    random: true,
                    straight: false,
                    out_mode: "out",
                    bounce: false
                }
            },
            interactivity: {
                detect_on: "canvas",
                events: {
                    onhover: { enable: true, mode: "repulse" },
                    onclick: { enable: true, mode: "push" }
                }
            }
        });

        // ========== SCROLL ANIMATIONS ==========
        gsap.registerPlugin(ScrollTrigger);

        document.addEventListener('DOMContentLoaded', function() {
            // Animate reveal elements on scroll
            gsap.utils.toArray('.reveal').forEach(element => {
                gsap.fromTo(element, 
                    { opacity: 0, y: 50 },
                    {
                        opacity: 1,
                        y: 0,
                        duration: 1,
                        scrollTrigger: {
                            trigger: element,
                            start: "top 80%",
                            toggleActions: "play none none reverse"
                        }
                    }
                );
            });

            // Animate stats
            animateLiveStats();
            initializeCharts();
            initializeMap();
            updateLiveStats();
        });

        // ========== LIVE STATS ANIMATION ==========
        function animateLiveStats() {
            let scans = 1842;
            let blocked = 45892;
            const scanElement = document.getElementById('liveScans');
            const blockedElement = document.getElementById('scamsBlocked');
            
            setInterval(() => {
                scans += Math.floor(Math.random() * 3);
                blocked += Math.floor(Math.random() * 10);
                
                scanElement.textContent = scans.toLocaleString();
                blockedElement.textContent = blocked.toLocaleString();
            }, 3000);
        }

        // ========== CHARTS INITIALIZATION ==========
        function initializeCharts() {
            // Pattern Detection Chart
            const patternCtx = document.getElementById('patternChart').getContext('2d');
            new Chart(patternCtx, {
                type: 'radar',
                data: {
                    labels: ['Urgency', 'Sensitive Info', 'Grammar Errors', 'Suspicious Links', 'Emotional Appeal', 'Too Good To Be True'],
                    datasets: [{
                        label: 'Scam Pattern Analysis',
                        data: [85, 92, 78, 95, 67, 90],
                        backgroundColor: 'rgba(124, 58, 237, 0.2)',
                        borderColor: '#7c3aed',
                        pointBackgroundColor: '#7c3aed',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: '#7c3aed'
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
                            ticks: { display: false, backdropColor: 'transparent' }
                        }
                    },
                    plugins: {
                        legend: { labels: { color: '#c7d2fe' } }
                    }
                }
            });

            // Time Series Chart
            const timeCtx = document.getElementById('timeChart').getContext('2d');
            new Chart(timeCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Scam Reports 2025',
                        data: [120, 145, 180, 210, 280, 320, 380, 420, 450, 480, 520, 580],
                        borderColor: '#ef4444',
                        backgroundColor: 'rgba(239, 68, 68, 0.1)',
                        tension: 0.4,
                        fill: true
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
        }

        // ========== MALAYSIA MAP ==========
        function initializeMap() {
            const map = document.getElementById('malaysiaMap');
            const hotspots = [
                { x: '30%', y: '25%', intensity: 90, state: 'Kuala Lumpur' },
                { x: '25%', y: '40%', intensity: 75, state: 'Selangor' },
                { x: '40%', y: '50%', state: 'Johor' },
                { x: '20%', y: '60%', state: 'Penang' },
                { x: '50%', y: '35%', state: 'Kelantan' },
                { x: '60%', y: '45%', state: 'Sarawak' },
                { x: '55%', y: '65%', state: 'Sabah' }
            ];

            hotspots.forEach(hotspot => {
                const point = document.createElement('div');
                point.className = 'heat-point';
                point.style.left = hotspot.x;
                point.style.top = hotspot.y;
                point.style.width = `${20 + (hotspot.intensity || 50) / 5}px`;
                point.style.height = `${20 + (hotspot.intensity || 50) / 5}px`;
                point.style.background = `radial-gradient(circle, rgba(239, 68, 68, ${(hotspot.intensity || 50)/100}) 0%, transparent 70%)`;
                
                point.onclick = () => showStateDetails(hotspot.state);
                map.appendChild(point);
            });
        }

        // ========== ANALYSIS FUNCTIONS ==========
        function updateCharCount() {
            const textarea = document.getElementById('messageInput');
            const charCount = document.getElementById('charCount');
            charCount.textContent = textarea.value.length + ' characters';
        }

        function setLanguage(lang) {
            document.querySelectorAll('.lang-btn').forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            document.getElementById('languageDetected').textContent = lang.charAt(0).toUpperCase() + lang.slice(1);
        }

        function analyzeMessage() {
            const message = document.getElementById('messageInput').value;
            if (!message.trim()) {
                alert('Please enter a message to analyze');
                return;
            }

            // Show loading animation
            const analyzeBtn = event.target;
            const originalText = analyzeBtn.innerHTML;
            analyzeBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Analyzing...';
            analyzeBtn.disabled = true;

            // Simulate AI analysis
            setTimeout(() => {
                // Update results
                const probability = Math.floor(Math.random() * 30) + 70;
                document.getElementById('scamProbability').textContent = probability + '%';
                document.getElementById('responseTime').textContent = Math.floor(Math.random() * 200) + 50 + ' ms';
                document.getElementById('aiConfidence').textContent = Math.floor(Math.random() * 15) + 85 + '%';

                // Update threat indicator
                const indicator = document.getElementById('threatIndicator');
                let position = 0;
                if (probability > 85) position = 90;
                else if (probability > 70) position = 60;
                else if (probability > 50) position = 30;
                indicator.style.left = position + '%';

                // Animate threat level
                gsap.fromTo(indicator, 
                    { scale: 1.5 },
                    { scale: 1, duration: 0.5, ease: "back.out(1.7)" }
                );

                // Show scam type detection
                const scamTypes = detectScamTypes(message);
                alert(`🚨 AI Detection Results:\n\nScam Probability: ${probability}%\nDetected Patterns: ${scamTypes.join(', ')}\n\n${probability > 70 ? '⚠️ HIGH RISK DETECTED!' : '✅ Low risk detected'}`);

                // Reset button
                analyzeBtn.innerHTML = originalText;
                analyzeBtn.disabled = false;

                // Animate results
                gsap.fromTo('.result-card',
                    { y: 20, opacity: 0 },
                    { y: 0, opacity: 1, duration: 0.5, stagger: 0.1 }
                );
            }, 1500);
        }

        function detectScamTypes(message) {
            const patterns = {
                'Urgency': /(urgent|immediate|within.*hours|act now|limited time)/i,
                'Sensitive Info': /(password|OTP|PIN|bank details|IC number)/i,
                'Suspicious Links': /(http:\/\/|\.online|\.site|\.xyz|click here)/i,
                'Too Good To Be True': /(won|prize|free|guaranteed|100% return)/i,
                'Emotional Appeal': /(help|emergency|sick|hospital|die|poor)/i
            };

            return Object.entries(patterns)
                .filter(([type, regex]) => regex.test(message))
                .map(([type]) => type);
        }

        function startQuickScan() {
            const examples = [
                "Congratulations! You've won RM10,000 from Maybank! Click: http://claim-maybank.online",
                "URGENT: Your Touch 'n Go eWallet has been locked. Verify now: http://tng-verify.security",
                "Hello dear, I'm in hospital need RM500 for medicine. Can you help me?",
                "Investment opportunity: Get 5% daily returns on Bitcoin! Limited slots available!"
            ];
            
            const randomExample = examples[Math.floor(Math.random() * examples.length)];
            document.getElementById('messageInput').value = randomExample;
            updateCharCount();
            
            gsap.to(window, { duration: 1, scrollTo: "#analyze", ease: "power2.inOut" });
            
            // Auto-analyze after 1 second
            setTimeout(() => {
                analyzeMessage();
            }, 1000);
        }

        function uploadScreenshot() {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.onchange = function(e) {
                const file = e.target.files[0];
                if (file) {
                    alert('📸 Screenshot uploaded! AI will analyze the text in the image...');
                    // Simulate OCR processing
                    setTimeout(() => {
                        document.getElementById('messageInput').value = "URGENT: Bank account suspension detected! Click to verify: http://bank-secure-verify.xyz";
                        updateCharCount();
                        analyzeMessage();
                    }, 2000);
                }
            };
            input.click();
        }

        function checkURL() {
            const url = prompt("Enter suspicious URL to check:");
            if (url) {
                alert(`🔍 Analyzing URL: ${url}\n\nStatus: ❌ BLACKLISTED\nRisk: HIGH\nDomain registered 15 days ago\nReported 48 times by users`);
            }
        }

        function reportScam() {
            const reportType = prompt("Select scam type:\n1. Bank Phishing\n2. Investment Scam\n3. Love Scam\n4. Tech Support\n5. Other");
            if (reportType) {
                alert(`✅ Thank you! Your report has been submitted to our database.\nThis helps protect ${Math.floor(Math.random() * 1000) + 500} other users!`);
                
                // Animate community feed update
                gsap.fromTo('.feed-item:first-child',
                    { x: -50, opacity: 0 },
                    { x: 0, opacity: 1, duration: 0.5 }
                );
            }
        }

        function showScamDetails(type) {
            const details = {
                phishing: {
                    title: "PHISHING SCAMS",
                    content: "Scammers impersonate legitimate organizations (banks, government, companies) to steal sensitive information like passwords, OTPs, and banking details."
                },
                investment: {
                    title: "INVESTMENT SCAMS",
                    content: "Promises of guaranteed high returns with minimal risk. Usually involves cryptocurrency, forex trading, or 'too good to be true' investment schemes."
                },
                romance: {
                    title: "ROMANCE SCAMS",
                    content: "Scammers create fake profiles on dating apps/social media, build emotional connections, then request money for emergencies or travel expenses."
                },
                tech: {
                    title: "TECH SUPPORT SCAMS",
                    content: "Fake tech support claiming your computer has viruses. They try to gain remote access or sell unnecessary software/services."
                },
                lottery: {
                    title: "LOTTERY SCAMS",
                    content: "Notifications of fake lottery winnings requiring upfront payment of 'taxes' or 'processing fees' to claim the prize."
                },
                job: {
                    title: "JOB SCAMS",
                    content: "Fake job offers requiring payment for training, equipment, or background checks. Often targets job seekers on social media."
                }
            };

            const scam = details[type];
            if (scam) {
                alert(`🚨 ${scam.title}\n\n${scam.content}\n\n🔴 Red Flags:\n• Urgency tactics\n• Request for payment/info\n• Too good to be true\n• Unprofessional communication`);
            }
        }

        function showStateDetails(state) {
            const scams = {
                'Kuala Lumpur': ['Bank Phishing (42%)', 'Investment Scams (28%)', 'E-commerce (18%)'],
                'Selangor': ['Love Scams (35%)', 'Job Scams (25%)', 'Tech Support (20%)'],
                'Johor': ['Bank Phishing (38%)', 'Lottery Scams (22%)', 'Romance (18%)'],
                'Penang': ['Investment (40%)', 'Phishing (30%)', 'Job Scams (15%)']
            };

            const stateScams = scams[state] || ['Various scam types reported'];
            alert(`📍 ${state}\n\nTop Reported Scams:\n${stateScams.map(s => `• ${s}`).join('\n')}\n\n👥 Active Users: ${Math.floor(Math.random() * 5000) + 1000}`);
        }

        function checkAnswer(answer) {
            const correct = 'scam';
            const resultDiv = document.getElementById('quizResult');
            
            if (answer === correct) {
                resultDiv.innerHTML = '<span style="color: #22c55e"><i class="fas fa-check-circle"></i> CORRECT! This is a government grant scam.</span>';
                gsap.fromTo(resultDiv, 
                    { scale: 0.5, opacity: 0 },
                    { scale: 1, opacity: 1, duration: 0.5 }
                );
                
                // Animate correct option
                gsap.to(event.target, {
                    backgroundColor: 'rgba(34, 197, 94, 0.3)',
                    borderColor: '#22c55e',
                    duration: 0.3
                });
            } else {
                resultDiv.innerHTML = '<span style="color: #ef4444"><i class="fas fa-times-circle"></i> WRONG! This is a common government grant scam pattern.</span>';
                
                // Shake animation for wrong answer
                gsap.to(event.target, {
                    x: [-10, 10, -10, 10, 0],
                    duration: 0.5,
                    ease: "power1.inOut"
                });
            }
            
            // Show explanation after 1 second
            setTimeout(() => {
                alert(`💡 SCAM INDICATORS:\n1. "Government" but uses .online domain\n2. Requires clicking suspicious link\n3. Too good to be true amount\n4. Urgency language missing but still suspicious`);
            }, 1000);
        }

        function downloadResource(type) {
            const resources = {
                cheatsheet: "AI_Scam_Detection_Cheatsheet.pdf",
                checklist: "Safety_Verification_Checklist.pdf",
                contacts: "Emergency_Contacts_List.pdf",
                templates: "Scam_Response_Templates.pdf"
            };
            
            alert(`📥 Downloading: ${resources[type]}\n\nYour download will begin shortly...`);
            
            // Simulate download animation
            gsap.to(event.target, {
                y: -10,
                duration: 0.3,
                yoyo: true,
                repeat: 1
            });
        }

        function submitReport() {
            const modal = `
                <div style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.8); display: flex; align-items: center; justify-content: center; z-index: 2000;">
                    <div style="background: linear-gradient(145deg, #1e1b4b, #0f172a); padding: 40px; border-radius: 20px; border: 2px solid #7c3aed; max-width: 500px; width: 90%;">
                        <h3 style="color: white; margin-bottom: 20px;"><i class="fas fa-flag"></i> Report a Scam</h3>
                        <input type="text" placeholder="Scam Type" style="width: 100%; padding: 15px; margin-bottom: 15px; border-radius: 10px; border: 1px solid #312e81; background: rgba(0,0,0,0.3); color: white;">
                        <textarea placeholder="Description of the scam..." style="width: 100%; height: 150px; padding: 15px; margin-bottom: 15px; border-radius: 10px; border: 1px solid #312e81; background: rgba(0,0,0,0.3); color: white;"></textarea>
                        <div style="display: flex; gap: 15px;">
                            <button onclick="document.body.removeChild(this.parentElement.parentElement.parentElement)" style="flex:1; padding: 15px; background: #ef4444; color: white; border: none; border-radius: 10px; cursor: pointer;">Cancel</button>
                            <button onclick="alert('✅ Report submitted! Thank you for making Malaysia safer.'); document.body.removeChild(this.parentElement.parentElement.parentElement)" style="flex:1; padding: 15px; background: #7c3aed; color: white; border: none; border-radius: 10px; cursor: pointer;">Submit Report</button>
                        </div>
                    </div>
                </div>
            `;
            
            document.body.insertAdjacentHTML('beforeend', modal);
        }

        function updateLiveStats() {
            // Update live stats every 10 seconds
            setInterval(() => {
                const stats = document.querySelectorAll('.live-stat .number');
                stats.forEach(stat => {
                    const current = parseInt(stat.textContent.replace(/,/g, ''));
                    const increment = Math.floor(Math.random() * 10);
                    const newValue = current + increment;
                    stat.textContent = newValue.toLocaleString();
                    
                    // Flash animation
                    gsap.fromTo(stat,
                        { color: '#06b6d4' },
                        { color: '#22c55e', duration: 0.5, ease: "power2.out" }
                    );
                });
            }, 10000);
        }

        // Add hover effects for scam cards
        document.querySelectorAll('.scam-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                gsap.to(this, {
                    scale: 1.05,
                    duration: 0.3,
                    ease: "power2.out"
                });
            });
            
            card.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    scale: 1,
                    duration: 0.3,
                    ease: "power2.out"
                });
            });
        });

        // Add click effects for buttons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function() {
                gsap.to(this, {
                    scale: 0.95,
                    duration: 0.1,
                    yoyo: true,
                    repeat: 1
                });
            });
        });
    </script>
</body>
</html>