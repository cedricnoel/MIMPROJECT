<?php $count_taches = \App\Travail::where('agence_id', $agence->id)->get()->count(); ?>
<div class="row mt row-info">
    <div class="col-md-3 col-sm-2 box0">
        <div class="box1">
            <span class="li_key"></span>
            <h3>{{$count_taches}} tâches(s)</h3>
        </div>
        <p>{{$count_taches}} tâches(s) pour vos projets</p>
    </div>
    <div class="col-md-3 col-sm-2 box0">
        <div class="box1">
            <span class="li_news"></span>
            <h3>{{$messages->count()}} message(s)</h3>
        </div>
        <p>Vous avez {{$messages->count()}} message(s) dans votre agence</p>
    </div>
    <div class="col-md-3 col-sm-2 box0">
        <div class="box1">
            <span class="li_banknote"></span>
            <h3>{{$bankable}} €</h3>
        </div>
        <p>Vous avez récolté {{$bankable}} euros</p>
    </div>
    <div class="col-md-3 col-sm-2 box0">
        <div class="box1">
            <span class="li_data"></span>
            <h3>{{$projets->count()}} projet(s)</h3>
        </div>
        <p>Vous avez {{$projets->count()}} projet(s) en cours</p>
    </div>

</div><!-- /row mt -->