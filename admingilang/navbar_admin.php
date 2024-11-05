<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        * {
            scroll-behavior: smooth;
            box-sizing: border-box;
            font-family: "Roboto", sans-serif;
        }

        body {
            margin: 0;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            position: fixed;
            top: 0;
            width: 100%;
            box-shadow: 0px 3px 4px -1px rgba(0, 0, 0, 0.78);
            -webkit-box-shadow: 0px 3px 4px -1px rgba(0, 0, 0, 0.78);
            -moz-box-shadow: 0px 3px 4px -1px rgba(0, 0, 0, 0.78);
            z-index: 2;
        }

        .navbar li {
            float: left;
            padding-left: 15px;
            padding-right: 15px;


        }

        .navbar li a {
            display: block;
            color: white;
            text-align: center;
            padding: 10px 10px;
            margin: 10px;
            text-decoration: none;
            border-radius: 10px;

        }

        .navbar a i::before {
            padding-right: 5px;
        }

        .navbar li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: rgba(117, 191, 254, 255);
            color: black;

        }

        .user {
            margin-left: 900px;
            margin-right: 100px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            background-color: rgba(117, 191, 254, 255);
            border-radius: 10px;
            padding: 2px;
            font-size: 16px;
        }

        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: #f4511e;
            border: none;
            text-align: center;
            font-size: 15px;
            padding: 6px;
            opacity: 0.9;
            transition: 0.3s;
            cursor: pointer;
            margin: 5px;

        }

        .button a {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
            color: #FFFFFF;
            text-decoration: none;
        }

        .button:hover {
            opacity: 1
        }


        .user img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: none;
            padding: 1px;
        }
    </style>
</head>
<nav class="navbar">
        <ul>
            <li><a class="active" href="./dashboard.php"><i class="fa-solid fa-inbox"></i>Dashboard</a></li>
            <li><a href="./update.php"><i class="fa-solid fa-circle-down"></i></i>Update</a></li>
            <li><a href="./english.php"><i class="fa-solid fa-book"></i>English</a></li>
            <li><a href="./japan.php"><i class="fa-solid fa-book"></i>Japan</a></li>
            <li><a href="./komentar.php"><i class="fa-solid fa-user"></i>Message</a></li>
            <li><a href="./verify.php"><i class="fa-solid fa-user"></i>Verify</a></li>
            <div class="user">
                <img src="../img/user.jpeg" alt="">
                <p><?php echo $data['username']; ?></p>
                <button class="button"><a href="logout.php">Logout</a></button>
            </div>
        </ul>
    </nav>