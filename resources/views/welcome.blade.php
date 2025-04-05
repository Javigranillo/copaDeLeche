<!DOCTYPE html>
<html lang="en">
<div class="container">
    <h2>Registro</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
Página de Inicio (Carga de Pedido)
Formulario para que el usuario cargue los pedidos de la copa de leche.
HTML con Bootstrap:

html
Copiar
<div class="container">
    <h2>Realizar Pedido de Copa de Leche</h2>
    <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="school_id" class="form-label">ID de Escuela</label>
            <input type="text" class="form-control" id="school_id" name="school_id" required>
        </div>
        <div class="mb-3">
            <label for="students_count" class="form-label">Cantidad de Alumnos</label>
            <input type="number" class="form-control" id="students_count" name="students_count" required>
        </div>
        <div class="mb-3">
            <label for="request" class="form-label">Descripción del Pedido</label>
            <textarea class="form-control" id="request" name="request" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="attachment" class="form-label">Adjuntar Archivo</label>
            <input type="file" class="form-control" id="attachment" name="attachment">
        </div>
        <button type="submit" class="btn btn-success">Enviar Pedido</button>
    </form>
</div>
Página de Administración (Gestión de Pedidos)
Vista de lista de pedidos, con botones para cambiar el estado de cada uno (Aprobar, Rechazar, Revisar).
HTML con Bootstrap:

html
Copiar
<div class="container">
    <h2>Pedidos Pendientes</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID Escuela</th>
                <th>Cantidad de Alumnos</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->school_id }}</td>
                <td>{{ $order->students_count }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <form action="{{ route('orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" name="status" value="aprobado" class="btn btn-success">Aprobar</button>
                        <button type="submit" name="status" value="desaprobado" class="btn btn-danger">Rechazar</button>
                        <button type="submit" name="status" value="en revision" class="btn btn-warning">Revisar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
Enviar correos electrónicos:

Laravel facilita el envío de correos con el servicio Mail. Vamos a configurar un correo que se enviará cuando el estado del pedido cambie.
En tu controlador, puedes hacerlo así:

php
Copiar
use Illuminate\Support\Facades\Mail;

public function updateStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $order->status = $request->status;
    $order->save();

    // Enviar correo al usuario
    $user = User::find($order->user_id);
    Mail::to($user->email)->send(new OrderStatusMail($order));

    return redirect()->route('orders.index');
}
