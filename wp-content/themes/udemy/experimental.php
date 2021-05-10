<?php

/**
 * Template Name: Eperimental
 */

get_header(); 

?>

<!-- Page Title
============================================= -->
<section id="page-title">
    <div class="container clearfix">
        <h1>Experimental Code</h1>
    </div>
</section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

      <div class="content-wrap">

        <div class="container clearfix">

          <!-- Post Content
          ============================================= -->

            <?php

            echo wp_login_url();

            ?> 

        </div>

      </div>

    </section><!-- #content end -->

<?php get_footer(); ?>