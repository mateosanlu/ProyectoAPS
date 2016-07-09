<?php

class View
{
    private $_controlador;
    private $_js;
    private $_css;
    
    public function __construct(Request $peticion) {
        $this->_controlador = $peticion->getControlador();
        $this->_js = array();
        $this->_css = array();
    }
    
    public function renderizar($vista, $item = false)
    {   
        $menu = array(
            array(
                'id' => 'perfil',
                'titulo' => Session::get('nombre_usuario'),
                'enlace' => BASE_URL . '#perfil'
                ),
            array(
                'id' => 'tablero',
                'titulo' => 'Tablero',
                'enlace' => 'tablero'
                )
        );

        $formatos = array(
            array(
                'id' => 'ficha_familiar',
                'titulo' => 'Ficha familiar',
                'enlace' => BASE_URL . 'ficha_hogar'
                ),
            array(
                'id' => 'findrisk',
                'titulo' => 'Test FindRisk',
                'enlace' => BASE_URL . 'findrisk'
                ),
            array(
                'id' => 'cancer_mama',
                'titulo' => 'Cancer de mama',
                'enlace' => BASE_URL . 'cancer_mama'
                ),
            array(
                'id' => 'aiepi',
                'titulo' => 'Ficha AIEPI',
                'enlace' => BASE_URL . 'aiepi'
                ),
            array(
                'id' => 'kardex_gestantes',
                'titulo' => 'Kardex de gestantes',
                'enlace' => BASE_URL . 'kardex_gestantes'
                ),
            array(
                'id' => 'demanda_inducida',
                'titulo' => 'Demanda inducida',
                'enlace' => BASE_URL . 'demanda_inducida'
                ),
            array(
                'id' => 'idFirmas',
                'titulo' => 'Firmas',
                'enlace' => BASE_URL . 'firma'
                )
        );
        
        if(Session::get('autenticado')){
            $menu[] = array(
                'id' => 'login',
                'titulo' => 'Salir',
                'enlace' => BASE_URL . 'login/cerrar'
                );
        }else{
            $menu[] = array(
                'id' => 'login',
                'titulo' => 'Iniciar sesión',
                //'enlace' => BASE_URL . 'login',
                'enlace' => '#login',
                'class' => 'modal-trigger'
                );
            
            $menu[] = array(
                'id' => 'registro',
                'titulo' => 'Registro',
                'enlace' => BASE_URL . 'registro'
                );
        }
        
        $js = array();
        $css = array();
        
        if(count($this->_js)){
            $js = $this->_js;
        }

        if(count($this->_css)){
            $css = $this->_css;
        }
        
        $_layoutParams = array(
            'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
            'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
            'ruta_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
            'menu' => $menu,
            'formatos' => $formatos,
            'js' => $js,
            'css' => $css
        );
        
        $rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';
        
        if(is_readable($rutaView)){
            include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
            include_once $rutaView;
            include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
        } 
        else {
            throw new Exception('Error de vista');
        }
    }
    
    public function setJs(array $js)
    {
        if(is_array($js) && count($js)){
            for($i=0; $i < count($js); $i++){
                $this->_js[] = BASE_URL . 'views/' . $this->_controlador . '/js/' . $js[$i] . '.js';
            }
        } else {
            throw new Exception('Error de js');
        }
    }

    public function setCss(array $css)
    {
        if(is_array($css) && count($css)){
            for($i=0; $i < count($css); $i++){
                $this->_css[] = BASE_URL . 'views/' . $this->_controlador . '/css/' . $css[$i] . '.css';
            }
        } else {
            throw new Exception('Error de css');
        }
    }
}

?>
