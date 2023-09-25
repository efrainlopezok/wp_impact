<?php global $post;
$f_post_slug=$post->post_name; ?>	
    				<div class="collapse navbar-collapse topnavbar" id="navbarTop">
                          <ul class="navbar-nav">
                            <li class="nav-item <?php if($f_post_slug=="about"){echo "active";}?>">
                              <a class="nav-link" href="<?php echo get_site_url(); ?>/about">About <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item <?php if($f_post_slug=="services"){echo "active";}?>">
                              <a class="nav-link" href="<?php echo get_site_url(); ?>/services">Services</a>
                            </li>
                            <li class="nav-item <?php if($f_post_slug=="case-studies"){echo "active";}?>">
                              <a class="nav-link" href="<?php echo get_site_url(); ?>/case-studies">Case Studies</a>
                            </li>
                            <li class="nav-item <?php if($f_post_slug=="contact"){echo "active";}?>">
                              <a class="nav-link" href="<?php echo get_site_url(); ?>/contact">Contact</a>
                            </li>
                            <li class="nav-item <?php if($f_post_slug=="portal"){echo "active";}?>">
                              <a class="nav-link" href="<?php echo get_site_url(); ?>/portal">Portal</a>
                            </li>
                            <!--<li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                              <div class="dropdown-menu" aria-labelledby="dropdown09">
                                <a class="dropdown-item" href="#">Action</a>
                              </div>
                            </li>-->
                          </ul>
                        </div>
