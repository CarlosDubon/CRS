    <div class="navbar navbar-custom " role="navigation"> 
            <div class="container-fluid" >
             
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="INDEX.php"><b>CSSC RESERVATION SYSTEM</b></a>

                </div>
            
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav"> 

                       <?php 
                       if (isset($_SESSION['tipo'])) 
                        if($_SESSION['tipo']!=1)
                        { 
                        ?>
                        <li>
                        <a href="areas.php" ><i class="fa fa-picture-o"></i> ESPACIOS</a>
                        </li>
                        <li><a href="repusuario.php"><i class="fa fa-pencil-square-o"></i></span> REPORTES</a></li>

                        
                        
                        <?php
                        } 
                    if(isset($_SESSION['tipo']))
                        if($_SESSION['tipo']==1) {   
                        ?> 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> USUARIO<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="nuevoUsuario.php"><i class="fa fa-user-plus"></i> NUEVO USUARIO</a></li>
                                <li><a href="mostrarUsuario.php"><i class="fa fa-users"></i> MOSTRAR USUARIOS</a></li>
                                
                            </ul>
                        </li>                       
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-picture-o"></i> ESPACIOS<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="areas.php"><i class="fa fa-calendar"></i> ESPACIOS Y HORARIOS</a></li>
                                <li><a href="inshorario.php"><i class="fa fa-clock-o"></i> AGREGAR NUEVO HORARIO</a></li>
                                <!--<li><a href=#><span class="glyphicon glyphicon-plus-sign"></span> AGREGAR NUEVO ESPACIO</a></li>-->
                                <li><a href="repa.php"><i class="fa fa-pencil-square-o"></i> REPORTES</a></li>
                                
                            </ul>
                        </li>
                       
                            
                             
                                
                            
                        
                    <?php }
                    ?>
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i> IDIOMA<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="../CRSING"><i class="fa fa-flag-o"></i> ENGLISH</a></li>
                                
                            </ul>
                        </li> 
                        <li>
                          
                         <a target=\"_blank\" href="csscres.pdf" title="AYUDA"><i class="fa fa-question"></i> AYUDA</a>
                        </li>
                         
                       
                    <?php
                    if(isset($_SESSION['usuario'])){

                        ?>

                    
                                       
                    
                    
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> CUENTA <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <li><a href="camcontra.php"><i class="fa fa-refresh"></i> CAMBIAR CONTRASEÑA</a></li>
                                <li><a href="cerrar.php" class="dropdown-toggle"><i class="fa fa-power-off"></i> CERRAR SESIÓN</a></li>  
                            </ul>
                        </li>
                       
                    </ul> 
                    <p class="navbar-text navbar-right"><span class="glyphicon glyphicon-user"></span> USUARIO: <a href="home.php" class="navbar-link"> <?php echo $_SESSION['usuario'] ?> </a></p> 

                    <?php

                    }else {?>
                    </ul>
                    <p class="navbar-text navbar-right"><span class="glyphicon glyphicon-user"></span><a href="home.php"> INICIAR SESIÓN</a>
                    
                    </p>
                    <?php }  ?>
                   
                    </div><!--/.nav-collapse <embed src="url_pdf.pdf" width="450" height="450" href="url_pdf.pdf"></embed> -->
                </div>
            </div>
            <?php date_default_timezone_set('America/El_Salvador'); ?>