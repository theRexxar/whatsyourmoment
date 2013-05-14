<?php
    /** 
     *      @author     : Jepri Torang Sinaga
     *      @access     : whatsyourmoments.com
     *      @copyright  : whatsyourmoments.com
     *      @version    : 1.0 Beta
     *
     */
?>

<?php 
  $ses_user = $this->session->userdata('User');
?>

<?php
    $title = 'whatsyourmoments.me ~ Moments';
    $pageID = 'moments';
?>

<?php
    include('include/html_head.php');   // include file head html
?> 
<div class="<?php echo $pageID; ?>">
  <header>
    <div class="row left-icon">
      <div class="columns sixteen ">
        
          <h1><a href="<?php echo base_url()?>"><img src="<?php echo base_url();?>assets/images/logo.png" alt="Best Moments in Life"></a></h1>
          <article>
            <p>These are the best moments that comply your true expression of life </p>
          </article>
        
      </div>
    </div>
  </header>

  <section class="content-detail">
    <div class="love detail">
      <div class="row left-icon">
        <div class="columns sixteen">
          <h2>LOVE</h2>
          <article>
            <p>Our love is unconditional and eternal. </p>
          </article>
        </div>

        <!-- detail data -->
        <div class="columns sixteen">
          <ul class="block-grid three-up">
            <?php foreach ($love as $key => $value) : ?>
              <li>
                <!-- QOUTE -->
                <?php if($value['quote'] != NULL ) : ?>
                  <?php echo $value['quote']; ?>
                  <span><?php echo $value['name']; ?></span>  
                <?php endif; ?>

                <!-- PHOTO -->
                <?php if($value['photo'] != NULL) :?>
                  <img src="<?php echo base_url()."uploads/".$value['photo']?>" alt="<?php echo $value['caption']; ?>">
                  <span><?php echo $value['name']; ?> <br> <?php echo $value['caption']; ?></span>  
                <?php endif; ?>

                <!-- VIDEO -->
                <?php if($value['url'] != NULL) :?>
                  <?php
                    if (strpos($value['url'],'youtube') !== false) {
                      $parsed_url = parse_url($value['url']);
                      parse_str($parsed_url['query'], $parsed_query_string);
                      $v = $parsed_query_string['v'];

                      echo '<a href="http://www.youtube.com/embed/'. $v .'" class="box-play"> <img src="http://img.youtube.com/vi/'.$v.'/0.jpg"> <img src="'. base_url(). 'assets/images/play.png" alt="play" class="play"></a>';
                    }
                  ?>
                  <span><?php echo $value['name']; ?></span>  
                <?php endif; ?>

              </li>
            <?php endforeach; ?>
          </ul>
        </div>  

      </div>
    </div>

    <!-- FRIENDSHIP -->
    <div class="friendship detail">
      <div class="row left-icon">
        <div class="columns sixteen">
          <h2>FRIENDSHIP</h2>
          <article>
            <p>"A hug is worth a thousand words. A friend is worth more." <br>- Jasmine Fitzwilliam -</p>
          </article>
        </div>
        <div class="columns sixteen">
          <ul class="block-grid three-up">
            <?php foreach ($friendship as $key => $value) : ?>
              <li>
                <!-- QOUTE -->
                <?php if($value['quote'] != NULL ) : ?>
                  <?php echo $value['quote']; ?>
                  <span><?php echo $value['name']; ?></span>  
                <?php endif; ?>

                <!-- PHOTO -->
                <?php if($value['photo'] != NULL) :?>
                  <img src="<?php echo base_url()."uploads/".$value['photo']?>" alt="<?php echo $value['caption']; ?>">
                  <span><?php echo $value['name']; ?> <br> <?php echo $value['caption']; ?></span>  
                <?php endif; ?>

                <!-- VIDEO -->
                <?php if($value['url'] != NULL) :?>
                  <?php
                    if (strpos($value['url'],'youtube') !== false) {
                      $parsed_url = parse_url($value['url']);
                      parse_str($parsed_url['query'], $parsed_query_string);
                      $v = $parsed_query_string['v'];

                      echo '<a href="http://www.youtube.com/embed/'. $v .'" class="box-play"> <img src="http://img.youtube.com/vi/'.$v.'/0.jpg"> <img src="'. base_url(). 'assets/images/play.png" alt="play" class="play"></a>';
                    }
                  ?>
                  <span><?php echo $value['name']; ?></span>  
                <?php endif; ?>

              </li>
            <?php endforeach; ?>
          </ul>
        </div>  
      </div>
    </div>

    <!-- HOBBY -->
    <div class="hobby detail">
      <div class="row left-icon">
        <div class="columns sixteen">
          <h2>HOBBY</h2>
          <article>
            <p>Hobbies meet the daily demands of life; Life is about being happy and about being able to enjoy what we do.</p>              
          </article>
        </div>

        <div class="columns sixteen">
          <ul class="block-grid three-up">
            <?php foreach ($hobby as $key => $value) : ?>
              <li>
                <!-- QOUTE -->
                <?php if($value['quote'] != NULL ) : ?>
                  <?php echo $value['quote']; ?>
                  <span><?php echo $value['name']; ?></span>  
                <?php endif; ?>

                <!-- PHOTO -->
                <?php if($value['photo'] != NULL) :?>
                  <img src="<?php echo base_url()."uploads/".$value['photo']?>" alt="<?php echo $value['caption']; ?>">
                  <span><?php echo $value['name']; ?> <br> <?php echo $value['caption']; ?></span>  
                <?php endif; ?>

                <!-- VIDEO -->
                <?php if($value['url'] != NULL) :?>
                  <?php
                    if (strpos($value['url'],'youtube') !== false) {
                      $parsed_url = parse_url($value['url']);
                      parse_str($parsed_url['query'], $parsed_query_string);
                      $v = $parsed_query_string['v'];

                      echo '<a href="http://www.youtube.com/embed/'. $v .'" class="box-play"> <img src="http://img.youtube.com/vi/'.$v.'/0.jpg"> <img src="'. base_url(). 'assets/images/play.png" alt="play" class="play"></a>';
                    }
                  ?>
                  <span><?php echo $value['name']; ?></span>  
                <?php endif; ?>

              </li>
            <?php endforeach; ?>
          </ul>
        </div>  
      </div>
    </div>

    <!-- TRENDS -->
    <div class="trends detail">
      <div class="row left-icon">
        <div class="columns sixteen">
          <h2>TRENDS</h2>
          <article>
            <p>Trends offer a unique way to get closer to what you care about.</p>
          </article>
        </div>

        <div class="columns sixteen">
          <ul class="block-grid three-up">
            <?php foreach ($trends as $key => $value) : ?>
              <li>
                <!-- QOUTE -->
                <?php if($value['quote'] != NULL ) : ?>
                  <?php echo $value['quote']; ?>
                  <span><?php echo $value['name']; ?></span>  
                <?php endif; ?>

                <!-- PHOTO -->
                <?php if($value['photo'] != NULL) :?>
                  <img src="<?php echo base_url()."uploads/".$value['photo']?>" alt="<?php echo $value['caption']; ?>">
                  <span><?php echo $value['name']; ?> <br> <?php echo $value['caption']; ?></span>  
                <?php endif; ?>

                <!-- VIDEO -->
                <?php if($value['url'] != NULL) :?>
                  <?php
                    if (strpos($value['url'],'youtube') !== false) {
                      $parsed_url = parse_url($value['url']);
                      parse_str($parsed_url['query'], $parsed_query_string);
                      $v = $parsed_query_string['v'];

                      echo '<a href="http://www.youtube.com/embed/'. $v .'" class="box-play"> <img src="http://img.youtube.com/vi/'.$v.'/0.jpg"> <img src="'. base_url(). 'assets/images/play.png" alt="play" class="play"></a>';
                    }
                  ?>
                  <span><?php echo $value['name']; ?></span>  
                <?php endif; ?>

              </li>
            <?php endforeach; ?>
          </ul>
        </div>  

      </div>
    </div>

    <!-- WORK -->
    <div class="work detail">
      <div class="row left-icon">
        <div class="columns sixteen">
          <h2>WORK</h2>
          <article>
            <p>Work is the energy transferred to or from an object by means of a force acting on the object. Energy transferred to the object is positive work and energy transferred from the object is negative work.</p>
          </article>
        </div>

        <div class="columns sixteen">
          <ul class="block-grid three-up">
            <?php foreach ($work as $key => $value) : ?>
              <li>
                <!-- QOUTE -->
                <?php if($value['quote'] != NULL ) : ?>
                  <?php echo $value['quote']; ?>
                  <span><?php echo $value['name']; ?></span>  
                <?php endif; ?>

                <!-- PHOTO -->
                <?php if($value['photo'] != NULL) :?>
                  <img src="<?php echo base_url()."uploads/".$value['photo']?>" alt="<?php echo $value['caption']; ?>">
                  <span><?php echo $value['name']; ?> <br> <?php echo $value['caption']; ?></span>  
                <?php endif; ?>

                <!-- VIDEO -->
                <?php if($value['url'] != NULL) :?>
                  <?php
                    if (strpos($value['url'],'youtube') !== false) {
                      $parsed_url = parse_url($value['url']);
                      parse_str($parsed_url['query'], $parsed_query_string);
                      $v = $parsed_query_string['v'];

                      echo '<a href="http://www.youtube.com/embed/'. $v .'" class="box-play"> <img src="http://img.youtube.com/vi/'.$v.'/0.jpg"> <img src="'. base_url(). 'assets/images/play.png" alt="play" class="play"></a>';
                    }
                  ?>
                  <span><?php echo $value['name']; ?></span>  
                <?php endif; ?>

              </li>
            <?php endforeach; ?>
          </ul>
        </div>  
      </div>
    </div>

    <!-- FAMILY -->
    <div class="family detail">
      <div class="row left-icon">
        <div class="columns sixteen">
          <h2>FAMILY</h2>
          <article>
            <p>We have an equal and independent chance to express our best moment.</p>
          </article>
        </div>

        <div class="columns sixteen">
          <ul class="block-grid three-up">
            <?php foreach ($family as $key => $value) : ?>
              <li>
                <!-- QOUTE -->
                <?php if($value['quote'] != NULL ) : ?>
                  <?php echo $value['quote']; ?>
                  <span><?php echo $value['name']; ?></span>  
                <?php endif; ?>

                <!-- PHOTO -->
                <?php if($value['photo'] != NULL) :?>
                  <img src="<?php echo base_url()."uploads/".$value['photo']?>" alt="<?php echo $value['caption']; ?>">
                  <span><?php echo $value['name']; ?> <br> <?php echo $value['caption']; ?></span>  
                <?php endif; ?>

                <!-- VIDEO -->
                <?php if($value['url'] != NULL) :?>
                  <?php
                    if (strpos($value['url'],'youtube') !== false) {
                      $parsed_url = parse_url($value['url']);
                      parse_str($parsed_url['query'], $parsed_query_string);
                      $v = $parsed_query_string['v'];

                      echo '<a href="http://www.youtube.com/embed/'. $v .'" class="box-play"> <img src="http://img.youtube.com/vi/'.$v.'/0.jpg"> <img src="'. base_url(). 'assets/images/play.png" alt="play" class="play"></a>';
                    }
                  ?>
                  <span><?php echo $value['name']; ?></span>  
                <?php endif; ?>

              </li>
            <?php endforeach; ?>
          </ul>
        </div>  
      </div>
    </div>

    <!-- ETC -->
    <div class="etc detail">
      <div class="row left-icon">
        <div class="columns sixteen">
          <h2>ETC</h2>
          <article>
            <p>We all have our own best moment in life: Meeting your love for the first time, touching the fingers of your newly born child, graduating from school or simply going to the music concert you’ve been dreaming of. </p>
          </article>
        </div>

        <div class="columns sixteen">
          <ul class="block-grid three-up">
            <?php foreach ($etc as $key => $value) : ?>
              <li>
                <!-- QOUTE -->
                <?php if($value['quote'] != NULL ) : ?>
                  <?php echo $value['quote']; ?>
                  <span><?php echo $value['name']; ?></span>  
                <?php endif; ?>

                <!-- PHOTO -->
                <?php if($value['photo'] != NULL) :?>
                  <img src="<?php echo base_url()."uploads/".$value['photo']?>" alt="<?php echo $value['caption']; ?>">
                  <span><?php echo $value['name']; ?> <br> <?php echo $value['caption']; ?></span>  
                <?php endif; ?>

                <!-- VIDEO -->
                <?php if($value['url'] != NULL) :?>
                  <?php
                    if (strpos($value['url'],'youtube') !== false) {
                      $parsed_url = parse_url($value['url']);
                      parse_str($parsed_url['query'], $parsed_query_string);
                      $v = $parsed_query_string['v'];

                      echo '<a href="http://www.youtube.com/embed/'. $v .'" class="box-play"> <img src="http://img.youtube.com/vi/'.$v.'/0.jpg"> <img src="'. base_url(). 'assets/images/play.png" alt="play" class="play"></a>';
                    }
                  ?>
                  <span><?php echo $value['name']; ?></span>  
                <?php endif; ?>

              </li>
            <?php endforeach; ?>
          </ul>
        </div>  
      </div>
    </div>
  </section>
</div>

<div id="fb-root"></div>

<?php
    include('include/html_footer.php');   // include file head html
?> 