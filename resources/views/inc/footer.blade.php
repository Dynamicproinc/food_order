 <footer class="text-center py-4 d-flex justify-content-center align-items-center">
                <div class="container ">
                    <div class="mb-2">
                        <a href="#" class="btn btn-lg btn-dark-theme w-100">{{ __('Subscribe Newsletters') }}</a>
                    </div>
                    <div class="text-center">
                        <h5>M BROTHERS FOOD J.D.O.O</h5>
                        <p>Poštanska ul., 10410, Velika Gorica, Croatia</p>
                        <div class="rounded-4" style="overflow: hidden; height:200px">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2786.093743875022!2d16.048312176119!3d45.70915617107901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47667fe21922b5b3%3A0xf18caa017255a3f7!2sM%20Brothers%20Food%20Truck!5e0!3m2!1sen!2shr!4v1790514915121!5m2!1sen!2shr" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                        </div>
                    </div>
                    <div><strong>{{ __('Open Hours') }}</strong></div>
                    <div><strong>{{ __('Monday to Friday 11:00 – 17:00') }}</strong></div>
                    {{-- <div><strong>{{ __('Saturday 10:00 – 12:00')}}</strong></div> --}}
                    <div class="">{{ __('For support, contact') }} <a href="mailto:info@mbrothers-food.com"
                            class="text-white">info@mbrothers-food.com</a></div>
                    <div class="mb-3">
                        <a href="/terms-of-use" class="me-2 text-white">{{ __('Terms of Use') }}</a>
                        <a href="/privacy-policy" class="text-white">{{ __('Privacy Policy') }}</a>
                    </div>
                    <div class="gray-5">&copy; {{ date('Y') }} {{ config('app.name') }}.
                        {{ __('All rights reserved.') }}</div>
                </div>
            </footer>
