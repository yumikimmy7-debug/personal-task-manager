<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #4b3b5a;
            background-color: #f5efff;

            background-image:
                radial-gradient(circle at 10% 20%, rgba(190, 160, 230, 0.18) 0 35px, transparent 36px),
                radial-gradient(circle at 90% 15%, rgba(190, 160, 230, 0.18) 0 30px, transparent 31px),
                radial-gradient(circle at 15% 85%, rgba(190, 160, 230, 0.16) 0 40px, transparent 41px),
                radial-gradient(circle at 85% 80%, rgba(190, 160, 230, 0.16) 0 35px, transparent 36px);
            background-attachment: fixed;
        }

        .header {
            background-color: #c9b2e8;
            color: white;
            padding: 25px 40px;
            box-shadow: 0 3px 10px rgba(100, 70, 140, 0.18);
        }

        .header h1 {
            margin: 0;
            font-size: 30px;
        }

        .header p {
            margin: 6px 0 0;
            font-size: 15px;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .top h2 {
            margin: 0;
            color: #60447a;
        }

        .add-button {
            background-color: #b99ddd;
            color: white;
            padding: 12px 18px;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(110, 80, 150, 0.2);
        }

        .add-button:hover {
            background-color: #a889d1;
        }

        .table-box {
            background-color: rgba(255, 252, 255, 0.95);
            padding: 20px;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(100, 70, 140, 0.15);
            overflow-x: auto;
            border: 2px solid #e2d5f2;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #b99ddd;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #e6dcf2;
        }

        tr:hover {
            background-color: #f8f2ff;
        }

        .status {
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
        }

        .pending {
            background-color: #eee2ff;
            color: #76519b;
        }

        .completed {
            background-color: #dff3e5;
            color: #347348;
        }

        .view {
            color: #8062a6;
            text-decoration: none;
            margin-right: 8px;
            font-weight: bold;
        }

        .edit {
            color: #6c9b76;
            text-decoration: none;
            margin-right: 8px;
            font-weight: bold;
        }

        .delete {
            background-color: #c987b8;
            color: white;
            border: none;
            padding: 7px 11px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
        }

        .delete:hover {
            background-color: #b66fa3;
        }

        .no-task {
            text-align: center;
            padding: 40px;
            color: #8b779c;
        }

        .no-task h3 {
            color: #60447a;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #8b779c;
            font-size: 14px;
        }

        .flower {
            position: fixed;
            font-size: 45px;
            opacity: 0.35;
            z-index: -1;
        }

        .flower1 {
            top: 130px;
            left: 25px;
        }

        .flower2 {
            top: 300px;
            right: 30px;
        }

        .flower3 {
            bottom: 80px;
            left: 40px;
        }

        .flower4 {
            bottom: 40px;
            right: 50px;
        }

        @media (max-width: 700px) {
            .container {
                width: 95%;
            }

            .top {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .header {
                padding: 20px;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
</head>

<body>

    <div class="flower flower1">🌸</div>
    <div class="flower flower2">🪻</div>
    <div class="flower flower3">🌸</div>
    <div class="flower flower4">🪻</div>

    <div class="header">
        <h1>🪻 Personal Task Manager</h1>
        <p>Organize your tasks and stay productive</p>
    </div>

    <div class="container">

        <div class="top">
            <h2>🪻 My Tasks</h2>

            <a class="add-button" href="{{ route('tasks.create') }}">
                🪻 + Add New Task
            </a>
        </div>

        <div class="table-box">

            @if ($tasks->count() > 0)

                <table>

                    <tr>
                        <th>ID</th>
                        <th>Task Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>

                    @foreach ($tasks as $task)

                    <tr>

                        <!-- Task ID -->
                        <td>
                            {{ $task->id }}
                        </td>

                        <td>
                            <strong>{{ $task->task_name }}</strong>
                        </td>

                        <td>
                            {{ $task->description }}
                        </td>

                        <td>

                            @if ($task->status == 'Completed')

                                <span class="status completed">
                                    ✓ Completed
                                </span>

                            @else

                                <span class="status pending">
                                    ⏳ Pending
                                </span>

                            @endif

                        </td>

                        <td>
                            📅 {{ $task->due_date }}
                        </td>

                        <td>

                            <a class="view"
                               href="{{ route('tasks.show', $task->id) }}">
                                👁 View
                            </a>

                            <a class="edit"
                               href="{{ route('tasks.edit', $task->id) }}">
                                ✏ Edit
                            </a>

                            <form action="{{ route('tasks.destroy', $task->id) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button class="delete" type="submit">
                                    🗑 Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </table>

            @else

                <div class="no-task">
                    <h3>🪻 No Tasks Yet</h3>
                    <p>Click "Add New Task" to create your first task.</p>
                </div>

            @endif

        </div>

        <div class="footer">
            Personal Task Manager • Stay organized and productive 🪻
        </div>

    </div>

</body>
</html>