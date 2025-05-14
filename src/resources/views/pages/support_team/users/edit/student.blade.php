@php
    use App\Repositories\MyClassRepo;
    use App\Repositories\UserRepo;

    $sr = $user->student_record;
    $my_classes = (new MyClassRepo())->all();
    $parents = (new UserRepo())->getUserByType('parent');

@endphp


<div class="form-group row mb-3">
    <label class="col-lg-3 col-form-label font-weight-semibold">Группа</label>
    <div class="col-lg-9">
        <select onchange="getClassSections(this.value)" name="my_class_id" required id="my_class_id" class="form-control select-search" data-placeholder="Выбрать">
            <option value=""></option>
            @foreach($my_classes as $c)
                <option {{ $sr?->my_class_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row mb-3">
    <label class="col-lg-3 col-form-label font-weight-semibold">Родитель</label>
    <div class="col-lg-9">
        <select data-placeholder="Выбрать"  name="my_parent_id" id="my_parent_id" class="select-search form-control">
            <option  value=""></option>
            @foreach($parents as $p)
                <option {{ ($sr?->my_parent_id == $p->id) ? 'selected' : '' }} value="{{ $p->id }}">{{ $p->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row mb-3">
    <label class="col-lg-3 col-form-label font-weight-semibold">Дата зачисления</label>
    <div class="col-lg-9">
        <select name="year_admitted" data-placeholder="Выбрать" id="year_admitted" class="select-search form-control">
            <option value=""></option>
            @for($y=date('Y', strtotime('- 10 years')); $y<=date('Y'); $y++)
                <option {{ ($sr?->year_admitted == $y) ? 'selected' : '' }} value="{{ $y }}">{{ $y }}</option>
            @endfor
        </select>
    </div>
</div>