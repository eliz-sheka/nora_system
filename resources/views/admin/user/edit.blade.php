@extends('admin.index', ['elementActive' => 'user'])

@section('content')
    <h4 class="fw-bold py-3 mb-4">Редагувати користувача</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.user.update', ['user' => $entity->getKey()]) }}">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Ім'я</label>
                            <input name="first_name" type="text" class="form-control" id="basic-default-fullname" value="{{ $entity->getAttribute('first_name') }}" />
                            @if ($errors->has('first_name'))
                                @foreach ($errors->get('first_name') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">По батькові</label>
                            <input name="middle_name" type="text" class="form-control" id="basic-default-fullname" value="{{ $entity->getAttribute('middle_name') }}" />
                            @if ($errors->has('middle_name'))
                                @foreach ($errors->get('middle_name') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Прізвище</label>
                            <input name="last_name" type="text" class="form-control" id="basic-default-fullname" value="{{ $entity->getAttribute('last_name') }}" />
                            @if ($errors->has('last_name'))
                                @foreach ($errors->get('last_name') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Email</label>
                            <input name="email" type="text" class="form-control" id="basic-default-fullname" value="{{ $entity->getAttribute('email') }}" />
                            @if ($errors->has('email'))
                                @foreach ($errors->get('email') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Номер телефону</label>
                            <input
                                name="phone"
                                type="text"
                                id="basic-default-phone"
                                class="form-control phone-mask"
                                required
                                value="{{ $entity->getAttribute('phone') }}"
                            />
                            @if ($errors->has('phone'))
                                @foreach ($errors->get('phone') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Стать</label>
                            <div class="col-md">
                                @foreach($sex as $value => $name)
                                    <div class="form-check form-check-inline mt-3">
                                        <input
                                            @if($entity->getAttribute('sex') === $value) checked @endif
                                            class="form-check-input"
                                            type="radio"
                                            name="sex"
                                            id="inlineRadio1"
                                            value="{{ $value }}"
                                        />
                                        <label class="form-check-label" for="inlineRadio1">{{ $name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @if ($errors->has('sex'))
                                @foreach ($errors->get('sex') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Дата народження</label>
                            <input name="birth_date" class="form-control" type="date" id="html5-date-input" value="{{ $entity->getAttribute('birth_date') }}" />

                            @if ($errors->has('birth_date'))
                                @foreach ($errors->get('birth_date') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Пароль</label>
                            <input name="password" type="password" class="form-control" min="6" id="basic-default-fullname" placeholder="" />

                            @if ($errors->has('password'))
                                @foreach ($errors->get('password') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Підтвердження паролю</label>
                            <input name="password_confirmation" type="password" class="form-control" id="basic-default-fullname" placeholder="" />

                            @if ($errors->has('password_confirmation'))
                                @foreach ($errors->get('password_confirmation') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Роль</label>
                            <select name="role" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" required>
                                <option>--- Обрати роль ---</option>
                                @foreach($roles as $role)
                                    <option @if ($role->getAttribute('slug') === $roleSlug) selected @endif value="{{ $role->getAttribute('slug') }}">
                                        {{ $role->getAttribute('name') }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('role'))
                                @foreach ($errors->get('role') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary">Зберегти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
