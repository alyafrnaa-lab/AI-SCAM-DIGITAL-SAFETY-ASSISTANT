<?php
// Check if message was submitted
if (!isset($_POST['message']) || empty(trim($_POST['message']))) {
    header('Location: index.php?error=no_message');
    exit;
}

// Start session for analysis history
session_start();

// Get the message
$message_raw = $_POST['message'];
$message = strtolower($message_raw);

// Initialize arrays
$reasons = [];
$patterns_detected = [];
$risk_score = 0;
$detailed_patterns = [];

// Define scam patterns with scores and categories
$scam_patterns = [
    // HIGH RISK - LOTTERY/PRIZE
    'lottery' => ['score' => 40, 'category' => 'Lottery Scam'],
    'won prize' => ['score' => 35, 'category' => 'Lottery Scam'],
    'congratulations' => ['score' => 30, 'category' => 'Lottery Scam'],
    'you have won' => ['score' => 35, 'category' => 'Lottery Scam'],
    'free gift' => ['score' => 25, 'category' => 'Lottery Scam'],
    'cash prize' => ['score' => 30, 'category' => 'Lottery Scam'],
    
    // HIGH RISK - URGENCY
    'urgent' => ['score' => 25, 'category' => 'Urgency Tactics'],
    'immediately' => ['score' => 20, 'category' => 'Urgency Tactics'],
    'within 24 hours' => ['score' => 30, 'category' => 'Urgency Tactics'],
    'last chance' => ['score' => 20, 'category' => 'Urgency Tactics'],
    'final notice' => ['score' => 25, 'category' => 'Urgency Tactics'],
    'act now' => ['score' => 20, 'category' => 'Urgency Tactics'],
    
    // HIGH RISK - BANKING/FINANCIAL
    'account suspended' => ['score' => 35, 'category' => 'Banking Scam'],
    'account locked' => ['score' => 30, 'category' => 'Banking Scam'],
    'verify your account' => ['score' => 30, 'category' => 'Banking Scam'],
    'bank account' => ['score' => 25, 'category' => 'Banking Scam'],
    'payment required' => ['score' => 25, 'category' => 'Banking Scam'],
    'processing fee' => ['score' => 30, 'category' => 'Banking Scam'],
    
    // CRITICAL RISK - CREDENTIAL THEFT
    'password' => ['score' => 40, 'category' => 'Phishing'],
    'otp' => ['score' => 45, 'category' => 'Phishing'],
    'pin code' => ['score' => 40, 'category' => 'Phishing'],
    'verification code' => ['score' => 35, 'category' => 'Phishing'],
    'login details' => ['score' => 35, 'category' => 'Phishing'],
    
    // MALAYSIAN SPECIFIC
    'maybank' => ['score' => 30, 'category' => 'Bank Impersonation'],
    'cimb' => ['score' => 30, 'category' => 'Bank Impersonation'],
    'public bank' => ['score' => 30, 'category' => 'Bank Impersonation'],
    'touch n go' => ['score' => 25, 'category' => 'E-wallet Scam'],
    'boost' => ['score' => 25, 'category' => 'E-wallet Scam'],
    'duit rahmah' => ['score' => 30, 'category' => 'Government Scam'],
    'bantuan kerajaan' => ['score' => 25, 'category' => 'Government Scam'],
    'lhdn' => ['score' => 35, 'category' => 'Government Scam'],
    
    // MALAY LANGUAGE PATTERNS
    'sila' => ['score' => 15, 'category' => 'Malay Language'],
    'tahniah' => ['score' => 25, 'category' => 'Malay Language'],
    'segera' => ['score' => 25, 'category' => 'Malay Language'],
    'akaun akan disekat' => ['score' => 40, 'category' => 'Banking Scam'],
    'tunggakan bayaran' => ['score' => 30, 'category' => 'Payment Scam'],
    'dalam masa 24 jam' => ['score' => 30, 'category' => 'Urgency Tactics'],
    
    // THREATS & LEGAL
    'legal action' => ['score' => 30, 'category' => 'Threats'],
    'police involved' => ['score' => 35, 'category' => 'Threats'],
    'court case' => ['score' => 30, 'category' => 'Threats'],
    
    // LINKS & REDIRECTS
    'click here' => ['score' => 20, 'category' => 'Suspicious Links'],
    'click link' => ['score' => 20, 'category' => 'Suspicious Links'],
    'http://' => ['score' => 25, 'category' => 'Suspicious Links'],
    'https://' => ['score' => 25, 'category' => 'Suspicious Links'],
    
    // INVESTMENT SCAMS
    'investment' => ['score' => 25, 'category' => 'Investment Scam'],
    'guaranteed profit' => ['score' => 40, 'category' => 'Investment Scam'],
    'passive income' => ['score' => 30, 'category' => 'Investment Scam'],
    'crypto' => ['score' => 20, 'category' => 'Investment Scam'],
    'forex' => ['score' => 20, 'category' => 'Investment Scam'],
    
    // LOVE SCAMS
    'darling' => ['score' => 20, 'category' => 'Romance Scam'],
    'sweetheart' => ['score' => 20, 'category' => 'Romance Scam'],
    'emergency money' => ['score' => 35, 'category' => 'Romance Scam'],
    'hospital bill' => ['score' => 30, 'category' => 'Romance Scam'],
    
    // PACKAGE SCAMS
    'parcel' => ['score' => 25, 'category' => 'Delivery Scam'],
    'customs fee' => ['score' => 30, 'category' => 'Delivery Scam'],
    'delivery charge' => ['score' => 25, 'category' => 'Delivery Scam'],
    
    // PERSONAL INFO
    'ic number' => ['score' => 40, 'category' => 'Identity Theft'],
    'identity card' => ['score' => 35, 'category' => 'Identity Theft'],
    'personal details' => ['score' => 30, 'category' => 'Identity Theft'],
    
    // MISCELLANEOUS
    'limited offer' => ['score' => 20, 'category' => 'Pressure Tactics'],
    'exclusive deal' => ['score' => 20, 'category' => 'Pressure Tactics'],
    '100% safe' => ['score' => 25, 'category' => 'False Assurance'],
    'trust me' => ['score' => 20, 'category' => 'False Assurance'],
];

// Analyze message for patterns
foreach ($scam_patterns as $pattern => $data) {
    if (strpos($message, $pattern) !== false) {
        $risk_score += $data['score'];
        $patterns_detected[] = $pattern;
        $detailed_patterns[] = [
            'pattern' => $pattern,
            'score' => $data['score'],
            'category' => $data['category']
        ];
        $reasons[] = "Detected '$pattern' ({$data['category']}) (+{$data['score']} points)";
    }
}

// Additional checks with detailed categorization
$additional_checks = [
    // Malaysian phone numbers
    'Malaysian phone number' => [
        'regex' => '/(01[0-9]-[0-9]{7,8}|\+60\s?[0-9]{2}-?[0-9]{7,8})/',
        'score' => 20,
        'category' => 'Contact Information'
    ],
    // Malaysian currency
    'Malaysian currency (RM)' => [
        'regex' => '/(RM\s?\d+|\d+\s?ringgit)/i',
        'score' => 15,
        'category' => 'Financial'
    ],
    // Suspicious domains
    'URL shortener' => [
        'check' => function($msg) {
            $suspicious_domains = ['bit.ly', 'tinyurl.com', 'goo.gl', 'short.url', 'cutt.ly'];
            foreach ($suspicious_domains as $domain) {
                if (strpos($msg, $domain) !== false) return $domain;
            }
            return false;
        },
        'score' => 25,
        'category' => 'Suspicious Links'
    ],
    // Excessive capitals
    'Excessive capital letters' => [
        'check' => function($msg_raw) {
            $uppercase_ratio = strlen(preg_replace('/[^A-Z]/', '', $msg_raw)) / max(strlen($msg_raw), 1);
            return $uppercase_ratio > 0.3;
        },
        'score' => 20,
        'category' => 'Suspicious Formatting'
    ],
    // Multiple exclamation marks
    'Multiple exclamation marks' => [
        'check' => function($msg_raw) {
            return substr_count($msg_raw, '!') > 2;
        },
        'score' => 15,
        'category' => 'Suspicious Formatting'
    ],
];

foreach ($additional_checks as $check_name => $check_data) {
    $detected = false;
    $details = '';
    
    if (isset($check_data['regex'])) {
        if (preg_match($check_data['regex'], $message)) {
            $detected = true;
            $details = $check_name;
        }
    } elseif (isset($check_data['check'])) {
        $result = $check_data['check']($message_raw);
        if ($result !== false) {
            $detected = true;
            $details = $check_name . ($result !== true ? ": $result" : '');
        }
    }
    
    if ($detected) {
        $risk_score += $check_data['score'];
        $reasons[] = "$details (+{$check_data['score']} points)";
    }
}

// Detect language
$english_words = ['the', 'and', 'for', 'you', 'your', 'this', 'that', 'with'];
$malay_words = ['saya', 'anda', 'dengan', 'untuk', 'yang', 'di', 'pada'];
$english_count = 0;
$malay_count = 0;

foreach ($english_words as $word) {
    if (strpos($message, ' ' . $word . ' ') !== false) $english_count++;
}
foreach ($malay_words as $word) {
    if (strpos($message, ' ' . $word . ' ') !== false) $malay_count++;
}

if ($english_count > $malay_count && $english_count >= 2) {
    $detected_language = 'English';
} elseif ($malay_count > $english_count && $malay_count >= 2) {
    $detected_language = 'Malay';
} else {
    $detected_language = 'Mixed/Unknown';
}

// Count links
preg_match_all('/https?:\/\/[^\s]+/', $message_raw, $links);
$link_count = count($links[0]);

// Count urgency keywords
$urgency_keywords = ['urgent', 'immediately', 'now', 'segera', 'sekarang', '24 hours', 'dalam masa'];
$urgency_count = 0;
foreach ($urgency_keywords as $keyword) {
    $urgency_count += substr_count($message, $keyword);
}

// Calculate urgency level
if ($urgency_count >= 3) $urgency_level = "Very High";
elseif ($urgency_count >= 2) $urgency_level = "High";
elseif ($urgency_count >= 1) $urgency_level = "Medium";
else $urgency_level = "Low";

// Cap score at 100
$risk_score = min($risk_score, 100);

// Determine risk level
if ($risk_score >= 80) {
    $risk_level = "CRITICAL RISK";
    $risk_color = "#ef4444";
    $risk_icon = "fas fa-radiation";
    $advice = "EXTREME CAUTION REQUIRED - LIKELY SCAM";
    $recommendation = "DO NOT RESPOND. DELETE AND REPORT IMMEDIATELY.";
    $risk_class = "critical";
} elseif ($risk_score >= 60) {
    $risk_level = "HIGH RISK";
    $risk_color = "#f97316";
    $risk_icon = "fas fa-triangle-exclamation";
    $advice = "HIGH CAUTION ADVISED - SUSPICIOUS";
    $recommendation = "Do not click links or reply. Delete if unsure.";
    $risk_class = "high";
} elseif ($risk_score >= 40) {
    $risk_level = "MEDIUM RISK";
    $risk_color = "#eab308";
    $risk_icon = "fas fa-exclamation-circle";
    $advice = "PROCEED WITH CAUTION - BE VIGILANT";
    $recommendation = "Verify through official channels before taking action.";
    $risk_class = "medium";
} elseif ($risk_score >= 20) {
    $risk_level = "LOW RISK";
    $risk_color = "#22c55e";
    $risk_icon = "fas fa-check-circle";
    $advice = "LIKELY SAFE - BUT STAY ALERT";
    $recommendation = "No immediate action needed, but remain cautious.";
    $risk_class = "low";
} else {
    $risk_level = "VERY LOW RISK";
    $risk_color = "#16a34a";
    $risk_icon = "fas fa-shield-halved";
    $advice = "PROBABLY SAFE";
    $recommendation = "Message appears legitimate.";
    $risk_class = "safe";
}

// Group patterns by category
$patterns_by_category = [];
foreach ($detailed_patterns as $pattern) {
    $category = $pattern['category'];
    if (!isset($patterns_by_category[$category])) {
        $patterns_by_category[$category] = [];
    }
    $patterns_by_category[$category][] = $pattern;
}

// Detect potential scam type
$scam_types = [];
$type_patterns = [
    'Lottery/Prize Scam' => ['lottery', 'won prize', 'congratulations', 'free gift', 'cash prize', 'tahniah'],
    'Banking/Financial Scam' => ['account suspended', 'account locked', 'bank account', 'payment', 'verify', 'maybank', 'cimb'],
    'Phishing/Identity Theft' => ['password', 'otp', 'pin', 'verification', 'login', 'ic number'],
    'Investment Scam' => ['investment', 'guaranteed profit', 'passive income', 'crypto', 'forex'],
    'Love Scam' => ['darling', 'sweetheart', 'emergency money', 'hospital', 'help me'],
    'Government/Benefit Scam' => ['duit rahmah', 'bantuan kerajaan', 'lhdn', 'kerajaan'],
    'Package/Delivery Scam' => ['parcel', 'customs', 'delivery', 'shipment', 'package'],
];

foreach ($type_patterns as $type => $keywords) {
    foreach ($keywords as $keyword) {
        if (strpos($message, $keyword) !== false) {
            $scam_types[$type] = true;
            break;
        }
    }
}

if (empty($scam_types)) {
    $scam_types = ['General Suspicious Message' => true];
}

// Get detected patterns count
$pattern_count = count($patterns_detected);

// Format timestamp
$analysis_time = date('F j, Y g:i A');

// Save to session for history
if (!isset($_SESSION['analysis_history'])) {
    $_SESSION['analysis_history'] = [];
}

$_SESSION['analysis_history'][] = [
    'timestamp' => $analysis_time,
    'risk_score' => $risk_score,
    'risk_level' => $risk_level,
    'message_preview' => substr($message_raw, 0, 100) . (strlen($message_raw) > 100 ? '...' : '')
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Scam Analysis Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
        }
        
        .container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* ========== HEADER ========== */
        .analysis-header {
            background: linear-gradient(145deg, #020617, #1e1b4b);
            border-bottom: 1px solid #312e81;
            padding: 25px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .logo-section i {
            font-size: 32px;
            color: #7c3aed;
            background: rgba(124, 58, 237, 0.1);
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo-section h1 {
            font-size: 24px;
            font-weight: 700;
            color: #f9fafb;
        }
        
        .logo-section p {
            font-size: 12px;
            color: #94a3b8;
        }
        
        .header-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .action-btn {
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }
        
        .back-btn {
            background: rgba(124, 58, 237, 0.1);
            border: 2px solid #7c3aed;
            color: #a5b4fc;
        }
        
        .back-btn:hover {
            background: rgba(124, 58, 237, 0.2);
            transform: translateY(-3px);
        }
        
        .new-analysis-btn {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            color: white;
            border: none;
            box-shadow: 0 5px 15px rgba(124, 58, 237, 0.3);
        }
        
        .new-analysis-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(124, 58, 237, 0.4);
        }
        
        /* ========== MAIN CONTENT ========== */
        .main-content {
            padding: 30px 0;
        }
        
        /* ========== RISK SCORE SECTION ========== */
        .risk-score-section {
            margin-bottom: 40px;
        }
        
        .risk-score-card {
            background: linear-gradient(145deg, #020617, #1e1b4b);
            border: 2px solid #312e81;
            border-radius: 20px;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }
        
        .risk-score-header {
            display: flex;
            align-items: center;
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .risk-icon-large {
            width: 80px;
            height: 80px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            flex-shrink: 0;
        }
        
        .risk-icon-large.critical { background: rgba(239, 68, 68, 0.15); color: #ef4444; }
        .risk-icon-large.high { background: rgba(245, 115, 22, 0.15); color: #f97316; }
        .risk-icon-large.medium { background: rgba(234, 179, 8, 0.15); color: #eab308; }
        .risk-icon-large.low { background: rgba(34, 197, 94, 0.15); color: #22c55e; }
        .risk-icon-large.safe { background: rgba(22, 163, 74, 0.15); color: #16a34a; }
        
        .risk-text-content {
            flex: 1;
        }
        
        .risk-level {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 10px;
        }
        
        .risk-level.critical { color: #ef4444; }
        .risk-level.high { color: #f97316; }
        .risk-level.medium { color: #eab308; }
        .risk-level.low { color: #22c55e; }
        .risk-level.safe { color: #16a34a; }
        
        .risk-advice-text {
            font-size: 18px;
            color: #c7d2fe;
        }
        
        .score-circle-container {
            display: flex;
            align-items: center;
            gap: 30px;
        }
        
        .score-circle {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background: conic-gradient(
                <?php echo $risk_color; ?> 0% <?php echo $risk_score; ?>%, 
                #312e81 <?php echo $risk_score; ?>% 100%
            );
        }
        
        .score-circle::before {
            content: '';
            position: absolute;
            width: 110px;
            height: 110px;
            background: #020617;
            border-radius: 50%;
            border: 4px solid #312e81;
        }
        
        .score-text {
            font-size: 42px;
            font-weight: 900;
            z-index: 1;
            color: <?php echo $risk_color; ?>;
        }
        
        .score-label {
            text-align: center;
        }
        
        .score-label h4 {
            font-size: 16px;
            color: #c7d2fe;
            margin-bottom: 5px;
        }
        
        .score-label p {
            font-size: 14px;
            color: #94a3b8;
        }
        
        /* ========== ANALYSIS GRID - 3 COLUMNS TERATUR ========== */
        .analysis-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 40px;
        }
        
        @media (max-width: 1200px) {
            .analysis-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .analysis-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .analysis-card {
            background: linear-gradient(145deg, #020617, #1e1b4b);
            border: 2px solid #312e81;
            border-radius: 18px;
            padding: 30px;
            height: 100%;
        }
        
        .card-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #312e81;
        }
        
        .card-header i {
            font-size: 24px;
            color: #7c3aed;
            background: rgba(124, 58, 237, 0.1);
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .card-header h3 {
            font-size: 20px;
            color: #f9fafb;
            font-weight: 700;
        }
        
        /* Message Preview Card */
        .message-preview-box {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid #312e81;
            border-radius: 12px;
            padding: 20px;
            font-family: monospace;
            font-size: 14px;
            max-height: 250px;
            overflow-y: auto;
            margin-bottom: 20px;
            color: #c7d2fe;
            line-height: 1.5;
        }
        
        .message-stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        
        .stat-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .stat-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: rgba(124, 58, 237, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #7c3aed;
            font-size: 14px;
        }
        
        .stat-content {
            flex: 1;
        }
        
        .stat-label {
            font-size: 12px;
            color: #94a3b8;
            margin-bottom: 2px;
        }
        
        .stat-value {
            font-size: 14px;
            color: #f9fafb;
            font-weight: 600;
        }
        
        /* Detected Patterns Card */
        .patterns-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-height: 300px;
            overflow-y: auto;
            padding-right: 10px;
        }
        
        .pattern-item {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid #312e81;
            border-radius: 10px;
            padding: 12px 15px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .pattern-badge {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            background: rgba(124, 58, 237, 0.2);
            color: #a5b4fc;
        }
        
        .pattern-text {
            flex: 1;
            font-size: 13px;
            color: #c7d2fe;
        }
        
        .pattern-score {
            font-weight: 700;
            color: <?php echo $risk_color; ?>;
        }
        
        /* Scam Types Card */
        .scam-types-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }
        
        @media (max-width: 768px) {
            .scam-types-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .scam-type-tag {
            padding: 12px 15px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            text-align: center;
        }
        
        .scam-type-tag.critical {
            background: rgba(239, 68, 68, 0.1);
            border: 2px solid #ef4444;
            color: #ef4444;
        }
        
        .scam-type-tag.high {
            background: rgba(245, 115, 22, 0.1);
            border: 2px solid #f97316;
            color: #f97316;
        }
        
        .scam-type-tag.medium {
            background: rgba(234, 179, 8, 0.1);
            border: 2px solid #eab308;
            color: #eab308;
        }
        
        .scam-type-tag.low {
            background: rgba(34, 197, 94, 0.1);
            border: 2px solid #22c55e;
            color: #22c55e;
        }
        
        /* ========== RECOMMENDATIONS SECTION ========== */
        .recommendations-section {
            margin-bottom: 40px;
        }
        
        .recommendations-card {
            background: linear-gradient(145deg, #020617, #1e1b4b);
            border: 2px solid #312e81;
            border-radius: 18px;
            padding: 35px;
        }
        
        .recommendation-box {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid #312e81;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 5px solid <?php echo $risk_color; ?>;
        }
        
        .recommendation-box h4 {
            color: <?php echo $risk_color; ?>;
            margin-bottom: 15px;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .recommendation-text {
            color: #c7d2fe;
            font-size: 16px;
            line-height: 1.6;
        }
        
        .action-steps-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        
        @media (max-width: 1200px) {
            .action-steps-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .action-steps-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .action-step {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid #312e81;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
        }
        
        .step-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background: rgba(124, 58, 237, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: #7c3aed;
            font-size: 20px;
        }
        
        .step-title {
            color: #f9fafb;
            font-size: 16px;
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .step-description {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.5;
        }
        
        /* ========== PATTERN BREAKDOWN SECTION ========== */
        .pattern-breakdown-section {
            margin-bottom: 40px;
        }
        
        .pattern-categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .pattern-category {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid #312e81;
            border-radius: 12px;
            padding: 20px;
        }
        
        .category-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #312e81;
        }
        
        .category-title {
            font-size: 16px;
            color: #f9fafb;
            font-weight: 600;
        }
        
        .category-score {
            background: <?php echo $risk_color; ?>20;
            color: <?php echo $risk_color; ?>;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .category-patterns {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        
        .category-pattern {
            background: rgba(124, 58, 237, 0.1);
            color: #a5b4fc;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
        }
        
        /* ========== FOOTER ========== */
        .analysis-footer {
            background: linear-gradient(145deg, #020617, #1e1b4b);
            border-top: 1px solid #312e81;
            padding: 40px 0;
            margin-top: 60px;
        }
        
        .footer-content {
            text-align: center;
        }
        
        .disclaimer-box {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid #312e81;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .disclaimer-title {
            color: #f9fafb;
            font-size: 18px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .disclaimer-text {
            color: #c7d2fe;
            font-size: 14px;
            line-height: 1.6;
        }
        
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin: 25px 0;
            flex-wrap: wrap;
        }
        
        .footer-link {
            color: #a5b4fc;
            text-decoration: none;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: color 0.3s ease;
        }
        
        .footer-link:hover {
            color: #7c3aed;
        }
        
        .copyright {
            color: #94a3b8;
            font-size: 13px;
            margin-top: 20px;
        }
        
        /* ========== UTILITY CLASSES ========== */
        .text-center { text-align: center; }
        .text-critical { color: #ef4444; }
        .text-high { color: #f97316; }
        .text-medium { color: #eab308; }
        .text-low { color: #22c55e; }
        .text-safe { color: #16a34a; }
        
        .mb-20 { margin-bottom: 20px; }
        .mb-30 { margin-bottom: 30px; }
        .mb-40 { margin-bottom: 40px; }
        
        /* ========== SCROLLBAR ========== */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #1e1b4b;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #8b5cf6, #6366f1);
        }
        
        /* ========== PRINT STYLES ========== */
        @media print {
            .header-actions,
            .analysis-footer,
            .new-analysis-btn {
                display: none !important;
            }
            
            body {
                background: white !important;
                color: black !important;
            }
            
            .analysis-card,
            .risk-score-card {
                border: 1px solid #ccc !important;
                box-shadow: none !important;
            }
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <header class="analysis-header">
        <div class="container">
            <div class="header-content">
                <div class="logo-section">
                    <i class="fas fa-shield-alt"></i>
                    <div>
                        <h1>AI Scam Analysis Results</h1>
                        <p>Analysis ID: <?php echo date('YmdHis'); ?></p>
                    </div>
                </div>
                
                <div class="header-actions">
                    <a href="index.php" class="action-btn back-btn">
                        <i class="fas fa-arrow-left"></i> Back Home
                    </a>
                    <a href="index.php" class="action-btn new-analysis-btn">
                        <i class="fas fa-redo"></i> New Analysis
                    </a>
                </div>
            </div>
        </div>
    </header>
    
    <!-- MAIN CONTENT -->
    <main class="main-content">
        <div class="container">
            <!-- RISK SCORE SECTION -->
            <section class="risk-score-section">
                <div class="risk-score-card">
                    <div class="risk-score-header">
                        <div class="risk-icon-large <?php echo $risk_class; ?>">
                            <i class="<?php echo $risk_icon; ?>"></i>
                        </div>
                        
                        <div class="risk-text-content">
                            <h2 class="risk-level <?php echo $risk_class; ?>">
                                <?php echo $risk_level; ?>
                            </h2>
                            <p class="risk-advice-text"><?php echo $advice; ?></p>
                        </div>
                        
                        <div class="score-circle-container">
                            <div class="score-circle">
                                <span class="score-text"><?php echo $risk_score; ?>%</span>
                            </div>
                            <div class="score-label">
                                <h4>Risk Score</h4>
                                <p>Based on <?php echo $pattern_count; ?> detected patterns</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <p style="color: #94a3b8; font-size: 14px;">
                            <i class="fas fa-clock"></i> Analysis Time: <?php echo $analysis_time; ?>
                        </p>
                    </div>
                </div>
            </section>
            
            <!-- ANALYSIS GRID - 3 CARDS TERATUR -->
            <section class="analysis-grid mb-40">
                <!-- Message Analysis Card -->
                <div class="analysis-card">
                    <div class="card-header">
                        <i class="fas fa-envelope"></i>
                        <h3>Message Analysis</h3>
                    </div>
                    
                    <div class="message-preview-box">
                        <?php echo nl2br(htmlspecialchars(substr($message_raw, 0, 800)) . (strlen($message_raw) > 800 ? '...' : '')); ?>
                    </div>
                    
                    <div class="message-stats-grid">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-font"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-label">Words</div>
                                <div class="stat-value"><?php echo str_word_count($message_raw); ?></div>
                            </div>
                        </div>
                        
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-link"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-label">Links Found</div>
                                <div class="stat-value"><?php echo $link_count; ?></div>
                            </div>
                        </div>
                        
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-label">Urgency Level</div>
                                <div class="stat-value text-<?php echo $risk_class; ?>"><?php echo $urgency_level; ?></div>
                            </div>
                        </div>
                        
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-language"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-label">Detected Language</div>
                                <div class="stat-value"><?php echo $detected_language; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Detected Patterns Card -->
                <div class="analysis-card">
                    <div class="card-header">
                        <i class="fas fa-search"></i>
                        <h3>Detected Patterns</h3>
                    </div>
                    
                    <div class="patterns-list">
                        <?php if (!empty($reasons)): ?>
                            <?php foreach (array_slice($reasons, 0, 8) as $index => $reason): ?>
                                <div class="pattern-item">
                                    <span class="pattern-badge">#<?php echo $index + 1; ?></span>
                                    <span class="pattern-text"><?php echo $reason; ?></span>
                                </div>
                            <?php endforeach; ?>
                            
                            <?php if (count($reasons) > 8): ?>
                                <div style="color: #94a3b8; font-size: 13px; text-align: center; padding: 10px;">
                                    <i class="fas fa-ellipsis-h"></i> <?php echo count($reasons) - 8; ?> more patterns detected
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div style="color: #94a3b8; font-style: italic; text-align: center; padding: 40px 20px;">
                                <i class="fas fa-check-circle" style="font-size: 32px; margin-bottom: 10px; color: #16a34a;"></i>
                                <p>No scam patterns detected</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Scam Types Card -->
                <div class="analysis-card">
                    <div class="card-header">
                        <i class="fas fa-tags"></i>
                        <h3>Scam Categories</h3>
                    </div>
                    
                    <div class="scam-types-grid">
                        <?php foreach (array_keys($scam_types) as $type): ?>
                            <div class="scam-type-tag <?php echo $risk_class; ?>">
                                <?php echo $type; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div style="margin-top: 25px; padding-top: 20px; border-top: 1px solid #312e81;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                            <span style="color: #c7d2fe; font-size: 14px;">Confidence Level:</span>
                            <span class="text-<?php echo $risk_class; ?>" style="font-weight: 700; font-size: 16px;">
                                <?php 
                                if ($risk_score >= 80) echo 'Very High';
                                elseif ($risk_score >= 60) echo 'High';
                                elseif ($risk_score >= 40) echo 'Medium';
                                elseif ($risk_score >= 20) echo 'Low';
                                else echo 'Very Low';
                                ?>
                            </span>
                        </div>
                        <div style="background: rgba(255,255,255,0.1); height: 8px; border-radius: 4px; overflow: hidden;">
                            <div style="width: <?php echo $risk_score; ?>%; height: 100%; background: <?php echo $risk_color; ?>;"></div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- PATTERN BREAKDOWN SECTION -->
            <?php if (!empty($patterns_by_category)): ?>
            <section class="pattern-breakdown-section mb-40">
                <div class="card-header mb-20">
                    <i class="fas fa-chart-pie"></i>
                    <h3>Pattern Breakdown by Category</h3>
                </div>
                
                <div class="pattern-categories-grid">
                    <?php foreach ($patterns_by_category as $category => $patterns): ?>
                        <?php 
                        $category_score = 0;
                        foreach ($patterns as $pattern) {
                            $category_score += $pattern['score'];
                        }
                        ?>
                        <div class="pattern-category">
                            <div class="category-header">
                                <span class="category-title"><?php echo $category; ?></span>
                                <span class="category-score">+<?php echo $category_score; ?> pts</span>
                            </div>
                            <div class="category-patterns">
                                <?php foreach ($patterns as $pattern): ?>
                                    <span class="category-pattern"><?php echo $pattern['pattern']; ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
            <?php endif; ?>
            
            <!-- RECOMMENDATIONS SECTION -->
            <section class="recommendations-section">
                <div class="recommendations-card">
                    <div class="card-header mb-30">
                        <i class="fas fa-list-check"></i>
                        <h3>Recommended Actions</h3>
                    </div>
                    
                    <div class="recommendation-box mb-30">
                        <h4><i class="fas fa-bullhorn"></i> AI Recommendation</h4>
                        <p class="recommendation-text"><?php echo $recommendation; ?></p>
                    </div>
                    
                    <div class="action-steps-grid">
                        <div class="action-step">
                            <div class="step-icon">
                                <i class="fas fa-ban"></i>
                            </div>
                            <h4 class="step-title">Do Not Engage</h4>
                            <p class="step-description">Do not reply, click links, or call any numbers in the message.</p>
                        </div>
                        
                        <div class="action-step">
                            <div class="step-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h4 class="step-title">Protect Information</h4>
                            <p class="step-description">Never share passwords, OTPs, PINs, or banking details.</p>
                        </div>
                        
                        <div class="action-step">
                            <div class="step-icon">
                                <i class="fas fa-flag"></i>
                            </div>
                            <h4 class="step-title">Report if Necessary</h4>
                            <p class="step-description">Report to relevant platforms if message appears fraudulent.</p>
                        </div>
                        
                        <div class="action-step">
                            <div class="step-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h4 class="step-title">Verify Officially</h4>
                            <p class="step-description">Contact organizations directly using official channels.</p>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- NEW ANALYSIS CTA -->
            <div style="text-align: center; margin: 60px 0;">
                <a href="index.php" class="action-btn new-analysis-btn" style="padding: 18px 45px; font-size: 18px;">
                    <i class="fas fa-redo"></i> Analyze Another Message
                </a>
            </div>
        </div>
    </main>
    
    <!-- FOOTER -->
    <footer class="analysis-footer">
        <div class="container">
            <div class="footer-content">
                <div class="disclaimer-box">
                    <h4 class="disclaimer-title">
                        <i class="fas fa-exclamation-triangle"></i> Important Disclaimer
                    </h4>
                    <p class="disclaimer-text">
                        This AI tool provides risk analysis support only and does not guarantee 100% accuracy. 
                        Always verify suspicious messages through official channels before taking any action. 
                        The system is designed to assist in scam detection but should not replace human judgment.
                    </p>
                </div>
                
                <div class="footer-links">
                    <a href="index.php#safety-tips" class="footer-link">
                        <i class="fas fa-shield-alt"></i> Safety Tips
                    </a>
                    <a href="index.php#report" class="footer-link">
                        <i class="fas fa-flag"></i> Report Scam
                    </a>
                    <a href="index.php#education" class="footer-link">
                        <i class="fas fa-graduation-cap"></i> Education
                    </a>
                    <a href="index.php#about" class="footer-link">
                        <i class="fas fa-info-circle"></i> About Us
                    </a>
                </div>
                
                <p class="copyright">
                    © 2025 AI Scam & Digital Safety Assistant – Malaysian Scam Detection System<br>
                    Analysis performed on <?php echo $analysis_time; ?>
                </p>
            </div>
        </div>
    </footer>
    
    <script>
        // Print functionality
        function printReport() {
            window.print();
        }
        
        // Share functionality
        function shareResults() {
            if (navigator.share) {
                navigator.share({
                    title: 'AI Scam Analysis Results',
                    text: 'My message scored <?php echo $risk_score; ?>% risk level: <?php echo $risk_level; ?>',
                    url: window.location.href
                });
            } else {
                // Fallback for browsers that don't support Web Share API
                const text = `AI Scam Analysis Results:\nRisk Score: <?php echo $risk_score; ?>%\nRisk Level: <?php echo $risk_level; ?>\n\n<?php echo $recommendation; ?>`;
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(text).then(() => {
                        alert('Results copied to clipboard!');
                    });
                } else {
                    prompt('Copy the results:', text);
                }
            }
        }
        
        // Smooth scroll for anchor links
        document.addEventListener('DOMContentLoaded', function() {
            const hash = window.location.hash;
            if (hash) {
                const element = document.querySelector(hash);
                if (element) {
                    setTimeout(() => {
                        element.scrollIntoView({ behavior: 'smooth' });
                    }, 100);
                }
            }
            
            // Add click events for share/print
            const shareBtn = document.getElementById('shareBtn');
            const printBtn = document.getElementById('printBtn');
            
            if (shareBtn) shareBtn.addEventListener('click', shareResults);
            if (printBtn) printBtn.addEventListener('click', printReport);
            
            // Highlight text in message preview on click
            const messagePreview = document.querySelector('.message-preview-box');
            if (messagePreview) {
                messagePreview.addEventListener('click', function() {
                    const range = document.createRange();
                    range.selectNodeContents(this);
                    const selection = window.getSelection();
                    selection.removeAllRanges();
                    selection.addRange(range);
                });
            }
        });
    </script>
</body>
</html>