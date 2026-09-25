<!DOCTYPE html>
<html>
<head>
    <title>View Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 40px;
        }

        .container {
            width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
        }

        .task-info {
            margin-bottom: 15px;
        }

        .label {
            font-weight: bold;
        }

        .edit-button {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .back {
            display: inline-block;
            margin-top: 15px;
            color: #007bff;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Task Details</h1>

    <div class="task-info">
        <span class="label">Task Name:</span>
        {{ $task->task_name }}
    </div>

    <div class="task-info">
        <span class="label">Description:</span>
        {{ $task->description }}
    </div>

    <div class="task-info">
        <span class="label">Status:</span>
        {{ $task->status }}
    </div>

    <div class="task-info">
        <span class="label">Due Date:</span>
        {{ $task->due_date }}
    </div>

    <br>

    <a class="edit-button"
       href="{{ route('tasks.edit', $task->id) }}">
        Edit Task
    </a>

    <br>

    <a class="back"
       href="{{ route('tasks.index') }}">
        ← Back to Tasks
    </a>

</div>

</body>
</html>