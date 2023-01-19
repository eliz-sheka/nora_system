@extends('admin.index', ['elementActive' => 'visit'])

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="m-0">Список візитів</h5>
            <a href="{{ route('admin.visit.create') }}" class="btn rounded-pill btn-primary">Додати візит</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-borderless table-hover">
                <thead>
                <tr>
                    <th>Фігурка</th>
                    <th>Кількість людей</th>
                    <th>Час початку</th>
                    <th>Дата</th>
                    <th>Дії</th>
                </tr>
                </thead>
                <tbody>
                @forelse($entities as $entity)
                    <tr>

                        <td>
                            @if($entity->getAttribute('note'))
                                <i class="bi bi-card-text"></i>
                            @endif
                            {{ $entity->getAttribute('label')?->name ?? $entity->label_name }}
                        </td>
                        <td>{{ $entity->visitors_amount }}</td>
                        <td>{{ $entity->getAttribute('formatted_start_time') }}</td>
                        <td>{{ $entity->formatDateTime($entity->getAttribute('start_time'), 'd-m-Y') }}</td>
                        <td>
                            <a href="{{ route('admin.visit.show', ['visit' => $entity->getKey()]) }}">
                                <i class="bi bi-eye fs-3"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center">Ще немає візитів</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
