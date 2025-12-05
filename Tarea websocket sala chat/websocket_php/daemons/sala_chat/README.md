// ✅ GUÍA DE OBJETIVOS QUE DEBE CUMPLIR TU PÁGINA (TP WebSocket)
🟦 1. Conexión WebSocket

La página debe:

Conectarse correctamente al servidor WebSocket (ej. ws://localhost:9000).

Realizar el handshake y mostrar:

“WebSocket – Estatus 0” → antes de conectarse.

“Bienvenido – Estatus 1” → conectado.

Detectar errores o desconexiones.

📌 Esto valida que entendés el protocolo WebSocket explicado en el marco teórico.

🟦 2. Estados de la conexión (Feedback al usuario)

Debe mostrar claramente:

Estado conectado

Estado desconectado

Estado reconectando

El usuario siempre debe saber si la conexión está activa.

📌 Lo pide el TP y es parte fundamental del cliente WebSocket.

🟦 3. Alias / Nickname de usuario

La página debe permitir:

Que cada usuario escriba un alias (PEPE, MARIETTA, etc.)

Que ese alias aparezca junto al mensaje enviado o recibido:

PEPE: Hola amigos !!!
MARIETTA: Hola Pepin! Cómo andas???


📌 Esto demuestra manejo de identidad por cliente (requisito del TP).

🟦 4. Envío de mensajes

Debe permitir enviar mensajes:

Desde un campo de texto.

Con un botón Enviar.

Incluyendo el alias del usuario en el mismo mensaje o en el JSON.

📌 El cliente debe formar el mensaje y mandarlo via WebSocket.

🟦 5. Recepción de mensajes en tiempo real

Debe:

Mostrar al instante todos los mensajes recibidos del servidor.

Mostrar mensajes de otros clientes conectados.

Mostrar mensajes del sistema (Bienvenido, Usuario conectado, etc.).

📌 El chat debe ser full-duplex, como dice el marco teórico.

🟦 6. Área de conversación

Debe tener un panel/textarea donde:

Se visualicen todos los mensajes.

Se mantenga el historial mientras la pestaña está abierta.

Se distingan mensajes del sistema, mensajes propios y de otros.

📌 Es parte del cliente solicitado en el TP.

🟦 7. Botón “Salir / Desconectar”

Debe:

Cerrar la conexión WebSocket.

Mostrar un estado de desconexión.

Evitar que se envíen mensajes mientras esté desconectado.

📌 Se evalúa la gestión correcta del evento ws.close().

🟦 8. Botón “Reconectar”

Debe:

Permitir reconectar sin recargar la página.

Reestablecer el estado.

Continuar mostrando el chat.

📌 Valida el manejo del ciclo de vida de una conexión WebSocket.

🟦 9. Multiusuario real (requiere varias pestañas)

Esto ya lo mostraste con PEPE y MARIETTA.

Debe cumplirse:

Que si abro la página en dos pestañas, ambos usuarios se ven.

Que los mensajes se retransmiten a todos los clientes.

📌 Esto demuestra que el servidor PHP hace broadcast, como debe.

🟦 10. Mensajes del sistema

El servidor debe enviar mensajes como:

“Bienvenido”

“Usuario X se ha unido”

“Usuario desconectado”

Estatus de conexión

📌 Esto aparece en tu captura y es parte del TP.

🟦 11. Funcionamiento del servidor WebSocket

Aunque la entrega principal es la página, el TP exige que:

El servidor WebSocket PHP esté funcionando.

Acepte múltiples conexiones.

Reciba mensajes.

Haga broadcast a todos los clientes.

📌 Esto está explicado en websocket.pdf y debe reflejarse en la demo.

🟩 CHECKLIST FINAL (para que confirmes si ya cumpliste todo)
Objetivo	¿Cumplido?
Conexión WebSocket estable	⬜
Estados de conexión visibles	⬜
Alias por usuario	⬜
Enviar mensajes	⬜
Recibir mensajes en tiempo real	⬜
Área de chat con historial	⬜
Botón Enviar	⬜
Botón Salir	⬜
Botón Reconectar	⬜
Mensajes del sistema	⬜
Broadcast a múltiples clientes	⬜