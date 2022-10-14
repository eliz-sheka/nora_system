@extends('admin.index', ['elementActive' => 'user'])

@section('content')
    <div class="col-md-6 col-lg-4 mb-3">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h5 class="card-title">{{ $entity->getAttribute('full_name') }}</h5>
                    <h6 class="card-subtitle text-muted">{{ $entity->getAttribute('role_name') }}</h6>
                </div>

                <div>
                    <a href="{{ route('admin.user.edit', ['user' => $entity->getKey()]) }}" class="card-link">Редагувати</a>
                </div>
            </div>
            <div class="card-body">

{{--                <img--}}
{{--                    class="img-fluid d-flex mx-auto my-4"--}}
{{--                    src="../assets/img/elements/4.jpg"--}}
{{--                    alt="Card image cap"--}}
{{--                />--}}
                <p class="card-text"><b>Email: </b> {{ $entity->getAttribute('email') ?? '-' }}</p>
                <p class="card-text"><b>Номер телефону: </b> {{ $entity->getAttribute('phone') ?? '-' }}</p>
                <p class="card-text"><b>Дата народження: </b> {{ $entity->getAttribute('birth_date') ?? '-' }}</p>
                <p class="card-text"><b>Стать: </b> {{ $entity->getAttribute('sex_name') ?? '-' }}</p>
                <div class="float-end">
                    <form class="d-inline-block ml-2" method="POST" action="{{ route('admin.user.delete', ['user' => $entity->getKey()]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Видалити</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
