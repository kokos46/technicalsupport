<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Active tasks</title>
    @vite(['resources/js/app.js'])
</head>
<body>
<div class="container my-4">
    <div class="row mb-3 align-items-center">
        <div class="col-md-3">
            <label for="filter" class="form-label fw-bold">Filter tasks:</label>
            <select id="filter" class="form-select">
                <option value="all" selected>All</option>
                <option value="active">Active</option>
                <option value="notActive">Not active</option>
                <option value="viewed">Viewed</option>
                <option value="notViewed">Not viewed</option>
            </select>
        </div>
    </div>

    <div id="taskContainer" class="row gy-4">
        @foreach($tasks->reverse() as $task)
            <div class="col-12">
                <div class="card managerTask
                    {{ $task->completed ? 'notActive' : 'active' }}
                    {{ $task->viewed ? 'viewed' : 'notViewed' }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $task->username }}</h6>
                        <p class="card-text">{{ $task->task }}</p>
                        <p class="text-muted mb-1"><small>Created at: {{ $task->created_at }}</small></p>

                        @if($task->completed)
                            <span class="badge bg-dark">Closed</span>
                        @else
                            <span class="badge bg-success">Active</span>
                        @endif

                        @if(!$task->completed)
                            <a href="/task/{{$task->id}}" class="btn btn-primary btn-sm ms-2">Open</a>
                        @endif

                        @if($task->manager != null)
                            <p class="mt-2 mb-0"><small>Taken by: <strong>{{ $task->manager }}</strong></small></p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Bootstrap JS Bundle with Popper (optional, for dropdowns etc) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('filter').addEventListener('change', function() {
        var value = this.value;
        var tasks = document.querySelectorAll('.managerTask');

        tasks.forEach(function(task) {
            task.closest('.col-12').style.display = 'block'; // Показываем весь столбец

            if (value === 'active' && task.classList.contains('notActive')) {
                task.closest('.col-12').style.display = 'none';
            }
            else if (value === 'notActive' && task.classList.contains('active')) {
                task.closest('.col-12').style.display = 'none';
            }
            else if (value === 'viewed' && !task.classList.contains('viewed')) {
                task.closest('.col-12').style.display = 'none';
            }
            else if (value === 'notViewed' && task.classList.contains('viewed')) {
                task.closest('.col-12').style.display = 'none';
            }
        });
    });
</script>
</body>
</html>
