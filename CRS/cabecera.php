    <div class="navbar navbar-custom " role="navigation"> 
            <div class="container-fluid" >
             
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="INDEX.php"><img src="img/crs.ico" width='20 px' alt="">CSSC RESERVATION SYSTEM</a>

                </div>
            
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav"> 

                       <?php 
                       if (isset($_SESSION['tipo'])) 
                        if($_SESSION['tipo']!=1)
                        { 
                        ?>
                        <li>
                        <a href="areas.php" ><span class="glyphicon glyphicon-picture"></span> ESPACIOS</a>
                        </li>
                        <li><a href="repusuario.php"><span class="glyphicon glyphicon-pencil"></span> REPORTES</a></li>

                        
                        
                        <?php
                        } 
                    if(isset($_SESSION['tipo']))
                        if($_SESSION['tipo']==1) {   
                        ?> 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> USUARIO<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="nuevoUsuario.php"><span class="glyphicon glyphicon-plus-sign"></span> NUEVO USUARIO</a></li>
                                <li><a href="mostrarUsuario.php"><span class="glyphicon glyphicon-list-alt"></span> MOSTRAR USUARIOS</a></li>
                                
                            </ul>
                        </li>                       
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-picture "></span> ESPACIOS<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="areas.php"><span class="glyphicon glyphicon-calendar"></span> ESPACIOS Y HORARIOS</a></li>
                                <li><a href="inshorario.php"><span class="glyphicon glyphicon-plus"></span> AGREGAR NUEVO HORARIO</a></li>
                                <!--<li><a href=#><span class="glyphicon glyphicon-plus-sign"></span> AGREGAR NUEVO ESPACIO</a></li>-->
                                <li><a href="repa.php"><span class="glyphicon glyphicon-pencil"></span> REPORTES</a></li>
                                
                            </ul>
                        </li>
                       
                            
                             
                                
                            
                        
                    <?php }
                    ?>
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-flag"></span> IDIOMA<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="../CRSING"><img src ="img/USA.png" width="30" height="25"> ENGLISH</a></li>
                                
                            </ul>
                        </li> 
                        <li>
                          
                         <a target=\"_blank\" href="csscres.pdf" title="AYUDA"><span class="glyphicon glyphicon-question-sign"></span> AYUDA</a>
                        </li>
                         
                       
                    <?php
                    if(isset($_SESSION['usuario'])){

                        ?>

                    
                                       
                    
                    
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-pushpin"></span> CUENTA <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <li><a href="camcontra.php"><span class="glyphicon glyphicon-cog"></span> CAMBIAR CONTRASEÑA</a></li>
                            </ul>
                        </li>
                       
                    </ul> 
                    <p class="navbar-text navbar-right"><span class="glyphicon glyphicon-user"></span> USUARIO: <a href="home.php" class="navbar-link"> <?php echo $_SESSION['usuario'] ?> </a> , <a href="cerrar.php" class="dropdown-toggle"><span class="glyphicon glyphicon-off" ></span> CERRAR SESIÓN</a></li>  </p> 

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