<?php
/**
 * Plugin Styles - ELEMENTOR COMPATIBLE
 * CSS with higher specificity to override page builders
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<style>
/* ============================================ */
/* ELEMENTOR & PAGE BUILDER COMPATIBILITY */
/* ============================================ */

/* Override Elementor Container Styles - Highest Priority */
.elementor-widget-shortcode .ps-slider-container,
.elementor-element .ps-slider-container,
.elementor-column .ps-slider-container,
div[class*="elementor"] .ps-slider-container,
.ps-slider-container {
    all: initial !important;
    display: block !important;
    position: relative !important;
    box-sizing: border-box !important;
    font-family: Arial, sans-serif !important;
    margin: 40px auto !important;
    clear: both !important;
    width: 100% !important;
    max-width: 100% !important;
    line-height: 1.5 !important;
    color: #333 !important;
    background: transparent !important;
}

/* Force reset for all children */
.elementor-widget-shortcode .ps-slider-container *,
.elementor-element .ps-slider-container *,
.elementor-column .ps-slider-container *,
div[class*="elementor"] .ps-slider-container *,
.ps-slider-container * {
    box-sizing: border-box !important;
    line-height: inherit !important;
}

.ps-slider-container *::before,
.ps-slider-container *::after {
    box-sizing: border-box !important;
}

/* Re-apply essential styles after reset */
.ps-slider-container img {
    display: block !important;
    max-width: 100% !important;
    height: auto !important;
    border: 0 !important;
}

.ps-slider-container a {
    text-decoration: none !important;
    background-color: transparent !important;
    color: inherit !important;
}

.ps-slider-container button {
    cursor: pointer !important;
    font-family: inherit !important;
    outline: none !important;
}

/* Override Elementor flex/grid */
.elementor-widget-shortcode > .elementor-widget-container > .ps-slider-container,
.elementor-element > .elementor-widget-container > .ps-slider-container,
.elementor-column > .elementor-widget-wrap > .ps-slider-container {
    display: block !important;
}

/* Reset margins/paddings with high specificity */
.ps-slider-container div,
.ps-slider-container h1,
.ps-slider-container h2,
.ps-slider-container h3,
.ps-slider-container h4,
.ps-slider-container h5,
.ps-slider-container h6,
.ps-slider-container p,
.ps-slider-container ul,
.ps-slider-container ol,
.ps-slider-container li,
.ps-slider-container span,
.ps-slider-container button {
    margin: 0 !important;
    padding: 0 !important;
    border: 0 !important;
    font-size: 100% !important;
    vertical-align: baseline !important;
    background: transparent !important;
}

/* Reset lists */
.ps-slider-container ul,
.ps-slider-container ol {
    list-style: none !important;
}

.ps-slider-container li {
    list-style: none !important;
}

/* ============================================ */
/* STYLE: CARD 1 (Full Width Image + Content) */
/* ============================================ */
.ps-slider-container.ps-card1 {

    padding: 0 !important;
}

.ps-slider-container.ps-card1 .ps-slider {
    overflow: hidden !important;
    border-radius: 10px !important;
    position: relative !important;
    width: 100% !important;
}

.ps-slider-container.ps-card1 .ps-slider-wrapper {
    display: flex !important;
    flex-direction: row !important;
    flex-wrap: nowrap !important;
    transition: transform 0.5s ease !important;
    width: 100% !important;
}

/* CARD STYLE */
.ps-slider-container.ps-card1 .ps-card {
    min-width: 100% !important;
    width: 100% !important;
    flex: 0 0 100% !important;
    background: white !important;
    border-radius: 10px !important;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
    display: flex !important;
    flex-direction: row !important;
    flex-wrap: nowrap !important;
    overflow: hidden !important;
    align-items: stretch !important;
    min-height: 400px !important;
}

/* Image 40% kiri - UPDATED: Using <img> tag instead of background-image */
.ps-slider-container.ps-card1 .ps-card-image {
    flex: 0 0 40% !important;
    width: 40% !important;
    min-width: 40% !important;
    max-width: 40% !important;
    height: 100% !important;
    min-height: 400px !important;
    position: relative !important;
    overflow: hidden !important;
}

.ps-slider-container.ps-card1 .ps-card-image img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    object-position: center !important;
    display: block !important;
}

/* Content kanan */
.ps-slider-container.ps-card1 .ps-card-content {
    flex: 1 !important;
    width: 60% !important;
    padding: 40px !important;
    display: flex !important;
    flex-direction: column !important;
    justify-content: space-between !important;
    background: white !important;
}

.ps-slider-container.ps-card1 .ps-tag {
    display: inline-block !important;
    background: #f0f0f0 !important;
    padding: 5px 15px !important;
    border-radius: 20px !important;
    font-size: 12px !important;
    color: #666 !important;
    margin-right: 8px !important;
    margin-bottom: 15px !important;
    line-height: 1.5 !important;
}

.ps-slider-container.ps-card1 .ps-card-title {
    font-size: 24px !important;
    font-weight: bold !important;
    color: #333 !important;
    margin-bottom: 10px !important;
    margin-top: 0 !important;
    line-height: 1.3 !important;
}

.ps-slider-container.ps-card1 .ps-card-title a {
    color: #333 !important;
    text-decoration: none !important;
    font-size: 24px !important;
    font-weight: bold !important;
}

.ps-slider-container.ps-card1 .ps-card-title a:hover {
    color: #0066cc !important;
}

.ps-slider-container.ps-card1 .ps-card-meta {
    color: #888 !important;
    font-size: 14px !important;
    margin-bottom: 20px !important;
    margin-top: 0 !important;
    line-height: 1.5 !important;
}

.ps-slider-container.ps-card1 .ps-card-description {
    color: #555 !important;
    line-height: 1.8 !important;
    font-size: 15px !important;
    flex-grow: 1 !important;
    margin: 0 !important;
}

.ps-slider-container.ps-card1 .ps-card-author {
    display: flex !important;
    flex-direction: row !important;
    align-items: center !important;
    gap: 10px !important;
    padding-top: 20px !important;
    border-top: 1px solid #eee !important;
    margin-top: 20px !important;
    margin-bottom: 0 !important;
}

.ps-slider-container.ps-card1 .ps-author-avatar {
    width: 50px !important;
    height: 50px !important;
    min-width: 50px !important;
    border-radius: 50% !important;
    background: #ddd !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-weight: bold !important;
    color: #666 !important;
    flex-shrink: 0 !important;
    font-size: 18px !important;
}

.ps-slider-container.ps-card1 .ps-author-info {
    font-size: 14px !important;
    flex: 1 !important;
}

.ps-slider-container.ps-card1 .ps-author-name {
    font-weight: bold !important;
    color: #333 !important;
    font-size: 14px !important;
    line-height: 1.4 !important;
}

.ps-slider-container.ps-card1 .ps-author-date {
    color: #888 !important;
    font-size: 13px !important;
    line-height: 1.4 !important;
}

/* Navigation Controls */
.ps-slider-container.ps-card1 .ps-slider-controls {
    display: flex !important;
    flex-direction: row !important;
    justify-content: center !important;
    gap: 20px !important;
    margin-top: 30px !important;
    align-items: center !important;
}

.ps-slider-container.ps-card1 .ps-slider-btn {
    background: white !important;
    border: 2px solid #ddd !important;
    width: 50px !important;
    height: 50px !important;
    min-width: 50px !important;
    min-height: 50px !important;
    border-radius: 50% !important;
    cursor: pointer !important;
    font-size: 20px !important;
    transition: all 0.3s !important;
    color: #333 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    padding: 0 !important;
    margin: 0 !important;
    line-height: 1 !important;
}

.ps-slider-container.ps-card1 .ps-slider-btn:hover {
    background: #333 !important;
    color: white !important;
    border-color: #333 !important;
}

/* Dots */
.ps-slider-container.ps-card1 .ps-slider-dots {
    display: flex !important;
    flex-direction: row !important;
    justify-content: center !important;
    gap: 10px !important;
    margin-top: 20px !important;
    align-items: center !important;
}

.ps-slider-container.ps-card1 .ps-dot {
    width: 10px !important;
    height: 10px !important;
    min-width: 10px !important;
    min-height: 10px !important;
    border-radius: 50% !important;
    background: #ddd !important;
    cursor: pointer !important;
    transition: all 0.3s !important;
    border: none !important;
    padding: 0 !important;
    margin: 0 !important;
}

.ps-slider-container.ps-card1 .ps-dot.active {
    background: #333 !important;
    width: 30px !important;
    border-radius: 5px !important;
}

/* Responsive */
@media (max-width: 768px) {
    .ps-slider-container.ps-card1 .ps-card {
        flex-direction: column !important;
    }
    .ps-slider-container.ps-card1 .ps-card-image {
        flex: none !important;
        width: 100% !important;
        height: 200px !important;
        min-height: 200px !important;
    }
    .ps-slider-container.ps-card1 .ps-card-content {
        padding: 20px !important;
        width: 100% !important;
    }
    .ps-slider-container.ps-card1 .ps-card-title,
    .ps-slider-container.ps-card1 .ps-card-title a {
        font-size: 20px !important;
    }
}

/* ============================================ */
/* STYLE: CARD 2 (3 Cards Horizontal) */
/* ============================================ */
.ps-slider-container.ps-card2 {
    max-width: 1200px !important;
    padding: 0 !important;
}

.ps-slider-container.ps-card2 .ps-slider {
    overflow: hidden !important;
    padding: 10px 0 !important;
    position: relative !important;
    width: 100% !important;
}

.ps-slider-container.ps-card2 .ps-slider-wrapper {
    display: flex !important;
    flex-direction: row !important;
    flex-wrap: nowrap !important;
    gap: 30px !important;
    transition: transform 0.5s ease !important;
    width: auto !important;
}

/* CARD STYLE */
.ps-slider-container.ps-card2 .ps-card {
    min-width: calc(33.333% - 20px) !important;
    width: calc(33.333% - 20px) !important;
    flex: 0 0 calc(33.333% - 20px) !important;
    background: white !important;
    border-radius: 10px !important;
    padding: 25px !important;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
    transition: transform 0.3s, box-shadow 0.3s !important;
    display: block !important;
}

.ps-slider-container.ps-card2 .ps-card:hover {
    transform: translateY(-5px) !important;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15) !important;
}

.ps-slider-container.ps-card2 .ps-tag {
    display: inline-block !important;
    background: #f0f0f0 !important;
    padding: 4px 12px !important;
    border-radius: 15px !important;
    font-size: 11px !important;
    color: #666 !important;
    margin-right: 5px !important;
    margin-bottom: 10px !important;
    line-height: 1.5 !important;
}

.ps-slider-container.ps-card2 .ps-card-title {
    font-size: 20px !important;
    font-weight: bold !important;
    color: #333 !important;
    margin-bottom: 10px !important;
    margin-top: 0 !important;
    line-height: 1.3 !important;
}

.ps-slider-container.ps-card2 .ps-card-title a {
    color: #333 !important;
    text-decoration: none !important;
    font-size: 20px !important;
    font-weight: bold !important;
}

.ps-slider-container.ps-card2 .ps-card-title a:hover {
    color: #0066cc !important;
}

.ps-slider-container.ps-card2 .ps-card-meta {
    color: #888 !important;
    font-size: 13px !important;
    margin-bottom: 15px !important;
    margin-top: 0 !important;
    line-height: 1.5 !important;
}

.ps-slider-container.ps-card2 .ps-card-description {
    color: #666 !important;
    line-height: 1.6 !important;
    font-size: 14px !important;
    margin-bottom: 20px !important;
    margin-top: 0 !important;
}

.ps-slider-container.ps-card2 .ps-card-author {
    display: flex !important;
    flex-direction: row !important;
    align-items: center !important;
    gap: 10px !important;
    padding-top: 15px !important;
    border-top: 1px solid #eee !important;
    margin: 0 !important;
}

.ps-slider-container.ps-card2 .ps-author-avatar {
    width: 40px !important;
    height: 40px !important;
    min-width: 40px !important;
    border-radius: 50% !important;
    background: #ddd !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-weight: bold !important;
    color: #666 !important;
    font-size: 14px !important;
    flex-shrink: 0 !important;
}

.ps-slider-container.ps-card2 .ps-author-info {
    font-size: 13px !important;
    flex: 1 !important;
}

.ps-slider-container.ps-card2 .ps-author-name {
    font-weight: bold !important;
    color: #333 !important;
    font-size: 13px !important;
    line-height: 1.4 !important;
}

.ps-slider-container.ps-card2 .ps-author-date {
    color: #888 !important;
    font-size: 12px !important;
    line-height: 1.4 !important;
}

/* Navigation */
.ps-slider-container.ps-card2 .ps-slider-controls {
    display: flex !important;
    flex-direction: row !important;
    justify-content: center !important;
    gap: 20px !important;
    margin-top: 30px !important;
    align-items: center !important;
}

.ps-slider-container.ps-card2 .ps-slider-btn {
    background: white !important;
    border: 2px solid #ddd !important;
    width: 50px !important;
    height: 50px !important;
    min-width: 50px !important;
    min-height: 50px !important;
    border-radius: 50% !important;
    cursor: pointer !important;
    font-size: 20px !important;
    transition: all 0.3s !important;
    color: #333 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    padding: 0 !important;
    margin: 0 !important;
    line-height: 1 !important;
}

.ps-slider-container.ps-card2 .ps-slider-btn:hover {
    background: #333 !important;
    color: white !important;
    border-color: #333 !important;
}

.ps-slider-container.ps-card2 .ps-slider-btn:disabled {
    opacity: 0.3 !important;
    cursor: not-allowed !important;
}

.ps-slider-container.ps-card2 .ps-slider-btn:disabled:hover {
    background: white !important;
    color: #333 !important;
}

/* Responsive */
@media (max-width: 968px) {
    .ps-slider-container.ps-card2 .ps-card {
        min-width: calc(50% - 15px) !important;
        width: calc(50% - 15px) !important;
        flex: 0 0 calc(50% - 15px) !important;
    }
}

@media (max-width: 640px) {
    .ps-slider-container.ps-card2 .ps-card {
        min-width: 100% !important;
        width: 100% !important;
        flex: 0 0 100% !important;
    }
}

/* ============================================ */
/* STYLE: LIST (Sidebar + Big Image) */
/* ============================================ */
.ps-slider-container.ps-list {
    background-color: #000 !important;
    color: #fff !important;
    width: 100% !important;
    overflow: hidden !important;
    margin: 40px 0 !important;
    padding: 0 !important;
    max-width: 100% !important;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
}

.ps-slider-container.ps-list .ps-list-container {
    display: flex !important;
    flex-direction: row !important;
    flex-wrap: nowrap !important;
    min-height: 600px !important;
    max-width: 100% !important;
    margin: 0 !important;
    background-color: #000 !important;
    align-items: stretch !important;
}

/* Left Sidebar - 35% */
.ps-slider-container.ps-list .ps-list-sidebar {
    flex: 0 0 35% !important;
    width: 35% !important;
    min-width: 35% !important;
    max-width: 35% !important;
    background-color: #000 !important;

    display: flex !important;
    flex-direction: column !important;
}

.ps-slider-container.ps-list .ps-list-sidebar h1 {
    font-size: 48px !important;
    font-weight: 700 !important;
    margin-bottom: 40px !important;
    margin-top: 0 !important;
    line-height: 1.2 !important;
    color: #fff !important;
}

.ps-slider-container.ps-list .ps-list-items {
    list-style: none !important;
    margin: 0 !important;
    padding: 0 !important;
}

.ps-slider-container.ps-list .ps-list-item {
    margin-bottom: 20px !important;
    margin-top: 0 !important;
    cursor: pointer !important;
    transition: all 0.3s ease !important;
    position: relative !important;
    padding-left: 15px !important;
    padding-bottom: 12px !important;
    padding-top: 0 !important;
    padding-right: 0 !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
}

.ps-slider-container.ps-list .ps-list-item:last-child {
    border-bottom: none !important;
}

.ps-slider-container.ps-list .ps-list-item::before {
    content: '' !important;
    position: absolute !important;
    left: 0 !important;
    top: 0 !important;
    width: 3px !important;
    height: 0 !important;
    background-color: #00d9ff !important;
    transition: height 0.3s ease !important;
}

.ps-slider-container.ps-list .ps-list-item:hover::before,
.ps-slider-container.ps-list .ps-list-item.active::before {
    height: 100% !important;
}

.ps-slider-container.ps-list .ps-list-item h3 {
    font-size: 16px !important;
    font-weight: 400 !important;
    line-height: 1.6 !important;
    color: #fff !important;
    transition: color 0.3s ease !important;
    margin: 0 !important;
    padding-bottom: 4px !important;
    padding-top: 0 !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
}

.ps-slider-container.ps-list .ps-list-item.featured h3 {
    color: #00d9ff !important;
}

.ps-slider-container.ps-list .ps-list-item:hover h3 {
    color: #00d9ff !important;
}

.ps-slider-container.ps-list .ps-list-item.active h3 {
    color: #00d9ff !important;
    font-weight: 600 !important;
}

/* Right Slider */
.ps-slider-container.ps-list .ps-list-slider {
    flex: 1 !important;
    width: 65% !important;
    position: relative !important;
    overflow: hidden !important;
}

.ps-slider-container.ps-list .ps-list-slider-wrapper {
    position: relative !important;
    width: 100% !important;
    height: 100% !important;
}

.ps-slider-container.ps-list .ps-list-slide {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    opacity: 0 !important;
    transition: opacity 0.5s ease !important;
}

.ps-slider-container.ps-list .ps-list-slide.active {
    opacity: 1 !important;
    z-index: 1 !important;
}

.ps-slider-container.ps-list .ps-list-slide img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    object-position: center !important;
    display: block !important;
}

.ps-slider-container.ps-list .ps-list-slide-overlay {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    background: rgba(0, 0, 0, 0) !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    transition: background 0.3s ease !important;
    z-index: 2 !important;
}

.ps-slider-container.ps-list .ps-list-slide:hover .ps-list-slide-overlay {
    background: rgba(0, 0, 0, 0.7) !important;
}

.ps-slider-container.ps-list .ps-list-slide-content {
    text-align: center !important;
    padding: 30px !important;
    opacity: 0 !important;
    transform: translateY(20px) !important;
    transition: all 0.3s ease !important;
    max-width: 700px !important;
}

.ps-slider-container.ps-list .ps-list-slide:hover .ps-list-slide-content {
    opacity: 1 !important;
    transform: translateY(0) !important;
}

.ps-slider-container.ps-list .ps-list-slide-content h2 {
    font-size: 1.4rem !important;
    font-weight: 600 !important;
    margin-bottom: 12px !important;
    margin-top: 0 !important;
    line-height: 1.3 !important;
    color: #fff !important;
}

.ps-slider-container.ps-list .ps-list-slide-content .ps-list-category {
    font-size: 0.85rem !important;
    font-style: italic !important;
    color: #00d9ff !important;
    margin-bottom: 15px !important;
    margin-top: 0 !important;
    display: block !important;
}

.ps-slider-container.ps-list .ps-list-slide-link {
    display: inline-block !important;
    margin-top: 15px !important;
    margin-bottom: 0 !important;
    padding: 10px 25px !important;
    background-color: #00d9ff !important;
    color: #000 !important;
    text-decoration: none !important;
    font-weight: 600 !important;
    font-size: 0.9rem !important;
    border-radius: 5px !important;
    transition: all 0.3s ease !important;
}

.ps-slider-container.ps-list .ps-list-slide-link:hover {
    background-color: #fff !important;
    color: #000 !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 5px 15px rgba(0, 217, 255, 0.4) !important;
}

/* Navigation Arrows */
.ps-slider-container.ps-list .ps-list-nav {
    position: absolute !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    z-index: 10 !important;
    background: rgba(71, 85, 105, 0.5) !important;
    border: none !important;
    color: #fff !important;
    width: 50px !important;
    height: 50px !important;
    min-width: 50px !important;
    min-height: 50px !important;
    cursor: pointer !important;
    transition: all 0.3s ease !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    border-radius: 0 !important;
    backdrop-filter: blur(4px) !important;
    padding: 0 !important;
    margin: 0 !important;
}

.ps-slider-container.ps-list .ps-list-nav svg {
    width: 24px !important;
    height: 24px !important;
    fill: currentColor !important;
    display: block !important;
}

.ps-slider-container.ps-list .ps-list-nav.ps-prev {
    left: 0 !important;
    right: auto !important;
}

.ps-slider-container.ps-list .ps-list-nav.ps-next {
    right: 0 !important;
    left: auto !important;
}

.ps-slider-container.ps-list .ps-list-nav:hover {
    background: rgba(0, 217, 255, 0.8) !important;
    color: #000 !important;
}

/* Pagination Dots */
.ps-slider-container.ps-list .ps-list-pagination {
    position: absolute !important;
    bottom: 30px !important;
    left: 50% !important;
    transform: translateX(-50%) !important;
    display: flex !important;
    flex-direction: row !important;
    gap: 12px !important;
    z-index: 10 !important;
    align-items: center !important;
}

.ps-slider-container.ps-list .ps-list-dot {
    width: 12px !important;
    height: 12px !important;
    min-width: 12px !important;
    min-height: 12px !important;
    border-radius: 50% !important;
    background: rgba(255, 255, 255, 0.4) !important;
    border: none !important;
    cursor: pointer !important;
    transition: all 0.3s ease !important;
    padding: 0 !important;
    margin: 0 !important;
}

.ps-slider-container.ps-list .ps-list-dot:hover {
    background: rgba(255, 255, 255, 0.7) !important;
    transform: scale(1.2) !important;
}

.ps-slider-container.ps-list .ps-list-dot.active {
    background: #00d9ff !important;
    width: 32px !important;
    border-radius: 6px !important;
}

/* Responsive */
@media (max-width: 968px) {
    .ps-slider-container.ps-list .ps-list-container {
        flex-direction: column !important;
        min-height: auto !important;
    }
    .ps-slider-container.ps-list .ps-list-sidebar {
        flex: none !important;
        width: 100% !important;
        padding: 40px 20px !important;
    }
    .ps-slider-container.ps-list .ps-list-sidebar h1 {
        font-size: 2rem !important;
        margin-bottom: 20px !important;
    }
    .ps-slider-container.ps-list .ps-list-slider {
        width: 100% !important;
        min-height: 400px !important;
    }
}
</style>
