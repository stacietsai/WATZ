<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>WATZ</title> -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <style>
        /*---------------------KITS START---------------------- */

        * {
            box-sizing: border-box;
            letter-spacing: 2px;
            /* font-family: 'Noto Sans TC', sans-serif; */
            user-select: none;
        }

        body {
            font-family: 'Noto Sans TC', sans-serif;
            margin: 0;
            overflow: auto;
            background: #F8F4EB;
            width: 100vw;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: #404040;
        }

        ul,
        li {
            list-style: none;
            padding: 0;
            margin: 0;
            padding-inline-start: 0;
        }

        h1 {
            margin: 0;
            color: #404040;
            font-size: 2.5rem;
            cursor: default;
            transition: .4s;
        }

        h2 {
            margin: 0;
            color: #404040;
            font-size: 2rem;
            cursor: default;
            transition: .4s;
        }

        h3 {
            margin: 0;
            color: #404040;
            font-size: 1.4rem;
            cursor: default;
            transition: .4s;
        }

        h4 {
            margin: 0;
            color: #404040;
            font-size: 1.1rem;
            cursor: default;
            transition: .4s;
        }

        h5 {
            margin: 0;
            color: #404040;
            font-size: .88rem;
            cursor: default;
        }

        h6 {
            margin: 0;
            color: #404040;
            font-size: .75rem;
            cursor: default;
        }

        p {
            color: #404040;
            margin: 0;
            font-size: 1rem;
            cursor: default;
            transition: .4s;
        }

        /* ---------scroll bar-------- */

        @media screen and (min-width: 992px) {
            ::-webkit-scrollbar {
                width: 5px;
            }

            ::-webkit-scrollbar-thumb {
                width: 10px;
                cursor: pointer;
                background: #F2DE79;
                border-radius: 2.5px;
            }

            ::-webkit-scrollbar-track {
                background-color: white;
            }
        }

        @media screen and (max-width: 992px) {
            h1 {
                margin: 0;
                color: #404040;
                font-size: 2rem;
                cursor: default;
            }

            h2 {
                margin: 0;
                color: #404040;
                font-size: 1.4rem;
                cursor: default;
            }

            h3 {
                margin: 0;
                color: #404040;
                font-size: 1.1rem;
                cursor: default;
            }

            h4 {
                margin: 0;
                color: #404040;
                font-size: 1rem;
                cursor: default;
            }

            p {
                color: #404040;
                margin: 0;
                font-size: .9rem;
                cursor: default;
            }
        }

        .transition {
            transition: .4s;
        }

        .flex {
            display: flex;
        }

        .btn-coral {
            height: 45px;
            background: #FF9685;
            border: 0;
            border-radius: 2px;
            color: white;
            font-family: 'Noto Sans TC', sans-serif;
            letter-spacing: 2px;
            outline: none;
            cursor: pointer;
            transition: .4s;
        }

        .btn-coral:hover {
            background: #0388A6;
        }

        .btn-blue {
            height: 45px;
            background: #03588C;
            border: 0;
            border-radius: 2px;
            color: white;
            font-family: 'Noto Sans TC', sans-serif;
            letter-spacing: 2px;
            outline: none;
            cursor: pointer;
            transition: .4s;
        }

        .btn-coral:hover {
            background: #FF9685;
        }

        .mobile-show {
            display: none;
        }

        a.icon-wrapper {
            height: 44px;
            width: 44px;
            padding: 10px;
            overflow: hidden;
            cursor: pointer;
        }

        .icon-wrapper img {
            height: 100%;
            width: 100%;
            object-fit: contain;
        }

        .container {
            width: 100vw;
            position: relative;
            min-height: 100vh;
            align-items: center;
            flex-direction: column;
        }

        .wrapper {
            width: 1200px;
            /* min-height: 100vh; */
        }

        @media screen and (max-width: 576px) {
            .mobile-none {
                display: none;
            }

            .mobile-show {
                display: unset;
            }
        }

        /*------------- KITS END-------------- */
        /* nav */

        .nav {
            height: 70px;
            width: 94vw;
            background: white;
            border-radius: 35px;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            margin: 20px 0;
            right: 3vw;
            position: fixed;
            z-index: 26;
            box-shadow: 0px 3px 3px #70707050;
        }

        .nav-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 35px;
            background-color: #ffffff;
            left: 0;
            top: 0;
            z-index: -1;
        }

        .nav.hide-nav {
            width: 440px;

        }

        .nav.hide-nav .nav-list {
            width: 0;
            overflow: hidden;
        }

        .nav-logo {
            align-items: center;
            /* width: 250px; */
        }

        .nav-logo .img-logo-img {
            height: 50px;
            margin-left: 20px;
            margin-right: 10px;
        }

        .nav-logo .img-logo-text {
            height: 32px;
        }

        .nav-logo img {
            height: 100%;
            /* width: 100%; */
            object-fit: contain;
            background: #ffffff;
        }

        .nav-list {
            transition: .6s;
            justify-content: flex-end;
            width: 100%;
        }

        .nav-list ul {
            height: 70px;
            align-items: center;
        }

        .nav-list a {
            letter-spacing: 2px;
            font-size: 1.2rem;
            color: #404040;
            padding: 19px 20px;
            line-height: 66px;
            cursor: pointer;
            z-index: 20;
            margin-bottom: 4px;
        }

        .nav-list li {
            align-items: center;
            transition: .2s;
            height: 70px;
            border-bottom: 0;
            background-color: #ffffff;
        }

        .nav-list a.active {
            border-bottom: 4px solid #03588C;
        }

        .nav-list a:hover {
            border-bottom: 4px solid #FF9685;
        }

        .nav-list .dropdown {
            height: 0;
        }

        .nav-list .dropdown-menu {
            /* position: relative; */
            flex-direction: column;
            align-items: center;
            background-color: #ffffff;
            border-radius: 0 0 15px 15px;
            height: 0;
            overflow: hidden;
            margin-top: 4px;
        }

        .nav-list .dropdown-bg {
            background-color: #ffffff;
            position: absolute;
            height: 100%;
            width: 70%;
            position: relative;
            flex-direction: column;
            border-radius: 0 0 15px 15px;
            justify-content: space-evenly;
            /* margin-bottom: 20px; */
            /* padding-bottom: 20px; */
        }

        .nav-list .dropdown-menu a {
            font-size: 1rem;
            padding: 0;
            line-height: 1.5rem;
            text-align: center;
            border-bottom: 4px solid transparent;
            transition: .2s;
        }

        .nav-list .dropdown-menu a:hover {
            border-bottom: 4px solid #FF9685;
        }

        .nav-list .dropdown.show .dropdown-menu {
            height: 190px;
        }

        .nav-icon {
            align-items: center;
            /* margin-left: 30px; */
        }

        a.a-cart {
            cursor: pointer;
        }

        .cart_count {
            color: #F8F4EB;
            display: block;
            border-radius: 50%;
            width: 17px;
            height: 17px;
            text-align: center;
            line-height: 17px;
            font-size: 10px;
            transform: translate(15px, -35px);
            /* padding-left: 2px; */
            letter-spacing: 0;
        }

        .nav-list-scroll {
            overflow-x: hidden;
            overflow-y: scroll;
        }

        .nav-list-scroll::-webkit-scrollbar-track-piece {
            background-color: #F8F4EB;
        }

        .nav-list-scroll::-webkit-scrollbar {
            width: 5px;
            height: 5px;
            padding: 10px 0;

        }

        .nav-list-scroll::-webkit-scrollbar-thumb {
            background-color: #F2DE79;
            background-clip: padding-box;
            min-height: 28px;
            border-radius: 20px;
        }

        .nav-list-scroll::-webkit-scrollbar-thumb:hover {
            background-color: #F2DE79;
            border-radius: 20px;
        }

        .box-cart-short {
            width: 260px;
            position: absolute;
            right: 0px;
            top: 35px;
            background: #ffffff;
            z-index: -2;
            border-radius: 0 0 35px 15px;
            padding-top: 35px;
            overflow: hidden;
            height: 0;
        }

        .cart-short-list {
            background: #ffffff;
            width: 260px;
            border-radius: 0 0 35px 15px;
            height: 300px;
        }

        .box-cart-short.show {
            height: 375px;
            box-shadow: 0 3px 3px #70707050;
            border-radius: 0 0 15px 15px;
        }

        .nav-eachsock-list {
            width: 95%;
            align-items: center;
            justify-content: space-between;
            margin: 5px 5px 0 5px;
            border-bottom: 2px solid #E2E2E2;
        }

        .nav-img-product {
            width: 60px;
            margin-left: 10px;
        }

        .nav-img-product img {
            width: 90%;
            object-fit: fill;
        }

        .nav-socks-nameNprice {
            width: 65%;
            flex-direction: column;
            padding: 0 10px;
            /* align-items: center; */
            /* justify-content: space-between; */
        }

        .qtyNprice {
            width: 100%;
            justify-content: space-between;
        }

        .go-cart {
            height: 40px;
            width: 260px;
            background: #F2DE79;
            color: #404040;
            display: block;
            text-align: center;
            line-height: 40px;
        }

        .nav-icon-empty-cart {
            width: 100%;
            height: 100%;
            /* background-color: #ffffff; */
            border-radius: 15px;
            /* border: 1px solid rgb(121, 126, 138); */
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transform: translateX(10px);
        }

        .img-empty-cart {
            width: 150px;
            height: 150px;
            /* transform: translateX(30px); */
            /* margin-bottom: 30px; */
        }

        .menu {
            margin-left: 20px;
            background: #F2DE79;
            height: 54px;
            width: 54px;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            top: 0;
            z-index: 2;
        }

        .menu .click-area {
            width: 54px;
            height: 54px;
            /* background-color: coral; */
            justify-content: center;
            align-items: center;
            cursor: pointer;
            z-index: 5;
        }

        .menu .bar {
            width: 26px;
            height: 4px;
            background: #ffffff;
            margin: 4px 0;
            border-radius: 2px;
            cursor: pointer;
        }

        .menu.current .click-area {
            position: absolute;
            top: 20px;
            right: calc(20px - 3vw);
            width: 70px;
            height: 70px;
        }

        .current .bar1 {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .current .bar2 {
            opacity: 0;
        }

        .current .bar3 {
            transform: rotate(45deg) translate(-5px, -6px);
        }

        .menu-bg {
            position: absolute;
            background: #F2DE79;
            height: 100vh;
            width: 300px;
            z-index: 2;
            top: -20px;
            right: -3vw;
            transform: translateX(120vw);
            opacity: .95;
        }

        .menu.current .menu-bg {
            transform: translateX(0);
        }

        .menu .menu-content {
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            z-index: 2;
            opacity: 0;
            overflow: hidden;
            height: 100%;
            width: 300px;
        }

        .menu.current .menu-content {
            opacity: 1;
        }

        .menu .img-logo-img {
            height: 150px;
            width: 150px;
            background: #ffffff;
            border-radius: 50%;
            padding: 30px;
            margin: 20px;
        }

        .menu .img-logo-img img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .menu-list li {
            transition: .2s;
            width: 300px;
            font-size: 1rem;
            padding: 20px 10px;
            font-weight: 500;
            letter-spacing: 2px;
        }

        .menu-list li a {
            font-size: 1rem;
            padding: 20px 100px 20px 100px;
            font-weight: 500;
            cursor: pointer;
        }

        .menu-list li:hover {
            background: #03588C;
        }

        .menu-list li:hover a {
            color: #ffffff;
        }

        .menu-list .dropdown-menu {
            flex-direction: column;
            align-items: center;
            /* background-color: #ffffff; */
            height: 0;
            overflow: hidden;
        }

        .menu-list .dropdown-bg {
            /* background-color: #ffffff; */
            position: absolute;
            height: 100%;
            width: 100%;
            position: relative;
            flex-direction: column;
            justify-content: space-evenly;
            margin-top: 10px;
        }

        .menu-list .dropdown-menu a {
            padding: 10px 0 10px 100px;
        }

        .menu-list .dropdown-menu a:hover {
            background: #0388A6;
        }

        .menu-list .dropdown.show .dropdown-menu {
            height: 150px;
        }

        .st0 {
            transition: .2s;
        }

        a:hover .st0 {
            fill: #FF9685;
        }

        @media screen and (max-width: 1100px) {
            .nav-list {
                transition: .8s;
            }

            .nav-list a {
                padding: 19px 12px;
            }
        }

        @media screen and (max-width: 992px) {
            .nav {
                width: 440px;
            }

            .nav-list {
                display: none;
            }
        }

        @media screen and (max-width: 768px) {
            .nav-icon .none {
                display: none;
            }
        }

        @media screen and (max-width: 576px) {
            .nav {
                width: 94vw;
                height: 50px;
                padding: 5px;
                margin: 10px 0;
            }

            .nav.hide-nav {
                width: 94vw;
            }

            .nav-logo {
                width: 150px;
            }

            .nav-logo .img-logo-img {
                height: 30px;
                margin: 0 20px;
            }

            .nav-logo .img-logo-text {
                height: 21px;
            }

            .box-cart-short {
                display: none;
            }

            .menu {
                width: 40px;
                height: 40px;
            }

            .menu .bar {
                width: 18px;
                height: 3px;
                margin: 3px 0;
                border-radius: 1.5px;
                transition: .4s;
            }

            .menu.current .box-bar {
                position: unset;
            }

            .current .bar1 {
                transform: rotate(-45deg) translate(-4px, 4.5px);
            }

            .current .bar3 {
                transform: rotate(45deg) translate(-4px, -4.5px);
            }

            .menu-bg {
                width: 100vw;
                top: -10px;
            }

            .menu .menu-content {
                width: 100vw;
            }

            .menu-list li {
                width: 100vw;
                text-align: center;
            }

            .menu-list li a {
                font-size: 1rem;
                padding: 20px 20vw;
                font-weight: 500;
            }

            .menu-list .dropdown-menu a {
                padding: 10px 20vw 10px 20vw;
            }
        }

        /* btn-top */

        .btn-top {
            opacity: 0;
            height: 80px;
            width: 80px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: fixed;
            right: 3vw;
            top: 80vh;
            z-index: 21;
            font-family: 'Fredoka One', cursive;
            cursor: pointer;
        }

        .btn-top .bg-btn-top {
            position: absolute;
            z-index: -1;
            background: #ffffff;
            height: 80px;
            width: 80px;
            opacity: .5;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 3px 6px #70707050;
        }

        .btn-top img {
            cursor: pointer;
            height: 20px;
        }

        .btn-top h3 {
            color: #03588C;
            font-weight: 400;
            cursor: pointer;
            margin-top: 5px;
        }

        .btn-top:hover .bg-btn-top {
            opacity: 1;
        }

        @media screen and (max-width: 576px) {
            .btn-top {
                height: 60px;
                width: 60px;
            }

            .btn-top .bg-btn-top {
                height: 60px;
                width: 60px;
            }

            .btn-top img {
                height: 12px;
            }

            .btn-top h3 {
                color: #03588C;
                font-weight: 300;
                font-size: .9rem;
                margin-top: 3px;
            }
        }

        /* footer */

        footer {
            position: relative;
            height: 160px;
            width: 100vw;
            overflow: hidden;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Fredoka One', cursive;
            z-index: 18;
        }

        footer h6 {
            color: #707070;
            margin-top: 5px;
        }

        .bg-footer {
            position: absolute;
            top: 0;
            z-index: -1;
            height: 100%;
            width: 100%;
            object-fit: cover;
            left: 0;
        }

        @media screen and (max-width: 768px) {
            footer {
                height: 44vw;
                /* justify-content: flex-star; */
            }

            .footer-icon {
                width: 50vw;
                justify-content: space-between;
                transform: translateY(-5vw);
            }

            footer h6 {
                transform: translateY(-5vw);
                white-space: nowrap;
            }

            .bg-footer {
                width: 100vw;
                height: 44vw;
            }
        }

        /* mobile show list */

        @media screen and (max-width: 768px) {
            .fixedlist {
                position: fixed;
                bottom: 0;
                background: #ffffff;
                width: 100vw;
                z-index: 19;
                display: unset;
                box-shadow: 0 -3px 6px #70707050;
            }

            .fixedlist-icon {
                width: 100vw;
                height: 16vw;
                justify-content: space-evenly;
                align-items: center;
            }
        }
    </style>
</head>

<body>