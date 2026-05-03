<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Settings - AI Scam Assistant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Color Picker CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/monolith.min.css">
    
    <style>
        /* ========== RESET & BASE ========== */
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
        }
        
        :root {
            --primary: #8b5cf6;
            --secondary: #7c3aed;
            --accent: #06b6d4;
            --danger: #ef4444;
            --success: #22c55e;
            --warning: #f59e0b;
            --dark: #0f172a;
            --darker: #020617;
            --light: #e2e8f0;
            --card-bg: rgba(30, 27, 75, 0.9);
            --sidebar-bg: rgba(15, 23, 42, 0.95);
            --glow: 0 0 30px rgba(139, 92, 246, 0.4);
            
            /* Theme Variables */
            --theme-primary: #8b5cf6;
            --theme-secondary: #7c3aed;
            --theme-accent: #06b6d4;
            --theme-bg: #0f172a;
            --theme-card: rgba(30, 27, 75, 0.9);
            --theme-text: #e2e8f0;
            --theme-text-secondary: #94a3b8;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--theme-bg);
            color: var(--theme-text);
            line-height: 1.6;
            min-height: 100vh;
            overflow-x: hidden;
            transition: background 0.3s ease, color 0.3s ease;
        }

        /* ========== HORIZONTAL NAVBAR (TOP) ========== */
        .top-navbar {
            background: linear-gradient(145deg, var(--sidebar-bg), rgba(2, 6, 23, 0.97));
            backdrop-filter: blur(20px);
            border-bottom: 3px solid var(--theme-primary);
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
            background: linear-gradient(135deg, var(--theme-primary), var(--theme-accent));
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
            background: linear-gradient(90deg, var(--theme-primary), var(--theme-accent));
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
            background: rgba(139, 92, 246, 0.1);
            border: 2px solid transparent;
        }

        .nav-link:hover {
            background: rgba(139, 92, 246, 0.2);
            color: var(--theme-text);
            transform: translateY(-3px);
            border-color: var(--theme-primary);
            box-shadow: 0 8px 20px rgba(139, 92, 246, 0.3);
        }

        .nav-link.active {
            background: linear-gradient(135deg, var(--theme-primary), var(--theme-secondary));
            color: white;
            border-color: var(--theme-primary);
            box-shadow: var(--glow);
        }

        .nav-link i {
            font-size: 18px;
        }

        .nav-badge {
            background: var(--theme-primary);
            color: white;
            font-size: 10px;
            padding: 3px 8px;
            border-radius: 10px;
            margin-left: 5px;
            font-weight: 800;
        }

        /* ========== SETTINGS LAYOUT ========== */
        .settings-container {
            max-width: 1400px;
            margin: 120px auto 40px;
            padding: 0 30px;
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 30px;
        }

        /* ========== SETTINGS SIDEBAR ========== */
        .settings-sidebar {
            background: linear-gradient(145deg, var(--sidebar-bg), rgba(2, 6, 23, 0.97));
            border-radius: 25px;
            padding: 30px;
            border: 2px solid rgba(139, 92, 246, 0.3);
            position: sticky;
            top: 140px;
            height: calc(100vh - 180px);
            overflow-y: auto;
        }

        .profile-card {
            text-align: center;
            padding-bottom: 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 30px;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 20px;
            border: 4px solid var(--theme-primary);
            padding: 5px;
            background: linear-gradient(145deg, var(--theme-primary), var(--theme-accent));
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            background: var(--theme-card);
        }

        .profile-avatar:hover::after {
            content: 'Change';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
        }

        .profile-name {
            font-size: 22px;
            font-weight: 800;
            color: var(--theme-text);
            margin-bottom: 8px;
        }

        .profile-email {
            color: var(--theme-text-secondary);
            font-size: 14px;
            margin-bottom: 15px;
        }

        .profile-stats {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 20px;
            font-weight: 800;
            color: var(--theme-primary);
        }

        .stat-label {
            font-size: 12px;
            color: var(--theme-text-secondary);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar-nav {
            list-style: none;
        }

        .sidebar-item {
            margin-bottom: 10px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 18px 20px;
            color: var(--theme-text-secondary);
            text-decoration: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .sidebar-link:hover {
            background: rgba(139, 92, 246, 0.1);
            color: var(--theme-text);
            transform: translateX(5px);
        }

        .sidebar-link.active {
            background: rgba(139, 92, 246, 0.2);
            color: var(--theme-primary);
            border-left: 4px solid var(--theme-primary);
        }

        .sidebar-link i {
            font-size: 20px;
            width: 24px;
            text-align: center;
        }

        .sidebar-badge {
            margin-left: auto;
            background: var(--theme-accent);
            color: white;
            font-size: 10px;
            padding: 3px 8px;
            border-radius: 10px;
            font-weight: 800;
        }

        /* ========== SETTINGS CONTENT ========== */
        .settings-content {
            background: linear-gradient(145deg, var(--theme-card), rgba(2, 6, 23, 0.95));
            border-radius: 25px;
            padding: 40px;
            border: 2px solid rgba(139, 92, 246, 0.3);
        }

        .settings-header {
            margin-bottom: 40px;
            padding-bottom: 25px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        }

        .settings-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 36px;
            font-weight: 900;
            color: var(--theme-text);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .settings-title i {
            color: var(--theme-primary);
            font-size: 32px;
        }

        .settings-description {
            color: var(--theme-text-secondary);
            font-size: 16px;
            max-width: 800px;
        }

        /* ========== SETTINGS SECTIONS ========== */
        .settings-section {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .settings-section.active {
            display: block;
        }

        .section-title {
            font-size: 24px;
            font-weight: 800;
            color: var(--theme-text);
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title i {
            color: var(--theme-primary);
            font-size: 22px;
        }

        /* ========== SETTINGS CARDS ========== */
        .settings-card {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }

        .settings-card:hover {
            border-color: rgba(139, 92, 246, 0.3);
            transform: translateY(-2px);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .card-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--theme-text);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .card-title i {
            color: var(--theme-primary);
            font-size: 20px;
        }

        .card-description {
            color: var(--theme-text-secondary);
            font-size: 15px;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        /* ========== FORM ELEMENTS ========== */
        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 12px;
            font-size: 16px;
            font-weight: 600;
            color: var(--theme-text);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-label i {
            color: var(--theme-accent);
            font-size: 16px;
        }

        .form-hint {
            color: var(--theme-text-secondary);
            font-size: 13px;
            margin-top: 8px;
            font-style: italic;
        }

        /* Input Styles */
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 16px 20px;
            background: rgba(0, 0, 0, 0.4);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: var(--theme-text);
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--theme-primary);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
        }

        input:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Toggle Switch */
        .toggle-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .toggle-label {
            flex: 1;
        }

        .toggle-label h4 {
            color: var(--theme-text);
            font-size: 16px;
            margin-bottom: 5px;
        }

        .toggle-label p {
            color: var(--theme-text-secondary);
            font-size: 14px;
        }

        .toggle-switch {
            position: relative;
            width: 60px;
            height: 32px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.1);
            transition: .4s;
            border-radius: 34px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 24px;
            width: 24px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .toggle-slider {
            background-color: var(--theme-primary);
        }

        input:checked + .toggle-slider:before {
            transform: translateX(28px);
        }

        /* Slider */
        .slider-container {
            padding: 20px 0;
        }

        .slider-value {
            text-align: center;
            font-size: 24px;
            font-weight: 800;
            color: var(--theme-primary);
            margin-bottom: 15px;
        }

        .slider-track {
            width: 100%;
            height: 8px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
            position: relative;
            margin-bottom: 25px;
        }

        .slider-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--theme-primary), var(--theme-accent));
            border-radius: 4px;
            width: 50%;
        }

        .slider-input {
            width: 100%;
            -webkit-appearance: none;
            height: 8px;
            background: transparent;
            position: absolute;
            top: 0;
            left: 0;
        }

        .slider-input::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: white;
            border: 3px solid var(--theme-primary);
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .slider-labels {
            display: flex;
            justify-content: space-between;
            color: var(--theme-text-secondary);
            font-size: 14px;
            margin-top: 10px;
        }

        /* Checkbox Groups */
        .checkbox-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .checkbox-item {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .checkbox-item:hover {
            border-color: var(--theme-primary);
            background: rgba(139, 92, 246, 0.1);
        }

        .checkbox-item.checked {
            border-color: var(--theme-primary);
            background: rgba(139, 92, 246, 0.2);
        }

        .checkbox-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .checkbox-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(139, 92, 246, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: var(--theme-primary);
            flex-shrink: 0;
        }

        .checkbox-text h4 {
            color: var(--theme-text);
            font-size: 15px;
            margin-bottom: 4px;
        }

        .checkbox-text p {
            color: var(--theme-text-secondary);
            font-size: 13px;
        }

        .checkbox-input {
            display: none;
        }

        /* Color Picker */
        .color-picker-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .color-preset {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            cursor: pointer;
            border: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .color-preset:hover {
            transform: scale(1.1);
        }

        .color-preset.selected {
            border-color: white;
            box-shadow: 0 0 0 3px var(--theme-primary);
        }

        /* Security Score */
        .security-score {
            text-align: center;
            padding: 30px;
            background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
            border-radius: 20px;
            border: 2px solid rgba(139, 92, 246, 0.3);
            margin-bottom: 30px;
        }

        .score-circle {
            width: 150px;
            height: 150px;
            margin: 0 auto 25px;
            position: relative;
        }

        .score-circle svg {
            width: 100%;
            height: 100%;
            transform: rotate(-90deg);
        }

        .circle-bg {
            fill: none;
            stroke: rgba(255, 255, 255, 0.1);
            stroke-width: 8;
        }

        .circle-progress {
            fill: none;
            stroke: var(--theme-primary);
            stroke-width: 8;
            stroke-linecap: round;
            stroke-dasharray: 440;
            stroke-dashoffset: 440;
            transition: stroke-dashoffset 1s ease;
        }

        .score-value {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 36px;
            font-weight: 900;
            color: var(--theme-text);
        }

        .score-label {
            font-size: 18px;
            color: var(--theme-text);
            margin-bottom: 10px;
            font-weight: 700;
        }

        .score-description {
            color: var(--theme-text-secondary);
            font-size: 14px;
            margin-bottom: 20px;
        }

        .score-suggestions {
            text-align: left;
            margin-top: 25px;
        }

        .suggestion-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .suggestion-item:last-child {
            border-bottom: none;
        }

        .suggestion-item i {
            color: var(--theme-accent);
            font-size: 16px;
        }

        /* Data Usage */
        .data-usage {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }

        .usage-item {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
        }

        .usage-value {
            font-size: 28px;
            font-weight: 800;
            color: var(--theme-primary);
            margin-bottom: 8px;
        }

        .usage-label {
            color: var(--theme-text-secondary);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Session List */
        .session-list {
            margin-top: 20px;
        }

        .session-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            margin-bottom: 15px;
        }

        .session-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .session-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: rgba(139, 92, 246, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--theme-primary);
        }

        .session-details h4 {
            color: var(--theme-text);
            font-size: 16px;
            margin-bottom: 5px;
        }

        .session-details p {
            color: var(--theme-text-secondary);
            font-size: 13px;
        }

        .session-current {
            background: rgba(34, 197, 94, 0.15);
            border-left: 4px solid var(--success);
        }

        /* ========== ACTION BUTTONS ========== */
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn {
            padding: 16px 32px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            border: none;
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--theme-primary), var(--theme-secondary));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(139, 92, 246, 0.3);
        }

        .btn-secondary {
            background: rgba(139, 92, 246, 0.15);
            border: 2px solid var(--theme-primary);
            color: var(--theme-text);
        }

        .btn-secondary:hover {
            background: rgba(139, 92, 246, 0.25);
            transform: translateY(-3px);
        }

        .btn-danger {
            background: rgba(239, 68, 68, 0.15);
            border: 2px solid var(--danger);
            color: var(--danger);
        }

        .btn-danger:hover {
            background: rgba(239, 68, 68, 0.25);
            transform: translateY(-3px);
        }

        /* ========== PREVIEW PANEL ========== */
        .preview-panel {
            position: fixed;
            top: 120px;
            right: 30px;
            width: 300px;
            background: var(--theme-card);
            border-radius: 20px;
            padding: 25px;
            border: 2px solid var(--theme-primary);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            z-index: 100;
            display: none;
        }

        .preview-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .preview-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--theme-text);
        }

        .preview-content {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .preview-card {
            background: var(--theme-card);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 10px;
        }

        .preview-text {
            color: var(--theme-text);
            font-size: 14px;
            margin-bottom: 10px;
        }

        .preview-text-secondary {
            color: var(--theme-text-secondary);
            font-size: 12px;
        }

        /* ========== FOOTER ========== */
        .main-footer {
            background: linear-gradient(145deg, var(--sidebar-bg), rgba(2, 6, 23, 0.97));
            border-top: 3px solid var(--theme-primary);
            padding: 50px 40px;
            margin-top: 60px;
            border-radius: 30px 30px 0 0;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-column h4 {
            font-size: 20px;
            color: var(--theme-text);
            margin-bottom: 25px;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .footer-column h4 i {
            color: var(--theme-primary);
            font-size: 22px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 15px;
        }

        .footer-links a {
            color: #c7d2fe;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            padding: 10px 0;
        }

        .footer-links a:hover {
            color: var(--theme-primary);
            transform: translateX(8px);
        }

        .footer-social {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .footer-social a {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(139, 92, 246, 0.15);
            color: var(--theme-primary);
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .footer-social a:hover {
            background: var(--theme-primary);
            color: white;
            transform: translateY(-5px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #6b7280;
            font-size: 14px;
        }

        /* ========== RESPONSIVE DESIGN ========== */
        @media (max-width: 1200px) {
            .settings-container {
                grid-template-columns: 250px 1fr;
                padding: 0 20px;
            }
            
            .preview-panel {
                display: none !important;
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
            
            .settings-container {
                grid-template-columns: 1fr;
                margin-top: 160px;
            }
            
            .settings-sidebar {
                position: static;
                height: auto;
                margin-bottom: 30px;
            }
        }

        @media (max-width: 768px) {
            .settings-content {
                padding: 25px;
            }
            
            .checkbox-grid {
                grid-template-columns: 1fr;
            }
            
            .data-usage {
                grid-template-columns: 1fr;
            }
            
            .session-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
            
            .color-picker-container {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .settings-container {
                padding: 0 15px;
                margin-top: 180px;
            }
            
            .settings-title {
                font-size: 28px;
            }
            
            .section-title {
                font-size: 20px;
            }
            
            .settings-card {
                padding: 20px;
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
            
            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- HORIZONTAL NAVBAR (TOP) -->
    <nav class="top-navbar">
        <div class="nav-logo">
            <i class="fas fa-cog"></i>
            <h1>Settings</h1>
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
            <a href="report-scam.php" target="_blank" class="nav-link">
                <i class="fas fa-flag"></i>
                <span>Report</span>
            </a>
            <a href="help-support.php" target="_blank" class="nav-link">
                <i class="fas fa-question-circle"></i>
                <span>Help</span>
            </a>
            <a href="settings.php" class="nav-link active">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
                <span class="nav-badge">PRO</span>
            </a>
        </div>
    </nav>
    
    <!-- SETTINGS LAYOUT -->
    <div class="settings-container">
        <!-- SETTINGS SIDEBAR -->
        <aside class="settings-sidebar">
            <!-- Profile Card -->
            <div class="profile-card">
                <div class="profile-avatar" onclick="changeAvatar()">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=AI%20User" alt="Profile" id="profileAvatar">
                </div>
                <h3 class="profile-name" id="profileName">User Name</h3>
                <p class="profile-email" id="profileEmail">user@example.com</p>
                
                <div class="profile-stats">
                    <div class="stat-item">
                        <div class="stat-number" id="scansCount">247</div>
                        <div class="stat-label">Scans</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" id="reportsCount">18</div>
                        <div class="stat-label">Reports</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" id="accuracyRate">96%</div>
                        <div class="stat-label">Accuracy</div>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link active" data-section="profile">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" data-section="privacy">
                        <i class="fas fa-shield-alt"></i>
                        <span>Privacy & Data</span>
                        <span class="sidebar-badge">NEW</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" data-section="notifications">
                        <i class="fas fa-bell"></i>
                        <span>Notifications</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" data-section="detection">
                        <i class="fas fa-search"></i>
                        <span>Detection Settings</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" data-section="appearance">
                        <i class="fas fa-palette"></i>
                        <span>Appearance</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" data-section="security">
                        <i class="fas fa-lock"></i>
                        <span>Security</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" data-section="advanced">
                        <i class="fas fa-cogs"></i>
                        <span>Advanced</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" data-section="account">
                        <i class="fas fa-credit-card"></i>
                        <span>Account</span>
                    </a>
                </li>
            </ul>
        </aside>
        
        <!-- SETTINGS CONTENT -->
        <main class="settings-content">
            <!-- Header -->
            <div class="settings-header">
                <h1 class="settings-title">
                    <i class="fas fa-sliders-h"></i> Settings & Preferences
                </h1>
                <p class="settings-description">
                    Customize your AI Scam Assistant experience. All settings are saved automatically in your browser.
                </p>
            </div>
            
            <!-- PROFILE SECTION -->
            <div class="settings-section active" id="profileSection">
                <h2 class="section-title">
                    <i class="fas fa-user"></i> Profile Settings
                </h2>
                
                <!-- Personal Information -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-id-card"></i> Personal Information
                        </h3>
                    </div>
                    
                    <div class="card-description">
                        Update your personal information and profile details
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user-circle"></i> Display Name
                        </label>
                        <input type="text" id="displayName" placeholder="Enter your display name">
                        <p class="form-hint">This name will be visible in your reports and activity</p>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-envelope"></i> Email Address
                        </label>
                        <input type="email" id="emailAddress" placeholder="your.email@example.com">
                        <p class="form-hint">We'll send important updates to this email</p>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-phone"></i> Phone Number (Optional)
                        </label>
                        <input type="tel" id="phoneNumber" placeholder="+60 12 345 6789">
                        <p class="form-hint">For SMS alerts and emergency notifications</p>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-map-marker-alt"></i> Location
                        </label>
                        <select id="locationSelect">
                            <option value="">Select your state</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                            <option value="Johor">Johor</option>
                            <option value="Penang">Penang</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak">Sarawak</option>
                            <option value="Other">Other</option>
                        </select>
                        <p class="form-hint">Helps us provide localized threat alerts</p>
                    </div>
                </div>
                
                <!-- Account Security -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-lock"></i> Account Security
                        </h3>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-key"></i> Change Password
                        </label>
                        <input type="password" id="currentPassword" placeholder="Current password">
                        <input type="password" id="newPassword" placeholder="New password" style="margin-top: 10px;">
                        <input type="password" id="confirmPassword" placeholder="Confirm new password" style="margin-top: 10px;">
                        <div id="passwordStrength" style="margin-top: 15px;"></div>
                    </div>
                    
                    <div class="toggle-container">
                        <div class="toggle-label">
                            <h4>Two-Factor Authentication</h4>
                            <p>Add an extra layer of security to your account</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="twoFactorToggle">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- PRIVACY & DATA SECTION -->
            <div class="settings-section" id="privacySection">
                <h2 class="section-title">
                    <i class="fas fa-shield-alt"></i> Privacy & Data
                </h2>
                
                <!-- Data Collection -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-database"></i> Data Collection
                        </h3>
                    </div>
                    
                    <div class="toggle-container">
                        <div class="toggle-label">
                            <h4>Anonymous Usage Data</h4>
                            <p>Help improve AI Scam Assistant by sharing anonymous usage data</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="usageDataToggle" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    
                    <div class="toggle-container">
                        <div class="toggle-label">
                            <h4>Threat Intelligence Sharing</h4>
                            <p>Share anonymized scam patterns to help protect the community</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="threatSharingToggle" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
                
                <!-- Data Management -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-trash-alt"></i> Data Management
                        </h3>
                    </div>
                    
                    <div class="card-description">
                        Control how your data is stored and managed
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-clock"></i> Auto-Delete Data
                        </label>
                        <select id="autoDeleteSelect">
                            <option value="30">After 30 days</option>
                            <option value="60">After 60 days</option>
                            <option value="90">After 90 days</option>
                            <option value="never">Never (Keep forever)</option>
                        </select>
                        <p class="form-hint">Automatically delete your scan history and reports</p>
                    </div>
                    
                    <div class="data-usage">
                        <div class="usage-item">
                            <div class="usage-value" id="scanHistory">247</div>
                            <div class="usage-label">Scans Stored</div>
                        </div>
                        <div class="usage-item">
                            <div class="usage-value" id="reportHistory">18</div>
                            <div class="usage-label">Reports Saved</div>
                        </div>
                        <div class="usage-item">
                            <div class="usage-value" id="storageUsed">12.5 MB</div>
                            <div class="usage-label">Storage Used</div>
                        </div>
                    </div>
                    
                    <div class="action-buttons" style="margin-top: 20px;">
                        <button class="btn btn-secondary" onclick="clearScanHistory()">
                            <i class="fas fa-broom"></i> Clear Scan History
                        </button>
                        <button class="btn btn-secondary" onclick="downloadAllData()">
                            <i class="fas fa-download"></i> Download All Data
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- NOTIFICATIONS SECTION -->
            <div class="settings-section" id="notificationsSection">
                <h2 class="section-title">
                    <i class="fas fa-bell"></i> Notification Settings
                </h2>
                
                <!-- Notification Channels -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-broadcast-tower"></i> Notification Channels
                        </h3>
                    </div>
                    
                    <div class="toggle-container">
                        <div class="toggle-label">
                            <h4>Email Notifications</h4>
                            <p>Receive important updates via email</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="emailNotifications" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    
                    <div class="toggle-container">
                        <div class="toggle-label">
                            <h4>Browser Push Notifications</h4>
                            <p>Get instant alerts in your browser</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="pushNotifications" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    
                    <div class="toggle-container">
                        <div class="toggle-label">
                            <h4>SMS Alerts</h4>
                            <p>Emergency alerts via SMS (Malaysian numbers only)</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="smsNotifications">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
                
                <!-- Notification Types -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-envelope-open-text"></i> Notification Types
                        </h3>
                    </div>
                    
                    <div class="checkbox-grid">
                        <div class="checkbox-item checked" onclick="toggleCheckbox(this)">
                            <div class="checkbox-content">
                                <div class="checkbox-icon">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="checkbox-text">
                                    <h4>New Threat Alerts</h4>
                                    <p>Critical scam warnings</p>
                                </div>
                            </div>
                            <input type="checkbox" class="checkbox-input" checked>
                        </div>
                        
                        <div class="checkbox-item checked" onclick="toggleCheckbox(this)">
                            <div class="checkbox-content">
                                <div class="checkbox-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="checkbox-text">
                                    <h4>Scan Results</h4>
                                    <p>Immediate detection results</p>
                                </div>
                            </div>
                            <input type="checkbox" class="checkbox-input" checked>
                        </div>
                        
                        <div class="checkbox-item" onclick="toggleCheckbox(this)">
                            <div class="checkbox-content">
                                <div class="checkbox-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="checkbox-text">
                                    <h4>Weekly Reports</h4>
                                    <p>Weekly security summary</p>
                                </div>
                            </div>
                            <input type="checkbox" class="checkbox-input">
                        </div>
                        
                        <div class="checkbox-item checked" onclick="toggleCheckbox(this)">
                            <div class="checkbox-content">
                                <div class="checkbox-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div class="checkbox-text">
                                    <h4>Security Updates</h4>
                                    <p>System and security updates</p>
                                </div>
                            </div>
                            <input type="checkbox" class="checkbox-input" checked>
                        </div>
                    </div>
                </div>
                
                <!-- Quiet Hours -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-moon"></i> Quiet Hours
                        </h3>
                    </div>
                    
                    <div class="toggle-container">
                        <div class="toggle-label">
                            <h4>Enable Quiet Hours</h4>
                            <p>Silence non-emergency notifications during specified hours</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="quietHoursToggle">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    
                    <div class="form-group" id="quietHoursSettings" style="display: none;">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                            <div>
                                <label class="form-label">Start Time</label>
                                <input type="time" id="quietStart" value="22:00">
                            </div>
                            <div>
                                <label class="form-label">End Time</label>
                                <input type="time" id="quietEnd" value="07:00">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- DETECTION SETTINGS SECTION -->
            <div class="settings-section" id="detectionSection">
                <h2 class="section-title">
                    <i class="fas fa-search"></i> Detection Settings
                </h2>
                
                <!-- Sensitivity Settings -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-sliders-h"></i> Detection Sensitivity
                        </h3>
                    </div>
                    
                    <div class="slider-container">
                        <div class="slider-value" id="sensitivityValue">Medium</div>
                        <div class="slider-track">
                            <div class="slider-fill" id="sensitivityFill"></div>
                            <input type="range" min="1" max="3" value="2" class="slider-input" id="sensitivitySlider">
                        </div>
                        <div class="slider-labels">
                            <span>Low (Fewer alerts)</span>
                            <span>Medium</span>
                            <span>High (More alerts)</span>
                        </div>
                    </div>
                    
                    <div class="toggle-container">
                        <div class="toggle-label">
                            <h4>Auto-Scan Clipboard</h4>
                            <p>Automatically scan copied text for scams</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="autoScanToggle">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
                
                <!-- Language Preferences -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-language"></i> Language Preferences
                        </h3>
                    </div>
                    
                    <div class="checkbox-grid">
                        <div class="checkbox-item checked" onclick="toggleCheckbox(this)">
                            <div class="checkbox-content">
                                <div class="checkbox-icon">
                                    <i class="fas fa-flag-usa"></i>
                                </div>
                                <div class="checkbox-text">
                                    <h4>English</h4>
                                    <p>Detect English language scams</p>
                                </div>
                            </div>
                            <input type="checkbox" class="checkbox-input" checked>
                        </div>
                        
                        <div class="checkbox-item checked" onclick="toggleCheckbox(this)">
                            <div class="checkbox-content">
                                <div class="checkbox-icon">
                                    <i class="fas fa-flag"></i>
                                </div>
                                <div class="checkbox-text">
                                    <h4>Bahasa Malaysia</h4>
                                    <p>Detect Malay language scams</p>
                                </div>
                            </div>
                            <input type="checkbox" class="checkbox-input" checked>
                        </div>
                        
                        <div class="checkbox-item" onclick="toggleCheckbox(this)">
                            <div class="checkbox-content">
                                <div class="checkbox-icon">
                                    <i class="fas fa-flag"></i>
                                </div>
                                <div class="checkbox-text">
                                    <h4>Chinese</h4>
                                    <p>Detect Chinese language scams</p>
                                </div>
                            </div>
                            <input type="checkbox" class="checkbox-input">
                        </div>
                        
                        <div class="checkbox-item" onclick="toggleCheckbox(this)">
                            <div class="checkbox-content">
                                <div class="checkbox-icon">
                                    <i class="fas fa-flag"></i>
                                </div>
                                <div class="checkbox-text">
                                    <h4>Tamil</h4>
                                    <p>Detect Tamil language scams</p>
                                </div>
                            </div>
                            <input type="checkbox" class="checkbox-input">
                        </div>
                    </div>
                    
                    <div class="toggle-container">
                        <div class="toggle-label">
                            <h4>Code-Switching Detection</h4>
                            <p>Detect mixed-language messages (rojak)</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="codeSwitchToggle" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
                
                <!-- Specific Scam Types -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-filter"></i> Specific Scam Types
                        </h3>
                    </div>
                    
                    <div class="checkbox-grid">
                        <div class="checkbox-item checked" onclick="toggleCheckbox(this)">
                            <div class="checkbox-content">
                                <div class="checkbox-icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <div class="checkbox-text">
                                    <h4>Banking Scams</h4>
                                    <p>Bank phishing, OTP requests</p>
                                </div>
                            </div>
                            <input type="checkbox" class="checkbox-input" checked>
                        </div>
                        
                        <div class="checkbox-item checked" onclick="toggleCheckbox(this)">
                            <div class="checkbox-content">
                                <div class="checkbox-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="checkbox-text">
                                    <h4>Investment Scams</h4>
                                    <p>Crypto, forex, Ponzi schemes</p>
                                </div>
                            </div>
                            <input type="checkbox" class="checkbox-input" checked>
                        </div>
                        
                        <div class="checkbox-item" onclick="toggleCheckbox(this)">
                            <div class="checkbox-content">
                                <div class="checkbox-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <div class="checkbox-text">
                                    <h4>Romance Scams</h4>
                                    <p>Love scams, emotional manipulation</p>
                                </div>
                            </div>
                            <input type="checkbox" class="checkbox-input">
                        </div>
                        
                        <div class="checkbox-item" onclick="toggleCheckbox(this)">
                            <div class="checkbox-content">
                                <div class="checkbox-icon">
                                    <i class="fas fa-laptop"></i>
                                </div>
                                <div class="checkbox-text">
                                    <h4>Tech Support Scams</h4>
                                    <p>Fake virus alerts, remote access</p>
                                </div>
                            </div>
                            <input type="checkbox" class="checkbox-input">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- APPEARANCE SECTION -->
            <div class="settings-section" id="appearanceSection">
                <h2 class="section-title">
                    <i class="fas fa-palette"></i> Appearance
                </h2>
                
                <!-- Theme Selection -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-moon"></i> Theme
                        </h3>
                    </div>
                    
                    <div class="checkbox-grid" style="grid-template-columns: repeat(3, 1fr);">
                        <div class="checkbox-item checked" onclick="selectTheme('dark')">
                            <div class="checkbox-content">
                                <div class="checkbox-icon">
                                    <i class="fas fa-moon"></i>
                                </div>
                                <div class="checkbox-text">
                                    <h4>Dark</h4>
                                    <p>Default theme</p>
                                </div>
                            </div>
                            <input type="radio" name="theme" class="checkbox-input" checked>
                        </div>
                        
                        <div class="checkbox-item" onclick="selectTheme('light')">
                            <div class="checkbox-content">
                                <div class="checkbox-icon">
                                    <i class="fas fa-sun"></i>
                                </div>
                                <div class="checkbox-text">
                                    <h4>Light</h4>
                                    <p>Light background</p>
                                </div>
                            </div>
                            <input type="radio" name="theme" class="checkbox-input">
                        </div>
                        
                        <div class="checkbox-item" onclick="selectTheme('auto')">
                            <div class="checkbox-content">
                                <div class="checkbox-icon">
                                    <i class="fas fa-adjust"></i>
                                </div>
                                <div class="checkbox-text">
                                    <h4>Auto</h4>
                                    <p>Follow system</p>
                                </div>
                            </div>
                            <input type="radio" name="theme" class="checkbox-input">
                        </div>
                    </div>
                </div>
                
                <!-- Accent Color -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-fill-drip"></i> Accent Color
                        </h3>
                    </div>
                    
                    <div class="color-picker-container">
                        <div class="color-preset selected" style="background: #8b5cf6;" onclick="selectColor('#8b5cf6')"></div>
                        <div class="color-preset" style="background: #3b82f6;" onclick="selectColor('#3b82f6')"></div>
                        <div class="color-preset" style="background: #06b6d4;" onclick="selectColor('#06b6d4')"></div>
                        <div class="color-preset" style="background: #10b981;" onclick="selectColor('#10b981')"></div>
                        <div class="color-preset" style="background: #f59e0b;" onclick="selectColor('#f59e0b')"></div>
                        <div class="color-preset" style="background: #ef4444;" onclick="selectColor('#ef4444')"></div>
                        <div class="color-preset" style="background: #8b5cf6;" onclick="selectColor('#ec4899')"></div>
                        <div class="color-preset" style="background: #6366f1;" onclick="selectColor('#6366f1')"></div>
                    </div>
                </div>
                
                <!-- Layout Preferences -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-th-large"></i> Layout Preferences
                        </h3>
                    </div>
                    
                    <div class="toggle-container">
                        <div class="toggle-label">
                            <h4>Reduce Animations</h4>
                            <p>Minimize animations for better performance</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="reduceAnimations">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-text-height"></i> Font Size
                        </label>
                        <select id="fontSizeSelect">
                            <option value="small">Small</option>
                            <option value="medium" selected>Medium</option>
                            <option value="large">Large</option>
                            <option value="xlarge">Extra Large</option>
                        </select>
                    </div>
                    
                    <div class="toggle-container">
                        <div class="toggle-label">
                            <h4>High Contrast Mode</h4>
                            <p>Increase contrast for better visibility</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="highContrast">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- SECURITY SECTION -->
            <div class="settings-section" id="securitySection">
                <h2 class="section-title">
                    <i class="fas fa-lock"></i> Security
                </h2>
                
                <!-- Security Score -->
                <div class="security-score">
                    <div class="score-circle">
                        <svg viewBox="0 0 100 100">
                            <circle class="circle-bg" cx="50" cy="50" r="45"></circle>
                            <circle class="circle-progress" cx="50" cy="50" r="45" id="securityProgress"></circle>
                        </svg>
                        <div class="score-value" id="securityScore">78</div>
                    </div>
                    <div class="score-label">Security Score</div>
                    <div class="score-description">Your account security strength</div>
                    
                    <div class="score-suggestions">
                        <div class="suggestion-item">
                            <i class="fas fa-shield-alt"></i>
                            <span>Enable Two-Factor Authentication</span>
                        </div>
                        <div class="suggestion-item">
                            <i class="fas fa-clock"></i>
                            <span>Set auto-logout to 15 minutes</span>
                        </div>
                        <div class="suggestion-item">
                            <i class="fas fa-history"></i>
                            <span>Review active sessions</span>
                        </div>
                    </div>
                </div>
                
                <!-- Session Management -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-history"></i> Session Management
                        </h3>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-sign-out-alt"></i> Auto-Logout Timer
                        </label>
                        <select id="autoLogoutSelect">
                            <option value="5">5 minutes</option>
                            <option value="15">15 minutes</option>
                            <option value="30" selected>30 minutes</option>
                            <option value="60">60 minutes</option>
                            <option value="never">Never (Stay logged in)</option>
                        </select>
                        <p class="form-hint">Automatically log out after period of inactivity</p>
                    </div>
                    
                    <div class="session-list">
                        <div class="session-item session-current">
                            <div class="session-info">
                                <div class="session-icon">
                                    <i class="fas fa-desktop"></i>
                                </div>
                                <div class="session-details">
                                    <h4>Current Session</h4>
                                    <p>Chrome • Windows • Kuala Lumpur</p>
                                    <p style="font-size: 12px;">Active now</p>
                                </div>
                            </div>
                            <button class="btn btn-secondary" style="padding: 8px 16px;">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </div>
                        
                        <div class="session-item">
                            <div class="session-info">
                                <div class="session-icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <div class="session-details">
                                    <h4>Mobile Device</h4>
                                    <p>Safari • iOS • Johor Bahru</p>
                                    <p style="font-size: 12px;">2 hours ago</p>
                                </div>
                            </div>
                            <button class="btn btn-danger" style="padding: 8px 16px;">
                                <i class="fas fa-times"></i> Revoke
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ADVANCED SECTION -->
            <div class="settings-section" id="advancedSection">
                <h2 class="section-title">
                    <i class="fas fa-cogs"></i> Advanced Settings
                </h2>
                
                <!-- Performance Settings -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-tachometer-alt"></i> Performance
                        </h3>
                    </div>
                    
                    <div class="toggle-container">
                        <div class="toggle-label">
                            <h4>Cache Scans</h4>
                            <p>Cache scan results for faster analysis</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="cacheScans" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-database"></i> Cache Size Limit
                        </label>
                        <select id="cacheLimit">
                            <option value="50">50 MB</option>
                            <option value="100" selected>100 MB</option>
                            <option value="250">250 MB</option>
                            <option value="500">500 MB</option>
                        </select>
                    </div>
                    
                    <button class="btn btn-secondary" onclick="clearCache()" style="margin-top: 15px;">
                        <i class="fas fa-broom"></i> Clear Cache
                    </button>
                </div>
                
                <!-- Developer Options -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-code"></i> Developer Options
                        </h3>
                    </div>
                    
                    <div class="toggle-container">
                        <div class="toggle-label">
                            <h4>Debug Mode</h4>
                            <p>Show detailed logs and debugging information</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="debugMode">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    
                    <div class="toggle-container">
                        <div class="toggle-label">
                            <h4>Experimental Features</h4>
                            <p>Enable beta and experimental features</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="experimentalFeatures">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    
                    <button class="btn btn-secondary" onclick="exportSettings()" style="margin-top: 20px;">
                        <i class="fas fa-file-export"></i> Export Settings as JSON
                    </button>
                </div>
            </div>
            
            <!-- ACCOUNT SECTION -->
            <div class="settings-section" id="accountSection">
                <h2 class="section-title">
                    <i class="fas fa-user-cog"></i> Account Management
                </h2>
                
                <!-- Subscription Status -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-crown"></i> Subscription
                        </h3>
                        <span style="color: var(--theme-primary); font-weight: 700;">FREE PLAN</span>
                    </div>
                    
                    <div class="card-description">
                        You're currently on the Free Plan. Upgrade for advanced features and priority support.
                    </div>
                    
                    <div class="data-usage">
                        <div class="usage-item">
                            <div class="usage-value">50/100</div>
                            <div class="usage-label">Daily Scans</div>
                        </div>
                        <div class="usage-item">
                            <div class="usage-value">10/20</div>
                            <div class="usage-label">Monthly Reports</div>
                        </div>
                        <div class="usage-item">
                            <div class="usage-value">✓</div>
                            <div class="usage-label">Basic Features</div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary" style="margin-top: 20px;">
                        <i class="fas fa-rocket"></i> Upgrade to Premium
                    </button>
                </div>
                
                <!-- Account Actions -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-exclamation-triangle"></i> Dangerous Actions
                        </h3>
                    </div>
                    
                    <div class="card-description" style="color: var(--danger);">
                        These actions are irreversible. Please proceed with caution.
                    </div>
                    
                    <div class="action-buttons" style="margin-top: 20px;">
                        <button class="btn btn-secondary" onclick="deactivateAccount()">
                            <i class="fas fa-user-slash"></i> Deactivate Account
                        </button>
                        <button class="btn btn-danger" onclick="deleteAccount()">
                            <i class="fas fa-trash-alt"></i> Delete Account
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Save Actions -->
            <div class="action-buttons">
                <button class="btn btn-secondary" onclick="resetSettings()">
                    <i class="fas fa-undo"></i> Reset to Default
                </button>
                <button class="btn btn-primary" onclick="saveAllSettings()">
                    <i class="fas fa-save"></i> Save All Changes
                </button>
            </div>
        </main>
    </div>
    
    <!-- PREVIEW PANEL -->
    <div class="preview-panel" id="previewPanel">
        <div class="preview-header">
            <div class="preview-title">Theme Preview</div>
            <button class="btn btn-secondary" style="padding: 8px 16px;" onclick="hidePreview()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="preview-content">
            <div class="preview-card">
                <div class="preview-text">Sample Text</div>
                <div class="preview-text-secondary">Secondary text with different color</div>
                        </div>
            <div class="preview-card" style="border-color: var(--theme-primary);">
                <div class="preview-text">Border Color</div>
                <div class="preview-text-secondary">Using primary color for borders</div>
            </div>
        </div>
        <p style="text-align: center; color: var(--theme-text-secondary); font-size: 12px;">
            Preview updates in real-time
        </p>
    </div>
    
    <!-- FOOTER -->
    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-column">
                <h4><i class="fas fa-shield-alt"></i> AI Scam Assistant</h4>
                <p style="color: #c7d2fe; margin-bottom: 20px;">
                    Protecting Malaysians from scams with advanced AI technology.
                </p>
                <div class="footer-social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                </div>
            </div>
            
            <div class="footer-column">
                <h4><i class="fas fa-link"></i> Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="about-us.php"><i class="fas fa-info-circle"></i> About Us</a></li>
                    <li><a href="scam-detection.php"><i class="fas fa-search"></i> Scam Detection</a></li>
                    <li><a href="recent-threats.php"><i class="fas fa-exclamation-triangle"></i> Recent Threats</a></li>
                    <li><a href="statistics.php"><i class="fas fa-chart-line"></i> Statistics</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h4><i class="fas fa-headset"></i> Support</h4>
                <ul class="footer-links">
                    <li><a href="help-support.php"><i class="fas fa-question-circle"></i> Help Center</a></li>
                    <li><a href="report-scam.php"><i class="fas fa-flag"></i> Report Scam</a></li>
                    <li><a href="safety-tips.php"><i class="fas fa-shield-alt"></i> Safety Tips</a></li>
                    <li><a href="privacy-policy.php"><i class="fas fa-lock"></i> Privacy Policy</a></li>
                    <li><a href="terms.php"><i class="fas fa-file-contract"></i> Terms of Service</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h4><i class="fas fa-envelope"></i> Contact Us</h4>
                <ul class="footer-links">
                    <li><a href="mailto:help@aiscamassistant.my"><i class="fas fa-envelope"></i> help@aiscamassistant.my</a></li>
                    <li><a href="tel:+60312345678"><i class="fas fa-phone"></i> +603 1234 5678</a></li>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> Kuala Lumpur, Malaysia</a></li>
                </ul>
                <div style="margin-top: 20px; background: rgba(139, 92, 246, 0.1); padding: 15px; border-radius: 10px;">
                    <p style="color: var(--theme-primary); font-size: 12px; margin-bottom: 5px;">
                        <i class="fas fa-bullhorn"></i> Emergency Hotline
                    </p>
                    <p style="color: white; font-weight: 700; font-size: 18px;">
                        999 / 112
                    </p>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>© 2024 AI Scam Assistant. All rights reserved. Developed in Malaysia for Malaysians.</p>
            <p style="margin-top: 10px; font-size: 12px;">
                This service is provided free of charge. Always verify with authorities before making any financial decisions.
            </p>
        </div>
    </footer>
    
    <!-- JavaScript Section -->
    <script>
        // ========== DOM ELEMENTS ==========
        const sidebarLinks = document.querySelectorAll('.sidebar-link');
        const settingsSections = document.querySelectorAll('.settings-section');
        const previewPanel = document.getElementById('previewPanel');
        
        // ========== SIDEBAR NAVIGATION ==========
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all links
                sidebarLinks.forEach(l => l.classList.remove('active'));
                // Add active class to clicked link
                this.classList.add('active');
                
                // Get target section
                const sectionId = this.getAttribute('data-section') + 'Section';
                
                // Hide all sections
                settingsSections.forEach(section => {
                    section.classList.remove('active');
                });
                
                // Show target section
                document.getElementById(sectionId).classList.add('active');
            });
        });
        
        // ========== SETTINGS INITIALIZATION ==========
        function initializeSettings() {
            // Load saved settings from localStorage
            loadSettings();
            
            // Initialize sliders
            initializeSliders();
            
            // Initialize toggle switches
            initializeToggles();
            
            // Initialize security score
            updateSecurityScore();
            
            // Setup password strength checker
            const newPasswordInput = document.getElementById('newPassword');
            if (newPasswordInput) {
                newPasswordInput.addEventListener('input', checkPasswordStrength);
            }
            
            // Setup quiet hours toggle
            const quietHoursToggle = document.getElementById('quietHoursToggle');
            const quietHoursSettings = document.getElementById('quietHoursSettings');
            
            if (quietHoursToggle) {
                quietHoursToggle.addEventListener('change', function() {
                    quietHoursSettings.style.display = this.checked ? 'block' : 'none';
                });
            }
        }
        
        // ========== LOAD SAVED SETTINGS ==========
        function loadSettings() {
            // Profile settings
            const savedName = localStorage.getItem('ai-scam-displayName') || 'User Name';
            const savedEmail = localStorage.getItem('ai-scam-email') || 'user@example.com';
            const savedPhone = localStorage.getItem('ai-scam-phone') || '';
            const savedLocation = localStorage.getItem('ai-scam-location') || '';
            
            document.getElementById('displayName').value = savedName;
            document.getElementById('emailAddress').value = savedEmail;
            document.getElementById('phoneNumber').value = savedPhone;
            document.getElementById('locationSelect').value = savedLocation;
            
            // Update profile display
            document.getElementById('profileName').textContent = savedName;
            document.getElementById('profileEmail').textContent = savedEmail;
            
            // Appearance settings
            const savedTheme = localStorage.getItem('ai-scam-theme') || 'dark';
            selectTheme(savedTheme);
            
            const savedColor = localStorage.getItem('ai-scam-accentColor') || '#8b5cf6';
            selectColor(savedColor);
            
            // Load toggle states
            loadToggleStates();
            
            // Load checkbox states
            loadCheckboxStates();
        }
        
        function loadToggleStates() {
            // Load all toggle states
            document.querySelectorAll('.toggle-switch input').forEach(toggle => {
                const savedState = localStorage.getItem(`ai-scam-toggle-${toggle.id}`);
                if (savedState !== null) {
                    toggle.checked = savedState === 'true';
                }
            });
        }
        
        function loadCheckboxStates() {
            // Load checkbox states
            document.querySelectorAll('.checkbox-input').forEach(checkbox => {
                const label = checkbox.closest('.checkbox-item')?.querySelector('h4')?.textContent;
                if (label) {
                    const savedState = localStorage.getItem(`ai-scam-checkbox-${label}`);
                    if (savedState !== null) {
                        checkbox.checked = savedState === 'true';
                        checkbox.closest('.checkbox-item').classList.toggle('checked', checkbox.checked);
                    }
                }
            });
        }
        
        // ========== SLIDER FUNCTIONS ==========
        function initializeSliders() {
            const sensitivitySlider = document.getElementById('sensitivitySlider');
            if (sensitivitySlider) {
                const sensitivityValue = document.getElementById('sensitivityValue');
                const sensitivityFill = document.getElementById('sensitivityFill');
                
                // Load saved sensitivity
                const savedSensitivity = localStorage.getItem('ai-scam-sensitivity') || 2;
                sensitivitySlider.value = savedSensitivity;
                updateSensitivityDisplay(parseInt(savedSensitivity));
                
                sensitivitySlider.addEventListener('input', function() {
                    const value = parseInt(this.value);
                    updateSensitivityDisplay(value);
                    localStorage.setItem('ai-scam-sensitivity', value);
                });
                
                function updateSensitivityDisplay(value) {
                    const percentage = ((value - 1) / 2) * 100;
                    sensitivityFill.style.width = percentage + '%';
                    
                    const labels = ['Low', 'Medium', 'High'];
                    sensitivityValue.textContent = labels[value - 1];
                }
            }
        }
        
        // ========== THEME & COLOR FUNCTIONS ==========
        function selectTheme(theme) {
            // Update radio buttons
            document.querySelectorAll('input[name="theme"]').forEach(radio => {
                radio.checked = radio.value === theme;
                const parentItem = radio.closest('.checkbox-item');
                if (parentItem) {
                    parentItem.classList.toggle('checked', radio.checked);
                }
            });
            
            // Apply theme
            const root = document.documentElement;
            
            if (theme === 'light') {
                root.style.setProperty('--theme-bg', '#f8fafc');
                root.style.setProperty('--theme-card', '#ffffff');
                root.style.setProperty('--theme-text', '#1e293b');
                root.style.setProperty('--theme-text-secondary', '#64748b');
                root.style.setProperty('--sidebar-bg', '#f1f5f9');
            } else if (theme === 'dark') {
                root.style.setProperty('--theme-bg', '#0f172a');
                root.style.setProperty('--theme-card', 'rgba(30, 27, 75, 0.9)');
                root.style.setProperty('--theme-text', '#e2e8f0');
                root.style.setProperty('--theme-text-secondary', '#94a3b8');
                root.style.setProperty('--sidebar-bg', 'rgba(15, 23, 42, 0.95)');
            }
            
            // Auto theme detection
            if (theme === 'auto') {
                if (window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches) {
                    selectTheme('light');
                } else {
                    selectTheme('dark');
                }
            }
            
            localStorage.setItem('ai-scam-theme', theme);
            showPreview();
        }
        
        function selectColor(color) {
            // Update color presets
            document.querySelectorAll('.color-preset').forEach(preset => {
                preset.classList.remove('selected');
                if (preset.style.background === color || preset.style.backgroundColor === color) {
                    preset.classList.add('selected');
                }
            });
            
            // Apply color
            document.documentElement.style.setProperty('--theme-primary', color);
            
            // Calculate secondary color (darker version)
            const darkerColor = darkenColor(color, 20);
            document.documentElement.style.setProperty('--theme-secondary', darkerColor);
            
            localStorage.setItem('ai-scam-accentColor', color);
            showPreview();
        }
        
        function darkenColor(color, percent) {
            try {
                // Remove # if present
                let hex = color.replace('#', '');
                
                // Convert 3-digit hex to 6-digit
                if (hex.length === 3) {
                    hex = hex.split('').map(c => c + c).join('');
                }
                
                // Parse hex to RGB
                const num = parseInt(hex, 16);
                const amt = Math.round(2.55 * percent);
                
                // Calculate darkened RGB values
                const R = Math.max((num >> 16) - amt, 0);
                const G = Math.max((num >> 8 & 0x00FF) - amt, 0);
                const B = Math.max((num & 0x0000FF) - amt, 0);
                
                // Convert back to hex
                const darkenedHex = (0x1000000 + (R << 16) + (G << 8) + B).toString(16).slice(1);
                return '#' + darkenedHex;
            } catch (e) {
                return color; // Return original if error
            }
        }
        
        // ========== CHECKBOX FUNCTIONS ==========
        function toggleCheckbox(container) {
            const checkbox = container.querySelector('.checkbox-input');
            if (checkbox) {
                checkbox.checked = !checkbox.checked;
                container.classList.toggle('checked', checkbox.checked);
                
                // Save checkbox state
                const label = container.querySelector('h4')?.textContent;
                if (label) {
                    localStorage.setItem(`ai-scam-checkbox-${label}`, checkbox.checked);
                }
            }
        }
        
        // ========== PASSWORD STRENGTH ==========
        function checkPasswordStrength() {
            const password = document.getElementById('newPassword')?.value;
            const strengthDiv = document.getElementById('passwordStrength');
            
            if (!password || !strengthDiv) {
                return;
            }
            
            let strength = 0;
            let suggestions = [];
            
            // Length check
            if (password.length >= 8) strength += 25;
            else suggestions.push('Use at least 8 characters');
            
            // Complexity checks
            if (/[A-Z]/.test(password)) strength += 25;
            else suggestions.push('Add uppercase letters');
            
            if (/[0-9]/.test(password)) strength += 25;
            else suggestions.push('Add numbers');
            
            if (/[^A-Za-z0-9]/.test(password)) strength += 25;
            else suggestions.push('Add special characters');
            
            // Update display
            let strengthText = '';
            let color = '';
            
            if (strength < 50) {
                strengthText = 'Weak';
                color = 'var(--danger)';
            } else if (strength < 75) {
                strengthText = 'Fair';
                color = 'var(--warning)';
            } else {
                strengthText = 'Strong';
                color = 'var(--success)';
            }
            
            strengthDiv.innerHTML = `
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                    <div style="flex: 1; height: 8px; background: rgba(255,255,255,0.1); border-radius: 4px;">
                        <div style="height: 100%; width: ${strength}%; background: ${color}; border-radius: 4px; transition: width 0.3s;"></div>
                    </div>
                    <span style="color: ${color}; font-weight: 600;">${strengthText}</span>
                </div>
                ${suggestions.length > 0 ? '<div style="font-size: 12px; color: var(--theme-text-secondary); margin-top: 5px;">Suggestions: ' + suggestions.join(', ') + '</div>' : ''}
            `;
            
            updateSecurityScore();
        }
        
        // ========== SECURITY SCORE ==========
        function updateSecurityScore() {
            let score = 50; // Base score
            
            // Two-factor adds 30 points
            const twoFactorToggle = document.getElementById('twoFactorToggle');
            if (twoFactorToggle && twoFactorToggle.checked) {
                score += 30;
            }
            
            // Strong password adds 10 points
            const password = document.getElementById('newPassword')?.value;
            if (password && password.length >= 8) {
                score += 10;
            }
            
            // Auto-logout adds points based on setting
            const logoutSelect = document.getElementById('autoLogoutSelect');
            if (logoutSelect) {
                const logoutValue = logoutSelect.value;
                if (logoutValue !== 'never') {
                    score += parseInt(logoutValue) <= 15 ? 10 : 5;
                }
            }
            
            // Cap at 100
            score = Math.min(100, Math.max(0, score));
            
            // Update display
            const scoreElement = document.getElementById('securityScore');
            if (scoreElement) {
                scoreElement.textContent = score;
            }
            
            // Update progress circle
            const progress = document.getElementById('securityProgress');
            if (progress) {
                const circumference = 2 * Math.PI * 45;
                const offset = circumference - (score / 100) * circumference;
                progress.style.strokeDasharray = circumference;
                progress.style.strokeDashoffset = offset;
            }
        }
        
        // ========== PREVIEW FUNCTIONS ==========
        function showPreview() {
            if (previewPanel) {
                previewPanel.style.display = 'block';
                setTimeout(() => {
                    previewPanel.style.opacity = '1';
                }, 10);
            }
        }
        
        function hidePreview() {
            if (previewPanel) {
                previewPanel.style.opacity = '0';
                setTimeout(() => {
                    previewPanel.style.display = 'none';
                }, 300);
            }
        }
        
        // ========== ACTION FUNCTIONS ==========
        function saveAllSettings() {
            // Save profile
            const displayName = document.getElementById('displayName').value;
            const email = document.getElementById('emailAddress').value;
            const phone = document.getElementById('phoneNumber').value;
            const location = document.getElementById('locationSelect').value;
            
            localStorage.setItem('ai-scam-displayName', displayName);
            localStorage.setItem('ai-scam-email', email);
            localStorage.setItem('ai-scam-phone', phone);
            localStorage.setItem('ai-scam-location', location);
            
            // Update profile display
            document.getElementById('profileName').textContent = displayName;
            document.getElementById('profileEmail').textContent = email;
            
            // Save toggle states
            document.querySelectorAll('.toggle-switch input').forEach(toggle => {
                localStorage.setItem(`ai-scam-toggle-${toggle.id}`, toggle.checked);
            });
            
            // Save select values
            document.querySelectorAll('select').forEach(select => {
                localStorage.setItem(`ai-scam-select-${select.id}`, select.value);
            });
            
            // Show success message
            showNotification('Settings saved successfully!', 'success');
        }
        
        function resetSettings() {
            if (confirm('Are you sure you want to reset all settings to default?')) {
                localStorage.clear();
                initializeSettings();
                showNotification('Settings reset to defaults!', 'success');
            }
        }
        
        function clearScanHistory() {
            if (confirm('Are you sure you want to clear your scan history?')) {
                // Here you would typically make an API call
                showNotification('Scan history cleared!', 'success');
                document.getElementById('scanHistory').textContent = '0';
            }
        }
        
        function downloadAllData() {
            showNotification('Preparing your data for download...', 'info');
            // In a real app, this would generate a JSON file
            setTimeout(() => {
                showNotification('Data download ready!', 'success');
            }, 1500);
        }
        
        function clearCache() {
            if (confirm('Clear all cached data?')) {
                showNotification('Cache cleared successfully!', 'success');
            }
        }
        
        function exportSettings() {
            const settings = {};
            
            // Collect all settings
            settings.profile = {
                name: localStorage.getItem('ai-scam-displayName'),
                email: localStorage.getItem('ai-scam-email'),
                phone: localStorage.getItem('ai-scam-phone'),
                location: localStorage.getItem('ai-scam-location')
            };
            
            settings.appearance = {
                theme: localStorage.getItem('ai-scam-theme'),
                accentColor: localStorage.getItem('ai-scam-accentColor')
            };
            
            // Create download link
            const dataStr = JSON.stringify(settings, null, 2);
            const dataUri = 'data:application/json;charset=utf-8,'+ encodeURIComponent(dataStr);
            
            const exportFileDefaultName = 'ai-scam-assistant-settings.json';
            
            const linkElement = document.createElement('a');
            linkElement.setAttribute('href', dataUri);
            linkElement.setAttribute('download', exportFileDefaultName);
            linkElement.click();
            
            showNotification('Settings exported successfully!', 'success');
        }
        
        function deactivateAccount() {
            if (confirm('Deactivate your account? You can reactivate within 30 days.')) {
                showNotification('Account deactivation initiated. Check your email.', 'warning');
            }
        }
        
        function deleteAccount() {
            const confirmText = 'DELETE MY ACCOUNT';
            const userInput = prompt(`Type "${confirmText}" to permanently delete your account:\n\nTHIS ACTION IS IRREVERSIBLE!`);
            
            if (userInput === confirmText) {
                showNotification('Account deletion scheduled. Goodbye!', 'danger');
            }
        }
        
        function changeAvatar() {
            const avatarUrl = prompt('Enter new avatar URL (or leave blank for random):');
            if (avatarUrl !== null) {
                const avatarImg = document.getElementById('profileAvatar');
                if (avatarUrl.trim() === '') {
                    // Generate random avatar
                    const randomSeed = Math.random().toString(36).substring(7);
                    avatarImg.src = `https://api.dicebear.com/7.x/avataaars/svg?seed=${randomSeed}`;
                } else {
                    avatarImg.src = avatarUrl;
                }
                showNotification('Avatar updated!', 'success');
            }
        }
        
        function showTwoFactorSetup() {
            // In a real app, this would show 2FA setup modal
            const modalHtml = `
                <div style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.8); display: flex; align-items: center; justify-content: center; z-index: 2000;">
                    <div style="background: var(--theme-card); padding: 30px; border-radius: 20px; max-width: 500px; width: 90%;">
                        <h3 style="color: var(--theme-primary); margin-bottom: 20px;">
                            <i class="fas fa-shield-alt"></i> Two-Factor Authentication Setup
                        </h3>
                        <p style="color: var(--theme-text-secondary); margin-bottom: 20px;">
                            Scan this QR code with your authenticator app:
                        </p>
                        <div style="background: white; padding: 20px; border-radius: 10px; margin-bottom: 20px; text-align: center;">
                            <div style="width: 200px; height: 200px; background: #f0f0f0; margin: 0 auto; display: flex; align-items: center; justify-content: center;">
                                <span style="color: #666;">QR Code Placeholder</span>
                            </div>
                        </div>
                        <p style="color: var(--theme-text-secondary); font-size: 14px; margin-bottom: 20px;">
                            Or enter this code manually: <strong>AI-SCAM-1234-5678</strong>
                        </p>
                        <div style="display: flex; gap: 10px; justify-content: flex-end;">
                            <button onclick="closeTwoFactorModal()" class="btn btn-secondary" style="padding: 10px 20px;">
                                Cancel
                            </button>
                            <button onclick="completeTwoFactorSetup()" class="btn btn-primary" style="padding: 10px 20px;">
                                Complete Setup
                            </button>
                        </div>
                    </div>
                </div>
            `;
            
            const modal = document.createElement('div');
            modal.innerHTML = modalHtml;
            modal.id = 'twoFactorModal';
            document.body.appendChild(modal);
        }
        
        function closeTwoFactorModal() {
            const modal = document.getElementById('twoFactorModal');
            if (modal) {
                modal.remove();
                // Uncheck the toggle if modal is closed
                document.getElementById('twoFactorToggle').checked = false;
            }
        }
        
        function completeTwoFactorSetup() {
            closeTwoFactorModal();
            showNotification('Two-factor authentication enabled!', 'success');
            updateSecurityScore();
        }
        
        function showNotification(message, type = 'info') {
            // Create notification element
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 100px;
                right: 30px;
                background: ${type === 'success' ? 'var(--success)' : type === 'danger' ? 'var(--danger)' : type === 'warning' ? 'var(--warning)' : 'var(--theme-primary)'};
                color: white;
                padding: 15px 25px;
                border-radius: 12px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.3);
                z-index: 3000;
                animation: slideIn 0.3s ease;
                font-weight: 600;
                display: flex;
                align-items: center;
                gap: 10px;
            `;
            
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'danger' ? 'exclamation-circle' : type === 'warning' ? 'exclamation-triangle' : 'info-circle'}"></i>
                ${message}
            `;
            
            document.body.appendChild(notification);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }
        
        // Add CSS for animations
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
        
        // ========== INITIALIZE ON LOAD ==========
        document.addEventListener('DOMContentLoaded', initializeSettings);
        
        // Auto-update security score when relevant elements change
        document.addEventListener('change', function(e) {
            if (e.target.id === 'autoLogoutSelect' || e.target.id === 'twoFactorToggle') {
                updateSecurityScore();
            }
        });
		
    </script>
</body>
</html>     