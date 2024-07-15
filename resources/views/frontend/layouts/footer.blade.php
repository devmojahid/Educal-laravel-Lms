<footer>
    <div class="footer__area footer-bg">
       <div class="footer__top pt-190 pb-40">
          <div class="container">
             <div class="row">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                   <div class="footer__widget mb-50">
                      <div class="footer__widget-head mb-22">
                        @if (getOptions('footer','footer_main_logo') != null)
                         <div class="footer__logo">
                            <a href="{{ url("/") }}">
                               <img src="{{ asset(getOptions('footer','footer_main_logo')) }}" alt="footer logo">
                            </a>
                         </div>
                        @endif
                      </div>
                      <div class="footer__widget-body">
                        @if (getOptions('footer','footer_main_desc') != null)
                         <p>{{ getOptions('footer','footer_main_desc') }}</p>
                        @endif
                         <div class="footer__social">
                            <ul>
                              @if (getOptions('social','social_facebook') != null)
                               <li><a href="{{ addHttp(getOptions('social','social_facebook')) }}"><i class="social_facebook"></i></a></li>
                              @endif
                              @if (getOptions('social','social_twitter') != null)
                               <li><a href="{{ addHttp(getOptions('social','social_twitter')) }}" class="tw"><i class="social_twitter"></i></a></li>
                              @endif
                              @if (getOptions('social','social_pinterest') != null)
                               <li><a href="{{ addHttp(getOptions('social','social_pinterest')) }}" class="pin"><i class="social_pinterest"></i></a></li>
                               @endif
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
                @if(App\Models\Menu::where('status', 'active')->where("location",'footer_1')->count() > 0 )
                <div class="col-xxl-2 offset-xxl-1 col-xl-2 offset-xl-1 col-lg-3 offset-lg-0 col-md-2 offset-md-1 col-sm-5 offset-sm-1">
                   <div class="footer__widget mb-50">
                      <div class="footer__widget-head mb-22">
                         <h3 class="footer__widget-title">Company</h3>
                      </div>
                      <div class="footer__widget-body">
                         <div class="footer__link">
                            <ul>
                              @php
                                 $menus = App\Models\Menu::where('status', 'active')->where("location",'footer_1')->get();
                              
                                 $menu_content = [];
                                 if (count($menus) > 0){
                                       $menu_content = json_decode($menus[0]->content);
                                 }
                              @endphp
                              @foreach ($menu_content as $menu)
                                 @if ($menu->type == 'page')
                                       @php
                                          $page = App\Models\pages::find($menu->id);
                                       @endphp
                                       <li><a href="{{ route('pages.details', $page->slug) }}">{{ $menu->name }}</a></li>
                                 @elseif ($menu->type == 'course')
                                       @php
                                          $course = App\Models\Course::find($menu->id);
                                       @endphp
                                       <li><a href="{{ route('course.details', $course->slug) }}">{{ $menu->name }}</a></li>
                                 @elseif ($menu->type == 'custom_link')
                                       <li><a href="{{ $menu->id }}">{{ $menu->name }}</a></li>
                                 @endif
                              @endforeach
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
                @endif
                @if(App\Models\Menu::where('status', 'active')->where("location",'footer_2')->count() > 0 )
                <div class="col-xxl-2 col-xl-2 col-lg-2 offset-lg-0 col-md-3 offset-md-1 col-sm-6">
                   <div class="footer__widget mb-50">
                      <div class="footer__widget-head mb-22">
                         <h3 class="footer__widget-title">Platform</h3>
                      </div>
                      <div class="footer__widget-body">
                         <div class="footer__link">
                            <ul>
                              @php
                                 $menus = App\Models\Menu::where('status', 'active')->where("location",'footer_2')->get();
                              
                                 $menu_content = [];
                                 if (count($menus) > 0){
                                       $menu_content = json_decode($menus[0]->content);
                                 }
                              @endphp
                              @foreach ($menu_content as $menu)
                                 @if ($menu->type == 'page')
                                       @php
                                          $page = App\Models\pages::find($menu->id);
                                       @endphp
                                       <li><a href="{{ route('pages.details', $page->slug) }}">{{ $menu->name }}</a></li>
                                 @elseif ($menu->type == 'course')
                                       @php
                                          $course = App\Models\Course::find($menu->id);
                                       @endphp
                                       <li><a href="{{ route('course.details', $course->slug) }}">{{ $menu->name }}</a></li>

                                 @elseif ($menu->type == 'custom_link')
                                       <li><a href="{{ $menu->id }}">{{ $menu->name }}</a></li>
                                 @endif
                              @endforeach
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
                @endif
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-sm-6">
                   <div class="footer__widget footer__pl-70 mb-50">
                      <div class="footer__widget-head mb-22">
                         <h3 class="footer__widget-title">Subscribe</h3>
                      </div>
                      <div class="footer__widget-body">
                         <div class="footer__subscribe">

                            <form action="{{ route("subscribe") }}" method="POST">
                                 @csrf
                               <div class="footer__subscribe-input mb-15">
                                  <input type="email" name="email" placeholder="Your email address">
                                  <button type="submit">
                                     <i class="far fa-arrow-right"></i>
                                     <i class="far fa-arrow-right"></i>
                                  </button>
                               </div>
                            </form>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
      @if (getOptions('footer','footer_copy_right') != null)
         <div class="footer__bottom">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="footer__copyright text-center">
                        <p>{{ getOptions('footer','footer_copy_right') }}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      @endif
    </div>
 </footer>