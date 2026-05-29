<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Matrícula - Acceso de Seguridad</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .glass-card {
            background: rgba(4, 15, 12, 0.65);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(16, 185, 129, 0.15);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6), 
                        inset 0 1px 0 rgba(255, 255, 255, 0.05),
                        0 0 30px rgba(16, 185, 129, 0.03);
        }
        .glass-input {
            background: rgba(3, 7, 6, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.04);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-input:focus {
            border-color: #10b981;
            box-shadow: 0 0 15px rgba(16, 185, 129, 0.2);
            background: rgba(3, 7, 6, 0.8);
        }
    </style>
</head>
<body class="bg-[#020504] min-h-screen flex items-center justify-center p-4 font-sans relative overflow-hidden select-none">
    
    <canvas id="bg-canvas" class="absolute inset-0 w-full h-full object-cover pointer-events-none z-0"></canvas>

    <div class="w-full max-w-md glass-card p-8 rounded-3xl z-10 relative">
        
        <div class="flex justify-center mb-6">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-500/10 to-amber-500/5 border border-emerald-500/20 flex items-center justify-center shadow-lg shadow-emerald-950/20 relative group">
                <div class="absolute inset-0 rounded-2xl bg-emerald-400/5 blur-sm group-hover:blur-md transition-all"></div>
                <svg class="w-6 h-6 text-emerald-400 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 009 11V5a2 2 0 00-2-2H6a2 2 0 00-2 2v6a13 13 0 002.28 7.651m15.352-7.651a13 13 0 01-2.28 7.651m0 0a13 13 0 01-3.44 2.04M19 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 0015 11V5a2 2 0 00-2-2h-1a2 2 0 00-2 2v6a13 13 0 002.28 7.651z"></path>
                </svg>
            </div>
        </div>

        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold tracking-widest text-white uppercase bg-gradient-to-r from-white via-emerald-300 to-emerald-500 bg-clip-text text-transparent">
                SISTEMA MATRÍCULA
            </h2>
            <p class="text-emerald-500/70 text-[10px] font-bold uppercase tracking-widest mt-1">
                Escuela de Tecnologías de la Información
            </p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-[10px] font-bold text-emerald-400/80 uppercase tracking-widest mb-2">Correo Electrónico</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-sm outline-none">
                @error('email')
                    <span class="text-red-400 text-xs mt-1.5 block font-medium tracking-wide">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-[10px] font-bold text-emerald-400/80 uppercase tracking-widest mb-2">Contraseña</label>
                <input type="password" name="password" required class="w-full px-4 py-3.5 rounded-xl glass-input text-white text-sm outline-none">
                @error('password')
                    <span class="text-red-400 text-xs mt-1.5 block font-medium tracking-wide">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-500 hover:from-emerald-500 hover:to-teal-400 text-white font-bold text-xs tracking-widest uppercase transition-all duration-300 cursor-pointer shadow-lg shadow-emerald-950/40 border border-emerald-400/20">
                Entrar al Sistema
            </button>

            <div class="relative flex py-2 items-center">
                <div class="flex-grow border-t border-emerald-500/10"></div>
                <span class="flex-shrink mx-4 text-[9px] font-bold text-emerald-500/50 uppercase tracking-widest">Credencial única</span>
                <div class="flex-grow border-t border-emerald-500/10"></div>
            </div>

            <a href="{{ url('auth/google') }}" class="w-full py-3.5 rounded-xl bg-emerald-950/20 hover:bg-emerald-950/40 border border-emerald-500/20 text-white text-[10px] font-bold tracking-widest uppercase transition-all duration-300 cursor-pointer shadow-md flex items-center justify-center space-x-3">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#34D399"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#059669"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBF24"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EF4444"/>
                </svg>
                <span>Vincular mi Google</span>
            </a>

            <div class="flex justify-between items-center text-[10px] font-bold pt-2">
                <a href="{{ route('password.request') }}" class="text-emerald-500/50 hover:text-emerald-400 transition-colors uppercase tracking-wider">¿Olvidaste tu contraseña?</a>
                <a href="{{ route('register') }}" class="text-amber-500 hover:text-amber-400 transition-colors uppercase tracking-wider">Crear Usuario</a>
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

        const particles = [];
        const count = 40;

        for (let i = 0; i < count; i++) {
            particles.push({
                x: Math.random() * width,
                y: Math.random() * height,
                vx: (Math.random() - 0.5) * 0.4,
                vy: (Math.random() - 0.5) * 0.4,
                radius: Math.random() * 2 + 1,
                alpha: Math.random() * 0.5 + 0.1
            });
        }

        const auroras = [
            { x: width * 0.2, y: height * 0.2, targetX: width * 0.2, targetY: height * 0.2, r: width * 0.35, color: 'rgba(16, 185, 129, 0.04)' },
            { x: width * 0.8, y: height * 0.8, targetX: width * 0.8, targetY: height * 0.8, r: width * 0.4, color: 'rgba(5, 150, 105, 0.03)' },
            { x: width * 0.5, y: height * 0.5, targetX: width * 0.5, targetY: height * 0.5, r: width * 0.3, color: 'rgba(245, 158, 11, 0.02)' }
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
                    if (dist < 120) {
                        ctx.strokeStyle = `rgba(16, 185, 129, ${(1 - dist/120) * 0.07})`;
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