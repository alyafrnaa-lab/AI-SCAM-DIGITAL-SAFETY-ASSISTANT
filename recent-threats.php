<?php
session_start();
if (!isset($_SESSION['threats_visited'])) {
    $_SESSION['threats_visited'] = 0;
}
$_SESSION['threats_visited']++;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Scam Assistant - Live Threat Intelligence Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    
    <style>
        /* ========== RESET & BASE ========== */
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
        }
        
        :root {
            --critical: #ef4444;
            --high: #f59e0b;
            --medium: #3b82f6;
            --low: #22c55e;
            --primary: #7c3aed;
            --secondary: #06b6d4;
            --dark: #0f172a;
            --darker: #020617;
            --light: #e2e8f0;
            --card-bg: rgba(30, 27, 75, 0.8);
            --critical-glow: 0 0 30px rgba(239, 68, 68, 0.5);
            --high-glow: 0 0 30px rgba(245, 158, 11, 0.5);
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

        /* ========== THREAT BACKGROUND ========== */
        .threat-bg {
            position: fixed;
            top: 0;
            left: 280px;
            right: 0;
            bottom: 0;
            z-index: -2;
            background: 
                radial-gradient(circle at 20% 50%, rgba(239, 68, 68, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(245, 158, 11, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
            animation: threatPulse 15s ease-in-out infinite alternate;
        }

        @keyframes threatPulse {
            0% { opacity: 0.2; transform: scale(1); }
            50% { opacity: 0.4; }
            100% { opacity: 0.2; transform: scale(1.02); }
        }

        /* ========== NAVIGATION BAR ========== */
        .threat-nav {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            border: 2px solid var(--critical);
            border-radius: 15px;
            padding: 20px 30px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-brand i {
            font-size: 28px;
            color: var(--critical);
            animation: alertPulse 1.5s infinite;
        }

        @keyframes alertPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        .nav-brand h1 {
            font-size: 24px;
            font-weight: 900;
            background: linear-gradient(90deg, var(--critical), var(--high));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: 1px;
        }

        .live-indicator {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
        }

        .live-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--critical);
            animation: livePulse 1s infinite;
        }

        @keyframes livePulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }

        /* ========== THREAT OVERVIEW (4 CARDS) ========== */
        .threat-overview {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-bottom: 50px;
        }

        @media (max-width: 1200px) {
            .threat-overview {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .threat-overview {
                grid-template-columns: 1fr;
            }
        }

        .overview-card {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid;
            border-radius: 20px;
            padding: 25px;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .overview-card:hover {
            transform: translateY(-5px);
        }

        .overview-card.critical { 
            border-color: var(--critical);
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.3);
        }
        .overview-card.high { 
            border-color: var(--high);
            box-shadow: 0 0 20px rgba(245, 158, 11, 0.3);
        }
        .overview-card.medium { 
            border-color: var(--medium);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }
        .overview-card.low { 
            border-color: var(--low);
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
        }

        .overview-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 26px;
        }

        .overview-card.critical .overview-icon { 
            background: rgba(239, 68, 68, 0.2); 
            color: var(--critical); 
        }
        .overview-card.high .overview-icon { 
            background: rgba(245, 158, 11, 0.2); 
            color: var(--high); 
        }
        .overview-card.medium .overview-icon { 
            background: rgba(59, 130, 246, 0.2); 
            color: var(--medium); 
        }
        .overview-card.low .overview-icon { 
            background: rgba(34, 197, 94, 0.2); 
            color: var(--low); 
        }

        .overview-value {
            font-size: 36px;
            font-weight: 900;
            color: var(--light);
            margin-bottom: 5px;
            line-height: 1;
        }

        .overview-label {
            font-size: 14px;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .overview-trend {
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .trend-up { color: var(--critical); }
        .trend-down { color: var(--low); }

        /* ========== MAIN LAYOUT ========== */
        .dashboard-main {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 30px;
            margin-bottom: 50px;
        }

        @media (max-width: 1200px) {
            .dashboard-main {
                grid-template-columns: 1fr;
            }
        }

        /* ========== LIVE THREAT FEED ========== */
        .threat-feed-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 25px;
            padding: 30px;
        }

        .feed-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .section-title {
            font-size: 24px;
            color: var(--light);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title i {
            color: var(--critical);
            font-size: 26px;
        }

        .feed-controls {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        @media (max-width: 768px) {
            .feed-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .feed-controls {
                width: 100%;
                overflow-x: auto;
                padding-bottom: 10px;
            }
        }

        .filter-btn {
            padding: 10px 18px;
            background: rgba(124, 58, 237, 0.15);
            border: 2px solid #312e81;
            border-radius: 8px;
            color: #c7d2fe;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .filter-btn:hover {
            background: rgba(124, 58, 237, 0.25);
            transform: translateY(-2px);
        }

        .filter-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* THREAT FEED ITEMS */
        .threat-feed {
            display: flex;
            flex-direction: column;
            gap: 18px;
            max-height: 700px;
            overflow-y: auto;
            padding-right: 10px;
        }

        .threat-feed::-webkit-scrollbar {
            width: 8px;
        }

        .threat-feed::-webkit-scrollbar-track {
            background: rgba(30, 27, 75, 0.5);
            border-radius: 4px;
        }

        .threat-feed::-webkit-scrollbar-thumb {
            background: var(--critical);
            border-radius: 4px;
        }

        .threat-item {
            background: rgba(30, 27, 75, 0.9);
            border: 2px solid;
            border-left: 8px solid var(--critical);
            border-radius: 15px;
            padding: 22px;
            transition: all 0.3s ease;
        }

        .threat-item:hover {
            transform: translateX(5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            background: rgba(40, 37, 95, 0.9);
        }

        .threat-item.critical { 
            border-color: var(--critical); 
            border-left-color: var(--critical); 
        }
        .threat-item.high { 
            border-color: var(--high); 
            border-left-color: var(--high); 
        }
        .threat-item.medium { 
            border-color: var(--medium); 
            border-left-color: var(--medium); 
        }
        .threat-item.low { 
            border-color: var(--low); 
            border-left-color: var(--low); 
        }

        .threat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .threat-header {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }
        }

        .threat-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--light);
            margin-bottom: 8px;
        }

        .threat-meta {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }

        .threat-severity {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .severity-critical { 
            background: rgba(239, 68, 68, 0.2); 
            color: var(--critical); 
        }
        .severity-high { 
            background: rgba(245, 158, 11, 0.2); 
            color: var(--high); 
        }
        .severity-medium { 
            background: rgba(59, 130, 246, 0.2); 
            color: var(--medium); 
        }
        .severity-low { 
            background: rgba(34, 197, 94, 0.2); 
            color: var(--low); 
        }

        .threat-time {
            font-size: 13px;
            color: #94a3b8;
        }

        .threat-content {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 18px;
        }

        .threat-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 15px;
        }

        @media (max-width: 768px) {
            .threat-footer {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }
        }

        .threat-tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .threat-tag {
            padding: 5px 12px;
            background: rgba(124, 58, 237, 0.15);
            border-radius: 12px;
            font-size: 12px;
            color: #a5b4fc;
        }

        .threat-actions {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            padding: 8px 16px;
            background: rgba(239, 68, 68, 0.15);
            border: 2px solid var(--critical);
            border-radius: 8px;
            color: #c7d2fe;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
            font-family: 'Poppins', sans-serif;
        }

        .action-btn:hover {
            background: rgba(239, 68, 68, 0.25);
            transform: translateY(-2px);
        }

        /* ========== SIDEBAR STATS ========== */
        .stats-sidebar {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        @media (max-width: 1200px) {
            .stats-sidebar {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .stats-sidebar {
                grid-template-columns: 1fr;
            }
        }

        .stats-card {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 25px;
        }

        .stats-title {
            font-size: 18px;
            color: var(--light);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stats-title i {
            color: var(--primary);
        }

        .stats-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .stat-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .stat-item:last-child {
            border-bottom: none;
        }

        .stat-label {
            color: #c7d2fe;
            font-size: 14px;
        }

        .stat-value {
            font-weight: 600;
            color: var(--light);
            font-size: 14px;
        }

        /* ========== THREAT RADAR ========== */
        .threat-radar-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid var(--critical);
            border-radius: 25px;
            padding: 35px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .radar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        @media (max-width: 768px) {
            .radar-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }

        .radar-controls {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .radar-btn {
            padding: 10px 20px;
            background: rgba(239, 68, 68, 0.15);
            border: 2px solid var(--critical);
            border-radius: 10px;
            color: #c7d2fe;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: 'Poppins', sans-serif;
        }

        .radar-btn:hover {
            background: rgba(239, 68, 68, 0.25);
            transform: translateY(-2px);
        }

        .radar-btn.active {
            background: var(--critical);
            color: white;
            box-shadow: 0 0 15px rgba(239, 68, 68, 0.5);
        }

        .radar-container {
            position: relative;
            height: 400px;
            width: 100%;
        }

        #threatRadar {
            width: 100%;
            height: 100%;
        }

        .radar-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 10;
        }

        .radar-center-value {
            font-size: 42px;
            font-weight: 900;
            color: var(--critical);
            text-shadow: 0 0 20px var(--critical);
            margin-bottom: 10px;
        }

        .radar-center-label {
            color: #94a3b8;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* ========== THREAT MAP ========== */
        .threat-map-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid var(--high);
            border-radius: 25px;
            padding: 35px;
            margin-bottom: 40px;
        }

        .map-container {
            position: relative;
            height: 450px;
            width: 100%;
            margin-top: 25px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 768px) {
            .map-container {
                height: 350px;
            }
        }

        #threatMap {
            width: 100%;
            height: 100%;
        }

        .map-legend {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #c7d2fe;
        }

        .legend-color {
            width: 18px;
            height: 18px;
            border-radius: 4px;
        }

        .legend-critical { background: var(--critical); }
        .legend-high { background: var(--high); }
        .legend-medium { background: var(--medium); }
        .legend-low { background: var(--low); }

        /* ========== THREAT CATEGORIES ========== */
        .threat-categories {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 40px;
        }

        @media (max-width: 1200px) {
            .threat-categories {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .threat-categories {
                grid-template-columns: 1fr;
            }
        }

        .category-card {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 25px;
            transition: all 0.4s ease;
            cursor: pointer;
            height: 220px;
            display: flex;
            flex-direction: column;
        }

        .category-card:hover {
            border-color: var(--primary);
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(124, 58, 237, 0.2);
        }

        @media (max-width: 768px) {
            .category-card {
                height: auto;
                min-height: 200px;
            }
        }

        .category-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 26px;
            background: rgba(124, 58, 237, 0.2);
            color: var(--primary);
        }

        .category-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--light);
            margin-bottom: 12px;
        }

        .category-stats {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            color: #94a3b8;
            font-size: 13px;
        }

        /* ========== PROTECTION SECTION ========== */
        .protection-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid var(--low);
            border-radius: 25px;
            padding: 35px;
            margin-bottom: 40px;
        }

        .protection-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }

        @media (max-width: 768px) {
            .protection-grid {
                grid-template-columns: 1fr;
            }
        }

        .protection-card {
            background: rgba(34, 197, 94, 0.1);
            border: 2px solid var(--low);
            border-radius: 15px;
            padding: 22px;
            transition: all 0.3s ease;
        }

        .protection-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(34, 197, 94, 0.2);
        }

        .protection-card i {
            font-size: 28px;
            color: var(--low);
            margin-bottom: 15px;
        }

        /* ========== REPORT THREAT SECTION ========== */
        .report-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid var(--primary);
            border-radius: 25px;
            padding: 35px;
            margin-bottom: 40px;
            text-align: center;
        }

        .report-btn {
            background: linear-gradient(135deg, var(--primary), #6d28d9);
            color: white;
            border: none;
            padding: 18px 40px;
            font-size: 16px;
            font-weight: 700;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.4s ease;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-top: 25px;
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.3);
            font-family: 'Poppins', sans-serif;
        }

        .report-btn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.4);
        }

        /* ========== REPORT MODAL ========== */
        .report-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.9);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .report-modal.active {
            display: flex;
        }

        .modal-content {
            background: linear-gradient(145deg, #1e1b4b, #0f172a);
            padding: 40px;
            border-radius: 20px;
            border: 2px solid #ef4444;
            max-width: 500px;
            width: 100%;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .modal-header h3 {
            color: white;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modal-close {
            background: none;
            border: none;
            color: #c7d2fe;
            font-size: 24px;
            cursor: pointer;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .modal-close:hover {
            background: rgba(239, 68, 68, 0.2);
            color: white;
        }

        .modal-group {
            margin-bottom: 20px;
        }

        .modal-label {
            color: #c7d2fe;
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .modal-select {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 2px solid #312e81;
            background: rgba(0,0,0,0.3);
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .modal-textarea {
            width: 100%;
            height: 150px;
            padding: 12px;
            border-radius: 10px;
            border: 2px solid #312e81;
            background: rgba(0,0,0,0.3);
            color: white;
            font-family: 'Poppins', sans-serif;
            resize: vertical;
        }

        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 10px;
            margin-top: 10px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #c7d2fe;
            font-size: 14px;
            cursor: pointer;
        }

        .checkbox-label input {
            margin: 0;
        }

        .modal-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .modal-btn {
            flex: 1;
            padding: 15px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .modal-btn-cancel {
            background: #6b7280;
            color: white;
        }

        .modal-btn-cancel:hover {
            background: #4b5563;
        }

        .modal-btn-submit {
            background: #ef4444;
            color: white;
        }

        .modal-btn-submit:hover {
            background: #dc2626;
            transform: translateY(-2px);
        }

        /* ========== FOOTER ========== */
        footer {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-top: 3px solid var(--critical);
            border-radius: 20px 20px 0 0;
            padding: 40px;
            text-align: center;
            margin-top: 50px;
        }

        .footer-links {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-bottom: 40px;
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
            font-size: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            padding: 12px 15px;
            border-radius: 12px;
            background: rgba(239, 68, 68, 0.1);
            justify-content: center;
        }

        .footer-link:hover {
            color: var(--critical);
            transform: translateY(-5px);
            background: rgba(239, 68, 68, 0.2);
            border: 2px solid var(--critical);
        }

        .copyright {
            color: #6b7280;
            font-size: 14px;
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
            </li>
			<li class="nav-item">
                <a href="about-us.php" class="nav-link">
                    <i class="fas fa-search"></i>
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
                <a href="recent-threats.php" class="nav-link active">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Recent Threats</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="statistics.php" class="nav-link">
                    <i class="fas fa-chart-line"></i>
                    <span>Statistics</span>
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
        <!-- Threat Background -->
        <div class="threat-bg"></div>
        
        <!-- Navigation Bar -->
        <nav class="threat-nav">
            <div class="nav-brand">
                <i class="fas fa-radar"></i>
                <h1>LIVE THREAT INTELLIGENCE DASHBOARD</h1>
            </div>
            <div class="live-indicator">
                <div class="live-dot"></div>
                <span>LIVE THREAT MONITORING</span>
                <span>|</span>
                <span id="threatCount">47</span>
                <span>ACTIVE THREATS</span>
            </div>
        </nav>
        
        <!-- Threat Overview (4 CARDS) -->
        <div class="threat-overview">
            <div class="overview-card critical">
                <div class="overview-icon">
                    <i class="fas fa-fire"></i>
                </div>
                <div class="overview-value" id="criticalThreats">14</div>
                <div class="overview-label">Critical Threats</div>
                <div class="overview-trend trend-up">
                    <i class="fas fa-arrow-up"></i> <span id="criticalChange">+3</span> in last hour
                </div>
            </div>
            
            <div class="overview-card high">
                <div class="overview-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="overview-value" id="highThreats">18</div>
                <div class="overview-label">High Priority</div>
                <div class="overview-trend trend-up">
                    <i class="fas fa-arrow-up"></i> <span id="highChange">+2</span> in last hour
                </div>
            </div>
            
            <div class="overview-card medium">
                <div class="overview-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="overview-value" id="mediumThreats">10</div>
                <div class="overview-label">Medium Risk</div>
                <div class="overview-trend trend-down">
                    <i class="fas fa-arrow-down"></i> <span id="mediumChange">-1</span> in last hour
                </div>
            </div>
            
            <div class="overview-card low">
                <div class="overview-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="overview-value" id="lowThreats">5</div>
                <div class="overview-label">Low Risk</div>
                <div class="overview-trend trend-down">
                    <i class="fas fa-arrow-down"></i> <span id="lowChange">-2</span> in last hour
                </div>
            </div>
        </div>
        
        <!-- Main Dashboard Layout -->
        <div class="dashboard-main">
            <!-- Live Threat Feed -->
            <section class="threat-feed-section">
                <div class="feed-header">
                    <h2 class="section-title">
                        <i class="fas fa-broadcast-tower"></i> Live Threat Feed
                    </h2>
                    <div class="feed-controls">
                        <button class="filter-btn active" onclick="filterThreats('all')">All</button>
                        <button class="filter-btn" onclick="filterThreats('critical')">Critical</button>
                        <button class="filter-btn" onclick="filterThreats('high')">High</button>
                        <button class="filter-btn" onclick="filterThreats('medium')">Medium</button>
                        <button class="filter-btn" onclick="filterThreats('low')">Low</button>
                        <button class="filter-btn" onclick="filterThreats('banking')">Banking</button>
                        <button class="filter-btn" onclick="filterThreats('investment')">Investment</button>
                        <button class="filter-btn" onclick="filterThreats('romance')">Romance</button>
                    </div>
                </div>
                
                <div class="threat-feed" id="threatFeed">
                    <!-- Threat items will be added dynamically -->
                </div>
            </section>
            
            <!-- Stats Sidebar -->
            <div class="stats-sidebar">
                <div class="stats-card">
                    <h3 class="stats-title">
                        <i class="fas fa-chart-line"></i> Threat Statistics
                    </h3>
                    <div class="stats-list">
                        <div class="stat-item">
                            <span class="stat-label">Total Threats Today</span>
                            <span class="stat-value">47</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Banking Threats</span>
                            <span class="stat-value">22</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Investment Scams</span>
                            <span class="stat-value">15</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Romance Scams</span>
                            <span class="stat-value">8</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">New This Hour</span>
                            <span class="stat-value">6</span>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card">
                    <h3 class="stats-title">
                        <i class="fas fa-map-marker-alt"></i> Top Locations
                    </h3>
                    <div class="stats-list">
                        <div class="stat-item">
                            <span class="stat-label">Selangor</span>
                            <span class="stat-value">18 reports</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Kuala Lumpur</span>
                            <span class="stat-value">12 reports</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Johor</span>
                            <span class="stat-value">8 reports</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Penang</span>
                            <span class="stat-value">5 reports</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Sabah</span>
                            <span class="stat-value">4 reports</span>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card">
                    <h3 class="stats-title">
                        <i class="fas fa-clock"></i> Recent Activity
                    </h3>
                    <div class="stats-list">
                        <div class="stat-item">
                            <span class="stat-label">Last 5 min</span>
                            <span class="stat-value">2 new threats</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Last 30 min</span>
                            <span class="stat-value">8 new threats</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Last hour</span>
                            <span class="stat-value">14 new threats</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Last 24h</span>
                            <span class="stat-value">47 total</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Threat Radar -->
        <section class="threat-radar-section">
            <div class="radar-header">
                <h2 class="section-title">
                    <i class="fas fa-satellite-dish"></i> Live Threat Radar
                </h2>
                <div class="radar-controls">
                    <button class="radar-btn active" onclick="changeRadarMode('malaysia')">
                        <i class="fas fa-map-marked-alt"></i> Malaysia
                    </button>
                    <button class="radar-btn" onclick="changeRadarMode('platforms')">
                        <i class="fas fa-mobile-alt"></i> Platforms
                    </button>
                    <button class="radar-btn" onclick="changeRadarMode('types')">
                        <i class="fas fa-layer-group"></i> Threat Types
                    </button>
                    <button class="radar-btn" onclick="changeRadarMode('timeline')">
                        <i class="fas fa-clock"></i> Timeline
                    </button>
                </div>
            </div>
            
            <div class="radar-container">
                <canvas id="threatRadar"></canvas>
                <div class="radar-center">
                    <div class="radar-center-value" id="radarValue">47</div>
                    <div class="radar-center-label">ACTIVE THREATS</div>
                </div>
            </div>
        </section>
        
        <!-- Threat Map -->
        <section class="threat-map-section">
            <h2 class="section-title">
                <i class="fas fa-map-marked-alt"></i> Malaysia Threat Heat Map
            </h2>
            <p style="color: #c7d2fe; margin-bottom: 20px;">
                Real-time visualization of active threats across Malaysia. Click on hotspots for detailed analysis.
            </p>
            
            <div class="map-container">
                <canvas id="threatMap"></canvas>
            </div>
            
            <div class="map-legend">
                <div class="legend-item">
                    <div class="legend-color legend-critical"></div>
                    <span>Critical (40+ reports)</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color legend-high"></div>
                    <span>High (20-39 reports)</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color legend-medium"></div>
                    <span>Medium (10-19 reports)</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color legend-low"></div>
                    <span>Low (1-9 reports)</span>
                </div>
            </div>
        </section>
        
        <!-- Threat Categories -->
        <section>
            <h2 class="section-title" style="margin-bottom: 30px;">
                <i class="fas fa-layer-group"></i> Active Threat Categories
            </h2>
            
            <div class="threat-categories">
                <div class="category-card" onclick="showCategoryDetails('banking')">
                    <div class="category-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <h3 class="category-title">Banking Trojans</h3>
                    <p style="color: #c7d2fe; flex: 1; font-size: 14px;">
                        New malware variants targeting mobile banking apps with fake login screens
                    </p>
                    <div class="category-stats">
                        <span><i class="fas fa-exclamation-triangle"></i> 42 active threats</span>
                        <span style="color: #ef4444; font-weight: 700;">CRITICAL</span>
                    </div>
                </div>
                
                <div class="category-card" onclick="showCategoryDetails('phishing')">
                    <div class="category-icon">
                        <i class="fas fa-fish"></i>
                    </div>
                    <h3 class="category-title">Phishing Campaigns</h3>
                    <p style="color: #c7d2fe; flex: 1; font-size: 14px;">
                        Sophisticated email/SMS campaigns impersonating banks and government agencies
                    </p>
                    <div class="category-stats">
                        <span><i class="fas fa-exclamation-triangle"></i> 38 active threats</span>
                        <span style="color: #f59e0b; font-weight: 700;">HIGH</span>
                    </div>
                </div>
                
                <div class="category-card" onclick="showCategoryDetails('investment')">
                    <div class="category-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="category-title">Investment Scams</h3>
                    <p style="color: #c7d2fe; flex: 1; font-size: 14px;">
                        Fake crypto/forex investment platforms promising unrealistic returns
                    </p>
                    <div class="category-stats">
                        <span><i class="fas fa-exclamation-triangle"></i> 35 active threats</span>
                        <span style="color: #f59e0b; font-weight: 700;">HIGH</span>
                    </div>
                </div>
                
                <div class="category-card" onclick="showCategoryDetails('romance')">
                    <div class="category-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="category-title">Romance Scams</h3>
                    <p style="color: #c7d2fe; flex: 1; font-size: 14px;">
                        Fake profiles on dating apps requesting money for emergencies
                    </p>
                    <div class="category-stats">
                        <span><i class="fas fa-exclamation-triangle"></i> 28 active threats</span>
                        <span style="color: #f59e0b; font-weight: 700;">HIGH</span>
                    </div>
                </div>
                
                <div class="category-card" onclick="showCategoryDetails('tech')">
                    <div class="category-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h3 class="category-title">Tech Support Scams</h3>
                    <p style="color: #c7d2fe; flex: 1; font-size: 14px;">
                        Fake IT support calls claiming virus infections and demanding payment
                    </p>
                    <div class="category-stats">
                        <span><i class="fas fa-exclamation-triangle"></i> 22 active threats</span>
                        <span style="color: #3b82f6; font-weight: 700;">MEDIUM</span>
                    </div>
                </div>
                
                <div class="category-card" onclick="showCategoryDetails('ecommerce')">
                    <div class="category-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3 class="category-title">E-commerce Fraud</h3>
                    <p style="color: #c7d2fe; flex: 1; font-size: 14px;">
                        Fake online stores with deep discounts that steal payment information
                    </p>
                    <div class="category-stats">
                        <span><i class="fas fa-exclamation-triangle"></i> 18 active threats</span>
                        <span style="color: #3b82f6; font-weight: 700;">MEDIUM</span>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Protection Recommendations -->
        <section class="protection-section">
            <h2 class="section-title" style="color: var(--light);">
                <i class="fas fa-shield-alt"></i> Immediate Protection Measures
            </h2>
            <p style="color: #c7d2fe; margin-bottom: 25px; text-align: center;">
                Based on current threat intelligence, here are recommended actions to protect yourself
            </p>
            
            <div class="protection-grid">
                <div class="protection-card">
                    <i class="fas fa-mobile-alt"></i>
                    <h3 style="color: var(--light); margin-bottom: 10px; font-size: 16px;">Enable 2FA</h3>
                    <p style="color: #c7d2fe; font-size: 14px;">
                        Enable Two-Factor Authentication on all banking and email accounts immediately
                    </p>
                </div>
                
                <div class="protection-card">
                    <i class="fas fa-link"></i>
                    <h3 style="color: var(--light); margin-bottom: 10px; font-size: 16px;">Verify Links</h3>
                    <p style="color: #c7d2fe; font-size: 14px;">
                        Always verify URLs before clicking. Look for HTTPS and legitimate domain names
                    </p>
                </div>
                
                <div class="protection-card">
                    <i class="fas fa-phone-slash"></i>
                    <h3 style="color: var(--light); margin-bottom: 10px; font-size: 16px;">Ignore Unknown Calls</h3>
                    <p style="color: #c7d2fe; font-size: 14px;">
                        Do not answer calls from unknown numbers claiming to be from banks or government
                    </p>
                </div>
                
                <div class="protection-card">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <h3 style="color: var(--light); margin-bottom: 10px; font-size: 16px;">Check Statements</h3>
                    <p style="color: #c7d2fe; font-size: 14px;">
                        Regularly check bank statements for unauthorized transactions
                    </p>
                </div>
            </div>
        </section>
        
        <!-- Report Threat -->
        <section class="report-section">
            <h2 class="section-title" style="color: var(--light);">
                <i class="fas fa-flag"></i> Report a Threat
            </h2>
            <p style="color: #c7d2fe; margin-bottom: 20px; max-width: 800px; margin-left: auto; margin-right: auto;">
                Help protect others by reporting new threats. Your report could prevent thousands from falling victim.
            </p>
            
            <button class="report-btn" onclick="showReportModal()">
                <i class="fas fa-plus-circle"></i> Report New Threat
            </button>
        </section>
    </main>
    
    <!-- Report Modal (Sekarang hidden, hanya muncul bila tekan button) -->
    <div class="report-modal" id="reportModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-flag"></i> Report a New Threat</h3>
                <button class="modal-close" onclick="closeReportModal()">&times;</button>
            </div>
            
            <div class="modal-group">
                <label class="modal-label">Threat Type</label>
                <select class="modal-select" id="threatType">
                    <option value="banking">Bank Phishing</option>
                    <option value="investment">Investment Scam</option>
                    <option value="romance">Romance Scam</option>
                    <option value="tech">Tech Support</option>
                    <option value="ecommerce">E-commerce Fraud</option>
                    <option value="job">Job Scam</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            <div class="modal-group">
                <label class="modal-label">Description</label>
                <textarea class="modal-textarea" id="threatDescription" placeholder="Describe the threat in detail..."></textarea>
            </div>
            
            <div class="modal-group">
                <label class="modal-label">Platform</label>
                <div class="checkbox-group">
                    <label class="checkbox-label">
                        <input type="checkbox" value="whatsapp"> WhatsApp
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" value="sms"> SMS
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" value="phone"> Phone Call
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" value="email"> Email
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" value="website"> Website
                    </label>
                </div>
            </div>
            
            <div class="modal-buttons">
                <button class="modal-btn modal-btn-cancel" onclick="closeReportModal()">Cancel</button>
                <button class="modal-btn modal-btn-submit" onclick="submitThreatReport()">Submit Report</button>
            </div>
        </div>
    </div>
    
    <!-- Visitor Counter -->
    <div class="visitor-counter">
        <i class="fas fa-eye"></i>
        <span>Viewed: <?php echo $_SESSION['threats_visited']; ?> times</span>
    </div>

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
        
        document.addEventListener('click', (event) => {
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });

        // ========== GLOBAL VARIABLES ==========
        let threats = [];
        let currentFilter = 'all';
        let radarChart;
        
        // Current counts for 4 cards
        let currentCounts = {
            critical: 14,
            high: 18,
            medium: 10,
            low: 5
        };

        // ========== INITIALIZATION ==========
        document.addEventListener('DOMContentLoaded', function() {
            initializeThreatData();
            initializeRadarChart();
            initializeThreatMap();
            updateThreatCounts();
            startLiveUpdates();
            
            // Animate overview cards
            gsap.utils.toArray('.overview-card').forEach((card, i) => {
                gsap.from(card, {
                    y: 30,
                    opacity: 0,
                    duration: 0.6,
                    delay: i * 0.1,
                    ease: "back.out(1.2)"
                });
            });
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('active');
                }
            });
        });

        // ========== THREAT DATA ==========
        function initializeThreatData() {
            threats = [
                {
                    id: 1,
                    title: "NEW: Maybank Phishing Campaign",
                    content: "Sophisticated SMS campaign impersonating Maybank security team. Messages claim account suspension and include malicious links to fake login pages.",
                    severity: "critical",
                    time: "2 minutes ago",
                    tags: ["banking", "phishing", "sms", "malaysia"],
                    platform: "SMS",
                    location: "Selangor",
                    reports: 18,
                    new: true
                },
                {
                    id: 2,
                    title: "BitProfit Investment Scam",
                    content: "Fake cryptocurrency investment platform promising 5% daily returns. Multiple users report losing funds after depositing money.",
                    severity: "critical",
                    time: "15 minutes ago",
                    tags: ["investment", "crypto", "website", "financial"],
                    platform: "Website/WhatsApp",
                    location: "Nationwide",
                    reports: 15,
                    new: true
                },
                {
                    id: 3,
                    title: "WhatsApp Romance Scam Network",
                    content: "Organized network of fake profiles targeting singles. Scammers build emotional connections then request money for emergencies.",
                    severity: "high",
                    time: "30 minutes ago",
                    tags: ["romance", "whatsapp", "social", "emotional"],
                    platform: "WhatsApp",
                    location: "Kuala Lumpur",
                    reports: 12,
                    new: false
                },
                {
                    id: 4,
                    title: "Fake Shopee Voucher Scam",
                    content: "Massive SMS campaign claiming Shopee vouchers. Links lead to phishing sites collecting personal and banking information.",
                    severity: "high",
                    time: "1 hour ago",
                    tags: ["ecommerce", "phishing", "sms", "voucher"],
                    platform: "SMS",
                    location: "Johor",
                    reports: 10,
                    new: false
                },
                {
                    id: 5,
                    title: "Tech Support Scam Calls",
                    content: "Automated calls claiming to be from Microsoft Support. Callers request remote access to computers to 'remove viruses'.",
                    severity: "medium",
                    time: "2 hours ago",
                    tags: ["tech", "phone", "remote", "virus"],
                    platform: "Phone",
                    location: "Penang",
                    reports: 8,
                    new: false
                },
                {
                    id: 6,
                    title: "Job Scam Portal",
                    content: "Fake job portal 'MalaysiaJobs2025' charging upfront fees for 'training' and 'background checks'. No actual jobs offered.",
                    severity: "medium",
                    time: "3 hours ago",
                    tags: ["job", "website", "financial", "employment"],
                    platform: "Website",
                    location: "Sabah",
                    reports: 6,
                    new: false
                },
                {
                    id: 7,
                    title: "Government Grant Impersonation",
                    content: "Emails claiming to be from government agencies offering COVID-19 relief grants. Requires payment of 'processing fees'.",
                    severity: "low",
                    time: "4 hours ago",
                    tags: ["government", "email", "grant", "financial"],
                    platform: "Email",
                    location: "Sarawak",
                    reports: 4,
                    new: false
                },
                {
                    id: 8,
                    title: "Fake Police Alert Scam",
                    content: "Calls impersonating police officers claiming relatives in trouble. Requests money for 'bail' or 'legal fees'.",
                    severity: "low",
                    time: "5 hours ago",
                    tags: ["authority", "phone", "emergency", "family"],
                    platform: "Phone",
                    location: "Perak",
                    reports: 3,
                    new: false
                }
            ];
            
            renderThreatFeed();
        }

        // ========== RENDER THREAT FEED ==========
        function renderThreatFeed() {
            const feed = document.getElementById('threatFeed');
            feed.innerHTML = '';
            
            const filteredThreats = threats.filter(threat => {
                if (currentFilter === 'all') return true;
                if (currentFilter === 'critical') return threat.severity === 'critical';
                if (currentFilter === 'high') return threat.severity === 'high';
                if (currentFilter === 'medium') return threat.severity === 'medium';
                if (currentFilter === 'low') return threat.severity === 'low';
                return threat.tags.includes(currentFilter);
            });
            
            if (filteredThreats.length === 0) {
                feed.innerHTML = `
                    <div class="threat-item" style="text-align: center; padding: 40px 20px;">
                        <i class="fas fa-check-circle" style="font-size: 32px; color: var(--low); margin-bottom: 15px;"></i>
                        <h3 style="color: var(--light); margin-bottom: 10px;">No Threats Found</h3>
                        <p style="color: #c7d2fe;">No threats match the selected filter.</p>
                    </div>
                `;
                return;
            }
            
            filteredThreats.forEach(threat => {
                const threatItem = document.createElement('div');
                threatItem.className = `threat-item ${threat.severity}`;
                threatItem.innerHTML = `
                    <div class="threat-header">
                        <div>
                            <h3 class="threat-title">${threat.title}</h3>
                            <div class="threat-meta">
                                <span class="threat-severity severity-${threat.severity}">
                                    ${threat.severity.toUpperCase()}
                                </span>
                                <span class="threat-time">
                                    <i class="far fa-clock"></i> ${threat.time}
                                </span>
                                <span>
                                    <i class="fas fa-map-marker-alt"></i> ${threat.location}
                                </span>
                                <span>
                                    <i class="fas fa-user"></i> ${threat.reports} reports
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="threat-content">
                        ${threat.content}
                    </div>
                    <div class="threat-footer">
                        <div class="threat-tags">
                            ${threat.tags.map(tag => `<span class="threat-tag">${tag}</span>`).join('')}
                            <span class="threat-tag">${threat.platform}</span>
                        </div>
                        <div class="threat-actions">
                            <button class="action-btn" onclick="analyzeThreat(${threat.id})">
                                <i class="fas fa-search"></i> Analyze
                            </button>
                            <button class="action-btn" onclick="shareThreat(${threat.id})">
                                <i class="fas fa-share-alt"></i> Share
                            </button>
                        </div>
                    </div>
                `;
                
                feed.appendChild(threatItem);
            });
            
            // Update threat count
            document.getElementById('threatCount').textContent = filteredThreats.length;
            document.getElementById('radarValue').textContent = filteredThreats.length;
        }

        // ========== FILTER THREATS ==========
        function filterThreats(filter) {
            currentFilter = filter;
            
            // Update button states
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            renderThreatFeed();
        }

        // ========== UPDATE 4 CARD COUNTS ==========
        function updateThreatCounts() {
            const critical = threats.filter(t => t.severity === 'critical').length;
            const high = threats.filter(t => t.severity === 'high').length;
            const medium = threats.filter(t => t.severity === 'medium').length;
            const low = threats.filter(t => t.severity === 'low').length;
            
            // Animate number changes
            animateNumberChange('criticalThreats', currentCounts.critical, critical);
            animateNumberChange('highThreats', currentCounts.high, high);
            animateNumberChange('mediumThreats', currentCounts.medium, medium);
            animateNumberChange('lowThreats', currentCounts.low, low);
            
            // Update current counts
            currentCounts.critical = critical;
            currentCounts.high = high;
            currentCounts.medium = medium;
            currentCounts.low = low;
        }

        function animateNumberChange(elementId, oldValue, newValue) {
            if (oldValue === newValue) return;
            
            const element = document.getElementById(elementId);
            const diff = newValue - oldValue;
            
            gsap.fromTo(element,
                { scale: 1.3, color: '#ffffff' },
                { 
                    scale: 1, 
                    color: '#e2e8f0', 
                    duration: 0.5, 
                    ease: "back.out(1.7)",
                    onUpdate: function() {
                        const progress = this.progress();
                        const currentValue = Math.round(oldValue + (diff * progress));
                        element.textContent = currentValue;
                    },
                    onComplete: function() {
                        element.textContent = newValue;
                    }
                }
            );
        }

        // ========== LIVE UPDATES ==========
        function startLiveUpdates() {
            setInterval(() => {
                // Randomly add new threats
                if (Math.random() > 0.6) {
                    const severityTypes = ['critical', 'high', 'medium', 'low'];
                    const randomSeverity = severityTypes[Math.floor(Math.random() * severityTypes.length)];
                    
                    const newThreat = {
                        id: threats.length + 1,
                        title: getRandomThreatTitle(),
                        content: getRandomThreatContent(),
                        severity: randomSeverity,
                        time: "Just now",
                        tags: getRandomTags(),
                        platform: getRandomPlatform(),
                        location: getRandomLocation(),
                        reports: Math.floor(Math.random() * 10) + 1,
                        new: true
                    };
                    
                    threats.unshift(newThreat);
                    
                    // Keep only last 15 threats
                    if (threats.length > 15) {
                        threats.pop();
                    }
                    
                    renderThreatFeed();
                    updateThreatCounts();
                }
                
                // Update existing threat reports
                threats.forEach(threat => {
                    if (Math.random() > 0.8) {
                        threat.reports += Math.floor(Math.random() * 3) + 1;
                    }
                });
                
            }, 8000);
        }

        function getRandomThreatTitle() {
            const titles = [
                "New SMS Phishing Wave Detected",
                "Fake Investment Platform Alert",
                "Romance Scam Operation Uncovered",
                "Tech Support Call Scam Reports",
                "E-commerce Fraud Site Identified",
                "Job Portal Scam Warning",
                "Government Impersonation Attempt",
                "Bank Trojan Malware Alert"
            ];
            return titles[Math.floor(Math.random() * titles.length)];
        }

        function getRandomThreatContent() {
            const contents = [
                "New campaign detected targeting users with sophisticated social engineering techniques.",
                "Multiple reports of financial losses. Immediate action recommended for affected users.",
                "Scammers using advanced tactics to bypass security measures. High vigilance advised.",
                "Campaign shows signs of organized crime involvement. Authorities have been notified."
            ];
            return contents[Math.floor(Math.random() * contents.length)];
        }

        function getRandomTags() {
            const tagSets = [
                ['banking', 'phishing', 'sms'],
                ['investment', 'crypto', 'financial'],
                ['romance', 'social', 'emotional'],
                ['tech', 'phone', 'remote'],
                ['ecommerce', 'website', 'shopping'],
                ['job', 'employment', 'recruitment']
            ];
            return tagSets[Math.floor(Math.random() * tagSets.length)];
        }

        function getRandomPlatform() {
            const platforms = ['WhatsApp', 'SMS', 'Phone', 'Email', 'Facebook', 'Website'];
            return platforms[Math.floor(Math.random() * platforms.length)];
        }

        function getRandomLocation() {
            const locations = ['Selangor', 'Kuala Lumpur', 'Johor', 'Penang', 'Sabah', 'Sarawak', 'Perak', 'Melaka'];
            return locations[Math.floor(Math.random() * locations.length)];
        }

        // ========== THREAT RADAR ==========
        function initializeRadarChart() {
            const ctx = document.getElementById('threatRadar').getContext('2d');
            
            radarChart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: ['Banking', 'Investment', 'Romance', 'Tech Support', 'E-commerce', 'Job Scams', 'Government', 'Other'],
                    datasets: [{
                        label: 'Threat Intensity',
                        data: [85, 78, 65, 45, 58, 32, 28, 15],
                        backgroundColor: 'rgba(239, 68, 68, 0.2)',
                        borderColor: '#ef4444',
                        pointBackgroundColor: '#ef4444',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        r: {
                            angleLines: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            pointLabels: {
                                color: '#c7d2fe',
                                font: {
                                    size: 13,
                                    family: "'Poppins', sans-serif"
                                }
                            },
                            ticks: {
                                display: false,
                                backdropColor: 'transparent'
                            },
                            suggestedMin: 0,
                            suggestedMax: 100
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    animation: {
                        duration: 2000,
                        easing: 'easeOutQuart'
                    }
                }
            });
            
            setInterval(() => {
                radarChart.data.datasets[0].data = radarChart.data.datasets[0].data.map(value => {
                    return Math.max(10, Math.min(95, value + (Math.random() * 10 - 5)));
                });
                
                radarChart.update('none');
            }, 5000);
        }

        function changeRadarMode(mode) {
            document.querySelectorAll('.radar-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            let labels, data;
            
            switch(mode) {
                case 'malaysia':
                    labels = ['Selangor', 'Kuala Lumpur', 'Johor', 'Penang', 'Sabah', 'Sarawak', 'Perak', 'Melaka'];
                    data = [85, 78, 65, 45, 38, 42, 35, 28];
                    break;
                case 'platforms':
                    labels = ['WhatsApp', 'SMS', 'Phone', 'Email', 'Facebook', 'Instagram', 'Website', 'Telegram'];
                    data = [75, 82, 45, 38, 32, 28, 65, 22];
                    break;
                case 'types':
                    labels = ['Phishing', 'Investment', 'Romance', 'Tech Support', 'E-commerce', 'Job Scams', 'Authority', 'Other'];
                    data = [88, 72, 65, 48, 58, 35, 42, 25];
                    break;
                case 'timeline':
                    labels = ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00', '00:00', 'Peak'];
                    data = [25, 18, 45, 85, 92, 65, 35, 95];
                    break;
            }
            
            radarChart.data.labels = labels;
            radarChart.data.datasets[0].data = data;
            
            gsap.fromTo(radarChart.canvas,
                { scale: 0.95 },
                { scale: 1, duration: 0.5, ease: "back.out(1.7)" }
            );
            
            radarChart.update();
        }

        // ========== THREAT MAP ==========
        function initializeThreatMap() {
            const canvas = document.getElementById('threatMap');
            const ctx = canvas.getContext('2d');
            
            canvas.width = canvas.parentElement.clientWidth;
            canvas.height = canvas.parentElement.clientHeight;
            
            const states = [
                { name: 'Johor', x: 350, y: 450, level: 'high', reports: 42 },
                { name: 'Kedah', x: 200, y: 150, level: 'medium', reports: 18 },
                { name: 'Kelantan', x: 350, y: 120, level: 'low', reports: 8 },
                { name: 'Melaka', x: 300, y: 400, level: 'medium', reports: 22 },
                { name: 'Negeri Sembilan', x: 280, y: 350, level: 'medium', reports: 15 },
                { name: 'Pahang', x: 320, y: 300, level: 'low', reports: 12 },
                { name: 'Perak', x: 250, y: 250, level: 'high', reports: 35 },
                { name: 'Perlis', x: 180, y: 100, level: 'low', reports: 5 },
                { name: 'Pulau Pinang', x: 220, y: 180, level: 'critical', reports: 48 },
                { name: 'Sabah', x: 550, y: 320, level: 'medium', reports: 25 },
                { name: 'Sarawak', x: 450, y: 350, level: 'medium', reports: 28 },
                { name: 'Selangor', x: 270, y: 330, level: 'critical', reports: 85 },
                { name: 'Terengganu', x: 380, y: 220, level: 'low', reports: 10 },
                { name: 'Kuala Lumpur', x: 260, y: 340, level: 'critical', reports: 92 },
                { name: 'Labuan', x: 500, y: 340, level: 'low', reports: 3 },
                { name: 'Putrajaya', x: 265, y: 345, level: 'medium', reports: 18 }
            ];
            
            function drawMap() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                
                ctx.fillStyle = 'rgba(15, 23, 42, 0.5)';
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                
                states.forEach(state => {
                    const colors = {
                        critical: '#ef4444',
                        high: '#f59e0b',
                        medium: '#3b82f6',
                        low: '#22c55e'
                    };
                    
                    const radius = 25 + (state.reports / 5);
                    const color = colors[state.level];
                    
                    const gradient = ctx.createRadialGradient(
                        state.x, state.y, 0,
                        state.x, state.y, radius
                    );
                    
                    gradient.addColorStop(0, `${color}80`);
                    gradient.addColorStop(1, 'transparent');
                    
                    ctx.fillStyle = gradient;
                    ctx.beginPath();
                    ctx.arc(state.x, state.y, radius, 0, Math.PI * 2);
                    ctx.fill();
                    
                    ctx.fillStyle = color;
                    ctx.beginPath();
                    ctx.arc(state.x, state.y, 12, 0, Math.PI * 2);
                    ctx.fill();
                    
                    ctx.strokeStyle = '#ffffff';
                    ctx.lineWidth = 2;
                    ctx.beginPath();
                    ctx.arc(state.x, state.y, 14, 0, Math.PI * 2);
                    ctx.stroke();
                    
                    ctx.fillStyle = '#e2e8f0';
                    ctx.font = 'bold 14px Poppins';
                    ctx.textAlign = 'center';
                    ctx.fillText(state.name, state.x, state.y - 25);
                    
                    ctx.fillStyle = '#94a3b8';
                    ctx.font = '12px Poppins';
                    ctx.fillText(`${state.reports} reports`, state.x, state.y + 35);
                });
                
                ctx.fillStyle = '#ef4444';
                ctx.font = 'bold 28px Poppins';
                ctx.textAlign = 'center';
                ctx.fillText('MALAYSIA THREAT MAP', canvas.width / 2, 50);
                
                ctx.fillStyle = 'rgba(15, 23, 42, 0.8)';
                ctx.fillRect(canvas.width - 200, 20, 180, 120);
                ctx.strokeStyle = '#ef4444';
                ctx.lineWidth = 2;
                ctx.strokeRect(canvas.width - 200, 20, 180, 120);
                
                ctx.fillStyle = '#e2e8f0';
                ctx.font = 'bold 14px Poppins';
                ctx.textAlign = 'left';
                ctx.fillText('Threat Levels:', canvas.width - 190, 45);
                
                const legendItems = [
                    { color: '#ef4444', label: 'Critical' },
                    { color: '#f59e0b', label: 'High' },
                    { color: '#3b82f6', label: 'Medium' },
                    { color: '#22c55e', label: 'Low' }
                ];
                
                legendItems.forEach((item, i) => {
                    ctx.fillStyle = item.color;
                    ctx.beginPath();
                    ctx.arc(canvas.width - 185, 65 + (i * 25), 6, 0, Math.PI * 2);
                    ctx.fill();
                    
                    ctx.fillStyle = '#c7d2fe';
                    ctx.font = '12px Poppins';
                    ctx.fillText(item.label, canvas.width - 170, 70 + (i * 25));
                });
            }
            
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
                    canvas.style.cursor = 'pointer';
                    drawMap();
                    
                    ctx.fillStyle = 'rgba(255, 255, 255, 0.3)';
                    ctx.beginPath();
                    ctx.arc(hoveredState.x, hoveredState.y, 40, 0, Math.PI * 2);
                    ctx.fill();
                    
                    ctx.fillStyle = 'rgba(15, 23, 42, 0.95)';
                    ctx.fillRect(x + 20, y - 60, 200, 120);
                    ctx.strokeStyle = '#ef4444';
                    ctx.lineWidth = 2;
                    ctx.strokeRect(x + 20, y - 60, 200, 120);
                    
                    ctx.fillStyle = '#e2e8f0';
                    ctx.font = 'bold 16px Poppins';
                    ctx.textAlign = 'left';
                    ctx.fillText(hoveredState.name, x + 35, y - 35);
                    
                    ctx.fillStyle = '#c7d2fe';
                    ctx.font = '14px Poppins';
                    ctx.fillText(`Threat Level: ${hoveredState.level.toUpperCase()}`, x + 35, y - 10);
                    ctx.fillText(`Reports: ${hoveredState.reports}`, x + 35, y + 15);
                    ctx.fillText(`Status: Active`, x + 35, y + 40);
                    
                    const colors = {
                        critical: '#ef4444',
                        high: '#f59e0b',
                        medium: '#3b82f6',
                        low: '#22c55e'
                    };
                    
                    ctx.fillStyle = colors[hoveredState.level];
                    ctx.beginPath();
                    ctx.arc(x + 185, y - 45, 8, 0, Math.PI * 2);
                    ctx.fill();
                } else {
                    canvas.style.cursor = 'default';
                    drawMap();
                }
            });
            
            canvas.addEventListener('click', function(event) {
                const rect = canvas.getBoundingClientRect();
                const x = event.clientX - rect.left;
                const y = event.clientY - rect.top;
                
                states.forEach(state => {
                    const distance = Math.sqrt(Math.pow(x - state.x, 2) + Math.pow(y - state.y, 2));
                    if (distance < 30) {
                        showStateThreats(state.name);
                    }
                });
            });
            
            drawMap();
            
            window.addEventListener('resize', function() {
                canvas.width = canvas.parentElement.clientWidth;
                canvas.height = canvas.parentElement.clientHeight;
                drawMap();
            });
            
            setInterval(() => {
                states.forEach(state => {
                    if (Math.random() > 0.7) {
                        const change = Math.floor(Math.random() * 10) - 5;
                        state.reports = Math.max(1, state.reports + change);
                        
                        if (state.reports > 40) state.level = 'critical';
                        else if (state.reports > 20) state.level = 'high';
                        else if (state.reports > 10) state.level = 'medium';
                        else state.level = 'low';
                    }
                });
                
                drawMap();
            }, 10000);
        }

        // ========== REPORT MODAL FUNCTIONS ==========
        function showReportModal() {
            const modal = document.getElementById('reportModal');
            modal.classList.add('active');
            
            // Animate modal entrance
            gsap.fromTo(modal,
                { opacity: 0, scale: 0.9 },
                { opacity: 1, scale: 1, duration: 0.5, ease: "back.out(1.7)" }
            );
        }

        function closeReportModal() {
            const modal = document.getElementById('reportModal');
            modal.classList.remove('active');
        }

        function submitThreatReport() {
            const threatType = document.getElementById('threatType').value;
            const description = document.getElementById('threatDescription').value;
            
            if (!description.trim()) {
                alert("Please provide a threat description!");
                return;
            }
            
            const platforms = [];
            document.querySelectorAll('input[type="checkbox"]:checked').forEach(cb => {
                platforms.push(cb.value);
            });
            
            const newThreat = {
                id: threats.length + 1,
                title: `User Reported: ${getThreatTypeName(threatType)}`,
                content: description,
                severity: getRandomSeverity(),
                time: "Just now",
                tags: [threatType, 'user-reported', ...platforms],
                platform: platforms.length > 0 ? platforms.join('/') : 'Unknown',
                location: "User Report",
                reports: 1,
                new: true
            };
            
            threats.unshift(newThreat);
            
            renderThreatFeed();
            updateThreatCounts();
            
            closeReportModal();
            
            alert(`✅ Thank you for your report!\n\nYour threat report has been submitted and added to the threat feed. This helps protect thousands of other users.`);
            
            const feed = document.getElementById('threatFeed');
            if (feed.firstChild) {
                gsap.from(feed.firstChild, {
                    x: -100,
                    opacity: 0,
                    duration: 0.8,
                    ease: "back.out(1.2)"
                });
            }
        }

        function getThreatTypeName(type) {
            const names = {
                'banking': 'Banking Threat',
                'investment': 'Investment Scam',
                'romance': 'Romance Scam',
                'tech': 'Tech Support Scam',
                'ecommerce': 'E-commerce Fraud',
                'job': 'Job Scam',
                'other': 'Suspicious Activity'
            };
            return names[type] || 'Threat';
        }

        function getRandomSeverity() {
            const severities = ['critical', 'high', 'medium', 'low'];
            const weights = [0.2, 0.3, 0.3, 0.2];
            let random = Math.random();
            let cumulative = 0;
            
            for (let i = 0; i < severities.length; i++) {
                cumulative += weights[i];
                if (random <= cumulative) {
                    return severities[i];
                }
            }
            return 'medium';
        }

        // ========== THREAT ACTIONS ==========
        function analyzeThreat(threatId) {
            const threat = threats.find(t => t.id === threatId);
            if (!threat) return;
            
            alert(`🔍 Threat Analysis: ${threat.title}\n\nSeverity: ${threat.severity.toUpperCase()}\nPlatform: ${threat.platform}\nLocation: ${threat.location}\nReports: ${threat.reports}\n\nRecommended Actions:\n1. Do not engage with the source\n2. Report to authorities\n3. Change passwords if compromised\n4. Enable 2FA on accounts\n5. Monitor financial statements`);
        }

        function shareThreat(threatId) {
            const threat = threats.find(t => t.id === threatId);
            if (!threat) return;
            
            const shareText = `🚨 THREAT ALERT: ${threat.title}\n\n${threat.content}\n\nSeverity: ${threat.severity.toUpperCase()}\nLocation: ${threat.location}\nReports: ${threat.reports}\n\nShared via AI Scam Assistant Threat Intelligence`;
            
            if (navigator.share) {
                navigator.share({
                    title: 'Threat Alert',
                    text: shareText,
                    url: window.location.href
                });
            } else {
                navigator.clipboard.writeText(shareText).then(() => {
                    alert('Threat information copied to clipboard!');
                });
            }
        }

        function showCategoryDetails(category) {
            alert(`📊 ${category.charAt(0).toUpperCase() + category.slice(1)} Threats\n\nDetailed analysis loaded. Check threat feed for specific threats in this category.`);
        }

        function showStateThreats(stateName) {
            alert(`🗺️ ${stateName} Threat Analysis\n\nActive monitoring in progress. Check threat feed for specific threats in this region.`);
        }
    </script>
</body>
</html>