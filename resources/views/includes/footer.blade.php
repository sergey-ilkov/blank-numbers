<x-numbers></x-numbers>

<footer id="footer" class="footer">
    <div class="container">
        <div class="footer-top">


            <div class="footer__items">
                <div class="footer__item">
                    <img class="footer-logo" width="60" height="60" src="{{ asset('images/logo-footer.svg') }}" alt="Логотип">

                </div>

                <div class="footer__item">
                    <span class="footer__item-title">{{ __('base.menu') }}</span>
                    <ul class="footer-menu">

                        <li class="footer-menu__item">
                            <a class="footer-menu__item-link link-anchor" href="{{ route('home') }}/#who">{{ __( 'menu.who' ) }}</a>
                        </li>
                        <li class="footer-menu__item">
                            <a class="footer-menu__item-link link-anchor" href="{{ route('home') }}/#what">{{ __('menu.what') }}</a>
                        </li>
                        <li class="footer-menu__item">
                            <a class="footer-menu__item-link link-anchor" href="{{ route('home') }}/#how-works">{{ __('menu.works') }}</a>
                        </li>
                        <li class="footer-menu__item">
                            <a class="footer-menu__item-link link-anchor" href="{{ route('home') }}/#consultations">{{
                                __('menu.consultations') }}</a>
                        </li>
                        <li class="footer-menu__item">
                            <a class="footer-menu__item-link link-anchor" href="{{ route('home') }}/#reviews">{{ __('menu.reviews') }}</a>
                        </li>
                        <li class="footer-menu__item">
                            <a class="footer-menu__item-link" href="{{ route('pythagoras') }}">{{ __('menu.pythagoras') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="footer__item">
                    <span class="footer__item-title ">{{ __('base.doc') }}</span>
                    <ul class="footer-menu">
                        <li class="footer-menu__item">
                            <a class="footer-menu__item-link" href="{{ route('offer') }}" target="_blank" rel="noopener">{{ __('menu.offer')
                                }}</a>
                        </li>
                        <li class="footer-menu__item">
                            <a class="footer-menu__item-link" href="{{ route('privacy') }}" target="_blank" rel="noopener">{{
                                __('menu.policy') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="footer__item">
                    <span class="footer__item-title">{{ __('base.contacts') }}</span>
                    <ul class="footer-menu-contacts">
                        <li class="footer-menu-contacts__item">
                            <p class="footer-menu-contacts__item-title">
                                {{ __('base.fop') }}
                            </p>
                        </li>
                        <li class="footer-menu-contacts__item">

                            <a class="footer-menu-contacts__item-link" href="mailto:tatyana.blank@gmail.com">tatyana.blank@gmail.com</a>
                        </li>
                        <li class="footer-menu-contacts__item">

                            <a class="footer-menu-contacts__item-link" href="tel:+380503580123">+38 050 358 0123</a>
                        </li>
                    </ul>

                    <p class="footer__item-text">
                        {{ __('base.footerMessage') }}
                    </p>

                    <ul class="footer-menu-social">
                        <li class="footer-menu-social__item">
                            <a class="footer-menu-social__item-link" href="https://www.facebook.com/blanktatiana/" target="_blank"
                                rel="noopener" aria-label="Link facebook">
                                <svg class="socail-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.135 6H15V3H13.135C12.0369 3.00132 10.9841 3.43814 10.2076 4.21463C9.43114 4.99111 8.99432 6.04388 8.993 7.142V9H7V12H9V21.938H12V12H14.021L14.613 9H12V6.591C12.0023 6.43481 12.0655 6.28569 12.176 6.17532C12.2866 6.06496 12.4358 6.00207 12.592 6H13.135Z"
                                        fill="#77917f" />
                                </svg>
                            </a>
                        </li>
                        <li class="footer-menu-social__item">
                            <a class="footer-menu-social__item-link" href="https://www.instagram.com/tatyanablank/" target="_blank"
                                rel="noopener" aria-label="Link instagram">
                                <svg class="socail-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 7.90001C11.1891 7.90001 10.3964 8.14048 9.72218 8.59099C9.04794 9.0415 8.52243 9.68184 8.21211 10.431C7.90179 11.1802 7.8206 12.0046 7.9788 12.7999C8.13699 13.5952 8.52748 14.3258 9.10088 14.8992C9.67427 15.4725 10.4048 15.863 11.2001 16.0212C11.9955 16.1794 12.8198 16.0982 13.569 15.7879C14.3182 15.4776 14.9585 14.9521 15.409 14.2779C15.8596 13.6036 16.1 12.8109 16.1 12C16.1013 11.4612 15.9962 10.9275 15.7906 10.4295C15.585 9.93142 15.2831 9.47892 14.9021 9.09794C14.5211 8.71695 14.0686 8.415 13.5706 8.20942C13.0725 8.00385 12.5388 7.8987 12 7.90001ZM12 14.67C11.4719 14.67 10.9557 14.5134 10.5166 14.22C10.0776 13.9267 9.73534 13.5097 9.53326 13.0218C9.33117 12.5339 9.2783 11.9971 9.38132 11.4791C9.48434 10.9612 9.73863 10.4854 10.112 10.112C10.4854 9.73863 10.9612 9.48434 11.4791 9.38132C11.9971 9.2783 12.5339 9.33117 13.0218 9.53326C13.5097 9.73534 13.9267 10.0776 14.22 10.5166C14.5134 10.9557 14.67 11.4719 14.67 12C14.67 12.7081 14.3887 13.3873 13.888 13.888C13.3873 14.3887 12.7081 14.67 12 14.67ZM17.23 7.73001C17.23 7.9278 17.1714 8.12114 17.0615 8.28558C16.9516 8.45003 16.7954 8.57821 16.6127 8.65389C16.43 8.72958 16.2289 8.74938 16.0349 8.7108C15.8409 8.67221 15.6628 8.57697 15.5229 8.43712C15.3831 8.29727 15.2878 8.11909 15.2492 7.92511C15.2106 7.73112 15.2304 7.53006 15.3061 7.34733C15.3818 7.16461 15.51 7.00843 15.6744 6.89855C15.8389 6.78866 16.0322 6.73001 16.23 6.73001C16.4952 6.73001 16.7496 6.83537 16.9371 7.02291C17.1247 7.21044 17.23 7.4648 17.23 7.73001ZM19.94 8.73001C19.9691 7.48684 19.5054 6.28261 18.65 5.38001C17.7522 4.5137 16.5474 4.03897 15.3 4.06001C14 4.00001 10 4.00001 8.70001 4.06001C7.45722 4.0331 6.25379 4.49652 5.35001 5.35001C4.49465 6.25261 4.03093 7.45684 4.06001 8.70001C4.00001 10 4.00001 14 4.06001 15.3C4.03093 16.5432 4.49465 17.7474 5.35001 18.65C6.25379 19.5035 7.45722 19.9669 8.70001 19.94C10.02 20.02 13.98 20.02 15.3 19.94C16.5432 19.9691 17.7474 19.5054 18.65 18.65C19.5054 17.7474 19.9691 16.5432 19.94 15.3C20 14 20 10 19.94 8.70001V8.73001ZM18.24 16.73C18.1042 17.074 17.8993 17.3863 17.6378 17.6478C17.3763 17.9093 17.064 18.1142 16.72 18.25C15.1676 18.5639 13.5806 18.6715 12 18.57C10.4228 18.6716 8.83902 18.564 7.29001 18.25C6.94608 18.1142 6.63369 17.9093 6.37223 17.6478C6.11076 17.3863 5.90579 17.074 5.77001 16.73C5.35001 15.67 5.44001 13.17 5.44001 12.01C5.44001 10.85 5.35001 8.34001 5.77001 7.29001C5.90196 6.94268 6.10547 6.62698 6.36733 6.36339C6.62919 6.09981 6.94355 5.89423 7.29001 5.76001C8.83902 5.44599 10.4228 5.33839 12 5.44001C13.5806 5.33856 15.1676 5.44616 16.72 5.76001C17.064 5.89579 17.3763 6.10076 17.6378 6.36223C17.8993 6.62369 18.1042 6.93608 18.24 7.28001C18.66 8.34001 18.56 10.84 18.56 12C18.56 13.16 18.66 15.67 18.24 16.72V16.73Z"
                                        fill="#77917f" />
                                </svg>
                            </a>
                        </li>
                        <li class="footer-menu-social__item">
                            <a class="footer-menu-social__item-link" href="https://t.me/tatyanablank" target="_blank" rel="noopener"
                                aria-label="Link Telegram">
                                <svg class="socail-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.78801 14.02C5.83098 14.0343 5.87516 14.0447 5.92001 14.051C6.20293 14.7176 6.48427 15.385 6.76401 16.053C7.26701 17.255 7.77401 18.493 7.88501 18.849C8.02401 19.287 8.17001 19.585 8.33001 19.789C8.41301 19.893 8.50801 19.985 8.62001 20.055C8.67835 20.0915 8.74078 20.121 8.80601 20.143C9.12601 20.263 9.41801 20.213 9.60101 20.152C9.7084 20.1153 9.81058 20.0649 9.90501 20.002L9.91001 20L12.736 18.238L16.001 20.74C16.049 20.777 16.101 20.808 16.157 20.833C16.549 21.003 16.929 21.063 17.287 21.015C17.643 20.965 17.926 20.816 18.137 20.647C18.3793 20.4517 18.5725 20.2024 18.701 19.919L18.71 19.897L18.713 19.889L18.715 19.885V19.883L18.716 19.882C18.7334 19.839 18.7468 19.7945 18.756 19.749L21.736 4.72399C21.7454 4.67589 21.7501 4.62699 21.75 4.57799C21.75 4.13799 21.584 3.71899 21.195 3.46599C20.861 3.24899 20.49 3.23899 20.255 3.25699C20.003 3.27699 19.769 3.33899 19.612 3.38899C19.5241 3.41684 19.4374 3.4482 19.352 3.48299L19.341 3.48799L2.62701 10.044L2.62501 10.045C2.56846 10.0658 2.51275 10.0888 2.45801 10.114C2.32547 10.1736 2.19833 10.2445 2.07801 10.326C1.85101 10.481 1.32801 10.907 1.41701 11.611C1.48701 12.171 1.87101 12.516 2.10601 12.682C2.23401 12.773 2.35601 12.838 2.44601 12.881C2.48601 12.901 2.57201 12.935 2.60901 12.951L2.61901 12.954L5.78801 14.02ZM19.926 4.86799H19.924C19.9154 4.87181 19.9067 4.87548 19.898 4.87899L3.16401 11.444C3.1554 11.4475 3.14673 11.4508 3.13801 11.454L3.12801 11.457C3.09744 11.469 3.06741 11.4823 3.03801 11.497C3.06584 11.5129 3.09456 11.5273 3.12401 11.54L6.26601 12.598C6.32216 12.6169 6.37587 12.6424 6.42601 12.674L16.803 6.59899L16.813 6.59399C16.8533 6.56949 16.8947 6.5468 16.937 6.52599C17.009 6.48899 17.124 6.43499 17.254 6.39499C17.344 6.36699 17.611 6.28799 17.899 6.38099C18.0518 6.42914 18.1879 6.51927 18.2919 6.64111C18.3959 6.76294 18.4635 6.91156 18.487 7.06999C18.5243 7.20874 18.5253 7.35472 18.49 7.49399C18.42 7.76899 18.228 7.98299 18.053 8.14699C17.903 8.28699 15.957 10.163 14.038 12.015L11.425 14.535L10.96 14.985L16.832 19.487C16.9113 19.5203 16.9973 19.534 17.083 19.527C17.1262 19.5211 17.1667 19.5031 17.2 19.475C17.2406 19.4408 17.2753 19.4002 17.303 19.355L17.305 19.354L20.195 4.78099C20.104 4.80288 20.0147 4.83163 19.928 4.86699L19.926 4.86799ZM11.465 17.262L10.293 16.364L10.009 18.169L11.465 17.262ZM9.21801 14.582L10.383 13.457L12.996 10.935L13.969 9.99699L7.44901 13.814L7.48401 13.896C7.89521 14.8674 8.30189 15.8408 8.70401 16.816L8.98701 15.016C9.01262 14.849 9.09405 14.6967 9.21801 14.582Z"
                                        fill="#77917f" />
                                </svg>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="footer-bottom">
            <div class="developer">
                <p class="developer__text">{{ __('menu.developer') }}</p>
                <a class="developer__link" href="https://sergeyilkov.com" target="_blank" rel="noopener">https://sergeyilkov.com</a>
            </div>

            <p class="copyright">
                {{ __('base.copyright') }}
            </p>
        </div>
    </div>
</footer>