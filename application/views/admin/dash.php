<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Starter Template - Materialize</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo base_url() ?>resources/admin/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url() ?>resources/admin/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="<?php echo base_url() ?>resources/admin/js/materialize.js"></script>
    </head>
    <body>
        <ul id="sitepagesselector" class="dropdown-content">
            <?php
            $files = scandir("./site/");
            
            unset($files[0]);
            unset($files[1]);
            
            
            foreach($files as $aFile){
                $aFile = str_replace(".html","",$aFile);
                $aFile = str_replace(".htm","",$aFile);
                echo "<li><a href='?editurl=$aFile'>$aFile</a></li>";
            }
            ?>
<!--            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>
            <li class="divider"></li>
            <li><a href="#!">three</a></li>-->
        </ul>

        <nav class="blue-grey darken-4" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
                <ul class="right hide-on-med-and-down">
                    <li><a>Edit Mode</a></li>
                    <li>
                        <div class="switch">
                            <label>
                                Off
                                <input type="checkbox" checked="">
                                <span class="lever"></span>
                                On
                            </label>
                        </div>
                    </li>
                    
                    
                    <li><a class="dropdown-button" href="#!" data-activates="sitepagesselector">Select Page<i class="material-icons right">arrow_drop_down</i></a></li>

                    <li><a href="<?php echo site_url("admin/logout") ?>">Logout</a></li>
                </ul>
                
                

                <ul id="nav-mobile" class="side-nav ">
                    <li><a href="#">Navbar Link</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        
    


        <?php
        $message = $this->session->userdata("message");
        if ((isset($message)
                && $message['title'] != "")) {
            ?>

            <script type="text/javascript">
                var $toastContent = $('<span><?php echo $message['title'] . ", " . $message['body'] ?></span>');
                Materialize.toast($toastContent, 5000);
            </script>


            <?php
            //$this->session->unset_userdata('message');
        }
        ?>  
        <div class="row" style="margin-left: 0px; margin-right: 0px;">   

            <?php 
            
            if(isset($url)){
                $url = site_url($url);
            }else{
                $url = base_url(); 
            }       ?>    
            
            <div class="col s12">
                <div id="iframe_wrapper_div" class="responsive-iframe-container">          
                    <iframe id="iframe_live"
                            scrolling="yes" 
                            name="inner_browser" 
                            src="<?php echo $url ?>"
                            frameborder="0" 
                            width="100%"                    
                            marginwidth="0"
                            marginheight="0"
                            ></iframe>
                </div>

            </div>
        </div>



        <footer class="page-footer brown darken-2">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h5 class="white-text">Company Bio</h5>
                        <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
                </div>
            </div>
        </footer>

        <script src="<?php echo base_url() ?>resources/admin/js/init.js"></script>
    </body>
</html>