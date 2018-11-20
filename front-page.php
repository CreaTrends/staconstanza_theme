<?php
/**
 * Template Name: Front Page 
 * The template used for displaying fullwidth page content in fullwidth.php
 *
 * @package creatrends
 */
get_header(); ?>

<!-- welcome message -->
<header id="slider-masthead" class="carousel slide carousel-fade masthead">
    
    <!-- items -->
    <div class="carousel-inner">
        <!-- item single -->
        <?php
        $args = array(
            'post_type' => 'slider',
            'posts_per_page' => '-1',
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );
        $args['tax_query'] = array(
            array( 'taxonomy' => 'slider-loc', 'field' => 'slug', 'terms' => 'masthead' )
        );
        $the_query = new WP_Query( $args );
        
        $slides = array();
        $iteration = 0;
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $imghtml = get_the_post_thumbnail_url(get_the_ID(), 'staconstanza-slider');
                $url = get_post_meta(get_the_ID(), 'slider-url', true);
        ?>
        <!-- item single -->
        <div class="carousel-item <?php echo $iteration == 0 ? 'active':'' ?>" style="background-image: url(<?php echo $imghtml;?>)">
            
            <div class="container">
                <div class="carousel-caption ">
                    <div class="intro-text">
                        <div class="intro-lead-in"><?php echo get_the_content() ?></div>
                        <div class="intro-heading text-uppercase"><?php echo get_the_title() ?></div>
                        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="<?php echo $url;?>">Conócenos</a>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        $iteration++;
            }
            wp_reset_query();
        }
        ?>
        <a class="carousel-control-prev" href="#slider-masthead" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#slider-masthead" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        
    </div>
</header>

<section class="welcome" id="welcome">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <img class="featurette-image img-fluid mx-auto" src="<?php echo esc_attr(get_theme_mod( 'default_thumbnail')); ?>" alt="Product 1">
            </div>
            <div class="col-md-6">
                <small class="small-line">Conócenos</small>
               <h3 class="service-heading mt-0">
                <?php echo esc_attr(get_theme_mod( 'welcome_textbox1', 'WELCOME TO THE BOOTSTRAP THEME' )); ?>
                
                </h3>
                <p class="mb-2">
                    <?php echo esc_attr(get_theme_mod( 'textarea_setting', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' )); ?>
                </p>
                <p>
                    <?php echo esc_attr(get_theme_mod( 'welcome_textbox2', 'FREE RESPONSIVE, MULTIPURPOSE BUSINESS AND CORPORATE THEME PERFECT FOR ANY ONE' )); ?>
                </p>
                <a href="<?php echo esc_attr(get_theme_mod( 'welcome_button', '#' )); ?>" title="Read More" class="btn btn-primary">
                    <?php _e('Read More','ultrabootstrap'); ?>
                </a>
            </div>
            
        </div>
    </div>
</section>
<!-- about us -->
<section class="about-us" id="about_us">
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-lg-6 pr-5">
                <small class="small-line white">Conócenos</small>
                <h3 class="about-heading text-white mb-2">¿ Porque Elegirnos ?</h3>
                <p class="mb-0 text-white">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non risus non mauris interdum hendrerit eget sed ex. Aliquam eget leo suscipit, condimentum urna non, viverra mi. Maecenas quis enim quam. Aliquam erat volutpat. Duis commodo sem justo, id blandit justo pharetra quis. Sed sagittis id tellus et sodales. Donec bibendum ipsum nec diam tincidunt, sit amet maximus leo tincidunt. Fusce laoreet turpis ut massa vehicula, ac auctor nisl pharetra.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Services -->
<section id="services">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <small class="small-line line-center">Que hacemos</small>
                <h2 class="section-title mb-4">Conoce Nuestros Servicios</h2>
                <h3 class="section-subheading text-muted">Aliquam interdum volutpat lectus at tincidunt. In ut dapibus leo. Nam at lectus sit amet tortor lacinia euismod eu a est. Donec rutrum neque eleifend egestas aliquet. Aenean non viverra arcu, </h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4 mb-3">
                <span class="fa-stack fa-4x">
                    <i class="fi flaticon-price-tag-1"></i>
                </span>
                <h4 class="heading-icon my-3">Asesoria Inmobiliria.</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4 mb-3">
                <span class="fa-stack fa-4x">
                    <i class="fi flaticon-house-outline"></i>
                </span>
                <h4 class="heading-icon my-3 ">Arriendo de Propiedades</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4 mb-3">
                <span class="fa-stack fa-4x">
                    <i class="fi flaticon-handshake"></i>
                </span>
                <h4 class="heading-icon my-3">Venta de Proyectos</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
                        
        </div>
        <div class="row text-center justify-content-center text-center">
               <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#welcome">Ver mas servicios</a> 
            </div>

    </div>
</section>
<!-- welcome message -->
<section class="bg-light" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <small class="small-line line-center">Portafolio</small>
                <h2 class="section-title mb-4">Nuestros proyectos</h2>
                <h3 class="section-subheading text-muted">Aliquam interdum volutpat lectus at tincidunt. In ut dapibus leo. Nam at lectus sit amet tortor lacinia euismod eu a est. Donec rutrum neque eleifend egestas aliquet. Aenean non viverra arcu, </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1" data-src="https://www.youtube.com/embed/7UbZkQo8cWw">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <div class="portfolio-caption-inner text-left">
                                <h4 class="portfolio-title">Condominio Maitencillo</h4>
                                <p class="mb-3">Venta y Gestión</p>
                            </div>
                        </div>
                    </div>
                    <img class="img-fluid" src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=0cf4ef4cb623c8a52b1a624f76eaf5bf&auto=format&fit=crop&w=400&h=300&h=300" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <div class="portfolio-caption-inner text-left">
                                <h4 class="portfolio-title">Parque Industrial Santiago</h4>
                                <p class="mb-3">Estudio de terreno</p>
                            </div>
                        </div>
                    </div>
                    <img class="img-fluid" src="https://images.unsplash.com/photo-1531834685032-c34bf0d84c77?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=3eae6e84dcc92d3e96b39814a73002c6&auto=format&fit=crop&w=400&h=300&q=80" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <div class="portfolio-caption-inner text-left">
                                <h4 class="portfolio-title">Parque Industrial Santiago</h4>
                                <p class="mb-3">Estudio de terreno</p>
                            </div>
                        </div>
                    </div>
                    <img class="img-fluid" src="https://images.unsplash.com/photo-1507149833265-60c372daea22?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=026a6ca5a45acc676e8a23d3d8515ce8&auto=format&fit=crop&w=400&h=300&q=60" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fas fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="https://images.unsplash.com/photo-1525478440856-b40668b83b79?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=feb1336540c16a3624298971cd59fe7d&auto=format&fit=crop&w=400&h=300&q=60" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4 class="portfolio-title">Parque Industrial Santiago</h4>
                    <p class="text-muted">Estudio de terreno</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fas fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="https://images.unsplash.com/photo-1504762453622-71611c124797?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=1b0005da6a5c3170e2a8fb66fdde324a&auto=format&fit=crop&w=400&h=300&q=60" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4 class="portfolio-title">Parque Industrial Santiago</h4>
                    <p class="text-muted">Estudio de terreno</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fas fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="https://images.unsplash.com/photo-1494526585095-c41746248156?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=fd170b4cebb0b97e6337529754defcf7&auto=format&fit=crop&w=400&h=300&q=60" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4 class="portfolio-title">Parque Industrial Santiago</h4>
                    <p class="text-muted">Estudio de terreno</p>
                </div>
            </div>
        </div>
    </div>
</section>
 <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h5 class="service-heading mt-0">Condominio Maitencillo</h5>
                  <small class="small-line line-center">Venta y Gestión</small>
                  
                  <div class="embed-responsive embed-responsive-16by9 mb-5 mt-3">
  <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always"></iframe>
</div>
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Threads</li>
                    <li>Category: Illustration</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>   
<?php get_footer();?>