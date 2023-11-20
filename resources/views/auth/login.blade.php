@include('loading')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rapot Digital | LOGIN</title>
    <link href="assets/css/login.css" rel="stylesheet">
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form method="post" action="{{ route('dologin') }}" autocomplete="off" class="sign-in-form">
              @csrf
              <div class="logo">
                <img src="assets/img/loginbaru/logo.png" alt="easyclass" />
                <h4>Rapot Digital</h4>
              </div>

              <div class="heading">
                <h2>Silahkan Login</h2>
                <p>Sistem Rapot Digital | TIM SUS</p>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    name="username"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>username</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    name="password"
                    minlength="1"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>

                <input type="submit" value="Login" class="sign-btn" />  
              </div>
              
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="assets/img/loginbaru/image1.png" class="image img-1 show" alt="" />
              <img src="assets/img/loginbaru/image2.png" class="image img-2" alt="" />
              <img src="assets/img/loginbaru/image3.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Rapot Digital</h2>
                  <h2>SMKN 11 Bandung</h2>
                  <h2>TIM SUS</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->
    <script src="assets/js/login.js"></script>
  </body>
</html>
