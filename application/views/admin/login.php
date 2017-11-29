<html>

    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }
            main {
                flex: 1 0 auto;
            }
            body {
                background: #fff;
            }
        </style>
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="section"></div>
                <main>
                    <center>
                        <div class="container">
                            <div  class="z-depth-3 y-depth-3 x-depth-3 grey green-text lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px; margin-top: 100px;border-top:  solid #EEE;">
                                <div class="section"></div>
                                <div class="section">
                                    <h5>Login</h5>
                                </div>

                                <?php
                                $message = $this->session->userdata('message');
                                if ((isset($message) && $message['title'] != "")) {
                                    ?>  
                                    <div class="section">
                                        <i class="mdi-alert-error red-text"> <?php echo $message['body'] ?></i>

                                    </div>
                                    <?php
                                    $this->session->unset_userdata('message');
                                }
                                ?> 


                                <form role="form"
                                      action="<?php echo site_url('admin/login/authenticate') ?>"  
                                      method="post">
                                    <div class='row'>
                                        <div class='input-field col s12'>
                                            <input class='validate' type="text" name='username' id='email' required />
                                            <label for='email'>Username</label>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='input-field col m12'>
                                            <input class='validate' type='password' name='password' id='password' required />
                                            <label for='password'>Password</label>
                                        </div>
                                        <label style='float: right;'>
                                            <a><b style="color: #F5F5F5;">Forgot Password?</b></a>
                                        </label>
                                    </div>
                                    <br/>
                                    <center>
                                        <div class='row'>
                                            <button style="margin-left:65px;"  type='submit' name='btn_login' class='col  s6 btn btn-small white black-text  waves-effect z-depth-1 y-depth-1'>Login</button>
                                        </div>
                                    </center>
                                </form>

                                <div class="section"></div>
                            </div>
                        </div>
                    </center>
                </main>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

            </div>
        </div>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    </body>

</html>