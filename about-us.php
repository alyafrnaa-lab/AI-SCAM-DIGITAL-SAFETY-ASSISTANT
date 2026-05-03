<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About AI Scam Assistant</title>
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

        /* ========== MOBILE MENU TOGGLE ========== */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 16px;
            z-index: 999;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(124, 58, 237, 0.3);
        }

        /* ========== MAIN CONTAINER ========== */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* ========== HERO SECTION ========== */
        .hero-section {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 3px solid var(--primary);
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
            background: linear-gradient(90deg, var(--primary), var(--accent), var(--primary));
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
            background: radial-gradient(circle at center, rgba(124, 58, 237, 0.1) 0%, transparent 70%);
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
            background: linear-gradient(90deg, var(--primary), var(--accent), var(--primary));
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

        /* HERO STATS SECTION - 4 CARDS SATU BARIS (KECIK SIKIT) */
        .hero-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 50px;
        }

        @media (max-width: 1200px) {
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
            background: rgba(0, 0, 0, 0.3);
            padding: 20px;
            border-radius: 20px;
            border: 2px solid rgba(124, 58, 237, 0.3);
            transition: all 0.4s ease;
        }

        .hero-stat:hover {
            transform: translateY(-8px);
            border-color: var(--primary);
            box-shadow: var(--glow);
            background: rgba(124, 58, 237, 0.1);
        }

        .stat-number {
            font-family: 'Orbitron', sans-serif;
            font-size: 38px;
            font-weight: 900;
            color: var(--light);
            margin-bottom: 8px;
            line-height: 1;
        }

        .stat-label {
            font-size: 14px;
            color: #a5b4fc;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ========== MISSION SECTION ========== */
        .mission-section {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 50px;
        }

        @media (max-width: 1200px) {
            .mission-section {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .mission-section {
                grid-template-columns: 1fr;
            }
        }

        .mission-card {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            transition: all 0.4s ease;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .mission-card:hover {
            transform: translateY(-8px);
            border-color: var(--primary);
            box-shadow: var(--glow);
        }

        .mission-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            transition: transform 0.4s ease;
            transform: scaleX(0);
            transform-origin: left;
        }

        .mission-card:hover::before {
            transform: scaleX(1);
        }

        .mission-icon {
            width: 70px;
            height: 70px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 30px;
            background: rgba(124, 58, 237, 0.15);
            color: var(--primary);
            transition: all 0.4s ease;
        }

        .mission-card:hover .mission-icon {
            transform: scale(1.1) rotate(10deg);
            background: rgba(124, 58, 237, 0.25);
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.3);
        }

        .mission-title {
            font-size: 22px;
            font-weight: 800;
            color: var(--light);
            margin-bottom: 12px;
        }

        .mission-description {
            color: #c7d2fe;
            font-size: 15px;
            line-height: 1.6;
        }

        /* ========== TECHNOLOGY SECTION - 4 CARDS 2 ATAS, 2 BAWAH ========== */
        .tech-section {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 3px solid var(--accent);
            border-radius: 30px;
            padding: 40px;
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
        }

        .tech-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--accent), var(--primary));
            border-radius: 30px 30px 0 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 32px;
            font-weight: 900;
            background: linear-gradient(90deg, var(--accent), var(--primary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 12px;
        }

        .section-subtitle {
            font-size: 16px;
            color: #c7d2fe;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        /* 4 CARDS GRID - 2 ATAS, 2 BAWAH */
        .tech-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, auto);
            gap: 25px;
            margin-top: 30px;
        }

        @media (max-width: 992px) {
            .tech-grid {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(4, auto);
            }
        }

        .tech-card {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(6, 182, 212, 0.3);
            border-radius: 18px;
            padding: 25px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .tech-card:hover {
            transform: translateY(-6px);
            border-color: var(--accent);
            box-shadow: 0 12px 30px rgba(6, 182, 212, 0.2);
        }

        .tech-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
            font-size: 24px;
            background: rgba(6, 182, 212, 0.15);
            color: var(--accent);
        }

        .tech-card h4 {
            font-size: 18px;
            color: var(--light);
            margin-bottom: 12px;
            font-weight: 700;
        }

        .tech-card p {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.6;
        }

        /* ========== TIMELINE SECTION ========== */
        .timeline-section {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 3px solid var(--warning);
            border-radius: 30px;
            padding: 40px;
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
        }

        .timeline-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--warning), var(--danger));
            border-radius: 30px 30px 0 0;
        }

        .timeline {
            position: relative;
            max-width: 1000px;
            margin: 40px auto 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--warning), var(--danger));
            border-radius: 2px;
        }

        .timeline-item {
            margin-bottom: 50px;
            position: relative;
            width: 45%;
            padding: 22px;
            border-radius: 18px;
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(245, 158, 11, 0.3);
            transition: all 0.4s ease;
        }

        .timeline-item:hover {
            transform: translateY(-5px);
            border-color: var(--warning);
            box-shadow: 0 12px 25px rgba(245, 158, 11, 0.2);
        }

        .timeline-item:nth-child(odd) {
            left: 0;
        }

        .timeline-item:nth-child(even) {
            left: 55%;
        }

        .timeline-dot {
            position: absolute;
            top: 25px;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--warning), var(--danger));
            border: 4px solid var(--dark);
        }

        .timeline-item:nth-child(odd) .timeline-dot {
            right: -11px;
        }

        .timeline-item:nth-child(even) .timeline-dot {
            left: -11px;
        }

        .timeline-year {
            font-family: 'Orbitron', sans-serif;
            font-size: 22px;
            font-weight: 900;
            color: var(--warning);
            margin-bottom: 8px;
        }

        .timeline-title {
            font-size: 18px;
            font-weight: 800;
            color: var(--light);
            margin-bottom: 8px;
        }

        .timeline-description {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.6;
        }

        /* ========== FAQ SECTION ========== */
        .faq-section {
            margin-bottom: 50px;
        }

        .faq-container {
            max-width: 900px;
            margin: 40px auto 0;
        }

        .faq-item {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 18px;
            margin-bottom: 18px;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .faq-item:hover {
            border-color: var(--primary);
            transform: translateY(-3px);
        }

        .faq-question {
            padding: 22px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-size: 17px;
            font-weight: 700;
            color: var(--light);
        }

        .faq-question i {
            color: var(--primary);
            font-size: 18px;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0 28px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.4s ease;
            color: #c7d2fe;
            line-height: 1.6;
        }

        .faq-item.active .faq-answer {
            padding: 0 28px 22px;
            max-height: 500px;
        }

        /* ========== CTA SECTION ========== */
        .cta-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 3px solid var(--primary);
            border-radius: 30px;
            padding: 50px;
            text-align: center;
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--secondary), var(--accent));
            border-radius: 30px 30px 0 0;
        }

        .cta-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 38px;
            font-weight: 900;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 18px;
        }

        .cta-description {
            font-size: 17px;
            color: #c7d2fe;
            margin-bottom: 35px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .cta-btn {
            padding: 16px 35px;
            font-size: 16px;
            font-weight: 700;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.4s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            min-width: 180px;
            justify-content: center;
        }

        .cta-btn.primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.3);
        }

        .cta-btn.secondary {
            background: rgba(124, 58, 237, 0.15);
            border: 2px solid var(--primary);
            color: #c7d2fe;
        }

        .cta-btn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.4);
        }

        .cta-btn.primary:hover {
            background: linear-gradient(135deg, #8b5cf6, #6366f1);
        }

        .cta-btn.secondary:hover {
            background: rgba(124, 58, 237, 0.25);
            color: white;
        }

        /* ========== FOOTER SIMPLE ========== */
        footer {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            padding: 25px;
            border-top: 3px solid var(--primary);
            border-radius: 18px;
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

        /* ========== RESPONSIVE DESIGN ========== */
        @media (max-width: 1200px) {
            .main-container {
                max-width: 100%;
            }
            
            .hero-title {
                font-size: 40px;
            }
            
            .cta-title {
                font-size: 34px;
            }
        }

        @media (max-width: 992px) {
            .main-content {
                margin-top: 0;
            }
            
            .hero-title {
                font-size: 34px;
            }
            
            .timeline::before {
                left: 20px;
            }
            
            .timeline-item {
                width: calc(100% - 50px);
                left: 50px !important;
            }
            
            .timeline-item:nth-child(odd) .timeline-dot,
            .timeline-item:nth-child(even) .timeline-dot {
                left: -11px;
            }
            
            .cta-title {
                font-size: 30px;
            }
        }

        @media (max-width: 768px) {
            .hero-stats {
                flex-direction: column;
                align-items: center;
                gap: 18px;
            }
            
            .hero-stat {
                width: 100%;
                max-width: 280px;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .cta-btn {
                width: 100%;
                max-width: 280px;
            }
            
            .section-title {
                font-size: 26px;
            }
            
            .hero-subtitle {
                font-size: 17px;
            }
            
            .hero-section,
            .tech-section,
            .timeline-section,
            .cta-section {
                padding: 35px 22px;
            }
            
            .mission-card,
            .tech-card {
                padding: 22px;
            }
        }

        @media (max-width: 576px) {
            .hero-section,
            .tech-section,
            .timeline-section,
            .cta-section {
                padding: 25px 18px;
                border-radius: 20px;
            }
            
            .hero-title {
                font-size: 26px;
            }
            
            .section-title {
                font-size: 22px;
            }
            
            .cta-title {
                font-size: 24px;
            }
            
            .mission-card,
            .tech-card {
                padding: 20px;
            }
            
            .faq-question {
                padding: 20px;
                font-size: 16px;
            }
            
            .faq-answer {
                padding: 0 20px;
            }
            
            .cta-buttons {
                gap: 15px;
            }
            
            .cta-btn {
                padding: 14px 22px;
                min-width: 160px;
                font-size: 15px;
            }
            
            .stat-number {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>
    <!-- SIDEBAR (SELALU TERLIHAT) -->
    <nav class="sidebar" id="sidebar">
        <div class="logo">
            <i class="fas fa-shield-alt"></i>
            <h2>AI Scam Assistant</h2>
            <p>About Us & Our Mission</p>
        </div>
        
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="index.php" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="about-us.php" class="nav-link active">
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
                <a href="learn-more.php" target="_blank" class="nav-link">
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
                <a href="feedback.php"  target="_blank" class="nav-link">
                    <i class="fas fa-star"></i>
                    <span>Give Feedback</span>
                </a>
            </li>
        </ul>
        
        <div class="sidebar-footer">
            <p>© 2026 AI Scam & Digital Safety Assistant</p>
            <p>About Us & Mission</p>
        </div>
    </nav>
    
    <!-- MAIN CONTENT -->
    <main class="main-content">
        <div class="main-container">
            <!-- HERO SECTION -->
            <section class="hero-section">
                <div class="hero-content">
                    <h1 class="hero-title">ABOUT AI SCAM ASSISTANT</h1>
                    <p class="hero-subtitle">
                        We are at the forefront of digital safety innovation, leveraging cutting-edge AI technology 
                        to protect millions of users across Malaysia from online scams, phishing attempts, and digital fraud.
                    </p>
                    
                    <div class="hero-stats">
                        <div class="hero-stat">
                            <div class="stat-number" id="usersProtected">45,892</div>
                            <div class="stat-label">Users Protected</div>
                        </div>
                        <div class="hero-stat">
                            <div class="stat-number" id="scamsDetected">289,456</div>
                            <div class="stat-label">Scams Detected</div>
                        </div>
                        <div class="hero-stat">
                            <div class="stat-number" id="accuracyRate">96.7%</div>
                            <div class="stat-label">Accuracy Rate</div>
                        </div>
                        <div class="hero-stat">
                            <div class="stat-number" id="languages">5+</div>
                            <div class="stat-label">Languages</div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- MISSION SECTION -->
            <section class="mission-section">
                <div class="mission-card">
                    <div class="mission-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 class="mission-title">Our Mission</h3>
                    <p class="mission-description">
                        To create a safer digital environment for Malaysians by providing real-time, 
                        intelligent scam detection that is accessible, accurate, and easy to use for everyone.
                    </p>
                </div>
                
                <div class="mission-card">
                    <div class="mission-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="mission-title">Our Vision</h3>
                    <p class="mission-description">
                        To become Malaysia's most trusted digital safety platform, reducing online scam 
                        victims by 90% through AI-powered prevention and comprehensive public education.
                    </p>
                </div>
                
                <div class="mission-card">
                    <div class="mission-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="mission-title">Our Values</h3>
                    <p class="mission-description">
                        Privacy, Accuracy, Innovation, and Community. We believe in protecting user data 
                        while delivering the most reliable scam detection technology available.
                    </p>
                </div>
            </section>
            
            <!-- TECHNOLOGY SECTION - 4 CARDS 2 ATAS, 2 BAWAH -->
            <section class="tech-section">
                <div class="section-header">
                    <h2 class="section-title">OUR TECHNOLOGY</h2>
                    <p class="section-subtitle">
                        Powered by cutting-edge artificial intelligence and machine learning algorithms
                    </p>
                </div>
                
                <!-- 4 CARDS GRID - 2 ATAS, 2 BAWAH -->
                <div class="tech-grid">
                    <!-- BARIS ATAS -->
                    <div class="tech-card">
                        <div class="tech-icon">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h4>Natural Language Processing</h4>
                        <p>
                            Advanced NLP algorithms analyze message context, sentiment, and linguistic patterns 
                            to identify scam indicators across multiple languages including Bahasa Malaysia.
                        </p>
                    </div>
                    
                    <div class="tech-card">
                        <div class="tech-icon">
                            <i class="fas fa-robot"></i>
                        </div>
                        <h4>Machine Learning</h4>
                        <p>
                            Our self-learning AI continuously improves by analyzing new scam patterns, 
                            adapting to evolving tactics used by cybercriminals in real-time.
                        </p>
                    </div>
                    
                    <!-- BARIS BAWAH -->
                    <div class="tech-card">
                        <div class="tech-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>End-to-End Encryption</h4>
                        <p>
                            All messages are analyzed locally with military-grade encryption. 
                            Your privacy is our priority - no personal data is stored or shared.
                        </p>
                    </div>
                    
                    <div class="tech-card">
                        <div class="tech-icon">
                            <i class="fas fa-language"></i>
                        </div>
                        <h4>Multi-Language Support</h4>
                        <p>
                            Detects scams in English, Bahasa Malaysia, Chinese, Tamil, and code-switching patterns. 
                            Context-aware analysis for Malaysian linguistic nuances.
                        </p>
                    </div>
                </div>
            </section>
            
            <!-- TIMELINE SECTION -->
            <section class="timeline-section">
                <div class="section-header">
                    <h2 class="section-title">OUR JOURNEY</h2>
                    <p class="section-subtitle">
                        From concept to Malaysia's leading scam detection platform
                    </p>
                </div>
                
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-year">2022</div>
                        <h3 class="timeline-title">Project Inception</h3>
                        <p class="timeline-description">
                            Research began on Malaysian-specific scam patterns. 
                            Initial AI models trained with 10,000 verified scam messages.
                        </p>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-year">2023 Q1</div>
                        <h3 class="timeline-title">Beta Launch</h3>
                        <p class="timeline-description">
                            First version released with basic English scam detection. 
                            5,000 early users helped improve accuracy through feedback.
                        </p>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-year">2023 Q3</div>
                        <h3 class="timeline-title">Bahasa Malaysia Support</h3>
                        <p class="timeline-description">
                            Added Malaysian language detection capabilities. 
                            Accuracy improved to 92% with multi-language analysis.
                        </p>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-year">2024 Q1</div>
                        <h3 class="timeline-title">Major Update v2.0</h3>
                        <p class="timeline-description">
                            Real-time threat intelligence dashboard launched. 
                            Integration with Malaysian cybersecurity authorities.
                        </p>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-year">2024 Q4</div>
                        <h3 class="timeline-title">50,000 Users Milestone</h3>
                        <p class="timeline-description">
                            Reached 50,000 protected users with 96.7% accuracy rate. 
                            Expanded to detect investment and romance scams.
                        </p>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-year">2025 Q1</div>
                        <h3 class="timeline-title">Current Version 3.0</h3>
                        <p class="timeline-description">
                            Advanced multi-language AI with Chinese and Tamil support. 
                            Live threat monitoring and predictive scam prevention.
                        </p>
                    </div>
                </div>
            </section>
            
            <!-- FAQ SECTION -->
            <section class="faq-section">
                <div class="section-header">
                    <h2 class="section-title">FREQUENTLY ASKED QUESTIONS</h2>
                    <p class="section-subtitle">
                        Common questions about AI Scam Assistant
                    </p>
                </div>
                
                <div class="faq-container">
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>How accurate is the AI scam detection?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Our current accuracy rate is 96.7% based on testing with 10,000 verified scam messages. The AI continuously learns and improves from new patterns. However, no system is 100% perfect, so we always recommend using caution and verifying through official channels.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Is my data safe and private?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Absolutely. All message analysis happens locally on your device with end-to-end encryption. We never store personal messages or user data on our servers. Your privacy is our top priority.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>What languages do you support?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>We support English, Bahasa Malaysia, Chinese (Simplified and Traditional), Tamil, and mixed-language messages (rojak). Our AI is specifically trained on Malaysian linguistic patterns and code-switching common in local communications.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>How do you update scam patterns?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Our machine learning models are updated daily with new scam patterns from our threat intelligence network. We analyze thousands of reported scams monthly and incorporate them into our detection algorithms automatically.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Is this service completely free?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Yes, our basic scam detection service is completely free for all Malaysian users. We believe digital safety should be accessible to everyone. We're funded through partnerships with cybersecurity organizations and government initiatives.</p>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- CTA SECTION -->
            <section class="cta-section">
                <h2 class="cta-title">READY TO PROTECT YOURSELF ?</h2>
                <p class="cta-description">
                    Join thousands of Malaysians who are already protected by our AI-powered scam detection system. 
                    Stay one step ahead of scammers with real-time analysis and instant alerts.
                </p>
                
                <div class="cta-buttons">
                    <a href="scam-detection.php" target="_blank" class="cta-btn primary">
                        <i class="fas fa-search"></i> Try Detection Tool
                    </a>
                    <a href="learn-more.php" target="_blank" class="cta-btn secondary">
                        <i class="fas fa-graduation-cap"></i> Learn More
                    </a>
                    <a href="report-scam.php" target="_blank" class="cta-btn secondary">
                        <i class="fas fa-flag"></i> Report a Scam
                    </a>
                </div>
            </section>
        </div>
        
        <!-- FOOTER SIMPLE -->
        <footer>
            <p class="copyright">
                © 2026 AI Scam & Digital Safety Assistant.<br>
                Malaysian Digital Safety Initiative | Protected by AI Security Protocols
            </p>
        </footer>
    </main>

    <script>
        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Animated counters
            animateCounters();
            
            // FAQ toggle functionality
            initializeFAQ();
            
            // Timeline animation on scroll
            initializeTimeline();
            
            // Add scroll animations to elements
            initializeScrollAnimations();
            
            // Handle window resize
            handleResize();
        });
        
        // Animate statistics counters
        function animateCounters() {
            const counters = [
                { element: document.getElementById('usersProtected'), target: 45892, duration: 2000 },
                { element: document.getElementById('scamsDetected'), target: 289456, duration: 2500 },
                { element: document.getElementById('accuracyRate'), target: 96.7, duration: 1800, isDecimal: true },
                { element: document.getElementById('languages'), target: 5, duration: 1500 }
            ];
            
            counters.forEach(counter => {
                if (!counter.element) return;
                
                const target = counter.target;
                const duration = counter.duration;
                const increment = target / (duration / 16);
                let current = 0;
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    
                    if (counter.isDecimal) {
                        counter.element.textContent = current.toFixed(1) + '%';
                    } else {
                        counter.element.textContent = Math.floor(current).toLocaleString();
                    }
                }, 16);
            });
        }
        
        // FAQ functionality
        function initializeFAQ() {
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                
                question.addEventListener('click', () => {
                    // Close all other items
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                        }
                    });
                    
                    // Toggle current item
                    item.classList.toggle('active');
                });
            });
        }
        
        // Timeline animation
        function initializeTimeline() {
            const timelineItems = document.querySelectorAll('.timeline-item');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            timelineItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(30px)';
                item.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                observer.observe(item);
            });
        }
        
        // Scroll animations for elements
        function initializeScrollAnimations() {
            const animatedElements = document.querySelectorAll('.mission-card, .tech-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            animatedElements.forEach(element => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(element);
            });
        }
        
        // Handle window resize
        function handleResize() {
            window.addEventListener('resize', function() {
                // Adjust timeline for mobile
                if (window.innerWidth <= 992) {
                    const timelineItems = document.querySelectorAll('.timeline-item');
                    timelineItems.forEach(item => {
                        item.style.left = '50px';
                    });
                }
            });
        }
        
        // Parallax effect for hero section
        window.addEventListener('scroll', function() {
            const heroSection = document.querySelector('.hero-section');
            const scrolled = window.pageYOffset;
            
            if (heroSection && scrolled < 500) {
                const rate = scrolled * -0.3;
                heroSection.style.transform = `translate3d(0px, ${rate}px, 0px)`;
            }
        });
    </script>
</body>
</html>