<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>404 — Page Not Found</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
  <style>
    /* ── Reset ── */
    *, *::before, *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* ── Base ── */
    html, body {
      width: 100%;
      min-height: 100vh;
      font-family: 'Inter', sans-serif;
      background: #f4f7f9;
      overflow-x: hidden;
    }

    /* ── Page wrapper ── */
    .page-wrapper {
      position: relative;
      width: 100%;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #f4f7f9;
      padding: 2rem 1rem;
    }

    /* ── Background circles ── */
    .bg-circle {
      position: absolute;
      border-radius: 50%;
      opacity: 0.08;
      animation: pulse 6s ease-in-out infinite;
      pointer-events: none;
    }

    .bg-circle-1 {
      width: 500px;
      height: 500px;
      background: #105293;
      top: -100px;
      left: -100px;
      animation-delay: 0s;
    }

    .bg-circle-2 {
      width: 350px;
      height: 350px;
      background: #7a8f9b;
      bottom: -80px;
      right: -80px;
      animation-delay: 2s;
    }

    .bg-circle-3 {
      width: 200px;
      height: 200px;
      background: #105293;
      bottom: 100px;
      left: 50px;
      animation-delay: 4s;
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1);   opacity: 0.08; }
      50%       { transform: scale(1.1); opacity: 0.13; }
    }

    /* ── Floating dots ── */
    .floating-dot {
      position: absolute;
      border-radius: 50%;
      background: #105293;
      animation: drift 8s ease-in-out infinite;
      opacity: 0.18;
      pointer-events: none;
    }

    .dot-1 { width: 8px;  height: 8px;  top: 25%; left: 10%;  animation-delay: 0s; }
    .dot-2 { width: 5px;  height: 5px;  top: 60%; left: 8%;   animation-delay: 1.5s; }
    .dot-3 { width: 10px; height: 10px; top: 20%; right: 12%; animation-delay: 3s;   background: #7a8f9b; }
    .dot-4 { width: 6px;  height: 6px;  top: 70%; right: 10%; animation-delay: 2s; }
    .dot-5 { width: 4px;  height: 4px;  top: 45%; left: 5%;   animation-delay: 4s;   background: #7a8f9b; }

    @keyframes drift {
      0%, 100% { transform: translateY(0)     translateX(0); }
      33%       { transform: translateY(-18px) translateX(8px); }
      66%       { transform: translateY(10px)  translateX(-6px); }
    }

    /* ── Main container ── */
    .container {
      position: relative;
      z-index: 10;
      text-align: center;
      padding: 3rem 2rem;
      max-width: 560px;
      width: 100%;
    }

    /* ── 404 digits ── */
    .number-block {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 2rem;
    }

    .digit {
      font-size: clamp(72px, 20vw, 160px);
      font-weight: 600;
      line-height: 1;
      color: #105293;
      animation: float 4s ease-in-out infinite;
    }

    .digit:nth-child(1) { animation-delay: 0s; }
    .digit:nth-child(2) { animation-delay: 0.3s; color: #7a8f9b; }
    .digit:nth-child(3) { animation-delay: 0.6s; }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50%       { transform: translateY(-12px); }
    }

    /* ── Icon ── */
    .icon-wrap {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 56px;
      height: 56px;
      border-radius: 50%;
      background: #105293;
      margin-bottom: 1.5rem;
      animation: spin-slow 12s linear infinite;
    }

    .icon-wrap i {
      font-size: 22px;
      color: #fff;
      animation: spin-slow 12s linear infinite reverse;
    }

    @keyframes spin-slow {
      from { transform: rotate(0deg); }
      to   { transform: rotate(360deg); }
    }

    /* ── Heading ── */
    h1 {
      font-size: clamp(1.25rem, 4vw, 1.6rem);
      font-weight: 600;
      color: #105293;
      margin-bottom: 0.75rem;
      letter-spacing: -0.3px;
    }

    /* ── Divider ── */
    .divider {
      width: 48px;
      height: 3px;
      background: #105293;
      border-radius: 2px;
      margin: 0 auto 1.5rem;
      opacity: 0.25;
    }

    /* ── Description ── */
    p {
      font-size: clamp(0.875rem, 2.5vw, 1rem);
      color: #7a8f9b;
      line-height: 1.7;
      margin-bottom: 2.5rem;
      font-weight: 400;
    }

    /* ── Buttons ── */
    .actions {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      flex-wrap: wrap;
    }

    .btn-primary,
    .btn-secondary {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 0.75rem 1.75rem;
      border-radius: 10px;
      font-size: 0.93rem;
      font-weight: 500;
      cursor: pointer;
      text-decoration: none;
      font-family: inherit;
      white-space: nowrap;
      transition: background 0.2s ease, border-color 0.2s ease, color 0.2s ease, transform 0.15s ease;
    }

    .btn-primary {
      background: #105293;
      color: #fff;
      border: none;
    }

    .btn-primary:hover {
      background: #0d4279;
      transform: translateY(-2px);
    }

    .btn-primary:active { transform: translateY(0); }

    .btn-secondary {
      background: transparent;
      color: #7a8f9b;
      border: 1.5px solid #cad3d8;
    }

    .btn-secondary:hover {
      border-color: #7a8f9b;
      color: #105293;
      transform: translateY(-2px);
    }

    .btn-secondary:active { transform: translateY(0); }

    /* ── Tablet (max 768px) ── */
    @media (max-width: 768px) {
      .bg-circle-1 { width: 320px; height: 320px; top: -60px; left: -60px; }
      .bg-circle-2 { width: 240px; height: 240px; bottom: -50px; right: -50px; }
      .bg-circle-3 { width: 150px; height: 150px; }

      .container { padding: 2.5rem 1.5rem; }

      .icon-wrap { width: 48px; height: 48px; }
      .icon-wrap i { font-size: 20px; }

      .dot-1, .dot-2, .dot-5 { display: none; }
    }

    /* ── Mobile (max 480px) ── */
    @media (max-width: 480px) {
      .bg-circle-1 { width: 220px; height: 220px; top: -40px; left: -40px; }
      .bg-circle-2 { width: 160px; height: 160px; bottom: -30px; right: -30px; }
      .bg-circle-3 { display: none; }

      .container { padding: 2rem 1.25rem; }

      .number-block { margin-bottom: 1.5rem; }

      .icon-wrap { width: 44px; height: 44px; margin-bottom: 1.25rem; }
      .icon-wrap i { font-size: 18px; }

      p { margin-bottom: 2rem; }
      p br { display: none; }

      .actions { flex-direction: column; width: 100%; gap: 10px; }

      .btn-primary,
      .btn-secondary {
        width: 100%;
        padding: 0.85rem 1.5rem;
        font-size: 0.95rem;
      }

      .dot-3, .dot-4 { display: none; }
    }

    /* ── Very small (max 360px) ── */
    @media (max-width: 360px) {
      .container { padding: 1.5rem 1rem; }
    }
  </style>
</head>
<body>

  <div class="page-wrapper">

    <!-- Background decorative circles -->
    <div class="bg-circle bg-circle-1"></div>
    <div class="bg-circle bg-circle-2"></div>
    <div class="bg-circle bg-circle-3"></div>

    <!-- Floating dots -->
    <div class="floating-dot dot-1"></div>
    <div class="floating-dot dot-2"></div>
    <div class="floating-dot dot-3"></div>
    <div class="floating-dot dot-4"></div>
    <div class="floating-dot dot-5"></div>

    <!-- Main content -->
    <div class="container">

      <!-- 404 number -->
      <div class="number-block">
        <span class="digit">4</span>
        <span class="digit">0</span>
        <span class="digit">4</span>
      </div>

      <!-- Spinning icon -->
      <div class="icon-wrap">
        <i class="ti ti-map-search"></i>
      </div>

      <!-- Heading -->
      <h1>Page not found</h1>
      <div class="divider"></div>

      <!-- Description -->
      <p>
        The page you're looking for has wandered off the map.<br />
        It may have been moved, deleted, or perhaps never existed.
      </p>

      <!-- Action buttons -->
      <div class="actions">
        <a href="{{ url('/') }}" class="btn-primary">
          <i class="ti ti-home"></i>
          Go home
        </a>
        
      </div>

    </div>
  </div>

</body>
</html>