<head>
    <style>
        #icon {
            color: white;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid #222831;
            padding: 5px;
            font-size: 20px;
        }

        footer {
            background-color: #222831;
            color: #fff;
            padding: 20px 0;
            text-align: left;
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
        }

        .footer-section {
            flex: 1;
            margin: 10px;
            min-width: 200px;
        }

        .footer-section h4 {
            margin-bottom: 15px;
        }

        .footer-section p,
        .footer-section ul {
            margin: 0;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section ul li a {
            color: #ffcc00;
            text-decoration: none;
        }

        .footer-section ul li a:hover {
            text-decoration: underline;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #444;
        }

        .footer-section .social a {
            margin-right: 10px;
            color: #ffcc00;
        }

        .footer-section .social a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<footer>
    <div class="footer-container">
        <div class="footer-section about">
            <h4>Akar Bahasa</h4>
            <p>Mencari website article tentang manfaat bahasa?, kunjungi situs ini</p>
        </div>
        <div class="footer-section links">
            <h4>Link Cepat</h4>
            <ul>
                <li><a href="./index.php"><i class="fa-solid fa-house"></i> Home</a></li>
                <li><a href="./English.php"><i class="fa-solid fa-newspaper"></i> News</a></li>
                <li><a href="./profile.php"><i class="fa-solid fa-user"></i>Profile</a></li>
                <li><a href="admingilang/login.php"><i class="fa-solid fa-inbox"></i>Dashboard</a></li>
            </ul>
        </div>
        <div class="footer-section contact">
            <h4>Kontak</h4>
            <p>Email: RenAkira@gmail.com</p>
            <p>Telepon: (123) 456-7890</p>
        </div>
        <div class="footer-section social">
            <h4>Ikuti Kami</h4>
            <a href="https://web.whatsapp.com/" id="icon"><abbr title="Whatsapp"><i
                        class="fa-brands fa-whatsapp"></i></abbr></a> |
            <a href="https://www.facebook.com/" id="icon"><abbr title="Facebook"><i
                        class="fa-brands fa-facebook"></i></abbr></a> |
            <a href="https://www.instagram.com/" id="icon"><abbr title="instagram"><i
                        class="fa-brands fa-instagram"></i></abbr></a>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2024 Akira News. CopyRight.
    </div>
</footer>