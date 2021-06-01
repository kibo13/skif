@extends('layouts.master')
<!-- rest-index -->
@section('content')
<section id="rest-index" class="section">
  <h2 class="mb-3">
    Остаток материалов
  </h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-secondary" href="{{ route('movements.index') }}">
      Накладные
    </a>
  </div>
  
  <div class="bk-rests-table">
    <table
      id="rest-table"
      class="bk-table table table-bordered table-hover table-responsive">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col" style="min-width: 200px;">Наименование</th>
          <th scope="col" style="min-width: 100px;">Цвет</th>
          <th scope="col" class="w-25">Ед.изм</th>
          <th scope="col" class="w-25">Приход</th>
          <th scope="col" class="w-25">Расход</th>
          <th scope="col" class="w-25">Остаток</th>
        </tr>
      </thead>
      <tbody>
        @foreach($mats as $key => $mat)
        <tr>
          <td>{{ $key+=1 }}</td>
          <td>
            {{ $mat->material }}
            @if($mat->L != null || $mat->B != null || $mat->H != null)
            <span class="bk-small">
              {{ $mat->L . 'x' . $mat->B . 'x' . $mat->H}}
            </span>
            @endif 
          </td>
          <td>
            @if($mat->image != null)
            <img 
              class="bk-rests-color"
              src="{{asset('images/' . $mat->image)}}" 
              alt ="{{ $mat->color }}"
              title="{{ $mat->color }}" >
            @else 
            -
            @endif 
          </td>
          <td>{{ $mat->measure }}</td>
          <td>
            <span class="text-success font-weight-bold">
              {{ $mat->income }}
            </span>
          </td>
          <td>
            <span class="text-danger font-weight-bold">
            @if($mat->outcome == null)
            0
            @else 
            {{ $mat->outcome }}
            @endif 
            </span>
          </td>
          <td>
            <span 
              @if(lightRest($mat->income, $mat->outcome) > 50)
              class="text-success font-weight-bold"
              @elseif(lightRest($mat->income, $mat->outcome) > 30)
              class="text-warning font-weight-bold"
              @elseif(lightRest($mat->income, $mat->outcome) > 10)
              class="text-danger font-weight-bold"
              @endif
            >
              @if($mat->rest == null)
              {{ $mat->income }}
              @else 
              {{ $mat->rest }}
              @endif 
            </span>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
@endsection
