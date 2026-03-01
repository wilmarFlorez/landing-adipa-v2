<section class="s-contact" id="contacto" aria-labelledby="contact-title">
    <div class="container">
        <div class="s-contact__layout">

            {{-- Contact info column --}}
            <div class="s-contact__info">
                <h2 id="contact-title">¿Tienes alguna consulta?</h2>
                <p class="s-contact__description">
                    Nuestro equipo está disponible para responder tus preguntas
                    sobre programas, inscripciones y becas.
                </p>

                <ul class="s-contact__details">
                    <li class="s-contact__detail">
                        <span class="s-contact__detail-icon" aria-hidden="true">
                            {{-- Email icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="4" width="20" height="16" rx="2"/>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                            </svg>
                        </span>
                        <span>contacto@adipa.cl</span>
                    </li>
                    <li class="s-contact__detail">
                        <span class="s-contact__detail-icon" aria-hidden="true">
                            {{-- Phone icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </span>
                        <span>+56 2 2345 6789</span>
                    </li>
                </ul>
            </div>

            {{-- Form column --}}
            <div class="s-contact__form-wrapper">

                <form class="c-form" id="contact-form" novalidate>

                    <div class="c-form__group">
                        <label class="c-form__label" for="name">
                            Nombre <span aria-hidden="true">*</span>
                        </label>
                        <input
                            class="c-form__input"
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Tu nombre completo"
                            aria-describedby="name-error"
                            required
                        />
                        <span class="c-form__error" id="name-error" role="alert" aria-live="assertive"></span>
                    </div>

                    <div class="c-form__group">
                        <label class="c-form__label" for="email">
                            Correo electrónico <span aria-hidden="true">*</span>
                        </label>
                        <input
                            class="c-form__input"
                            type="email"
                            id="email"
                            name="email"
                            placeholder="tu@correo.com"
                            aria-describedby="email-error"
                            required
                        />
                        <span class="c-form__error" id="email-error" role="alert" aria-live="assertive"></span>
                    </div>

                    <div class="c-form__group">
                        <label class="c-form__label" for="message">
                            Mensaje <span aria-hidden="true">*</span>
                        </label>
                        <textarea
                            class="c-form__input c-form__input--textarea"
                            id="message"
                            name="message"
                            placeholder="Escribe tu consulta aquí..."
                            rows="5"
                            aria-describedby="message-error"
                            required
                        ></textarea>
                        <span class="c-form__error" id="message-error" role="alert" aria-live="assertive"></span>
                    </div>

                    <x-button
                        variant="primary"
                        size="lg"
                        text="Enviar mensaje"
                        type="submit"
                        class="c-form__submit"
                    />

                </form>

                <div class="c-form__success" id="form-success" style="display:none" role="status" aria-live="polite">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                    <p>¡Mensaje enviado! Te responderemos pronto.</p>
                </div>

            </div>

        </div>
    </div>
</section>
