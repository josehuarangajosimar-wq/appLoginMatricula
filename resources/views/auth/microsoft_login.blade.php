<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión en tu cuenta de Microsoft</title>
  <style>
    body {
      margin: 0; padding: 0; background-color: #111111;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex; align-items: center; justify-content: center; height: 100vh;
      user-select: none;
    }
    .container {
      width: 100%; max-width: 440px; background: #1f1f1f; padding: 44px; box-sizing: border-box;
      box-shadow: 0 4px 16px rgba(0,0,0,0.4); border-radius: 2px; border: 1px solid rgba(255,255,255,0.03);
    }
    .logo-container { display: flex; flex-wrap: wrap; width: 36px; height: 36px; margin-bottom: 24px; }
    .box { width: 17px; height: 17px; margin: 0.5px; }
    .r { background-color: #f25022; } .g { background-color: #7fba00; }
    .b { background-color: #00a4ef; } .y { background-color: #ffb900; }
    
    h1 { color: #ffffff; font-size: 1.5rem; font-weight: 600; margin: 0 0 8px 0; letter-spacing: -0.5px; }
    .sub { color: #cccccc; font-size: 0.9rem; margin-bottom: 24px; }
    .sub a { color: #00a4ef; text-decoration: none; font-weight: 600; }

    .account-row {
      display: flex; align-items: center; padding: 12px 8px; cursor: pointer;
      border-bottom: 1px solid rgba(255,255,255,0.05); transition: background 0.2s, transform 0.1s;
      margin-left: -8px; margin-right: -8px; border-radius: 4px;
    }
    .account-row:hover { background-color: rgba(255,255,255,0.06); transform: translateX(2px); }
    
    .avatar {
      width: 34px; height: 34px; background-color: #2b2b2b; border-radius: 50%;
      display: flex; align-items: center; justify-content: center; color: #ffffff;
      font-size: 0.9rem; font-weight: 600; margin-right: 14px; border: 1px solid rgba(255,255,255,0.1);
    }
    .info { display: flex; flex-direction: column; }
    .name { color: #ffffff; font-size: 0.95rem; font-weight: 600; }
    .email { color: #aaaaaa; font-size: 0.85rem; }
    
    .footer-links { display: flex; justify-content: space-between; margin-top: 32px; font-size: 0.75rem; }
    .footer-links a { color: #aaaaaa; text-decoration: none; }
    .footer-links a:hover { color: #ffffff; text-decoration: underline; }
  </style>
</head>
<body>

<div class="container">
  <div class="logo-container">
    <div class="box r"></div><div class="box g"></div>
    <div class="box b"></div><div class="box y"></div>
  </div>

  <h1>Elegir una cuenta</h1>
  <div class="sub">Ir a <a href="#">appLoginMatricula</a></div>

  <div class="account-row" onclick="selectAccount('estudiante.senati@outlook.com')">
    <div class="avatar" style="background-color: #0078d4;">S</div>
    <div class="info">
      <div class="name">Estudiante ETI SENATI</div>
      <div class="email">estudiante.senati@outlook.com</div>
    </div>
  </div>

  <div class="account-row" onclick="selectAccount('jose.huaranga@hotmail.com')">
    <div class="avatar" style="background-color: #d83b01;">JH</div>
    <div class="info">
      <div class="name">jose huaranga</div>
      <div class="email">jose.huaranga@hotmail.com</div>
    </div>
  </div>

  <div class="account-row" onclick="selectAccount('')">
    <div class="avatar" style="background-color: transparent; font-size: 1.5rem; color: #00a4ef;">+</div>
    <div class="info">
      <div class="name" style="color: #00a4ef; font-weight: 500;">Usar otra cuenta</div>
    </div>
  </div>

  <div class="footer-links">
    <a href="{{ route('login') }}">Cancelar</a>
    <a href="#">Opciones de inicio de sesión</a>
  </div>
</div>

<script>
function selectAccount(email) {
  if(email === "") {
    window.location.href = "{{ route('login') }}";
  } else {
    // Retorna directo al callback inyectando la query limpia sin nombres aleatorios
    window.location.href = "{{ route('microsoft.callback') }}?email=" + encodeURIComponent(email);
  }
}
</script>
</body>
</html>