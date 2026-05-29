<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - SENATI</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[#070b14] min-h-screen text-white font-sans antialiased pb-12 select-none relative">
    <div class="absolute inset-0 bg-gradient-to-b from-[#0b1324] via-transparent to-[#070b14] opacity-80 pointer-events-none"></div>

    <nav class="bg-[#0f172a]/80 backdrop-blur-md border-b border-white/5 sticky top-0 z-40 px-6 py-4">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center space-x-3">
                <span class="text-lg font-bold tracking-widest text-cyan-400 uppercase">SENATI</span>
                <span class="text-xs text-gray-500 font-semibold tracking-wider">| ESCUELA DE TI</span>
            </div>
            
            <div class="flex bg-gray-950/60 p-1 border border-white/5 rounded-xl space-x-1">
                <button onclick="switchTab('alumnos')" id="btn-alumnos" class="px-5 py-2 text-xs font-bold tracking-widest uppercase rounded-lg transition-all cursor-pointer">Alumnos</button>
                <button onclick="switchTab('cursos')" id="btn-cursos" class="px-5 py-2 text-xs font-bold tracking-widest uppercase rounded-lg transition-all cursor-pointer">Cursos</button>
                <button onclick="switchTab('profesores')" id="btn-profesores" class="px-5 py-2 text-xs font-bold tracking-widest uppercase rounded-lg transition-all cursor-pointer">Profesores</button>
            </div>

            <div>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-xs font-bold tracking-widest text-red-400 hover:text-red-300 transition-colors uppercase">
                    Cerrar sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 mt-8 relative z-10">
        
        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 text-xs font-bold uppercase tracking-wider">
                {{ session('success') }}
            </div>
        @endif

        <section id="pane-alumnos" class="hidden tab-pane">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold tracking-wider uppercase">Tabla de Alumnos</h1>
                    <p class="text-xs text-gray-400 mt-1">Control de perfiles institucionales matriculados</p>
                </div>
                <button onclick="openModal('modal-alumno-add')" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 font-bold text-xs tracking-widest uppercase hover:brightness-110 transition-all cursor-pointer shadow-lg shadow-cyan-500/10">
                    Agregar Alumno
                </button>
            </div>

            <div class="bg-[#0f172a]/40 border border-white/5 rounded-2xl overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-gray-950/40 text-gray-400 font-bold tracking-wider uppercase border-b border-white/5">
                                <th class="p-4">ID</th><th class="p-4">Nombre</th><th class="p-4">Apellidos</th><th class="p-4">DNI</th><th class="p-4">Teléfono</th><th class="p-4">Dirección</th><th class="p-4">Estado</th><th class="p-4 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 font-medium">
                            @foreach($alumnos as $al)
                            <tr class="hover:bg-white/[0.02] transition-colors">
                                <td class="p-4 text-gray-500">{{ $al->id_alumno }}</td>
                                <td class="p-4 font-bold text-white">{{ $al->nombre }}</td>
                                <td class="p-4">{{ $al->apellidos }}</td>
                                <td class="p-4 tracking-wider text-cyan-400">{{ $al->dni }}</td>
                                <td class="p-4 text-gray-300">{{ $al->telefono }}</td>
                                <td class="p-4 text-gray-400">{{ $al->direccion }}</td>
                                <td class="p-4">
                                    <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider {{ $al->estado_matricula == 'matriculado' ? 'bg-cyan-500/10 text-cyan-400' : 'bg-red-500/10 text-red-400' }}">
                                        {{ $al->estado_matricula }}
                                    </span>
                                </td>
                                <td class="p-4 flex justify-center space-x-2">
                                    <button onclick="openEditAlumno({{ json_encode($al) }})" class="px-3 py-1.5 rounded-lg bg-amber-500/10 border border-amber-500/20 text-amber-400 font-bold uppercase text-[10px] hover:bg-amber-500/20 transition-colors cursor-pointer">Editar</button>
                                    <form action="{{ route('alumnos.destroy', $al->id_alumno) }}" method="POST" onsubmit="return confirm('¿Eliminar alumno de HeidiSQL?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 font-bold uppercase text-[10px] hover:bg-red-500/20 transition-colors cursor-pointer">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section id="pane-cursos" class="hidden tab-pane">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold tracking-wider uppercase">Tabla de Cursos</h1>
                    <p class="text-xs text-gray-400 mt-1">Especialidades curriculares disponibles</p>
                </div>
                <button onclick="openModal('modal-curso-add')" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 font-bold text-xs tracking-widest uppercase hover:brightness-110 transition-all cursor-pointer shadow-lg shadow-cyan-500/10">
                    Agregar Curso
                </button>
            </div>

            <div class="bg-[#0f172a]/40 border border-white/5 rounded-2xl overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-gray-950/40 text-gray-400 font-bold tracking-wider uppercase border-b border-white/5">
                                <th class="p-4">ID</th><th class="p-4">Código</th><th class="p-4">Nombre del Curso</th><th class="p-4 text-center">Créditos</th><th class="p-4">Descripción</th><th class="p-4 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 font-medium">
                            @foreach($cursos as $cu)
                            <tr class="hover:bg-white/[0.02] transition-colors">
                                <td class="p-4 text-gray-500">{{ $cu->id_curso }}</td>
                                <td class="p-4 tracking-wider font-bold text-cyan-400 uppercase">{{ $cu->codigo_curso }}</td>
                                <td class="p-4 text-white font-semibold">{{ $cu->nombre_curso }}</td>
                                <td class="p-4 text-center text-gray-300 font-bold">{{ $cu->creditos }}</td>
                                <td class="p-4 text-gray-400 max-w-xs truncate">{{ $cu->descripcion }}</td>
                                <td class="p-4 flex justify-center space-x-2">
                                    <button onclick="openEditCurso({{ json_encode($cu) }})" class="px-3 py-1.5 rounded-lg bg-amber-500/10 border border-amber-500/20 text-amber-400 font-bold uppercase text-[10px] hover:bg-amber-500/20 transition-colors cursor-pointer">Editar</button>
                                    <form action="{{ route('cursos.destroy', $cu->id_curso) }}" method="POST" onsubmit="return confirm('¿Eliminar curso?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 font-bold uppercase text-[10px] hover:bg-red-500/20 transition-colors cursor-pointer">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section id="pane-profesores" class="hidden tab-pane">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold tracking-wider uppercase">Tabla de Profesores</h1>
                    <p class="text-xs text-gray-400 mt-1">Plana docente asignada a la escuela de TI</p>
                </div>
                <button onclick="openModal('modal-profesor-add')" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 font-bold text-xs tracking-widest uppercase hover:brightness-110 transition-all cursor-pointer shadow-lg shadow-cyan-500/10">
                    Agregar Profesor
                </button>
            </div>

            <div class="bg-[#0f172a]/40 border border-white/5 rounded-2xl overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-gray-950/40 text-gray-400 font-bold tracking-wider uppercase border-b border-white/5">
                                <th class="p-4">ID</th><th class="p-4">Instructor / Docente</th><th class="p-4">Apellidos</th><th class="p-4">Especialidad Principal</th><th class="p-4 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 font-medium">
                            @foreach($profesores as $pr)
                            <tr class="hover:bg-white/[0.02] transition-colors">
                                <td class="p-4 text-gray-500">{{ $pr->id_profesor }}</td>
                                <td class="p-4 font-bold text-white">{{ $pr->nombre }}</td>
                                <td class="p-4 text-gray-300">{{ $pr->apellidos }}</td>
                                <td class="p-4 text-cyan-400 font-semibold">{{ $pr->especialidad }}</td>
                                <td class="p-4 flex justify-center space-x-2">
                                    <button onclick="openEditProfesor({{ json_encode($pr) }})" class="px-3 py-1.5 rounded-lg bg-amber-500/10 border border-amber-500/20 text-amber-400 font-bold uppercase text-[10px] hover:bg-amber-500/20 transition-colors cursor-pointer">Editar</button>
                                    <form action="{{ route('profesores.destroy', $pr->id_profesor) }}" method="POST" onsubmit="return confirm('¿Eliminar profesor?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 font-bold uppercase text-[10px] hover:bg-red-500/20 transition-colors cursor-pointer">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <div id="modal-alumno-add" class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-[#0f172a] border border-white/10 p-8 rounded-2xl w-full max-w-lg shadow-2xl">
            <h2 class="text-base font-bold uppercase tracking-wider text-white mb-6">Nuevo Alumno</h2>
            <form action="{{ route('alumnos.store') }}" method="POST" class="space-y-4 text-xs">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Nombre</label><input type="text" name="nombre" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Apellidos</label><input type="text" name="apellidos" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">DNI</label><input type="text" name="dni" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Fecha Nacimiento</label><input type="date" name="fecha_nacimiento" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                </div>
                <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Email</label><input type="email" name="email" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Teléfono</label><input type="text" name="telefono" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Estado</label><select name="estado_matricula" class="w-full px-4 py-3 rounded-xl bg-[#1e293b] border border-white/5 text-white outline-none focus:border-cyan-500"><option value="matriculado">Matriculado</option><option value="inactivo">Inactivo</option></select></div>
                </div>
                <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Dirección</label><input type="text" name="direccion" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                <div class="flex justify-end space-x-2 pt-4"><button type="button" onclick="closeModal('modal-alumno-add')" class="px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold tracking-widest uppercase cursor-pointer">Cancelar</button><button type="submit" class="px-5 py-3 rounded-xl bg-blue-600 font-bold tracking-widest uppercase hover:bg-blue-700 cursor-pointer">Guardar Alumno</button></div>
            </form>
        </div>
    </div>

    <div id="modal-alumno-edit" class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-[#0f172a] border border-white/10 p-8 rounded-2xl w-full max-w-lg shadow-2xl">
            <h2 class="text-base font-bold uppercase tracking-wider text-white mb-6">Editar Alumno</h2>
            <form id="form-alumno-edit" method="POST" class="space-y-4 text-xs">
                @csrf @method('PUT')
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Nombre</label><input type="text" name="nombre" id="edit-al-nombre" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Apellidos</label><input type="text" name="apellidos" id="edit-al-apellidos" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">DNI</label><input type="text" name="dni" id="edit-al-dni" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Estado</label><select name="estado_matricula" id="edit-al-estado" class="w-full px-4 py-3 rounded-xl bg-[#1e293b] border border-white/5 text-white outline-none focus:border-cyan-500"><option value="matriculado">Matriculado</option><option value="inactivo">Inactivo</option></select></div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Teléfono</label><input type="text" name="telefono" id="edit-al-telefono" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Email</label><input type="email" name="email" id="edit-al-email" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                </div>
                <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Dirección</label><input type="text" name="direccion" id="edit-al-direccion" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                <div class="flex justify-end space-x-2 pt-4"><button type="button" onclick="closeModal('modal-alumno-edit')" class="px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold tracking-widest uppercase cursor-pointer">Cancelar</button><button type="submit" class="px-5 py-3 rounded-xl bg-blue-600 font-bold tracking-widest uppercase hover:bg-blue-700 cursor-pointer">Actualizar</button></div>
            </form>
        </div>
    </div>

    <div id="modal-curso-add" class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-[#0f172a] border border-white/10 p-8 rounded-2xl w-full max-w-md shadow-2xl">
            <h2 class="text-base font-bold uppercase tracking-wider text-white mb-6">Nuevo Curso</h2>
            <form action="{{ route('cursos.store') }}" method="POST" class="space-y-4 text-xs">
                @csrf
                <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Nombre del Curso</label><input type="text" name="nombre_curso" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Código Curso</label><input type="text" name="codigo_curso" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Créditos</label><input type="number" name="creditos" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                </div>
                <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Descripción</label><textarea name="descripcion" class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500 h-24 resize-none"></textarea></div>
                <div class="flex justify-end space-x-2 pt-4"><button type="button" onclick="closeModal('modal-curso-add')" class="px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold tracking-widest uppercase cursor-pointer">Cancelar</button><button type="submit" class="px-5 py-3 rounded-xl bg-blue-600 font-bold tracking-widest uppercase hover:bg-blue-700 cursor-pointer">Guardar</button></div>
            </form>
        </div>
    </div>

    <div id="modal-curso-edit" class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-[#0f172a] border border-white/10 p-8 rounded-2xl w-full max-w-md shadow-2xl">
            <h2 class="text-base font-bold uppercase tracking-wider text-white mb-6">Editar Curso</h2>
            <form id="form-curso-edit" method="POST" class="space-y-4 text-xs">
                @csrf @method('PUT')
                <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Nombre del Curso</label><input type="text" name="nombre_curso" id="edit-cu-nombre" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Código Curso</label><input type="text" name="codigo_curso" id="edit-cu-codigo" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                    <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Créditos</label><input type="number" name="creditos" id="edit-cu-creditos" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                </div>
                <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Descripción</label><textarea name="descripcion" id="edit-cu-descripcion" class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500 h-24 resize-none"></textarea></div>
                <div class="flex justify-end space-x-2 pt-4"><button type="button" onclick="closeModal('modal-curso-edit')" class="px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold tracking-widest uppercase cursor-pointer">Cancelar</button><button type="submit" class="px-5 py-3 rounded-xl bg-blue-600 font-bold tracking-widest uppercase hover:bg-blue-700 cursor-pointer">Actualizar</button></div>
            </form>
        </div>
    </div>

    <div id="modal-profesor-add" class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-[#0f172a] border border-white/10 p-8 rounded-2xl w-full max-w-md shadow-2xl">
            <h2 class="text-base font-bold uppercase tracking-wider text-white mb-6">Nuevo Profesor</h2>
            <form action="{{ route('profesores.store') }}" method="POST" class="space-y-4 text-xs">
                @csrf
                <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Nombre</label><input type="text" name="nombre" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Apellidos</label><input type="text" name="apellidos" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Especialidad Principal</label><input type="text" name="especialidad" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                <div class="flex justify-end space-x-2 pt-4"><button type="button" onclick="closeModal('modal-profesor-add')" class="px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold tracking-widest uppercase cursor-pointer">Cancelar</button><button type="submit" class="px-5 py-3 rounded-xl bg-blue-600 font-bold tracking-widest uppercase hover:bg-blue-700 cursor-pointer">Guardar</button></div>
            </form>
        </div>
    </div>

    <div id="modal-profesor-edit" class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-[#0f172a] border border-white/10 p-8 rounded-2xl w-full max-w-md shadow-2xl">
            <h2 class="text-base font-bold uppercase tracking-wider text-white mb-6">Editar Profesor</h2>
            <form id="form-profesor-edit" method="POST" class="space-y-4 text-xs">
                @csrf @method('PUT')
                <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Nombre</label><input type="text" name="nombre" id="edit-pr-nombre" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Apellidos</label><input type="text" name="apellidos" id="edit-pr-apellidos" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                <div><label class="block text-gray-400 font-bold uppercase tracking-wider mb-2">Especialidad Principal</label><input type="text" name="especialidad" id="edit-pr-especialidad" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/50 border border-white/5 text-white outline-none focus:border-cyan-500"></div>
                <div class="flex justify-end space-x-2 pt-4"><button type="button" onclick="closeModal('modal-profesor-edit')" class="px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold tracking-widest uppercase cursor-pointer">Cancelar</button><button type="submit" class="px-5 py-3 rounded-xl bg-blue-600 font-bold tracking-widest uppercase hover:bg-blue-700 cursor-pointer">Actualizar</button></div>
            </form>
        </div>
    </div>

    <script>
        // Control de Pestañas Persistentes ante Recargas del Framework
        function switchTab(tabId) {
            document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.add('hidden'));
            document.getElementById('pane-' + tabId).classList.remove('hidden');

            document.querySelectorAll('nav button').forEach(btn => {
                btn.classList.remove('bg-gradient-to-r', 'from-blue-600', 'to-cyan-500', 'text-white', 'shadow-md');
                btn.classList.add('text-gray-400', 'hover:text-white');
            });

            const activeBtn = document.getElementById('btn-' + tabId);
            activeBtn.classList.remove('text-gray-400', 'hover:text-white');
            activeBtn.classList.add('bg-gradient-to-r', 'from-blue-600', 'to-cyan-500', 'text-white', 'shadow-md');
            
            localStorage.setItem('active_matricula_tab', tabId);
        }

        function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        // Mapeo Dinámico de Datos a Modales de Edición
        function openEditAlumno(data) {
            document.getElementById('form-alumno-edit').action = "/gestion/alumnos/update/" + data.id_alumno;
            document.getElementById('edit-al-nombre').value = data.nombre;
            document.getElementById('edit-al-apellidos').value = data.apellidos;
            document.getElementById('edit-al-dni').value = data.dni;
            document.getElementById('edit-al-estado').value = data.estado_matricula;
            document.getElementById('edit-al-telefono').value = data.telefono;
            document.getElementById('edit-al-email').value = data.email;
            document.getElementById('edit-al-direccion').value = data.direccion;
            openModal('modal-alumno-edit');
        }

        function openEditCurso(data) {
            document.getElementById('form-curso-edit').action = "/gestion/cursos/update/" + data.id_curso;
            document.getElementById('edit-cu-nombre').value = data.nombre_curso;
            document.getElementById('edit-cu-codigo').value = data.codigo_curso;
            document.getElementById('edit-cu-creditos').value = data.creditos;
            document.getElementById('edit-cu-descripcion').value = data.descripcion;
            openModal('modal-curso-edit');
        }

        function openEditProfesor(data) {
            document.getElementById('form-profesor-edit').action = "/gestion/profesores/update/" + data.id_profesor;
            document.getElementById('edit-pr-nombre').value = data.nombre;
            document.getElementById('edit-pr-apellidos').value = data.apellidos;
            document.getElementById('edit-pr-especialidad').value = data.especialidad;
            openModal('modal-profesor-edit');
        }

        // Inicialización de foco nativo según la última acción del servidor
        document.addEventListener("DOMContentLoaded", function() {
            const serverTab = "{{ session('tab') }}";
            const localTab = localStorage.getItem('active_matricula_tab');
            const defaultTab = serverTab ? serverTab : (localTab ? localTab : 'alumnos');
            switchTab(defaultTab);
        });
    </script>
</body>
</html>
