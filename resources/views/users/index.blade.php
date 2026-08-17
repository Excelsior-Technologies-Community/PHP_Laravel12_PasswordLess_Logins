<!DOCTYPE html>
<html>

<head>
    <title>Admin - Users</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .08);
        }

        h1 {
            margin-top: 0;
        }

        .top {
            display: flex;
            gap: 10px;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        input,
        select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button,
        .btn {
            padding: 9px 14px;
            border: 0;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .search {
            background: #007bff;
            color: white;
        }

        .success {
            background: #28a745;
            color: white;
        }

        .danger {
            background: #dc3545;
            color: white;
        }

        .secondary {
            background: #6c757d;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f8f9fa;
        }

        .badge {
            padding: 5px 9px;
            border-radius: 15px;
            font-size: 12px;
        }

        .active {
            background: #d4edda;
            color: #155724;
        }

        .inactive {
            background: #f8d7da;
            color: #721c24;
        }

        .admin {
            background: #cce5ff;
            color: #004085;
        }

        .alert {
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            background: #d4edda;
            color: #155724;
        }

        .pagination {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="top">
            <h1>User Management</h1>

            <a href="{{ route('admin.dashboard') }}"
                class="btn secondary">
                Dashboard
            </a>
        </div>

        @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="GET" class="top">

            <div>
                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Search name or email">

                <select name="status">
                    <option value="">All Users</option>
                    <option value="active"
                        {{ $status === 'active' ? 'selected' : '' }}>
                        Active
                    </option>
                    <option value="inactive"
                        {{ $status === 'inactive' ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>

                <button class="btn search">
                    Search
                </button>

                <a href="{{ route('admin.users') }}"
                    class="btn secondary">
                    Reset
                </a>
            </div>

        </form>

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($users as $user)

                <tr>

                    <td>{{ $user->id }}</td>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>
                        @if($user->is_admin)
                        <span class="badge admin">
                            Admin
                        </span>
                        @else
                        User
                        @endif
                    </td>

                    <td>
                        @if($user->is_active)
                        <span class="badge active">
                            Active
                        </span>
                        @else
                        <span class="badge inactive">
                            Inactive
                        </span>
                        @endif
                    </td>

                    <td>
                        {{ $user->created_at->format('d M Y') }}
                    </td>

                    <td>

                        @if($user->id !== auth()->id())

                        <form
                            method="POST"
                            action="{{ route('admin.users.toggle', $user) }}"
                            style="display:inline">
                            @csrf
                            @method('PATCH')

                            <button
                                class="btn {{ $user->is_active ? 'danger' : 'success' }}">
                                {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>

                        <form
                            method="POST"
                            action="{{ route('admin.users.destroy', $user) }}"
                            style="display:inline"
                            onsubmit="return confirm('Delete this user?')">
                            @csrf
                            @method('DELETE')

                            <button class="btn danger">
                                Delete
                            </button>
                        </form>

                        @else

                        <span>Current User</span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="7">
                        No users found.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

        <div class="pagination">
            {{ $users->links() }}
        </div>

    </div>

</body>

</html>