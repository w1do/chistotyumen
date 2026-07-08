@props([
    'subtitle' => '',
    'title' => '',
    'intro' => '',
    'formHeading' => '',
])

<section class="pbmit-sticky-section">
    <div class="container">
        <div class="contact-us-bg">
            <div class="row">
                <div class="col-md-12 col-xl-5">
                    <div class="pbmit-sticky-col">
                        <div class="contact-us-left-area">
                            <div class="pbmit-heading-subheading animation-style2">
                                <h4 class="pbmit-subtitle">{{ $subtitle }}</h4>
                                <h2 class="pbmit-title">{{ $title }}</h2>
                                <div class="pbmit-heading-desc">{{ $intro }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-7">
                    <div class="contact-form-area">
                        @if (session('contact_status'))
                            <div class="alert alert-success" role="status">{{ session('contact_status') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="pbmit-heading animation-style2">
                            <h2 class="pbmit-title">{{ $formHeading }}</h2>
                        </div>
                        <form class="contact-form" method="post" action="{{ route('contact.submit') }}" id="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="visually-hidden" for="contact-message">Сообщение</label>
                                    <textarea id="contact-message" name="message" cols="40" rows="10" class="form-control" placeholder="Сообщение" required>{{ old('message') }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="visually-hidden" for="contact-name">Имя</label>
                                    <input id="contact-name" type="text" class="form-control" placeholder="Ваше имя *" name="name" value="{{ old('name') }}" required autocomplete="name">
                                </div>
                                <div class="col-md-6">
                                    <label class="visually-hidden" for="contact-email">Email</label>
                                    <input id="contact-email" type="email" class="form-control" placeholder="Email *" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>
                                <div class="col-md-6">
                                    <label class="visually-hidden" for="contact-phone">Телефон</label>
                                    <input id="contact-phone" type="tel" class="form-control" placeholder="Телефон *" name="phone" value="{{ old('phone') }}" required autocomplete="tel">
                                </div>
                                <div class="col-md-6">
                                    <label class="visually-hidden" for="contact-subject">Тема</label>
                                    <input id="contact-subject" type="text" class="form-control" placeholder="Тема обращения" name="subject" value="{{ old('subject') }}">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="privacy_ok" id="contact-privacy" value="1" @checked(old('privacy_ok')) required>
                                        <label class="form-check-label" for="contact-privacy">
                                            Согласен(на) на обработку персональных данных в целях обратной связи.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="pbmit-btn pbmit-btn-outline">
                                        <span class="pbmit-button-content-wrapper">
                                            <span class="pbmit-button-text">Отправить</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="col-md-12 col-lg-12 message-status"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
