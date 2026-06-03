<!DOCTYPE html>

<html lang="es">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <title>Inscripción de Expediente Académico Institucional — ETI SENATI</title>

  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800;900&display=swap" rel="stylesheet">

  <style>

    /* ═════════════════════════════════════════════════════════════════════════

       1. VARIABLES CORE Y PALETA CORPORATIVA ACADÉMICA (CRIMSON CYBER MATRIX)

    ═════════════════════════════════════════════════════════════════════════ */

    :root {

      --bg-core: #030000;

      --bg-card: linear-gradient(-45deg, #140002, #050001, #260005, #0a0002);

      --red-primary: #ff003c;

      --red-light: #ff4d73;

      --red-dark: #1f0006;

      --red-glow: rgba(255, 0, 60, 0.25);

      --red-glow-heavy: rgba(255, 0, 60, 0.65);

      --text-main: #fff0f2;

      --text-muted: #b3243b;

      --border-card: #590012;

      --font-stack: 'Barlow Condensed', 'Arial Narrow', Arial, sans-serif;

      --transition-cubic: all 0.7s cubic-bezier(0.16, 1, 0.3, 1);

      --transition-smooth: all 0.35s ease;

    }



    /* ═════════════════════════════════════════════════════════════════════════

       2. REVESTIMIENTO BASE Y REGLAS DE CONTROL DE VIEWPORT

    ═════════════════════════════════════════════════════════════════════════ */

    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

    html, body { background-color: var(--bg-core); font-family: var(--font-stack); color: var(--text-main); width: 100%; height: 100%; overflow: hidden; -webkit-font-smoothing: antialiased; }



    /* MOTOR CINEMÁTICO DE ANIMACIONES DE ALTO RENDIMIENTO */

    @keyframes liquidRedBg { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }

    @keyframes marqueeToLeft { 0% { transform: translate3d(0, 0, 0); } 100% { transform: translate3d(-14.285%, 0, 0); } }

    @keyframes marqueeToRight { 0% { transform: translate3d(-14.285%, 0, 0); } 100% { transform: translate3d(0, 0, 0); } }

    @keyframes cardPulseGlow { 0% { box-shadow: 0 20px 50px rgba(0,0,0,0.9), 0 0 5px rgba(255,0,60,0.1); } 100% { box-shadow: 0 20px 50px rgba(0,0,0,0.9), 0 0 25px rgba(255,0,60,0.3); } }

    @keyframes glitchText { 0% { text-shadow: 0 0 8px var(--red-glow); } 50% { text-shadow: -2px 0 red, 2px 0 cyan, 0 0 15px var(--red-primary); } 100% { text-shadow: 0 0 8px var(--red-glow); } }

    @keyframes pulseMatrixDot { 0%, 100% { opacity: 0.4; } 50% { opacity: 1; transform: scale(1.1); } }

    @keyframes statusLineScan { 0% { border-left-color: var(--border-card); } 50% { border-left-color: var(--red-primary); } 100% { border-left-color: var(--border-card); } }



    /* ═════════════════════════════════════════════════════════════════════════

       3. MAQUETACIÓN ESTRUCTURAL RESPONSIVA DUAL-PANEL

    ═════════════════════════════════════════════════════════════════════════ */

    .login-hero-view-container { display: flex; width: 100vw; height: 100vh; position: relative; }

   

    /* PANEL IZQUIERDO: EXTENDIDO PARA ARQUITECTURA MULTI-COLUMNA GRID */

    .login-left-panel {

      width: 45%; min-width: 520px; max-width: 700px; display: flex; align-items: flex-start; justify-content: center;

      padding: 50px 45px; position: relative; z-index: 20; background: var(--bg-core);

      border-right: 1px solid rgba(89, 0, 18, 0.3); overflow-y: auto;

    }

   

    /* SCROLLBAR CORPORATIVO SLICK */

    .login-left-panel::-webkit-scrollbar { width: 5px; }

    .login-left-panel::-webkit-scrollbar-track { background: transparent; }

    .login-left-panel::-webkit-scrollbar-thumb { background: #3d000e; border-radius: 2px; }

    .login-left-panel::-webkit-scrollbar-thumb:hover { background: var(--red-primary); box-shadow: 0 0 10px var(--red-primary); }



    .login-auth-card {

      width: 100%; background: var(--bg-card); background-size: 300% 300%;

      animation: liquidRedBg 12s ease infinite, cardPulseGlow 4s alternate infinite ease-in-out; border: 1.5px solid var(--border-card);

      border-radius: 20px; padding: 45px 36px; box-shadow: 0 20px 50px rgba(0,0,0,0.9); margin-top: 30px;

    }



    /* ENCABEZADOS DE IDENTIDAD VISUAL */

    .zen-top-line { height: 2px; background: linear-gradient(90deg, transparent, var(--red-primary), transparent); margin-bottom: 30px; border-radius: 1px; opacity: 0.9; box-shadow: 0 0 10px var(--red-primary); }

    .login-title-h1 { text-align: center; font-size: 2.3rem; font-weight: 900; letter-spacing: 5px; background: linear-gradient(140deg, var(--red-primary), #ffccd5, #800014); -webkit-background-clip: text; color: transparent; margin-bottom: 8px; text-transform: uppercase; line-height: 1; animation: glitchText 5s infinite; }

    .login-sub-brand { text-align: center; font-size: 0.65rem; color: var(--text-muted); letter-spacing: 2.5px; font-weight: 800; margin-bottom: 5px; text-transform: uppercase; }

    .login-decorative-rule { height: 1px; background: linear-gradient(90deg, transparent, #590012, transparent); margin: 20px 0 24px; }



    /* CUADROS DE ALERTA HUD UNIVERSITARIOS */

    .alert-box { background: rgba(255, 0, 60, 0.05); border: 1px solid rgba(255, 0, 60, 0.25); border-radius: 8px; padding: 16px; margin-bottom: 24px; font-family: 'Arial', sans-serif; font-size: 0.85rem; color: #ebd9db; line-height: 1.5; font-weight: 500; animation: statusLineScan 3s infinite ease-in-out; border-left: 4px solid var(--border-card); }

    .alert-box span { color: var(--red-light); font-weight: 700; text-shadow: 0 0 5px var(--red-glow); }

    .alert-box.alert-error { background: rgba(255, 26, 74, 0.08); border-color: rgba(255, 26, 74, 0.3); color: #ff4d73; border-left-color: #ff003c; }



    /* ═════════════════════════════════════════════════════════════════════════

       4. COMPONENTE: GRID INPUT ENGINE (REJILLA CRIMSON ACADÉMICA)

    ═════════════════════════════════════════════════════════════════════════ */

    .register-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 18px 16px; margin-bottom: 25px; }

    .col-span-2 { grid-column: span 2; }

   

    .section-divider {

      grid-column: span 2; font-size: 0.82rem; color: var(--red-primary); font-weight: 900;

      letter-spacing: 2px; text-transform: uppercase; margin-top: 12px; padding-bottom: 6px;

      border-bottom: 1px solid rgba(255, 0, 60, 0.25); text-shadow: 0 0 5px var(--red-glow);

    }



    .field-label { display: block; font-size: 0.72rem; color: var(--text-muted); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 8px; }

    .login-input-wrapper { position: relative; width: 100%; display: flex; align-items: center; }

   

    .login-f-input { width: 100%; height: 48px; background: #050001; border: 1.5px solid #3d000e; border-radius: 10px; padding: 0 18px; color: #ff6685; font-family: inherit; font-size: 1.1rem; outline: none; transition: var(--transition-smooth); box-shadow: inset 0 2px 8px rgba(0,0,0,0.8); }

    .login-f-input:focus { border-color: var(--red-primary); box-shadow: 0 0 15px rgba(255,0,60,0.2), inset 0 2px 8px rgba(0,0,0,0.8); background: #000000; transform: translateY(-1px); }

   

    /* SUB-TEXTOS FILTRADOS DE ESPECIFICACIONES TÉCNICAS */

    .db-restriction-lbl { font-size: 0.65rem; color: #8c646a; font-weight: 700; tracking: 0.5px; display: block; margin-top: 5px; text-transform: uppercase; }



    /* MEDIDOR DE INTENSIDAD CRIPTOGRÁFICA DE CONTRASEÑAS */

    .password-strength-meter { display: flex; gap: 6px; margin-top: 10px; height: 4px; grid-column: span 2; }

    .strength-bar { flex: 1; background: #260005; border-radius: 2px; transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); }

    .strength-bar.active-weak { background: #ff1a4a; box-shadow: 0 0 8px #ff1a4a; }

    .strength-bar.active-medium { background: #ffaa00; box-shadow: 0 0 8px #ffaa00; }

    .strength-bar.active-strong { background: #00ff66; box-shadow: 0 0 8px #00ff66; }

    .strength-text-indicator { font-size: 0.68rem; color: var(--text-muted); font-weight: 800; letter-spacing: 1px; text-transform: uppercase; margin-top: 6px; display: block; }



    /* CHECKBOX PERSONALIZADO DE TÉRMINOS Y GOBERNANZA */

    .terms-checkbox-wrapper { display: flex; align-items: flex-start; gap: 12px; margin-bottom: 26px; margin-top: 12px; cursor: pointer; user-select: none; }

    .terms-checkbox-wrapper input { display: none; }

    .custom-checkbox { width: 19px; height: 19px; border: 1.5px solid #800014; border-radius: 4px; display: flex; align-items: center; justify-content: center; transition: 0.2s ease; flex-shrink: 0; background: #050001; box-shadow: inset 0 1px 5px rgba(0,0,0,0.8); }

    .terms-checkbox-wrapper input:checked + .custom-checkbox { background: var(--red-primary); border-color: var(--red-primary); box-shadow: 0 0 12px var(--red-primary); }

    .terms-checkbox-wrapper input:checked + .custom-checkbox::after { content: '✓'; color: #fff; font-size: 0.85rem; font-weight: 900; }

    .terms-text { font-size: 0.78rem; color: #b3979b; font-weight: 600; line-height: 1.4; }

    .terms-text span { color: var(--red-light); transition: var(--transition-smooth); font-weight: 700; cursor: pointer; }

    .terms-text span:hover { text-shadow: 0 0 8px var(--red-primary); color: #fff; }



    /* BOTONES DE ENVIÓ Y NAVEGACIÓN LOCAL */

    .btn-submit-core { width: 100%; height: 52px; background: linear-gradient(95deg, #590012, #b3001e, var(--red-primary)); border: 1px solid rgba(255, 0, 60, 0.6); border-radius: 10px; color: #fff; font-family: inherit; font-size: 1.05rem; font-weight: 900; letter-spacing: 3px; cursor: pointer; margin-bottom: 24px; box-shadow: 0 6px 20px rgba(255, 0, 60, 0.3); transition: var(--transition-cubic); text-transform: uppercase; }

    .btn-submit-core:hover { filter: brightness(1.2); transform: translateY(-2px); box-shadow: 0 8px 30px rgba(255,0,60,0.6); }

   

    .separator-text { text-align: center; font-size: 0.75rem; color: var(--text-muted); font-weight: 800; letter-spacing: 2px; position: relative; text-transform: uppercase; }

    .separator-text a { color: var(--red-primary); text-decoration: none; margin-left: 8px; transition: var(--transition-smooth); font-weight: 900; }

    .separator-text a:hover { color: #fff; text-shadow: 0 0 10px var(--red-primary); }



    .btn-return-portal { position: absolute; top: 40px; left: 40px; z-index: 100; background: rgba(20, 0, 2, 0.85); border: 1.5px solid #590012; border-radius: 8px; padding: 11px 22px; color: #b3828a; font-family: inherit; font-size: 0.8rem; font-weight: 800; letter-spacing: 1.5px; text-transform: uppercase; cursor: pointer; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); transition: var(--transition-smooth); text-decoration: none; box-shadow: 0 5px 15px rgba(0,0,0,0.6); }

    .btn-return-portal:hover { border-color: var(--red-primary); color: #fff; transform: translateX(-3px); box-shadow: 0 0 15px var(--red-primary); }



    /* RIELES DIAGONALES DE MARQUESINA COMPUESTA */

    .login-right-panel { flex: 1; position: relative; overflow: hidden; background: var(--bg-core); }

    .login-right-panel::before { content: ''; position: absolute; inset: 0; pointer-events: none; z-index: 2; background: radial-gradient(ellipse 65% 60% at 75% 50%, rgba(255, 0, 60, 0.18) 0%, rgba(50, 0, 10, 0.05) 50%, transparent 75%); }

    .diag-wrap { position: absolute; inset: 0; overflow: hidden; }

    .diag-lines { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-22deg); width: 280%; }

    .dline { white-space: nowrap; padding: 24px 0; font-size: clamp(1.4rem, 1.9vw, 1.8rem); font-weight: 800; letter-spacing: 6px; border-top: 1px solid rgba(128, 0, 20, 0.25); line-height: 1; overflow: hidden; }

    .dline-inner { display: inline-block; white-space: nowrap; text-transform: uppercase; }

    .dline:nth-child(even) .dline-inner { animation: marqueeToLeft 48s linear infinite; }

    .dline:nth-child(odd) .dline-inner { animation: marqueeToRight 54s linear infinite; }

    .cw  { color: rgba(255, 240, 242, 0.65); text-shadow: 0 0 10px rgba(255,255,255,0.08); }

    .co  { color: rgba(255, 0, 60, 0.62); text-shadow: 0 0 12px rgba(255,0,60,0.2); }

    .ca  { color: rgba(255, 179, 193, 0.48); text-shadow: 0 0 8px rgba(255,179,193,0.08); }

    .cdw { color: rgba(255, 255, 255, 0.18); }

    .vig { position: absolute; inset: 0; pointer-events: none; z-index: 10; background: linear-gradient(90deg, #030000 0%, rgba(3,0,0,0.85) 15%, transparent 35%), linear-gradient(-90deg, rgba(3,0,0,0.98) 0%, transparent 25%), linear-gradient(180deg, rgba(3,0,0,0.98) 0%, rgba(3,0,0,0.4) 12%, transparent 26%), linear-gradient(0deg, rgba(3,0,0,0.98) 0%, rgba(3,0,0,0.4) 12%, transparent 26%); }



    /* ═════════════════════════════════════════════════════════════════════════

       5. INTERFAZ ASÍNCRONA: PROCESADOR UNIVERSITARIO DE ADMISIÓN

    ═════════════════════════════════════════════════════════════════════════ */

    .heidi-sync-overlay {

      position: fixed; inset: 0; background: #020001; z-index: 99999;

      display: none; flex-direction: column; align-items: center; justify-content: center;

      padding: 30px; font-family: 'Courier New', Courier, monospace;

    }

    .heidi-soc-box {

      width: 100%; max-w: 640px; background: #070002; border: 2px solid var(--red-primary);

      border-radius: 12px; padding: 40px; box-shadow: 0 0 50px rgba(255, 0, 60, 0.4);

      position: relative; overflow: hidden;

    }

    .heidi-soc-box::after {

      content: ''; position: absolute; inset: 0;

      background: linear-gradient(rgba(255,0,60,0) 50%, rgba(255,0,60,0.12) 50%), linear-gradient(90deg, rgba(255,0,0,0.04), rgba(0,255,255,0.02), rgba(0,0,255,0.04));

      background-size: 100% 4px, 6px 100%; pointer-events: none;

    }

    .heidi-title-node { font-size: 1.25rem; font-weight: 900; tracking: 2px; color: #fff; text-transform: uppercase; margin-bottom: 25px; border-bottom: 1px solid #590012; padding-bottom: 12px; display: flex; justify-content: space-between; align-items: center; font-family: var(--font-stack); }

    .heidi-log-container { display: flex; flex-direction: column; gap: 12px; margin-bottom: 30px; height: 190px; overflow: hidden; justify-content: flex-end; padding: 10px; background: rgba(0,0,0,0.4); border-radius: 6px; border: 1px solid #1a0004; }

    .heidi-log-line { font-family: 'Courier New', Courier, monospace; font-size: 0.8rem; color: #ff6685; font-weight: bold; letter-spacing: 0.5px; display: flex; align-items: center; gap: 10px; }

    .heidi-log-line span { color: var(--red-primary); }

    .heidi-progress-rail { width: 100%; height: 6px; background: #1a0004; border-radius: 3px; overflow: hidden; border: 1px solid #3d000e; }

    .heidi-progress-bar { width: 0%; height: 100%; background: linear-gradient(90deg, #b3001e, var(--red-primary)); box-shadow: 0 0 10px var(--red-primary); transition: width 0.1s linear; }

    .pulse-dot-indicator { width: 8px; height: 8px; background: #00ff66; border-radius: 50%; box-shadow: 0 0 8px #00ff66; animation: pulseMatrixDot 1s infinite; }



    /* ═════════════════════════════════════════════════════════════════════════

       6. VENTANA MODAL DE REGLAMENTOS Y POLÍTICAS LEGALES

    ═════════════════════════════════════════════════════════════════════════ */

    .legal-modal-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.85); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); z-index: 10000; display: none; align-items: center; justify-content: center; padding: 20px; }

    .legal-modal-card { width: 100%; max-width: 650px; background: #080103; border: 1.5px solid var(--border-card); border-radius: 16px; padding: 40px; box-shadow: 0 20px 60px rgba(0,0,0,0.9); }

    .legal-modal-body { max-height: 320px; overflow-y: auto; padding-right: 15px; margin-bottom: 25px; font-family: 'Arial', sans-serif; font-size: 0.85rem; color: #d9c5c7; line-height: 1.6; }

    .legal-modal-body::-webkit-scrollbar { width: 4px; }

    .legal-modal-body::-webkit-scrollbar-thumb { background: #590012; border-radius: 2px; }

    .legal-modal-body h4 { font-family: var(--font-stack); font-size: 1.1rem; color: #fff; text-transform: uppercase; margin-top: 20px; margin-bottom: 8px; letter-spacing: 1px; }

    .legal-modal-body h4:first-child { margin-top: 0; }

  </style>

</head>

<body>



  <div class="legal-modal-overlay" id="modal-legal-container">

    <div class="legal-modal-card">

      <h3 class="login-title-h1" style="font-size: 1.8rem; text-align: left; margin-bottom: 5px;" id="legal-modal-title">Estatuto de Admisión</h3>

      <p class="login-sub-brand" style="text-align: left; margin-bottom: 25px;">MARCO NORMATIVO LEGAL Y PROTECCIÓN PERIMETRAL DE REGISTROS</p>

     

      <div class="legal-modal-body" id="legal-modal-content">

        </div>

     

      <div style="text-align: right;">

        <button type="button" onclick="cerrarVentanaLegal()" class="btn-submit-core" style="width: auto; height: 42px; padding: 0 30px; margin: 0; font-size: 0.85rem;">ENTENDIDO Y CONFORME</button>

      </div>

    </div>

  </div>



  <div class="heidi-sync-overlay" id="heidi-sync-engine">

    <div class="heidi-soc-box">

      <div class="heidi-title-node">

        <span>SISTEMA DE VERIFICACIÓN LOGARÍTMICA ACADÉMICA V6.0</span>

        <div class="pulse-dot-indicator" id="soc-light"></div>

      </div>

     

      <div class="heidi-log-container" id="heidi-log-board">

        <div class="heidi-log-line"><span>[SISTEMA]</span> INICIALIZANDO COMPILACIÓN DE EXPEDIENTE PERIMETRAL UNIFICADO...</div>

      </div>



      <div class="heidi-progress-rail">

        <div class="heidi-progress-bar" id="heidi-progress-fill"></div>

      </div>

      <div style="text-align: right; margin-top: 12px; font-size: 0.7rem; font-weight: 800; color: #ff003c; letter-spacing: 1px;" id="heidi-percentage">0% CERTIFICADO</div>

    </div>

  </div>



  <div class="login-hero-view-container">

   

    <div class="login-left-panel">

      <a href="{{ route('login') }}" class="btn-return-portal">◀ RETORNAR AL ACCESO</a>



      <div class="login-auth-card">

        <div class="zen-top-line"></div>

        <h1 class="login-title-h1">REGISTRO ESTUDIANTE</h1>

        <p class="login-sub-brand">ESCUELA DE TECNOLOGÍAS DE LA INFORMACIÓN | SENATI</p>

        <div class="login-decorative-rule"></div>



        <div class="alert-box" id="hud-alert-message">

          @if(session('auth_type') && session('auth_type') !== 'Manual')

            Módulo Institucional Autenticado: El canal digital federado de <span>{{ session('auth_type') }}</span> ha sido validado correctamente. Sírvase completar su DNI y su número celular para inicializar su matrícula.

          @else

            El perfil de acceso analizado no posee un expediente activo en la Escuela de TI. Complete la declaración jurada técnica para formalizar su alta en el Ciclo Académico 2026-II.

          @endif

        </div>



        @if($errors->any())

          <div class="alert-box alert-error">

            <span>[EXCEPCIÓN DE CONTROL DE INTEGRIDAD]:</span> {{ $errors->first() }}

          </div>

        @endif



        <form method="POST" action="{{ route('register') }}" onsubmit="ejecutarHandshakeTransaccional(event)" id="core-matrix-register-form">

          @csrf

          <div class="register-grid">

           

            <div class="section-divider">Declaración Jurada Civil del Postulante</div>

           

            <div>

              <label class="field-label">NOMBRES COMPLETOS</label>

              <div class="login-input-wrapper">

                <input class="login-f-input" type="text" name="name" id="field-name" value="{{ session('failed_email') ? 'Estudiante Federado' : old('name') }}" required autofocus placeholder="Ej. Carlos Enrique">

              </div>

              <span class="db-restriction-lbl">Debe coincidir estrictamente con su documento de identidad civil</span>

            </div>

           

            <div>

              <label class="field-label">APELLIDOS COMPLETOS</label>

              <div class="login-input-wrapper">

                <input class="login-f-input" type="text" name="last_name" id="field-lastname" value="{{ old('last_name') }}" required placeholder="Ej. Mendoza Alva">

              </div>

              <span class="db-restriction-lbl">Mapeado directo para la emisión de certificaciones globales</span>

            </div>



            <div class="col-span-2">

              <label class="field-label">DIRECCIÓN ELECTRÓNICA INSTITUCIONAL DE ACCESO</label>

              <div class="login-input-wrapper">

                <input class="login-f-input" type="email" name="email" id="field-email" value="{{ session('failed_email', old('email')) }}" required placeholder="nombre.apellido@senati.pe">

              </div>

              <span class="db-restriction-lbl">Canal exclusivo homologado ➔ Restringido a dominios académicos @senati.pe</span>

            </div>



            <div>

              <label class="field-label">TELÉFONO CELULAR DE CONTACTO</label>

              <div class="login-input-wrapper">

                <input class="login-f-input" type="text" name="phone" id="field-phone" value="{{ old('phone') }}" required placeholder="900000000">

              </div>

              <span class="db-restriction-lbl">Requerido para alertas de ciberseguridad y doble factor (2FA)</span>

            </div>

           

            <div>

              <label class="field-label">DOCUMENTO NACIONAL DE IDENTIDAD (DNI)</label>

              <div class="login-input-wrapper">

                <input class="login-f-input" type="text" name="dni" id="field-dni" value="{{ old('dni') }}" required maxlength="8" placeholder="00000000">

              </div>

              <span class="db-restriction-lbl">Índice compuesto inmutable ➔ Longitud rígida de 8 caracteres</span>

            </div>



            <div class="section-divider">Credenciales Perimetrales de Acceso</div>



            <div>

              <label class="field-label">CONTRASEÑA DE SEGURIDAD</label>

              <div class="login-input-wrapper">

                <input class="login-f-input" type="password" id="reg-password" name="password" required onkeyup="analizarComplejidadAlgoritmica()" placeholder="••••••••">

              </div>

              <span class="db-restriction-lbl">Inyecta cifrado asimétrico Bcrypt irreversible de 60 caracteres</span>

            </div>

           

            <div>

              <label class="field-label">CONFIRMAR CONTRASEÑA DE SEGURIDAD</label>

              <div class="login-input-wrapper">

                <input class="login-f-input" type="password" id="reg-password-confirm" name="password_confirmation" required placeholder="••••••••">

              </div>

              <span class="db-restriction-lbl">Control de paridad estricto a nivel de infraestructura</span>

            </div>



            <div class="col-span-2">

              <div class="password-strength-meter">

                <div class="strength-bar" id="str-1"></div>

                <div class="strength-bar" id="str-2"></div>

                <div class="strength-bar" id="str-3"></div>

              </div>

              <span class="strength-text-indicator" id="str-text-label">Complejidad de clave: En espera de patrones...</span>

            </div>



          </div>



          <label class="terms-checkbox-wrapper">

            <input type="checkbox" id="field-terms" required>

            <div class="custom-checkbox"></div>

            <div class="terms-text">Declaro bajo juramento civil haber leído minuciosamente el <span onclick="desplegarVentanaLegal('reglamento')">Reglamento Académico del Estudiante</span> y autorizo formalmente la indexación y resguardo de mis datos personales según la <span onclick="desplegarVentanaLegal('privacidad')">Ley de Protección de Datos Personales N° 29733</span>.</div>

          </label>



          <button type="submit" class="btn-submit-core">FINALIZAR INSCRIPCIÓN E INICIAR SESIÓN</button>

        </form>

       

        <div class="separator-text">¿YA TIENES UN EXPEDIENTE INICIALIZADO? <a href="{{ route('login') }}">INGRESAR AQUÍ</a></div>

      </div>

    </div>

   

    <div class="login-right-panel">

      <div class="diag-wrap"><div class="diag-lines" id="dl-register"></div></div>

      <div class="vig"></div>

    </div>

  </div>



<script>

// 1. GENERADOR DE RIELES DIAGONALES DE MARQUESINA DINÁMICA (DIAGONAL BELT RUNNER)

(function () {

  const msgs = [

    { t: "CRIMSON REVOLUTION ✦ ADMISIÓN PERMANENTE ABIERTA ✦ ESCUELA DE TECNOLOGÍAS SENATI ✦ CANAL DE AUTENTICACIÓN CIFRADO ✦ ",  c: "cw"  },

    { t: "INGENIERÍA DE SOFTWARE CON INTELIGENCIA ARTIFICIAL ✦ MACHINE LEARNING ✦ CYBERSECURITY SOC OPERATIVE CENTRE ✦ ", c: "co"  },

    { t: "CONVENIOS DE CERTIFICACIÓN ACADÉMICA GLOBAL VIGENTES ✦ AWS ACADEMY ✦ CISCO INFRASTRUCTURE ✦ MICROSOFT LEARN ✦ ", c: "cw"  },

    { t: "ENTORNOS DE CÓMPUTO EN LA NUBE DE ALTA DISPONIBILIDAD ✦ PROTOCOLO DE CONEXIÓN CRIPTOGRÁFICO HOMOLOGADO ✦ ",    c: "ca"  },

    { t: "BOLSA DE TRABAJO INDUSTRIAL ACTIVA ✦ INSERCIÓN LABORAL EMPRESARIAL DIRECTA COGNITIVA MULTICLOUD ✦ ",             c: "cdw" },

  ];

  const container = document.getElementById('dl-register');

  if(container) {

    for (let i = 0; i < 44; i++) {

      const m = msgs[i % msgs.length];

      const div = document.createElement('div'); div.className = 'dline ' + m.c;

      const innerSpan = document.createElement('span'); innerSpan.className = 'dline-inner'; innerSpan.textContent = m.t.repeat(6);

      div.appendChild(innerSpan); container.appendChild(div);

    }

  }

})();



// 2. ANALIZADOR DE COMPLEJIDAD CRIPTOGRÁFICA EN TIEMPO REAL (ALGORITMIC STRENGTH METER)

function analizarComplejidadAlgoritmica() {

  const pwd = document.getElementById('reg-password').value;

  const b1 = document.getElementById('str-1');

  const b2 = document.getElementById('str-2');

  const b3 = document.getElementById('str-3');

  const textLabel = document.getElementById('str-text-label');

 

  [b1, b2, b3].forEach(b => b.className = 'strength-bar');

  textLabel.style.color = '#b3243b';



  if (pwd.length === 0) {

    textLabel.innerText = "Complejidad de clave: En espera de patrones...";

    return;

  }



  if (pwd.length > 0) {

    b1.classList.add('active-weak');

    textLabel.innerText = "Complejidad de clave: Vulnerable (Fuerza perimetral deficiente)";

    textLabel.style.color = '#ff1a4a';

  }

  if (pwd.length >= 6 && /[A-Z]/.test(pwd) && /[0-9]/.test(pwd)) {

    b1.className = 'strength-bar active-medium';

    b2.classList.add('active-medium');

    textLabel.innerText = "Complejidad de clave: Estándar (Aceptable para canales locales)";

    textLabel.style.color = '#ffaa00';

  }

  if (pwd.length >= 8 && /[A-Z]/.test(pwd) && /[0-9]/.test(pwd) && /[^A-Za-z0-9]/.test(pwd)) {

    b1.className = 'strength-bar active-strong';

    b2.className = 'strength-bar active-strong';

    b3.classList.add('active-strong');

    textLabel.innerText = "Complejidad de clave: Grado Militar (Cifrado inexpugnable)";

    textLabel.style.color = '#00ff66';

  }

}



// 3. BASE DE DATOS LOCAL DE TEXTOS LEGALES CORPORATIVOS DE GRADO ACADÉMICO (DATALOAD)

const baseTextosLegales = {

  reglamento: {

    titulo: "Reglamento Oficial del Estudiante ETI",

    cuerpo: `<h4>Artículo 1: Régimen de Permanencia Académica</h4><p>El presente estatuto regula las normativas de inscripción, permanencia y evaluación dentro de la Escuela de Tecnologías de la Información. Todo postulante que inicializa su expediente adquiere de forma irrestricta la obligación de cumplir con las exigencias horarias de los laboratorios físicos de alta especialización y mantener un récord de conducta intachable en los entornos virtuales elásticos.</p><h4>Artículo 2: Uso de Infraestructura Tecnológica</h4><p>Los clústeres de cómputo avanzado, servidores multicloud locales y licencias internacionales provistas por AWS Academy, Cisco y Microsoft son de uso exclusivamente académico. Queda terminantemente prohibido el despliegue de scripts automatizados no autorizados, el minado de criptoactivos o cualquier actividad que degrade la tasa de transferencia de datos perimetral o altere el diccionario central del sistema.</p><h4>Artículo 3: De las Evaluaciones y Certificaciones</h4><p>La escala de calificación se rige bajo el sistema vigesimal rígido. La nota mínima aprobatoria para validar un módulo técnico de ingeniería es de catorce (14.00). El plagio intelectual, la suplantación de identidad mediante pasarelas externas o el uso de agentes de automatización maliciosos durante los handshakes de evaluación provocarán la baja inmediata del expediente académico sin derecho a apelación legal.</p>`

  },

  privacidad: {

    titulo: "Políticas de Privacidad y Ley N° 29733",

    cuerpo: `<h4>Sección 1: Consentimiento de Tratamiento del Expediente</h4><p>De conformidad con la Ley N° 29733, Ley de Protección de Datos Personales de la República, el postulante autoriza expresamente a la Escuela de Tecnologías de la Información a almacenar, compilar e indexar los datos civiles provistos en este formulario técnico en su banco de datos institucional centralizado con altos estándares criptográficos.</p><h4>Sección 2: Finalidad de los Metadatos Académicos</h4><p>La información recolectada (Nombres, Apellidos, DNI, Correo Electrónico y Teléfono Celular) posee la finalidad única y estricta de gestionar el historial de matrícula, el aprovisionamiento automatizado de cuentas de nube, la emisión de firmas electrónicas homologadas y el monitoreo forense analítico para la prevención de suplantaciones en el SOC.</p><h4>Sección 3: Ejercicio de Derechos ARCO</h4><p>El titular de los datos personales podrá ejercer en cualquier momento sus derechos de Acceso, Rectificación, Cancelación y Oposición (ARCO) dirigiendo una solicitud formal firmada digitalmente hacia los canales oficiales del soporte técnico de admisiones (soporte.tecnico@senati.pe), adjuntando copia legible de su documento nacional de identidad civil.</p>`

  }

};



// 4. CONTROLADORES DE LA INTERFAZ DE TEXTOS LEGALES MODALES

function desplegarVentanaLegal(tipo) {

  event.preventDefault(); // Previene que el clic active el checkbox o recargue

  const modal = document.getElementById('modal-legal-container');

  const titulo = document.getElementById('legal-modal-title');

  const cuerpo = document.getElementById('legal-modal-content');

 

  if(baseTextosLegales[tipo]) {

    titulo.innerText = baseTextosLegales[tipo].titulo.toUpperCase();

    cuerpo.innerHTML = baseTextosLegales[tipo].cuerpo;

    modal.style.display = 'flex';

  }

}



function cerrarVentanaLegal() {

  document.getElementById('modal-legal-container').style.display = 'none';

}



// 5. INTERCEPTADOR PRE-SUBMIT: RECONOCIMIENTO UNIVERSITARIO Y FLUJO DE ESCRITURA SEGUIDO EN TIEMPO REAL

function ejecutarHandshakeTransaccional(event) {

  // Suspendemos temporalmente el POST instantáneo para proyectar la secuencia analítica de validación

  event.preventDefault();



  const form = document.getElementById('core-matrix-register-form');

  const overlay = document.getElementById('heidi-sync-engine');

  const board = document.getElementById('heidi-log-board');

  const progressBar = document.getElementById('heidi-progress-fill');

  const percentText = document.getElementById('heidi-percentage');

  const light = document.getElementById('soc-light');



  // Captura dinámica de metadatos de interfaz para el HUD de reconocimiento interactivo

  const studentName = document.getElementById('field-name').value.toUpperCase();

  const studentDni = document.getElementById('field-dni').value;

  const studentEmail = document.getElementById('field-email').value.toLowerCase();



  // Activación de la pantalla completa del subsistema de validación asíncrona

  overlay.style.display = 'flex';



  // Secuencia estricta de subprocesos universitarios con timings calibrados de grado industrial

  const steps = [

    { text: `[SOLICITUD INICIADA] INTERCEPTANDO PAYLOAD TRANSPARENTE EN LOS SERVIDORES CORE...`, delay: 300, progress: 12 },

    { text: `[RECONOCIMIENTO] Estudiante [${studentName}] identificado plenamente en la pasarela nacional de admisión.`, delay: 750, progress: 28 },

    { text: `[AUDITORÍA FORENSE] Verificando índice inmutable de identidad civil para el DNI: [${studentDni}]...`, delay: 1300, progress: 48 },

    { text: `[CORTAFUEGOS] Ejecutando análisis anti-duplicidad de registros en el clúster centralizado de la institución.`, delay: 1900, progress: 65 },

    { text: `[APROVISIONAMIENTO] Sincronizando de forma atómica los campos académicos: apellidos y teléfono.`, delay: 2500, progress: 83 },

    { text: `[CRIMSON MATRIX] Indexando Llave Única Corporativa para el alias institucional: [${studentEmail}].`, delay: 3100, progress: 96 },

    { text: `[CONEXIÓN SEGURA] EXPEDIENTE ACADÉMICO CERTIFICADO AL 100% EN EL CLÚSTER. REDIRIGIENDO AL CENTRO DE COMANDO...`, delay: 3600, progress: 100 }

  ];



  // Cambiamos el indicador del SOC a estado de procesamiento activo (Ámbar)

  light.style.backgroundColor = '#ffaa00';

  light.style.boxShadow = '0 0 12px #ffaa00';



  // Despacho cronometrado de las trazas del terminal

  steps.forEach(step => {

    setTimeout(() => {

      // Inyectar línea de log con formato de consola militar neón

      const line = document.createElement('div');

      line.className = 'heidi-log-line';

      line.innerHTML = `<span>[PROCESO]</span> ${step.text}`;

      board.appendChild(line);



      // Sincronizar elementos visuales del riel de progreso de hardware

      progressBar.style.width = `${step.progress}%`;

      percentText.innerText = `${step.progress}% CERTIFICADO`;



      // Al consolidar el 100% del canal, disparamos luz verde y ejecutamos submit inmutable

      if(step.progress === 100) {

        light.style.backgroundColor = '#00ff66';

        light.style.boxShadow = '0 0 12px #00ff66';

        setTimeout(() => {

          form.submit(); // Envío físico definitivo del payload al RegisterController de Laravel

        }, 450);

      }

    }, step.delay);

  });

}

</script>

</body>

</html> 

