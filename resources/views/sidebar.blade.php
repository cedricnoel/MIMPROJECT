<?php
$agence_id = \Illuminate\Support\Facades\Auth::user()->agence_id;
$agence = \App\Agence::findOrFail($agence_id);
$agence->load('file', 'users');
$messages = \App\Message::where('agence_id', $agence_id)->get();
?>
        <!--  RIGHT SIDEBAR CONTENT -->
<div class="col-lg-3 ds">
    <!--COMPLETED ACTIONS DONUTS CHART-->
    <h3>NOTIFICATIONS</h3>
    <!-- First Action -->
    <div class="desc">
        <div class="thumb">
            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
        </div>
        <div class="details">
            <p>
                <muted>2 Minutes Ago</muted>
                <br/>
                <a href="#">James Brown</a> subscribed to your newsletter.<br/>
            </p>
        </div>
    </div>
    <!-- USERS ONLINE SECTION -->
    <h3>TEAM MEMBERS</h3>
    @foreach($agence->users as $user)
        <?php
        $statut = \App\Poste::findOrFail($user->poste_id);
        ?>
        <div class="desc">
            <div class="thumb">
                @if($user->avatar == 0)
                    <img class="img-circle" src="{{ asset('avatars/user.png') }}" width="35px" height="35px"
                         align="">
                @else
                    <img src="{{ asset('avatars/'.$user->id.'.'.$user->extension) }}" class="img-circle" width="35px"
                         height="35px">
                @endif
            </div>
            <div class="details">
                <p><a href="{{ route('profile', $user->id) }}">{{ $user->name }}</a><br/>
                    <muted>{{$statut['nom']}}</muted>
                </p>
            </div>
        </div>
    @endforeach
    <h3>MESSAGES DE VOTRE AGENCE</h3>
    @if($messages->isEmpty())
        <p class="alert alert-error">
            Aucun message de publié dans votre agence.
        </p>
    @else
        @foreach($messages as $message)
            <div class="desc">
                <div class="details">
                    <div class="thumb">
                        @if($user->avatar == 0)
                            <img class="img-circle" src="{{ asset('avatars/user.png') }}" width="35px" height="35px"
                                 align="">
                        @else
                            <img src="{{ asset('avatars/'.$user->id.'.'.$user->extension) }}" class="img-circle"
                                 width="35px" height="35px">
                        @endif
                    </div>
                    {{$message->titre}}
                </div>
            </div>
        @endforeach
    @endif
</div><!-- /col-lg-3 -->