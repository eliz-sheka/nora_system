@extends('admin.index', ['elementActive' => 'discount'])

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="m-0">Список знижок</h5>
            <div class="d-flex align-items-center">
                <div class="me-5">
                    <select id="defaultSelect" class="form-select">
                        <option @if(request()->get('filter') === \App\Models\Discount::FILTER_ACTIVE || !request()->get('filter') ) selected
                                @endif value="{{ \App\Models\Discount::FILTER_ACTIVE }}">Активні
                        </option>
                        <option @if(request()->get('filter') === \App\Models\Discount::FILTER_INACTIVE) selected
                                @endif value="{{ \App\Models\Discount::FILTER_INACTIVE }}">Неактивні
                        </option>
                        <option @if(request()->get('filter') === \App\Models\Discount::FILTER_DELETED) selected
                                @endif value="{{ \App\Models\Discount::FILTER_DELETED }}">Видалені
                        </option>
                        <option @if(request()->get('filter') === \App\Models\Discount::FILTER_ALL) selected
                                @endif value="{{ \App\Models\Discount::FILTER_ALL }}">Всі
                        </option>
                    </select>
                </div>
                <a href="{{ route('admin.discount.create') }}" class="btn rounded-pill btn-primary">Додати знижку</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th>Назва</th>
                    <th>Сума</th>
                    <th>Кількість</th>
                    <th>Активна з</th>
                    <th>Активна до</th>
                </tr>
                </thead>
                <tbody>
                @forelse($entities as $entity)
                    <tr @if($entity->getAttribute('deleted_at') || $entity->getAttribute('active_till') < now()) class="table-secondary" @endif>
                        <td>
                            <a href="{{ route('admin.discount.show', ['discount' => $entity->getKey()]) }}">{{ $entity->getAttribute('name') }}</a>
                        </td>
                        <td>{{ $entity->getAttribute('amount').' '.$entity->getAttribute('unit') }}</td>
                        <td>{{ $entity->getAttribute('quantity') }}</td>
                        <td>{{ $entity->formatDate($entity->getAttribute('active_from'))}}</td>
                        @php
                            $color = $entity->getAttribute('active_till') > now() ? 'success' : 'secondary';
                        @endphp
                        <td><span
                                class="badge bg-label-{{$color}}">{{ $entity->formatDate($entity->getAttribute('active_till')) }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="5">Ще немає знижок</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
