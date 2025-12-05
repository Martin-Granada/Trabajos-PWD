#!/usr/bin/env php
<?php
//Ejecutar desde la línea de comandos de PHP. 
//Ejemplo: "C:\xampp\php\php.exe" -q C:\xampp\daemons\sala_chat\SalaChatServer.php
//Este archivo debe estar fuera de las carpetas HTTP públicas pues correrá como un servicio/daemon.

require_once('websockets.php');

class SalaChatServer extends WebSocketServer {  
  protected function process ($user, $message) {
    echo 'user sent: '.$message.PHP_EOL;
    
    // Si el mensaje ya viene con formato "ALIAS: mensaje", reenviarlo tal cual
    // Si viene como JSON, procesarlo
    $decoded = json_decode($message, true);
    
    if (json_last_error() === JSON_ERROR_NONE && isset($decoded['type'])) {
      // Es un mensaje JSON estructurado
      if ($decoded['type'] === 'message' && isset($decoded['alias']) && isset($decoded['message'])) {
        // Formatear mensaje con alias para broadcast
        $formattedMessage = $decoded['alias'] . ': ' . $decoded['message'];
        // Reenviar a todos EXCEPTO al usuario que lo envió
        foreach ($this->users as $currentUser) {
          if($currentUser !== $user) {
            $this->send($currentUser, $formattedMessage);
          }
        }
      }
    } else {
      // Mensaje de texto plano, reenviar a todos EXCEPTO al usuario que lo envió (broadcast)
      foreach ($this->users as $currentUser) {
        if($currentUser !== $user) {
          $this->send($currentUser, $message);
        }
      }
    }
  }
  
  protected function connected ($user) {
    echo 'user connected (ID: ' . $user->id . ')'.PHP_EOL;
    
    // Enviar mensaje de bienvenida al usuario que se conecta
    $welcomeMessage = json_encode(array(
      'type' => 'system',
      'message' => 'Bienvenido',
      'status' => 1
    ));
    $this->send($user, $welcomeMessage);
    
    // Notificar a otros usuarios que alguien se ha unido
    $joinMessage = json_encode(array(
      'type' => 'system',
      'message' => 'Usuario se ha unido al chat',
      'usersCount' => count($this->users)
    ));
    
    foreach ($this->users as $currentUser) {
      if($currentUser !== $user) {
        $this->send($currentUser, $joinMessage);
      }
    }
  }
  
  protected function closed ($user) {
    echo 'user disconnected (ID: ' . $user->id . ')'.PHP_EOL;
    
    // Notificar a los usuarios restantes que alguien se desconectó
    // (count($this->users) - 1 porque aún no se ha eliminado de la lista)
    $remainingUsers = count($this->users) - 1;
    $leaveMessage = json_encode(array(
      'type' => 'system',
      'message' => 'Usuario desconectado',
      'usersCount' => $remainingUsers
    ));
    
    foreach ($this->users as $currentUser) {
      if($currentUser !== $user) {
        $this->send($currentUser, $leaveMessage);
      }
    }
  }
}

/*
El primer parámetro es la IP donde escuchará las conexiones:
  127.0.0.1 -> aceptar conexiones solo de localhost
  w.x.y.z (valid local IP) -> aceptar conexiones solo de LAN, si la dirección (interfaz) no pertenece a la máquina devolverá un error
  0.0.0.0 -> aceptar conexiones en cualquier interfaz
*/
$chatServer = new SalaChatServer("localhost","9000");

try {
  $chatServer->run();
}
catch (Exception $e) {
  $chatServer->stdout($e->getMessage());
}
