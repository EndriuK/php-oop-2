<?php

// Classe Categoria
class Categoria
{
    public $nome;
    public $immagine;

    public function __construct($nome, $immagine)
    {
        $this->nome = $nome;
        $this->immagine = $immagine;
    }
}

// Eccezione personalizzata
class PrezzoNonValidoException extends Exception
{
    public function __construct($message = "Il prezzo non è valido.", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

// Classe Prodotto
class Prodotto
{
    public $titolo;
    public $prezzo;
    public $immagine;
    public $categoria;

    public function __construct($titolo, $prezzo, $immagine, Categoria $categoria)
    {
        if ($prezzo < 0) {
            throw new PrezzoNonValidoException("Il prezzo di {$titolo} non può essere negativo.");
        }

        $this->titolo = $titolo;
        $this->prezzo = $prezzo;
        $this->immagine = $immagine;
        $this->categoria = $categoria;
    }

    public function getDettagli()
    {
        return "Titolo: {$this->titolo}, Prezzo: {$this->prezzo}€, Categoria: {$this->categoria->nome}";
    }
}

// Classe Cibo
class Cibo extends Prodotto
{
    public $tipoCibo;

    public function __construct($titolo, $prezzo, $immagine, Categoria $categoria, $tipoCibo)
    {
        parent::__construct($titolo, $prezzo, $immagine, $categoria);
        $this->tipoCibo = $tipoCibo;
    }

    public function getDettagli()
    {
        return parent::getDettagli() . ", Tipo di Cibo: {$this->tipoCibo}";
    }
}

// Classe Gioco
class Gioco extends Prodotto
{
    public $materiale;

    public function __construct($titolo, $prezzo, $immagine, Categoria $categoria, $materiale)
    {
        parent::__construct($titolo, $prezzo, $immagine, $categoria);
        $this->materiale = $materiale;
    }

    public function getDettagli()
    {
        return parent::getDettagli() . ", Materiale: {$this->materiale}";
    }
}

// Classe Cuccia
class Cuccia extends Prodotto
{
    public $dimensioni;

    public function __construct($titolo, $prezzo, $immagine, Categoria $categoria, $dimensioni)
    {
        parent::__construct($titolo, $prezzo, $immagine, $categoria);
        $this->dimensioni = $dimensioni;
    }

    public function getDettagli()
    {
        return parent::getDettagli() . ", Dimensioni: {$this->dimensioni}";
    }
}

// Creazione di categorie con immagini
$categoriaCani = new Categoria("Cani", "img/cani.jpg");
$categoriaGatti = new Categoria("Gatti", "img/gatti.jpg");

try {
    // Creazione di prodotti con immagini e controllo sul prezzo
    $ciboCani = new Cibo("Cibo per cani", 19.99, "./img/ciboPerCani.jpg", $categoriaCani, "Secco");
    $giocoGatti = new Gioco("Gioco per gatti", 9.99, "img/gioco_gatti.jpg", $categoriaGatti, "Plastica");
    $cucciaCani = new Cuccia("Cuccia per cani", 49.99, "img/cuccia_cani.jpg", $categoriaCani, "Grande");
} catch (PrezzoNonValidoException $e) {
    echo "<p>Errore: " . $e->getMessage() . "</p>";
}

// Array di prodotti
$prodotti = [
    new Cibo("Cibo per cani", 19.99, "./img/ciboPerCani.jpg", $categoriaCani, "Secco"),
    new Gioco("Gioco per gatti", 9.99, "./img/giocoPerGatti.jpg", $categoriaGatti, "Plastica"),
    new Cuccia("Cuccia per cani", 49.99, "./img/cucciaPerCani.jpg", $categoriaCani, "Grande")
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lista Prodotti</title>
</head>

<body>

    <div class="container">
        <h1 class="my-5 text-center">Lista Prodotti</h1>

        <div class="row">
            <?php foreach ($prodotti as $prodotto): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="<?= $prodotto->immagine ?>" class="card-img-top" alt="<?= $prodotto->titolo ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $prodotto->titolo ?></h5>
                            <p class="card-text"><strong>Prezzo:</strong> <?= $prodotto->prezzo ?>€</p>
                            <p class="card-text"><strong>Categoria:</strong> <?= $prodotto->categoria->nome ?></p>
                            <p class="card-text"><?= $prodotto->getDettagli() ?></p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Acquista</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoH8Go7FVnSo/tpKkzNU6p1RY2NqU8r+7Vxi3I5dAkTtI1P" crossorigin="anonymous"></script>
</body>

</html>