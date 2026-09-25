<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>

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

        label {
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
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

    <h1>Edit Task</h1>

    @if ($errors->any())
    <div style="color: red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">

        @csrf
        @method('PUT')

        <label>Task Name:</label>
        <input type="text" name="task_name"
               value="{{ $task->task_name }}" required>

        <br><br>

        <label>Description:</label>
        <textarea name="description">{{ $task->description }}</textarea>

        <br><br>

        <label>Status:</label>
        <select name="status">

            <option value="Pending"
                {{ $task->status == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Completed"
                {{ $task->status == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>

        </select>

        <br><br>

        <label>Due Date:</label>
        <input type="date" name="due_date"
               value="{{ $task->due_date }}">

        <br><br>

        <button type="submit">Update Task</button>

    </form>

    <a class="back" href="{{ route('tasks.index') }}">
        ← Back to Tasks
    </a>

</div>

</body>
</html>