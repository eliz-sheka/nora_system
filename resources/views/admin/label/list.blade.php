@extends('admin.index', ['elementActive' => 'label'])

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="m-0">Список лейблів</h5>
            <a href="{{ route('admin.label.create') }}" class="btn rounded-pill btn-primary">Додати лейбл</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th>Назва</th>
                </tr>
                </thead>
                <tbody>
                @forelse($entities as $entity)
                    <tr>
                        <td><a href="{{ route('admin.label.show', ['label' => $entity->getKey()]) }}">{{ $entity->getAttribute('name') }}</a></td>
                    </tr>
                @empty
                    <tr><td class="text-center">Ще немає лейблів</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
