@php
    $notifs = App\Notifications::get();
    $users = App\User::get();
    $names = [];
    foreach ($users as $user) { $names[$user->id] = $user->name; }
@endphp

<li id="header_inbox_bar" class="dropdown">
    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
        <i class="fa fa-envelope-o"></i>
        <span class="badge bg-theme">
            @if (count($notifs) != 0)
                new
            @else
                0
            @endif
        </span>
    </a>
    <ul class="dropdown-menu extended inbox">
        <div class="notify-arrow notify-arrow-green"></div>
        <li>
            @if (count($notifs) != 0)
                <p class="green">Vous avez de nouvelles notifications</p>
            @else
                <p class="green">Vous n'avez pas de nouvelles notifications</p>
            @endif
        </li>
        <li>
            <!-- Pour chaque notifications -->
            @foreach ($notifs as $notif)
                <!-- On verifie que les noifications sont destinées à l'utilisateur ou son équipe -->
                @if ($notif->type == 'team' && $notif->to == Auth::user()->agence_id)
                    <a href="{{ url('show/notif' . $notif->id) }}">
                        <span class="photo"><img alt="avatar" src="{{ asset('img/ui-zac.jpg') }}"></span>
                        <span class="subject">
                        <span class="from">{{ $names[$notif->sender] }}</span>
                        <span class="time">{{ $notif->created_at }}</span>
                        </span>
                        <span class="message">
                            {{ $notif->message }}
                        </span>
                    </a>
                <!-- On verifie que les notifications sont destinées personnellement à l'utilsateur -->
                @elseif($notif->type == 'personal' && $notif->to == Auth::user()->id)
                    <a href="{{ url('show/notif' . $notif->id) }}">
                        <span class="photo"><img alt="avatar" src="{{ asset('img/ui-zac.jpg') }}"></span>
                        <span class="subject">
                        <span class="from">{{ $names[$notif->sender] }}</span>
                        <span class="time">{{ $notif->created_at }}</span>
                        </span>
                        <span class="message">
                            {{ $notif->message }}
                        </span>
                    </a>
                <!-- On verifie si les notifications sont pour tout le monde -->
                @elseif($notif->type == 'global')
                    <a href="{{ url('show/notif' . $notif->id) }}">
                        <span class="photo"><img alt="avatar" src="{{ asset('img/ui-zac.jpg') }}"></span>
                        <span class="subject">
                        <span class="from">{{ $names[$notif->sender] }}</span>
                        <span class="time">{{ $notif->created_at }}</span>
                        </span>
                        <span class="message">
                            {{ $notif->message }}
                        </span>
                    </a>
                @endif
            @endforeach
        </li>
        @if (count($notifs) != 0)
            <li>
                <a href="{{ route('show.notif.all') }}">See all messages</a>
            </li>
        @endif
    </ul>
</li>