/* style-safety-tips.css */
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

/* Desktop: Sidebar always visible */
@media (min-width: 769px) {
    .sidebar {
        transform: translateX(0) !important;
        width: 280px !important;
    }
    .sidebar-closer {
        display: none !important;
    }
}

/* Mobile: Sidebar hidden */
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
    padding: 20px;
    min-height: 100vh;
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.97), rgba(2, 6, 23, 0.98));
    transition: margin-left 0.4s ease;
}

@media (max-width: 768px) {
    .main-content {
        margin-left: 0;
        padding: 15px;
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
    background: linear-gradient(135deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
    padding: 40px 30px;
    border-radius: 20px;
    margin-bottom: 30px;
    border: 2px solid rgba(124, 58, 237, 0.3);
    text-align: center;
}

.main-title {
    font-family: 'Orbitron', sans-serif;
    font-size: 36px;
    font-weight: 900;
    margin-bottom: 15px;
    background: linear-gradient(90deg, #7c3aed, #4f46e5, #a5b4fc);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    line-height: 1.2;
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
    line-height: 1.5;
}

/* Stats bar */
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
        gap: 15px;
    }
}

.stat-item {
    text-align: center;
    padding: 20px;
    background: rgba(0, 0, 0, 0.3);
    border-radius: 15px;
    border: 1px solid rgba(124, 58, 237, 0.2);
}

.stat-number {
    font-size: 28px;
    font-weight: 800;
    color: #7c3aed;
    display: block;
    line-height: 1;
    margin-bottom: 8px;
}

.stat-label {
    font-size: 13px;
    color: #a5b4fc;
    font-weight: 500;
}

/* ========== SCAM TYPES GRID ========== */
.scam-types-section {
    padding: 30px;
    background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
    border-radius: 20px;
    border: 2px solid rgba(124, 58, 237, 0.3);
    margin-bottom: 30px;
}

.section-header {
    text-align: center;
    margin-bottom: 30px;
}

.section-header h2 {
    font-size: 28px;
    font-weight: 800;
    color: #e5e7eb;
    margin-bottom: 10px;
}

@media (max-width: 768px) {
    .section-header h2 {
        font-size: 24px;
    }
}

.section-subtitle {
    font-size: 15px;
    color: #c7d2fe;
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.5;
}

.scam-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
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
    padding: 20px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.scam-card:hover {
    transform: translateY(-5px);
    border-color: #7c3aed;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.scam-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
    font-size: 20px;
    color: white;
}

.scam-card:nth-child(1) .scam-icon {
    background: linear-gradient(135deg, #ef4444, #dc2626);
}

.scam-card:nth-child(2) .scam-icon {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.scam-card:nth-child(3) .scam-icon {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
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
    font-weight: 700;
    color: #e5e7eb;
    margin-bottom: 10px;
}

.scam-stats {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 10px 0;
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

.risk-high { color: #ef4444; }
.risk-medium { color: #f59e0b; }
.risk-low { color: #10b981; }

.reports {
    font-size: 11px;
    color: #a5b4fc;
}

.scam-points {
    list-style: none;
    padding: 0;
}

.scam-points li {
    padding: 6px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: flex-start;
    gap: 8px;
    color: #c7d2fe;
    font-size: 12px;
    line-height: 1.4;
}

.scam-points li:last-child {
    border-bottom: none;
}

.scam-points li i {
    color: #7c3aed;
    font-size: 10px;
    margin-top: 3px;
    flex-shrink: 0;
}

/* ========== RED FLAGS SECTION ========== */
.red-flags-section {
    padding: 30px;
    background: linear-gradient(145deg, rgba(30, 27, 75, 0.9), rgba(2, 6, 23, 0.95));
    border-radius: 20px;
    border: 2px solid rgba(124, 58, 237, 0.3);
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
    width: 35px;
    height: 35px;
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 16px;
    margin-bottom: 15px;
}

.flag-card h4 {
    font-size: 16px;
    color: #e5e7eb;
    margin-bottom: 10px;
    font-weight: 600;
}

.flag-card p {
    color: #c7d2fe;
    font-size: 13px;
    line-height: 1.5;
}

/* ========== EMERGENCY SECTION ========== */
.emergency-section {
    padding: 30px;
    background: linear-gradient(135deg, rgba(220, 38, 38, 0.1), rgba(2, 6, 23, 0.9));
    border-radius: 20px;
    border-top: 3px solid #ef4444;
    border-bottom: 3px solid #ef4444;
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
    padding: 20px;
    text-align: center;
    transition: all 0.3s ease;
}

.emergency-card:hover {
    transform: translateY(-5px);
}

.emergency-icon {
    font-size: 32px;
    color: #ef4444;
    margin-bottom: 15px;
    display: block;
}

.emergency-card h3 {
    font-size: 18px;
    color: #e5e7eb;
    margin-bottom: 10px;
    font-weight: 700;
}

.contact-number {
    font-size: 22px;
    font-weight: 800;
    color: #ef4444;
    margin: 10px 0;
    display: block;
    text-decoration: none;
}

.contact-number:hover {
    color: #fca5a5;
}

.emergency-card p {
    color: #c7d2fe;
    font-size: 13px;
    line-height: 1.5;
}

/* ========== BUTTONS ========== */
.btn {
    display: inline-block;
    padding: 10px 20px;
    background: linear-gradient(135deg, #7c3aed, #4f46e5);
    color: white;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    font-size: 14px;
}

.btn:hover {
    opacity: 0.9;
    transform: translateY(-2px);
}

/* ========== VISITOR COUNTER ========== */
.visitor-counter {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(10px);
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