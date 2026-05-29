<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Acceso - SENATI</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        @keyframes border-rotate { 100% { transform: rotate(360deg); } }
        .animate-border { position: relative; overflow: hidden; }
        .animate-border::before {
            content: ''; position: absolute; top: -50%; left: -50%; width: 200%; height: 200%;
            background: conic-gradient(from 0deg, transparent 20%, #1e40af 50%, #0891b2 80%, transparent 100%);
            animation: border-rotate 6s linear infinite; z-index: 0;
        }
        .inner-card { position: relative; z-index: 10; background: rgba(10, 15, 30, 0.85); backdrop-filter: blur(20px); }
    </style>
</head>
<body class="bg-[#030712] min-h-screen flex items-center justify-center p-4 font-sans relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-[#030712] via-transparent to-[#0f172a] opacity-90 pointer-events-none"></div>
    
    <div class="w-full max-w-md animate-border p-[1px] rounded-2xl shadow-2xl z-10">
        <div class="inner-card p-8 rounded-[15px] flex flex-col">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-white tracking-wide uppercase">SISTEMA MATRÍCULA</h2>
                <p class="text-gray-400 text-xs mt-1 font-medium tracking-wider">Escuela de Tecnologías de la Información</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Correo Electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white text-sm outline-none focus:border-cyan-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Contraseña</label>
                    <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white text-sm outline-none focus:border-cyan-500">
                </div>

                <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-bold text-sm tracking-wide hover:brightness-110 transition-all cursor-pointer shadow-lg">
                    ENTRAR AL SISTEMA
                </button>

                <div class="relative flex py-2 items-center">
                    <div class="flex-grow border-t border-white/10"></div>
                    <span class="flex-shrink mx-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">O continuar con</span>
                    <div class="flex-grow border-t border-white/10"></div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ url('auth/google') }}" class="py-2.5 rounded-xl bg-white/5 hover:bg-white/10 text-white text-xs font-bold text-center border border-white/10 tracking-wider transition-all cursor-pointer shadow-md flex items-center justify-center space-x-2">
                        <span>Google</span>
                    </a>
                    <a href="{{ url('auth/github') }}" class="py-2.5 rounded-xl bg-white/5 hover:bg-white/10 text-white text-xs font-bold text-center border border-white/10 tracking-wider transition-all cursor-pointer shadow-md flex items-center justify-center space-x-2">
                        <span>GitHub</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
