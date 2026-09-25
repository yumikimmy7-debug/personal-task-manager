<!DOCTYPE html>
<html>
<head>
    <title>Add New Task</title>

    <style>
        * {
            box-sizing: border-box;
        }

      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 40px 20px;
    color: #4d3b5c;
    background-color: #f5efff;

    background-image:
        radial-gradient(circle at 10% 20%, rgba(190, 160, 230, 0.18) 0 35px, transparent 36px),
        radial-gradient(circle at 90% 15%, rgba(190, 160, 230, 0.18) 0 30px, transparent 31px),
        radial-gradient(circle at 15% 85%, rgba(190, 160, 230, 0.16) 0 40px, transparent 41px),
        radial-gradient(circle at 85% 80%, rgba(190, 160, 230, 0.16) 0 35px, transparent 36px);

    background-attachment: fixed;
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
            top: 120px;
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
            width: 520px;
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
        }

        .subtitle {
            text-align: center;
            color: #927ca3;
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #684b82;
            margin-bottom: 7px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #d5c4e9;
            border-radius: 10px;
            background-color: #fbf9ff;
            color: #4d3b5c;
            font-size: 14px;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #ae91d0;
            box-shadow: 0 0 6px rgba(174, 145, 208, 0.35);
        }

        textarea {
            height: 110px;
            resize: vertical;
        }

        .save-button {
            width: 100%;
            padding: 13px;
            background-color: #b69bd8;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .save-button:hover {
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

        .back:hover {
            color: #5f437b;
        }

        .error-box {
            background-color: #f5e7f5;
            border: 1px solid #d8b8d5;
            color: #8a4f7d;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="flower flower1">🪻</div>
    <div class="flower flower2">🌸</div>
    <div class="flower flower3">🪻</div>
    <div class="flower flower4">🌸</div>

    <div class="container">

        <h1>🪻 Add New Task</h1>

        <p class="subtitle">
            Create a new task and stay organized
        </p>

        @if ($errors->any())
            <div class="error-box">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST">

            @csrf

            <label>Task Name:</label>
            <input
                type="text"
                name="task_name"
                placeholder="Enter task name"
                required
            >

            <label>Description:</label>
            <textarea
                name="description"
                placeholder="Enter task description"
            ></textarea>

            <label>Status:</label>
            <select name="status">
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
            </select>

            <label>Due Date:</label>
            <input type="date" name="due_date">

            <button class="save-button" type="submit">
                🪻 Save Task
            </button>

        </form>

        <a class="back" href="{{ route('tasks.index') }}">
            ← Back to Tasks
        </a>

    </div>

</body>
</html>