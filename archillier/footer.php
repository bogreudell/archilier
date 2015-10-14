            <footer id="footer">
                <div class="footer-inner">
                    <p>© 2015 Archilier Architecture. All Rights Reserved.</p>
                    <ul class="social">
                        <a href="https://www.facebook.com/pages/Archilier-Architecture/158668094196290?ref=br_rs" target="_blank"><li id="facebook"></li></a>
                        <a href="" target="_blank"><li id="twitter" ></li></a>
                        <a href="https://www.linkedin.com/company/archilier-architecture" target="_blank"><li id="pinterest"></li></a>
                        <a href="https://www.pinterest.com/archillierarch" target="_blank"><li id="weibo"></li></a>
                        <!-- WEIBO link? http://www.weibo.com/u/5248716031 -->
                    </ul>
                </div>                
            </footer>        
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php bloginfo("url"); ?>/wp-content/themes/archillier/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="<?php bloginfo('url'); ?>/wp-content/themes/archillier/js/plugins.js"></script>
        <script src="<?php bloginfo('url'); ?>/wp-content/themes/archillier/js/main.js"></script>
        <?php if ( !is_single() || is_page_template('news.php') ) : ?>
        <script src="<?php bloginfo('url'); ?>/wp-content/themes/archillier/js/stick-nav.js"></script>
        <?php endif; ?>
        <script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobubble/src/infobubble.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
        <?php wp_footer(); ?>
    </body>
</html>