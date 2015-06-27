    <div class="navbar navbar-custom " role="navigation"> 
            <div class="container-fluid" >
             
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="INDEX.php"><img src="img/crs.ico" width='15 px' alt="">CSSC RESERVATION SYSTEM</a>

                </div>
            
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav"> 

                       <?php 
                       if (isset($_SESSION['tipo'])) 
                        if($_SESSION['tipo']!=1)
                        { 
                        ?>
                        <li>
                        <a href="areas.php" ><span class="glyphicon glyphicon-picture"></span> AREAS</a>
                        </li>
                        <li><a href="repusuario.php"><span class="glyphicon glyphicon-pencil"></span> REPORTS</a></li>

                        
                        
                        <?php
                        } 
                    if(isset($_SESSION['tipo']))
                        if($_SESSION['tipo']==1) {   
                        ?> 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> USER<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="nuevoUsuario.php"><span class="glyphicon glyphicon-plus-sign"></span> NEW USER</a></li>
                                <li><a href="mostrarUsuario.php"><span class="glyphicon glyphicon-list-alt"></span> SHOW USERS</a></li>
                                
                            </ul>
                        </li>                       
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-picture "></span> AREAS<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="areas.php"><span class="glyphicon glyphicon-calendar"></span> AREAS AND SCHEDULE</a></li>
                                <li><a href="inshorario.php"><span class="glyphicon glyphicon-plus"></span> ADD NEW SCHEDULE</a></li>
                                <!--<li><a href=#><span class="glyphicon glyphicon-plus-sign"></span> ADD NEW AREA</a></li>-->
                                <li><a href="repa.php"><span class="glyphicon glyphicon-pencil"></span> REPORTS</a></li>
                                
                            </ul>
                        </li>
                       
                            
                             
                                
                            
                        
                    <?php }
                    ?>
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-flag"></span> LANGUAGE<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="../CRS"><img src ="img/ESP.png" width="30" height="25"> ESPAÑOL</a></li>
                                
                            </ul>
                        </li> 
                        <li>
                          
                         <a target=\"_blank\" href="csscres.pdf" title="Help"><span class="glyphicon glyphicon-question-sign"></span> HELP</a>
                        </li>
                         
                       
                    <?php
                    if(isset($_SESSION['usuario'])){

                        ?>

                    
                                       
                    
                    
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-pushpin"></span> ACCOUNT <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <li><a href="camcontra.php"><span class="glyphicon glyphicon-cog"></span> CHANGE PASSWORD</a></li>
                            </ul>
                        </li>
                       
                    </ul> 
                    <p class="navbar-text navbar-right"><span class="glyphicon glyphicon-user"></span> USER: <a href="home.php" class="navbar-link"> <?php echo $_SESSION['usuario'] ?> </a> , <a href="cerrar.php" class="dropdown-toggle"><span class="glyphicon glyphicon-off" ></span> LOG OUT</a></li>  </p> 

                    <?php

                    }else {?>
                    </ul>
                    <p class="navbar-text navbar-right"><span class="glyphicon glyphicon-user"></span><a href="home.php"> LOG IN</a>
                    
                    </p>
                    <?php }  ?>
                   
                    </div><!--/.nav-collapse <embed src="url_pdf.pdf" width="450" height="450" href="url_pdf.pdf"></embed> -->
                </div>
            </div>
            <?php date_default_timezone_set('America/El_Salvador'); ?>