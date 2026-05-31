<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Académico - Registro Institucional</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        @keyframes slideInRight {
            0% { transform: translateX(100%) scale(0.9); opacity: 0; }
            70% { transform: translateX(-20px) scale(1.02); }
            100% { transform: translateX(0) scale(1); opacity: 1; }
        }
        @keyframes shrinkLine {
            0% { width: 100%; }
            100% { width: 0%; }
        }
        @keyframes rotateNeonBorder {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .obsidian-matrix-bg {
            background-color: #060302;
            background-image: 
                linear-gradient(rgba(184, 134, 11, 0.015) 1.5px, transparent 1.5px),
                linear-gradient(90deg, rgba(184, 134, 11, 0.015) 1.5px, transparent 1.5px);
            background-size: 50px 50px;
            background-position: center;
        }

        .toast-notification {
            position: fixed;
            top: 30px;
            right: 30px;
            z-index: 9999;
            width: 420px;
            background: rgba(15, 8, 4, 0.96);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(184, 134, 11, 0.4);
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.9);
            animation: slideInRight 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .toast-progress {
            height: 3px;
            background: linear-gradient(90deg, #b8860b, #fef3c7);
            animation: shrinkLine 8s linear forwards;
        }

        .executive-glow-wrapper {
            position: relative; overflow: hidden; border-radius: 3rem; padding: 2px;
            box-shadow: 0 50px 100px rgba(14, 7, 3, 0.85);
            transition: all 0.4s ease;
        }
        .executive-glow-wrapper::before {
            content: ''; position: absolute; top: -50%; left: -50%; width: 200%; height: 200%;
            background: conic-gradient(from 0deg, #1f1008 0%, #b8860b 35%, #1f1008 100%);
            animation: rotateNeonBorder 8s linear infinite;
        }
        
        .glass-hull-dark {
            position: relative; z-index: 10; background: rgba(14, 7, 3, 0.86);
            backdrop-filter: blur(50px) saturate(160%); border-radius: calc(3rem - 2px);
        }
        
        .corporate-matte-input {
            background: rgba(22, 11, 5, 0.9); border: 1.5px solid rgba(184, 134, 11, 0.2);
            color: #fffbeb; font-weight: 600; transition: all 0.4s ease;
        }
        .corporate-matte-input:focus {
            background: rgba(14, 7, 3, 0.98); border-color: #b8860b; outline: none;
        }
        
        .text-gradient-corporate {
            background: linear-gradient(135deg, #fffbeb 0%, #d97706 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        
        .shimmer-vivid-btn {
            background: linear-gradient(135deg, #2b180a 0%, #b8860b 100%);
            transition: all 0.4s ease;
        }
    </style>
</head>
<body class="obsidian-matrix-bg min-h-screen p-6 md:p-12 lg:p-16 font-sans relative overflow-x-hidden select-none flex items-center">

    @if(session('failed_email'))
    <div id="auth-toast" class="toast-notification">
        <div class="p-6 flex items-start space-x-4">
            <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center border border-amber-500/30">
                <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="text-amber-100 text-sm font-black uppercase tracking-widest mb-1">Aviso de Seguridad</h3>
                <p class="text-slate-400 text-xs leading-relaxed">
                    La identidad vinculada a <span class="text-amber-400 font-bold underline">{{ session('failed_email') }}</span> no se encuentra registrada[cite: 2]. Para continuar, por favor cree su perfil institucional en este formulario[cite: 2].
                </p>
            </div>
            <button onclick="closeToast()" class="text-slate-500 hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <div class="toast-progress"></div>
    </div>
    @endif

    <div class="w-full max-w-[1440px] ml-0 lg:ml-12 xl:ml-20 mr-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">
        
        <div class="lg:col-span-5 xl:col-span-4.5 w-full max-w-[500px]">
            <div class="executive-glow-wrapper">
                <div class="glass-hull-dark p-8 sm:p-12 flex flex-col">
                    
                    <div class="flex flex-col items-center mb-8">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-[#1f1008] to-[#b8860b] flex items-center justify-center shadow-lg mb-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.247 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <div class="text-center">
                            <h1 class="text-3xl font-black tracking-widest uppercase text-gradient-corporate">Registro de Estudiante</h1>
                            <p class="text-amber-500/80 text-[10px] font-black uppercase tracking-widest mt-1.5">Escuela de Tecnologías de la Información | SENATI</p>
                            <div class="h-[2px] w-24 bg-gradient-to-r from-transparent via-[#b8860b] to-transparent mx-auto mt-4 rounded-full"></div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-5 text-[10px] font-black uppercase tracking-widest text-amber-200/80">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="flex flex-col"><label class="mb-2">Nombres</label><input type="text" name="name" required class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs"></div>
                            <div class="flex flex-col"><label class="mb-2">Apellidos</label><input type="text" name="apellidos" required class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs"></div>
                        </div>
                        <div class="flex flex-col"><label class="mb-2">Email Institucional</label><input type="email" name="email" required class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs tracking-wider"></div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="flex flex-col"><label class="mb-2">Teléfono</label><input type="text" name="telefono" required class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs"></div>
                            <div class="flex flex-col"><label class="mb-2">DNI</label><input type="text" name="dni" required class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs"></div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="flex flex-col"><label class="mb-2">Contraseña</label><input type="password" name="password" required class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs"></div>
                            <div class="flex flex-col"><label class="mb-2">Confirmar</label><input type="password" name="password_confirmation" required class="w-full px-5 py-4 rounded-xl corporate-matte-input text-xs"></div>
                        </div>
                        <button type="submit" class="shimmer-vivid-btn w-full py-4.5 rounded-xl text-white font-black text-xs tracking-widest uppercase shadow-lg">Finalizar Registro</button>
                        <div class="text-center pt-2">
                            <a href="{{ route('login') }}" class="text-amber-500/60 hover:text-amber-400 transition-colors">Volver al login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="hidden lg:flex lg:col-span-7 xl:col-span-7.5 flex-col h-full justify-center p-8 space-y-8">
            <div class="max-w-xl text-right w-full pr-12">
                <p class="text-amber-500/20 text-[10px] font-black uppercase tracking-[1em]">Monitor de Sistema Académico</p>
                <div class="w-full h-[1.5px] bg-amber-500/10 mt-4"></div>
             </div>
        </div>

    </div>

    <script>
        function closeToast() {
            const toast = document.getElementById('auth-toast');
            if(toast) {
                toast.style.transform = 'translateX(100%)';
                toast.style.opacity = '0';
                setTimeout(() => toast.remove(), 600);
            }
        }
        setTimeout(closeToast, 8000);
    </script>
</body>
</html>