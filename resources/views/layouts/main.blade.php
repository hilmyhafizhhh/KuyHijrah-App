<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>KuyHijrah | {{ $title }}</title>

    {{-- Bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Link AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- Link FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        :root {
            --bs-primary: #16a34a;
            --bs-primary-rgb: 22, 163, 74;
        }

        .btn-primary {
            background-color: #16a34a;
            border-color: #16a34a;
        }

        .btn-primary:hover {
            background-color: #12823d;
            border-color: #12823d;
        }

        .btn-outline-primary {
            color: #16a34a;
            border-color: #16a34a;
        }

        .btn-outline-primary:hover {
            background-color: #16a34a;
            color: #fff;
            border-color: #16a34a;
        }

        .text-primary {
            color: #16a34a !important;
        }

        .bg-primary {
            background-color: #16a34a !important;
        }

        .border-primary {
            border-color: #16a34a !important;
        }

        .pagination .page-link {
            color: #16a34a;
            border: 1px solid #16a34a;
        }

        .pagination .page-link:hover {
            background-color: #e1fbea;
            color: #166534;
            border-color: #16a34a;
        }

        .pagination .page-item.active .page-link {
            background-color: #16a34a;
            border-color: #16a34a;
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            color: #999;
            border-color: #ddd;
            background-color: #f8f9fa;
        }

        #chat-box div strong {
            color: #166534;
            font-family: 'Tajawal', sans-serif;
        }

        /* Style untuk semua input dan textarea saat aktif/fokus */
        input.form-control:focus,
        textarea.form-control:focus,
        select.form-select:focus {
            border-color: #15803d !important;
            box-shadow: 0 0 0 0.15rem rgba(22, 163, 74, 0.25) !important;
            outline: none;
            transition: all 0.3s ease-in-out;
        }

        /* Style default biar lebih selaras juga (bukan saat fokus) */
        input.form-control,
        textarea.form-control,
        select.form-select {
            border-color: #d1d5db;
            background-color: #f9fafb;
            color: #374151;
            font-family: 'Tajawal', sans-serif;
        }

        /* Optional: Gaya label */
        label.form-label {
            color: #166534;
            font-weight: 600;
        }

    </style>


</head>

<body>

    @include('partials.navbar')
    <div class="mt-4">
        @yield('container')
        <!-- Tombol Chat -->
<button id="chat-toggle" class="btn btn-primary rounded-circle"
        style="position: fixed; bottom: 20px; right: 20px; z-index: 1000; width: 50px; height: 50px;">
    💬
</button>

<!-- Chat Popup -->
<div id="chat-popup" class="card shadow" style="width: 320px; position: fixed; bottom: 80px; right: 20px; display: none; z-index: 1000;">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        {{-- <span>Chatbot</span> --}}
        <span>🤖 KuyBot</span>
        <button class="btn-close btn-close-white btn-sm" id="chat-close"></button>
    </div>
    <div class="card-body" style="height: 300px; overflow-y: auto;" id="chat-box">
        <!-- Chat akan tampil di sini -->
    </div>
    <div class="card-footer">
        <form id="chat-form">
            <div class="input-group">
                <input type="text" id="user-message" class="form-control" placeholder="Tulis pesan..." required>
                <button class="btn btn-primary btn-sm">Kirim</button>
            </div>
        </form>
    </div>
</div>

    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- JS AOS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>

<script>
    const chatToggle = document.getElementById('chat-toggle');
    const chatPopup = document.getElementById('chat-popup');
    const chatClose = document.getElementById('chat-close');
    const chatForm = document.getElementById('chat-form');
    const chatBox = document.getElementById('chat-box');
    const input = document.getElementById('user-message');

    chatToggle.addEventListener('click', () => chatPopup.style.display = 'block');
    chatClose.addEventListener('click', () => chatPopup.style.display = 'none');

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

        // Tambahkan pesan user
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

        // Tambahkan placeholder respon bot
        const botId = `bot-response-${Date.now()}`;
        const botMessageHTML = `
            <div class="d-flex justify-content-start mb-2" id="${botId}">
                <div>
                    <div><strong>🤖 KuyBot:</strong></div>
                        <div class="bg-light p-2 rounded text-muted">⏳ KuyBot sedang berpikir...</div>
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
            botDiv.classList.remove("text-muted");
            botDiv.innerHTML = "";

            let i = 0;
            const typingEffect = setInterval(() => {
                if (i < reply.length) {
                    botDiv.innerHTML += escapeHTML(reply.charAt(i));
                    i++;
                    chatBox.scrollTop = chatBox.scrollHeight;
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
</script>



