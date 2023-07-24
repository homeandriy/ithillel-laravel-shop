<?php
/**
 * @var \App\Models\User[] $users
 */

?>
<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="d-flex justify-content-between pt-4">
                <h5 class="card-header">Товари</h5>
                <div class="px-2">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-dark">Додати користувача</a>
                </div>
            </div>
            @if( 0 === $users->total() )
                <h2>Немає користувачів</h2>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $user->id }}</strong></td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}">
                                        <strong>{{$user->name}}</strong>
                                    </a>
                                <td>
                                    {{ $user->surname }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->phone }}
                                </td>
                                <td>
                                    <span class="badge bg-label-primary me-1">
                                        {{ $user->roles()->implode('name', ',') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a class="btn btn-success" href="{{ route('admin.users.edit', $user)  }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <form action="{{ route('admin.users.destroy', $user)  }}" method="POST" >
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-primary" ><i class="bx bx-trash me-1"></i> Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="table-border-bottom-0">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="pagination">
                        {{ $users->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
