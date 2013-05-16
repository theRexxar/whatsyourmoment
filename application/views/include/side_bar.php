<aside>
  <section class="control-bar control-left">
    <div class="categoty">
      <ul class="cufon">
          <li class="<?php echo (get_url() == 'commercial' ) ? 'active"' : '' ?>"><a href="<?php echo base_url();?>home/category/commercial" title="commercial" class="category">Commercial</a></li>
          <li class="<?php echo (get_url() == 'award') ? 'active' : '' ?>"><a href="<?php echo base_url();?>home/category/award" title="Award" class="category">Award</a></li>
          <li class="<?php echo (get_url() == 'bts') ? 'active' : '' ?>"><a href="<?php echo base_url();?>home/category/bts" title="Behind the Scene" class="category">Behind The Scene</a></li>
          <?php /** comment because personal menu move to about popup 
            <li class="<?php echo (get_url() == 'personal') ? 'active' : '' ?>"><a href="<?php echo base_url();?>home/category/personal" title="Personal" class="category">Personal</a></li>
          **/ ?>
          <li class="clients"><a href="<?php echo base_url();?>home/clientlist/" title="Client List" class="client-list">Client List</a></li>
      </ul>
    </div>        
    <div class="carousel">
      <ul class="carousel-control">
          <li><a href="#" id="category-choose" class="hide" rel="tipsy" title="View All Category">category</a></li>
          <?php if(isset($prevProject) && !empty($prevProject)) : ?>
            <li><a href="<?php echo base_url().'home/'. $prevProject->category. '/'. url_title($prevProject->brand); ?>" id="prev-project" class="hide" rel="tipsy" title="Previous Project">&laquo; Prev</a></li>
          <?php endif; ?>
          <?php if(isset($nextProject) && !empty($nextProject)) : ?>
            <li><a href="<?php echo base_url().'home/'. $nextProject->category. '/'. url_title($nextProject->brand); ?>" id="next-project" class="hide" rel="tipsy" title="Next Project">Next &raquo;</a></li>
          <?php endif; ?>
      </ul>
      <ul id="slide-carousel" class="jcarousel-skin-tango">
        <?php if(isset($listCategory) && !empty($listCategory)) : ?>
          <?php foreach ($listCategory as $key => $value) : ?>
            <li>
              <img src="<?php echo base_url(). $value['thumbnail']?>" alt="<?php echo $value['brand'] ?>" />
              <span><a href="<?php echo base_url().'home/'. $value['category'] .'/'. url_title($value['brand']) ;?>" title=""><?php echo ucfirst($value['project_title']) ."<br/> ". ucfirst($value['brand']); ?></a></span>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>  
      </ul>
    </div>
  </section>
  <section class="control-bar wrap">     
      <div class="bottom">        
        <?php if(isset($listgallery) && !empty($listgallery)) : ?>
          <article class="project-title">
              <h3>
                <?php echo strtoupper($listgallery[0]['project_title']); ?>
                <span>Title : <b><?php echo $listgallery[0]['brand']; ?></b> </span>
              </h3>
              <span class="cufon"><?php echo strtoupper($listgallery[0]['category']); ?></span>
          </article>
          <ul>
             <!--  <li>
                  <a href="<?php echo base_url().'home/about/'; ?>" rel="tipsy" class="about-us hide" original-title="About Us">About Us</a>
              </li> -->
              <li>
                  <a href="<?php echo base_url().'home/detail/'.$listgallery[0]['id']; ?>" rel="tipsy" class="behind-scene hide" original-title="Detail Project & Behind The Scene">Detail Project & Behind The Scene</a>
              </li>
              <li>
                  <a id="prevslide" class="load-item hide" rel="tipsy" original-title="Previous"><</a>
              </li>
              <li>
                  <a id="nextslide" class="load-item hide" rel="tipsy" original-title="Next">></a>
              </li>
              <li>
                  <span class="slidenumber"></span>
                  <span class="totalslides"></span>
              </li>
          </ul>
      <?php endif; ?>   
    </div>
  </section>    
</aside>