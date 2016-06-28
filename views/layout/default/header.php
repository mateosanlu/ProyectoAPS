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

        
</head>

<body>
    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"><?php echo APP_NAME; ?></a>
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

                    <li><a class="<?php echo $_item_style; ?>" href="<?php echo $_layoutParams['menu'][$i]['enlace']; ?>"><?php  echo $_layoutParams['menu'][$i]['titulo']; ?></a></li>

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


                