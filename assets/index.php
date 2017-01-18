<?php include("header.php"); ?>

<!------------------------------------BODY --------------------------------------->
<div style="visibility: hidden">
    <audio id="multiaudio1" src="sounds/G.wav" preload="auto"></audio>
    <audio id="multiaudio2" src="sounds/F.wav" preload="auto"></audio>
    <audio id="multiaudio3" src="sounds/E.wav" preload="auto"></audio>
    <audio id="multiaudio4" src="sounds/C.wav" preload="auto"></audio>
    <audio id="multiaudio5" src="sounds/B.wav" preload="auto"></audio>
</div>

<main class="container-fluid">
    <h1 style="margin-bottom:75px; text-align:center;">Bienvenue dans La boutique musicale de Thomas et Guillaume</h1>

    <a href="javascript:play_sound('multiaudio1');">
        <div class="blackKey">
        </div>
    </a>

    <section class="row">
        <a href="market.php?category=compositeurs">
            <div class="bande">
                <div class="description">
                    <h2 class="text-right">Compositeurs</h2>
                </div>
            </div>
        </a>
    </section>

    <a href="javascript:play_sound('multiaudio2');">
        <div class="blackKey">
        </div>
    </a>

    <section class="row">
        <a href="market.php?category=interpretes">
            <div class="bande">
                <div>
                    <h2 class="text-right">Interpretes</h2>
                </div>
            </div>
        </a>
    </section>

    <section class="row">
        <a href="market.php?category=chef_orchestre">
            <div class="bande">
                <div>
                    <h2 class="text-right">Chefs d'Orchestre</h2>
                </div>
            </div>
        </a>
    </section>

    <a href="javascript:play_sound('multiaudio3');">
        <div class="blackKey">
        </div>
    </a>

    <section class="row">
        <a href="market.php?category=orchestres">
            <div class="bande">
                <div>
                    <h2 class="text-right">Orchestres</h2>
                </div>
            </div>
        </a>
    </section>

    <a href="javascript:play_sound('multiaudio4');">
        <div class="blackKey">
        </div>
    </a>

    <section class="row">
        <a href="market.php?category=instruments">
            <div class="bande">
                <div>
                    <h2 class="text-right">Instruments</h2>
                </div>
            </div>
        </a>
    </section>

    <a href="javascript:play_sound('multiaudio5');">
        <div class="blackKey">
        </div>
    </a>

    <section class="row">
        <a href="market.php?category=genre">
            <div class="bande">
                <div>
                    <h2 class="text-right">Genre</h2>
                </div>
            </div>
        </a>
    </section>
</main>

<script type="text/javascript">
    function play_sound(s) {
        var a = new Audio();						// create a new audio object
        a.src = document.getElementById(s).src;
        a.load();
        a.volume = 0.1;
        a.play();
    }
</script>

<?php include("footer.php");?>
