<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Portal Académico - Acceso de Seguridad</title>
    <!-- Inyección Autónoma de Tailwind CSS de Alto Rendimiento -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        @keyframes rotateNeonBorder {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes goldShimmer {
            0% { transform: translateX(-100%) skewX(-15deg); }
            100% { transform: translateX(100%) skewX(-15deg); }
        }
        @keyframes drawDiagonalStream {
            from { clip-path: polygon(100% 0, 100% 0, 100% 100%, 100% 100%); opacity: 0; }
            to { clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%); opacity: 1; }
        }

        /* ENTORNO OBSIDIAN CON BLOQUEO TOTAL DE PANTALLA (CERO CANVAS / CERO SCROLL) */
        .obsidian-matrix-viewport {
            background-color: #060302;
            background-image: 
                linear-gradient(rgba(184, 134, 11, 0.012) 1.5px, transparent 1.5px),
                linear-gradient(90deg, rgba(184, 134, 11, 0.012) 1.5px, transparent 1.5px);
            background-size: 55px 55px;
            background-position: center;
            height: 100vh;
            width: 100vw;
            overflow: hidden; /* Elimina definitivamente cualquier arrastre físico de la interfaz */
        }

        /* CONTENEDOR VECTORIAL DIAGONAL COMPACTADO Y CORREGIDO EN LA PARTE SUPERIOR */
        /* Las coordenadas en vh garantizan el encuadre exacto sin desbordar el fondo del monitor */
        .diagonal-flow-rack {
            position: absolute;
            width: 115%;
            right: -10%;
            transform: rotate(-13deg); /* Inclinación diagonal exacta de tu dibujo original */
            transform-origin: right center;
            opacity: 0;
            animation: drawDiagonalStream 1.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            font-subpixel-antialiasing: loaded;
        }

        /* Línea física dorada que sirve de base armada justo abajo del texto */
        .vector-gold-wire {
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, rgba(184, 134, 11, 0.8) 45%, rgba(184, 134, 11, 0.1) 100%);
            box-shadow: 0 0 14px rgba(184, 134, 11, 0.6);
            margin-top: 0.4rem;
        }

        /* Formato de Letras Grandes, Claras y Robustas */
        .integrated-clean-text {
            font-size: 1.25rem;
            color: #fffbeb;
            font-weight: 900;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            text-align: right;
            padding-right: 4rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.9);
        }

        /* Componentes Estructurales de la Tarjeta de Login (Izquierda) */
        .executive-glow-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 3rem;
            padding: 2px;
            box-shadow: 0 50px 100px rgba(14, 7, 3, 0.95),
                        0 0 60px rgba(184, 134, 11, 0.15);
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.4s ease;
        }
        .executive-glow-wrapper:hover {
            transform: translateY(-4px);
            box-shadow: 0 60px 110px rgba(14, 7, 3, 1),
                        0 0 80px rgba(184, 134, 11, 0.28);
        }
        .executive-glow-wrapper::before {
            content: ''; position: absolute; top: -50%; left: -50%; width: 200%; height: 200%;
            background: conic-gradient(from 0deg, #1f1008 0%, #b8860b 35%, #3b1e0f 65%, #1f1008 100%);
            animation: rotateNeonBorder 9s linear infinite; z-index: 0;
        }

        .glass-hull-dark {
            position: relative; z-index: 10;
            background: rgba(14, 7, 3, 0.88);
            backdrop-filter: blur(40px) saturate(150%);
            -webkit-backdrop-filter: blur(40px) saturate(150%);
            border-radius: calc(3rem - 2px);
            box-shadow: inset 0 1px 3px rgba(255, 255, 255, 0.08);
        }

        .corporate-matte-input {
            background: rgba(22, 11, 5, 0.9);
            border: 1.5px solid rgba(184, 134, 11, 0.22);
            color: #fffbeb; font-weight: 600;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .corporate-matte-input:focus {
            background: rgba(5, 2, 1, 0.98); border-color: #b8860b;
            box-shadow: 0 12px 25px rgba(184, 134, 11, 0.2), 0 0 0 3px rgba(184, 134, 11, 0.15);
            transform: translateY(-2px); outline: none;
        }

        .text-gradient-corporate {
            background: linear-gradient(135deg, #fffbeb 0%, #d97706 60%, #b8860b 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }

        .shimmer-vivid-btn {
            position: relative; overflow: hidden;
            background: linear-gradient(135deg, #2b180a 0%, #5c3a21 50%, #b8860b 100%);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .shimmer-vivid-btn::after {
            content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transform: translateX(-100%); animation: goldShimmer 3s infinite linear;
        }
        .shimmer-vivid-btn:hover { transform: translateY(-4px); box-shadow: 0 20px 45px rgba(184, 134, 11, 0.35); }

        .google-premium-plate {
            background: rgba(22, 11, 5, 0.95);
            border: 1.5px solid rgba(184, 134, 11, 0.25);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .google-premium-plate:hover {
            transform: translateY(-3px); border-color: #b8860b;
            box-shadow: 0 15px 30px rgba(184, 134, 11, 0.25);
            background: rgba(31, 16, 8, 0.98);
        }
    </style>
</head>
<body class="obsidian-matrix-bg obsidian-matrix-viewport font-sans relative select-none flex items-center">

    <div class="w-full max-w-[1440px] mx-auto px-6 md:px-12 lg:px-16 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">
        
        <!-- PARTE IZQUIERDA: Formulario de Autenticación SENATI -->
        <div class="lg:col-span-5 xl:col-span-4.5 w-full max-w-[480px]">
            <div class="executive-glow-wrapper shadow-2xl">
                <div class="glass-hull-dark p-8 sm:p-11 flex flex-col">
                    
                    <div class="flex flex-col items-center mb-8">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-[#1f1008] via-[#3b1e0f] to-[#b8860b] flex items-center justify-center shadow-lg relative mb-4">
                            <div class="absolute inset-0 rounded-2xl bg-amber-700/20 blur-md"></div>
                            <svg class="w-7 h-7 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.247 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h1 class="text-3xl font-black tracking-[0.12em] uppercase text-gradient-corporate">SISTEMA MATRÍCULA</h1>
                            <p class="text-amber-500/80 text-xs font-black uppercase tracking-widest mt-1.5">Escuela de Tecnologías de la Información | SENATI</p>
                            <div class="h-[2px] w-24 bg-gradient-to-r from-transparent via-[#b8860b] to-transparent mx-auto mt-4 rounded-full"></div>
                        </div>
                    </div>

                    @if($errors->has('email'))
                        <div class="mb-5 p-3.5 rounded-xl bg-amber-600/10 border border-amber-600/30 text-amber-300 text-[10px] font-bold uppercase tracking-wider text-center">
                            {{ $errors->first('email') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-5 text-[10px] tracking-widest text-amber-200/80 font-black uppercase">
                        @csrf
                        
                        <div class="flex flex-col">
                            <label class="mb-2.5 ml-1">Correo Electrónico</label>
                            <input type="email" name="email" id="login-email-input" value="{{ old('email') }}" required autofocus class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs outline-none shadow-sm">
                        </div>

                        <div class="flex flex-col">
                            <label class="mb-2.5 ml-1">Contraseña de Acceso</label>
                            <input type="password" name="password" required class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs outline-none shadow-sm">
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="shimmer-vivid-btn w-full py-4.5 rounded-xl text-white font-black text-xs tracking-widest uppercase cursor-pointer border border-white/10 shadow-lg">Entrar al Sistema</button>
                        </div>

                        <div class="relative flex py-2 items-center">
                            <div class="flex-grow border-t border-amber-900/20"></div>
                            <span class="flex-shrink mx-4 text-[9px] font-black text-amber-500/40 uppercase tracking-widest">O pasarela social</span>
                            <div class="flex-grow border-t border-amber-900/20"></div>
                        </div>

                        <button type="button" onclick="handleGoogleClick()" class="w-full py-4.5 rounded-xl google-premium-plate text-white text-[10px] font-bold tracking-widest uppercase transition-all duration-300 cursor-pointer shadow-md flex items-center justify-center space-x-3">
                            <div class="flex items-center space-x-1.5 tracking-normal">
                                <span class="text-[#4285F4] font-black text-sm">G</span>
                                <span class="text-[#EA4335] font-black text-sm">o</span>
                                <span class="text-[#FBBC05] font-black text-sm">o</span>
                                <span class="text-[#4285F4] font-black text-sm">g</span>
                                <span class="text-[#34A853] font-black text-sm">l</span>
                                <span class="text-[#EA4335] font-black text-sm">e</span>
                            </div>
                            <span class="text-amber-100/90 font-black ml-1">| Acceso Único Google</span>
                        </button>

                        <div class="flex justify-between items-center text-[9px] font-black pt-2">
                            <a href="#" class="text-amber-500/50 hover:text-amber-400 transition-colors tracking-wider">¿Olvidaste tu clave?</a>
                            <a href="{{ route('register') }}" class="text-amber-500 hover:text-amber-400 transition-colors tracking-wider">Crear Usuario</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ════════════════ PARTE DERECHA: RILES DIAGONALES LLEVADOS AL TOPE SUPERIOR MÁXIMO ════════════════ -->
        <div class="hidden lg:block lg:col-span-7 xl:col-span-7.5 h-[90vh] relative overflow-visible">
            
            <!-- RIEL 1: Estatus de Admisión (Posicionado en la parte más alta: top-[2vh]) -->
            <div class="diagonal-flow-rack top-[2vh]" style="animation-delay: 0s;">
                <div class="integrated-clean-text flex items-center justify-end gap-3 text-amber-400">
                    <span class="text-[10px] bg-emerald-500/10 border border-emerald-500/30 px-3 py-0.5 rounded-full text-emerald-400 tracking-widest animate-pulse font-black">PROCESO ACTIVO</span>
                    Matrículas Abiertas Escuela de Tecnologías SENATI
                </div>
                <div class="vector-gold-wire"></div>
            </div>

            <!-- RIEL 2: Ingeniería de Software (top-[13vh]) -->
            <div class="diagonal-flow-rack top-[13vh]" style="animation-delay: 0.2s;">
                <div class="integrated-clean-text">
                    Ingeniería de Software con Inteligencia Artificial <span class="text-amber-500 font-black">// ÚLTIMAS PLAZAS DISPONIBLES</span>
                </div>
                <div class="vector-gold-wire"></div>
            </div>

            <!-- RIEL 3: Certificaciones Tecnológicas (top-[24vh]) -->
            <div class="diagonal-flow-rack top-[24vh]" style="animation-delay: 0.4s;">
                <div class="integrated-clean-text text-slate-300">
                    Convenios de Certificación Global Incluidos: <span class="text-gradient-corporate font-black">AWS Academy / CISCO / Oracle Java</span>
                </div>
                <div class="vector-gold-wire"></div>
            </div>

            <!-- RIEL 4: Infraestructura Física (top-[35vh]) -->
            <div class="diagonal-flow-rack top-[35vh]" style="animation-delay: 0.6s;">
                <div class="integrated-clean-text text-amber-100/90">
                    Laboratorios de Alta Especialización Equipados con Tecnología de Procesamiento GPU Dedicada
                </div>
                <div class="vector-gold-wire"></div>
            </div>

            <!-- RIEL 5: Bolsa de Trabajo (top-[46vh] - Perfectamente agrupado arriba, lejos del borde inferior) -->
            <div class="diagonal-flow-rack top-[46vh]" style="animation-delay: 0.8s;">
                <div class="integrated-clean-text text-sm text-amber-500/50 tracking-[0.12em]">
                    Bolsa de Trabajo Activa Vinculada Directamente con las Empresas Líderes de la Industria Tech
                </div>
                <div class="vector-gold-wire"></div>
            </div>

        </div>

    </div>

    <script>
        function handleGoogleClick() {
            const emailInput = document.getElementById('login-email-input').value;
            if(emailInput) {
                window.location.href = "{{ url('auth/google') }}?email=" + encodeURIComponent(emailInput);
            } else {
                window.location.href = "{{ url('auth/google') }}";
            }
        }
    </script>
</body>
</html>