<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Task Manager - Debug Challenge</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            background: white;
            padding: 30px;
            border-radius: 15px 15px 0 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            color: #333;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .header p {
            color: #666;
            font-size: 14px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .stat-card {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
        }

        .stat-number {
            font-size: 28px;
            font-weight: bold;
            color: #667eea;
        }

        .stat-label {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }

        .task-input-section {
            background: white;
            padding: 25px 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .input-group {
            display: flex;
            gap: 10px;
        }

        #taskInput {
            flex: 1;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        #taskInput:focus {
            outline: none;
            border-color: #667eea;
        }

        /* BUG #1: Class selector salah - seharusnya .btn-add */
        .add-btn {
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .add-btn:hover {
            transform: translateY(-2px);
        }

        .filter-section {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .filter-btn {
            padding: 8px 20px;
            background: #f0f0f0;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 13px;
            transition: all 0.3s;
        }

        .filter-btn:hover {
            background: #e0e0e0;
        }

        .filter-btn.active {
            background: #667eea;
            color: white;
        }

        .task-list-section {
            background: white;
            padding: 20px 30px 30px 30px;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            min-height: 300px;
        }

        .task-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
            margin-bottom: 10px;
            transition: all 0.3s;
        }

        .task-item:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .task-checkbox {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .task-text {
            flex: 1;
            font-size: 15px;
            color: #333;
        }

        .task-item.completed .task-text {
            text-decoration: line-through;
            color: #999;
        }

        .task-actions {
            display: flex;
            gap: 10px;
        }

        .btn-edit,
        .btn-delete {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-edit {
            background: #ffc107;
            color: white;
        }

        .btn-edit:hover {
            background: #e0a800;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background: #c82333;
        }

        .empty-state {
            text-align: center;
            padding: 50px 20px;
            color: #999;
        }

        .empty-state-icon {
            font-size: 64px;
            margin-bottom: 15px;
        }

        .empty-state h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .empty-state p {
            font-size: 14px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 15px;
            max-width: 400px;
            width: 90%;
        }

        .modal-content h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .modal-content input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .modal-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .btn-cancel,
        .btn-save {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-cancel {
            background: #e0e0e0;
            color: #333;
        }

        .btn-save {
            background: #667eea;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>📝 My Task Manager</h1>
            <p>Kelola tugas harian Anda dengan mudah</p>
            
            <div class="stats">
                <div class="stat-card">
                    <div class="stat-number" id="totalTasks">0</div>
                    <div class="stat-label">Total Tugas</div>
                </div>
                <div class="stat-card">
                    <!-- BUG #2: ID salah - seharusnya completedTasks -->
                    <div class="stat-number" id="completedTask">0</div>
                    <div class="stat-label">Selesai</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="pendingTasks">0</div>
                    <div class="stat-label">Belum Selesai</div>
                </div>
            </div>
        </div>

        <!-- Input Section -->
        <div class="task-input-section">
            <div class="input-group">
                <!-- BUG #3: ID berbeda dengan JavaScript -->
                <input type="text" id="newTaskInput" placeholder="Tambahkan tugas baru..." />
                <button class="btn-add" id="addTaskBtn">➕ Tambah</button>
            </div>

            <div class="filter-section">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="pending">Belum Selesai</button>
                <button class="filter-btn" data-filter="completed">Selesai</button>
            </div>
        </div>

        <!-- Task List -->
        <div class="task-list-section">
            <div id="taskList">
                <div class="empty-state">
                    <div class="empty-state-icon">📋</div>
                    <h3>Belum ada tugas</h3>
                    <p>Tambahkan tugas pertama Anda!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <h2>Edit Tugas</h2>
            <input type="text" id="editTaskInput" placeholder="Edit tugas..." />
            <div class="modal-buttons">
                <button class="btn-cancel" id="cancelEditBtn">Batal</button>
                <button class="btn-save" id="saveEditBtn">Simpan</button>
            </div>
        </div>
    </div>

    <script>
        // Data tugas
        let tasks = [];
        let currentFilter = 'all';
        let editingTaskId = null;

        // DOM Elements
        const taskInput = document.getElementById('taskInput');
        const addTaskBtn = document.getElementById('addTaskBtn');
        const taskList = document.getElementById('taskList');
        const filterBtns = document.querySelectorAll('.filter-btn');
        const editModal = document.getElementById('editModal');
        const editTaskInput = document.getElementById('editTaskInput');
        const saveEditBtn = document.getElementById('saveEditBtn');
        const cancelEditBtn = document.getElementById('cancelEditBtn');

        // Stats elements
        const totalTasksEl = document.getElementById('totalTasks');
        const completedTasksEl = document.getElementById('completedTasks');
        const pendingTasksEl = document.getElementById('pendingTasks');

        // BUG #4: Event listener salah - seharusnya 'click' bukan 'onclick'
        addTaskBtn.addEventListener('onclick', addTask);

        // Enter key untuk tambah tugas
        taskInput.addEventListener('keypress', function(e) {
            // BUG #5: Kondisi salah - seharusnya e.key === 'Enter'
            if (e.keyCode = 13) {
                addTask();
            }
        });

        // Filter buttons
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentFilter = this.dataset.filter;
                renderTasks();
            });
        });

        // Modal controls
        cancelEditBtn.addEventListener('click', closeEditModal);
        saveEditBtn.addEventListener('click', saveEdit);

        // Functions
        function addTask() {
            const taskText = taskInput.value.trim();
            
            // BUG #6: Kondisi salah - seharusnya taskText === ''
            if (taskText = '') {
                alert('Mohon isi tugas terlebih dahulu!');
                return;
            }

            const task = {
                id: Date.now(),
                text: taskText,
                completed: false,
                createdAt: new Date().toISOString()
            };

            tasks.push(task);
            taskInput.value = '';
            renderTasks();
            updateStats();
        }

        function deleteTask(id) {
            // BUG #7: confirm message typo
            if (confirm('Apakah Anda yakin ingin menghapus tugas in?')) {
                tasks = tasks.filter(task => task.id !== id);
                renderTasks();
                updateStats();
            }
        }

        function toggleTask(id) {
            const task = tasks.find(t => t.id === id);
            if (task) {
                task.completed = !task.completed;
                renderTasks();
                updateStats();
            }
        }

        function openEditModal(id) {
            const task = tasks.find(t => t.id === id);
            if (task) {
                editingTaskId = id;
                editTaskInput.value = task.text;
                editModal.classList.add('show');
            }
        }

        function closeEditModal() {
            editModal.classList.remove('show');
            editingTaskId = null;
            editTaskInput.value = '';
        }

        function saveEdit() {
            const newText = editTaskInput.value.trim();
            
            if (newText === '') {
                alert('Tugas tidak boleh kosong!');
                return;
            }

            const task = tasks.find(t => t.id === editingTaskId);
            if (task) {
                task.text = newText;
                renderTasks();
                closeEditModal();
            }
        }

        function renderTasks() {
            // Filter tasks
            let filteredTasks = tasks;
            
            if (currentFilter === 'completed') {
                filteredTasks = tasks.filter(t => t.completed);
            } else if (currentFilter === 'pending') {
                filteredTasks = tasks.filter(t => !t.completed);
            }

            // Empty state
            if (filteredTasks.length === 0) {
                taskList.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-state-icon">📋</div>
                        <h3>Tidak ada tugas</h3>
                        <p>${currentFilter === 'all' ? 'Tambahkan tugas pertama Anda!' : 'Tidak ada tugas di kategori ini'}</p>
                    </div>
                `;
                return;
            }

            // Render tasks
            taskList.innerHTML = filteredTasks.map(task => `
                <div class="task-item ${task.completed ? 'completed' : ''}">
                    <input 
                        type="checkbox" 
                        class="task-checkbox" 
                        ${task.completed ? 'checked' : ''}
                        onchange="toggleTask(${task.id})"
                    />
                    <div class="task-text">${task.text}</div>
                    <div class="task-actions">
                        <button class="btn-edit" onclick="openEditModal(${task.id})">✏️ Edit</button>
                        <button class="btn-delete" onclick="deleteTask(${task.id})">🗑️ Hapus</button>
                    </div>
                </div>
            `).join('');
        }

        function updateStats() {
            const total = tasks.length;
            // BUG #8: Variable salah - seharusnya completed bukan complete
            const complete = tasks.filter(t => t.completed).length;
            const pending = total - complete;

            totalTasksEl.textContent = total;
            completedTasksEl.textContent = complete;
            pendingTasksEl.textContent = pending;
        }

        // Initial render
        renderTasks();
        updateStats();
    </script>
</body>
</html>
