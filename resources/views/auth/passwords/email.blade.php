<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Recuperación de Credenciales — ETI SENATI</title>
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800;900&display=swap" rel="stylesheet">
  <style>
    /* ═════════════════════════════════════════════════════════════════════════
       VARIABLES CORE Y PALETA CORPORATIVA
    ═════════════════════════════════════════════════════════════════════════ */
    :root {
      --bg-core: #040100;
      --bg-card: linear-gradient(-45deg, #160a00, #0a0400, #220f00, #0c0500);
      --amber-primary: #ff9200;
      --text-main: #fffbeb;
      --text-muted: #b86f04;
      --border-card: #4a2000;
      --font-stack: 'Barlow Condensed', 'Arial Narrow', Arial, sans-serif;
      --transition-cubic: all 0.7s cubic-bezier(0.16, 1, 0.3, 1);
      --transition-smooth: all 0.3s ease;
    }

    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
    html, body { background-color: var(--bg-core); font-family: var(--font-stack); color: var(--text-main); width: 100%; height: 100%; overflow: hidden; }

    @keyframes liquidAmberBg { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
    @keyframes marqueeToLeft { 0% { transform: translate3d(0, 0, 0); } 100% { transform: translate3d(-14.285%, 0, 0); } }
    @keyframes marqueeToRight { 0% { transform: translate3d(-14.285%, 0, 0); } 100% { transform: translate3d(0, 0, 0); } }
    @keyframes shieldPulse { 0% { transform: scale(0.95); box-shadow: 0 0 10px rgba(255,146,0,0.2); } 50% { transform: scale(1.05); box-shadow: 0 0 30px rgba(255,146,0,0.6); } 100% { transform: scale(0.95); box-shadow: 0 0 10px rgba(255,146,0,0.2); } }

    .login-hero-view-container { display: flex; width: 100vw; height: 100vh; position: relative; }
    
    .login-left-panel { width: 38%; min-width: 400px; max-width: 480px; display: flex; align-items: center; justify-content: center; padding: 30px; position: relative; z-index: 20; background: var(--bg-core); border-right: 1px solid rgba(74, 32, 0, 0.2); }
    
    .login-auth-card { width: 100%; background: var(--bg-card); background-size: 300% 300%; animation: liquidAmberBg 15s ease infinite; border: 1.5px solid var(--border-card); border-radius: 20px; padding: 50px 36px; box-shadow: 0 20px 50px rgba(0,0,0,0.8); }

    /* HUD ESCUDO SOC */
    .soc-shield-icon { width: 65px; height: 65px; margin: 0 auto 20px; background: rgba(255,146,0,0.05); border: 1.5px solid var(--amber-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; animation: shieldPulse 3s infinite; box-shadow: inset 0 0 15px rgba(255,146,0,0.2); backdrop-filter: blur(5px); }
    .soc-shield-icon svg { width: 32px; height: 32px; fill: var(--amber-primary); }

    .login-title-h1 { text-align: center; font-size: 2.2rem; font-weight: 900; letter-spacing: 4px; background: linear-gradient(140deg, #FF8C00, #FFD000, #FF4500); -webkit-background-clip: text; background-clip: text; color: transparent; margin-bottom: 12px; text-transform: uppercase; line-height: 1.1; }
    .login-decorative-rule { height: 1px; background: linear-gradient(90deg, transparent, #5c2800, transparent); margin: 0 0 20px; }
    
    .recovery-desc-text { font-family: 'Arial', sans-serif; font-size: 0.9rem; color: #a69282; text-align: center; line-height: 1.6; font-weight: 500; margin-bottom: 30px; padding: 0 10px; }

    .field-label { display: block; font-size: 0.72rem; color: var(--text-muted); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 10px; }
    .form-group { margin-bottom: 24px; }

    .login-input-wrapper { position: relative; width: 100%; display: flex; align-items: center; }
    .input-left-icon { position: absolute; left: 18px; height: 100%; display: flex; align-items: center; justify-content: center; color: #5c2700; z-index: 5; pointer-events: none; transition: var(--transition-smooth); }
    .login-f-input { width: 100%; height: 52px; background: #040200; border: 1.5px solid #331700; border-radius: 10px; padding: 0 18px 0 50px; color: #FFAA44; font-family: inherit; font-size: 1.1rem; outline: none; transition: var(--transition-smooth); box-shadow: inset 0 2px 10px rgba(0,0,0,0.5); }
    .login-f-input:focus { border-color: #9c4c0b; box-shadow: 0 0 15px rgba(255,100,0,0.15), inset 0 2px 10px rgba(0,0,0,0.5); background: #000000; transform: translateY(-1px); }
    .login-f-input:focus ~ .input-left-icon { color: var(--amber-primary); }

    .btn-submit-core { width: 100%; height: 52px; background: linear-gradient(95deg, #5c2700, #cc6c00, #ff9200); border: 1px solid rgba(255, 146, 0, 0.5); border-radius: 10px; color: #fff; font-family: inherit; font-size: 1.05rem; font-weight: 900; letter-spacing: 2px; cursor: pointer; box-shadow: 0 6px 20px rgba(255, 146, 0, 0.25); transition: var(--transition-cubic); text-transform: uppercase; margin-bottom: 10px; }
    .btn-submit-core:hover { filter: brightness(1.2); transform: translateY(-2px); box-shadow: 0 8px 30px rgba(255,146,0,0.45); }

    .navigation-links { display: flex; justify-content: center; margin-top: 24px; padding-top: 20px; border-top: 1px solid #1c0a00; }
    .navigation-links a { font-size: 0.75rem; color: var(--text-muted); font-weight: 800; letter-spacing: 2px; text-decoration: none; text-transform: uppercase; transition: var(--transition-smooth); display: flex; align-items: center; gap: 8px; }
    .navigation-links a:hover { color: var(--amber-primary); text-shadow: 0 0 10px rgba(255,146,0,0.4); }

    /* RIELES DIAGONALES FONDO */
    .login-right-panel { flex: 1; position: relative; overflow: hidden; background: var(--bg-core); }
    .login-right-panel::before { content: ''; position: absolute; inset: 0; pointer-events: none; z-index: 2; background: radial-gradient(ellipse 65% 60% at 75% 50%, rgba(230, 85, 0, 0.22) 0%, rgba(100, 35, 0, 0.05) 50%, transparent 75%); }
    .diag-wrap { position: absolute; inset: 0; overflow: hidden; }
    .diag-lines { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-22deg); width: 280%; }
    .dline { white-space: nowrap; padding: 24px 0; font-size: clamp(1.4rem, 1.9vw, 1.8rem); font-weight: 800; letter-spacing: 6px; border-top: 1px solid rgba(110, 45, 0, 0.35); line-height: 1; overflow: hidden; }
    .dline-inner { display: inline-block; white-space: nowrap; text-transform: uppercase; }
    .dline:nth-child(even) .dline-inner { animation: marqueeToLeft 48s linear infinite; }
    .dline:nth-child(odd) .dline-inner { animation: marqueeToRight 54s linear infinite; }
    .cw  { color: rgba(255, 255, 255, 0.65); text-shadow: 0 0 10px rgba(255,255,255,0.08); }
    .co  { color: rgba(255, 150, 0, 0.62); text-shadow: 0 0 12px rgba(255,150,0,0.15); }
    .ca  { color: rgba(255, 212, 130, 0.48); text-shadow: 0 0 8px rgba(255,212,130,0.08); }
    .cdw { color: rgba(255, 255, 255, 0.22); }
    .vig { position: absolute; inset: 0; pointer-events: none; z-index: 10; background: linear-gradient(90deg, #040100 0%, rgba(4,1,0,0.85) 15%, transparent 35%), linear-gradient(-90deg, rgba(4,1,0,0.98) 0%, transparent 25%), linear-gradient(180deg, rgba(4,1,0,0.98) 0%, rgba(4,1,0,0.4) 12%, transparent 26%), linear-gradient(0deg, rgba(4,1,0,0.98) 0%, rgba(4,1,0,0.4) 12%, transparent 26%); }

    @media (max-width: 1024px) {
      .login-left-panel { width: 100%; border-right: none; max-width: none; }
      .login-right-panel { display: none; }
    }
  </style>
</head>
<body>

  <div class="login-hero-view-container">
    <div class="login-left-panel">
      <div class="login-auth-card">
        
        <!-- SHIELD HUD -->
        <div class="soc-shield-icon">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
          </svg>
        </div>

        <h1 class="login-title-h1">RECUPERAR<br>CREDENCIALES</h1>
        <div class="login-decorative-rule"></div>
        
        <p class="recovery-desc-text">Ingrese su dirección de correo electrónico institucional asociado. El sistema validará su identidad y emitirá un token criptográfico seguro directo a su bandeja de entrada.</p>

        @if (session('status'))
            <div style="background: rgba(0, 255, 102, 0.1); border: 1px solid rgba(0, 255, 102, 0.4); color: #00ff66; padding: 12px; border-radius: 8px; text-align: center; font-size: 0.8rem; font-weight: 700; margin-bottom: 20px;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
          @csrf
          <div class="form-group">
            <label class="field-label">CORREO ELECTRÓNICO ASOCIADO</label>
            <div class="login-input-wrapper">
              <input class="login-f-input" type="email" name="email" value="{{ old('email') }}" placeholder="estudiante@senati.pe" required autofocus>
              <!-- SVG Email Icon -->
              <div class="input-left-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
              </div>
            </div>
            @if($errors->has('email')) <div style="color:#EA4335; font-size:0.75rem; margin-top:6px; font-weight:700;">{{ $errors->first('email') }}</div> @endif
          </div>

          <button type="submit" class="btn-submit-core">GENERAR TOKEN DE RECUPERACIÓN</button>
        </form>

        <div class="navigation-links">
          <a href="{{ route('login') }}">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            VOLVER AL PANEL DE ACCESO
          </a>
        </div>
      </div>
    </div>

    <div class="login-right-panel">
      <div class="diag-wrap"><div class="diag-lines" id="dl-password"></div></div>
      <div class="vig"></div>
    </div>
  </div>

<script>
// RIELES DIAGONALES FONDO
(function () {
  const msgs = [
    { t: "MATRÍCULAS ABIERTAS ✦ ESCUELA DE TECNOLOGÍAS SENATI ✦ ÚLTIMAS PLAZAS DISPONIBLES ✦ ",  c: "cw"  },
    { t: "INGENIERÍA DE SOFTWARE CON INTELIGENCIA ARTIFICIAL ✦ MACHINE LEARNING ✦ DATA SCIENCE ✦ ", c: "co"  },
    { t: "CONVENIOS DE CERTIFICACIÓN GLOBAL ✦ AWS ACADEMY ✦ CISCO ✦ MICROSOFT AZURE ✦ ORACLE ✦ ", c: "cw"  },
    { t: "LABORATORIOS DE ALTA ESPECIALIZACIÓN ✦ EQUIPADOS CON TECNOLOGÍA DE PUNTA ✦ ",            c: "ca"  },
    { t: "BOLSA DE TRABAJO ACTIVA ✦ VINCULADA DIRECTAMENTE CON EMPRESAS ✦ INSERCIÓN LABORAL ✦ ",   c: "cdw" },
  ];
  const container = document.getElementById('dl-password');
  if(container) {
    for (let i = 0; i < 44; i++) {
      const m = msgs[i % msgs.length];
      const div = document.createElement('div'); div.className = 'dline ' + m.c;
      const innerSpan = document.createElement('span'); innerSpan.className = 'dline-inner'; innerSpan.textContent = m.t.repeat(7);
      div.appendChild(innerSpan); container.appendChild(div);
    }
  }
})();
</script>
</body>
</html>