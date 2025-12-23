<?php
/**
 * Rexo Agency - About Page
 * The "Trust" Page with Founder's Note, Timeline, Team
 */
require_once 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Rexo Agency | Our Story & Team</title>
    <meta name="description" content="Learn about Rexo Agency's mission to fight fake engagement and deliver authentic influencer marketing. Meet our team and explore our journey.">
    
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
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link active" href="about.php">About</a></li>
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
    <!-- Removed inline padding-top since body already has it -->
    <section class="section" style="padding-top: 80px;">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <div class="fade-in visible">
                        <span class="badge-brutal mb-3">Our Story</span>
                        <h1>Building the Future of <span class="highlight">Authentic Influence</span></h1>
                        <p style="font-size: 1.25rem; color: var(--text-dark);">We started Rexo Agency with a simple belief: influencer marketing should be transparent, measurable, and authentic. In an industry plagued by fake followers and inflated metrics, we chose to be different.</p>
                        <p style="font-size: 1.1rem; color: var(--text-dark); opacity: 0.85;">Today, we're one of India's fastest-growing influencer marketing agencies, trusted by 500+ brands and connected with 12,500+ verified creators.</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card-brutal fade-in visible">
                        <div class="row text-center g-3">
                            <div class="col-6">
                                <span style="font-size: 2.5rem; font-weight: 900; font-family: var(--font-heading); color: var(--accent-orange); display: block;">2021</span>
                                <span style="color: var(--text-dark);">Founded</span>
                            </div>
                            <div class="col-6">
                                <span style="font-size: 2.5rem; font-weight: 900; font-family: var(--font-heading); color: var(--accent-orange); display: block;">50+</span>
                                <span style="color: var(--text-dark);">Team Members</span>
                            </div>
                            <div class="col-6">
                                <span style="font-size: 2.5rem; font-weight: 900; font-family: var(--font-heading); color: var(--accent-orange); display: block;">500+</span>
                                <span style="color: var(--text-dark);">Brands Served</span>
                            </div>
                            <div class="col-6">
                                <span style="font-size: 2.5rem; font-weight: 900; font-family: var(--font-heading); color: var(--accent-orange); display: block;">₹5Cr+</span>
                                <span style="color: var(--text-dark);">Revenue Generated</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Founder's Note Section -->
    <section class="section section-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="fade-in visible">
                        <div class="text-center mb-5">
                            <div style="width: 150px; height: 150px; border: 3px solid var(--text-light); background: var(--accent-yellow); margin: 0 auto 30px; display: flex; align-items: center; justify-content: center; font-size: 4rem;">
                                👤
                            </div>
                            <h2 style="color: var(--text-light);">Founder's Note</h2>
                            <p style="color: var(--accent-yellow); font-family: var(--font-heading); font-weight: 600; margin-bottom: 0;">Mukhtiyar Khan, Founder & CEO</p>
                        </div>
                        
                        <!-- Fixed text visibility with explicit color styling -->
                        <div style="font-size: 1.15rem; line-height: 1.9; color: var(--text-light);">
                            <p style="color: #fff8f0;">When I started in digital marketing back in 2018, I was shocked by what I discovered in the influencer industry. Brands were spending lakhs on influencers with millions of followers, only to see zero results. Why? Because most of those followers were fake.</p>
                            
                            <p style="color: #fff8f0;">I remember a client who paid ₹5 lakhs for a campaign with a "celebrity influencer" boasting 2 million followers. The campaign generated exactly 47 website visits. Forty-seven. That's when I knew something had to change.</p>
                            
                            <div style="padding: 30px; background: rgba(255,215,0,0.15); border-left: 4px solid var(--accent-yellow); margin: 30px 0;">
                                <p style="margin-bottom: 0; color: #fff8f0;"><strong style="color: var(--accent-yellow);">"The influencer industry is broken. Fake followers, bot engagement, inflated metrics — it's a ₹1,000 crore fraud that nobody talks about. We built Rexo to fix this."</strong></p>
                            </div>
                            
                            <p style="color: #fff8f0;">At Rexo Agency, we've built technology that identifies fake followers with 95% accuracy. We've curated a network of 12,500+ creators — each one personally vetted for authentic engagement. We don't just match brands with influencers; we match them with the RIGHT influencers.</p>
                            
                            <p style="color: #fff8f0;">Our philosophy is simple:</p>
                            <ul style="margin: 20px 0; padding-left: 20px; list-style: disc;">
                                <li style="margin-bottom: 15px; color: #fff8f0;"><strong style="color: var(--accent-yellow);">Authenticity over vanity metrics.</strong> A micro-influencer with 10K engaged followers beats a celebrity with 1M fake ones.</li>
                                <li style="margin-bottom: 15px; color: #fff8f0;"><strong style="color: var(--accent-yellow);">Transparency in everything.</strong> You see exactly where your money goes and what results it generates.</li>
                                <li style="margin-bottom: 15px; color: #fff8f0;"><strong style="color: var(--accent-yellow);">Results that matter.</strong> We measure success in conversions, not just impressions.</li>
                            </ul>
                            
                            <p style="color: #fff8f0;">In just 4 years, we've grown from a 3-person team working out of a co-working space to a 50+ member organization serving 500+ brands. We've generated ₹5Cr+ in revenue for our clients and delivered 500M+ genuine views.</p>
                            
                            <p style="color: #fff8f0;">But we're just getting started. Our vision is to become India's most trusted name in influencer marketing — a partner that brands turn to when they want real results, not just reports that look good on paper.</p>
                            
                            <p style="color: #fff8f0;">If you're tired of wasting money on fake influence, let's talk. We're here to change the game.</p>
                            
                            <p style="margin-top: 40px; color: #fff8f0;">
                                <strong style="color: var(--accent-yellow);">Mukhtiyar Khan</strong><br>
                                <span style="opacity: 0.8;">Founder & CEO, Rexo Agency</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Values -->
    <section class="section">
        <div class="container">
            <div class="section-title fade-in visible">
                <h2>Our Mission & Values</h2>
                <p style="color: var(--text-dark);">The principles that guide everything we do at Rexo Agency.</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card-brutal fade-in visible text-center" style="min-height: 350px;">
                        <div style="font-size: 4rem; margin-bottom: 20px;">🎯</div>
                        <h4 style="color: var(--text-dark);">Mission</h4>
                        <p style="color: var(--text-dark);">To democratize influencer marketing by making it transparent, measurable, and accessible to brands of all sizes. We believe every marketing rupee should generate real value.</p>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card-brutal fade-in visible text-center" style="min-height: 350px;">
                        <div style="font-size: 4rem; margin-bottom: 20px;">👁️</div>
                        <h4 style="color: var(--text-dark);">Vision</h4>
                        <p style="color: var(--text-dark);">To become India's most trusted influencer marketing platform — where brands find authentic creators and creators find meaningful partnerships that respect their audience.</p>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card-brutal fade-in visible text-center" style="min-height: 350px;">
                        <div style="font-size: 4rem; margin-bottom: 20px;">💎</div>
                        <h4 style="color: var(--text-dark);">Values</h4>
                        <p style="color: var(--text-dark);">Authenticity over vanity. Transparency in everything. Results that matter. Creator respect. Continuous innovation. Client success is our success.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="section section-alt">
        <div class="container">
            <div class="section-title fade-in visible">
                <h2>Our Journey</h2>
                <p style="color: var(--text-dark);">From a small idea to India's leading influencer marketing platform.</p>
            </div>
            
            <div class="timeline">
                <div class="timeline-item fade-in visible">
                    <div class="timeline-marker">2021</div>
                    <div class="timeline-content">
                        <h4 style="color: var(--text-dark);">The Beginning</h4>
                        <p style="color: var(--text-dark);">Rexo Agency founded by Mukhtiyar Khan with a mission to fight fake engagement in influencer marketing. Started with 3 team members and 5 brand clients.</p>
                    </div>
                </div>
                
                <div class="timeline-item fade-in visible">
                    <div class="timeline-marker">2022</div>
                    <div class="timeline-content">
                        <h4 style="color: var(--text-dark);">Rapid Growth</h4>
                        <p style="color: var(--text-dark);">Expanded to 15+ team members. Launched our AI-powered fake follower detection system. Crossed 100 successful campaigns.</p>
                    </div>
                </div>
                
                <div class="timeline-item fade-in visible">
                    <div class="timeline-marker">2023</div>
                    <div class="timeline-content">
                        <h4 style="color: var(--text-dark);">Industry Recognition</h4>
                        <p style="color: var(--text-dark);">Won "Best Emerging Agency" award. Launched gaming vertical with CPI/CPA campaigns. Reached 5,000+ creator network.</p>
                    </div>
                </div>
                
                <div class="timeline-item fade-in visible">
                    <div class="timeline-marker">2024</div>
                    <div class="timeline-content">
                        <h4 style="color: var(--text-dark);">Market Leader</h4>
                        <p style="color: var(--text-dark);">50+ team members across India. 12,500+ verified creators. 500+ brands served. ₹5Cr+ revenue generated for clients.</p>
                    </div>
                </div>
                
                <div class="timeline-item fade-in visible">
                    <div class="timeline-marker">2025</div>
                    <div class="timeline-content">
                        <h4 style="color: var(--text-dark);">The Future</h4>
                        <p style="color: var(--text-dark);">Expanding internationally. Launching creator marketplace platform. Building next-gen AI tools for campaign optimization.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section">
        <div class="container">
            <div class="section-title fade-in visible">
                <h2>Meet Our Team</h2>
                <p style="color: var(--text-dark);">The passionate individuals behind Rexo Agency's success.</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="team-card fade-in visible">
                        <div class="avatar">👨‍💼</div>
                        <h4 style="color: var(--text-dark);">Mukhtiyar Khan</h4>
                        <span class="role">Founder & CEO</span>
                        <p style="color: var(--text-dark);">Visionary leader with 6+ years in digital marketing. Passionate about authentic influence.</p>
                        <div class="team-social">
                            <a href="#">🔗</a>
                            <a href="#">📧</a>
                            <a href="#">🐦</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="team-card fade-in visible">
                        <div class="avatar">👩‍💻</div>
                        <h4 style="color: var(--text-dark);">Priya Sharma</h4>
                        <span class="role">Head of Operations</span>
                        <p style="color: var(--text-dark);">Operations expert ensuring smooth campaign execution across 500+ projects annually.</p>
                        <div class="team-social">
                            <a href="#">🔗</a>
                            <a href="#">📧</a>
                            <a href="#">🐦</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="team-card fade-in visible">
                        <div class="avatar">👨‍🔬</div>
                        <h4 style="color: var(--text-dark);">Rahul Verma</h4>
                        <span class="role">Tech Lead</span>
                        <p style="color: var(--text-dark);">Building AI-powered tools for fake follower detection and campaign optimization.</p>
                        <div class="team-social">
                            <a href="#">🔗</a>
                            <a href="#">📧</a>
                            <a href="#">🐦</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="team-card fade-in visible">
                        <div class="avatar">👩‍🎨</div>
                        <h4 style="color: var(--text-dark);">Ananya Patel</h4>
                        <span class="role">Creative Director</span>
                        <p style="color: var(--text-dark);">Leading our creative studio with innovative CGI and UGC production capabilities.</p>
                        <div class="team-social">
                            <a href="#">🔗</a>
                            <a href="#">📧</a>
                            <a href="#">🐦</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section section-dark">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="fade-in visible">
                        <h2 style="color: var(--text-light);">Ready to Work With Us?</h2>
                        <p style="font-size: 1.2rem; color: #fff8f0; margin-bottom: 30px;">Join 500+ brands who trust Rexo Agency for authentic influencer marketing that delivers real results.</p>
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a href="auth.php?mode=register" class="btn-brutal btn-brutal-lg">Start Your Campaign</a>
                            <a href="index.php#contact" class="btn-brutal btn-brutal-lg btn-brutal-outline" style="border-color: var(--text-light); color: var(--text-light);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="footer-logo">Rexo<span>Agency</span></div>
                    <p>India's leading influencer marketing agency delivering authentic, measurable results through AI-powered creator matching and fraud detection.</p>
                    <div class="footer-social">
                        <a href="#">📘</a>
                        <a href="#">📸</a>
                        <a href="#">🐦</a>
                        <a href="#">💼</a>
                        <a href="#">▶️</a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6">
                    <h5>Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="index.php#case-studies">Case Studies</a></li>
                        <li><a href="index.php#contact">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h5>Services</h5>
                    <ul class="footer-links">
                        <li><a href="services.php#influencer-marketing">Influencer Marketing</a></li>
                        <li><a href="services.php#meme-marketing">Meme Marketing</a></li>
                        <li><a href="services.php#ugc-production">UGC Production</a></li>
                        <li><a href="services.php#gaming-ua">Gaming UA</a></li>
                        <li><a href="services.php#performance-marketing">Performance Marketing</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3">
                    <h5>Contact Us</h5>
                    <ul class="footer-links">
                        <li>📧 hello@rexoagency.com</li>
                        <li>📱 +91 98765 43210</li>
                        <li>📍 Mumbai, Maharashtra, India</li>
                    </ul>
                    <div style="margin-top: 20px;">
                        <a href="https://wa.me/919876543210" class="btn-brutal btn-brutal-sm btn-brutal-green">WhatsApp Us</a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 Rexo Agency. All rights reserved.</p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Refund Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Elements -->
    <a href="https://wa.me/919876543210" class="floating-whatsapp" target="_blank">💬</a>
    
    <div class="chatbot-trigger">🤖</div>
    
    <div class="chatbot-panel">
        <div class="chatbot-header">
            <h5>Rexo Bot</h5>
            <button class="chatbot-close">×</button>
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
