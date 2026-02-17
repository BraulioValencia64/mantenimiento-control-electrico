<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mantenimiento y Control Eléctrico SAC</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /*! tailwindcss v4.0.14 | MIT License | https://tailwindcss.com */
        </style>

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/home.css', 'resources/js/home.js'])
        @endif
    </head>
    <body>
        <div class="header-container" id="banner-container"
             data-banner-url="{{ Vite::asset('resources/images/banner.png') }}">
        </div>

    <div class="technical-files">
        <h3>🛅 ELABORACIÓN Y ACTUALIZACIÓN DE EXPEDIENTES TÉCNICOS 🛅</h3>
        <ul>
            <li>✅ Elaboración de plan de contingencia y/o seguridad</li>
            <li>✅ Cálculo de aforo</li>
            <li>✅ Certificados de equipos de seguridad local</li>
            <li>✅ Planos de electricidad, de evacuación y señalética</li>
            <li>✅ Certificado y protocolos de puesta a tierra</li>
        </ul>
    </div>

    <div class="renewal-benefits">
        <h3>💥 BENEFICIOS DE RENOVAR A TIEMPO 💥</h3>
        <ul>
            <li>✅ Cumplimiento de regulaciones.</li>
            <li>✅ Protección ante posibles contingencias.</li>
            <li>✅ Confianza y tranquilidad para tu equipo y clientes.</li>
        </ul>
    </div>

    <div class="civil-defense">
        <h3>🛡️ ¿NO PASASTE TU INSPECCIÓN DE DEFENSA CIVIL? 🛡️</h3>
        <p class="subtitle">Te ayudamos a levantar todas las observaciones</p>
        <p class="section-title">Solucionamos de inmediato:</p>
        <ul>
            <li>✅ Tableros eléctricos</li>
            <li>✅ Sistemas contra incendio</li>
            <li>✅ Planos y señalización</li>
        </ul>
    </div>

<!-- <div class="afiche">
    <div class="content">
        <h2 style="grid-column: span 2; text-align: center; margin: 0; font-size: 1em; font-weight: 600;">SOLUCIONAMOS DE INMEDIATO:</h2>
        <div class="service-item">
            <img src="https://via.placeholder.com/50/2b70b3/fff?text=⚡" alt="Tableros eléctricos">
            <span>TABLEROS<br>ELÉCTRICOS</span>
        </div>
        <div class="service-item">
            <img src="https://via.placeholder.com/50/2b70b3/fff?text=🧯" alt="Extintor">
            <span>SISTEMAS<br>CONTRA<br>INCENDIO</span>
        </div>
        <div class="service-item">
            <img src="https://via.placeholder.com/50/2b70b3/fff?text=🏃‍♂️" alt="Señal de salida">
            <span>PLANOS Y<br>SEÑALIZACIÓN</span>
        </div>
    </div> -->
<!--     <div class="qualities">
        <div class="quality-item">
            <span class="checkmark">✔</span> CUMPLIMIENTO 100% NORMATIVO
        </div>
        <div class="quality-item">
            <span class="checkmark">✔</span> CERTIFICADO PARA APROBACIÓN<br>DE DEFENSA CIVIL
        </div>
    </div> -->

    <div class="services">
        <h3>⚡ SERVICIOS PROFESIONALES: ⚡</h3>
        <ul>
            <li>✅ Instalaciones y mantenimiento de tableros eléctricos</li>
            <li>✅ Pozos a tierra certificados</li>
            <li>✅ Sistemas eléctricos</li>
            <li>✅ Equipos de medición calibrados</li>
            <li>✅ Servicio técnico con respaldo</li>
            <li>✅ Atención en toda Arequipa</li>
            <li>✅ Proyectos eléctricos comerciales, industriales y residenciales</li>
            <li>✅ Certificados y pruebas eléctricas</li>
            <li>✅ Instalación de alarmas contra incendio y pozos a tierra</li>
        </ul>
    </div>

    <div class="electrical-systems-grounding">
        <h3>🛠️ ELABORACION DE POZOS A TIERRA 🛠️</h3>
        <ul>
            <li>✅ Construcción - Instalación</li>
            <li>✅ Mantenimiento y Reactivación</li>
            <li>✅ Certificación - Protocolos de Medición</li>
            <li>⚡ Firmado por un Ing. Eléctrico 👷 Colegiado y habilitado</li>
            <li>👇 Consulte sin compromiso</li>
        </ul>
    </div>

    <footer class="contact-footer">
        <h3>CONTÁCTANOS HOY:</h3>
        <div class="contact-columns">
            <div class="contact-col">
                <p>📞 932 040 622</p>
                <p>📞 918 283 608</p>
                <p>📞 925 870 800</p>
            </div>
            <div class="contact-col">
                <p>✉️ info@mantenimientoycontrolelectrico.com</p>
            </div>
        </div>
    </footer>
    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
    </body>
</html>
