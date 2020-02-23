<?php

/* @var $this yii\web\View */

$this->title = 'Страница редактирования';
?>

<div class="flex@md">
    <aside class="sidebar sidebar--static@md js-sidebar" id="sidebar" aria-labelledby="sidebarTitle">
        <div class="sidebar__panel">
            <header class="sidebar__header">
                <div class="Brand">Color Project</div>
                <button class="reset sidebar__close-btn js-sidebar__close-btn js-tab-focus">
                    <svg class="icon" viewBox="0 0 16 16">
                        <title>Close panel</title>
                        <g stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                            <line x1="13.5" y1="2.5" x2="2.5" y2="13.5"></line>
                            <line x1="2.5" y1="2.5" x2="13.5" y2="13.5"></line>
                        </g>
                    </svg>
                </button>
            </header>

            <div class="sidebar__content">
                <!-- start sidebar content -->
                <div class="text-component padding-md">
                    <!--         <form class="form-inline md-form mb-0 w-100 form-sm mt-0">
  <i class="fas fa-search" aria-hidden="true"></i>
  <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
    aria-label="Search"> 
</form> -->


                    <div class="search-input search-input--icon-right">
                        <input class="form-control width-100%" type="search" name="searchInputX" id="searchInputX" placeholder="Search...">
                        <button class="search-input__btn">
                            <svg class="icon" viewBox="0 0 24 24">
                                <title>Search</title>
                                <g stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" stroke="currentColor" fill="none" stroke-miterlimit="10">
                                    <line x1="22" y1="22" x2="15.656" y2="15.656"></line>
                                    <circle cx="10" cy="10" r="8"></circle>
                                </g>
                            </svg>
                        </button>
                    </div>




                    <section>
                        <div class="container m-0 p-0 max-width-sm">

                            <ul class="accordion  js-accordion category-container" data-animation="on" data-multi-items="off">

                            </ul>

                        </div>
                    </section>




                </div>
                <!-- end sidebar content -->









            </div>
        </div>
    </aside>

    <main class="w-100 position-relative">
        <!-- start main content -->
        <div class="position-absolute fixed-top">

            <div class="border-bottom card w-100">
                <div class="d-flex card-body justify-content-between ">

                    <div class="text-center flex-column">

                        <button class="shadow_none btn btn--primary button-studio" aria-controls="sidebar"><img src="img/ListButton.svg"></button>
                        <button class="shadow_none btn btn--primary button-studio"><img src="img/11.svg"></button>
                    </div>

                    <div class="text-center flex-column">

                        <button class="shadow_none btn btn--primary button-studio"><img src="img/12.svg"></button>
                        <button class="shadow_none btn btn--primary button-studio"><img src="img/13.svg"></button>

                        <!--       <div class="def-number-input number-input safari_only">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus size-tool"></button>
                                <input class="scale" min="0" name="scale" value="100" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus size-tool"></button>
                            </div> -->


                        <!--  <input class="scale" type="text" placeholder="Scale" value="100"> -->
                    </div>

                    <div class="text-center flex-column">

                        <button class="shadow_none btn btn--primary button-studio"><img src="img/14.svg"></button>


                        <button class="shadow_none save btn btn--primary button-studio save-button" type="button" id="dropdownMenuMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="img/15.svg">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuMenu">
                            <button class="dropdown-item format-save-item" value="png" type="button">PNG</button>
                            <button class="dropdown-item format-save-item" value="jpeg" type="button">JPEG</button>
                            <button class="dropdown-item format-save-item" value="pdf" type="button">PDF</button>
                        </div>


                        <!--
                            <button class="save btn btn--primary button-studio save-button"><img src="img/15.svg"></button>

-->
                    </div>


                </div>
            </div>
            <div class="w-100">
                <div class="d-flex card-body justify-content-center ">

                    <div class="plus_btn def-number-input number-input safari_only">
                        <button class="minus size-tool size-tool-button"></button>
                        <input class="scale" min="0" name="scale" value="100" type="number">
                        <button class="plus size-tool size-tool-button"></button>
                    </div>
                </div>

            </div>
        </div>


        <div class="container h-100">

            <div class="row over h-100">
                <div class="align-self-center main-svg">


                </div>





                <!--    <div class="container h-100">

                <div class="row h-100">
                    <div class="align-self-center main-svg">

                    </div>
                
                </div>
            </div> -->
                <div class="position-absolute fixed-bottom">



                    <!--    <div class="m-5 def-number-input number-input safari_only">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus size-tool"></button>
                                <input class="scale quantity" min="0" name="quantity" value="100" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus size-tool"></button>
                            </div>-->

                    <!-- default panel -->
                    <div class="card w-100 a border-0 b tools-panel tools-panel-default">
                        <div class="d-flex card-body index justify-content-around c">
                            <p class="m-0 label_color">Выберите элемент</p>
                        </div>
                    </div>

                    <!-- text panel -->
                    <div style="display: none;" class="card w-100 a border-0 b tools-panel tools-panel-text">
                        <div class="d-flex card-body index justify-content-around c" data-tools="defalt">
                            <div class="flex flex-column items-start ">
                                <label class="form-label label_color rgin-bottom-xxxs m-auto" for="selectThis">Шрифт:</label>

                                <button class="fonts btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    Шрифт
                                </button>
                            </div>

                            <div class="text-center flex-column">
                                <p class="m-0 label_color">A</p>

                                <button class=" btn color-picker button-studio btn--primary m"></button>
                                <button class="delete-button">Удалить элемент</button>
                            </div>

                            <div class="text-center flex-column">
                                <p class="m-0 label_color">Размер</p>
                                <div class="def-number-input number-input safari_only">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus size-tool"></button>
                                    <input class="quantity" min="0" name="quantity" value="1" type="number">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus size-tool"></button>
                                </div>

                            </div>

                            <div class="text-center flex-column">
                                <p class="m-0 label_color">Стиль</p>
                                <button id="underline" class="btn btn--primary button-studio"><img src="img/16.svg"></button>
                                <button id="weight" class="btn btn--primary button-studio text-style"><img src="img/17.svg"></button>
                                <button id="style" class="btn btn--primary button-studio text-style"><img src="img/18.svg"></button>

                            </div>

                            <div class="text-center flex-column">

                            </div>
                        </div>
                    </div>

                    <!-- file-panel -->
                    <div style="display: none;" class="card w-100 a border-0 b tools-panel tools-panel-file">
                        <div class="d-flex card-body index justify-content-around c">
                        <div class="text-center flex-column">
                        <p class="label_color m-0">Логотип</p>
                        <button class="delete-button">Удалить элемент</button>

                        <!--   <input type="file" class="btn  btn--primary button-studio"/> -->

                        <fieldset class="file-upload">
                            <label for="upload1" class="btn_main shadow_none file-upload__label btn btn--subtle h-36">
                                <span class="file-upload__text file-upload__text--has-max-width">Upload a file</span>
                            </label>

                            <input type="file" class="file-upload__input" name="upload1" id="upload1">
                        </fieldset>
                    </div>
                        </div>
                    </div>


                    <div class="font-container item-start collapse" id="collapseExample">

                        <form>
                            <div class=" block-font p-4 card">
                                <fieldset>
                                    <legend class="label_color form-legend">Выберете шрифт</legend>

                                    <ul class="fonts-list radio-list flex flex-column flex-gap-xxxs">
                                        <li>
                                            <input data-src="uploads/fonts/comfortaa/Comfortaa[wght].ttf" class="fonts-item radio" type="radio" name="radioButton" id="radio1" checked>
                                            <label for="radio1">Comfortaa</label>
                                        </li>
                                    </ul>
                                </fieldset>
                            </div>
                        </form>

                    </div>




                    <!--  <div class="format-container collapse" id="collapseExample1">

                    <form>
                        <div class=" p-4 card">
                            <fieldset>
                                <legend class="form-legend">Выберете формат</legend>

                                <ul class="radio-list flex flex-column flex-gap-xxxs format-save">
                                    <li>
                                        <input class="format-save-item radio" type="radio" name="radioButton" id="radio12" value="png" checked>
                                        <label for="radio12">PNG</label>
                                    </li>

                                    <li>
                                        <input class="format-save-item radio" type="radio" name="radioButton" id="radio13" value="jpeg">
                                        <label for="radio13">JPEG</label>
                                    </li>

                                    <li>
                                        <input class="format-save-item radio" type="radio" name="radioButton" id="radio14" value="pdf">
                                        <label for="radio14">PDF</label>
                                    </li>
                                </ul>
                            </fieldset>
                        </div>
                    </form>

                </div>-->
                </div>

                <!-- end main content -->
    </main>
</div>