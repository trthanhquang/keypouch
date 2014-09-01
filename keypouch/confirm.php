                                        <!DOCTYPE html>
                                        <!-- saved from url=(0049)http://wbpreview.com/previews/WB0G1X0T6/post.html -->
                                        <html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                            <meta charset="utf-8">
                                            <title>Today's Deal | Key Pouch</title>
                                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                            <meta name="description" content="">
                                            <meta name="author" content="">
                                            <!-- Le styles -->
                                            <link href="css/bootstrap.min.css" rel="stylesheet">
                                            <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
                                            <link href="css/jquery.fancybox.css" rel="stylesheet">
                                            <link href="css/style.css" rel="stylesheet">

                                            <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
                                            <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
                                            <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
                                            <!--[if lt IE 9]>
                                              <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                                            <![endif]--> </head>
                                            <?php
                                                $con=mysqli_connect("192.168.1.9","root","root","id_mapping");
                                                // Check connection
                                                if (mysqli_connect_errno()) {
                                                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                                }

                                                mysqli_query($con,"INSERT INTO id_mapping (pebbleID, customerID, customerName)
                                                VALUES ('22', '001' ,'StewTest')"); 

                                                mysqli_close($con);
                                                ?>

                                        <body> 
                                            <div class="container">
                                                <div class="row">
                                                    <div class="span3">
                                                        <div class="well unit-bg">
                                                            <a href="index.html">
                                                                <img src="img/logo.jpg" alt="logo" width="100%"></a>
                                                        </div>
                                                        <div class="well unit-bg">
                                                            <ul class="nav nav-list">
                                                                <li><a href="list.html"><i class="icon-asterisk"></i>&nbsp;Today's Deal</a></li>
                                                                <li class="active"><a href="list.html"><i class="icon-headphones"></i>&nbsp;Loyalty Cards</a></li>
                                                                <li><a href="list.html"><i class="icon-briefcase"></i>&nbsp;Hot Offers</a></li>
                                                                <li><a href="list.html"><i class="icon-tag"></i>&nbsp;Past Deals</a></li>
                                                                <li><a href="http://wbpreview.com/previews/WB0G1X0T6/list.html#"><i class="icon-comment"></i>&nbsp;Discussion</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="http://wbpreview.com/previews/WB0G1X0T6/contact.html"><i class="icon-question-sign"></i>&nbsp;Help</a></li>
                                                            </ul>
                                                        </div>   
                                                    </div> 
                                                    <div class="span9">
                                                        <div class="row unit-block">
                                                            <div class="span9 unit-bg">
                                                                <div class="unit">
                                                                    <legend style='text-align:center'>Notifications</legend>
                                                                    <div id="myCarousel" class="carousel slide" data-interval="3000">    <div class="carousel-caption" style="text-align:center; color: white !important">Successfully added 24-hr Fitness Card 
                                                                        </div>  
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div> 


                                                    <div class="span9">
                                                        <div class="row unit-block">
                                                            <div class="span9 unit-bg">
                                                                <div class="unit">
                                                                    <legend style='text-align:center'>Loyalty Cards</legend>
                                                                    <img src="img/card1.png" style="border: 2px solid grey;">

                                                                    <img src="img/card2.png" style="border: 2px solid grey; margin-top:20px">

                                                                    <img src="img/card3.png" style="margin-top: 20px; border: 2px solid grey;">

                                                                    <a href="index.html"><img style="margin-top: 20px" src="http://placehold.it/500x100&amp;text=Add New Loyalty Cards"></a>
                                                                </div>
                                                            </div>
                                                        </div> 

                                                        <div class="row unit-block">
                                                            <div class="span9 unit-bg">
                                                                <div class="unit">
                                                                    <legend style='text-align:center'>Deals Subscribed</legend>
                                                                     <li class="span3">
                                                                <div class="thumbnail unit-bg">
                                                                    <a href="post.html">
                                                                        <img src="img/gym.jpg" alt="deal3" style="min-height:170px;"></a>
                                                                    <div class="caption">
                                                                        <h4 style="text-align:center">
                                                                            Yoga Fitness Deal</h4>
                                                                         <p>
                                                                               <div class="span3">
                                                                    <div class="well text-center">
                                                                        <ul class="unstyled"> 
                                                                            <li> 
                                                                            </li>
                                                                            <li>&nbsp;</li>
                                                                    <li>
                                                                        <table class="table">
                                                                            <tbody><tr class="firstrow">
                                                                                <td>
                                                                                    Price
                                                                                </td>
                                                                                <td>
                                                                                    $30 Coupon <br>(50% Off)
                                                                                </td> 
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    Expiry
                                                                                </td>
                                                                                <td>
                                                                                    September 9th 2014
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    Validity
                                                                                </td>
                                                                                <td>
                                                                                    30 Days
                                                                                </td>
                                                                            </tr>
                                                                        </tbody></table>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                </div>
                                            </div>
                                        </li>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="row unit-block">
                                                            <div class="span9 unit-bg">
                                                                <div class="unit footer">
                                                                    <ul class="pull-right">
                                                                        <li><a href="http://wbpreview.com/previews/WB0G1X0T6/about.html">About</a></li>
                                                                        <li><a href="http://wbpreview.com/previews/WB0G1X0T6/terms.html">Terms &amp; Privacy</a></li>
                                                                        <li><a href="http://wbpreview.com/previews/WB0G1X0T6/contact.html">Contact Us</a></li>
                                                                    </ul>
                                                                    <span class="copyright">© 2014 Key Pouch. All rights reserved.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
 
                                            <!-- Le javascript
                                            ================================================== -->
                                            <!-- Placed at the end of the document so the pages load faster -->
                                            <script id="facebook-jssdk" src="all.js"></script><script src="js/jquery-1.8.1.min.js"></script>
                                            <script src="js/bootstrap-transition.js"></script>
                                            <script src="js/bootstrap-alert.js"></script>
                                            <script src="js/bootstrap-modal.js"></script>
                                            <script src="js/bootstrap-dropdown.js"></script>
                                            <script src="js/bootstrap-scrollspy.js"></script>
                                            <script src="js/bootstrap-tab.js"></script>
                                            <script src="js/bootstrap-tooltip.js"></script>
                                            <script src="js/bootstrap-popover.js"></script>
                                            <script src="js/bootstrap-button.js"></script>
                                            <script src="js/bootstrap-collapse.js"></script>
                                            <script src="js/bootstrap-carousel.js"></script>
                                            <script src="js/bootstrap-typeahead.js"></script>
                                            <script src="js/jquery.fancybox.pack.js"></script>
                                            <script src="js/jquery.backstretch.min.js"></script>
                                            <script src="js/script.js"></script>   
                                            <!-- facebook -->
                                            <div id="fb-root" class=" fb_reset">
                                            <div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="fb_xdm_frame_http" frameborder="0" allowtransparency="true" scrolling="no" id="fb_xdm_frame_http" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="oDB-fAAStWy.html" style="border: none;"></iframe><iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="oDB-fAAStWy(1).html" style="border: none;"></iframe></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="f12549ddb8" frameborder="0" allowtransparency="true" scrolling="no" src="ping.html" style="display: none;"></iframe></div></div></div>
                                            <script>
                                                (function (d, s, id) {
                                                    var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s);
                                                    js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=279705068712379";
                                                    fjs.parentNode.insertBefore(js, fjs);
                                                } (document, 'script', 'facebook-jssdk'));
                                            </script>


                                        <div id="backstretch" style="left: 0px; top: 0px; position: fixed; overflow: hidden; z-index: -999999; margin: 0px; padding: 0px; height: 623px; width: 1425px;"><img src="img/bg.jpg" style="position: absolute; margin: 0px; padding: 0px; border: none; z-index: -999999; max-width: none; width: 1425px; height: 1555.75px; left: 0px; top: -191.375px;"></div></body></html>