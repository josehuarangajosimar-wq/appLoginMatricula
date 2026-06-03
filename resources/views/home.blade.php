@php
    // ═════════════════════════════════════════════════════════════════════════
    // ETI SENATI - SUBSISTEMA DE PERSISTENCIA Y AMBIENTE DE CONTROL OPERACIONAL
    // Inicialización preventiva con los 10 registros exactos mapeados del script MariaDB
    // ═════════════════════════════════════════════════════════════════════════
    if (!isset($alumnos) || blank($alumnos)) {
        $alumnos = collect([
            (object)['id_alumno' => 1, 'nombre' => 'Jose', 'apellidos' => 'Huaranga', 'fecha_nacimiento' => '2005-04-12', 'dni' => '71234561', 'direccion' => 'Comas, Lima', 'telefono' => '912345671', 'email' => 'jose@senati.pe', 'estado_matricula' => 'matriculado', 'genero' => 'Masculino', 'tipo_sangre' => 'O+'],
            (object)['id_alumno' => 2, 'nombre' => 'Daniel', 'apellidos' => 'Puccio', 'fecha_nacimiento' => '2004-09-15', 'dni' => '71234562', 'direccion' => 'Puente Piedra', 'telefono' => '912345672', 'email' => 'daniel@senati.pe', 'estado_matricula' => 'matriculado', 'genero' => 'Masculino', 'tipo_sangre' => 'A+'],
            (object)['id_alumno' => 3, 'nombre' => 'Mario', 'apellidos' => 'Perez', 'fecha_nacimiento' => '2005-11-20', 'dni' => '71234563', 'direccion' => 'Los Olivos', 'telefono' => '912345673', 'email' => 'mario@senati.pe', 'estado_matricula' => 'matriculado', 'genero' => 'Masculino', 'tipo_sangre' => 'O-'],
            (object)['id_alumno' => 4, 'nombre' => 'Ana', 'apellidos' => 'Gomez', 'fecha_nacimiento' => '2004-01-30', 'dni' => '71234564', 'direccion' => 'San Martin', 'telefono' => '912345674', 'email' => 'ana@senati.pe', 'estado_matricula' => 'matriculado', 'genero' => 'Femenino', 'tipo_sangre' => 'B+'],
            (object)['id_alumno' => 5, 'nombre' => 'Luis', 'apellidos' => 'Torres', 'fecha_nacimiento' => '2003-07-14', 'dni' => '71234565', 'direccion' => 'Carabayllo', 'telefono' => '912345675', 'email' => 'luis@senati.pe', 'estado_matricula' => 'inactivo', 'genero' => 'Masculino', 'tipo_sangre' => 'O+'],
            (object)['id_alumno' => 6, 'nombre' => 'Carlos', 'apellidos' => 'Mendoza', 'fecha_nacimiento' => '2005-02-10', 'dni' => '71234566', 'direccion' => 'Lima Centro', 'telefono' => '912345676', 'email' => 'carlos@senati.pe', 'estado_matricula' => 'matriculado', 'genero' => 'Masculino', 'tipo_sangre' => 'A-'],
            (object)['id_alumno' => 7, 'nombre' => 'Sofia', 'apellidos' => 'Castro', 'fecha_nacimiento' => '2004-06-22', 'dni' => '71234567', 'direccion' => 'Independencia', 'telefono' => '912345677', 'email' => 'sofia@senati.pe', 'estado_matricula' => 'matriculado', 'genero' => 'Femenino', 'tipo_sangre' => 'O+'],
            (object)['id_alumno' => 8, 'nombre' => 'Mateo', 'apellidos' => 'Quispe', 'fecha_nacimiento' => '2005-08-05', 'dni' => '71234568', 'direccion' => 'Comas', 'telefono' => '912345678', 'email' => 'mateo@senati.pe', 'estado_matricula' => 'matriculado', 'genero' => 'Masculino', 'tipo_sangre' => 'AB+'],
            (object)['id_alumno' => 9, 'nombre' => 'Valeria', 'apellidos' => 'Chavez', 'fecha_nacimiento' => '2004-12-12', 'dni' => '71234569', 'direccion' => 'San Miguel', 'telefono' => '912345679', 'email' => 'valeria@senati.pe', 'estado_matricula' => 'matriculado', 'genero' => 'Femenino', 'tipo_sangre' => 'O-'],
            (object)['id_alumno' => 10, 'nombre' => 'Kevin', 'apellidos' => 'Flores', 'fecha_nacimiento' => '2003-10-09', 'dni' => '71234570', 'direccion' => 'Callao', 'telefono' => '912345680', 'email' => 'kevin@senati.pe', 'estado_matricula' => 'matriculado', 'genero' => 'Masculino', 'tipo_sangre' => 'B-']
        ]);
    }

    if (!isset($cursos) || blank($cursos)) {
        $cursos = collect([
            (object)['id_curso' => 1, 'nombre_curso' => 'Backend Developer Web', 'codigo_curso' => 'INF-301', 'creditos' => 5, 'descripcion' => 'Desarrollo en Laravel e integracion de APIs'],
            (object)['id_curso' => 2, 'nombre_curso' => 'Base de Datos II', 'codigo_curso' => 'INF-302', 'creditos' => 4, 'descripcion' => 'Modelado y optimizacion en MySQL'],
            (object)['id_curso' => 3, 'nombre_curso' => 'Frontend Essentials', 'codigo_curso' => 'INF-303', 'creditos' => 3, 'descripcion' => 'Interfaces con Tailwind y JavaScript'],
            (object)['id_curso' => 4, 'nombre_curso' => 'Cloud Computing', 'codigo_curso' => 'INF-304', 'creditos' => 4, 'descripcion' => 'Despliegue de aplicaciones en la nube'],
            (object)['id_curso' => 5, 'nombre_curso' => 'Ingenieria de Software', 'codigo_curso' => 'INF-305', 'creditos' => 4, 'descripcion' => 'Metodologias Scrum'],
            (object)['id_curso' => 6, 'nombre_curso' => 'Seguridad Informatica', 'codigo_curso' => 'INF-306', 'creditos' => 3, 'descripcion' => 'Cifrado y proteccion de datos'],
            (object)['id_curso' => 7, 'nombre_curso' => 'Mobile Apps', 'codigo_curso' => 'INF-307', 'creditos' => 4, 'descripcion' => 'Desarrollo para Android y iOS'],
            (object)['id_curso' => 8, 'nombre_curso' => 'Inteligencia Artificial', 'codigo_curso' => 'INF-308', 'creditos' => 5, 'descripcion' => 'Modelos fundacionales y prompts'],
            (object)['id_curso' => 9, 'nombre_curso' => 'Arquitectura Web', 'codigo_curso' => 'INF-309', 'creditos' => 3, 'descripcion' => 'Microservicios y patrones de diseño'],
            (object)['id_curso' => 10, 'nombre_curso' => 'Gestion de Proyectos IT', 'codigo_curso' => 'INF-310', 'creditos' => 3, 'descripcion' => 'Administracion de recursos tecnologicos']
        ]);
    }

    if (!isset($profesores) || blank($profesores)) {
        $profesores = collect([
            (object)['id_profesor' => 1, 'nombre' => 'Giancarlos', 'apellidos' => 'Barboza N.', 'especialidad' => 'Backend Developer & PHP Architect'],
            (object)['id_profesor' => 2, 'nombre' => 'Walter', 'apellidos' => 'Cura', 'especialidad' => 'Database Administrator'],
            (object)['id_profesor' => 3, 'nombre' => 'Anibal', 'apellidos' => 'Paredes', 'especialidad' => 'Frontend Engineer'],
            (object)['id_profesor' => 4, 'nombre' => 'Roxana', 'apellidos' => 'Alva', 'especialidad' => 'Cloud Solutions Architect'],
            (object)['id_profesor' => 5, 'nombre' => 'Pedro', 'apellidos' => 'Infante', 'especialidad' => 'Cybersecurity Specialist'],
            (object)['id_profesor' => 6, 'nombre' => 'Juana', 'apellidos' => 'Azurduy', 'especialidad' => 'Scrum Master'],
            (object)['id_profesor' => 7, 'nombre' => 'Miguel', 'apellidos' => 'Grau', 'especialidad' => 'Mobile Developer'],
            (object)['id_profesor' => 8, 'nombre' => 'Ricardo', 'apellidos' => 'Palma', 'especialidad' => 'Systems Analyst'],
            (object)['id_profesor' => 9, 'nombre' => 'Cesar', 'apellidos' => 'Vallejo', 'especialidad' => 'AI Specialist'],
            (object)['id_profesor' => 10, 'nombre' => 'Abraham', 'apellidos' => 'Valdelomar', 'especialidad' => 'IT Project Manager']
        ]);
    }

    if (!isset($horarios) || blank($horarios)) {
        $horarios = collect([
            (object)['id_horario' => 1, 'id_curso' => 1, 'nombre_curso' => 'Backend Developer Web', 'id_profesor' => 1, 'profesor_full' => 'Giancarlos Barboza N.', 'dia_semana' => 'Lunes', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'id_aula' => 'Aula 101'],
            (object)['id_horario' => 2, 'id_curso' => 2, 'nombre_curso' => 'Base de Datos II', 'id_profesor' => 2, 'profesor_full' => 'Walter Cura', 'dia_semana' => 'Martes', 'hora_inicio' => '14:00:00', 'hora_fin' => '18:00:00', 'id_aula' => 'Lab B'],
            (object)['id_horario' => 3, 'id_curso' => 3, 'nombre_curso' => 'Frontend Essentials', 'id_profesor' => 3, 'profesor_full' => 'Anibal Paredes', 'dia_semana' => 'Miercoles', 'hora_inicio' => '08:00:00', 'hora_fin' => '11:00:00', 'id_aula' => 'Aula 102'],
            (object)['id_horario' => 4, 'id_curso' => 4, 'nombre_curso' => 'Cloud Computing', 'id_profesor' => 4, 'profesor_full' => 'Roxana Alva', 'dia_semana' => 'Jueves', 'hora_inicio' => '11:00:00', 'hora_fin' => '14:00:00', 'id_aula' => 'Lab Virtual'],
            (object)['id_horario' => 5, 'id_curso' => 5, 'nombre_curso' => 'Ingenieria de Software', 'id_profesor' => 5, 'profesor_full' => 'Pedro Infante', 'dia_semana' => 'Viernes', 'hora_inicio' => '09:00:00', 'hora_fin' => '13:00:00', 'id_aula' => 'Aula 105'],
            (object)['id_horario' => 6, 'id_curso' => 6, 'nombre_curso' => 'Seguridad Informatica', 'id_profesor' => 6, 'profesor_full' => 'Juana Azurduy', 'dia_semana' => 'Lunes', 'hora_inicio' => '14:00:00', 'hora_fin' => '17:00:00', 'id_aula' => 'Lab C'],
            (object)['id_horario' => 7, 'id_curso' => 7, 'nombre_curso' => 'Mobile Apps', 'id_profesor' => 7, 'profesor_full' => 'Miguel Grau', 'dia_semana' => 'Martes', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'id_aula' => 'Lab A'],
            (object)['id_horario' => 8, 'id_curso' => 8, 'nombre_curso' => 'Inteligencia Artificial', 'id_profesor' => 8, 'profesor_full' => 'Ricardo Palma', 'dia_semana' => 'Miercoles', 'hora_inicio' => '15:00:00', 'hora_fin' => '19:00:00', 'id_aula' => 'Lab AI'],
            (object)['id_horario' => 9, 'id_curso' => 9, 'nombre_curso' => 'Arquitectura Web', 'id_profesor' => 9, 'profesor_full' => 'Cesar Vallejo', 'dia_semana' => 'Jueves', 'hora_inicio' => '08:00:00', 'hora_fin' => '11:00:00', 'id_aula' => 'Aula 204'],
            (object)['id_horario' => 10, 'id_curso' => 10, 'nombre_curso' => 'Gestion de Proyectos IT', 'id_profesor' => 10, 'profesor_full' => 'Abraham Valdelomar', 'dia_semana' => 'Viernes', 'hora_inicio' => '14:00:00', 'hora_fin' => '17:00:00', 'id_aula' => 'Aula 205']
        ]);
    }

    if (!isset($matriculas) || blank($matriculas)) {
        $matriculas = collect([
            (object)['id_matricula' => 1, 'alumno_full' => 'Jose Huaranga', 'curso_full' => 'Backend Developer Web', 'profesor_full' => 'Giancarlos Barboza N.', 'horario_full' => 'Lunes 08:00-12:00', 'semestre' => '2026-I', 'fecha_matricula' => '2026-03-01', 'id_alumno' => 1, 'id_curso' => 1, 'id_profesor' => 1, 'id_horario' => 1, 'nota_final' => 18.50, 'estado' => 'aprobado'],
            (object)['id_matricula' => 2, 'alumno_full' => 'Daniel Puccio', 'curso_full' => 'Base de Datos II', 'profesor_full' => 'Walter Cura', 'horario_full' => 'Martes 14:00-18:00', 'semestre' => '2026-I', 'fecha_matricula' => '2026-03-02', 'id_alumno' => 2, 'id_curso' => 2, 'id_profesor' => 2, 'id_horario' => 2, 'nota_final' => 12.00, 'estado' => 'cursando'],
            (object)['id_matricula' => 3, 'alumno_full' => 'Mario Perez', 'curso_full' => 'Frontend Essentials', 'profesor_full' => 'Anibal Paredes', 'horario_full' => 'Miercoles 08:00-11:00', 'semestre' => '2026-I', 'fecha_matricula' => '2026-03-01', 'id_alumno' => 3, 'id_curso' => 3, 'id_profesor' => 3, 'id_horario' => 3, 'nota_final' => 5.00, 'estado' => 'reprobado'],
            (object)['id_matricula' => 4, 'alumno_full' => 'Ana Gomez', 'curso_full' => 'Cloud Computing', 'profesor_full' => 'Roxana Alva', 'horario_full' => 'Jueves 11:00-14:00', 'semestre' => '2026-I', 'fecha_matricula' => '2026-03-04', 'id_alumno' => 4, 'id_curso' => 4, 'id_profesor' => 4, 'id_horario' => 4, 'nota_final' => 16.00, 'estado' => 'aprobado'],
            (object)['id_matricula' => 5, 'alumno_full' => 'Luis Torres', 'curso_full' => 'Ingenieria de Software', 'profesor_full' => 'Pedro Infante', 'horario_full' => 'Viernes 09:00-13:00', 'semestre' => '2026-I', 'fecha_matricula' => '2026-03-05', 'id_alumno' => 5, 'id_curso' => 5, 'id_profesor' => 5, 'id_horario' => 5, 'nota_final' => 14.00, 'estado' => 'cursando'],
            (object)['id_matricula' => 6, 'alumno_full' => 'Carlos Mendoza', 'curso_full' => 'Seguridad Informatica', 'profesor_full' => 'Juana Azurduy', 'horario_full' => 'Lunes 14:00-17:00', 'semestre' => '2026-I', 'fecha_matricula' => '2026-03-01', 'id_alumno' => 6, 'id_curso' => 6, 'id_profesor' => 6, 'id_horario' => 6, 'nota_final' => 11.50, 'estado' => 'cursando'],
            (object)['id_matricula' => 7, 'alumno_full' => 'Sofia Castro', 'curso_full' => 'Mobile Apps', 'profesor_full' => 'Miguel Grau', 'horario_full' => 'Martes 08:00-12:00', 'semestre' => '2026-I', 'fecha_matricula' => '2026-03-02', 'id_alumno' => 7, 'id_curso' => 7, 'id_profesor' => 7, 'id_horario' => 7, 'nota_final' => 19.00, 'estado' => 'aprobado'],
            (object)['id_matricula' => 8, 'alumno_full' => 'Mateo Quispe', 'curso_full' => 'Inteligencia Artificial', 'profesor_full' => 'Ricardo Palma', 'horario_full' => 'Miercoles 15:00-19:00', 'semestre' => '2026-I', 'fecha_matricula' => '2026-03-03', 'id_alumno' => 8, 'id_curso' => 8, 'id_profesor' => 8, 'id_horario' => 8, 'nota_final' => 15.20, 'estado' => 'cursando'],
            (object)['id_matricula' => 9, 'alumno_full' => 'Valeria Chavez', 'curso_full' => 'Arquitectura Web', 'profesor_full' => 'Cesar Vallejo', 'horario_full' => 'Jueves 08:00-11:00', 'semestre' => '2026-I', 'fecha_matricula' => '2026-03-04', 'id_alumno' => 9, 'id_curso' => 9, 'id_profesor' => 9, 'id_horario' => 9, 'nota_final' => 13.80, 'estado' => 'cursando'],
            (object)['id_matricula' => 10, 'alumno_full' => 'Kevin Flores', 'curso_full' => 'Gestion de Proyectos IT', 'profesor_full' => 'Abraham Valdelomar', 'horario_full' => 'Viernes 14:00-17:00', 'semestre' => '2026-I', 'fecha_matricula' => '2026-03-05', 'id_alumno' => 10, 'id_curso' => 10, 'id_profesor' => 10, 'id_horario' => 10, 'nota_final' => 17.00, 'estado' => 'aprobado']
        ]);
    }
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ETI SENATI | Centro de Comando Operacional C3</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700;800;900&family=Inter:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* ═════════════════════════════════════════════════════════════════════════
           VARIABLES NATIVAS Y CONFIGURACIÓN CROMÁTICA FORENSE
        ═════════════════════════════════════════════════════════════════════════ */
        :root {
            --bg-0: #040102;
            --bg-1: #090305;
            --bg-2: #120407;
            --panel: rgba(18, 5, 9, 0.88);
            --panel-strong: rgba(26, 7, 12, 0.99);
            --stroke: rgba(255, 0, 60, 0.24);
            --stroke-strong: rgba(255, 0, 60, 0.55);
            --text: #fff4f6;
            --muted: #cfaeb3;
            --primary: #ff003c;
            --primary-2: #ff4d73;
            --danger: #ff1a40;
            --warning: #ffaa00;
            --success: #00ff66;
            --shadow: 0 25px 80px rgba(0, 0, 0, 0.8);
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            color: var(--text);
            background: 
                radial-gradient(circle at 12% 15%, rgba(255, 0, 60, 0.24), transparent 30%),
                radial-gradient(circle at 88% 22%, rgba(255, 77, 115, 0.16), transparent 35%),
                radial-gradient(circle at 50% 100%, rgba(255, 0, 60, 0.15), transparent 45%),
                linear-gradient(180deg, var(--bg-1), var(--bg-0));
            overflow-x: hidden;
        }

        .font-display { font-family: 'Barlow Condensed', sans-serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }
        .glass { background: var(--panel); backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px); border: 1px solid var(--stroke); box-shadow: var(--shadow); }
        .glass-strong { background: var(--panel-strong); backdrop-filter: blur(28px); -webkit-backdrop-filter: blur(28px); border: 1px solid var(--stroke-strong); box-shadow: var(--shadow); }
        
        .row-hover { transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1); }
        .row-hover:hover { background: rgba(255, 0, 60, 0.08) !important; transform: translateX(6px); box-shadow: inset 4px 0 0 var(--primary); }

        .title-line { position: relative; padding-left: 20px; }
        .title-line::before { content: ""; position: absolute; left: 0; top: 6px; width: 5px; height: 32px; border-radius: 4px; background: linear-gradient(180deg, var(--primary), var(--primary-2)); box-shadow: 0 0 20px var(--primary); }

        .cyber-grid { position: fixed; inset: 0; background-image: linear-gradient(rgba(255, 0, 60, 0.02) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 0, 60, 0.02) 1px, transparent 1px); background-size: 40px 40px; pointer-events: none; z-index: 1; opacity: 0.7; }
        
        .hud-badge { display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px; font-size: 10px; font-weight: 900; letter-spacing: 1px; text-transform: uppercase; border: 1px solid transparent; border-radius: 20px; }
        .hud-badge-success { background: rgba(0, 255, 102, 0.1); color: #66ff99; border-color: rgba(0, 255, 102, 0.35); text-shadow: 0 0 8px rgba(0,255,102,0.4); }
        .hud-badge-danger { background: rgba(255, 26, 64, 0.1); color: #ff6680; border-color: rgba(255, 26, 64, 0.35); text-shadow: 0 0 8px rgba(255,26,64,0.4); }
        .hud-badge-warning { background: rgba(255, 170, 0, 0.1); color: #ffcc66; border-color: rgba(255, 170, 0, 0.35); }
        .hud-badge-info { background: rgba(0, 153, 255, 0.1); color: #66c2ff; border-color: rgba(0, 153, 255, 0.35); }

        .sidebar-btn { transition: all 0.25s ease; border-left: 4px solid transparent; }
        .sidebar-btn.active { background: rgba(255,0,60,0.15); border-left-color: var(--primary); color: #fff; text-shadow: 0 0 10px var(--primary); box-shadow: inset 10px 0 20px rgba(255,0,60,0.05); }
        .sidebar-btn:hover:not(.active) { background: rgba(255,0,60,0.05); border-left-color: rgba(255,0,60,0.4); padding-left: 1.75rem; }

        .input-cyber { width: 100%; border: 1px solid rgba(255, 0, 60, 0.25); background: rgba(0, 0, 0, 0.6); border-radius: 12px; padding: 12px 16px; font-size: 13px; color: #fff; outline: none; transition: all 0.25s; }
        .input-cyber:focus { border-color: var(--primary); box-shadow: 0 0 15px rgba(255,0,60,0.35); background: rgba(20, 4, 8, 0.9); }

        .table-head { background: linear-gradient(180deg, rgba(45, 12, 19, 0.98), rgba(30, 9, 15, 0.98)); }
        .section-divider { background: linear-gradient(90deg, rgba(255, 47, 92, 0.3), rgba(255, 47, 92, 0.05), transparent); height: 1px; }

        .metric-glow { box-shadow: 0 0 25px rgba(255, 0, 60, 0.1); transition: all 0.3s ease; }
        .metric-glow:hover { box-shadow: 0 0 35px rgba(255, 0, 60, 0.25); transform: translateY(-2px); }

        .modal-overlay { position: fixed; inset: 0; display: none; align-items: center; justify-content: center; background: rgba(4, 1, 2, 0.85); z-index: 70; padding: 24px; backdrop-filter: blur(8px); }
        .modal-overlay.active { display: flex; }
        .modal-card { width: min(100%, 780px); max-height: calc(100vh - 48px); overflow-y: auto; border-radius: 24px; background: rgba(24, 6, 10, 0.99); box-shadow: 0 30px 100px rgba(0,0,0,0.8); border: 1px solid var(--stroke-strong); animation: modalIn 0.22s cubic-bezier(0.16, 1, 0.3, 1); }
        .modal-card.small { width: min(100%, 560px); }
        @keyframes modalIn { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }

        .kicker { font-size: 10px; font-weight: 900; letter-spacing: 0.25em; text-transform: uppercase; }
        .label-field { display: block; font-size: 11px; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; color: rgba(255, 255, 255, 0.65); margin-bottom: 8px; }

        /* PAGINACIÓN ESTILO HUD PANTALLA OPERATIVA */
        .hud-page-btn { padding: 6px 12px; background: rgba(255, 47, 92, 0.1); border: 1px solid rgba(255, 47, 92, 0.3); color: var(--text); font-family: 'JetBrains Mono', monospace; font-size: 11px; border-radius: 6px; transition: all 0.2s; }
        .hud-page-btn:hover:not(:disabled) { background: var(--primary); box-shadow: 0 0 12px var(--primary); }
        .hud-page-btn:disabled { opacity: 0.3; cursor: not-allowed; }
    </style>
</head>
<body class="flex min-h-screen relative">
    <div class="cyber-grid"></div>

    <aside class="w-72 bg-[#060203] border-r border-[#2d050f] flex flex-col justify-between fixed h-full z-40 shadow-2xl">
        <div>
            <div class="p-6 border-b border-[#2d050f] flex items-center gap-4 bg-black/20">
                <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-red-950 flex items-center justify-center font-black rounded-2xl text-white shadow-[0_0_25px_var(--primary)] font-display text-xl tracking-wider">SOC</div>
                <div>
                    <h2 class="font-display text-2xl font-black tracking-wider text-white">SENATI CORE</h2>
                    <p class="text-[9px] font-bold text-red-500 uppercase tracking-widest">SISTEMA CONTROL ERP</p>
                </div>
            </div>

            <nav class="p-4 space-y-1.5 overflow-y-auto max-h-[calc(100vh-160px)] scrollbar-thin">
                <button onclick="switchTab('dashboard')" id="btn-dashboard" class="sidebar-btn active w-full flex items-center gap-4 px-4 py-4 rounded-xl text-left text-xs font-black uppercase tracking-wider text-gray-400">
                    <span class="text-lg">📊</span> Dashboard
                </button>
                <button onclick="switchTab('alumnos')" id="btn-alumnos" class="sidebar-btn w-full flex items-center gap-4 px-4 py-4 rounded-xl text-left text-xs font-black uppercase tracking-wider text-gray-400">
                    <span class="text-lg">👥</span> Alumnos
                </button>
                <button onclick="switchTab('cursos')" id="btn-cursos" class="sidebar-btn w-full flex items-center gap-4 px-4 py-4 rounded-xl text-left text-xs font-black uppercase tracking-wider text-gray-400">
                    <span class="text-lg">📚</span> Cursos
                </button>
                <button onclick="switchTab('profesores')" id="btn-profesores" class="sidebar-btn w-full flex items-center gap-4 px-4 py-4 rounded-xl text-left text-xs font-black uppercase tracking-wider text-gray-400">
                    <span class="text-lg">👨‍🏫</span> Profesores
                </button>
                <button onclick="switchTab('horarios')" id="btn-horarios" class="sidebar-btn w-full flex items-center gap-4 px-4 py-4 rounded-xl text-left text-xs font-black uppercase tracking-wider text-gray-400">
                    <span class="text-lg">⏳</span> Horarios
                </button>
                <button onclick="switchTab('matriculas')" id="btn-matriculas" class="sidebar-btn w-full flex items-center gap-4 px-4 py-4 rounded-xl text-left text-xs font-black uppercase tracking-wider text-gray-400">
                    <span class="text-lg">📝</span> Matrículas
                </button>
                <button onclick="switchTab('api')" id="btn-api" class="sidebar-btn w-full flex items-center gap-4 px-4 py-4 rounded-xl text-left text-xs font-black uppercase tracking-wider text-gray-400">
                    <span class="text-lg">⚡</span> API REST
                </button>
                <button onclick="switchTab('reportes')" id="btn-reportes" class="sidebar-btn w-full flex items-center gap-4 px-4 py-4 rounded-xl text-left text-xs font-black uppercase tracking-wider text-gray-400">
                    <span class="text-lg">🖨️</span> Reportes
                </button>
                <button onclick="switchTab('config')" id="btn-config" class="sidebar-btn w-full flex items-center gap-4 px-4 py-4 rounded-xl text-left text-xs font-black uppercase tracking-wider text-gray-400">
                    <span class="text-lg">⚙️</span> Configuración
                </button>
            </nav>
        </div>

        <div class="p-4 border-t border-[#2d050f] bg-black/50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-red-950/60 border border-red-500/40 flex items-center justify-center font-black text-white text-sm">DC</div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-black text-white truncate uppercase">{{ Auth::user()->name ?? 'DAVALOS CUETO' }}</p>
                    <p class="text-[9px] font-bold text-green-400 uppercase tracking-widest flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-green-500 inline-block animate-pulse shadow-[0_0_8px_#00ff66]"></span> ONLINE
                    </p>
                </div>
            </div>
        </div>
    </aside>

    <div class="flex-1 pl-72 relative z-10 flex flex-col min-h-screen">
        
        <header class="w-full border-b border-[#2d050f] px-10 py-5 flex items-center justify-between bg-black/40 backdrop-blur-xl sticky top-0 z-30">
            <div class="w-96 relative">
                <input type="text" id="global-search" oninput="executeGlobalOmniSearch(this.value)" class="w-full bg-[#090305] border border-red-950/80 rounded-xl py-3 pl-12 pr-4 text-xs font-medium text-white placeholder-gray-500 outline-none focus:border-red-600 transition shadow-inner" placeholder="Buscador global interactivo (Alumnos, Cursos, DNI)...">
                <span class="absolute left-4 top-3.5 text-gray-500 text-sm">🔍</span>
            </div>
            
            <div class="flex items-center gap-6 text-right">
                <div class="text-[11px] font-bold text-gray-500 font-mono bg-black/40 px-3 py-1.5 rounded-lg border border-red-950/40">
                    IP CORE: <span class="text-red-500">127.0.0.1</span> | NODE: <span class="text-red-500">PROD-MX</span> | LATENCY: <span class="text-green-400">12ms</span>
                </div>
                <form action="{{ route('logout') }}" method="POST" id="logout-core">
                    @csrf
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-red-950/40 border border-red-900/60 hover:bg-red-600 text-white text-[10px] font-black uppercase tracking-wider transition">Cerrar Sesión</button>
                </form>
            </div>
        </header>

        <main class="p-10 flex-1 space-y-10">
            
            <div id="pane-dashboard" class="tab-pane space-y-8 animate-fade">
                <div class="flex justify-between items-end border-b border-red-950/40 pb-4">
                    <div>
                        <p class="text-xs font-black text-red-500 uppercase tracking-widest">SISTEMA INTEGRADO OPERACIONAL</p>
                        <h2 class="title-line font-display text-4xl font-black text-white mt-1">DASHBOARD EJECUTIVO CENTRAL</h2>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="triggerExport('PDF')" class="px-5 py-2.5 bg-[#2d0a0f] border border-red-900/60 rounded-xl text-[10px] font-black uppercase text-white hover:bg-red-950 transition">Exportar PDF</button>
                        <button onclick="triggerExport('EXCEL')" class="px-5 py-2.5 bg-[#2d0a0f] border border-red-900/60 rounded-xl text-[10px] font-black uppercase text-white hover:bg-red-950 transition">Exportar Excel</button>
                        <button onclick="window.print()" class="px-5 py-2.5 bg-[#2d0a0f] border border-red-900/60 rounded-xl text-[10px] font-black uppercase text-white hover:bg-red-950 transition">Imprimir</button>
                    </div>
                </div>

                <div class="grid grid-cols-5 gap-5">
                    <div class="glass p-6 rounded-2xl border-l-4 border-red-600 metric-glow">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Total Alumnos</p>
                        <p class="text-5xl font-black text-white mt-2 font-display tracking-wide">{{ count($alumnos ?? []) }}</p>
                    </div>
                    <div class="glass p-6 rounded-2xl border-l-4 border-red-600 metric-glow">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Total Cursos</p>
                        <p class="text-5xl font-black text-white mt-2 font-display tracking-wide">{{ count($cursos ?? []) }}</p>
                    </div>
                    <div class="glass p-6 rounded-2xl border-l-4 border-red-600 metric-glow">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Total Profesores</p>
                        <p class="text-5xl font-black text-white mt-2 font-display tracking-wide">{{ count($profesores ?? []) }}</p>
                    </div>
                    <div class="glass p-6 rounded-2xl border-l-4 border-red-600 metric-glow">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Total Horarios</p>
                        <p class="text-5xl font-black text-white mt-2 font-display tracking-wide">{{ count($horarios ?? []) }}</p>
                    </div>
                    <div class="glass p-6 rounded-2xl border-l-4 border-red-600 metric-glow">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Total Matrículas</p>
                        <p class="text-5xl font-black text-white mt-2 font-display tracking-wide">{{ count($matriculas ?? []) }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-6">
                    <div class="glass p-6 rounded-2xl space-y-4">
                        <h4 class="text-xs font-black uppercase tracking-wider text-red-400 flex items-center justify-between">
                            <span>Distribución de Matrículas</span>
                            <span class="text-[10px] text-gray-500 font-mono">LIVE MATRIX</span>
                        </h4>
                        <div class="h-44 flex items-end gap-4 pt-6 px-2">
                            <div class="flex-1 bg-gradient-to-t from-red-950/60 to-red-600 rounded-lg h-[40%] relative shadow-[0_0_15px_rgba(255,0,60,0.2)]"></div>
                            <div class="flex-1 bg-gradient-to-t from-red-950/60 to-red-600 rounded-lg h-[70%] relative shadow-[0_0_15px_rgba(255,0,60,0.2)]"></div>
                            <div class="flex-1 bg-gradient-to-t from-red-950/60 to-red-500 rounded-lg h-[100%] relative shadow-[0_0_15px_rgba(255,0,60,0.3)]"></div>
                        </div>
                        <div class="flex justify-between text-[9px] font-bold text-gray-500 uppercase font-mono px-1"><span>Semestre-I</span><span>Semestre-II</span><span>Actual</span></div>
                    </div>
                    
                    <div class="glass p-6 rounded-2xl space-y-4">
                        <h4 class="text-xs font-black uppercase tracking-wider text-red-400">Rendimiento Técnico de Padrón</h4>
                        <div class="h-44 flex items-end gap-6 justify-center pt-6">
                            <div class="w-14 bg-green-950/20 border border-green-500/40 text-green-400 text-center rounded-xl h-[85%] flex flex-col justify-end p-2 pb-3 shadow-[0_0_15px_rgba(0,255,102,0.1)]"><span class="text-sm font-black font-mono">10</span><p class="text-[8px] uppercase tracking-wider font-bold mt-1 text-green-300">Aprob</p></div>
                            <div class="w-14 bg-red-950/20 border border-red-500/40 text-red-400 text-center rounded-xl h-[15%] flex flex-col justify-end p-2 pb-3 shadow-[0_0_15px_rgba(255,0,60,0.1)]"><span class="text-sm font-black font-mono">0</span><p class="text-[8px] uppercase tracking-wider font-bold mt-1 text-red-300">Reprob</p></div>
                        </div>
                    </div>

                    <div class="glass p-6 rounded-2xl space-y-4">
                        <h4 class="text-xs font-black uppercase tracking-wider text-red-400">Actividad Reciente del Servidor</h4>
                        <div class="space-y-3.5 max-h-44 overflow-y-auto pr-2 scrollbar-thin text-[11px] font-mono text-gray-400">
                            <p class="border-b border-red-950/30 pb-2"><span class="text-red-500">◆ [TRANSACTION]</span> Matrícula estructurada inyectada con éxito: <span class="text-white">Jose Huaranga</span></p>
                            <p class="border-b border-red-950/30 pb-2"><span class="text-red-500">◆ [SYS_AUDIT]</span> Análisis relacional de índices B-Tree en MariaDB concluido.</p>
                            <p class="border-b border-red-950/30 pb-2"><span class="text-red-500">◆ [HANDSHAKE]</span> Petición GET limpia mapeada en /api/v1/alumnos.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="pane-alumnos" class="tab-pane hidden space-y-6 animate-fade">
                <div class="flex justify-between items-center border-b border-red-950/40 pb-4">
                    <div>
                        <p class="text-xs font-black text-red-500">MÓDULO DE IDENTIDADES</p>
                        <h3 class="font-display text-3xl font-black text-white">REPOSITORIO GENERAL DE ALUMNOS</h3>
                    </div>
                    <button onclick="openModal('modal-alumno-add')" class="px-6 py-3.5 bg-gradient-to-r from-red-700 to-red-500 text-white font-black text-xs uppercase tracking-wider rounded-xl shadow-[0_0_20px_rgba(255,0,60,0.3)]">Agregar Alumno</button>
                </div>

                <div class="glass p-6 rounded-2xl grid grid-cols-4 gap-4 bg-black/20 shadow-inner">
                    <input type="text" id="filter-al-name" oninput="applyAlumnosAdvancedFilters()" class="input-cyber font-medium" placeholder="Buscar por nombres o apellidos...">
                    <input type="text" id="filter-al-dni" oninput="applyAlumnosAdvancedFilters()" class="input-cyber font-mono" placeholder="Buscar por DNI estructural...">
                    <select id="filter-al-status" onchange="applyAlumnosAdvancedFilters()" class="input-cyber bg-black text-xs font-bold uppercase tracking-wider text-gray-300">
                        <option value="">TODOS LOS ESTADOS</option>
                        <option value="matriculado">MATRICULADO</option>
                        <option value="inactivo">INACTIVO</option>
                    </select>
                    <button onclick="clearAlumnosFilters()" class="py-3 bg-red-950/40 border border-red-900/60 rounded-xl text-xs font-black uppercase tracking-wider text-white hover:bg-red-700 transition">Limpiar Filtros</button>
                </div>

                <div class="glass rounded-2xl overflow-hidden border border-red-950/40 shadow-2xl">
                    <table class="w-full text-left border-collapse text-xs" id="table-alumnos-core">
                        <shadow class="table-head border-b border-red-950">
                            <tr class="text-[#ff003c] font-black uppercase tracking-wider text-[11px]"><th class="p-5">DNI (Index)</th><th class="p-5">Estudiante / Alumno</th><th class="p-5">Contacto Electrónico</th><th class="p-5">Dirección Residencial</th><th class="p-5">Condición</th><th class="p-5 text-center">Operaciones</th></tr>
                        </shadow>
                        <tbody class="divide-y divide-red-950/20 bg-black/10">
                            @foreach($alumnos ?? [] as $al)
                            <tr class="row-hover data-row-alumno" data-nombre="{{ strtolower($al->nombre) }}" data-apellidos="{{ strtolower($al->apellidos) }}" data-dni="{{ $al->dni }}" data-estado="{{ strtolower($al->estado_matricula) }}">
                                <td class="p-5 font-mono font-bold text-white tracking-wider">{{ $al->dni }}</td>
                                <td class="p-5 font-black uppercase text-gray-200 tracking-wide">{{ $al->nombre }} {{ $al->apellidos }}</td>
                                <td class="p-5 font-mono text-gray-400">{{ $al->email }}</td>
                                <td class="p-5 uppercase text-gray-500 font-medium text-[11px]">{{ $al->direccion }}</td>
                                <td class="p-5"><span class="hud-badge {{ $al->estado_matricula == 'matriculado' ? 'hud-badge-success' : 'hud-badge-danger' }}">{{ $al->estado_matricula }}</span></td>
                                <td class="p-5 text-center flex justify-center gap-2">
                                    <button onclick="openModalDetail('alumno', {{ json_encode($al) }})" class="px-3 py-1.5 rounded bg-blue-950/60 border border-blue-900 text-blue-400 font-black uppercase text-[10px] transition">Detalles</button>
                                    <button onclick="openModalEditAlumno({{ json_encode($al) }})" class="px-3 py-1.5 rounded bg-amber-950/60 border border-amber-900 text-amber-400 font-black uppercase text-[10px] transition">Editar</button>
                                    <button onclick="triggerDeleteAlert('alumno', {{ $al->id_alumno }})" class="px-3 py-1.5 rounded bg-red-950/60 border border-red-900 text-red-400 font-black uppercase text-[10px] transition">Eliminar</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-4 bg-black/40 border-t border-red-950/60 flex justify-between items-center text-[10px] font-black uppercase tracking-wider text-gray-500">
                        <span id="counter-alumnos">MOSTRANDO {{ count($alumnos ?? []) }} REGISTROS COMPILADOS</span>
                        <div class="flex gap-1"><button class="hud-page-btn" disabled>Anterior</button><button class="hud-page-btn active">1</button><button class="hud-page-btn" disabled>Siguiente</button></div>
                    </div>
                </div>
            </div>

            <div id="pane-cursos" class="tab-pane hidden space-y-6 animate-fade">
                <div class="flex justify-between items-center border-b border-red-950/40 pb-4">
                    <div>
                        <p class="text-xs font-black text-red-500">MÓDULO CURRICULAR</p>
                        <h3 class="font-display text-3xl font-black text-white">MALLA CURRICULAR VIGENTE</h3>
                    </div>
                    <button onclick="openModal('modal-curso-add')" class="px-6 py-3.5 bg-gradient-to-r from-red-700 to-red-500 text-white font-black text-xs uppercase tracking-wider rounded-xl shadow-[0_0_20px_rgba(255,0,60,0.3)]">Agregar Curso</button>
                </div>

                <div class="glass rounded-2xl overflow-hidden border border-red-950/40 shadow-2xl">
                    <table class="w-full text-left border-collapse text-xs" id="table-cursos-core">
                        <thead class="table-head border-b border-red-950"><tr class="text-[#ff003c] font-black uppercase tracking-wider text-[11px]"><th class="p-5">Código Malla</th><th class="p-5">Asignatura / Especialidad</th><th class="p-5">Créditos Universitarios</th><th class="p-5">Descripción Estructural</th><th class="p-5 text-center">Operaciones</th></tr></thead>
                        <tbody class="divide-y divide-red-950/20 bg-black/10">
                            @foreach($cursos ?? [] as $cu)
                            <tr class="row-hover data-row-curso">
                                <td class="p-5 font-mono text-red-400 font-black tracking-widest uppercase">{{ $cu->codigo_curso }}</td>
                                <td class="p-5 font-black uppercase text-white tracking-wide">{{ $cu->nombre_curso }}</td>
                                <td class="p-5 font-mono font-bold text-amber-400 text-sm">{{ $cu->creditos }} CP</td>
                                <td class="p-5 text-gray-400 max-w-sm truncate font-medium">{{ $cu->descripcion }}</td>
                                <td class="p-5 text-center flex justify-center gap-2">
                                    <button onclick="openModalDetail('curso', {{ json_encode($cu) }})" class="px-3 py-1.5 rounded bg-blue-950/60 border border-blue-900 text-blue-400 font-black uppercase text-[10px]">Detalle</button>
                                    <button onclick="openModalEditCurso({{ json_encode($cu) }})" class="px-3 py-1.5 rounded bg-amber-950/60 border border-amber-900 text-amber-400 font-black uppercase text-[10px]">Editar</button>
                                    <button onclick="triggerDeleteAlert('curso', {{ $cu->id_curso }})" class="px-3 py-1.5 rounded bg-red-950/60 border border-red-900 text-red-400 font-black uppercase text-[10px]">Borrar</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="pane-profesores" class="tab-pane hidden space-y-6 animate-fade">
                <div class="flex justify-between items-center border-b border-red-950/40 pb-4">
                    <div>
                        <p class="text-xs font-black text-red-500">CUERPO INSTRUCTOR</p>
                        <h3 class="font-display text-3xl font-black text-white">PLANA DOCENTE DE LA ESCUELA DE TI</h3>
                    </div>
                    <button onclick="openModal('modal-profesor-add')" class="px-6 py-3.5 bg-gradient-to-r from-red-700 to-red-500 text-white font-black text-xs uppercase tracking-wider rounded-xl">Agregar Profesor</button>
                </div>
                <div class="glass rounded-2xl overflow-hidden border border-red-950/40 shadow-2xl">
                    <table class="w-full text-left border-collapse text-xs" id="table-profesores-core">
                        <thead class="table-head border-b border-red-950"><tr class="text-[#ff003c] font-black uppercase tracking-wider text-[11px]"><th class="p-5">ID Ficha</th><th class="p-5">Instructor Superior</th><th class="p-5">Especialidad de Grado Industrial</th><th class="p-5 text-center">Operaciones</th></tr></thead>
                        <tbody class="divide-y divide-red-950/20 bg-black/10">
                            @foreach($profesores ?? [] as $pr)
                            <tr class="row-hover data-row-profesor">
                                <td class="p-5 font-mono text-gray-500">#PR-0{{ $pr->id_profesor }}</td>
                                <td class="p-5 font-black uppercase text-white tracking-wide">{{ $pr->nombre }} {{ $pr->apellidos }}</td>
                                <td class="p-5 font-bold text-red-400 uppercase tracking-wide">{{ $pr->especialidad }}</td>
                                <td class="p-5 text-center flex justify-center gap-2">
                                    <button onclick="openModalDetail('profesor', {{ json_encode($pr) }})" class="px-3 py-1.5 rounded bg-blue-950/60 border border-blue-900 text-blue-400 font-black uppercase text-[10px]">Detalle</button>
                                    <button onclick="openModalEditProfesor({{ json_encode($pr) }})" class="px-3 py-1.5 rounded bg-amber-950/60 border border-amber-900 text-amber-400 font-black uppercase text-[10px]">Editar</button>
                                    <button onclick="triggerDeleteAlert('profesor', {{ $pr->id_profesor }})" class="px-3 py-1.5 rounded bg-red-950/60 border border-red-900 text-red-400 font-black uppercase text-[10px]">Eliminar</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="pane-horarios" class="tab-pane hidden space-y-6 animate-fade">
                <div class="flex justify-between items-center border-b border-red-950/40 pb-4">
                    <div>
                        <p class="text-xs font-black text-red-500">PLANIFICACIÓN HORARIA</p>
                        <h3 class="font-display text-3xl font-black text-white">ORQUESTACIÓN HORARIA DE BLOQUES</h3>
                    </div>
                    <button onclick="openModal('modal-horario-add')" class="px-6 py-3.5 bg-gradient-to-r from-red-700 to-red-500 text-white font-black text-xs uppercase tracking-wider rounded-xl">Agregar Horario</button>
                </div>
                <div class="glass rounded-2xl overflow-hidden border border-red-950/40 shadow-2xl">
                    <table class="w-full text-left border-collapse text-xs" id="table-horarios-core">
                        <thead class="table-head border-b border-red-950"><tr class="text-[#ff003c] font-black uppercase tracking-wider text-[11px]"><th class="p-5">Módulo de Asignatura</th><th class="p-5">Instructor Asignado</th><th class="p-5">Día de Semana</th><th class="p-5">Apertura Bloque</th><th class="p-5">Cierre Bloque</th><th class="p-5">Complejo Aula</th><th class="p-5 text-center">Operaciones</th></tr></thead>
                        <tbody class="divide-y divide-red-950/20 bg-black/10">
                            @foreach($horarios ?? [] as $ho)
                            <tr class="row-hover data-row-horario">
                                <td class="p-5 font-black uppercase text-white tracking-wide">{{ $ho->nombre_curso }}</td>
                                <td class="p-5 uppercase text-gray-300 font-semibold">{{ $ho->profesor_full }}</td>
                                <td class="p-5 text-red-400 font-black uppercase tracking-wider">{{ $ho->dia_semana }}</td>
                                <td class="p-5 font-mono text-gray-400 font-bold">{{ $ho->hora_inicio }}</td>
                                <td class="p-5 font-mono text-gray-400 font-bold">{{ $ho->hora_fin }}</td>
                                <td class="p-5 font-black text-amber-500 uppercase font-mono">{{ $ho->id_aula }}</td>
                                <td class="p-5 text-center flex justify-center gap-2">
                                    <button onclick="openModalDetail('horario', {{ json_encode($ho) }})" class="px-3 py-1.5 rounded bg-blue-950/60 border border-blue-900 text-blue-400 font-black uppercase text-[10px]">Detalle</button>
                                    <button onclick="triggerDeleteAlert('horario', {{ $ho->id_horario }})" class="px-3 py-1.5 rounded bg-red-950/60 border border-red-900 text-red-400 font-black uppercase text-[10px]">Remover</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="pane-matriculas" class="tab-pane hidden space-y-6 animate-fade">
                <div class="flex justify-between items-center border-b border-red-950/40 pb-4">
                    <div>
                        <p class="text-xs font-black text-red-500">INGESTACIÓN RELACIONAL CENTRAL</p>
                        <h3 class="font-display text-3xl font-black text-white">CENTRO PROCESADOR DE MATRÍCULAS</h3>
                    </div>
                    <button onclick="openModal('modal-matricula-add')" class="px-6 py-3.5 bg-gradient-to-r from-red-700 to-red-500 text-white font-black text-xs uppercase tracking-wider rounded-xl">Registrar Matrícula</button>
                </div>

                <div class="glass p-6 rounded-2xl grid grid-cols-4 gap-4 bg-black/20">
                    <div>
                        <label class="label-field">Semestre Académico</label>
                        <select id="filter-mat-semester" onchange="applyMatriculasAdvancedFilters()" class="input-cyber bg-black text-white font-bold"><option value="">TODOS</option><option value="2026-i">2026-I</option></select>
                    </div>
                    <div>
                        <label class="label-field">Condición Evaluativa</label>
                        <select id="filter-mat-status" onchange="applyMatriculasAdvancedFilters()" class="input-cyber bg-black text-white font-bold"><option value="">TODAS</option><option value="aprobado">APROBADO</option><option value="reprobado">REPROBADO</option><option value="cursando">CURSANDO</option></select>
                    </div>
                    <div class="col-span-2 flex items-end"><p class="text-[11px] font-mono text-gray-500 uppercase tracking-wider">Aislamiento relacional directo para auditorías externas.</p></div>
                </div>

                <div class="glass rounded-2xl overflow-hidden border border-red-950/40 shadow-2xl">
                    <table class="w-full text-left border-collapse text-xs" id="table-matriculas-core">
                        <thead class="table-head border-b border-red-950"><tr class="text-[#ff003c] font-black uppercase tracking-wider text-[11px]"><th class="p-5">Estudiante</th><th class="p-5">Asignatura Inyectada</th><th class="p-5">Instructor Responsable</th><th class="p-5">Semestre</th><th class="p-5">Fecha Ingesta</th><th class="p-5">Nota Final</th><th class="p-5">Condición</th><th class="p-5 text-center">Operaciones</th></tr></thead>
                        <tbody class="divide-y divide-red-950/20 bg-black/10">
                            @foreach($matriculas ?? [] as $ma)
                            <tr class="row-hover data-row-matricula" data-semestre="{{ strtolower($ma->semestre) }}" data-estado="{{ strtolower($ma->estado) }}">
                                <td class="p-5 font-black text-white uppercase tracking-wide">{{ $ma->alumno_full }}</td>
                                <td class="p-5 uppercase text-gray-300 font-medium">{{ $ma->curso_full }}</td>
                                <td class="p-5 uppercase text-gray-400 font-medium">{{ $ma->profesor_full }}</td>
                                <td class="p-5 font-mono text-red-500 font-black text-xs">{{ $ma->semestre }}</td>
                                <td class="p-5 font-mono text-gray-400 font-bold">{{ $ma->fecha_matricula }}</td>
                                <td class="p-5 font-mono font-black text-sm {{ $ma->nota_final >= 13 ? 'text-green-400' : 'text-red-400' }}">{{ number_format($ma->nota_final, 2) }}</td>
                                <td class="p-5"><span class="hud-badge {{ $ma->estado == 'aprobado' ? 'hud-badge-success' : ($ma->estado == 'reprobado' ? 'hud-badge-danger' : 'hud-badge-warning') }}">{{ $ma->estado }}</span></td>
                                <td class="p-5 text-center flex justify-center gap-2">
                                    <button onclick="openModalDetail('matricula', {{ json_encode($ma) }})" class="px-3 py-1.5 rounded bg-blue-950/60 border border-blue-900 text-blue-400 font-black uppercase text-[10px]">Detalle</button>
                                    <button onclick="triggerDeleteAlert('matricula', {{ $ma->id_matricula }})" class="text-red-500 font-black uppercase text-[10px] hover:underline">Anular</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="pane-api" class="tab-pane hidden space-y-6 animate-fade">
                <div><p class="kicker text-red-500">MÓDULO DESARROLLADOR</p><h3 class="font-display text-3xl font-black text-white">DOCUMENTACIÓN DE ENDPOINTS API RESTful</h3></div>
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-2 space-y-3.5">
                        <div class="glass p-5 rounded-xl flex justify-between items-center font-mono text-xs"><p><span class="px-2.5 py-1 bg-green-950 border border-green-500/30 text-green-400 font-bold rounded mr-3">GET</span> /api/v1/alumnos</p><span class="text-gray-500 uppercase font-bold text-[10px]">Colección de alumnos</span></div>
                        <div class="glass p-5 rounded-xl flex justify-between items-center font-mono text-xs"><p><span class="px-2.5 py-1 bg-blue-950 border border-blue-500/30 text-blue-400 font-bold rounded mr-3">POST</span> /api/v1/matriculas</p><span class="text-gray-500 uppercase font-bold text-[10px]">Procesar Matrícula Atómica</span></div>
                        <div class="glass p-5 rounded-xl flex justify-between items-center font-mono text-xs"><p><span class="px-2.5 py-1 bg-yellow-950 border border-yellow-500/30 text-yellow-400 font-bold rounded mr-3">PUT</span> /api/v1/cursos/{id}</p><span class="text-gray-500 uppercase font-bold text-[10px]">Actualizar Malla Curricular</span></div>
                        <div class="glass p-5 rounded-xl flex justify-between items-center font-mono text-xs"><p><span class="px-2.5 py-1 bg-red-950 border border-red-500/30 text-red-400 font-bold rounded mr-3">DELETE</span> /api/v1/profesores/{id}</p><span class="text-gray-500 uppercase font-bold text-[10px]">Purgar Ficha Docente</span></div>
                    </div>
                    <div class="glass p-6 rounded-2xl space-y-4">
                        <h4 class="text-xs font-black uppercase tracking-wider text-red-400">Métricas Analíticas API</h4>
                        <div class="space-y-4 text-xs font-bold text-gray-400">
                            <div><p class="mb-1 text-[11px] uppercase">GET REQUESTS INDEXADORES (92ms p99)</p><div class="w-full bg-red-950 h-2 rounded"><div class="bg-red-500 h-full w-[80%] rounded"></div></div></div>
                            <div><p class="mb-1 text-[11px] uppercase">RATE LIMIT ACCESOS PERIMETRALES</p><p class="font-mono text-red-400 text-xl font-black">0 / 60 Reqs/Min</p></div>
                        </div>
                    </div>
                </div>
                <div class="glass p-6 rounded-2xl space-y-4">
                    <h4 class="text-sm font-black text-red-500 uppercase font-mono tracking-widest border-b border-red-950 pb-2">Sección de Evidencias Técnicas de Códigos de Error</h4>
                    <div class="grid grid-cols-3 gap-4 font-mono text-[11px]">
                        <div class="p-4 bg-black/50 border border-red-950 rounded-xl"><span class="text-red-400 font-bold">[HTTP 400 Bad Request]</span><pre class="mt-2 text-gray-400 text-[10px]">{"status": 400, "error": "Malformed Payload", "message": "Atributo DNI con longitud inválida"}</pre></div>
                        <div class="p-4 bg-black/50 border border-red-950 rounded-xl"><span class="text-red-400 font-bold">[HTTP 403 Forbidden]</span><pre class="mt-2 text-gray-400 text-[10px]">{"status": 403, "error": "SOC Firewall Block", "message": "Nivel de acceso insuficiente para mutar"}</pre></div>
                        <div class="p-4 bg-black/50 border border-red-950 rounded-xl"><span class="text-red-400 font-bold">[HTTP 500 Internal Error]</span><pre class="mt-2 text-gray-400 text-[10px]">{"status": 500, "error": "B-Tree Lock Collision", "message": "Fallo crítico al indexar clave InnoDB"}</pre></div>
                    </div>
                </div>
            </div>

            <div id="pane-reportes" class="tab-pane hidden space-y-6 animate-fade">
                <h3 class="font-display text-3xl font-black text-white">REPORTE CONSOLIDADO INSTITUCIONAL</h3>
                <div class="glass p-8 rounded-2xl text-center border border-dashed border-red-900/40 py-16 bg-black/10">
                    <p class="text-sm font-bold text-gray-400 uppercase tracking-widest">Compilador de documentos e informes académicos listo para descarga.</p>
                </div>
            </div>

            <div id="pane-config" class="tab-pane hidden space-y-6 animate-fade">
                <h3 class="font-display text-3xl font-black text-white">ENTORNO CORE CONFIG</h3>
                <div class="glass p-6 rounded-2xl font-mono text-xs text-gray-500 space-y-2">
                    <p>APP_ENV=<span class="text-red-400">production</span></p>
                    <p>DB_CONNECTION=<span class="text-red-400">mysql</span></p>
                    <p>DB_DATABASE=<span class="text-red-400">apploginmatricula</span></p>
                    <p>DRIVERS_ENGINE=<span class="text-red-400">InnoDB_Cluster_Active</span></p>
                </div>
            </div>

        </main>
    </div>

    <div id="modal-alumno-add" class="modal-overlay" onclick="closeModal('modal-alumno-add')">
        <div class="modal-card p-8" onclick="event.stopPropagation()">
            <h3 class="font-display text-2xl font-black text-white mb-6 uppercase border-b border-red-950 pb-2 tracking-wide">Aperturar Nuevo Expediente</h3>
            <form method="POST" action="#" onsubmit="triggerSweetAlertAndClose(event, 'modal-alumno-add', 'Alumno registrado exitosamente en el clúster relacional.')" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="label-field">Nombres del Postulante</label><input type="text" required class="input-cyber"></div>
                    <div><label class="label-field">Apellidos Completos</label><input type="text" required class="input-cyber"></div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="label-field">DNI Civil (8 dígitos)</label><input type="text" required maxlength="8" class="input-cyber font-mono"></div>
                    <div><label class="label-field">Teléfono Celular de Contacto</label><input type="text" required class="input-cyber font-mono"></div>
                </div>
                <div><label class="label-field">Dirección Residencial Actual</label><input type="text" required class="input-cyber"></div>
                <div class="flex justify-end gap-3 pt-4 border-t border-red-950">
                    <button type="button" onclick="closeModal('modal-alumno-add')" class="px-5 py-2.5 bg-black/40 border border-red-950 text-xs text-white rounded-xl font-bold uppercase tracking-wider">Cancelar</button>
                    <button type="submit" class="px-5 py-2.5 bg-red-600 font-black text-xs rounded-xl text-white uppercase tracking-wider shadow-[0_0_15px_var(--primary)]">Inyectar Fila</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-alumno-edit" class="modal-overlay" onclick="closeModal('modal-alumno-edit')">
        <div class="modal-card p-8" onclick="event.stopPropagation()">
            <h3 class="font-display text-2xl font-black text-white mb-6 uppercase border-b border-red-950 pb-2 tracking-wide">Modificar Parámetros de Expediente</h3>
            <form method="POST" action="#" onsubmit="triggerSweetAlertAndClose(event, 'modal-alumno-edit', 'Expediente académico modificado y guardado correctamente.')" class="space-y-4">
                <input type="hidden" id="edit-al-id">
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="label-field">Nombres</label><input type="text" id="edit-al-nombre" class="input-cyber"></div>
                    <div><label class="label-field">Apellidos</label><input type="text" id="edit-al-apellidos" class="input-cyber"></div>
                </div>
                <div class="flex justify-end gap-3 pt-4 border-t border-red-950">
                    <button type="button" onclick="closeModal('modal-alumno-edit')" class="px-5 py-2.5 bg-black/40 border border-red-950 text-xs text-white rounded-xl font-bold uppercase tracking-wider">Cancelar</button>
                    <button type="submit" class="px-5 py-2.5 bg-red-600 font-black text-xs rounded-xl text-white uppercase tracking-wider">Aplicar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-curso-add" class="modal-overlay" onclick="closeModal('modal-curso-add')">
        <div class="modal-card p-8 small" onclick="event.stopPropagation()">
            <h3 class="font-display text-2xl font-black text-white mb-6 uppercase border-b border-red-950 pb-2 tracking-wide">Aprovisionar Módulo Académico</h3>
            <form method="POST" action="#" onsubmit="triggerSweetAlertAndClose(event, 'modal-curso-add', 'Especialidad e ingeniería inyectada con éxito en la malla.')" class="space-y-4">
                <div><label class="label-field">Nombre de la Asignatura</label><input type="text" required class="input-cyber"></div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="label-field">Código Malla</label><input type="text" required class="input-cyber font-mono uppercase"></div>
                    <div><label class="label-field">Créditos Universitarios</label><input type="number" required class="input-cyber font-mono"></div>
                </div>
                <div class="flex justify-end gap-3 pt-4 border-t border-red-950">
                    <button type="button" onclick="closeModal('modal-curso-add')" class="px-5 py-2.5 bg-black/40 border border-red-950 text-xs text-white rounded-xl">Cancelar</button>
                    <button type="submit" class="px-5 py-2.5 bg-red-600 font-black text-xs rounded-xl text-white">Guardar Curso</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-curso-edit" class="modal-overlay" onclick="closeModal('modal-curso-edit')">
        <div class="modal-card p-8 small" onclick="event.stopPropagation()">
            <h3 class="font-display text-2xl font-black text-white mb-6 uppercase border-b border-red-950 pb-2 tracking-wide">Modificar Parámetros de Asignatura</h3>
            <form method="POST" action="#" onsubmit="triggerSweetAlertAndClose(event, 'modal-curso-edit', 'Curso actualizado con éxito en el mapa institucional.')" class="space-y-4">
                <div><label class="label-field">Nombre de la Asignatura</label><input type="text" id="edit-cu-nombre" class="input-cyber"></div>
                <div class="flex justify-end gap-3 pt-4 border-t border-red-950">
                    <button type="button" onclick="closeModal('modal-curso-edit')" class="px-5 py-2.5 bg-black/40 border border-red-950 text-xs text-white rounded-xl">Cancelar</button>
                    <button type="submit" class="px-5 py-2.5 bg-red-600 font-black text-xs rounded-xl text-white">Aplicar Parche</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-profesor-add" class="modal-overlay" onclick="closeModal('modal-profesor-add')">
        <div class="modal-card p-8 small" onclick="event.stopPropagation()">
            <h3 class="font-display text-2xl font-black text-white mb-6 uppercase border-b border-red-950 pb-2 tracking-wide">Vincular Ficha de Instructor Superior</h3>
            <form method="POST" action="#" onsubmit="triggerSweetAlertAndClose(event, 'modal-profesor-add', 'Instructor de grado industrial vinculado correctamente.')" class="space-y-4">
                <div><label class="label-field">Nombre del Ingeniero</label><input type="text" required class="input-cyber"></div>
                <div><label class="label-field">Apellidos Completos</label><input type="text" required class="input-cyber"></div>
                <div><label class="label-field">Especialidad de Campo</label><input type="text" required class="input-cyber"></div>
                <div class="flex justify-end gap-3 pt-4 border-t border-red-950">
                    <button type="button" onclick="closeModal('modal-profesor-add')" class="px-5 py-2.5 bg-black/40 border border-red-950 text-xs text-white rounded-xl">Cancelar</button>
                    <button type="submit" class="px-5 py-2.5 bg-red-600 font-black text-xs rounded-xl text-white">Vincular Docente</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-profesor-edit" class="modal-overlay" onclick="closeModal('modal-profesor-edit')">
        <div class="modal-card p-8 small" onclick="event.stopPropagation()">
            <h3 class="font-display text-2xl font-black text-white mb-6 uppercase border-b border-red-950 pb-2 tracking-wide">Modificar Ficha Docente</h3>
            <form method="POST" action="#" onsubmit="triggerSweetAlertAndClose(event, 'modal-profesor-edit', 'Ficha del instructor actualizada correctamente.')" class="space-y-4">
                <div><label class="label-field">Especialidad Actualizada</label><input type="text" id="edit-pr-especialidad" class="input-cyber"></div>
                <div class="flex justify-end gap-3 pt-4 border-t border-red-950">
                    <button type="button" onclick="closeModal('modal-profesor-edit')" class="px-5 py-2.5 bg-black/40 border border-red-950 text-xs text-white rounded-xl">Cancelar</button>
                    <button type="submit" class="px-5 py-2.5 bg-red-600 font-black text-xs rounded-xl text-white">Aplicar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-horario-add" class="modal-overlay" onclick="closeModal('modal-horario-add')">
        <div class="modal-card p-8 small" onclick="event.stopPropagation()">
            <h3 class="font-display text-2xl font-black text-white mb-6 uppercase border-b border-red-950 pb-2 tracking-wide">Orquestar Bloque Horario Semanal</h3>
            <form method="POST" action="#" onsubmit="triggerSweetAlertAndClose(event, 'modal-horario-add', 'Bloque cronológico escolar guardado con éxito.')" class="space-y-4">
                <div><label class="label-field">Día de la Semana Escolar</label><input type="text" placeholder="Ej. Lunes" required class="input-cyber uppercase"></div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="label-field">Bloque Inicio</label><input type="time" required class="input-cyber font-mono"></div>
                    <div><label class="label-field">Bloque Fin</label><input type="time" required class="input-cyber font-mono"></div>
                </div>
                <div><label class="label-field">Aula / Complejo Tecnológico</label><input type="text" placeholder="Ej. Aula 101" required class="input-cyber font-mono"></div>
                <div class="flex justify-end gap-3 pt-4 border-t border-red-950">
                    <button type="button" onclick="closeModal('modal-horario-add')" class="px-5 py-2.5 bg-black/40 border border-red-950 text-xs text-white rounded-xl">Cancelar</button>
                    <button type="submit" class="px-5 py-2.5 bg-red-600 font-black text-xs rounded-xl text-white">Indexar Bloque</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-matricula-add" class="modal-overlay" onclick="closeModal('modal-matricula-add')">
        <div class="modal-card p-8" onclick="event.stopPropagation()">
            <h3 class="font-display text-2xl font-black text-white mb-6 uppercase border-b border-red-950 pb-2 tracking-wide">Formalizar Operación de Matrícula</h3>
            <form method="POST" action="#" onsubmit="triggerSweetAlertAndClose(event, 'modal-matricula-add', 'Matrícula procesada e indexada correctamente en el repositorio.')" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="label-field">Seleccionar Estudiante Activo</label><select class="input-cyber bg-black text-xs font-bold">@foreach($alumnos as $al)<option>{{ $al->nombre }} {{ $al->apellidos }}</option>@endforeach</select></div>
                    <div><label class="label-field">Seleccionar Especialidad</label><select class="input-cyber bg-black text-xs font-bold">@foreach($cursos as $cu)<option>{{ $cu->nombre_curso }}</option>@endforeach</select></div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="label-field">Semestre de Ingesta</label><input type="text" value="2026-I" readonly class="input-cyber font-mono opacity-60"></div>
                    <div><label class="label-field">Fecha de Transacción</label><input type="date" required class="input-cyber font-mono"></div>
                </div>
                <div class="flex justify-end gap-3 pt-4 border-t border-red-950">
                    <button type="button" onclick="closeModal('modal-matricula-add')" class="px-5 py-2.5 bg-black/40 border border-red-950 text-xs text-white rounded-xl">Cancelar</button>
                    <button type="submit" class="px-5 py-2.5 bg-red-600 font-black text-xs rounded-xl text-white uppercase tracking-wider">Emitir Matrícula</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-global-detail" class="modal-overlay" onclick="closeModal('modal-global-detail')">
        <div class="modal-card p-8 small" onclick="event.stopPropagation()">
            <h3 class="font-display text-2xl font-black text-white mb-4 uppercase border-b border-red-950 pb-2">Consulta de Récord Estructural</h3>
            <div id="detail-render-node" class="space-y-3.5 font-mono text-xs text-gray-300 bg-black/40 p-5 rounded-xl border border-red-950/60 shadow-inner"></div>
            <div class="flex justify-end pt-4 mt-4 border-t border-red-950">
                <button type="button" onclick="closeModal('modal-global-detail')" class="px-6 py-2.5 bg-red-600 font-black text-xs rounded-xl text-white uppercase tracking-widest">Cerrar Monitor</button>
            </div>
        </div>
    </div>

    <script>
        // 1. CONMUTADOR INTEGRAL DE PESTAÑAS NATIVO (TAB NUCLEUS)
        function switchTab(tabId) {
            document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.add('hidden'));
            const target = document.getElementById('pane-' + tabId);
            if(target) target.classList.remove('hidden');

            document.querySelectorAll('aside nav button').forEach(btn => btn.classList.remove('active'));
            const activeBtn = document.getElementById('btn-' + tabId);
            if(activeBtn) activeBtn.classList.add('active');
            
            localStorage.setItem('soc_active_tab_c3_final_v6_stable', tabId);
        }

        // 2. DISPARADORES CORE DE CONTROL MODAL
        function openModal(id) { document.getElementById(id).classList.add('active'); document.body.style.overflow = 'hidden'; }
        function closeModal(id) { document.getElementById(id).classList.remove('active'); document.body.style.overflow = 'auto'; }

        // 3. MAPEO DINÁMICO DE DATOS PARA EDICIÓN DE PARÁMETROS
        function openModalEditAlumno(alumno) {
            document.getElementById('edit-al-id').value = alumno.id_alumno;
            document.getElementById('edit-al-nombre').value = alumno.nombre;
            document.getElementById('edit-al-apellidos').value = alumno.apellidos;
            openModal('modal-alumno-edit');
        }

        function openModalEditCurso(curso) {
            document.getElementById('edit-cu-nombre').value = curso.nombre_curso;
            openModal('modal-curso-edit');
        }

        function openModalEditProfesor(profesor) {
            document.getElementById('edit-pr-especialidad').value = profesor.especialidad;
            openModal('modal-profesor-edit');
        }

        // 4. MOTOR EN TIEMPO REAL DE HANDSHAKE DE DETALLES
        function openModalDetail(entity, payload) {
            const node = document.getElementById('detail-render-node');
            let html = `<p class="text-red-500 font-black uppercase mb-3 tracking-widest">[EXPEDIENTE COMPILADO: ${entity.toUpperCase()}]</p>`;
            for (const [key, value] of Object.entries(payload)) {
                html += `<p class="border-b border-red-950/20 pb-1.5"><span class="text-gray-500 font-bold">${key.toUpperCase()}:</span> <span class="text-white font-black">${value}</span></p>`;
            }
            node.innerHTML = html;
            openModal('modal-global-detail');
        }

        // 5. MANEJADORES DE ACCIÓN Y ALERTAS SWEETALERT2
        function triggerSweetAlertAndClose(event, modalId, message) {
            event.preventDefault();
            closeModal(modalId);
            Swal.fire({ title: 'OPERACIÓN EXITOSA', text: message, icon: 'success', background: '#090305', color: '#fff2f4', confirmButtonColor: '#ff003c' });
        }

        function triggerDeleteAlert(entity, id) {
            Swal.fire({
                title: '¿CONFIRMAR PURGA?',
                text: 'Esta acción ejecutará una baja física irreversible dentro del repositorio central del SOC.',
                icon: 'warning',
                showCancelButton: true,
                background: '#090305',
                color: '#fff2f4',
                confirmButtonColor: '#ff1a40',
                cancelButtonColor: '#26050c',
                confirmButtonText: 'SÍ, PURGAR FILA'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({ title: 'PURGADO', text: 'El expediente ha sido purgado correctamente de las mallas indexadas.', icon: 'success', background: '#090305', color: '#fff2f4', confirmButtonColor: '#ff003c' });
                }
            });
        }

        // 6. BUSCADOR INTERACTIVO OMNIPRESENTE GLOBAL (OMNI-SEARCH RUNNER)
        function executeGlobalOmniSearch(value) {
            const term = value.trim().toLowerCase();
            document.querySelectorAll('.data-row-alumno, .data-row-curso, .data-row-matricula').forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(term) ? '' : 'none';
            });
        }

        // 7. FILTROS AVANZADOS COMBINATORIOS REACTIVOS (ALUMNOS)
        function applyAlumnosAdvancedFilters() {
            const nameTerm = document.getElementById('filter-al-name').value.toLowerCase().trim();
            const dniTerm = document.getElementById('filter-al-dni').value.toLowerCase().trim();
            const statusTerm = document.getElementById('filter-al-status').value.toLowerCase();
            let visibleCount = 0;

            document.querySelectorAll('.data-row-alumno').forEach(row => {
                const nombre = row.getAttribute('data-nombre');
                const apellidos = row.getAttribute('data-apellidos');
                const dni = row.getAttribute('data-dni');
                const estado = row.getAttribute('data-estado');

                const matchesName = !nameTerm || nombre.includes(nameTerm) || apellidos.includes(nameTerm);
                const matchesDni = !dniTerm || dni.includes(dniTerm);
                const matchesStatus = !statusTerm || estado === statusTerm;

                if (matchesName && matchesDni && matchesStatus) {
                    row.style.display = ''; visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });
            document.getElementById('counter-alumnos').innerText = `MOSTRANDO ${visibleCount} EXPEDIENTES FILTRADOS`;
        }

        function clearAlumnosFilters() {
            document.getElementById('filter-al-name').value = '';
            document.getElementById('filter-al-dni').value = '';
            document.getElementById('filter-al-status').value = '';
            applyAlumnosAdvancedFilters();
        }

        // 8. FILTROS AVANZADOS MATRÍCULAS
        function applyMatriculasAdvancedFilters() {
            const semesterTerm = document.getElementById('filter-mat-semester').value.toLowerCase();
            const statusTerm = document.getElementById('filter-mat-status').value.toLowerCase();

            document.querySelectorAll('.data-row-matricula').forEach(row => {
                const semestre = row.getAttribute('data-semestre');
                const estado = row.getAttribute('data-estado');

                const matchesSem = !semesterTerm || semestre === semesterTerm;
                const matchesStat = !statusTerm || estado === statusTerm;

                row.style.display = (matchesSem && matchesStat) ? '' : 'none';
            });
        }

        function triggerExport(type) {
            Swal.fire({ title: 'EXPORTACIÓN COMPILADA', text: `El reporte en formato ${type} ha sido procesado de forma limpia.`, icon: 'success', background: '#090305', color: '#fff2f4', confirmButtonColor: '#ff003c' });
        }

        // 9. PERSISTENCIA DE SESIÓN DOM
        document.addEventListener("DOMContentLoaded", () => {
            const activeTab = localStorage.getItem('soc_active_tab_c3_final_v6_stable') || 'dashboard';
            switchTab(activeTab);
        });
    </script>
</body>
</html>