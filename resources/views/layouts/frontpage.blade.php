<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>{{$data['title']}}</title>
  <link rel="shortcut icon" href="/favicon.ico">
  {{-- Custom fonts for this theme --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  {{-- Theme CSS --}}
  <link href="/css/freelancer.min.css" rel="stylesheet">
  <link href="/css/frontpage-custom.css" rel="stylesheet">
  {{-- Unit Gallery CSS --}}
  <link rel='stylesheet' href='/unitegallery/css/unite-gallery.css' type='text/css' /> 
  <link rel='stylesheet' href='/unitegallery/themes/default/ug-theme-default.css' type='text/css' /> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
</head>
<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">САМОДИСЦИПЛИНА</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        МЕНЮ
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#reporters">СПИСОК</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#diagrams">ДИАГРАММА</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#leaders">ЛИДЕРЫ</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#gallery">ГАЛЕРЕЯ</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">ИНФО</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/admin" target="_blank"><i class="fas fa-lock"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="/img/front-logo.png" alt="">
      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">САМОДИСЦИПЛИНА</h1>
      <div class="wrapper">
          <i class="fas fa-chevron-circle-left cursor" id="dt_back"></i> <input type="text" class="dateselect text-center" value="{{ Carbon\Carbon::parse($data['details']['date'])->format('d.m.Y') }}" required="required"/> <i class="fas fa-chevron-circle-right cursor" id="dt_frwrd"></i>
      </div>
      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">Воля ⭐️ Цель ⭐️ Успех</p>
    </div>
  </header>

  <!-- Reporters Section -->
  <section class="page-section portfolio" id="reporters">
    <div class="container">
      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">СПИСОК</h2>
      <h6 class="text-center text-uppercase text-secondary">{{ $data['details']['reporters']->count() }} участников на дату {{Carbon\Carbon::parse($data['details']['date'])->format('d.m.Y')}}</h6>
      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Portfolio Grid Items -->
      <div class="row">

        <!-- Portfolio Item 1 -->
        @foreach ($data['details']['reporters'] as $reporter)
            
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto {{$res = (($reporter->report1_dt) && ($reporter->report2_dt) && ($reporter->report3_dt)) ? 'border-orange' : 'border-blue'}}" data-toggle="modal" data-target="#portfolioModal{{$reporter->id}}">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-search fa-3x"></i>
              </div>
            </div>
            <div>
              <img src="{{ $reporter->avatar ? "$reporter->avatar" : "/img/icon-participant.png" }}" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
              <div class="text-center"><h4>{{ $reporter->name }} {{ $reporter->leader ? "️️️️⭐️" : "" }}</h4></div>
              <div class="reporter-group">{{ $reporter->group }}</div>
              <div class="text-center">
                <i class="fas fa-check fa-2x {{ $reporter->report1_dt ? 'success-star' : 'text-secondary'}}"></i>
                <i class="fas fa-check fa-2x {{ $reporter->report2_dt ? 'success-star' : 'text-secondary'}}"></i>
                <i class="fas fa-check fa-2x {{ $reporter->report3_dt ? 'success-star' : 'text-secondary'}}"></i>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  </section>

  <section class="page-section bg-gray" id="diagrams">
    <div class="container">
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">ДИАГРАММЫ</h2>
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
      <div class="row">
        <div class="col-xl-4 diagram-item">
          <div class="report-title"> ОТЧЕТ 1</div>
          <div class="report-description">утренний отчет<br>c 05:00 до 09:00</div>
          <canvas id="report-chart1"></canvas>
        </div>
        <div class="col-xl-4 diagram-item">
          <div class="report-title"> ОТЧЕТ 2</div>
          <div class="report-description">отчет в течении дня<br>c 05:00 до 23:00</div>
          <canvas id="report-chart2"></canvas>
        </div>
        <div class="col-xl-4 diagram-item">
          <div class="report-title"> ОТЧЕТ 3</div>
          <div class="report-description">вечерний отчет<br>c 18:00 до 23:00</div>
          <canvas id="report-chart3"></canvas>
        </div>
    </div>
    </div>
  </section>

  <section class="page-section" id="leaders">
    <div class="container">
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">ЛИДЕРЫ</h2><h4 class="text-center text-secondary">{{ $data['leaders']->date }}</h4>
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
      <div class="text-center"><h4>Номинации участника</h4></div>
      <div class="row">
        <div class="col-lg-4">
          <div class="leader">
            <div class="leader-item mx-auto border-blue">
              <div class="text-center text-orange"><h6>ДЕНЬГИ<br>ЗА ДЕНЬ</h6></div>
                <div>
                @if($data['leaders']->reporter_money_max->status == 'bad')
                  <img src="/img/icon-question.png" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                  <div class="text-center"><h4>Никто не выделился</h4></div>
                  <div class="reporter-group">{{Carbon\Carbon::parse($data['leaders']->reporter_money_max->date)->format('d.m.Y')}}</div>
                @else
                  <img src="{{ $data['leaders']->reporter_money_max->avatar ?  $data['leaders']->reporter_money_max->avatar : '/img/icon-participant.png'}}" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                  <div class="text-center"><h4>{{ $data['leaders']->reporter_money_max->status == 'bad' ? 'Никто не выделился' :  $data['leaders']->reporter_money_max->name }}</h4></div>
                  <div class="reporter-group">{{ $data['leaders']->reporter_money_max->status == 'bad' ? '' :  number_format($data['leaders']->reporter_money_max->sum, 2, ',', ' ') }} KGS</div>
                  <div class="reporter-group">{{Carbon\Carbon::parse($data['leaders']->reporter_money_max->date)->format('d.m.Y')}}</div>
                @endif
                </div>
             </div>
          </div>
        </div>
        <div class="col-lg-4">
            <div class="leader">
              <div class="leader-item mx-auto border-blue">
                  <div class="text-center text-orange"><h6>ДЕНЬГИ<br>ЗА НЕДЕЛЮ</h6></div>
                  <div>
                    @if($data['leaders']->reporter_money_max_7days->status == 'bad')
                      <img src="/img/icon-question.png" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                      <div class="text-center"><h4>Никто не выделился</h4></div>
                      <div class="reporter-group">Приложите усилия и вы можете оказаться здесь</div>
                      <div class="reporter-group">{{Carbon\Carbon::parse($data['leaders']->reporter_money_max_7days->date_start)->format('d.m.Y')}} - {{Carbon\Carbon::parse($data['leaders']->reporter_money_max_7days->date_end)->format('d.m.Y')}}</div>
                    @else
                      <img src="{{ $data['leaders']->reporter_money_max_7days->avatar ?  $data['leaders']->reporter_money_max_7days->avatar : '/img/icon-participant.png'}}" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                      <div class="text-center"><h4>{{ $data['leaders']->reporter_money_max_7days->name }}</h4></div>
                      <div class="reporter-group">{{ number_format($data['leaders']->reporter_money_max_7days->sum, 2, ',', ' ') }} KGS</div>
                      <div class="reporter-group">{{Carbon\Carbon::parse($data['leaders']->reporter_money_max_7days->date_start)->format('d.m.Y')}} - {{Carbon\Carbon::parse($data['leaders']->reporter_money_max_7days->date_end)->format('d.m.Y')}}</div>
                    @endif
                  </div>
              </div>
          </div>
        </div>
        <div class="col-lg-4">
            <div class="leader">
              <div class="leader-item mx-auto border-blue">
                  <div class="text-center text-orange"><h6>ДИСЦИПЛИННИРОВАННЫЙ<br>УЧАСТНИК</h6></div>
                  <div>
                    @if($data['leaders']->reporter_discipline->status == 'bad')
                      <img src="/img/icon-question.png" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                      <div class="text-center"><h4>Никто не выделился</h4></div>
                      <div class="reporter-group">Приложите усилия и вы можете оказаться здесь</div>
                      <div class="reporter-group">{{Carbon\Carbon::parse($data['leaders']->reporter_discipline->date)->format('d.m.Y')}}</div>
                    @else
                    <img src="{{ $data['leaders']->reporter_discipline->avatar ?  $data['leaders']->reporter_discipline->avatar : '/img/icon-participant.png'}}" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                    <div class="text-center"><h4>{{ $data['leaders']->reporter_discipline->name }}</h4></div>
                    <div class="reporter-group">{{ Carbon\Carbon::parse($data['leaders']->reporter_discipline->date)->format('d.m.Y') }}</div>
                    @endif
                  </div>
              </div>
          </div>
        </div>
    </div>

    <div class="text-center head-title"><h4>Дисциплина участников за неделю</h4></div>
    <div class="row">
      @if($data['leaders']->reporters_discipline_7days->status == 'bad')
      <div class="col-lg-4">
        <div class="leader">
          <div class="leader-item mx-auto border-blue">
              <div>
                <img src="/img/icon-question.png" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                <div class="text-center"><h4>Никто не выделился</h4></div>
                <div class="reporter-group">Приложите усилия и вы можете оказаться здесь</div>
                <div class="reporter-group">{{Carbon\Carbon::parse($data['leaders']->reporters_discipline_7days->date_start)->format('d.m.Y')}} - {{Carbon\Carbon::parse($data['leaders']->reporters_discipline_7days->date_end)->format('d.m.Y')}}</div>
              </div>
            </div>
          </div>
        </div>
      @else
          @foreach($data['leaders']->reporters_discipline_7days->reporter_good_list as $reporter)
          <div class="col-lg-4">
            <div class="leader">
              <div class="leader-item mx-auto border-blue">
                  <div>
                    <img src="{{ $reporter->avatar ?  $reporter->avatar : '/img/icon-participant.png'}}" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                    <div class="text-center"><h4>{{ $reporter->name }}</h4></div>
                    <div class="reporter-group">{{Carbon\Carbon::parse($data['leaders']->reporters_discipline_7days->date_start)->format('d.m.Y')}} - {{Carbon\Carbon::parse($data['leaders']->reporters_discipline_7days->date_end)->format('d.m.Y')}}</div>
                  </div>
              </div>
            </div>
          </div>
          @endforeach
      @endif
  </div>
  <div class="text-center head-title"><h4>Номинации групп</h4></div>
    <div class="row">
      <div class="col-lg-4">
        <div class="leader">
          <div class="leader-item mx-auto border-blue">
            <div class="text-center text-orange"><h6>ДЕНЬГИ ЗА ДЕНЬ</h6></div>
              <div>
                @if($data['leaders']->group_money_max->status == 'bad')
                  <img src="/img/icon-question.png" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                  <div class="text-center"><h4>Никто не выделился</h4></div>
                  <div class="reporter-group">Приложите усилия и вы можете оказаться здесь</div>
                  <div class="reporter-group">{{Carbon\Carbon::parse($data['leaders']->group_money_max->date)->format('d.m.Y')}}</div>
                @else
                  <img src="/img/icon-group.png" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                  <div class="text-center"><h4>{{ $data['leaders']->group_money_max->name }}</h4></div>
                  <div class="reporter-group">{{ number_format($data['leaders']->group_money_max->sum, 2, ',', ' ') }} KGS</div>
                  <div class="reporter-group">{{Carbon\Carbon::parse($data['leaders']->group_money_max->date)->format('d.m.Y')}}</div>
                @endif
              </div>
           </div>
        </div>
      </div>
      <div class="col-lg-4">
          <div class="leader">
            <div class="leader-item mx-auto border-blue">
                <div class="text-center text-orange"><h6>ДЕНЬГИ ЗА НЕДЕЛЮ</h6></div>
                <div>
                  @if($data['leaders']->group_money_max_7days->status == 'bad')
                    <img src="/img/icon-question.png" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                    <div class="text-center"><h4>Никто не выделился</h4></div>
                    <div class="reporter-group">Приложите усилия и вы можете оказаться здесь</div>
                    <div class="reporter-group">{{Carbon\Carbon::parse($data['leaders']->group_money_max_7days->date_start)->format('d.m.Y')}} - {{Carbon\Carbon::parse($data['leaders']->group_money_max_7days->date_end)->format('d.m.Y')}}</div>
                  @else
                    <img src="/img/icon-group.png" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                    <div class="text-center"><h4>{{ $data['leaders']->group_money_max_7days->name }}</h4></div>
                    <div class="reporter-group">{{ number_format($data['leaders']->group_money_max_7days->sum, 2, ',', ' ') }} KGS</div>
                    <div class="reporter-group">{{Carbon\Carbon::parse($data['leaders']->group_money_max_7days->date_start)->format('d.m.Y')}} - {{Carbon\Carbon::parse($data['leaders']->group_money_max_7days->date_end)->format('d.m.Y')}}</div>
                  @endif
                </div>
            </div>
        </div>
      </div>
  </div>



  <div class="text-center head-title"><h4>ДИСЦИПЛИНИРОВАННОСТЬ ГРУПП</h4></div>
  <div class="text-center head-title"><h6>ЗА ДЕНЬ {{$data['leaders']->date}}</h6></div>
  <div class="row">
    @if ($data['leaders']->groups_discipline->status == "ok")
      @foreach ($data['leaders']->groups_discipline->discipline as $group)
        <div class="col-lg-4">
          <div class="leader">
            <div class="leader-item mx-auto border-blue">
                <div>
                  <img src="/img/icon-group.png" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                  <div class="text-center"><h4>{{ $group }}</h4></div>
                  <div class="reporter-group">{{Carbon\Carbon::parse($data['leaders']->groups_discipline->date)->format('d.m.Y')}}</div>
                </div>
            </div>
          </div>
        </div>
      @endforeach
      @else
      <div class="col-lg-4">
          <div class="leader">
            <div class="leader-item mx-auto border-blue">
                <div>
                  <img src="/img/icon-question.png" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                  <div class="text-center"><h4>Никто не выделился</h4></div>
                  <div class="reporter-group">Приложите усилия и вы можете оказаться здесь</div>
                  <div class="reporter-group">{{Carbon\Carbon::parse($data['leaders']->groups_discipline->date)->format('d.m.Y')}}</div>
                </div>
            </div>
          </div>
        </div>
    @endif

</div>


<div class="text-center head-title"><h6>ЗА НЕДЕЛЮ</h6></div>
<div class="row">
  @if ($data['leaders']->groups_discipline_7days->status == "ok")
    @foreach ($data['leaders']->groups_discipline_7days->discipline as $group)
      <div class="col-lg-4">
        <div class="leader">
          <div class="leader-item mx-auto border-blue">
              <div>
                <img src="/img/icon-group.png" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                <div class="text-center"><h4>{{ $group }}</h4></div>
                <div class="reporter-group">{{Carbon\Carbon::parse($data['leaders']->groups_discipline_7days->date_start)->format('d.m.Y')}} - {{Carbon\Carbon::parse($data['leaders']->groups_discipline_7days->date_end)->format('d.m.Y')}}</div>
              </div>
          </div>
        </div>
      </div>
    @endforeach
    @else
    <div class="col-lg-4">
        <div class="leader">
          <div class="leader-item mx-auto border-blue">
              <div>
                <img src="/img/icon-question.png" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                <div class="text-center"><h4>Никто не выделился</h4></div>
                <div class="reporter-group">Приложите усилия и вы можете оказаться здесь</div>
                <div class="reporter-group">{{Carbon\Carbon::parse($data['leaders']->groups_discipline_7days->date_start)->format('d.m.Y')}} - {{Carbon\Carbon::parse($data['leaders']->groups_discipline_7days->date_end)->format('d.m.Y')}}</div>
              </div>
          </div>
        </div>
      </div>
  @endif

</div>

    </div>
  </section>

  <section class="page-section bg-gray" id="gallery">
    <div class="container">
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">ГАЛЕРЕЯ</h2>
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
      @if ($data['details']['report1_count'])

      <div id="reporter_gallery" style="display:none;">
          @foreach ($data['details']['reporters'] as $key => $reporter)
            @if ($reporter->report1_photo_url)
              <img alt="{{ $reporter->name }} ({{ Carbon\Carbon::parse($reporter->report1_dt)->format('H:i')}})" src="{{$reporter->report1_photo_url}}"
              data-image="{{$reporter->report1_photo_url}}"
              data-description="{{ $reporter->name }} {{$reporter->report1_dt}}">
            @endif
          @endforeach		
        </div>

      @else
      <div class="row">
        <div class="col-lg-4">
          <div class="leader bg-white">
            <div class="leader-item mx-auto border-blue">
              <div>
                <img src="/img/icon-question.png" class="rounded-circle mx-auto d-block reporter-image" alt="" width="100px">
                <div class="text-center"><h4>Никто не сдал утренний Отчет №1</h4></div>
                <div class="reporter-group">Приложите усилия и вы можете оказаться первым</div>
                <div class="reporter-group">{{Carbon\Carbon::parse($data['details']['date'])->format('d.m.Y')}}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>


  <!-- About Section -->
  <section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">

      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white">ИНФО</h2>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- About Section Content -->
      <div class="row">
        <div class="col-lg-4 ml-auto">
          <p class="lead">Данный онлайн ресурс отображает успехи академиков школы самодисциплины в онлайн режиме.</p>
          <p class="lead">Для сдачи онлайн отчетов используется Телеграм мессенджер</p>
        </div>
        <div class="col-lg-4 mr-auto">
          <p class="lead">Чтобы начать сдавать отчет, вам необходимо пройти регистрацию через <a href="https://t.me/samodiscipline_bot">Телеграм бот</a> и дождаться активации вашего профиля менеджером школы самодисциплины.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Напишите</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form name="sentMessage" id="contactForm" novalidate="novalidate">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Имя</label>
                <input class="form-control" id="name" type="text" placeholder="Имя" required="required" data-validation-required-message="Введите имя">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Электронная почта</label>
                <input class="form-control" id="email" type="email" placeholder="Электронная почта" required="required" data-validation-required-message="Введите адрес электронной почты">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Номер телефона</label>
                <input class="form-control" id="phone" type="tel" placeholder="Номер телефона" required="required" data-validation-required-message="Введите номер телефона">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Сообщение</label>
                <textarea class="form-control" id="message" rows="5" placeholder="Сообщение" required="required" data-validation-required-message="Напишите свое сообщение"></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Отправить</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Расположение</h4>
          <p class="lead mb-0">Кыргызстан, г. Бишкек
            <br>ул. Ибраимова 115/4 <br><i>(ориентир Дордой Плаза)</i></p>
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Онлайн ресурсы</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/samodisciplina.kg/">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="https://t.me/samodiscipline_bot">
            <i class="fab fa-fw fa-telegram"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="http://financybishkekkg.plp7.ru/">
            <i class="fas fa-fw fa-globe"></i>
          </a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Школа самодисциплины, 2019</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Portfolio Modals -->




  <!-- Portfolio Modal 1 -->
  @foreach ($data['details']['reporters'] as $key => $reporter)
  <div class="portfolio-modal modal fade" id="portfolioModal{{$reporter->id}}" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Reporter Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$reporter->name}}</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Reporter Modal - Image -->
                <h4>Отчет 1</h4>
                @if ($reporter->report1_photo_url)
                    <img src="{{$reporter->report1_photo_url}}" class="report1_photo" alt="Фотография отчет №1">
                    <div class="text-center">Время сдачи отчета:<br>{{$reporter->report1_dt}}</div>
                @else
                    <p class="mb-5">Участник не сдал ОТЧЕТ №1</p>
                @endif

                <h4>Отчет 2</h4>
                @if ($reporter->report2_tasks)
                    @php
                     $taskList = App\Http\Controllers\frontpageController::taskList($reporter->report2_tasks);
                    @endphp
                    <pre class="taskList">{{ $taskList }}</pre>
                @else
                    <p class="mb-5">Участник не сдал ОТЧЕТ №2</p>
                @endif
                <h4>Отчет 3</h4>
                @if ($reporter->report3_money)
                    Заработал: {{ $reporter->report3_money}}
                @else
                    <p class="mb-5">Участник не сдал ОТЧЕТ №3</p>
                @endif
                <div class="btn-modal">
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Закрыть
                </button>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  <!-- Bootstrap core JavaScript -->
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>

  <script type='text/javascript' src='/js/jquery.min.js'></script>
  <script type='text/javascript' src="/js/jquery-ui.min.js"></script>
  
  {{-- Unit Gallery --}}
  <script type='text/javascript' src='/unitegallery/js/unitegallery.min.js'></script> 
  <script type='text/javascript' src='/unitegallery/themes/tiles/ug-theme-tiles.js'></script> 
  
  <!-- Plugin JavaScript -->
  <script src="/js/jquery.easing.min.js"></script>

  <!-- Chart JS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

  <!-- Contact Form JavaScript -->
  <script src="/js/jqBootstrapValidation.js"></script>
  <script src="/js/contact_me.js"></script>
  
  <!-- DatePicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="/js/datepicker-ru.js"></script>
  <script src="/js/moment.js"></script>
  
  <!-- Custom scripts for this template -->
  <script src="/js/freelancer.min.js"></script>

  <script>
      $(document).ready(function(){
          var ctx = document.getElementById('report-chart1').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Сдавшие', 'Несдавшие'],
                    datasets: [{
                        label: 'Отчет 1',
                        backgroundColor: ['#ff8000', '#003c7c'],
                        data: [{{ $data['details']['report1_count'] }}, {{$data['details']['reporters']->count() - $data['details']['report1_count']}}]
                    }]
                },
                options: {
                  animation: {animateScale: true}
                }
          });
          var ctx = document.getElementById('report-chart2').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Сдавшие', 'Несдавшие'],
                    datasets: [{
                        label: 'Отчет 1',
                        backgroundColor: ['#ff8000', '#003c7c'],
                        data: [{{ $data['details']['report2_count'] }}, {{$data['details']['reporters']->count() - $data['details']['report2_count']}}]
                    }]
                },
                options: {
                  animation: {animateScale: true}
                }
          });
          var ctx = document.getElementById('report-chart3').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Сдавшие', 'Несдавшие'],
                    datasets: [{
                        label: 'Отчет 1',
                        backgroundColor: ['#ff8000', '#003c7c'],
                        data: [{{ $data['details']['report3_count'] }}, {{$data['details']['reporters']->count() - $data['details']['report3_count']}}]
                    }]
                },
                options: {
                  animation: {animateScale: true}
                }
          });

          $("#dt_back").click(function(){
              var dt = $(".dateselect").val();
              window.open("{{$data['app_url']}}/date/" + moment(dt,("DD.MM.YYYY")).add(-1,"days").format("YYYY-MM-DD"),'_self');
          });
          $("#dt_frwrd").click(function(){
            var dt = $(".dateselect").val();
            if (moment().diff(moment(dt,"DD.MM.YYYY")) > 0){
              window.open("{{$data['app_url']}}/date/" + moment(dt,("DD.MM.YYYY")).add(1,"days").format("YYYY-MM-DD"),'_self');
            }
            else {
              alert('bad');              
            }
        });

          

          jQuery("#reporter_gallery").unitegallery({
            tile_enable_textpanel:true,
            tile_textpanel_title_text_align: "center",
            tile_textpanel_always_on:true,
          });

          $('.dateselect').datepicker({
            endDate: new Date(),
            format: 'dd.mm.yyyy',
          }).bind('changeDate', function(e,changeDate){
            var converted_dt = $('.dateselect').val().split('.');
            window.open("{{$data['app_url']}}/date/" + converted_dt[2] + '-' + converted_dt[1] + '-' + converted_dt[0],'_self');
        });
        });

  </script>

</body>

</html>
