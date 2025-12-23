<?php
/**
 * Rexo Agency - Home Page
 * The "Authority" Page with 10+ Scrollable Sections
 */
require_once 'db_connect.php';

// Fetch featured case study
$pdo = getDBConnection();
$stmt = $pdo->query("SELECT * FROM case_studies WHERE featured = 1 LIMIT 1");
$featuredCaseStudy = $stmt->fetch();

// Get stats
$totalCampaigns = 847;
$totalCreators = 12500;
$totalViews = 500000000;
$totalRevenue = 50000000;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rexo Agency - India's Leading Influencer Marketing Platform</title>
    <meta name="description" content="Rexo Agency delivers ROI-driven influencer marketing campaigns. From Instagram to Gaming, we connect brands with authentic creators.">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-brutal">
        <div class="container">
            <a class="navbar-brand" href="index.php">Rexo<span>Agency</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon">☰</span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#case-studies">Case Studies</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item"><a class="btn-brutal btn-brutal-sm btn-nav" href="dashboard.php">Dashboard</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="btn-brutal btn-brutal-sm btn-brutal-outline btn-nav" href="auth.php">Login</a></li>
                        <li class="nav-item"><a class="btn-brutal btn-brutal-sm btn-nav" href="auth.php?mode=register">Get Started</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Section 1: Hero Section -->
    <section class="hero-section section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content fade-in">
                        <h1>
                            <span class="highlight">Influencer Marketing</span><br>
                            That Actually <br>Delivers Results
                        </h1>
                        <p>We're not just another agency. We're your growth partner. With AI-powered creator discovery, real-time analytics, and fraud detection, we ensure every rupee of your marketing budget generates measurable ROI.</p>
                        <div class="hero-buttons">
                            <a href="auth.php?mode=register" class="btn-brutal btn-brutal-lg">Start Your Campaign</a>
                            <a href="#roi-calculator" class="btn-brutal btn-brutal-lg btn-brutal-outline">Calculate Your ROI</a>
                        </div>
                        <div class="hero-stats d-flex gap-4 mt-5">
                            <div>
                                <span class="d-block" style="font-size: 2rem; font-weight: 900; font-family: var(--font-heading);">500M+</span>
                                <span style="opacity: 0.7;">Views Delivered</span>
                            </div>
                            <div>
                                <span class="d-block" style="font-size: 2rem; font-weight: 900; font-family: var(--font-heading);">₹5Cr+</span>
                                <span style="opacity: 0.7;">Revenue Generated</span>
                            </div>
                            <div>
                                <span class="d-block" style="font-size: 2rem; font-weight: 900; font-family: var(--font-heading);">12K+</span>
                                <span style="opacity: 0.7;">Creators Network</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="hero-image fade-in" style="transition-delay: 0.3s;">
                        <img src="https://placehold.co/600x500/1a1a1a/FFD700?text=Influencer+Marketing+Excellence" alt="Influencer Marketing" style="width: 100%;">
                        <div class="hero-floating-card top-right bg-yellow">
                            <span style="font-weight: 700; font-family: var(--font-heading);">🎯 60% Lower CPI</span>
                        </div>
                        <div class="hero-floating-card bottom-left bg-green">
                            <span style="font-weight: 700; font-family: var(--font-heading);">📈 340% Avg ROI</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Live Ticker -->
    <section class="ticker-section">
        <div class="ticker-wrapper">
            <div class="ticker-item"><span class="icon">🔥</span> ₹5Cr+ Revenue Generated for Clients</div>
            <div class="ticker-item"><span class="icon">👁️</span> 500M+ Views Delivered This Year</div>
            <div class="ticker-item"><span class="icon">🎮</span> 50+ Gaming App Launches Successful</div>
            <div class="ticker-item"><span class="icon">😂</span> 100+ Viral Meme Campaigns</div>
            <div class="ticker-item"><span class="icon">📱</span> 12M+ App Installs Driven</div>
            <div class="ticker-item"><span class="icon">🌟</span> 12,500+ Verified Creators</div>
            <div class="ticker-item"><span class="icon">🏆</span> 847 Successful Campaigns</div>
            <div class="ticker-item"><span class="icon">💯</span> 98% Client Satisfaction Rate</div>
            <div class="ticker-item"><span class="icon">🔥</span> ₹5Cr+ Revenue Generated for Clients</div>
            <div class="ticker-item"><span class="icon">👁️</span> 500M+ Views Delivered This Year</div>
            <div class="ticker-item"><span class="icon">🎮</span> 50+ Gaming App Launches Successful</div>
            <div class="ticker-item"><span class="icon">😂</span> 100+ Viral Meme Campaigns</div>
        </div>
    </section>

    <!-- Section 3: Services Grid (8 Services) -->
    <section class="section" id="services-preview">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Our Services</h2>
                <p>Comprehensive influencer marketing solutions tailored to your brand's unique needs. From nano-influencers to celebrity partnerships, we cover the entire spectrum.</p>
            </div>
            
            <div class="service-grid">
                <!-- Service 1: Instagram Marketing -->
                <div class="service-card fade-in stagger-1">
                    <div class="icon bg-pink">📸</div>
                    <h4>Instagram Marketing</h4>
                    <p>Dominate the visual platform with strategic influencer partnerships, Reels campaigns, and Story takeovers.</p>
                    <ul>
                        <li>Feed Posts & Carousels</li>
                        <li>Reels & IGTV Content</li>
                        <li>Story Campaigns</li>
                        <li>Live Collaborations</li>
                    </ul>
                </div>

                <!-- Service 2: YouTube Marketing -->
                <div class="service-card fade-in stagger-2">
                    <div class="icon bg-orange">▶️</div>
                    <h4>YouTube Marketing</h4>
                    <p>Long-form content that builds trust. Integrate your brand into tutorials, reviews, and vlogs watched by millions.</p>
                    <ul>
                        <li>Dedicated Reviews</li>
                        <li>Integration Videos</li>
                        <li>Shorts Campaigns</li>
                        <li>Sponsored Streams</li>
                    </ul>
                </div>

                <!-- Service 3: Meme Marketing -->
                <div class="service-card fade-in stagger-3">
                    <div class="icon bg-yellow">😂</div>
                    <h4>Meme Marketing</h4>
                    <p>Tap into viral culture with our network of 500+ meme pages. Create shareable content that drives organic reach.</p>
                    <ul>
                        <li>Twitter Storms</li>
                        <li>Instagram Meme Pages</li>
                        <li>Reddit Campaigns</li>
                        <li>Trend Hijacking</li>
                    </ul>
                </div>

                <!-- Service 4: Gaming & Esports -->
                <div class="service-card fade-in stagger-4">
                    <div class="icon bg-purple" style="background: #9B59B6;">🎮</div>
                    <h4>Gaming & Esports</h4>
                    <p>Reach the gaming community through streamers, esports athletes, and gaming content creators.</p>
                    <ul>
                        <li>Twitch Integrations</li>
                        <li>CPI/CPA Campaigns</li>
                        <li>Tournament Sponsorships</li>
                        <li>In-Game Promotions</li>
                    </ul>
                </div>

                <!-- Service 5: UGC Production -->
                <div class="service-card fade-in stagger-5">
                    <div class="icon bg-blue">🎬</div>
                    <h4>UGC Production</h4>
                    <p>Authentic user-generated content that builds trust. From testimonials to product demos, we handle it all.</p>
                    <ul>
                        <li>Product Testimonials</li>
                        <li>Unboxing Videos</li>
                        <li>How-To Content</li>
                        <li>Lifestyle Integration</li>
                    </ul>
                </div>

                <!-- Service 6: CGI Ads -->
                <div class="service-card fade-in stagger-6">
                    <div class="icon bg-green">✨</div>
                    <h4>CGI & Visual Effects</h4>
                    <p>Stand out with stunning CGI-enhanced content. Perfect for product launches and brand awareness campaigns.</p>
                    <ul>
                        <li>3D Product Renders</li>
                        <li>AR Filters & Effects</li>
                        <li>Animated Explainers</li>
                        <li>Visual Storytelling</li>
                    </ul>
                </div>

                <!-- Service 7: Tech Solutions -->
                <div class="service-card fade-in stagger-7">
                    <div class="icon" style="background: #1a1a1a; color: white;">🤖</div>
                    <h4>AI & Tech Solutions</h4>
                    <p>Leverage AI for smarter campaigns. From fake follower detection to predictive analytics.</p>
                    <ul>
                        <li>Fraud Detection</li>
                        <li>AI Influencer Matching</li>
                        <li>Sentiment Analysis</li>
                        <li>Performance Prediction</li>
                    </ul>
                </div>

                <!-- Service 8: Performance Marketing -->
                <div class="service-card fade-in stagger-8">
                    <div class="icon bg-orange">📊</div>
                    <h4>Performance Marketing</h4>
                    <p>Results-driven campaigns with clear KPIs. Pay for actual conversions, not just impressions.</p>
                    <ul>
                        <li>CPI Campaigns</li>
                        <li>CPA Optimization</li>
                        <li>Affiliate Programs</li>
                        <li>Attribution Tracking</li>
                    </ul>
                </div>
            </div>
            
            <div class="text-center mt-5 fade-in">
                <a href="services.php" class="btn-brutal btn-brutal-lg">Explore All Services</a>
            </div>
        </div>
    </section>

    <!-- Section 4: Stats Counter -->
    <section class="stats-section section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-item fade-in stagger-1">
                        <span class="number counter-value" data-target="847">0</span>
                        <span class="label">Campaigns Delivered</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item fade-in stagger-2">
                        <span class="number counter-value" data-target="12500">0</span>
                        <span class="label">Verified Creators</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item fade-in stagger-3">
                        <span class="number counter-value" data-target="500" data-suffix="M+">0</span>
                        <span class="label">Views Generated</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item fade-in stagger-4">
                        <span class="number counter-value" data-target="340" data-suffix="%">0</span>
                        <span class="label">Average ROI</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: ROI Calculator -->
    <section class="calculator-section section" id="roi-calculator">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="calculator-box fade-in">
                        <h3>📊 ROI Calculator</h3>
                        <p class="text-center mb-4" style="opacity: 0.8;">Enter your campaign budget and preferences to see estimated results</p>
                        
                        <form id="roi-calculator-form">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="calc-input-group">
                                        <label for="calc-budget">Campaign Budget (₹)</label>
                                        <input type="number" id="calc-budget" placeholder="e.g., 500000" min="50000" step="10000" value="500000">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="calc-input-group">
                                        <label for="calc-platform">Primary Platform</label>
                                        <select id="calc-platform">
                                            <option value="instagram">Instagram</option>
                                            <option value="youtube">YouTube</option>
                                            <option value="twitter">Twitter/X</option>
                                            <option value="all">Multi-Platform</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="calc-input-group">
                                        <label for="calc-type">Campaign Goal</label>
                                        <select id="calc-type">
                                            <option value="awareness">Brand Awareness</option>
                                            <option value="engagement">Engagement</option>
                                            <option value="conversion">Conversions/Sales</option>
                                            <option value="ugc">UGC Generation</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="button" id="calc-btn" class="btn-brutal w-100">Calculate My Results</button>
                        </form>
                        
                        <div class="calc-results" style="display: none;">
                            <div class="calc-result-item">
                                <span class="label">Estimated Reach</span>
                                <span class="value" id="result-reach">--</span>
                            </div>
                            <div class="calc-result-item">
                                <span class="label">Expected Engagement Rate</span>
                                <span class="value" id="result-engagement">--</span>
                            </div>
                            <div class="calc-result-item">
                                <span class="label">Estimated Video Views</span>
                                <span class="value" id="result-views">--</span>
                            </div>
                            <div class="calc-result-item">
                                <span class="label">Projected ROI</span>
                                <span class="value" id="result-roi">--</span>
                            </div>
                        </div>
                        
                        <p class="text-center mt-4 mb-0" style="font-size: 0.9rem; opacity: 0.7;">
                            * These are estimates based on our historical campaign data. Actual results may vary.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 6: Featured Case Study -->
    <section class="section section-alt" id="case-studies">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Case Study</h2>
                <p>Real results from real campaigns. See how we've helped brands achieve extraordinary growth through strategic influencer partnerships.</p>
            </div>
            
            <div class="case-study-card fade-in">
                <div class="row g-0">
                    <div class="col-lg-5">
                        <div class="case-study-image">
                            🎮
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="case-study-content">
                            <span class="tag">Gaming</span>
                            <h3><?php echo $featuredCaseStudy ? htmlspecialchars($featuredCaseStudy['title']) : 'Gaming App Launch: 10M Downloads in 30 Days'; ?></h3>
                            
                            <div class="psr-grid">
                                <div class="psr-item problem">
                                    <h5><span class="badge">P</span> Problem</h5>
                                    <p><?php echo $featuredCaseStudy ? htmlspecialchars($featuredCaseStudy['challenge']) : 'WinZO needed to acquire 10 million new users within 30 days for their new fantasy sports feature launch. Traditional advertising was yielding a CPI of ₹45, which was unsustainable for their growth targets.'; ?></p>
                                </div>
                                <div class="psr-item solution">
                                    <h5><span class="badge">S</span> Solution</h5>
                                    <p><?php echo $featuredCaseStudy ? htmlspecialchars($featuredCaseStudy['solution']) : 'We deployed a multi-tier influencer strategy combining 50 gaming micro-influencers (10K-100K followers), 15 macro gaming YouTubers, and 5 celebrity gaming endorsements. We created custom gameplay content, tutorial videos, and live streaming events.'; ?></p>
                                </div>
                                <div class="psr-item result">
                                    <h5><span class="badge">R</span> Result</h5>
                                    <p><?php echo $featuredCaseStudy ? htmlspecialchars($featuredCaseStudy['results']) : 'Achieved 12.5 million app installs, reduced CPI to ₹18 (60% reduction), generated 500M+ video views, and the campaign went viral on Twitter with #WinZOChallenge trending for 3 days.'; ?></p>
                                </div>
                            </div>
                            
                            <div class="case-study-metrics">
                                <div class="metric-item">
                                    <span class="number">12.5M</span>
                                    <span class="label">App Installs</span>
                                </div>
                                <div class="metric-item">
                                    <span class="number">60%</span>
                                    <span class="label">Lower CPI</span>
                                </div>
                                <div class="metric-item">
                                    <span class="number">500M+</span>
                                    <span class="label">Video Views</span>
                                </div>
                                <div class="metric-item">
                                    <span class="number">340%</span>
                                    <span class="label">ROI</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 7: Why Choose Us / Process -->
    <section class="section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Our 4-Step Process</h2>
                <p>A proven methodology that ensures every campaign delivers maximum impact. From strategy to execution, we handle every detail.</p>
            </div>
            
            <div class="process-grid">
                <div class="process-step fade-in stagger-1">
                    <div class="step-number">01</div>
                    <div class="step-icon">🎯</div>
                    <h4>Strategy & Discovery</h4>
                    <p>We deep-dive into your brand, audience, and goals. Our team analyzes competitor campaigns and identifies opportunities for maximum impact.</p>
                </div>
                
                <div class="process-step fade-in stagger-2">
                    <div class="step-number">02</div>
                    <div class="step-icon">🔍</div>
                    <h4>Creator Selection</h4>
                    <p>Using AI-powered matching, we identify creators who genuinely align with your brand. Each creator is vetted for authenticity and engagement quality.</p>
                </div>
                
                <div class="process-step fade-in stagger-3">
                    <div class="step-number">03</div>
                    <div class="step-icon">🚀</div>
                    <h4>Campaign Execution</h4>
                    <p>Our team manages everything - from briefings to content approval to posting schedules. Real-time monitoring ensures campaigns stay on track.</p>
                </div>
                
                <div class="process-step fade-in stagger-4">
                    <div class="step-number">04</div>
                    <div class="step-icon">📊</div>
                    <h4>Reporting & Optimization</h4>
                    <p>Comprehensive analytics dashboards with real-time metrics. We provide actionable insights and optimize campaigns for better performance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 8: Testimonials -->
    <section class="section section-dark">
        <div class="container">
            <div class="section-title fade-in">
                <h2 style="background-color: var(--accent-orange);">Client Testimonials</h2>
                <p>Don't just take our word for it. Here's what our clients have to say about working with Rexo Agency.</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="testimonial-card fade-in stagger-1">
                        <p>"Rexo Agency transformed our influencer strategy completely. Their AI-powered creator matching saved us months of manual research and the results exceeded all expectations."</p>
                        <div class="testimonial-author">
                            <img src="https://placehold.co/60x60/FFD700/1a1a1a?text=VP" alt="Vikram Patel">
                            <div class="info">
                                <h5>Vikram Patel</h5>
                                <span>VP Marketing, GameZone India</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="testimonial-card fade-in stagger-2">
                        <p>"The transparency and real-time reporting set Rexo apart. We could see exactly where our budget was going and the ROI on each creator. Game-changing for our D2C brand."</p>
                        <div class="testimonial-author">
                            <img src="https://placehold.co/60x60/FF6B35/1a1a1a?text=PS" alt="Priya Sharma">
                            <div class="info">
                                <h5>Priya Sharma</h5>
                                <span>Founder, GlowUp Cosmetics</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="testimonial-card fade-in stagger-3">
                        <p>"Our meme marketing campaign with Rexo went absolutely viral. 50M+ impressions in 48 hours and our app downloads tripled. Their understanding of internet culture is unmatched."</p>
                        <div class="testimonial-author">
                            <img src="https://placehold.co/60x60/00FF88/1a1a1a?text=RA" alt="Rahul Agarwal">
                            <div class="info">
                                <h5>Rahul Agarwal</h5>
                                <span>CMO, FinTech Startup</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 9: Platform Features -->
    <section class="section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Platform Features</h2>
                <p>Our proprietary technology gives you an unfair advantage in influencer marketing.</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card-brutal fade-in stagger-1">
                        <div class="card-icon bg-yellow">🤖</div>
                        <h4>AI Creator Matching</h4>
                        <p>Our algorithm analyzes 50+ data points to match you with creators who genuinely resonate with your target audience. No more guesswork.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card-brutal fade-in stagger-2">
                        <div class="card-icon bg-orange">🛡️</div>
                        <h4>Fraud Detection</h4>
                        <p>Identify fake followers, bot engagement, and suspicious activity before you invest. Our system flags creators with inauthentic metrics.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card-brutal fade-in stagger-3">
                        <div class="card-icon bg-blue">📊</div>
                        <h4>Real-Time Analytics</h4>
                        <p>Live dashboards showing reach, engagement, sentiment, and conversions. Make data-driven decisions on the fly.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card-brutal fade-in stagger-4">
                        <div class="card-icon bg-green">💳</div>
                        <h4>Secure Payments</h4>
                        <p>Escrow-based payment system protects both brands and creators. Payments released only after deliverables are approved.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card-brutal fade-in stagger-5">
                        <div class="card-icon bg-pink">📋</div>
                        <h4>Contract Management</h4>
                        <p>Digital contracts, usage rights, and content approval workflows all in one place. Legally compliant and hassle-free.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card-brutal fade-in stagger-6">
                        <div class="card-icon" style="background: #1a1a1a; color: white;">🎯</div>
                        <h4>Campaign Automation</h4>
                        <p>Set up drip campaigns, scheduled posts, and automated follow-ups. Scale your influencer operations without scaling your team.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 10: CTA / Contact Form -->
    <section class="section section-dark" id="contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="fade-in">
                        <h2 style="color: var(--accent-yellow);">Ready to 10x Your Marketing?</h2>
                        <p style="font-size: 1.2rem; opacity: 0.9;">Join 500+ brands that have transformed their growth with influencer marketing. Let's discuss your goals and create a custom strategy.</p>
                        
                        <ul style="list-style: none; padding: 0; margin: 30px 0;">
                            <li style="padding: 10px 0; display: flex; align-items: center; gap: 15px;">
                                <span style="font-size: 1.5rem;">✅</span>
                                <span>Free strategy consultation (worth ₹25,000)</span>
                            </li>
                            <li style="padding: 10px 0; display: flex; align-items: center; gap: 15px;">
                                <span style="font-size: 1.5rem;">✅</span>
                                <span>Custom creator recommendations</span>
                            </li>
                            <li style="padding: 10px 0; display: flex; align-items: center; gap: 15px;">
                                <span style="font-size: 1.5rem;">✅</span>
                                <span>Campaign budget planning</span>
                            </li>
                            <li style="padding: 10px 0; display: flex; align-items: center; gap: 15px;">
                                <span style="font-size: 1.5rem;">✅</span>
                                <span>ROI projection report</span>
                            </li>
                        </ul>
                        
                        <div style="margin-top: 30px;">
                            <p style="margin-bottom: 10px; opacity: 0.8;">Or reach us directly:</p>
                            <p style="font-size: 1.3rem; margin-bottom: 5px;">📧 hello@rexoagency.com</p>
                            <p style="font-size: 1.3rem;">📞 +91 98765 43210</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <form class="form-brutal fade-in" action="services.php" method="POST" data-validate>
                        <h3>Request a Callback</h3>
                        
                        <div class="form-group">
                            <label for="contact-name">Full Name *</label>
                            <input type="text" id="contact-name" name="name" required placeholder="Your full name">
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-email">Work Email *</label>
                            <input type="email" id="contact-email" name="email" required placeholder="your@company.com">
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-phone">Phone Number *</label>
                            <input type="tel" id="contact-phone" name="phone" required placeholder="+91 XXXXX XXXXX">
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-budget">Estimated Budget</label>
                            <select id="contact-budget" name="budget">
                                <option value="">Select budget range</option>
                                <option value="below_1l">Below ₹1 Lakh</option>
                                <option value="1l_5l">₹1 Lakh - ₹5 Lakh</option>
                                <option value="5l_10l">₹5 Lakh - ₹10 Lakh</option>
                                <option value="10l_25l">₹10 Lakh - ₹25 Lakh</option>
                                <option value="above_25l">Above ₹25 Lakh</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-message">Tell us about your campaign goals</label>
                            <textarea id="contact-message" name="message" rows="4" placeholder="What are you looking to achieve?"></textarea>
                        </div>
                        
                        <button type="submit" class="btn-brutal">Get Free Consultation</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 11: Brands Worked With -->
    <section class="section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Trusted By Leading Brands</h2>
                <p>From startups to Fortune 500 companies, we've partnered with brands across industries.</p>
            </div>
            
            <div class="row justify-content-center align-items-center g-4">
                <?php 
                $brands = ['GameZone', 'TechHub', 'FashionNova', 'FoodDelight', 'TravelEasy', 'FitLife', 'EduLearn', 'FinanceGuru'];
                foreach ($brands as $index => $brand): 
                ?>
                <div class="col-6 col-md-3 text-center fade-in stagger-<?php echo ($index % 8) + 1; ?>">
                    <div style="padding: 30px; border: var(--border-medium); background: #fff;">
                        <span style="font-family: var(--font-heading); font-weight: 700; font-size: 1.3rem; opacity: 0.7;"><?php echo $brand; ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="footer-logo">Rexo<span>Agency</span></div>
                    <p>India's leading influencer marketing platform. We connect brands with authentic creators to drive measurable business results.</p>
                    <div class="footer-social">
                        <a href="#" aria-label="Instagram">📸</a>
                        <a href="#" aria-label="Twitter">🐦</a>
                        <a href="#" aria-label="LinkedIn">💼</a>
                        <a href="#" aria-label="YouTube">▶️</a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4">
                    <h5>Services</h5>
                    <ul class="footer-links">
                        <li><a href="services.php#instagram">Instagram Marketing</a></li>
                        <li><a href="services.php#youtube">YouTube Marketing</a></li>
                        <li><a href="services.php#meme">Meme Marketing</a></li>
                        <li><a href="services.php#gaming">Gaming & Esports</a></li>
                        <li><a href="services.php#ugc">UGC Production</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-4">
                    <h5>Company</h5>
                    <ul class="footer-links">
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="about.php#team">Our Team</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-4">
                    <h5>Resources</h5>
                    <ul class="footer-links">
                        <li><a href="#">Case Studies</a></li>
                        <li><a href="#">Industry Reports</a></li>
                        <li><a href="#">Creator Guidelines</a></li>
                        <li><a href="#">Brand Playbook</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2">
                    <h5>Legal</h5>
                    <ul class="footer-links">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Cookie Policy</a></li>
                        <li><a href="#">Refund Policy</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 Rexo Agency. All rights reserved.</p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy</a>
                    <a href="#">Terms</a>
                    <a href="#">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Elements -->
    <a href="https://wa.me/919876543210" class="floating-whatsapp" target="_blank" aria-label="WhatsApp">💬</a>
    
    <div class="chatbot-trigger" aria-label="Chat with us">🤖</div>
    
    <div class="chatbot-panel">
        <div class="chatbot-header">
            <h5>🤖 Rexo Bot</h5>
            <button class="chatbot-close">&times;</button>
        </div>
        <div class="chatbot-body"></div>
        <div class="chatbot-footer">
            <input type="text" class="chatbot-input" placeholder="Type your message...">
            <button class="chatbot-send">Send</button>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="script.js"></script>
</body>
</html>
