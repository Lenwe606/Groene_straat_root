<?php get_header();?>

<?php if($fave_option['mokka_sticky_nav'] == 1 ){ ?>
                <div class="banner hidden-sm hidden-xs">
                    <div class="banner-wrapper">
                        <div class="navbar-header">
                          <a class="navbar-brand" href="<?php echo site_url(); ?>">
                            <img src="<?php echo $sticky_logo; ?>">
                          </a>
                        </div>
                        <!-- main nav -->
                        <div class="navbar yamm hidden-sm hidden-xs">
                            <nav id="primary-nav-wrapper" class="primary-nav mokka-fadin animated clearfix">
                            <ul id="hoofdmenu" class="navbar-nav">
                                <li class="nav-icon"><i class="fa fa-circle"></i></li>
                                <li id="menu-item1" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="?page=overview">Home</a></li>
                                <li class="nav-icon"><i class="fa fa-circle"></i></li>
                                <li id="menu-item2" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="?page=projects">Projecten</a></li>
                                 <li class="nav-icon"><i class="fa fa-circle"></i></li>
                                <li id="menu-item3" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="?page=eventoverview">Events</a></li>
                                 <li class="nav-icon"><i class="fa fa-circle"></i></li>
                                <li id="menu-item4" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="?page=articles">Artikels</a></li>
                                 <li class="nav-icon"><i class="fa fa-circle"></i></li>
                                <li id="menu-item5" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="?page=ads">Zoekertjes</a></li>
                                 <li class="nav-icon"><i class="fa fa-circle"></i></li>
                            </ul>
                            </nav>
                        </div>
                        <!-- .primary-nav -->
                    </div>
                </div>
                <?php } ?>
                    <!-- main nav -->
                    <div class="navbar <?php if($fave_option['mokka_sticky_nav'] == 1 ){ echo "main-hidden"; } ?> yamm hidden-sm hidden-xs">
                        <nav id="primary-nav-wrapper" class="primary-nav animated mokka-main-menu clearfix">
                            <?php fave_navigation('main_menu', 'mega-menu'); ?>
                        </nav>
                    </div>
                    <!-- .primary-nav -->
              
               
            </header><!-- .header -->
            
           <div id="showHere"></div>

<?php

if(isset($_GET["page"]))
{
    if($_GET["page"] == "projects") get_template_part("projectoverview");
    else if($_GET["page"] == "overview") get_template_part("overview");
    else if($_GET["page"] == "eventoverview") get_template_part("eventoverview");
    else if($_GET["page"] == "projectdetail") get_template_part("projectdetail");
    else if($_GET["page"] == "eventdetail") get_template_part("eventdetail");
    else if($_GET["page"] == "memberdetail") get_template_part("memberdetail");
    else if($_GET["page"] == "addetail") get_template_part("adddetail");
    else if($_GET["page"] == "newproject") get_template_part("newproject");
    else if($_GET["page"] == "newevent") get_template_part("newevent");
    else if($_GET["page"] == "editproject") get_template_part("newproject");
    else if($_GET["page"] == "articles") get_template_part("articleoverview");
    else if($_GET["page"] == "articledetail") get_template_part("articledetail");
    else if($_GET["page"] == "ads") get_template_part("adoverview");
}
else get_template_part("overview");
?>

<?php get_footer(); ?>