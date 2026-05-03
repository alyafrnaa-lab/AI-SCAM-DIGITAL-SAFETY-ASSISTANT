<?php
/**
 * Multi-Language Scam Detector
 * Detects scam messages in English and Malay languages with Malaysian context
 * Version: 2.0
 * Author: Scam Detection System
 */

class MultiLanguageScamDetector {
    
    // English scam patterns
    private $patterns = [
        'english' => [
            // Urgency & threats
            'urgent' => 25,
            'urgent!' => 30,
            'immediately' => 20,
            'asap' => 20,
            'within 24 hours' => 30,
            'within 48 hours' => 25,
            'last chance' => 20,
            'final notice' => 25,
            'final warning' => 30,
            'account suspended' => 35,
            'account locked' => 30,
            'account terminated' => 40,
            'legal action' => 30,
            'court case' => 25,
            'lawsuit' => 25,
            'fine' => 20,
            'penalty' => 20,
            'police involved' => 35,
            'arrest warrant' => 40,

            // Security alerts
            'verify your account' => 25,
            'security alert' => 20,
            'security breach' => 25,
            'unauthorized access' => 30,
            'suspicious activity' => 25,
            'login attempt' => 20,
            'password reset required' => 30,

            // Too good to be true
            'congratulations' => 15,
            'congratulations!' => 20,
            'congrats' => 15,
            'you have won' => 30,
            'you are selected' => 25,
            'you have been chosen' => 25,
            'free gift' => 25,
            'free prize' => 20,
            'surprise gift' => 20,
            'cash prize' => 30,
            'cash reward' => 25,
            'government grant' => 25,
            'special assistance' => 20,
            'rebate' => 15,
            'special discount' => 15,
            'limited time offer' => 20,

            // Action required
            'click the link' => 25,
            'click here' => 20,
            'click below' => 20,
            'update your information' => 20,
            'confirm your details' => 20,
            'enter your password' => 40,
            'provide your details' => 25,
            'reply to this message' => 15,
            'contact us immediately' => 20,

            // Financial pressure
            'payment required' => 25,
            'processing fee' => 30,
            'transaction fee' => 25,
            'service charge' => 20,
            'refund' => 15,
            'tax payment' => 20,
            'insurance claim' => 20,
            'investment opportunity' => 20,
            'quick money' => 25,
            'earn fast cash' => 30,
            'guaranteed returns' => 25,

            // Confidentiality
            "don't share" => 20,
            "do not share" => 20,
            'keep this confidential' => 15,
            'for your eyes only' => 15,
            'ignore if already paid' => 25,
            'do not tell anyone' => 20,

            // Phishing specific
            'account verification' => 25,
            'login to secure' => 30,
            'unusual login' => 25,
            'technical issue' => 20,
            'system upgrade' => 15,
            'billing problem' => 20,
        ],
        
        'malay' => [
            // Common Malay words that might appear
            'sila' => 20,
            'anda' => 15,
            'tahniah' => 20,
            'duit' => 15,
            'wang' => 15,
            'bantuan' => 25,
            'kerajaan' => 20,
        ]
    ];

    // Malaysian institutions
    private $malaysianInstitutions = [
        'banks' => [
            'maybank', 'cimb bank', 'public bank', 'hong leong bank', 'ambank', 
            'bank islam', 'bank rakyat', 'bank simpanan nasional', 'bsn',
        ],
        'government' => [
            'lhdn', 'inland revenue board', 'jpj', 'road transport department', 
            'jpn', 'national registration department', 'pos malaysia', 
            'telekom malaysia', 'tnb', 'tenaga nasional',
        ],
        'ewallets' => [
            'touch n go', 'tng ewallet', 'boost', 'grabpay',
            'shopee pay', 'lazada wallet',
        ],
    ];

    // Threat levels
    private $threatLevels = [
        'low' => 50,
        'medium' => 80,
        'high' => 120,
        'critical' => 150
    ];

    // Constructor
    public function __construct() {
        // Initialization if needed
    }

    // Detect language
    public function detectLanguage(string $message): string {
        $message_lower = strtolower($message);
        
        $english_words = [
            'the', 'and', 'for', 'you', 'your', 'this', 'that', 'with', 'have', 'from',
            'are', 'is', 'was', 'were', 'will', 'would', 'could', 'should', 'please',
        ];
        
        $malay_words = ['saya', 'anda', 'dengan', 'untuk', 'yang', 'di', 'pada', 'ini', 'itu'];
        
        $english_count = 0;
        $malay_count = 0;
        
        foreach ($english_words as $word) {
            if (strpos($message_lower, ' ' . $word . ' ') !== false) $english_count++;
        }
        
        foreach ($malay_words as $word) {
            if (strpos($message_lower, ' ' . $word . ' ') !== false) $malay_count++;
        }
        
        if ($english_count >= 3) return 'english';
        if ($malay_count >= 3) return 'malay';
        return 'english';
    }

    // Analyze message
    public function analyzeMessage(string $message, ?string $sender = null): array {
        $results = [
            'language' => $this->detectLanguage($message),
            'score' => 0,
            'threat_level' => 'low',
            'reasons' => [],
            'institutions_detected' => [],
            'malaysian_context' => false,
            'pattern_matches' => [],
            'recommended_action' => 'No action needed'
        ];

        $message_lower = strtolower($message);
        
        // Check institutions
        foreach ($this->malaysianInstitutions as $type => $institutions) {
            foreach ($institutions as $inst) {
                if (strpos($message_lower, $inst) !== false) {
                    $results['institutions_detected'][] = [
                        'name' => ucwords($inst),
                        'type' => $type
                    ];
                    $results['malaysian_context'] = true;
                    
                    if ($type == 'banks') $results['score'] += 25;
                    if ($type == 'government') $results['score'] += 30;
                    if ($type == 'ewallets') $results['score'] += 20;
                    
                    $results['reasons'][] = "Mentions Malaysian $type: $inst";
                }
            }
        }

        $primary_lang = $results['language'];

        // Check primary language patterns
        foreach ($this->patterns[$primary_lang] as $pattern => $score) {
            if (strpos($message_lower, $pattern) !== false) {
                $results['score'] += $score;
                $results['pattern_matches'][] = [
                    'pattern' => $pattern,
                    'language' => $primary_lang,
                    'score' => $score
                ];
                $results['reasons'][] = "$primary_lang pattern: '$pattern'";
            }
        }

        // Also check other language
        if ($primary_lang == 'english') {
            foreach ($this->patterns['malay'] as $pattern => $score) {
                if (strpos($message_lower, $pattern) !== false) {
                    $adjusted_score = $score * 0.7;
                    $results['score'] += $adjusted_score;
                    $results['pattern_matches'][] = [
                        'pattern' => $pattern,
                        'language' => 'malay',
                        'score' => $adjusted_score
                    ];
                    $results['reasons'][] = "Malay pattern: '$pattern'";
                    $results['malaysian_context'] = true;
                }
            }
        }

        // Detect Malaysian phone numbers
        if (preg_match('/(01[0-9]-[0-9]{7,8}|\+60\s?[0-9]{2}-?[0-9]{7,8})/', $message)) {
            $results['score'] += 20;
            $results['reasons'][] = "Malaysian phone number detected";
            $results['malaysian_context'] = true;
        }

        // Detect Malaysian currency
        if (preg_match('/(RM\s?\d+|\d+\s?ringgit)/i', $message)) {
            $results['score'] += 15;
            $results['reasons'][] = "Malaysian currency (RM) mentioned";
            $results['malaysian_context'] = true;
        }

        // Check for suspicious URLs
        if (preg_match('/(bit\.ly|tinyurl\.com|goo\.gl|shorturl)/', $message_lower)) {
            $results['score'] += 25;
            $results['reasons'][] = "Suspicious URL shortener detected";
        }

        // Check for OTP requests
        if (preg_match('/\b(otp|tac|pin|verification code)\b/i', $message)) {
            $results['score'] += 35;
            $results['reasons'][] = "OTP/PIN request detected";
        }

        // Determine threat level
        $results['threat_level'] = $this->getThreatLevel($results['score']);
        
        // Set recommended action
        $results['recommended_action'] = $this->getRecommendedAction($results['threat_level']);

        return $results;
    }

    // Get threat level
    private function getThreatLevel(int $score): string {
        if ($score >= $this->threatLevels['critical']) return 'critical';
        if ($score >= $this->threatLevels['high']) return 'high';
        if ($score >= $this->threatLevels['medium']) return 'medium';
        return 'low';
    }

    // Get recommended action
    private function getRecommendedAction(string $threatLevel): string {
        $actions = [
            'low' => 'Be cautious. Verify information through official channels.',
            'medium' => 'Do not respond. Delete if suspicious.',
            'high' => 'Do not click any links. Report if necessary.',
            'critical' => 'DO NOT RESPOND. REPORT IMMEDIATELY to authorities.'
        ];
        return $actions[$threatLevel] ?? 'Be cautious';
    }

    // Get warning message
    public function getLanguageWarning(string $lang, string $threatLevel = 'low'): array {
        $warnings = [
            'english' => [
                'low' => [
                    'title' => '⚠️ WARNING: Suspicious Message',
                    'message' => 'This message has some scam characteristics.',
                    'tips' => [
                        'Be careful with links',
                        'Do not share personal information',
                        'Verify with official sources'
                    ]
                ],
                'medium' => [
                    'title' => '⚠️⚠️ HIGH WARNING: Potential Scam',
                    'message' => 'This message shows many scam patterns.',
                    'tips' => [
                        'DO NOT click any links',
                        'DO NOT reply to the message',
                        'Contact institutions directly'
                    ]
                ],
                'high' => [
                    'title' => '🛑 CRITICAL WARNING: SCAM LIKELY',
                    'message' => 'This message is highly suspicious!',
                    'tips' => [
                        'DELETE this message',
                        'DO NOT share any information',
                        'Contact your bank immediately'
                    ]
                ],
                'critical' => [
                    'title' => '🛑🚨 CRITICAL ALERT: ACTIVE SCAM 🚨🛑',
                    'message' => 'THIS IS A SCAM! Do not take any action!',
                    'tips' => [
                        'DO NOT CLICK ANY LINKS',
                        'DO NOT PROVIDE INFORMATION',
                        'REPORT IMMEDIATELY TO AUTHORITIES'
                    ]
                ]
            ]
        ];

        return $warnings[$lang][$threatLevel] ?? $warnings['english']['low'];
    }

    // Get detailed report
    public function getDetailedReport(array $analysis): string {
        $report = "========================================\n";
        $report .= "    SCAM DETECTION ANALYSIS REPORT\n";
        $report .= "========================================\n\n";
        
        $report .= "Threat Level: " . strtoupper($analysis['threat_level']) . "\n";
        $report .= "Risk Score: " . $analysis['score'] . " points\n";
        $report .= "Language: " . ucfirst($analysis['language']) . "\n";
        $report .= "Malaysian Context: " . ($analysis['malaysian_context'] ? 'YES' : 'NO') . "\n\n";
        
        if (!empty($analysis['institutions_detected'])) {
            $report .= "INSTITUTIONS DETECTED:\n";
            foreach ($analysis['institutions_detected'] as $inst) {
                $report .= "  • {$inst['name']} ({$inst['type']})\n";
            }
            $report .= "\n";
        }
        
        if (!empty($analysis['reasons'])) {
            $report .= "DETECTION REASONS:\n";
            foreach ($analysis['reasons'] as $reason) {
                $report .= "  • $reason\n";
            }
            $report .= "\n";
        }
        
        $warning = $this->getLanguageWarning($analysis['language'], $analysis['threat_level']);
        $report .= "RECOMMENDED ACTION:\n";
        $report .= "  " . $analysis['recommended_action'] . "\n\n";
        
        $report .= "WARNING:\n";
        $report .= "  {$warning['title']}\n";
        $report .= "  {$warning['message']}\n\n";
        
        $report .= "SAFETY TIPS:\n";
        foreach ($warning['tips'] as $tip) {
            $report .= "  • $tip\n";
        }
        
        $report .= "\n========================================\n";
        $report .= "Report generated by Scam Detector\n";
        $report .= "========================================\n";
        
        return $report;
    }
}

// Handle API requests
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    header('Content-Type: application/json');
    
    $message = $_POST['message'] ?? '';
    $sender = $_POST['sender'] ?? null;
    
    if (empty($message)) {
        echo json_encode(['error' => 'No message provided']);
        exit;
    }
    
    $detector = new MultiLanguageScamDetector();
    $analysis = $detector->analyzeMessage($message, $sender);
    $warning = $detector->getLanguageWarning($analysis['language'], $analysis['threat_level']);
    
    echo json_encode([
        'success' => true,
        'analysis' => $analysis,
        'warning' => $warning,
        'report' => $detector->getDetailedReport($analysis)
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// If not API request, show HTML interface
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scam Message Detector</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .container {
            width: 100%;
            max-width: 900px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        
        header {
            background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
            color: white;
            padding: 25px;
            text-align: center;
        }
        
        h1 {
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        
        .tagline {
            opacity: 0.9;
            font-size: 1rem;
        }
        
        .content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            padding: 25px;
        }
        
        @media (max-width: 768px) {
            .content {
                grid-template-columns: 1fr;
            }
        }
        
        .form-section, .result-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #e9ecef;
        }
        
        h2 {
            color: #1a237e;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e9ecef;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #495057;
        }
        
        textarea, input {
            width: 100%;
            padding: 10px;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
        }
        
        textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: transform 0.2s;
        }
        
        button:hover {
            transform: translateY(-2px);
        }
        
        .example {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
            cursor: pointer;
            text-decoration: underline;
        }
        
        .result {
            display: none;
        }
        
        .threat-indicator {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            text-align: center;
            font-weight: bold;
            font-size: 1.1rem;
        }
        
        .threat-low {
            background: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
        }
        
        .threat-medium {
            background: #fff3cd;
            color: #856404;
            border: 2px solid #ffeaa7;
        }
        
        .threat-high {
            background: #f8d7da;
            color: #721c24;
            border: 2px solid #f5c6cb;
        }
        
        .threat-critical {
            background: #721c24;
            color: white;
            border: 2px solid #dc3545;
            animation: blink 1s infinite;
        }
        
        @keyframes blink {
            0%, 100% { background-color: #721c24; }
            50% { background-color: #a71d2a; }
        }
        
        .score {
            font-size: 1.8rem;
            font-weight: bold;
            text-align: center;
            margin: 15px 0;
            color: #1a237e;
        }
        
        .tip-box {
            background: #e7f3ff;
            padding: 12px;
            border-radius: 8px;
            border-left: 4px solid #007bff;
            margin-bottom: 10px;
        }
        
        .tip-list {
            list-style: none;
            padding-left: 0;
        }
        
        .tip-list li {
            padding: 5px 0;
            padding-left: 20px;
            position: relative;
        }
        
        .tip-list li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #28a745;
            font-weight: bold;
        }
        
        .loading {
            display: none;
            text-align: center;
            padding: 20px;
        }
        
        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #667eea;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 10px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .details {
            background: white;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
            margin-top: 15px;
            font-size: 13px;
        }
        
        .details summary {
            font-weight: 600;
            cursor: pointer;
            padding: 8px;
            background: #f8f9fa;
            border-radius: 5px;
        }
        
        .details pre {
            white-space: pre-wrap;
            word-wrap: break-word;
            margin-top: 10px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
            font-family: monospace;
            font-size: 12px;
            max-height: 200px;
            overflow-y: auto;
        }
        
        .badge {
            display: inline-block;
            background: #e3f2fd;
            color: #1565c0;
            padding: 3px 8px;
            border-radius: 15px;
            font-size: 11px;
            margin: 2px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>🔍 Scam Message Detector</h1>
            <p class="tagline">Detect suspicious messages in English with Malaysian context</p>
        </header>
        
        <div class="content">
            <div class="form-section">
                <h2>Analyze Message</h2>
                <form id="scamForm">
                    <div class="form-group">
                        <label for="message">Enter suspicious message:</label>
                        <textarea id="message" name="message" required>URGENT: Your Maybank account has been suspended. Click here to verify: http://bit.ly/maybank-verify</textarea>
                        <div class="example" onclick="loadExample(1)">Example 1: Bank account suspension</div>
                        <div class="example" onclick="loadExample(2)">Example 2: Lottery winning</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="sender">Sender (optional):</label>
                        <input type="text" id="sender" name="sender" placeholder="Email or phone number">
                    </div>
                    
                    <button type="submit">Analyze Message</button>
                </form>
                
                <div class="loading" id="loading">
                    <div class="spinner"></div>
                    <p>Analyzing message...</p>
                </div>
            </div>
            
            <div class="result-section">
                <h2>Results</h2>
                <div class="result" id="result">
                    <!-- Results will appear here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        const examples = [
            "URGENT: Your Maybank account has been suspended due to suspicious activity. Click here to verify your account immediately: http://bit.ly/maybank-verify-now",
            "CONGRATULATIONS! You have won RM50,000 in the Malaysia Mega Lottery. Claim your prize now by clicking the link. Do not share this message with anyone."
        ];
        
        function loadExample(index) {
            document.getElementById('message').value = examples[index - 1];
        }
        
        document.getElementById('scamForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = e.target;
            const loading = document.getElementById('loading');
            const resultDiv = document.getElementById('result');
            
            // Show loading
            loading.style.display = 'block';
            resultDiv.style.display = 'none';
            
            // Create form data
            const formData = new FormData(form);
            
            // Send request using Fetch API
            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                loading.style.display = 'none';
                
                if (data.error) {
                    resultDiv.innerHTML = `<div class="tip-box">Error: ${data.error}</div>`;
                    resultDiv.style.display = 'block';
                    return;
                }
                
                displayResults(data);
            })
            .catch(error => {
                loading.style.display = 'none';
                resultDiv.innerHTML = `<div class="tip-box">Error: ${error.message}</div>`;
                resultDiv.style.display = 'block';
            });
        });
        
        function displayResults(data) {
            const { analysis, warning } = data;
            const resultDiv = document.getElementById('result');
            
            let html = '';
            
            // Threat level
            const threatClass = `threat-${analysis.threat_level}`;
            html += `<div class="threat-indicator ${threatClass}">${warning.title}</div>`;
            
            // Score
            html += `<div class="score">Score: ${analysis.score}</div>`;
            
            // Warning message
            html += `<div class="tip-box">${warning.message}</div>`;
            
            // Recommended action
            html += `<div class="tip-box">
                <strong>Recommended Action:</strong><br>
                ${analysis.recommended_action}
            </div>`;
            
            // Safety tips
            html += `<div class="tip-box">
                <strong>Safety Tips:</strong>
                <ul class="tip-list">`;
            
            warning.tips.forEach(tip => {
                html += `<li>${tip}</li>`;
            });
            
            html += `</ul></div>`;
            
            // Institutions detected
            if (analysis.institutions_detected.length > 0) {
                html += `<div class="tip-box">
                    <strong>Institutions Detected:</strong><br>`;
                
                analysis.institutions_detected.forEach(inst => {
                    html += `<span class="badge">${inst.name}</span>`;
                });
                
                html += `</div>`;
            }
            
            // Pattern matches
            if (analysis.pattern_matches.length > 0) {
                html += `<div class="tip-box">
                    <strong>Scam Patterns Found:</strong><br>`;
                
                analysis.pattern_matches.slice(0, 3).forEach(match => {
                    html += `<span class="badge">${match.pattern}</span>`;
                });
                
                if (analysis.pattern_matches.length > 3) {
                    html += `<span class="badge">+${analysis.pattern_matches.length - 3} more</span>`;
                }
                
                html += `</div>`;
            }
            
            // Detailed report
            html += `<div class="details">
                <details>
                    <summary>View Detailed Report</summary>
                    <pre>${data.report}</pre>
                </details>
            </div>`;
            
            resultDiv.innerHTML = html;
            resultDiv.style.display = 'block';
        }
        
        // Initialize with example
        loadExample(1);
    </script>
</body>
</html>