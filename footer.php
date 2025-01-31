<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="css/fontawesome-all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <style>
    .footer {
      background: #181818;
    }

    .footer-grid-w3ls.links.text-left {
      margin: 0;
    }

    .footer-grid-w3ls h3,
    .footer-list h3,
    .edu-footer-grid-w3ls h3 {
      font-size: 24px;
      color: #FFFFFF;
      text-transform: capitalize;
      line-height: 1.5em;
      letter-spacing: 2px;
    }

    .footer-grid-w3ls p {
      color: #bbbbbb;
      font-size: 14px;
      line-height: 1.8em;
      letter-spacing: 1px;
    }

    .footer-grid-w3ls ul,
    .footer-list ul {
      padding: 0;
      margin: 0;
    }

    .footer-grid-w3ls ul li,
    .footer-list ul li {
      display: block;
      margin: .4em 0 0;
    }

    .footer-logo-w3 li {
      display: inline-block !important;
    }

    .footer-logo-w3 ul li a {
      color: #bbb;
      font-size: 1.2em;
      text-decoration: none;
      padding-right: 5px;
    }

    .footer-list ul li {
      color: #bbb;
      font-size: 1em;
    }

    .footer-grid-w3ls ul li {
      color: #bbb;
      font-size: 14px;
      text-decoration: none;
      line-height: 2em;
      text-transform: capitalize;
      letter-spacing: 1px;
      font-family: 'Open Sans', sans-serif;
    }

    .footer-grid-w3ls strong {
      text-decoration: underline;
      color: #eee;
    }

    .footer-grid-w3ls ul li a {
      color: #bbb;
      font-size: 1em;
    }

    .footer-grid-w3ls ul li a:hover {
      color: #ff4e00;
    }

    .footer-grid-w3ls ul li i:hover {
      color: #00BCD4;
      border: 1px solid #00BCD4;
      transition: 0.5s all;
      -webkit-transition: 0.5s all;
      -moz-transition: 0.5s all;
      -o-transition: 0.5s all;
      -ms-transition: 0.5s all;
    }

    .edu-footer-grid-w3ls ul {
      padding: 0;
      margin: 0;
    }

    .edu-footer-grid-w3ls input[type="email"],
    .edu-footer-grid-w3ls input[type="text"] {
      outline: none;
      padding: 11px 15px;
      background: #fff;
      border: none;
      font-size: 14px;
      color: #212121;
      margin-bottom: 1em;
      width: 100%;
      border-bottom: 1px solid #ccc;
      border-radius: 3px;
    }

    .edu-footer-grid-w3ls input[type="submit"] {
      outline: none;
      padding: 11px 15px;
      border: none;
      font-size: 14px;
      color: #fff;
      border: 1px solid #fff;
      width: 100%;
      text-align: left;
      background-color: transparent;
      letter-spacing: 2px;
      text-align: center;
      border-radius: 3px;
      cursor: pointer;
    }

    .edu-footer-grid-w3ls input[type="submit"]:hover {
      background: #ff4e00;
      border: 1px solid #ff4e00;
    }

    .footer-logo-w3 a {
      color: #FFFFFF;
      font-weight: 600;
      text-decoration: none;
      font-size: 1.4em;
      text-transform: capitalize;
    }

    .footer-logo-w3 h3 span {
      font-size: 14px;
      letter-spacing: 1px;
      font-weight: 400;
      text-align: center;
      display: block;
      position: relative;
    }

    .footer-logo-w3 h3 span:after {
      position: absolute;
      content: '';
      height: 2px;
      width: 40px;
      background: #fff;
      bottom: 47%;
      right: 18%;
    }

    .footer-logo-w3 h3 span:before {
      position: absolute;
      content: '';
      height: 2px;
      width: 40px;
      background: #fff;
      bottom: 47%;
      left: 18%;
    }

    .copy_right {
      background: #161616;
    }

    .copy_right p {
      text-align: center;
      color: #c1c1c1;
      font-size: 14px;
      text-transform: capitalize;
      letter-spacing: 2px;
    }

    .copy_right a {
      color: #fff;
    }

    .copy_right a:hover {
      color: #00BCD4;
    }

    .copy_right {
      background: #1f1e1e;
    }

    .footer-grid-w3ls ul.social li a span {
      color: #777;
      font-size: 13px;
      background: #333;
      width: 37px;
      height: 37px;
      line-height: 37px;
      text-align: center;
      display: block;
      border-radius: 50%;
    }

    .footer-grid-w3ls ul.social li a span:hover {
      background: #fff;
      color: #ff4e00;
    }

    /*-- //footer --*/

    /*--/toTop--*/

    #toTop {
      display: none;
      text-decoration: none;
      position: fixed;
      bottom: 10px;
      right: 10px;
      overflow: hidden;
      width: 34px;
      height: 34px;
      border: none;
      text-indent: 100%;
      background: url(../images/top_up.png) no-repeat 0px 0px;
      font-size: 0;
    }
  </style>
</head>

<body>
  <section class="footer py-5">
    <div class="footer-top-w3layouts py-lg-3">
      <div class="container">
        <div class="row footer-grid-w3lss">
          <div class="col-lg-4 footer-grid-w3ls text-left">
            <div class="footer-logo-w3">
              <h3 class="mb-3"><a class="logo-w3" href="index.php">Doctors Express</a></h3>
              <p align="justify">Doctors Express is dedicated to a profound mission aimed at rendering high-quality healthcare that is accessible to more than a billion Indians.</p>
              <ul class="social mt-lg-0 mt-3">
                <li class="mr-1"><a href="#"><span class="fa"></span></a></li>
                <li class="mx-1"><a href="#"><span class="fab fa-twitter"></span></a></li>
                <li class="mx-1"><a href="#"><span class="fab fa-google-plus-g"></span></a></li>
                <li class="mx-1"><a href="#"><span class="fab fa-linkedin-in"></span></a></li>

              </ul>
            </div>
          </div>
          <div class="col-lg-2 footer-grid-w3ls links text-left">
            <h3 class="mb-4"> links </h3>
            <ul>
              <li>
                <a href="index.php">Home</a>
              </li>
              <li>
                <a href="about.php">About</a>
              </li>
              <li>
                <a href="contact.php">Contact</a>
              </li>
              <li>
                <a href="doctorpage.php">Doctors</a>
              </li>
              <li>
                <a href="Admin/login.php">Login</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-3 footer-grid-w3ls links text-left">
            <h3 class="mb-4">contact Us </h3>
            <ul>
              <li><strong>Address</strong> : Ranchi, Jharkhand, India</li>
              <li><strong>mobile</strong> : <a href="tel:+919939802016">+91 99398 02016</a></li>
              <li><strong>phone</strong> : <a href="tel:+919939802016">+91 99398 02016</a></li>
              <li><strong>Mail</strong> : <a href="mailto:contact@doctors-express.com">contact@doctors-express.com</a></li>
            </ul>
          </div>
          <div class="col-lg-3 edu-footer-grid-w3ls text-left">
            <h3 class="mb-4">Subscribe Now </h3>
            <form action="#" method="post">
              <input type="text" name="text" placeholder="Name" required="">
              <input type="email" name="Email" placeholder="Email" required="">
              <input type="submit" value="Subscribe">
            </form>
          </div>


        </div>
      </div>
    </div>
  </section>
  <!-- //footer -->
  <!-- copyright -->
  <div class="copy_right py-4 text-center">
    <p>© 2024 Doctors Express. All rights reserved | <a href="T&C.php">Terms and Conditions</a></p>

  </div>
</body>

</html>