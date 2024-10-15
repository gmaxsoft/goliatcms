<?php
$userinfo = $session->userinfo;
$level = $userinfo['user_level'];
$user_id = $userinfo['user_id'];
?>
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="module/dashboard/">Start</a></li>
                <li class="breadcrumb-item"><a href="module/adminusers/">Ustawienia</a></li>
                <li class="breadcrumb-item active"><a href="module/adminusers/">Zarządzanie Użytkownikami</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid container-fixed-lg">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="card card-transparent ">
                <ul class="nav nav-tabs nav-tabs-fillup hidden-sm-down" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#tab-one" class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-one" aria-expanded="true"><span>Lista</span></a>
                    </li>
                    <?php if ($level == 1 || $level == 2 || $level == 7) : ?>
                        <li class="nav-item" role="presentation">
                            <a href="#tab-two" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-two" aria-expanded="false"><span>Dodaj</span></a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-expanded="true">
                        <div class="row column-seperation">
                            <div class="page_content">

                                <div class="message">
                                    <div class="alert alert-info animate-show-hide" role="alert"></div>
                                </div>

                                <div id="toolbar">
                                    <button id="remove" class="btn btn-danger" disabled>
                                        <i class="fa fa-trash"></i> Usuń
                                    </button>
                                </div>

                                <table id="datatable" class="table-striped" data-page-list="[10, 25, 50, 100, all]" data-show-refresh="true" data-sticky-header="true" data-filter-control="true" data-show-search-clear-button="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="action">Akcja</th>
                                            <th data-field="lp">Lp</th>
                                            <th data-field="user_id">Id</th>
                                            <th data-field="first_name" data-filter-control="input">Imię</th>
                                            <th data-field="last_name" data-filter-control="input">Nazwisko</th>
                                            <th data-field="email" data-filter-control="input">E-mail</th>
                                            <th data-field="phone" data-filter-control="input">Telefon</th>
                                            <th data-field="stand_name" data-filter-control="input">Stanowisko</th>
                                            <th data-field="symbol" data-filter-control="input">Symbol</th>
                                            <th data-field="department" data-filter-control="select">Oddział</th>
                                            <th data-field="user_level" data-filter-control="select">Uprawnienia</th>
                                        </tr>
                                    </thead>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-expanded="false">

                        <div class="page_content">

                            <div class="message">
                                <div class="alert alert-info animate-show-hide" role="alert"></div>
                            </div>

                            <form method="POST" id="form_block" name="form_block" style="width:100%;">
                                <div class="row">
                                    <div class="title-box">Dane użytkownika</div>

                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="first_name">Imię</label>
                                            <input type="text" autocomplete="off" class="form-control" id="first_name" name="first_name" placeholder="Wpisz imię użytkownika" required autofocus tabindex="1" />
                                        </div>
                                        <div class="form-group">
                                            <label for="first_name">Stanowisko</label>
                                            <input type="text" autocomplete="off" class="form-control" id="stand_name" name="stand_name" placeholder="Wpisz stanowisko" tabindex="3" />
                                        </div>
                                        <div class="form-group">
                                            <label for="first_name">Telefon</label>
                                            <input type="text" autocomplete="off" class="form-control" id="phone" name="phone" placeholder="Wpisz telefon" tabindex="5" />
                                        </div>
                                        <div class="light-bg">
                                            <div class="form-group">
                                                <label for="fileupload">Wgraj zdjęcie</label>
                                                <input type="file" id="fileupload" name="fileupload" class="form-control" accept="image/*" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="last_name">Nazwisko</label>
                                            <input type="text" autocomplete="off" class="form-control" id="last_name" name="last_name" placeholder="Wpisz nazwisko użytkownika" required tabindex="2" />
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Symbol / Skrót</label>
                                            <input type="text" autocomplete="off" class="form-control" id="symbol" name="symbol" placeholder="Wpisz dwu literowy symbol" maxlength="2" required tabindex="4" />
                                        </div>
                                        <div class="form-group">
                                            <label for="first_name">Oddział / Adres</label>
                                            <input type="text" autocomplete="off" class="form-control" id="department" name="department" placeholder="Wpisz oddział" tabindex="6" />
                                        </div>
                                        <div class="form-group">
                                            <label for="first_name">Opis</label>
                                            <textarea type="text" autocomplete="off" class="form-control" id="description" name="description" placeholder="Wpisz opis" tabindex="8" cols="5" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <p>&nbsp;</p>
                                    <hr />
                                    <div class="form-group">
                                        <label for="user_level">Uprawnienia</label><br />
                                        <div class="radio radio-success">
                                            <?php echo $adminusers->get_user_level($user_level); ?>
                                        </div>
                                    </div>
                                    <hr />
                                    <p>&nbsp;</p>
                                    <div class="title-box">Dane logowania</div>
                                    <div class="form-group">
                                        <label for="email">Adres emial/login</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Wpisz email" autocomplete="off" required tabindex="9" />
                                    </div>
                                    <div class="form-group">
                                        <label for="user_level">Hasło</label>
                                        <input type="password" id="password" autocomplete="new-password" name="password" class="form-control" tabindex="10" />
                                    </div>
                                    <div class="form-group">
                                        <label for="user_level">Powtórz hasło</label>
                                        <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" tabindex="11" />
                                    </div>
                                    <hr />
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Dodaj użytkownika</button> <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>