
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">


		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">


				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">


					<div class="kt-aside__brand kt-grid__item  " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">

                            <?php

                            $link = $_SERVER['PHP_SELF'];
                            $link_array = explode('/',$link);
                            $page = end($link_array);

                            if ($page == "Default_weight.php") { ?>

							<button style="background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none;" type="button" >
								<img alt="Logo" src="assets/media/logos/logo-4.png" />
                            </button>

                        <?php }else{ ?>
                                <button style="background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none;" type="button" id="kt_sweetalert_demo_8" href="index.php">
                                    <img alt="Logo" src="assets/media/logos/logo-4.png" />
                                </button>
                         <?php   } ?>


						</div>
					</div>



					<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid"  id="">
						<div id="" class="kt-aside-menu  kt-aside-menu--dropdown "  data-ktmenu-vertical="4" data-ktmenu-dropdown="1" data-ktmenu-scroll="0">
							<ul class="kt-menu__nav " >

                                <?php

                                $link = $_SERVER['PHP_SELF'];
                                $link_array = explode('/',$link);
                                $page = end($link_array);

                                if ($page == "size.php") { ?>

                                    <li class="kt-menu__item kt-menu__item--active" data-ktmenu-submenu-toggle="hover"><a href="size.php" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-arrow-1"></i><span class="kt-menu__link-text">Size</span></a></li>
                                    <li class="kt-menu__item"><a href="variables.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-1"></i><span class="kt-menu__link-text">Variables</span></a></li>
                                    <li class="kt-menu__item "><a href="methods.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-menu"></i><span class="kt-menu__link-text">Methods</span></a></li>
                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a href="inheritance.php" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-group"></i><span class="kt-menu__link-text">Inheritance</span></a></li>
                                    <li class="kt-menu__item "><a href="coupling.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-design"></i><span class="kt-menu__link-text">Coupling</span></a></li>
                                    <li class="kt-menu__item " ><a href="control_structures.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-pie-chart-2"></i><span class="kt-menu__link-text"><center>Control <br>Structures</center></span></a></li>
                                    <li class="kt-menu__item " ><a href="total_weight.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-chart"></i><span class="kt-menu__link-text"><center>Total <br>Complexity</center></span></a></li>

                                    <?php
                                }elseif ($page == "variables.php"){ ?>

                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a href="size.php" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-arrow-1"></i><span class="kt-menu__link-text">Size</span></a></li>
                                    <li class="kt-menu__item kt-menu__item--active"><a href="variables.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-1"></i><span class="kt-menu__link-text">Variables</span></a></li>
                                    <li class="kt-menu__item"><a href="methods.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-menu"></i><span class="kt-menu__link-text">Methods</span></a></li>
                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a href="inheritance.php" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-group"></i><span class="kt-menu__link-text">Inheritance</span></a></li>
                                    <li class="kt-menu__item"><a href="coupling.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-design"></i><span class="kt-menu__link-text">Coupling</span></a></li>
                                    <li class="kt-menu__item" ><a href="control_structures.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-pie-chart-2"></i><span class="kt-menu__link-text"><center>Control <br>Structures</center></span></a></li>
                                    <li class="kt-menu__item " ><a href="total_weight.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-chart"></i><span class="kt-menu__link-text"><center>Total <br>Complexity</center></span></a></li>

                                    <?php
                                }elseif ($page == "methods.php"){ ?>

                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a href="size.php" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-arrow-1"></i><span class="kt-menu__link-text">Size</span></a></li>
                                    <li class="kt-menu__item"><a href="variables.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-1"></i><span class="kt-menu__link-text">Variables</span></a></li>
                                    <li class="kt-menu__item kt-menu__item--active"><a href="methods.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-menu"></i><span class="kt-menu__link-text">Methods</span></a></li>
                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a href="inheritance.php" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-group"></i><span class="kt-menu__link-text">Inheritance</span></a></li>
                                    <li class="kt-menu__item"><a href="coupling.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-design"></i><span class="kt-menu__link-text">Coupling</span></a></li>
                                    <li class="kt-menu__item" ><a href="control_structures.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-pie-chart-2"></i><span class="kt-menu__link-text"><center>Control <br>Structures</center></span></a></li>
                                    <li class="kt-menu__item " ><a href="total_weight.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-chart"></i><span class="kt-menu__link-text"><center>Total <br>Complexity</center></span></a></li>

                                    <?php
                                }
                                elseif ($page == "inheritance.php"){ ?>

                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a href="size.php" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-arrow-1"></i><span class="kt-menu__link-text">Size</span></a></li>
                                    <li class="kt-menu__item"><a href="variables.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-1"></i><span class="kt-menu__link-text">Variables</span></a></li>
                                    <li class="kt-menu__item"><a href="methods.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-menu"></i><span class="kt-menu__link-text">Methods</span></a></li>
                                    <li class="kt-menu__item kt-menu__item--active" data-ktmenu-submenu-toggle="hover"><a href="inheritance.php" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-group"></i><span class="kt-menu__link-text">Inheritance</span></a></li>
                                    <li class="kt-menu__item "><a href="coupling.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-design"></i><span class="kt-menu__link-text">Coupling</span></a></li>
                                    <li class="kt-menu__item " ><a href="control_structures.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-pie-chart-2"></i><span class="kt-menu__link-text"><center>Control <br>Structures</center></span></a></li>
                                    <li class="kt-menu__item " ><a href="total_weight.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-chart"></i><span class="kt-menu__link-text"><center>Total <br>Complexity</center></span></a></li>

                                    <?php
                                }elseif ($page == "coupling.php"){ ?>

                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a href="size.php" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-arrow-1"></i><span class="kt-menu__link-text">Size</span></a></li>
                                    <li class="kt-menu__item"><a href="variables.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-1"></i><span class="kt-menu__link-text">Variables</span></a></li>
                                    <li class="kt-menu__item"><a href="methods.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-menu"></i><span class="kt-menu__link-text">Methods</span></a></li>
                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a href="inheritance.php" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-group"></i><span class="kt-menu__link-text">Inheritance</span></a></li>
                                    <li class="kt-menu__item kt-menu__item--active"><a href="coupling.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-design"></i><span class="kt-menu__link-text">Coupling</span></a></li>
                                    <li class="kt-menu__item " ><a href="control_structures.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-pie-chart-2"></i><span class="kt-menu__link-text"><center>Control <br>Structures</center></span></a></li>
                                    <li class="kt-menu__item " ><a href="total_weight.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-chart"></i><span class="kt-menu__link-text"><center>Total <br>Complexity</center></span></a></li>

                                    <?php
                                }elseif ($page == "control_structures.php"){ ?>

                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a href="size.php" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-arrow-1"></i><span class="kt-menu__link-text">Size</span></a></li>
                                    <li class="kt-menu__item"><a href="variables.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-1"></i><span class="kt-menu__link-text">Variables</span></a></li>
                                    <li class="kt-menu__item"><a href="methods.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-menu"></i><span class="kt-menu__link-text">Methods</span></a></li>
                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a href="inheritance.php" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-group"></i><span class="kt-menu__link-text">Inheritance</span></a></li>
                                    <li class="kt-menu__item"><a href="coupling.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-design"></i><span class="kt-menu__link-text">Coupling</span></a></li>
                                    <li class="kt-menu__item kt-menu__item--active" ><a href="control_structures.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-pie-chart-2"></i><span class="kt-menu__link-text"><center>Control <br>Structures</center></span></a></li>
                                    <li class="kt-menu__item " ><a href="total_weight.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-chart"></i><span class="kt-menu__link-text"><center>Total <br>Complexity</center></span></a></li>

                                    <?php
                                }elseif ($page == "total_weight.php"){ ?>

                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a href="size.php" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-arrow-1"></i><span class="kt-menu__link-text">Size</span></a></li>
                                    <li class="kt-menu__item"><a href="variables.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-1"></i><span class="kt-menu__link-text">Variables</span></a></li>
                                    <li class="kt-menu__item"><a href="methods.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-menu"></i><span class="kt-menu__link-text">Methods</span></a></li>
                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a href="inheritance.php" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-group"></i><span class="kt-menu__link-text">Inheritance</span></a></li>
                                    <li class="kt-menu__item"><a href="coupling.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-design"></i><span class="kt-menu__link-text">Coupling</span></a></li>
                                    <li class="kt-menu__item " ><a href="control_structures.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-pie-chart-2"></i><span class="kt-menu__link-text"><center>Control <br>Structures</center></span></a></li>
                                    <li class="kt-menu__item kt-menu__item--active" " ><a href="total_weight.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-chart"></i><span class="kt-menu__link-text"><center>Total <br>Complexity</center></span></a></li>


                                    <?php
                                }


                                elseif ($page == "index.php"){ ?>

                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a id="kt_sweetalert_demo_3_4a" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-arrow-1"></i><span class="kt-menu__link-text">Size</span></a></li>
                                    <li class="kt-menu__item"><a id="kt_sweetalert_demo_3_4b" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-1"></i><span class="kt-menu__link-text">Variables</span></a></li>
                                    <li class="kt-menu__item "><a id="kt_sweetalert_demo_3_4c" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-menu"></i><span class="kt-menu__link-text">Methods</span></a></li>
                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a id="kt_sweetalert_demo_3_4d"  class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-group"></i><span class="kt-menu__link-text">Inheritance</span></a></li>
                                    <li class="kt-menu__item "><a a id="kt_sweetalert_demo_3_4e" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-design"></i><span class="kt-menu__link-text">Coupling</span></a></li>
                                    <li class="kt-menu__item " ><a a id="kt_sweetalert_demo_3_4f" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-pie-chart-2"></i><span class="kt-menu__link-text"><center>Control <br>Structures</center></span></a></li>
                                    <li class="kt-menu__item " ><a a id="kt_sweetalert_demo_3_4g" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-chart"></i><span class="kt-menu__link-text"><center>Total <br>Complexity</center></span></a></li>

                                    <?php
                                }elseif ($page == "Default_weight.php"){ ?>

                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a id="kt_sweetalert_demo_3_4a"  class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-arrow-1"></i><span class="kt-menu__link-text">Size</span></a></li>
                                    <li class="kt-menu__item"><a id="kt_sweetalert_demo_3_4b" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-1"></i><span class="kt-menu__link-text">Variables</span></a></li>
                                    <li class="kt-menu__item "><a id="kt_sweetalert_demo_3_4c" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-menu"></i><span class="kt-menu__link-text">Methods</span></a></li>
                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a id="kt_sweetalert_demo_3_4d" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-group"></i><span class="kt-menu__link-text">Inheritance</span></a></li>
                                    <li class="kt-menu__item "><a id="kt_sweetalert_demo_3_4e" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-design"></i><span class="kt-menu__link-text">Coupling</span></a></li>
                                    <li class="kt-menu__item " ><a id="kt_sweetalert_demo_3_4f" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-pie-chart-2"></i><span class="kt-menu__link-text"><center>Control <br>Structures</center></span></a></li>
                                    <li class="kt-menu__item " ><a id="kt_sweetalert_demo_3_4g" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-chart"></i><span class="kt-menu__link-text"><center>Total <br>Complexity</center></span></a></li>

                                    <?php
                                }else{ ?>

                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a id="kt_sweetalert_demo_3_4a" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-arrow-1"></i><span class="kt-menu__link-text">Size</span></a></li>
                                    <li class="kt-menu__item"><a id="kt_sweetalert_demo_3_4b" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-1"></i><span class="kt-menu__link-text">Variables</span></a></li>
                                    <li class="kt-menu__item "><a id="kt_sweetalert_demo_3_4c" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-menu"></i><span class="kt-menu__link-text">Methods</span></a></li>
                                    <li class="kt-menu__item" data-ktmenu-submenu-toggle="hover"><a id="kt_sweetalert_demo_3_4d" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-group"></i><span class="kt-menu__link-text">Inheritance</span></a></li>
                                    <li class="kt-menu__item "><a id="kt_sweetalert_demo_3_4e" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graphic-design"></i><span class="kt-menu__link-text">Coupling</span></a></li>
                                    <li class="kt-menu__item " ><a id="kt_sweetalert_demo_3_4f" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-pie-chart-2"></i><span class="kt-menu__link-text"><center>Control <br>Structures</center></span></a></li>
                                    <li class="kt-menu__item " ><a id="kt_sweetalert_demo_3_4g" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-chart"></i><span class="kt-menu__link-text"><center>Total <br>Complexity</center></span></a></li>


                                    <?php
                                }
                                ?>

            
                                

							</ul>
						</div>
					</div>


				</div>


                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="sidebar">

                    <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">


                        <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                        <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                            <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-tab ">
                                <ul class="kt-menu__nav ">

                                   <center><li class="kt-menu__item  kt-menu__item- " aria-haspopup="true"><span style="font-size: 30px;font-family: 'Arial'; color: white" class="kt-menu__link-text">B-CAP Java & C++ Measuring Tool</span></a></li></center>

                                    </li>

                                </ul>


                            </div>
                        </div>

                        <div class="kt-header__topbar">


                            <div class="kt-header__topbar-item kt-header__topbar-item--user">
                                <div class="kt-header__topbar-wrapper" data-toggle="" data-offset="0px,0px">


                                    <li class="kt-header__topbar-user" aria-haspopup="true"> <button style="background-color:  ; width: 200px; height: 50px; text-align: center; font-size: 16px;  float: left; padding-right: 20px; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none;" type="button" id="kt_sweetalert_demo_82" href="index.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-plus-1" style="color: green; font-size: 20px"></i><span class="kt-menu__link-text">    Add New Code</span></button></li>
                                    <div class="kt-header__topbar-user">

                                        <a href="Default_weight.php" class="btn btn-info btn-bold btn-sm btn-icon-h kt-margin-l-10">
                                            <b style="font-family: Arial">Change  Weights</b>
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">


                                    <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(assets/media/misc/bg-1.jpg)">
                                        <div class="kt-user-card__avatar">
                                            <img class="kt-hidden" alt="Pic" src="assets/media/users/300_25.jpg" />


                                            <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">U</span>
                                        </div>
                                        <div class="kt-user-card__name">


                                        </div>

                                    </div>


                                </div>
                            </div>

                        </div>


                    </div>




