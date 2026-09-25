<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 40px;
        }

        .container {
            width: 90%;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
        }

        .add-button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .edit {
            color: green;
        }

        .view {
            color: blue;
        }

        .delete {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 8px;
            border-radius: 4px;
            cursor: pointer;
        }

        .no-task {
            text-align: center;
            color: gray;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Personal Task Manager</h1>

    <a class="add-button" href="{{ route('tasks.create') }}">
        + Add New Task
    </a>

    @if ($tasks->count() > 0)

        <table>

            <tr>
                <th>Task Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>

            @foreach ($tasks as $task)

            <tr>
                <td>{{ $task->task_name }}</td>

                <td>{{ $task->description }}</td>

                <td>{{ $task->status }}</td>

                <td>{{ $task->due_date }}</td>

                <td>

                    <a class="view"
                       href="{{ route('tasks.show', $task->id) }}">
                        View
                    </a>

                    |

                    <a class="edit"
                       href="{{ route('tasks.edit', $task->id) }}">
                        Edit
                    </a>

                    <form action="{{ route('tasks.destroy', $task->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button class="delete" type="submit">
                            Delete
                        </button>

                    </form>

                </td>
            </tr>

            @endforeach

        </table>

    @else

        <p class="no-task">No tasks yet.</p>

    @endif

</div>

</body>
</html>