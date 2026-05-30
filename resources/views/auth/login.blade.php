<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Académico - Acceso de Seguridad</title>
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
                                SISTEMA MATRÍCULA
                            </h1>
                            <p class="text-amber-500/80 text-xs font-black uppercase tracking-widest mt-1.5">
                                Escuela de Tecnologías de la Información | SENATI
                            </p>
                            <div class="h-[2px] w-24 bg-gradient-to-r from-transparent via-[#b8860b] to-transparent mx-auto mt-4 rounded-full"></div>
                        </div>
                    </div>

                    <!-- Formulario de Autenticación de Laravel -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-5 text-[10px] tracking-widest text-amber-200/80 font-black uppercase">
                        @csrf
                        
                        <div class="flex flex-col">
                            <label class="mb-2.5 ml-1">Correo Electrónico</label>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-5 py-4.5 rounded-xl corporate-matte-input text-xs outline-none shadow-sm">
                            @error('email') <span class="text-rose-400 text-[10px] mt-1.5 font-bold lowercase normal-case tracking-normal ml-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex flex-col">
                            <label class="mb-2.5 ml-1">Contraseña de Acceso</label>
                            <input type="password" name="password" required class="w-full px-5 py-4.5 rounded-xl corporate-matte-input text-xs outline-none shadow-sm">
                            @error('password') <span class="text-rose-400 text-[10px] mt-1.5 font-bold lowercase normal-case tracking-normal ml-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="shimmer-vivid-btn w-full py-4.5 rounded-xl text-white font-black text-xs tracking-widest uppercase cursor-pointer border border-white/10 shadow-lg">
                                Entrar al Sistema
                            </button>
                        </div>

                        <div class="relative flex py-2 items-center">
                            <div class="flex-grow border-t border-amber-900/20"></div>
                            <span class="flex-shrink mx-4 text-[9px] font-black text-amber-500/40 uppercase tracking-widest">O continuar con</span>
                            <div class="flex-grow border-t border-amber-900/20"></div>
                        </div>

                        <!-- Botón de Google Único y Ancho (Consistencia Estética Total) -->
                        <a href="{{ url('auth/google') }}" class="w-full py-4.5 rounded-xl bg-[#1f1008]/40 hover:bg-[#1f1008]/80 border border-amber-500/20 text-white text-[10px] font-bold tracking-widest uppercase transition-all duration-300 cursor-pointer shadow-md flex items-center justify-center space-x-3">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#b8860b"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#78350f"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#ca8a04"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#9a3412"/>
                            </svg>
                            <span>Vincular mi Google</span>
                        </a>

                        <!-- Enlaces de Navegación Inferiores -->
                        <div class="flex justify-between items-center text-[9px] font-black pt-2">
                            <a href="{{ route('password.request') }}" class="text-amber-500/50 hover:text-amber-400 transition-colors tracking-wider">¿Olvidaste tu clave?</a>
                            <a href="{{ route('register') }}" class="text-amber-500 hover:text-amber-400 transition-colors tracking-wider">Crear Usuario</a>
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
        const particleCount = 110; // Cantidad extrema de micro-partículas estelares de oro
        const maxDistance = 115;   // Umbral de conexión de filamentos

        // Coordenadas de los nodos estructurales del plano de refracción tridimensional (3D Warp Grid)
        const gridCols = 25;
        const gridRows = 20;
        const gridPoints = [];

        // Inicialización de los puntos de la malla 3D de hilos de oro
        for (let c = 0; c < gridCols; c++) {
            for (let r = 0; r < gridRows; r++) {
                gridPoints.push({
                    baseX: (width / (gridCols - 1)) * c,
                    baseY: (height / (gridRows - 1)) * r,
                    x: (width / (gridCols - 1)) * c,
                    y: (height / (gridRows - 1)) * r,
                    z: 0
                });
            }
        }

        class GoldParticle {
            constructor() {
                this.reset();
            }
            reset() {
                this.x = Math.random() * width;
                this.y = Math.random() * height;
                // Velocidad de vector de corriente fluida independiente
                this.vx = (Math.random() - 0.5) * 0.25;
                this.vy = (Math.random() - 0.5) * 0.25;
                this.radius = Math.random() * 1.5 + 0.4;
                this.baseAlpha = Math.random() * 0.4 + 0.15;
                this.alpha = this.baseAlpha;
                this.phase = Math.random() * Math.PI * 2;
                this.phaseSpeed = Math.random() * 0.015 + 0.003;
            }
            update(mouseX, mouseY) {
                this.phase += this.phaseSpeed;
                this.alpha = this.baseAlpha + Math.sin(this.phase) * 0.1;

                // Dinámica de Turbulencia (Flow Field vectorial artificial usando senos/cosenos encadenados)
                let noiseAngle = Math.sin(this.x * 0.003 + time) * Math.cos(this.y * 0.003 + time) * Math.PI * 2;
                this.x += Math.cos(noiseAngle) * 0.25 + this.vx;
                this.y += Math.sin(noiseAngle) * 0.25 + this.vy;

                // Parallax Magnético de atracción suave al cursor
                if (mouseX !== undefined && mouseY !== undefined) {
                    let dx = mouseX - this.x;
                    let dy = mouseY - this.y;
                    let dist = Math.hypot(dx, dy);
                    if (dist < 280) {
                        let pullForce = (1 - dist / 280) * 0.18;
                        this.x += (dx / dist) * pullForce;
                        this.y += (dy / dist) * pullForce;
                    }
                }

                // Rebote suave en los bordes de la pantalla
                if (this.x < 0 || this.x > width) this.vx *= -1;
                if (this.y < 0 || this.y > height) this.vy *= -1;
            }
            draw() {
                ctx.fillStyle = `rgba(184, 134, 11, ${Math.max(0, this.alpha)})`;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        // Poblar hilos de polvo de oro
        for (let i = 0; i < particleCount; i++) {
            particles.push(new GoldParticle());
        }

        // Obtener posición de interacción del cursor
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
                this.maxRadius = 400; this.alpha = 0.7; this.speed = 5.5;
            }
            update() {
                this.radius += this.speed;
                this.alpha = 1 - (this.radius / this.maxRadius);
            }
        }

        window.addEventListener('click', (e) => {
            if (rippleWaves.length > 4) rippleWaves.shift();
            rippleWaves.push(new Ripple(e.clientX, e.clientY));
        });

        function runFluidEngine() {
            time += 0.0015;
            
            // Fondo Espresso Imperial Profundo
            ctx.fillStyle = '#0a0503';
            ctx.fillRect(0, 0, width, height);

            // 1. ACTUALIZACIÓN Y DISTORSIÓN DEL PLANO TRIDIMENSIONAL DE LA MALLA (3D Warp Grid)
            gridPoints.forEach(point => {
                // Posición base de la deformación por ondas lentas
                let waveX = Math.sin(point.baseY * 0.005 + time) * 15;
                let waveY = Math.cos(point.baseX * 0.005 + time) * 15;

                point.x = point.baseX + waveX;
                point.y = point.baseY + waveY;

                // Deformación gravitacional ante el movimiento del cursor
                if (mouse.x !== undefined && mouse.y !== undefined) {
                    let dx = mouse.x - point.x;
                    let dy = mouse.y - point.y;
                    let dist = Math.hypot(dx, dy);
                    if (dist < 300) {
                        let distortion = (1 - dist / 300) * 45; // Fuerza de atracción/repulsión
                        point.x -= (dx / dist) * distortion;
                        point.y -= (dy / dist) * distortion;
                    }
                }

                // Deformación por ondas de choque expansivas de clics
                rippleWaves.forEach(wave => {
                    let dx = point.x - wave.x;
                    let dy = point.y - wave.y;
                    let dist = Math.hypot(dx, dy);
                    if (dist < wave.radius && dist > wave.radius - 40) {
                        let force = (1 - dist / wave.maxRadius) * 30;
                        point.x += (dx / dist) * force;
                        point.y += (dy / dist) * force;
                    }
                });
            });

            // 2. DIBUJAR FILAMENTOS HOLOGRÁFICOS DE LA MALLA DE ORO (3D Wireframe)
            ctx.lineWidth = 0.35;
            for (let c = 0; c < gridCols; c++) {
                for (let r = 0; r < gridRows; r++) {
                    let currIdx = c * gridRows + r;
                    let pCurr = gridPoints[currIdx];

                    // Conexiones de la red horizontal
                    if (c < gridCols - 1) {
                        let pRight = gridPoints[(c + 1) * gridRows + r];
                        let alpha = 0.035 + (Math.sin(time + c * 0.2) * 0.015);
                        ctx.strokeStyle = `rgba(184, 134, 11, ${alpha})`;
                        ctx.beginPath();
                        ctx.moveTo(pCurr.x, pCurr.y);
                        ctx.lineTo(pRight.x, pRight.y);
                        ctx.stroke();
                    }

                    // Conexiones de la red vertical
                    if (r < gridRows - 1) {
                        let pDown = gridPoints[c * gridRows + (r + 1)];
                        let alpha = 0.035 + (Math.cos(time + r * 0.2) * 0.015);
                        ctx.strokeStyle = `rgba(184, 134, 11, ${alpha})`;
                        ctx.beginPath();
                        ctx.moveTo(pCurr.x, pCurr.y);
                        ctx.lineTo(pDown.x, pDown.y);
                        ctx.stroke();
                    }
                }
            }

            // Capas de ondas de Seda Líquida Translúcida adicionales para volumen
            for (let i = 0; i < 3; i++) {
                ctx.beginPath();
                let scale = 0.0014 - (i * 0.0003);
                let waveY = height * (0.45 + i * 0.12);

                ctx.moveTo(0, height);
                for (let x = 0; x <= width; x += 30) {
                    let y = waveY + Math.sin(x * scale + time + i * 1.5) * 55 + Math.cos(x * 0.0006 - time) * 25;
                    ctx.lineTo(x, y);
                }
                ctx.lineTo(width, height);
                
                let alphaValue = 0.035 - (i * 0.008);
                let waveGrad = ctx.createLinearGradient(0, waveY - 100, 0, height);
                waveGrad.addColorStop(0, `rgba(184, 134, 11, ${alphaValue})`);
                waveGrad.addColorStop(1, 'rgba(10, 5, 3, 0)');
                ctx.fillStyle = waveGrad;
                ctx.fill();
            }

            // Dibujar y procesar vector de las partículas estelares de oro
            particles.forEach(p => {
                p.update(mouse.x, mouse.y);
                p.draw();
            });

            // Conectar micropartículas cercanas para acentuar el efecto Quantum Mesh
            for (let i = 0; i < particleCount; i++) {
                for (let j = i + 1; j < particleCount; j++) {
                    let p1 = particles[i];
                    let p2 = particles[j];
                    let dist = Math.hypot(p1.x - p2.x, p1.y - p2.y);
                    if (dist < maxDistance) {
                        let dynamicAlpha = (1 - dist / maxDistance) * 0.06;
                        let averageAlpha = (p1.alpha + p2.alpha) / 2;
                        ctx.strokeStyle = `rgba(184, 134, 11, ${dynamicAlpha * (averageAlpha * 2.2)})`;
                        ctx.lineWidth = 0.45;
                        ctx.beginPath();
                        ctx.moveTo(p1.x, p1.y);
                        ctx.lineTo(p2.x, p2.y);
                        ctx.stroke();
                    }
                }
            }

            // Ciclo de vida e impacto de las ondas de choque táctiles/clics (Refracción cromática)
            rippleWaves.forEach((wave, index) => {
                wave.update();
                if (wave.radius >= wave.maxRadius) {
                    rippleWaves.splice(index, 1);
                } else {
                    ctx.strokeStyle = `rgba(184, 134, 11, ${wave.alpha * 0.35})`;
                    ctx.lineWidth = 1.5;
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