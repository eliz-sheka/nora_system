@extends('admin.index', ['elementActive' => 'visit'])

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="m-0">Список візитів</h5>
            <a href="{{ route('admin.visit.create') }}" class="btn rounded-pill btn-primary">Додати візит</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th>Фігурка</th>
                    <th>Кількість людей</th>
                    <th>Час початку</th>
                    <th>Дата</th>
                </tr>
                </thead>
                <tbody>
                @forelse($entities as $entity)
                    <tr>
                        <td>
                            @if($entity->getAttribute('note'))
                                <i class="bi bi-card-text"></i>
                            @endif
{{--                            <a href="{{ route('admin.visit.show', ['visit' => $entity->getKey()]) }}">--}}
                                {{ $entity->getAttribute('label')->name }}
{{--                            </a>--}}
                        </td>
                        <td>{{ $entity->visitors_amount }}</td>
                        <td>{{ $entity->getAttribute('formatted_start_time') }}</td>
                        <td>{{ $entity->formatDateTime($entity->getAttribute('start_time'), 'd-m-Y') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center">Ще немає візитів</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
