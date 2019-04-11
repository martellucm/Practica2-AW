<?php

namespace es\ucm\fdi\aw;
require_once __DIR__ .'/Usuario.php';

class FormularioLogin extends Form
{

  const HTML5_EMAIL_REGEXP = '^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$';

  public function __construct()
  {
    parent::__construct('formLogin');
  }
  
  protected function generaCamposFormulario ($datos)
  {
    $username = '';
    $password = '';
    if ($datos) {
      $username = isset($datos['username']) ? $datos['username'] : $username;
      /* Similar a la comparación anterior pero con el operador ?? de PHP 7 */
      $password = $datos['password'] ?? $password;
    }

    $camposFormulario=<<<EOF
		<fieldset class = "formulario">
        <legend>Login</legend>
        <div class="grupo-control">
        <label>  👤  </label> <input type="text" name="username" value="$username"required/>
        </div>
        <div class="grupo-control">
        <label>🔒</label> <input type="password" name="password" value="$password"required/>
        </div>
        <div class="grupo-control"><button type="submit" name="login">Entrar</button></div>
		</fieldset>
EOF;
    return $camposFormulario;
  }

  /**
   * Procesa los datos del formulario.
   */
  protected function procesaFormulario($datos)
  {
    $result = array();
    $ok = true;
    $username = $datos['username'] ?? '' ;
    if (!$username) ) {
      $result[] = 'El nombre de usuario no es válido';
      $result[] = $username;
      $ok = false;
    }

    $password = $datos['password'] ?? '' ;
    if ( ! $password ||  mb_strlen($password) < 4 ) {
      $result[] = 'La contraseña no es válida';
      $ok = false;
    }

    if ( $ok ) {
      $user = Usuario::login($username, $password);
      if ( $user ) {
        // SEGURIDAD: Forzamos que se genere una nueva cookie de sesión por si la han capturado antes de hacer login
        session_regenerate_id(true);
        Aplicacion::getSingleton()->login($user);
        $result = \es\ucm\fdi\aw\Aplicacion::getSingleton()->resuelve('/index.php');
      }else {
        $result[] = 'El usuario o la contraseña es incorrecta';
      }
    }
    return $result;
  }
}
