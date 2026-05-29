<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Matrícula - Registro Cuántico de Estudiante</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        /* Estilos Avanzados de Glassmorphism de Lujo Extremo */
        .glass-card {
            background: rgba(4, 15, 12, 0.55); /* Mayor transparencia */
            backdrop-filter: blur(40px); /* Desenfoque extremo */
            -webkit-backdrop-filter: blur(40px);
            border: 1px solid rgba(16, 185, 129, 0.15); /* Borde de Jade sutil */
            /* Efecto de iluminación dual: sombra exterior y brillo interior */
            box-shadow: 0 30px 70px rgba(0, 0, 0, 0.7), 
                        inset 0 1px 0 rgba(255, 255, 255, 0.06),
                        0 0 50px rgba(16, 185, 129, 0.05);
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.4s ease;
        }
        /* Efecto hover interactivo en la tarjeta */
        .glass-card:hover {
            transform: translateY(-8px) scale(1.01);
            box-shadow: 0 40px 90px rgba(0, 0, 0, 0.8), 
                        0 0 60px rgba(16, 185, 129, 0.1);
        }
        /* Estilos de inputs opacos estilo Obsidian */
        .glass-input {
            background: rgba(3, 7, 6, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.03);
            border-top: 1px solid rgba(255, 255, 255, 0.08); /* Sutil rim light superior */
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        /* Brillo de Verde Aurora en foco */
        .glass-input:focus {
            border-color: rgba(16, 185, 129, 0.6);
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.3),
                        inset 0 1px 0 rgba(16, 185, 129, 0.1);
            background: rgba(3, 7, 6, 0.85);
        }
        /* Animación suave para mensajes de error */
        @keyframes fadeInError {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .error-msg {
            animation: fadeInError 0.4s ease-out;
        }
    </style>
</head>
<body class="bg-[#020504] min-h-screen flex items-center justify-center p-4 sm:p-8 font-sans relative overflow-x-hidden select-none">
    
    <canvas id="bg-canvas" class="absolute inset-0 w-full h-full object-cover pointer-events-none z-0"></canvas>

    <div class="w-full max-w-2xl glass-card p-10 sm:p-12 rounded-[2.5rem] z-10 relative">
        
        <div class="flex flex-col items-center mb-10">
            <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-emerald-500/10 to-amber-500/5 border border-emerald-500/20 flex items-center justify-center shadow-2xl relative group mb-5">
                <div class="absolute inset-0 rounded-3xl bg-emerald-400/5 blur-sm group-hover:blur-md transition-all"></div>
                <svg class="w-7 h-7 text-emerald-400 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
            </div>
            
            <div class="text-center">
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-widest text-white uppercase bg-gradient-to-r from-white via-emerald-200 to-emerald-400 bg-clip-text text-transparent">
                    ALTA DE ESTUDIANTE
                </h1>
                <p class="text-emerald-500/70 text-[11px] font-bold uppercase tracking-widest mt-2">
                    Escuela de Tecnologías de la Información | SENATI
                </p>
                <p class="text-gray-500 text-[10px] mt-1 tracking-wider">Complete sus credenciales para la autenticación cuántica</p>
            </div>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6 text-[11px]">
            @csrf
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="relative group">
                    <label class="block font-bold text-emerald-400/80 uppercase tracking-widest mb-2.5 ml-1">Nombres Completos</label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full px-5 py-4 rounded-2xl glass-input text-white text-xs outline-none shadow-inner">
                    @error('name')
                        <span class="error-msg text-red-400 text-xs mt-2 block font-medium tracking-wide">{{ $message }}</span>
                    @enderror
                </div>
                <div class="relative group">
                    <label class="block font-bold text-emerald-400/80 uppercase tracking-widest mb-2.5 ml-1">Apellidos Paterno y Materno</label>
                    <input type="text" name="apellidos" value="{{ old('apellidos') }}" required class="w-full px-5 py-4 rounded-2xl glass-input text-white text-xs outline-none shadow-inner">
                    @error('apellidos')
                        <span class="error-msg text-red-400 text-xs mt-2 block font-medium tracking-wide">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="relative group">
                <label class="block font-bold text-emerald-400/80 uppercase tracking-widest mb-2.5 ml-1">Correo Electrónico Institucional</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-5 py-4 rounded-2xl glass-input text-white text-xs outline-none shadow-inner tracking-wider">
                @error('email')
                    <span class="error-msg text-red-400 text-xs mt-2 block font-medium tracking-wide">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="relative group">
                    <label class="block font-bold text-emerald-400/80 uppercase tracking-widest mb-2.5 ml-1">Número de Teléfono</label>
                    <input type="text" name="telefono" value="{{ old('telefono') }}" required class="w-full px-5 py-4 rounded-2xl glass-input text-white text-xs outline-none shadow-inner tracking-widest">
                    @error('telefono')
                        <span class="error-msg text-red-400 text-xs mt-2 block font-medium tracking-wide">{{ $message }}</span>
                    @enderror
                </div>
                <div class="relative group">
                    <label class="block font-bold text-emerald-400/80 uppercase tracking-widest mb-2.5 ml-1">Número de DNI</label>
                    <input type="text" name="dni" value="{{ old('dni') }}" required class="w-full px-5 py-4 rounded-2xl glass-input text-white text-xs outline-none shadow-inner tracking-widest">
                    @error('dni')
                        <span class="error-msg text-red-400 text-xs mt-2 block font-medium tracking-wide">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="relative group">
                    <label class="block font-bold text-emerald-400/80 uppercase tracking-widest mb-2.5 ml-1">Contraseña de Seguridad</label>
                    <input type="password" name="password" required class="w-full px-5 py-4 rounded-2xl glass-input text-white text-xs outline-none shadow-inner">
                    @error('password')
                        <span class="error-msg text-red-400 text-xs mt-2 block font-medium tracking-wide">{{ $message }}</span>
                    @enderror
                </div>
                <div class="relative group">
                    <label class="block font-bold text-emerald-400/80 uppercase tracking-widest mb-2.5 ml-1">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" required class="w-full px-4 py-4 rounded-2xl glass-input text-white text-xs outline-none shadow-inner">
                </div>
            </div>

            <div class="pt-6">
                <button type="submit" class="w-full py-4.5 rounded-2xl bg-gradient-to-r from-emerald-600 to-teal-500 hover:from-emerald-500 hover:to-teal-400 text-white font-extrabold text-xs tracking-widest uppercase transition-all duration-400 cursor-pointer shadow-lg shadow-emerald-950/40 border border-emerald-400/20 active:scale-[0.98]">
                    Finalizar Registro Cuántico
                </button>
            </div>

            <div class="relative flex py-3 items-center">
                <div class="flex-grow border-t border-emerald-500/10"></div>
            </div>

            <div class="text-center pt-2">
                <p class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">
                    ¿Ya posee credenciales de acceso?
                </p>
                <a href="{{ route('login') }}" class="inline-block mt-3 px-6 py-2.5 rounded-full bg-emerald-950/20 hover:bg-emerald-950/40 border border-emerald-500/20 text-emerald-300 text-[10px] font-bold tracking-widest uppercase transition-colors duration-300">
                    Retornar al Inicio de Sesión
                </a>
            </div>
        </form>
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

        // Configuración de partículas flotantes
        const particles = [];
        const count = 45; // Ligeramente más denso para el registro

        for (let i = 0; i < count; i++) {
            particles.push({
                x: Math.random() * width,
                y: Math.random() * height,
                vx: (Math.random() - 0.5) * 0.45,
                vy: (Math.random() - 0.5) * 0.45,
                radius: Math.random() * 2.2 + 1,
                alpha: Math.random() * 0.5 + 0.1
            });
        }

        // Configuración de las "Auroras" flotantes gigantes del fondo
        const auroras = [
            { x: width * 0.2, y: height * 0.2, targetX: width * 0.2, targetY: height * 0.2, r: width * 0.35, color: 'rgba(16, 185, 129, 0.05)' },
            { x: width * 0.8, y: height * 0.8, targetX: width * 0.8, targetY: height * 0.8, r: width * 0.4, color: 'rgba(5, 150, 105, 0.04)' },
            { x: width * 0.5, y: height * 0.5, targetX: width * 0.5, targetY: height * 0.5, r: width * 0.3, color: 'rgba(245, 158, 11, 0.02)' }
        ];

        function animate() {
            ctx.fillStyle = '#020504';
            ctx.fillRect(0, 0, width, height);

            // 1. Dibujar Auroras gigantes fluidas
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

            // 2. Dibujar y conectar partículas
            particles.forEach((p, index) => {
                p.x += p.vx;
                p.y += p.vy;

                if (p.x < 0 || p.x > width) p.vx *= -1;
                if (p.y < 0 || p.y > height) p.vy *= -1;

                ctx.fillStyle = `rgba(16, 185, 129, ${p.alpha})`;
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                ctx.fill();

                // Conectar líneas ultra finas si están cerca
                for (let j = index + 1; j < count; j++) {
                    let p2 = particles[j];
                    let dist = Math.hypot(p.x - p2.x, p.y - p2.y);
                    if (dist < 125) {
                        ctx.strokeStyle = `rgba(16, 185, 129, ${(1 - dist/125) * 0.07})`;
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
    </script>
</body>
</html>