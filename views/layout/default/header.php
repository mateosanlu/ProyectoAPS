<!DOCTYPE html>
<html lang="es">
<head>
    <title><?php if(isset($this->titulo)) echo $this->titulo; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <link href="<?php echo $_layoutParams['ruta_css']; ?>materialize.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_layoutParams['ruta_css']; ?>materialicons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_layoutParams['ruta_css']; ?>estilos.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo BASE_URL; ?>public/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>public/js/materialize.min.js" type="text/javascript"></script>

    <?php if(isset($_layoutParams['js']) && count($_layoutParams['js'])): ?>
    <?php for($i=0; $i < count($_layoutParams['js']); $i++): ?>
    
    <script src="<?php echo $_layoutParams['js'][$i] ?>" type="text/javascript"></script>
    
    <?php endfor; ?>
    <?php endif; ?>

    <?php if(isset($_layoutParams['css']) && count($_layoutParams['css'])): ?>
    <?php for($i=0; $i < count($_layoutParams['css']); $i++): ?>
    
    <script src="<?php echo $_layoutParams['css'][$i] ?>" type="text/javascript"></script>
    
    <?php endfor; ?>
    <?php endif; ?>

    <script type="text/javascript">
        $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
      });
    </script>

</head>

<body>
    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="<?php echo BASE_URL; ?>" class="brand-logo">
                <img class="z-depth-1" src="<?php echo $_layoutParams['ruta_img']; ?>logo.jpg" style="height:111px;">
                <?php //echo APP_NAME; ?>
            </a>
            <ul class="right hide-on-med-and-down">
                <?php if(isset($_layoutParams['menu'])): ?>
                        <?php for($i = 0; $i < count($_layoutParams['menu']); $i++): ?>
                        <?php 

                        if($item && $_layoutParams['menu'][$i]['id'] == $item ){ 
                        $_item_style = 'current'; 
                        } else {
                        $_item_style = '';
                        }

                        ?>

                        <li><a class="<?php echo $_item_style ." ".$_layoutParams['menu'][$i]['class']; ?>" href="<?php echo $_layoutParams['menu'][$i]['enlace']; ?>"><?php  echo $_layoutParams['menu'][$i]['titulo']; ?></a></li>

                        <?php endfor; ?>
                    <?php endif; ?>
                <li><a href="">sass <span class="new badge">4</span></a></li>
            </ul>
          
          <ul id="nav-mobile" class="side-nav">
            <?php if(isset($_layoutParams['menu'])): ?>
                    <?php for($i = 0; $i < count($_layoutParams['menu']); $i++): ?>
                    <?php 

                    if($item && $_layoutParams['menu'][$i]['id'] == $item ){ 
                    $_item_style = 'current'; 
                    } else {
                    $_item_style = '';
                    }

                    ?>

                    <li><a class="<?php echo $_item_style; ?>" href="<?php echo $_layoutParams['menu'][$i]['enlace']; ?>"><?php  echo $_layoutParams['menu'][$i]['titulo']; ?></a></li>

                    <?php endfor; ?>
                <?php endif; ?>
              <li><a href="">sass <span class="new badge">4</span></a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    

    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br><br>
            <noscript><p>Para el correcto funcionamiento debe tener el soporte de javascript habilitado</p></noscript> 
            <?php if(isset($this->_error)): ?>
            <div id="error"><?php echo $this->_error; ?></div>
            <?php endif; ?>

             <?php if(isset($this->_mensaje)): ?>
            <div id="mensaje"><?php echo $this->_mensaje; ?></div>
            <?php endif; ?>

            <div id="login" class="modal">

                
                <form name="form1" method="post" action="<?php echo BASE_URL; ?>login">
                    <div class="modal-content">
                        <div class="row">
                            <h2>Iniciar Sesi&oacute;n</h2>
                            <input type="hidden" value="1" name="enviar" />
                            <div class="row">
                                <div class="input-field col s6">
                                  <i class="material-icons prefix">account_circle</i>
                                  <input id="icon_prefix" type="text" class="validate" name="usuario" value="<?php if(isset($this->datos)) echo $this->datos['usuario']; ?>">
                                  <label for="icon_prefix">Usuario</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                  <i class="material-icons prefix">lock</i>
                                  <input id="icon_prefix" type="password" name="pass" class="validate">
                                  <label for="icon_prefix">Contraseña</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
                        <input class="waves-effect waves-light btn" type="submit" value="Ingresar" />
                    </div>
                 </form>
            </div>

   