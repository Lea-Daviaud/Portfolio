<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio de Léa</title>
    <link rel="icon" href="files/Moi.jpg" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Style global */
        body {
            font-family: 'Merriweather', serif;
            margin: 0;
            padding: 0;
            background-color: #fdfdfd;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1, h2 {
            font-weight: 700;
        }

      

        /* Bannière */
        .banner {
            background-image: url('files/cavaliers-noir-blanc.jpg');
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 3rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            width: 100%;
            margin-top: 60px; /* Ajuster l'espacement pour la navbar */
        }

        /* Bouton de réinitialisation */
        .btn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #555;
        }

        /* Section principale */
        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Colonne de gauche (images) */
        .left-column {
            width: 45%;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .left-column img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .left-column img:hover {
            transform: scale(1.05);
        }

        /* Colonne de droite (texte) */
        .right-column {
            width: 45%;
            padding-left: 20px;
        }

        .right-column h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }

        .right-column p {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #555;
        }

        /* Style du canvas */
        canvas {
            border: 2px solid #333;
            margin-top: 40px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        /* Améliorations de la structure générale */
        @media (max-width: 768px) {
            .content {
                flex-direction: column;
                align-items: center;
            }

            .left-column, .right-column {
                width: 90%;
            }

            .banner h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
<script src="navbar.js"></script>

    <!-- Bannière -->
    <div class="banner">
        <h1>Cavalier</h1>
    </div>

    <!-- Bouton de réinitialisation -->
    <button class="btn">Réinitialiser</button>

    <!-- Canvas pour l'échiquier -->
    <canvas id="board" width="800" height="800"></canvas>

    <script>
        var tableau = new Array(8);
        var canvas = document.getElementById("board");
        const btn = document.querySelector('.btn');
        var ctx = canvas.getContext("2d");

        function initialiserTableau() {
            var couleur = "black";
            for (let i = 0; i < 8; i++) {
                tableau[i] = new Array(8);
                if (couleur == "#FFFACD") {
                    couleur = "black";
                } else if (couleur == "black") {
                    couleur = "#FFFACD";
                }
                var y = 100 * i;
                for (let j = 0; j < 8; j++) {
                    var x = 100 * j;
                    var taille = 100;
                    if (couleur == "#FFFACD") {
                        couleur = "black";
                    } else if (couleur == "black") {
                        couleur = "#FFFACD";
                    }
                    tableau[i][j] = uneCase(ctx, x, y, taille, couleur);
                }
            }
        }

        function uneCase(ctx, x, y, taille, couleur) {
            ctx.beginPath();
            ctx.rect(x, y, taille, taille);
            ctx.fillStyle = couleur;
            ctx.fill();
            ctx.closePath();
        }

        function unPoint(ctx, i, j, taille, couleur) {
            ctx.beginPath();
            ctx.arc(i, j, taille, 0, 2 * Math.PI);
            ctx.fillStyle = couleur;
            ctx.fill();
            ctx.stroke();
        }

        function coordonnees(event) {
            i = event.offsetX;
            j = event.offsetY;

            x = i / 100;
            x = Math.floor(x);
            x = x * 100 + 50;
            y = j / 100;
            y = Math.floor(y);
            y = y * 100 + 50;
            unPoint(ctx, x, y, 10, 'red');
            rosace();
        }

        function rosace() {
            d = x - 200; a = y - 100;
            unPoint(ctx, d, a, 10, 'green');
            d = x - 100; a = y - 200;
            unPoint(ctx, d, a, 10, 'green');
            d = x + 100; a = y - 200;
            unPoint(ctx, d, a, 10, 'green');
            d = x - 100; a = y + 200;
            unPoint(ctx, d, a, 10, 'green');
            d = x + 200; a = y - 100;
            unPoint(ctx, d, a, 10, 'green');
            d = x + 200; a = y + 100;
            unPoint(ctx, d, a, 10, 'green');
            d = x + 100; a = y + 200;
            unPoint(ctx, d, a, 10, 'green');
            d = x - 200; a = y + 100;
            unPoint(ctx, d, a, 10, 'green');
        }

        function effacer() {
            ctx.clearRect(0, 0, 800, 800);
            initialiserTableau();
        }

        initialiserTableau();
    </script>
    <script>board.addEventListener('click', coordonnees);</script>
    <script>btn.addEventListener("click", effacer);</script>

    <!-- Section avec images à gauche et texte à droite -->
    <section class="content" id="description">
        <div class="left-column">
            <img src="files/cav1.png" alt="Image 1">
            <img src="files/cav2.png" alt="Image 2">
        </div>
        <div class="right-column">
            <h2>Description du projet "Cavalier"</h2>
            <p>
                Cliquer sur l'échiquier permet de placer un point rouge représentant le cavalier avec chacun de ses déplacements possibles représentés par des points verts.
            </p>
            <p>
                Pour cela, je réalise un premier code en PHP, très simple. Puis un code JavaScript où des fonctions créent les points.
            </p>
        </div>
    </section>

</body>
</html>
