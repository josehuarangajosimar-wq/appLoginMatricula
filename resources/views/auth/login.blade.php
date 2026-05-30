<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Académico - Acceso de Seguridad</title>
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

        .executive-glow-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 3rem;
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
            content: ''; position: absolute; top: -50%; left: -50%; width: 200%; height: 200%;
            background: conic-gradient(from 0deg, #1f1008 0%, #b8860b 35%, #3b1e0f 65%, #1f1008 100%);
            animation: rotateNeonBorder 8s linear infinite; z-index: 0;
        }

        .glass-hull-dark {
            position: relative; z-index: 10;
            background: rgba(14, 7, 3, 0.72);
            backdrop-filter: blur(50px) saturate(160%);
            -webkit-backdrop-filter: blur(50px) saturate(160%);
            border-radius: calc(3rem - 2px);
            box-shadow: inset 0 1px 3px rgba(255, 255, 255, 0.08),
                        inset 0 -1px 25px rgba(184, 134, 11, 0.03);
        }

        .corporate-matte-input {
            background: rgba(22, 11, 5, 0.85);
            border: 1.5px solid rgba(184, 134, 11, 0.18);
            color: #fffbeb; font-weight: 600;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .corporate-matte-input:focus {
            background: rgba(14, 7, 3, 0.95); border-color: #b8860b;
            box-shadow: 0 12px 25px rgba(184, 134, 11, 0.18), 0 0 0 3px rgba(184, 134, 11, 0.12);
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
        .shimmer-vivid-btn:hover { transform: translateY(-4px); box-shadow: 0 20px 45px rgba(184, 134, 11, 0.3); }

        /* Botón de Google Premium */
        .google-premium-plate {
            background: rgba(22, 11, 5, 0.9);
            border: 1.5px solid rgba(184, 134, 11, 0.22);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .google-premium-plate:hover {
            transform: translateY(-3px); border-color: #b8860b;
            box-shadow: 0 15px 30px rgba(184, 134, 11, 0.2);
            background: rgba(31, 16, 8, 0.95);
        }
    </style>
</head>
<body class="bg-[#0e0704] min-h-screen p-6 md:p-12 lg:p-16 font-sans relative overflow-x-hidden select-none flex items-center">
    
    <canvas id="iridescent-canvas" class="absolute inset-0 w-full h-full object-cover pointer-events-none z-0"></canvas>

    <div class="w-full max-w-[1440px] ml-0 lg:ml-12 xl:ml-20 mr-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">
        
        <div class="lg:col-span-5 xl:col-span-4.5 w-full max-w-[500px]">
            <div class="executive-glow-wrapper shadow-2xl">
                <div class="glass-hull-dark p-8 sm:p-12 flex flex-col">
                    
                    <div class="flex flex-col items-center mb-8">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-[#1f1008] via-[#3b1e0f] to-[#b8860b] flex items-center justify-center shadow-lg relative mb-4">
                            <div class="absolute inset-0 rounded-2xl bg-amber-700/20 blur-md"></div>
                            <svg class="w-7 h-7 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
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
                            <a href="{{ route('password.request') }}" class="text-amber-500/50 hover:text-amber-400 transition-colors tracking-wider">¿Olvidaste tu clave?</a>
                            <a href="{{ route('register') }}" class="text-amber-500 hover:text-amber-400 transition-colors tracking-wider">Crear Usuario</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="hidden lg:flex lg:col-span-7 xl:col-span-7.5 flex-col h-full justify-center p-8 space-y-8 select-none">
            <div class="max-w-xl space-y-6">
                <div class="inline-flex items-center space-x-2 bg-emerald-500/10 border border-emerald-500/20 px-4 py-2 rounded-full">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-ping"></span>
                    <span class="text-[10px] font-black uppercase tracking-widest text-emerald-400">PROCESO DE ADMISIÓN ACTIVO: CICLO 2026</span>
                </div>
                <div class="text-left">
                    <p class="text-amber-500/40 text-[10px] font-black tracking-widest uppercase">Servidor Oficial SENATI</p>
                    <h2 class="text-4xl xl:text-5xl font-black text-white uppercase tracking-wider mt-1" id="live-clock">00:00:00</h2>
                    <p class="text-amber-200/60 text-[11px] font-medium tracking-wide mt-1" id="live-date">Sincronizando fecha...</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-[#1a0f08]/50 border border-amber-900/20 backdrop-blur-md p-5 rounded-2xl">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[9px] font-black text-amber-500/80 uppercase tracking-widest">Vacantes de la Escuela</span>
                            <span class="text-xs font-black text-white" id="seat-count">142 / 200</span>
                        </div>
                        <div class="w-full bg-[#0a0503] h-2 rounded-full overflow-hidden">
                            <div class="bg-gradient-to-r from-amber-600 to-yellow-500 h-full rounded-full transition-all duration-1000" id="seat-bar" style="width: 71%"></div>
                        </div>
                        <p class="text-[8px] text-amber-100/50 mt-2 font-semibold tracking-wider">RESERVA DE PLAZAS ASIGNADAS AL 71%</p>
                    </div>
                    <div class="bg-[#1a0f08]/50 border border-amber-900/20 backdrop-blur-md p-5 rounded-2xl">
                        <span class="text-[9px] font-black text-amber-500/80 uppercase tracking-widest">Diagnóstico del Entorno</span>
                        <div class="space-y-2 mt-2 text-[9px] font-bold text-amber-100/70 tracking-widest">
                            <div class="flex items-center justify-between">
                                <span>API GOOGLE AUTH:</span><span class="text-emerald-400 font-black">99.9% ONLINE</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>DB LATENCIA:</span><span class="text-emerald-400 font-black">0.01ms SINCRO</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-[#1a0f08]/30 border border-amber-900/10 p-5 rounded-2xl relative min-h-[90px] flex items-center transition-all">
                    <div class="absolute top-2.5 left-5 text-[8px] font-black text-amber-500/40 uppercase tracking-widest">Aviso Académico Oficial</div>
                    <p class="text-xs font-bold text-amber-100 tracking-wide mt-2 duration-500 transition-opacity" id="ticker-text">Cargando boletín informativo de la Escuela de Tecnologías de la Información...</p>
                </div>
            </div>
        </div>

    </div>

    <script>
        const canvas = document.getElementById('iridescent-canvas'); const ctx = canvas.getContext('2d');
        let width = canvas.width = window.innerWidth, height = canvas.height = window.innerHeight;
        window.addEventListener('resize', () => { width = canvas.width = window.innerWidth; height = canvas.height = window.innerHeight; });

        let time = 0; let rippleWaves = []; const particles = []; const particleCount = 100; const maxDistance = 120;
        const gridCols = 25; const gridRows = 20; const gridPoints = [];

        for (let c = 0; c < gridCols; c++) {
            for (let r = 0; r < gridRows; r++) {
                gridPoints.push({ baseX: (width / (gridCols - 1)) * c, baseY: (height / (gridRows - 1)) * r, x: (width / (gridCols - 1)) * c, y: (height / (gridRows - 1)) * r });
            }
        }

        class GoldParticle {
            constructor() { this.reset(); }
            reset() {
                this.x = Math.random() * width; this.y = Math.random() * height;
                this.vx = (Math.random() - 0.5) * 0.25; this.vy = (Math.random() - 0.5) * 0.25;
                this.radius = Math.random() * 1.5 + 0.4; this.baseAlpha = Math.random() * 0.4 + 0.15; this.alpha = this.baseAlpha;
                this.phase = Math.random() * Math.PI * 2; this.phaseSpeed = Math.random() * 0.015 + 0.003;
            }
            update(mouseX, mouseY) {
                this.phase += this.phaseSpeed; this.alpha = this.baseAlpha + Math.sin(this.phase) * 0.1;
                let noiseAngle = Math.sin(this.x * 0.003 + time) * Math.cos(this.y * 0.003 + time) * Math.PI * 2;
                this.x += Math.cos(noiseAngle) * 0.25 + this.vx; this.y += Math.sin(noiseAngle) * 0.25 + this.vy;
                if (mouseX !== undefined && mouseY !== undefined) {
                    let dx = mouseX - this.x, dy = mouseY - this.y, dist = Math.hypot(dx, dy);
                    if (dist < 280) { let pull = (1 - dist / 280) * 0.18; this.x += (dx / dist) * pull; this.y += (dy / dist) * pull; }
                }
                if (this.x < 0 || this.x > width) this.vx *= -1; if (this.y < 0 || this.y > height) this.vy *= -1;
            }
            draw() { ctx.fillStyle = `rgba(184, 134, 11, ${Math.max(0, this.alpha)})`; ctx.beginPath(); ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2); ctx.fill(); }
        }

        for (let i = 0; i < particleCount; i++) particles.push(new GoldParticle());
        let mouse = { x: undefined, y: undefined };
        window.addEventListener('mousemove', (e) => { mouse.x = e.clientX; mouse.y = e.clientY; });

        class Ripple {
            constructor(x, y) { this.x = x; this.y = y; this.radius = 0; this.maxRadius = 400; this.alpha = 0.7; this.speed = 5.5; }
            update() { this.radius += this.speed; this.alpha = 1 - (this.radius / this.maxRadius); }
        }
        window.addEventListener('click', (e) => { if (rippleWaves.length > 4) rippleWaves.shift(); rippleWaves.push(new Ripple(e.clientX, e.clientY)); });

        function runFluidEngine() {
            time += 0.0015; ctx.fillStyle = '#0a0503'; ctx.fillRect(0, 0, width, height);
            gridPoints.forEach(point => {
                let waveX = Math.sin(point.baseY * 0.005 + time) * 15; let waveY = Math.cos(point.baseX * 0.005 + time) * 15;
                point.x = point.baseX + waveX; point.y = point.baseY + waveY;
                if (mouse.x !== undefined && mouse.y !== undefined) {
                    let dx = mouse.x - point.x, dy = mouse.y - point.y, dist = Math.hypot(dx, dy);
                    if (dist < 300) { let distortion = (1 - dist / 300) * 45; point.x -= (dx / dist) * distortion; }
                }
                rippleWaves.forEach(wave => {
                    let dx = point.x - wave.x, dy = point.y - wave.y, dist = Math.hypot(dx, dy);
                    if (dist < wave.radius && dist > wave.radius - 40) { let force = (1 - dist / wave.maxRadius) * 30; point.x += (dx / dist) * force; point.y += (dy / dist) * force; }
                });
            });

            ctx.lineWidth = 0.35;
            for (let c = 0; c < gridCols; c++) {
                for (let r = 0; r < gridRows; r++) {
                    let currIdx = c * gridRows + r, pCurr = gridPoints[currIdx];
                    if (c < gridCols - 1) {
                        let pRight = gridPoints[(c + 1) * gridRows + r], alpha = 0.035 + (Math.sin(time + c * 0.2) * 0.015);
                        ctx.strokeStyle = `rgba(184, 134, 11, ${alpha})`; ctx.beginPath(); ctx.moveTo(pCurr.x, pCurr.y); ctx.lineTo(pRight.x, pRight.y); ctx.stroke();
                    }
                    if (r < gridRows - 1) {
                        let pDown = gridPoints[c * gridRows + (r + 1)], alpha = 0.035 + (Math.cos(time + r * 0.2) * 0.015);
                        ctx.strokeStyle = `rgba(184, 134, 11, ${alpha})`; ctx.beginPath(); ctx.moveTo(pCurr.x, pCurr.y); ctx.lineTo(pDown.x, pDown.y); ctx.stroke();
                    }
                }
            }
            particles.forEach(p => { p.update(mouse.x, mouse.y); p.draw(); });
            rippleWaves.forEach((wave, index) => {
                wave.update();
                if (wave.radius >= wave.maxRadius) rippleWaves.splice(index, 1);
                else { ctx.strokeStyle = `rgba(184, 134, 11, ${wave.alpha * 0.35})`; ctx.lineWidth = 1.5; ctx.beginPath(); ctx.arc(wave.x, wave.y, wave.radius, 0, Math.PI * 2); ctx.stroke(); }
            });
            requestAnimationFrame(runFluidEngine);
        }
        runFluidEngine();

        function handleGoogleClick() {
            const emailInput = document.getElementById('login-email-input').value;
            // Si el alumno digita un mail, lo inyecta a la pasarela simulada para validación en caliente
            if(emailInput) {
                window.location.href = "{{ url('auth/google') }}?email=" + encodeURIComponent(emailInput);
            } else {
                window.location.href = "{{ url('auth/google') }}";
            }
        }

        function updateClockAndDate() {
            const now = new Date(), hours = String(now.getHours()).padStart(2, '0'), minutes = String(now.getMinutes()).padStart(2, '0'), seconds = String(now.getSeconds()).padStart(2, '0');
            const clock = document.getElementById('live-clock'); if(clock) clock.textContent = `${hours}:${minutes}:${seconds}`;
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const dateEl = document.getElementById('live-date'); if(dateEl) dateEl.textContent = now.toLocaleDateString('es-ES', options);
        }
        setInterval(updateClockAndDate, 1000); updateClockAndDate();

        let currentSeats = 142;
        setInterval(() => {
            if (currentSeats < 194 && Math.random() > 0.6) {
                currentSeats += Math.floor(Math.random() * 2) + 1;
                const sc = document.getElementById('seat-count'), sb = document.getElementById('seat-bar');
                if(sc) sc.textContent = `${currentSeats} / 200`; if(sb) sb.style.width = `${(currentSeats / 200) * 100}%`;
            }
        }, 7000);

        const alerts = [
            "Matrículas abiertas para Ingeniería de Software y Backend Web Developer.",
            "Convenio SENATI: Exámenes de certificación AWS Cloud Practitioner disponibles.",
            "Inicio del ciclo académico y bienvenida de alumnos: Lunes 01 de Junio.",
            "Soporte técnico y mesa de ayuda de la Escuela de TI activo las 24 horas."
        ];
        let alertIdx = 0;
        function cycleAlerts() {
            const textElement = document.getElementById('ticker-text');
            if(textElement) {
                textElement.style.opacity = 0;
                setTimeout(() => { textElement.textContent = alerts[alertIdx]; textElement.style.opacity = 1; alertIdx = (alertIdx + 1) % alerts.length; }, 500);
            }
        }
        setInterval(cycleAlerts, 5000); cycleAlerts();
    </script>
</body>
</html>