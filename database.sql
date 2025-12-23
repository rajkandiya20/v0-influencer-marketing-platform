-- Rexo Agency Database Schema
-- Influencer Marketing Platform

CREATE DATABASE IF NOT EXISTS rexo_agency;
USE rexo_agency;

-- Users Table (Brands & Influencers)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    user_type ENUM('brand', 'influencer', 'admin') NOT NULL,
    company_name VARCHAR(100),
    website VARCHAR(255),
    social_instagram VARCHAR(100),
    social_youtube VARCHAR(100),
    social_twitter VARCHAR(100),
    followers_count INT DEFAULT 0,
    niche VARCHAR(100),
    bio TEXT,
    profile_image VARCHAR(255),
    is_verified TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Campaigns Table
CREATE TABLE campaigns (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand_id INT NOT NULL,
    title VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    category ENUM('gaming', 'fashion', 'tech', 'lifestyle', 'food', 'travel', 'fitness', 'beauty', 'education', 'finance') NOT NULL,
    platform ENUM('instagram', 'youtube', 'twitter', 'linkedin', 'all') NOT NULL,
    influencer_type ENUM('micro', 'macro', 'mega', 'any') DEFAULT 'any',
    budget_min DECIMAL(12,2) NOT NULL,
    budget_max DECIMAL(12,2) NOT NULL,
    deliverables TEXT,
    requirements TEXT,
    start_date DATE,
    end_date DATE,
    status ENUM('draft', 'active', 'paused', 'completed', 'cancelled') DEFAULT 'active',
    views_target INT,
    engagement_target DECIMAL(5,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (brand_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Applications Table (Influencers applying to campaigns)
CREATE TABLE applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    campaign_id INT NOT NULL,
    influencer_id INT NOT NULL,
    proposal TEXT NOT NULL,
    quoted_price DECIMAL(12,2) NOT NULL,
    expected_deliverables TEXT,
    portfolio_links TEXT,
    status ENUM('pending', 'accepted', 'rejected', 'completed') DEFAULT 'pending',
    brand_feedback TEXT,
    influencer_rating TINYINT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (campaign_id) REFERENCES campaigns(id) ON DELETE CASCADE,
    FOREIGN KEY (influencer_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Service Requests Table
CREATE TABLE service_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    company_name VARCHAR(100),
    service_type ENUM('influencer_marketing', 'performance_marketing', 'meme_marketing', 'ugc_production', 'cgi_ads', 'gaming_ua', 'tech_solutions', 'creative_studio') NOT NULL,
    budget_range ENUM('below_1l', '1l_5l', '5l_10l', '10l_25l', 'above_25l') NOT NULL,
    campaign_objective TEXT,
    target_audience TEXT,
    preferred_platforms VARCHAR(255),
    timeline VARCHAR(100),
    additional_notes TEXT,
    status ENUM('new', 'contacted', 'in_progress', 'completed', 'cancelled') DEFAULT 'new',
    assigned_to INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE SET NULL
);

-- Case Studies Table
CREATE TABLE case_studies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    client_name VARCHAR(100),
    industry VARCHAR(100),
    challenge TEXT,
    solution TEXT,
    results TEXT,
    metrics_reach BIGINT,
    metrics_engagement DECIMAL(5,2),
    metrics_roi DECIMAL(10,2),
    thumbnail_image VARCHAR(255),
    featured TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Contact Inquiries Table
CREATE TABLE contact_inquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(200),
    message TEXT NOT NULL,
    inquiry_type ENUM('general', 'partnership', 'support', 'careers') DEFAULT 'general',
    status ENUM('new', 'responded', 'closed') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample admin user
INSERT INTO users (full_name, email, password, user_type, is_verified) 
VALUES ('Admin', 'admin@rexoagency.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 1);

-- Insert sample case study
INSERT INTO case_studies (title, client_name, industry, challenge, solution, results, metrics_reach, metrics_engagement, metrics_roi, featured)
VALUES (
    'Gaming App Launch: 10M Downloads in 30 Days',
    'WinZO Games',
    'Gaming',
    'WinZO needed to acquire 10 million new users within 30 days for their new fantasy sports feature launch. Traditional advertising was yielding a CPI of ₹45, which was unsustainable for their growth targets.',
    'We deployed a multi-tier influencer strategy combining 50 gaming micro-influencers (10K-100K followers), 15 macro gaming YouTubers, and 5 celebrity gaming endorsements. We created custom gameplay content, tutorial videos, and live streaming events.',
    'Achieved 12.5 million app installs, reduced CPI to ₹18 (60% reduction), generated 500M+ video views, and the campaign went viral on Twitter with #WinZOChallenge trending for 3 days.',
    500000000,
    8.5,
    340.00,
    1
);
