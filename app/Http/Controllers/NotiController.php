<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
 
use App\Models\User;
 
use Notification;
use App\Notifications\NotiOpTec;
 
class TestController extends Controller
{
 
    public function enviarNotificacion() {
 
        $esquema = User::all();
  
        $notificacion = [
            'titulo' => 'Se agrego un nuevo Producto',
            'contenido' => 'Pie de Manzana'
        ];
  
        Notification::send($esquema, new NotiOpTec($notificacion));
   
        dd('Tarea Realizada !');
    }
 
 
}
?>