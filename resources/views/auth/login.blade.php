<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Acceso - Matrículas</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        @keyframes border-rotate {
            100% { transform: rotate(360deg); }
        }
        @keyframes noise {
            0%, 100% { transform: translate(0, 0); }
            10% { transform: translate(-1%, -1%); }
            30% { transform: translate(-2%, -2%); }
            50% { transform: translate(-1%, -3%); }
            70% { transform: translate(-3%, -1%); }
            90% { transform: translate(-2%, -1%); }
        }
        .animate-border {
            position: relative;
            overflow: hidden;
        }
        .animate-border::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg, transparent 20%, #3b82f6 50%, #06b6d4 80%, transparent 100%);
            animation: border-rotate 6s linear infinite;
            z-index: 0;
        }
        .inner-card {
            position: relative;
            z-index: 10;
            background: rgba(10, 15, 30, 0.75);
            backdrop-filter: blur(24px);
        }
        .cyber-input {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .cyber-input:focus {
            border-color: #06b6d4;
            box-shadow: 0 0 15px rgba(6, 182, 212, 0.25);
            background: rgba(255, 255, 255, 0.06);
        }
    </style>
</head>
<body class="bg-[#040814] min-h-screen flex items-center justify-center p-4 font-sans relative overflow-hidden">

    <div class="absolute inset-0 z-0 bg-[url('/images/background.png')] bg-cover bg-center fixed opacity-35 pointer-events-none"></div>
    <div class="absolute inset-0 z-0 bg-gradient-to-tr from-[#040814] via-transparent to-[#081638] opacity-90 pointer-events-none"></div>

    <div class="absolute inset-0 z-0 opacity-[0.02] pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=\'0 0 200 200\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cfilter id=\'noiseFilter\'%3E%3CfeTurbulence type=\'fractalNoise\' baseFrequency=\'0.65\' numOctaves=\'3\' stitchTiles=\'stitch\'/%3E%3C/filter%3E%3Crect width=\'100%25\' height=\'100%25\' filter=\'url(%23noiseFilter)\'/%3E%3C/svg%3E'); animation: noise 1s steps(4) infinite;"></div>

    <div class="w-full max-w-md animate-border p-[1px] rounded-2xl shadow-[0_0_50px_rgba(0,0,0,0.8)] z-10">
        <div class="inner-card p-8 rounded-[15px] flex flex-col">
            
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-blue-500/10 border border-blue-500/30 mb-3">
                    <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-white tracking-wide">SISTEMA DE MATRÍCULAS</h2>
                <p class="text-gray-400 text-sm mt-1">Introduce tus credenciales de acceso institucional</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Correo Electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                           class="w-full px-4 py-3 rounded-xl text-white text-sm cyber-input outline-none @error('email') border-red-500/50 @enderror">
                    @error('email')
                        <p class="text-red-400 text-xs mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Contraseña de Seguridad</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           class="w-full px-4 py-3 rounded-xl text-white text-sm cyber-input outline-none @error('password') border-red-500/50 @enderror">
                    @error('password')
                        <p class="text-red-400 text-xs mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center space-x-2 cursor-pointer select-none">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="rounded border-gray-700 bg-gray-900 text-cyan-500 focus:ring-0 focus:ring-offset-0 w-4 h-4">
                        <span class="text-gray-400">Mantener activa</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-cyan-400 hover:underline">¿Olvidaste tu contraseña?</a>
                    @endif
                </div>

                <button type="submit" class="w-full py-3 mt-2 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-semibold text-sm tracking-wide shadow-[0_4px_20px_rgba(59,130,246,0.4)] hover:brightness-110 active:scale-[0.98] transition-all cursor-pointer">
                    AUTENTICAR PERFIL
                </button>

                <div class="relative flex py-2 items-center">
                    <div class="flex-grow border-t border-white/5"></div>
                    <span class="flex-shrink mx-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">O entrar con</span>
                    <div class="flex-grow border-t border-white/5"></div>
                </div>

                <a href="{{ url('auth/google') }}" class="w-full py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white font-medium text-sm tracking-wide border border-white/10 flex items-center justify-center transition-all active:scale-[0.98] cursor-pointer shadow-lg hover:shadow-cyan-500/5">
                    <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l3.66-2.85z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.85c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    <span class="tracking-wider text-xs font-bold">ACCEDER CON GOOGLE</span>
                </a>

                <div class="text-center pt-2">
                    <a href="{{ route('register') }}" class="text-xs text-gray-400 hover:text-white transition-colors">¿No tienes cuenta? <span class="text-cyan-400 font-semibold underline">Regístrate aquí</span></a>
                </div>
            </form>

        </div>
    </div>
</body>
</html>