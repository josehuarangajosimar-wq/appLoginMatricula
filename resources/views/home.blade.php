<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Matrículas - SENATI</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .glass-panel {
            background: rgba(4, 15, 12, 0.55);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(16, 185, 129, 0.1);
        }
        .glass-input {
            background: rgba(3, 7, 6, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.04);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-input:focus {
            border-color: #10b981;
            box-shadow: 0 0 15px rgba(16, 185, 129, 0.2);
        }
    </style>
</head>
<body class="bg-[#020504] min-h-screen text-white font-sans antialiased pb-16 select-none relative overflow-x-hidden">
    
    <canvas id="bg-canvas" class="absolute inset-0 w-full h-full object-cover pointer-events-none z-0"></canvas>

    <nav class="bg-[#040f0c]/70 backdrop-blur-md border-b border-emerald-500/10 sticky top-0 z-40 px-6 py-4">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center space-x-3">
                <span class="text-xl font-bold tracking-widest text-emerald-400 uppercase">SENATI</span>
                <span class="text-xs text-emerald-500/50 font-bold tracking-widest uppercase">| Escuela de TI</span>
            </div>
            
            <div class="flex bg-black/50 p-1 border border-emerald-500/10 rounded-xl space-x-1">
                <button onclick="switchTab('alumnos')" id="btn-alumnos" class="px-5 py-2 text-[10px] font-bold tracking-widest uppercase rounded-lg transition-all duration-300 cursor-pointer">Alumnos</button>
                <button onclick="switchTab('cursos')" id="btn-cursos" class="px-5 py-2 text-[10px] font-bold tracking-widest uppercase rounded-lg transition-all duration-300 cursor-pointer">Cursos</button>
                <button onclick="switchTab('profesores')" id="btn-profesores" class="px-5 py-2 text-[10px] font-bold tracking-widest uppercase rounded-lg transition-all duration-300 cursor-pointer">Profesores</button>
            </div>

            <div class="flex items-center space-x-4">
                <div class="text-right hidden sm:block">
                    <p class="text-xs font-bold text-white uppercase tracking-wider">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] font-bold text-emerald-500/60 uppercase tracking-widest">Rol: Administrador</p>
                </div>
                <div class="h-6 w-px bg-emerald-500/10"></div>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-[10px] font-bold tracking-widest text-red-400 hover:text-red-300 transition-colors uppercase">
                    Cerrar sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 mt-8 relative z-10">
        
        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-bold uppercase tracking-wider">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
            <div class="glass-panel p-5 rounded-2xl border-l-2 border-l-emerald-500">
                <p class="text-[9px] font-bold text-emerald-500/60 uppercase tracking-widest">Total Alumnos</p>
                <p class="text-2xl font-bold text-white tracking-wider mt-1">{{ count($alumnos) }} <span class="text-xs text-gray-500">Registrados</span></p>
            </div>
            <div class="glass-panel p-5 rounded-2xl border-l-2 border-l-amber-500">
                <p class="text-[9px] font-bold text-emerald-500/60 uppercase tracking-widest">Cursos del Ciclo</p>
                <p class="text-2xl font-bold text-white tracking-wider mt-1">{{ count($cursos) }} <span class="text-xs text-gray-500 font-medium">Asignaturas</span></p>
            </div>
            <div class="glass-panel p-5 rounded-2xl border-l-2 border-l-teal-500">
                <p class="text-[9px] font-bold text-emerald-500/60 uppercase tracking-widest">Instructor Responsable</p>
                <p class="text-sm font-bold text-teal-400 tracking-wider mt-2.5 uppercase">Giancarlos Barboza N.</p>
            </div>
        </div>

        <section id="pane-alumnos" class="hidden tab-pane">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-lg font-bold tracking-widest uppercase">Ecosistema de Alumnos</h1>
                    <p class="text-[10px] text-emerald-500/50 font-bold uppercase tracking-widest mt-1">Matrícula y control de perfiles</p>
                </div>
                <button onclick="openModal('modal-alumno-add')" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-500 hover:brightness-110 font-bold text-xs tracking-widest uppercase transition-all cursor-pointer border border-emerald-400/10 shadow-lg">
                    Agregar Alumno
                </button>
            </div>

            <div class="glass-panel rounded-2xl overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-black/40 text-emerald-400 font-bold tracking-widest uppercase border-b border-emerald-500/10">
                                <th class="p-4">ID</th>
                                <th class="p-4">Alumno</th>
                                <th class="p-4">Apellidos</th>
                                <th class="p-4">DNI</th>
                                <th class="p-4">Teléfono</th>
                                <th class="p-4">Dirección</th>
                                <th class="p-4">Estado</th>
                                <th class="p-4 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-emerald-500/5 font-medium text-gray-300">
                            @foreach($alumnos as $al)
                            <tr class="hover:bg-emerald-500/[0.02] transition-colors">
                                <td class="p-4 text-emerald-500/40">{{ $al->id_alumno }}</td>
                                <td class="p-4 font-bold text-white uppercase">{{ $al->nombre }}</td>
                                <td class="p-4 uppercase">{{ $al->apellidos }}</td>
                                <td class="p-4 tracking-widest text-emerald-400">{{ $al->dni }}</td>
                                <td class="p-4">{{ $al->telefono }}</td>
                                <td class="p-4 text-gray-400 uppercase">{{ $al->direccion }}</td>
                                <td class="p-4">
                                    <span class="px-2.5 py-1 rounded text-[9px] font-bold uppercase tracking-widest {{ $al->estado_matricula == 'matriculado' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-red-500/10 text-red-400 border border-red-500/20' }}">
                                        {{ $al->estado_matricula }}
                                    </span>
                                </td>
                                <td class="p-4 flex justify-center space-x-2">
                                    <button onclick="openEditAlumno(this)" 
                                            data-id_alumno="{{ $al->id_alumno }}"
                                            data-nombre="{{ $al->nombre }}"
                                            data-apellidos="{{ $al->apellidos }}"
                                            data-dni="{{ $al->dni }}"
                                            data-telefono="{{ $al->telefono }}"
                                            data-email="{{ $al->email }}"
                                            data-direccion="{{ $al->direccion }}"
                                            data-estado="{{ $al->estado_matricula }}"
                                            class="px-3 py-1.5 rounded-lg bg-amber-500/10 border border-amber-500/20 text-amber-400 font-bold uppercase text-[9px] hover:bg-amber-500/20 transition-colors cursor-pointer tracking-wider">
                                        Editar
                                    </button>
                                    <form action="{{ route('alumnos.destroy', $al->id_alumno) }}" method="POST" onsubmit="return confirm('¿Seguro de eliminar el registro?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 font-bold uppercase text-[9px] hover:bg-red-500/20 transition-colors cursor-pointer tracking-wider">Eliminar</button>
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
                    <h1 class="text-lg font-bold tracking-widest uppercase">Ecosistema de Cursos</h1>
                    <p class="text-[10px] text-emerald-500/50 font-bold uppercase tracking-widest mt-1">Especialidades académicas curriculares</p>
                </div>
                <button onclick="openModal('modal-curso-add')" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-500 hover:brightness-110 font-bold text-xs tracking-widest uppercase transition-all cursor-pointer border border-emerald-400/10 shadow-lg">
                    Agregar Curso
                </button>
            </div>

            <div class="glass-panel rounded-2xl overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-black/40 text-emerald-400 font-bold tracking-widest uppercase border-b border-emerald-500/10">
                                <th class="p-4">ID</th>
                                <th class="p-4">Código</th>
                                <th class="p-4">Especialidad</th>
                                <th class="p-4 text-center">Créditos</th>
                                <th class="p-4">Detalle Académico</th>
                                <th class="p-4 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-emerald-500/5 font-medium text-gray-300">
                            @foreach($cursos as $cu)
                            <tr class="hover:bg-emerald-500/[0.02] transition-colors">
                                <td class="p-4 text-emerald-500/40">{{ $cu->id_curso }}</td>
                                <td class="p-4 tracking-widest font-bold text-emerald-400 uppercase">{{ $cu->codigo_curso }}</td>
                                <td class="p-4 text-white uppercase font-bold">{{ $cu->nombre_curso }}</td>
                                <td class="p-4 text-center font-bold text-amber-400">{{ $cu->creditos }}</td>
                                <td class="p-4 text-gray-400 max-w-xs truncate">{{ $cu->descripcion }}</td>
                                <td class="p-4 flex justify-center space-x-2">
                                    <button onclick="openEditCurso(this)"
                                            data-id_curso="{{ $cu->id_curso }}"
                                            data-nombre_curso="{{ $cu->nombre_curso }}"
                                            data-codigo_curso="{{ $cu->codigo_curso }}"
                                            data-creditos="{{ $cu->creditos }}"
                                            data-descripcion="{{ $cu->descripcion }}"
                                            class="px-3 py-1.5 rounded-lg bg-amber-500/10 border border-amber-500/20 text-amber-400 font-bold uppercase text-[9px] hover:bg-amber-500/20 transition-colors cursor-pointer tracking-wider">
                                        Editar
                                    </button>
                                    <form action="{{ route('cursos.destroy', $cu->id_curso) }}" method="POST" onsubmit="return confirm('¿Eliminar curso?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 font-bold uppercase text-[9px] hover:bg-red-500/20 transition-colors cursor-pointer tracking-wider">Eliminar</button>
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
                    <h1 class="text-lg font-bold tracking-widest uppercase">Plana Docente</h1>
                    <p class="text-[10px] text-emerald-500/50 font-bold uppercase tracking-widest mt-1">Especialistas asignados de la Escuela de TI</p>
                </div>
                <button onclick="openModal('modal-profesor-add')" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-500 hover:brightness-110 font-bold text-xs tracking-widest uppercase transition-all cursor-pointer border border-emerald-400/10 shadow-lg">
                    Agregar Profesor
                </button>
            </div>

            <div class="glass-panel rounded-2xl overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-black/40 text-emerald-400 font-bold tracking-widest uppercase border-b border-emerald-500/10">
                                <th class="p-4">ID</th>
                                <th class="p-4">Nombres</th>
                                <th class="p-4">Apellidos</th>
                                <th class="p-4">Especialidad Principal</th>
                                <th class="p-4 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-emerald-500/5 font-medium text-gray-300">
                            @foreach($profesores as $pr)
                            <tr class="hover:bg-emerald-500/[0.02] transition-colors">
                                <td class="p-4 text-emerald-500/40">{{ $pr->id_profesor }}</td>
                                <td class="p-4 font-bold text-white uppercase">{{ $pr->nombre }}</td>
                                <td class="p-4 uppercase">{{ $pr->apellidos }}</td>
                                <td class="p-4 text-emerald-400 font-bold uppercase">{{ $pr->especialidad }}</td>
                                <td class="p-4 flex justify-center space-x-2">
                                    <button onclick="openEditProfesor(this)"
                                            data-id_profesor="{{ $pr->id_profesor }}"
                                            data-nombre="{{ $pr->nombre }}"
                                            data-apellidos="{{ $pr->apellidos }}"
                                            data-especialidad="{{ $pr->especialidad }}"
                                            class="px-3 py-1.5 rounded-lg bg-amber-500/10 border border-amber-500/20 text-amber-400 font-bold uppercase text-[9px] hover:bg-amber-500/20 transition-colors cursor-pointer tracking-wider">
                                        Editar
                                    </button>
                                    <form action="{{ route('profesores.destroy', $pr->id_profesor) }}" method="POST" onsubmit="return confirm('¿Eliminar profesor?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 font-bold uppercase text-[9px] hover:bg-red-500/20 transition-colors cursor-pointer tracking-wider">Eliminar</button>
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

    <div id="modal-alumno-add" class="fixed inset-0 bg-black/80 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="glass-panel p-8 rounded-2xl w-full max-w-lg shadow-2xl relative">
            <h2 class="text-sm font-bold uppercase tracking-widest text-white mb-6">Nuevo Alumno</h2>
            <form action="{{ route('alumnos.store') }}" method="POST" class="space-y-4 text-[10px]">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Nombre</label><input type="text" name="nombre" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Apellidos</label><input type="text" name="apellidos" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">DNI</label><input type="text" name="dni" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Fecha Nacimiento</label><input type="date" name="fecha_nacimiento" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                </div>
                <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Email Institucional</label><input type="email" name="email" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Teléfono</label><input type="text" name="telefono" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Estado</label><select name="estado_matricula" class="w-full px-4 py-3.5 rounded-xl bg-[#030706] border border-white/5 text-white text-xs outline-none focus:border-emerald-500"><option value="matriculado">Matriculado</option><option value="inactivo">Inactivo</option></select></div>
                </div>
                <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Dirección de Residencia</label><input type="text" name="direccion" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                <div class="flex justify-end space-x-2 pt-4"><button type="button" onclick="closeModal('modal-alumno-add')" class="px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold tracking-widest uppercase cursor-pointer">Cancelar</button><button type="submit" class="px-5 py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-500 font-bold tracking-widest uppercase cursor-pointer">Guardar Alumno</button></div>
            </form>
        </div>
    </div>

    <div id="modal-alumno-edit" class="fixed inset-0 bg-black/80 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="glass-panel p-8 rounded-2xl w-full max-w-lg shadow-2xl relative">
            <h2 class="text-sm font-bold uppercase tracking-widest text-white mb-6">Editar Alumno</h2>
            <form id="form-alumno-edit" method="POST" class="space-y-4 text-[10px]">
                @csrf @method('PUT')
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Nombre</label><input type="text" name="nombre" id="edit-al-nombre" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Apellidos</label><input type="text" name="apellidos" id="edit-al-apellidos" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">DNI</label><input type="text" name="dni" id="edit-al-dni" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Estado</label><select name="estado_matricula" id="edit-al-estado" class="w-full px-4 py-3.5 rounded-xl bg-[#030706] border border-white/5 text-white text-xs outline-none focus:border-emerald-500"><option value="matriculado">Matriculado</option><option value="inactivo">Inactivo</option></select></div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Teléfono</label><input type="text" name="telefono" id="edit-al-telefono" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Email</label><input type="email" name="email" id="edit-al-email" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                </div>
                <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Dirección</label><input type="text" name="direccion" id="edit-al-direccion" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                <div class="flex justify-end space-x-2 pt-4"><button type="button" onclick="closeModal('modal-alumno-edit')" class="px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold tracking-widest uppercase cursor-pointer">Cancelar</button><button type="submit" class="px-5 py-3 rounded-xl bg-emerald-600 font-bold tracking-widest uppercase cursor-pointer">Actualizar</button></div>
            </form>
        </div>
    </div>

    <div id="modal-curso-add" class="fixed inset-0 bg-black/80 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="glass-panel p-8 rounded-2xl w-full max-w-md shadow-2xl relative">
            <h2 class="text-sm font-bold uppercase tracking-widest text-white mb-6">Nuevo Curso</h2>
            <form action="{{ route('cursos.store') }}" method="POST" class="space-y-4 text-[10px]">
                @csrf
                <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Nombre del Curso</label><input type="text" name="nombre_curso" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Código Curso</label><input type="text" name="codigo_curso" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Créditos</label><input type="number" name="creditos" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                </div>
                <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Descripción</label><textarea name="descripcion" class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none h-24 resize-none"></textarea></div>
                <div class="flex justify-end space-x-2 pt-4"><button type="button" onclick="closeModal('modal-curso-add')" class="px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold tracking-widest uppercase cursor-pointer">Cancelar</button><button type="submit" class="px-5 py-3 rounded-xl bg-emerald-600 font-bold tracking-widest uppercase cursor-pointer">Guardar</button></div>
            </form>
        </div>
    </div>

    <div id="modal-curso-edit" class="fixed inset-0 bg-black/80 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="glass-panel p-8 rounded-2xl w-full max-w-md shadow-2xl relative">
            <h2 class="text-sm font-bold uppercase tracking-widest text-white mb-6">Editar Curso</h2>
            <form id="form-curso-edit" method="POST" class="space-y-4 text-[10px]">
                @csrf @method('PUT')
                <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Nombre del Curso</label><input type="text" name="nombre_curso" id="edit-cu-nombre" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Código Curso</label><input type="text" name="codigo_curso" id="edit-cu-codigo" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                    <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Créditos</label><input type="number" name="creditos" id="edit-cu-creditos" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                </div>
                <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Descripción</label><textarea name="descripcion" id="edit-cu-descripcion" class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none h-24 resize-none"></textarea></div>
                <div class="flex justify-end space-x-2 pt-4"><button type="button" onclick="closeModal('modal-curso-edit')" class="px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold tracking-widest uppercase cursor-pointer">Cancelar</button><button type="submit" class="px-5 py-3 rounded-xl bg-emerald-600 font-bold tracking-widest uppercase cursor-pointer">Actualizar</button></div>
            </form>
        </div>
    </div>

    <div id="modal-profesor-add" class="fixed inset-0 bg-black/80 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="glass-panel p-8 rounded-2xl w-full max-w-md shadow-2xl relative">
            <h2 class="text-sm font-bold uppercase tracking-widest text-white mb-6">Nuevo Profesor</h2>
            <form action="{{ route('profesores.store') }}" method="POST" class="space-y-4 text-[10px]">
                @csrf
                <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Nombre</label><input type="text" name="nombre" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Apellidos</label><input type="text" name="apellidos" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Especialidad Principal</label><input type="text" name="especialidad" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                <div class="flex justify-end space-x-2 pt-4"><button type="button" onclick="closeModal('modal-profesor-add')" class="px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold tracking-widest uppercase cursor-pointer">Cancelar</button><button type="submit" class="px-5 py-3 rounded-xl bg-emerald-600 font-bold tracking-widest uppercase cursor-pointer">Guardar</button></div>
            </form>
        </div>
    </div>

    <div id="modal-profesor-edit" class="fixed inset-0 bg-black/80 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="glass-panel p-8 rounded-2xl w-full max-w-md shadow-2xl relative">
            <h2 class="text-sm font-bold uppercase tracking-widest text-white mb-6">Editar Profesor</h2>
            <form id="form-profesor-edit" method="POST" class="space-y-4 text-[10px]">
                @csrf @method('PUT')
                <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Nombre</label><input type="text" name="nombre" id="edit-pr-nombre" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Apellidos</label><input type="text" name="apellidos" id="edit-pr-apellidos" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                <div><label class="block text-emerald-400/80 font-bold uppercase tracking-widest mb-2">Especialidad Principal</label><input type="text" name="especialidad" id="edit-pr-especialidad" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-xs outline-none"></div>
                <div class="flex justify-end space-x-2 pt-4"><button type="button" onclick="closeModal('modal-profesor-edit')" class="px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold tracking-widest uppercase cursor-pointer">Cancelar</button><button type="submit" class="px-5 py-3 rounded-xl bg-emerald-600 font-bold tracking-widest uppercase cursor-pointer">Actualizar</button></div>
            </form>
        </div>
    </div>

    <script>
        const canvas = document.getElementById('bg-canvas');
        const ctx = canvas.getContext('2d');

        let width = canvas.width = window.innerWidth;
        let height = canvas.height = window.innerHeight;

        window.addEventListener('resize', () => {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        });

        const particles = [];
        const count = 35;

        for (let i = 0; i < count; i++) {
            particles.push({
                x: Math.random() * width,
                y: Math.random() * height,
                vx: (Math.random() - 0.5) * 0.3,
                vy: (Math.random() - 0.5) * 0.3,
                radius: Math.random() * 2 + 1,
                alpha: Math.random() * 0.4 + 0.1
            });
        }

        const auroras = [
            { x: width * 0.1, y: height * 0.1, targetX: width * 0.1, targetY: height * 0.1, r: width * 0.4, color: 'rgba(16, 185, 129, 0.03)' },
            { x: width * 0.9, y: height * 0.9, targetX: width * 0.9, targetY: height * 0.9, r: width * 0.45, color: 'rgba(5, 150, 105, 0.02)' }
        ];

        function animate() {
            ctx.fillStyle = '#020504';
            ctx.fillRect(0, 0, width, height);

            auroras.forEach(a => {
                a.x += (a.targetX - a.x) * 0.01;
                a.y += (a.targetY - a.y) * 0.01;
                if (Math.abs(a.x - a.targetX) < 10) {
                    a.targetX = Math.random() * width;
                    a.targetY = Math.random() * height;
                }
                let grad = ctx.createRadialGradient(a.x, a.y, 0, a.x, a.y, a.r);
                grad.addColorStop(0, a.color);
                grad.addColorStop(1, 'rgba(2, 5, 4, 0)');
                ctx.fillStyle = grad;
                ctx.beginPath();
                ctx.arc(a.x, a.y, a.r, 0, Math.PI * 2);
                ctx.fill();
            });

            particles.forEach((p, index) => {
                p.x += p.vx;
                p.y += p.vy;

                if (p.x < 0 || p.x > width) p.vx *= -1;
                if (p.y < 0 || p.y > height) p.vy *= -1;

                ctx.fillStyle = `rgba(16, 185, 129, ${p.alpha})`;
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                ctx.fill();

                for (let j = index + 1; j < count; j++) {
                    let p2 = particles[j];
                    let dist = Math.hypot(p.x - p2.x, p.y - p2.y);
                    if (dist < 140) {
                        ctx.strokeStyle = `rgba(16, 185, 129, ${(1 - dist/140) * 0.05})`;
                        ctx.lineWidth = 0.5;
                        ctx.beginPath();
                        ctx.moveTo(p.x, p.y);
                        ctx.lineTo(p2.x, p2.y);
                        ctx.stroke();
                    }
                }
            });

            requestAnimationFrame(animate);
        }

        animate();

        // Controladores de Pestañas y Modales mediante extracción selectiva de Atributos de Datos
        function switchTab(tabId) {
            document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.add('hidden'));
            document.getElementById('pane-' + tabId).classList.remove('hidden');

            document.querySelectorAll('nav button').forEach(btn => {
                btn.classList.remove('bg-gradient-to-r', 'from-emerald-600', 'to-teal-500', 'text-white', 'shadow-md');
                btn.classList.add('text-emerald-500/50', 'hover:text-emerald-300');
            });

            const activeBtn = document.getElementById('btn-' + tabId);
            activeBtn.classList.remove('text-emerald-500/50', 'hover:text-emerald-300');
            activeBtn.classList.add('bg-gradient-to-r', 'from-emerald-600', 'to-teal-500', 'text-white', 'shadow-md');
            
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

        function openEditAlumno(button) {
            // Lectura de los selectores HTML puros libres de JSON stringificado
            const id = button.getAttribute('data-id_alumno');
            const nombre = button.getAttribute('data-nombre');
            const apellidos = button.getAttribute('data-apellidos');
            const dni = button.getAttribute('data-dni');
            const telefono = button.getAttribute('data-telefono');
            const email = button.getAttribute('data-email');
            const direccion = button.getAttribute('data-direccion');
            const estado = button.getAttribute('data-estado');

            document.getElementById('form-alumno-edit').action = "/gestion/alumnos/update/" + id;
            document.getElementById('edit-al-nombre').value = nombre;
            document.getElementById('edit-al-apellidos').value = apellidos;
            document.getElementById('edit-al-dni').value = dni;
            document.getElementById('edit-al-estado').value = estado;
            document.getElementById('edit-al-telefono').value = telefono;
            document.getElementById('edit-al-email').value = email;
            document.getElementById('edit-al-direccion').value = direccion;
            openModal('modal-alumno-edit');
        }

        function openEditCurso(button) {
            const id = button.getAttribute('data-id_curso');
            const nombre = button.getAttribute('data-nombre_curso');
            const codigo = button.getAttribute('data-codigo_curso');
            const creditos = button.getAttribute('data-creditos');
            const descripcion = button.getAttribute('data-descripcion');

            document.getElementById('form-curso-edit').action = "/gestion/cursos/update/" + id;
            document.getElementById('edit-cu-nombre').value = nombre;
            document.getElementById('edit-cu-codigo').value = codigo;
            document.getElementById('edit-cu-creditos').value = creditos;
            document.getElementById('edit-cu-descripcion').value = descripcion;
            openModal('modal-curso-edit');
        }

        function openEditProfesor(button) {
            const id = button.getAttribute('data-id_profesor');
            const nombre = button.getAttribute('data-nombre');
            const apellidos = button.getAttribute('data-apellidos');
            const especialidad = button.getAttribute('data-especialidad');

            document.getElementById('form-profesor-edit').action = "/gestion/profesores/update/" + id;
            document.getElementById('edit-pr-nombre').value = nombre;
            document.getElementById('edit-pr-apellidos').value = apellidos;
            document.getElementById('edit-pr-especialidad').value = especialidad;
            openModal('modal-profesor-edit');
        }

        document.addEventListener("DOMContentLoaded", function() {
            const serverTab = "{{ session('tab') }}";
            const localTab = localStorage.getItem('active_matricula_tab');
            const defaultTab = serverTab ? serverTab : (localTab ? localTab : 'alumnos');
            switchTab(defaultTab);
        });
    </script>
</body>
</html>