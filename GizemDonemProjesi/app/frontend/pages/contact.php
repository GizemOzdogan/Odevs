<link rel="stylesheet" href="<?php echo FRONTEND_ASSET . 'css/contact.css'; ?>">
<header class="main-header">
    <div class="content">
        <h1>İletişim</h1>
        <p>Herhangi bir sorunuz için bize ulaşmak isterseniz.</p>
    </div>
</header>

<section id="contact-us">
    <form action="" class="formDiv" method="post">
        <div class="form-group">
            <label for="name">Adınız</label>
            <input type="text" name="name" id="name" placeholder="Adınızı giriniz">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="E-mail adresinizi giriniz">
        </div>
        <div class="form-group">
            <label for="message">Mesajınız</label>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Mesajınızı giriniz.."></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Gönder">
            <input type="hidden" name="csrf_token" value="<?php echo Token::generate(); ?>">
            
        </div>

    </form>
    <div class="parent-div">
        <div class="contact-info">
            <div class="ci-group">
                <p><b>Tel:</b> +90 (312) 555 55 55 </p>
            </div>
            <div class="ci-group">
                <p><b>Fax:</b> +90 (312) 444 44 44 </p>
            </div>
            <div class="ci-group">
                <p><b>Email:</b> ankarapeyzaj@altpeyzaj.com</p>
            </div>
            <div class="ci-group">
                <p><b>Adres:</b> Sağlık Mah. Mithat Paşa Cad. No:3 Sıhhiye-Çankaya/ANKARA</p>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24471.16644991124!2d32.82256650476758!3d39.943720243532255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d34fdc7a40cecb%3A0xc932ec1eb7bb8bd5!2zQU5LQVJBIEFWxZ5BUiBTVUxBTUEgU8SwU1RFTUxFUsSwIFZFIFBFWVpBSiBIxLBaTUVUTEVSxLA!5e0!3m2!1sen!2str!4v1672074706040!5m2!1sen!2str" allowfullscreen="" width="100%" height="100%" loading="lazy" referrerpolicy="no-referrer-when-downgrade">distance maps</a></iframe>
        </div>
    </div>
</section>