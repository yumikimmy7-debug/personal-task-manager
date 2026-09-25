<!DOCTYPE html>
<html>
<head>
    <title>View Task</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 50px 20px;
            color: #4d3b5c;
            background-color: #f4edff;

            background-image:
                radial-gradient(circle at 10% 15%, rgba(185, 157, 221, 0.25) 0 35px, transparent 36px),
                radial-gradient(circle at 90% 20%, rgba(185, 157, 221, 0.22) 0 40px, transparent 41px),
                radial-gradient(circle at 15% 85%, rgba(185, 157, 221, 0.22) 0 45px, transparent 46px),
                radial-gradient(circle at 85% 85%, rgba(185, 157, 221, 0.22) 0 35px, transparent 36px);
        }

        .flower {
            position: fixed;
            font-size: 55px;
            opacity: 0.35;
            z-index: 0;
        }

        .flower1 {
            top: 30px;
            left: 25px;
        }

        .flower2 {
            top: 100px;
            right: 25px;
        }

        .flower3 {
            bottom: 40px;
            left: 30px;
        }

        .flower4 {
            bottom: 50px;
            right: 40px;
        }

        .container {
            position: relative;
            z-index: 1;
            width: 550px;
            max-width: 100%;
            margin: auto;
            background-color: rgba(255, 252, 255, 0.97);
            padding: 35px;
            border-radius: 22px;
            border: 2px solid #dfd0f0;
            box-shadow: 0 8px 25px rgba(100, 70, 140, 0.18);
        }

        h1 {
            text-align: center;
            color: #684b82;
            margin-top: 0;
            margin-bottom: 30px;
        }

        .task-info {
            background-color: #f8f3ff;
            padding: 16px;
            margin-bottom: 15px;
            border-radius: 12px;
            border-left: 5px solid #b69bd8;
        }

        .label {
            display: block;
            font-weight: bold;
            color: #684b82;
            margin-bottom: 6px;
        }

        .value {
            color: #5f506b;
        }

        .status {
            display: inline-block;
            padding: 7px 15px;
            border-radius: 20px;
            font-weight: bold;
        }

        .pending {
            background-color: #eee3ff;
            color: #76519b;
        }

        .completed {
            background-color: #ddf2e2;
            color: #347348;
        }

        .edit-button {
            display: block;
            text-align: center;
            background-color: #b69bd8;
            color: white;
            padding: 13px;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            margin-top: 25px;
        }

        .edit-button:hover {
            background-color: #9f80c7;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #8062a6;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="flower flower1">🪻</div>
    <div class="flower flower2">🌸</div>
    <div class="flower flower3">🪻</div>
    <div class="flower flower4">🌸</div>

    <div class="container">

        <h1>🪻 Task Details</h1>

        <div class="task-info">
            <span class="label">Task Name</span>
            <span class="value">{{ $task->task_name }}</span>
        </div>

        <div class="task-info">
            <span class="label">Description</span>
            <span class="value">{{ $task->description }}</span>
        </div>

        <div class="task-info">
            <span class="label">Status</span>

            @if ($task->status == 'Completed')
                <span class="status completed">
                    ✓ Completed
                </span>
            @else
                <span class="status pending">
                    ⏳ Pending
                </span>
            @endif
        </div>

        <div class="task-info">
            <span class="label">Due Date</span>
            <span class="value">
                📅 {{ $task->due_date }}
            </span>
        </div>

        <a class="edit-button"
           href="{{ route('tasks.edit', $task->id) }}">
            ✏ Edit Task
        </a>

        <a class="back"
           href="{{ route('tasks.index') }}">
            ← Back to Tasks
        </a>

    </div>

</body>
</html>