<x-app-layout>
    <x-slot name="header">
        <h2 class="page-header">
            {{ __('Manage Customers') }}
        </h2>
    </x-slot>

    <div class="content-section">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3 class="section-title">Customer List</h3>

                    @if(session('success'))
                        <p class="success-message">{{ session('success') }}</p>
                    @endif

                    <table class="customer-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    <a href="{{ route('admin.customers.edit', $customer->id) }}" class="edit-button">Edit</a> |
                                    <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" class="inline-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="delete-button">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* General Layout */
        .content-section {
            padding: 40px 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .card-body {
            padding: 20px;
        }

        /* Page Title */
        .page-header {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        /* Section Title */
        .section-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Success Message */
        .success-message {
            color: green;
            font-weight: bold;
            margin-bottom: 15px;
        }

        /* Table Styling */
        .customer-table {
            width: 100%;
            border-collapse: collapse;
        }

        .customer-table th,
        .customer-table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .customer-table th {
            background: #f8f8f8;
        }

        /* Buttons */
        .edit-button, .delete-button {
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        .edit-button {
            color: white;
            background-color: #007bff;
        }

        .edit-button:hover {
            background-color: #0056b3;
        }

        .delete-button {
            color: white;
            background-color: #dc3545;
            border: none;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        /* Inline Form */
        .inline-form {
            display: inline;
        }
    </style>
</x-app-layout>
