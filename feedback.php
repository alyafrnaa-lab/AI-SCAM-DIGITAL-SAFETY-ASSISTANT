<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback - AI Scam Assistant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Confetti Library -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    
    <style>
        /* ========== RESET & BASE ========== */
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
        }
        
        :root {
            --primary: #7c3aed;
            --secondary: #4f46e5;
            --accent: #06b6d4;
            --danger: #ef4444;
            --success: #22c55e;
            --warning: #f59e0b;
            --dark: #0f172a;
            --darker: #020617;
            --light: #e2e8f0;
            --card-bg: rgba(30, 27, 75, 0.9);
            --glow: 0 0 30px rgba(124, 58, 237, 0.4);
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

        /* ========== SIDEBAR (FIXED - SELALU TERLIHAT) ========== */
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
            top: 0;
            bottom: 0;
        }

        /* Desktop: Sidebar selalu terbuka dan tetap */
        @media (min-width: 769px) {
            .sidebar {
                transform: translateX(0) !important;
                width: 280px !important;
                display: block !important;
            }
            .sidebar-closer {
                display: none !important;
            }
            .menu-toggle {
                display: none !important;
            }
        }

        /* Mobile: Sidebar juga tetap muncul */
        @media (max-width: 768px) {
            .sidebar {
                width: 260px;
                transform: translateX(0);
                position: fixed;
                z-index: 1000;
            }
            
            /* Pastikan konten utama tidak tertutup */
            .main-content {
                margin-left: 260px !important;
                width: calc(100% - 260px);
            }
            
            /* Sembunyikan tombol toggle di mobile karena sidebar tetap terlihat */
            .menu-toggle {
                display: none !important;
            }
            
            /* Perbaiki tampilan untuk layar sangat kecil */
            @media (max-width: 480px) {
                .sidebar {
                    width: 220px;
                }
                .main-content {
                    margin-left: 220px !important;
                    width: calc(100% - 220px);
                }
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
            background: linear-gradient(135deg, var(--primary), var(--secondary), #a5b4fc);
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
            color: var(--primary);
            border-left: 5px solid var(--primary);
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
            width: calc(100% - 280px);
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 260px;
                padding: 20px;
                width: calc(100% - 260px);
            }
        }

        @media (max-width: 480px) {
            .main-content {
                margin-left: 220px;
                padding: 15px;
                width: calc(100% - 220px);
            }
        }

        /* ========== MAIN CONTAINER ========== */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* ========== HERO SECTION ========== */
        .hero-section {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 3px solid var(--warning);
            border-radius: 30px;
            padding: 50px;
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
            text-align: center;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--warning), #fbbf24, var(--warning));
            border-radius: 30px 30px 0 0;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at center, rgba(245, 158, 11, 0.1) 0%, transparent 70%);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 46px;
            font-weight: 900;
            background: linear-gradient(90deg, var(--warning), #fbbf24, var(--warning));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 20px;
            color: #c7d2fe;
            margin-bottom: 40px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.7;
        }

        /* ========== FEEDBACK FORM SECTION ========== */
        .feedback-form-section {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 3px solid var(--warning);
            border-radius: 30px;
            padding: 50px;
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
        }

        .feedback-form-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--warning), #fbbf24);
            border-radius: 30px 30px 0 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 32px;
            font-weight: 900;
            background: linear-gradient(90deg, var(--warning), #fbbf24);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 15px;
        }

        .section-subtitle {
            font-size: 16px;
            color: #c7d2fe;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        /* ========== RATING SECTION ========== */
        .rating-section {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(245, 158, 11, 0.3);
            border-radius: 25px;
            padding: 40px;
            margin-bottom: 40px;
            text-align: center;
            transition: all 0.4s ease;
        }

        .rating-section:hover {
            border-color: var(--warning);
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(245, 158, 11, 0.2);
        }

        .rating-title {
            font-size: 24px;
            font-weight: 800;
            color: var(--light);
            margin-bottom: 25px;
        }

        .rating-description {
            color: #c7d2fe;
            font-size: 16px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        /* STAR RATING - POWER VERSION */
        .stars-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 30px 0;
            position: relative;
        }

        .star-wrapper {
            position: relative;
            cursor: pointer;
            transition: all 0.4s ease;
        }

        .star-wrapper:hover {
            transform: scale(1.3) rotate(15deg);
        }

        .star-wrapper:hover .star {
            color: var(--warning);
            text-shadow: 0 0 30px rgba(245, 158, 11, 0.7);
        }

        .star {
            font-size: 56px;
            color: #6b7280;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            z-index: 2;
        }

        .star.active {
            color: var(--warning);
            text-shadow: 0 0 25px rgba(245, 158, 11, 0.8);
        }

        .star-hover-effect {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            width: 70px;
            height: 70px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            z-index: 1;
            transition: transform 0.3s ease;
        }

        .star-wrapper:hover .star-hover-effect {
            transform: translate(-50%, -50%) scale(1);
        }

        .rating-value {
            font-family: 'Orbitron', sans-serif;
            font-size: 42px;
            font-weight: 900;
            color: var(--warning);
            margin-top: 20px;
            margin-bottom: 10px;
            text-shadow: 0 0 20px rgba(245, 158, 11, 0.5);
        }

        .rating-label {
            color: #c7d2fe;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .rating-emojis {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 20px;
        }

        .rating-emoji {
            font-size: 32px;
            opacity: 0.5;
            transition: all 0.3s ease;
            transform: scale(0.9);
        }

        .rating-emoji.active {
            opacity: 1;
            transform: scale(1.2);
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
        }

        /* ========== FEEDBACK FORM ========== */
        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-label {
            display: block;
            font-size: 18px;
            font-weight: 700;
            color: var(--light);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-label i {
            color: var(--warning);
            font-size: 20px;
        }

        .form-input,
        .form-textarea,
        .form-select {
            width: 100%;
            padding: 20px 25px;
            background: rgba(0, 0, 0, 0.4);
            border: 2px solid rgba(245, 158, 11, 0.3);
            border-radius: 15px;
            color: var(--light);
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .form-input:focus,
        .form-textarea:focus,
        .form-select:focus {
            outline: none;
            border-color: var(--warning);
            box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.15);
            transform: translateY(-2px);
        }

        .form-textarea {
            min-height: 150px;
            resize: vertical;
        }

        /* ========== CATEGORY CARDS ========== */
        .categories-section {
            margin-bottom: 40px;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 cards in one row */
            gap: 20px;
            margin-top: 20px;
        }

        .category-card {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(245, 158, 11, 0.2);
            border-radius: 20px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.4s ease;
            text-align: center;
            position: relative;
            overflow: hidden;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .category-card:hover {
            transform: translateY(-8px);
            border-color: var(--warning);
            box-shadow: 0 15px 30px rgba(245, 158, 11, 0.2);
        }

        .category-card.selected {
            background: rgba(245, 158, 11, 0.1);
            border-color: var(--warning);
            box-shadow: 0 0 30px rgba(245, 158, 11, 0.3);
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--warning), #fbbf24);
            transform: scaleX(0);
            transition: transform 0.4s ease;
            transform-origin: left;
        }

        .category-card:hover::before,
        .category-card.selected::before {
            transform: scaleX(1);
        }

        .category-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 22px;
            background: rgba(245, 158, 11, 0.15);
            color: var(--warning);
            transition: all 0.4s ease;
        }

        .category-card:hover .category-icon {
            transform: scale(1.1) rotate(10deg);
            background: rgba(245, 158, 11, 0.25);
            box-shadow: 0 10px 20px rgba(245, 158, 11, 0.3);
        }

        .category-card h4 {
            font-size: 16px;
            color: var(--light);
            margin-bottom: 10px;
            font-weight: 700;
        }

        .category-card p {
            color: #c7d2fe;
            font-size: 13px;
            line-height: 1.5;
            margin: 0;
        }

        .checkmark {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: var(--warning);
            color: #1f2937;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 900;
            transform: scale(0);
            transition: transform 0.3s ease;
        }

        .category-card.selected .checkmark {
            transform: scale(1);
        }

        /* ========== SUBMIT BUTTON ========== */
        .submit-section {
            text-align: center;
            margin-top: 50px;
        }

        .submit-btn {
            padding: 20px 60px;
            background: linear-gradient(135deg, var(--warning), #fbbf24);
            border: none;
            border-radius: 18px;
            color: #1f2937;
            font-size: 20px;
            font-weight: 900;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: inline-flex;
            align-items: center;
            gap: 15px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(245, 158, 11, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 25px 50px rgba(245, 158, 11, 0.4);
            color: #1f2937;
        }

        .submit-btn:active {
            transform: translateY(-4px) scale(1.02);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s ease;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        /* ========== SUCCESS MESSAGE ========== */
        .success-message {
            display: none;
            text-align: center;
            padding: 50px 30px;
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 3px solid var(--success);
            border-radius: 30px;
            position: relative;
            overflow: hidden;
            margin-top: 40px;
        }

        .success-message::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--success), #16a34a);
            border-radius: 30px 30px 0 0;
        }

        .success-icon {
            font-size: 80px;
            color: var(--success);
            margin-bottom: 30px;
            animation: successPulse 2s infinite;
        }

        @keyframes successPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .success-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 36px;
            font-weight: 900;
            background: linear-gradient(90deg, var(--success), #16a34a);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 20px;
        }

        .success-text {
            font-size: 18px;
            color: #c7d2fe;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        .back-btn {
            padding: 15px 40px;
            background: rgba(34, 197, 94, 0.15);
            border: 2px solid var(--success);
            border-radius: 15px;
            color: var(--success);
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .back-btn:hover {
            background: rgba(34, 197, 94, 0.25);
            transform: translateY(-3px);
        }

        /* ========== STATISTICS SECTION ========== */
        .stats-section {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 3px solid var(--accent);
            border-radius: 30px;
            padding: 40px;
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
        }

        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--accent), var(--primary));
            border-radius: 30px 30px 0 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 cards in one row */
            gap: 20px;
            margin-top: 30px;
        }

        .stat-card {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(6, 182, 212, 0.3);
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            transition: all 0.4s ease;
            min-height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent);
            box-shadow: 0 15px 30px rgba(6, 182, 212, 0.2);
        }

        .stat-number {
            font-family: 'Orbitron', sans-serif;
            font-size: 36px;
            font-weight: 900;
            color: var(--accent);
            margin-bottom: 10px;
            line-height: 1;
        }

        .stat-label {
            font-size: 14px;
            color: #c7d2fe;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ========== FOOTER SIMPLE ========== */
        footer {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            padding: 25px;
            border-top: 3px solid var(--primary);
            border-radius: 20px;
            margin-top: 30px;
            text-align: center;
        }

        .copyright {
            color: #94a3b8;
            font-size: 12px;
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
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 4px;
        }

        /* ========== CONFETTI CANVAS ========== */
        #confetti-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 9999;
        }

        /* ========== RESPONSIVE DESIGN ========== */
        @media (max-width: 1200px) {
            .main-container {
                max-width: 100%;
            }
            
            .hero-title {
                font-size: 40px;
            }
            
            .star {
                font-size: 48px;
            }
            
            .categories-grid,
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
        }

        @media (max-width: 992px) {
            .main-content {
                margin-top: 0;
            }
            
            .hero-title {
                font-size: 34px;
            }
            
            .stars-container {
                gap: 12px;
            }
            
            .star {
                font-size: 42px;
            }
        }

        @media (max-width: 768px) {
            .hero-section,
            .feedback-form-section,
            .stats-section {
                padding: 35px 22px;
            }
            
            .hero-title {
                font-size: 28px;
            }
            
            .section-title {
                font-size: 26px;
            }
            
            .hero-subtitle {
                font-size: 17px;
            }
            
            .stars-container {
                gap: 8px;
            }
            
            .star {
                font-size: 36px;
            }
            
            .categories-grid,
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .category-card,
            .stat-card {
                min-height: auto;
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            .hero-section,
            .feedback-form-section,
            .stats-section {
                padding: 25px 18px;
                border-radius: 20px;
            }
            
            .hero-title {
                font-size: 26px;
            }
            
            .section-title {
                font-size: 22px;
            }
            
            .rating-section,
            .category-card,
            .stat-card {
                padding: 20px;
            }
            
            .stars-container {
                gap: 5px;
            }
            
            .star {
                font-size: 32px;
            }
            
            .submit-btn {
                padding: 15px 40px;
                font-size: 18px;
            }
            
            .rating-emojis {
                gap: 15px;
            }
            
            .rating-emoji {
                font-size: 24px;
            }
            
            .categories-grid,
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .category-icon {
                width: 45px;
                height: 45px;
                font-size: 20px;
            }
            
            .category-card h4 {
                font-size: 15px;
            }
            
            .category-card p {
                font-size: 12px;
            }
            
            .stat-number {
                font-size: 30px;
            }
            
            .stat-label {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>
    <!-- SIDEBAR (SELALU TERLIHAT) -->
    <nav class="sidebar" id="sidebar">
        <div class="logo">
            <i class="fas fa-star"></i>
            <h2>AI Scam Assistant</h2>
            <p>Feedback & Rating Center</p>
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
                    <i class="fas fa-info-circle"></i>
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
                <a href="help-support.php" target="_blank" class="nav-link">
                    <i class="fas fa-question-circle"></i>
                    <span>Help & Support</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="feedback.php" class="nav-link active">
                    <i class="fas fa-star"></i>
                    <span>Give Feedback</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="report-scam.php" target="_blank" class="nav-link">
                    <i class="fas fa-flag"></i>
                    <span>Report Scam</span>
                </a>
            </li>
        </ul>
        
        <div class="sidebar-footer">
            <p>© 2026 AI Scam & Digital Safety Assistant</p>
            <p>Feedback & Rating Center</p>
        </div>
    </nav>
    
    <!-- MAIN CONTENT -->
    <main class="main-content">
        <div class="main-container">
            <!-- HERO SECTION -->
            <section class="hero-section">
                <div class="hero-content">
                    <h1 class="hero-title">SHARE YOUR EXPERIENCE</h1>
                    <p class="hero-subtitle">
                        Your feedback helps us improve AI Scam Assistant and protect more people from online scams. 
                        Rate your experience and tell us what we can do better!
                    </p>
                </div>
            </section>
            
            <!-- FEEDBACK FORM SECTION -->
            <section class="feedback-form-section" id="feedbackForm">
                <div class="section-header">
                    <h2 class="section-title">FEEDBACK FORM</h2>
                    <p class="section-subtitle">
                        Please rate your experience and provide detailed feedback to help us improve
                    </p>
                </div>
                
                <div class="form-container">
                    <!-- RATING SECTION -->
                    <div class="rating-section">
                        <h3 class="rating-title">How would you rate AI Scam Assistant?</h3>
                        <p class="rating-description">
                            Click on the stars below to rate your overall experience (1 = Poor, 5 = Excellent)
                        </p>
                        
                        <!-- STAR RATING - POWER VERSION -->
                        <div class="stars-container" id="starsContainer">
                            <!-- Stars will be generated by JavaScript -->
                        </div>
                        
                        <!-- RATING VALUE DISPLAY -->
                        <div class="rating-value" id="ratingValue">0</div>
                        <div class="rating-label" id="ratingLabel">Tap stars to rate</div>
                        
                        <!-- RATING EMOJIS -->
                        <div class="rating-emojis" id="ratingEmojis">
                            <span class="rating-emoji" data-value="1">😞</span>
                            <span class="rating-emoji" data-value="2">😕</span>
                            <span class="rating-emoji" data-value="3">😐</span>
                            <span class="rating-emoji" data-value="4">😊</span>
                            <span class="rating-emoji" data-value="5">😍</span>
                        </div>
                    </div>
                    
                    <!-- FEEDBACK FORM -->
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-comment-dots"></i>
                            Detailed Feedback
                        </label>
                        <textarea class="form-textarea" id="feedbackText" placeholder="Tell us about your experience with AI Scam Assistant. What did you like? What can we improve? Your detailed feedback is valuable to us..." rows="5"></textarea>
                    </div>
                    
                    <!-- CATEGORY SELECTION -->
                    <div class="categories-section">
                        <label class="form-label">
                            <i class="fas fa-tags"></i>
                            Category (Select one or more)
                        </label>
                        <div class="categories-grid" id="categoriesGrid">
                            <div class="category-card" data-category="Accuracy">
                                <div class="checkmark"><i class="fas fa-check"></i></div>
                                <div class="category-icon">
                                    <i class="fas fa-bullseye"></i>
                                </div>
                                <h4>Accuracy</h4>
                                <p>How accurate were the scam detection results?</p>
                            </div>
                            <div class="category-card" data-category="Usability">
                                <div class="checkmark"><i class="fas fa-check"></i></div>
                                <div class="category-icon">
                                    <i class="fas fa-desktop"></i>
                                </div>
                                <h4>Usability</h4>
                                <p>Was the interface easy to use and navigate?</p>
                            </div>
                            <div class="category-card" data-category="Speed">
                                <div class="checkmark"><i class="fas fa-check"></i></div>
                                <div class="category-icon">
                                    <i class="fas fa-bolt"></i>
                                </div>
                                <h4>Speed</h4>
                                <p>How fast was the response and processing time?</p>
                            </div>
                            <div class="category-card" data-category="Helpfulness">
                                <div class="checkmark"><i class="fas fa-check"></i></div>
                                <div class="category-icon">
                                    <i class="fas fa-hands-helping"></i>
                                </div>
                                <h4>Helpfulness</h4>
                                <p>Were the recommendations and tips useful?</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FEEDBACK TYPE -->
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-edit"></i>
                            Type of Feedback
                        </label>
                        <select class="form-select" id="feedbackType">
                            <option value="" disabled selected>Select feedback type</option>
                            <option value="Suggestion">Suggestion for Improvement</option>
                            <option value="Bug">Bug Report</option>
                            <option value="Praise">Praise / Positive Feedback</option>
                            <option value="Feature">Feature Request</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    
                    <!-- EMAIL (OPTIONAL) -->
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-envelope"></i>
                            Email Address (Optional)
                        </label>
                        <input type="email" class="form-input" id="userEmail" placeholder="Enter your email if you'd like us to follow up">
                    </div>
                    
                    <!-- SUBMIT SECTION -->
                    <div class="submit-section">
                        <button class="submit-btn" id="submitFeedback">
                            <i class="fas fa-paper-plane"></i>
                            SUBMIT FEEDBACK
                        </button>
                        
                        <!-- SUCCESS MESSAGE (HIDDEN BY DEFAULT) -->
                        <div class="success-message" id="successMessage">
                            <i class="fas fa-check-circle success-icon"></i>
                            <h2 class="success-title">THANK YOU!</h2>
                            <p class="success-text">
                                Your feedback has been submitted successfully. We truly appreciate your time and input. 
                                Your feedback will help us improve AI Scam Assistant and protect more people from online scams.
                            </p>
                            <button class="back-btn" id="backToForm">
                                <i class="fas fa-arrow-left"></i>
                                Submit Another Feedback
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- STATISTICS SECTION -->
            <section class="stats-section">
                <div class="section-header">
                    <h2 class="section-title">FEEDBACK STATISTICS</h2>
                    <p class="section-subtitle">
                        See how feedback from users like you is helping improve our service
                    </p>
                </div>
                
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number" id="totalSubmissions">1,247</div>
                        <div class="stat-label">Total Feedback Submissions</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number" id="averageRating">4.5</div>
                        <div class="stat-label">Average Rating (out of 5)</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number" id="responseRate">92%</div>
                        <div class="stat-label">User Satisfaction Rate</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number" id="improvements">48</div>
                        <div class="stat-label">Improvements Implemented</div>
                    </div>
                </div>
            </section>
            
            <!-- FOOTER -->
            <footer>
                <div class="copyright">
                    <p>© 2026 AI Scam & Digital Safety Assistant. All rights reserved.</p>
                    <p>This feedback system is designed to continuously improve our scam detection and prevention services.</p>
                    <p>Your privacy is important to us. All feedback is anonymized and used solely for improvement purposes.</p>
                </div>
            </footer>
        </div>
    </main>
    
    <!-- CANVAS FOR CONFETTI -->
    <canvas id="confetti-canvas"></canvas>

    <script>
        // ========== VARIABLES ==========
        let currentRating = 0;
        let selectedCategories = [];
        let ratingLabels = [
            "Tap stars to rate",
            "Poor - Needs significant improvement",
            "Fair - Room for improvement",
            "Good - Satisfactory experience",
            "Very Good - Above average",
            "Excellent - Outstanding experience!"
        ];
        
        // ========== INITIALIZE STAR RATING ==========
        function initializeStars() {
            const starsContainer = document.getElementById('starsContainer');
            starsContainer.innerHTML = '';
            
            for (let i = 1; i <= 5; i++) {
                const starWrapper = document.createElement('div');
                starWrapper.className = 'star-wrapper';
                starWrapper.dataset.value = i;
                
                const starHoverEffect = document.createElement('div');
                starHoverEffect.className = 'star-hover-effect';
                
                const star = document.createElement('i');
                star.className = 'fas fa-star star';
                
                starWrapper.appendChild(starHoverEffect);
                starWrapper.appendChild(star);
                starsContainer.appendChild(starWrapper);
                
                // Click event
                starWrapper.addEventListener('click', () => {
                    setRating(i);
                    triggerConfetti();
                });
                
                // Hover events
                starWrapper.addEventListener('mouseenter', () => {
                    highlightStars(i);
                    updateRatingEmojis(i);
                });
                
                starWrapper.addEventListener('mouseleave', () => {
                    highlightStars(currentRating);
                    updateRatingEmojis(currentRating);
                });
            }
            
            // Set initial rating to 0
            highlightStars(0);
            updateRatingEmojis(0);
        }
        
        // ========== SET RATING ==========
        function setRating(rating) {
            currentRating = rating;
            document.getElementById('ratingValue').textContent = rating;
            document.getElementById('ratingLabel').textContent = ratingLabels[rating];
            highlightStars(rating);
            updateRatingEmojis(rating);
            
            // Animate rating value
            const ratingValue = document.getElementById('ratingValue');
            ratingValue.style.transform = 'scale(1.3)';
            setTimeout(() => {
                ratingValue.style.transform = 'scale(1)';
            }, 300);
        }
        
        // ========== HIGHLIGHT STARS ==========
        function highlightStars(upTo) {
            const stars = document.querySelectorAll('.star-wrapper .star');
            stars.forEach((star, index) => {
                if (index < upTo) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            });
        }
        
        // ========== UPDATE RATING EMOJIS ==========
        function updateRatingEmojis(rating) {
            const emojis = document.querySelectorAll('.rating-emoji');
            emojis.forEach(emoji => {
                const emojiValue = parseInt(emoji.dataset.value);
                if (emojiValue <= rating) {
                    emoji.classList.add('active');
                } else {
                    emoji.classList.remove('active');
                }
            });
        }
        
        // ========== CATEGORY SELECTION ==========
        function initializeCategories() {
            const categoryCards = document.querySelectorAll('.category-card');
            categoryCards.forEach(card => {
                card.addEventListener('click', () => {
                    const category = card.dataset.category;
                    
                    if (card.classList.contains('selected')) {
                        // Deselect
                        card.classList.remove('selected');
                        const index = selectedCategories.indexOf(category);
                        if (index > -1) {
                            selectedCategories.splice(index, 1);
                        }
                    } else {
                        // Select
                        card.classList.add('selected');
                        selectedCategories.push(category);
                        
                        // Animation
                        card.style.transform = 'translateY(-8px)';
                        setTimeout(() => {
                            card.style.transform = 'translateY(-5px)';
                        }, 200);
                    }
                    
                    // Update checkmark animation
                    const checkmark = card.querySelector('.checkmark');
                    checkmark.style.transform = 'scale(1.2)';
                    setTimeout(() => {
                        checkmark.style.transform = 'scale(1)';
                    }, 150);
                });
            });
        }
        
        // ========== CONFETTI EFFECT ==========
        function triggerConfetti() {
            if (typeof confetti === 'function') {
                confetti({
                    particleCount: 100,
                    spread: 70,
                    origin: { y: 0.6 },
                    colors: ['#f59e0b', '#fbbf24', '#fde047', '#7c3aed', '#4f46e5']
                });
            }
        }
        
        // ========== FORM SUBMISSION ==========
        function initializeFormSubmission() {
            const submitBtn = document.getElementById('submitFeedback');
            const successMessage = document.getElementById('successMessage');
            const feedbackForm = document.getElementById('feedbackForm');
            const backToFormBtn = document.getElementById('backToForm');
            
            submitBtn.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Validation
                if (currentRating === 0) {
                    alert('Please rate your experience by clicking on the stars.');
                    return;
                }
                
                const feedbackText = document.getElementById('feedbackText').value.trim();
                if (feedbackText === '') {
                    alert('Please provide detailed feedback in the text area.');
                    return;
                }
                
                const feedbackType = document.getElementById('feedbackType').value;
                if (!feedbackType) {
                    alert('Please select a feedback type.');
                    return;
                }
                
                // Simulate form submission
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> SUBMITTING...';
                submitBtn.disabled = true;
                
                // Simulate API call delay
                setTimeout(() => {
                    // Show success message
                    feedbackForm.style.display = 'none';
                    successMessage.style.display = 'block';
                    
                    // Update statistics (simulated)
                    updateStatistics();
                    
                    // Trigger celebration
                    triggerConfetti();
                    
                    // Reset form after 5 seconds (optional)
                    setTimeout(resetForm, 5000);
                }, 1500);
            });
            
            backToFormBtn.addEventListener('click', () => {
                successMessage.style.display = 'none';
                feedbackForm.style.display = 'block';
                resetForm();
            });
        }
        
        // ========== RESET FORM ==========
        function resetForm() {
            // Reset rating
            setRating(0);
            
            // Reset text area
            document.getElementById('feedbackText').value = '';
            
            // Reset categories
            selectedCategories = [];
            document.querySelectorAll('.category-card').forEach(card => {
                card.classList.remove('selected');
            });
            
            // Reset feedback type
            document.getElementById('feedbackType').selectedIndex = 0;
            
            // Reset email
            document.getElementById('userEmail').value = '';
            
            // Reset submit button
            const submitBtn = document.getElementById('submitFeedback');
            submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> SUBMIT FEEDBACK';
            submitBtn.disabled = false;
        }
        
        // ========== UPDATE STATISTICS (SIMULATED) ==========
        function updateStatistics() {
            // Simulate updating statistics
            const totalSubmissions = document.getElementById('totalSubmissions');
            const currentTotal = parseInt(totalSubmissions.textContent.replace(/,/g, ''));
            totalSubmissions.textContent = (currentTotal + 1).toLocaleString();
            
            const averageRating = document.getElementById('averageRating');
            let currentAvg = parseFloat(averageRating.textContent);
            // Simulate new average calculation
            const newAvg = (currentAvg * currentTotal + currentRating) / (currentTotal + 1);
            averageRating.textContent = newAvg.toFixed(1);
            
            // Animate the updated numbers
            [totalSubmissions, averageRating].forEach(element => {
                element.style.transform = 'scale(1.2)';
                element.style.color = '#22c55e';
                setTimeout(() => {
                    element.style.transform = 'scale(1)';
                    setTimeout(() => {
                        element.style.color = '';
                    }, 1000);
                }, 300);
            });
        }
        
        // ========== INITIALIZE EVERYTHING ==========
        document.addEventListener('DOMContentLoaded', () => {
            initializeStars();
            initializeCategories();
            initializeFormSubmission();
            
            // Set canvas size
            const canvas = document.getElementById('confetti-canvas');
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            
            // Update canvas on resize
            window.addEventListener('resize', () => {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            });
            
            // Add animation to statistics cards on load
            setTimeout(() => {
                document.querySelectorAll('.stat-card').forEach((card, index) => {
                    setTimeout(() => {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                        card.style.transition = 'all 0.6s ease';
                        
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 50);
                    }, index * 200);
                });
            }, 500);
        });
    </script>
</body>
</html>