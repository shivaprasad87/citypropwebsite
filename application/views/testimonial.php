<!--Testinomials-->
<section id="testinomial" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center">
        <h2 class="uppercase">Happy Customers</h2>
        <p class="heading_space">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nec viverra erat Aenean elit tellus.</p>
      </div>
      <?php  
      $loop=0;
          if(count($testimonials)>0)
          {
          foreach ($testimonials as $testimonial) { 
            if($loop<=1)
            {
          ?>
      <div class="col-sm-6">
        <div class="testinomial_wrap heading_space clearfix">
          <div class="testinomial_text border_radius text-center bottom30">
           <?php echo '<p>'.$testimonial->comment.'</p>'; ?>
            <i><img src="<?= base_url('assets/images/');?>quote-left.png" alt=""></i>
          </div>
          <div class="col-xs-12 customer">
            <img src="<?= base_url('uploads/testimonials/' . $testimonial->image) ?>" alt="happy client">
            <h4><?= $testimonial->name ?></h4>
            <span>( <?=$testimonial->job_desc?> )</span>
            <img src="<?= base_url('assets/images/');?>stars.png" alt="rating" class="rating pull-xs-right">
          </div>
        </div>
      </div>
       <?php 
     }
     $loop++;
        }
      }
        else{

         ?>
      <div class="col-sm-6">
        <div class="testinomial_wrap heading_space clearfix">
          <div class="testinomial_text border_radius text-center bottom30">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer adipiscing.</p>
            <i><img src="<?= base_url('assets/images/');?>quote-left.png" alt=""></i>
          </div>
          <div class="col-xs-12 customer">
            <img src="<?= base_url('assets/images/');?>author.png" alt="happy client">
            <h4> SAM NICHOLSON</h4>
            <span>( NorthMarq Capital  )</span>
            <img src="<?= base_url('assets/images/');?>stars.png" alt="rating" class="rating pull-xs-right">
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="testinomial_wrap heading_space clearfix">
          <div class="testinomial_text border_radius text-center bottom30">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer adipiscing.</p>
            <i><img src="<?= base_url('assets/images/');?>quote-left.png" alt=""></i>
          </div>
          <div class="col-xs-12 customer">
            <img src="<?= base_url('assets/images/');?>author.png" alt="happy client">
            <h4> SAM NICHOLSON</h4>
            <span>( NorthMarq Capital  )</span>
            <img src="<?= base_url('assets/images/');?>stars.png" alt="rating" class="rating pull-xs-right">
          </div>
        </div>
      </div>
      <?php } ?>
      <div class="col-xs-12 text-center">
        <a href="javascript:void(0)" class="cd-see-all btn-white border_radius"><i class="fa fa-th" aria-hidden="true"></i>view all</a>
      </div>
    </div>
  </div>
</section>
<!--testinomial collepse-->
<div class="cd-testimonials-all">
  <div class="cd-testimonials-all-wrapper">
    <ul><?php
      if(count($testimonials)>0)
          {
          foreach ($testimonials as $testimonial) { 
          ?>
          <li class="cd-testimonials-item">
        <?php echo $testimonial->comment; ?>
        <div class="cd-author">
          <img src="<?= base_url('uploads/testimonials/' . $testimonial->image) ?>" alt="Author image">
          <ul class="cd-author-info">
            <li><?= $testimonial->name ?></li>
            <li><?=$testimonial->job_desc?></li>
          </ul>
        </div>
      </li> 
        <?php }
        }
        ?>
      
      <!-- <li class="cd-testimonials-item">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore nostrum nisi, doloremque error hic nam nemo doloribus porro impedit perferendis. Tempora, distinctio hic suscipit. At ullam eaque atque recusandae modi fugiat voluptatem laborum laboriosam rerum, consequatur reprehenderit omnis, enim pariatur nam, quidem, quas vel reiciendis aspernatur consequuntur. Commodi quasi enim, nisi alias fugit architecto, doloremque, eligendi quam autem exercitationem consectetur.</p>
        <div class="cd-author">
          <img src="<?= base_url('assets/images/');?>author.png" alt="Author image">
          <ul class="cd-author-info">
            <li>SAM NICHOLSON</li>
            <li>CEO, CompanyName</li>
          </ul>
        </div>
      </li>
      <li class="cd-testimonials-item">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem quibusdam eveniet, molestiae laborum voluptatibus minima hic quasi accusamus ut facere, eius expedita, voluptatem? Repellat incidunt veniam quaerat, qui laboriosam dicta. Quidem ducimus laudantium dolorum enim qui at ipsum, a error.</p>
        <div class="cd-author">
          <img src="<?= base_url('assets/images/');?>author.png" alt="Author image">
          <ul class="cd-author-info">
            <li>SAM NICHOLSON</li>
            <li>CEO, CompanyName</li>
          </ul>
        </div>
      </li>
      <li class="cd-testimonials-item">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero voluptates officiis tempore quae officia! Beatae quia deleniti cum corporis eos perferendis libero reiciendis nemo iusto accusamus, debitis tempora voluptas praesentium repudiandae laboriosam excepturi laborum, nisi optio repellat explicabo, incidunt ex numquam. Ullam perferendis officiis harum doloribus quae corrupti minima quia, aliquam nostrum expedita pariatur maxime repellat, voluptas sunt unde, inventore.</p>
        <div class="cd-author">
          <img src="<?= base_url('assets/images/');?>author.png" alt="Author image">
          <ul class="cd-author-info">
            <li>SAM NICHOLSON</li>
            <li>CEO, CompanyName</li>
          </ul>
        </div>
      </li>
      <li class="cd-testimonials-item">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit totam saepe iste maiores neque animi molestias nihil illum nisi temporibus.</p>
        <div class="cd-author">
          <img src="<?= base_url('assets/images/');?>author.png" alt="Author image">
          <ul class="cd-author-info">
            <li>SAM NICHOLSON</li>
            <li>CEO, CompanyName</li>
          </ul>
        </div>
      </li>
      <li class="cd-testimonials-item">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia quas, quis illo adipisci voluptate ex harum iste commodi nulla dolor. Eius ratione quod ab!</p>
        <div class="cd-author">
          <img src="<?= base_url('assets/images/');?>author.png" alt="Author image">
          <ul class="cd-author-info">
            <li>SAM NICHOLSON</li>
            <li>CEO, CompanyName</li>
          </ul>
        </div>
      </li>
      <li class="cd-testimonials-item">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, dignissimos iure rem fugiat consequuntur officiis.</p>
        <div class="cd-author">
          <img src="<?= base_url('assets/images/');?>author.png" alt="Author image">
          <ul class="cd-author-info">
            <li>SAM NICHOLSON</li>
            <li>CEO, CompanyName</li>
          </ul>
        </div>
      </li>
      <li class="cd-testimonials-item">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At temporibus tempora necessitatibus reiciendis provident deserunt maxime sit id. Dicta aut voluptatibus placeat quibusdam vel, dolore.</p>
        <div class="cd-author">
          <img src="<?= base_url('assets/images/');?>author.png" alt="Author image">
          <ul class="cd-author-info">
            <li>SAM NICHOLSON</li>
            <li>CEO, CompanyName</li>
          </ul>
        </div>
      </li>
      <li class="cd-testimonials-item">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis iusto sapiente, excepturi velit, beatae possimus est tenetur cumque fugit tempore dolore fugiat! Recusandae, vel suscipit? Perspiciatis non similique sint suscipit officia illo, accusamus dolorum, voluptate vitae quia ea amet optio magni voluptatem nemo, natus nihil.</p>
        <div class="cd-author">
          <img src="<?= base_url('assets/images/');?>author.png" alt="Author image">
          <ul class="cd-author-info">
            <li>SAM NICHOLSON</li>
            <li>CEO, CompanyName</li>
          </ul>
        </div>
      </li>
      <li class="cd-testimonials-item">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor quasi officiis pariatur, fugit minus omnis animi ut assumenda quod commodi, ad a alias maxime unde suscipit magnam, voluptas laboriosam ipsam quibusdam quidem, dolorem deleniti id.</p>
        <div class="cd-author">
          <img src="<?= base_url('assets/images/');?>author.png" alt="Author image">
          <ul class="cd-author-info">
            <li>SAM NICHOLSON</li>
            <li>CEO, CompanyName</li>
          </ul>
        </div>
      </li>
      <li class="cd-testimonials-item">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At temporibus tempora necessitatibus reiciendis provident deserunt maxime sit id. Dicta aut voluptatibus placeat quibusdam vel, dolore.</p>
        <div class="cd-author">
          <img src="<?= base_url('assets/images/');?>author.png" alt="Author image">
          <ul class="cd-author-info">
            <li>SAM NICHOLSON</li>
            <li>CEO, CompanyName</li>
          </ul>
        </div>
      </li>
      <li class="cd-testimonials-item">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque tempore ipsam, eos suscipit nostrum molestias reprehenderit, rerum amet cum similique a, ipsum soluta delectus explicabo nihil repellat incidunt! Minima magni possimus mollitia deserunt facere, tempore earum modi, ea ipsa dicta temporibus suscipit quidem ut quibusdam vero voluptatibus nostrum excepturi explicabo nulla harum, molestiae alias. Ab, quidem rem fugit delectus quod.</p>
        <div class="cd-author">
          <img src="<?= base_url('assets/images/');?>author.png" alt="Author image">
          <ul class="cd-author-info">
            <li>SAM NICHOLSON</li>
            <li>CEO, CompanyName</li>
          </ul>
        </div>
      </li> -->
    </ul>
    <a href="#0" class="close-btn">Close</a>
  </div>
</div>
