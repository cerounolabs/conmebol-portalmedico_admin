        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="../public/home.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!--<img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />-->
                            <!-- Light Logo icon -->
                            <!--<img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />-->
                            <img src="../assets/images/logo_index.png" style="height:50px;" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <!--<img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />-->
                            <!-- Light Logo text -->
                            <!--<img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />-->
                            
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="sl-icon-menu font-20"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <i class="ti-search font-16"></i>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Que desea hacer?">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                        
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/images/users/default.png" alt="user" class="rounded-circle" width="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10" style="background-color:#163562 !important;">
                                    <div class="">
                                        <img src="../assets/images/users/default.png" alt="user" class="img-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?php echo $usu_01; ?></h4>
										<p class=" m-b-0"><?php echo $usu_02; ?></p>
										<p class=" m-b-0"><?php echo $log_03; ?></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-user m-r-5 m-l-5"></i> Perfil</a>
                                <a class="dropdown-item" href="../class/session/session_logout.php">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Cerrar Secci&oacute;n</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
        	</nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       	<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                        	<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        		<i class="icon-Car-Wheel"></i>
                        		<span class="hide-menu"> Dashboard </span>
                        	</a>
							<ul aria-expanded="false" class="collapse first-level">
                            	<li class="sidebar-item">
                               		<a href="../public/home.php" class="sidebar-link">
                               			<i class="mdi mdi-home"></i>
                               			<span class="hide-menu"> Home </span>
                               		</a>
                               	</li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                        	<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                           		<i class="icon-Ambulance"></i>
                           		<span class="hide-menu"> Lesiones </span>
                           	</a>
							<ul aria-expanded="false" class="collapse first-level">
                            	<li class="sidebar-item">
                               		<a href="javascript:void(0)" class="sidebar-link">
                               			<i class="mdi mdi-funcionario"></i>
                               			<span class="hide-menu"> Lesiones </span>
                                    </a>
                               	</li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                        	<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                           		<i class="icon-Boom"></i>
                           		<span class="hide-menu"> Competencias </span>
                           	</a>
							<ul aria-expanded="false" class="collapse first-level">
                            	<li class="sidebar-item">
                               		<a href="../public/disciplina.php" class="sidebar-link">
                               			<i class="mdi mdi-competencia"></i>
                               			<span class="hide-menu"> Disciplinas </span>
                                    </a>
                               	</li>
                                
                                <li class="sidebar-item">
                               		<a href="../public/competencia.php?disciplina=FOOTBALL" class="sidebar-link">
                               			<i class="mdi mdi-competencia"></i>
                               			<span class="hide-menu"> F&uacute;tbol de Campo </span>
                                    </a>
                               	</li>

                                <li class="sidebar-item">
                               		<a href="../public/competencia.php?disciplina=FUTSAL" class="sidebar-link">
                               			<i class="mdi mdi-competencia"></i>
                               			<span class="hide-menu"> F&uacute;tbol de Sal&oacute;n </span>
                                    </a>
                               	</li>

                                <li class="sidebar-item">
                               		<a href="../public/competencia.php?disciplina=BEACH_SOCCER" class="sidebar-link">
                               			<i class="mdi mdi-competencia"></i>
                               			<span class="hide-menu"> F&uacute;tbol de Playa </span>
                                    </a>
                               	</li>
                            </ul>
                        </li>
                        
                        <li class="sidebar-item">
                        	<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                           		<i class="icon-Control"></i>
                           		<span class="hide-menu"> Equipos </span>
                           	</a>
							<ul aria-expanded="false" class="collapse first-level">
                            	<li class="sidebar-item">
                               		<a href="javascript:void(0)" class="sidebar-link">
                               			<i class="mdi mdi-funcionario"></i>
                               			<span class="hide-menu"> Equipos </span>
                                    </a>
                               	</li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                        	<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                           		<i class="icon-Betvibes "></i>
                           		<span class="hide-menu"> Medicos </span>
                           	</a>
							<ul aria-expanded="false" class="collapse first-level">
                            	<li class="sidebar-item">
                               		<a href="javascript:void(0)" class="sidebar-link">
                               			<i class="mdi mdi-funcionario"></i>
                               			<span class="hide-menu"> Medicos </span>
                                    </a>
                               	</li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                        	<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                           		<i class="icon-Bar-Chart "></i>
                           		<span class="hide-menu"> Reportes </span>
                           	</a>
							<ul aria-expanded="false" class="collapse first-level">
                            	<li class="sidebar-item">
                               		<a href="javascript:void(0)" class="sidebar-link">
                               			<i class="mdi mdi-funcionario"></i>
                               			<span class="hide-menu"> Reportes </span>
                                    </a>
                               	</li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                        	<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                           		<i class="icon-Business-ManWoman"></i>
                           		<span class="hide-menu"> Usuarios </span>
                           	</a>
							<ul aria-expanded="false" class="collapse first-level">
                            	<li class="sidebar-item">
                               		<a href="javascript:void(0)" class="sidebar-link">
                               			<i class="mdi mdi-funcionario"></i>
                               			<span class="hide-menu"> Usuarios </span>
                                    </a>
                               	</li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                           	    <i class="icon-Box-withFolders"></i>
                           	    <span class="hide-menu"> Par&aacute;metros </span>
                            </a>
						    <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                               	    <a href="../public/dominio.php?dominio=PARTECUERPO" class="sidebar-link">
                               		    <i class="mdi mdi-parm"></i>
                               		    <span class="hide-menu"> Partes del Cuerpo </span>
                               	    </a>
                                </li>
                                
                                <li class="sidebar-item">
                               	    <a href="../public/subdominio.php?dominio=ZONACUERPO" class="sidebar-link">
                               		    <i class="mdi mdi-parm"></i>
                               		    <span class="hide-menu"> Zonas del Cuerpo </span>
                               	    </a>
                                </li>
                                
                                <li class="sidebar-item">
                               	    <a href="../public/dominio.php?dominio=GRUPODIAGNOSTICO" class="sidebar-link">
                               		    <i class="mdi mdi-parm"></i>
                               		    <span class="hide-menu"> Grupo de Diagn&oacute;stico </span>
                               	    </a>
                                </li>

                                <li class="sidebar-item">
                               	    <a href="../public/subdominio.php?dominio=DIAGNOSTICO" class="sidebar-link">
                               		    <i class="mdi mdi-parm"></i>
                               		    <span class="hide-menu"> Diagn&oacute;stico </span>
                               	    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a href="../public/dominio.php?dominio=TIPOLESION" class="sidebar-link">
                               	        <i class="mdi mdi-parm"></i>
                               		    <span class="hide-menu"> Tipo de Lesi&oacute;n </span>
                               	    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                           	    <i class="icon-Security-Block"></i>
                           	    <span class="hide-menu"> Auditor&iacute;a </span>
                            </a>
						    <ul aria-expanded="false" class="collapse first-level">                       
                                <li class="sidebar-item"> 
                                    <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false">
                                        <i class="mdi mdi-aud-parameto"></i> 
                                        <span class="hide-menu"> Par&aacute;metros </span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse second-level">
                                        <li class="sidebar-item">
                                            <a href="javascript:void(0)" class="sidebar-link">
                                                <i class="mdi mdi-parm"></i>
                                                <span class="hide-menu"> Partes del Cuerpo </span>
                                            </a>
                                        </li>
                                        
                                        <li class="sidebar-item">
                                            <a href="javascript:void(0)" class="sidebar-link">
                                                <i class="mdi mdi-parm"></i>
                                                <span class="hide-menu"> Zonas del Cuerpo </span>
                                            </a>
                                        </li>
                                        
                                        <li class="sidebar-item">
                                            <a href="javascript:void(0)" class="sidebar-link">
                                                <i class="mdi mdi-parm"></i>
                                                <span class="hide-menu"> Grupo de Diagn&oacute;stico </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="javascript:void(0)" class="sidebar-link">
                                                <i class="mdi mdi-parm"></i>
                                                <span class="hide-menu"> Diagn&oacute;stico </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="javascript:void(0)" class="sidebar-link">
                                                <i class="mdi mdi-parm"></i>
                                                <span class="hide-menu"> Tipo de Lesi&oacute;n </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
						</li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->