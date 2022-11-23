<!DOCTYPE html>
<html
    lang="en"
    class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forms - Admin One HTML - Bulma Admin Dashboard</title>

        <!-- Bulma is included -->
        <link rel="stylesheet" href="{{ URL::asset('admin/css/main.min.css') }}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito"
            rel="stylesheet"
            type="text/css">
    </head>
    <body>
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
                            One HTML</span>
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
                            <a href="tables.html" class="is-active has-icon">
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
                                    User Management
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
                <div class="card has-table">
                        <div class="tabs is-boxed mb-0">
                            <ul>
                                <li class="is-active">
                                    <a>
                                        <span class="icon is-small">
                                            <i class="mdi mdi-clock" aria-hidden="true"></i>
                                        </span>
                                        <span>Waiting</span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="icon is-small">
                                            <i class="mdi mdi-close-circle" aria-hidden="true"></i>
                                        </span>
                                        <span>Not Valid</span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="icon is-small">
                                            <i class="mdi mdi-check-circle" aria-hidden="true"></i>
                                        </span>
                                        <span>Valid</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <div class="card-content">
                        <div class="b-table has-pagination">
                            <div class="table-wrapper has-mobile-cards">
                                <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>City</th>
                                            <th>Progress</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Name">Rebecca Bauch</td>
                                            <td data-label="Company">Daugherty-Daniel</td>
                                            <td data-label="City">South Cory</td>
                                            <td data-label="Progress" class="is-progress-cell">
                                                <progress max="100" class="progress is-small is-primary" value="79">79</progress>
                                            </td>
                                            <td data-label="Created">
                                                <small class="has-text-grey is-abbr-like" title="Oct 25, 2020">Oct 25, 2020</small>
                                            </td>
                                            <td class="is-actions-cell">
                                                <div class="buttons is-right">
                                                    <button class="button is-small is-primary" type="button">
                                                        <span class="icon">
                                                            <i class="mdi mdi-eye"></i>
                                                        </span>
                                                    </button>
                                                    <button
                                                        class="button is-small is-danger jb-modal"
                                                        data-target="sample-modal"
                                                        type="button">
                                                        <span class="icon">
                                                            <i class="mdi mdi-trash-can"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Name">Felicita Yundt</td>
                                            <td data-label="Company">Johns-Weissnat</td>
                                            <td data-label="City">East Ariel</td>
                                            <td data-label="Progress" class="is-progress-cell">
                                                <progress max="100" class="progress is-small is-primary" value="67">67</progress>
                                            </td>
                                            <td data-label="Created">
                                                <small class="has-text-grey is-abbr-like" title="Jan 8, 2020">Jan 8, 2020</small>
                                            </td>
                                            <td class="is-actions-cell">
                                                <div class="buttons is-right">
                                                    <button class="button is-small is-primary" type="button">
                                                        <span class="icon">
                                                            <i class="mdi mdi-eye"></i>
                                                        </span>
                                                    </button>
                                                    <button
                                                        class="button is-small is-danger jb-modal"
                                                        data-target="sample-modal"
                                                        type="button">
                                                        <span class="icon">
                                                            <i class="mdi mdi-trash-can"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Name">Mr. Larry Satterfield V</td>
                                            <td data-label="Company">Hyatt Ltd</td>
                                            <td data-label="City">Windlerburgh</td>
                                            <td data-label="Progress" class="is-progress-cell">
                                                <progress max="100" class="progress is-small is-primary" value="16">16</progress>
                                            </td>
                                            <td data-label="Created">
                                                <small class="has-text-grey is-abbr-like" title="Dec 18, 2020">Dec 18, 2020</small>
                                            </td>
                                            <td class="is-actions-cell">
                                                <div class="buttons is-right">
                                                    <button class="button is-small is-primary" type="button">
                                                        <span class="icon">
                                                            <i class="mdi mdi-eye"></i>
                                                        </span>
                                                    </button>
                                                    <button
                                                        class="button is-small is-danger jb-modal"
                                                        data-target="sample-modal"
                                                        type="button">
                                                        <span class="icon">
                                                            <i class="mdi mdi-trash-can"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="notification">
                                <div class="level">
                                    <div class="level-left">
                                        <div class="level-item">
                                            <div class="buttons has-addons">
                                                <button type="button" class="button is-active">1</button>
                                                <button type="button" class="button">2</button>
                                                <button type="button" class="button">3</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="level-right">
                                        <div class="level-item">
                                            <small>Page 1 of 3</small>
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
        <script type="text/javascript" src="{{ URL::asset('admin/js/main.min.js') }}"></script>

        <!-- Icons below are for demo only. Feel free to use any icon pack. Docs:
        https://bulma.io/documentation/elements/icon/ -->
        <link
            rel="stylesheet"
            href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    </body>
</html>