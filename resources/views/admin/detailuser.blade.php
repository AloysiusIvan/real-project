<!DOCTYPE html>
<html
    lang="en"
    class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Visit Techno</title>

        <!-- Bulma is included -->
        <link rel="stylesheet" href="{{ URL::asset('adminsrc/css/main.min.css') }}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito"
            rel="stylesheet"
            type="text/css">
    </head>
    <style>
        .tabs li.is-active a {
            border-bottom-color: #2c598d;
            color: #2c598d;
        }
        #primarytechno {
            background-color: #2c598d;
        }
    </style>
    <body>
        @include('sweetalert::alert')
        <div id="app">
            <nav id="navbar-main" class="navbar is-fixed-top">
                <div class="navbar-brand">
                    <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
                        <span class="icon">
                            <i class="mdi mdi-forwardburger mdi-24px"></i>
                        </span>
                    </a>
                </div>
                <div class="navbar-brand is-right">
                    <a
                        class="navbar-item is-hidden-desktop jb-navbar-menu-toggle"
                        data-target="navbar-menu">
                        <span class="icon">
                            <i class="mdi mdi-dots-vertical"></i>
                        </span>
                    </a>
                </div>
                <div class="navbar-menu fadeIn animated faster" id="navbar-menu">
                    <div class="navbar-end">
                        <a title="Log out" class="navbar-item is-desktop-icon-only">
                            <span class="icon">
                                <i class="mdi mdi-logout"></i>
                            </span>
                            <span>Log out</span>
                        </a>
                    </div>
                </div>
            </nav>
            <aside class="aside is-placed-left is-expanded">
                <div class="aside-tools">
                    <div class="aside-tools-label">
                        <span>
                            <b>Admin</b>
                            Visit Techno</span>
                    </div>
                </div>
                <div class="menu is-menu-main">
                    <ul class="menu-list">
                        <li>
                            <a href="index.html" class="has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-desktop-mac"></i>
                                </span>
                                <span class="menu-item-label">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-list">
                        <li>
                            <a href="{{route('cmsuser')}}" class="is-active has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-account-circle"></i>
                                </span>
                                <span class="menu-item-label">User Management</span>
                            </a>
                        </li>
                        <li>
                            <a href="forms.html" class="has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-square-edit-outline"></i>
                                </span>
                                <span class="menu-item-label">Room Management</span>
                            </a>
                        </li>
                        <li>
                            <a href="profile.html" class="has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-account-circle"></i>
                                </span>
                                <span class="menu-item-label">History</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-icon has-dropdown-icon">
                                <span class="icon">
                                    <i class="mdi mdi-view-list"></i>
                                </span>
                                <span class="menu-item-label">Submenus</span>
                                <div class="dropdown-icon">
                                    <span class="icon">
                                        <i class="mdi mdi-plus"></i>
                                    </span>
                                </div>
                            </a>
                            <ul>
                                <li>
                                    <a href="#void">
                                        <span>Sub-item One</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#void">
                                        <span>Sub-item Two</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="menu-list">
                        <li>
                            <a
                                href="https://github.com/vikdiesel/admin-one-bulma-dashboard"
                                target="_blank"
                                class="has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-github-circle"></i>
                                </span>
                                <span class="menu-item-label">GitHub</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="https://justboil.me/bulma-admin-template/free-html-dashboard/"
                                class="has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-help-circle"></i>
                                </span>
                                <span class="menu-item-label">About</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            <section class="section is-title-bar">
                <div class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <ul>
                                <li>Admin</li>
                                <li>User Management</li>
                                <li>Detail User</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="hero is-hero-bar">
                <div class="hero-body">
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <h1 class="title">
                                    Detail User
                                </h1>
                            </div>
                        </div>
                        <div class="level-right" style="display: none;">
                            <div class="level-item"></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section is-main-section">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            <span class="icon">
                                <i class="mdi mdi-ballot"></i>
                            </span>
                            Forms
                        </p>
                        <a href="{{route('cmsuser')}}" class="card-header-icon">
                            <span class="icon">
                                <i class="mdi mdi-close-box"></i>
                            </span>
                        </a>
                    </header>
                    <div class="card-content">
                        <form method="get">
                            @foreach ($userdata as $item)
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">NIK</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input class="input" type="text" value="{{$item->nik}}" disabled="disabled">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Nama</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input class="input" type="text" value="{{$item->name}}" disabled="disabled">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Email</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input class="input" type="text" value="{{$item->email}}" disabled="disabled">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">No. Handphone</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input class="input" type="text" value="{{$item->phone}}" disabled="disabled">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Profesi</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input class="input" type="text" value="{{$item->profesi}}" disabled="disabled">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Institusi</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input
                                                    class="input"
                                                    type="text"
                                                    value="{{$item->institusi}}"
                                                    disabled="disabled">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Nama Institusi</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input
                                                    class="input"
                                                    type="text"
                                                    value="{{$item->nama_institusi}}"
                                                    disabled="disabled">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Alamat</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input class="input" type="text" value="{{$item->alamat}}" disabled="disabled">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Keahlian</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input
                                                    class="input"
                                                    type="text"
                                                    value="{{$item->keahlian}}"
                                                    disabled="disabled">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">KTP</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input class="input" type="text" value="{{$item->ktp}}" disabled="disabled">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </form>
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <!-- Left empty for spacing -->
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="field is-grouped">
                                        <div class="control">
                                            <a href="{{route('validate',$item->id)}}">
                                                <button id="primarytechno" type="submit" class="button is-primary">
                                                    <span>Validate</span>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="control">
                                            <button type="button" class="button is-danger">
                                                <span>Reject</span>
                                            </button>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                © 2022, Visit techno Project
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <div id="sample-modal" class="modal">
                <div class="modal-background jb-modal-close"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Confirm action</p>
                        <button class="delete jb-modal-close" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <p>This will permanently delete
                            <b>Some Object</b>
                        </p>
                        <p>This is sample modal</p>
                    </section>
                    <footer class="modal-card-foot">
                        <button class="button jb-modal-close">Cancel</button>
                        <button class="button is-danger jb-modal-close">Delete</button>
                    </footer>
                </div>
                <button class="modal-close is-large jb-modal-close" aria-label="close"></button>
            </div>
        </div>

        <!-- Scripts below are for demo only -->
        <script
            type="text/javascript"
            src="{{ URL::asset('adminsrc/js/main.min.js') }}"></script>

        <!-- Icons below are for demo only. Feel free to use any icon pack. Docs:
        https://bulma.io/documentation/elements/icon/ -->
        <link
            rel="stylesheet"
            href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    </body>
</html>