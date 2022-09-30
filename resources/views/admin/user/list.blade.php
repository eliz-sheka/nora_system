@extends('admin.index')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="m-0">Список користувачів</h5>
            <a href="{{ route('admin.user.create') }}" class="btn rounded-pill btn-primary">Додати користувача</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th>ПІБ</th>
                    <th>Email</th>
                    <th>Номер телефону</th>
                    <th>Роль</th>
                </tr>
                </thead>
                <tbody>
                @foreach($entities as $entity)
                    <tr>
                        <td>{{ $entity->getAttribute('full_name') }}</td>
                        <td>{{ $entity->getAttribute('email') }}</td>
                        <td>{{ $entity->getAttribute('phone') }}</td>
                        <td>{{ $entity->getAttribute('role') }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('admin.user.edit') }}"
                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                    >
                                    <a class="dropdown-item" href="javascript:void(0);"
                                    ><i class="bx bx-trash me-1"></i> Delete</a
                                    >
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
