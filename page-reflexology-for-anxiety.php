<?php
/**
 * Template Name: Reflexology for Anxiety
 * Description: Specialist anxiety and stress reflexology page
 */
get_header(); ?>

<style>
.srv-hero { position: relative; min-height: 420px; display: flex; align-items: center; justify-content: center; text-align: center; background: url('<?php echo content_url(); ?>/uploads/2021/04/2PC1981A-scaled.jpg') center center / cover no-repeat; padding: 80px 20px; }
.srv-hero::before { content: ''; position: absolute; inset: 0; background: rgba(0, 0, 0, 0.70); }
.srv-hero-content { position: relative; z-index: 1; max-width: 720px; margin: 0 auto; }
.srv-hero-label { font-family: 'Mulish', sans-serif; font-size: 13px; letter-spacing: 3px; text-transform: uppercase; color: rgba(255, 255, 255, 0.85); margin-bottom: 16px; }
.srv-hero h1 { font-family: 'Cormorant Garamond', Georgia, serif; font-size: clamp(2.2rem, 5vw, 3.2rem); font-weight: 500; color: #fff; margin: 0 0 20px; line-height: 1.2; }
.srv-hero-sub { font-family: 'Mulish', sans-serif; font-size: 1.1rem; color: rgba(255, 255, 255, 0.9); line-height: 1.7; max-width: 600px; margin: 0 auto; }
.srv-section { padding: 70px 20px; }
.srv-section .srv-inner { max-width: 1100px; margin: 0 auto; }
.srv-section h2 { font-family: 'Cormorant Garamond', Georgia, serif; font-size: clamp(1.8rem, 3.5vw, 2.4rem); font-weight: 500; color: #2c2c2c; margin: 0 0 24px; line-height: 1.25; }
.srv-section h3 { font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.4rem; font-weight: 500; color: #2c2c2c; margin: 30px 0 16px; }
.srv-section p, .srv-section li { font-family: 'Mulish', sans-serif; font-size: 1rem; color: #444; line-height: 1.8; }
.srv-two-col { display: grid; grid-template-columns: 3fr 2fr; gap: 50px; align-items: center; }
.srv-two-col-rev { display: grid; grid-template-columns: 2fr 3fr; gap: 50px; align-items: center; }
@media (max-width: 768px) { .srv-two-col, .srv-two-col-rev { grid-template-columns: 1fr; gap: 30px; } }
.srv-two-col img, .srv-two-col-rev img { width: 100%; height: auto; border-radius: 12px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1); }
.srv-warm { background-color: #F5EAE7; }
.srv-benefits { list-style: none; padding: 0; margin: 20px 0; }
.srv-benefits li { padding: 8px 0 8px 28px; position: relative; }
.srv-benefits li::before { content: '✦'; position: absolute; left: 0; color: #C77D81; font-size: 14px; }
.srv-testimonials { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-top: 40px; }
@media (max-width: 768px) { .srv-testimonials { grid-template-columns: 1fr; } }
.srv-testimonial-card { background: #fff; border-radius: 12px; padding: 32px 28px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06); position: relative; }
.srv-testimonial-card::before { content: '\201C'; font-family: Georgia, serif; font-size: 4rem; color: #C77D81; opacity: 0.3; position: absolute; top: 8px; left: 20px; line-height: 1; }
.srv-testimonial-card p { font-style: italic; margin: 0 0 16px; font-size: 0.95rem; color: #555; }
.srv-testimonial-card .srv-author { font-family: 'Mulish', sans-serif; font-weight: 700; font-style: normal; color: #2c2c2c; font-size: 0.9rem; }
.srv-faq-item { border-bottom: 1px solid #e0d6d0; }
.srv-faq-item:first-child { border-top: 1px solid #e0d6d0; }
.srv-faq-question { display: flex; justify-content: space-between; align-items: center; padding: 20px 0; cursor: pointer; background: none; border: none; width: 100%; text-align: left; font-family: 'Mulish', sans-serif; font-size: 1.05rem; font-weight: 600; color: #2c2c2c; }
.srv-faq-question:hover { color: #C77D81; }
.srv-faq-question::after { content: '+'; font-size: 1.4rem; font-weight: 300; color: #C77D81; flex-shrink: 0; margin-left: 16px; }
.srv-faq-item.active .srv-faq-question::after { content: '−'; }
.srv-faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease; }
.srv-faq-item.active .srv-faq-answer { max-height: 300px; padding-bottom: 20px; }
.srv-faq-answer p { margin: 0; font-size: 0.95rem; color: #555; }
.srv-cta { background-color: #C77D81; text-align: center; padding: 70px 20px; }
.srv-cta h2 { color: #fff; }
.srv-cta p { color: rgba(255, 255, 255, 0.9); max-width: 550px; margin: 0 auto 30px; }
.srv-cta-btn { display: inline-block; background: #fff; color: #C77D81; font-family: 'Mulish', sans-serif; font-weight: 700; font-size: 0.95rem; letter-spacing: 2px; text-transform: uppercase; text-decoration: none; padding: 16px 40px; border-radius: 4px; transition: all 0.3s ease; }
.srv-cta-btn:hover { background: #2c2c2c; color: #fff; }
.srv-centered { text-align: center; }
.srv-centered p { max-width: 700px; margin-left: auto; margin-right: auto; }
.srv-fade-in { opacity: 0; transform: translateY(25px); transition: opacity 0.7s ease, transform 0.7s ease; }
.srv-fade-in.is-visible { opacity: 1; transform: translateY(0); }
</style>

<!-- Hero -->
<div class="srv-hero">
    <div class="srv-hero-content">
        <div class="srv-hero-label">Finding Calm</div>
        <h1>Reflexology for Anxiety &amp; Stress</h1>
        <p class="srv-hero-sub">A safe, calming space to ease anxiety, quiet an overactive mind and restore a sense of balance, from a specialist reflexologist in Berkhamsted.</p>
    </div>
</div>

<!-- Introduction -->
<div class="srv-section srv-fade-in">
    <div class="srv-inner">
        <div class="srv-two-col">
            <div>
                <h2>You don't have to carry it all alone</h2>
                <p>Anxiety can feel relentless. The racing thoughts, the tightness in your chest, the broken sleep, the constant sense that something isn't quite right. Whether it's triggered by life changes, work pressure, health worries or hormonal shifts — it takes a toll on your whole body.</p>
                <p><strong>Reflexology can help.</strong></p>
                <p>By working specific reflex points linked to the nervous system and adrenal glands, reflexology helps switch your body from "fight or flight" into a calmer, more balanced state. Many clients describe a profound sense of peace during and after treatment — often for the first time in months.</p>
            </div>
            <div>
                <img src="<?php echo content_url(); ?>/uploads/2021/04/3PC2080A-scaled.jpeg" alt="Calming reflexology treatment in Berkhamsted" />
            </div>
        </div>
    </div>
</div>

<!-- How It Helps -->
<div class="srv-section srv-warm srv-fade-in">
    <div class="srv-inner">
        <h2>How reflexology helps with anxiety and stress</h2>
        <p>When you're stressed or anxious, your body produces excess cortisol and adrenaline — the hormones responsible for the "fight or flight" response. Over time, this becomes chronic, affecting your sleep, digestion, immune system and mood. Reflexology works to calm the nervous system, reduce cortisol levels and encourage the body to return to a state of equilibrium.</p>
        <h3>What my clients experience</h3>
        <ul class="srv-benefits">
            <li>A deep sense of calm and relaxation during treatment</li>
            <li>Reduced racing thoughts and mental chatter</li>
            <li>Better quality, more restful sleep</li>
            <li>Lower levels of physical tension — especially in the shoulders, jaw and stomach</li>
            <li>Improved mood and emotional resilience</li>
            <li>A feeling of being more grounded and present</li>
        </ul>
    </div>
</div>

<!-- What to Expect -->
<div class="srv-section srv-fade-in">
    <div class="srv-inner">
        <div class="srv-two-col-rev">
            <div>
                <img src="<?php echo content_url(); ?>/uploads/2021/04/2PC1981A-scaled.jpg" alt="Peaceful reflexology clinic in Berkhamsted" />
            </div>
            <div>
                <h2>What to expect from your treatment</h2>
                <p>Your first session begins with a conversation. I want to understand what's going on for you — what triggers your anxiety, how it manifests in your body, and what you're hoping to achieve. There is no judgement, only care.</p>
                <p>During treatment, you'll lie comfortably while I work through reflex points that target the nervous system, adrenals, solar plexus and brain. Most clients feel a wave of calm within the first few minutes. Many fall asleep. Sessions last approximately 45–60 minutes.</p>
                <p>For anxiety and stress, I recommend an initial course of weekly sessions for 4–6 weeks. Many clients then continue with regular maintenance sessions as part of their ongoing self-care. The cumulative effect is where the real transformation happens.</p>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials -->
<div class="srv-section srv-warm srv-fade-in">
    <div class="srv-inner">
        <h2 style="text-align: center;">What my clients say</h2>
        <div class="srv-testimonials">
            <div class="srv-testimonial-card">
                <p>I came to Jenny at a point where my anxiety was overwhelming. After just a few sessions, I felt noticeably calmer and was sleeping through the night for the first time in months.</p>
                <span class="srv-author">— Anxiety client</span>
            </div>
            <div class="srv-testimonial-card">
                <p>Jenny creates the most calming environment. From the moment I walk in, I feel the stress begin to lift. Reflexology has become an essential part of managing my mental health.</p>
                <span class="srv-author">— Stress client</span>
            </div>
            <div class="srv-testimonial-card">
                <p>I was sceptical at first, but the difference in how I feel after regular reflexology is undeniable. My anxiety is more manageable and I feel more like myself again.</p>
                <span class="srv-author">— Anxiety client</span>
            </div>
        </div>
    </div>
</div>

<!-- Approach -->
<div class="srv-section srv-centered srv-fade-in">
    <div class="srv-inner">
        <h2>A holistic approach to anxiety</h2>
        <p>Reflexology is not a replacement for professional mental health support — but it is a powerful complement to it. Many of my clients use reflexology alongside therapy, medication or other wellbeing practices. I'm always happy to work alongside your GP or therapist.</p>
        <p>I trained in the Eunice Ingham method at The London School of Reflexology and hold a Level 3 qualification with full insurance. I am a proud member of the Association of Reflexologists.</p>
    </div>
</div>

<!-- FAQ -->
<div class="srv-section srv-warm srv-fade-in">
    <div class="srv-inner" style="max-width: 800px;">
        <h2 style="text-align: center;">Frequently asked questions</h2>
        <div class="srv-faq-item">
            <button class="srv-faq-question" onclick="this.parentElement.classList.toggle('active')">Can reflexology really help with anxiety?</button>
            <div class="srv-faq-answer"><p>Yes. Reflexology works by calming the nervous system and reducing cortisol levels. Many clients report significant improvements in anxiety symptoms, sleep quality and overall mood after regular sessions. It is not a cure, but it is a deeply effective support.</p></div>
        </div>
        <div class="srv-faq-item">
            <button class="srv-faq-question" onclick="this.parentElement.classList.toggle('active')">How many sessions will I need?</button>
            <div class="srv-faq-answer"><p>I typically recommend starting with 4–6 weekly sessions to build the cumulative benefit. Many clients then continue with fortnightly or monthly maintenance sessions. However, even a single session can provide noticeable relief.</p></div>
        </div>
        <div class="srv-faq-item">
            <button class="srv-faq-question" onclick="this.parentElement.classList.toggle('active')">Can I have reflexology alongside medication or therapy?</button>
            <div class="srv-faq-answer"><p>Absolutely. Reflexology is a complementary therapy and works well alongside medication, talking therapies and other wellbeing practices. It is not a replacement for professional mental health support.</p></div>
        </div>
        <div class="srv-faq-item">
            <button class="srv-faq-question" onclick="this.parentElement.classList.toggle('active')">What if I feel emotional during a session?</button>
            <div class="srv-faq-answer"><p>This is completely normal and nothing to worry about. Reflexology can release stored tension and emotion — it's a sign that your body is processing and letting go. I create a safe, supportive space where you can simply be.</p></div>
        </div>
    </div>
</div>

<!-- CTA -->
<div class="srv-cta">
    <div class="srv-inner">
        <h2>Ready to find some calm?</h2>
        <p>Book your appointment today. Your first session includes a full consultation so we can discuss what you're experiencing and how reflexology can help.</p>
        <a href="https://jennysumnerbookings.as.me/" target="_blank" class="srv-cta-btn">Book Your Appointment</a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) { if (entry.isIntersecting) entry.target.classList.add('is-visible'); });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
    document.querySelectorAll('.srv-fade-in').forEach(function(el) { observer.observe(el); });
});
</script>

<?php get_footer(); ?>
