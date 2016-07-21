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
        //the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
    });
</script>

</head>


<body background="<?php echo $_layoutParams['ruta_img']; ?>fondo.jpg" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
    <?php if ($_layoutParams['item'] == 'landing'): ?>
    
    <nav>
    <div class="nav-wrapper blue" style="height: 110px;">
      <a class="brand-logo center"><img src="<?php echo $_layoutParams['ruta_img']; ?>logo.png"></a>
    </div>
  </nav>

    <?php else: ?>

        <nav class="blue" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="<?php echo BASE_URL; ?>" class="brand-logo">
                    <img class="z-depth-1" src="<?php echo $_layoutParams['ruta_img']; ?>logo.png" style="height:111px; background-color: #fff;">
                    <?php //echo APP_NAME; ?>
                </a>
                <ul class="right hide-on-med-and-down">

                    <?php if(isset($_layoutParams['menu'])): ?>
                        <?php if (Session::get('autenticado')): ?>
                            <li><img src="<?php echo $_layoutParams['ruta_img']; ?>avatar.png" alt="" class="circle" style="height:40px; margin-top:12px;"></li>
                        <?php endif ?>

                        <?php for($i = 0; $i < count($_layoutParams['menu']); $i++): ?>

                            <li><a class="<?php echo $_item_style ." ".$_layoutParams['menu'][$i]['class']; ?>" href="<?php echo $_layoutParams['menu'][$i]['enlace']; ?>"><?php  echo $_layoutParams['menu'][$i]['titulo']; ?></a></li>

                        <?php endfor; ?>
                    <?php endif; ?>  
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
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
    <?php endif ?>

    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br><br>
            <noscript><p>Para el correcto funcionamiento debe tener el soporte de javascript habilitado</p></noscript> 

            <div id="modalError" class="modal">
                <div class="modal-content">
                  <h4 align="center" style ="color:#f44336;">Error</h4>
                  <h6 align="center"><?php echo $this->_error; ?></h6>
              </div>
          </div>

          <div id="modalMensaje" class="modal">
            <div class="modal-content">
              <h4 align="center" style ="color:#4caf50;">Felicidades</h4>
              <h6 align="center"><?php echo $this->_mensaje; ?></h6>
          </div>
      </div>

      <?php if(isset($this->_error)): ?>
        <div id="error"><?php //echo $this->_error; ?></div>
        <script>$('#modalError').openModal();</script>
    <?php endif; ?>

    <?php if(isset($this->_mensaje)): ?>
        <div id="mensaje"><?php //echo $this->_mensaje; ?></div>
        <script>$('#modalMensaje').openModal();</script>
    <?php endif; ?>

    <div id="login" class="modal">                
        <form name="form1" method="post" action="<?php echo BASE_URL; ?>login">
            <div class="modal-content">
                <a style = "color:#263238 " class=" modal-action modal-close"><i class="small material-icons right">close</i></a>
                <div class="row">
                    <div class="col s12">
                      <div class="card grey lighten-5 z-depth-0">
                        <div class="card-content black-text">
                            <center><span style="font-size: 45px; font-weight: normal;" class="card-title blue-text">Iniciar sesi&oacute;n</span></center>
                            <form name="form1" method="post" action="">
                                <input type="hidden" value="1" name="enviar" />
                                <div class="row">

                                    <div class="input-field col s12">
                                        <label for="usuario">Usuario</label>
                                        <input type="text" placeholder=" " name="usuario" value="<?php if(isset($this->datos)) echo $this->datos['usuario'];?>">
                                    </div>

                                    <br><br><br><br>

                                    <div class="input-field col s12">
                                        <label for="pass">Contraseña</label>
                                        <input type="password" placeholder=" " name="pass">
                                    </div>

                                    <br><br> <br>
                                    <center>
                                        <input class="waves-effect waves-light btn-large blue" type="submit" value="Ingresar" />
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>

