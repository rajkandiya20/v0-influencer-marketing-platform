<?php
/**
 * Rexo Agency - Services Page
 * Detailed Catalog with Zig-Zag Layout
 */
require_once 'db_connect.php';

// Handle service request form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['service_request'])) {
    $pdo = getDBConnection();
    
    $name = sanitize($_POST['name'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $phone = sanitize($_POST['phone'] ?? '');
    $company = sanitize($_POST['company'] ?? '');
    $service = sanitize($_POST['service_type'] ?? '');
    $budget = sanitize($_POST['budget_range'] ?? '');
    $objective = sanitize($_POST['objective'] ?? '');
    $audience = sanitize($_POST['audience'] ?? '');
    $platforms = sanitize($_POST['platforms'] ?? '');
    $timeline = sanitize($_POST['timeline'] ?? '');
    $notes = sanitize($_POST['notes'] ?? '');
    
    try {
        $stmt = $pdo->prepare("INSERT INTO service_requests (name, email, phone, company_name, service_type, budget_range, campaign_objective, target_audience, preferred_platforms, timeline, additional_notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $phone, $company, $service, $budget, $objective, $audience, $platforms, $timeline, $notes]);
        
        $successMessage = "Thank you for your request! Our team will contact you within 24 hours.";
    } catch (PDOException $e) {
        $errorMessage = "Something went wrong. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Rexo Agency | Full-Service Influencer Marketing</title>
    <meta name="description" content="Explore our comprehensive influencer marketing services including Instagram, YouTube, Meme Marketing, UGC Production, Gaming UA, and more.">
    
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#case-studies">Case Studies</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
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

    <!-- Hero Section -->
    <section class="section" style="padding-top: 150px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="fade-in">
                        <span class="badge-brutal mb-3">Full-Service Agency</span>
                        <h1>Comprehensive <span class="highlight">Influencer Marketing</span> Solutions</h1>
                        <p style="font-size: 1.25rem; max-width: 700px;">From Instagram to Gaming, from Micro-Influencers to Celebrity Partnerships — we offer end-to-end influencer marketing services that drive measurable business results. Each service is tailored to your brand's unique goals and audience.</p>
                        
                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <a href="#influencer-marketing" class="btn-brutal">Explore Services</a>
                            <a href="#request-service" class="btn-brutal btn-brutal-outline">Request Quote</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="card-brutal fade-in" style="transition-delay: 0.3s;">
                        <h4>Quick Stats</h4>
                        <div style="border-top: var(--border-medium); padding-top: 20px; margin-top: 20px;">
                            <div class="d-flex justify-content-between mb-3">
                                <span>Services Offered</span>
                                <strong>8+</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Platform Coverage</span>
                                <strong>15+</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Creator Network</span>
                                <strong>12,500+</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Success Rate</span>
                                <strong>98%</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Navigation -->
    <section class="section-dark" style="padding: 30px 0;">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="#influencer-marketing" class="btn-brutal btn-brutal-sm bg-yellow">Influencer Marketing</a>
                <a href="#performance-marketing" class="btn-brutal btn-brutal-sm bg-orange">Performance Marketing</a>
                <a href="#meme-marketing" class="btn-brutal btn-brutal-sm bg-pink">Meme Marketing</a>
                <a href="#creative-studio" class="btn-brutal btn-brutal-sm bg-blue">Creative Studio</a>
                <a href="#gaming-ua" class="btn-brutal btn-brutal-sm bg-purple" style="background: #9B59B6;">Gaming UA</a>
                <a href="#ugc-production" class="btn-brutal btn-brutal-sm bg-green">UGC Production</a>
                <a href="#tech-solutions" class="btn-brutal btn-brutal-sm" style="background: #1a1a1a; color: white;">Tech Solutions</a>
            </div>
        </div>
    </section>

    <!-- Service 1: Influencer Marketing (Zig-Zag) -->
    <section class="zigzag-section" id="influencer-marketing">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1">
                    <div class="zigzag-content fade-in">
                        <span class="service-tag">Core Service</span>
                        <h3>Influencer Marketing</h3>
                        <p>Our flagship service connects your brand with the perfect creators across Instagram, YouTube, Twitter, and LinkedIn. We don't just match follower counts — we use advanced AI to identify influencers whose audience demographics, engagement patterns, and content style align perfectly with your brand identity and campaign goals.</p>
                        
                        <p>Whether you need nano-influencers (1K-10K followers) for hyper-local campaigns, micro-influencers (10K-100K) for authentic engagement, or macro/celebrity partnerships for mass reach — our network of 12,500+ verified creators has you covered.</p>
                        
                        <h5 style="margin-top: 30px;">What We Offer:</h5>
                        <ul>
                            <li><strong>Micro-Influencer Campaigns:</strong> Cost-effective partnerships with creators who have highly engaged niche audiences. Perfect for D2C brands and startups.</li>
                            <li><strong>Macro & Celebrity Partnerships:</strong> Large-scale campaigns with top-tier influencers and celebrities for maximum brand awareness and credibility.</li>
                            <li><strong>Niche Targeting:</strong> Fashion, Tech, Gaming, Food, Travel, Fitness, Beauty, Finance, Education — we have specialized creator pools for every vertical.</li>
                            <li><strong>Multi-Platform Campaigns:</strong> Coordinated campaigns across Instagram, YouTube, Twitter, and LinkedIn for maximum reach and frequency.</li>
                            <li><strong>Long-Term Ambassadorships:</strong> Building authentic, ongoing relationships between brands and creators for sustained impact.</li>
                        </ul>
                        
                        <h5>Platform Specializations:</h5>
                        <div class="row g-3 mt-2">
                            <div class="col-6">
                                <div style="padding: 15px; border: var(--border-medium); background: #fff;">
                                    <strong>📸 Instagram</strong>
                                    <p style="font-size: 0.85rem; margin-bottom: 0; opacity: 0.8;">Reels, Stories, Feed Posts, Lives</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div style="padding: 15px; border: var(--border-medium); background: #fff;">
                                    <strong>▶️ YouTube</strong>
                                    <p style="font-size: 0.85rem; margin-bottom: 0; opacity: 0.8;">Long-form, Shorts, Integrations</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div style="padding: 15px; border: var(--border-medium); background: #fff;">
                                    <strong>🐦 Twitter/X</strong>
                                    <p style="font-size: 0.85rem; margin-bottom: 0; opacity: 0.8;">Threads, Spaces, Viral Tweets</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div style="padding: 15px; border: var(--border-medium); background: #fff;">
                                    <strong>💼 LinkedIn</strong>
                                    <p style="font-size: 0.85rem; margin-bottom: 0; opacity: 0.8;">B2B Thought Leadership</p>
                                </div>
                            </div>
                        </div>
                        
                        <a href="#request-service" class="btn-brutal mt-4">Request Quote</a>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2">
                    <div class="zigzag-image fade-in slide-in-right">
                        📸
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service 2: Performance Marketing -->
    <section class="zigzag-section" id="performance-marketing">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="zigzag-content fade-in">
                        <span class="service-tag" style="background: var(--accent-orange);">Results-Driven</span>
                        <h3>Performance Marketing</h3>
                        <p>Move beyond vanity metrics. Our performance marketing service is built around measurable outcomes — CPI (Cost Per Install), CPA (Cost Per Action), CPL (Cost Per Lead), and ROAS (Return on Ad Spend). You only pay for real results, not just impressions.</p>
                        
                        <p>We've driven 12+ million app installs with an average CPI reduction of 60% compared to traditional advertising channels. Our performance campaigns are powered by real-time optimization, A/B testing, and advanced attribution tracking.</p>
                        
                        <h5 style="margin-top: 30px;">Our Performance Models:</h5>
                        <ul>
                            <li><strong>CPI Campaigns (Cost Per Install):</strong> Perfect for app marketers. We optimize for quality installs with high Day-7 retention rates. Works exceptionally well for gaming, fintech, and lifestyle apps.</li>
                            <li><strong>CPA Campaigns (Cost Per Action):</strong> Pay only when users complete desired actions — purchases, sign-ups, subscriptions, or any custom event you define.</li>
                            <li><strong>CPL Campaigns (Cost Per Lead):</strong> Ideal for B2B and service businesses. We deliver qualified leads that match your ideal customer profile.</li>
                            <li><strong>Hybrid Models:</strong> Combine fixed fees with performance bonuses to align incentives and maximize ROI.</li>
                        </ul>
                        
                        <h5>Industries We Excel In:</h5>
                        <ul>
                            <li><strong>Gaming:</strong> Casual games, fantasy sports, real-money gaming (RMG), esports</li>
                            <li><strong>Fintech:</strong> Trading apps, lending platforms, insurance, crypto</li>
                            <li><strong>E-commerce:</strong> D2C brands, marketplaces, subscription boxes</li>
                            <li><strong>EdTech:</strong> Online courses, tutoring platforms, skill development apps</li>
                        </ul>
                        
                        <div class="row g-3 mt-3">
                            <div class="col-4 text-center">
                                <span style="font-size: 2rem; font-weight: 900; font-family: var(--font-heading); color: var(--accent-orange); display: block;">60%</span>
                                <span style="font-size: 0.85rem;">Lower CPI</span>
                            </div>
                            <div class="col-4 text-center">
                                <span style="font-size: 2rem; font-weight: 900; font-family: var(--font-heading); color: var(--accent-orange); display: block;">12M+</span>
                                <span style="font-size: 0.85rem;">App Installs</span>
                            </div>
                            <div class="col-4 text-center">
                                <span style="font-size: 2rem; font-weight: 900; font-family: var(--font-heading); color: var(--accent-orange); display: block;">340%</span>
                                <span style="font-size: 0.85rem;">Avg ROAS</span>
                            </div>
                        </div>
                        
                        <a href="#request-service" class="btn-brutal btn-brutal-orange mt-4">Start Performance Campaign</a>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="zigzag-image fade-in slide-in-left" style="background: var(--accent-orange);">
                        📊
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service 3: Meme Marketing -->
    <section class="zigzag-section" id="meme-marketing">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1">
                    <div class="zigzag-content fade-in">
                        <span class="service-tag" style="background: var(--accent-pink);">Viral Content</span>
                        <h3>Meme Marketing</h3>
                        <p>Memes are the language of the internet. Our meme marketing service taps into viral culture to create shareable, memorable content that drives organic reach and brand recall. We work with 500+ meme pages and content creators who understand internet culture deeply.</p>
                        
                        <p>From Twitter storms that trend nationwide to Instagram meme pages with millions of followers, we craft content that feels native to each platform while subtly integrating your brand message. The result? Massive reach at a fraction of traditional advertising costs.</p>
                        
                        <h5 style="margin-top: 30px;">Meme Marketing Tactics:</h5>
                        <ul>
                            <li><strong>Trend Hijacking:</strong> We monitor trending topics 24/7 and create real-time meme content that inserts your brand into cultural conversations while they're still hot.</li>
                            <li><strong>Twitter Storms:</strong> Coordinated tweet campaigns across multiple accounts to create trending topics and hashtags. Perfect for product launches and announcements.</li>
                            <li><strong>Instagram Meme Pages:</strong> Partnerships with top meme pages like Sarcasm, BollywoodMemers, and niche pages in tech, sports, and gaming.</li>
                            <li><strong>Reddit & Community Marketing:</strong> Native content creation for Reddit, Discord, and other community platforms where traditional ads don't work.</li>
                            <li><strong>YouTube Meme Compilations:</strong> Feature your brand in meme compilation videos that garner millions of views.</li>
                        </ul>
                        
                        <h5>Why Meme Marketing Works:</h5>
                        <ul>
                            <li>🎯 <strong>Native Format:</strong> Memes don't feel like ads, so they bypass ad blindness</li>
                            <li>📈 <strong>Organic Sharing:</strong> Good memes are shared organically, multiplying reach</li>
                            <li>💰 <strong>Cost Effective:</strong> 10x cheaper than traditional advertising per impression</li>
                            <li>🧠 <strong>Brand Recall:</strong> Humor creates stronger memory associations</li>
                        </ul>
                        
                        <div class="p-4 mt-4" style="background: var(--accent-pink); border: var(--border-medium);">
                            <p style="margin-bottom: 0; font-weight: 600;"><strong>Case Study:</strong> Our meme campaign for a fintech app generated 50M+ impressions in 48 hours and increased app downloads by 300% — all with a budget under ₹2 Lakhs.</p>
                        </div>
                        
                        <a href="#request-service" class="btn-brutal btn-brutal-pink mt-4">Go Viral</a>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2">
                    <div class="zigzag-image fade-in slide-in-right" style="background: var(--accent-pink);">
                        😂
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service 4: Creative Studio -->
    <section class="zigzag-section" id="creative-studio">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="zigzag-content fade-in">
                        <span class="service-tag" style="background: var(--accent-blue);">Full Production</span>
                        <h3>Creative Studio</h3>
                        <p>Great content needs great production. Our in-house creative studio handles everything from concept to delivery — scriptwriting, storyboarding, video production, editing, and post-production. We create content that performs on social media while maintaining your brand's visual identity.</p>
                        
                        <p>Whether you need a 15-second Reel, a 10-minute YouTube video, or a full-fledged CGI commercial, our team of directors, cinematographers, and editors deliver broadcast-quality content optimized for digital platforms.</p>
                        
                        <h5 style="margin-top: 30px;">Creative Services:</h5>
                        <ul>
                            <li><strong>Scriptwriting & Concept Development:</strong> Our writers craft scripts that balance brand messaging with entertainment value. We understand what makes content share-worthy.</li>
                            <li><strong>Video Production:</strong> End-to-end video production from pre-production planning to final delivery. We work with creators or produce content in our studio.</li>
                            <li><strong>CGI & Visual Effects:</strong> Stand out with stunning 3D animations, AR filters, and VFX-enhanced content that stops the scroll.</li>
                            <li><strong>Motion Graphics:</strong> Animated explainers, logo animations, kinetic typography, and data visualizations.</li>
                            <li><strong>Photo Shoots:</strong> Product photography, lifestyle shoots, and influencer content creation.</li>
                            <li><strong>AR Filters & Effects:</strong> Custom Instagram and Snapchat filters that drive user-generated content.</li>
                        </ul>
                        
                        <h5>Content Formats We Create:</h5>
                        <div class="row g-2 mt-2">
                            <div class="col-4"><div style="padding: 10px; border: var(--border-medium); text-align: center; background: #fff; font-size: 0.85rem;">Reels</div></div>
                            <div class="col-4"><div style="padding: 10px; border: var(--border-medium); text-align: center; background: #fff; font-size: 0.85rem;">YouTube Videos</div></div>
                            <div class="col-4"><div style="padding: 10px; border: var(--border-medium); text-align: center; background: #fff; font-size: 0.85rem;">Shorts</div></div>
                            <div class="col-4"><div style="padding: 10px; border: var(--border-medium); text-align: center; background: #fff; font-size: 0.85rem;">Stories</div></div>
                            <div class="col-4"><div style="padding: 10px; border: var(--border-medium); text-align: center; background: #fff; font-size: 0.85rem;">Carousels</div></div>
                            <div class="col-4"><div style="padding: 10px; border: var(--border-medium); text-align: center; background: #fff; font-size: 0.85rem;">Ads</div></div>
                        </div>
                        
                        <a href="#request-service" class="btn-brutal btn-brutal-blue mt-4">Start Creating</a>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="zigzag-image fade-in slide-in-left" style="background: var(--accent-blue);">
                        🎬
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service 5: Gaming User Acquisition -->
    <section class="zigzag-section" id="gaming-ua">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1">
                    <div class="zigzag-content fade-in">
                        <span class="service-tag" style="background: #9B59B6; color: white;">Gaming Specialists</span>
                        <h3>Gaming User Acquisition</h3>
                        <p>We're obsessed with gaming. Our Gaming UA vertical has driven 50+ successful app launches including partnerships with WinZO, MPL, Ludo King, and numerous indie studios. We understand the gaming ecosystem — from casual gamers to hardcore esports enthusiasts.</p>
                        
                        <p>Our strategies combine influencer marketing with performance optimization, ensuring you acquire high-LTV users at sustainable CPI rates. We track metrics that matter: D1/D7/D30 retention, in-app purchases, session lengths, and lifetime value.</p>
                        
                        <h5 style="margin-top: 30px;">Gaming UA Services:</h5>
                        <ul>
                            <li><strong>CPI/CPA Campaigns:</strong> Pay-per-install and pay-per-action campaigns optimized for gaming apps. We've achieved CPI as low as ₹12 for casual games and ₹25 for RMG apps.</li>
                            <li><strong>Streamer Partnerships:</strong> Integrations with Twitch, YouTube Gaming, and Facebook Gaming streamers. Live gameplay with your game reaches engaged audiences.</li>
                            <li><strong>Esports Sponsorships:</strong> Tournament sponsorships, team partnerships, and esports athlete endorsements. Connect with the competitive gaming community.</li>
                            <li><strong>Gaming YouTuber Campaigns:</strong> Reviews, let's plays, tutorials, and challenge videos with top gaming content creators.</li>
                            <li><strong>Community Building:</strong> Discord server management, community events, and grassroots marketing for gaming communities.</li>
                        </ul>
                        
                        <h5>Game Categories We Specialize In:</h5>
                        <ul>
                            <li>🎮 Casual & Hyper-Casual Games</li>
                            <li>🏏 Fantasy Sports & RMG</li>
                            <li>🎯 Battle Royale & FPS</li>
                            <li>⚔️ RPG & Strategy</li>
                            <li>🎲 Casino & Card Games</li>
                            <li>🏆 Esports Titles</li>
                        </ul>
                        
                        <div class="row g-3 mt-3">
                            <div class="col-4 text-center">
                                <span style="font-size: 2rem; font-weight: 900; font-family: var(--font-heading); color: #9B59B6; display: block;">50+</span>
                                <span style="font-size: 0.85rem;">Game Launches</span>
                            </div>
                            <div class="col-4 text-center">
                                <span style="font-size: 2rem; font-weight: 900; font-family: var(--font-heading); color: #9B59B6; display: block;">₹12</span>
                                <span style="font-size: 0.85rem;">Lowest CPI</span>
                            </div>
                            <div class="col-4 text-center">
                                <span style="font-size: 2rem; font-weight: 900; font-family: var(--font-heading); color: #9B59B6; display: block;">5K+</span>
                                <span style="font-size: 0.85rem;">Gaming Creators</span>
                            </div>
                        </div>
                        
                        <a href="#request-service" class="btn-brutal mt-4" style="background: #9B59B6; color: white;">Launch Your Game</a>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2">
                    <div class="zigzag-image fade-in slide-in-right" style="background: #9B59B6;">
                        🎮
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service 6: UGC Production -->
    <section class="zigzag-section" id="ugc-production">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="zigzag-content fade-in">
                        <span class="service-tag" style="background: var(--accent-green);">Authentic Content</span>
                        <h3>UGC Production</h3>
                        <p>User-Generated Content (UGC) is the most trusted form of marketing content. Our UGC service connects you with creators who produce authentic, relatable content that drives conversions. From product testimonials to unboxing videos, we create content that feels real because it is real.</p>
                        
                        <p>UGC performs exceptionally well on paid media — Meta, TikTok, and YouTube ads featuring UGC see 4x higher click-through rates compared to traditional ads. We help you build a content library that fuels your paid campaigns.</p>
                        
                        <h5 style="margin-top: 30px;">UGC Content Types:</h5>
                        <ul>
                            <li><strong>Product Testimonials:</strong> Real users sharing honest experiences with your product. Builds trust and credibility.</li>
                            <li><strong>Unboxing Videos:</strong> First-impressions content that showcases packaging, product quality, and user excitement.</li>
                            <li><strong>How-To & Tutorial Content:</strong> Educational content that demonstrates product usage and value propositions.</li>
                            <li><strong>Lifestyle Integration:</strong> Content showing your product naturally integrated into creators' daily lives.</li>
                            <li><strong>Before/After Content:</strong> Transformation content that visually demonstrates product benefits.</li>
                            <li><strong>Review & Comparison Videos:</strong> In-depth reviews and competitive comparisons that help purchase decisions.</li>
                        </ul>
                        
                        <h5>UGC for Paid Media:</h5>
                        <p>We create UGC specifically optimized for paid advertising across platforms:</p>
                        <ul>
                            <li>📱 Meta Ads (Facebook & Instagram)</li>
                            <li>🎵 TikTok Ads</li>
                            <li>▶️ YouTube Ads</li>
                            <li>📌 Pinterest Ads</li>
                        </ul>
                        
                        <div class="p-4 mt-4" style="background: var(--accent-green); border: var(--border-medium);">
                            <p style="margin-bottom: 0;"><strong>Pro Tip:</strong> UGC testimonials in your ad creative can increase conversion rates by 29% and reduce cost-per-acquisition by up to 50%.</p>
                        </div>
                        
                        <a href="#request-service" class="btn-brutal btn-brutal-green mt-4">Get UGC Content</a>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="zigzag-image fade-in slide-in-left" style="background: var(--accent-green);">
                        📱
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service 7: Tech Solutions -->
    <section class="zigzag-section" id="tech-solutions">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1">
                    <div class="zigzag-content fade-in">
                        <span class="service-tag" style="background: #1a1a1a; color: white;">AI-Powered</span>
                        <h3>Tech & AI Solutions</h3>
                        <p>Our proprietary technology stack gives you an unfair advantage in influencer marketing. From AI-powered creator matching to real-time fraud detection, we use cutting-edge technology to optimize every aspect of your campaigns.</p>
                        
                        <p>The influencer industry is plagued with fake followers, bot engagement, and inflated metrics. Our tech solutions ensure you're investing in authentic creators who deliver real results.</p>
                        
                        <h5 style="margin-top: 30px;">Technology Features:</h5>
                        <ul>
                            <li><strong>AI Influencer Matching:</strong> Our algorithm analyzes 50+ data points including audience demographics, engagement patterns, content style, and brand affinity to match you with the perfect creators.</li>
                            <li><strong>Fraud Detection:</strong> Identify fake followers, bot engagement, and suspicious activity before you invest. Our system flags creators with inauthentic metrics.</li>
                            <li><strong>Sentiment Analysis:</strong> Understand how audiences react to your campaigns with real-time sentiment tracking across social mentions and comments.</li>
                            <li><strong>Performance Prediction:</strong> ML models that predict campaign performance before launch, helping you optimize budgets and creator selection.</li>
                            <li><strong>Real-Time Analytics:</strong> Live dashboards showing reach, engagement, conversions, and ROI across all campaigns and platforms.</li>
                            <li><strong>Competitor Intelligence:</strong> Track competitor influencer campaigns, understand their strategies, and identify opportunities.</li>
                        </ul>
                        
                        <h5>API & Integration:</h5>
                        <p>Our platform integrates with your existing martech stack:</p>
                        <ul>
                            <li>🔗 Shopify & E-commerce Platforms</li>
                            <li>📊 Analytics Tools (GA4, Mixpanel)</li>
                            <li>📧 CRM Systems (Salesforce, HubSpot)</li>
                            <li>📱 Attribution Platforms (Adjust, AppsFlyer)</li>
                        </ul>
                        
                        <a href="#request-service" class="btn-brutal btn-brutal-dark mt-4">Explore Technology</a>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2">
                    <div class="zigzag-image fade-in slide-in-right">
                        🤖
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="section section-dark">
        <div class="container">
            <div class="section-title fade-in">
                <h2 style="background-color: var(--accent-orange);">Flexible Pricing</h2>
                <p>We offer transparent, flexible pricing models that align with your goals and budget.</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card-brutal fade-in stagger-1" style="text-align: center;">
                        <h4 style="color: var(--accent-yellow);">Starter</h4>
                        <div style="font-size: 3rem; font-weight: 900; font-family: var(--font-heading); margin: 20px 0;">₹50K</div>
                        <p style="opacity: 0.7;">Starting budget</p>
                        <ul style="list-style: none; padding: 0; text-align: left; margin: 30px 0;">
                            <li style="padding: 10px 0; border-bottom: 1px solid #eee;">✅ 5-10 Micro-Influencers</li>
                            <li style="padding: 10px 0; border-bottom: 1px solid #eee;">✅ Single Platform Campaign</li>
                            <li style="padding: 10px 0; border-bottom: 1px solid #eee;">✅ Basic Analytics</li>
                            <li style="padding: 10px 0; border-bottom: 1px solid #eee;">✅ Content Approval Workflow</li>
                            <li style="padding: 10px 0;">✅ Campaign Report</li>
                        </ul>
                        <a href="#request-service" class="btn-brutal w-100">Get Started</a>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card-brutal fade-in stagger-2" style="text-align: center; border-width: 3px;">
                        <span class="badge-brutal" style="position: absolute; top: -15px; left: 50%; transform: translateX(-50%);">Most Popular</span>
                        <h4 style="color: var(--accent-orange); margin-top: 15px;">Growth</h4>
                        <div style="font-size: 3rem; font-weight: 900; font-family: var(--font-heading); margin: 20px 0;">₹2L - ₹5L</div>
                        <p style="opacity: 0.7;">Per campaign</p>
                        <ul style="list-style: none; padding: 0; text-align: left; margin: 30px 0;">
                            <li style="padding: 10px 0; border-bottom: 1px solid #eee;">✅ 20-50 Influencers Mix</li>
                            <li style="padding: 10px 0; border-bottom: 1px solid #eee;">✅ Multi-Platform Campaign</li>
                            <li style="padding: 10px 0; border-bottom: 1px solid #eee;">✅ Advanced Analytics Dashboard</li>
                            <li style="padding: 10px 0; border-bottom: 1px solid #eee;">✅ Content Creation Support</li>
                            <li style="padding: 10px 0; border-bottom: 1px solid #eee;">✅ Dedicated Account Manager</li>
                            <li style="padding: 10px 0;">✅ Performance Optimization</li>
                        </ul>
                        <a href="#request-service" class="btn-brutal btn-brutal-orange w-100">Get Started</a>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card-brutal fade-in stagger-3" style="text-align: center;">
                        <h4 style="color: var(--accent-blue);">Enterprise</h4>
                        <div style="font-size: 3rem; font-weight: 900; font-family: var(--font-heading); margin: 20px 0;">Custom</div>
                        <p style="opacity: 0.7;">Tailored solutions</p>
                        <ul style="list-style: none; padding: 0; text-align: left; margin: 30px 0;">
                            <li style="padding: 10px 0; border-bottom: 1px solid #eee;">✅ Unlimited Influencers</li>
                            <li style="padding: 10px 0; border-bottom: 1px solid #eee;">✅ All Platforms + Celebrity</li>
                            <li style="padding: 10px 0; border-bottom: 1px solid #eee;">✅ White-Label Reporting</li>
                            <li style="padding: 10px 0; border-bottom: 1px solid #eee;">✅ Full Creative Production</li>
                            <li style="padding: 10px 0; border-bottom: 1px solid #eee;">✅ API Access</li>
                            <li style="padding: 10px 0;">✅ Priority Support</li>
                        </ul>
                        <a href="#request-service" class="btn-brutal btn-brutal-dark w-100">Contact Sales</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Request Form -->
    <section class="section" id="request-service">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php if (isset($successMessage)): ?>
                        <div class="alert-brutal alert-success mb-4">
                            <span style="font-size: 1.5rem;">✅</span>
                            <span><?php echo $successMessage; ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (isset($errorMessage)): ?>
                        <div class="alert-brutal alert-danger mb-4">
                            <span style="font-size: 1.5rem;">❌</span>
                            <span><?php echo $errorMessage; ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <form class="form-brutal fade-in" method="POST" data-validate>
                        <input type="hidden" name="service_request" value="1">
                        
                        <h3>Request a Service Quote</h3>
                        <p class="text-center mb-4" style="opacity: 0.8;">Fill in the details below and our team will get back to you within 24 hours with a custom proposal.</p>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Full Name *</label>
                                    <input type="text" id="name" name="name" required placeholder="Your full name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Work Email *</label>
                                    <input type="email" id="email" name="email" required placeholder="your@company.com">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number *</label>
                                    <input type="tel" id="phone" name="phone" required placeholder="+91 XXXXX XXXXX">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company">Company Name</label>
                                    <input type="text" id="company" name="company" placeholder="Your company">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="service_type">Service Required *</label>
                                    <select id="service_type" name="service_type" required>
                                        <option value="">Select a service</option>
                                        <option value="influencer_marketing">Influencer Marketing</option>
                                        <option value="performance_marketing">Performance Marketing (CPI/CPA)</option>
                                        <option value="meme_marketing">Meme Marketing</option>
                                        <option value="creative_studio">Creative Studio / Content Production</option>
                                        <option value="gaming_ua">Gaming User Acquisition</option>
                                        <option value="ugc_production">UGC Production</option>
                                        <option value="cgi_ads">CGI Ads & Visual Effects</option>
                                        <option value="tech_solutions">Tech Solutions (AI/Analytics)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="budget_range">Budget Range *</label>
                                    <select id="budget_range" name="budget_range" required>
                                        <option value="">Select budget</option>
                                        <option value="below_1l">Below ₹1 Lakh</option>
                                        <option value="1l_5l">₹1 Lakh - ₹5 Lakh</option>
                                        <option value="5l_10l">₹5 Lakh - ₹10 Lakh</option>
                                        <option value="10l_25l">₹10 Lakh - ₹25 Lakh</option>
                                        <option value="above_25l">Above ₹25 Lakh</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="platforms">Preferred Platforms</label>
                            <input type="text" id="platforms" name="platforms" placeholder="e.g., Instagram, YouTube, Twitter">
                        </div>
                        
                        <div class="form-group">
                            <label for="objective">Campaign Objective *</label>
                            <textarea id="objective" name="objective" required placeholder="What do you want to achieve with this campaign?"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="audience">Target Audience</label>
                            <textarea id="audience" name="audience" placeholder="Describe your target audience (age, gender, interests, location, etc.)"></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="timeline">Timeline</label>
                                    <input type="text" id="timeline" name="timeline" placeholder="e.g., 2 weeks, 1 month">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="notes">Additional Notes</label>
                            <textarea id="notes" name="notes" placeholder="Anything else you'd like us to know?"></textarea>
                        </div>
                        
                        <button type="submit" class="btn-brutal btn-brutal-lg">Submit Request</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section section-alt">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Frequently Asked Questions</h2>
                <p>Common questions about our influencer marketing services.</p>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-brutal mb-4 fade-in">
                        <h4>How do you select influencers for campaigns?</h4>
                        <p>We use our AI-powered matching algorithm that analyzes 50+ data points including audience demographics, engagement quality, content style, and brand affinity. Each creator is manually vetted for authenticity before being added to our network.</p>
                    </div>
                    
                    <div class="card-brutal mb-4 fade-in">
                        <h4>What's the minimum budget to work with you?</h4>
                        <p>Our campaigns start from ₹50,000 for micro-influencer activations. For performance marketing (CPI/CPA), we typically recommend a minimum of ₹1 Lakh to gather sufficient data for optimization.</p>
                    </div>
                    
                    <div class="card-brutal mb-4 fade-in">
                        <h4>How do you ensure influencer authenticity?</h4>
                        <p>Our proprietary fraud detection system analyzes follower growth patterns, engagement authenticity, audience demographics, and comment quality. We flag and exclude creators with fake followers or bot engagement.</p>
                    </div>
                    
                    <div class="card-brutal mb-4 fade-in">
                        <h4>What metrics do you track and report?</h4>
                        <p>We provide comprehensive reporting including reach, impressions, engagement rate, video views, click-through rate, conversions, and ROI. For app campaigns, we track installs, CPI, retention, and LTV.</p>
                    </div>
                    
                    <div class="card-brutal fade-in">
                        <h4>Do you handle content creation or just influencer management?</h4>
                        <p>Both! Our Creative Studio handles full content production including scriptwriting, video production, and post-production. We also provide creative briefs and guidelines for influencer-generated content.</p>
                    </div>
                </div>
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
                        <li><a href="#influencer-marketing">Influencer Marketing</a></li>
                        <li><a href="#performance-marketing">Performance Marketing</a></li>
                        <li><a href="#meme-marketing">Meme Marketing</a></li>
                        <li><a href="#gaming-ua">Gaming UA</a></li>
                        <li><a href="#ugc-production">UGC Production</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-4">
                    <h5>Company</h5>
                    <ul class="footer-links">
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="about.php#team">Our Team</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="index.php#contact">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-4">
                    <h5>Resources</h5>
                    <ul class="footer-links">
                        <li><a href="#">Case Studies</a></li>
                        <li><a href="#">Industry Reports</a></li>
                        <li><a href="#">Creator Guidelines</a></li>
                        <li><a href="#">Brand Playbook</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2">
                    <h5>Legal</h5>
                    <ul class="footer-links">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Cookie Policy</a></li>
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
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="script.js"></script>
</body>
</html>
