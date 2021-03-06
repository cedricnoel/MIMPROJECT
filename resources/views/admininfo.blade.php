<div class="row mtbox">
    <div class="col-md-3 col-sm-2 box0">
        <div class="box1">
            <span class="li_data"></span>
            <h3>{{$nb_projet}} projet(s)</h3>
        </div>
        <p>{{$nb_projet}} projet(s) sont en cours dans l'association</p>
    </div>
    <div class="col-md-3 col-sm-2 box0">
        <div class="box1">
            <span class="li_diamond" style="color:lightblue"></span>
            <h3>{{$total_tres}} €</h3>
        </div>
        <p>{{$total_tres}} € dans la trésorerie</p>
    </div>
    <div class="col-md-3 col-sm-2 box0">
        <div class="box1">
            <span class="li_banknote"></span>
            <h3>{{$encaisse}} €</h3>
        </div>
        <p>{{$encaisse}} € ont été encaissé par l'association</p>
    </div>
    <div class="col-md-3 col-sm-2 box0">
        <div class="box1">
            <span class="li_shop" style="color:lightblue"></span>
            <h3>{{$facturable}} €</h3>
        </div>
        <p>{{$facturable}} € de projets facturables</p>
    </div>

</div><!-- /row mt -->
@include('tresorerie.add')