<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo de Agendamiento - CTB</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #686868;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: #B60007;
            color: white;
            padding: 20px;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .content {
            padding: 20px;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #777;
        }
        .btn-agendar {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>CORPORACIÓN TECNOLÓGICA DE BOGOTÁ - CTB</h1>
        </div>
        <div class="content">
            <h2>Estimado/a {{ $data['nombre'] }},</h2>
            <p>Nos alegra informarte que hemos recibido tu solicitud. Ahora te invitamos 
                a agendar tu entrevista para seguir adelante con el proceso de admisión.</p>
            <p>Por favor, utiliza el siguiente enlace para elegir la fecha y hora 
                que mejor se ajuste a tu disponibilidad.</p>
            <a href="https://ctb.teduca.co/agenda/agenda/" class="btn btn-primary btn-agendar">Agendar Cita</a>
            <p>Si surge alguna duda o necesitas más información, no dudes en escribirnos.
            </p>
            <p>¡Estamos aquí para ayudarte en lo que necesites!</p>
        </div>
        <div class="footer">
            <p>© 2024 Institución de Educación CTB | Todos los derechos reservados</p>
        </div>
    </div>
</body>
</html>