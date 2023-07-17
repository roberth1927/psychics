@extends('layouts.app-spanish')
@section('metas')
@parent
<link rel="canonical" href="https://www.psychics1on1.com/spanish">
<meta name="keywords" content="psíquicos, asesores, Astrología y Horóscopos, lectura psíquica, Asesoramiento Carrera, Clarividencia, Análisis de Sueños, Amor & Relaciones, Lectores de Tarot">
<meta name="description" content="¡Disfrute de $5 de descuento en su primera lectura psíquica con un asesor espiritual cuando se registre hoy!">
@endsection
@section('title', 'Sobre Nosotros | Conéctese a psíquicos en línea | ')
@section('content')
<home-top-es></home-top-es>
<section class="fourColSection" style="background: #fff">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="fourColContainer fourColContainerEs iconContainerAbout">
                    <div class="fourColItem">
                        <div class="iconContainer">
                            <img src="{{ env('APP_URL') }}/images/icons/sign-up.png" alt="Sign up" class="img-fluid">
                        </div>
                        <p>Registrese y navegue por nuestros proveedores de forma gratuita.</p>
                    </div>
                    <div class="fourColItem">
                        <div class="iconContainer">
                            <img src="{{ env('APP_URL') }}/images/icons/browse.png" alt="Browse" class="img-fluid">
                        </div>
                        <p>Encuentra un asesor de confianza, añadiremos 5 dólares en su primera lectura.</p>
                    </div>
                    <div class="fourColItem">
                        <div class="iconContainer">
                            <img src="{{ env('APP_URL') }}/images/icons/discover.png" alt="Discover" class="img-fluid">
                        </div>
                        <p>Ordene y vea nuestro directorio de asesores por especialidad, herramientas utilizadas y estilo de lectura.</p>
                    </div>
                    <div class="fourColItem">
                        <div class="iconContainer">
                            <img src="{{ env('APP_URL') }}/images/icons/advice.png" alt="Advice" class="img-fluid">
                        </div>
                        <p>Obtenga el consejo y la asesoría que desee desde cualquier lugar.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="thirdSectionHeading thirdSectionHeading-about">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="thirdSectionHeadingContainer">
                    <h2>Más Respuestas, Más Claridad, Mejor Consejos</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="thirdSectionHeading thirdSectionHeading-about" style="background: #fff">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="thirdSectionHeadingContainer thirdSectionHeadingContainerEs mt-4">
                    <p>
                    Psychics1on1™ se fundó con la creencia de que la contratación de asesores espirituales altamente calificados debe ser simple, privado y económico. Hemos experimentado un enorme crecimiento desde nuestro lanzamiento, gracias a nuestro enfoque en nuestra plataforma para satisfacer las necesidades de una industria en evolución. Nuestros satisfechos clientes pueden elegir de nuestra gran variedad de asesores y espirituales compasivos.
                    <br><br>
                    Si estás buscando la experiencia de tu primera lectura psíquica o simplemente necesitas orientación durante un momento difícil de tu vida, Psychics1on1™ tiene más de 2,000 asesores espirituales que son accesibles fácilmente a través de nuestra innovadora plataforma de chat, audio y llamadas de video. Hemos hecho que la prioridad número uno sea conectarte con un consejero espiritual que se ajuste a tus necesidades personales, y recibirás $5 de descuento en tu primera lectura como bono.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="thirdSection thirdSectionHeading-about" style="background: #fff">
    <div class="container">
        <div class="row">
            <div class="col p-0">
                <div class="thirdSecContainer">
                    <div class="itemContainer">
                        <div class="imgContainer">
                            <img src="{{ env('APP_URL') }}/images/top-quality-about.png" alt="Top Quality Network" class="img-fluid">
                        </div>
                        <div class="itemContent">
                            <h4>Máxima Calidad</h4>
                            <p>Nuestro equipo de profesionales experimentados y compasivos están aquí para ofrecerle la atención que se merece.</p>
                        </div>
                    </div>
                    <div class="itemContainer">
                        <div class="imgContainer">
                            <img src="{{ env('APP_URL') }}/images/available-about.png" alt="Always Available" class="img-fluid">
                        </div>
                        <div class="itemContent">
                            <h4>Siempre Disponible</h4>
                            <p>En cualquier lugar del mundo, a cualquier hora del día: nuestro expertos están a su disposición cuando más los necesita. Ofreciendo las mejores lecturas, respuestas y consejos.</p>
                        </div>
                    </div>
                    <div class="itemContainer">
                        <div class="imgContainer">
                            <img src="{{ env('APP_URL') }}/images/upfront-rates-about.png" alt="Simple Upfront Rates" class="img-fluid">
                        </div>
                        <div class="itemContent">
                            <h4>Precios Económicos y Fácil de Entender</h4>
                            <p>No hay cargos de sorpresa más adelante. Solamente servicios tarifas claras en cada perfil, para que sepas exactamente cuánto estás gastando.</p>
                        </div>
                    </div>
                    <div class="itemContainer">
                        <div class="imgContainer">
                            <img src="{{ env('APP_URL') }}/images/clarity-about.png" alt="Clarity Where You Need It" class="img-fluid">
                        </div>
                        <div class="itemContent">
                            <h4>Claridad Cuando lo Necesitas</h4>
                            <p>Nuestra extensa galería de psíquicos, médiums, sanadores y astrólogos te ofrece todo lo que buscas, desde lecturas espirituales hasta orientación sobre relaciones, interpretación de sueños y navegación sobre el horóscopo. Todo está aquí.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="thirdSectionHeading thirdSectionHeading-about">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="thirdSectionHeadingContainer ">
                    <h2>Mejora Tu Futuro</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<home-section-4-es></home-section-4-es>

<section class="fifthSection thirdSectionHeading-about" >
    <div class="container">
        <div class="row">
            <div class="col px-0">
                <div class="fifthSecContainer">
                    <h3>Conéctate A Tu Manera</h3>
                    <h4>ES FÁCIL, SEGURO Y GRATUITO.</h4>
                    <div class="fifthSecItemContainer">
                        <div class="conItemContainer">
                            <div class="imgContainer">
                                <img src="{{ env('APP_URL') }}/images/messaging-about.png" alt="Messaging" class="img-fluid">
                            </div>
                            <div class="itemContent">
                                <h5>Mensajería</h5>
                                <p>Respuestas y conocimientos inmediatos estés donde estés, además de la posibilidad de enviar fotos y vídeos</p>
                            </div>
                        </div>
                        <div class="conItemContainer">
                            <div class="imgContainer">
                                <img src="{{ env('APP_URL') }}/images/calls-about.png" alt="Calls" class="img-fluid">
                            </div>
                            <div class="itemContent">
                                <h5>Llamadas</h5>
                                <p>Deja que tu voz cuente la historia y obtén las respuestas que buscas.</p>
                            </div>
                        </div>
                        <div class="conItemContainer">
                            <div class="imgContainer">
                                <img src="{{ env('APP_URL') }}/images/videocal-about.png" alt="Video Chat" class="img-fluid">
                            </div>
                            <div class="itemContent">
                                <h5>Chat de Vídeo</h5>
                                <p>Video chat en directo 1:1 para que puedas conectarte visualmente y disfrutar de lecturas más profundas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="thirdSectionHeading thirdSectionHeading-about pt-5 pb-5" style="background: #fff">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="thirdSectionHeadingContainer thirdSectionHeadingContainerEs">
                    <h2 style="padding-bottom: 30px">Consejo Psíquico Exactamente Cuando Lo Necesitas</h2>
                    <p  class="textMobAbout">
                        Nuestros clientes están encantados con la simplificada apariencia y la fácil funcionalidad de nuestra plataforma, que hace obtener el consejo y la orientación que quieres exactamente cuando lo necesitas. Conectarse con nuestro experto y compasivo grupo de profesionales, que se encuentran en todo el mundo y están disponibles a cualquier hora del día, significa que recibirás lecturas, respuestas y consejos confiables para tus primeras lecturas psíquicas y más allá.
                        <br><br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<home-section-6-es></home-section-6-es>

{{-- <home-section-7></home-section-7> --}}



@endsection