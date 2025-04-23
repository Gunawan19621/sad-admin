<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo"
        style="display: flex; justify-content: center; align-items: center; height: 100px; position: relative;">
        <a href="{{ route('dashboard') }}" class="app-brand-link text-center">
            <img src="{{ asset('assets/image/logo/logo-sad.png') }}" alt="logo SAD"
                style="max-width: 140px; max-height: 100%;">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    @php
        $active = $active ?? '';
    @endphp
    <ul class="menu-inner py-1 mb-5">
        <!-- Dashboard -->
        <li class="menu-item {{ $active == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        <li
            class="menu-item {{ $active == 'menu-header' || $active == 'quickLink' || $active == 'stayInTouch' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Layouts</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ $active == 'menu-header' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.menu-header.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Menu header</div>
                    </a>
                </li>
            </ul>

            <ul class="menu-sub">
                <li class="menu-item {{ $active == 'quickLink' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.quick-link.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Quick Link</div>
                    </a>
                </li>
            </ul>

            <ul class="menu-sub">
                <li class="menu-item {{ $active == 'stayInTouch' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.stay-in-touch.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Stay In Touch</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li>

        <!-- About -->
        <li
            class="menu-item {{ $active == 'about' ||
            $active == 'our-story' ||
            $active == 'our-team' ||
            $active == 'our-vision' ||
            $active == 'award' ||
            $active == 'category-faq' ||
            $active == 'faq' ||
            $active == 'contact-us' ||
            $active == 'enquiry'
                ? 'active open'
                : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-info-circle"></i>
                <div data-i18n="About"> About </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $active == 'about' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.about.index') }}" class="menu-link">
                        <div data-i18n="oru-story">About</div>
                    </a>
                </li>

                <li class="menu-item {{ $active == 'our-story' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.our-story.index') }}" class="menu-link">
                        <div data-i18n="oru-story">Our Story</div>
                    </a>
                </li>

                <li class="menu-item {{ $active == 'our-team' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.our-team.index') }}" class="menu-link">
                        <div data-i18n="oru-team">Our Team</div>
                    </a>
                </li>

                <li class="menu-item {{ $active == 'our-vision' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.our-vision.index') }}" class="menu-link">
                        <div data-i18n="oru-vision">Our Vision</div>
                    </a>
                </li>

                <li class="menu-item {{ $active == 'award' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.award.index') }}" class="menu-link">
                        <div data-i18n="award">Award</div>
                    </a>
                </li>

                <li class="menu-item {{ $active == 'category-faq' || $active == 'faq' ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div>FAQ</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ $active == 'category-faq' ? 'active' : '' }}">
                            <a href="{{ route('dashboard.category-faq.index') }}" class="menu-link">
                                <div> Category FAQ</div>
                            </a>
                        </li>
                        <li class="menu-item {{ $active == 'faq' ? 'active' : '' }}">
                            <a href="{{ route('dashboard.faq.index') }}" class="menu-link">
                                <div> FAQ</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item {{ $active == 'contact-us' || $active == 'enquiry' ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div>Contact Us</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ $active == 'enquiry' ? 'active' : '' }}">
                            <a href="{{ route('dashboard.enquiry.index') }}" class="menu-link">
                                <div> Enquiry </div>
                            </a>
                        </li>
                        <li class="menu-item {{ $active == 'contact-us' ? 'active' : '' }}">
                            <a href="{{ route('dashboard.contact-us.index') }}" class="menu-link">
                                <div> Contact Us </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <!-- Experience -->
        <li
            class="menu-item {{ $active == 'experience' ||
            $active == 'imageExperience' ||
            $active == 'experiencePrice' ||
            $active == 'resort' ||
            $active == 'resortImage' ||
            $active == 'activiti' ||
            $active == 'imageActiviti' ||
            $active == 'activitiPrice'
                ? 'active open'
                : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="experience"> Experience </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $active == 'experience' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.experience.index') }}" class="menu-link">
                        <div data-i18n="experience">Experience</div>
                    </a>
                </li>
                <li class="menu-item {{ $active == 'imageExperience' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.image-experience.index') }}" class="menu-link">
                        <div data-i18n="image-experience">Image Experience</div>
                    </a>
                </li>
                <li class="menu-item {{ $active == 'experiencePrice' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.experience-price.index') }}" class="menu-link">
                        <div data-i18n="experience-price">Experience Price</div>
                    </a>
                </li>
                <li class="menu-item {{ $active == 'resort' || $active == 'resortImage' ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div>Resort</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ $active == 'resort' ? 'active' : '' }}">
                            <a href="{{ route('dashboard.resort.index') }}" class="menu-link">
                                <div> Resort </div>
                            </a>
                        </li>
                        <li class="menu-item {{ $active == 'resortImage' ? 'active' : '' }}">
                            <a href="{{ route('dashboard.resort-image.index') }}" class="menu-link">
                                <div> Resort Image </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="menu-item {{ $active == 'activiti' || $active == 'imageActiviti' || $active == 'activitiPrice' ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div>Activiti</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ $active == 'activiti' ? 'active' : '' }}">
                            <a href="{{ route('dashboard.activiti.index') }}" class="menu-link">
                                <div> Activiti </div>
                            </a>
                        </li>
                        <li class="menu-item {{ $active == 'imageActiviti' ? 'active' : '' }}">
                            <a href="{{ route('dashboard.image-activiti.index') }}" class="menu-link">
                                <div> Image Activiti </div>
                            </a>
                        </li>
                        <li class="menu-item {{ $active == 'activitiPrice' ? 'active' : '' }}">
                            <a href="{{ route('dashboard.activiti-price.index') }}" class="menu-link">
                                <div> Activiti Price </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <!-- Product -->
        <li
            class="menu-item {{ $active == 'product' || $active == 'category-product' || $active == 'subCategory' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="product"> Product </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $active == 'product' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.product.index') }}" class="menu-link">
                        <div data-i18n="product">Product</div>
                    </a>
                </li>
                <li class="menu-item {{ $active == 'category-product' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.category-product.index') }}" class="menu-link">
                        <div data-i18n="category-product">Category Product</div>
                    </a>
                </li>
                <li class="menu-item {{ $active == 'subCategory' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.sub-category-product.index') }}" class="menu-link">
                        <div data-i18n="category-product">Sub Category</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Distributor -->
        <li class="menu-item {{ $active == 'our-Distributor' ? 'active' : '' }}">
            <a href="{{ route('dashboard.our-distributor.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="distributor">Distributor</div>
            </a>
        </li>

        <!-- Partner -->
        <li class="menu-item {{ $active == 'partner' ? 'active' : '' }}">
            <a href="{{ route('dashboard.partner.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="partner">Partner</div>
            </a>
        </li>

        <!-- News & Events -->
        <li class="menu-item {{ $active == 'categoryNewsEvent' || $active == 'newsEvent' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-briefcase"></i>
                <div data-i18n="news-vents"> News & Events </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $active == 'categoryNewsEvent' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.category-news-event.index') }}" class="menu-link">
                        <div data-i18n="category-news-event">Category</div>
                    </a>
                </li>
                <li class="menu-item {{ $active == 'newsEvent' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.news-event.index') }}" class="menu-link">
                        <div data-i18n="news-events">News & Events</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Work With Us -->
        <li class="menu-item {{ $active == 'jobApplicant' ? 'active' : '' }}">
            <a href="{{ route('dashboard.job-applicant.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="work-with-us">Work With Us</div>
            </a>
        </li>

        <!-- Galery -->
        <li class="menu-item {{ $active == 'gallery' ? 'active' : '' }}">
            <a href="{{ route('dashboard.gallery.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-images"></i>
                <div data-i18n="distributor">Galery</div>
            </a>
        </li>

        <li
            class="menu-item {{ $active == 'experienceCategory' || $active == 'suadeExperience' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-rocket"></i>
                <div data-i18n="SuadeExperience">Suade Experience</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ $active == 'experienceCategory' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.experience-category.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Experience Category</div>
                    </a>
                </li>
            </ul>

            <ul class="menu-sub">
                <li class="menu-item {{ $active == 'suadeExperience' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.suade-experience.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Experience</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">System</span>
        </li>

        <!-- User Management -->
        <li class="menu-item {{ $active == 'userManagement' ? 'active' : '' }}">
            <a href="{{ route('dashboard.user-management.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="userManagement">User management</div>
            </a>
        </li>
        <li class="menu-item {{ $active == 'userVisitor' ? 'active' : '' }}">
            <a href="{{ route('dashboard.user-visitor.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="userManagement">User Visitor</div>
            </a>
        </li>
    </ul>
</aside>
