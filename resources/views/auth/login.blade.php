<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Portal Transaccional y Matrícula Permanente — ETI SENATI</title>
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800;900&display=swap" rel="stylesheet">
  <style>
    /* ═════════════════════════════════════════════════════════════════════════
       1. VARIABLES CORE Y PALETA DE COLOR NEÓN ULTRA-FLUIDA (ROJO Y NEGRO)
    ═════════════════════════════════════════════════════════════════════════ */
    :root {
      --bg-core: #030000;
      --bg-card: linear-gradient(-45deg, #140002, #050001, #260005, #0a0002);
      --red-primary: #ff003c;
      --red-light: #ff4d73;
      --red-dark: #1f0006;
      --red-glow: rgba(255, 0, 60, 0.45);
      --red-glow-heavy: rgba(255, 0, 60, 0.7);
      --text-main: #fff0f2;
      --text-muted: #b3243b;
      --border-card: #590012;
      --font-stack: 'Barlow Condensed', 'Arial Narrow', Arial, sans-serif;
      --glass-bg: rgba(6, 0, 2, 0.82);
      --glass-border: rgba(255, 0, 60, 0.28);
      --transition-cubic: all 0.7s cubic-bezier(0.16, 1, 0.3, 1);
      --transition-smooth: all 0.3.5s ease;
    }

    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
    html { scroll-behavior: smooth; background-color: var(--bg-core); width: 100%; height: 100%; }
    body { background-color: var(--bg-core); font-family: var(--font-stack); color: var(--text-main); overflow-x: hidden; overflow-y: auto; width: 100%; min-height: 100vh; -webkit-font-smoothing: antialiased; }
    
    body::-webkit-scrollbar { width: 8px; }
    body::-webkit-scrollbar-track { background: #010000; }
    body::-webkit-scrollbar-thumb { background: #1a0004; border-radius: 4px; border: 1px solid #3d000e; }
    body::-webkit-scrollbar-thumb:hover { background: var(--red-primary); box-shadow: 0 0 10px var(--red-primary); }

    /* ═════════════════════════════════════════════════════════════════════════
       2. MOTOR CINEMÁTICO DE ANIMACIONES (KEYFRAMES EXTREMOS)
    ═════════════════════════════════════════════════════════════════════════ */
    @keyframes liquidRedBg { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
    @keyframes marqueeToLeft { 0% { transform: translate3d(0, 0, 0); } 100% { transform: translate3d(-14.285%, 0, 0); } }
    @keyframes marqueeToRight { 0% { transform: translate3d(-14.285%, 0, 0); } 100% { transform: translate3d(0, 0, 0); } }
    @keyframes horizontalScrollLogos { 0% { transform: translate3d(0, 0, 0); } 100% { transform: translate3d(-50%, 0, 0); } }
    @keyframes fadeInUp { 0% { opacity: 0; transform: translateY(40px); } 100% { opacity: 1; transform: translateY(0); } }
    @keyframes pulseNavbarGlow { 0% { box-shadow: 0 0 0 0 rgba(255, 0, 60, 0.4); border-color: rgba(255, 0, 60, 0.3); } 70% { box-shadow: 0 0 20px 10px rgba(255, 0, 60, 0); border-color: rgba(255, 0, 60, 0.6); } 100% { box-shadow: 0 0 0 0 rgba(255, 0, 60, 0); border-color: rgba(255, 0, 60, 0.3); } }
    @keyframes chatbotScanner { 0% { top: 0%; opacity: 0; } 10% { opacity: 1; } 90% { opacity: 1; } 100% { top: 100%; opacity: 0; } }
    @keyframes flashLive { 0%, 100% { opacity: 0.3; } 50% { opacity: 1; } }
    @keyframes shieldPulse { 0% { transform: scale(0.95); box-shadow: 0 0 15px rgba(255,0,60,0.2); } 50% { transform: scale(1.05); box-shadow: 0 0 35px rgba(255,0,60,0.7); } 100% { transform: scale(0.95); box-shadow: 0 0 15px rgba(255,0,60,0.2); } }
    @keyframes neonTextPulse { 0%, 100% { text-shadow: 0 0 10px rgba(255,0,60,0.3), 0 0 20px rgba(255,0,60,0.2); } 50% { text-shadow: 0 0 20px rgba(255,0,60,0.6), 0 0 40px rgba(255,0,60,0.4); } }
    @keyframes fluidHalo { 0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.8; } 50% { transform: translate(-50%, -50%) scale(1.15); opacity: 1; filter: hue-rotate(15deg); } }
    @keyframes cardPulseGlow { 0% { box-shadow: 0 10px 30px rgba(0,0,0,0.9), 0 0 5px rgba(255,0,60,0.1); } 100% { box-shadow: 0 10px 40px rgba(0,0,0,0.9), 0 0 20px rgba(255,0,60,0.3); } }

    /* ═════════════════════════════════════════════════════════════════════════
       3. ENTRADA ARQUITECTÓNICA DE DOBLE ESTADO (SPA ENGINE)
    ═════════════════════════════════════════════════════════════════════════ */
    .portal-state-container { width: 100%; min-height: 100vh; transition: opacity 0.5s ease, transform 0.6s cubic-bezier(0.16, 1, 0.3, 1); }
    .state-active { display: block !important; opacity: 1; transform: translateY(0) scale(1); pointer-events: auto; }
    .state-hidden { display: none !important; opacity: 0; transform: translateY(25px) scale(0.98); pointer-events: none; }

    /* ═════════════════════════════════════════════════════════════════════════
       4. ESTADO PORTAL INSTITUCIONAL: NAVEGACIÓN PERIMETRAL PREMIUM
    ═════════════════════════════════════════════════════════════════════════ */
    .navbar-portal { position: fixed; top: 0; left: 0; width: 100%; height: 85px; background: rgba(3, 0, 0, 0.92); backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px); border-bottom: 1px solid rgba(255, 0, 60, 0.22); z-index: 1000; display: flex; justify-content: space-between; align-items: center; padding: 0 6%; }
    .nav-brand-box { display: flex; flex-direction: column; }
    .nav-brand-title { font-size: 1.9rem; font-weight: 900; letter-spacing: 2px; background: linear-gradient(140deg, #fff, var(--red-primary)); -webkit-background-clip: text; background-clip: text; color: transparent; text-transform: uppercase; animation: neonTextPulse 4s infinite ease-in-out; }
    .nav-brand-sub { font-size: 0.6rem; color: var(--text-muted); font-weight: 800; letter-spacing: 1.5px; text-transform: uppercase; margin-top: 2px; }
    .nav-links-menu { display: flex; list-style: none; gap: 40px; align-items: center; }
    .nav-item-link { font-size: 0.95rem; color: #f2e6e8; text-decoration: none; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; transition: var(--transition-smooth); }
    .nav-item-link:hover { color: var(--red-primary); text-shadow: 0 0 10px var(--red-glow); }
    .btn-trigger-login-state { background: linear-gradient(95deg, #40000a, #800014); border: 1px solid rgba(255, 0, 60, 0.5); padding: 12px 28px; border-radius: 6px; color: #fff; font-family: inherit; font-size: 0.9rem; font-weight: 900; letter-spacing: 2px; text-transform: uppercase; cursor: pointer; animation: pulseNavbarGlow 3s infinite ease-in-out; transition: var(--transition-cubic); }
    .btn-trigger-login-state:hover { filter: brightness(1.3); transform: translateY(-2px); border-color: #fff; box-shadow: 0 0 25px var(--red-primary); }

    /* ═════════════════════════════════════════════════════════════════════════
       5. HERO BANNER: INMERSIÓN DE ALTO IMPACTO HUD
    ═════════════════════════════════════════════════════════════════════════ */
    .portal-hero-banner { width: 100%; min-height: 100vh; display: flex; align-items: center; padding: 110px 6% 60px; position: relative; overflow: hidden; background: radial-gradient(circle at 80% 50%, rgba(255, 0, 60, 0.12) 0%, transparent 65%), var(--bg-core); }
    .hero-left-content { flex: 1; padding-right: 4%; z-index: 10; animation: fadeInUp 1s ease forwards; }
    .hero-tag-live { display: inline-flex; align-items: center; gap: 8px; padding: 6px 14px; background: rgba(255, 0, 60, 0.08); border: 1px solid #800014; border-radius: 4px; font-size: 0.75rem; color: var(--red-light); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 24px; box-shadow: 0 0 15px rgba(255,0,60,0.15); }
    .hero-tag-live::before { content:''; display:block; width:6px; height:6px; background:var(--red-primary); border-radius:50%; box-shadow: 0 0 8px var(--red-primary); }
    .hero-main-h2 { font-size: clamp(3.4rem, 5.5vw, 5.5rem); font-weight: 900; line-height: 0.92; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 24px; color: #fff; }
    .hero-main-h2 span { background: linear-gradient(140deg, var(--red-primary), #ffccd5); -webkit-background-clip: text; background-clip: text; color: transparent; text-shadow: 0 0 35px rgba(255, 0, 60, 0.4); }
    .hero-paragraph-text { font-size: 1.15rem; color: #d9c5c7; font-weight: 600; line-height: 1.6; margin-bottom: 40px; max-width: 580px; }
    
    .hero-action-buttons-layout { display: flex; flex-wrap: wrap; gap: 20px; z-index: 30; position: relative; }
    .btn-hero-cta { padding: 16px 38px; background: linear-gradient(95deg, #800014, #cc0021, var(--red-primary)); border: 1px solid #ff6685; border-radius: 8px; color: #fff; font-family: inherit; font-size: 0.95rem; font-weight: 900; letter-spacing: 2px; text-transform: uppercase; cursor: pointer; box-shadow: 0 6px 30px rgba(255,0,60,0.45); transition: var(--transition-cubic); text-decoration: none; display: inline-flex; justify-content: center; align-items: center; }
    .btn-hero-cta:hover { transform: translateY(-3px); filter: brightness(1.2); box-shadow: 0 10px 40px rgba(255,0,60,0.7); }
    .btn-hero-secondary { padding: 16px 38px; background: rgba(255, 0, 60, 0.05); border: 1.5px solid var(--red-primary); border-radius: 8px; color: var(--red-light); font-family: inherit; font-size: 0.95rem; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; cursor: pointer; transition: var(--transition-smooth); text-decoration: none; display: inline-flex; justify-content: center; align-items: center; }
    .btn-hero-secondary:hover { background: rgba(255, 0, 60, 0.2); color: #fff; box-shadow: 0 0 25px rgba(255,0,60,0.4); }

    .hero-right-media-space { flex: 1; display: flex; flex-direction: column; gap: 24px; z-index: 10; animation: fadeInUp 1.2s ease forwards; }
    .ambient-glow-halo { position: absolute; width: 650px; height: 650px; background: radial-gradient(circle, rgba(255,0,60,0.2) 0%, transparent 70%); border-radius: 50%; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 0; pointer-events: none; animation: fluidHalo 6s infinite ease-in-out; }

    /* ═════════════════════════════════════════════════════════════════════════
       6. DASHBOARD INTERACTIVO DE ADMISIÓN
    ═════════════════════════════════════════════════════════════════════════ */
    .matriculation-dashboard-card { background: rgba(8, 0, 2, 0.88); backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px); border: 1.5px solid rgba(255, 0, 60, 0.35); border-radius: 16px; padding: 28px; box-shadow: 0 20px 45px rgba(0,0,0,0.9); position: relative; overflow: hidden; animation: cardPulseGlow 4s alternate infinite ease-in-out; }
    .dashboard-header-line { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid rgba(255, 0, 60, 0.2); padding-bottom: 12px; }
    .dashboard-title-txt { font-size: 1.2rem; font-weight: 900; letter-spacing: 2px; text-transform: uppercase; color: #fff; }
    .live-status-indicator { font-size: 0.75rem; font-weight: 900; color: #ff3366; border: 1px solid #ff3366; padding: 4px 8px; border-radius: 4px; letter-spacing: 1px; text-transform: uppercase; display: flex; align-items: center; gap: 6px; background: rgba(255, 51, 102, 0.08); box-shadow: 0 0 10px rgba(255, 51, 102, 0.2); }
    .live-status-indicator::before { content: ''; width: 6px; height: 6px; background: #ff3366; border-radius: 50%; animation: flashLive 1.5s infinite; }
    .infrastructure-photos-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin-bottom: 20px; }
    .infra-photo-frame { height: 130px; border-radius: 8px; border: 1px solid #590012; position: relative; overflow: hidden; background-size: cover; background-position: center; background-color: #0d0002; filter: grayscale(50%) contrast(1.15); transition: var(--transition-smooth); }
    .infra-photo-frame:hover { filter: grayscale(0%) contrast(1.25); border-color: var(--red-primary); box-shadow: 0 5px 25px rgba(255,0,60,0.4); transform: scale(1.02); }
    .infra-photo-frame span { position: absolute; bottom: 8px; left: 8px; font-size: 0.7rem; font-weight: 900; background: rgba(3,0,1,0.92); padding: 4px 8px; border-radius: 4px; letter-spacing: 1px; text-transform: uppercase; color: var(--red-light); border: 1px solid #590012; }
    .live-vacancy-ticker { background: #010000; border-radius: 8px; padding: 16px 20px; border: 1px solid #3d000e; display: flex; justify-content: space-between; align-items: center; }
    .ticker-label { font-size: 0.8rem; font-weight: 800; color: #d9c5c7; letter-spacing: 1px; text-transform: uppercase; }
    .ticker-value { font-size: 1.1rem; font-weight: 900; color: var(--text-main); letter-spacing: 1px; }
    .ticker-value span { color: var(--red-primary); text-shadow: 0 0 12px var(--red-glow-heavy); }

    /* ═════════════════════════════════════════════════════════════════════════
       7. AGENTE COGNITIVO ASISTENCIAL: COGNITIVE SYSTEM CARD
    ═════════════════════════════════════════════════════════════════════════ */
    .walter-cognitive-box { width: 100%; background: rgba(8, 0, 2, 0.9); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(255, 0, 60, 0.4); border-radius: 14px; padding: 24px; box-shadow: 0 25px 55px rgba(0,0,0,0.9); position: relative; overflow: hidden; }
    .walter-cognitive-box::before { content:''; position:absolute; top:-50%; left:0; width:100%; height:4px; background:var(--red-primary); box-shadow: 0 0 20px var(--red-primary); animation: chatbotScanner 4s linear infinite; }
    .walter-core-header { display: flex; align-items: center; gap: 14px; margin-bottom: 16px; border-bottom: 1px solid rgba(255,0,60,0.2); padding-bottom: 14px; }
    .walter-avatar-node { width: 44px; height: 44px; border-radius: 50%; background: #010000; border: 1.5px solid var(--red-primary); display: flex; justify-content: center; align-items: center; box-shadow: 0 0 15px rgba(255,0,60,0.4); position: relative; }
    .walter-avatar-node::after { content:''; position:absolute; width:10px; height:10px; background:#fff; border-radius:50%; box-shadow:0 0 10px #fff; animation: pulseNavbarGlow 2s infinite; }
    .walter-label-headline { color: #fff; font-size: 1.2rem; font-weight: 900; letter-spacing: 1px; text-transform: uppercase; line-height: 1.1; }
    .walter-label-headline span { color: var(--red-primary); font-size: 0.72rem; display: block; letter-spacing: 2px; font-weight: 800; margin-top: 2px; text-shadow: 0 0 5px var(--red-glow); }
    .walter-chat-bubble { font-family: 'Arial', sans-serif; font-size: 0.9rem; color: #ebd9db; line-height: 1.55; margin-bottom: 18px; font-weight: 500; }
    .walter-interactive-tags { display: flex; flex-wrap: wrap; gap: 8px; }
    .walter-tag-action { font-family: var(--font-stack); background: rgba(255, 0, 60, 0.08); border: 1px solid rgba(255, 0, 60, 0.3); padding: 6px 14px; border-radius: 4px; color: var(--red-light); font-size: 0.8rem; font-weight: 700; letter-spacing: 1px; cursor: pointer; transition: var(--transition-smooth); text-transform: uppercase; }
    .walter-tag-action:hover { background: var(--red-primary); color: #fff; border-color: var(--red-primary); box-shadow: 0 0 20px var(--red-primary); transform: translateY(-1px); }

    /* ═════════════════════════════════════════════════════════════════════════
       8. CINTA ESTRUCTURAL DE MÉTRICAS COMPLETA
    ═════════════════════════════════════════════════════════════════════════ */
    .stats-ribbon-belt { width: 100%; display: flex; justify-content: space-around; padding: 50px 8%; background: linear-gradient(90deg, #010000, #0d0002, #010000); border-top: 1px solid #3d000e; border-bottom: 1px solid #3d000e; position: relative; z-index: 30; }
    .stat-node-item { text-align: center; }
    .stats-ribbon-belt .stat-count-huge { font-size: 4rem; font-weight: 900; color: #fff; line-height: 1; margin-bottom: 8px; text-shadow: 0 0 25px rgba(255, 0, 60, 0.2); }
    .stats-ribbon-belt .stat-count-huge span { color: var(--red-primary); text-shadow: 0 0 15px var(--red-glow-heavy); }
    .stat-caption-lbl { font-size: 0.9rem; color: var(--text-muted); font-weight: 800; letter-spacing: 3px; text-transform: uppercase; }

    /* ═════════════════════════════════════════════════════════════════════════
       9. SECCIONES DE ALTO RENDIMIENTO EXPANSIBLES
    ═════════════════════════════════════════════════════════════════════════ */
    .landing-block { width: 100%; background: linear-gradient(180deg, #010000 0%, #0d0002 50%, #000000 100%); padding: 120px 8% 80px; position: relative; }
    .landing-title { text-align: center; font-size: 3.8rem; font-weight: 900; letter-spacing: 4px; background: linear-gradient(140deg, #FFFFFF, var(--red-primary)); -webkit-background-clip: text; background-clip: text; color: transparent; margin-bottom: 70px; text-transform: uppercase; }
    .landing-title::after { content: ''; display: block; width: 140px; height: 3px; background: var(--red-primary); margin: 20px auto 0; box-shadow: 0 0 15px var(--red-primary); }

    /* REJILLA DE LABORATORIOS AVANZADOS */
    .labs-grid-layout { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-bottom: 120px; }
    .lab-box-card { height: 360px; position: relative; border-radius: 12px; border: 1px solid #4a000d; overflow: hidden; cursor: pointer; transition: var(--transition-smooth); box-shadow: 0 10px 30px rgba(0,0,0,0.6); }
    .lab-photo-mock { position: absolute; inset: 0; background-size: cover; background-position: center; background-color: #080002; filter: grayscale(100%) brightness(0.24); transition: var(--transition-smooth); }
    
    .lab-box-card:nth-child(1) .lab-photo-mock { background-image: url('https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600&q=80'); }
    .lab-box-card:nth-child(2) .lab-photo-mock { background-image: url('https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=600&q=80'); }
    .lab-box-card:nth-child(3) .lab-photo-mock { background-image: url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=600&q=80'); }
    .lab-box-card:nth-child(4) .lab-photo-mock { background-image: url('https://images.unsplash.com/photo-1593640408182-31c70c8268f5?auto=format&fit=crop&w=600&q=80'); }
    .lab-box-card:nth-child(5) .lab-photo-mock { background-image: url('https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=600&q=80'); }
    .lab-box-card:nth-child(6) .lab-photo-mock { background-image: url('https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=600&q=80'); }
    
    .lab-content-overlay { position: absolute; inset: 0; padding: 30px; display: flex; flex-direction: column; justify-content: flex-end; background: linear-gradient(0deg, #000 0%, transparent 85%); z-index: 3; }
    .lab-tech-tag { font-size: 0.75rem; color: var(--red-primary); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 8px; text-shadow: 0 0 5px var(--red-glow); }
    .lab-title-text { font-size: 1.7rem; font-weight: 900; color: #fff; text-transform: uppercase; letter-spacing: 0.5px; line-height: 1.1; }
    .lab-box-card:hover { border-color: var(--red-primary); box-shadow: 0 15px 40px rgba(255,0,60,0.4); transform: translateY(-5px); }
    .lab-box-card:hover .lab-photo-mock { filter: grayscale(20%) brightness(0.65) scale(1.06); }

    /* DIRECTORIO DE CUERPO DOCENTE ESPECIALIZADO */
    .faculty-grid-layout { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 120px; }
    .faculty-card { background: #010000; border: 1px solid #3d000e; border-radius: 10px; padding: 25px; text-align: center; transition: var(--transition-smooth); }
    .faculty-card:hover { border-color: var(--red-primary); background: #0d0002; box-shadow: 0 0 20px rgba(255,0,60,0.15); transform: translateY(-3px); }
    .faculty-avatar { width: 80px; height: 80px; border-radius: 50%; background: #080001; border: 2px solid var(--border-card); margin: 0 auto 16px; overflow: hidden; }
    .faculty-avatar img { width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%); transition: var(--transition-smooth); }
    .faculty-card:hover .faculty-avatar img { filter: grayscale(0%) contrast(1.1); }
    .faculty-name { font-size: 1.1rem; font-weight: 900; color: #fff; letter-spacing: 1px; margin-bottom: 4px; text-transform: uppercase; }
    .faculty-role { font-size: 0.75rem; color: var(--red-primary); font-weight: 800; letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 12px; }
    .faculty-tech { font-size: 0.8rem; color: #d9c5c7; line-height: 1.4; font-weight: 600; }

    /* SISTEMA DE CALENDARIO ACADÉMICO */
    .calendar-section-hub { margin-bottom: 120px; width: 100%; }
    .calendar-table-wrapper { width: 100%; overflow-x: auto; background: rgba(13, 0, 2, 0.4); border: 1px solid #4a000d; border-radius: 14px; padding: 30px; box-shadow: 0 15px 35px rgba(0,0,0,0.6); }
    .academic-table { width: 100%; border-collapse: collapse; text-align: left; font-family: inherit; }
    .academic-table th { font-size: 1rem; font-weight: 900; color: var(--red-primary); letter-spacing: 2px; text-transform: uppercase; padding: 18px; border-bottom: 2px solid #590012; text-shadow: 0 0 5px var(--red-glow); }
    .academic-table td { font-size: 1.05rem; color: #fff0f2; font-weight: 600; padding: 18px; border-bottom: 1px solid #260005; }
    .academic-table tr:hover { background: rgba(255, 0, 60, 0.04); }
    .status-badge-active { background: rgba(255, 0, 60, 0.08); border: 1px solid var(--red-primary); color: #ff4d73; padding: 6px 12px; border-radius: 4px; font-size: 0.75rem; letter-spacing: 1px; font-weight: 800; text-transform: uppercase; display: inline-block; box-shadow: 0 0 10px rgba(255,0,60,0.2); }

    /* ═════════════════════════════════════════════════════════════════════════
       10. REGISTRO DE MALLAS CURRICULARES (MÁXIMA MIGRACIÓN ESTÉTICA)
    ═════════════════════════════════════════════════════════════════════════ */
    .tracks-container { display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px; margin-bottom: 120px; }
    .track-detail-card { background: rgba(10,0,2,0.6); border: 1px solid #4a000d; border-radius: 14px; padding: 45px; transition: var(--transition-smooth); box-shadow: 0 15px 35px rgba(0,0,0,0.6); }
    .track-detail-card:hover { border-color: var(--red-primary); transform: translateY(-5px); box-shadow: 0 25px 50px rgba(255,0,60,0.15); }
    .track-header { font-size: 1.8rem; font-weight: 900; color: var(--red-primary); margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px; text-shadow: 0 0 10px var(--red-glow); }
    .track-desc { font-size: 1.05rem; color: #d9c5c7; line-height: 1.65; margin-bottom: 25px; font-weight: 600; }
    .semester-block { margin-top: 20px; border-top: 1px solid #3d000e; padding-top: 16px; }
    .semester-title { font-size: 0.9rem; color: var(--red-light); font-weight: 800; letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 12px; }
    .competency-list { list-style: none; display: flex; flex-direction: column; gap: 10px; }
    .competency-item { font-size: 0.9rem; color: #fff; font-weight: 700; display: flex; align-items: flex-start; gap: 10px; line-height: 1.4; }
    .competency-item::before { content: '✓'; color: var(--red-primary); font-weight: 900; font-size: 1.1rem; text-shadow: 0 0 5px var(--red-primary); }
    .course-meta { display: block; font-size: 0.75rem; color: #b3828a; font-weight: 600; margin-top: 4px; letter-spacing: 1px; }

    /* SIMULADOR FINANCIERO AVANZADO */
    .simulator-finance-panel { background: rgba(10, 0, 2, 0.6); border: 1.5px solid #4a000d; border-radius: 16px; padding: 50px; margin-bottom: 120px; box-shadow: 0 20px 50px rgba(0,0,0,0.7); }
    .sim-grid-layout { display: grid; grid-template-columns: 1fr 1.2fr; gap: 50px; margin-top: 35px; }
    .sim-controls-column { display: flex; flex-direction: column; gap: 24px; }
    .sim-display-column { background: #010000; border: 1px solid #3d000e; border-radius: 12px; padding: 35px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: inset 0 0 20px rgba(0,0,0,0.8); }
    .sim-input-box { display: flex; flex-direction: column; gap: 10px; }
    .sim-select-field { width: 100%; height: 50px; background: #050001; border: 1.5px solid #4a000d; border-radius: 8px; color: #fff; font-family: inherit; font-size: 1.05rem; padding: 0 16px; outline: none; transition: var(--transition-smooth); cursor: pointer; }
    .sim-select-field:focus { border-color: var(--red-primary); box-shadow: 0 0 15px rgba(255,0,60,0.2); }
    .sim-invoice-row { display: flex; justify-content: space-between; padding: 14px 0; border-bottom: 1px dashed #3d000e; font-size: 1.05rem; font-weight: 700; color: #d9c5c7; }
    .sim-invoice-row span { color: #fff0f2; }
    .sim-total-heavy { font-size: 2.4rem; font-weight: 900; color: var(--red-primary); display: flex; justify-content: space-between; align-items: center; border-top: 2px solid #590012; padding-top: 20px; margin-top: 10px; text-shadow: 0 0 15px var(--red-glow-heavy); }

    /* REQUISITOS PERIMETRALES DE ADMISIÓN */
    .requirements-panel { background: rgba(8, 0, 1, 0.6); border: 1.5px solid #590012; border-radius: 16px; padding: 50px; margin-bottom: 120px; box-shadow: 0 20px 50px rgba(0,0,0,0.7); }
    .req-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px; margin-top: 35px; }
    .req-card { background: #010000; border-left: 4px solid var(--red-primary); padding: 28px; border-radius: 6px; border-top: 1px solid #1a0004; border-right: 1px solid #1a0004; border-bottom: 1px solid #1a0004; box-shadow: 0 5px 15px rgba(0,0,0,0.4); }
    .req-card h4 { font-size: 1.2rem; font-weight: 900; color: #fff; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 1px; }
    .req-card p { font-size: 0.95rem; color: #b3828a; line-height: 1.5; font-weight: 600; }

    /* FLUJO DE CONTROL EN LÍNEA: WORKFLOW */
    .workflow-section { margin-bottom: 120px; padding: 50px; background: rgba(13, 0, 2, 0.4); border: 1px solid #3d000e; border-radius: 16px; }
    .workflow-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 28px; margin-top: 50px; }
    .step-node { position: relative; padding: 32px 24px; text-align: left; background: #010000; border-radius: 12px; border: 1px solid #3d000e; transition: var(--transition-smooth); }
    .step-node:hover { border-color: var(--red-primary); transform: translateY(-6px); box-shadow: 0 15px 30px rgba(255,0,60,0.2); }
    .step-number { font-size: 3rem; font-weight: 900; color: rgba(255,0,60,0.18); line-height: 1; margin-bottom: 14px; text-shadow: 0 0 10px rgba(255,0,60,0.1); }
    .step-heading { font-size: 1.3rem; font-weight: 900; color: #fff; margin-bottom: 12px; text-transform: uppercase; letter-spacing: 1px; }
    .step-text { font-size: 0.95rem; color: #b3828a; font-weight: 600; line-height: 1.5; }

    /* ACORDEÓN DE CONTROL INTERACTIVO: FAQ */
    .faq-section { margin-bottom: 120px; }
    .faq-container { max-width: 1000px; margin: 0 auto; display: flex; flex-direction: column; gap: 18px; }
    .faq-item { background: #080001; border: 1.5px solid #3d000e; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.5); }
    .faq-input-trigger { display: none; }
    .faq-label-title { display: flex; justify-content: space-between; align-items: center; padding: 26px 32px; font-size: 1.25rem; font-weight: 800; color: #fff; cursor: pointer; text-transform: uppercase; letter-spacing: 1px; transition: background 0.3s; }
    .faq-label-title:hover { background: rgba(255,0,60,0.04); }
    .faq-label-title::after { content: '+'; color: var(--red-primary); font-size: 1.6rem; font-weight: 900; transition: transform 0.3s; text-shadow: 0 0 5px var(--red-primary); }
    .faq-content-box { max-height: 0; padding: 0 32px; overflow: hidden; transition: max-height 0.4s cubic-bezier(0, 1, 0, 1), padding 0.4s; }
    .faq-content-box p { font-size: 1rem; color: #d9c5c7; font-weight: 600; line-height: 1.7; padding-bottom: 26px; }
    .faq-input-trigger:checked ~ .faq-label-title { color: var(--red-light); background: rgba(255,0,60,0.06); border-bottom: 1px solid rgba(255,0,60,0.15); }
    .faq-input-trigger:checked ~ .faq-label-title::after { content: '−'; transform: rotate(180deg); }
    .faq-input-trigger:checked ~ .faq-content-box { max-height: 600px; padding: 24px 32px 0; }

    /* CAROUSEL DINÁMICO DE SOCIOS */
    .alliance-belt-container { width: 100%; height: 90px; background: #030000; border-top: 1px solid #260005; border-bottom: 1px solid #260005; display: flex; align-items: center; overflow: hidden; margin-bottom: 80px; }
    .logos-moving-track { display: flex; gap: 90px; animation: horizontalScrollLogos 30s linear infinite; width: max-content; }
    .logo-item { font-size: 1.6rem; font-weight: 900; color: rgba(255,255,255,0.25); text-transform: uppercase; letter-spacing: 3px; display: flex; align-items: center; }
    .logo-item span { color: var(--red-primary); margin-right: 10px; text-shadow: 0 0 5px var(--red-primary); }

    /* LÍNEA DE PIE DE PÁGINA GLOBAL INFRASTRUCTURE */
    .footer-panel { background: #000000; padding: 90px 8% 50px; display: grid; grid-template-columns: repeat(4, 1fr); gap: 50px; border-top: 1px solid #3d000e; }
    .footer-col-info h3 { font-size: 1.3rem; font-weight: 900; color: var(--red-primary); letter-spacing: 2px; text-transform: uppercase; margin-bottom: 26px; text-shadow: 0 0 5px var(--red-glow); }
    .footer-col-info p, .footer-col-info a { color: #997379; font-size: 0.95rem; font-weight: 700; text-decoration: none; line-height: 1.6; display: block; margin-bottom: 14px; }
    .footer-col-info li { list-style: none; margin-bottom: 14px; }
    .footer-col-info a:hover { color: #fff; text-shadow: 0 0 5px var(--red-primary); }
    .bottom-copyright-layer { grid-column: span 4; border-top: 1px solid #1a0004; padding-top: 40px; margin-top: 30px; display: flex; justify-content: space-between; align-items: center; color: #664449; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; }

    /* ═════════════════════════════════════════════════════════════════════════
       11. ENTORNO DE LOGIN Y AUTENTICACIÓN AVANZADA CYBER HUD
    ═════════════════════════════════════════════════════════════════════════ */
    .auth-state-wrapper { position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: var(--bg-core); z-index: 9999; overflow: hidden; }
    .login-hero-view-container { display: flex; width: 100vw; height: 100vh; position: relative; }
    
    .login-left-panel { width: 38%; min-width: 400px; max-width: 480px; display: flex; align-items: center; justify-content: center; padding: 30px; position: relative; z-index: 20; background: var(--bg-core); overflow-y: auto; }
    .login-left-panel.panel-register { width: 45%; max-width: 600px; align-items: flex-start; padding-top: 80px; padding-bottom: 40px; }
    .login-left-panel::-webkit-scrollbar { width: 4px; }
    .login-left-panel::-webkit-scrollbar-track { background: transparent; }
    .login-left-panel::-webkit-scrollbar-thumb { background: #4a000d; border-radius: 2px; }

    .login-auth-card { width: 100%; background: var(--bg-card); background-size: 300% 300%; animation: liquidRedBg 10s ease infinite, cardPulseGlow 4s alternate infinite ease-in-out; border: 1.5px solid var(--border-card); border-radius: 20px; padding: 45px 36px; box-shadow: 0 20px 50px rgba(0,0,0,0.9); }
    
    .login-title-h1 { text-align: center; font-size: clamp(2.3rem, 3.5vw, 2.9rem); font-weight: 900; line-height: 1.05; letter-spacing: 5px; background: linear-gradient(140deg, var(--red-primary), #ffb3c1, #99001a); -webkit-background-clip: text; background-clip: text; color: transparent; margin-bottom: 8px; text-transform: uppercase; }
    .login-sub-brand { text-align: center; font-size: 0.6rem; color: var(--text-muted); letter-spacing: 2.5px; font-weight: 800; margin-bottom: 5px; text-transform: uppercase; }
    
    .zen-top-line { height: 2px; background: linear-gradient(90deg, transparent, var(--red-primary), transparent); margin-bottom: 30px; border-radius: 1px; opacity: 0.8; box-shadow: 0 0 10px var(--red-primary); }
    .field-label { display: block; font-size: 0.72rem; color: var(--text-muted); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 10px; }
    .form-group { margin-bottom: 20px; }

    .login-input-wrapper { position: relative; width: 100%; display: flex; align-items: center; }
    .login-f-input { width: 100%; height: 50px; background: #050001; border: 1.5px solid #3d000e; border-radius: 10px; padding: 0 45px 0 18px; color: #ff6685; font-family: inherit; font-size: 1.1rem; outline: none; transition: var(--transition-smooth); box-shadow: inset 0 2px 10px rgba(0,0,0,0.8); }
    .login-f-input:focus { border-color: var(--red-primary); box-shadow: 0 0 15px rgba(255,0,60,0.25), inset 0 2px 10px rgba(0,0,0,0.8); background: #000000; transform: translateY(-1px); }
    .login-f-input.pl-icon { padding-left: 45px; }
    
    .login-password-toggle { position: absolute; right: 15px; height: 100%; display: flex; align-items: center; justify-content: center; background: none; border: none; color: var(--text-muted); cursor: pointer; font-size: 1.2rem; user-select: none; z-index: 5; transition: var(--transition-smooth); }
    .login-password-toggle:hover { color: var(--red-primary); transform: scale(1.15); text-shadow: 0 0 8px var(--red-primary); }
    
    .input-left-icon { position: absolute; left: 16px; height: 100%; display: flex; align-items: center; justify-content: center; color: #590012; font-size: 1.2rem; z-index: 5; pointer-events: none; transition: var(--transition-smooth); }
    .login-f-input:focus ~ .input-left-icon { color: var(--red-primary); }

    .btn-submit-core { width: 100%; height: 52px; background: linear-gradient(95deg, #590012, #b3001e, var(--red-primary)); border: 1px solid rgba(255, 0, 60, 0.6); border-radius: 10px; color: #fff; font-family: inherit; font-size: 1.05rem; font-weight: 900; letter-spacing: 3px; cursor: pointer; margin-top: 10px; margin-bottom: 24px; box-shadow: 0 6px 20px rgba(255, 0, 60, 0.3); transition: var(--transition-cubic); text-transform: uppercase; }
    .btn-submit-core:hover { filter: brightness(1.2); transform: translateY(-2px); box-shadow: 0 8px 30px rgba(255,0,60,0.6); }
    
    .separator-text { text-align: center; font-size: 0.72rem; color: var(--text-muted); font-weight: 800; letter-spacing: 2px; margin: 20px 0; position: relative; text-transform: uppercase; }
    .separator-text::before, .separator-text::after { content: ''; position: absolute; top: 50%; width: 30%; height: 1px; background: #3d000e; }
    .separator-text::before { left: 0; } .separator-text::after { right: 0; }

    .btn-oauth-provider { width: 100%; height: 46px; background: #050001; border: 1.5px solid #3d000e; border-radius: 10px; color: #d9c5c7; font-family: inherit; font-size: 0.85rem; letter-spacing: 1.5px; font-weight: 800; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 12px; margin-bottom: 14px; transition: var(--transition-smooth); text-transform: uppercase; }
    .btn-oauth-provider:hover { border-color: var(--red-primary); color: #fff; background: rgba(255,0,60,0.06); box-shadow: 0 0 15px rgba(255,0,60,0.15); }
    
    .gl { font-style: normal; font-weight: 900; font-size: 1.1rem; } .gb { color: #4285F4; } .gr { color: #EA4335; } .gy { color: #FBBC05; } .gg { color: #34A853; }
    .m-blue { color: #00A4EF; } .m-red { color: #F25022; } .m-green { color: #7FBA00; } .m-yellow { color: #FFB900; }
    
    .navigation-links { display: flex; justify-content: space-between; margin-top: 24px; padding-top: 18px; border-top: 1px solid #3d000e; }
    .navigation-links a { font-size: 0.75rem; color: var(--text-muted); font-weight: 800; letter-spacing: 1px; text-decoration: none; text-transform: uppercase; transition: var(--transition-smooth); cursor: pointer; }
    .navigation-links a:hover { color: var(--red-primary); text-shadow: 0 0 10px var(--red-glow); }

    /* SECCIÓN EXPANSIBLE: REGISTRO CSS GRID MATRIX */
    .register-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin-bottom: 10px; }
    .col-span-2 { grid-column: span 2; }
    .section-divider { grid-column: span 2; font-size: 0.8rem; color: var(--red-primary); font-weight: 900; letter-spacing: 2px; text-transform: uppercase; margin-top: 10px; padding-bottom: 6px; border-bottom: 1px solid rgba(255,0,60,0.25); text-shadow: 0 0 5px var(--red-glow); }
    
    .password-strength-meter { display: flex; gap: 4px; margin-top: 8px; height: 4px; }
    .strength-bar { flex: 1; background: #3d000e; border-radius: 2px; transition: 0.3s; }
    .strength-bar.active-weak { background: #ff1a4a; box-shadow: 0 0 8px #ff1a4a; }
    .strength-bar.active-medium { background: #ffaa00; box-shadow: 0 0 8px #ffaa00; }
    .strength-bar.active-strong { background: #00ff66; box-shadow: 0 0 8px #00ff66; }

    .terms-checkbox-wrapper { display: flex; align-items: flex-start; gap: 12px; margin-bottom: 24px; cursor: pointer; }
    .terms-checkbox-wrapper input { display: none; }
    .custom-checkbox { width: 18px; height: 18px; border: 1.5px solid #800014; border-radius: 4px; display: flex; align-items: center; justify-content: center; transition: 0.2s; flex-shrink: 0; margin-top: 2px; }
    .terms-checkbox-wrapper input:checked + .custom-checkbox { background: var(--red-primary); border-color: var(--red-primary); box-shadow: 0 0 10px var(--red-primary); }
    .terms-checkbox-wrapper input:checked + .custom-checkbox::after { content: '✓'; color: #fff; font-size: 0.8rem; font-weight: 900; }
    .terms-text { font-size: 0.75rem; color: #d9c5c7; font-weight: 600; line-height: 1.4; }
    .terms-text span { color: var(--red-primary); }

    /* ESCUDO DE RECUPERACIÓN HUD */
    .soc-shield-icon { width: 60px; height: 60px; margin: 0 auto 20px; background: rgba(255, 0, 60, 0.1); border: 2px solid var(--red-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; animation: shieldPulse 3s infinite; box-shadow: inset 0 0 15px rgba(255,0,60,0.2); }
    .soc-shield-icon svg { width: 30px; height: 30px; fill: var(--red-primary); filter: drop-shadow(0 0 5px var(--red-primary)); }
    .recovery-desc-text { font-family: 'Arial', sans-serif; font-size: 0.9rem; color: #ebd9db; text-align: center; line-height: 1.6; font-weight: 600; margin-bottom: 30px; }

    /* RIELES DIAGONALES DE ADMISIÓN MÓVIL EN FONDO AUTH */
    .login-right-panel { flex: 1; position: relative; overflow: hidden; background: var(--bg-core); }
    .login-right-panel::before { content: ''; position: absolute; inset: 0; pointer-events: none; z-index: 2; background: radial-gradient(ellipse 65% 60% at 75% 50%, rgba(255, 0, 60, 0.18) 0%, rgba(50, 0, 10, 0.05) 50%, transparent 75%); }
    .diag-wrap { position: absolute; inset: 0; overflow: hidden; }
    .diag-lines { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-22deg); width: 280%; }
    .dline { white-space: nowrap; padding: 24px 0; font-size: clamp(1.4rem, 1.9vw, 1.8rem); font-weight: 800; letter-spacing: 6px; border-top: 1px solid rgba(128, 0, 20, 0.25); line-height: 1; overflow: hidden; }
    .dline-inner { display: inline-block; white-space: nowrap; text-transform: uppercase; }
    .dline:nth-child(even) .dline-inner { animation: marqueeToLeft 48s linear infinite; }
    .dline:nth-child(odd) .dline-inner { animation: marqueeToRight 54s linear infinite; }
    .cw  { color: rgba(255, 240, 242, 0.65); text-shadow: 0 0 10px rgba(255,255,255,0.08); }
    .co  { color: rgba(255, 0, 60, 0.65); text-shadow: 0 0 12px rgba(255,0,60,0.2); }
    .ca  { color: rgba(255, 179, 193, 0.48); text-shadow: 0 0 8px rgba(255,179,193,0.08); }
    .cdw { color: rgba(255, 255, 255, 0.18); }
    
    .vig { position: absolute; inset: 0; pointer-events: none; z-index: 10; background: linear-gradient(90deg, #030000 0%, rgba(3,0,0,0.85) 15%, transparent 35%), linear-gradient(-90deg, rgba(3,0,0,0.98) 0%, transparent 25%), linear-gradient(180deg, rgba(3,0,0,0.98) 0%, rgba(3,0,0,0.4) 12%, transparent 26%), linear-gradient(0deg, rgba(3,0,0,0.98) 0%, rgba(3,0,0,0.4) 12%, transparent 26%); }

    .btn-return-portal { position: absolute; top: 40px; left: 50px; z-index: 100; background: rgba(13, 0, 2, 0.82); border: 1.5px solid #590012; border-radius: 8px; padding: 12px 24px; color: #b3828a; font-family: inherit; font-size: 0.85rem; font-weight: 800; letter-spacing: 1.5px; text-transform: uppercase; cursor: pointer; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); transition: var(--transition-smooth); box-shadow: 0 5px 15px rgba(0,0,0,0.6); }
    .btn-return-portal:hover { border-color: var(--red-primary); color: #fff; transform: translateX(-4px); box-shadow: 0 8px 25px rgba(255,0,60,0.3); }

    /* RESPONSIVE CONTROL RIGOROSO */
    @media (max-width: 1024px) {
      .hero-right-media-space { display: none !important; }
      .navbar-portal { padding: 0 24px; }
      .nav-links-menu { display: none; }
      .labs-grid-layout { grid-template-columns: repeat(2, 1fr); }
      .metrics-container, .tracks-container, .req-grid, .sim-grid-layout, .faculty-grid-layout { grid-template-columns: 1fr; }
      .login-left-panel { width: 100%; border-right: none; max-width: none; padding-top: 100px; }
      .login-right-panel { display: none; }
      .register-grid { grid-template-columns: 1fr; }
      .col-span-2 { grid-column: span 1; }
      .section-divider { grid-column: span 1; }
    }
    @media (max-width: 768px) {
      .labs-grid-layout { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

  <div id="state-portal-home" class="portal-state-container state-active">
    
    <nav class="navbar-portal">
      <div class="nav-brand-box">
        <span class="nav-brand-title">Escuela de TI</span>
        <span class="nav-brand-sub">Servicio Nacional de Adiestramiento en Trabajo Industrial</span>
      </div>
      <ul class="nav-links-menu">
        <li><a href="#seccion-metricas" class="nav-item-link">Beneficios</a></li>
        <li><a href="#seccion-labs" class="nav-item-link">Infraestructura</a></li>
        <li><a href="#seccion-mallas" class="nav-item-link">Mallas</a></li>
        <li><a href="#seccion-costos" class="nav-item-link">Pensiones</a></li>
        <li><button type="button" class="btn-trigger-login-state" onclick="conmutarEstadoPortal('login')">Iniciar Sesión</button></li>
      </ul>
    </nav>

    <header class="portal-hero-banner">
      <div class="hero-left-content">
        <span class="hero-tag-live">Admisión Abierta — Ciclo 2026-II</span>
        <h2 class="hero-main-h2">Formamos los Líderes de la <span>Revolución Digital</span></h2>
        <p class="hero-paragraph-text">Inscribe tu expediente académico en la escuela tecnológica más prestigiosa del país. Accede a laboratorios de última generación, certificaciones internacionales y un ecosistema de inserción empresarial directa administrado por Inteligencia Artificial.</p>
        <div class="hero-action-buttons-layout">
          <button type="button" class="btn-hero-cta" onclick="document.getElementById('seccion-mallas').scrollIntoView();">Ver Carreras de Ingeniería</button>
          <button type="button" class="btn-hero-secondary" onclick="conmutarEstadoPortal('login')">Acceso Postulantes</button>
        </div>
      </div>

      <div class="hero-right-media-space">
        <div class="ambient-glow-halo"></div>
        
        <div class="matriculation-dashboard-card">
          <div class="dashboard-header-line">
            <div class="dashboard-title-txt">Centro de Control de Admisión</div>
            <div class="live-status-indicator">Canal Operativo</div>
          </div>
          
          <div class="infrastructure-photos-grid">
            <div class="infra-photo-frame" style="background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=300&q=80')">
              <span>Campus Central</span>
            </div>
            <div class="infra-photo-frame" style="background-image: url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=300&q=80')">
              <span>Laboratorio SOC</span>
            </div>
          </div>

          <div class="live-vacancy-ticker">
            <div class="ticker-label">Vacantes Disponibles Bloque TI:</div>
            <div class="ticker-value"><span>34</span> / 500 Libres</div>
          </div>
        </div>
        
        <div class="walter-cognitive-box">
          <div class="walter-core-header">
            <div class="walter-avatar-node"></div>
            <div class="nova-brand-label-group">
              <div class="walter-label-headline">WALTER <span>SISTEMA COGNITIVO DE ADMISIÓN</span></div>
            </div>
          </div>
          <div class="walter-chat-bubble">Hola 👋 Soy Walter, tu asistente virtual de admisión. El espacio multimedia transaccional está listo. Puedo guiarte con tu escala de pensiones, requisitos documentales y asignación de bloques.</div>
          <div class="walter-interactive-tags">
            <div class="walter-tag-action" onclick="conmutarEstadoPortal('login')">🔑 Iniciar Proceso</div>
            <div class="walter-tag-action" onclick="document.getElementById('seccion-mallas').scrollIntoView()">📚 Ver Mallas</div>
          </div>
        </div>
      </div>
    </header>

    <div class="stats-ribbon-belt" id="seccion-metricas">
      <div class="stat-node-item">
        <div class="stat-count-huge" data-counter-target="98">0<span>%</span></div>
        <div class="stat-caption-lbl">Inserción Laboral Activa</div>
      </div>
      <div class="stat-node-item">
        <div class="stat-count-huge" data-counter-target="12">0<span></span></div>
        <div class="stat-caption-lbl">Laboratorios Tecnológicos</div>
      </div>
      <div class="stat-node-item">
        <div class="stat-count-huge" data-counter-target="50">0<span>+</span></div>
        <div class="stat-caption-lbl">Convenios Globales Certificados</div>
      </div>
      <div class="stat-node-item">
        <div class="stat-count-huge" data-counter-target="2500">0<span>+</span></div>
        <div class="stat-caption-lbl">Egresados Exitosos</div>
      </div>
    </div>

    <section class="landing-block" id="seccion-labs">
      <h2 class="landing-title">Ecosistema de Alta Ingeniería</h2>

      <div class="labs-grid-layout">
        <div class="lab-box-card">
          <div class="lab-photo-mock"></div>
          <div class="lab-content-overlay">
            <span class="lab-tech-tag">Artificial Intelligence Cluster</span>
            <h3 class="lab-title-text">Cómputo de Red Avanzado</h3>
          </div>
        </div>
        <div class="lab-box-card">
          <div class="lab-photo-mock"></div>
          <div class="lab-content-overlay">
            <span class="lab-tech-tag">Cybersecurity Infrastructure Center</span>
            <h3 class="lab-title-text">Centro de Operaciones SOC</h3>
          </div>
        </div>
        <div class="lab-box-card">
          <div class="lab-photo-mock"></div>
          <div class="lab-content-overlay">
            <span class="lab-tech-tag">Cloud Architecture Environments</span>
            <h3 class="lab-title-text">Datacenter Multicloud</h3>
          </div>
        </div>
        <div class="lab-box-card">
          <div class="lab-photo-mock"></div>
          <div class="lab-content-overlay">
            <span class="lab-tech-tag">Nvidia Deep Learning GPU Hub</span>
            <h3 class="lab-title-text">Laboratorio Redes Neuronales</h3>
          </div>
        </div>
        <div class="lab-box-card">
          <div class="lab-photo-mock"></div>
          <div class="lab-content-overlay">
            <span class="lab-tech-tag">Cisco Routing Enterprise Infrastructure</span>
            <h3 class="lab-title-text">Conectividad Avanzada</h3>
          </div>
        </div>
        <div class="lab-box-card">
          <div class="lab-photo-mock"></div>
          <div class="lab-content-overlay">
            <span class="lab-tech-tag">AWS Multi-Region Elastic Core</span>
            <h3 class="lab-title-text">Sandboxes Computación Elástica</h3>
          </div>
        </div>
      </div>

      <h3 class="tracks-title" style="font-size: 2.2rem; margin-bottom: 45px; text-transform: uppercase; font-weight: 900; text-align: center;">Plana Docente de Grado Industrial</h3>
      <div class="faculty-grid-layout">
        <div class="faculty-card">
          <div class="faculty-avatar"><img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=150&q=80" alt="Docente"></div>
          <div class="faculty-name">Dr. Carlos Mendoza</div>
          <div class="faculty-role">Director de IA Aplicada</div>
          <div class="faculty-tech">Ph.D en Ciencias Computacionales. Especialista en Arquitecturas Transformer y despliegue MLOps.</div>
        </div>
        <div class="faculty-card">
          <div class="faculty-avatar"><img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=150&q=80" alt="Docente"></div>
          <div class="faculty-name">Ing. Laura Vásquez</div>
          <div class="faculty-role">Arquitecta Multicloud</div>
          <div class="faculty-tech">Doble certificación AWS Solutions Architect Professional. Lidera el despliegue serverless globales.</div>
        </div>
        <div class="faculty-card">
          <div class="faculty-avatar"><img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80" alt="Docente"></div>
          <div class="faculty-name">MSc. Jorge Ruiz</div>
          <div class="faculty-role">Consultor SOC Matrix</div>
          <div class="faculty-tech">Auditor líder ISO 27001. Experto en análisis forense digital y contención de amenazas (APT).</div>
        </div>
        <div class="faculty-card">
          <div class="faculty-avatar"><img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=150&q=80" alt="Docente"></div>
          <div class="faculty-name">Dra. Elena Silva</div>
          <div class="faculty-role">Jefa de Data Science</div>
          <div class="faculty-tech">Investigadora principal en algoritmos predictivos. Especialista en procesamiento con Apache Spark.</div>
        </div>
      </div>

      <div class="calendar-section-hub">
        <h3 class="tracks-title" style="font-size: 2.2rem; margin-bottom: 35px; text-transform: uppercase; font-weight: 900; text-align: center;">Calendario y Fechas Oficiales de Admisión</h3>
        <div class="calendar-table-wrapper">
          <table class="academic-table">
            <thead>
              <tr>
                <th>Fase Académica</th>
                <th>Fecha de Apertura</th>
                <th>Fecha de Cierre</th>
                <th>Estado del Canal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Inscripción y Carga Digital de Expedientes PDF</td>
                <td>01 de Junio, 2026</td>
                <td>15 de Julio, 2026</td>
                <td><span class="status-badge-active">Fase Activa</span></td>
              </tr>
              <tr>
                <td>Auditoría de Documentos y Validación en HeidiSQL</td>
                <td>16 de Julio, 2026</td>
                <td>25 de Julio, 2026</td>
                <td><span class="status-badge-active" style="border-color:#590012; color:#b3243b; background:rgba(255,0,60,0.02)">Espera</span></td>
              </tr>
              <tr>
                <td>Evaluación Tecnológica de Aptitud del Postulante</td>
                <td>28 de Julio, 2026</td>
                <td>30 de Julio, 2026</td>
                <td><span class="status-badge-active" style="border-color:#590012; color:#b3243b; background:rgba(255,0,60,0.02)">Espera</span></td>
              </tr>
              <tr>
                <td>Cierre Matricial Transaccional de Vacantes</td>
                <td>01 de Agosto, 2026</td>
                <td>10 de Agosto, 2026</td>
                <td><span class="status-badge-active" style="border-color:#590012; color:#b3243b; background:rgba(255,0,60,0.02)">Espera</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="tracks-section" id="seccion-mallas">
        <h3 class="landing-title" style="font-size: 2.5rem; margin-bottom: 50px;">Estructura Curricular de Ingeniería</h3>
        <div class="tracks-container">
          
          <div class="track-detail-card">
            <div class="track-header">Ingeniería de Software con IA</div>
            <p class="track-desc">Malla de grado industrial optimizada para el modelado de redes neuronales, despliegue masivo de agentes inteligentes y pipelines distribuidos de macrodatos.</p>
            
            <div class="semester-block">
              <div class="semester-title">Ciclo I - Fundamentos Estructurados</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Algoritmia y Lógica Computacional Pura
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Matemática Discreta y Álgebra Booleana
                  <span class="course-meta">Créditos: 3 | Laboratorio: 0h | Teórico: 4h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo II - Programación Avanzada</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Estructuras Python e Inferencia Lógica
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Modelamiento Orientado a Objetos (C++)
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo III - Arquitectura del Dato</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Motores Relacionales SQL y PL/SQL
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Patrones de Diseño Backend (Laravel/Node)
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo IV - Big Data Systems</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Minería de Datos Compleja y ETL
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Pipelines Distribuídos con Apache Spark
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo V - Inteligencia Artificial</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Machine Learning Aplicado e Integrado
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Procesamiento de Lenguaje Natural (LLM)
                  <span class="course-meta">Créditos: 5 | Laboratorio: 4h | Teórico: 3h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo VI - Automatización Final</div>
              <ul class="competency-list">
                <li class="competency-item">
                  MLOps Production Deploy y Orquestación
                  <span class="course-meta">Créditos: 6 | Laboratorio: 8h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Auditoría de Sistemas Criptográficos
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
          </div>

          <div class="track-detail-card">
            <div class="track-header">Ciberseguridad Operacional (SOC)</div>
            <p class="track-desc">Especialización de grado militar enfocada en la contención de amenazas avanzadas persistentes (APT), análisis forense perimetral y redes inexpugnables Zero-Trust.</p>
            
            <div class="semester-block">
              <div class="semester-title">Ciclo I - Redes y Sistemas</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Introducción a Redes de Datos CCNA
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Administración Operativa GNU/Linux
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo II - Criptografía Aplicada</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Algoritmos de Cifrado Simétrico y Asimétrico
                  <span class="course-meta">Créditos: 4 | Laboratorio: 2h | Teórico: 4h</span>
                </li>
                <li class="competency-item">
                  Protocolos de Red Seguros Empresariales
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo III - Hacking Ético</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Pentesting de Redes Locales Activas
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Análisis de Vulnerabilidades Web OWASP
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo IV - Infraestructura SOC</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Arquitectura SIEM Centralizada
                  <span class="course-meta">Créditos: 5 | Laboratorio: 4h | Teórico: 3h</span>
                </li>
                <li class="competency-item">
                  Gestión, Correlación y Mitigación de Eventos
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo V - Informática Forense</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Ingeniería Inversa de Malware Avanzado
                  <span class="course-meta">Créditos: 6 | Laboratorio: 8h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Análisis Forense de Memoria Volátil
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo VI - Gobernanza e Inmunidad</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Políticas de Control y Estándar ISO 27001
                  <span class="course-meta">Créditos: 4 | Laboratorio: 0h | Teórico: 4h</span>
                </li>
                <li class="competency-item">
                  Defensa Perimetral Multi-Cloud Avanzada
                  <span class="course-meta">Créditos: 6 | Laboratorio: 6h | Teórico: 3h</span>
                </li>
              </ul>
            </div>
          </div>

          <div class="track-detail-card">
            <div class="track-header">Cloud Architecture & Infrastructure</div>
            <p class="track-desc">Formación enfocada en la computación elástica, diseño de topologías distribuidas resilientes, microservicios orquestados y virtualización nativa en la nube.</p>
            
            <div class="semester-block">
              <div class="semester-title">Ciclo I - Sistemas de Servidores</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Windows Server Identity Fundamentals
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Redes de Datos Locales y Subnetting
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo II - Virtualización Avanzada</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Hipervisores Profesionales Type-1 (ESXi)
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Storage Area Networks (SAN) y NAS
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo III - MultiCloud Management</div>
              <ul class="competency-list">
                <li class="competency-item">
                  AWS SysOps Administrator Asociado
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Microsoft Azure Solutions Architect
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo IV - Infraestructura como Código</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Terraform Provisioning Hub y Estados
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Ansible Configuration Automation Flows
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo V - Orquestación Empresarial</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Docker Engine y Creación de Containers
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Kubernetes Clusters Core y Helm Charts
                  <span class="course-meta">Créditos: 6 | Laboratorio: 8h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo VI - Serverless Environments</div>
              <ul class="competency-list">
                <li class="competency-item">
                  AWS Lambda Functions y API Gateway
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  FinOps y Optimización de Costos Nube
                  <span class="course-meta">Créditos: 3 | Laboratorio: 2h | Teórico: 3h</span>
                </li>
              </ul>
            </div>
          </div>

          <div class="track-detail-card">
            <div class="track-header">Data Science & Analytics Hub</div>
            <p class="track-desc">Modelado de estructuras analíticas complejas, optimización estadística predictiva, procesamiento transaccional en streaming e ingeniería de bases masivas NoSQL.</p>
            
            <div class="semester-block">
              <div class="semester-title">Ciclo I - Álgebra Computacional</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Álgebra Lineal Avanzada y Vectores
                  <span class="course-meta">Créditos: 4 | Laboratorio: 2h | Teórico: 4h</span>
                </li>
                <li class="competency-item">
                  Estructuras de Programación en R
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo II - Modelación Analítica</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Estadística Descriptiva Matrix y Probabilidades
                  <span class="course-meta">Créditos: 4 | Laboratorio: 2h | Teórico: 4h</span>
                </li>
                <li class="competency-item">
                  Extracción ETL Avanzada y Transformación
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo III - Almacenamiento Masivo</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Data Lakes Estructurales con Apache Hadoop
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Bases de Datos NoSQL y Sharding (MongoDB)
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo IV - Advanced Data Mining</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Algoritmia Computacional de Regresión Lineal
                  <span class="course-meta">Créditos: 5 | Laboratorio: 4h | Teórico: 3h</span>
                </li>
                <li class="competency-item">
                  Procesamiento de Agrupación (Clustering)
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo V - Stream Processing Flow</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Apache Kafka Multi-topic Architecture
                  <span class="course-meta">Créditos: 6 | Laboratorio: 6h | Teórico: 3h</span>
                </li>
                <li class="competency-item">
                  Spark Streaming Flow Data Architecture
                  <span class="course-meta">Créditos: 5 | Laboratorio: 6h | Teórico: 2h</span>
                </li>
              </ul>
            </div>
            <div class="semester-block">
              <div class="semester-title">Ciclo VI - Business Intelligence AAA</div>
              <ul class="competency-list">
                <li class="competency-item">
                  Dashboards Corporativos en PowerBI Pro
                  <span class="course-meta">Créditos: 4 | Laboratorio: 4h | Teórico: 2h</span>
                </li>
                <li class="competency-item">
                  Data Governance Protocols e Integridad
                  <span class="course-meta">Créditos: 3 | Laboratorio: 0h | Teórico: 4h</span>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>

      <div class="simulator-finance-panel" id="seccion-costos">
        <h3 class="tracks-title" style="font-size: 2rem; margin-bottom: 5px; text-align: center; font-weight: 900; text-transform: uppercase;">Simulador Estructural de Pensiones y Tasas</h3>
        <p style="text-align:center; color: #b3828a; font-weight:600; font-size:0.95rem; text-transform: uppercase; margin-bottom: 20px;">Calcula el presupuesto transaccional proyectado según tu escala académica</p>
        
        <div class="sim-grid-layout">
          <div class="sim-controls-column">
            <div class="sim-input-box">
              <label class="field-label">Selecciona Especialidad Universitaria</label>
              <select class="sim-select-field" id="sim-career-select" onchange="calcularInyeccionFinanciera()">
                <option value="1200">Ingeniería de Software con IA</option>
                <option value="1150">Ciberseguridad Operacional (SOC)</option>
                <option value="1100">Cloud Architecture & Infrastructure</option>
                <option value="1050">Data Science & Analytics Hub</option>
              </select>
            </div>
            <div class="sim-input-box">
              <label class="field-label">Escala de Pensión Asignada</label>
              <select class="sim-select-field" id="sim-scale-select" onchange="calcularInyeccionFinanciera()">
                <option value="1.0">Escala Alfa (Regular Nacional)</option>
                <option value="0.85">Escala Beta (Beca Estímulo 15%)</option>
                <option value="0.5">Escala Gamma (Beca Integral Excelencia 50%)</option>
              </select>
            </div>
            <div class="sim-input-box">
              <label class="field-label">Servicios Adicionales Complementarios</label>
              <select class="sim-select-field" id="sim-extra-select" onchange="calcularInyeccionFinanciera()">
                <option value="44">Seguro Médico Integral Obligatorio (+S/.44)</option>
                <option value="0">Sin Servicios Adicionales (No Recomendado)</option>
              </select>
            </div>
          </div>

          <div class="sim-display-column">
            <div>
              <div class="sim-invoice-row">Costo por Derecho de Matrícula (Fijo): <span>S/. 350.00</span></div>
              <div class="sim-invoice-row">Costo Base Cuota Mensual Pensión: <span id="lbl-sim-base">S/. 1200.00</span></div>
              <div class="sim-invoice-row">Descuento por Escala de Beca Aplicado: <span id="lbl-sim-discount">S/. 0.00</span></div>
              <div class="sim-invoice-row">Seguro Médico Integral Obligatorio: <span id="lbl-sim-insurance">S/. 44.00</span></div>
            </div>
            <div class="sim-total-heavy">Total Cuota Mensual: <span id="lbl-sim-total">S/. 1594.00</span></div>
          </div>
        </div>
      </div>

      <div class="requirements-panel" id="seccion-requisitos">
        <h3 class="tracks-title" style="font-size: 2rem; margin-bottom: 5px; text-align: center; font-weight: 900; text-transform: uppercase;">Requisitos Documentales Obligatorios</h3>
        <p style="text-align:center; color: #b3828a; font-weight:600; font-size:0.95rem; margin-bottom: 35px; text-transform: uppercase;">Los expedientes deben digitalizarse en formato PDF y cargarse durante la matriculación</p>
        <div class="req-grid">
          <div class="req-card">
            <h4>Documento Nacional de Identidad (DNI)</h4>
            <p>Copia escaneada a color por ambos lados en un solo archivo plano. Debe ser completamente legible, sin reflejos de flash y sin alteraciones en los bordes perimetrales magnéticos.</p>
          </div>
          <div class="req-card">
            <h4>Certificado de Estudios de Educación Secundaria</h4>
            <p>Documento visado oficial emitido por la Unidad de Gestión Educativa Local (UGEL) o que cuente con firma electrónica criptográfica y código de barras QR válido del Ministerio de Educación.</p>
          </div>
          <div class="req-card">
            <h4>Ficha de Aptitud Médica Institucional</h4>
            <p>Certificado oficial de salud expedido por un centro de salud autorizado nacional que acredite aptitud física y mental para el desarrollo intensivo de actividades técnicas e industriales en laboratorios.</p>
          </div>
          <div class="req-card">
            <h4>Voucher de Pago por Derecho de Matrícula</h4>
            <p>Comprobante de depósito bancario original o transferencia electrónica procesada con número de operación legible hacia las cuentas recaudadoras autorizadas de la Escuela de TI institucional.</p>
          </div>
        </div>
      </div>

      <div class="workflow-section">
        <h3 class="tracks-title" style="font-size: 1.8rem; margin-bottom: 20px; text-transform: uppercase; font-weight: 900; text-align: center;">Protocolo de Admisión Digital Descentralizada</h3>
        <div class="workflow-grid">
          <div class="step-node">
            <div class="step-number">01</div>
            <div class="step-heading">Autenticación</div>
            <div class="step-text">Validación inicial de la identidad del estudiante a través del hub unificado de accesos corporativos protegidos por OAuth 2.0.</div>
          </div>
          <div class="step-node">
            <div class="step-number">02</div>
            <div class="step-heading">Expediente</div>
            <div class="step-text">Carga de requisitos documentales digitalizados y selección asíncrona de la especialidad de ingeniería requerida.</div>
          </div>
          <div class="step-node">
            <div class="step-number">03</div>
            <div class="step-heading">Asignación</div>
            <div class="step-text">Apertura e indexación de la matrícula dentro de los esquemas transaccionales blindados de la base de datos relacional.</div>
          </div>
          <div class="step-node">
            <div class="step-number">04</div>
            <div class="step-heading">Credenciales</div>
            <div class="step-text">Emisión final del token de sesión único cifrado mediante JWT para el ingreso seguro a los servicios académicos y Cloud.</div>
          </div>
        </div>
      </div>

      <div class="faq-section" id="seccion-faq">
        <h3 class="tracks-title" style="font-size: 2rem; text-transform: uppercase; font-weight: 900; margin-bottom: 40px; text-align: center;">Banco de Asistencia Técnica del Portal (FAQ)</h3>
        <div class="faq-container">
          <div class="faq-item">
            <input type="checkbox" id="fq-node-1" class="faq-input-trigger">
            <label for="fq-node-1" class="faq-label-title">¿Cuál es el plazo límite para formalizar la entrega de mis documentos PDF?</label>
            <div class="faq-content-box">
              <p>La carga del expediente digital se mantiene activa en los servidores hasta 48 horas antes del inicio oficial del ciclo académico contratado. Pasado este umbral de tiempo, el sistema ERP bloqueará las solicitudes digitales de matrícula pendientes para resguardar la planificación horaria física de los laboratorios y el aprovisionamiento de recursos de cómputo en la infraestructura Cloud de la sede.</p>
            </div>
          </div>
          <div class="faq-item">
            <input type="checkbox" id="fq-node-2" class="faq-input-trigger">
            <label for="fq-node-2" class="faq-label-title">¿Qué debo hacer si la autenticación federada de Microsoft o Google presenta fallas?</label>
            <div class="faq-content-box">
              <p>Si las pasarelas OAuth externas experimentan interrupciones, tiempos de espera prolongados o bloqueos en el flujo del entorno local, asegúrate de purgar la caché transaccional de Laravel ejecutando las instrucciones operativas de limpieza de vistas mediante la consola de Git Bash. Adicionalmente, verifica en las herramientas de desarrollador (F12) que las credenciales de redirección anti-CSRF no estén obstruidas por políticas del navegador.</p>
            </div>
          </div>
          <div class="faq-item">
            <input type="checkbox" id="fq-node-3" class="faq-input-trigger">
            <label for="fq-node-3" class="faq-label-title">¿Cómo verifique que mi asignación en base de datos se procesó correctamente?</label>
            <div class="faq-content-box">
              <p>Al completarse satisfactoriamente el paso 03 de asignación matricular mediante el envío de POST del formulario, los disparadores transaccionales (triggers) de las tablas físicas del motor relacional en HeidiSQL poblarán tus campos correlativos de forma automatizada y atómica. Recibirás una notificación por correo electrónico de confirmación con tu código de alumno matriculado.</p>
            </div>
          </div>
          <div class="faq-item">
            <input type="checkbox" id="fq-node-4" class="faq-input-trigger">
            <label for="fq-node-4" class="faq-label-title">¿Cuáles son las restricciones de tamaño y extensiones para la carga de archivos?</label>
            <div class="faq-content-box">
              <p>Todos los documentos obligatorios (DNI, Certificados, Ficha Médica de Aptitud) deben cargarse de forma mandatoria en formato plano PDF. El peso total por archivo no debe exceder bajo ninguna circunstancia el umbral rígido de 4 megabytes (4MB). Archivos encriptados con contraseña, corrompidos o dañados provocarán un rollback automático en la validación, cancelando el proceso temporalmente.</p>
            </div>
          </div>
          <div class="faq-item">
            <input type="checkbox" id="fq-node-5" class="faq-input-trigger">
            <label for="fq-node-5" class="faq-label-title">¿Qué ocurre si se detecta duplicidad de registros en la base de datos de HeidiSQL?</label>
            <div class="faq-content-box">
              <p>Nuestra base de datos MariaDB implementa índices compuestos de llaves únicas B-Tree para el Documento Nacional de Identidad (DNI) y la dirección de correo electrónico principal. Si intentas realizar un alta transaccional con credenciales previamente existentes en el registro, el framework lanzará un mensaje de excepción controlada en color rojo en la interfaz, interrumpiendo el flujo de inserción redundante de inmediato.</p>
            </div>
          </div>
          <div class="faq-item">
            <input type="checkbox" id="fq-node-6" class="faq-input-trigger">
            <label for="fq-node-6" class="faq-label-title">¿Cómo gestiona el portal la sesión única si accedo desde varios navegadores a la vez?</label>
            <div class="faq-content-box">
              <p>El portal implementa una política estricta de token transaccional con rotación periódica. Al autenticar un nuevo canal o iniciar un proceso de login en un navegador alterno (por ejemplo, desde tu móvil y laptop simultáneamente), el servidor backend invalidará de inmediato las cookies previas en reposo, garantizando el resguardo perimetral de tu perfil de matrícula y evitando conflictos de estado.</p>
            </div>
          </div>
          <div class="faq-item">
            <input type="checkbox" id="fq-node-7" class="faq-input-trigger">
            <label for="fq-node-7" class="faq-label-title">¿Es posible solicitar un traslado de carrera una vez asignado el bloque en la base de datos?</label>
            <div class="faq-content-box">
              <p>Sí. Las solicitudes de traslado de especialidad interna se gestionan a través del módulo de autoasistencia del panel de estudiante únicamente durante las dos primeras semanas de iniciado el semestre lectivo. La aprobación de este traslado técnico está sujeta estrictamente a la disponibilidad de vacantes sobrantes en los servidores de los laboratorios de software del nuevo bloque asignado.</p>
            </div>
          </div>
          <div class="faq-item">
            <input type="checkbox" id="fq-node-8" class="faq-input-trigger">
            <label for="fq-node-8" class="faq-label-title">¿Qué plataforma Cloud se utiliza para el despliegue de las clases virtuales?</label>
            <div class="faq-content-box">
              <p>Todo el ecosistema académico remoto, incluyendo laboratorios en la nube, simuladores y clases magistrales virtuales, está completamente integrado con los servicios de Google Workspace for Education y Microsoft Azure Active Directory (Azure AD), permitiendo un acceso Single Sign-On (SSO) centralizado y de alta disponibilidad con las credenciales que se te entregarán.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="alliance-belt-container">
        <div class="logos-moving-track">
          <div class="logo-item"><span>✦</span> AWS Academy</div>
          <div class="logo-item"><span>✦</span> Cisco Networking Academy</div>
          <div class="logo-item"><span>✦</span> Microsoft Learn</div>
          <div class="logo-item"><span>✦</span> Oracle WDP</div>
          <div class="logo-item"><span>✦</span> IBM Education</div>
          <div class="logo-item"><span>✦</span> Red Hat Academy</div>
          <div class="logo-item"><span>✦</span> AWS Academy</div>
          <div class="logo-item"><span>✦</span> Cisco Networking Academy</div>
          <div class="logo-item"><span>✦</span> Microsoft Learn</div>
          <div class="logo-item"><span>✦</span> Oracle WDP</div>
        </div>
      </div>
    </section>

    <footer class="footer-panel">
      <div class="footer-col-info">
        <h3>ESCUELA DE TI CORPORATIVA</h3>
        <p>Líderes indiscutibles en formación tecnológica industrial a nivel nacional. Desarrollando las competencias de ingeniería de software e infraestructura exigidas por el mercado global con los más altos estándares internacionales de calidad y certificación.</p>
      </div>
      <div class="footer-col-info">
        <h3>SOPORTE ACADÉMICO</h3>
        <ul>
          <li><a href="#">Manual y Guía de Matrícula Digital Interactiva</a></li>
          <li><a href="#">Calendario de Admisión Semestral</a></li>
          <li><a href="#">Reglamento Oficial del Estudiante TI</a></li>
          <li><a href="#">Directorio de Trámites y Certificados</a></li>
        </ul>
      </div>
      <div class="footer-col-info">
        <h3>INFRAESTRUCTURA CORE</h3>
        <ul>
          <li><a href="#">Motor Relacional HeidiSQL / MariaDB</a></li>
          <li><a href="#">Servidores Globales Azure AD</a></li>
          <li><a href="#">Entornos Cloud de Google Workspace</a></li>
          <li><a href="#">Clústeres de Deep Learning Nvidia</a></li>
        </ul>
      </div>
      <div class="footer-col-info">
        <h3>CONTACTO CENTRAL</h3>
        <p>Campus Tecnológico Principal:<br>Av. Alfredo Mendiola 3520, Lima, Perú</p>
        <p>Centro de Soporte Transaccional:<br>soporte.tecnico@senati.pe</p>
        <p>Línea de Emergencia SOC:<br>+51 01 208-9999</p>
      </div>
      <div class="bottom-copyright-layer">
        <span class="copyright-text">© 2026 ESCUELA DE TECNOLOGÍAS DE LA INFORMACIÓN — SENATI. TODOS LOS DERECHOS RESERVADOS INSTITUCIONALMENTE.</span>
        <span class="copyright-text" style="color: #4a000d;">ETI INDUSTRIAL GRADE FRAMEWORK v6.0</span>
      </div>
    </footer>
  </div>

  <div id="state-auth-login" class="auth-state-wrapper state-hidden">
    <button type="button" class="btn-return-portal" onclick="conmutarEstadoPortal('portal')">◀ Volver al Portal</button>

    <div class="login-hero-view-container">
      <div class="login-left-panel">
        <div class="login-auth-card">
          <div class="zen-top-line"></div>

          <h1 class="login-title-h1">SISTEMA<br>MATRÍCULA</h1>
          <p class="login-sub-brand">ESCUELA DE TECNOLOGÍAS DE LA INFORMACIÓN | SENATI</p>
          <div class="login-decorative-rule"></div>

          @if($errors->has('email')) 
            <div style="margin-bottom:14px; color:#ff1a4a; text-align:center; font-weight:700; font-size:0.85rem; background: rgba(255, 26, 74, 0.1); padding: 8px; border-radius: 4px; border: 1px solid rgba(255, 26, 74, 0.3);">
              {{ $errors->first('email') }}
            </div> 
          @endif

          <form method="POST" action="{{ route('login') }}" id="form-login-core">
            @csrf
            <div class="form-group">
              <label class="field-label">CORREO ELECTRÓNICO</label>
              <div class="login-input-wrapper">
                <input class="login-f-input" type="email" id="login-email-input" name="email" value="{{ old('email') }}" required autofocus>
              </div>
            </div>
            
            <div class="form-group">
              <label class="field-label">CONTRASEÑA DE ACCESO</label>
              <div class="login-input-wrapper">
                <input class="login-f-input" type="password" id="login-password-input" name="password" required>
                <button type="button" class="login-password-toggle" onclick="togglePasswordVisibility()" id="password-eye-icon">👁️</button>
              </div>
            </div>

            <button type="submit" class="btn-submit-core">ENTRAR AL SISTEMA</button>
          </form>

          <div class="separator-text">O PASARELA SOCIAL</div>
          <button type="button" onclick="handleSocialRedirect('{{ route('google.login') }}')" class="btn-oauth-provider">
            <span><span class="gl gb">G</span><span class="gl gr">O</span><span class="gl gy">O</span><span class="gl gg">G</span><span class="gl gb">L</span><span class="gl gr">E</span></span> | ACCESO ÚNICO GOOGLE
          </button>
          <button type="button" onclick="handleSocialRedirect('{{ route('microsoft.login') }}')" class="btn-oauth-provider">
            <span><span class="gl m-red">M</span><span class="gl m-green">i</span><span class="gl m-blue">c</span><span class="gl m-yellow">r</span><span class="gl m-green">o</span><span class="gl m-blue">s</span><span class="gl m-red">o</span><span class="gl m-yellow">f</span><span class="gl m-blue">t</span></span> | ACCESO ÚNICO MICROSOFT
          </button>

          <div class="navigation-links">
            <a onclick="conmutarEstadoPortal('password')">¿OLVIDASTE TU CLAVE?</a>
            <a onclick="conmutarEstadoPortal('register')">CREAR USUARIO</a>
          </div>
        </div>
      </div>
      
      <div class="login-right-panel">
        <div class="diag-wrap"><div class="diag-lines" id="dl-login"></div></div>
        <div class="vig"></div>
      </div>
    </div>
  </div>

  <div id="state-auth-register" class="auth-state-wrapper state-hidden">
    <button type="button" class="btn-return-portal" onclick="conmutarEstadoPortal('login')">◀ VOLVER AL ACCESO</button>

    <div class="login-hero-view-container">
      <div class="login-left-panel panel-register">
        <div class="login-auth-card">
          <div class="zen-top-line"></div>
          <h1 class="login-title-h1" style="font-size: 2.2rem;">REGISTRO ALUMNO</h1>
          <p class="login-sub-brand">ESCUELA DE TECNOLOGÍAS DE LA INFORMACIÓN | SENATI</p>
          <div class="login-decorative-rule"></div>

          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="register-grid">
              <div class="section-divider">Datos Personales</div>
              
              <div class="form-group" style="margin-bottom: 0;">
                <label class="field-label">NOMBRES</label>
                <div class="login-input-wrapper">
                  <input class="login-f-input" type="text" name="name" required autofocus>
                </div>
              </div>
              <div class="form-group" style="margin-bottom: 0;">
                <label class="field-label">APELLIDOS</label>
                <div class="login-input-wrapper">
                  <input class="login-f-input" type="text" name="last_name" required>
                </div>
              </div>

              <div class="form-group col-span-2" style="margin-bottom: 0;">
                <label class="field-label">CORREO INSTITUCIONAL DE ACCESO</label>
                <div class="login-input-wrapper">
                  <input class="login-f-input" type="email" name="email" required>
                </div>
              </div>

              <div class="form-group" style="margin-bottom: 0;">
                <label class="field-label">TELÉFONO CELULAR</label>
                <div class="login-input-wrapper">
                  <input class="login-f-input" type="text" name="phone" required>
                </div>
              </div>
              <div class="form-group" style="margin-bottom: 0;">
                <label class="field-label">NÚMERO DNI</label>
                <div class="login-input-wrapper">
                  <input class="login-f-input" type="text" name="dni" required>
                </div>
              </div>

              <div class="section-divider">Credenciales de Acceso</div>

              <div class="form-group" style="margin-bottom: 0;">
                <label class="field-label">CONTRASEÑA</label>
                <div class="login-input-wrapper">
                  <input class="login-f-input" type="password" id="reg-password" name="password" required onkeyup="checkPasswordStrength()">
                </div>
                <div class="password-strength-meter">
                  <div class="strength-bar" id="str-1"></div>
                  <div class="strength-bar" id="str-2"></div>
                  <div class="strength-bar" id="str-3"></div>
                </div>
              </div>
              <div class="form-group" style="margin-bottom: 0;">
                <label class="field-label">CONFIRMAR CLAVE</label>
                <div class="login-input-wrapper">
                  <input class="login-f-input" type="password" name="password_confirmation" required>
                </div>
              </div>
            </div>

            <label class="terms-checkbox-wrapper" style="margin-top: 20px;">
              <input type="checkbox" required>
              <div class="custom-checkbox"></div>
              <div class="terms-text">Acepto el <span>Reglamento del Estudiante</span> y autorizo el tratamiento de mis datos según las <span>Políticas de Privacidad</span>.</div>
            </label>

            <button type="submit" class="btn-submit-core">FINALIZAR MATRÍCULA</button>
          </form>
          <div class="separator-text" style="margin-top:0;">¿YA TIENES CUENTA? <a style="color:var(--red-primary); cursor:pointer;" onclick="conmutarEstadoPortal('login')">INICIAR SESIÓN</a></div>
        </div>
      </div>
      
      <div class="login-right-panel">
        <div class="diag-wrap"><div class="diag-lines" id="dl-register"></div></div>
        <div class="vig"></div>
      </div>
    </div>
  </div>

  <div id="state-auth-password" class="auth-state-wrapper state-hidden">
    <div class="login-hero-view-container">
      
      <div class="login-left-panel">
        <div class="login-auth-card">
          
          <div class="soc-shield-icon">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
            </svg>
          </div>

          <h1 class="login-title-h1" style="font-size: 2rem;">RECUPERAR<br>CONTRASEÑA</h1>
          <div class="login-decorative-rule" style="margin-bottom: 16px;"></div>
          
          <p class="recovery-desc-text">Ingrese su dirección de correo electrónico institucional. El sistema validará su expediente académico e inyectará un enlace de seguridad directo a su bandeja de entrada (Gmail / Microsoft Outlook).</p>

          <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
              <label class="field-label">CORREO ELECTRÓNICO ASOCIADO</label>
              <div class="login-input-wrapper">
                <div class="input-left-icon">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                </div>
                <input class="login-f-input pl-icon" type="email" name="email" placeholder="estudiante@senati.pe" required autofocus>
              </div>
            </div>

            <button type="submit" class="btn-submit-core" style="font-size: 0.95rem; margin-top: 15px;">GENERAR TOKEN DE RECUPERACIÓN</button>
          </form>

          <div class="navigation-links" style="border-top: none; justify-content: center;">
            <a onclick="conmutarEstadoPortal('login')">◀ VOLVER AL PANEL DE ACCESO</a>
          </div>
        </div>
      </div>

      <div class="login-right-panel">
        <div class="diag-wrap"><div class="diag-lines" id="dl-password"></div></div>
        <div class="vig"></div>
      </div>
    </div>
  </div>

<script>
// 1. GENERADOR DE CARRUSELES DIAGONALES PARA LOS ESTADOS AUTH (MATRIX NEON RED EFFECT)
(function () {
  const msgs = [
    { t: "MATRÍCULAS ABIERTAS ✦ ESCUELA DE TECNOLOGÍAS SENATI ✦ ÚLTIMAS PLAZAS DISPONIBLES ✦ ",  c: "cw"  },
    { t: "INGENIERÍA DE SOFTWARE CON INTELIGENCIA ARTIFICIAL ✦ MACHINE LEARNING ✦ DATA SCIENCE ✦ ", c: "co"  },
    { t: "CONVENIOS DE CERTIFICACIÓN GLOBAL ✦ AWS ACADEMY ✦ CISCO ✦ MICROSOFT AZURE ✦ ORACLE ✦ ", c: "cw"  },
    { t: "LABORATORIOS DE ALTA ESPECIALIZACIÓN ✦ EQUIPADOS CON TECNOLOGÍA DE PUNTA ✦ ",            c: "ca"  },
    { t: "BOLSA DE TRABAJO ACTIVA ✦ VINCULADA DIRECTAMENTE CON EMPRESAS ✦ INSERCIÓN LABORAL ✦ ",   c: "cdw" },
  ];
  
  const containers = ['dl-login', 'dl-register', 'dl-password'];
  
  containers.forEach(id => {
    const container = document.getElementById(id);
    if(container) {
      for (let i = 0; i < 44; i++) {
        const m = msgs[i % msgs.length];
        const div = document.createElement('div'); div.className = 'dline ' + m.c;
        const innerSpan = document.createElement('span'); innerSpan.className = 'dline-inner'; innerSpan.textContent = m.t.repeat(7);
        div.appendChild(innerSpan); container.appendChild(div);
      }
    }
  });
})();

// 2. CONMUTADOR DE ESTADOS CENTRALIZADO DE LA SPA
function conmutarEstadoPortal(targetState) {
  const states = {
    'portal': document.getElementById('state-portal-home'),
    'login': document.getElementById('state-auth-login'),
    'register': document.getElementById('state-auth-register'),
    'password': document.getElementById('state-auth-password')
  };

  Object.values(states).forEach(el => {
    if(el) {
      el.classList.remove('state-active');
      el.classList.add('state-hidden');
    }
  });

  if(states[targetState]) {
    states[targetState].classList.remove('state-hidden');
    states[targetState].classList.add('state-active');
    if (targetState !== 'portal') {
      window.scrollTo({ top: 0, behavior: 'instant' });
    }
  }
}

// 3. MEDIDOR DE FUERZA CRIPTOGRÁFICA DE CONTRASEÑA EN TIEMPO REAL
function checkPasswordStrength() {
  const pwd = document.getElementById('reg-password').value;
  const b1 = document.getElementById('str-1');
  const b2 = document.getElementById('str-2');
  const b3 = document.getElementById('str-3');
  
  [b1, b2, b3].forEach(b => b.className = 'strength-bar');

  if (pwd.length > 0) { b1.classList.add('active-weak'); }
  if (pwd.length >= 6 && /[A-Z]/.test(pwd) && /[0-9]/.test(pwd)) { 
    b1.className = 'strength-bar active-medium';
    b2.classList.add('active-medium'); 
  }
  if (pwd.length >= 8 && /[A-Z]/.test(pwd) && /[0-9]/.test(pwd) && /[^A-Za-z0-9]/.test(pwd)) { 
    b1.className = 'strength-bar active-strong';
    b2.className = 'strength-bar active-strong';
    b3.classList.add('active-strong'); 
  }
}

// 4. LÓGICA DE VISIBILIDAD DE CONTRASEÑA
function togglePasswordVisibility() {
  const passwordInput = document.getElementById('login-password-input');
  const eyeIcon = document.getElementById('password-eye-icon');
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text'; eyeIcon.textContent = '🙈';
  } else {
    passwordInput.type = 'password'; eyeIcon.textContent = '👁️';
  }
}

// 5. REDIRECCIÓN TRANSPARENTE DE ENTORNO SOCIAL
function handleSocialRedirect(baseUrl) {
  const emailInputValue = document.getElementById('login-email-input').value.trim();
  window.location.href = baseUrl + (emailInputValue !== "" ? "?email=" + encodeURIComponent(emailInputValue) : "");
}

// 6. CONTROLADOR DE ANIMACIÓN DE CONTADORES NUMÉRICOS DE RENDIMIENTO
document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll('.stat-count-huge');
  const speed = 120;
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const target = +entry.target.getAttribute('data-counter-target');
        const countAnim = () => {
          const count = +entry.target.innerText.replace(/\D/g,'');
          const step = target / speed;
          if (count < target) {
            entry.target.innerHTML = Math.ceil(count + step) + (entry.target.innerHTML.includes('%') ? '<span>%</span>' : entry.target.innerHTML.includes('+') ? '<span>+</span>' : '');
            setTimeout(countAnim, 16);
          } else {
            entry.target.innerHTML = target + (entry.target.innerHTML.includes('%') ? '<span>%</span>' : entry.target.innerHTML.includes('+') ? '<span>+</span>' : '');
          }
        };
        countAnim();
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.4 });
  counters.forEach(counter => observer.observe(counter));
});

// 7. ARQUITECTURA DE CÓMPUTO DEL SIMULADOR FINANCIERO DE PENSIONES
function calcularInyeccionFinanciera() {
  const baseCareerCost = parseFloat(document.getElementById('sim-career-select').value) || 0;
  const discountMultiplier = parseFloat(document.getElementById('sim-scale-select').value) || 1;
  const extraInsurance = parseFloat(document.getElementById('sim-extra-select').value) || 0;
  
  const discountAmount = baseCareerCost * (1 - discountMultiplier);
  const preciseTotal = (baseCareerCost * discountMultiplier) + 350 + extraInsurance;
  
  const baseElement = document.getElementById('lbl-sim-base');
  const discountElement = document.getElementById('lbl-sim-discount');
  const insuranceElement = document.getElementById('lbl-sim-insurance');
  const totalElement = document.getElementById('lbl-sim-total');

  if (baseElement) baseElement.innerText = 'S/. ' + baseCareerCost.toFixed(2);
  if (discountElement) discountElement.innerText = 'S/. ' + discountAmount.toFixed(2);
  if (insuranceElement) insuranceElement.innerText = 'S/. ' + extraInsurance.toFixed(2);
  if (totalElement) totalElement.innerText = 'S/. ' + preciseTotal.toFixed(2);
}

document.addEventListener("DOMContentLoaded", () => {
  calcularInyeccionFinanciera();
});

@if($errors->any())
  document.addEventListener("DOMContentLoaded", function() { conmutarEstadoPortal('login'); });
@endif
</script>
</body>
</html>