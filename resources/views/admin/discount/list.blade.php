@extends('admin.index', ['elementActive' => 'discount'])

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="m-0">Список знижок</h5>
            <div class="d-flex align-items-center">
                <div class="me-5">
                    <select id="defaultSelect" class="form-select">
                        @php
                            $active = \App\Enums\Filters::ACTIVE->value;
                            $inactive = \App\Enums\Filters::INACTIVE->value;
                            $deleted = \App\Enums\Filters::DELETED->value;
                            $all = \App\Enums\Filters::ALL->value;

                        @endphp
                        <option @if(request()->get('filter') === $active || !request()->get('filter') ) selected
                                @endif value="{{ $active }}"> {{ \App\Enums\Filters::getNameByValue($active) }}
                        </option>
                        <option @if(request()->get('filter') === $inactive) selected
                                @endif value="{{ $inactive }}"> {{ \App\Enums\Filters::getNameByValue($inactive) }}
                        </option>
                        <option @if(request()->get('filter') === $deleted) selected
                                @endif value="{{ $deleted }}"> {{ \App\Enums\Filters::getNameByValue($deleted) }}
                        </option>
                        <option @if(request()->get('filter') === $all) selected
                                @endif value="{{ $all }}"> {{ \App\Enums\Filters::getNameByValue($all) }}
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
