<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Matrícula - Iniciar Sesión</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[#070b14] min-h-screen flex items-center justify-center p-4 font-sans relative select-none">
    <div class="absolute inset-0 bg-gradient-to-b from-[#0b1324] via-transparent to-[#070b14] opacity-80 pointer-events-none"></div>

    <div class="w-full max-w-md bg-[#0f172a]/60 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-8 z-10 relative">
        
        <div class="flex justify-center mb-5">
            <div class="w-12 h-12 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center shadow-inner">
                <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
        </div>

        <div class="text-center mb-6">
            <h2 class="text-xl font-bold text-white uppercase tracking-wider">SISTEMA MATRÍCULA</h2>
            <p class="text-gray-400 text-xs mt-1 tracking-wide">Escuela de Tecnologías de la Información</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2">Correo Electrónico</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/40 border border-white/5 text-white text-sm outline-none focus:border-cyan-500/50 transition-all shadow-inner">
                @error('email')
                    <span class="text-red-400 text-xs mt-1 block font-medium">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <div class="flex justify-between items-center mb-2">
                    <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest">Contraseña</label>
                </div>
                <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl bg-[#1e293b]/40 border border-white/5 text-white text-sm outline-none focus:border-cyan-500/50 transition-all shadow-inner">
                @error('password')
                    <span class="text-red-400 text-xs mt-1 block font-medium">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-bold text-xs tracking-widest uppercase hover:brightness-110 transition-all cursor-pointer shadow-lg shadow-cyan-500/10">
                ENTRAR AL SISTEMA
            </button>

            <div class="relative flex py-2 items-center">
                <div class="flex-grow border-t border-white/5"></div>
                <span class="flex-shrink mx-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">O continuar con</span>
                <div class="flex-grow border-t border-white/5"></div>
            </div>

            <a href="{{ url('auth/google') }}" class="w-full py-3 rounded-xl bg-[#1e293b]/50 hover:bg-[#1e293b]/80 border border-white/5 text-white text-xs font-bold tracking-widest uppercase transition-all cursor-pointer shadow-md flex items-center justify-center space-x-3">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EA4335"/>
                </svg>
                <span>VINCULAR MI GOOGLE</span>
            </a>

            <div class="flex justify-between items-center text-[11px] font-medium pt-2">
                <a href="{{ route('password.request') }}" class="text-gray-500 hover:text-cyan-400 transition-colors">¿Recuperar contraseña?</a>
                <a href="{{ route('register') }}" class="text-cyan-400 hover:underline">Crear usuario</a>
            </div>
        </form>
    </div>
</body>
</html>