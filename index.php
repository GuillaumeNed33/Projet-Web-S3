<?php include("header.php"); ?>

<div style="visibility: hidden">
    <audio id="multiaudio" src="sounds/D.wav" preload="auto"></audio>
    <audio id="multiaudio1" src="sounds/G.wav" preload="auto"></audio>
    <audio id="multiaudio2" src="sounds/F.wav" preload="auto"></audio>
    <audio id="multiaudio3" src="sounds/E.wav" preload="auto"></audio>
    <audio id="multiaudio4" src="sounds/C.wav" preload="auto"></audio>
    <audio id="multiaudio5" src="sounds/B.wav" preload="auto"></audio>
</div>

<main class="container-fluid">
    <a id="title" href="javascript:play_sound('multiaudio');">
        <section class="row" style="background-image: url('img/logo.png');">
            <div class="bande">
                <h2 class="text-center" style="font-weight: bold;">Classicarium, le meilleur de la musique classique</h2>
            </div>
        </section>
    </a>

    <a href="javascript:play_sound('multiaudio1');">
        <div class="blackKey">
        </div>
    </a>
    <section class="row" style="background-image: url('img/compositeur.png');">
        <a href="market.php?category=compositeurs">
            <div class="bande">
                <h2 class="text-right">Compositeurs</h2>
            </div>
        </a>
    </section>

    <a href="javascript:play_sound('multiaudio2');">
        <div class="blackKey">
        </div>
    </a>

    <section class="row" style="background-image: url('img/interprete.png');">
        <a href="market.php?category=interpretes">
            <div class="bande">
                <h2 class="text-right">Interprètes</h2>
            </div>
        </a>
    </section>

    <section class="row" style="background-image: url('img/chef_orchestre.png');">
        <a href="market.php?category=chef_orchestre">
            <div class="bande">
                <h2 class="text-right">Chefs d'Orchestre</h2>
            </div>
        </a>
    </section>

    <a href="javascript:play_sound('multiaudio3');">
        <div class="blackKey">
        </div>
    </a>

    <section class="row" style="background-image: url('img/orchestre.png');">
        <a href="market.php?category=orchestres">
            <div class="bande">
                <h2 class="text-right">Orchestres</h2>
            </div>
        </a>
    </section>

    <a href="javascript:play_sound('multiaudio4');">
        <div class="blackKey">
        </div>
    </a>

    <section class="row" style="background-image: url('img/instrument.png');">
        <a href="market.php?category=instruments">
            <div class="bande">
                <h2 class="text-right">Instruments</h2>
            </div>
        </a>
    </section>

    <a href="javascript:play_sound('multiaudio5');">
        <div class="blackKey">
        </div>
    </a>

    <section class="row" style="background-image: url('img/genre.png');">
        <a href="market.php?category=genre">
            <div class="bande">
                <h2 class="text-right">Genre</h2>
            </div>
        </a>
    </section>
</main>

<script type="text/javascript">
    function play_sound(s) {
        var a = new Audio();
        a.src = document.getElementById(s).src;
        a.load();
        a.volume = 0.1;
        a.play();
    }
</script>

<?php include("footer.php");?>
