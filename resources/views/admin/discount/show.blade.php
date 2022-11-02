@extends('admin.index', ['elementActive' => 'discount'])

@section('content')
    <div class="col-md-6 col-lg-4 mb-3">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h5 class="card-title">{{ $entity->getAttribute('name') }}</h5>
                </div>

                <div>
                    <a href="{{ route('admin.discount.edit', ['discount' => $entity->getKey()]) }}" class="card-link">Редагувати</a>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Опис: </b> {{ $entity->getAttribute('description') ?? '-' }}</p>
                <p class="card-text"><b>Сума: </b> {{ $entity->getAttribute('amount').' '.$entity->getAttribute('unit') }}</p>
                <p class="card-text"><b>Кількість: </b> {{ $entity->getAttribute('quantity') ?? '-' }}</p>
                <p class="card-text"><b>Активна з: </b> {{ $entity->formatDate($entity->getAttribute('active_from')) }}</p>
                <p class="card-text"><b>Активна до: </b> {{ $entity->formatDate($entity->getAttribute('active_till')) }}</p>
                <div class="float-end">
                    <form class="d-inline-block ml-2" method="POST" action="{{ route('admin.discount.delete', ['discount' => $entity->getKey()]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Видалити</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
