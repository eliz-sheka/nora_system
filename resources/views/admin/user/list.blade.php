@extends('admin.index', ['elementActive' => 'user'])

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
                        <td><a href="{{ route('admin.user.show', ['user' => $entity->getKey()]) }}">{{ $entity->getAttribute('full_name') }}</a></td>
                        <td>{{ $entity->getAttribute('email') }}</td>
                        <td>{{ $entity->getAttribute('phone') }}</td>
                        <td>{{ $entity->getAttribute('roles')[0]->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if ($entities->hasPages())
                <div class="mx-3 p-1 border-top">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-end">
                            <li class="page-item first @if ($entities->currentPage() === 1) disabled @endif">
                                <a class="page-link" href="{{ route('admin.user.list', ['page' => 1]) }}"
                                ><i class="tf-icon bx bx-chevrons-left"></i
                                    ></a>
                            </li>
                            <li class="page-item prev @if ($entities->currentPage() === 1) disabled @endif">
                                <a class="page-link" href="{{ $entities->previousPageUrl() }}"
                                ><i class="tf-icon bx bx-chevron-left"></i
                                    ></a>
                            </li>
                            <li class="page-item">
                                <a class="page-link">{{ $entities->currentPage() }}</a>
                            </li>
                            <li class="page-item next @if ($entities->currentPage() === $entities->lastPage()) disabled @endif">
                                <a class="page-link" href="{{ $entities->nextPageUrl() }}"
                                ><i class="tf-icon bx bx-chevron-right"></i
                                    ></a>
                            </li>
                            <li class="page-item last @if ($entities->currentPage() === $entities->lastPage()) disabled @endif">
                                <a class="page-link" href="{{ route('admin.user.list', ['page' => $entities->lastPage()]) }}"
                                ><i class="tf-icon bx bx-chevrons-right"></i
                                    ></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </div>
@endsection
