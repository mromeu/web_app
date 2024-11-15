@php
    $items = array(
            array(
                'title' => 'Home',
                'link'  => '/admin/home/',
                'items' => array()
            ),
            array(
                'title' => 'Prospect',
                'link'  => '/admin/prospect/',
                'items' => array()
           ),
            array(
                'title' => 'Common Settings',
                'link'  => '/admin/commons/',
                'items' => array()
           ),
           array(
               'title' => 'Usuário',
               'link'  => 'dropdown',
               'items' => array(
                   array(
                        'title' => 'Usuário',
                        'link'  => '/admin/users/',
                        'items' => array()),
                    array(
                        'title' => 'Cargo',
                        'link'  => '/admin/cargo/',
                        'items' => array()),
                    array(
                        'title' => 'Setor',
                        'link'  => '/admin/setor/',
                        'items' => array()),
                    array(
                        'title' => 'Perfil',
                        'link'  => '/admin/perfil/',
                        'items' => array()),
                    array(
                        'title' => 'Permissão',
                        'link'  => '/admin/permissao/',
                        'items' => array())                        
               )
          )
        );
@endphp

<div class="container">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light border-bottom border-success">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo_navbar.png') }}" width="28" height="28" class="d-inline-block align-text-top">
                <!--Sul Vistos-->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    //if($this->user_acess_status == 200) {
                        foreach($items as $menuItem){
                            if($menuItem['link'] != 'dropdown'){
                                echo '<li class="nav-item"><a class="nav-link" href="'. $menuItem['link'] .'">'. $menuItem['title'] .'</a></li>';
                            } else {
                                echo '<li class="nav-item dropdown">';
                                echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">' . $menuItem['title'] . '</a>';
                                echo '<ul class="dropdown-menu">';
                                foreach($menuItem['items'] as $dropItem){
                                    echo '<li>';
                                    echo $dropItem['link'] == '' ? '': '<a class="dropdown-item" href="'. $dropItem['link'] .'">';
                                    echo $dropItem['title'];
                                    echo $dropItem['link'] == '' ? '': '</a>';
                                    echo '</li>';
                                }
                                echo '</ul></li>';
                            }
                        }
                    //}
                    ?>
                </ul>
                <ul class="navbar-nav justify-content-end mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Olá, {{ Auth::user()->name }} </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('user.edit', Auth::user()->id) }}">Conta</a></li>
                                <li><a class="dropdown-item" href="#">Configurações</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="bi bi-box-arrow-left" style="color: #FF2D20"></i> Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-success btn-sm" href="{{ route('login') }}" tabindex="-1" role="button" >Fazer login</a>
                        </li>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>
</div>

