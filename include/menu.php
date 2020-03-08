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
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#modaldiv" onclick="setChangeCont('<?php echo $log_04; ?>', '<?php echo $log_02; ?>', '<?php echo $log_01; ?>', 'medico');">
                                    <i class="ti-key m-r-5 m-l-5"></i> Cambiar contrase&ntilde;a</a>
                                <a class="dropdown-item" href="../class/session/session_logout.php">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Cerrar Sesi&oacute;n</a>
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
                               		<a href="../public/lesion.php" class="sidebar-link">
                               			<i class="mdi mdi-lesion"></i>
                               			<span class="hide-menu"> Lesiones Cargadas </span>
                                    </a>
                               	</li>

                                <li class="sidebar-item">
                               		<a href="../public/competencia.php?tipo=COM&disciplina=FOOTBALL" class="sidebar-link">
                               			<i class="mdi mdi-competencia"></i>
                               			<span class="hide-menu"> F&uacute;tbol de Campo </span>
                                    </a>
                               	</li>

                                <li class="sidebar-item">
                               		<a href="../public/competencia.php?tipo=COM&disciplina=FUTSAL" class="sidebar-link">
                               			<i class="mdi mdi-competencia"></i>
                               			<span class="hide-menu"> F&uacute;tbol de Sal&oacute;n </span>
                                    </a>
                               	</li>

                                <li class="sidebar-item">
                               		<a href="../public/competencia.php?tipo=COM&disciplina=BEACH_SOCCER" class="sidebar-link">
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
                               		<a href="../public/equipo.php" class="sidebar-link">
                               			<i class="mdi mdi-equipo"></i>
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
                               		<a href="../public/medico.php" class="sidebar-link">
                               			<i class="mdi mdi-medico"></i>
                               			<span class="hide-menu"> Medicos </span>
                                    </a>
                               	</li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                        	<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                           		<i class="icon-Bar-Chart "></i>
                           		<span class="hide-menu"> Informes </span>
                           	</a>
							<ul aria-expanded="false" class="collapse first-level">
                            	<li class="sidebar-item">
                               		<a href="../public/inflesion.php" class="sidebar-link">
                               			<i class="mdi mdi-reporte"></i>
                               			<span class="hide-menu"> Lesiones </span>
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
                               		<a href="../public/persona.php" class="sidebar-link">
                               			<i class="mdi mdi-usuario"></i>
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
                                    <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false">
                                        <i class="mdi mdi-competencia"></i> 
                                        <span class="hide-menu"> Competencia </span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse second-level">
                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=COMPETENCIACATEGORIA" class="sidebar-link">
                                                <i class="mdi mdi-competencia"></i> 
                                                <span class="hide-menu"> Competencia Categor&iacute;a</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-item"> 
                                    <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false">
                                        <i class="mdi mdi-cuerpo"></i> 
                                        <span class="hide-menu"> Cuerpo </span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse second-level">
                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=CUERPOPARTE" class="sidebar-link">
                                                <i class="mdi mdi-cuerpo"></i>
                                                <span class="hide-menu"> Cuerpo Parte</span>
                                            </a>
                                        </li>
                                        
                                        <li class="sidebar-item">
                                            <a href="../public/subdominio.php?dominio=CUERPOZONA" class="sidebar-link">
                                                <i class="mdi mdi-cuerpo"></i>
                                                <span class="hide-menu"> Cuerpo Zona </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=CUERPOLUGAR" class="sidebar-link">
                                                <i class="mdi mdi-cuerpo"></i>
                                                <span class="hide-menu"> Cuerpo Lugar </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-item"> 
                                    <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false">
                                        <i class="mdi mdi-diagnostico"></i> 
                                        <span class="hide-menu"> Diagn&oacute;stico </span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse second-level">
                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=DIAGNOSTICOGRUPO" class="sidebar-link">
                                                <i class="mdi mdi-diagnostico"></i> 
                                                <span class="hide-menu"> Diagn&oacute;stico Grupo </span>
                                            </a>
                                        </li>
                                        
                                        <li class="sidebar-item">
                                            <a href="../public/subdominio.php?dominio=DIAGNOSTICOTIPO" class="sidebar-link">
                                                <i class="mdi mdi-diagnostico"></i> 
                                                <span class="hide-menu"> Diagn&oacute;stico Tipo</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=DIAGNOSTICOTIEMPO" class="sidebar-link">
                                                <i class="mdi mdi-diagnostico"></i> 
                                                <span class="hide-menu"> Diagn&oacute;stico Tiempo </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=DIAGNOSTICORECUPERACION" class="sidebar-link">
                                                <i class="mdi mdi-diagnostico"></i> 
                                                <span class="hide-menu"> Diagn&oacute;stico Recuperaci&oacute;n </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-item"> 
                                    <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false">
                                        <i class="mdi mdi-lesion"></i> 
                                        <span class="hide-menu"> Lesi&oacute;n </span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse second-level">
                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=LESIONESTADO" class="sidebar-link">
                                                <i class="mdi mdi-lesion"></i> 
                                                <span class="hide-menu"> Lesi&oacute;n Estado </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=LESIONEXAMEN" class="sidebar-link">
                                                <i class="mdi mdi-lesion"></i> 
                                                <span class="hide-menu"> Lesi&oacute;n Examen </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=LESIONTIPO" class="sidebar-link">
                                                <i class="mdi mdi-lesion"></i> 
                                                <span class="hide-menu"> Lesi&oacute;n Tipo </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=LESIONORIGEN" class="sidebar-link">
                                                <i class="mdi mdi-lesion"></i> 
                                                <span class="hide-menu"> Lesi&oacute;n Origen </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=LESIONREINCIDENCIA" class="sidebar-link">
                                                <i class="mdi mdi-lesion"></i> 
                                                <span class="hide-menu"> Lesi&oacute;n Reincidencia </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=LESIONRETIRO" class="sidebar-link">
                                                <i class="mdi mdi-lesion"></i> 
                                                <span class="hide-menu"> Lesi&oacute;n Retiro </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=LESIONCAUSA" class="sidebar-link">
                                                <i class="mdi mdi-lesion"></i> 
                                                <span class="hide-menu"> Lesi&oacute;n Causa </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=LESIONFALTA" class="sidebar-link">
                                                <i class="mdi mdi-lesion"></i> 
                                                <span class="hide-menu"> Lesi&oacute;n Falta </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item"> 
                                            <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false">
                                                <i class="mdi mdi-lesion"></i> 
                                                <span class="hide-menu"> Lesi&oacute;n Concusi&oacute;n </span>
                                            </a>
                                            <ul aria-expanded="false" class="collapse second-level">
                                                <li class="sidebar-item">
                                                    <a href="../public/dominio.php?dominio=CONCUSIONCUESTIONARIO" class="sidebar-link">
                                                        <i class="mdi mdi-lesion"></i> 
                                                        <span class="hide-menu"> Concusi&oacute;n Cuestionario</span>
                                                    </a>
                                                </li>

                                                <li class="sidebar-item">
                                                    <a href="../public/dominio.php?dominio=CONCUSIONTIPO" class="sidebar-link">
                                                        <i class="mdi mdi-lesion"></i> 
                                                        <span class="hide-menu"> Concusi&oacute;n Tipo</span>
                                                    </a>
                                                </li>

                                                <li class="sidebar-item">
                                                    <a href="../public/dominio.php?dominio=CONCUSIONSIGNO" class="sidebar-link">
                                                        <i class="mdi mdi-lesion"></i> 
                                                        <span class="hide-menu"> Concusi&oacute;n Signo</span>
                                                    </a>
                                                </li>

                                                <li class="sidebar-item">
                                                    <a href="../public/dominio.php?dominio=CONCUSIONMEMORIA" class="sidebar-link">
                                                        <i class="mdi mdi-lesion"></i> 
                                                        <span class="hide-menu"> Concusi&oacute;n Memoria</span>
                                                    </a>
                                                </li>

                                                <li class="sidebar-item">
                                                    <a href="../public/dominio.php?dominio=CONCUSIONSEGUIMIENTO" class="sidebar-link">
                                                        <i class="mdi mdi-lesion"></i> 
                                                        <span class="hide-menu"> Concusi&oacute;n Seguimiento</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-item"> 
                                    <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false">
                                        <i class="mdi mdi-campo"></i> 
                                        <span class="hide-menu"> Campo </span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse second-level">
                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=CAMPOCLIMA" class="sidebar-link">
                                                <i class="mdi mdi-campo"></i> 
                                                <span class="hide-menu"> Campo Clima </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=CAMPODISTANCIA" class="sidebar-link">
                                                <i class="mdi mdi-campo"></i> 
                                                <span class="hide-menu"> Campo Distancia </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=CAMPOMINUTO" class="sidebar-link">
                                                <i class="mdi mdi-campo"></i> 
                                                <span class="hide-menu"> Campo Minuto </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=CAMPOTRASLADO" class="sidebar-link">
                                                <i class="mdi mdi-campo"></i> 
                                                <span class="hide-menu"> Campo Traslado </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=CAMPOTIPO" class="sidebar-link">
                                                <i class="mdi mdi-campo"></i>  
                                                <span class="hide-menu"> Campo Juego </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=CAMPOPOSICION" class="sidebar-link">
                                                <i class="mdi mdi-campo"></i>  
                                                <span class="hide-menu"> Campo Posici&oacute;n </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-item"> 
                                    <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false">
                                        <i class="mdi mdi-usuario"></i> 
                                        <span class="hide-menu"> Usuario </span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse second-level">
                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=USUARIOESTADO" class="sidebar-link">
                                                <i class="mdi mdi-usuario"></i>
                                                <span class="hide-menu"> Usuario Estado </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=USUARIOACCESO" class="sidebar-link">
                                                <i class="mdi mdi-usuario"></i>
                                                <span class="hide-menu"> Usuario Acceso </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="../public/dominio.php?dominio=USUARIOROL" class="sidebar-link">
                                                <i class="mdi mdi-usuario"></i>
                                                <span class="hide-menu"> Usuario Rol </span>
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