<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report Scam - AI Scam & Digital Safety Assistant</title>
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
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
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

        /* ========== PROGRESS STEPS ========== */
        .progress-steps {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin: 40px 0;
            flex-wrap: wrap;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            min-width: 100px;
        }

        .step-number {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(124, 58, 237, 0.2);
            border: 2px solid #7c3aed;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 700;
            color: #c7d2fe;
            margin-bottom: 10px;
            transition: all 0.4s ease;
        }

        .step.active .step-number {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            color: white;
            box-shadow: 0 0 20px rgba(124, 58, 237, 0.5);
            transform: scale(1.1);
        }

        .step-label {
            font-size: 14px;
            color: #c7d2fe;
            font-weight: 500;
            text-align: center;
        }

        .step-connector {
            width: 40px;
            height: 2px;
            background: rgba(124, 58, 237, 0.3);
        }

        @media (max-width: 768px) {
            .progress-steps {
                flex-direction: column;
                gap: 20px;
            }
            .step-connector {
                width: 2px;
                height: 30px;
            }
        }

        /* ========== FORM SECTIONS ========== */
        .form-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            display: none;
        }

        .form-section.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ========== SECTION HEADER ========== */
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

        /* ========== FORM ELEMENTS ========== */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            font-size: 16px;
            font-weight: 600;
            color: #f9fafb;
        }

        .form-label i {
            color: #7c3aed;
            font-size: 18px;
        }

        .required {
            color: #ef4444;
            margin-left: 5px;
        }

        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 5px;
            display: none;
        }

        /* Input Styles */
        select, input, textarea {
            width: 100%;
            padding: 16px 20px;
            background: rgba(0, 0, 0, 0.4);
            border: 2px solid #312e81;
            border-radius: 12px;
            color: #e5e7eb;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        select:focus, input:focus, textarea:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.15);
        }

        select option {
            background: #1e1b4b;
            color: #e5e7eb;
            padding: 10px;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
            line-height: 1.5;
        }

        /* Option Groups */
        .option-group {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .option-item {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid #312e81;
            border-radius: 12px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .option-item:hover {
            border-color: #7c3aed;
            transform: translateY(-3px);
            background: rgba(124, 58, 237, 0.1);
        }

        .option-item.selected {
            border-color: #7c3aed;
            background: rgba(124, 58, 237, 0.2);
            box-shadow: 0 5px 15px rgba(124, 58, 237, 0.2);
        }

        .option-checkbox {
            display: none;
        }

        .option-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .option-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(124, 58, 237, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #7c3aed;
            flex-shrink: 0;
        }

        .option-text h4 {
            color: #f9fafb;
            font-size: 15px;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .option-text p {
            color: #a5b4fc;
            font-size: 12px;
            line-height: 1.4;
        }

        /* File Upload */
        .file-upload-area {
            border: 2px dashed #312e81;
            border-radius: 15px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: rgba(0, 0, 0, 0.2);
        }

        .file-upload-area:hover {
            border-color: #7c3aed;
            background: rgba(124, 58, 237, 0.05);
        }

        .file-upload-area i {
            font-size: 48px;
            color: #7c3aed;
            margin-bottom: 15px;
            opacity: 0.7;
        }

        .file-upload-text h4 {
            color: #f9fafb;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .file-upload-text p {
            color: #a5b4fc;
            font-size: 13px;
        }

        .file-preview-container {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 15px;
        }

        .file-preview {
            width: 100px;
            height: 100px;
            border-radius: 12px;
            overflow: hidden;
            position: relative;
            border: 2px solid #312e81;
        }

        .file-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .remove-file {
            position: absolute;
            top: 5px;
            right: 5px;
            background: #ef4444;
            color: white;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 11px;
        }

        /* AI Analysis */
        .ai-analysis {
            background: rgba(6, 182, 212, 0.1);
            border: 2px solid #06b6d4;
            border-radius: 15px;
            padding: 25px;
            margin-top: 25px;
        }

        .analysis-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 15px;
        }

        .analysis-header i {
            font-size: 24px;
            color: #06b6d4;
        }

        .analysis-header h4 {
            color: #f9fafb;
            font-size: 18px;
            font-weight: 700;
        }

        .scam-meter {
            margin-bottom: 20px;
        }

        .meter-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            color: #c7d2fe;
            font-size: 13px;
        }

        .meter-bar {
            height: 16px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .meter-fill {
            height: 100%;
            background: linear-gradient(90deg, #22c55e, #f59e0b, #ef4444);
            border-radius: 8px;
            width: 0%;
            transition: width 1s ease;
        }

        .analysis-results {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
        }

        .analysis-item {
            background: rgba(0, 0, 0, 0.3);
            padding: 15px;
            border-radius: 12px;
            text-align: center;
        }

        .analysis-item i {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .analysis-item.critical i { color: #ef4444; }
        .analysis-item.warning i { color: #f59e0b; }
        .analysis-item.info i { color: #06b6d4; }

        /* Review Summary */
        .review-summary {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid #7c3aed;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .summary-label {
            color: #c7d2fe;
            font-weight: 600;
            font-size: 14px;
        }

        .summary-value {
            color: #f9fafb;
            text-align: right;
            font-size: 14px;
            max-width: 60%;
        }

        /* ========== FORM NAVIGATION ========== */
        .form-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 768px) {
            .form-navigation {
                flex-direction: column;
                gap: 15px;
            }
        }

        .nav-btn {
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
        }

        @media (max-width: 768px) {
            .nav-btn {
                width: 100%;
                justify-content: center;
            }
        }

        .nav-btn:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, #8b5cf6, #6366f1);
        }

        .nav-btn.secondary {
            background: rgba(124, 58, 237, 0.15);
            border: 2px solid #7c3aed;
            color: #c7d2fe;
            padding: 14px 25px;
            font-size: 15px;
            font-weight: 600;
        }

        .nav-btn.secondary:hover {
            background: rgba(124, 58, 237, 0.25);
            transform: translateY(-3px);
        }

        .nav-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        /* ========== SUCCESS SECTION ========== */
        .success-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #22c55e;
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            text-align: center;
            display: none;
        }

        .success-section.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        .success-icon {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #22c55e, #16a34a);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 42px;
            color: white;
            animation: successPulse 2s infinite;
        }

        @keyframes successPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .report-id {
            background: rgba(34, 197, 94, 0.15);
            border: 2px solid #22c55e;
            border-radius: 15px;
            padding: 20px;
            margin: 30px auto;
            max-width: 500px;
        }

        .report-id h4 {
            color: #f9fafb;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .id-display {
            font-size: 24px;
            color: #22c55e;
            font-weight: 800;
            letter-spacing: 2px;
            background: rgba(0, 0, 0, 0.3);
            padding: 15px;
            border-radius: 10px;
            margin: 15px 0;
        }

        /* ========== RECENT REPORTS ========== */
        .recent-reports-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #f59e0b;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .reports-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .report-card {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(245, 158, 11, 0.3);
            border-radius: 15px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .report-card:hover {
            transform: translateY(-5px);
            border-color: #f59e0b;
            box-shadow: 0 10px 25px rgba(245, 158, 11, 0.2);
        }

        .report-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .report-type {
            padding: 6px 15px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .report-type.banking { background: rgba(239, 68, 68, 0.2); color: #ef4444; }
        .report-type.investment { background: rgba(245, 158, 11, 0.2); color: #f59e0b; }
        .report-type.romance { background: rgba(124, 58, 237, 0.2); color: #7c3aed; }
        .report-type.tech { background: rgba(6, 182, 212, 0.2); color: #06b6d4; }

        .report-time {
            color: #94a3b8;
            font-size: 12px;
        }

        .report-content {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .report-platforms {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .platform-tag {
            padding: 4px 12px;
            background: rgba(124, 58, 237, 0.15);
            border-radius: 10px;
            font-size: 11px;
            color: #a5b4fc;
        }

        /* ========== RESOURCES SECTION ========== */
        .resources-section {
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .resources-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .resource-card {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(124, 58, 237, 0.3);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .resource-card:hover {
            transform: translateY(-5px);
            border-color: #7c3aed;
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.2);
        }

        .resource-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: rgba(124, 58, 237, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 24px;
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
            <i class="fas fa-flag"></i>
            <h2>AI Scam Assistant</h2>
            <p>Report Scam System</p>
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
                <a href="statistics.php" class="nav-link">
                    <i class="fas fa-chart-line"></i>
                    <span>Statistics</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="report-scam.php" class="nav-link active">
                    <i class="fas fa-flag"></i>
                    <span>Report Scam</span>
                    <span class="badge">NEW</span>
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
            <p>Report System</p>
        </div>
    </nav>
    
    <!-- MAIN CONTENT -->
    <main class="main-content">
        <!-- HERO HEADER -->
        <section class="hero-header">
            <div class="header-text">
                <h1>Report Scam Incident</h1>
                <p class="tagline">
                    Help protect our community by reporting suspicious activities. 
                    Your report contributes to our scam intelligence database and helps prevent others from falling victim.
                </p>
            </div>
            <div class="header-icon">
                <i class="fas fa-flag"></i>
            </div>
        </section>
        
        <!-- STATS CARDS -->
        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-content">
                    <h4>Reports Today</h4>
                    <div class="stat-number" id="reportsToday">124</div>
                    <div class="stat-change">
                        <i class="fas fa-arrow-up"></i> +12 from yesterday
                    </div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="stat-content">
                    <h4>Cases Prevented</h4>
                    <div class="stat-number" id="casesPrevented">5,890</div>
                    <div class="stat-change">
                        <i class="fas fa-check-circle"></i> Based on user reports
                    </div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-content">
                    <h4>Avg Response</h4>
                    <div class="stat-number" id="avgResponse">2.4h</div>
                    <div class="stat-change">
                        <i class="fas fa-history"></i> Analysis time
                    </div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-percentage"></i>
                </div>
                <div class="stat-content">
                    <h4>Success Rate</h4>
                    <div class="stat-number" id="successRate">94%</div>
                    <div class="stat-change">
                        <i class="fas fa-chart-line"></i> Verified reports
                    </div>
                </div>
            </div>
        </section>
        
        <!-- PROGRESS STEPS -->
        <div class="progress-steps">
            <div class="step active" data-step="1">
                <div class="step-number">1</div>
                <div class="step-label">Scam Details</div>
            </div>
            <div class="step-connector"></div>
            <div class="step" data-step="2">
                <div class="step-number">2</div>
                <div class="step-label">Message Content</div>
            </div>
            <div class="step-connector"></div>
            <div class="step" data-step="3">
                <div class="step-number">3</div>
                <div class="step-label">Personal Info</div>
            </div>
            <div class="step-connector"></div>
            <div class="step" data-step="4">
                <div class="step-number">4</div>
                <div class="step-label">Review & Submit</div>
            </div>
        </div>
        
        <!-- REPORT FORM -->
        <form id="scamReportForm">
            <!-- SECTION 1: SCAM DETAILS -->
            <div class="form-section active" id="section1">
                <div class="section-title">
                    <i class="fas fa-exclamation-circle"></i>
                    <h3>What Happened?</h3>
                </div>
                <p class="section-subtitle">
                    Select the type of scam and platform where it occurred
                </p>
                
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-tag"></i> Scam Type
                        <span class="required">*</span>
                    </label>
                    <div class="option-group" id="scamTypeOptions">
                        <!-- Options will be populated by JavaScript -->
                    </div>
                    <div class="error-message" id="scamTypeError">Please select a scam type</div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-mobile-alt"></i> Platform
                        <span class="required">*</span>
                    </label>
                    <div class="option-group" id="platformOptions">
                        <!-- Options will be populated by JavaScript -->
                    </div>
                    <div class="error-message" id="platformError">Please select at least one platform</div>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-calendar"></i> Date of Incident
                            <span class="required">*</span>
                        </label>
                        <input type="date" id="incidentDate" required>
                        <div class="error-message" id="dateError">Please select a date</div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-clock"></i> Time of Incident
                        </label>
                        <input type="time" id="incidentTime">
                    </div>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-money-bill-wave"></i> Amount Involved (Optional)
                        </label>
                        <input type="number" id="amount" placeholder="0.00" min="0" step="0.01">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-coins"></i> Currency
                        </label>
                        <select id="currency">
                            <option value="MYR">MYR (RM)</option>
                            <option value="USD">USD ($)</option>
                            <option value="SGD">SGD (S$)</option>
                            <option value="EUR">EUR (€)</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-navigation">
                    <button type="button" class="nav-btn secondary" disabled>
                        <i class="fas fa-arrow-left"></i> Previous
                    </button>
                    <button type="button" class="nav-btn next-btn" onclick="validateSection1()">
                        Next <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            
            <!-- SECTION 2: MESSAGE CONTENT -->
            <div class="form-section" id="section2">
                <div class="section-title">
                    <i class="fas fa-comment-dots"></i>
                    <h3>Message Details</h3>
                </div>
                <p class="section-subtitle">
                    Paste the suspicious message and any scammer contact information
                </p>
                
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-envelope"></i> Message/Email Content
                        <span class="required">*</span>
                    </label>
                    <textarea id="messageContent" placeholder="Paste the suspicious message here... 
Example: 'Congratulations! You have won RM10,000. Click here to claim...'" 
required></textarea>
                    <div class="error-message" id="messageError">Please enter the scam message content</div>
                    <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                        <span id="charCount" style="color: #94a3b8; font-size: 13px;">0 characters</span>
                        <button type="button" id="analyzeBtn" style="
                            background: #06b6d4;
                            color: white;
                            border: none;
                            padding: 8px 16px;
                            border-radius: 8px;
                            cursor: pointer;
                            font-size: 13px;
                            display: flex;
                            align-items: center;
                            gap: 6px;
                            font-family: 'Poppins', sans-serif;
                        ">
                            <i class="fas fa-robot"></i> Analyze with AI
                        </button>
                    </div>
                </div>
                
                <!-- AI ANALYSIS RESULTS -->
                <div class="ai-analysis" id="aiAnalysis" style="display: none;">
                    <div class="analysis-header">
                        <i class="fas fa-brain"></i>
                        <h4>AI Analysis Results</h4>
                    </div>
                    
                    <div class="scam-meter">
                        <div class="meter-label">
                            <span>Scam Probability</span>
                            <span id="scamProbability">0%</span>
                        </div>
                        <div class="meter-bar">
                            <div class="meter-fill" id="scamMeter"></div>
                        </div>
                    </div>
                    
                    <div class="analysis-results" id="analysisResults">
                        <!-- Analysis results will be added here -->
                    </div>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-phone"></i> Scammer Phone (Optional)
                        </label>
                        <input type="text" id="scammerPhone" placeholder="Phone Number">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-envelope"></i> Scammer Email (Optional)
                        </label>
                        <input type="email" id="scammerEmail" placeholder="Email Address">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-camera"></i> Attachments (Optional)
                    </label>
                    <div class="file-upload-area" id="fileUploadArea">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <div class="file-upload-text">
                            <h4>Drag & Drop Screenshots</h4>
                            <p>Upload screenshots or images (Max 3 files, 5MB each)</p>
                        </div>
                        <input type="file" id="fileInput" accept="image/*" multiple style="display: none;">
                    </div>
                    <div class="file-preview-container" id="filePreview"></div>
                </div>
                
                <div class="form-navigation">
                    <button type="button" class="nav-btn secondary prev-btn" onclick="navigateToSection(1)">
                        <i class="fas fa-arrow-left"></i> Previous
                    </button>
                    <button type="button" class="nav-btn next-btn" onclick="validateSection2()">
                        Next <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            
            <!-- SECTION 3: PERSONAL INFO -->
            <div class="form-section" id="section3">
                <div class="section-title">
                    <i class="fas fa-user-circle"></i>
                    <h3>Your Information (Optional)</h3>
                </div>
                <p class="section-subtitle">
                    This information helps us analyze scam patterns. All data is anonymized.
                </p>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-map-marker-alt"></i> Location
                        </label>
                        <select id="location">
                            <option value="">Select State</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                            <option value="Johor">Johor</option>
                            <option value="Penang">Penang</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak">Sarawak</option>
                            <option value="Perak">Perak</option>
                            <option value="Pahang">Pahang</option>
                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                            <option value="Melaka">Melaka</option>
                            <option value="Terengganu">Terengganu</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Labuan">Labuan</option>
                            <option value="Putrajaya">Putrajaya</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user-clock"></i> Age Group
                        </label>
                        <select id="ageGroup">
                            <option value="">Select Age Group</option>
                            <option value="Under 18">Under 18</option>
                            <option value="18-25">18-25</option>
                            <option value="26-35">26-35</option>
                            <option value="36-45">36-45</option>
                            <option value="46-55">46-55</option>
                            <option value="56-65">56-65</option>
                            <option value="Over 65">Over 65</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-venus-mars"></i> Gender (Optional)
                    </label>
                    <div class="option-group" id="genderOptions">
                        <!-- Options will be populated by JavaScript -->
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="option-item" id="anonymousOption">
                        <div class="option-content">
                            <div class="option-icon">
                                <i class="fas fa-user-secret"></i>
                            </div>
                            <div class="option-text">
                                <h4>Report Anonymously</h4>
                                <p>Your personal information will not be stored</p>
                            </div>
                        </div>
                        <input type="checkbox" class="option-checkbox" id="anonymous" checked>
                    </div>
                </div>
                
                <div class="form-navigation">
                    <button type="button" class="nav-btn secondary prev-btn" onclick="navigateToSection(2)">
                        <i class="fas fa-arrow-left"></i> Previous
                    </button>
                    <button type="button" class="nav-btn next-btn" onclick="validateSection3()">
                        Next <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            
            <!-- SECTION 4: REVIEW & SUBMIT -->
            <div class="form-section" id="section4">
                <div class="section-title">
                    <i class="fas fa-check-circle"></i>
                    <h3>Review & Submit</h3>
                </div>
                <p class="section-subtitle">
                    Please review your report before submitting
                </p>
                
                <div class="review-summary" id="reviewSummary">
                    <!-- Summary will be populated by JavaScript -->
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-envelope"></i> Email for Updates (Optional)
                    </label>
                    <input type="email" id="userEmail" placeholder="your.email@example.com">
                    <p style="color: #94a3b8; font-size: 13px; margin-top: 8px;">
                        We'll only use this to send you a copy of your report
                    </p>
                </div>
                
                <div class="form-group">
                    <div class="option-item" id="consentOption" onclick="toggleConsent()" style="cursor: pointer;">
                        <div class="option-content">
                            <div class="option-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="option-text">
                                <h4>I agree to the terms</h4>
                                <p>I confirm this is a genuine scam report and agree to anonymized data sharing</p>
                            </div>
                        </div>
                        <input type="checkbox" class="option-checkbox" id="consent" required>
                    </div>
                    <div class="error-message" id="consentError">You must agree to the terms to submit</div>
                </div>
                
                <div class="form-navigation">
                    <button type="button" class="nav-btn secondary prev-btn" onclick="navigateToSection(3)">
                        <i class="fas fa-arrow-left"></i> Previous
                    </button>
                    <button type="button" class="nav-btn" id="submitReportBtn">
                        <i class="fas fa-paper-plane"></i> Submit Report
                    </button>
                </div>
            </div>
        </form>
        
        <!-- SUCCESS SECTION -->
        <div class="success-section" id="successSection">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            
            <div class="section-title" style="justify-content: center; margin-bottom: 20px;">
                <h3>Report Submitted Successfully!</h3>
            </div>
            
            <p class="section-subtitle" style="text-align: center;">
                Thank you for helping to protect our community. Your report has been added to our 
                threat intelligence database and will help prevent others from falling victim.
            </p>
            
            <div class="report-id">
                <h4>Your Report ID</h4>
                <div class="id-display" id="reportIdDisplay">SCAM-2025-XXXXXX</div>
                <p style="color: #c7d2fe; text-align: center; font-size: 14px;">
                    Save this ID for future reference. You can use it to track your report.
                </p>
            </div>
            
            <div class="form-navigation" style="justify-content: center; margin-top: 30px;">
                <button type="button" class="nav-btn secondary" onclick="printReport()">
                    <i class="fas fa-print"></i> Print Report
                </button>
                <a href="index.php" class="nav-btn secondary">
                    <i class="fas fa-home"></i> Back to Home
                </a>
            </div>
        </div>
        
        <!-- RECENT REPORTS SECTION -->
        <section class="recent-reports-section">
            <div class="section-title">
                <i class="fas fa-history"></i>
                <h3>Recent Reports</h3>
            </div>
            <p class="section-subtitle">
                Anonymous reports from our community
            </p>
            
            <div class="reports-grid" id="recentReports">
                <!-- Recent reports will be loaded by JavaScript -->
            </div>
        </section>
        
        <!-- RESOURCES SECTION -->
        <section class="resources-section">
            <div class="section-title">
                <i class="fas fa-life-ring"></i>
                <h3>Emergency Resources</h3>
            </div>
            <p class="section-subtitle">
                Immediate actions you can take if you've been scammed
            </p>
            
            <div class="resources-grid">
                <div class="resource-card">
                    <div class="resource-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h4 style="color: #f9fafb; margin-bottom: 10px; font-size: 16px;">Contact Your Bank</h4>
                    <p style="color: #c7d2fe; font-size: 13px; line-height: 1.5;">
                        Immediately call your bank's fraud department to freeze accounts if money was lost.
                    </p>
                </div>
                
                <div class="resource-card">
                    <div class="resource-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4 style="color: #f9fafb; margin-bottom: 10px; font-size: 16px;">Report to Authorities</h4>
                    <p style="color: #c7d2fe; font-size: 13px; line-height: 1.5;">
                        File a police report at your nearest station or through the PDRM portal.
                    </p>
                </div>
                
                <div class="resource-card">
                    <div class="resource-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h4 style="color: #f9fafb; margin-bottom: 10px; font-size: 16px;">Secure Accounts</h4>
                    <p style="color: #c7d2fe; font-size: 13px; line-height: 1.5;">
                        Change passwords and enable 2FA on all compromised accounts immediately.
                    </p>
                </div>
                
                <div class="resource-card">
                    <div class="resource-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4 style="color: #f9fafb; margin-bottom: 10px; font-size: 16px;">Get Support</h4>
                    <p style="color: #c7d2fe; font-size: 13px; line-height: 1.5;">
                        Contact CyberSecurity Malaysia at 1-300-88-2999 for professional assistance.
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
                    This AI tool provides reporting assistance only. In case of actual financial loss, 
                    immediately contact your bank and file a police report. Always use caution and verify 
                    suspicious messages through official channels before taking any action.
                </p>
            </div>
            
            <p class="copyright">
                © 2026 AI Scam & Digital Safety Assistant – Malaysian Scam Detection System<br>
                Report System | Protected by AI Security Protocols
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
                if (this.getAttribute('href') !== 'report-scam.php') {
                    e.preventDefault();
                    window.location.href = this.getAttribute('href');
                }
            });
        });
        
        // ========== INITIALIZATION ==========
        let formData = {
            scamType: '',
            platforms: [],
            incidentDate: '',
            incidentTime: '',
            amount: '',
            currency: 'MYR',
            messageContent: '',
            scammerPhone: '',
            scammerEmail: '',
            location: '',
            ageGroup: '',
            gender: '',
            anonymous: true,
            userEmail: '',
            consent: false
        };
        
        document.addEventListener('DOMContentLoaded', function() {
            initializePage();
            loadRecentReports();
            updateStatistics();
            
            // Set default date to today
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('incidentDate').value = today;
            document.getElementById('incidentDate').max = today;
            
            // Auto-save form data
            setInterval(saveFormData, 30000);
            
            // Load saved form data if exists
            loadSavedFormData();
        });
        
        // ========== PAGE INITIALIZATION ==========
        function initializePage() {
            // Animate statistics counters
            animateCounters();
            
            // Form navigation
            setupFormNavigation();
            
            // Option selection
            setupOptionSelection();
            
            // File upload
            setupFileUpload();
            
            // AI analysis
            setupAIAnalysis();
            
            // Form submission
            setupFormSubmission();
            
            // Character counter
            setupCharacterCounter();
            
            // Consent checkbox
            setupConsentCheckbox();
            
            // Populate options
            populateOptions();
        }
        
        // ========== ANIMATE COUNTERS ==========
        function animateCounters() {
            const counters = [
                { element: document.getElementById('reportsToday'), target: 124, duration: 2000 },
                { element: document.getElementById('casesPrevented'), target: 5890, duration: 2500 },
                { element: document.getElementById('avgResponse'), target: 2.4, duration: 1800, isDecimal: true },
                { element: document.getElementById('successRate'), target: 94, duration: 1500 }
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
                        counter.element.textContent = current.toFixed(1);
                    } else {
                        counter.element.textContent = Math.floor(current).toLocaleString();
                    }
                }, 16);
            });
        }
        
        // ========== POPULATE OPTIONS ==========
        function populateOptions() {
            // Scam Type Options
            const scamTypes = [
                { value: 'banking', icon: 'fas fa-university', label: 'Banking/Financial', description: 'Fake bank alerts, OTP requests' },
                { value: 'investment', icon: 'fas fa-chart-line', label: 'Investment Scam', description: 'Crypto, forex, Ponzi schemes' },
                { value: 'romance', icon: 'fas fa-heart', label: 'Romance Scam', description: 'Fake relationships for money' },
                { value: 'tech', icon: 'fas fa-laptop', label: 'Tech Support', description: 'Fake virus alerts, remote access' },
                { value: 'ecommerce', icon: 'fas fa-shopping-cart', label: 'E-commerce Fraud', description: 'Fake online stores, products' },
                { value: 'other', icon: 'fas fa-question-circle', label: 'Other', description: 'Other types of scams' }
            ];
            
            const scamTypeContainer = document.getElementById('scamTypeOptions');
            scamTypes.forEach(type => {
                const option = createOptionElement('scamType', type.value, type.icon, type.label, type.description);
                scamTypeContainer.appendChild(option);
            });
            
            // Platform Options
            const platforms = [
                { value: 'whatsapp', icon: 'fab fa-whatsapp', label: 'WhatsApp', description: 'Messages, calls, groups' },
                { value: 'sms', icon: 'fas fa-sms', label: 'SMS', description: 'Text messages' },
                { value: 'phone', icon: 'fas fa-phone', label: 'Phone Call', description: 'Voice calls' },
                { value: 'email', icon: 'fas fa-envelope', label: 'Email', description: 'Email messages' },
                { value: 'facebook', icon: 'fab fa-facebook', label: 'Facebook', description: 'FB messages, Marketplace' }
            ];
            
            const platformContainer = document.getElementById('platformOptions');
            platforms.forEach(platform => {
                const option = createOptionElement('platform', platform.value, platform.icon, platform.label, platform.description);
                platformContainer.appendChild(option);
            });
            
            // Gender Options
            const genders = [
                { value: 'male', icon: 'fas fa-mars', label: 'Male', description: '' },
                { value: 'female', icon: 'fas fa-venus', label: 'Female', description: '' },
                { value: 'other_gender', icon: 'fas fa-transgender', label: 'Other', description: '' },
                { value: 'prefer_not', icon: 'fas fa-user-secret', label: 'Prefer not to say', description: '' }
            ];
            
            const genderContainer = document.getElementById('genderOptions');
            genders.forEach(gender => {
                const option = createOptionElement('gender', gender.value, gender.icon, gender.label, gender.description);
                genderContainer.appendChild(option);
            });
        }
        
        function createOptionElement(group, value, icon, label, description) {
            const div = document.createElement('div');
            div.className = 'option-item';
            div.dataset.group = group;
            div.dataset.value = value;
            div.innerHTML = `
                <div class="option-content">
                    <div class="option-icon">
                        <i class="${icon}"></i>
                    </div>
                    <div class="option-text">
                        <h4>${label}</h4>
                        ${description ? `<p>${description}</p>` : ''}
                    </div>
                </div>
                <input type="${group === 'platform' ? 'checkbox' : 'radio'}" class="option-checkbox" name="${group}" value="${value}">
            `;
            return div;
        }
        
        // ========== FORM NAVIGATION ==========
        function setupFormNavigation() {
            // Setup navigation button listeners
            document.querySelectorAll('.next-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const currentSection = getCurrentSection();
                    const validateFunction = window['validateSection' + currentSection];
                    if (validateFunction && validateFunction()) {
                        navigateToSection(currentSection + 1);
                    }
                });
            });
            
            document.querySelectorAll('.prev-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const currentSection = getCurrentSection();
                    navigateToSection(currentSection - 1);
                });
            });
        }
        
        function getCurrentSection() {
            const activeSection = document.querySelector('.form-section.active');
            return parseInt(activeSection.id.replace('section', ''));
        }
        
        function navigateToSection(sectionNumber) {
            // Validate section number
            if (sectionNumber < 1) sectionNumber = 1;
            if (sectionNumber > 4) sectionNumber = 4;
            
            // Hide all sections
            document.querySelectorAll('.form-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Show target section
            const targetSection = document.getElementById(`section${sectionNumber}`);
            if (targetSection) {
                targetSection.classList.add('active');
                
                // Update progress steps
                updateProgressSteps(sectionNumber);
                
                // Save form data
                saveFormData();
                
                // Update review summary if going to section 4
                if (sectionNumber === 4) {
                    updateReviewSummary();
                }
                
                // Scroll to top of section
                targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
        
        function updateProgressSteps(currentStep) {
            document.querySelectorAll('.step').forEach(step => {
                step.classList.remove('active');
                const stepNumber = parseInt(step.getAttribute('data-step'));
                if (stepNumber <= currentStep) {
                    step.classList.add('active');
                }
            });
        }
        
        // ========== OPTION SELECTION ==========
        function setupOptionSelection() {
            document.addEventListener('click', function(e) {
                const optionItem = e.target.closest('.option-item');
                if (optionItem && !optionItem.id) {
                    const group = optionItem.dataset.group;
                    const value = optionItem.dataset.value;
                    const checkbox = optionItem.querySelector('.option-checkbox');
                    
                    // For radio groups, unselect all in same group
                    if (group === 'scamType' || group === 'gender') {
                        document.querySelectorAll(`.option-item[data-group="${group}"]`).forEach(item => {
                            item.classList.remove('selected');
                            item.querySelector('.option-checkbox').checked = false;
                        });
                    }
                    
                    // Toggle selection
                    optionItem.classList.toggle('selected');
                    checkbox.checked = !checkbox.checked;
                    
                    // Update form data
                    if (group === 'scamType') {
                        formData.scamType = checkbox.checked ? value : '';
                    } else if (group === 'gender') {
                        formData.gender = checkbox.checked ? value : '';
                    } else if (group === 'platform') {
                        if (checkbox.checked) {
                            if (!formData.platforms.includes(value)) {
                                formData.platforms.push(value);
                            }
                        } else {
                            formData.platforms = formData.platforms.filter(p => p !== value);
                        }
                    }
                    
                    // Hide error messages when selection is made
                    hideError(optionItem.closest('.form-group').querySelector('.error-message'));
                }
                
                // Handle special options
                if (optionItem && optionItem.id === 'anonymousOption') {
                    const checkbox = optionItem.querySelector('.option-checkbox');
                    checkbox.checked = !checkbox.checked;
                    optionItem.classList.toggle('selected', checkbox.checked);
                    formData.anonymous = checkbox.checked;
                }
            });
        }
        
        function setupConsentCheckbox() {
            const consentOption = document.getElementById('consentOption');
            consentOption.addEventListener('click', function() {
                const checkbox = this.querySelector('.option-checkbox');
                checkbox.checked = !checkbox.checked;
                this.classList.toggle('selected', checkbox.checked);
                formData.consent = checkbox.checked;
                hideError(document.getElementById('consentError'));
            });
        }
        
        // ========== FORM VALIDATION ==========
        function validateSection1() {
            let isValid = true;
            
            // Validate scam type
            if (!formData.scamType) {
                showError('scamTypeError');
                isValid = false;
            } else {
                hideError('scamTypeError');
            }
            
            // Validate platform
            if (formData.platforms.length === 0) {
                showError('platformError');
                isValid = false;
            } else {
                hideError('platformError');
            }
            
            // Validate date
            const dateInput = document.getElementById('incidentDate');
            if (!dateInput.value) {
                showError('dateError');
                isValid = false;
            } else {
                hideError('dateError');
                formData.incidentDate = dateInput.value;
            }
            
            if (isValid) {
                // Get other form data
                formData.incidentTime = document.getElementById('incidentTime').value;
                formData.amount = document.getElementById('amount').value;
                formData.currency = document.getElementById('currency').value;
            } else {
                // Scroll to first error
                const firstError = document.querySelector('.error-message:not([style*="display: none"])');
                if (firstError) {
                    firstError.closest('.form-group').scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'center' 
                    });
                }
            }
            
            return isValid;
        }
        
        function validateSection2() {
            let isValid = true;
            
            // Validate message content
            const messageContent = document.getElementById('messageContent').value;
            if (!messageContent || messageContent.trim().length < 10) {
                showError('messageError');
                isValid = false;
            } else {
                hideError('messageError');
                formData.messageContent = messageContent;
            }
            
            // Get other form data
            formData.scammerPhone = document.getElementById('scammerPhone').value;
            formData.scammerEmail = document.getElementById('scammerEmail').value;
            
            if (isValid) {
                return true;
            } else {
                document.getElementById('messageContent').focus();
                return false;
            }
        }
        
        function validateSection3() {
            // Get form data
            formData.location = document.getElementById('location').value;
            formData.ageGroup = document.getElementById('ageGroup').value;
            formData.anonymous = document.getElementById('anonymous').checked;
            return true;
        }
        
        function showError(errorId) {
            const errorElement = document.getElementById(errorId);
            if (errorElement) {
                errorElement.style.display = 'block';
            }
        }
        
        function hideError(errorId) {
            const errorElement = document.getElementById(errorId);
            if (errorElement) {
                errorElement.style.display = 'none';
            }
        }
        
        // ========== FILE UPLOAD ==========
        function setupFileUpload() {
            const fileInput = document.getElementById('fileInput');
            const fileUploadArea = document.getElementById('fileUploadArea');
            const filePreview = document.getElementById('filePreview');
            
            // Click on upload area
            fileUploadArea.addEventListener('click', () => fileInput.click());
            
            // Drag and drop
            fileUploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                fileUploadArea.style.borderColor = '#7c3aed';
                fileUploadArea.style.background = 'rgba(124, 58, 237, 0.1)';
            });
            
            fileUploadArea.addEventListener('dragleave', () => {
                fileUploadArea.style.borderColor = '';
                fileUploadArea.style.background = '';
            });
            
            fileUploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                fileUploadArea.style.borderColor = '';
                fileUploadArea.style.background = '';
                
                const files = e.dataTransfer.files;
                handleFiles(files);
            });
            
            // File input change
            fileInput.addEventListener('change', (e) => {
                handleFiles(e.target.files);
            });
            
            function handleFiles(files) {
                const maxFiles = 3;
                const maxSize = 5 * 1024 * 1024; // 5MB
                
                // Clear existing preview if adding new files
                if (fileInput.files.length === 0) {
                    filePreview.innerHTML = '';
                }
                
                for (let i = 0; i < Math.min(files.length, maxFiles); i++) {
                    const file = files[i];
                    
                    // Check file size
                    if (file.size > maxSize) {
                        alert(`File ${file.name} is too large. Maximum size is 5MB.`);
                        continue;
                    }
                    
                    // Check file type
                    if (!file.type.startsWith('image/')) {
                        alert(`File ${file.name} is not an image.`);
                        continue;
                    }
                    
                    // Create preview
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.createElement('div');
                        preview.className = 'file-preview';
                        preview.innerHTML = `
                            <img src="${e.target.result}" alt="Preview">
                            <div class="remove-file" onclick="removeFile(this)">
                                <i class="fas fa-times"></i>
                            </div>
                        `;
                        filePreview.appendChild(preview);
                    };
                    reader.readAsDataURL(file);
                }
                
                // Reset file input
                fileInput.value = '';
            }
        }
        
        function removeFile(button) {
            const preview = button.closest('.file-preview');
            preview.remove();
        }
        
        // ========== AI ANALYSIS ==========
        function setupAIAnalysis() {
            const messageContent = document.getElementById('messageContent');
            const analyzeBtn = document.getElementById('analyzeBtn');
            
            // Analyze button click
            analyzeBtn.addEventListener('click', analyzeMessageContent);
            
            // Auto-analyze on input (with debounce)
            let analyzeTimeout;
            messageContent.addEventListener('input', () => {
                clearTimeout(analyzeTimeout);
                analyzeTimeout = setTimeout(analyzeMessageContent, 1000);
            });
        }
        
        function analyzeMessageContent() {
            const message = document.getElementById('messageContent').value;
            if (!message || message.length < 10) {
                document.getElementById('aiAnalysis').style.display = 'none';
                return;
            }
            
            // Show analysis section
            document.getElementById('aiAnalysis').style.display = 'block';
            
            // Calculate scam probability
            let probability = calculateScamProbability(message);
            
            // Update scam meter
            document.getElementById('scamProbability').textContent = probability + '%';
            document.getElementById('scamMeter').style.width = probability + '%';
            
            // Generate analysis results
            const analysisResults = generateAnalysisResults(message, probability);
            document.getElementById('analysisResults').innerHTML = analysisResults;
            
            // Animate results
            setTimeout(() => {
                document.getElementById('scamMeter').style.transition = 'width 1s ease';
            }, 100);
        }
        
        function calculateScamProbability(message) {
            let score = 0;
            const lowerMessage = message.toLowerCase();
            
            // Scam indicators with weights
            const indicators = [
                { pattern: /(win|won|winner|prize|reward)/gi, weight: 15 },
                { pattern: /(urgent|immediate|act now|limited time)/gi, weight: 20 },
                { pattern: /(click|link|http|https|\.com|\.my)/gi, weight: 10 },
                { pattern: /(password|otp|pin|security code)/gi, weight: 25 },
                { pattern: /(bank|account|suspend|block|freeze)/gi, weight: 20 },
                { pattern: /(money|transfer|payment|fee|charge)/gi, weight: 15 },
                { pattern: /(dear|congrat|tahniah|selamat)/gi, weight: 5 },
                { pattern: /(!{2,}|\?{2,})/g, weight: 10 }, // Multiple ! or ?
                { pattern: /\b(free|gratis|percuma)\b/gi, weight: 10 },
                { pattern: /\b(guarantee|jamin|100%)/gi, weight: 15 }
            ];
            
            // Calculate score
            indicators.forEach(indicator => {
                const matches = lowerMessage.match(indicator.pattern);
                if (matches) {
                    score += Math.min(indicator.weight * matches.length, indicator.weight * 3);
                }
            });
            
            // Additional factors
            if (message.length > 500) score += 5; // Long messages
            if (message.includes('RM') || message.includes('$')) score += 10; // Money mentioned
            
            // Cap score at 95%
            probability = Math.min(95, Math.max(5, score));
            
            return Math.round(probability);
        }
        
        function generateAnalysisResults(message, probability) {
            const lowerMessage = message.toLowerCase();
            let results = [];
            
            // Detect scam type
            let scamType = 'Unknown';
            if (lowerMessage.includes('bank') || lowerMessage.includes('account')) {
                scamType = 'Banking/Financial';
            } else if (lowerMessage.includes('invest') || lowerMessage.includes('crypto')) {
                scamType = 'Investment';
            } else if (lowerMessage.includes('love') || lowerMessage.includes('dear')) {
                scamType = 'Romance';
            } else if (lowerMessage.includes('win') || lowerMessage.includes('prize')) {
                scamType = 'Lottery/Prize';
            }
            
            // Detect urgency level
            let urgency = 'Low';
            if (lowerMessage.includes('urgent') || lowerMessage.includes('immediate')) {
                urgency = 'High';
            } else if (lowerMessage.includes('today') || lowerMessage.includes('now')) {
                urgency = 'Medium';
            }
            
            // Risk level
            let riskLevel = 'Low Risk';
            let riskIcon = 'fas fa-check-circle';
            let riskClass = 'info';
            
            if (probability >= 70) {
                riskLevel = 'Critical Risk';
                riskIcon = 'fas fa-radiation';
                riskClass = 'critical';
            } else if (probability >= 40) {
                riskLevel = 'High Risk';
                riskIcon = 'fas fa-exclamation-triangle';
                riskClass = 'warning';
            }
            
            results.push(`
                <div class="analysis-item ${riskClass}">
                    <i class="${riskIcon}"></i>
                    <h4 style="color: #f9fafb; margin: 8px 0 5px; font-size: 14px;">${riskLevel}</h4>
                    <p style="color: #c7d2fe; font-size: 12px;">${probability}% scam probability</p>
                </div>
            `);
            
            results.push(`
                <div class="analysis-item info">
                    <i class="fas fa-tag"></i>
                    <h4 style="color: #f9fafb; margin: 8px 0 5px; font-size: 14px;">${scamType}</h4>
                    <p style="color: #c7d2fe; font-size: 12px;">Likely scam type</p>
                </div>
            `);
            
            results.push(`
                <div class="analysis-item ${urgency === 'High' ? 'warning' : 'info'}">
                    <i class="fas fa-clock"></i>
                    <h4 style="color: #f9fafb; margin: 8px 0 5px; font-size: 14px;">${urgency} Urgency</h4>
                    <p style="color: #c7d2fe; font-size: 12px;">Pressure tactics detected</p>
                </div>
            `);
            
            results.push(`
                <div class="analysis-item info">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h4 style="color: #f9fafb; margin: 8px 0 5px; font-size: 14px;">Red Flags</h4>
                    <p style="color: #c7d2fe; font-size: 12px;">Multiple indicators found</p>
                </div>
            `);
            
            return results.join('');
        }
        
        // ========== CHARACTER COUNTER ==========
        function setupCharacterCounter() {
            const messageContent = document.getElementById('messageContent');
            const charCount = document.getElementById('charCount');
            
            messageContent.addEventListener('input', function() {
                const length = this.value.length;
                charCount.textContent = length + ' characters';
                
                if (length > 1000) {
                    charCount.style.color = '#f59e0b';
                } else if (length > 2000) {
                    charCount.style.color = '#ef4444';
                } else {
                    charCount.style.color = '#94a3b8';
                }
            });
        }
        
        // ========== REVIEW SUMMARY ==========
        function updateReviewSummary() {
            const summaryContainer = document.getElementById('reviewSummary');
            
            // Format scam type
            const scamTypeLabels = {
                banking: 'Banking/Financial',
                investment: 'Investment Scam',
                romance: 'Romance Scam',
                tech: 'Tech Support',
                ecommerce: 'E-commerce Fraud',
                other: 'Other'
            };
            
            const scamType = scamTypeLabels[formData.scamType] || 'Not specified';
            
            // Format platforms
            const platformLabels = {
                whatsapp: 'WhatsApp',
                sms: 'SMS',
                phone: 'Phone Call',
                email: 'Email',
                facebook: 'Facebook'
            };
            
            const platforms = formData.platforms.map(p => platformLabels[p] || p).join(', ') || 'Not specified';
            
            // Format amount
            let amountText = 'Not specified';
            if (formData.amount) {
                const currencySymbols = {
                    MYR: 'RM',
                    USD: '$',
                    SGD: 'S$',
                    EUR: '€'
                };
                amountText = `${currencySymbols[formData.currency] || formData.currency} ${parseFloat(formData.amount).toFixed(2)}`;
            }
            
            // Format date and time
            let dateTimeText = formData.incidentDate;
            if (formData.incidentTime) {
                dateTimeText += ` at ${formData.incidentTime}`;
            }
            
            // Create summary HTML
            const summaryHTML = `
                <div class="summary-item">
                    <span class="summary-label">Scam Type:</span>
                    <span class="summary-value">${scamType}</span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">Platforms:</span>
                    <span class="summary-value">${platforms}</span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">Date & Time:</span>
                    <span class="summary-value">${dateTimeText}</span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">Amount Involved:</span>
                    <span class="summary-value">${amountText}</span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">Location:</span>
                    <span class="summary-value">${formData.location || 'Not specified'}</span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">Age Group:</span>
                    <span class="summary-value">${formData.ageGroup || 'Not specified'}</span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">Report Mode:</span>
                    <span class="summary-value">${formData.anonymous ? 'Anonymous' : 'With Personal Info'}</span>
                </div>
            `;
            
            summaryContainer.innerHTML = summaryHTML;
            
            // Update email field
            document.getElementById('userEmail').value = formData.userEmail || '';
        }
        
        // ========== FORM SUBMISSION ==========
        function setupFormSubmission() {
            const form = document.getElementById('scamReportForm');
            const submitBtn = document.getElementById('submitReportBtn');
            
            submitBtn.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Get email
                formData.userEmail = document.getElementById('userEmail').value;
                
                // Validate consent
                if (!formData.consent) {
                    showError('consentError');
                    document.getElementById('consentOption').scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return;
                }
                
                // Show loading state
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
                submitBtn.disabled = true;
                
                // Simulate API call
                setTimeout(() => {
                    // Save report to localStorage
                    saveReportToStorage();
                    
                    // Show success section
                    document.querySelectorAll('.form-section').forEach(section => {
                        section.style.display = 'none';
                    });
                    document.getElementById('successSection').classList.add('active');
                    
                    // Generate report ID
                    generateReportID();
                    
                    // Update recent reports
                    loadRecentReports();
                    
                    // Update statistics
                    updateStatistics();
                    
                    // Reset button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    
                    // Scroll to success section
                    document.getElementById('successSection').scrollIntoView({ behavior: 'smooth' });
                    
                    // Clear form data from localStorage
                    localStorage.removeItem('scamReportFormData');
                    
                    // Reset form data
                    resetFormData();
                }, 1500);
            });
        }
        
        function resetFormData() {
            formData = {
                scamType: '',
                platforms: [],
                incidentDate: '',
                incidentTime: '',
                amount: '',
                currency: 'MYR',
                messageContent: '',
                scammerPhone: '',
                scammerEmail: '',
                location: '',
                ageGroup: '',
                gender: '',
                anonymous: true,
                userEmail: '',
                consent: false
            };
            
            // Reset form fields
            document.getElementById('scamReportForm').reset();
            document.getElementById('filePreview').innerHTML = '';
            document.getElementById('aiAnalysis').style.display = 'none';
            document.querySelectorAll('.option-item.selected').forEach(item => {
                item.classList.remove('selected');
            });
            document.getElementById('anonymousOption').classList.add('selected');
            document.getElementById('anonymous').checked = true;
            
            // Set default date
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('incidentDate').value = today;
            
            // Navigate back to section 1
            navigateToSection(1);
        }
        
        function saveReportToStorage() {
            // Add timestamp
            const report = {
                ...formData,
                id: generateRandomID(),
                timestamp: new Date().toISOString(),
                aiAnalysis: {
                    probability: calculateScamProbability(formData.messageContent),
                    timestamp: new Date().toISOString()
                }
            };
            
            // Get existing reports from localStorage
            let reports = JSON.parse(localStorage.getItem('scamReports')) || [];
            
            // Add new report
            reports.unshift(report);
            
            // Keep only last 50 reports
            if (reports.length > 50) {
                reports = reports.slice(0, 50);
            }
            
            // Save to localStorage
            localStorage.setItem('scamReports', JSON.stringify(reports));
        }
        
        function generateRandomID() {
            return 'SCAM-' + Date.now().toString(36) + Math.random().toString(36).substr(2, 6).toUpperCase();
        }
        
        function generateReportID() {
            const reportId = generateRandomID();
            document.getElementById('reportIdDisplay').textContent = reportId;
        }
        
        // ========== FORM DATA PERSISTENCE ==========
        function saveFormData() {
            // Save to localStorage
            localStorage.setItem('scamReportFormData', JSON.stringify({
                ...formData,
                currentSection: getCurrentSection()
            }));
        }
        
        function loadSavedFormData() {
            const savedData = localStorage.getItem('scamReportFormData');
            if (!savedData) return;
            
            try {
                const savedFormData = JSON.parse(savedData);
                
                // Restore form data
                Object.assign(formData, savedFormData);
                
                // Restore form fields
                if (savedFormData.currentSection) {
                    navigateToSection(savedFormData.currentSection);
                }
            } catch (e) {
                console.error('Error loading saved form data:', e);
            }
        }
        
        // ========== RECENT REPORTS ==========
        function loadRecentReports() {
            const reports = JSON.parse(localStorage.getItem('scamReports')) || [];
            const container = document.getElementById('recentReports');
            
            if (reports.length === 0) {
                // Show sample reports
                displaySampleReports(container);
                return;
            }
            
            container.innerHTML = '';
            const recentReports = reports.slice(0, 4); // Show 4 most recent
            
            recentReports.forEach(report => {
                const reportCard = createReportCard(report);
                container.appendChild(reportCard);
            });
        }
        
        function createReportCard(report) {
            const div = document.createElement('div');
            div.className = 'report-card';
            
            // Format date
            const date = new Date(report.timestamp);
            const timeAgo = getTimeAgo(date);
            
            // Get scam type label
            const scamTypeLabels = {
                banking: 'Banking',
                investment: 'Investment',
                romance: 'Romance',
                tech: 'Tech Support',
                ecommerce: 'E-commerce',
                other: 'Other'
            };
            
            const scamType = scamTypeLabels[report.scamType] || 'Unknown';
            
            // Get first platform
            const platform = report.platforms && report.platforms.length > 0 ? report.platforms[0] : 'Unknown';
            
            // Truncate message
            const message = report.messageContent ? 
                report.messageContent.substring(0, 120) + (report.messageContent.length > 120 ? '...' : '') : 
                'No message provided';
            
            div.innerHTML = `
                <div class="report-header">
                    <span class="report-type ${report.scamType}">${scamType}</span>
                    <span class="report-time">${timeAgo}</span>
                </div>
                <p class="report-content">${message}</p>
                <div class="report-platforms">
                    <span class="platform-tag">${platform}</span>
                    ${report.location ? `<span class="platform-tag">${report.location}</span>` : ''}
                </div>
            `;
            
            return div;
        }
        
        function getTimeAgo(date) {
            const now = new Date();
            const diff = now - date;
            
            const minutes = Math.floor(diff / 60000);
            const hours = Math.floor(diff / 3600000);
            const days = Math.floor(diff / 86400000);
            
            if (minutes < 60) {
                return `${minutes}m ago`;
            } else if (hours < 24) {
                return `${hours}h ago`;
            } else {
                return `${days}d ago`;
            }
        }
        
        function displaySampleReports(container) {
            const sampleReports = [
                {
                    scamType: 'banking',
                    messageContent: 'URGENT: Your Maybank account will be suspended. Click link to verify...',
                    platforms: ['whatsapp'],
                    location: 'Selangor',
                    timestamp: new Date(Date.now() - 2 * 3600000).toISOString()
                },
                {
                    scamType: 'investment',
                    messageContent: 'Earn 5% daily returns with our crypto investment platform. Limited slots...',
                    platforms: ['telegram'],
                    location: 'Kuala Lumpur',
                    timestamp: new Date(Date.now() - 5 * 3600000).toISOString()
                },
                {
                    scamType: 'romance',
                    messageContent: 'Hello dear, I need help with hospital bills. Can you send me RM500?',
                    platforms: ['facebook'],
                    location: 'Johor',
                    timestamp: new Date(Date.now() - 1 * 86400000).toISOString()
                },
                {
                    scamType: 'tech',
                    messageContent: 'Microsoft Windows Support: Your computer has virus. Call 1-800-XXX-XXXX',
                    platforms: ['phone'],
                    location: 'Penang',
                    timestamp: new Date(Date.now() - 3 * 86400000).toISOString()
                }
            ];
            
            sampleReports.forEach(report => {
                const reportCard = createReportCard(report);
                container.appendChild(reportCard);
            });
        }
        
        // ========== STATISTICS UPDATE ==========
        function updateStatistics() {
            const reports = JSON.parse(localStorage.getItem('scamReports')) || [];
            const today = new Date().toDateString();
            const todayReports = reports.filter(report => 
                new Date(report.timestamp).toDateString() === today
            ).length;
            
            // Update today's reports counter
            document.getElementById('reportsToday').textContent = (124 + todayReports).toLocaleString();
        }
        
        // ========== SUCCESS FUNCTIONS ==========
        function printReport() {
            const reportId = document.getElementById('reportIdDisplay').textContent;
            const printContent = `
                <html>
                <head>
                    <title>Scam Report - ${reportId}</title>
                    <style>
                        body { font-family: Arial, sans-serif; padding: 20px; }
                        .header { text-align: center; border-bottom: 2px solid #333; padding-bottom: 20px; margin-bottom: 30px; }
                        .report-id { font-size: 24px; color: #dc2626; font-weight: bold; margin: 20px 0; }
                        .section { margin-bottom: 30px; }
                        .section h3 { color: #333; border-bottom: 1px solid #ccc; padding-bottom: 10px; }
                        .timestamp { color: #666; font-size: 14px; }
                        .footer { margin-top: 50px; text-align: center; color: #666; font-size: 12px; border-top: 1px solid #ccc; padding-top: 20px; }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h1>Scam Report Confirmation</h1>
                        <div class="report-id">Report ID: ${reportId}</div>
                        <div class="timestamp">Submitted: ${new Date().toLocaleString()}</div>
                    </div>
                    
                    <div class="section">
                        <h3>What to Do Next</h3>
                        <ol>
                            <li>Contact your bank immediately if money was involved</li>
                            <li>File a police report at your nearest station</li>
                            <li>Report to CyberSecurity Malaysia at 1-300-88-2999</li>
                            <li>Change passwords on affected accounts</li>
                            <li>Monitor your bank statements regularly</li>
                        </ol>
                    </div>
                    
                    <div class="section">
                        <h3>Emergency Contacts</h3>
                        <ul>
                            <li>Police Emergency: 999</li>
                            <li>CyberSecurity Malaysia: 1-300-88-2999</li>
                            <li>Bank Negara Fraud Hotline: 1-300-88-5465</li>
                            <li>MCMC Complaints: 1-800-88-2363</li>
                        </ul>
                    </div>
                    
                    <div class="footer">
                        <p>This report has been added to the AI Scam Assistant database.</p>
                        <p>Your contribution helps protect others from similar scams.</p>
                        <p>Thank you for making the internet safer!</p>
                    </div>
                </body>
                </html>
            `;
            
            const printWindow = window.open('', '_blank');
            printWindow.document.write(printContent);
            printWindow.document.close();
            printWindow.print();
        }
        
        function toggleConsent() {
            const consentCheckbox = document.getElementById('consent');
            const consentOption = document.getElementById('consentOption');
            
            // Toggle checkbox
            consentCheckbox.checked = !consentCheckbox.checked;
            
            // Update visual
            consentOption.classList.toggle('selected', consentCheckbox.checked);
            
            // Update form data
            formData.consent = consentCheckbox.checked;
            
            // Hide error
            hideError('consentError');
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