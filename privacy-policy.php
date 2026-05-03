<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Privacy Policy - AI Scam Assistant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
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
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--darker) 0%, #1e1b4b 100%);
            color: var(--light);
            line-height: 1.6;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ========== HORIZONTAL NAVBAR (TOP) ========== */
        .top-navbar {
            background: linear-gradient(145deg, rgba(15, 23, 42, 0.98), rgba(2, 6, 23, 0.97));
            backdrop-filter: blur(20px);
            border-bottom: 3px solid var(--danger);
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
            background: linear-gradient(135deg, var(--danger), var(--warning));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav-logo h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 24px;
            font-weight: 900;
            background: linear-gradient(90deg, var(--danger), var(--warning));
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
            transition: all 0.3s ease;
            background: rgba(239, 68, 68, 0.1);
            border: 2px solid transparent;
        }

        .nav-link:hover {
            background: rgba(239, 68, 68, 0.2);
            color: var(--light);
            transform: translateY(-3px);
            border-color: var(--danger);
        }

        .nav-link.active {
            background: linear-gradient(135deg, var(--danger), var(--warning));
            color: white;
            border-color: var(--danger);
        }

        /* ========== MAIN CONTAINER ========== */
        .main-container {
            max-width: 1000px;
            margin: 120px auto 40px;
            padding: 0 20px;
        }

        /* ========== HEADER SECTION ========== */
        .header-section {
            text-align: center;
            margin-bottom: 50px;
        }

        .header-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 42px;
            font-weight: 900;
            background: linear-gradient(90deg, var(--accent), var(--primary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 20px;
        }

        .header-subtitle {
            font-size: 18px;
            color: #c7d2fe;
            max-width: 700px;
            margin: 0 auto;
        }

        /* ========== QUICK SUMMARY CARDS ========== */
        .summary-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
        }

        .summary-card {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 2px solid;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .summary-card:hover {
            transform: translateY(-5px);
        }

        .summary-card.blue {
            border-color: var(--accent);
        }

        .summary-card.green {
            border-color: var(--success);
        }

        .summary-card.purple {
            border-color: var(--primary);
        }

        .summary-card.red {
            border-color: var(--danger);
        }

        .summary-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 28px;
        }

        .summary-card.blue .summary-icon {
            background: rgba(6, 182, 212, 0.15);
            color: var(--accent);
        }

        .summary-card.green .summary-icon {
            background: rgba(34, 197, 94, 0.15);
            color: var(--success);
        }

        .summary-card.purple .summary-icon {
            background: rgba(124, 58, 237, 0.15);
            color: var(--primary);
        }

        .summary-card.red .summary-icon {
            background: rgba(239, 68, 68, 0.15);
            color: var(--danger);
        }

        .summary-title {
            font-size: 20px;
            color: var(--light);
            margin-bottom: 15px;
            font-weight: 700;
        }

        .summary-text {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.6;
        }

        /* ========== KEY POINTS SECTION ========== */
        .keypoints-section {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 2px solid var(--primary);
            border-radius: 25px;
            padding: 40px;
            margin-bottom: 40px;
        }

        .section-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 28px;
            color: var(--light);
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .section-title i {
            color: var(--primary);
        }

        .keypoints-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .keypoint-item {
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }

        .keypoint-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: rgba(124, 58, 237, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: var(--primary);
            flex-shrink: 0;
        }

        .keypoint-content h4 {
            color: var(--light);
            font-size: 18px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .keypoint-content p {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.6;
        }

        /* ========== SIMPLE POLICY TEXT ========== */
        .policy-text {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 2px solid var(--accent);
            border-radius: 25px;
            padding: 40px;
            margin-bottom: 40px;
        }

        .policy-text p {
            color: #c7d2fe;
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .policy-text strong {
            color: var(--light);
        }

        /* ========== FAQ SIMPLE ========== */
        .faq-simple {
            background: linear-gradient(145deg, var(--card-bg), rgba(2, 6, 23, 0.95));
            border: 2px solid var(--warning);
            border-radius: 25px;
            padding: 40px;
            margin-bottom: 40px;
        }

        .faq-item-simple {
            margin-bottom: 25px;
            padding-bottom: 25px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .faq-item-simple:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .faq-question-simple {
            color: var(--light);
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .faq-question-simple i {
            color: var(--warning);
        }

        .faq-answer-simple {
            color: #c7d2fe;
            font-size: 15px;
            line-height: 1.6;
            padding-left: 30px;
        }

        /* ========== ACTION BUTTONS SIMPLE ========== */
        .action-section {
            text-align: center;
            margin: 50px 0;
        }

        .action-buttons-simple {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .action-btn-simple {
            padding: 16px 35px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .action-btn-simple:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.3);
        }

        .action-btn-simple.secondary {
            background: rgba(124, 58, 237, 0.15);
            border: 2px solid var(--primary);
            color: #c7d2fe;
        }

        .action-btn-simple.secondary:hover {
            background: rgba(124, 58, 237, 0.25);
            color: white;
        }

        /* ========== FOOTER SIMPLE ========== */
        .footer-simple {
            background: linear-gradient(145deg, rgba(15, 23, 42, 0.95), rgba(2, 6, 23, 0.97));
            border-top: 3px solid var(--danger);
            padding: 40px 30px;
            margin-top: 60px;
            border-radius: 25px 25px 0 0;
        }

        .footer-content-simple {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-column-simple h4 {
            font-size: 18px;
            color: var(--light);
            margin-bottom: 20px;
            font-weight: 700;
        }

        .footer-links-simple {
            list-style: none;
        }

        .footer-links-simple li {
            margin-bottom: 12px;
        }

        .footer-links-simple a {
            color: #c7d2fe;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-links-simple a:hover {
            color: var(--danger);
        }

        .footer-bottom-simple {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #6b7280;
            font-size: 14px;
        }

        /* ========== RESPONSIVE DESIGN ========== */
        @media (max-width: 768px) {
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
            
            .main-container {
                margin-top: 140px;
            }
            
            .header-title {
                font-size: 32px;
            }
            
            .summary-section {
                grid-template-columns: 1fr;
            }
            
            .keypoints-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons-simple {
                flex-direction: column;
            }
            
            .action-btn-simple {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .header-title {
                font-size: 28px;
            }
            
            .section-title {
                font-size: 24px;
            }
            
            .keypoint-item {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .keypoint-icon {
                margin: 0 auto;
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
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="top-navbar">
        <div class="nav-logo">
            <i class="fas fa-shield-alt"></i>
            <h1>AI Scam Assistant</h1>
        </div>
        
        <div class="nav-links">
            <a href="index.php" class="nav-link">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="report-scam.php" class="nav-link">
                <i class="fas fa-flag"></i>
                <span>Report Scam</span>
            </a>
            <a href="privacy-policy.html" class="nav-link active">
                <i class="fas fa-lock"></i>
                <span>Privacy</span>
            </a>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="main-container">
        <!-- HEADER -->
        <section class="header-section">
            <h1 class="header-title">Privacy Policy</h1>
            <p class="header-subtitle">
                Simple & clear explanation of how we protect your information
            </p>
        </section>

        <!-- QUICK SUMMARY CARDS -->
        <div class="summary-section">
            <div class="summary-card blue">
                <div class="summary-icon">
                    <i class="fas fa-user-secret"></i>
                </div>
                <h3 class="summary-title">Anonymous Reporting</h3>
                <p class="summary-text">You can report scams without sharing personal info. All reports are anonymized.</p>
            </div>
            
            <div class="summary-card green">
                <div class="summary-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="summary-title">Data Protection</h3>
                <p class="summary-text">We follow Malaysia's PDPA 2010. Your data is encrypted and secure.</p>
            </div>
            
            <div class="summary-card purple">
                <div class="summary-icon">
                    <i class="fas fa-ban"></i>
                </div>
                <h3 class="summary-title">No Data Selling</h3>
                <p class="summary-text">We never sell or share your personal data with third parties for marketing.</p>
            </div>
            
            <div class="summary-card red">
                <div class="summary-icon">
                    <i class="fas fa-trash-alt"></i>
                </div>
                <h3 class="summary-title">Auto Deletion</h3>
                <p class="summary-text">Personal data automatically deleted after 30 days unless needed for investigation.</p>
            </div>
        </div>

        <!-- KEY POINTS -->
        <section class="keypoints-section">
            <h2 class="section-title">
                <i class="fas fa-key"></i> Key Privacy Points
            </h2>
            
            <div class="keypoints-grid">
                <div class="keypoint-item">
                    <div class="keypoint-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <div class="keypoint-content">
                        <h4>What We Collect</h4>
                        <p>Only scam details you provide. No unnecessary personal information.</p>
                    </div>
                </div>
                
                <div class="keypoint-item">
                    <div class="keypoint-icon">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <div class="keypoint-content">
                        <h4>Who We Share With</h4>
                        <p>Only Malaysian authorities (PDRM, CyberSecurity) - anonymized data only.</p>
                    </div>
                </div>
                
                <div class="keypoint-item">
                    <div class="keypoint-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="keypoint-content">
                        <h4>Data Security</h4>
                        <p>Military-grade encryption and strict access controls protect your information.</p>
                    </div>
                </div>
                
                <div class="keypoint-item">
                    <div class="keypoint-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="keypoint-content">
                        <h4>Your Rights</h4>
                        <p>Access, correct, or delete your data anytime. Contact our DPO for help.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SIMPLE POLICY TEXT -->
        <section class="policy-text">
            <h2 class="section-title">
                <i class="fas fa-file-alt"></i> Simple Explanation
            </h2>
            
            <p><strong>AI Scam Assistant</strong> is built to protect Malaysians from online scams. We take your privacy seriously.</p>
            
            <p>When you report a scam, we only collect the information needed to analyze and prevent similar scams. You can choose to report anonymously - no personal info required.</p>
            
            <p>All data is encrypted and stored securely in Malaysia. We follow PDPA 2010 regulations. Personal information is automatically deleted after 30 days.</p>
            
            <p>We share anonymized data with Malaysian authorities (PDRM, CyberSecurity) to help fight scams nationwide. We never sell your data to advertisers or third parties.</p>
        </section>

        <!-- FAQ SIMPLE -->
        <section class="faq-simple">
            <h2 class="section-title">
                <i class="fas fa-question-circle"></i> Quick Questions
            </h2>
            
            <div class="faq-item-simple">
                <div class="faq-question-simple">
                    <i class="fas fa-question"></i>
                    Is my report really anonymous?
                </div>
                <div class="faq-answer-simple">
                    Yes! When you choose anonymous reporting, we don't collect any personal information. Your IP address is anonymized too.
                </div>
            </div>
            
            <div class="faq-item-simple">
                <div class="faq-question-simple">
                    <i class="fas fa-question"></i>
                    How long do you keep my data?
                </div>
                <div class="faq-answer-simple">
                    Personal data: 30 days maximum. Anonymized statistics: 2 years for analysis. Technical logs: 90 days for security.
                </div>
            </div>
            
            <div class="faq-item-simple">
                <div class="faq-question-simple">
                    <i class="fas fa-question"></i>
                    Can I delete my report?
                </div>
                <div class="faq-answer-simple">
                    Yes! Email our Data Protection Officer with your report ID. We'll delete it within 14 working days.
                </div>
            </div>
            
            <div class="faq-item-simple">
                <div class="faq-question-simple">
                    <i class="fas fa-question"></i>
                    Do you sell my data?
                </div>
                <div class="faq-answer-simple">
                    <strong>Absolutely NOT.</strong> We never sell, trade, or rent your personal information. Ever.
                </div>
            </div>
        </section>

        <!-- CONTACT SIMPLE -->
        <section class="policy-text">
            <h2 class="section-title">
                <i class="fas fa-headset"></i> Need Help?
            </h2>
            
            <p><strong>Data Protection Officer:</strong> dpo@aiscamassistant.my</p>
            <p><strong>Response Time:</strong> Within 14 working days (PDPA requirement)</p>
            <p><strong>Emergency:</strong> For scam emergencies, call Police (999) or CyberSecurity Malaysia (1-300-88-2999)</p>
        </section>

        <!-- ACTION BUTTONS -->
        <div class="action-section">
            <div class="action-buttons-simple">
                <a href="report-scam.php" class="action-btn-simple">
                    <i class="fas fa-flag"></i> Report a Scam
                </a>
                <a href="index.php" class="action-btn-simple secondary">
                    <i class="fas fa-home"></i> Back to Home
                </a>
                <button onclick="printSimple()" class="action-btn-simple secondary">
                    <i class="fas fa-print"></i> Print Summary
                </button>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer-simple">
        <div class="footer-content-simple">
            <div class="footer-column-simple">
                <h4>Quick Links</h4>
                <ul class="footer-links-simple">
                    <li><a href="index.php"><i class="fas fa-chevron-right"></i> Home</a></li>
                    <li><a href="report-scam.php"><i class="fas fa-chevron-right"></i> Report Scam</a></li>
                    <li><a href="scam-detection.php"><i class="fas fa-chevron-right"></i> Check Message</a></li>
                    <li><a href="safety-tips.php"><i class="fas fa-chevron-right"></i> Safety Tips</a></li>
                </ul>
            </div>
            
            <div class="footer-column-simple">
                <h4>Emergency Contacts</h4>
                <ul class="footer-links-simple">
                    <li><a href="tel:999"><i class="fas fa-phone"></i> Police: 999</a></li>
                    <li><a href="tel:1300882999"><i class="fas fa-shield-alt"></i> CyberSecurity</a></li>
                    <li><a href="tel:1300885465"><i class="fas fa-university"></i> Bank Negara</a></li>
                </ul>
            </div>
            
            <div class="footer-column-simple">
                <h4>Legal</h4>
                <ul class="footer-links-simple">
                    <li><a href="privacy-policy.html"><i class="fas fa-chevron-right"></i> Privacy Policy</a></li>
                    <li><a href="terms-of-service.html"><i class="fas fa-chevron-right"></i> Terms of Service</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> PDPA 2010 Info</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom-simple">
            <p>© 2025 AI Scam Assistant | Protecting Malaysians from online scams</p>
            <p style="margin-top: 10px; font-size: 12px;">This privacy policy complies with Malaysia's Personal Data Protection Act 2010</p>
        </div>
    </footer>

    <script>
        // Simple print function
        function printSimple() {
            const printContent = `
                <html>
                <head>
                    <title>Privacy Summary - AI Scam Assistant</title>
                    <style>
                        body { font-family: Arial, sans-serif; padding: 20px; line-height: 1.6; }
                        .header { text-align: center; border-bottom: 2px solid #333; padding-bottom: 20px; margin-bottom: 30px; }
                        h1 { color: #333; }
                        h2 { color: #444; margin-top: 25px; }
                        .card { background: #f5f5f5; border-left: 4px solid #0066cc; padding: 15px; margin: 15px 0; border-radius: 5px; }
                        .point { margin: 10px 0; padding-left: 20px; position: relative; }
                        .point:before { content: "✓"; color: #00cc66; position: absolute; left: 0; }
                        .contact { background: #fff8e1; border: 1px solid #ffd54f; padding: 15px; border-radius: 5px; margin: 20px 0; }
                        .footer { margin-top: 40px; text-align: center; color: #666; font-size: 12px; border-top: 1px solid #ccc; padding-top: 20px; }
                        @media print { .no-print { display: none; } }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h1>Privacy Policy Summary</h1>
                        <p><strong>AI Scam Assistant</strong> | Simple & Clear Privacy Information</p>
                        <p>Printed: ${new Date().toLocaleDateString()}</p>
                    </div>
                    
                    <div class="card">
                        <h2>Quick Summary</h2>
                        <div class="point">✅ Anonymous reporting available</div>
                        <div class="point">✅ No personal data required</div>
                        <div class="point">✅ Data encrypted & secure</div>
                        <div class="point">✅ Automatic deletion after 30 days</div>
                        <div class="point">✅ Never sold to third parties</div>
                    </div>
                    
                    <h2>Key Points</h2>
                    <p><strong>1. What We Collect:</strong> Only scam details you provide</p>
                    <p><strong>2. Data Security:</strong> Military-grade encryption used</p>
                    <p><strong>3. Data Sharing:</strong> Only with Malaysian authorities (anonymized)</p>
                    <p><strong>4. Your Rights:</strong> Access, correct, or delete your data anytime</p>
                    
                    <div class="contact">
                        <h2>Contact Information</h2>
                        <p><strong>Data Protection Officer:</strong> dpo@aiscamassistant.my</p>
                        <p><strong>Response Time:</strong> Within 14 working days</p>
                        <p><strong>Emergency:</strong> Police (999) | CyberSecurity (1-300-88-2999)</p>
                    </div>
                    
                    <div class="footer">
                        <p>Full privacy policy available at: aiscamassistant.my/privacy-policy</p>
                        <p>© ${new Date().getFullYear()} AI Scam Assistant. All Rights Reserved.</p>
                        <p>Compliant with Malaysia's Personal Data Protection Act 2010</p>
                    </div>
                </body>
                </html>
            `;
            
            const printWindow = window.open('', '_blank');
            printWindow.document.write(printContent);
            printWindow.document.close();
            printWindow.print();
        }

        // Simple scroll to top
        window.addEventListener('scroll', function() {
            const scrollBtn = document.getElementById('scrollTopBtn');
            if (scrollBtn) {
                scrollBtn.style.display = window.scrollY > 300 ? 'block' : 'none';
            }
        });

        // Add scroll to top button
        document.addEventListener('DOMContentLoaded', function() {
            const scrollBtn = document.createElement('button');
            scrollBtn.id = 'scrollTopBtn';
            scrollBtn.innerHTML = '<i class="fas fa-chevron-up"></i>';
            scrollBtn.style.cssText = `
                position: fixed;
                bottom: 30px;
                right: 30px;
                width: 50px;
                height: 50px;
                background: linear-gradient(135deg, var(--primary), var(--secondary));
                border: none;
                border-radius: 50%;
                color: white;
                font-size: 20px;
                cursor: pointer;
                display: none;
                z-index: 100;
                box-shadow: 0 5px 15px rgba(124, 58, 237, 0.3);
            `;
            scrollBtn.onclick = function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            };
            document.body.appendChild(scrollBtn);

            // Set current year in footer
            document.querySelector('.footer-bottom-simple p').innerHTML = 
                document.querySelector('.footer-bottom-simple p').innerHTML.replace('2025', new Date().getFullYear());
        });
    </script>
</body>
</html>