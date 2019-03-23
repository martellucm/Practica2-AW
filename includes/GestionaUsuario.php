<?php
    require_once __DIR__.'/Usuario.php';
    class GestionUsuario{
      public static function mostrarWW(){
        $user = Usuario::getWW();
        if($user instanceof Usuario){
          echo '<div><img src="data:image/jpg; base64,'.base64_encode($user->fprincipal()).'" /></div>';
          echo "<div><p>".$user->nombreUsuario()."</p>";
          echo "<p>".$user->ptosTourn()."</p> </div>";
        }
        else{
            echo "<p>No hay un ganador claro</p>";
        }
      }

      public static function mostrarWM(){
        /*Hay que modificarlo por el de month*/
        $user = Usuario::getWW();
        if($user instanceof Usuario){
          echo '<div><img src="data:image/jpg; base64,'.base64_encode($user->fprincipal()).'" />';
          echo "<div><p>".$user->nombreUsuario()."</p>";
          echo "<p>".$user->ptosTourn()."</p> </div>";
        }
        else{
            echo "<p>No hay un ganador claro</p>";
        }
      }
?>
