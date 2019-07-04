@if(isset($pages) && is_object($pages))

    @foreach($pages as $k=>$page)

        @if($k%2 == 0)
            <!--Home-->
            <section id="{{ $page->alias }}" class="top_cont_outer">
                <div class="hero_wrapper">
                    <div class="container">
                        <div class="hero_section">
                            <div class="row">
                                <div class="col-lg-5 col-sm-7">
                                    <div class="top_left_cont zoomIn wow animated">
                                        {!! $page->text !!}
                                        <a href="{{ route('page', ['alias'=>$page->alias]) }}" class="read_more2">Read more</a></div>
                                </div>
                                <div class="col-lg-7 col-sm-5">
                                    <img src="{{ asset('assets/img/'.$page->images) }}" class="zoomIn wow animated" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        @else

            <section id="{{ $page->alias }}">
                <div class="inner_wrapper">
                    <div class="container">
                        <h2>{{ $page->name }}</h2>
                        <div class="inner_section">
                            <div class="row">
                                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                                    <img src="{{ asset('assets/img/'.$page->images) }}"
                                         class="img-circle delay-03s animated wow zoomIn"
                                         alt=""
                                    >
                                </div>
                                <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
                                    <div class=" delay-01s animated fadeInDown wow animated">
                                        {!! $page->text !!}
                                    </div>
                                    <div class="work_bottom"><span>Want to know more..</span>
                                        <a href="{{ route('page', ['alias'=>$page->alias]) }}"
                                             class="contact_btn">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        @endif

    @endforeach

@endif

@if(isset($services) && is_object($services))

    <!--Service-->
    <section id="service">
        <div class="container">
            <h2>Services</h2>
            <div class="service_wrapper">

                @foreach($services as $k=>$service)
                    @if($k === 0 || $k%3 === 0)
                        <div class="row {{ ($k !== 0) ? 'borderTop' : ''}}">
                    @endif

                        <div class="col-lg-4 {{ ($k%3 !== 0) ? 'borderLeft' : '' }} {{ ($k > 2) ? 'mrgTop' : '' }}">
                            <div class="service_block">
                                <div class="service_icon delay-03s animated wow  zoomIn"><span><i
                                                class="fa fa-{{ $service->icon }}"></i></span></div>
                                <h3 class="animated fadeInUp wow">{{ $service->name }}</h3>
                                <p class="animated fadeInDown wow">{{ $service->text }}</p>
                            </div>
                        </div>

                    @if(($k + 1)%3 === 0)
                        </div>
                    @endif

                @endforeach

            </div>
        </div>
    </section>
    <!--Service-->

@endif

@if(isset($portfolios) && is_object($portfolios))

    <!-- Portfolio -->
    <section id="Portfolio" class="content">

        <!-- Container -->
        <div class="container portfolio_title">

            <!-- Title -->
            <div class="section-title">
                <h2>Portfolio</h2>
            </div>
            <!--/Title -->

        </div>
        <!-- Container -->

        <div class="portfolio-top"></div>

        <!-- Portfolio Filters -->
        <div class="portfolio">

            @if(isset($tags) && is_object($tags))

                <div id="filters" class="sixteen columns">
                    <ul class="clearfix">

                        <li>
                            <a id="all" href="#" data-filter="*" class="active">
                                <h5>All</h5>
                            </a>
                        </li>
                        @foreach($tags as $tag)

                            <li>
                                <a class="" href="#" data-filter=".{{ $tag }}">
                                    <h5>{{ $tag }}</h5>
                                </a>
                            </li>

                        @endforeach

                    </ul>
                </div>

            @endif

            <!-- Portfolio Wrapper -->
            <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;"
                 id="portfolio_wrapper">
            @foreach($portfolios as $portfolio)
                    <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;"
                         class="portfolio-item one-four   {{ $portfolio->filter }} isotope-item">
                        <div class="portfolio_img"><img src="{{ asset('assets/img/'.$portfolio->images ) }}" alt="Portfolio"></div>
                        <div class="item_overlay">
                            <div class="item_info">
                                <h4 class="project_name">{{ $portfolio->name }}</h4>
                            </div>
                        </div>
                    </div>

            @endforeach

            </div>
            <!--/Portfolio Wrapper -->

        </div>
        <!--/Portfolio Filters -->

        <div class="portfolio_btm"></div>


        <div id="project_container">
            <div class="clear"></div>
            <div id="project_data"></div>
        </div>


    </section>
    <!--/Portfolio -->

@endif

@if(isset($clients) && is_object($clients))

    <!--client_logos-->
    <section class="page_section" id="clients"><!--page_section-->
        <h2>Clients</h2>
        <!--page_section-->
        <div class="client_logos"><!--client_logos-->
            <div class="container">
                <ul class="fadeInRight animated wow">
                    @foreach($clients as $client)

                        <li><a href="javascript:void(0)"><img src="{{ asset('assets/img/'.$client->images) }}" alt=""></a></li>

                    @endforeach

                </ul>
            </div>
        </div>
    </section>
    <!--client_logos-->

@endif

@if(isset($workers) && is_object($workers))

    <!--/Team-->
    <section class="page_section team" id="team"><!--main-section team-start-->
        <div class="container">
            <h2>Team</h2>
            <h6>Lorem ipsum dolor sit amet, consectetur adipiscing.</h6>
            <div class="team_section clearfix">
                @foreach($workers as $worker)

                    <div class="team_area">
                        <div class="team_box wow fadeInDown delay-03s">
                            <div class="team_box_shadow"><a href="javascript:void(0)"></a></div>
                            <img src="{{ asset('assets/img/'.$worker->images) }}" alt="">
                            <ul>
                                <li><a href="javascript:void(0)" class="fa fa-twitter"></a></li>
                                <li><a href="javascript:void(0)" class="fa fa-facebook"></a></li>
                                <li><a href="javascript:void(0)" class="fa fa-pinterest"></a></li>
                                <li><a href="javascript:void(0)" class="fa fa-google-plus"></a></li>
                            </ul>
                        </div>
                        <h3 class="wow fadeInDown delay-03s">{{ $worker->firstName.' '.$worker->lastName }}</h3>
                        <span class="wow fadeInDown delay-03s">{{ $worker->position }}</span>
                        <p class="wow fadeInDown delay-03s">{{ $worker->text }}</p>
                    </div>

                @endforeach

            </div>
        </div>
    </section>
    <!--/Team-->

@endif

@if(isset($contactUs) && is_object($contactUs))

    <!--Footer-->
    <footer class="footer_wrapper" id="contact">
        <div class="container">
            <section class="page_section contact" id="contact">
                <div class="contact_section">
                    <h2>Contact Us</h2>
                    <div class="row">
                        <div class="col-lg-4">

                        </div>
                        <div class="col-lg-4">

                        </div>
                        <div class="col-lg-4">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 wow fadeInLeft">
                        <div class="contact_info">
                            @foreach($contactUs as $contact)

                                <div class="detail">
                                    <h4>{{ $contact->name }}</h4>
                                    <p>{{ $contact->value }}</p>
                                </div>

                            @endforeach
                        </div>


                        <ul class="social_links">
                            <li class="twitter animated bounceIn wow delay-02s"><a href="javascript:void(0)"><i
                                            class="fa fa-twitter"></i></a></li>
                            <li class="facebook animated bounceIn wow delay-03s"><a href="javascript:void(0)"><i
                                            class="fa fa-facebook"></i></a></li>
                            <li class="pinterest animated bounceIn wow delay-04s"><a href="javascript:void(0)"><i
                                            class="fa fa-pinterest"></i></a></li>
                            <li class="gplus animated bounceIn wow delay-05s"><a href="javascript:void(0)"><i
                                            class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>

                    <div class="col-lg-8 wow fadeInLeft delay-06s">
                        <div class="form">
                            <form action="{{ route('home') }}" method="post">
                                <input class="input-text" type="text" name="name" value="Your Name *"
                                       onFocus="if(this.value==this.defaultValue)this.value='';"
                                       onBlur="if(this.value=='')this.value=this.defaultValue;">
                                <input class="input-text" type="text" name="email" value="Your E-mail *"
                                       onFocus="if(this.value==this.defaultValue)this.value='';"
                                       onBlur="if(this.value=='')this.value=this.defaultValue;">
                                <textarea name="text" class="input-text text-area" cols="0" rows="0"
                                          onFocus="if(this.value==this.defaultValue)this.value='';"
                                          onBlur="if(this.value=='')this.value=this.defaultValue;">Your Message *</textarea>
                                <input class="input-btn" type="submit" value="send message">

                                {{ csrf_field() }}
                            </form>


                        </div>
                    </div>

                </div>
            </section>
        </div>
        <div class="container">
            <div class="footer_bottom"><span>Copyright © 2019,    Template by AG. </span></div>
        </div>
    </footer>
    <!--Footer-->

@endif




