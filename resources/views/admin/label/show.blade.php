@extends('admin.index', ['elementActive' => 'label'])

@section('content')
    <div class="col-md-6 col-lg-4 mb-3">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h5 class="card-title">{{ $entity->getAttribute('name') }}</h5>
                </div>

                <div>
                    <a href="{{ route('admin.label.edit', ['label' => $entity->getKey()]) }}" class="card-link">Редагувати</a>
                </div>
            </div>
            <div class="card-body">

{{--                <img--}}
{{--                    class="img-fluid d-flex mx-auto my-4"--}}
{{--                    src="../assets/img/elements/4.jpg"--}}
{{--                    alt="Card image cap"--}}
{{--                />--}}
{{--                @TODO add some visits statistic--}}
                <div class="float-end">
                    <form class="d-inline-block ml-2" method="POST" action="{{ route('admin.label.delete', ['label' => $entity->getKey()]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Видалити</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
