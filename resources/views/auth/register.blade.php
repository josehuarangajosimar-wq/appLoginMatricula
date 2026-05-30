<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Académico - Registro de Credenciales Corporativas</title>
    <!-- Inyección Autónoma de Tailwind CSS de Alto Rendimiento -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        /* Animación suave de rotación del contorno de bronce */
        @keyframes rotateNeonBorder {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        /* Animación de destello metálico de lujo para el botón de confirmación */
        @keyframes goldShimmer {
            0% { transform: translateX(-100%) skewX(-15deg); }
            100% { transform: translateX(100%) skewX(-15deg); }
        }

        /* Envoltura de tarjeta con bordes cepillados de doble capa y sombra profunda */
        .executive-glow-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 3rem; /* Curvas sofisticadas y ultra profesionales */
            padding: 2px;
            box-shadow: 0 50px 100px rgba(14, 7, 3, 0.8),
                        0 0 60px rgba(184, 134, 11, 0.15);
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.4s ease;
        }
        .executive-glow-wrapper:hover {
            transform: translateY(-4px);
            box-shadow: 0 60px 110px rgba(14, 7, 3, 0.9),
                        0 0 80px rgba(184, 134, 11, 0.28);
        }
        .executive-glow-wrapper::before {
            content: '';
            position: absolute;
            top: -50%; left: -50%; width: 200%; height: 200%;
            background: conic-gradient(from 0deg, #1f1008 0%, #b8860b 35%, #3b1e0f 65%, #1f1008 100%);
            animation: rotateNeonBorder 8s linear infinite;
            z-index: 0;
        }

        /* Tarjeta de Cristal Ahumado de Inmersión Profunda y Transparencia Robusta */
        .glass-hull-dark {
            position: relative;
            z-index: 10;
            background: rgba(14, 7, 3, 0.72); /* Densidad óptima para máxima legibilidad */
            backdrop-filter: blur(50px) saturate(160%);
            -webkit-backdrop-filter: blur(50px) saturate(160%);
            border-radius: calc(3rem - 2px);
            box-shadow: inset 0 1px 3px rgba(255, 255, 255, 0.08),
                        inset 0 -1px 25px rgba(184, 134, 11, 0.03);
        }

        /* Inputs de alto contraste "Obsidian Sand" - Proporciones ejecutivas */
        .corporate-matte-input {
            background: rgba(22, 11, 5, 0.85);
            border: 1.5px solid rgba(184, 134, 11, 0.18);
            color: #fffbeb; /* Texto Champaña de altísima legibilidad */
            font-weight: 600;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .corporate-matte-input:focus {
            background: rgba(14, 7, 3, 0.95);
            border-color: #b8860b; /* Oro Champaña */
            box-shadow: 0 12px 25px rgba(184, 134, 11, 0.18),
                        0 0 0 3px rgba(184, 134, 11, 0.12);
            transform: translateY(-2px);
            outline: none;
        }

        /* Degradado de texto serio e institucional */
        .text-gradient-corporate {
            background: linear-gradient(135deg, #fffbeb 0%, #d97706 60%, #b8860b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Botón Espresso Shimmer Gold de gama alta */
        .shimmer-vivid-btn {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #2b180a 0%, #5c3a21 50%, #b8860b 100%);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .shimmer-vivid-btn::after {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transform: translateX(-100%);
            animation: goldShimmer 3s infinite linear;
        }
        .shimmer-vivid-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 45px rgba(184, 134, 11, 0.3);
            filter: brightness(1.08);
        }
        .shimmer-vivid-btn:active {
            transform: translateY(-1px) scale(0.99);
        }
    </style>
</head>
<body class="bg-[#0e0704] min-h-screen p-6 md:p-12 lg:p-16 font-sans relative overflow-x-hidden select-none flex items-center">
    
    <!-- Lienzo del Motor Gráfico: Quantum Golden Fluid (Movimiento Continuo de Hilos de Oro) -->
    <canvas id="iridescent-canvas" class="absolute inset-0 w-full h-full object-cover pointer-events-none z-0"></canvas>

    <!-- Distribución de Rejilla: Desplazamiento Izquierdo y Espacio Derecho Reservado -->
    <div class="w-full max-w-[1440px] ml-0 lg:ml-12 xl:ml-20 mr-auto grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
        
        <!-- COLUMNA IZQUIERDA: Tarjeta con Tamaño Adecuado y Amplio para Llenado Cómodo (Ocupa 5 de 12 columnas) -->
        <div class="lg:col-span-5 xl:col-span-4.5 w-full max-w-[520px]">
            <!-- Envoltura de Luz Cónica Rotativa -->
            <div class="executive-glow-wrapper shadow-2xl">
                <!-- Cuerpo de la Tarjeta Esmerilada -->
                <div class="glass-hull-dark p-8 sm:p-12 flex flex-col">
                    
                    <!-- Encabezado Institucional -->
                    <div class="flex flex-col items-center mb-8">
                        <!-- Icono de Seguridad de Lujo -->
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-[#1f1008] via-[#3b1e0f] to-[#b8860b] flex items-center justify-center shadow-lg relative group mb-4">
                            <div class="absolute inset-0 rounded-2xl bg-amber-700/20 blur-md group-hover:blur-xl transition-all"></div>
                            <svg class="w-7 h-7 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        
                        <div class="text-center">
                            <h1 class="text-3xl font-black tracking-[0.12em] uppercase text-gradient-corporate">
                                REGISTRO DE ESTUDIANTE
                            </h1>
                            <p class="text-amber-500/80 text-xs font-black uppercase tracking-widest mt-1.5">
                                Escuela de Tecnologías de la Información | SENATI
                            </p>
                            <div class="h-[2px] w-24 bg-gradient-to-r from-transparent via-[#b8860b] to-transparent mx-auto mt-4 rounded-full"></div>
                        </div>
                    </div>

                    <!-- Formulario de Registro Estricto de Laravel -->
                    <form method="POST" action="{{ route('register') }}" class="space-y-5 text-[10px] tracking-widest text-amber-200/80 font-black uppercase">
                        @csrf
                        
                        <!-- Inputs con mayor padding (py-4) y espaciado proporcional óptimo -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="flex flex-col">
                                <label class="mb-2.5 ml-1">Nombres Completos</label>
                                <input type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs outline-none shadow-sm">
                                @error('name') <span class="text-rose-400 text-[10px] mt-1.5 font-bold lowercase normal-case tracking-normal ml-1">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="mb-2.5 ml-1">Apellidos Completos</label>
                                <input type="text" name="apellidos" value="{{ old('apellidos') }}" required class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs outline-none shadow-sm">
                                @error('apellidos') <span class="text-rose-400 text-[10px] mt-1.5 font-bold lowercase normal-case tracking-normal ml-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="mb-2.5 ml-1">Correo Electrónico Institucional</label>
                            <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs outline-none shadow-sm tracking-wider">
                            @error('email') <span class="text-rose-400 text-[10px] mt-1.5 font-bold lowercase normal-case tracking-normal ml-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="flex flex-col">
                                <label class="mb-2.5 ml-1">Número de Celular</label>
                                <input type="text" name="telefono" value="{{ old('telefono') }}" required class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs outline-none shadow-sm tracking-widest">
                            </div>
                            <div class="flex flex-col">
                                <label class="mb-2.5 ml-1">Número de DNI</label>
                                <input type="text" name="dni" value="{{ old('dni') }}" required class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs outline-none shadow-sm tracking-widest">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="flex flex-col">
                                <label class="mb-2.5 ml-1">Contraseña de Acceso</label>
                                <input type="password" name="password" required class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs outline-none shadow-sm">
                            </div>
                            <div class="flex flex-col">
                                <label class="mb-2.5 ml-1">Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" required class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs outline-none shadow-sm">
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="shimmer-vivid-btn w-full py-4.5 rounded-xl text-white font-black text-xs tracking-widest uppercase cursor-pointer border border-white/10 shadow-lg">
                                Finalizar Registro Institucional
                            </button>
                        </div>

                        <div class="relative flex py-2 items-center">
                            <div class="flex-grow border-t border-amber-900/20"></div>
                        </div>

                        <!-- Enlace Inferior de Retorno -->
                        <div class="text-center pt-1">
                            <p class="text-[9px] font-bold text-slate-500 tracking-wider mb-2">¿Ya cuenta con un perfil registrado?</p>
                            <a href="{{ route('login') }}" class="inline-block px-8 py-3 rounded-full bg-amber-950/20 hover:bg-amber-950/40 border border-amber-500/20 text-amber-200 text-[9px] tracking-widest uppercase transition-all duration-300 cursor-pointer font-black shadow-sm">
                                Regresar al Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- COLUMNA DERECHA RESERVADA: Ocupa el 60% restante del ancho de pantalla (7.5 de 12 columnas) -->
        <!-- Totalmente libre y limpia de elementos para tu efecto 3D, Canvas secundario o icono gigante -->
        <div class="hidden lg:flex lg:col-span-7 xl:col-span-7.5 h-[70vh] flex-col items-center justify-center relative p-8">
            <div class="text-center select-none pointer-events-none opacity-20">
                <!-- Espacio libre optimizado para tu inyección de efectos personalizados -->
            </div>
        </div>

    </div>

    <!-- Script del Motor Gráfico: Quantum Golden Fluid (Flujo Cuántico de Polvo de Oro e Hilos de Seda) -->
    <script>
        const canvas = document.getElementById('iridescent-canvas');
        const ctx = canvas.getContext('2d');

        let width = canvas.width = window.innerWidth;
        let height = canvas.height = window.innerHeight;

        window.addEventListener('resize', () => {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        });

        let time = 0;
        let rippleWaves = [];
        const particles = [];
        const particleCount = 80; // Cantidad robusta de micro-partículas de oro

        class GoldParticle {
            constructor() {
                this.reset();
            }
            reset() {
                this.x = Math.random() * width;
                this.y = Math.random() * height;
                this.vx = (Math.random() - 0.5) * 0.4;
                this.vy = (Math.random() - 0.5) * 0.4;
                this.radius = Math.random() * 1.8 + 0.6;
                this.alpha = Math.random() * 0.5 + 0.2;
                this.gravityInfluence = Math.random() * 0.05;
            }
            update(mouseX, mouseY) {
                this.x += this.vx;
                this.y += this.vy;

                // Atracción suave al puntero del mouse
                if (mouseX !== undefined && mouseY !== undefined) {
                    let dx = mouseX - this.x;
                    let dy = mouseY - this.y;
                    let dist = Math.hypot(dx, dy);
                    if (dist < 250) {
                        this.x += (dx / dist) * 0.5;
                        this.y += (dy / dist) * 0.5;
                    }
                }

                // Rebote elástico
                if (this.x < 0 || this.x > width) this.vx *= -1;
                if (this.y < 0 || this.y > height) this.vy *= -1;
            }
            draw() {
                ctx.fillStyle = `rgba(217, 119, 6, ${this.alpha})`;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        // Poblar hilos de polvo de oro
        for (let i = 0; i < particleCount; i++) {
            particles.push(new GoldParticle());
        }

        // Obtener posición del mouse de forma interactiva
        let mouse = { x: undefined, y: undefined };
        window.addEventListener('mousemove', (e) => {
            mouse.x = e.clientX;
            mouse.y = e.clientY;
        });
        window.addEventListener('mouseleave', () => {
            mouse.x = undefined;
            mouse.y = undefined;
        });

        class Ripple {
            constructor(x, y) {
                this.x = x; this.y = y; this.radius = 0;
                this.maxRadius = 350; this.alpha = 0.6; this.speed = 4.5;
            }
            update() {
                this.radius += this.speed;
                this.alpha = 1 - (this.radius / this.maxRadius);
            }
        }

        window.addEventListener('click', (e) => {
            if (rippleWaves.length > 3) rippleWaves.shift();
            rippleWaves.push(new Ripple(e.clientX, e.clientY));
        });

        function runFluidEngine() {
            time += 0.0012;
            
            // Fondo Marrón Espresso Imperial Sólido Profundo
            ctx.fillStyle = '#0e0704';
            ctx.fillRect(0, 0, width, height);

            // Capas de Seda Líquida Translúcida Bronce/Oro en movimiento continuo
            for (let i = 0; i < 3; i++) {
                ctx.beginPath();
                let scale = 0.0015 - (i * 0.0003);
                let waveY = height * (0.45 + i * 0.12);

                ctx.moveTo(0, height);
                for (let x = 0; x < width; x += 15) {
                    let y = waveY + Math.sin(x * scale + time + i) * 75 + Math.cos(x * 0.0008 - time) * 35;
                    ctx.lineTo(x, y);
                }
                ctx.lineTo(width, height);
                
                let alphaValue = 0.04 - (i * 0.008);
                let waveGrad = ctx.createLinearGradient(0, waveY - 100, 0, height);
                waveGrad.addColorStop(0, `rgba(184, 134, 11, ${alphaValue})`);
                waveGrad.addColorStop(1, 'rgba(14, 7, 3, 0)');
                ctx.fillStyle = waveGrad;
                ctx.fill();
            }

            // Orbe de luz de Bronce Sutil Superior Izquierdo
            let orbX1 = width * 0.2 + Math.sin(time) * 90;
            let orbY1 = height * 0.3 + Math.cos(time * 0.8) * 70;
            let gradOrb1 = ctx.createRadialGradient(orbX1, orbY1, 0, orbX1, orbY1, 400);
            gradOrb1.addColorStop(0, 'rgba(59, 30, 15, 0.15)');
            gradOrb1.addColorStop(0.6, 'rgba(184, 134, 11, 0.02)');
            gradOrb1.addColorStop(1, 'rgba(14, 7, 3, 0)');
            ctx.fillStyle = gradOrb1;
            ctx.beginPath(); ctx.arc(orbX1, orbY1, 400, 0, Math.PI * 2); ctx.fill();

            // Orbe de luz de Champaña Dorado Inferior Derecho
            let orbX2 = width * 0.8 + Math.cos(time * 0.9) * 100;
            let orbY2 = height * 0.7 + Math.sin(time * 1.2) * 60;
            let gradOrb2 = ctx.createRadialGradient(orbX2, orbY2, 0, orbX2, orbY2, 450);
            gradOrb2.addColorStop(0, 'rgba(184, 134, 11, 0.1)');
            gradOrb2.addColorStop(0.6, 'rgba(14, 7, 3, 0)');
            gradOrb2.addColorStop(1, 'rgba(14, 7, 3, 0)');
            ctx.fillStyle = gradOrb2;
            ctx.beginPath(); ctx.arc(orbX2, orbY2, 450, 0, Math.PI * 2); ctx.fill();

            // Dibujar y actualizar polvo de oro
            particles.forEach(p => {
                p.update(mouse.x, mouse.y);
                p.draw();
            });

            // Conectar polvo de oro cercano con hilos de red
            for (let i = 0; i < particleCount; i++) {
                for (let j = i + 1; j < particleCount; j++) {
                    let dist = Math.hypot(particles[i].x - particles[j].x, particles[i].y - particles[j].y);
                    if (dist < 110) {
                        ctx.strokeStyle = `rgba(184, 134, 11, ${(1 - dist/110) * 0.05})`;
                        ctx.lineWidth = 0.5;
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.stroke();
                    }
                }
            }

            // Renderizar las ondas expansivas de clics de usuario (Efecto distorsión dorada)
            rippleWaves.forEach((wave, index) => {
                wave.update();
                if (wave.radius >= wave.maxRadius) {
                    rippleWaves.splice(index, 1);
                } else {
                    ctx.strokeStyle = `rgba(184, 134, 11, ${wave.alpha * 0.28})`;
                    ctx.lineWidth = 2.5;
                    ctx.beginPath();
                    ctx.arc(wave.x, wave.y, wave.radius, 0, Math.PI * 2);
                    ctx.stroke();
                }
            });

            requestAnimationFrame(runFluidEngine);
        }

        runFluidEngine();
    </script>
</body>
</html>