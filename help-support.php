<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Help & Support - AI Scam Assistant</title>
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

        /* ========== QUICK ACTION CARDS - 3 CARDS SAHAJA ========== */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin: 40px 0;
        }

        @media (max-width: 992px) {
            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .quick-actions {
                grid-template-columns: 1fr;
            }
        }

        .action-card {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .action-card:hover {
            transform: translateY(-8px);
            border-color: var(--primary);
            box-shadow: var(--glow);
        }

        .action-card::before {
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

        .action-card:hover::before {
            transform: scaleX(1);
        }

        .action-icon {
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

        .action-card:hover .action-icon {
            transform: scale(1.1) rotate(10deg);
            background: rgba(124, 58, 237, 0.25);
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.3);
        }

        .action-title {
            font-size: 22px;
            font-weight: 800;
            color: var(--light);
            margin-bottom: 12px;
        }

        .action-description {
            color: #c7d2fe;
            font-size: 15px;
            line-height: 1.6;
        }

        /* ========== FEEDBACK SECTION (GANTI USEFUL TOOLS) ========== */
        .feedback-section {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 3px solid var(--warning);
            border-radius: 30px;
            padding: 40px;
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
        }

        .feedback-section::before {
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
            margin-bottom: 40px;
        }

        .section-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 32px;
            font-weight: 900;
            background: linear-gradient(90deg, var(--warning), #fbbf24);
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

        /* FEEDBACK CONTENT */
        .feedback-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .feedback-stats {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(245, 158, 11, 0.3);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .average-rating {
            font-size: 48px;
            font-family: 'Orbitron', sans-serif;
            font-weight: 900;
            color: var(--warning);
            margin-bottom: 10px;
        }

        .rating-text {
            color: #c7d2fe;
            margin-bottom: 20px;
        }

        .stars-container {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-bottom: 20px;
        }

        .star {
            font-size: 32px;
            color: #6b7280;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .star:hover,
        .star.active {
            color: var(--warning);
            transform: scale(1.2);
        }

        .rating-count {
            color: #94a3b8;
            font-size: 14px;
            margin-top: 10px;
        }

        .feedback-btn {
            padding: 15px 40px;
            background: linear-gradient(135deg, var(--warning), #fbbf24);
            border: none;
            border-radius: 15px;
            color: #1f2937;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
        }

        .feedback-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(245, 158, 11, 0.3);
        }

        /* ========== FAQ SECTION (SEPERTI CODE ASAL) ========== */
        .faq-section {
            margin-bottom: 50px;
        }

        .search-container {
            max-width: 600px;
            margin: 30px auto 40px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 20px 25px;
            padding-left: 60px;
            background: rgba(0, 0, 0, 0.4);
            border: 2px solid #312e81;
            border-radius: 15px;
            color: var(--light);
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.15);
        }

        .search-icon {
            position: absolute;
            left: 25px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--accent);
            font-size: 20px;
        }

        .faq-categories {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 40px;
        }

        .faq-category-btn {
            padding: 12px 28px;
            background: rgba(6, 182, 212, 0.15);
            border: 2px solid var(--accent);
            border-radius: 12px;
            color: #c7d2fe;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .faq-category-btn:hover {
            background: rgba(6, 182, 212, 0.25);
            transform: translateY(-3px);
        }

        .faq-category-btn.active {
            background: var(--accent);
            color: white;
            border-color: var(--accent);
        }

        .faq-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .faq-item {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            margin-bottom: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .faq-item:hover {
            border-color: var(--accent);
            transform: translateY(-3px);
        }

        .faq-question {
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-size: 18px;
            font-weight: 700;
            color: var(--light);
        }

        .faq-question i {
            color: var(--accent);
            font-size: 20px;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0 30px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.4s ease;
            color: #c7d2fe;
            line-height: 1.6;
        }

        .faq-item.active .faq-answer {
            padding: 0 30px 25px;
            max-height: 500px;
        }

        .faq-feedback {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .feedback-btn-small {
            padding: 8px 20px;
            background: rgba(124, 58, 237, 0.1);
            border: 1px solid #312e81;
            border-radius: 10px;
            color: #c7d2fe;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .feedback-btn-small:hover {
            background: rgba(124, 58, 237, 0.2);
        }

        .feedback-btn-small.helpful {
            background: rgba(34, 197, 94, 0.15);
            border-color: var(--success);
            color: var(--success);
        }

        .feedback-btn-small.not-helpful {
            background: rgba(239, 68, 68, 0.15);
            border-color: var(--danger);
            color: var(--danger);
        }

        /* ========== LIVE CHAT SECTION ========== */
        .chat-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 3px solid var(--success);
            border-radius: 30px;
            padding: 40px;
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
        }

        .chat-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--success), #16a34a);
            border-radius: 30px 30px 0 0;
        }

        .chat-container {
            max-width: 800px;
            margin: 30px auto 0;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            overflow: hidden;
            border: 2px solid #312e81;
        }

        .chat-header {
            background: rgba(34, 197, 94, 0.15);
            padding: 20px 30px;
            border-bottom: 2px solid var(--success);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .chat-status {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--success);
            animation: statusPulse 2s infinite;
        }

        @keyframes statusPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .chat-messages {
            height: 350px;
            overflow-y: auto;
            padding: 25px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .message {
            max-width: 70%;
            padding: 15px 20px;
            border-radius: 18px;
            position: relative;
        }

        .message.bot {
            align-self: flex-start;
            background: rgba(124, 58, 237, 0.15);
            border: 1px solid rgba(124, 58, 237, 0.3);
        }

        .message.user {
            align-self: flex-end;
            background: rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .message-sender {
            font-size: 12px;
            color: #94a3b8;
            margin-bottom: 5px;
        }

        .chat-input-container {
            padding: 25px;
            border-top: 2px solid rgba(255, 255, 255, 0.1);
            display: flex;
            gap: 15px;
        }

        .chat-input {
            flex: 1;
            padding: 18px 25px;
            background: rgba(0, 0, 0, 0.4);
            border: 2px solid #312e81;
            border-radius: 15px;
            color: var(--light);
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
        }

        .chat-input:focus {
            outline: none;
            border-color: var(--success);
        }

        .chat-send-btn {
            padding: 18px 30px;
            background: linear-gradient(135deg, var(--success), #16a34a);
            border: none;
            border-radius: 15px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .chat-send-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.3);
        }

        /* ========== RESOURCES SECTION ========== */
        .resources-section {
            margin-bottom: 50px;
        }

        .resources-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .resource-card {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 25px;
            padding: 35px;
            transition: all 0.4s ease;
            text-align: center;
        }

        .resource-card:hover {
            transform: translateY(-8px);
            border-color: var(--warning);
            box-shadow: 0 15px 30px rgba(245, 158, 11, 0.2);
        }

        .resource-icon {
            width: 70px;
            height: 70px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 28px;
            background: rgba(245, 158, 11, 0.15);
            color: var(--warning);
        }

        .resource-details h4 {
            font-size: 20px;
            color: var(--light);
            margin-bottom: 12px;
        }

        .resource-details p {
            color: #c7d2fe;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .download-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 25px;
            background: rgba(245, 158, 11, 0.15);
            border: 2px solid var(--warning);
            border-radius: 12px;
            color: var(--warning);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .download-btn:hover {
            background: rgba(245, 158, 11, 0.25);
            transform: translateY(-3px);
        }

        /* ========== EMERGENCY SECTION - 2 ATAS, 2 BAWAH ========== */
        .emergency-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 3px solid var(--danger);
            border-radius: 30px;
            padding: 40px;
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
        }

        .emergency-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--danger), #dc2626);
            border-radius: 30px 30px 0 0;
        }

        /* 2 ATAS, 2 BAWAH GRID */
        .emergency-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, auto);
            gap: 25px;
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            .emergency-grid {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(4, auto);
            }
        }

        .emergency-card {
            background: rgba(239, 68, 68, 0.1);
            border: 2px solid rgba(239, 68, 68, 0.3);
            border-radius: 18px;
            padding: 25px;
            text-align: center;
            transition: all 0.4s ease;
        }

        .emergency-card:hover {
            background: rgba(239, 68, 68, 0.15);
            transform: translateY(-5px);
            border-color: var(--danger);
        }

        .emergency-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            background: rgba(239, 68, 68, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 26px;
            color: var(--danger);
        }

        .emergency-card h4 {
            font-size: 18px;
            color: var(--light);
            margin-bottom: 10px;
            font-weight: 700;
        }

        .emergency-card p {
            color: #c7d2fe;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .call-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 12px 25px;
            background: var(--danger);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .call-btn:hover {
            background: #dc2626;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3);
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

        /* ========== RESPONSIVE DESIGN ========== */
        @media (max-width: 1200px) {
            .main-container {
                max-width: 100%;
            }
            
            .hero-title {
                font-size: 40px;
            }
        }

        @media (max-width: 992px) {
            .main-content {
                margin-top: 0;
            }
            
            .hero-title {
                font-size: 34px;
            }
        }

        @media (max-width: 768px) {
            .hero-section,
            .feedback-section,
            .chat-section,
            .emergency-section {
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
            
            .faq-categories {
                flex-direction: column;
            }
            
            .faq-category-btn {
                width: 100%;
                justify-content: center;
            }
            
            .chat-input-container {
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .hero-section,
            .feedback-section,
            .chat-section,
            .emergency-section {
                padding: 25px 18px;
                border-radius: 20px;
            }
            
            .hero-title {
                font-size: 26px;
            }
            
            .section-title {
                font-size: 22px;
            }
            
            .action-card,
            .emergency-card {
                padding: 20px;
            }
            
            .faq-question {
                padding: 20px;
                font-size: 16px;
            }
            
            .faq-answer {
                padding: 0 20px;
            }
            
            .download-btn {
                padding: 10px 20px;
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
            <p>Help & Support Center</p>
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
                <a href="help-support.php" class="nav-link active">
                    <i class="fas fa-question-circle"></i>
                    <span>Help & Support</span>
                </a>
            </li>
            <!-- TAMBAH LINK FEEDBACK PAGE -->
            <li class="nav-item">
                <a href="feedback.php" target="_blank" class="nav-link">
                    <i class="fas fa-star"></i>
                    <span>Give Feedback</span>
                </a>
            </li>
        </ul>
        
        <div class="sidebar-footer">
            <p>© 2026 AI Scam & Digital Safety Assistant</p>
            <p>Help & Support Center</p>
        </div>
    </nav>
    
    <!-- MAIN CONTENT -->
    <main class="main-content">
        <div class="main-container">
            <!-- HERO SECTION -->
            <section class="hero-section">
                <div class="hero-content">
                    <h1 class="hero-title">HELP & SUPPORT CENTER</h1>
                    <p class="hero-subtitle">
                        Need assistance with AI Scam Assistant? Find answers to common questions, 
                        chat with our AI assistant, or access useful resources to help you stay safe online.
                    </p>
                    
                    <!-- QUICK ACTIONS - 3 CARDS SAHAJA -->
                    <div class="quick-actions">
                        <div class="action-card" onclick="scrollToSection('faq')">
                            <div class="action-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <h3 class="action-title">User Guide</h3>
                            <p class="action-description">
                                Step-by-step guides and tutorials for all features of AI Scam Assistant
                            </p>
                        </div>
                        
                        <div class="action-card" onclick="startLiveChat()">
                            <div class="action-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h3 class="action-title">Live Chat</h3>
                            <p class="action-description">
                                Chat instantly with our AI assistant for instant help and support
                            </p>
                        </div>
                        
                        <div class="action-card" onclick="scrollToSection('emergency')">
                            <div class="action-icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <h3 class="action-title">Emergency Help</h3>
                            <p class="action-description">
                                Immediate assistance for urgent scam-related situations in Malaysia
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- FEEDBACK & RATING SECTION (GANTI USEFUL TOOLS) -->
            <section class="feedback-section">
                <div class="section-header">
                    <h2 class="section-title">GIVE YOUR FEEDBACK</h2>
                    <p class="section-subtitle">
                        Rate your experience and help us improve AI Scam Assistant
                    </p>
                </div>
                
                <!-- FEEDBACK CONTENT -->
                <div class="feedback-content">
                    <div class="feedback-stats">
                        <div class="average-rating" id="averageRating">4.7</div>
                        <div class="rating-text">Average Rating from 2,843 Users</div>
                        
                        <div class="stars-container" id="starsContainer">
                            <!-- Stars will be added by JavaScript -->
                        </div>
                        
                        <div class="rating-count">
                            <span id="totalRatings">2,843 ratings</span>
                        </div>
                    </div>
                    
                    <button class="feedback-btn" onclick="openFeedbackPage()">
                        <i class="fas fa-star"></i> Rate & Give Detailed Feedback
                    </button>
                </div>
            </section>
            
            <!-- FAQ SECTION (SEPERTI CODE ASAL) -->
            <section class="faq-section" id="faq">
                <div class="section-header">
                    <h2 class="section-title">FREQUENTLY ASKED QUESTIONS</h2>
                    <p class="section-subtitle">
                        Find quick answers to common questions about AI Scam Assistant
                    </p>
                </div>
                
                <!-- SEARCH BAR -->
                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" id="faqSearch" placeholder="Search for answers...">
                </div>
                
                <!-- FAQ CATEGORIES -->
                <div class="faq-categories">
                    <button class="faq-category-btn active" onclick="filterFAQs('all')">
                        <i class="fas fa-th-large"></i> All Questions
                    </button>
                    <button class="faq-category-btn" onclick="filterFAQs('general')">
                        <i class="fas fa-home"></i> General
                    </button>
                    <button class="faq-category-btn" onclick="filterFAQs('detection')">
                        <i class="fas fa-search"></i> Detection
                    </button>
                    <button class="faq-category-btn" onclick="filterFAQs('privacy')">
                        <i class="fas fa-shield-alt"></i> Privacy
                    </button>
                    <button class="faq-category-btn" onclick="filterFAQs('technical')">
                        <i class="fas fa-tools"></i> Technical
                    </button>
                </div>
                
                <!-- FAQ LIST -->
                <div class="faq-container" id="faqContainer">
                    <!-- FAQs will be loaded by JavaScript -->
                </div>
            </section>
            
            <!-- LIVE CHAT SECTION -->
            <section class="chat-section" id="liveChat" style="display: none;">
                <div class="section-header">
                    <h2 class="section-title">LIVE CHAT WITH AI ASSISTANT</h2>
                    <p class="section-subtitle">
                        Ask our AI assistant any questions about scams, safety, or using our platform
                    </p>
                </div>
                
                <div class="chat-container">
                    <div class="chat-header">
                        <div class="chat-status"></div>
                        <span style="color: var(--light); font-weight: 600;">AI Assistant • Online</span>
                    </div>
                    
                    <div class="chat-messages" id="chatMessages">
                        <!-- Chat messages will be added here -->
                    </div>
                    
                    <div class="chat-input-container">
                        <input type="text" class="chat-input" id="chatInput" placeholder="Type your question here...">
                        <button class="chat-send-btn" onclick="sendMessage()">
                            <i class="fas fa-paper-plane"></i> Send
                        </button>
                    </div>
                </div>
            </section>
            
            <!-- RESOURCES SECTION -->
            <section class="resources-section">
                <div class="section-header">
                    <h2 class="section-title">DOWNLOADABLE RESOURCES</h2>
                    <p class="section-subtitle">
                        Useful guides and resources to help you stay safe online
                    </p>
                </div>
                
                <div class="resources-grid">
                    <!-- Resource 1 -->
                    <div class="resource-card">
                        <div class="resource-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="resource-details">
                            <h4>User Manual</h4>
                            <p>Complete guide to all features (PDF, 2.4 MB)</p>
                        </div>
                        <a href="downloads/AI_Scam_Assistant_User_Manual.pdf" class="download-btn" download="AI_Scam_Assistant_User_Manual.pdf">
                            <i class="fas fa-download"></i> Download Now
                        </a>
                    </div>
                    
                    <!-- Resource 2 -->
                    <div class="resource-card">
                        <div class="resource-icon">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <div class="resource-details">
                            <h4>Safety Checklist</h4>
                            <p>Essential security steps (PDF, 1.2 MB)</p>
                        </div>
                        <a href="downloads/Online_Safety_Checklist.pdf" class="download-btn" download="Online_Safety_Checklist.pdf">
                            <i class="fas fa-download"></i> Download Now
                        </a>
                    </div>
                    
                    <!-- Resource 3 -->
                    <div class="resource-card">
                        <div class="resource-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="resource-details">
                            <h4>Scam Prevention Guide</h4>
                            <p>Advanced protection tips (PDF, 3.1 MB)</p>
                        </div>
                        <a href="downloads/Scam_Prevention_Guide.pdf" class="download-btn" download="Scam_Prevention_Guide.pdf">
                            <i class="fas fa-download"></i> Download Now
                        </a>
                    </div>
                </div>
            </section>
            
            <!-- EMERGENCY SECTION - 2 ATAS, 2 BAWAH -->
            <section class="emergency-section" id="emergency">
                <div class="section-header">
                    <h2 class="section-title">EMERGENCY CONTACTS</h2>
                    <p class="section-subtitle">
                        Immediate assistance for urgent scam-related situations in Malaysia
                    </p>
                </div>
                
                <!-- 2 ATAS, 2 BAWAH GRID -->
                <div class="emergency-grid">
                    <!-- BARIS ATAS - CARD 1 & 2 -->
                    <div class="emergency-card">
                        <div class="emergency-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Polis Diraja Malaysia</h4>
                        <p>
                            For immediate police assistance and crime reporting
                        </p>
                        <a href="tel:999" class="call-btn">
                            <i class="fas fa-phone"></i> Call 999
                        </a>
                    </div>
                    
                    <div class="emergency-card">
                        <div class="emergency-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h4>CyberSecurity Malaysia</h4>
                        <p>
                            National cybersecurity specialist agency
                        </p>
                        <a href="tel:1300882999" class="call-btn">
                            <i class="fas fa-phone"></i> Call 1-300-88-2999
                        </a>
                    </div>
                    
                    <!-- BARIS BAWAH - CARD 3 & 4 -->
                    <div class="emergency-card">
                        <div class="emergency-icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <h4>Bank Negara Malaysia</h4>
                        <p>
                            Central bank financial fraud reporting
                        </p>
                        <a href="tel:1300885465" class="call-btn">
                            <i class="fas fa-phone"></i> Call 1-300-88-5465
                        </a>
                    </div>
                    
                    <div class="emergency-card">
                        <div class="emergency-icon">
                            <i class="fas fa-broadcast-tower"></i>
                        </div>
                        <h4>MCMC</h4>
                        <p>
                            Communications and multimedia complaints
                        </p>
                        <a href="tel:1800882363" class="call-btn">
                            <i class="fas fa-phone"></i> Call 1-800-88-2363
                        </a>
                    </div>
                </div>
            </section>
        </div>
        
        <!-- FOOTER SIMPLE -->
        <footer>
            <p class="copyright">
                © 2026 AI Scam & Digital Safety Assistant – Help & Support Center<br>
                Malaysian Digital Safety Initiative | Protected by AI Security Protocols
            </p>
        </footer>
    </main>

    <script>
        // ========== INITIALIZATION ==========
        document.addEventListener('DOMContentLoaded', function() {
            // Load FAQs
            loadFAQs();
            
            // Setup search functionality
            setupSearch();
            
            // Setup FAQ interaction
            setupFAQInteraction();
            
            // Initialize chat system
            initializeChat();
            
            // Setup feedback stars
            setupFeedbackStars();
            
            // Add welcome message to chat
            setTimeout(() => {
                if (document.getElementById('liveChat').style.display === 'none') {
                    addBotMessage("Hello! I'm your AI Assistant. I can help you with scam detection, safety tips, using our platform, and answering questions about online scams in Malaysia. How can I assist you today?");
                }
            }, 1000);
        });
        
        // ========== SCROLL TO SECTIONS ==========
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
        
        // ========== FEEDBACK SYSTEM ==========
        function setupFeedbackStars() {
            const starsContainer = document.getElementById('starsContainer');
            const averageRating = 4.7; // Average rating from database
            
            // Create 5 stars
            for (let i = 1; i <= 5; i++) {
                const star = document.createElement('i');
                star.className = 'fas fa-star star';
                if (i <= Math.floor(averageRating)) {
                    star.classList.add('active');
                }
                star.dataset.value = i;
                
                // Add click event to open feedback page with selected rating
                star.addEventListener('click', function() {
                    const rating = this.dataset.value;
                    openFeedbackPage(rating);
                });
                
                starsContainer.appendChild(star);
            }
        }
        
        function openFeedbackPage(rating = null) {
            // Save selected rating to localStorage if provided
            if (rating) {
                localStorage.setItem('selectedRating', rating);
            }
            
            // Open feedback page in new tab
            window.open('feedback.php', '_blank');
            
            // Show notification
            showNotification('Opening feedback page... Thank you for helping us improve!', 'success');
        }
        
        // ========== FAQ SYSTEM ==========
        let allFAQs = [];
        
        function loadFAQs() {
            // Sample FAQ data - SEPERTI CODE ASAL
            allFAQs = [
                // General FAQs
                {
                    id: 1,
                    category: 'general',
                    question: 'What is AI Scam Assistant?',
                    answer: 'AI Scam Assistant is an intelligent system that helps detect and prevent online scams using artificial intelligence. It analyzes messages, emails, and websites to identify potential scams and provides real-time protection.',
                    helpfulCount: 42,
                    notHelpfulCount: 3
                },
                {
                    id: 2,
                    category: 'general',
                    question: 'Is AI Scam Assistant free to use?',
                    answer: 'Yes, the basic scam detection features are completely free for all users in Malaysia. We believe digital safety should be accessible to everyone.',
                    helpfulCount: 38,
                    notHelpfulCount: 2
                },
                {
                    id: 3,
                    category: 'general',
                    question: 'How accurate is the scam detection?',
                    answer: 'Our current accuracy rate is 96.7% based on testing with thousands of verified scam messages. The AI continuously learns and improves from new patterns.',
                    helpfulCount: 56,
                    notHelpfulCount: 5
                },
                {
                    id: 4,
                    category: 'general',
                    question: 'What languages does it support?',
                    answer: 'We support English, Bahasa Malaysia, Chinese (Simplified and Traditional), Tamil, and mixed-language messages (rojak) commonly used in Malaysia.',
                    helpfulCount: 31,
                    notHelpfulCount: 1
                },
                
                // Detection FAQs
                {
                    id: 5,
                    category: 'detection',
                    question: 'How do I check if a message is a scam?',
                    answer: 'Copy and paste the suspicious message into our scam detection tool. The AI will analyze it and provide a risk assessment with detailed analysis.',
                    helpfulCount: 67,
                    notHelpfulCount: 4
                },
                {
                    id: 6,
                    category: 'detection',
                    question: 'What types of scams can it detect?',
                    answer: 'We detect banking/phishing scams, investment fraud, romance scams, tech support scams, e-commerce fraud, job scams, and many other types.',
                    helpfulCount: 49,
                    notHelpfulCount: 3
                },
                {
                    id: 7,
                    category: 'detection',
                    question: 'Can it detect WhatsApp scam messages?',
                    answer: 'Yes, we can analyze WhatsApp messages, SMS, emails, social media messages, and any text-based content for scam indicators.',
                    helpfulCount: 58,
                    notHelpfulCount: 2
                },
                
                // Privacy FAQs
                {
                    id: 8,
                    category: 'privacy',
                    question: 'Is my data safe and private?',
                    answer: 'Absolutely. All analysis happens locally on your device with encryption. We never store personal messages or user data on our servers.',
                    helpfulCount: 72,
                    notHelpfulCount: 1
                },
                {
                    id: 9,
                    category: 'privacy',
                    question: 'What information do you collect?',
                    answer: 'We only collect anonymized scam patterns for system improvement. No personally identifiable information is ever collected or stored.',
                    helpfulCount: 45,
                    notHelpfulCount: 2
                },
                
                // Technical FAQs
                {
                    id: 10,
                    category: 'technical',
                    question: 'The website is not loading properly',
                    answer: 'Try clearing your browser cache, disabling ad blockers, or using a different browser. If the problem persists, contact our technical support.',
                    helpfulCount: 28,
                    notHelpfulCount: 8
                },
                {
                    id: 11,
                    category: 'technical',
                    question: 'How do I reset my password?',
                    answer: 'Click on "Forgot Password" on the login page. You\'ll receive an email with instructions to reset your password.',
                    helpfulCount: 34,
                    notHelpfulCount: 3
                },
                {
                    id: 12,
                    category: 'technical',
                    question: 'Does it work on mobile browsers?',
                    answer: 'Yes, our website is fully responsive and works on all mobile browsers. We also have a mobile app available for download.',
                    helpfulCount: 41,
                    notHelpfulCount: 2
                },
                
                // Getting Started FAQs
                {
                    id: 13,
                    category: 'general',
                    question: 'How do I create an account?',
                    answer: 'Click on "Sign Up" at the top right corner. You only need an email address to create your free account.',
                    helpfulCount: 39,
                    notHelpfulCount: 2
                },
                {
                    id: 14,
                    category: 'general',
                    question: 'What are the system requirements?',
                    answer: 'Any modern web browser (Chrome, Firefox, Safari, Edge) with JavaScript enabled. No special hardware or software required.',
                    helpfulCount: 26,
                    notHelpfulCount: 1
                },
                
                // Report Issues FAQs
                {
                    id: 15,
                    category: 'detection',
                    question: 'How do I report a scam?',
                    answer: 'Use our "Report Scam" page to submit detailed information about the scam. You can upload screenshots and provide scammer contact details.',
                    helpfulCount: 52,
                    notHelpfulCount: 4
                },
                {
                    id: 16,
                    category: 'detection',
                    question: 'What happens after I report a scam?',
                    answer: 'Your report is added to our threat intelligence database. It helps improve our detection algorithms and protects other users.',
                    helpfulCount: 47,
                    notHelpfulCount: 3
                }
            ];
            
            renderFAQs(allFAQs);
        }
        
        function renderFAQs(faqs) {
            const container = document.getElementById('faqContainer');
            container.innerHTML = '';
            
            if (faqs.length === 0) {
                container.innerHTML = `
                    <div style="text-align: center; padding: 50px 30px;">
                        <i class="fas fa-search" style="font-size: 48px; color: var(--accent); margin-bottom: 20px;"></i>
                        <h3 style="color: var(--light); margin-bottom: 15px;">No Results Found</h3>
                        <p style="color: #c7d2fe;">Try different keywords or browse the categories above.</p>
                    </div>
                `;
                return;
            }
            
            faqs.forEach(faq => {
                const faqItem = document.createElement('div');
                faqItem.className = 'faq-item';
                faqItem.dataset.category = faq.category;
                faqItem.innerHTML = `
                    <div class="faq-question">
                        <span>${faq.question}</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>${faq.answer}</p>
                        <div class="faq-feedback">
                            <button class="feedback-btn-small" onclick="markHelpful(${faq.id})">
                                <i class="fas fa-thumbs-up"></i> Helpful (${faq.helpfulCount})
                            </button>
                            <button class="feedback-btn-small" onclick="markNotHelpful(${faq.id})">
                                <i class="fas fa-thumbs-down"></i> Not Helpful (${faq.notHelpfulCount})
                            </button>
                        </div>
                    </div>
                `;
                container.appendChild(faqItem);
            });
            
            // Re-attach event listeners
            setupFAQInteraction();
        }
        
        function setupFAQInteraction() {
            document.querySelectorAll('.faq-item').forEach(item => {
                const question = item.querySelector('.faq-question');
                
                question.addEventListener('click', () => {
                    // Close all other items
                    document.querySelectorAll('.faq-item').forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                        }
                    });
                    
                    // Toggle current item
                    item.classList.toggle('active');
                });
            });
        }
        
        function setupSearch() {
            const searchInput = document.getElementById('faqSearch');
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                if (searchTerm.length === 0) {
                    renderFAQs(allFAQs);
                    return;
                }
                
                const filteredFAQs = allFAQs.filter(faq => 
                    faq.question.toLowerCase().includes(searchTerm) || 
                    faq.answer.toLowerCase().includes(searchTerm)
                );
                
                renderFAQs(filteredFAQs);
            });
        }
        
        function filterFAQs(category) {
            // Update active button
            document.querySelectorAll('.faq-category-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            if (category === 'all') {
                renderFAQs(allFAQs);
            } else {
                const filteredFAQs = allFAQs.filter(faq => faq.category === category);
                renderFAQs(filteredFAQs);
            }
        }
        
        function markHelpful(faqId) {
            const faq = allFAQs.find(f => f.id === faqId);
            if (faq) {
                faq.helpfulCount++;
                renderFAQs(allFAQs.filter(f => f.category === document.querySelector('.faq-category-btn.active').getAttribute('onclick').match(/'(.*?)'/)[1] || 'all'));
                showNotification('Thank you for your feedback!', 'success');
                
                // Save feedback to localStorage
                saveFeedback(faqId, 'helpful');
            }
        }
        
        function markNotHelpful(faqId) {
            const faq = allFAQs.find(f => f.id === faqId);
            if (faq) {
                faq.notHelpfulCount++;
                renderFAQs(allFAQs.filter(f => f.category === document.querySelector('.faq-category-btn.active').getAttribute('onclick').match(/'(.*?)'/)[1] || 'all'));
                showNotification('Thank you for your feedback. We\'ll improve this answer.', 'info');
                
                // Save feedback to localStorage
                saveFeedback(faqId, 'not-helpful');
            }
        }
        
        function saveFeedback(faqId, type) {
            const feedbacks = JSON.parse(localStorage.getItem('faqFeedbacks')) || {};
            feedbacks[faqId] = type;
            localStorage.setItem('faqFeedbacks', JSON.stringify(feedbacks));
        }
        
        // ========== LIVE CHAT SYSTEM ==========
        let chatHistory = [];
        let isChatOpen = false;
        
        function startLiveChat() {
            const chatSection = document.getElementById('liveChat');
            chatSection.style.display = 'block';
            isChatOpen = true;
            
            // Scroll to chat section
            chatSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            
            // Add welcome message if chat is empty
            if (document.getElementById('chatMessages').children.length === 0) {
                addBotMessage("Hello! I'm your AI Assistant. I can help you with:\n\n1. Checking suspicious messages for scams\n2. Safety tips and prevention methods\n3. Using AI Scam Assistant features\n4. Reporting scams\n5. Emergency contacts in Malaysia\n\nHow can I assist you today?");
            }
            
            // Show notification
            showNotification('Live chat started! Ask me anything about scams or safety.', 'success');
        }
        
        function initializeChat() {
            const chatInput = document.getElementById('chatInput');
            
            // Send message on Enter key
            chatInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });
            
            // Load chat history
            loadChatHistory();
        }
        
        function sendMessage() {
            const chatInput = document.getElementById('chatInput');
            const message = chatInput.value.trim();
            
            if (message === '') return;
            
            // Add user message
            addUserMessage(message);
            
            // Clear input
            chatInput.value = '';
            
            // Simulate typing indicator
            showTypingIndicator();
            
            // Generate bot response after delay
            setTimeout(() => {
                removeTypingIndicator();
                const response = generateBotResponse(message);
                addBotMessage(response);
                
                // Save to chat history
                saveChatHistory();
            }, 1500);
        }
        
        function addUserMessage(message) {
            const chatMessages = document.getElementById('chatMessages');
            const messageDiv = document.createElement('div');
            messageDiv.className = 'message user';
            messageDiv.innerHTML = `
                <div class="message-sender">You</div>
                <div>${message}</div>
            `;
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
            
            // Add to chat history
            chatHistory.push({
                sender: 'user',
                message: message,
                timestamp: new Date().toISOString()
            });
        }
        
        function addBotMessage(message) {
            const chatMessages = document.getElementById('chatMessages');
            const messageDiv = document.createElement('div');
            messageDiv.className = 'message bot';
            messageDiv.innerHTML = `
                <div class="message-sender">AI Assistant</div>
                <div>${message}</div>
            `;
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
            
            // Add to chat history
            chatHistory.push({
                sender: 'bot',
                message: message,
                timestamp: new Date().toISOString()
            });
        }
        
        function showTypingIndicator() {
            const chatMessages = document.getElementById('chatMessages');
            const typingDiv = document.createElement('div');
            typingDiv.id = 'typingIndicator';
            typingDiv.className = 'message bot';
            typingDiv.innerHTML = `
                <div class="message-sender">AI Assistant</div>
                <div style="display: flex; gap: 5px;">
                    <span class="typing-dot"></span>
                    <span class="typing-dot"></span>
                    <span class="typing-dot"></span>
                </div>
            `;
            chatMessages.appendChild(typingDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
            
            // Add typing dots animation
            if (!document.getElementById('typingStyles')) {
                const style = document.createElement('style');
                style.id = 'typingStyles';
                style.textContent = `
                    .typing-dot {
                        width: 8px;
                        height: 8px;
                        border-radius: 50%;
                        background: var(--accent);
                        animation: typingAnimation 1.4s infinite ease-in-out;
                    }
                    .typing-dot:nth-child(1) { animation-delay: -0.32s; }
                    .typing-dot:nth-child(2) { animation-delay: -0.16s; }
                    @keyframes typingAnimation {
                        0%, 80%, 100% { transform: scale(0); }
                        40% { transform: scale(1); }
                    }
                `;
                document.head.appendChild(style);
            }
        }
        
        function removeTypingIndicator() {
            const typingIndicator = document.getElementById('typingIndicator');
            if (typingIndicator) {
                typingIndicator.remove();
            }
        }
        
        function generateBotResponse(userMessage) {
            const lowerMessage = userMessage.toLowerCase();
            
            // Pre-defined responses based on keywords - BANYAKKAN RESPONSES
            if (lowerMessage.includes('hello') || lowerMessage.includes('hi') || lowerMessage.includes('hey')) {
                return "Hello! Welcome to AI Scam Assistant. I can help you with:\n\n• Checking suspicious messages\n• Safety tips and prevention\n• Using our platform features\n• Reporting scams\n• Emergency contacts\n\nWhat do you need help with today?";
            }
            
            if (lowerMessage.includes('how are you')) {
                return "I'm doing well, thank you! Ready to help you stay safe from online scams. How can I assist you today?";
            }
            
            if (lowerMessage.includes('scam') && lowerMessage.includes('detect')) {
                return "To check if a message is a scam:\n\n1. Go to Scam Detection page\n2. Paste the suspicious message\n3. Click 'Analyze Message'\n4. Get instant results with risk level\n\nOur AI checks for phishing links, urgent money requests, fake offers, and common scam patterns in Bahasa Malaysia and English.";
            }
            
            if (lowerMessage.includes('report') && lowerMessage.includes('scam')) {
                return "To report a scam:\n\n1. Go to Report Scam page\n2. Provide details (message content, sender info)\n3. Upload screenshots if available\n4. Submit report\n\nYour report helps protect others and improves our detection system. All reports are anonymous.";
            }
            
            if (lowerMessage.includes('privacy') || lowerMessage.includes('data') || lowerMessage.includes('secure')) {
                return "Your privacy is protected:\n\n• All analysis happens on your device\n• No personal data stored on our servers\n• End-to-end encryption\n• No tracking of your messages\n• Anonymous scam pattern collection only\n\nWe're GDPR compliant and follow Malaysian data protection laws.";
            }
            
            if (lowerMessage.includes('accuracy') || lowerMessage.includes('how accurate') || lowerMessage.includes('reliable')) {
                return "Our accuracy details:\n\n• 96.7% overall accuracy rate\n• Trained on 10,000+ verified scam messages\n• Updated daily with new scam patterns\n• Specialized for Malaysian scam types\n• Multiple language detection\n\nNote: Always verify through official channels for critical matters.";
            }
            
            if (lowerMessage.includes('emergency') || lowerMessage.includes('urgent') || lowerMessage.includes('help now')) {
                return "For immediate assistance:\n\n🚨 CALL 999 - Polis Diraja Malaysia\n🚨 CALL 1-300-88-2999 - CyberSecurity Malaysia\n\nIf you've lost money:\n1. Contact your bank IMMEDIATELY\n2. File police report\n3. Report to us\n4. Monitor your accounts";
            }
            
            if (lowerMessage.includes('bank') || lowerMessage.includes('money') || lowerMessage.includes('transfer')) {
                return "If you've lost money to a scam:\n\n1. 🏦 CONTACT YOUR BANK NOW - Report unauthorized transactions\n2. 📞 CALL 999 - File police report\n3. 🔄 Change all passwords\n4. 📱 Report to us\n\nBanks in Malaysia have fraud departments that can help recover funds if reported quickly.";
            }
            
            if (lowerMessage.includes('language') || lowerMessage.includes('bahasa') || lowerMessage.includes('chinese') || lowerMessage.includes('tamil')) {
                return "We support:\n\n• English\n• Bahasa Malaysia\n• Chinese (Simplified & Traditional)\n• Tamil\n• Mixed messages (rojak)\n\nOur AI understands Malaysian linguistic patterns, code-switching, and local scam terminology in all these languages.";
            }
            
            if (lowerMessage.includes('whatsapp') || lowerMessage.includes('sms') || lowerMessage.includes('message')) {
                return "We can analyze:\n\n• WhatsApp messages\n• SMS/text messages\n• Email content\n• Social media messages\n• Website text\n\nJust copy and paste the suspicious content into our Scam Detection tool. We check for fake job offers, investment scams, phishing links, and romance scams.";
            }
            
            if (lowerMessage.includes('free') || lowerMessage.includes('cost') || lowerMessage.includes('price')) {
                return "AI Scam Assistant is completely FREE for:\n\n• Basic scam detection\n• Message analysis\n• Safety tips\n• Emergency contact info\n• FAQ access\n\nWe're funded by Malaysian cybersecurity initiatives to make digital safety accessible to everyone.";
            }
            
            if (lowerMessage.includes('types') || lowerMessage.includes('kind') || lowerMessage.includes('scam')) {
                return "Common scams in Malaysia:\n\n• 💰 Macau scam (police/bank impersonation)\n• 💑 Romance/dating scams\n• 📈 Investment/fake money schemes\n• 🛍️ E-commerce fraud\n• 👨‍💼 Fake job offers\n• 🏦 Banking/phishing scams\n• 🛠️ Tech support scams\n• 🎁 Lucky draw scams\n\nOur AI detects all these patterns.";
            }
            
            if (lowerMessage.includes('safety') || lowerMessage.includes('prevent') || lowerMessage.includes('protect')) {
                return "Safety tips:\n\n1. ❌ Never share OTP/passwords\n2. ✅ Verify sender identity\n3. 🔍 Check URLs carefully\n4. 🕒 Don't rush urgent requests\n5. 📱 Use official apps/websites\n6. 🔒 Enable 2FA on accounts\n7. 📋 Report suspicious messages\n\nVisit Safety Tips page for more detailed guides.";
            }
            
            if (lowerMessage.includes('app') || lowerMessage.includes('mobile') || lowerMessage.includes('download')) {
                return "We're currently web-based (works on all browsers). Mobile app coming soon!\n\nFor now:\n• 📱 Use Chrome/Safari on mobile\n• ✅ Save to home screen\n• 🔔 Enable notifications\n• 💾 Bookmark our website\n\nWorks perfectly on all devices without installation.";
            }
            
            if (lowerMessage.includes('contact') || lowerMessage.includes('support') || lowerMessage.includes('email')) {
                return "Contact options:\n\n• 📧 Email: support@aiscam.my\n• 📱 Phone: +603 1234 5678\n• 💬 This chat (AI assistant)\n• 🕒 Hours: Mon-Fri 9AM-6PM\n• 🌐 Website: www.aiscam.my\n\nFor fastest help, check our FAQ section first!";
            }
            
            if (lowerMessage.includes('thank') || lowerMessage.includes('thanks')) {
                return "You're welcome! Stay safe online and remember to always verify suspicious messages. Feel free to ask if you have more questions about scams or online safety! 😊";
            }
            
            if (lowerMessage.includes('bye') || lowerMessage.includes('goodbye')) {
                return "Goodbye! Remember to stay vigilant against scams. Visit us anytime you need help or want to check suspicious messages. Take care! 👋";
            }
            
            // Default response with suggestions
            const suggestions = "I can help you with:\n\n• Scam detection methods\n• Safety and prevention tips\n• Using our platform\n• Reporting scams\n• Emergency contacts\n• Privacy questions\n\nTry asking about specific scam types or how to use a particular feature!";
            
            return `I understand you're asking about "${userMessage}". ${suggestions}`;
        }
        
        function loadChatHistory() {
            const savedHistory = localStorage.getItem('chatHistory');
            if (savedHistory) {
                chatHistory = JSON.parse(savedHistory);
                
                // Display last 10 messages
                const recentMessages = chatHistory.slice(-10);
                const chatMessages = document.getElementById('chatMessages');
                
                recentMessages.forEach(msg => {
                    if (msg.sender === 'user') {
                        addUserMessage(msg.message);
                    } else {
                        addBotMessage(msg.message);
                    }
                });
            }
        }
        
        function saveChatHistory() {
            // Keep only last 50 messages
            if (chatHistory.length > 50) {
                chatHistory = chatHistory.slice(-50);
            }
            
            localStorage.setItem('chatHistory', JSON.stringify(chatHistory));
        }
        
        // ========== NOTIFICATION SYSTEM ==========
        function showNotification(message, type = 'info') {
            // Remove existing notification
            const existingNotification = document.querySelector('.notification');
            if (existingNotification) {
                existingNotification.remove();
            }
            
            // Create notification
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.innerHTML = `
                <div style="
                    position: fixed;
                    top: 100px;
                    right: 30px;
                    background: ${type === 'success' ? 'var(--success)' : type === 'error' ? 'var(--danger)' : 'var(--primary)'};
                    color: white;
                    padding: 15px 25px;
                    border-radius: 12px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
                    z-index: 10000;
                    display: flex;
                    align-items: center;
                    gap: 12px;
                    animation: slideIn 0.3s ease;
                ">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
                    <span>${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
            
            // Add CSS for animations
            if (!document.getElementById('notificationStyles')) {
                const style = document.createElement('style');
                style.id = 'notificationStyles';
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
            }
        }
        
        // ========== INITIAL BOT MESSAGE ==========
        function addInitialBotMessage() {
            if (!localStorage.getItem('welcomeMessageShown')) {
                setTimeout(() => {
                    if (!isChatOpen) {
                        showNotification('Need help? Try our Live Chat or browse the FAQ section!', 'info');
                        localStorage.setItem('welcomeMessageShown', 'true');
                    }
                }, 5000);
            }
        }
        
        // Call initial functions
        addInitialBotMessage();
    </script>
</body>
</html>