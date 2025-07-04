<style>
    #chat-box div strong {
      color: #166534;
      font-family: 'Tajawal', sans-serif;
    }

    input.form-control:focus,
    textarea.form-control:focus,
    select.form-select:focus {
      border-color: #15803d !important;
      box-shadow: 0 0 0 0.15rem rgba(22, 163, 74, 0.25) !important;
      outline: none;
      transition: all 0.3s ease-in-out;
    }

    input.form-control,
    textarea.form-control,
    select.form-select {
      border-color: #d1d5db;
      background-color: #f9fafb;
      color: #374151;
      font-family: 'Tajawal', sans-serif;
    }

    label.form-label {
      color: #166534;
      font-weight: 600;
    }

    .chat-toggle:hover {
      transform: scale(1.1);
      background-color: #12823d !important;
    }

    #chat-badge {
      animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
        opacity: 1;
      }

      50% {
        transform: scale(1.2);
        opacity: 0.7;
      }

      100% {
        transform: scale(1);
        opacity: 1;
      }
    }

    .typing-dots::after {
      content: ' .';
      animation: dots 1.5s steps(3, end) infinite;
    }

    @keyframes dots {
      0% {
        content: ' .';
      }

      50% {
        content: ' ..';
      }

      100% {
        content: ' ...';
      }
    }
</style>

<!-- Tombol Chatbot -->
<button id="chat-toggle"
  class="btn btn-success chat-toggle d-flex align-items-center justify-content-center position-fixed shadow"
  style="bottom: 20px; right: 20px; width: 56px; height: 56px; border-radius: 50%; z-index: 1000;"
  aria-label="Buka Chatbot KuyBot" title="Butuh bantuan? KuyBot siap bantu! 💬">
  <i class="bi bi-chat-dots-fill fs-4"></i>
  <span id="chat-badge"
    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger d-none"
    style="font-size: 0.75rem;">!</span>
</button>

<!-- Chat Popup -->
<div id="chat-popup" class="card shadow"
  style="width: 320px; position: fixed; bottom: 80px; right: 20px; display: none; z-index: 1000;">
  <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
    <span>🤖 KuyBot</span>
    <button class="btn-close btn-close-white btn-sm" id="chat-close"></button>
  </div>
  <div class="card-body" style="height: 300px; overflow-y: auto;" id="chat-box"></div>
  <div class="card-footer">
    <form id="chat-form">
      <div class="input-group">
        <input type="text" id="user-message" class="form-control" placeholder="Tulis pesan..." required>
        <button class="btn btn-primary btn-sm">Kirim</button>
      </div>
    </form>
  </div>
</div>

<script>
    const chatToggle = document.getElementById('chat-toggle');
    const chatPopup = document.getElementById('chat-popup');
    const chatClose = document.getElementById('chat-close');
    const chatForm = document.getElementById('chat-form');
    const chatBox = document.getElementById('chat-box');
    const input = document.getElementById('user-message');
    const badge = document.getElementById('chat-badge');

    let isChatOpened = false;

    chatToggle.addEventListener('click', () => {
      const isVisible = chatPopup.style.display === 'block';
      chatPopup.style.display = isVisible ? 'none' : 'block';
      isChatOpened = !isVisible;
      if (!isVisible) badge.classList.add('d-none');
    });

    chatClose.addEventListener('click', () => {
      chatPopup.style.display = 'none';
      isChatOpened = false;
    });

    function escapeHTML(str) {
      return str.replace(/[&<>"']/g, function (m) {
        return ({
          '&': '&amp;',
          '<': '&lt;',
          '>': '&gt;',
          '"': '&quot;',
          "'": '&#39;'
        })[m];
      });
    }

    chatForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const message = input.value.trim();
      if (!message) return;

      const userMessageHTML = `
        <div class="d-flex justify-content-end mb-2">
          <div class="me-2 text-end">
            <div><strong>👤 Kamu:</strong></div>
            <div class="bg-success text-white p-2 rounded">${escapeHTML(message)}</div>
          </div>
        </div>
      `;
      chatBox.innerHTML += userMessageHTML;
      input.value = '';
      chatBox.scrollTop = chatBox.scrollHeight;

      const botId = `bot-response-${Date.now()}`;
      const botMessageHTML = `
        <div class="d-flex justify-content-start mb-2" id="${botId}">
          <div>
            <div><strong>🤖 KuyBot:</strong></div>
            <div class="bg-light p-2 rounded text-muted typing-dots">⏳ KuyBot sedang berpikir</div>
          </div>
        </div>
      `;
      chatBox.innerHTML += botMessageHTML;
      chatBox.scrollTop = chatBox.scrollHeight;

      fetch('{{ route('chat.send') }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ content: message })
      })
        .then(response => response.json())
        .then(data => {
          const reply = data.reply || 'Bot tidak menjawab.';
          const botDiv = document.querySelector(`#${botId} div div:last-child`);
          botDiv.classList.remove("text-muted", "typing-dots");
          botDiv.innerHTML = "";

          let i = 0;
          const typingEffect = setInterval(() => {
            if (i < reply.length) {
              botDiv.innerHTML += escapeHTML(reply.charAt(i));
              i++;
              botDiv.scrollIntoView({ behavior: "smooth", block: "end" });
            } else {
              clearInterval(typingEffect);
            }
          }, 20);
        })
        .catch(err => {
          const botDiv = document.querySelector(`#${botId} div div:last-child`);
          botDiv.innerHTML = `<span class="text-danger">Terjadi error. Silakan coba lagi.</span>`;
          console.error(err);
        });
    });

    function showChatNotification() {
      if (!isChatOpened) {
        badge.classList.remove('d-none');
      }
    }
</script>