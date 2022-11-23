@extends('admin.index', ['elementActive' => 'visit'])

@section('content')
    <h4 class="fw-bold py-3 mb-4">Додати візит</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.visit.save') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Фігурка</label>
                            <select name="label" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" required>
                                <option>--- Обрати фігурку ---</option>
                                @foreach($labels as $label)
                                    <option @if(old('label') === $label->getKey()) selected @endif value="{{ $label->getKey() }}">{{ $label->getAttribute('name') }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('label'))
                                @foreach ($errors->get('label') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Кількість відвідувачів</label>
                            <input name="visitors_number" type="number" min="1" max="50" class="form-control" id="basic-default-fullname" value="{{ old('visitors_number') ?? 1 }}" required/>
                            @if ($errors->has('visitors_number'))
                                @foreach ($errors->get('visitors_number') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Знижка</label>
                            <select name="discount" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" required>
                                <option>--- Обрати знижку ---</option>
                                @foreach($discounts as $discount)
                                    <option @if(old('discount') === $discount->getKey()) selected @endif value="{{ $discount->getKey() }}">{{ $discount->getAttribute('name') }}</option>
                                @endforeach
                            </select>
                            <div class="form-text">Знижка застосується для усіх відвідувачів, вказаних у цьому візиті</div>

                            @if ($errors->has('discount'))
                                @foreach ($errors->get('discount') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Нотатка</label>
                            <input name="note" type="text" class="form-control" id="basic-default-fullname" value="{{ old('note') }}" />
                            @if ($errors->has('note'))
                                @foreach ($errors->get('note') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>

                        <div class="mt-5">
                            <small>Поля для створення вже завершених візитів</small>
                            <hr>
                        </div>

                        <div class="mb-3">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Час початку</label>
                            <input name="start_time" class="form-control" type="datetime-local" id="html5-date-input" value="{{ old('start_time') }}" />

                            @if ($errors->has('start_time'))
                                @foreach ($errors->get('start_time') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Час закінчення</label>
                            <input name="end_time" class="form-control" type="datetime-local" id="html5-date-input" value="{{ old('end_time') }}" />

                            @if ($errors->has('end_time'))
                                @foreach ($errors->get('end_time') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>

                        <div class="mb-3">
                            <div class="form-check mt-3">
                                <input class="form-check-input" name="is_paid" type="checkbox" value="1" id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1"> Оплачено </label>
                            </div>

                            @if ($errors->has('is_paid'))
                                @foreach ($errors->get('is_paid') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>


                        <div class="mb-3">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Сплачена сума</label>
                            <input name="paid_amount" type="number" min="1" max="5000" class="form-control" id="basic-default-fullname" value="{{ old('paid_amount') }}"/>

                            @if ($errors->has('paid_amount'))
                                @foreach ($errors->get('paid_amount') as $error)
                                    <div class="form-text text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Метод оплати</label>
                            <select name="payment_type" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option>--- Обрати метод оплати ---</option>
                                @foreach($paymentMethods as $key => $paymentMethod)
                                    <option @if(old('payment_method') === $key) selected @endif value="{{ $key }}">{{ $paymentMethod }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('payment_method'))
                                @foreach ($errors->get('payment_method') as $error)
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
