@extends('layout')

@section('content')

{{-- {{$item}} --}}

{{-- {{$discItem}} --}}


{{-- {{$selectusersForScore}} --}}

{{-- {{$selectusersForScore}} --}}



{{--  --}}
<div class="container">
    <h1>Поставьте оценку</h1>
<form method="POST" action="{{url('addFinalStepScore')}}">
    @csrf

    <div class="mb-3">
        <p>Выберите группу</p>
        <select class="form-select" aria-label="Default select example" name="id_grname" id="id_grname">
            <option value="{{$selectGroupForScore[0]->id_grname}}">{{$selectGroupForScore[0]->group_name}}</option>
        </select>
        <p>выберите студента</p>
        <select class="form-select" aria-label="Default select example" name="id_user" id="id_user">
            @foreach ($selectusersForScore as $itemUs)
            {{-- <p>{{$itemUs}}</p> --}}
            @foreach ($itemUs->userForGroupUs as $usitem)
             <option value="{{$usitem->id}}"> {{$usitem->name}} {{$usitem->f_name}} {{$usitem->t_name}} {{$usitem->l_name}}</option>
            @endforeach
          @endforeach

        </select>

        <p>оценка</p>
        <select class="form-select" aria-label="Default select example" name="id_octype" id="id_octype">
            @foreach ($ocenkaForScore as $octypeItem)
                <option value="{{$octypeItem->id_octype}}">{{$octypeItem->octype}}</option>
            @endforeach
        </select>


        <p>Дисциплинна</p>
        <select class="form-select" aria-label="Default select example" name="id_discipl" id="id_discipl">
            <option value="{{$selectdiscForScore[0]->id_discipl}}">{{$selectdiscForScore[0]->discipl_name}}</option>
        </select>



        {{-- <p>тип евента</p>
        <select class="form-select" aria-label="Default select example" name="id_grname" id="id_grname">
            @foreach ($evtypeForScore as $evtypeItem)
            <option value="">  {{$evtypeItem->evtype}}</option>
        @endforeach

        </select> --}}
        <br>


        <p>эвент</p>
        <select class="form-select" aria-label="Default select example" name="id_event" id="id_event">

            @foreach ($eventForScore as $itemEvent)
            <option value="{{$itemEvent->id_event}}"> {{$itemEvent->theme_ev}}</option>
        @endforeach
        </select>
        <br>

        <div class="dates">
            <label>Дата оценки</label>
            {{-- <input type="text" autocomplete="off" id='date_pick' class="form-control datePick" placeholder="yyyy-mm-dd"/> --}}
            <p>выберите дату: <input type="text" name="datee_score" id="datepicker"></p>
            <br>

        </div>
        <br>
      <button type="submit" class="btn btn-primary">Добавить</button>
    </form>

</div>
<script src="{{ asset('js/sidebar/main.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script>
    $(".dates #datepicker").datepicker({
        'autoclose': true,
        'dateFormat': 'yy-mm-dd'
    });
</script>
@endsection
