@extends('admin.index', ['elementActive' => 'discount'])

@section('content')
    <h4 class="fw-bold py-3 mb-4">Додати знижку</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.discount.save') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Назва</label>
                            <input name="name" type="text" class="form-control" id="basic-default-fullname" value="{{ old('name') }}" required/>
                            @if ($errors->has('name'))
                                @foreach ($errors->get('name') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Опис</label>
                            <input name="description" type="text" class="form-control" id="basic-default-fullname" value="{{ old('description') }}" />
                            @if ($errors->has('description'))
                                @foreach ($errors->get('description') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Сума</label>
                            <input name="amount" type="text" class="form-control" id="basic-default-fullname" value="{{ old('amount') }}" required/>
                            @if ($errors->has('amount'))
                                @foreach ($errors->get('amount') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Одиниця</label>
                            <select name="unit" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" required>
                                <option>--- Обрати одиницю ---</option>
                                @foreach($units as $unit)
                                    <option @if(old('unit') === $unit) selected @endif value="{{ $unit }}">{{ $unit }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('unit'))
                                @foreach ($errors->get('unit') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Кількість</label>
                            <input name="quantity" type="number" min="0" class="form-control" id="basic-default-fullname" value="{{ old('quantity') }}" />
                            @if ($errors->has('quantity'))
                                @foreach ($errors->get('quantity') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Активна з:</label>
                            <input name="active_from" class="form-control" type="date" id="html5-date-input" value="{{ old('active_from') }}" />

                            @if ($errors->has('active_from'))
                                @foreach ($errors->get('active_from') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Активна до:</label>
                            <input name="active_till" class="form-control" type="date" id="html5-date-input" value="{{ old('active_till') }}" />

                            @if ($errors->has('active_till'))
                                @foreach ($errors->get('active_till') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>

{{--                        <div class="mb-3">--}}
{{--                            <label for="exampleFormControlSelect1" class="form-label">Користувачі</label>--}}
{{--                            <select name="user" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">--}}
{{--                                <option>--- Обрати користувача ---</option>--}}
{{--                                @foreach($users as $user)--}}
{{--                                    <option @if(old('user') === $user->getKey()) selected @endif value="{{ $user->getKey() }}">{{ $user->getAttribute('full_name')." {$user->getAttribute('phone')}" }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}

{{--                            @if ($errors->has('user'))--}}
{{--                                @foreach ($errors->get('user') as $error)--}}
{{--                                    <div class="form-text text-danger">{{ $error }}</div>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        </div>--}}

                        <div class="float-end">
                            <button type="submit" class="btn btn-primary">Зберегти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
