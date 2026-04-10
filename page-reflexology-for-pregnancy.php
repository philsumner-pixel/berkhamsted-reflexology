<?php
/**
 * Template Name: Reflexology for Pregnancy
 * Description: Specialist pregnancy reflexology page
 */
get_header(); ?>

<style>
.srv-hero { position: relative; min-height: 420px; display: flex; align-items: center; justify-content: center; text-align: center; background: url('<?php echo content_url(); ?>/uploads/2021/04/3PC2383A-1-scaled.jpeg') center center / cover no-repeat; padding: 80px 20px; }
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
        <div class="srv-hero-label">Nurturing Support</div>
        <h1>Reflexology for Pregnancy</h1>
        <p class="srv-hero-sub">Gentle, specialist reflexology to support you through every trimester and beyond, from a qualified reflexologist in Berkhamsted.</p>
    </div>
</div>

<!-- Introduction -->
<div class="srv-section srv-fade-in">
    <div class="srv-inner">
        <div class="srv-two-col">
            <div>
                <h2>A calm space for you and your baby</h2>
                <p>Pregnancy is a beautiful and transformative experience — but it can also be physically and emotionally demanding. Swollen ankles, back pain, nausea, fatigue, disrupted sleep and anxiety are all common, and often women are told to simply "put up with it."</p>
                <p><strong>You don't have to.</strong></p>
                <p>Reflexology offers a safe, gentle and deeply relaxing treatment that supports your body through the changes of pregnancy. I take extra care to adapt every session to your stage of pregnancy, using specific techniques that are safe and beneficial for both you and your baby.</p>
            </div>
            <div>
                <img src="<?php echo content_url(); ?>/uploads/2021/04/3PC2080A-scaled.jpeg" alt="Relaxing reflexology treatment during pregnancy" width="600" height="400" loading="lazy" />
            </div>
        </div>
    </div>
</div>

<!-- How It Helps -->
<div class="srv-section srv-warm srv-fade-in">
    <div class="srv-inner">
        <h2>How reflexology supports you during pregnancy</h2>
        <p>Reflexology works with the body's natural systems to promote balance and wellbeing. During pregnancy, specific reflex points can be used to ease common discomforts and prepare your body for labour. Many midwives now recommend reflexology as a complementary therapy during pregnancy.</p>
        <h3>What my clients experience</h3>
        <ul class="srv-benefits">
            <li>Relief from nausea and morning sickness</li>
            <li>Reduced swelling in the feet and ankles</li>
            <li>Better quality sleep</li>
            <li>Easing of back pain and pelvic discomfort</li>
            <li>Lower anxiety and improved emotional wellbeing</li>
            <li>Support for labour preparation in the final weeks</li>
        </ul>
    </div>
</div>

<!-- What to Expect -->
<div class="srv-section srv-fade-in">
    <div class="srv-inner">
        <div class="srv-two-col-rev">
            <div>
                <img src="<?php echo content_url(); ?>/uploads/2021/04/2PC1981A-scaled.jpg" alt="Reflexology clinic in Berkhamsted" width="600" height="400" loading="lazy" />
            </div>
            <div>
                <h2>What to expect from your treatment</h2>
                <p>Your first session begins with a thorough consultation so I can understand your pregnancy journey, any symptoms you're experiencing, and how I can best support you. I'll always check in with you about comfort and pressure.</p>
                <p>During the treatment, you'll be positioned comfortably — usually reclined with support cushions. The treatment focuses on gentle, targeted techniques tailored to your trimester. Sessions last approximately 45–60 minutes.</p>
                <p>Reflexology is generally safe from 12 weeks onwards. I recommend regular sessions throughout your second and third trimesters for the best cumulative benefit, with more frequent sessions in the final weeks to help prepare for labour.</p>
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
                <p>Jenny's reflexology sessions during my pregnancy were an absolute lifeline. The back pain I'd been struggling with eased significantly after just two sessions.</p>
                <span class="srv-author">— Pregnancy client</span>
            </div>
            <div class="srv-testimonial-card">
                <p>I looked forward to my appointments every week — it was the one hour where I could truly relax and feel looked after. Jenny made me feel so comfortable and cared for.</p>
                <span class="srv-author">— Pregnancy client</span>
            </div>
            <div class="srv-testimonial-card">
                <p>I had reflexology throughout my third trimester and I'm convinced it helped me have a calmer, more positive birth experience. I can't recommend Jenny enough.</p>
                <span class="srv-author">— Pregnancy client</span>
            </div>
        </div>
    </div>
</div>

<!-- Training -->
<div class="srv-section srv-centered srv-fade-in">
    <div class="srv-inner">
        <h2>Qualified and experienced</h2>
        <p>I trained in the Eunice Ingham method at The London School of Reflexology and hold a Level 3 qualification with full insurance. I am a proud member of the Association of Reflexologists.</p>
        <p>My additional training in Women's Health Reflexology under Hagar Basis includes specific techniques for supporting women through pregnancy, fertility, and postnatal recovery.</p>
    </div>
</div>

<!-- FAQ -->
<div class="srv-section srv-warm srv-fade-in">
    <div class="srv-inner" style="max-width: 800px;">
        <h2 style="text-align: center;">Frequently asked questions</h2>
        <div class="srv-faq-item">
            <button class="srv-faq-question" onclick="this.parentElement.classList.toggle('active')">Is reflexology safe during pregnancy?</button>
            <div class="srv-faq-answer"><p>Yes. Reflexology is a gentle, non-invasive therapy that is widely considered safe during pregnancy from 12 weeks onwards. I use adapted techniques appropriate to each trimester and always prioritise your comfort and safety.</p></div>
        </div>
        <div class="srv-faq-item">
            <button class="srv-faq-question" onclick="this.parentElement.classList.toggle('active')">When can I start having reflexology during pregnancy?</button>
            <div class="srv-faq-answer"><p>Most practitioners recommend starting from 12 weeks (the second trimester). I'm happy to discuss your individual circumstances during a consultation if you'd like to start earlier.</p></div>
        </div>
        <div class="srv-faq-item">
            <button class="srv-faq-question" onclick="this.parentElement.classList.toggle('active')">Can reflexology help with labour preparation?</button>
            <div class="srv-faq-answer"><p>Yes. In the final weeks of pregnancy, specific reflex points can be used to help prepare the body for labour. Many women find that regular sessions in the last few weeks help them feel calmer and more physically ready.</p></div>
        </div>
        <div class="srv-faq-item">
            <button class="srv-faq-question" onclick="this.parentElement.classList.toggle('active')">Do I need my midwife's permission?</button>
            <div class="srv-faq-answer"><p>No formal referral is needed, but I always recommend letting your midwife know. I'm happy to work alongside your maternity care team and can provide information about the treatment if needed.</p></div>
        </div>
    </div>
</div>

<!-- CTA -->
<div class="srv-cta">
    <div class="srv-inner">
        <h2>Ready to feel supported through pregnancy?</h2>
        <p>Book your appointment today. Your first session includes a full consultation so we can discuss your needs and create a treatment plan for your pregnancy journey.</p>
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
