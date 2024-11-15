@php
$d_class = 'd-none';
$alert = '';
$message = '';
$notification_type = null;
$icon = '';

@endphp

@isset ($message)

    @switch($notification_type)
        @case(1)
            $alert = 'alert-success';
            $icon = 'bi-check-circle-fill';
            $message = 'Informações salvas com sucesso!';
            @break;
        @case(2)
            $alert = 'alert-warning';
            $icon = 'bi-exclamation-triangle-fill';
            $message = 'Alguns erros aconteceram durante este processo.';
            @break;
        @case(3)
            $alert = 'alert-danger';
            $icon = 'bi-exclamation-triangle-fill';
            $message = 'Ocorreu um erro ao salvar as informações.';
            @break;
    @endswitch

    @isset($notification_message)
        $message = $this->notification_msg;
    @endisset

    @isset($notification_show)

        @if($notification_show)
            $d_class = '';
        @else
            $d_class = 'd-none';
        @endif

    @endisset
@endisset

<div id='alert' class="{{ $d_class }} alert {{ $alert }} d-flex align-items-center alert-dismissible fade show" role="alert">
    <i id='alert_bi' class="bi {{$icon}} flex-shrink-0 me-2" style="font-size: 1.5em;"></i>
    <div id='message'>
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
